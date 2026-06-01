<?php
include '../config/koneksi.php';

if(!isset($_GET['id'])){
    header("Location: index.php");
    exit;
}

$id = $_GET['id'];

$data = mysqli_query(
    $koneksi,
    "SELECT * FROM barang
    WHERE id_barang='$id'"
);

$row = mysqli_fetch_assoc($data);

if(!$row){
    header("Location: index.php");
    exit;
}

if(isset($_POST['hapus'])){

    mysqli_query(
        $koneksi,
        "DELETE FROM barang
        WHERE id_barang='$id'"
    );

    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>

    <title>Hapus Barang</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>

        body{
            background:#f8fafc;
        }

        .delete-card{
            max-width:550px;
            margin:auto;
            margin-top:80px;
            background:white;
            border:none;
            border-radius:20px;
            box-shadow:0 5px 20px rgba(0,0,0,.08);
            padding:30px;
        }

        .delete-icon{
            font-size:70px;
            color:#dc3545;
        }

        .product-img{
            width:120px;
            height:120px;
            object-fit:cover;
            border-radius:15px;
            border:1px solid #ddd;
        }

    </style>

</head>
<body>

<div class="container">

    <div class="delete-card text-center">

        <i class="bi bi-trash delete-icon"></i>

        <h3 class="mt-3">
            Hapus Barang
        </h3>

        <p class="text-muted">
            Apakah Anda yakin ingin menghapus barang berikut?
        </p>

        <?php if(!empty($row['foto'])){ ?>

            <img
                src="../assets/upload/<?php echo $row['foto']; ?>"
                class="product-img mb-3">

        <?php } ?>

        <h5>
            <?php echo $row['nama_barang']; ?>
        </h5>

        <p>
            Harga :
            Rp <?php echo number_format($row['harga'],0,',','.'); ?>
        </p>

        <p>
            Stok :
            <?php echo $row['stok']; ?>
        </p>

        <form method="POST">

            <button
                type="submit"
                name="hapus"
                class="btn btn-danger">

                <i class="bi bi-trash"></i>
                Ya, Hapus

            </button>

            <a
                href="index.php"
                class="btn btn-secondary">

                <i class="bi bi-arrow-left"></i>
                Batal

            </a>

        </form>

    </div>

</div>

</body>
</html>