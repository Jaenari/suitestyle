<?php
include '../db.php';

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
            <form action="" method="POST" enctype="multipart/form-data">
    <input type="text" name="kategori_nama" placeholder="Nama Kategori" class="input-control" required>
    <label>Upload Foto</label>
    <input type="file" name="foto" class="input-control" required>
    <input type="submit" name="submit" value="Submit" class="btn">
</form>

                    <?php
if (isset($_POST['submit'])) {
    $nama = $_POST['kategori_nama']; // Pastikan sesuai dengan name di form
    $filename = $_FILES['foto']['name'];
    $tmp_name = $_FILES['foto']['tmp_name'];

    // Validasi apakah file telah diunggah
    if ($filename != '') {
        // Lokasi penyimpanan gambar
        $path = '../kategori/' . $filename;

        // Pindahkan file ke folder
        if (move_uploaded_file($tmp_name, $path)) {
            // Query untuk insert data
            $insert = mysqli_query($conn, "INSERT INTO tb_kategori (kategori_nama, foto) VALUES ('$nama', '$filename')");

            if ($insert) {
                echo '<script>alert("Data berhasil disimpan")</script>';
                echo '<script>window.location="data-kategori.php"</script>';
            } else {
                echo 'Gagal menyimpan ke database: ' . mysqli_error($conn);
            }
        } else {
            echo '<script>alert("Gagal mengunggah file")</script>';
        }
    } else {
        echo '<script>alert("File foto wajib diunggah!")</script>';
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
