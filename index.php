<?php
// Start session and check if the user has already visited
session_start();

if (!isset($_COOKIE['visited'])) {
    setcookie('visited', 'true', time() + 3600, '/'); // Cookie valid for 1 hour
    header("Location: home.php");
    exit;
}

include 'db.php';
$kontak = mysqli_query($conn, "SELECT admin_telp, admin_email, admin_address FROM tb_admin WHERE admin_id = 1");
$a = mysqli_fetch_object($kontak);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Suitestyle</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <!-- <link rel="stylesheet" type="text/css" href="css/navbar.css"> -->
    <link rel="stylesheet" type="text/css" href="css/cards.css">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
    
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        #carouselExample {
            max-width: 1000px;
            margin: 0 auto;
            border-radius: 10px;
            overflow: hidden;
        }

        #carouselExample img {
            object-fit: cover;
            height: 500px;
            width: 100%;
        }
        
        
        
        body {
            background-color: #ffe6f0;
        }
        

    </style>
    
</head>

<body>
    <?php include "navbar.php"; ?>
    
    <!-- Carousel -->
    <div class="pt-5">
        <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="img/1.jpg" class="d-block w-100" alt="Slide 1">
                </div>
                <div class="carousel-item">
                    <img src="img/2.jpg" class="d-block w-100" alt="Slide 2">
                </div>
                <div class="carousel-item">
                    <img src="img/3.jpg" class="d-block w-100" alt="Slide 3">
                </div>
                <div class="carousel-item">
                    <img src="img/4.png" class="d-block w-100" alt="Slide 4">
                </div>
                <div class="carousel-item">
                    <img src="img/5.png" class="d-block w-100" alt="Slide 5">
                </div>
                <div class="carousel-item">
                    <img src="img/6.png" class="d-block w-100" alt="Slide 6">
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

    <!-- JavaScript for Carousel -->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var navbarHeight = document.querySelector('.fixed-top').offsetHeight;
            document.body.style.paddingTop = navbarHeight + "px";
        });
    </script>
    <style>
        .h3{
            color: #FF66A3;
            font-weight: bold;
        }
    </style>

    <!-- New Product Section -->
    <div class="section">
        <div class="container">
            <h3 class="text-center h3">Produk Terbaru</h3>
            <div class="product-grid">
                <?php
                $produk = mysqli_query($conn, "SELECT * FROM tb_produk ORDER BY produk_id DESC LIMIT 3");
                if (mysqli_num_rows($produk) > 0) {
                    while ($p = mysqli_fetch_array($produk)) {
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
                <?php 
                    }
                } else {
                    echo "<p>Produk tidak ada</p>";
                }
                ?>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <?php include "footer.php"; ?>
</body>

</html>
