<?php
$host = '127.0.0.1';  // Database host 
$port = '3306';       // Database port
$dbname = 'reachus';  // Your database name
$username = 'root';  // Your database username
$password = '1';  // Your database password 

$conn = mysqli_connect($host, $username, $password, $dbname, $port);

if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}
?>
