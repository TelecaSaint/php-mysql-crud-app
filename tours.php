<?php
include 'includes/header.php';
include 'includes/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_tour'])) {
    $name = $_POST['name'];
    $duration = $_POST['duration'];
    $fee = $_POST['fee'];

    $stmt = $conn->prepare("INSERT INTO tour (name, duration, fee) VALUES (?, ?, ?)");
    $stmt->bind_param("sid", $name, $duration, $fee);
    $stmt->execute();
    $stmt->close();
}
?>

<h2>Tours</h2>
<form method="post" class="mb-4">
    <div class="mb-3">
        <label>Tour Name</label>
        <input type="text" name="name" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Duration (hours)</label>
        <input type="number" name="duration" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Fee</label>
        <input type="number" step="0.01" name="fee" class="form-control" required>
    </div>
    <button type="submit" name="add_tour" class="btn btn-success">Add Tour</button>
</form>

<h3>Tour List</h3>
<table class="table table-bordered">
    <tr><th>ID</th><th>Name</th><th>Duration</th><th>Fee</th></tr>
    <?php
    $result = $conn->query("SELECT * FROM tour");
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['tour_id']}</td>
                <td>{$row['name']}</td>
                <td>{$row['duration']}</td>
                <td>{$row['fee']}</td>
              </tr>";
    }
    ?>
</table>

<?php include 'includes/footer.php'; ?>
