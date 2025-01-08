<?php
session_start();

if (isset($_SESSION['role']) && $_SESSION['role'] !== 'admin') {
    echo '<script>alert("ooops, 403:Forbidden");window.location="index.php"</script>';
    exit;
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Suitestyle</title>
    <link rel="stylesheet" type="text/css" href="../css/admin.css">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
</head>
<style>
    body {
            background-color: #ffe6f0;
        }
</style>

<body>
    <header>
        <div class="container">
            <h1><a href="dashboard.php">Suitestyle</a></h1>
            <ul>
                <li><a href="dashboard.php">Dashboard</a></li>
                <li><a href="profil.php">Profil</a></li>
                <li><a href="data-kategori.php">Data Kategori</a></li>
                <li><a href="data-produk.php">Data Produk</a></li>
                <li><a href="../keluar.php">Keluar</a></li>
            </ul>
        </div>
    </header>
    <div class="section">
        <div class="container">
            <h3>Dashboard</h3>
            <div class="box">
                <h4>Selamat Datang, <?= $_SESSION['username'] ?> Suitestyle</h4>
            </div>
        </div>
    </div>
    <footer>
        <div class="container">
            <small>Copyright &copy; 2024 - Suitstyle.</small>
        </div>
    </footer>
</body>

</html>