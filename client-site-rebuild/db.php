<?php
$host = "localhost";
$port = "3307";
$user = "root";
$password = "";
$database = "sri_balaji_travels";

$conn = new mysqli($host, $user, $password, $database, $port);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
