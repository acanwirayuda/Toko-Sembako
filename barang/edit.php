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
</head>
<body>

<div class="container mt-4">

    <h2>Edit Barang</h2>

    <form method="POST" enctype="multipart/form-data">

        <div class="mb-3">
            <label>Nama Barang</label>
            <input type="text"
                   name="nama_barang"
                   value="<?= $row['nama_barang']; ?>"
                   class="form-control"
                   required>
        </div>

        <div class="mb-3">
            <label>Harga</label>
            <input type="number"
                   name="harga"
                   value="<?= $row['harga']; ?>"
                   class="form-control"
                   required>
        </div>

        <div class="mb-3">
            <label>Stok</label>
            <input type="number"
                   name="stok"
                   value="<?= $row['stok']; ?>"
                   class="form-control"
                   required>
        </div>

        <div class="mb-3">

            <label>Foto Lama</label><br>

            <?php if($row['foto']){ ?>
                <img src="../assets/upload/<?= $row['foto']; ?>"
                     width="120">
            <?php } ?>

        </div>

        <div class="mb-3">
            <label>Ganti Foto</label>
            <input type="file"
                   name="foto"
                   class="form-control">
        </div>

        <button type="submit"
                name="update"
                class="btn btn-warning">
            Update
        </button>

        <a href="index.php"
           class="btn btn-secondary">
            Kembali
        </a>

    </form>

</div>

</body>
</html>