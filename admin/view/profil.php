<?php
session_start();
if(!isset($_SESSION['username'])){
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
    <?php require"../../partials/navbar-dashboard-admin.php" ?>
    <div class="container-fluid">
    <div class="row">
        <div class="col-md-2 bg-navigation-primary pr-3 pt-4">
            <?php require"../../partials/sidebar-dashboard-admin.php" ?>
        </div>
        <div class="col-md-10 p-4">
            <h3><i class="fas fa-user-circle fa-lg me-3"></i>Profil</h3>
            <hr>
            <!-- main content -->
        


            <!-- end content content -->
        </div>
    </div>
    </div>
</body>
</html>