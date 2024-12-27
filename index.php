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

<!-- boostrap -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>


</head>
<body>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" type="text/css" href="css/cards.css"> <!-- Tambahkan file CSS baru -->
</head>
    
<!-- Carousel Item -->
<div class="pt-5">
    <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="img/c5.jpeg" class="d-block w-100" alt="Slide 1">
            </div>
            <div class="carousel-item">
                <img src="img/c4.jpeg" class="d-block w-100" alt="Slide 2">
            </div>
            <div class="carousel-item">
                <img src="img/c6.jpeg" class="d-block w-100" alt="Slide 3">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>


<style>
    #carouselExample {
    max-width: 800px; /* Atur lebar maksimal carousel */
    margin: 0 auto; /* Pusatkan carousel */
    border-radius: 10px; /* Tambahkan sudut melengkung (opsional) */
    overflow: hidden; /* Hindari gambar keluar dari area carousel */
}

#carouselExample img {
    object-fit: cover; /* Potong gambar agar sesuai dengan area carousel */
    height: 500px; /* Atur tinggi carousel */
    width: 200%; /* Pastikan gambar memenuhi lebar */
}
body {
    padding-top: 70px; /* Sesuaikan dengan tinggi navbar */
}
</style>

<!--Java Script Carousel Item -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        var navbarHeight = document.querySelector('.fixed-top').offsetHeight;
        document.body.style.paddingTop = navbarHeight + "px";
    });
</script>


<!-- -->


    <!-- new product -->
    <div class="section">
        <div class="container">
            <h3 class = "text-center">Produk Terbaru</h3>
            <div class="product-grid">
                    <?php
                        $produk = mysqli_query($conn, "SELECT * FROM tb_produk ORDER BY produk_id DESC LIMIT 3");
                        if (mysqli_num_rows($produk) > 0) {
                            while($p = mysqli_fetch_array($produk)){
                    ?>

                    <div class="card">
                        <a href="detail-produk.php?id=<?php echo $p['produk_id'] ?>">
                        <div class="card-content">
                        <img class="card-image" src="produk/<?php echo $p['produk_image'] ?>" alt="<?php echo $p['produk_nama'] ?>">
                            <h4 class="nama"><?php echo substr($p['produk_nama'], 0, 30) ?></h4>
                            <p class="harga">Rp. <?php echo number_format($p['produk_price']) ?></p>
                        </div>
                        </a>
                    </div>
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
