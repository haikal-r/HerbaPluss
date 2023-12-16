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
                    <h5 class="mb-4">Alamat Pengiriman</h5>
                    <div class="d-flex gap-5 border-bottom">
                        <div class="w-25">
                            <h6>Haikal ramadhan </h6>
                            <p>9323423759845</p>
                        </div>
                        <p>Perumahan villa hanglekir, blok dd1 no.13, RT.4/RW.5, Legenda malaka, Batam kota (Sebela warungsuroboy), KOTA BATAM - BATAM KOTA, KEPULAUAN RIAU, ID 29413</p>
                    </div>
                </div>
            </div>
            <div class="w-full bg-white px-3 py-4 shadow-sm">
                <div class="row mb-3">
                    <div class="col ms-3">
                        <p class="fs-5">Produk dipesan</p>
                        <div class="d-flex align-items-center gap-3">
                            <img src="" alt="" width="70" height="70">
                            <p>apapappappapapap</p>
                        </div>
                    </div>
                    <div class="col">
                        <table class="table table-borderless text-center">
                            <thead>
                                <tr class="opacity-50 fw-light">
                                    <th scope="col">Harga satuan</th>
                                    <th scope="col">Jumlah</th>
                                    <th scope="col">Subtotal produk</th>
                                </tr>
                            </thead>
                            <tbody style="height: 60px;">
                                <tr class="align-middle">
                                    <td>Rp. 100000</td>
                                    <td>54</td>
                                    <td>Rp. 2398250</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="w-full bg-white mb-5 px-3 py-4 shadow-sm">
                <div class="px-3">
                    <p class="py-3 px-2 fs-5 border-bottom">Pembayaran</p>
                    <div class="container d-flex justify-content-end border-bottom">
                        <div class="row d-flex gap-3">
                            <div class="col opacity-50 fw-medium">
                                <p>Subtotal produk</p>
                                <p>Total Pembayaran</p>
                            </div>
                            <div class="col">
                                <p class="text-end">rp.u129831294</p>
                                <p class="fs-4 text-start text-danger fw-medium">Rp.u129831294</p>
                            </div>
                        </div>
                    </div>
                    <div class="container d-flex justify-content-end border-bottom">
                        <form action="" class="my-4">
                            <button class="btn btn-danger rounded-0 px-5">Buat Pesanan</button>
                        </form>
                    </div>
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