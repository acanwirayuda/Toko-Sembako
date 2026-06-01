<?php
include '../config/koneksi.php';

$id = $_GET['id'];

$data = mysqli_query($koneksi,
    "SELECT * FROM barang WHERE id_barang='$id'");

$row = mysqli_fetch_assoc($data);

if(isset($_POST['update'])){

    $nama_barang = $_POST['nama_barang'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];

    $foto_baru = $_FILES['foto']['name'];
    $tmp       = $_FILES['foto']['tmp_name'];

    if(!empty($foto_baru)){

        move_uploaded_file(
            $tmp,
            "../assets/upload/".$foto_baru
        );

        mysqli_query($koneksi,
            "UPDATE barang SET
            nama_barang='$nama_barang',
            harga='$harga',
            stok='$stok',
            foto='$foto_baru'
            WHERE id_barang='$id'"
        );

    } else {

        mysqli_query($koneksi,
            "UPDATE barang SET
            nama_barang='$nama_barang',
            harga='$harga',
            stok='$stok'
            WHERE id_barang='$id'"
        );

    }

    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Barang</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>

        body{
            background:#f8fafc;
        }

        .form-card{
            background:white;
            border-radius:15px;
            box-shadow:0 5px 20px rgba(0,0,0,.08);
            padding:30px;
        }

        .page-title{
            font-weight:700;
        }

        .preview-img{
            width:180px;
            height:180px;
            object-fit:cover;
            border-radius:15px;
            border:1px solid #ddd;
        }

        .btn{
            border-radius:10px;
        }

    </style>

</head>
<body>

<div class="container mt-4">

    <h2 class="page-title mb-4">
        <i class="bi bi-pencil-square"></i>
        Edit Barang
    </h2>

    <div class="form-card">

        <form method="POST" enctype="multipart/form-data">

            <div class="mb-3">

                <label class="form-label">
                    Nama Barang
                </label>

                <input
                    type="text"
                    name="nama_barang"
                    value="<?= $row['nama_barang']; ?>"
                    class="form-control"
                    required>

            </div>

            <div class="mb-3">

                <label class="form-label">
                    Harga Barang
                </label>

                <input
                    type="number"
                    name="harga"
                    value="<?= $row['harga']; ?>"
                    class="form-control"
                    required>

            </div>

            <div class="mb-3">

                <label class="form-label">
                    Jumlah Stok
                </label>

                <input
                    type="number"
                    name="stok"
                    value="<?= $row['stok']; ?>"
                    class="form-control"
                    required>

            </div>

            <div class="mb-3">

                <label class="form-label">
                    Foto Saat Ini
                </label>

                <br>

                <?php if(!empty($row['foto'])){ ?>

                    <img
                        src="../assets/upload/<?= $row['foto']; ?>"
                        class="preview-img">

                <?php } ?>

            </div>

            <div class="mb-4">

                <label class="form-label">
                    Ganti Foto
                </label>

                <input
                    type="file"
                    name="foto"
                    class="form-control">

            </div>

            <button
                type="submit"
                name="update"
                class="btn btn-warning">

                <i class="bi bi-check-circle"></i>
                Update

            </button>

            <a
                href="index.php"
                class="btn btn-secondary">

                <i class="bi bi-arrow-left"></i>
                Kembali

            </a>

        </form>

    </div>

</div>

</body>
</html>