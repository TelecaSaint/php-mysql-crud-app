<?php
// Include database configuration and connection
include 'config.php';

// Get the user ID from the URL parameter
$id = $_GET['id'];

// Execute the DELETE query to remove the user from the database
$conn->query("DELETE FROM users WHERE id=$id");

// Redirect back to the main user list after deletion
header("Location: index.php");
exit; // stop further execution
?>
