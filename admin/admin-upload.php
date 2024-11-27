<?php
// Database connection
include '../admin/_layout.php';

// Handle file deletion
if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);
    
    // Select the filename
    $selectQuery = $conn->prepare("SELECT filename FROM photos WHERE id = ?");
    $selectQuery->bind_param("i", $id);
    $selectQuery->execute();
    $selectQuery->bind_result($filename);
    $selectQuery->fetch();

    // Check if filename exists and delete file from server
    if ($filename) {
        $filePath = "uploads/" . $filename;
        
        // Check if file exists before trying to delete
        if (file_exists($filePath)) {
            if (unlink($filePath)) {
                echo "<script>('File deleted successfully from server.');</script>";
            } else {
                echo "<script>('Error deleting the file from server.');</script>";
            }
        } else {
            echo "<script>('File not found on the server.');</script>";
        }

        // Free result and close the statement
        $selectQuery->free_result();
        $selectQuery->close();

        // Delete the photo from the database
        $deleteQuery = $conn->prepare("DELETE FROM photos WHERE id = ?");
        $deleteQuery->bind_param("i", $id);
        if ($deleteQuery->execute()) {
            echo "<script>('Photo deleted successfully from database.'); window.location='admin-upload.php';</script>";
        } else {
            echo "<script>('Error deleting the photo from the database.');</script>";
        }

        // Close the delete query statement
        $deleteQuery->close();
    }
}

// Handle file upload
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = 'uploads/';
        $filename = basename($_FILES['photo']['name']);
        $targetFile = $uploadDir . $filename;

        // Check if file already exists
        $checkQuery = $conn->prepare("SELECT id FROM photos WHERE filename = ?");
        $checkQuery->bind_param("s", $filename);
        $checkQuery->execute();
        $checkQuery->store_result();

        if ($checkQuery->num_rows > 0) {
            echo "<script>alert('File already exists in the gallery!');</script>";
        } else {
            // Attempt to move the uploaded file
            if (move_uploaded_file($_FILES['photo']['tmp_name'], $targetFile)) {
                // Insert the filename into the database
                $insertQuery = $conn->prepare("INSERT INTO photos (filename) VALUES (?)");
                $insertQuery->bind_param("s", $filename);
                if ($insertQuery->execute()) {
                    echo "<script>('File uploaded successfully!');</script>";
                } else {
                    echo "<script>('Error uploading file to database.');</script>";
                }
                $insertQuery->close();
            } else {
                echo "<script>('Error moving uploaded file.');</script>";
            }
        }

        $checkQuery->close();
    } else {
        echo "<script>alert('No file selected or error occurred during upload.');</script>";
    }
}

// Fetch all photos
$result = $conn->query("SELECT * FROM photos");

?>

<style>
    /* General Body Styles */
    

    h1 {
        font-size: 2rem;
        color: #333;
        margin-bottom: 20px;
        text-align: center;
    }

    /* Form Styles */
    form {
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        display: flex;
        flex-direction: column;
        gap: 15px;
        margin-bottom: 40px;
    }

    form input[type="file"] {
        padding: 10px;
        border-radius: 5px;
        border: 1px solid #ddd;
        font-size: 1rem;
    }

    form button {
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        background-color: #007bff;
        color: white;
        font-size: 1rem;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    form button:hover {
        background-color: #0056b3;
    }

    /* Gallery Styles */
    .gallery {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        justify-content: center;
    }

    .gallery-item {
        position: relative;
        width: 250px;
        height: 250px;
        overflow: hidden;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        background-color: #fff;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .gallery-item:hover {
        transform: scale(1.05);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
    }

    .gallery-item img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 10px;
    }

    /* Delete Button Styles */
    .delete-btn {
        position: absolute;
        top: 10px;
        right: 10px;
        background-color: rgba(255, 0, 0, 0.8);
        color: white;
        font-size: 1.2rem;
        padding: 6px 10px;
        border-radius: 50%;
        cursor: pointer;
        transition: background-color 0.3s ease;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .delete-btn:hover {
        background-color: rgba(255, 0, 0, 1);
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .gallery {
            gap: 15px;
        }

        .gallery-item {
            width: 200px;
            height: 200px;
        }

        form {
            width: 90%;
            max-width: 400px;
        }
    }
</style>

<body>
    <h1>Admin Photo Upload</h1>
    <form action="admin-upload.php" method="post" enctype="multipart/form-data">
        <input type="file" name="photo" required>
        <button type="submit">Upload Photo</button>
    </form>

    <div class="gallery">
        <?php while ($row = $result->fetch_assoc()): ?>
            <div class="gallery-item">
                <img src="uploads/<?php echo $row['filename']; ?>" alt="Photo">
                <a href="admin-upload.php?delete=<?php echo $row['id']; ?>" class="delete-btn">X</a>
            </div>
        <?php endwhile; ?>
    </div>
</body>

