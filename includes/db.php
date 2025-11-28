<?php
$host = "localhost";
$user = "root";
$password = "";
$dbname = "spice_isle_tours";

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
