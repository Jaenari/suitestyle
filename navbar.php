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
        <a href="checkout.php" class="cart-container">
    <i class="cart-icon">🛒</i>
    <span class="cart-badge">
        <?php
        // Tampilkan jumlah barang di badge
        echo isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0;
        ?>
    </span>
</a>
    </div>
</nav>

<style>
    .cart-container {
    position: relative;
    display: inline-block;
}

.cart-badge {
    position: absolute;
    top: -10px;
    right: -10px;
    background-color: red;
    color: white;
    font-size: 12px;
    font-weight: bold;
    padding: 2px 6px;
    border-radius: 50%;
    display: inline-block;
    min-width: 20px;
    text-align: center;
}

</style>

