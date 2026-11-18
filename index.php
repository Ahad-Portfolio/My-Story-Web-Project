<?php
// استدعاء الاتصال بقاعدة البيانات
include 'db.php';

// جلب القصص من قاعدة البيانات لعرضها
$stories = [];
$result = $conn->query("SELECT story FROM stories ORDER BY id DESC");
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $stories[] = $row['story'];
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Story</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <!-- Header -->
    <header>
        <h1>Welcome to My Story</h1>
        <p>Share your story and inspire others</p>
    </header>

    <!-- Navigation Bar -->
    <nav>
        <a href="javascript:void(0);" onclick="showSection('home')">Home</a>
        <a href="javascript:void(0);" onclick="showSection('submit')">Submit Your Story</a>
        <a href="javascript:void(0);" onclick="showSection('stories')">Previous Stories</a>
        <a href="javascript:void(0);" onclick="showSection('about')">About Us</a>
    </nav>

    <!-- Home Section -->
    <div id="home" class="container">
        <h2>Welcome to My Story</h2>
        <p>Our website lets people anonymously share inspiring stories. Our goal is to create a safe space for sharing and motivation.</p>
    </div>

    <!-- Submit Story Section -->
    <div id="submit" class="container" style="display:none;">
        <h2>Submit Your Story</h2>
        <form class="story-form" action="submit_story.php" method="POST">
            <textarea name="story" placeholder="Write your inspiring story here..." required></textarea>
            <button type="submit">Submit Story</button>
        </form>
    </div>

    <!-- Stories Section -->
    <div id="stories" class="container" style="display:none;">
        <h2>Previous Stories</h2>
        <?php if (empty($stories)): ?>
            <p>Stories submitted by users will appear here. Be the first to inspire!</p>
        <?php else: ?>
            <?php foreach ($stories as $s): ?>
                <div class="story-card">
                    <h3>Anonymous</h3>
                    <p><?php echo htmlspecialchars($s); ?></p>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>

    <!-- About Us Section -->
    <div id="about" class="container" style="display:none;">
        <h2>About Us</h2>
        <p>"My Story" is a student-led web project that offers a platform for individuals to share inspiring stories anonymously. It’s built to encourage, support, and spread hope through real-life experiences. Whether you're sharing or just reading, you are part of a safe and uplifting space.</p>
    </div>

    <!-- Footer -->
    <footer>
        <p>&copy; 2025 My Story. All Rights Reserved.</p>
    </footer>

    <script src="main.js"></script>
</body>
</html>