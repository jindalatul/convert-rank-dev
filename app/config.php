<?php
// app/config.php — quiet + safe (no output)

// --- Session setup (only if not already active) ---
if (session_status() !== PHP_SESSION_ACTIVE) {
    // Set secure flags BEFORE session_start()
    // Use '1' for cookie_secure on HTTPS in production
    ini_set('session.cookie_httponly', '1');
    ini_set('session.cookie_secure', '0'); // change to '1' on HTTPS
    ini_set('session.use_strict_mode', '1');

    // SameSite and other params (PHP 7.3+ supports this array form)
    session_set_cookie_params(array(
        'path'     => '/',
        'secure'   => false,   // true on HTTPS
        'httponly' => true,
        'samesite' => 'Lax',
    ));

    // Optional: custom name to avoid collisions
    if (!headers_sent()) {
        session_name('CRSESSID');
    }

    session_start();
}

// --- Load Google OAuth env ---
$envPath = dirname(__DIR__) . '/env/google-login-env.php';
if (!file_exists($envPath)) {
    error_log('[config.php] env file missing: ' . $envPath);
    // Do NOT echo anything; keep it quiet to avoid "headers already sent"
    // You can exit if you prefer a hard stop:
    // exit;
    $env = array(
        'GOOGLE_CLIENT_ID'     => '',
        'GOOGLE_CLIENT_SECRET' => '',
        'GOOGLE_REDIRECT_URI'  => '',
        'HOST_NAME'            => '',
    );
} else {
    $env = require $envPath;
}

// --- Public settings from env ---
$GOOGLE_CLIENT_ID     = isset($env['GOOGLE_CLIENT_ID'])     ? $env['GOOGLE_CLIENT_ID']     : '';
$GOOGLE_CLIENT_SECRET = isset($env['GOOGLE_CLIENT_SECRET']) ? $env['GOOGLE_CLIENT_SECRET'] : '';
$GOOGLE_REDIRECT_URI  = isset($env['GOOGLE_REDIRECT_URI'])  ? $env['GOOGLE_REDIRECT_URI']  : '';
$HOST_NAME            = isset($env['HOST_NAME'])            ? $env['HOST_NAME']            : '';

// --- OAuth endpoints/scopes ---
$GOOGLE_AUTH_SCOPES    = array('openid','email','profile');
$GOOGLE_AUTH_ENDPOINT  = 'https://accounts.google.com/o/oauth2/v2/auth';
$GOOGLE_TOKEN_ENDPOINT = 'https://oauth2.googleapis.com/token';
$GOOGLE_USERINFO_URL   = 'https://openidconnect.googleapis.com/v1/userinfo';

// --- Helpers (old-style, no type hints) ---
function secure_random($len = 32) {
    return rtrim(strtr(base64_encode(random_bytes($len)), '+/', '-_'), '=');
}
function http_build_query_utf8($p) {
    return http_build_query($p, '', '&', PHP_QUERY_RFC3986);
}
function curl_post_form($url, $fields) {
    $ch = curl_init($url);
    curl_setopt_array($ch, array(
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST           => true,
        CURLOPT_POSTFIELDS     => http_build_query_utf8($fields),
        CURLOPT_HTTPHEADER     => array('Content-Type: application/x-www-form-urlencoded'),
        CURLOPT_TIMEOUT        => 20,
    ));
    $resp = curl_exec($ch);
    $err  = curl_error($ch);
    $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    return array($resp, $err, $code);
}
function curl_get_bearer($url, $token) {
    $ch = curl_init($url);
    curl_setopt_array($ch, array(
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HTTPHEADER     => array('Authorization: Bearer '.$token),
        CURLOPT_TIMEOUT        => 20,
    ));
    $resp = curl_exec($ch);
    $err  = curl_error($ch);
    $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    return array($resp, $err, $code);
}