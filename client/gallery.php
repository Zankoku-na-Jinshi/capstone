<?php
include 'layout/_layout.php';
include '../conn.php';

// Fetch all photos
$result = $conn->query("SELECT * FROM photos");
?>

<body>
    <h1 class="gallery-title">FAB Gallery</h1>
    <div class="gallery">
        <?php while ($row = $result->fetch_assoc()): ?>
            <div class="gallery-item">
                <img src="../admin/uploads/<?php echo $row['filename']; ?>" alt="Photo">
            </div>
        <?php endwhile; ?>
    </div>
</body>
