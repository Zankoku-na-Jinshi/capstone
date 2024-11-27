<?php
include '../conn.php'; // Include your conn.php file

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $uploadDir = '../assets/images/';
    $uploadFile = $uploadDir . basename($_FILES['image']['name']);

    // Generate a hash of the uploaded file
    $fileHash = hash_file('sha256', $_FILES['image']['tmp_name']);

    // Check if the hash already exists in the database
    $stmt = $conn->prepare("SELECT id FROM gallery_images WHERE file_hash = ?");
    $stmt->bind_param("s", $fileHash);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        echo "This image already exists in the gallery.";
    } else {
        // Move the uploaded file and save its details to the database
        if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadFile)) {
            $stmt = $conn->prepare("INSERT INTO gallery_images (image_path, file_hash) VALUES (?, ?)");
            $stmt->bind_param("ss", $uploadFile, $fileHash);

            if ($stmt->execute()) {
                echo "Image uploaded and saved successfully!";
            } else {
                echo "Database error: " . $stmt->error;
            }

            $stmt->close();
        } else {
            echo "Image upload failed.";
        }
    }
    $stmt->close();
}
$conn->close();
?>

<form action="" method="post" enctype="multipart/form-data">
    <label for="image">Upload an image:</label>
    <input type="file" name="image" id="image" required>
    <button type="submit">Upload</button>
</form>
