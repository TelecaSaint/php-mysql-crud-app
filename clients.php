<?php
include 'includes/header.php';
include 'includes/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_client'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $age = $_POST['age'];

    $stmt = $conn->prepare("INSERT INTO client (name, email, age) VALUES (?, ?, ?)");
    $stmt->bind_param("ssi", $name, $email, $age);
    $stmt->execute();
    $stmt->close();
}
?>

<h2>Clients</h2>
<form method="post" class="mb-4">
    <div class="mb-3">
        <label>Name</label>
        <input type="text" name="name" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Age</label>
        <input type="number" name="age" class="form-control" required>
    </div>
    <button type="submit" name="add_client" class="btn btn-success">Add Client</button>
</form>

<h3>Client List</h3>
<table class="table table-bordered">
    <tr><th>ID</th><th>Name</th><th>Email</th><th>Age</th></tr>
    <?php
    $result = $conn->query("SELECT * FROM client");
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['client_id']}</td>
                <td>{$row['name']}</td>
                <td>{$row['email']}</td>
                <td>{$row['age']}</td>
              </tr>";
    }
    ?>
</table>

<?php include 'includes/footer.php'; ?>
