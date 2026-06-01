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

    <style>

        body{
            background:#0f172a;
            color:white;
            min-height:100vh;
        }

        .navbar{
            background:#1e293b !important;
            box-shadow:0 4px 15px rgba(0,0,0,.3);
        }

        .navbar-brand{
            font-size:24px;
            font-weight:700;
        }

        .btn-logout{
            border-radius:10px;
            padding:8px 18px;
        }

        .welcome-box{
            background:#1e293b;
            border-radius:20px;
            padding:25px;
            margin-bottom:25px;
            box-shadow:0 5px 20px rgba(0,0,0,.2);
        }

        .stat-card{
    border:none;
    border-radius:20px;
    color:white;
    transition:.3s;
    overflow:hidden;
    cursor:pointer;
}

        .stat-card:hover{
            transform:translateY(-8px);
        }

        .bg-card-1{
            background:linear-gradient(135deg,#2563eb,#1d4ed8);
        }

        .bg-card-2{
            background:linear-gradient(135deg,#16a34a,#15803d);
        }

        .bg-card-3{
            background:linear-gradient(135deg,#f59e0b,#d97706);
        }

        .stat-icon{
            font-size:50px;
            opacity:.8;
        }

        .stat-number{
            font-size:40px;
            font-weight:bold;
        }

        .menu-card{
    background:#1e293b;
    border-radius:20px;
    padding:30px;
    margin-top:25px;
    margin-bottom:25px;

    margin-left:117px;
    margin-right:117px;

    box-shadow:0 5px 20px rgba(0,0,0,.25);
}

.menu-card:hover{
    transform:translateY(-5px);
}

.menu-link{
    text-decoration:none;
    color:white;
    display:block;
}

.menu-link:hover{
    color:white;
}

.menu-link p{
    color:#cbd5e1;
}

        .btn-menu{
            border-radius:12px;
            padding:12px 24px;
            font-size:18px;
        }

        #sliderPromo{
    margin-left:117px;
    margin-right:117px;
}

        .carousel{
            border-radius:20px;
            overflow:hidden;
            box-shadow:0 5px 20px rgba(0,0,0,.3);
        }

        .carousel-caption{
            background:rgba(0,0,0,.45);
            border-radius:15px;
            padding:15px;
        }

        footer{
            color:#94a3b8;
        }

    </style>

</head>

<body class="d-flex flex-column">

<nav class="navbar navbar-dark">

    <div class="container">

        <span class="navbar-brand">
            🛒 SEMBAKO4_CN!!!
        </span>

        <a href="logout.php"
           class="btn btn-light btn-logout">

            <i class="bi bi-box-arrow-right"></i>
            Logout

        </a>

    </div>

</nav>

<div class="container mt-4">

    <div class="welcome-box">

        <h2>
            Selamat Datang,
            <?= $_SESSION['username']; ?> 👋
        </h2>

        <p class="mb-0 text-light">
            Kelola data barang dengan mudah dan cepat.
        </p>

    </div>

    <div class="row g-4">

        <div class="col-md-4">

    <a href="barang/galeri.php"
       class="text-decoration-none text-white">

        <div class="card stat-card bg-card-1">

            <div class="card-body text-center">

                <i class="bi bi-box-seam stat-icon"></i>

                <h5 class="mt-3">
                    Total Barang
                </h5>

                <div class="stat-number">
                    <?= $total_barang; ?>
                </div>

            </div>

        </div>

    </a>

</div>

<div class="col-md-4">

    <a href="laporan_stok.php"
       class="text-decoration-none text-white">

        <div class="card stat-card bg-card-2">

            <div class="card-body text-center">

                <i class="bi bi-archive stat-icon"></i>

                <h5 class="mt-3">
                    Total Stok
                </h5>

                <div class="stat-number">
                    <?= $stok['total_stok'] ?? 0; ?>
                </div>

            </div>

        </div>

    </a>

</div>

        <div class="col-md-4">

    <a href="profil.php"
       class="text-decoration-none text-white">

        <div class="card stat-card bg-card-3">

            <div class="card-body text-center">

                <i class="bi bi-person-circle stat-icon"></i>

                <h5 class="mt-3">
                    Admin Aktif
                </h5>

                <div class="stat-number">
                    1
                </div>

            </div>

        </div>

    </a>

</div>
        </div>

    </div>
<div class="menu-card">

    <a href="barang/index.php"
       class="menu-link">

        <div class="d-flex justify-content-between align-items-center">

            <div>

                <h3 class="mb-2">
                    <i class="bi bi-box-fill"></i>
                    Kelola Barang
                </h3>

                <p class="mb-0">
                    Tambah, edit, hapus, dan kelola seluruh data barang.
                </p>

            </div>

            <div>

                <i class="bi bi-arrow-right-circle fs-1"></i>

            </div>

        </div>

    </a>

</div>

    <div id="sliderPromo"
         class="carousel slide"
         data-bs-ride="carousel">

        <div class="carousel-indicators">

            <button type="button"
                    data-bs-target="#sliderPromo"
                    data-bs-slide-to="0"
                    class="active"></button>

            <button type="button"
                    data-bs-target="#sliderPromo"
                    data-bs-slide-to="1"></button>

            <button type="button"
                    data-bs-target="#sliderPromo"
                    data-bs-slide-to="2"></button>

        </div>

        <div class="carousel-inner">

            <div class="carousel-item active">

                <img src="assets/slider/d3891a8c40f64954d5cca87a778aaed9.jpg"
                     class="d-block w-100"
                     style="height:400px; object-fit:cover;">

                <div class="carousel-caption">

                    <h3>Selamat Datang</h3>

                    <p>
                        Sistem Toko Sembako Modern
                    </p>

                </div>

            </div>

            <div class="carousel-item">

                <img src="assets/slider/sembakolagi.jpg"
                     class="d-block w-100"
                     style="height:400px; object-fit:cover;">

                <div class="carousel-caption">

                    <h3>Produk Berkualitas</h3>

                    <p>
                        Kelola stok lebih mudah
                    </p>

                </div>

            </div>

            <div class="carousel-item">

                <img src="assets/slider/lagi.jpg"
                     class="d-block w-100"
                     style="height:400px; object-fit:cover;">

                <div class="carousel-caption">

                    <h3>Mudah Digunakan</h3>

                    <p>
                        Cepat, sederhana dan efisien
                    </p>

                </div>

            </div>

        </div>

    </div>

</div>

<footer class="mt-auto text-center py-4">

    <hr class="border-secondary">

    Sistem Toko Sembako Sederhana<br>
    Acan Wirayuda © 2026

</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>