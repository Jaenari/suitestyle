<?php
session_start();

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Tambahkan produk ke keranjang
if (isset($_POST['produk_id'])) {
    $produk_id = $_POST['produk_id'];
    $_SESSION['cart'][] = $produk_id;

    // Redirect kembali ke halaman sebelumnya
    header("Location: " . $_SERVER['HTTP_REFERER']);
    exit;
}
?>
