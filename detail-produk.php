<?php
    include 'db.php';
    $kontak = mysqli_query($conn, "SELECT admin_telp, admin_email, admin_address FROM tb_admin WHERE admin_id = 1");
    $a = mysqli_fetch_object($kontak);

    $produk = mysqli_query($conn, "SELECT * FROM tb_produk WHERE produk_id = '".$_GET['id']."' ");
    $p = mysqli_fetch_object($produk);
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



    <!-- produk detail -->
    <div class="section">
        <div class="container">
            <h3>Detail Produk</h3>
            <div class="box">
                <div class="col-2">
                    <img src="produk/<?php echo htmlspecialchars($p->produk_image); ?>" width="100%">
                </div>
                <div class="col-2">
                    <h3><?php echo htmlspecialchars($p->produk_nama); ?></h3>
                    <h4>Rp. <?php echo number_format($p->produk_price); ?></h4>
                    <p>Deskripsi :<br>
                        <?php echo nl2br(htmlspecialchars($p->produk_deskripsi)); ?>
                    </p>
                    <p><a href="https://api.whatsapp.com/send?phone=<?php echo htmlspecialchars($a->admin_telp); ?>&text=Hai, saya ingin membeli produk anda." target="_blank">
                        Hubungi Via Whatsapp
                        <img src="img/wa.jpeg" width="50px"></a></p>
                </div>
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
