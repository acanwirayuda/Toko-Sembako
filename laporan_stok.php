<?php
session_start();
include 'config/koneksi.php';

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

$data = mysqli_query(
    $koneksi,
    "SELECT * FROM barang
    ORDER BY stok ASC"
);

$total = mysqli_query(
    $koneksi,
    "SELECT SUM(stok) as total_stok
    FROM barang"
);

$jumlah = mysqli_fetch_assoc($total);
?>

<!DOCTYPE html>
<html>
<head>

    <title>Laporan Stok</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>

        body{
            background:#0f172a;
            color:white;
        }

        .header-card{
            background:#1e293b;
            border-radius:20px;
            padding:25px;
            margin-bottom:25px;
        }

        .summary-card{
            background:linear-gradient(135deg,#16a34a,#15803d);
            border:none;
            border-radius:20px;
            color:white;
        }

        .table-card{
            background:#1e293b;
            border-radius:20px;
            overflow:hidden;
        }

        .table{
            color:white;
            margin-bottom:0;
        }

        .table thead{
            background:#334155;
        }

        .product-img{
            width:60px;
            height:60px;
            object-fit:cover;
            border-radius:10px;
        }

    </style>

</head>
<body>

<div class="container mt-4">

    <div class="header-card">

        <h2>
            <i class="bi bi-archive"></i>
            Laporan Stok Barang
        </h2>

        <p class="mb-0">
            Monitoring stok seluruh barang
        </p>

    </div>

    <div class="row mb-4">

        <div class="col-md-4">

            <div class="card summary-card">

                <div class="card-body text-center">

                    <i class="bi bi-box-seam fs-1"></i>

                    <h5 class="mt-2">
                        Total Seluruh Stok
                    </h5>

                    <h1>
                        <?= $jumlah['total_stok'] ?? 0; ?>
                    </h1>

                </div>

            </div>

        </div>

    </div>

    <div class="mb-3">

        <a href="dashboard.php"
           class="btn btn-light">

            <i class="bi bi-arrow-left"></i>
            Dashboard

        </a>

    </div>

    <div class="table-card">

        <table class="table table-hover">

            <thead>

                <tr>

                    <th>No</th>
                    <th>Foto</th>
                    <th>Nama Barang</th>
                    <th>Stok</th>
                    <th>Status</th>

                </tr>

            </thead>

            <tbody>

            <?php
            $no = 1;

            while($row = mysqli_fetch_assoc($data)){
            ?>

                <tr>

                    <td><?= $no++; ?></td>

                    <td>

                        <?php if(!empty($row['foto'])){ ?>

                            <img
                            src="assets/upload/<?php echo $row['foto']; ?>"
                            class="product-img">

                        <?php } ?>

                    </td>

                    <td>

                        <?php echo $row['nama_barang']; ?>

                    </td>

                    <td>

                        <?php echo $row['stok']; ?>

                    </td>

                    <td>

                        <?php if($row['stok'] <= 15){ ?>

                            <span class="badge bg-danger">
                                Stok Menipis
                            </span>

                        <?php }else{ ?>

                            <span class="badge bg-success">
                                Aman
                            </span>

                        <?php } ?>

                    </td>

                </tr>

            <?php } ?>

            </tbody>

        </table>

    </div>

</div>

</body>
</html>