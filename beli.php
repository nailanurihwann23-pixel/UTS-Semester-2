<?php
include 'koneksi.php';

$id = $_GET['id'];
$data = mysqli_query($conn, "SELECT * FROM produk WHERE id='$id'");
$d = mysqli_fetch_array($data);

$no_wa = "6281234567890"; // ganti nomor kamu

$pesan = "Halo, saya mau beli " . $d['nama_produk'] . 
         " dengan harga Rp " . $d['harga'];

$pesan = urlencode($pesan);

header("Location: https://wa.me/$no_wa?text=$pesan");
exit;
?>