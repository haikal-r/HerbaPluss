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
                <!-- main content -->
                <h3><i class="fa-solid fa-box-open me-2"></i>Data Produk</h3>
                <hr>
                <button class="btn btn-primary mb-2 " data-bs-toggle="modal" data-bs-target="#tambahProduk">
                    <i class="fas fa-plus-circle me-2"></i>TAMBAH DATA PRODUK</button>
                <div class="table-responsive">
                <table class="table table-bordered align-top">
                    <thead class="align-middle table-light">
                        <tr>
                            <th scope="col">NO</th>
                            <th scope="col">Gambar</th>
                            <th scope="col">Nama Produk</th>
                            <th scope="col">Harga</th>
                            <th scope="col" style="width: 30%;">Deskripsi</th>
                            <th scope="col">Stok</th>
                            <th colspan="3" scope="col">AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    require '../../config/index.php';

                    $query = mysqli_query($conn, "SELECT * FROM product");
                    $no = 1;
                    while ($data = mysqli_fetch_assoc($query)) {
                    ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td class="text-center">
                                <?php echo " <img src='../../upload/image/". $data['gambar'] ."' width='100' height='100'> " ?>
                            </td>
                            <td><?php echo $data['nama_barang'] ?></td>
                            <td><?php echo $data['harga'] ?></td>
                            <td><?php echo $data['deskripsi'] ?></td>
                            <td><?php echo $data['stok'] ?></td>
                            <td>
                                <a href="../controller/ubah-produk.php?id=<?= $data["id_product"] ?>" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ubahproduk<?php echo $data['id_product']; ?>">Edit</a>
                                <a href="../controller/hapus-produk.php?id=<?= $data["id_product"] ?>" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapusproduk<?php echo $data['id_product']; ?>">Delete</a>
                            </td>
                        </tr>
                    </tbody>
             
                </div>
                        <!-- START MODAL TAMBAH -->
                        <div class="modal fade" id="tambahProduk" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h3 class="modal-title">Tambah Data Baru</h3>
                                    </div>
                                    <div class="modal-body">
                                        <form action="../controller/simpan-produk.php" method="post" role="form"  enctype="multipart/form-data">
                                            <div class="row mb-3">
                                                <label class="col-sm-3 control-label text-right">Nama barang</label>
                                                <div class="col-sm-8"><input type="text" class="form-control" name="nama_barang" placeholder="Produk..." value="" required></div>
                                            </div>
                                            <div class="row mb-3">
                                                <label class="col-sm-3 control-label text-right">Harga</label>
                                                <div class="col-sm-8"><input type="text" class="form-control" name="harga" placeholder="Rp. 10.000..." value="" required></div>
                                            </div>
                                            <div class="row mb-3">
                                                <label class="col-sm-3 control-label text-right">Deskripsi</label>
                                                <div class="col-sm-8"><textarea class="form-control" name="deskripsi" id="deskripsi" rows="3"></textarea>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label class="col-sm-3 control-label text-right">Stok</label>
                                                <div class="col-sm-8"><input type="text" name="stok" class="form-control" placeholder="2..." required>
                                                    </input>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label class="col-sm-3 control-label text-right">Gambar</label>
                                                <div class="col-sm-8"><input type="file" name="gambar" id="gambar" class="form-control" placeholder="image...">
                                                    </input>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button id="nosave" type="button" class="btn btn-danger pull-left" data-bs-dismiss="modal">Cancel</button>
                                                <input type="submit" name="submit" class="btn btn-primary" value="Save">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- END MODAL TAMBAH -->

                        <!-- START MODAL UBAH -->
                        <div class="example-modal">
                            <div class="modal fade" id="ubahproduk<?php echo $data['id_product']; ?>" role="dialog">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h3 class="modal-title">Edit Data Produk</h3>
                                        </div>
                                        <div class="modal-body">
                                            <form action="../controller/update-produk.php?id=<?= $data['id_product'] ?>" method="post" role="form">
                                                <?php
                                                $id = $data['id_product'];
                                                $query1 = mysqli_query($conn, "SELECT * FROM product WHERE id_product='$id'");
                                                while ($data1 = mysqli_fetch_assoc($query1)) {
                                                ?>
                                                    <div class="form-group">
                                                        <div class="row mb-3 f-dlex align-items-center">
                                                            <label class="col-sm-3 control-label text-right">Nama Produk</label>
                                                            <div class="col-sm-8"><input type="text" class="form-control" name="nama" value="<?php echo $data1['nama_barang']; ?>"></div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="row mb-3 f-dlex align-items-center">
                                                            <label class="col-sm-3 control-label text-right">Harga</label>
                                                            <div class="col-sm-8"><input type="text" class="form-control" name="harga" value="<?php echo
                                                                                                                                                $data1['harga']; ?>"></div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="row mb-3 f-dlex align-items-center">
                                                            <label class="col-sm-3 control-label text-right">Deskripsi</label>
                                                            <div class="col-sm-8"><textarea class="form-control" name="deskripsi" id="deskripsi" rows="3" ><?= $data1['deskripsi']?></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="row mb-3 f-dlex align-items-center">
                                                            <label class="col-sm-3 control-label text-right">stok</label>
                                                            <div class="col-sm-8">
                                                                <input type="text" name="stok" class="form-control" value="<?php echo $data1['stok']; ?>">
                                                                </input>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button id="noedit" type="button" class="btn btn-danger pull-left" data-bs-dismiss="modal">Cancel</button>
                                                        <input type="submit" name="submit" class="btn btn-primary" value="Update">
                                                    </div>
                                                <?php
                                                }
                                                ?>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END MODAL UBAH -->

                        <!-- START MODAL HAPUS -->
                        <div class="example-modal">
                            <div id="hapusproduk<?php echo $data['id_product']; ?>" class="modal fade" role="dialog" style="display:none;">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h3 class="modal-title">Konfirmasi Hapus Data</h3>
                                        </div>
                                        <div class="modal-body">
                                            <h5 align="center">Apakah anda yakin ingin menghapus Produk -
                                                <?php echo $data['nama_barang']; ?><strong><span class="grt"></span></strong> ?
                                            </h5>
                                        </div>
                                        <div class="modal-footer">
                                            <button id="nodelete" type="button" class="btn btn-danger pull-left" data-bs-dismiss="modal">Cancle</button>
                                            <a href="../controller/hapus-produk.php?id=<?php echo $data['id_product']; ?>" class="btn btn-primary">Delete</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
              
            </div>
            <!-- END MODAL HAPUS -->
        <?php
                    }
        ?>
        </div>
                </table>
    </div>
    </div>



    <!-- BEGIN: Vendor JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="../../vendor/bootstrap/js/bootstrap.min.js"></script>

</body>

</html>