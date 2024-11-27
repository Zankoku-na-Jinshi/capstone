<?php include '../conn.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAB Cafe Admin</title>
    <link rel="stylesheet" href="../assets/css/admin-_layout.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script>
        function toggleSidebar() {
            const sidebar = document.querySelector('.sidebar');
            sidebar.classList.toggle('expanded');
        }
    </script>
</head>

<body>
    <!-- Header Section -->
    <header>
        <div class="logo">
            <i class="fas fa-coffee"></i>adam fa-coffee
        </div>
        <div class="searchbar">
            <input type="text" placeholder="Search...">
            <i class="fas fa-search"></i> <!-- Search icon -->
        </div>
        <div class="dropdown notification">
            <i class="fas fa-bell"></i> <!-- Notification bell icon -->
            <span class="badge">3</span>
            <div class="dropdown-content">
                <p>No new notifications</p>
            </div>
        </div>
        <div class="header-right">
            <div class="dropdown profile">
                <i class="fas fa-user-circle"></i> <!-- Profile icon -->
                <span>Profile</span>
                <div class="dropdown-content">
                    <a href="#">Settings</a>
                    <a href="../logout.php">Log Out</a>
                </div>
            </div>
        </div>
    </header>
    <main>
        <div class="sidebar">
            <div class="menu-toggle" onclick="toggleSidebar()">
                <i class="fas fa-bars"></i>
            </div>
            <ul>
                <li><a href="index.php"><i class="fas fa-tachometer-alt" style="color: #FF5733;"></i> <span class="menu-text">Dashboard</span></a></li>
                <li><a href="orders.php"><i class="fas fa-shopping-basket" style="color: #2196F3;"></i> <span class="menu-text">Orders</span></a></li>
                <li><a href="products.php"><i class="fas fa-box-open" style="color: #FFC107;"></i> <span class="menu-text">Products</span></a></li>
                <li><a href="customers.php"><i class="fas fa-users" style="color: #4CAF50;"></i> <span class="menu-text">Customers</span></a></li>
                <li><a href="analytic.php"><i class="fas fa-chart-line" style="color: #9C27B0;"></i> <span class="menu-text">Analytics</span></a></li>
                <li><a href="admin-upload.php"><i class="fas fa-cog" style="color: #607D8B;"></i> <span class="menu-text">Settings</span></a></li>
                <li><a href="inventory.php"><i class="fas fa-warehouse" style="color: red;"></i> <span class="menu-text">Inventory</span></a></li>
            </ul>
        </div>
        <div class="content">
