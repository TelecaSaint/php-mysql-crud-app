<?php
include 'config.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>User List</title>
</head>
<body>

<h2>User List</h2>
<a href="create.php">Add User</a>
<table border="1" cellpadding="5" cellspacing="0">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Actions</th>
    </tr>

<?php
$sql = "SELECT id, name, email FROM users"; // Only select the needed columns
$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $id = $row['id'];
        $name = $row['name'];
        $email = $row['email'];

        echo "<tr>
                <td>$id</td>
                <td>$name</td>
                <td>$email</td>
                <td>
                    <a href='update.php?id=$id'>Edit</a> | 
                    <a href='delete.php?id=$id'>Delete</a>
                </td>
              </tr>";
    }
} else {
    echo "<tr><td colspan='4'>No users found</td></tr>";
}
?>

</table>

</body>
</html>
