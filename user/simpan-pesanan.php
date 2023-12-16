<?php
require '../config/index.php';

session_start();

$idKeranjang = $_GET['idk'];
$idUser = $_SESSION['id_user'];
$idProduct = $_GET['id'];
$tanggal = date("Y-m-d");
$jumlah = $_GET['jumlah'];
$total = $_GET['total'];
$query = "INSERT INTO `transaksi_penjualan` (`tanggal`,`jumlah`,`total_harga`,`id_user`, `id_product` )  VALUES ('$tanggal','$jumlah','$total','$idUser','$idProduct')";
$result = mysqli_query($conn, $query);
if ($result) {
    $deleteKeranjang = mysqli_query($conn, "DELETE FROM keranjang WHERE id_keranjang='$idKeranjang'");
    // echo "
    //     <script>
    //         alert('Pesanan telah dibuat')
    //         window.location.href = 'index.php'
    //     </script>
    //     ";
};
