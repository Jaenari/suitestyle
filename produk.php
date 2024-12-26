<?php
    include 'db.php';
    $kontak = mysqli_query($conn, "SELECT admin_telp, admin_email, admin_address FROM tb_admin WHERE admin_id = 1");
    $a = mysqli_fetch_object($kontak);
?>
<?php include "navbar.php"; ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Suitestyle</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/navbar.css">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
</head>
<body>

    <!-- new product -->
    <div class="section">
        <div class="container">
            <h3>Produk</h3>
            <div class="box">
                <?php
                // Inisialisasi variabel where
                
                $where = "1"; // Default condition

                // Cek apakah ada parameter pencarian dan kategori
                if (!empty($_GET['search'])) {
                    $search = mysqli_real_escape_string($conn, $_GET['search']);
                    $where .= " AND produk_nama LIKE '%$search%'";
                }
                
                if (!empty($_GET['kategori'])) {
                    $kategori = mysqli_real_escape_string($conn, $_GET['kategori']);
                    $where .= " AND kategori_id = '$kategori'";
                }
                
                // Query produk berdasarkan kondisi pencarian dan kategori
                $produk = mysqli_query($conn, "SELECT * FROM tb_produk WHERE $where ORDER BY produk_id DESC");
                


                // Periksa hasil query
                if ($produk && mysqli_num_rows($produk) > 0) {
                    while ($p = mysqli_fetch_array($produk)) {
                ?>
             

        <!-- footer -->
        <div class="footer">
            <div class="container">
                <h4>Alamat</h4>
                <p><?php echo $a->admin_address ?></p>

                <h4>Email</h4>
                <p><?php echo $a->admin_email ?></p>

                <h4>No. Hp</h4>
                <p><?php echo $a->admin_telp ?></p>
                <small>Copyright &copy; 2024 - Suitestyle.</small>
            </div>
        </div>
</body>
</html>
