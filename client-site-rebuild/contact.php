<?php
// Database connection
include 'db.php';

// Contact info DB se fetch karna
$query = "SELECT * FROM contact_info LIMIT 1";
$result = mysqli_query($conn, $query);
$contact = mysqli_fetch_assoc($result);

$popupMessage = '';
$popupType = ''; // success or error

// Agar form submit hua to handle karein
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $message = trim($_POST['message']);

    if (!empty($name) && !empty($email) && !empty($message)) {
        $stmt = $conn->prepare("INSERT INTO messages (name, email, message) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $name, $email, $message);
        if ($stmt->execute()) {
            $popupMessage = "Your message has been sent successfully!";
            $popupType = "success";
        } else {
            $popupMessage = "Something went wrong. Please try again.";
            $popupType = "error";
        }
    } else {
        $popupMessage = "All fields are required.";
        $popupType = "error";
    }
}
?>

<?php include 'includes/header.php'; ?>

<!-- SweetAlert2 CDN -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php if (!empty($popupMessage)): ?>
<script>
document.addEventListener("DOMContentLoaded", function() {
    Swal.fire({
        icon: '<?php echo $popupType; ?>',
        title: '<?php echo ($popupType == "success") ? "Success" : "Oops..."; ?>',
        text: '<?php echo $popupMessage; ?>',
        confirmButtonColor: '#3085d6',
        confirmButtonText: 'OK'
    });
});
</script>
<?php endif; ?>

<div class="contact-container">
    <div class="contact-header">
        <h1>Contact <?php echo htmlspecialchars($contact['company_name']); ?></h1>
        <p>We’re here to help with your bookings and queries.</p>
    </div>

    <div class="contact-content">
        <div class="contact-info">
            <h3>Reach Us At</h3>
            <p><strong>Phone:</strong> <?php echo htmlspecialchars($contact['phone']); ?></p>
            <p><strong>Email:</strong> <?php echo htmlspecialchars($contact['email']); ?></p>
            <p><strong>Address:</strong><br><?php echo nl2br(htmlspecialchars($contact['address'])); ?></p>
            <p><strong>Working Hours:</strong><br><?php echo htmlspecialchars($contact['working_hours']); ?></p>
        </div>

        <div class="contact-form">
            <h3>Send Us a Message</h3>
            <form method="POST" action="">
                <label>Your Name</label>
                <input type="text" name="name" required>

                <label>Your Email</label>
                <input type="email" name="email" required>

                <label>Your Message</label>
                <textarea name="message" rows="5" required></textarea>

                <button type="submit">Send Message</button>
            </form>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
