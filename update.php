<?php
include 'config.php';

$id = $_GET['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("UPDATE users SET username=?, email=?, password=? WHERE id=?");
    $stmt->bind_param("sssi", $username, $email, $password, $id);

    if ($stmt->execute()) {
        echo "<h3 style='color: green;'>✅ User updated successfully!</h3>";
        echo "<a href='index.php'>Back to List</a>";
    } else {
        echo "<h3 style='color: red;'>❌ Error updating user: " . $stmt->error . "</h3>";
        echo "<a href='index.php'>Back to List</a>";
    }

    $stmt->close();
    exit;
}

$result = $conn->query("SELECT * FROM users WHERE id=$id");
$user = $result->fetch_assoc();
?>

<h1>Edit User</h1>
<form method="post">
    Username: <input type="text" name="username" value="<?= htmlspecialchars($user['username']) ?>" required><br><br>
    Email: <input type="email" name="email" value="<?= htmlspecialchars($user['email']) ?>" required><br><br>
    Password: <input type="text" name="password" value="<?= htmlspecialchars($user['password']) ?>" required><br><br>
    <button type="submit">Update</button>
</form>
<a href="index.php">Back to List</a>
