<?php
session_start();
require '../config/index.php';
if (!isset($_SESSION['username'])) {
    header('location: ../login.php ');
    exit;
}

$user = $_SESSION['username'];
$id = $_SESSION['id_user'];
$hasil = isset($_POST['hasil']) ? (int)$_POST['hasil'] : 1;
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
    <link rel="stylesheet" href="./css/detail-style.css">
    <title>Document</title>
</head>

<body class="bg-body-secondary">
    <!-- navbar -->
    <?php require '../partials/navbar-user.php'; ?>
    <!-- navbar end -->

    <!-- detail section -->
    <section>
        <div class="container bg-white d-flex my-4 p-3">
            <?php

            $id = $_GET['id'];
            $queryProduk = mysqli_query($conn, "SELECT * FROM product WHERE id_product='$id'");
            $produk = mysqli_fetch_array($queryProduk);
            ?>
            <div class="bg-body-tertiary  p-2 d-flex justify-content-center align-items-center me-4">
                <img src="../upload/image/<?php echo $produk['gambar'] ?>" alt="" class=" img">
            </div>
            <div class="d-flex flex-column mt-3 gap-2">
                <h1 class="fw-bold "><?php echo $produk['nama_barang'] ?></h1>
                <div class="bg-body-tertiary p-4 shadow-sm">
                    <h1 class="text-success fw-medium">
                        <?php echo formatRupiah($produk['harga']); ?>
                    </h1>
                </div>
                <p class="mt-2">
                    <?php echo $produk['deskripsi'] ?>
                </p>
                <form action="simpan-keranjang.php?id=<?= $produk['id_product'] ?>&&nama=<?= $produk['nama_barang'] ?>&&harga=<?= $produk['harga'] ?>&&gambar=<?= $produk['gambar'] ?>" method="POST">
                    <div class="d-flex align-items-center">
                        <p class="me-3 my-auto text-black-50 fw-medium">Kuantitas</p>
                        <div class="btn-group" role="group" aria-label="Basic outlined example">
                            <button type="button" class="btn btn-outline-secondary rounded-0 px-3" onclick="kurang()">-</button>
                            <input type="text" name="hasil" id="hasil" class="btn btn-outline-secondary rounded-0" value="<?= $hasil; ?>" readonly>
                            <button type="button" class="btn btn-outline-secondary rounded-0" onclick="tambah()">+</button>
                        </div>

                    </div>
                    <div class="mt-4 d-flex gap-2">
                        <button type="submit" class="btn btn-outline-success rounded-0 py-3 px-4" name="keranjang">Masukan Keranjang</button>
                        <button type="submit" class="btn btn-success rounded-0 py-3 px-5" name="beli">Beli Sekarang</button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <!-- rekomendasi product -->
    <section>
        <div class="container bg-white p-2">
            <div class="d-flex justify-content-between align-items-center bg-white py-2 px-3 mb-2 border-bottom border-5 border-success">
                <h4 class="mt-1">Rekomendasi</h4>
            </div>
            <div class="d-flex gap-3 justify-content-center">
                <?php
                // randomize product
                $queryProdukRandom = mysqli_query($conn, "SELECT * FROM product ORDER BY RAND() LIMIT 5");
                while ($data = mysqli_fetch_assoc($queryProdukRandom)) {
                ?>
                    <div class="card" style="width: 15rem;">
                        <a href="detail.php?id=<?= $data['id_product'] ?>">
                            <img src="../upload/image/<?php echo $data['gambar'] ?>" class="card-img-top" alt="...">
                        </a>
                        <div class="card-body d-flex flex-column justify-content-end">
                            <h5 class="fw-bold"><?php echo $data['nama_barang'] ?></h5>
                            <p class="card-text text-secondary fw-medium"><?php echo formatRupiah($data['harga']); ?></p>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
        </div>
    </section>
    <script>
        function tambah() {
            var hasilElement = document.getElementById('hasil');
            var nilai = parseInt(hasilElement.value, 10) + 1;
            hasilElement.value = nilai;
        }

        function kurang() {
            var hasilElement = document.getElementById('hasil');
            var nilai = parseInt(hasilElement.value, 10);
            if (nilai > 0) {
                nilai--;
                hasilElement.value = nilai;
            }
        }

        
    </script>
</body>

</html>