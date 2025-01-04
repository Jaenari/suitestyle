<?php
include 'db.php';
?>



<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentang Kami</title>
    <link rel="stylesheet" type="text/css" href="css/navbar.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<?php include "navbar.php"; ?>
<body class ="body1">
    <div class="container1">
        <h1 class ="h1">Tentang Kami</h1>
        <div class="info">
            <p><strong>Nama:</strong> Suitstyle</p>
            <p><strong>Email:</strong> sriwar89137981@gmail.com</p>
            <p><strong>WhatsApp:</strong> <a href="https://wa.me/081256298148">+62 123 456 7890</a></p>
            <p><strong>Instagram:</strong> <a href="https://instagram.com/suitstyke">@suitstyle</a></p>
            <p><strong>TikTok:</strong> <a href="https://tiktok.com/@johndoe">@suitstyle</a></p>
            <p><strong>Alamat:</strong> Jl. Cemara Raya Banjarmasin</p>
        </div>
    </div>
</body>
</html>

<style>
.body1 {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
}

.container1 {
    width: 50%;
    margin: 50px auto;
    margin-bottom: 50px;
    background: #fff;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.h1 {
    text-align: center;
    color: #d5006d; /* Warna pink */
}

.info {
    margin-top: 20px;
    margin-bottom: 100px;
}

p {
    font-size: 18px;
    line-height: 1.6;
}

a {
    color: #d5006d; /* Warna pink */
    text-decoration: none;
}

a:hover {
    text-decoration: underline;
}
</style>

<?php include "footer.php"; ?>