<?php 
ini_set("display_errors","On");
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

$accessToken = $_SESSION["access_token"] ?? "";
?>
<?php
$base = '/convert-rank/app';
$manifestPath = __DIR__ . '/asset-manifest.json';
$mainJs = $base . '/static/js/main.js';
$mainCss = $base . '/static/css/main.css';

if (file_exists($manifestPath)) {
    $manifest = json_decode(file_get_contents($manifestPath), true);

    // CRA v4/v5 usually has these keys:
    if (!empty($manifest['files']['main.js']))  $mainJs  = $manifest['files']['main.js'];
    if (!empty($manifest['files']['main.css'])) $mainCss = $manifest['files']['main.css'];
}
?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <link rel="icon" href="<?=$base?>/favicon.ico">
  <link rel="manifest" href="<?=$base?>/manifest.json">
  <link rel="stylesheet" href="<?=htmlspecialchars($mainCss)?>">
  <script defer src="<?=htmlspecialchars($mainJs)?>"></script>
  <title>ConvertRank</title>
  <script>
    window.ACCESS_TOKEN = "<?= htmlspecialchars($accessToken, ENT_QUOTES) ?>";
  </script>
</head>
<body>
  <div id="root"></div>
</body>
</html>