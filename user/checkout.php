<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('location: ../login.php ');
    exit;
}

$user = $_SESSION['username'];
$idUser = $_SESSION['id_user'];
$alamat = $_SESSION['alamat'];
$nomor_telepon = $_SESSION['nomor_telepon'];
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
            <li class="breadcrumb-item active" aria-current="page"><a href="./keranjang.php">Keranjang</a></li>
            <li class="breadcrumb-item active" aria-current="page">Checkout</li>
        </ol>
    </header>
    <!-- Navbar end -->
    <!-- Hero section -->
    <section>
        <div class="container d-flex flex-column gap-3">
            <div class="w-full bg-white px-3 py-4 shadow-sm">
                <div class="px-3">
                    <h5 class="mb-4 text-success-emphasis"><i class="fa-solid fa-location-dot fa-xs me-2"></i>Alamat Pengiriman</h5>
                    <div class="d-flex gap-5 border-bottom">
                        <div class="w-25">
                            <h6><?= $user ?> <span>(+62)</span></h6>
                            <h6><?= $nomor_telepon ?></h6>
                        </div>
                        <p><?= $alamat ?></p>
                    </div>
                </div>
            </div>
            <div class="w-full bg-white px-4 py-4 shadow-sm">
                <table class="table px-3 table-borderless text-center align-top">
                    <thead>
                        <tr class="opacity-50 fw-light">
                            <th class=" text-start align-top">Produk dipesan</th>
                            <th scope="col" style="width: 15%;">Harga satuan</th>
                            <th scope="col" style="width: 15%;">Jumlah</th>
                            <th scope="col" style="width: 15%;">Subtotal produk</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        require '../config/index.php';
                        require '../config/format-rupiah.php';
                        $idUser = $_SESSION['id_user'];
                        $query = mysqli_query($conn, "SELECT * FROM keranjang WHERE id_pengguna = '$idUser' AND type = 'true'");
                        while ($data = mysqli_fetch_assoc($query)) {
                        ?>
                            <tr>
                                <td class="d-flex gap-3">
                                    <img src="../upload/image/<?= $data['gambar'] ?>" alt="" width="80" height="80">
                                    <p><?= $data['nama_barang'] ?></p>
                                </td>
                                <td><?= formatRupiah($data['harga']) ?></td>
                                <td><?= $data['jumlah'] ?></td>
                                <td>
                                    <?php
                                    $totalHarga = $data['harga'] * $data['jumlah'];
                                    echo formatRupiah($totalHarga);
                                    ?>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <div class="w-full bg-white mb-5 px-3 shadow-sm">
                <div class="px-3">
                    <p class="py-4 px-2 fs-5 border-bottom">Pembayaran</p>
                    <?php
                    $queryTotal = mysqli_query($conn, "SELECT SUM(total_harga) AS total_harga FROM keranjang WHERE id_pengguna = '$idUser' AND type = 'true'");
                    $data1 = mysqli_fetch_assoc($queryTotal);
                    $queryKeranjang = mysqli_query($conn, "SELECT * FROM keranjang WHERE id_pengguna = '$idUser' AND type = 'true'");
                    $data = mysqli_fetch_assoc($queryKeranjang)
                    ?>
                    <form action="./controller/simpan-pesanan.php" method="POST">
                        <div class="container d-flex justify-content-end border-bottom">
                            <table class="table table-borderless" style="width: 350px;">
                                <tr>
                                    <td class="fw-medium opacity-50">Subtotal Produk</td>
                                    <td class="text-end">
                                    <?php
                                    echo formatRupiah($data1['total_harga']);
                                    ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="fw-medium opacity-50">Total Pembayaran</td>
                                    <td class="fw-meidum fs-3 text-danger text-end">
                                    <?php
                                    echo formatRupiah($data1['total_harga']);
                                    ?>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="container d-flex justify-content-end border-bottom">
                            <button type="submit" name="buatpesanan" class="btn btn-danger rounded-0 px-5 my-3">Buat Pesanan</button>
                        </div>
                    </form>
                </div>

            </div>
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