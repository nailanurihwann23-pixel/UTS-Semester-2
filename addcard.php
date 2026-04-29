<?php
session_start();
include 'koneksi.php';
include 'navbar.php';

$id = $_GET['id'];

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

if (isset($_SESSION['cart'][$id])) {
    $_SESSION['cart'][$id]++;
} else {
    $_SESSION['cart'][$id] = 1;
}

header("Location: produk.php");
exit;
?>