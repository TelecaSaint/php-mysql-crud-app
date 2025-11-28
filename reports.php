<?php
include 'includes/header.php';
include 'includes/db.php';
?>

<h2>Reports</h2>

<!-- Sort Tours by Fee -->
<h4 class="mt-4">Tours Sorted by Fee</h4>
<table class="table table-bordered">
    <tr><th>ID</th><th>Name</th><th>Duration (hrs)</th><th>Fee ($)</th></tr>
    <?php
    $result = $conn->query("SELECT * FROM tour ORDER BY fee ASC");
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

<!-- Most Booked Tours -->
<h4 class="mt-5">Most Booked Tours</h4>
<table class="table table-bordered">
    <tr><th>Tour Name</th><th>Total Bookings</th></tr>
    <?php
    $result = $conn->query("SELECT t.name, COUNT(b.booking_id) as total_bookings
                            FROM tour t
                            LEFT JOIN booking b ON t.tour_id = b.tour_id
                            GROUP BY t.name
                            ORDER BY total_bookings DESC");
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['name']}</td>
                <td>{$row['total_bookings']}</td>
              </tr>";
    }
    ?>
</table>

<?php include 'includes/footer.php'; ?>
