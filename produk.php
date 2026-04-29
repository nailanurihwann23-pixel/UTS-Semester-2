<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

$result = mysqli_query($conn, "SELECT * FROM produk ORDER BY id_produk DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Kelola Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<div class="container mt-5">

    <h3>Data Produk</h3>

    <a href="tambah.php" class="btn btn-primary mb-3">+ Tambah Produk</a>
    <a href="admin.php" class="btn btn-secondary mb-3">Kembali</a>

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Gambar</th>
            <th>Nama</th>
            <th>Harga</th>
            <th>Aksi</th>
        </tr>

        <?php $no=1; while($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td><?= $no++; ?></td>
            <td>
                <img src="gambar/<?= $row['gambar']; ?>" width="80">
            </td>
            <td><?= $row['nama_produk']; ?></td>
            <td>Rp <?= number_format($row['harga']); ?></td>
            <td>
                <a href="edit.php?id=<?= $row['id_produk']; ?>" class="btn btn-warning btn-sm">Edit</a>
                <a href="hapus.php?id=<?= $row['id_produk']; ?>" 
                   class="btn btn-danger btn-sm"
                   onclick="return confirm('Yakin hapus?')">Hapus</a>
            </td>
        </tr>
        <?php } ?>

    </table>

</div>

</body>
</html>