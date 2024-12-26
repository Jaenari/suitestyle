<?php
// Set delay waktu splash screen (7 detik)
header("Refresh: 7; url=index.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Splash Screen</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh; /* Tinggi layar penuh */
            background-color: #f4f4f4;
            font-family: Arial, sans-serif;
        }

        .splash img {
            width: 100%; /* Gambar memenuhi lebar layar */
            height: 50vh; /* Gambar memenuhi tinggi layar */
            object-fit: cover; /* Gambar tidak terdistorsi */
        }

        .splash h1 {
            position: absolute; /* Supaya teks di atas gambar */
            font-size: 3rem;
            color: rgb(243, 109, 191);
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }
        .splash {
            animation: fadeIn 1.5s ease-in-out;
        }
        .text-center{
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="splash">
        <img src="img/Loading.png" alt="Splash Image">
        <h1 class="text-center">Suitstyle</h1>
    </div>
</body>
</html>
