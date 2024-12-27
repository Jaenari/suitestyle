<?php
// Koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "suitestyle");

// Ambil warna dari dropdown (default 'all')
$filter_warna = isset($_GET['filter_warna']) ? $_GET['filter_warna'] : 'all';

// Query untuk filter
if ($filter_warna == 'all') {
    $query = "SELECT * FROM tb_kategori";
} else {
    $query = "SELECT * FROM tb_kategori WHERE warna = '$filter_warna'";
}

$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" type="text/css" href="css/admin.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filter Kategori</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f4f4f4;
        }

        select {
            margin-bottom: 10px;
            padding: 5px;
        }
    </style>
</head>
<body>
    <h1>Filter Kategori Berdasarkan Warna</h1>
    
    <!-- Dropdown Filter -->
    <form method="GET" action="">
        <label for="filter_warna">Pilih Warna:</label>
        <select name="filter_warna" id="filter_warna" onchange="this.form.submit()">
            <option value="all" <?= $filter_warna == 'all' ? 'selected' : '' ?>>Semua</option>
            <option value="Merah" <?= $filter_warna == 'Merah' ? 'selected' : '' ?>>Merah</option>
            <option value="Biru" <?= $filter_warna == 'Biru' ? 'selected' : '' ?>>Biru</option>
            <option value="Kuning" <?= $filter_warna == 'Kuning' ? 'selected' : '' ?>>Kuning</option>
        </select>
    </form>

    <!-- Tabel Data -->
    <table>
        <thead>
            <tr>
                <th>Kategori</th>
                <th>Warna</th>
            </tr>
        </thead>
        <tbody>
            <?php if (mysqli_num_rows($result) > 0): ?>
                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                    <tr>
                        <td><?= $row['kategori_nama'] ?></td>
                        <td><?= $row['warna'] ?></td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="2">Tidak ada data</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>
