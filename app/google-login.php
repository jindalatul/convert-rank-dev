<?php
// Minimal launcher for Google OAuth (forces account chooser).
if (session_status() === PHP_SESSION_NONE) { session_start(); }

require __DIR__ . '/config.php'; // expects: $HOST_NAME, $GOOGLE_CLIENT_ID, $GOOGLE_REDIRECT_URI
// Optional: if not set in config, provide defaults:
if (!isset($GOOGLE_AUTH_ENDPOINT) || !$GOOGLE_AUTH_ENDPOINT) {
    $GOOGLE_AUTH_ENDPOINT = 'https://accounts.google.com/o/oauth2/v2/auth';
}

// CSRF state
$_SESSION['oauth2_state'] = bin2hex(random_bytes(16));

// Scopes you need
$scope = 'openid email profile';

// IMPORTANT: prompt=select_account shows the Google account chooser
// If you also want to force the consent screen each time, use: 'consent select_account'
$prompt = 'select_account';

// If you ever need a refresh token from Google, add: 'access_type' => 'offline'
$params = array(
    'client_id'             => $GOOGLE_CLIENT_ID,
    'redirect_uri'          => $GOOGLE_REDIRECT_URI,
    'response_type'         => 'code',
    'scope'                 => $scope,
    'state'                 => $_SESSION['oauth2_state'],
    'include_granted_scopes'=> 'true',
    'prompt'                => $prompt,
);

$qs = http_build_query($params, '', '&', PHP_QUERY_RFC3986);
header('Location: ' . $GOOGLE_AUTH_ENDPOINT . '?' . $qs);
exit;
?>