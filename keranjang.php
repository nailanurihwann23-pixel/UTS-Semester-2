<?php
include 'koneksi.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Keranjang Belanja</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body{
            background-color:#fff0f5;
        }

        .btn-pink{
            background:#ff69b4;
            color:white;
        }

        .btn-pink:hover{
            background:#ff1493;
            color:white;
        }

        .card{
            border:none;
            border-radius:15px;
        }
    </style>
</head>

<body>

<div class="container mt-5">

    <h3 class="mb-4 text-center text-pink">🛒 Keranjang Belanja</h3>

    <a href="index.php" class="btn btn-secondary mb-3">← Kembali</a>

    <?php
    // ambil data keranjang + join produk
    $result = mysqli_query($conn, "
        SELECT 
            keranjang.id_keranjang,
            keranjang.qty,
            produk.id_produk,
            produk.nama_produk,
            produk.harga,
            produk.gambar
        FROM keranjang
        JOIN produk ON keranjang.id_produk = produk.id_produk
        ORDER BY keranjang.id_keranjang DESC
    ");
    ?>

    <?php if (mysqli_num_rows($result) == 0) { ?>
        <div class="alert alert-warning text-center">
            Keranjang masih kosong 😢
        </div>
    <?php } ?>

    <div class="row g-3">

    <?php
    $total_semua = 0;

    while ($row = mysqli_fetch_assoc($result)) {

        $subtotal = $row['harga'] * $row['qty'];
        $total_semua += $subtotal;
    ?>

        <div class="col-md-4">

            <div class="card shadow-sm p-3 h-100">

                <img src="gambar/<?= $row['gambar']; ?>" 
                     class="img-fluid mb-2"
                     style="height:180px; object-fit:cover; border-radius:10px;">

                <h5><?= $row['nama_produk']; ?></h5>

                <p class="mb-1">
                    Harga: Rp <?= number_format($row['harga'],0,',','.'); ?>
                </p>

                <p class="mb-1">
                    Qty: <b><?= $row['qty']; ?></b>
                </p>

                <p class="fw-bold text-success">
                    Subtotal: Rp <?= number_format($subtotal,0,',','.'); ?>
                </p>

                <a href="hapus_keranjang.php?id=<?= $row['id_keranjang']; ?>"
                   class="btn btn-danger btn-sm w-100"
                   onclick="return confirm('Hapus produk ini?')">
                   Hapus
                </a>

            </div>

        </div>

    <?php } ?>

    </div>

    <!-- TOTAL -->
    <?php if (mysqli_num_rows($result) > 0) { ?>
        <div class="card mt-4 p-3 text-center shadow">

            <h4>Total Belanja</h4>
            <h3 class="text-pink">
                Rp <?= number_format($total_semua,0,',','.'); ?>
            </h3>

            <a href="checkout.php" class="btn btn-pink mt-2">
                Checkout Sekarang
            </a>

        </div>
    <?php } ?>

</div>

</body>
</html>