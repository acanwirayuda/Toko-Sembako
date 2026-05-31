<?php
include '../config/koneksi.php';

if(isset($_POST['simpan'])){

    $nama_barang = $_POST['nama_barang'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];

    $foto = $_FILES['foto']['name'];
    $tmp  = $_FILES['foto']['tmp_name'];

    if(!empty($foto)){
        move_uploaded_file(
            $tmp,
            "../assets/upload/".$foto
        );
    }

    mysqli_query($koneksi,
        "INSERT INTO barang
        (nama_barang,harga,stok,foto)
        VALUES
        ('$nama_barang','$harga','$stok','$foto')"
    );

    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Barang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">

    <h2>Menambahkan Barang</h2>

    <form method="POST" enctype="multipart/form-data">

        <div class="mb-3">
            <label>Nama Barang</label>
            <input type="text"
                   name="nama_barang"
                   class="form-control"
                   required>
        </div>

        <div class="mb-3">
            <label>Harga</label>
            <input type="number"
                   name="harga"
                   class="form-control"
                   required>
        </div>

        <div class="mb-3">
            <label>Stok</label>
            <input type="number"
                   name="stok"
                   class="form-control"
                   required>
        </div>

        <div class="mb-3">
            <label>Foto Barang</label>
            <input type="file"
                   name="foto"
                   class="form-control">
        </div>

        <button type="submit"
                name="simpan"
                class="btn btn-success">
            Simpan
        </button>

        <a href="index.php"
           class="btn btn-secondary">
            Kembali
        </a>

    </form>

</div>

</body>
</html>