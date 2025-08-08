<?php
include 'db.php';
include 'includes/header.php';

// Variables
$popup = false;
$errorMsg = "";

// Form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name  = trim($_POST['name']);
    $email = trim($_POST['email']);

    // Validation
    if (empty($name) || !preg_match("/^[a-zA-Z ]+$/", $name)) {
        $errorMsg = "Please enter a valid name.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errorMsg = "Please enter a valid email address.";
    } else {
        // Check duplicate
        $check = $conn->prepare("SELECT id FROM newsletter_subscribers WHERE email = ?");
        $check->bind_param("s", $email);
        $check->execute();
        $check->store_result();

        if ($check->num_rows > 0) {
            $errorMsg = "You are already subscribed!";
        } else {
            // Insert new subscriber
            $stmt = $conn->prepare("INSERT INTO newsletter_subscribers (name, email) VALUES (?, ?)");
            $stmt->bind_param("ss", $name, $email);
            if ($stmt->execute()) {
                $popup = true;
            } else {
                $errorMsg = "Something went wrong. Please try again.";
            }
        }
    }
}
?>

<!-- Hero Section -->
<section class="newsletter-hero">
  
        <h2>Subscribe to Our Newsletter</h2>
        <p>Stay updated with latest Tirupati tour packages, deals, and travel tips!</p>

</section>

<!-- Newsletter Form Section -->
<section class="newsletter-section">
  
        <div class="newsletter-box">
            <?php if (!empty($errorMsg)): ?>
                <div class="alert error"><?= htmlspecialchars($errorMsg) ?></div>
            <?php endif; ?>

            <form action="" method="post" class="newsletter-form">
                <div class="form-group">
                    <label>Your Name:</label>
                    <input type="text" name="name" placeholder="Enter your name" required>
                </div>
                <div class="form-group">
                    <label>Your Email:</label>
                    <input type="email" name="email" placeholder="Enter your email" required>
                </div>
                <button type="submit" class="btn-subscribe">Subscribe Now</button>
            </form>
        </div>
   
</section>

<!-- Popup -->
<?php if ($popup): ?>
<div id="popup-overlay">
    <div class="popup-box">
        <h2>Thank You for Subscribing!</h2>
        <p>You have successfully subscribed to our newsletter.</p>
        <p>We’ll keep you updated with latest travel offers and news.</p>
        <a href="index.php" class="btn-home">Back to Home</a>
    </div>
</div>
<script>
    document.getElementById('popup-overlay').style.display = 'flex';
</script>
<?php endif; ?>

<?php include 'includes/footer.php'; ?>
