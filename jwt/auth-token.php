<?php
/**
 * jwt/auth_jwt.php
 * Classic PHP (no type hints). HS256 JWT + opaque refresh cookie (6h idle).
 * This file SELF-LOADS your DB connection and JWT secret using your folder layout.
 *
 * FOLDERS:
 *   ROOT: /var/www/html/convert-rank
 *   ENV : ROOT/env/jwt_secret-env.php   (returns secret string)
 *   DB  : ROOT/db/connection.php        (defines getDbConnection())
 */

if (!defined('CR_ROOT')) {
    define('CR_ROOT', dirname(__DIR__)); // from /jwt to project root
}

/* ---- Load DB + Secret (self-contained) ---- */
$__cr_db_path     = CR_ROOT . '/db/connection.php';
$__cr_secret_path = CR_ROOT . '/env/jwt_secret-env.php';

if (file_exists($__cr_db_path)) {
    require_once $__cr_db_path; // defines getDbConnection()
} else {
    error_log('[AuthJWT] DB connection file missing: ' . $__cr_db_path);
}

$__CR_JWT_SECRET = null;
if (file_exists($__cr_secret_path)) {
    $__CR_JWT_SECRET = require $__cr_secret_path; // must return string
    if (!is_string($__CR_JWT_SECRET) || $__CR_JWT_SECRET === '') {
        error_log('[AuthJWT] JWT secret invalid/empty at: ' . $__cr_secret_path);
        $__CR_JWT_SECRET = null;
    }
} else {
    error_log('[AuthJWT] JWT secret env file missing: ' . $__cr_secret_path);
}

/* ---------------- Library ------------------ */
class AuthJWT
{
    // ===== Config =====
    public static $jwtSecret;                 // auto-set at bottom if env present
    public static $issuer     = null;         // optional (e.g. 'https://yourdomain')
    public static $audience   = null;         // optional (frontend origin)
    public static $accessTTL  = 1800;         // 30 minutes
    public static $leeway     = 120;          // clock skew
    public static $idleWindow = 21600;        // 6 hours inactivity for refresh cookie
    public static $cookieName = 'refresh_token';
    public static $cookiePath = '/';
    public static $cookieSecure   = true;     // set false ONLY for local http dev (http)
    public static $cookieHttpOnly = true;

    // Users table columns (used by refresh() JOIN)
    public static $userTable     = 'users';
    public static $userIdCol     = 'id';
    public static $userEmailCol  = 'email';
    public static $userTierCol   = 'membership_tier';
    public static $userNameCol   = 'name';

    // ===== Helpers =====
    private static function b64uEnc($bin) {
        return rtrim(strtr(base64_encode($bin), '+/', '-_'), '=');
    }
    private static function b64uDec($b64u) {
        $pad = 4 - (strlen($b64u) % 4);
        if ($pad < 4) $b64u .= str_repeat('=', $pad);
        return base64_decode(strtr($b64u, '-_', '+/'));
    }
    private static function signRaw($data) {
        return hash_hmac('sha256', $data, self::$jwtSecret, true);
    }

    // ===== JWT =====
    // signature: ($uid, $email, $tier=null, $role=null, $name=null, $ttl=null, $sid=null)
    public static function issueAccessToken($uid, $email, $tier = null, $role = null, $name = null, $ttl = null, $sid = null) {
        $now = time();
        $ttlInt = (is_numeric($ttl) ? (int)$ttl : null);
        $exp = $now + ($ttlInt !== null ? $ttlInt : self::$accessTTL);

        $header  = array('alg'=>'HS256','typ'=>'JWT');
        $payload = array(
            'sub'   => (int)$uid,
            'email' => $email,
            'iat'   => $now,
            'exp'   => $exp
        );
        if ($tier)  $payload['tier'] = $tier;
        if ($role)  $payload['role'] = $role; // optional, unused in your schema
        if ($name)  $payload['name'] = $name;
        if ($sid)   $payload['sid']  = (int)$sid; // bind token to session row
        if (self::$issuer)   $payload['iss'] = self::$issuer;
        if (self::$audience) $payload['aud'] = self::$audience;

        $h = self::b64uEnc(json_encode($header, JSON_UNESCAPED_SLASHES));
        $p = self::b64uEnc(json_encode($payload, JSON_UNESCAPED_SLASHES));
        $s = self::b64uEnc(self::signRaw("$h.$p"));
        return "$h.$p.$s";
    }

    // returns [true, payload] or [false, "reason"]
    public static function verifyAccessToken($jwt) {
        $parts = explode('.', $jwt);
        if (count($parts) != 3) return array(false, 'malformed');
        list($h,$p,$s) = $parts;

        $hdr = json_decode(self::b64uDec($h), true);
        $pld = json_decode(self::b64uDec($p), true);
        if (!is_array($hdr) || !is_array($pld)) return array(false, 'bad json');
        if (!isset($hdr['alg']) || $hdr['alg'] !== 'HS256') return array(false, 'alg');

        $expected = self::b64uEnc(self::signRaw("$h.$p"));
        if (!hash_equals($expected, $s)) return array(false, 'sig');

        $now = time();
        if (!isset($pld['exp']) || ($now - self::$leeway) >= $pld['exp']) return array(false, 'expired');
        if (isset($pld['nbf']) && ($now + self::$leeway) < $pld['nbf'])   return array(false, 'nbf');
        if (isset($pld['iat']) && ($now + self::$leeway) < $pld['iat'])   return array(false, 'future iat');

        return array(true, $pld);
    }

    public static function bearerFromHeader() {
        $headers = function_exists('getallheaders') ? getallheaders() : array();
        $auth = isset($headers['Authorization']) ? $headers['Authorization'] :
                (isset($headers['authorization']) ? $headers['authorization'] : null);
        if (!$auth || stripos($auth, 'Bearer ') !== 0) return null;
        return trim(substr($auth, 7));
    }

    // ===== Refresh sessions =====
    // signature: ($uid, $email, $tier=null, $role=null, $name=null)
    public static function loginStart($uid, $email, $tier = null, $role = null, $name = null) {
        if (!function_exists('getDbConnection')) return array(false, 'db missing');
        $db = getDbConnection();

        $plain = bin2hex(openssl_random_pseudo_bytes(32));
        $hash  = hash('sha256', $plain);
        $nowS  = date('Y-m-d H:i:s');
        $newExpS  = date('Y-m-d H:i:s', time() + self::$idleWindow);
        $ua    = substr(isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : '', 0, 255);
        $ipH   = hash('sha256', isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : '');

        $sql = "INSERT INTO sessions (user_id, refresh_token_hash, created_at, last_used_at, expires_at, user_agent, ip_hash)
                VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $db->prepare($sql);
        if (!$stmt) return array(false, 'db prepare');
        $stmt->bind_param('issssss', $uid, $hash, $nowS, $nowS, $newExpS, $ua, $ipH);
        if (!$stmt->execute()) return array(false, 'db execute');

        $sessionId = $db->insert_id; // bind access token to this session

        self::setRefreshCookie($plain);
        $access = self::issueAccessToken($uid, $email, $tier, $role, $name, null, $sessionId);
        return array(true, array('access_token' => $access));
    }

    public static function refresh() {
        if (!function_exists('getDbConnection')) return array(false, 'db missing');
        $db = getDbConnection();

        if (!isset($_COOKIE[self::$cookieName])) return array(false, 'no cookie');
        $cookie = $_COOKIE[self::$cookieName];
        $hash   = hash('sha256', $cookie);

        // JOIN user to fetch email + tier + name (no role)
        $sql = sprintf(
            "SELECT s.id, s.user_id, s.expires_at, s.revoked_at,
                    u.%s AS email, u.%s AS membership_tier, u.%s AS name
             FROM sessions s
             JOIN %s u ON u.%s = s.user_id
             WHERE s.refresh_token_hash=? LIMIT 1",
            self::$userEmailCol, self::$userTierCol, self::$userNameCol,
            self::$userTable, self::$userIdCol
        );
        $stmt = $db->prepare($sql);
        if (!$stmt) return array(false, 'db prepare');
        $stmt->bind_param('s', $hash);
        if (!$stmt->execute()) return array(false, 'db execute');
        $res = $stmt->get_result();
        $row = $res->fetch_assoc();
        if (!$row) return array(false, 'not found');
        if (!empty($row['revoked_at'])) return array(false, 'revoked');
        if (time() >= strtotime($row['expires_at'])) return array(false, 'idle expired');

        // Rotate + extend idle window
        $newPlain = bin2hex(openssl_random_pseudo_bytes(32));
        $newHash  = hash('sha256', $newPlain);
        $nowS     = date('Y-m-d H:i:s');
        $newExpS  = date('Y-m-d H:i:s', time() + self::$idleWindow);

        $upd = $db->prepare("UPDATE sessions SET refresh_token_hash=?, last_used_at=?, expires_at=? WHERE id=?");
        if (!$upd) return array(false, 'db prepare 2');
        $upd->bind_param('sssi', $newHash, $nowS, $newExpS, $row['id']);
        if (!$upd->execute()) return array(false, 'db update');

        self::setRefreshCookie($newPlain);

        $access = self::issueAccessToken(
            (int)$row['user_id'],
            $row['email'],
            $row['membership_tier'],
            null,
            $row['name'],
            null,
            (int)$row['id'] // sid in token
        );
        return array(true, array('access_token' => $access));
    }

    public static function logout() {
        // Try to revoke by refresh cookie first
        $hash = null;
        if (isset($_COOKIE[self::$cookieName])) {
            $hash = hash('sha256', $_COOKIE[self::$cookieName]);
        }

        if (function_exists('getDbConnection')) {
            $db = getDbConnection();

            if ($hash) {
                $nowS = date('Y-m-d H:i:s');
                $stmt = $db->prepare("UPDATE sessions SET revoked_at=? WHERE refresh_token_hash=?");
                if ($stmt) { $stmt->bind_param('ss', $nowS, $hash); $stmt->execute(); }
            } else {
                // No cookie? Fall back to Authorization: Bearer (invalidate by sid)
                $jwt = self::bearerFromHeader();
                if ($jwt) {
                    list($ok, $claims) = self::verifyAccessToken($jwt);
                    if ($ok && isset($claims['sid'])) {
                        $sid = (int)$claims['sid'];
                        $uid = (int)$claims['sub'];
                        $nowS = date('Y-m-d H:i:s');
                        $stmt = $db->prepare("UPDATE sessions SET revoked_at=? WHERE id=? AND user_id=?");
                        if ($stmt) { $stmt->bind_param('sii', $nowS, $sid, $uid); $stmt->execute(); }
                    }
                }
            }
        }

        // Clear cookie (old signature)
        setcookie(self::$cookieName, '', time() - 3600, self::$cookiePath, '', self::$cookieSecure, self::$cookieHttpOnly);
    }

    private static function setRefreshCookie($val) {
        // Old-style setcookie signature for max compatibility
        setcookie(self::$cookieName, $val, 0, self::$cookiePath, '', self::$cookieSecure, self::$cookieHttpOnly);
    }

    // ===== API Guard =====
    public static function requireApiAuth() {
        $jwt = self::bearerFromHeader();
        if (!$jwt) { http_response_code(401); exit('Missing token'); }

        list($ok, $claims) = self::verifyAccessToken($jwt);
        if (!$ok) { http_response_code(401); exit($claims); }

        // If token bound to session id, ensure that session is valid (instant logout enforcement)
        if (isset($claims['sid'])) {
            if (!function_exists('getDbConnection')) { http_response_code(500); exit('db missing'); }
            $db = getDbConnection();

            $sid = (int)$claims['sid'];
            $uid = (int)$claims['sub'];

            $stmt = $db->prepare("SELECT revoked_at, expires_at FROM sessions WHERE id=? AND user_id=? LIMIT 1");
            if (!$stmt) { http_response_code(500); exit('db prepare'); }
            $stmt->bind_param('ii', $sid, $uid);
            if (!$stmt->execute()) { http_response_code(500); exit('db execute'); }
            $res = $stmt->get_result();
            $row = $res->fetch_assoc();
            if (!$row) { http_response_code(401); exit('invalid session'); }
            if (!empty($row['revoked_at'])) { http_response_code(401); exit('session revoked'); }
            if (time() >= strtotime($row['expires_at'])) { http_response_code(401); exit('session expired'); }
        }

        return $claims; // includes 'sid', 'name', 'tier', etc.
    }
}

/* ---- Auto-apply secret loaded above ---- */
if (isset($__CR_JWT_SECRET) && $__CR_JWT_SECRET) {
    AuthJWT::$jwtSecret = $__CR_JWT_SECRET;
}
?>