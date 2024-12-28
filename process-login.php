<?php
session_start();
include 'db.php'; // Pastikan file ini berisi koneksi ke database Anda
$produk = mysqli_query($conn, "SELECT * FROM tb_produk WHERE $where ORDER BY produk_id DESC");

// Periksa apakah data POST dan produk_id tersedia
if (!isset($_POST['produk_id']) || empty($_POST['produk_id'])) {
    echo "<script>alert('Produk ID tidak ditemukan!'); window.location='produk.php';</script>";
    exit;
}

    $produk_id = mysqli_real_escape_string($conn, $_POST['produk_id']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Query untuk memeriksa email di database
    $query = "SELECT * FROM tb_users WHERE email = '$email'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);

        // Verifikasi password
        if (password_verify($password, $user['password'])) {
            // Set session
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['nama'];

            // Redirect ke halaman detail produk dengan ID yang sesuai
            header("Location: detail-produk.php?produk_id=" . urlencode($produk_id));
            exit;
        } else {
            // Password salah
            echo "<script>alert('Password salah!'); window.location='login-u.php?produk_id=" . urlencode($produk_id) . "';</script>";
            exit;
        }
    } else {
        // Email tidak ditemukan
        echo "<script>alert('Email tidak ditemukan!'); window.location='login-u.php?produk_id=" . urlencode($produk_id) . "';</script>";
        exit;
    }
} else {
    // Jika bukan metode POST
    header("Location: produk.php");
    exit;
}
?>
