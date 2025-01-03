<?php
session_start();
include 'db.php'; // Pastikan file ini berisi koneksi ke database Anda

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Periksa apakah data POST tersedia
    if (empty($_POST['email']) || empty($_POST['password'])) {
        echo "<script>alert('Semua data harus diisi!'); window.location='produk.php';</script>";
        exit;
    }

    $produk_id = $_POST['produk_id'] ?? null;
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Gunakan prepared statement untuk mencegah SQL Injection
    $stmt = $conn->prepare("SELECT * FROM tb_users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        // Verifikasi password
        if (password_verify($password, $user['password'])) {
            // Set session
            session_start();
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['nama'];
            $_SESSION['user_role'] = $user['role'];

            if ($user['role'] === 'admin') {
                header("Location: admin/dashboard.php");
                exit;

            }

            if ($produk_id) {
                header("Location: detail-produk.php?id=" . urlencode($produk_id));
                exit;
            }

            header("Location: index.php?");
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