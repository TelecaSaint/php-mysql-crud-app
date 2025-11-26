<?php
// Get database credentials from Render environment variables
$host = getenv('DB_HOST');    // e.g., mysql-34b1fc3e-queenb70-0513.i.aivencloud.com
$db   = getenv('DB_NAME');    // e.g., defaultdb
$user = getenv('DB_USER');    // e.g., avnadmin
$pass = getenv('DB_PASS');    // your password
$port = getenv('DB_PORT');    // e.g., 15515

$ssl_ca = __DIR__ . '/sql/ca.pem';

// Initialize MySQLi and set SSL
$conn = mysqli_init();
mysqli_ssl_set($conn, NULL, NULL, $ssl_ca, NULL, NULL);
mysqli_real_connect($conn, $host, $user, $pass, $db, $port, NULL, MYSQLI_CLIENT_SSL);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
