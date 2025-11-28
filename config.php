<?php
// Get database credentials from environment variables (Render provides these securely)
$host = getenv('DB_HOST');   // Database host
$db   = getenv('DB_NAME');   // Database name
$user = getenv('DB_USER');   // Database username
$pass = getenv('DB_PASS');   // Database password
$port = getenv('DB_PORT');   // Database port

// Path to the SSL certificate required by Render for secure MySQL connections
$ssl_ca = __DIR__ . '/sql/ca.pem'; // Make sure ca.pem is in the sql/ folder

// Initialize a new MySQLi object
$conn = mysqli_init();

// Enable SSL for secure connection
mysqli_ssl_set($conn, NULL, NULL, $ssl_ca, NULL, NULL);

// Connect to the MySQL database using SSL
mysqli_real_connect($conn, $host, $user, $pass, $db, $port, NULL, MYSQLI_CLIENT_SSL);

// Check if the connection was successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error); // Stop execution and show error if connection fails
}
?>
