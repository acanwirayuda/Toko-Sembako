<?php
include '../config/koneksi.php';

$cari = "";

if(isset($_GET['cari']) && !empty($_GET['cari'])){
    $cari = $_GET['cari'];

    $data = mysqli_query(
        $koneksi,
        "SELECT * FROM barang
         WHERE nama_barang LIKE '%$cari%'
         ORDER BY id_barang DESC"
    );
}
else{
    $data = mysqli_query(
        $koneksi,
        "SELECT * FROM barang
         ORDER BY id_barang DESC"
    );
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Barang</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>

        body{
            background:#0f172a;
        }

        .page-title {
    color: #fff !important;
}

        .table-card{
    background:white;
    border-radius:20px;
    overflow:hidden;
}

.action-card{
    background:white;
    border-radius:20px;
}

        .table thead{
            background:#0d6efd;
            color:white;
        }

        .table td,
        .table th{
            vertical-align:middle;
        }

        .product-img{
            width:70px;
            height:70px;
            object-fit:cover;
            border-radius:10px;
            border:1px solid #ddd;
        }

        .search-box{
            background:white;
            padding:20px;
            border-radius:15px;
            box-shadow:0 3px 10px rgba(0,0,0,.05);
        }

        .btn{
            border-radius:10px;
        }

    </style>

</head>
<body>

<div class="container mt-4">

    <div class="d-flex justify-content-between align-items-center mb-3">

        <div>
    <h2 class="page-title text-white">
        <i class="bi bi-box-seam"></i>
        Data Barang
    </h2>

    <p class="text-light mb-0">
        Kelola data barang toko
    </p>
</div>

    </div>

    <a href="tambah.php" class="btn btn-success mb-3">
        <i class="bi bi-plus-circle"></i>
        Tambah Barang
    </a>

    <a href="../dashboard.php" class="btn btn-secondary mb-3">
        <i class="bi bi-arrow-left"></i>
        Kembali
    </a>

    <div class="search-box mb-4">

        <form method="GET">

            <div class="row">

                <div class="col-md-6">

                    <input
                        type="text"
                        name="cari"
                        class="form-control"
                        placeholder="Cari nama barang..."
                        value="<?= $cari ?>"
                    >

                </div>

                <div class="col-md-2">

                    <button class="btn btn-primary w-100">
                        <i class="bi bi-search"></i>
                        Cari
                    </button>

                </div>
                <div class="col-md-2">
                    <a href="index.php" class="btn btn-secondary w-100">
                        <i class="bi bi-arrow-clockwise"></i>
                        Reset
                    </a>
</div>

            </div>

        </form>

    </div>

    <div class="table-card">

        <table class="table table-hover mb-0">

            <thead>

                <tr>
                    <th width="70">No</th>
                    <th width="120">Foto</th>
                    <th>Nama Barang</th>
                    <th width="180">Harga</th>
                    <th width="100">Stok</th>
                    <th width="130">Aksi</th>
                </tr>

            </thead>

            <tbody>

            <?php
            $no = 1;

            if(mysqli_num_rows($data) > 0){

                while($row = mysqli_fetch_assoc($data)){
            ?>

                <tr>

                    <td><?= $no++; ?></td>

                    <td>

                        <?php if(!empty($row['foto'])){ ?>

                            <img
                                src="../assets/upload/<?= $row['foto']; ?>"
                                class="product-img"
                            >

                        <?php } ?>

                    </td>

                    <td>
                        <strong>
                            <?= $row['nama_barang']; ?>
                        </strong>
                    </td>

                    <td>
                        Rp <?= number_format($row['harga'],0,',','.'); ?>
                    </td>

                    <td>

                        <?php if($row['stok'] <= 10){ ?>

                            <span class="badge bg-danger">
                                <?= $row['stok']; ?>
                            </span>

                        <?php } else { ?>

                            <span class="badge bg-success">
                                <?= $row['stok']; ?>
                            </span>

                        <?php } ?>

                    </td>

                    <td>

                        <a
                            href="edit.php?id=<?= $row['id_barang']; ?>"
                            class="btn btn-warning btn-sm"
                            title="Edit">

                            <i class="bi bi-pencil-square"></i>

                        </a>

                       <a
    href="hapus.php?id=<?= $row['id_barang']; ?>"
    class="btn btn-danger btn-sm">

    <i class="bi bi-trash"></i>

</a>

                    </td>

                </tr>

            <?php
                }
            }else{
            ?>

                <tr>

                    <td colspan="6" class="text-center py-4">

                        <i class="bi bi-search"></i>
                        Barang tidak ditemukan

                    </td>

                </tr>

            <?php } ?>

            </tbody>

        </table>

    </div>

</div>

</body>
</html>