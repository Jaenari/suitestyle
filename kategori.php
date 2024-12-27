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
    <style>
        body {
            font-family: 'Quicksand', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #fef6fc;
        }
        .section {
            padding: 20px;
            text-align: center;
        }
        .container h3 {
            font-size: 2rem;
            margin-bottom: 20px;
            color: #e91e63;
        }
        .box {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 20px;
        }
        .card {
            background-color: #fff;
            border-radius: 15px;
            overflow: hidden;
            width: 200px;
            text-align: center;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
        }
        .card:hover {
            transform: scale(1.05);
        }
        .card img {
            width: 100%;
            height: 150px;
            object-fit: cover;
        }
        .card p {
            margin: 10px 0;
            font-size: 1rem;
            font-weight: bold;
        }
        a {
            text-decoration: none;
            color: inherit;
        }
    </style>
</head>
<body>

<!-- Kategori -->
<div class="section">
    <div class="container">
        <h3>Kategori</h3>
        <div class="box">
            <?php 
            $kategori = mysqli_query($conn, "SELECT * FROM tb_kategori ORDER BY kategori_id DESC");
            if (mysqli_num_rows($kategori) > 0) {
                while ($k = mysqli_fetch_array($kategori)) {
            ?>
            <a href="produk.php?kategori=<?php echo $k['kategori_id'] ?>">
                <div class="card">
                    <img src="img/icon1.jpg" alt="Kategori">
                    <p><?php echo $k['kategori_nama'] ?></p>
                </div>
            </a>
            <?php }} else { ?>
                <p>Kategori tidak ada</p>
            <?php } ?>
        </div>
    </div>
</div>

<?php include "footer.php";?>

</body>
</html>
