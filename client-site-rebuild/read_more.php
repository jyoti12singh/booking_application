<?php
// Database connection
include 'db.php';

// Agar id missing hai to redirect
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header("Location: blog.php");
    exit;
}

$id = intval($_GET['id']); // Clean input

// Fetch single blog post
$query = "SELECT * FROM blog_posts WHERE id = $id";
$result = mysqli_query($conn, $query);

// Agar koi record nahi mila
if (!$result || mysqli_num_rows($result) == 0) {
    include 'includes/header.php';
    echo "<div style='text-align:center; padding:40px;'>
            <h2>Post not found.</h2>
            <a href='blog.php' style='color:#ff6600; text-decoration:none;'>← Back to Blog</a>
          </div>";
    include 'includes/footer.php';
    exit;
}

$post = mysqli_fetch_assoc($result);
?>

<?php include 'includes/header.php'; ?>

<div class="blog-detail-container">
    <div class="blog-detail-header">
        <h1><?php echo htmlspecialchars($post['title']); ?></h1>
        <p class="blog-meta">
            Posted on <?php echo date("F j, Y", strtotime($post['created_at'])); ?> 
            by <?php echo htmlspecialchars($post['author']); ?>
        </p>
    </div>

    <?php if (!empty($post['image'])): ?>
    <div class="blog-detail-image">
        <img src="uploads/<?php echo htmlspecialchars($post['image']); ?>" 
             alt="<?php echo htmlspecialchars($post['title']); ?>">
    </div>
    <?php endif; ?>

    <div class="blog-detail-content">
        <?php echo nl2br(htmlspecialchars($post['content'])); ?>
    </div>

    <a href="blog.php" class="back-to-blog">← Back to Blog</a>
</div>

<?php include 'includes/footer.php'; ?>
