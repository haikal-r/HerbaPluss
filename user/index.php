<?php
session_start();
if(!isset($_SESSION['username'])){
    header('location: ../login.php ');
exit;
}

$user = $_SESSION['user'];
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
    <?php require "../partials/navbar-user.php" ?>
    <!-- Hero setion -->
    <div class="container-fluid d-flex justify-content-center py-4">
        <div id="carouselExample" class="carousel slide w-50">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="../assets/img/carousel.jpeg" class="d-block w-100 h-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="../assets/img/gambar2.jpeg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="../assets/img/gambar3.jpeg" class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>

    <!-- card product -->
    <div class="container d-flex">
        <div class="card me-5" style="width: 18rem;">
            <img src="../assets/img/gambar3.jpeg" class="card-img-top" alt="...">
            <div class="card-body">
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <div class="d-flex justify-content-end">
                    <button class="btn btn-primary me-3">Beli</button>
                    <button class="btn btn-danger">Beli</button>
                </div>
            </div>
        </div>
        <div class="card me-5" style="width: 18rem;">
            <img src="../assets/img/gambar3.jpeg" class="card-img-top" alt="...">
            <div class="card-body">
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <div class="d-flex justify-content-end">
                    <button class="btn btn-primary me-3">Beli</button>
                    <button class="btn btn-danger">Beli</button>
                </div>
            </div>
        </div>
        <div class="card me-5" style="width: 18rem;">
            <img src="../assets/img/gambar3.jpeg" class="card-img-top" alt="...">
            <div class="card-body">
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <div class="d-flex justify-content-end">
                    <button class="btn btn-primary me-3">Beli</button>
                    <button class="btn btn-danger">Beli</button>
                </div>
            </div>
        </div>
        <div class="card me-5" style="width: 18rem;">
            <img src="../assets/img/gambar3.jpeg" class="card-img-top" alt="...">
            <div class="card-body">
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <div class="d-flex justify-content-end">
                    <button class="btn btn-primary me-3">Beli</button>
                    <button class="btn btn-danger">Beli</button>
                </div>
            </div>
        </div>
    </div>
</body>

</html>