<?php
/**
 * jwt/auth_helper.php
 * Page/API guards for your JWT + refresh-cookie auth.
 * - Pages: verify token, then ensure the session (sid) is still valid; otherwise try refresh; otherwise render login HTML and exit.
 * - APIs: use AuthJWT::requireApiAuth() which already enforces sid validity.
 */

require_once dirname(__DIR__) . '/jwt/auth-token.php';

/**
 * Internal: verify that the JWT's sid still points to a live session row.
 * Returns true if session is valid; false if revoked/expired/missing.
 */
function _check_sid_alive($claims) {
    if (!isset($claims['sid']) || !isset($claims['sub'])) return true; // no sid => allow
    if (!function_exists('getDbConnection')) return false;

    $db = getDbConnection();
    if (!$db) return false;

    $sid = (int)$claims['sid'];
    $uid = (int)$claims['sub'];

    $stmt = $db->prepare("SELECT revoked_at, expires_at FROM sessions WHERE id=? AND user_id=? LIMIT 1");
    if (!$stmt) return false;
    $stmt->bind_param('ii', $sid, $uid);
    if (!$stmt->execute()) return false;
    $res = $stmt->get_result();
    $row = $res->fetch_assoc();
    if (!$row) return false;
    if (!empty($row['revoked_at'])) return false;
    if (time() >= strtotime($row['expires_at'])) return false;

    return true;
}

/**
 * Render login HTML and exit.
 */
function _render_login_and_exit($hostname, $login_renderer_path) {
    if (is_file($login_renderer_path)) {
        require_once $login_renderer_path;
        if (function_exists('loginFormHtml')) {
            loginFormHtml($hostname);
            exit;
        }
    }
    echo "<p>Login required.</p>";
    exit;
}

/**
 * Require login for a normal PAGE.
 * Flow:
 *   1) If a cached access token exists in $_SESSION, verify it and check sid alive.
 *   2) If missing/invalid, call AuthJWT::refresh() (uses HttpOnly cookie), then verify & check sid.
 *   3) If still not valid, render login HTML and exit.
 *
 * @param string $hostname            e.g. https://yourdomain.com/convert-rank
 * @param string $login_renderer_path absolute path to login-html-page.php
 * @return array                      JWT payload (claims)
 */
function require_login_page($hostname, $login_renderer_path)
{
    if (session_status() === PHP_SESSION_NONE) session_start();

    $token = isset($_SESSION['access_token']) ? $_SESSION['access_token'] : null;

    // 1) Try cached token
    if ($token) {
        list($ok, $claims) = AuthJWT::verifyAccessToken($token);
        if ($ok && _check_sid_alive($claims)) {
            return $claims;
        }
    }

    // 2) Silent refresh (rotates cookie, extends idle window)
    list($rOK, $rOut) = AuthJWT::refresh();
    if ($rOK && !empty($rOut['access_token'])) {
        $_SESSION['access_token'] = $rOut['access_token'];
        list($vOK, $claims2) = AuthJWT::verifyAccessToken($rOut['access_token']);
        if ($vOK && _check_sid_alive($claims2)) {
            return $claims2;
        }
    }

    // 3) Not authenticated → render login and exit
    _render_login_and_exit($hostname, $login_renderer_path);
}

/**
 * Require login for an API endpoint.
 * Uses Authorization: Bearer header and the library's guard (which checks sid).
 * Returns claims on success; otherwise sends 401 and exits.
 */
function require_login_api()
{
    // This will read the Bearer token, verify, and enforce sid/session validity.
    $claims = AuthJWT::requireApiAuth(); // will exit 401 on failure
    return $claims;
}
?>