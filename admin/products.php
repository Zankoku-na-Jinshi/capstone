<?php 
include '../conn.php';
include '_layout.php';
?>

<style>
    .products {
        width: 80%;
        margin: 20px auto;
        border-collapse: collapse;
    }

    .products table {
        width: 100%;
        border-collapse: collapse;
    }

    .products table, .products th, .products td {
        border: 1px solid #ddd;
        padding: 8px;
    }

    .products th {
        background-color: #f2f2f2;
        font-weight: bold;
        text-align: left;
    }

    .products img {
        width: 50px;
        height: auto;
    }
</style>

<div class="products">
    <h1>Product List</h1>
    <table>
        <tr>
            <th>Category</th>
            <th>Name</th>
            <th>Price</th>
            <th>Image</th>
        </tr>
        <?php
        include '../conn.php';
        $sql = "SELECT * FROM category_db";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row['category']) . "</td>";
                echo "<td>" . htmlspecialchars($row['name']) . "</td>";
                echo "<td>" . htmlspecialchars($row['price']) . "</td>";
                echo "<td><img src='" . htmlspecialchars($row['image_path']) . "' alt='" . htmlspecialchars($row['name']) . "'></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>No products found</td></tr>";
        }
        $conn->close();
        ?>
    </table>
</div>

<br>
</main>
</body>
</html>