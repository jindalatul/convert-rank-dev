<?php
if (session_status() === PHP_SESSION_NONE) { session_start(); }

require __DIR__ . '/config.php';                         // defines $HOST_NAME, GOOGLE_* constants, curl_* helpers
require_once dirname(__DIR__) . '/db/connection.php';    // defines getDbConnection()
require_once dirname(__DIR__) . '/jwt/auth-token.php';   // AuthJWT library (loads DB+secret, issues/refreshes tokens)

/* 1) Validate OAuth state & code (CSRF protection) */
if (!isset($_GET['state'], $_GET['code'])) { http_response_code(400); exit('Missing state or code'); }
if (empty($_SESSION['oauth2_state']) || $_GET['state'] !== $_SESSION['oauth2_state']) {
    http_response_code(400); exit('Invalid state');
}
unset($_SESSION['oauth2_state']); // one-time use

/* 2) Exchange authorization code for Google tokens */
list($raw, $err, $status) = curl_post_form($GOOGLE_TOKEN_ENDPOINT, array(
    'code'          => $_GET['code'],
    'client_id'     => $GOOGLE_CLIENT_ID,
    'client_secret' => $GOOGLE_CLIENT_SECRET,
    'redirect_uri'  => $GOOGLE_REDIRECT_URI,
    'grant_type'    => 'authorization_code',
));
if ($err) { http_response_code(502); exit('Token request error: ' . htmlspecialchars($err)); }

$token = json_decode($raw, true);
if ($status !== 200 || empty($token['access_token'])) {
    http_response_code(502); exit('Bad token response: ' . htmlspecialchars($raw));
}

/* 3) Fetch Google user info */
list($uRaw, $uErr, $uStatus) = curl_get_bearer($GOOGLE_USERINFO_URL, $token['access_token']);
if ($uErr) { http_response_code(502); exit('Userinfo request error: ' . htmlspecialchars($uErr)); }

$user = json_decode($uRaw, true);
if ($uStatus !== 200 || !is_array($user) || empty($user['sub'])) {
    http_response_code(502); exit('Invalid userinfo: ' . htmlspecialchars($uRaw));
}

/* Raw values (go into JWT) */
$subRaw   = $user['sub'];
$nameRaw  = isset($user['name'])    ? $user['name']    : '';
$emailRaw = isset($user['email'])   ? $user['email']   : '';
$picRaw   = isset($user['picture']) ? $user['picture'] : '';

/* 4) Upsert user in DB (simple, old-style) */
$conn = getDbConnection();
if (!$conn) { http_response_code(500); exit('Database connection failed'); }

// Escape for SQL
$sub   = $conn->real_escape_string($subRaw);
$name  = $conn->real_escape_string($nameRaw);
$email = $conn->real_escape_string($emailRaw);
$pic   = $conn->real_escape_string($picRaw);

// Find existing user by google_sub or email
$sql = "SELECT id, status, membership_tier
        FROM users
        WHERE google_sub = '$sub' OR email = '$email'
        LIMIT 1";
$res = $conn->query($sql);

if ($res && $res->num_rows > 0) {
    $row     = $res->fetch_assoc();
    $user_id = (int)$row['id'];
    $status  = $row['status'];
    $tier    = $row['membership_tier'];

    // Update profile fields (optional)
    $conn->query("UPDATE users
                  SET google_sub='$sub', name='$name', email='$email', picture='$pic'
                  WHERE id=$user_id");
} else {
    $status = 'enabled';
    $tier   = 'free';
    $ins = "INSERT INTO users (google_sub, name, email, picture, status, membership_tier)
            VALUES ('$sub', '$name', '$email', '$pic', '$status', '$tier')";
    if ($conn->query($ins)) {
        $user_id = (int)$conn->insert_id;
    } else {
        error_log('DB insert error: ' . $conn->error);
        http_response_code(500); exit('Database insert error');
    }
}

/* 5) Block disabled users */
if ($status !== 'enabled') {
    session_destroy();
    exit('Your account is disabled. Please contact support.');
}

/* 6) Issue JWT access (30m) + set refresh cookie (6h idle). Include name in JWT, bind sid. */
list($okIssue, $out) = AuthJWT::loginStart($user_id, $emailRaw, $tier, null, $nameRaw);
if (!$okIssue) {
    error_log('AuthJWT loginStart failed: ' . print_r($out, true));
    // continue; index.php will print login if not authenticated
}

/* No user data stored in $_SESSION — minimal/stateless. */
session_write_close();

/* 7) Redirect to app home */
header('Location: ' . $HOST_NAME . '/index.php');
exit;
?>