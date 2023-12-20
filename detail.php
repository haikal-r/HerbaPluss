<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- style -->
    <link rel="stylesheet" href="./vendor/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="./vendor/fontawesome/fontawesome-free-6.4.2-web/css/all.min.css">
    <link rel="stylesheet" href="./assets/css/main.css" />
    <link rel="stylesheet" href="./style.css">
    <title>Document</title>
</head>

<body class="bg-body-secondary">
    <!-- navbar -->
    <?php require './partials/navbar-landing-page.php'; ?>
    <!-- navbar end -->

    <!-- detail section -->
    <section>
        <div class="container bg-white d-flex my-4 p-3">
            <?php
            require './config/index.php';
            require './config/format-rupiah.php';

            $id = $_GET['id'];
            $queryProduk = mysqli_query($conn, "SELECT * FROM barang WHERE id_barang='$id'");
            $produk = mysqli_fetch_array($queryProduk);
            ?>
            <div class="bg-body-secondary w-100 p-2 d-flex justify-content-center align-items-center me-4">
                <img src="./upload/image/<?php echo $produk['gambar'] ?>" alt="" class="w-100">
            </div>
            <div class="d-flex flex-column mt-3 gap-2">
                <h1 class="fw-bold "><?php echo $produk['nama_barang'] ?></h1>
                <div class="bg-body-secondary p-4 ">
                    <h1 class="text-success fw-medium">
                        <?php echo formatRupiah($produk['harga']) ?>
                    </h1>
                </div>
                <p class="mt-2">
                    <?php echo $produk['deskripsi'] ?>
                </p>
                <div class="mt-4 d-flex flex-column gap-2">
                    <form action="" method="POST" class="d-flex gap-2">
                        <button type="submit" name="keranjang" class="btn btn-outline-success rounded-0 py-3 px-4">Masukan Keranjang</button>
                        <button type="submit" name="beli" class="btn btn-success rounded-0 py-3 px-5">Beli Sekarang</button>
                    </form>
                    <?php
                    // Menangani pengiriman formulir

                    if (isset($_POST["keranjang"])) {
                        // Logika untuk tombol "Masukan Keranjang"
                    ?>
                        <div class="alert alert-warning" role="alert">
                            Silahkan Login/Registrasi Terlebih dahulu !!
                        </div>
                    <?php
                    } elseif (isset($_POST["beli"])) {
                        ?>
                        <div class="alert alert-warning" role="alert">
                            Silahkan Login/Registrasi Terlebih dahulu !!
                        </div>
                    <?php
                    }

                    ?>
                </div>
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
                $queryProdukRandom = mysqli_query($conn, "SELECT * FROM barang ORDER BY RAND() LIMIT 5");
                while ($data = mysqli_fetch_assoc($queryProdukRandom)) {
                ?>
                    <div class="card" style="width: 15rem;">
                        <a href="detail.php?id=<?= $data['id_barang'] ?>">
                            <img src="./upload/image/<?php echo $data['gambar'] ?>" class="card-img-top" alt="...">
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
    </section>
</body>

</html>