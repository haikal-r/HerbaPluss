<?php
require '../config/index.php';

if (isset($_POST['beli'])) {
    $tanggal = date("Y-m-d");
    $jumlah = $_POST['hasil'] ? (int)$_POST['hasil'] : 2 ;
    $query = "INSERT INTO `transaksi_penjualan` (`tanggal`,`jumlah` )  VALUES ('$tanggal','$jumlah')";
    $result = mysqli_query($conn, $query);
    if ($result) {
        header('location: index.php');
    };
}
