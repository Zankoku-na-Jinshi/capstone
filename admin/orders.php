<?php
include '_layout.php';
include '../conn.php';
?>

<style>
    section {
        display: flex;
        gap: 10px;
        font-size: .8em;
    }

    .container {
        display: grid;
        grid-template-columns: 1fr 1fr;
        grid-template-rows: auto auto auto;
        gap: 10px;
        border-radius: 12px;
        width: 100%;
    }

    .t1 {
        flex: 1;
        padding: 10px;
        border-radius: 12px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        height: 200px;
        /* Adjust the height as needed */
        overflow: auto;
        /* This makes the content scrollable */
    }

    .table-container h2 {
        text-align: center;
        color: #333;
    }

    table {
        background-color: gray;
        width: 100%;
        border-collapse: collapse;

    }

    table th,
    table td {
        text-align: center;
        border: 1px solid #ddd;
    }

    table td {
        padding: 0;
        color: #fff;
    }

    table th {
        background-color: #f1f1f1;
        font-size: .8em;
    }

    table img {
        width: 50px;
        height: 50px;
        object-fit: cover;
        border-radius: 8px;
    }


    /* Form styles */
    .t2 h1{
        text-align: center;
    }
    .form-container {
        flex: 1;
        display: flex;
        gap: 20px;
    }

    .form {
        background-color: #ffffff;
        padding: 20px;
        border-radius: 12px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    }

    .form h1 {
        text-align: center;
    }

    .form label {
        display: block;
        margin-bottom: 10px;
        font-weight: 500;
        color: #555;
    }

    .form input[type="text"],
    .form select,
    .form input[type="file"] {
        width: 100%;
        padding: 5px;
        border: 1px solid #ccc;
        border-radius: 8px;
        background-color: #f9f9f9;
        font-size: 15px;
        margin-bottom: 20px;
    }

    .form button {
        width: 100%;
        padding: 5px;
        background-color: #5cb85c;
        color: white;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .form button:hover {
        background-color: #4cae4c;
    }

    .form button:active {
        background-color: #449d44;
    }

    /* Card Section */
    .card-container {
        width: 100%;
        max-width: 400px;
        background-color: #fff;
        border-radius: 12px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    }

    .card {
        text-align: center;
        padding: 20px;
        border: 1px solid #ddd;
        border-radius: 12px;
        background-color: #f9f9f9;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        margin-bottom: 20px;
    }

    .card img {
        width: 150px;
        height: 150px;
        object-fit: cover;
        border-radius: 8px;
        margin-bottom: 10px;
    }

    .card h3 {
        font-size: 20px;
        color: #333;
        margin-bottom: 10px;
    }

    .card p {
        font-size: 16px;
        color: #777;
        margin-bottom: 10px;
    }

    .card button {
        padding: 10px 20px;
        background-color: #5cb85c;
        color: white;
        border: none;
        border-radius: 8px;
        cursor: pointer;
    }

    .card button:hover {
        background-color: #4cae4c;
    }

    .card button:active {
        background-color: #449d44;
    }

    /* Responsive Layout */
    @media (max-width: 768px) {
        .container {
            flex-direction: column;
        }

        .form-container {
            margin-top: 20px;
        }

        .table-container,
        .form-container,
        .card-container {
            margin-bottom: 20px;
        }
    }
</style>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data
    $category = $_POST['category'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $imagePath = '';

    // Handle the image upload
    if (isset($_FILES['product-image']) && $_FILES['product-image']['error'] == 0) {
        $imageTmp = $_FILES['product-image']['tmp_name'];
        $imageName = $_FILES['product-image']['name'];
        $imageSize = $_FILES['product-image']['size'];
        $imageType = $_FILES['product-image']['type'];

        // Validate image file type
        $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
        if (!in_array($imageType, $allowedTypes)) {
            echo "Error: Only JPEG, PNG, and GIF files are allowed.";
            exit;
        }

        // Validate image size (e.g., 2MB max)
        if ($imageSize > 2 * 1024 * 1024) {
            echo "Error: Image size must not exceed 2MB.";
            exit;
        }

        // Move the image to a specific folder (e.g., 'uploads/')
        $targetDir = 'uploads/';
        if (!file_exists($targetDir)) {
            mkdir($targetDir, 0777, true); // Create directory if it doesn't exist
        }

        $imagePath = $targetDir . basename($imageName);
        if (!move_uploaded_file($imageTmp, $imagePath)) {
            echo "Error: Failed to upload image.";
            exit;
        }
    } else {
        echo "Error: No image file uploaded.";
        exit;
    }

    // Insert data into the database
    $sql = "INSERT INTO category_db (category, name, price, image_path) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $category, $name, $price, $imagePath);

    if ($stmt->execute()) {
        echo "Menu item added successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the prepared statement
    $stmt->close();
}
?>
<div class="h1">Manage Menu</div>
<hr>
<section>
    <div class="container">
        <!-- Tables for Drinks and Food -->
        <div class="table-container">
            <h2>Drinks Menu</h2>
            <hr>
            <div class="t1">
                <table>
                    <tr>
                        <th>Category</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Image</th>
                    </tr>
                    <?php
                    $sql = "SELECT * FROM category_db WHERE category IN ('coffee', 'non-coffee', 'frappuccino', 'milkshake', 'mojito')";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row["category"] . "</td>";
                            echo "<td>" . $row["name"] . "</td>";
                            echo "<td>" . $row["price"] . "</td>";
                            echo "<td><img src='" . $row["image_path"] . "' alt='" . $row["name"] . "'></td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='4'>No drinks found.</td></tr>";
                    }
                    ?>
                </table>
            </div>
        </div>

        <div class="table-container">
            <h2>Food Menu</h2>
            <hr>
            <div class="t1">
                <table>
                    <tr>
                        <th>Category</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Image</th>
                    </tr>
                    <?php
                    $sql = "SELECT * FROM category_db WHERE category IN ('pica-pica', 'pasta', 'sandwiches', 'waffles', 'rice meal')";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row["category"] . "</td>";
                            echo "<td>" . $row["name"] . "</td>";
                            echo "<td>" . $row["price"] . "</td>";
                            echo "<td><img src='" . $row["image_path"] . "' alt='" . $row["name"] . "'></td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='4'>No food items found.</td></tr>";
                    }
                    ?>
                </table>
            </div>
        </div>

        <!-- Card Section -->

        <!-- Forms for adding Drinks and Food Items -->
         <div class="t2">
         <h1>Add New Drink Item</h1>
        <form action="" method="post" enctype="multipart/form-data" class="form">
            <select name="category" id="category" required>
                <option value="" disabled selected>Select Category</option>
                <option value="coffee">Coffee</option>
                <option value="non-coffee">Non-Coffee</option>
                <option value="frappuccino">Frappuccino</option>
                <option value="milkshake">Milkshake</option>
                <option value="mojito">Mojito</option>
            </select>
            <label for="name">Item Name:</label>
            <input type="text" name="name" id="name" required>
            <select name="size" id="size" >
                <option value="" disabled selected> Size</option>
                <option value="Tall">Tall</option>
                <option value="Grande">Grande</option>
            </select>
            <select name="temperature" id="temperature" >
                <option value="" disabled selected> Temperature</option>
                <option value="Hot">Hot</option>
                <option value="Ice">Ice</option>
            </select>
            <label for="price">Price:</label>
            <input type="text" name="price" id="price" required>
            <label for="product-image">Upload Image:</label>
            <input type="file" name="product-image" id="product-image" accept="image/*" required>
            <button type="submit">Add Drink Item</button>
        </form>
        </div>
        <div class="t2">
        <h1>Add New Food Item</h1>
        <form action="" method="post" enctype="multipart/form-data" class="form">
            <select name="category" id="category" required>
                <option value="" disabled selected>Select Category</option>
                <option value="pica-pica">Pica-Pica</option>
                <option value="pasta">Pasta</option>
                <option value="sandwiches">Sandwiches</option>
                <option value="waffles">Waffles</option>
                <option value="rice-meal">Rice Meal</option>
                <option value="Extras">Extras</option>
                <option value="Extras">Wings in a tray</option>
            </select>
            <label for="name">Item Name:</label>
            <input type="text" name="name" id="name" required>
            <select name="flavors" id="flavors" >
                <option value="" disabled selected> Flavors</option>
                <option value="pica-pica">Honey glaze</option>
                <option value="Buffalo">Buffalo</option>
                <option value="Garlic_Batter">Garlic Batter</option>
                <option value="Tariyaki">Tariyaki</option>
                <option value="Sriracha">Sriracha</option>
            </select>
            <label for="price">Price:</label>
            <input type="text" name="price" id="price" required>
            <label for="product-image">Upload Image:</label>
            <input type="file" name="product-image" id="product-image" accept="image/*" required>
            <button type="submit">Add Food Item</button>
        </form>
        </div>

    </div>
    <hr>
    <div class="card-container">
        <div class="card">
            <img src="uploads/default.jpg" alt="Item Image">
            <h3>Item Name</h3>
            <p>Price: $0.00</p>
            <p>Category: Category</p>
            <button>Customize</button>
            <button>Update</button>
        </div>
    </div>
</section>