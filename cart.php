<!DOCTYPE html>
<html>
<head>

  <title>Keranjang</title>

  <!-- BOOTSTRAP CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

  <!-- isi website kamu di sini -->
   <?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['cart']) || !is_array($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}
?>

<div class="container mt-4">

  <!-- NAV BACK -->
  <a href="index.php" class="btn btn-outline-success mb-3">
    ← Kembali ke Home
  </a>

  <h3 class="mb-4">Keranjang Belanja</h3>

<?php if (empty($_SESSION['cart'])) { ?>
  <div class="alert alert-warning">
    Keranjang masih kosong 😢
  </div>
<?php } ?>

<div class="row g-3">

<?php foreach ($_SESSION['cart'] as $id => $qty) { ?>

<?php
$result = mysqli_query($conn, "SELECT * FROM produk WHERE id=$id");
$row = mysqli_fetch_assoc($result);
?>

  <!-- CARD PRODUK -->
  <div class="col-12 col-md-6 col-lg-4">

    <div class="card shadow-sm h-100">

      <!-- GAMBAR -->
      <img src="gambar/<?= $row['gambar']; ?>" 
           class="card-img-top"
           style="height:150px; object-fit:cover;">

      <!-- BODY -->
      <div class="card-body">

        <h6 class="card-title"><?= $row['nama_produk']; ?></h6>

        <p class="text-muted mb-1">
          Rp <?= number_format($row['harga'],0,',','.'); ?>
        </p>

        <span class="badge bg-secondary mb-2">
          Qty: <?= $qty; ?>
        </span>

        <br>

        <a href="#" class="btn btn-danger btn-sm w-100">
          Hapus
        </a>

      </div>

    </div>

  </div>

<?php } ?>

</div>

</div>

  <!-- BOOTSTRAP JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>