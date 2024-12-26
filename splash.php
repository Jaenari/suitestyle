<?php
// Set delay waktu splash screen (3 detik)
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
            height: 100%;
            background-color: #f4f4f4;
            font-family: Arial, sans-serif;
        }
        .splash {
            text-align: center;
        }
        .splash h1 {
            font-size: 3rem;
            color: #d91e18;
        }
        .splash img {
            max-width: 150px;
            margin-bottom: 20px;
        }
        .splash p {
            font-size: 1.2rem;
            color: #333;
        }
    </style>
</head>
<body>
    <div class="splash">
        <img src="img/Loading.png" alt="Logo">
        <h1>Suitstyle</h1>
    </div>
</body>
</html>
