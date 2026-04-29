<?php
session_start();
include 'koneksi.php';

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

$query = mysqli_query($conn, "SELECT * FROM produk WHERE id_produk = $id");
$produk = mysqli_fetch_assoc($query);

if (!$produk) {
    echo "<h3 class='text-center mt-5'>Produk tidak ditemukan</h3>";
    exit;
}

// ================= WA =================
$no_wa = "6281290264289";

$pesan = "Halo kak!\nSaya mau order:\n\n";
$pesan .= "🛍️ ".$produk['nama_produk']."\n";
$pesan .= "💰 Rp ".number_format($produk['harga'],0,',','.')."\n\n";
$pesan .= "Mohon info ya 🙏";

$link_wa = "https://wa.me/".$no_wa."?text=".urlencode($pesan);
?>

<!DOCTYPE html>
<html>
<head>
<title>Detail Produk</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<div class="container mt-5">
<div class="row justify-content-center">
<div class="col-md-8">

<div class="card p-4 shadow">

<div class="row">

<!-- GAMBAR -->
<div class="col-md-5">
<img src="gambar/<?= $produk['gambar']; ?>" 
     class="img-fluid"
     style="height:300px; object-fit:cover;">
</div>

<!-- DETAIL -->
<div class="col-md-7">

<h3><?= $produk['nama_produk']; ?></h3>

<h5 class="text-success">
Rp <?= number_format($produk['harga'],0,',','.'); ?>
</h5>

<p><?= $produk['deskripsi']; ?></p>

<!-- TOMBOL WA -->
<a href="<?= $link_wa; ?>" target="_blank" class="btn btn-success w-100">
Beli Sekarang (WhatsApp)
</a>

</div>

</div>
</div>

</div>
</div>
</div>

</body>
</html>