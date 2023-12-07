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
    <!-- style -->
    <link rel="stylesheet" href="../vendor/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="../vendor/fontawesome/fontawesome-free-6.4.2-web/css/all.min.css">
    <link rel="stylesheet" href="../assets/css/main.css" />
    <link rel="stylesheet" href="./style.css">
    <title>Document</title>
</head>

<body class="bg-body-secondary">
    <!-- navbar -->
    <?php require '../partials/navbar-admin.php'; ?>
    <!-- navbar end -->

    <!-- detail section -->
    <section>
        <div class="container bg-white d-flex my-4 p-3">
            <div class="bg-body-secondary w-100 p-2 d-flex justify-content-center align-items-center me-4">
                <img src="../assets/img/gambar1.jpeg" alt="" class="w-100 ">
            </div>
            <div class="d-flex flex-column mt-3">
                <h1>MASTIN</h1>
                <div class="bg-body-secondary p-4">
                    <h1 class="text-success">
                        Rp. 100.000.000
                    </h1>
                </div>
                <p>
                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Similique, perspiciatis consequuntur voluptas blanditiis voluptatem itaque corrupti molestias dolor vel, eligendi saepe aut eveniet atque sequi magni inventore. Ducimus, facere animi?
                </p>
                <div class="mt-4 d-flex gap-2">
                    <button type="button" name="keranjang" class="btn btn-outline-success rounded-0 py-3 px-4">Masukan Keranjang</button>
                    <button type="button" name="beli" class="btn btn-success rounded-0 py-3 px-5">Beli Sekarang</button>
                </div>
            </div>
        </div>
    </section>
</body>

</html>