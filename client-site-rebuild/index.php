<?php
include 'db.php';
include 'includes/header.php';

// Sliders
$sliders = mysqli_query($conn, "SELECT * FROM sliders");

// Packages (limit 3 for homepage)
$packages = mysqli_query($conn, "SELECT * FROM packages LIMIT 3");

// Features
$features = mysqli_query($conn, "SELECT * FROM features");

// Testimonials
$testimonials = mysqli_query($conn, "SELECT * FROM testimonials");
?>

<!-- Hero Slider -->
<section class="hero-slider">
  <?php if (mysqli_num_rows($sliders) > 0): ?>
    <?php while ($slide = mysqli_fetch_assoc($sliders)): ?>
      <div class="slide" style="background-image:url('uploads/<?= htmlspecialchars($slide['image']) ?>')">
        <div class="overlay">
          <h1><?= htmlspecialchars($slide['title']) ?></h1>
          <p><?= htmlspecialchars($slide['subtitle']) ?></p>
        </div>
      </div>
    <?php endwhile; ?>
  <?php else: ?>
    <div class="slide" >
      
        <h1>Welcome to Our Travel Site</h1>
        <p>Discover amazing packages and offers</p>
      
    </div>
  <?php endif; ?>
</section>

<!-- Features Section -->
<section class="features">
  <div class="container">
    <h2>Features</h2>
    <div class="feature-grid">
      <?php if (mysqli_num_rows($features) > 0): ?>
        <?php while ($feat = mysqli_fetch_assoc($features)): ?>
          <div class="feature-box">
            <i class="<?= htmlspecialchars($feat['icon']) ?>"></i>
            <h3><?= htmlspecialchars($feat['title']) ?></h3>
            <p><?= htmlspecialchars($feat['description']) ?></p>
          </div>
        <?php endwhile; ?>
      <?php else: ?>
        <p style="text-align:center;width:100%;">No features available.</p>
      <?php endif; ?>
    </div>
  </div>
</section>

<!-- Popular Packages -->
<section class="packages-home">
  <div class="container">
    <h2>Popular Packages</h2>
    <div class="package-grid">
      <?php if (mysqli_num_rows($packages) > 0): ?>
        <?php while ($pkg = mysqli_fetch_assoc($packages)): ?>
          <div class="package-card">
            <img src="admin/uploads/<?= htmlspecialchars($pkg['image']) ?>" alt="<?= htmlspecialchars($pkg['title']) ?>">
            <h3><?= htmlspecialchars($pkg['title']) ?></h3>
            <p><?= htmlspecialchars($pkg['description']) ?></p>
            <div style="padding: 0 15px 10px;">
              <strong>₹<?= number_format($pkg['price'], 2) ?></strong>
            </div>
            <a href="book.php?id=<?= $pkg['id'] ?>" class="btn">Book Now</a>


          </div>
        <?php endwhile; ?>
      <?php else: ?>
        <p style="text-align:center;width:100%;">No packages available right now.</p>
      <?php endif; ?>
    </div>
  </div>
</section>

<!-- Testimonials -->
<section class="testimonials">
  <div class="container">
    <h2>What Our Customers Say</h2>
    <div class="testimonial-grid">
      <?php if (mysqli_num_rows($testimonials) > 0): ?>
        <?php while ($test = mysqli_fetch_assoc($testimonials)): ?>
          <div class="testimonial-card">
            <img src="admin/uploads/<?= htmlspecialchars($test['image']) ?>" alt="<?= htmlspecialchars($test['name']) ?>">
            <p>"<?= htmlspecialchars($test['message']) ?>"</p>
            <h4>- <?= htmlspecialchars($test['name']) ?></h4>
          </div>
        <?php endwhile; ?>
      <?php else: ?>
        <p style="text-align:center;width:100%;">No testimonials yet. Be the first to share your feedback!</p>
      <?php endif; ?>
    </div>
  </div>
</section>

<?php include 'includes/footer.php'; ?>
