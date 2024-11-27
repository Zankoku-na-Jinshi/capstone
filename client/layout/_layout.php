<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coffee Shop</title>
    <link rel="stylesheet" href="../assets/css/client-_layout.css">
    <link rel="stylesheet" href="../assets/css/history.css">
    <link rel="stylesheet" href="../assets/css/about.css">
    <link rel="stylesheet" href="../assets/css/order.css">
    <link rel="stylesheet" href="../assets/css/menu.css">
    <link rel="stylesheet" href="../assets/css/contact.css">
    <link rel="stylesheet" href="../assets/css/header.css">
    <link rel="stylesheet" href="../assets/css/gallery.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>

<header>
    <div class="header-content">
        <div class="logo">
            <img src="../assets/images/logo.jpg" alt="FAB Cafe Logo">
            <h1>FAB Cafe</h1>
        </div>

        <!-- Navigation Menu -->
        <nav id="nav">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="#aboutus">About</a></li>
                <li><a href="#contact">Contact</a></li>
                <li><a href="order.php">Order</a></li>
                <li><a href="gallery.php">Gallery</a></li>
                <li><a href="../logout.php">Logout</a></li>
            </ul>
        </nav>

        <!-- Hamburger Icon -->
        <div id="hamburger" class="hamburger-menu">
            <i class="fas fa-bars"></i>
        </div>
    </div>
</header>

<script>
    // Toggle the nav menu visibility when the hamburger icon is clicked
    const hamburger = document.getElementById('hamburger');
    const nav = document.getElementById('nav');

    hamburger.addEventListener('click', () => {
        nav.classList.toggle('active');
        hamburger.classList.toggle('active');
    });
</script>

</body>
</html>
