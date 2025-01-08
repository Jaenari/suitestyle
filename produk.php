<?php
include 'db.php';

// Ambil data kontak admin
$kontak = mysqli_query($conn, "SELECT admin_telp, admin_email, admin_address FROM tb_admin WHERE admin_id = 1");
$a = mysqli_fetch_object($kontak);
?>

<?php include "navbar.php"; ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Suitestyle - Produk</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/cards.css"> <!-- Tambahkan file CSS baru -->
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
    <style>
        .h3{
            color: #FF66A3;
            font-weight: bold;
        }
    </style>

    <!-- Sidebar -->
    <div id="sidebar" class="sidebar">
        <button class="close-btn" onclick="toggleSidebar()">&#10005;</button>

        <!-- Kategori -->
        <h3>Kategori</h3>
        <ul>
            <?php
            $kategori_query = mysqli_query($conn, "SELECT * FROM tb_kategori ORDER BY kategori_id ASC");
            if (mysqli_num_rows($kategori_query) > 0) {
                while ($row = mysqli_fetch_assoc($kategori_query)) {
                    echo '<li><a href="?kategori=' . $row['kategori_id'] . '">' . htmlspecialchars($row['kategori_nama']) . '</a></li>';
                }
            } else {
                echo '<li>Tidak ada kategori</li>';
            }
            ?>
        </ul>

        <!-- Warna -->
        <h3>Warna</h3>
        <ul>
            <?php
            $warna_query = mysqli_query($conn, "SELECT DISTINCT warna FROM tb_produk WHERE warna != '' ORDER BY warna ASC");
            if (mysqli_num_rows($warna_query) > 0) {
                while ($row = mysqli_fetch_assoc($warna_query)) {
                    echo '<li><a href="?warna=' . urlencode($row['warna']) . '">' . htmlspecialchars($row['warna']) . '</a></li>';
                }
            } else {
                echo '<li>Tidak ada warna</li>';
            }
            ?>
        </ul>
    </div>

    <!-- Tombol Sidebar -->
    <button class="sidebar-toggle" onclick="toggleSidebar()">
        <i class="bi bi-caret-right-fill"></i>
    </button>

    <!-- Daftar Produk -->
    <div class="section">
        <div class="container">
            <h3 class="text-center h3">Produk</h3>
            <div class="product-grid">
                <?php
                $where = "1";

                if (!empty($_GET['search'])) {
                    $search = mysqli_real_escape_string($conn, $_GET['search']);
                    $where .= " AND produk_nama LIKE '%$search%'";
                }
                
                if (!empty($_GET['kategori'])) {
                    $kategori = mysqli_real_escape_string($conn, $_GET['kategori']);
                    $where .= " AND kategori_id = '$kategori'";
                }

                if (!empty($_GET['warna'])) {
                    $warna = mysqli_real_escape_string($conn, $_GET['warna']);
                    $where .= " AND warna = '$warna'";
                }
                
                $produk = mysqli_query($conn, "SELECT * FROM tb_produk WHERE $where ORDER BY produk_id DESC");

                if ($produk && mysqli_num_rows($produk) > 0) {
                    while ($p = mysqli_fetch_array($produk)) {
                ?>
                    <div class="card">
                        <a href="detail-produk.php?id=<?php echo $p['produk_id'] ?>">
                            <img src="produk/<?php echo htmlspecialchars($p['produk_image']); ?>" alt="<?php echo htmlspecialchars($p['produk_nama']); ?>" class="card-image">
                            <div class="card-content">
                                <h4><?php echo htmlspecialchars($p['produk_nama']); ?></h4>
                                <p class="warna"><?php echo htmlspecialchars($p['warna']); ?></p>
                                <p class="harga">Rp. <?php echo number_format($p['produk_price']); ?></p>
                            </div>
                        </a>
                    </div>
                <?php
                    }
                } else {
                    echo "<p>Produk tidak ditemukan.</p>";
                }
                ?>
            </div>
        </div>
    </div>

    <style>
    /* Sidebar */
    .sidebar {
    height: 100%;
    width: 0;
    position: fixed;
    top: 0;
    left: 0;
    background-color: #ffc0cb; /* Warna pink */
    overflow-x: hidden;
    transition: 0.5s;
    padding-top: 60px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    z-index: 1000; /* Pastikan z-index tinggi agar di atas elemen lainnya */
}
    .sidebar h3 {
        padding: 10px 20px;
        font-size: 18px;
        color: #fff;
        margin-bottom: 10px;
        border-bottom: 1px solid #fff;
    }

    .sidebar ul {
        list-style: none;
        padding: 0;
    }

    .sidebar ul li {
        padding: 10px 20px;
    }

    .sidebar ul li a {
        text-decoration: none;
        color: #fff;
        display: block;
        transition: 0.3s;
    }

    .sidebar ul li a:hover {
        background: #ff91a4;
        border-radius: 4px;
    }

    .sidebar .close-btn {
        position: absolute;
        top: 10px;
        right: 20px;
        font-size: 24px;
        background: none;
        border: none;
        color: #fff;
        cursor: pointer;
    }

    .sidebar-toggle {
        font-size: 24px;
        background: none;
        border: none;
        cursor: pointer;
        color: #ff91a4;
        position: fixed;
        top: 15px;
        left: 15px;
        z-index: 1000;
    }

    .sidebar-toggle:hover {
        color: #ff5672;
    }
    
    body {
        background-color: #ffe6f0;
    }
    </style>

    <script>
    function toggleSidebar() {
        const sidebar = document.getElementById('sidebar');
        if (sidebar.style.width === '250px') {
            sidebar.style.width = '0';
        } else {
            sidebar.style.width = '250px';
        }
    }
    </script>

    <!-- Footer -->
    <?php include "footer.php"; ?>

</body>
</html>
