<?php
include '../db.php';

// Ambil data pengguna dengan role admin dari tabel `tb_users`
$query = mysqli_query($conn, "SELECT * FROM tb_users WHERE role = 'admin'");
$d = mysqli_fetch_object($query);
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
            <h3>Profil</h3>
            <div class="box">
                <form action="" method="POST">
                    <input type="text" name="nama" placeholder="Nama Lengkap" class="input-control" value="<?php echo $d->nama ?>" required>
                    <input type="email" name="email" placeholder="Email" class="input-control" value="<?php echo $d->email ?>" required>
                    <input type="submit" name="submit" value="Ubah Profil" class="btn">
                </form>
                <?php
                    if (isset($_POST['submit'])) {
                        $nama   = ucwords($_POST['nama']);
                        $email  = $_POST['email'];

                        $update = mysqli_query($conn, "UPDATE tb_users SET 
                                        nama = '".$nama."',
                                        email = '".$email."'
                                        WHERE id = '".$d->id."' ");
                        if ($update) {
                            echo '<script>alert("Ubah data berhasil")</script>';
                            echo '<script>window.location="profil.php"</script>';
                        } else {
                            echo 'Gagal ' . mysqli_error($conn);
                        }
                    }
                ?>
            </div>

            <h3>Ubah Password</h3>
            <div class="box">
                <form action="" method="POST">
                    <input type="password" name="pass1" placeholder="Password Baru" class="input-control" required>
                    <input type="password" name="pass2" placeholder="Konfirmasi Password Baru" class="input-control" required>
                    <input type="submit" name="ubah_password" value="Ubah Password" class="btn">
                </form>
                <?php
                    if (isset($_POST['ubah_password'])) {
                        $pass1   = $_POST['pass1'];
                        $pass2   = $_POST['pass2'];

                        if ($pass2 !== $pass1) {
                            echo "<script>alert('Konfirmasi Password Baru tidak sesuai')</script>";
                        } else {
                            $u_pass = mysqli_query($conn, "UPDATE tb_users SET 
                                        password = '".md5($pass1)."'
                                        WHERE id = '".$d->id."' ");
                            if ($u_pass) {
                                echo '<script>alert("Ubah password berhasil")</script>';
                                echo '<script>window.location="profil.php"</script>';
                            } else {
                                echo 'Gagal ' . mysqli_error($conn);
                            }
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
