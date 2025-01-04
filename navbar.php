<nav class="navbar fixed-top align-items-center">
    <div class="logo">
        <img src="img/Loading.png" alt="Logo" class="logo-img">
    </div>
    <button class="navbar-toggler" type="button" id="nav-toggle">
        ☰
    </button>
    <ul class="nav-links" id="nav-menu">
        <li><a href="home.php">Home</a></li>
        <li><a href="kategori.php">Category</a></li>
        <li><a href="contact.php">About Us</a></li>
    </ul>
    <div class="nav-icons">
        <div class="search-container">
            <form action="produk.php" method="GET">
                <i class="search-icon" id="search-toggle">🔍</i>
                <input type="text" class="search-input" name="search" placeholder="Search..."
                    value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>">
                <input type="hidden" name="kategori"
                    value="<?php echo isset($_GET['kategori']) ? $_GET['kategori'] : ''; ?>">
            </form>
        </div>

        
        <a href="<?= isset($_SESSION['username']) ? 'keluar.php' : 'login-u.php' ?>"
            class="btn btn-sm btn-<?= isset($_SESSION['username']) ? 'danger' : 'success' ?>">
            <?= isset($_SESSION['username']) ? 'Logout' : 'Login' ?>
        </a>
        <a href="register.php"> <span class="btn btn-pink">Register</span></a>
    </div>
</nav>

<style>
    /* Basic Styles */
    .navbar {
    display: flex;
    align-items: center;
    justify-content: space-between;
    background-color: #f4c2c2; /* Soft pink */
    padding: 10px 20px;
}

    .btn-pink{
    background-color: #f4c2c2; /* Soft pink */
    }

.nav-menu{
    text-decoration-color: #f4c2c2 ;
}


    .nav-links {
        display: flex;
        list-style: none;
        margin: 0;
        padding: 0;
    }

    .nav-links li {
        margin: 0 10px;
        text-decoration-color:  #f4c2c2;
    }

    .nav-links a {
        text-decoration: none;
        color: #e75480;
    }

    .nav-icons {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .search-container {
        display: flex;
        align-items: center;
    }

    .search-input {
        display: none;
        /* Hidden initially */
        margin-left: 10px;
        padding: 5px;
    }

    /* Cart Badge */
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

    /* Responsive Styles */
    .navbar-toggler {
        display: none;
        background: none;
        border: none;
        font-size: 24px;
        cursor: pointer;
    }

    @media screen and (max-width: 576px) {
        .navbar-toggler {
            display: block;
        }

        .nav-links {
            display: none;
            flex-direction: column;
            position: absolute;
            top: 60px;
            right: 20px;
            width: 200px;
            border: 1px solid #ddd;
            box-shadow: 0px 4px 6px rgba(224, 216, 216, 0.73);
            z-index: 1000;
        }

        .nav-links.show {
            display: flex;
        }

        .nav-icons {
            gap: 5px;
        }
    }
    
</style>

<script>
    document.getElementById('nav-toggle').addEventListener('click', function () {
        const navMenu = document.getElementById('nav-menu');
        navMenu.classList.toggle('show');
    });
</script>