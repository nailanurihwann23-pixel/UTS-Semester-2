<?php
include 'koneksi.php';

// ================== SEARCH ==================
$keyword = isset($_GET['cari']) ? $_GET['cari'] : '';

if ($keyword != '') {
    $result = mysqli_query($conn, "
        SELECT * FROM produk 
        WHERE nama_produk LIKE '%$keyword%' 
        ORDER BY id_produk DESC
    ");
} else {
    $result = mysqli_query($conn, "
        SELECT * FROM produk 
        ORDER BY id_produk DESC
    ");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Toko Online</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
    body {
        background-color: #fff0f5;
    }

    .bg-pink {
        background-color: #ff69b4;
    }

    .btn-pink {
        background-color: #ff69b4;
        color: white;
        border: none;
    }

    .btn-pink:hover {
        background-color: #ff1493;
        color: white;
    }

    .text-pink {
        color: #ff1493;
    }

    .card {
        border: none;
        border-radius: 15px;
        transition: 0.3s;
    }

    .card:hover {
        transform: scale(1.05);
    }
    </style>
</head>

<body>

<?php include 'navbar.php'; ?>

<!-- SEARCH BAR -->
<div class="container mt-3">
    <form method="GET" action="index.php" class="d-flex">
        <input type="text" name="cari" class="form-control me-2" placeholder="Cari produk...">
        <button class="btn btn-pink">Cari</button>
    </form>
</div>

<!-- BANNER -->
<div class="container-fluid bg-pink text-white text-center py-5 mt-3">
    <h2 class="fw-bold">Welcome to the world of meaningful gifts.</h2>
    <p>pilihan hadiah unik dan estetik yang cocok untuk kamu yang ingin memberikan sesuatu yang berbeda dan berkesan.</p>
</div>

<!-- CAROUSEL -->
<div id="carouselNaisa" class="carousel slide" data-bs-ride="carousel" data-bs-interval="2000">

  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselNaisa" data-bs-slide-to="0" class="active"></button>
    <button type="button" data-bs-target="#carouselNaisa" data-bs-slide-to="1"></button>
  </div>

  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="gambar/bunga1.jpeg" class="d-block w-100" style="height:350px; object-fit:cover;">
    </div>

    <div class="carousel-item">
      <img src="gambar/bunga4.jpeg" class="d-block w-100" style="height:350px; object-fit:cover;">
    </div>
  </div>

  <button class="carousel-control-prev" type="button" data-bs-target="#carouselNaisa" data-bs-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </button>

  <button class="carousel-control-next" type="button" data-bs-target="#carouselNaisa" data-bs-slide="next">
    <span class="carousel-control-next-icon"></span>
  </button>

</div>

<!-- PRODUK -->
<div class="container mt-5" id="produk">

    <h3 class="text-center mb-4 text-pink">Produk</h3>

    <?php if ($keyword != '') { ?>
        <p class="text-center text-muted">
            Hasil pencarian: <b><?= htmlspecialchars($keyword); ?></b>
        </p>
    <?php } ?>

    <div class="row">

    <?php while($row = mysqli_fetch_assoc($result)){ ?>

        <div class="col-md-3 mb-3">
            <div class="card shadow-sm">

                <img src="gambar/<?= htmlspecialchars($row['gambar']); ?>" 
                     onerror="this.src='gambar/bungamawar.jpg'"
                     class="card-img-top"
                     style="height:200px; object-fit:cover;">

                <div class="card-body text-center">

                    <h5><?= htmlspecialchars($row['nama_produk']); ?></h5>

                    <p class="text-pink fw-bold">
                        Rp <?= number_format($row['harga'], 0, ',', '.'); ?>
                    </p>

                    <a href="detail.php?id=<?= $row['id_produk']; ?>" 
                       class="btn btn-pink btn-sm">
                        Lihat Detail
                    </a>

                </div>

            </div>
        </div>

    <?php } ?>

    </div>
</div>

<!-- AUTO SCROLL AFTER SEARCH -->
<script>
window.onload = function() {
    const urlParams = new URLSearchParams(window.location.search);

    if (urlParams.has('cari')) {
        document.getElementById('produk').scrollIntoView({
            behavior: 'smooth'
        });
    }
};
</script>

<!-- BOOTSTRAP JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>