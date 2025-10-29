<?php
$jwt_path = dirname(dirname(dirname(__FILE__))); 

require_once( $jwt_path . '/jwt/auth-token.php');

list($ok, $out) = AuthJWT::refresh();
if (!$ok) {
    http_response_code(401);
    header('Content-Type: application/json');
    echo json_encode(array('error' => 'Unauthorized'));
    exit;
}

header('Content-Type: application/json');
echo json_encode($out);  // { "access_token": "..." }
?>