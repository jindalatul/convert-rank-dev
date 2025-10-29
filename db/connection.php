<?php
function getDbConnection($credentials) 
{
    static $conn = null;
    if ($conn) return $conn;

    //var_dump($credentials); die();

    // Extract vars safely
    $host     = $credentials['HOST'] ?? 'localhost';
    $dbname   = $credentials['DATABASE'] ?? '';
    $username = $credentials['USERNAME'] ?? '';
    $password = $credentials['PASSWORD'] ?? '';

    // Create MySQLi connection
    $conn = new mysqli($host, $username, $password, $dbname);

    if ($conn->connect_error) {
        error_log('Database connection error: ' . $conn->connect_error);
        return null;
    }

    $conn->set_charset('utf8mb4');
    return $conn;
}

// For testing connection

//$conn = getDbConnection();
//var_dump($conn);
?>