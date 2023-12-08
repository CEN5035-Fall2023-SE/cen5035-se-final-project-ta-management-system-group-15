<?php
// Establish a database connection (replace with your credentials)
$host = "localhost";
$username = "root";
$password = "";
$database = "jhanavi";

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


?>
