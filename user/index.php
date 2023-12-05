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
    <link rel="stylesheet" href="./style.css">
    <title>Document</title>
</head>

<body class="bg-body-secondary">
    <?php require "../partials/navbar-user.php" ?>
    <!-- Hero setion -->
    <section>
        <div class="container-fluid d-flex justify-content-center py-4 px-5 mb-3">
            <div class="row">
                <div class="col-3 bg-white rounded-4">
                    <div class="py-3 ">
                        <h3 class="text-center"><i class="fa-solid fa-grip me-2"></i>Kategori</h3>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">An item</li>
                            <li class="list-group-item">A second item</li>
                            <li class="list-group-item">A third item</li>
                            <li class="list-group-item">A fourth item</li>
                            <li class="list-group-item">And a fifth one</li>
                        </ul>
                    </div>
                </div>
                <div class="col-9">
                    <div id="carouselExampleAutoplaying" class="carousel slide bg-white w-100 rounded" data-bs-ride="carousel">
                        <div class="carousel-inner ">
                            <div class="carousel-item active">
                                <img src="../assets/img/gambarr.jpg" class="d-block w-50 object-fit-cover rounded" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="../assets/img/gambarr.jpg" class="d-block w-50 object-fit-cover rounded" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="../assets/img/gambarr.jpg" class="d-block w-50 object-fit-cover rounded" alt="...">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>


    </section>

    <!-- Katalog product -->
    <section>
        <div class="container d-flex flex-column bg-white pb-4 pt-3 my-3">
            <div class="bg-white p-1 mb-1">
                <h3>Katalog Produk</h3>
            </div>
            <div class="d-flex gap-3 justify-content-center">
                <div class="card" style="width: 15rem;">
                    <img src="../assets/img/gambar3.jpeg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5>Mastin</h5>
                        <p class="card-text">Rp300.000</p>
                        <div class="d-flex justify-content-end">
                            <button class="btn btn-primary me-3">Beli</button>
                            <button class="btn btn-danger">Beli</button>
                        </div>
                    </div>
                </div>
                <div class="card" style="width: 15rem;">
                    <img src="../assets/img/gambar3.jpeg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5>Mastin</h5>
                        <p class="card-text">Rp300.000</p>
                        <div class="d-flex justify-content-end">
                            <button class="btn btn-primary me-3">Beli</button>
                            <button class="btn btn-danger">Beli</button>
                        </div>
                    </div>
                </div>
                <div class="card" style="width: 15rem;">
                    <img src="../assets/img/gambar3.jpeg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5>Mastin</h5>
                        <p class="card-text">Rp300.000</p>
                        <div class="d-flex justify-content-end">
                            <button class="btn btn-primary me-3">Beli</button>
                            <button class="btn btn-danger">Beli</button>
                        </div>
                    </div>
                </div>
                <div class="card" style="width: 15rem;">
                    <img src="../assets/img/gambar3.jpeg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5>Mastin</h5>
                        <p class="card-text">Rp300.000</p>
                        <div class="d-flex justify-content-end">
                            <button class="btn btn-primary me-3">Beli</button>
                            <button class="btn btn-danger">Beli</button>
                        </div>
                    </div>
                </div>
                <div class="card" style="width: 15rem;">
                    <img src="../assets/img/gambar3.jpeg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5>Mastin</h5>
                        <p class="card-text">Rp300.000</p>
                        <div class="d-flex justify-content-end">
                            <button class="btn btn-primary me-3">Beli</button>
                            <button class="btn btn-danger">Beli</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Kategori Product -->
    <section>
        <div class="container-fluid py-3">
            <div class="row">
                <div class="col">
                    <div>
                        <div class="d-flex justify-content-between align-items-center bg-white py-3 px-3 mb-2 border-bottom border-5 border-success">
                            <h4 class="mt-1">Rekomendasi</h4>
                            <a href="#" class="text-decoration-none d-flex align-items-center">Lihat Semua<i class="fa-solid fa-circle-arrow-right fa-lg ms-2"></i></a>
                        </div>
                        <div class="d-flex flex-wrap gap-3 justify-content-start px-3 pb-4">
                            <div class="card border border-2 p-2" style="width: 17rem;">
                                <img src="../assets/img/gambar3.jpeg" class="card-img" alt="...">
                                <div class="card-body">
                                    <h5>Mastin</h5>
                                    <p class="card-text">Rp300.000</p>
                                    <div class="d-flex justify-content-end">
                                        <button class="btn btn-primary me-3">Beli</button>
                                        <button class="btn btn-danger">Beli</button>
                                    </div>
                                </div>
                            </div>
                            <div class="card border border-2 p-2" style="width: 17rem;">
                                <img src="../assets/img/gambar3.jpeg" class="card-img" alt="...">
                                <div class="card-body">
                                    <h5>Mastin</h5>
                                    <p class="card-text">Rp300.000</p>
                                    <div class="d-flex justify-content-end">
                                        <button class="btn btn-primary me-3">Beli</button>
                                        <button class="btn btn-danger">Beli</button>
                                    </div>
                                </div>
                            </div>
                            <div class="card border border-2 p-2" style="width: 17rem;">
                                <img src="../assets/img/gambar3.jpeg" class="card-img" alt="...">
                                <div class="card-body">
                                    <h5>Mastin</h5>
                                    <p class="card-text">Rp300.000</p>
                                    <div class="d-flex justify-content-end">
                                        <button class="btn btn-primary me-3">Beli</button>
                                        <button class="btn btn-danger">Beli</button>
                                    </div>
                                </div>
                            </div>
                            <div class="card border border-2 p-2" style="width: 17rem;">
                                <img src="../assets/img/gambar3.jpeg" class="card-img" alt="...">
                                <div class="card-body">
                                    <h5>Mastin</h5>
                                    <p class="card-text">Rp300.000</p>
                                    <div class="d-flex justify-content-end">
                                        <button class="btn btn-primary me-3">Beli</button>
                                        <button class="btn btn-danger">Beli</button>
                                    </div>
                                </div>
                            </div>
                            <div class="card border border-2 p-2" style="width: 17rem;">
                                <img src="../assets/img/gambar3.jpeg" class="card-img" alt="...">
                                <div class="card-body">
                                    <h5>Mastin</h5>
                                    <p class="card-text">Rp300.000</p>
                                    <div class="d-flex justify-content-end">
                                        <button class="btn btn-primary me-3">Beli</button>
                                        <button class="btn btn-danger">Beli</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- BEGIN: Vendor JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>