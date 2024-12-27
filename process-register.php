<?php
include 'db.php'; // Pastikan file ini berisi koneksi ke database Anda

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fullname = mysqli_real_escape_string($conn, $_POST['nama']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $hashed_password = password_hash($password, PASSWORD_DEFAULT); // Hash password

    // Periksa apakah email sudah terdaftar
    $query = "SELECT * FROM tb_users WHERE email = '$email'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        echo "<script>alert('Email sudah terdaftar!'); window.location='register.php';</script>";
    } else {
        // Simpan data pengguna baru
        $insert = "INSERT INTO tb_users (nama, email, password) VALUES ('$fullname', '$email', '$hashed_password')";
        if (mysqli_query($conn, $insert)) {
            echo "<script>alert('Registrasi berhasil! Silakan login.'); window.location='login-u.php';</script>";
        } else {
            echo "<script>alert('Terjadi kesalahan, coba lagi!'); window.location='register.php';</script>";
        }
    }
} else {
    header("Location: register.php");
    exit;
}
?>
