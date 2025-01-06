<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<style>
    .search-container {
        position: relative;
        display: flex;
        align-items: center;
    }

    .search-input {
        width: 0;
        opacity: 0;
        padding: 5px 10px;
        border: 1px solid #6e5656;
        border-radius: 20px;
        outline: none;
        background-color: #cb7070;
        transition: width 0.3s ease, opacity 0.3s ease;
        font-size: 16px;
    }

    .search-icon {
        cursor: pointer;
        font-size: 18px;
        margin-right: 5px;
        transition: color 0.3s ease;
    }

    /* When the search-icon is hovered, show the input */
    .search-icon:hover+.search-input,
    .search-container:hover .search-input {
        width: 200px;
        opacity: 1;
    }

    .nav-link {
        color: #e75480 !important;
    }

    .search-icon:hover {
        color: #e75480;
    }
</style>

<nav class="navbar navbar-expand-md navbar-dark" style="background-color:#FB9EC6">
    <div class="container-fluid">
        <img src="img/Loading.png" alt="Logo" class="navbar-brand" width="64" height="48">
        <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-collapse collapse" id="navbarCollapse">
            <ul class="navbar-nav me-auto mb-2 mb-md-0 fw-bold">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="home.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="kategori.php">Category</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-disabled="true" href="produk.php">Show All</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-disabled="true" href="contact.php">About Us</a>
                </li>
            </ul>
            <div class="d-flex align-items-center">
                <!-- Search Container -->
                <div class="search-container">
                    <form action="produk.php" method="GET" class="d-flex align-items-center">
                        <i class="search-icon" id="search-toggle">🔍</i>
                        <input type="text" class="search-input" name="search" placeholder="Search...">
                    </form>
                </div>

                <!-- Logic for Login/Logout -->
                <?php if (isset($_SESSION['username'])): ?>
                    <!-- Logout Button -->
                    <a href="keluar.php" class="btn btn-sm btn-danger w-auto">
                        <i class="bi bi-person-circle me-1"></i>Logout
                    </a>
                <?php else: ?>
                    <!-- Login Button -->
                    <a href="login-u.php" class="me-1 btn btn-sm btn-success w-auto">
                        <i class="bi bi-person-circle me-1"></i>Login
                    </a>
                    <!-- Register Button -->
                    <a href="register.php" class="btn btn-sm btn-primary w-auto">
                        <i class="bi bi-person-add me-1"></i>Daftar
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</nav>
