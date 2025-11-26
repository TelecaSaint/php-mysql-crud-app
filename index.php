<?php
include 'config.php';

$result = $conn->query("SELECT * FROM users");
?>
<h1>User List</h1>
<a href="create.php">Add User</a>
<table border="1" cellpadding="10" cellspacing="0">
<tr><th>ID</th><th>Name</th><th>Email</th><th>Actions</th></tr>
<?php while($row = $result->fetch_assoc()): ?>
<tr>
    <td><?= $row['id'] ?></td>
    <td><?= $row['name'] ?></td>
    <td><?= $row['email'] ?></td>
    <td>
        <a href="update.php?id=<?= $row['id'] ?>">Edit</a> |
        <a href="delete.php?id=<?= $row['id'] ?>">Delete</a>
    </td>
</tr>
<?php endwhile; ?>
</table>
