<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Toko Sembako</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">

    <div class="card">
        <div class="card-header">
            Toko Sembako
        </div>

        <div class="card-body">
            <h3>Selamat Datang, <?php echo $_SESSION['username']; ?> 👋</h3>

            <p>Sembako Terbaik</p>

            <a href="barang/index.php" class="btn btn-primary">
                Kelola Data Barang
            </a>

            <a href="logout.php" class="btn btn-danger">
                Logout
            </a>
        </div>
    </div>

</div>

</body>
</html>