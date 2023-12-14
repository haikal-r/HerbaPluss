<?php
require('../../partials/session-admin.php');
require '../../config/index.php'
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../vendor/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="../../vendor/fontawesome/fontawesome-free-6.4.2-web/css/all.min.css">
    <link rel="stylesheet" href="../../assets/css/main.css" />
    <title>Document</title>
</head>

<body>
    <?php require "../../partials/navbar-dashboard-admin.php" ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2 bg-navigation-primary pr-3 pt-4">
                <?php require "../../partials/sidebar-dashboard-admin.php" ?>
            </div>
            <div class="col-md-10 p-4">
                <h3><i class="fas fa-tv me-3"></i>Dashboard</h3>
                <hr>
                <!-- main content -->
                <div class="d-flex justify-content-center gap-4">
                    <a href="profil.php" class="text-decoration-none">
                        <div class="card text-bg-primary py-2" style="min-width: 15rem;">
                            <div class="card-body d-flex justify-content-start align-items-center fs-4">
                                <i class="fas fa-user-circle fa-xl me-3"></i>Profile
                            </div>
                            <div class="card-footer d-flex justify-content-between align-items-center">
                                <p class="card-text my-auto">view detail</p>
                                <i class="fa-solid fa-arrow-right"></i>
                            </div>
                        </div>
                    </a>
                    <a href="produk.php" class="text-decoration-none">
                        <div class="card text-bg-warning text-white py-2" style="min-width: 15rem;">
                            <div class="card-body d-flex justify-content-between align-items-center fs-4">
                                <?php
                                $query = mysqli_query($conn, "SELECT COUNT(*) AS total_rows
                            FROM product;
                            ");
                                while ($data = mysqli_fetch_assoc($query)) {
                                ?>
                                    <div><i class="fa-solid fa-box-open fa-lg me-3"></i>Produk </div>
                                    <div class="me-2">
                                        <span><?= $data['total_rows'] ?></span>
                                    </div>
                            </div>
                        <?php
                                }
                        ?>

                        <div class="card-footer d-flex justify-content-between align-items-center">
                            <p class="card-text my-auto">view detail</p>
                            <i class="fa-solid fa-arrow-right"></i>
                        </div>

                        </div>
                    </a>
                    <a href="konsumen.php" class="text-decoration-none">
                        <div class="card text-bg-danger py-2" style="min-width: 15rem;">
                            <div class="card-body d-flex justify-content-between align-items-center fs-4">
                                <?php
                                $query = mysqli_query($conn, "SELECT COUNT(*) AS total_rows
                            FROM user WHERE role = 'pembeli';
                            ");
                                while ($data = mysqli_fetch_assoc($query)) {
                                ?>
                                    <div><i class="fa-solid fa-users fa-lg me-3"></i>Konsumen</div>
                                    <div class="me-2">
                                        <span><?= $data['total_rows'] ?></span>
                                    </div>
                            </div>
                            <div class="card-footer d-flex justify-content-between align-items-center">
                                <p class="card-text my-auto">view detail</p>
                                <i class="fa-solid fa-arrow-right"></i>
                            </div>
                        <?php
                                }
                        ?>
                        </div>
                    </a>
                    <a href="transaksi-penjualan.php" class="text-decoration-none">
                        <div class="card text-bg-success py-2" style="min-width: 15rem;">
                            <?php
                            $query = mysqli_query($conn, "SELECT COUNT(*) AS total_rows
                            FROM transaksi_penjualan;
                            ");
                            while ($data = mysqli_fetch_assoc($query)) {
                            ?>
                                <div class="card-body d-flex justify-content-between align-items-center fs-4">
                                    <div><i class="fa-solid fa-file-lines fa-xl me-3 ms-1"></i>Transaksi</div>
                                    <div class="me-2">
                                        <span><?= $data['total_rows'] ?></span>
                                    </div>
                                </div>
                                <div class="card-footer d-flex justify-content-between align-items-center">
                                    <p class="card-text my-auto">view detail</p>
                                    <i class="fa-solid fa-arrow-right"></i>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                    </a>
                </div>



                <!-- end content content -->
            </div>
        </div>
    </div>
</body>

</html>