<?php 
require_once(dirname(__DIR__). '/app/config.php');
require_once(dirname(__DIR__).'/jwt/auth-token.php');
require_once(dirname(__DIR__).'/jwt/auth_helper.php');

$loginRenderer = dirname(__DIR__) . '/app/login-html-page.php';

if (session_status() === PHP_SESSION_NONE) session_start();

$payload = require_login_page($HOST_NAME, $loginRenderer);

$name  = $payload['name']; // if you want, include 'name' in token later
$email = $payload['email'];
$tier  = isset($payload['tier']) ? $payload['tier'] : 'free';
$userId = $payload['sub'];
?>
<!doctype html>
<html>
<head><meta charset="utf-8"><title>My Account</title></head>
<body>
  <h1>Welcome, <?= htmlspecialchars($name) ?></h1>
  <ul>
    <li>User ID: <?= htmlspecialchars($userId) ?></li>
    <li>Email: <?= htmlspecialchars($email) ?></li>
    <li>Tier: <strong><?= htmlspecialchars($tier) ?></strong></li>
  </ul>
  <a href="<?php echo $HOST_NAME;?>/logout.php">Sign out</a>
</body>
</html>