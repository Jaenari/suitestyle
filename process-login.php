<?php
session_start();
include 'db.php'; // Pastikan file ini berisi koneksi ke database Anda

// Periksa apakah parameter ID ada di URL
if (!isset($_GET['id']) || empty($_GET['user_id'])) {
    echo "<script>alert('ID produk tidak ditemukan!'); window.location='produk.php';</script>";
    exit;
}

$produk_id = mysqli_real_escape_string($conn, $_GET['id']);

// Query untuk mengambil data produk berdasarkan ID
$produk = mysqli_query($conn, "SELECT * FROM tb_produk WHERE produk_id = '$produk_id'");
$p = mysqli_fetch_object($produk);

if (!$p) {
    echo "<script>alert('Produk tidak ditemukan!'); window.location='produk.php';</script>";
    exit;
}

// Jika metode request adalah POST, lakukan proses login
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Query untuk memeriksa email dan password
    $query = "SELECT * FROM tb_users WHERE email = '$email'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);

        // Verifikasi password
        if (password_verify($password, $user['password'])) {
            // Set session
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['nama'];

            // Redirect ke halaman detail produk dengan ID yang sama
            header("Location: detail-produk.php?id=" . urlencode($produk_id));
            exit;
        } else {
            echo "<script>alert('Password salah!'); window.location='login-u.php?id=" . urlencode($produk_id) . "';</script>";
        }
    } else {
        echo "<script>alert('Email tidak ditemukan!'); window.location='login-u.php?id=" . urlencode($produk_id) . "';</script>";
    }
} else {
    // Jika bukan metode POST, redirect kembali ke login dengan parameter ID
    header("Location: login-u.php?id=" . urlencode($produk_id));
    exit;
}
?>
