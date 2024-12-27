<?php
session_start();
include 'db.php';
if (!isset($_SESSION['status_login']) || $_SESSION['status_login'] != true) {
        echo '<script>window.location="login.php"</script>';
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Suitestyle</title>
    <link rel="stylesheet" type="text/css" href="css/admin.css">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <div class="container">
            <h1><a href="dashboard.php">Suitstyle</a></h1>
            <ul>
                <li><a href="dashboard.php">Dashboard</a></li>
                <li><a href="profil.php">Profil</a></li>
                <li><a href="data-kategori.php">Data Kategori</a></li>
                <li><a href="data-produk.php">Data Produk</a></li>
                <li><a href="keluar.php">Keluar</a></li>
            </ul>
        </div>
    </header>
    <div class="section">
        <div class="container">
            <h3>Tambah Data Kategori</h3>
            <div class="box">
                <form action="" method="POST">
                    <input type="text" name="kategori_nama" placeholder="Nama Kategori" class="input-control" required>
                    <input type="submit" name="submit" value="Submit" class="btn">
                </form>
                <?php
                    if (isset($_POST['submit'])) {
                    // Ambil data dari form
                    $nama = ucwords($_POST['kategori_nama']);

                    // Query untuk insert data tanpa kolom warna
                    $insert = mysqli_query($conn, "INSERT INTO tb_kategori (kategori_nama) VALUES ('".$nama."')");

                    // Cek apakah berhasil  
                    if ($insert) {
                        echo '<script>alert("Berhasil menambahkan kategori!");</script>';
                        echo '<script>window.location="data-kategori.php";</script>';
                    } else {
                        echo 'Gagal: ' . mysqli_error($conn);
                    }
                }
                ?>

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
