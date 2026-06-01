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
    <style>

body{
    background:#f8fafc;
}

.form-card{
    background:white;
    border:none;
    border-radius:20px;
    box-shadow:0 8px 25px rgba(0,0,0,.08);
    padding:30px;
}

.page-title{
    font-weight:700;
    margin-bottom:25px;
}

.form-label{
    font-weight:600;
}

.form-control{
    border-radius:10px;
}

.btn{
    border-radius:10px;
}

</style>
<head>
    <title>Tambah Barang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>

<div class="container mt-4">

    <h2 class="page-title">
    <i class="bi bi-plus-circle"></i>
    Tambah Barang
</h2>
<div class="form-card">
    <form method="POST" enctype="multipart/form-data">

        <div class="mb-3">
            <label class="form-label">Nama Barang</label>
            <input type="text"
       name="nama_barang"
       class="form-control"
       placeholder="Masukkan nama barang"
       required>
        </div>

        <div class="mb-3">
            <label class="form-label">Harga Barang</label>
            <input type="number"
       name="harga"
       class="form-control"
       placeholder="Masukkan harga barang"
       required>
        </div>

        <div class="mb-3">
            <label class="form-label">Jumlah Stok</label>
            <input type="number"
       name="stok"
       class="form-control"
       placeholder="Masukkan jumlah stok"
       required>
        </div>

        <div class="mb-3">
            <label class="form-label">Foto Barang</label>
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

</div>

</body>
</html>