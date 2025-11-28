<?php
// Include database configuration and connection
include 'config.php';

// Check if the form was submitted via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the submitted form data
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Prepare the SQL INSERT statement to add a new user
    $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $email, $password); // Bind parameters to prevent SQL injection
    
    // Execute the statement and check for success
    if ($stmt->execute()) {
        // Redirect to the user list after successful insertion
        header("Location: index.php");
        exit; // Stop further script execution
    } else {
        // Display an error message if the query fails
        echo "Error: " . $stmt->error;
    }

    // Close the prepared statement
    $stmt->close();
}
?>

<!-- HTML form to add a new user -->
<h1>Add User</h1>
<form method="post">
    Username: <input type="text" name="username" required><br><br>
    Email: <input type="email" name="email" required><br><br>
    Password: <input type="text" name="password" required><br><br>
    <button type="submit">Add</button>
</form>

<!-- Link back to the user list -->
<a href="index.php">Back to List</a>
