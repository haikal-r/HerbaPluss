<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('location: ../login.php ');
    exit;
}

$user = $_SESSION['username'];


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
    <?php include "../partials/navbar-dashboard-admin.php" ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2 bg-navigation-primary pr-3 pt-4">
                <?php include "../partials/sidebar-dashboard-admin.php" ?>
            </div>
            <div class="col-md-10 p-4">
                <h3><i class="fas fa-user-circle fa-lg me-3"></i>Profil</h3>
                <hr>
                <!-- main content -->
                <div class="row gap-3">
                    <div class="col bg-body-secondary min-vh-100">
                        <div class="d-flex flex-column py-3">
                            <?php
                            require '../config/index.php';
                            $query = mysqli_query($conn, "SELECT * FROM pengguna");
                            $data = mysqli_fetch_assoc($query);
                            $id = $data['id_pengguna'];
                            $query1 = mysqli_query($conn, "SELECT * FROM pengguna WHERE id_pengguna='$id'");
                            while ($data = mysqli_fetch_assoc($query1)) {
                            ?>
                                <h5 class="m-0">Profil saya</h5>
                                <hr />
                                <div class="d-flex justify-content-center my-3">
                                    <?php
                                    if ($data['gambar']) {
                                    ?>
                                        <img src="../upload/image/<?= $data['gambar'] ?>" alt="" class="w-full h-full  bg-white rounded-circle" width="100" height="100">
                                    <?php
                                    } else {
                                    ?>
                                        <img src="../assets/img/profile-place-holder.jpg" alt="" class="w-full h-full bg-white rounded-circle" width="100" height="100">
                                    <?php
                                    }

                                    ?>
                                </div>
                                <div class="my-2">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control " name="email" placeholder="<?php echo $data['email'] ?>" readonly />
                                </div>
                                <div class="my-2">
                                    <label for="username" class="form-label">Username </label>
                                    <input type="text" class="form-control " name="Username" placeholder="<?php echo $data['nama'] ?>" readonly />
                                </div>
                                <div class="my-2">
                                    <label for="alamat" class="form-label">Alamat</label>
                                    <input type="text" class="form-control " name="alamat" placeholder="<?php echo $data['alamat'] ?>" readonly />
                                </div>
                                <div class="my-2">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control " name="password" placeholder="******" readonly />
                                </div>
                        </div>

                    </div>
                    <div class="col bg-body-secondary min-vh-100">
                        <div class="d-flex flex-column py-3">
                            <h5 class="m-0">Ubah data</h5>
                            <hr />
                            <form action="./controller/update-profil.php?id=<?= $data['id_pengguna'] ?>" method="post" role="form" enctype="multipart/form-data">
                                <div class="form-group">
                                    <div class="row mb-3 d-flex align-items-center">
                                        <label class="col-sm-3 control-label text-right">Email</label>
                                        <div class="col-sm-9"><input type="text" class="form-control" name="email" required></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row mb-3 d-flex align-items-center">
                                        <label class="col-sm-3 control-label text-right">Username</label>
                                        <div class="col-sm-9"><input type="text" class="form-control" name="username" required></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row mb-3 d-flex align-items-center">
                                        <label class="col-sm-3 control-label text-right">Alamat</label>
                                        <div class="col-sm-9"><input type="text" class="form-control" name="alamat" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row mb-3 d-flex align-items-center">
                                        <label class="col-sm-3 control-label text-right">Password</label>
                                        <div class="col-sm-9">
                                            <input type="password" name="password" class="form-control" required>
                                            </input>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row mb-3 d-flex align-items-center">
                                        <label class="col-sm-3 control-label text-right">Profil</label>
                                        <div class="col-sm-9">
                                            <input type="file" name="gambar" class="form-control" required>
                                            </input>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <button type="submit" name="ubah" class="btn btn-primary border-0 w-25">Ubah</button>
                                </div>
                            </form>
                        <?php
                            }
                        ?>
                        </div>
                    </div>
                </div>


                <!-- end content content -->
            </div>
        </div>
    </div>
</body>

</html>