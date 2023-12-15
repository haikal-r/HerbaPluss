<?php
require '../config/index.php';
session_start();

$idProduk = $_GET['id'];
$idUser = $_SESSION['id_user'];
$nama = $_GET['nama'];
$harga = $_GET['harga'];
$gambar = $_GET['gambar'];
$jumlah = isset($_POST['hasil']) ? (int)$_POST['hasil'] : 0;
$totalHarga = $harga * $jumlah;

$query = "INSERT INTO `keranjang` (`jumlah`,`nama_barang`,`harga`,`total_harga`,`gambar`,`id_user`, `id_product` )  
            VALUES ('$jumlah','$nama','$harga','$totalHarga','$gambar','$idUser','$idProduk')";
$result = mysqli_query($conn, $query);

if (isset($_POST['beli'])) {
    header('location: keranjang.php');
    // jika klik tombol keranjang 
    if (isset($_POST['keranjang'])) {
        ?>
            <script>
                alert('berhasil')
                window.location.href = './detail.php?id=<?= $_GET['id'] ?>';
            </script>
        <?php
        }
}


?>