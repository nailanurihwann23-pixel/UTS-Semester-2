<?php
session_start();
include 'koneksi.php';

$id = $_GET['id'];
$data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM produk WHERE id_produk=$id"));

if (isset($_POST['submit'])) {

    $nama = $_POST['nama'];
    $harga = $_POST['harga'];
    $deskripsi = $_POST['deskripsi'];

    if ($_FILES['gambar']['name'] != "") {

        $gambar = $_FILES['gambar']['name'];
        $tmp = $_FILES['gambar']['tmp_name'];

        move_uploaded_file($tmp, "gambar/".$gambar);

        mysqli_query($conn, "UPDATE produk SET 
            nama_produk='$nama',
            harga='$harga',
            deskripsi='$deskripsi',
            gambar='$gambar'
            WHERE id_produk=$id");

    } else {

        mysqli_query($conn, "UPDATE produk SET 
            nama_produk='$nama',
            harga='$harga',
            deskripsi='$deskripsi'
            WHERE id_produk=$id");
    }

    header("Location: produk.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Produk</title>
</head>

<body>

<div class="container mt-5">
    <h3>Edit Produk</h3>

    <form method="POST" enctype="multipart/form-data">

        <input type="text" name="nama" value="<?= $data['nama_produk']; ?>" class="form-control mb-2">
        <input type="number" name="harga" value="<?= $data['harga']; ?>" class="form-control mb-2">

        <textarea name="deskripsi" class="form-control mb-2"><?= $data['deskripsi']; ?></textarea>

        <img src="gambar/<?= $data['gambar']; ?>" width="100" class="mb-2"><br>

        <input type="file" name="gambar" class="form-control mb-3">

        <button type="submit" name="submit" class="btn btn-warning">Update</button>
    </form>
</div>

</body>
</html>