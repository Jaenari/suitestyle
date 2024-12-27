<?php

// Periksa apakah pengguna sudah melihat splash screen
if (!isset($_COOKIE['visited'])) {
    setcookie('visited', 'true', time() + 3600, '/'); // Cookie berlaku 1 jam
    header("Location: home.php");
    exit;
}


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
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="styles.css">
</head>
    


    <!-- new product -->
    <div class="section">
        <div class="container">
            <h3>Produk Terbaru</h3>
            <div class="box">
                    <?php
                        $produk = mysqli_query($conn, "SELECT * FROM tb_produk ORDER BY produk_id DESC LIMIT 8");
                        if (mysqli_num_rows($produk) > 0) {
                            while($p = mysqli_fetch_array($produk)){
                    ?>
                        <a href="detail-produk.php?id=<?php echo $p['produk_id'] ?>">
                        <div class="col-7">
                            <img src="produk/<?php echo $p['produk_image'] ?>">
                            <p class="nama"><?php echo substr($p['produk_nama'], 0, 30) ?></p>
                            <p class="harga">Rp. <?php echo number_format($p['produk_price']) ?></p>
                        </div>
                        </a>
                    <?php }}else{ ?>
                        <p>Produk tidak ada</p>
                    <?php } ?>
                </div>
            </div>
        </div>

        <!-- footer -->
         <?php include "footer.php";?>
</body>
</html>
