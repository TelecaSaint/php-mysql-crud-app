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
// Use 'admin' column from your table and alias it as 'name'
// Use 'admin' column from your table and alias it as 'name'
$sql = "SELECT id, admin AS name, email FROM users";
$result = $conn->query($sql);


if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $id = $row['id'];
        $name = $row['name'];  // maps to 'admin' column
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

