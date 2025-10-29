<?php 
require_once __DIR__ . '/common/config.php';
require_once dirname(__DIR__) . '/db/connection.php';

$envPath = get_env_path() . '/env.php'; //echo "envPath",$envPath ; 

if (!file_exists($envPath)) { die('Env file missing'); }
$credentials = require $envPath;

//var_dump($credentials["DB"]);  die("-----GET PROJECTS--------");

//$jwt_path = dirname(dirname(__FILE__)); 
//require_once $jwt_path . '/jwt/auth-token.php';

//$claims = AuthJWT::requireApiAuth();

/*
echo json_encode(array(
  'ok'      => true,
  'user_id' => (int)$claims['sub'],
  'email'   => $claims['email'],
  'name'    => isset($claims['name']) ? $claims['name'] : null,
  'tier'    => isset($claims['tier']) ? $claims['tier'] : 'free',
  'sid'     => isset($claims['sid']) ? (int)$claims['sid'] : null,
  'exp'     => isset($claims['exp']) ? (int)$claims['exp'] : null
));
//die();
*/

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    sendError('Method not allowed', 405);
}

$userId = 1;    //(int)$claims['sub']?;

// Get database connection
$conn = getDbConnection($credentials["DB"]);

if (!$conn) {
    die(json_encode(['error' => 'Database connection failed']));
}

$sql = "SELECT project_id, project_name, seed_keywords, project_status, created_at 
        FROM projects 
        WHERE user_id = '$userId' 
        ORDER BY created_at DESC";

$result = mysqli_query($conn, $sql);

if (!$result) {
    die(json_encode(['error' => 'Query failed: ' . mysqli_error($conn)]));
}

$projects = [];

while ($row = mysqli_fetch_assoc($result)) {
    $seed_keywords = json_decode($row['seed_keywords'], true);
    
    $projects[] = [
        'id' => $row['project_id'],
        'name' => $row['project_name'],
        'seedTopic' => $seed_keywords,
        'hubs' => 0,
        'spokes' => 0,
        'keywords' => 0,
        'status' => $row['project_status'],
        'created_at' => date('Y-m-d', strtotime($row['created_at']))
    ];
}

mysqli_close($conn);
sendJSON(['projects' => $projects],200);
?>