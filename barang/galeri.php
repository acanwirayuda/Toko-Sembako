<?php
include '../config/koneksi.php';

$data = mysqli_query(
    $koneksi,
    "SELECT * FROM barang
    ORDER BY nama_barang ASC"
);
?>

<!DOCTYPE html>
<html>
<head>

    <title>Galeri Barang</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>

        body{
            background:#0f172a;
            color:white;
        }

        .header-box{
            background:#1e293b;
            border-radius:20px;
            padding:25px;
            margin-bottom:25px;
            box-shadow:0 5px 20px rgba(0,0,0,.2);
        }

        .product-card{
            background:#1e293b;
            border:none;
            border-radius:20px;
            overflow:hidden;
            transition:.3s;
            height:100%;
        }

        .product-card:hover{
            transform:translateY(-8px);
        }

        .product-img{
            height:220px;
            width:100%;
            object-fit:cover;
        }

        .product-name{
            font-size:18px;
            font-weight:bold;
            color:white;
        }

    </style>

</head>
<body>

<div class="container mt-4">

    <div class="header-box">

        <h2>
            <i class="bi bi-images"></i>
            Galeri Barang
        </h2>

        <p class="mb-0 text-light">
            Daftar seluruh barang yang tersedia
        </p>

    </div>

    <div class="mb-4">

        <a href="../dashboard.php"
           class="btn btn-light">

            <i class="bi bi-arrow-left"></i>
            Dashboard

        </a>

    </div>

    <div class="row g-4">

        <?php while($row = mysqli_fetch_assoc($data)){ ?>

        <div class="col-md-3">

            <div class="card product-card">

                <?php if(!empty($row['foto'])){ ?>

                    <img
                        src="../assets/upload/<?php echo $row['foto']; ?>"
                        class="product-img">

                <?php } ?>

                <div class="card-body text-center">

                    <div class="product-name">

                        <?php echo $row['nama_barang']; ?>

                    </div>

                </div>

            </div>

        </div>

        <?php } ?>

    </div>

</div>

</body>
</html>