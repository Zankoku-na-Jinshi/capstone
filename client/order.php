<?php
include '../conn.php';
include './layout/_layout.php';
?>

<div class="CATEGORYS">
    <ul>
        <li><a href="#">Coffee</a></li>
        <li><a href="#">Non-Coffee</a></li>
        <li><a href="#">Frappuccino</a></li>
        <li><a href="#">Milkshake</a></li>
        <li><a href="#">Mojito</a></li>
    </ul>
</div>

<hr>
<link rel="stylesheet" href="../assets/css/order.css">
<div class="selection">
    <?php
    // Fetch data from the category_db table
    $sql = "SELECT * FROM category_db";
    $result = $conn->query($sql);

    // Check if we have data
    if ($result->num_rows > 0) {
        // Loop through the result and display each record in a card layout
        while ($row = $result->fetch_assoc()) {
            echo "<div class='card'>
                    <img src='../admin/" . $row["image_path"] . "' alt='" . $row["name"] . "'>
                    <div class='detail'>
                        <h3  >" . $row["name"] . "</h3>
                        <p>$" . number_format($row["price"], 2) . "</p>
                    </div>
                  </div>";
        }
    } else {
        echo "No records found.";
    }

    // Close the connection
    $conn->close();
    ?>
</div>
