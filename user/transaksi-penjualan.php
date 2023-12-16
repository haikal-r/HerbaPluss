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
                <h3><i class="fa-solid fa-file-lines  me-3 ms-1"></i>Transaksi Penjualan</h3>
                <hr>
                <!-- main content -->
                <table class="table table-bordered align-top">
                    <thead class="align-middle table-light">
                        <tr>
                            <th scope="col">NO</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Jumlah</th>
                            <th scope="col">Total Harga</th>
                            <th scope="col">ID User</th>
                            <th scope="col">ID Produk</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    require '../config/index.php';

                    $query = mysqli_query($conn, "SELECT * FROM transaksi_penjualan WHERE id_user = '$id'");
                    $no = 1;
                    while ($data = mysqli_fetch_assoc($query)) {
                    ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $data['tanggal'] ?></td>
                            <td><?php echo $data['jumlah'] ?></td>
                            <td><?php echo formatRupiah($data['total_harga']) ?></td>
                            <td><?php echo $data['id_user'] ?></td>
                            <td><?php echo $data['id_product'] ?></td>
                        </tr>
                    </tbody>
                    <?php
                    }
                    ?>


                <!-- end content content -->
            </div>
        </div>
    </div>
</body>

</html>