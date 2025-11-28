<?php
// Include the database configuration file to connect to MySQL
include 'config.php';

// Get the user ID from the URL parameter
$id = $_GET['id'];

// Check if the form has been submitted via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form values for username, email, and password
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Prepare an SQL statement to update the user's information
    $stmt = $conn->prepare("UPDATE users SET username=?, email=?, password=? WHERE id=?");
    $stmt->bind_param("sssi", $username, $email, $password, $id); // Bind parameters

    // Execute the statement and check if it was successful
    if ($stmt->execute()) {
        // Show a success message and a link back to the user list
        echo "<h3 style='color: green;'>✅ User updated successfully!</h3>";
        echo "<a href='index.php'>Back to List</a>";
    } else {
        // Show an error message if the update failed
        echo "<h3 style='color: red;'>❌ Error updating user: " . $stmt->error . "</h3>";
        echo "<a href='index.php'>Back to List</a>";
    }

    // Close the prepared statement
    $stmt->close();
    exit; // Stop executing further to prevent reloading the form
}

// Fetch the user's current information from the database to pre-fill the form
$result = $conn->query("SELECT * FROM users WHERE id=$id");
$user = $result->fetch_assoc(); // Fetch user as an associative array
?>

<h1>Edit User</h1>
<!-- Form to edit user details -->
<form method="post">
    Username: <input type="text" name="username" value="<?= htmlspecialchars($user['username']) ?>" required><br><br>
    Email: <input type="email" name="email" value="<?= htmlspecialchars($user['email']) ?>" required><br><br>
    Password: <input type="text" name="password" value="<?= htmlspecialchars($user['password']) ?>" required><br><br>
    <button type="submit">Update</button>
</form>

<!-- Link to go back to the main user list -->
<a href="index.php">Back to List</a>
