<?php
    include 'db.php';
    $kontak = mysqli_query($conn, "SELECT admin_telp, admin_email, admin_address FROM tb_admin WHERE admin_id = 1");
    $a = mysqli_fetch_object($kontak);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Suitestyle</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <div class="container">
            <h1><a href="index.php">Suitstyle</a></h1>
            <ul>
                <li><a href="produk.php">Produk</a></li>
            </ul>
        </div>
    </header>

    <!-- search -->
    <div class="search">
        <div>
            <form action="produk.php" method="GET">
                <input type="text" name="search" placeholder="Cari Produk" value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>">
                <input type="hidden" name="kategori" value="<?php echo isset($_GET['kategori']) ? $_GET['kategori'] : ''; ?>">
                <input type="submit" name="cari" value="Cari Produk">
            </form>
        </div>
    </div>

    <!-- new product -->
    <div class="section">
        <div class="container">
            <h3>Produk</h3>
            <div class="box">
                <?php
                // Inisialisasi variabel where
                $where = "1";

                // Periksa apakah parameter search atau kategori di-set
                if (!empty($_GET['search']) || !empty($_GET['kategori'])) {
                    $search = isset($_GET['search']) ? mysqli_real_escape_string($conn, $_GET['search']) : '';
                    $kategori = isset($_GET['kategori']) ? mysqli_real_escape_string($conn, $_GET['kategori']) : '';
                    $where = "produk_nama LIKE '%$search%' AND kategori_id LIKE '%$kategori%'";
                }

                // Query produk

                $produk = mysqli_query($conn, "SELECT * FROM tb_produk WHERE $where ORDER BY produk_id DESC");


                // Periksa hasil query
                if ($produk && mysqli_num_rows($produk) > 0) {
                    while ($p = mysqli_fetch_array($produk)) {
                ?>
                        <a href="detail-produk.php?id=<?php echo $p['produk_id'] ?>">
                            <div class="col-7">
                                <img src="produk/<?php echo $p['produk_image'] ?>" alt="<?php echo htmlspecialchars($p['produk_nama']) ?>">
                                <p class="nama"><?php echo substr(htmlspecialchars($p['produk_nama']), 0, 30) ?></p>
                                <p class="harga">Rp. <?php echo number_format($p['produk_price']) ?></p>
                            </div>
                        </a>
                <?php
                    }
                } else {
                ?>
                    <p>Produk tidak ada</p>
                <?php
                }
                ?>
            </div>
        </div>
    </div>

        <!-- footer -->
        <div class="footer">
            <div class="container">
                <h4>Alamat</h4>
                <p><?php echo $a->admin_address ?></p>

                <h4>Email</h4>
                <p><?php echo $a->admin_email ?></p>

                <h4>No. Hp</h4>
                <p><?php echo $a->admin_telp ?></p>
                <small>Copyright &copy; 2024 - Suitestyle.</small>
            </div>
        </div>
</body>
</html>
