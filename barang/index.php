<?php
include '../config/koneksi.php';

$data = mysqli_query($koneksi, "SELECT * FROM barang");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Barang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">

    <h2>Data Barang</h2>

    <a href="tambah.php" class="btn btn-success mb-3">
        + Tambah Barang
    </a>

    <a href="../dashboard.php" class="btn btn-secondary mb-3">
        Kembali
    </a>

    <table class="table table-bordered">

        <thead>
            <tr>
                <th>No</th>
                <th>Foto</th>
                <th>Nama Barang</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Aksi</th>
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
                    <img src="../assets/upload/<?= $row['foto']; ?>" width="80">
                <?php } ?>
            </td>

            <td><?= $row['nama_barang']; ?></td>

            <td>Rp <?= number_format($row['harga']); ?></td>

            <td><?= $row['stok']; ?></td>

            <td>
                <a href="edit.php?id=<?= $row['id_barang']; ?>" class="btn btn-warning btn-sm">
                    Edit
                </a>

                <a href="hapus.php?id=<?= $row['id_barang']; ?>" class="btn btn-danger btn-sm">
                    Hapus
                </a>
            </td>

        </tr>

        <?php } ?>

        </tbody>

    </table>

</div>

</body>
</html>