<?php
include 'db.php';
include 'includes/header.php';

// Fetch About Data
$sql = "SELECT * FROM about LIMIT 1";
$result = mysqli_query($conn, $sql);
$about = mysqli_fetch_assoc($result);
?>

<section class="about-section" style="padding: 50px 15px; background-color: #f9f9f9;">
  <div class="container" style="max-width: 1100px; margin: auto; display: flex; flex-wrap: wrap; gap: 30px; align-items: center;">
    
    <!-- About Image -->
    <div style="flex: 1 1 400px; text-align: center;">
      <?php if (!empty($about['image'])): ?>
        <img src="admin/uploads/<?= htmlspecialchars($about['image']) ?>" alt="<?= htmlspecialchars($about['title']) ?>" style="width: 100%; max-width: 500px; border-radius: 10px; box-shadow: 0 4px 10px rgba(0,0,0,0.1);">
      <?php endif; ?>
    </div>

    <!-- About Content -->
    <div style="flex: 1 1 500px;">
      <h2 style="font-size: 28px; margin-bottom: 20px;"><?= htmlspecialchars($about['title']) ?></h2>
      <p style="line-height: 1.7; font-size: 16px; color: #555;">
        <?= nl2br(htmlspecialchars($about['content'])) ?>
      </p>
    </div>

  </div>
</section>

<?php include 'includes/footer.php'; ?>
