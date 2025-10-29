<?php
$jwt_path = dirname(dirname(__FILE__)); 

require $jwt_path . '/jwt/auth-token.php';

$claims = AuthJWT::requireApiAuth();

header('Content-Type: application/json');
echo json_encode(array(
  'ok'      => true,
  'user_id' => (int)$claims['sub'],
  'email'   => $claims['email'],
  'name'    => isset($claims['name']) ? $claims['name'] : null,
  'tier'    => isset($claims['tier']) ? $claims['tier'] : 'free',
  'sid'     => isset($claims['sid']) ? (int)$claims['sid'] : null,
  'exp'     => isset($claims['exp']) ? (int)$claims['exp'] : null
));
?>