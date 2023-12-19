<?php
require('../partials/session-admin.php');
require '../config/format-rupiah.php';

$id = $_SESSION['id_user'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../vendor/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="../vendor/fontawesome/fontawesome-free-6.4.2-web/css/all.min.css">
    <link rel="stylesheet" href="../assets/css/main.css" />
    <title>Document</title>
</head>

<body>
    <?php require "../partials/navbar-dashboard-user.php" ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2 bg-navigation-primary pr-3 pt-4">
                <?php require "../partials/sidebar-dashboard-user.php" ?>
            </div>
            <div class="col-md-10 p-4">
                <h3><i class="fa-solid fa-file-lines  me-3 ms-1"></i>Transaksi</h3>
                <hr>
                <!-- main content -->
                <?php
                require '../config/index.php';

                $query = mysqli_query($conn, "SELECT * FROM transaksi_penjualan WHERE id_pengguna = '$id'");
                $no = 1;
                while ($data = mysqli_fetch_assoc($query)) {
                ?>
                    <div class="container border rounded-3 shadow-sm p-3 d-flex justify-content-between align-items-center mb-3">
                        <div class="d-flex gap-3">
                            <img src="../upload/image/<?= $data['gambar'] ?>" alt="" width="100" height="100">
                            <p class="fw-bold"><?= $data['nama_barang'] ?></p>
                        </div>
                        <a href="./controller/invoice.php?id=<?= $data['id_transaksi_penjualan'] ?>" class="text-success fw-bold text-decoration-none">Lihat Invoice</a>
                    </div>
                <?php
                }
                ?>
                <!-- end content content -->
            </div>
        </div>
    </div>
</body>

</html>