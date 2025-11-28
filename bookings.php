<?php
include 'includes/header.php';
include 'includes/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['book_client'])) {
    $client_id = $_POST['client_id'];
    $tour_id = $_POST['tour_id'];

    $stmt = $conn->prepare("INSERT INTO booking (client_id, tour_id) VALUES (?, ?)");
    $stmt->bind_param("ii", $client_id, $tour_id);
    $stmt->execute();
    $stmt->close();
}
?>

<h2>Book Client onto Tour</h2>
<form method="post" class="mb-4">
    <div class="mb-3">
        <label>Client</label>
        <select name="client_id" class="form-select" required>
            <option value="">Select Client</option>
            <?php
            $clients = $conn->query("SELECT * FROM client");
            while ($c = $clients->fetch_assoc()) {
                echo "<option value='{$c['client_id']}'>{$c['name']}</option>";
            }
            ?>
        </select>
    </div>
    <div class="mb-3">
        <label>Tour</label>
        <select name="tour_id" class="form-select" required>
            <option value="">Select Tour</option>
            <?php
            $tours = $conn->query("SELECT * FROM tour");
            while ($t = $tours->fetch_assoc()) {
                echo "<option value='{$t['tour_id']}'>{$t['name']}</option>";
            }
            ?>
        </select>
    </div>
    <button type="submit" name="book_client" class="btn btn-success">Book Client</button>
</form>

<h3>All Bookings</h3>
<table class="table table-bordered">
    <tr><th>Client</th><th>Tour</th></tr>
    <?php
    $result = $conn->query("SELECT client.name as cname, tour.name as tname 
                            FROM booking 
                            JOIN client ON booking.client_id = client.client_id
                            JOIN tour ON booking.tour_id = tour.tour_id");
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['cname']}</td>
                <td>{$row['tname']}</td>
              </tr>";
    }
    ?>
</table>

<?php include 'includes/footer.php'; ?>
