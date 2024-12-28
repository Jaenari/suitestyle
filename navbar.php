<nav class="navbar fixed-top">
    <div class="logo">
        <img src="img/Loading.png" alt="Logo" class="logo-img">
    </div>
    <ul class="nav-links">
        <li><a href="home.php">Home</a></li>
        <li><a href="kategori.php">Category</a></li>
        <li><a href="contact.php">Contact Us</a></li>
    </ul>
    <div class="nav-icons">
        <div class="search-container">
            <form action="produk.php" method="GET">
                <i class="search-icon" id="search-toggle">🔍</i>
                <input type="text" class="search-input" name="search" placeholder="Search..." value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>">
                <input type="hidden" name="kategori" value="<?php echo isset($_GET['kategori']) ? $_GET['kategori'] : ''; ?>">
            </form>
        </div>
        <a href="register.php"><i class="user-icon">👤</i></a>
        <a href="#"><i class="cart-icon">🛒</i></a>
    </div>
</nav>

