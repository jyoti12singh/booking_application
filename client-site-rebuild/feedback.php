<?php
include 'db.php';
include 'includes/header.php';

// Form submit handling
$successMsg = $errorMsg = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name']);
    $message = trim($_POST['message']);
    $rating = intval($_POST['rating']);
    $image = "";

    // Image upload handling
    if (!empty($_FILES['image']['name'])) {
        $targetDir = "admin/uploads/";
        $fileName = time() . "_" . basename($_FILES['image']['name']);
        $targetFilePath = $targetDir . $fileName;

        $fileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));
        $allowedTypes = ['jpg', 'jpeg', 'png', 'gif'];

        if (in_array($fileType, $allowedTypes)) {
            if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFilePath)) {
                $image = $fileName;
            } else {
                $errorMsg = "Image upload failed.";
            }
        } else {
            $errorMsg = "Only JPG, JPEG, PNG, and GIF files are allowed.";
        }
    }

    if (empty($errorMsg)) {
        $stmt = $conn->prepare("INSERT INTO testimonials (name, message, image, rating) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("sssi", $name, $message, $image, $rating);
        if ($stmt->execute()) {
            $successMsg = "Thank you for your feedback!";
        } else {
            $errorMsg = "Something went wrong. Please try again.";
        }
    }
}

// Fetch top 10 testimonials based on rating
$testimonials = mysqli_query($conn, "SELECT * FROM testimonials ORDER BY rating DESC, id DESC LIMIT 10");
?>

<section class="feedback-section">
    <div class="container">
        <h2>Share Your Feedback</h2>

        <?php if (!empty($successMsg)): ?>
            <div class="alert success"><?= htmlspecialchars($successMsg) ?></div>
        <?php elseif (!empty($errorMsg)): ?>
            <div class="alert error"><?= htmlspecialchars($errorMsg) ?></div>
        <?php endif; ?>

        <form action="" method="post" enctype="multipart/form-data" class="feedback-form">
            <div class="form-group">
                <label>Your Name*</label>
                <input type="text" name="name" required placeholder="Enter your name">
            </div>
            <div class="form-group">
                <label>Your Feedback*</label>
                <textarea name="message" rows="4" required placeholder="Write your feedback"></textarea>
            </div>
            <div class="form-group">
                <label>Your Rating*</label>
                <select name="rating" required>
                    <option value="">Select Rating</option>
                    <option value="5">⭐⭐⭐⭐⭐ - Excellent</option>
                    <option value="4">⭐⭐⭐⭐ - Good</option>
                    <option value="3">⭐⭐⭐ - Average</option>
                    <option value="2">⭐⭐ - Poor</option>
                    <option value="1">⭐ - Very Bad</option>
                </select>
            </div>
            <div class="form-group">
                <label>Upload Your Photo (optional)</label>
                <input type="file" name="image" accept="image/*">
            </div>
            <button type="submit" class="btn-submit">Submit Feedback</button>
        </form>

        <h2 class="mt-50">Top 10 Customer Feedback</h2>
        <div class="testimonial-grid">
            <?php if (mysqli_num_rows($testimonials) > 0): ?>
                <?php while ($test = mysqli_fetch_assoc($testimonials)): ?>
                    <div class="testimonial-card">
                        <?php if (!empty($test['image'])): ?>
                            <img src="admin/uploads/<?= htmlspecialchars($test['image']) ?>" alt="<?= htmlspecialchars($test['name']) ?>">
                        <?php else: ?>
                            <img src="images/default-user.png" alt="<?= htmlspecialchars($test['name']) ?>">
                        <?php endif; ?>
                        <p>"<?= htmlspecialchars($test['message']) ?>"</p>
                        <h4>- <?= htmlspecialchars($test['name']) ?></h4>
                        <div class="rating">
                            <?= str_repeat("⭐", intval($test['rating'])) ?>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <p style="text-align:center;">No testimonials yet. Be the first to share your feedback!</p>
            <?php endif; ?>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
