<?php
require '../config/index.php';

session_start();

if (isset($_POST['beli'])) {
    $tanggal = date("Y-m-d");
    $jumlah = $_POST['hasil'] ? (int)$_POST['hasil'] : 2;
    $harga = $_GET['p'];
    $totalHarga = $jumlah * $harga;
    $idUser = $_SESSION['id_user'];
    $idProduct = $_GET['id'];
    $query = "INSERT INTO `transaksi_penjualan` (`tanggal`,`jumlah`,`total_harga`,`id_user`, `id_product` )  VALUES ('$tanggal','$jumlah','$totalHarga','$idUser','$idProduct')";
    $result = mysqli_query($conn, $query);
    // if ($result) {
    //     header('location: index.php');
    // };
}
