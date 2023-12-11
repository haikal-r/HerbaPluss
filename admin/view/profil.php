<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('location: ../../login.php ');
    exit;
}

$user = $_SESSION['username'];
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
                <h3><i class="fas fa-user-circle fa-lg me-3"></i>Profil</h3>
                <hr>
                <!-- main content -->
                <div class="row gap-3">
                    <div class="col bg-body-secondary min-vh-100">
                        <div class="d-flex flex-column py-3">
                            <h5 class="m-0">Profil saya</h5>
                            <hr />
                            <div class="d-flex justify-content-center my-3">
                                <img src="../../assets/img/steia.png" alt="" class="w-full h-full absolute bg-white rounded-circle" width="100" height="100">
                            </div>
                            <div class="my-2">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control " name="email" readonly />
                            </div>
                            <div class="my-2">
                                <label for="username" class="form-label">Username </label>
                                <input type="text" class="form-control " name="username" readonly />
                            </div>
                            <div class="my-2">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control " name="password" readonly />
                            </div>
                        </div>
                    </div>
                    <div class="col bg-body-secondary min-vh-100">
                        <div class="d-flex flex-column py-3">
                            <h5 class="m-0">Ubah data</h5>
                            <hr />
                            <form action="" autocomplete="off">
                            <div class="row ">
                                <div class="col-4">
                                    <label for="username" class="col-form-label w-100  mb-3" >Username</label>
                                    <label for="email" class="col-form-label w-100 mb-3">Email</label>
                                    <label for="password" class="col-form-label w-100 mb-3">Password</label>
                                    <label for="alamat" class="col-form-label w-100 mb-3">Alamat</label>
                                </div>
                                <div class="col-8">
                                    <input type="text" class="form-control mb-3" name="username">
                                    <input type="password" class="form-control mb-3" name="email">
                                    <input type="password" class="form-control mb-3" name="password">
                                    <input type="text" class="form-control mb-3" name="alamat">
                                    <div class=" d-flex justify-content-end mt-4">
                                    <button type="submit" class="btn btn-primary w-50">Submit</button>
                                    </div>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>


                <!-- end content content -->
            </div>
        </div>
    </div>
</body>

</html>