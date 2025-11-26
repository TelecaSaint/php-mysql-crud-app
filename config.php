<?php
$host = getenv('DB_HOST');
$db   = getenv('DB_NAME');
$user = getenv('DB_USER');
$pass = getenv('DB_PASS');
$port = getenv('DB_PORT');

$ssl_ca = __DIR__ . '/sql/ca.pem';

$conn = mysqli_init();
mysqli_ssl_set($conn, NULL, NULL, $ssl_ca, NULL, NULL);
mysqli_real_connect($conn, $host, $user, $pass, $db, $port, NULL, MYSQLI_CLIENT_SSL);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
