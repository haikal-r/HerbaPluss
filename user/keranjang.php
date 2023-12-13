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
    <link rel="stylesheet" href="../assets/css/style.css">
    <title>Document</title>
</head>

<body class="bg-body-secondary">
    <?php require "../partials/navbar-user.php" ?>
    <!-- Hero section -->
    <section>
        <div class="container py-4 min-vh-100">
            <div class="bg-white px-4 pt-3 d-flex justify-content-between mb-3">
                <h5>Produk</h5>
                <ul class="d-flex gap-5 list-unstyled">
                    <li class="mx-3">Harga Satuan</li>
                    <li class="mx-3">Kuantitas</li>
                    <li class="mx-3">Total Harga</li>
                    <li class="ms-3 me-5">Aksi</li>
                </ul>
            </div>


            <div class="bg-white px-4 py-2 d-flex justify-content-between align-items-center">
                <div class="py-4 d-flex gap-4">
                    <img src="../upload/image/gambar1.jpeg" alt="" width="100" height="100">
                    <p class="mt-2">produk terbaik sepanjang masa</p>
                </div>
            </div>
        </div>
    </section>




    <!-- footer start -->
    <?php require '../partials/footer.php' ?>
    <!-- footer end -->


    <!-- BEGIN: Vendor JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>