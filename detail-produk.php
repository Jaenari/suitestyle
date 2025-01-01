<?php
include 'db.php';
session_start();
if (!isset($_SESSION['produk_id'])) {
    echo "<script>alert('Login Dulu yaa'); window.location='login-u.php?id=" . urlencode($produk_id) . "';</script>";
}



// Ambil informasi kontak admin
$kontak = mysqli_query($conn, "SELECT admin_telp, admin_email, admin_address FROM tb_admin WHERE admin_id = 1");
$a = mysqli_fetch_object($kontak);

// Ambil data produk berdasarkan ID dari parameter URL
$produk = mysqli_query($conn, "SELECT * FROM tb_produk WHERE produk_id = '" . $_GET['id'] . "' ");
$p = mysqli_fetch_object($produk);
?>
<?php include "navbar.php"; ?>

<style>
    .product-detail-box {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    background: #fefefe;
    border: 1px solid #ddd;
    border-radius: 10px;
    padding: 20px;
}

.product-image {
    flex: 1 1 50%;
    max-width: 300px;
    text-align: center;
}

.product-image img {
    max-width: 100%;
    border-radius: 10px;
}

.product-info {
    flex: 1 1 50%;
}

.product-info h2 {
    font-size: 24px;
    margin-bottom: 10px;
}

.product-info h4 {
    color: #ff3366;
    font-size: 20px;
    margin-bottom: 20px;
}

.product-description,
.product-material {
    margin-bottom: 20px;
}

.product-material ul {
    list-style: none;
    padding: 0;
}

.product-material li {
    margin-bottom: 5px;
}

.btn {
    display: inline-block;
    padding: 10px 15px;
    color: #fff;
    text-decoration: none;
    border-radius: 5px;
    margin-top: 10px;
}

.btn-whatsapp {
    background-color: #25d366;
    display: flex;
    align-items: center;
    gap: 5px;
}

.btn-add-cart {
    background-color: #ff3366;
}

</style>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Suitestyle - Detail Produk</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/navbar.css">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
</head>
<body>
    <!-- Detail Produk -->
    <div class="section">
        <div class="container">
            <h3>Detail Produk</h3>
            <div class="product-detail-box mb-4">
                <!-- Kolom Gambar Produk -->
                <div class="product-image">
                    <img src="produk/<?php echo htmlspecialchars($p->produk_image); ?>" alt="<?php echo htmlspecialchars($p->produk_nama); ?>">
                </div>

                <!-- Kolom Informasi Produk -->
                <div class="product-info">
                    <h2><?php echo htmlspecialchars($p->produk_nama); ?></h2>
                    <h4>Rp. <?php echo number_format($p->produk_price); ?></h4>
                    <div class="product-description">
                        <h3>Deskripsi Produk</h3>
                        <p><?php echo nl2br(htmlspecialchars($p->produk_deskripsi)); ?><h2 class="mt-2">Warna</h2>
                        <h4><?php echo htmlspecialchars($p->warna); ?></h4></p>
                    </div>

                    <!-- Tombol Aksi -->
                    <div class="product-action">
                        <a href="https://api.whatsapp.com/send?phone=<?php echo htmlspecialchars($a->admin_telp); ?>&text=Hai, saya ingin membeli produk <?php echo htmlspecialchars($p->produk_nama); ?>." 
                           class="btn btn-whatsapp" target="_blank">
                            <img src="img/wa.jpeg" alt="Whatsapp" width="20px"> Hubungi via WhatsApp
                        </a>
                        <a href="checkout.php?produk_id=<?php echo urlencode($p->produk_id); ?>" class="btn btn-add-cart">

                        <button class="btn btn-add-cart">Checkout</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <?php include "footer.php"; ?>
</body>
</html>
