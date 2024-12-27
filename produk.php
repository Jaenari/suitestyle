<?php
    include 'db.php';
    $kontak = mysqli_query($conn, "SELECT admin_telp, admin_email, admin_address FROM tb_admin WHERE admin_id = 1");
    $a = mysqli_fetch_object($kontak);
?>

<?php include "navbar.php"; ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Suitestyle</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/navbar.css">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
</head>
<body>

    <!-- new product -->
    <div class="section">
        <div class="container">
            <h3>Produk</h3>
            <div class="box">
                <?php
                // Inisialisasi variabel where
                $where = "1"; // Default condition

                // Cek apakah ada parameter pencarian dan kategori
                if (!empty($_GET['search'])) {
                    // Mengambil input pencarian dan memfilter menggunakan LIKE
                    $search = mysqli_real_escape_string($conn, $_GET['search']);
                    $where .= " AND produk_nama LIKE '%$search%'";
                }
                
                if (!empty($_GET['kategori'])) {
                    // Jika kategori terpilih, filter berdasarkan kategori
                    $kategori = mysqli_real_escape_string($conn, $_GET['kategori']);
                    $where .= " AND kategori_id = '$kategori'";
                }
                
                // Query produk berdasarkan kondisi pencarian dan kategori
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
                    echo "<p>Produk tidak ditemukan.</p>";
                }
                ?>
            </div>
        </div>
    </div>

    <!-- footer -->
    <?php include "footer.php";?>
    
    </div>
</body>
</html>
