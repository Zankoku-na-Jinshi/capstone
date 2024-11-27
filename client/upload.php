<?php
include 'conn.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $category = $_POST['category'];
    $name = $_POST['name'];
    $price = $_POST['price'];

    // Image upload handling
    $target_dir = "uploads/";
    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0777, true); // Create uploads folder if it doesn't exist
    }
    $target_file = $target_dir . basename($_FILES["product-image"]["name"]);
    move_uploaded_file($_FILES["product-image"]["tmp_name"], $target_file);

    $image_path = $target_file;

    // Insert data into the database
    $stmt = $conn->prepare("INSERT INTO category_db(category, name, price, image_path) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssds", $category, $name, $price, $image_path);

    if ($stmt->execute()) {
        echo "New menu item added successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
