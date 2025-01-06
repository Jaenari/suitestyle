<?php
session_start();
include '../db.php';


$kategori = mysqli_query($conn, "SELECT * FROM tb_kategori WHERE kategori_id = '".$_GET['id']."' ");
if (mysqli_num_rows($kategori) == 0) {
    echo '<script>window.location="data-kategori.php"</script>';
    exit;
}
$k = mysqli_fetch_object($kategori);
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
                <li><a href="../index.php">Keluar</a></li>
            </ul>
        </div>
    </header>
    <div class="section">
        <div class="container">
            <h3>Edit Data Kategori</h3>
            <div class="box">
                <form action="" method="POST" enctype="multipart/form-data">
                    <label>Nama Kategori</label>
                    <input type="text" name="kategori_nama" placeholder="Nama Kategori" class="input-control" value="<?php echo $k->kategori_nama ?>" required>
                    
                    <label>Foto Saat Ini</label>
                    <img src="../kategori/<?php echo $k->foto ?>" width="100">
                    
                    <label>Ganti Foto</label>
                    <input type="file" name="foto" class="input-control">
                    
                    <input type="submit" name="submit" value="Submit" class="btn">
                </form>
                <?php
                if (isset($_POST['submit'])) {
                    $nama = ucwords($_POST['kategori_nama']);
                    $filename = $_FILES['foto']['name'];
                    $tmp_name = $_FILES['foto']['tmp_name'];

                    if ($filename != '') {
                        $path = '../kategori/' . $filename;

                        // Hapus foto lama
                        if (file_exists('../kategori/' . $k->kategori_foto)) {
                            unlink('../kategori/' . $k->kategori_foto);
                        }

                        // Pindahkan foto baru ke folder
                        move_uploaded_file($tmp_name, $path);

                        // Update data kategori dengan foto baru
                        $update = mysqli_query($conn, "UPDATE tb_kategori SET 
                            kategori_nama = '".$nama."', 
                            foto = '".$filename."' 
                            WHERE kategori_id = '".$k->kategori_id."'");
                    } else {
                        // Update data kategori tanpa mengganti foto
                        $update = mysqli_query($conn, "UPDATE tb_kategori SET 
                            kategori_nama = '".$nama."' 
                            WHERE kategori_id = '".$k->kategori_id."'");
                    }

                    if ($update) {
                        echo '<script>alert("Edit data berhasil!");</script>';
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
