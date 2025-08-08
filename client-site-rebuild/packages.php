<?php
include 'db.php';
include 'includes/header.php';
?>

<!-- Main Packages Section -->
<section class="packages">
    <div class="container">
        <h2 class="section-title">Tirupati Packages</h2>
        <div class="row">
            <?php
            $query = "SELECT * FROM packages ORDER BY id DESC";
            $result = mysqli_query($conn, $query);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <div class="col-md-4">
                        <div class="package-card">
                            <img src="admin/uploads/<?php echo htmlspecialchars($row['image']); ?>" alt="<?php echo htmlspecialchars($row['title']); ?>" class="img-fluid">
                            <h3><?php echo htmlspecialchars($row['title']); ?></h3>
                            <p><?php echo nl2br(htmlspecialchars($row['description'])); ?></p>
                            <p><strong>Price:</strong> ₹<?php echo htmlspecialchars($row['price']); ?></p>
                            <a href="book.php?package_id=<?php echo $row['id']; ?>" class="btn btn-primary">Book Now</a>
                        </div>
                    </div>
                    <?php
                }
            } else {
                echo "<p>No packages available at the moment.</p>";
            }
            ?>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
