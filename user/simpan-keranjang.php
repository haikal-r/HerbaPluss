<?php
require '../config/index.php';
session_start();

$idProduk = $_GET['id'];
$idUser = $_SESSION['id_user'];
$nama = $_GET['nama'];
$harga = $_GET['harga'];
$gambar = $_GET['gambar'];

$query = "INSERT INTO `keranjang` (`nama_barang`,`harga`,`gambar`,`id_user`, `id_product` )  
            VALUES ('$nama','$harga','$gambar','$idUser','$idProduk')";
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