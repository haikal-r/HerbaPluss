<?php
require('../../partials/session-admin.php');
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
                <h3><i class="fa-solid fa-users fa me-3"></i>Data Kosumen</h3>
                <hr>
                <!-- main content -->
                <div class="table-responsive">
                <table class="table table-bordered align-top">
                    <thead class="align-middle table-light">
                        <tr>
                            <th scope="col" style="width: 10%;">NO</th>
                            <th scope="col" style="width: 10%;">Gambar</th>
                            <th scope="col">Email</th>
                            <th scope="col">Username</th>
                            <th scope="col" style="width: 30%;">Alamat</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    require '../../config/index.php';

                    $query = mysqli_query($conn, "SELECT * FROM user WHERE role = 'pembeli'");
                    $no = 1;
                    while ($data = mysqli_fetch_assoc($query)) {
                    ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td class="text-center">
                                <?php echo " <img src='../../upload/image/". $data['gambar'] ."' class='rounded-circle' width='100' height='100'> " ?>
                            </td>
                            <td><?php echo $data['email'] ?></td>
                            <td><?php echo $data['username'] ?></td>
                            <td><?php echo $data['alamat'] ?></td>
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