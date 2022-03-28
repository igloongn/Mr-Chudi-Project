<?php 
    $username = 'root';
    $password = '';
    $host = 'localhost';
    $db_name = 'factor';
    $conn = mysqli_connect($host, $username, $password, $db_name);
    if (!$conn) {
        die('There is an error somewhere');
    }

?>