<?php
session_start();
include 'db.php'; // Pastikan file ini berisi koneksi ke database Anda

// Tangkap produk_id dari URL (Metode GET)
if (isset($_GET['produk_id'])) {
    $produk_id = htmlspecialchars($_GET['produk_id']); // Sanitasi data
} else {
    echo "<script>alert('Produk tidak ditemukan!'); window.location='produk.php';</script>";
    exit;
}

// Query untuk mengambil detail produk berdasarkan produk_id
$stmt = $conn->prepare("SELECT * FROM tb_produk WHERE produk_id = ?");
$stmt->bind_param("s", $produk_id);
$stmt->execute();
$result = $stmt->get_result();

// Periksa apakah produk ditemukan
if ($result && $result->num_rows > 0) {
    $produk = $result->fetch_assoc(); // Ambil data produk
} else {
    echo "<script>alert('Produk tidak ditemukan!'); window.location='produk.php';</script>";
    exit;
}

$kontak = mysqli_query($conn, "SELECT admin_telp, admin_email, admin_address FROM tb_admin WHERE admin_id = 1");
$a = mysqli_fetch_object($kontak);
// Nomor telepon admin (gunakan data dari database jika tersedia)
$admin_telp = $a->admin_telp; // Ganti dengan data aktual dari database atau konfigurasi
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <style>
        body {
            background-color: #ffe6f0; 
            color: #333; 
        }

        .card {
            background-color: #ffcce0;
            border: none;
        }

        .btn-success {
            background-color: #ff99cc; 
            border-color: #ff80bf;
        }

        .btn-success:hover {
            background-color: #ff80bf; 
            border-color: #ff66b2;
        }

        .btn-primary {
            background-color: #ff80bf; 
            border-color: #ff66b2;
        }

        .btn-secondary {
            background-color: #ffcce0; 
            border-color: #ff99cc;
        }

        .alert-info {
            background-color: #ffd9e6; 
            color: #333;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Checkout</h2>

        <!-- Informasi Produk -->
        <div class="card mb-4">
            <div class="card-body">
                <div class="row">
                    <!-- Gambar Produk -->
                    <div class="col-md-4 text-center">
                        <strong>Foto Produk:</strong>
                        <br>
                        <img src="produk/<?php echo htmlspecialchars($produk['produk_image']); ?>" alt="Foto Produk"
                            class="img-thumbnail" style="max-width: 100%; height: auto;">
                    </div>

                    <!-- Detail Produk -->
                    <div class="col-md-8">
                        <h4 class="card-title">Detail Produk</h4>
                        <p><strong>Nama Produk:</strong> <?php echo htmlspecialchars($produk['produk_nama']); ?></p>
                        <p><strong>Harga:</strong> Rp. <?php echo number_format($produk['produk_price']); ?></p>
                        <p><strong>Deskripsi:</strong>
                            <?php echo nl2br(htmlspecialchars($produk['produk_deskripsi'])); ?></p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Form Alamat -->
        <form action="" method="GET" onsubmit="redirectToWhatsApp(event)">
            <label for="address">Alamat:</label>
            <input type="text" id="address" name="address" class="form-control mb-3" required
                placeholder="Masukkan alamat Anda">
            <input type="submit" value="Kirim ke WhatsApp" class="btn btn-success">
        </form>

        <!-- Pertanyaan Login/Register -->
        <?php if (!isset($_SESSION['user_id'])) { ?>
            <div class="alert alert-info text-center mt-4" role="alert">
                Apakah kamu sudah punya akun?
            </div>
            <div class="d-flex justify-content-center">
                <!-- Tombol untuk Login -->
                <a href="login-u.php?produk_id=<?php echo urlencode($produk_id); ?>" class="btn btn-primary me-3">Yes</a>

                <!-- Tombol untuk Register -->
                <a href="register.php?produk_id=<?php echo urlencode($produk_id); ?>" class="btn btn-secondary">No</a>
            </div>
        <?php } ?>
    </div>

</body>

<script>
    function redirectToWhatsApp(event) {
        event.preventDefault();

        // Ambil nilai dari input alamat
        const address = document.getElementById('address').value;

        // Data dinamis untuk produk dan nomor telepon
        const adminTelp = "<?php echo htmlspecialchars($admin_telp); ?>";
        const produkNama = "<?php echo htmlspecialchars($produk['produk_nama']); ?>";
        const harga = "<?php echo htmlspecialchars($produk['produk_price']); ?>";
        const deskripsi = "<?php echo htmlspecialchars($produk['produk_deskripsi']); ?>";


        // Encode pesan agar sesuai dengan format URL
        const message = `Hai, saya ingin membeli produk ${produkNama}. \n
                         ${deskripsi} \n
                         Dengan Harga Rp. ${harga}. \n
                         Mohon dikirim ke Alamat saya: ${address}`;
        const encodedMessage = encodeURIComponent(message);

        // Redirect ke WhatsApp
        const whatsappURL = `https://api.whatsapp.com/send?phone=${adminTelp}&text=${encodedMessage}`;
        window.location.href = whatsappURL;
    }
</script>

</html>