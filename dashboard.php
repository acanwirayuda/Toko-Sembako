<?php
session_start();
include 'config/koneksi.php';

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

$total_barang = mysqli_num_rows(
    mysqli_query($koneksi, "SELECT * FROM barang")
);

$data_stok = mysqli_query(
    $koneksi,
    "SELECT SUM(stok) as total_stok FROM barang"
);

$stok = mysqli_fetch_assoc($data_stok);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Toko Sembako</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body class="d-flex flex-column min-vh-100"
      style="background:#f4f6f9;">

<nav class="navbar navbar-dark bg-primary">
    <div class="container">
        <span class="navbar-brand">
            🛒Sembako4_CN!!!
        </span>

        <a href="logout.php" class="btn btn-light">
            Logout
        </a>
    </div>
</nav>

<div class="container mt-4">

    <center><h2>Selamat Datang <?= $_SESSION['username']; ?></h2></center>

    <div class="row mt-4">

    <div class="col-md-4">

    <div class="card border-0 shadow">

        <div class="card-body text-center">

            <i class="bi bi-box-seam fs-1 text-primary"></i>

            <h5 class="mt-2">Total Barang</h5>

            <h1><?= $total_barang; ?></h1>

        </div>

    </div>

</div>

    <div class="col-md-4">

    <div class="card border-0 shadow">

        <div class="card-body text-center">

            <i class="bi bi-archive fs-1 text-success"></i>

            <h5 class="mt-2">Total Stok</h5>

            <h1><?= $stok['total_stok'] ?? 0; ?></h1>

        </div>

    </div>

</div>
<div class="col-md-4">

    <div class="card border-0 shadow">

        <div class="card-body text-center">

            <i class="bi bi-person-circle fs-1 text-warning"></i>

            <h5 class="mt-2">Admin Aktif</h5>

            <h1>1</h1>

        </div>

    </div>

</div>
</div>
    

   <div class="mt-4">
    <a href="barang/index.php"
       class="btn btn-primary btn-lg shadow">

        <i class="bi bi-box-fill"></i>
        Kelola Barang

    </a>

<div class="container mt-5">

    <div id="sliderPromo" class="carousel slide shadow rounded overflow-hidden" data-bs-ride="carousel">

        <div class="carousel-indicators">
            <button type="button" data-bs-target="#sliderPromo" data-bs-slide-to="0" class="active"></button>
            <button type="button" data-bs-target="#sliderPromo" data-bs-slide-to="1"></button>
            <button type="button" data-bs-target="#sliderPromo" data-bs-slide-to="2"></button>
        </div>

        <div class="carousel-inner">

            <!-- Gambar 1 -->
            <div class="carousel-item active">
                <img src="assets/slider/d3891a8c40f64954d5cca87a778aaed9.jpg"
                     class="d-block w-100"
                     style="height:350px; object-fit:cover;">

                <div class="carousel-caption d-none d-md-block">
                    <h3>Selamat Datang</h3>
                    <p>Sistem Toko Sembako Sederhana</p>
                </div>
            </div>

            <!-- Gambar 2 -->
            <div class="carousel-item">
                <img src="assets/slider/sembakolagi.jpg"
                     class="d-block w-100"
                     style="height:350px; object-fit:cover;">

                <div class="carousel-caption d-none d-md-block">
                    <h3>Produk Berkualitas</h3>
                    <p>Stok Barang Selalu Terbaru</p>
                </div>
            </div>

            <!-- Gambar 3 -->
            <div class="carousel-item">
                <img src="assets/slider/lagi.jpg"
                     class="d-block w-100"
                     style="height:350px; object-fit:cover;">

                <div class="carousel-caption d-none d-md-block">
                    <h3>Mudah Dikelola</h3>
                    <p>Kelola Barang Dengan Cepat</p>
                </div>
            </div>

        </div>

        <button class="carousel-control-prev"
                type="button"
                data-bs-target="#sliderPromo"
                data-bs-slide="prev">

            <span class="carousel-control-prev-icon"></span>

        </button>

        <button class="carousel-control-next"
                type="button"
                data-bs-target="#sliderPromo"
                data-bs-slide="next">

            <span class="carousel-control-next-icon"></span>

        </button>

    </div>

</div>
<footer class="mt-auto">

    <hr>

    <div class="text-center text-muted py-3">

        Sistem Toko Sembako Sederhana
        Acan Wirayuda © 2026

    </div>

</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>