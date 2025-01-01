<?php
include_once 'db.php';
// Tangkap parameter 'produk_id' dari URL
if (!isset($_GET['produk_id']) || empty($_GET['produk_id'])) {
    echo "<script>alert('Produk ID tidak ditemukan!'); window.location='produk.php';</script>";
    exit;
}
$produk_id = $_GET['produk_id'];

$produk = mysqli_query($conn, "SELECT * FROM tb_produk WHERE produk_id=$produk_id ORDER BY produk_id DESC");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <style>
        body {
            background-color: #ffe6f0;
        }
        .login-container {
            max-width: 400px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h3 class="text-center mb-4">Login</h3>
        <form action="process-login.php" method="POST">
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <input type="hidden" name="produk_id" value="<?php echo htmlspecialchars($produk_id); ?>">
            <button type="submit" class="btn btn-primary w-100">Login</button>
        </form>
    </div>
</body>
</html>
