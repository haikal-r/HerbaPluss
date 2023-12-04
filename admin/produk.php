<?php
require('../partials/session-admin.php');
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
    <?php require "../partials/navbar-dashboard-admin.php" ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2 bg-navigation-primary pr-3 pt-4">
                <?php require "../partials/sidebar-dashboard-admin.php" ?>
            </div>
            <div class="col-md-10 p-4">
                <!-- main content -->
                <h3><i class="fas fa-tv me-3"></i>Data Produk</h3>
                <hr>

                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">NO</th>
                            <th scope="col">Nama Produk</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Stok</th>
                            <th scope="col">Gambar</th>
                            <th colspan="3" scope="col">AKSI</th>
                        </tr>
                    </thead>
                    <?php
                    require '../config/index.php';

                    $query = mysqli_query($conn, "SELECT * FROM product");
                    $no = 1;
                    while ($data = mysqli_fetch_assoc($query)) {
                    ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $data['nama_barang'] ?></td>
                            <td><?php echo $data['harga'] ?></td>
                            <td><?php echo $data['stok'] ?></td>
                            <td><?php echo $data['gambar'] ?></td>
                            <td>

                                <a href="#" data-toggle="modal" data-target="" class="btn btn-primary">Edit</a>
                                <a href="#" data-toggle="modal" data-target="" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>


                    <!--Tambah Modal -->
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Tambah Produk
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="tambah-produk.php" method="post" >
                                        <div class="mb-3 ">
                                            <div class="row d-flex align-items-center">
                                                <label class="col-sm-3 control-label text-right">Nama Produk</label>
                                                <div class="col-sm-8">
                                                    <input type="text" placeholder="Nama Produk" name="nama_barang" class="form-control" id="nama_barang">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <div class="row d-flex align-items-center">
                                                <label class="col-sm-3 control-label text-right">Harga</label>
                                                <div class="col-sm-8">
                                                    <input type="text" placeholder="Harga" name="harga" class="form-control" id="harga">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <div class="row d-flex align-items-center">
                                                <label class="col-sm-3 control-label text-right">Stok</label>
                                                <div class="col-sm-8">
                                                    <input type="text" placeholder="Stok" name="stok" class="form-control" id="stok">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <div class="row d-flex align-items-center">
                                                <label class="col-sm-3 control-label text-right">Gambar</label>
                                                <div class="col-sm-8">
                                                    <input type="text" placeholder="image.jpg" name="gambar" class="form-control" id="gambar">
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary">SIMPAN</button>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end content content -->
            </div>
        </div>
    </div>

    <!-- BEGIN: Vendor JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

</body>

</html>