<?php
include'db.php';
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentang Kami</title>
    <link rel="stylesheet" type="text/css" href="css/navbar.css">
</head>
<body>
    <div class="container">
        <h1>Tentang Kami</h1>
        <div class="info">
            <p><strong>Nama:</strong> John Doe</p>
            <p><strong>Email:</strong> johndoe@example.com</p>
            <p><strong>WhatsApp:</strong> <a href="https://wa.me/1234567890">+62 123 456 7890</a></p>
            <p><strong>Instagram:</strong> <a href="https://instagram.com/johndoe">@johndoe</a></p>
            <p><strong>TikTok:</strong> <a href="https://tiktok.com/@johndoe">@johndoe</a></p>
            <p><strong>Alamat:</strong> Jl. Contoh Alamat No. 123, Kota Contoh, Indonesia</p>
        </div>
    </div>
</body>
</html>

<style>
body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
}

.container {
    width: 50%;
    margin: 50px auto;
    background: #fff;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h1 {
    text-align: center;
    color: #d5006d; /* Warna pink */
}

.info {
    margin-top: 20px;
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