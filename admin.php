<?php
session_start();

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<div class="container mt-5">

    <h3>Halo, <?= $_SESSION['username']; ?> 👋</h3>
    <p>Selamat datang di halaman admin</p>

    <a href="produk.php" class="btn btn-success">Kelola Produk</a>
    <a href="logout.php" class="btn btn-danger">Logout</a>

</div>

</body>
</html>