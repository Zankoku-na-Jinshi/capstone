<?php
include '_layout.php';  // Including header or layout
include '../conn.php';   // Database connection


?>
<div class="inventory">
    <h1>Manage Supplies</h1>

    <!-- Set Threshold Form -->
    <form action="" method="POST">
        <h2>Set Supply Threshold</h2>
        <div class="name">
            <label for="name">Supply Name:</label>
            <input type="text" name="name" id="name" required>
        </div>
        <div class="max_stock">
            <label for="max_stock">Max Stock:</label>
            <input type="number" name="max_stock" id="max_stock" required>
        </div>
        <div class="warning_stock">
            <label for="warning_stock">Warning Stock:</label>
            <input type="number" name="warning_stock" id="warning_stock" required>
        </div>
        
        <button type="submit" name="submit">submit</button>
    </form>
</div>
