<?php
function generate_public_id($length = 26) 
{
    $chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    
    // include microtime in base36 to add time component
    $timePart = base_convert((int)(microtime(true) * 1000000), 10, 36);
    
    // random part
    $randPart = '';
    for ($i = 0; $i < $length - strlen($timePart); $i++) {
        $randPart .= $chars[random_int(0, strlen($chars) - 1)];
    }
    
    return strtolower(substr($timePart . $randPart, 0, $length));
}

function get_unique_public_id($conn) 
{
    do {
        $id = generate_public_id();
        $check = mysqli_query($conn, "SELECT 1 FROM projects WHERE public_id='$id' LIMIT 1");
    } while (mysqli_num_rows($check) > 0);
    return $id;
}
?>