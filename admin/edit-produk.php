<?php
session_start();
include '../db.php';

    $produk = mysqli_query($conn, "SELECT * FROM tb_produk WHERE produk_id = '".$_GET['id']."' ");
    if(mysqli_num_rows($produk) == 0){
        echo '<script>window.location="data-produk.php"</script>';
    }
    $p = mysqli_fetch_object($produk);
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
            <h3>Edit Data Produk</h3>
            <div class="box">
                <form action="" method="POST" enctype="multipart/form-data">
                    <select class="input-control" name="kategori" required>
                        <option value="">---Pilih---</option>
                        <?php
                            $kategori = mysqli_query($conn, "SELECT * FROM tb_kategori ORDER BY kategori_id DESC");
                            while($r = mysqli_fetch_array($kategori)){ 
                        ?>
                        <option value="<?php echo $r['kategori_id'] ?>" <?php echo ($r['kategori_id'] == $p->kategori_id)? 'selected':''; ?>><?php echo $r['kategori_nama'] ?></option>
                    <?php } ?>
                    </select>

                    <input type="text" name="nama" class="input-control" placeholder="Nama Produk" value="<?php echo $p->produk_nama ?>" required>
                    <input type="text" name="harga" class="input-control" placeholder="Harga" value="<?php echo $p->produk_price ?>" required>
                    <input type="text" name="warna" class="input-control" placeholder="Warna" value="<?php echo $p->warna ?>" required>
                    <textarea name="produk_deskripsi" id="produk_deskripsi" cols="30" rows="10" class="input-control" placeholder="<?php echo $p->produk_deskripsi ?>"></textarea>
                    <img src="../produk/<?php echo $p->produk_image ?>" width="100px">
                    <input type="hidden" name="foto" value="<?php echo $p->produk_image ?>">
                    <input type="file" name="gambar" class="input-control">
                    <input type="submit" name="submit" value="Submit" class="btn">
                </form>
                <?php
                    if(isset($_POST['submit'])) {

                        // data inputan dari form
                        $kategori   = $_POST['kategori'];
                        $nama       = $_POST['nama'];
                        $harga      = $_POST['harga'];
                        $warna      = $_POST['warna'];
                        $produk_deskripsi = $_POST['produk_deskripsi'];
                        $foto       = $_POST['foto'];

                        // data gambar yang baru
                        $filename = $_FILES['gambar']['name'];
                        $tmp_name = $_FILES['gambar']['tmp_name'];


                        // jika admin ganti gambar 
                        if($filename != ''){
                            $type1 = explode('.', $filename);
                        $type2 = $type1[1];

                        $newname = 'produk'.time().'.'.$type2;

                         //manampung data format file yang diizinkan
                        $tipe_diizinkan = array('jpg', 'jpeg', 'png', 'gif');
                        
                            // validasi format file
                            if(!in_array($type2, $tipe_diizinkan)){
                            // jika format file tidak ada di dalam tipe diizinkan
                            echo '<script>alert("Format file tidak diizinkan")</script>';
                            }else{
                                unlink('../produk/'.$foto);
                                move_uploaded_file($tmp_name, '../produk/'.$newname);
                                $namagambar = $newname;

                            }

                        }else{
                             // jika admin tidak ganti gambar
                            $namagambar = $foto;

                        }

                        // query update data produk
                        $update = mysqli_query($conn, "UPDATE tb_produk SET 
                                                Kategori_id = '".$kategori."', 
                                                produk_nama = '".$nama."',  
                                                produk_price = '".$harga."',
                                                warna = '".$warna."',
                                                produk_deskripsi = '".$produk_deskripsi."',
                                                produk_image = '".$namagambar."'
                                                WHERE produk_id = '".$p->produk_id."' ");
                        if($update){
                            echo '<script>alert("Ubah data berhasil")</script>';
                            echo '<script>window.location="data-produk.php"</script>';
                        }else{
                            echo 'gagal' .mysqli_error($conn);
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
