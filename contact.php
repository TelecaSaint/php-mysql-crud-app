<?php
include 'includes/header.php';
include 'includes/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['send_message'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $stmt = $conn->prepare("INSERT INTO contact (name, email, message) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $message);
    $stmt->execute();
    $stmt->close();
    echo "<div class='alert alert-success'>Message sent successfully!</div>";
}
?>

<h2>Contact Us</h2>
<p>We’d love to hear from you! Use the form below to get in touch.</p>

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
        <label>Message</label>
        <textarea name="message" class="form-control" rows="4" required></textarea>
    </div>
    <button type="submit" name="send_message" class="btn btn-primary">Send Message</button>
</form>

<?php include 'includes/footer.php'; ?>
