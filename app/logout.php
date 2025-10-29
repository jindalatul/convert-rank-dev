<?php
require dirname(__DIR__) . '/app/config.php';
require dirname(__DIR__) . '/jwt/auth-token.php';  

// Revoke current refresh session (your app)
AuthJWT::logout();

// (Optional) Revoke Google token (only works if you saved one in session)
if (session_status() === PHP_SESSION_NONE) { session_start(); }
$tok = isset($_SESSION['google_access_token']) ? $_SESSION['google_access_token'] : null;
if ($tok) {
    // Best-effort revoke; ignore errors
    $ch = curl_init('https://oauth2.googleapis.com/revoke?token=' . urlencode($tok));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_exec($ch);
    curl_close($ch);
}

// Clear any leftover Google token session keys (if you stored them)
unset($_SESSION['google_access_token'], $_SESSION['google_refresh_token'], $_SESSION['google_id_token'], $_SESSION['google_token_expires']);

// Optionally end PHP session
if (session_status() === PHP_SESSION_ACTIVE) { session_destroy(); }

header('Location: ' . $HOST_NAME . '/index.php');
exit;
?>