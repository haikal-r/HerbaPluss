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
    <?php require "../partials/navbar-admin.php" ?>
    <!-- Hero setion -->
    <section>
        <div class="container-fluid d-flex justify-content-center py-4 px-5 mb-3">
            <div class="row">
                <div class="col-3 bg-white rounded-4 shadow-sm">
                    <div class="py-3">
                        <h3 class="text-center"><i class="fa-solid fa-grip me-2"></i>Kategori</h3>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Makanan</li>
                            <li class="list-group-item">Minuman</li>
                            <li class="list-group-item">Obat-obatan</li>
                            <li class="list-group-item">Kosmetik</li>
                        </ul>
                    </div>
                </div>
                <div class="col-9">
                    <div id="carouselExample" class="carousel slide " data-bs-ride="carousel">
                        <div class="carousel-inner rounded-4">
                            <div class="carousel-item active c-item">
                                <img src="../assets/img/carousel1.jpg" class="d-block w-100 rounded-4" alt="...">
                            </div>
                            <div class="carousel-item c-item">
                                <img src="../assets/img/carousel2.jpg" class="d-block w-100 c-img rounded-4" alt="...">
                            </div>
                            <div class="carousel-item c-item">
                                <img src="../assets/img/carousel3.jpg" class="d-block w-100 c-img rounded-4" alt="...">
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
            </div>
        </div>


    </section>

    <!-- Katalog product -->
    <section>
        <div class="container d-flex flex-column bg-white pb-4 pt-3 my-3 shadow-sm">
            <div class="bg-white p-1 mb-1 ">
                <h3>Katalog Produk</h3>
            </div>
            <div class="d-flex gap-3 justify-content-center">
                <?php
                include '../config/index.php';

                $query = mysqli_query($conn, "SELECT * FROM product ORDER BY RAND() LIMIT 5");
                while ($data = mysqli_fetch_assoc($query)) {
                ?>
                    <div class="card" style="width: 15rem;">
                        <a href="detail.php?id=<?= $data['id_product'] ?>">
                            <img src="../upload/image/<?php echo $data['gambar'] ?>" class="card-img-top" alt="...">
                        </a>
                        <div class="card-body d-flex flex-column justify-content-end">
                            <h5 class="fw-bold"><?php echo $data['nama_barang'] ?></h5>
                            <p class="card-text text-secondary fw-medium"><?php echo formatRupiah($data['harga']) ?></p>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </section>

    <!-- List Product -->
    <section>
        <div class="container-xxl py-3">
            <div class="row">
                <div class="col">
                    <div>
                        <div class="d-flex justify-content-between align-items-center bg-white py-3 px-3 mb-2 border-bottom border-5 border-success">
                            <h4 class="mt-1">Rekomendasi</h4>
                            <a href="#" class="text-decoration-none d-flex align-items-center">Lihat Semua<i class="fa-solid fa-circle-arrow-right fa-lg ms-2"></i></a>
                        </div>
                        <div class="d-flex flex-wrap gap-3 justify-content-start px-3 pb-4">
                            <?php
                            $query = mysqli_query($conn, "SELECT * FROM product");
                            while ($data = mysqli_fetch_assoc($query)) {
                            ?>
                                <div class="card" style="width: 15rem;">
                                    <a href="detail.php?id=<?= $data['id_product'] ?>">
                                        <img src="../upload/image/<?php echo $data['gambar'] ?>" class="card-img-top" alt="...">
                                    </a>
                                    <div class="card-body d-flex flex-column justify-content-end">
                                        <h5 class="fw-bold"><?php echo $data['nama_barang'] ?></h5>
                                        <p class="card-text text-secondary fw-medium"><?php echo formatRupiah($data['harga']) ?></p>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
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