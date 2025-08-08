<?php
include 'db.php';
include 'includes/header.php';

// Fetch blogs from database
$query = "SELECT * FROM blogs ORDER BY created_at DESC";
$result = $conn->query($query);
?>

<section class="blog-section">
    <h2>Travel Stories & Updates</h2>
    <p class="section-desc">Read our latest articles, tips, and updates about Tirupati Darshan.</p>

    <div class="blog-container">
        <?php if ($result->num_rows > 0): ?>
            <?php while($row = $result->fetch_assoc()): ?>
                <div class="blog-card">
                    <img src="admin/uploads/<?php echo htmlspecialchars($row['image']); ?>" alt="<?php echo htmlspecialchars($row['title']); ?>">
                    <div class="blog-content">
                        <h3><?php echo htmlspecialchars($row['title']); ?></h3>
                        <p><?php echo substr(strip_tags($row['description']), 0, 100) . '...'; ?></p>
                        <a href="read_more.php?slug=<?php echo urlencode($row['slug']); ?>">Read More</a>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <p>No blogs found.</p>
        <?php endif; ?>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
