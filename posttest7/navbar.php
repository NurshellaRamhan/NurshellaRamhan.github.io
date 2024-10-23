<header>
    <a href="#home" class="logo"><img src="image/logo-toko.png" alt="" width="100"></a>
    <div class="navbar">
        <a href="#home">Home</a>
        <a href="#about">About Us</a>
        <a href="#shop">Products</a>
        <a href="CRUD.php">Order Flower</a>

        <!-- Login/Logout Conditional Menu -->
        <?php if ($isLoggedIn): ?>
            <a href="?logout=true">Logout</a>
            <span class="welcome">Welcome, <?php echo $username; ?></span>
        <?php else: ?>
            <a href="login.php">Login</a>
            <a href="register.php">Register</a>
        <?php endif; ?>
    </div>
</header>
