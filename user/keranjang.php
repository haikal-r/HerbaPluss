<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('location: ../login.php ');
    exit;
}

$user = $_SESSION['username'];
$idUser = $_SESSION['id_user'];
$hasil = isset($_POST['hasil']) ? (int)$_POST['hasil'] : 0;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../vendor/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="../vendor/fontawesome/fontawesome-free-6.4.2-web/css/all.min.css">
    <link rel="stylesheet" href="../assets/css/main.css" />
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="./css/detail-style.css">
    <title>Document</title>
</head>

<body class="bg-body-secondary">
    <!-- Navbar -->
    <?php require "../partials/navbar-user.php" ?>
    <header aria-label="breadcrumb" class="mx-5 mt-2">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./index.php">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Keranjang</li>
        </ol>
    </header>
    <!-- Navbar end -->
    <!-- Hero section -->
    <section>
        <div class="container pt-2 pb-5 min-vh-100 position-relative">
            <div class="bg-white px-4 pt-3 d-flex justify-content-between mb-3">
                <p>Produk</p>
                <ul class="d-flex gap-5 list-unstyled">
                    <li class="mx-2 opacity-75 fw-medium">Harga Satuan</li>
                    <li class="mx-2 opacity-75 fw-medium">Kuantitas</li>
                    <li class="mx-2 opacity-75 fw-medium">Total Harga</li>
                    <li class="ms-2 opacity-75 fw-medium me-5">Aksi</li>
                </ul>
            </div>
            <?php
            require '../config/index.php';
            require '../config/format-rupiah.php';
            $idUser = $_SESSION['id_user'];
            $query = mysqli_query($conn, "SELECT * FROM keranjang WHERE id_pengguna = '$idUser'");
            while ($data = mysqli_fetch_assoc($query)) {
            ?>
                <form action="./controller/update-keranjang.php?id=<?= $data['id_barang'] ?>&&jumlah=<?= $data['jumlah'] ?>&&harga=<?= $data['harga'] ?>" method="POST" class="d-flex flex-column gap-4">
                    <div class="bg-white position-relative px-4 py-2 d-flex mb-3 justify-content-between w-100 align-items-center shadow-sm">
                        <div class="py-4 d-flex gap-4">
                            <?php
                            if ($data['type'] == "true") {
                            ?>
                                <input type="checkbox" name="checkbox" checked>
                            <?php
                            } else {
                            ?>
                                <input type="checkbox" name="checkbox">
                            <?php
                            }
                            ?>
                            <img src="../upload/image/<?= $data['gambar'] ?>" alt="" width="100" height="100">
                            <p class="mt-2"><?= $data['nama_barang'] ?></p>
                        </div>
                        <div class="d-flex align-items-center justify-content-end my-auto ">
                            <p class="mx-5 my-auto">
                                <?= formatRupiah($data['harga']) ?>
                            </p>
                            <?php if ($data['jumlah'] < 1) {
                            ?>
                                <button class="px-2 py-1 btn btn-outline-secondary rounded-0" disabled>
                                <?php
                            } else {
                                ?>
                                    <button type="submit" name="kurang" class="px-2 py-1 btn btn-outline-secondary rounded-0">
                                    <?php
                                }
                                    ?>
                                    <i class="fa-solid fa-minus fa-xs py-1"></i>
                                    </button>
                                    <input type="text" name="hasil" value="<?= $data['jumlah'] ?>" class="text-center py-1 btn btn-outline-secondary rounded-0 border-end-0 border-start-0" style="width: 55px;" readonly>
                                    <button type="submit" name="tambah" class="btn btn-outline-secondary py-1 rounded-0">
                                        <i class="fa-solid fa-plus fa-xs py-1"></i>
                                    </button>
                                    <p class="mx-5 my-auto">
                                        <?php
                                        $totalHarga = $data['harga'] * $data['jumlah'];
                                        echo formatRupiah($totalHarga);
                                        ?>
                                    </p>
                                    <a href="./controller/hapus-keranjang.php?id=<?= $data['id_keranjang'] ?>" class="ms-3 me-5 my-auto text-decoration-none tombol-hapus">Hapus</a>
                        </div>
                    </div>
                </form>
            <?php
            }
            ?>

            <!-- Checkout -->
            <?php
            $queryTotal = mysqli_query($conn, "SELECT SUM(total_harga) AS total_harga FROM keranjang WHERE id_pengguna = '$idUser'");
            $data1 = mysqli_fetch_assoc($queryTotal);
            $queryDataLength = mysqli_query($conn, "SELECT COUNT(*) AS total_rows FROM keranjang WHERE id_pengguna = '$idUser' AND type = 'true'");
            $query = mysqli_query($conn, "SELECT * FROM keranjang WHERE id_pengguna = '$idUser'");
            $data = mysqli_fetch_assoc($query);
            while ($data2 = mysqli_fetch_assoc($queryDataLength)) {
            ?>
                <form action="checkout.php?id=<?= $data['id_keranjang'] ?>" method="POST">
                    <div class="bg-white py-3 d-flex justify-content-end mb-0 w-100 ">
                        <div class="mx-3 d-flex gap-3">
                            <p class="my-auto">Total(<?= $data2['total_rows'] ?> produk): <span class="text-danger"><?= formatRupiah($data1['total_harga']) ?></span></p>
                            <button type="submit" class="btn btn-success rounded-0 px-5">Checkout</button>
                        </div>
                    </div>
                </form>
            <?php
            }
            ?>

        </div>


    </section>
    <!-- Hero Section end -->

    <!-- footer start -->
    <?php include '../partials/footer.php' ?>
    <!-- footer end -->

    <!-- BEGIN: Vendor JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>