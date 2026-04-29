<?php
session_start();
include 'koneksi.php';

if (isset($_POST['submit'])) {

    $nama = $_POST['nama'];
    $harga = $_POST['harga'];
    $deskripsi = $_POST['deskripsi'];

    $gambar = $_FILES['gambar']['name'];
    $tmp = $_FILES['gambar']['tmp_name'];

    move_uploaded_file($tmp, "gambar/".$gambar);

    mysqli_query($conn, "INSERT INTO produk 
    (nama_produk, harga, gambar, deskripsi, created_at)
    VALUES ('$nama','$harga','$gambar','$deskripsi', NOW())");

    header("Location: produk.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Produk</title>
</head>

<body>

<div class="container mt-5">
    <h3>Tambah Produk</h3>

    <form method="POST" enctype="multipart/form-data">
        <input type="text" name="nama" placeholder="Nama Produk" class="form-control mb-2" required>
        <input type="number" name="harga" placeholder="Harga" class="form-control mb-2" required>

        <textarea name="deskripsi" class="form-control mb-2" placeholder="Deskripsi"></textarea>

        <input type="file" name="gambar" class="form-control mb-3" required>

        <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>

</body>
</html>