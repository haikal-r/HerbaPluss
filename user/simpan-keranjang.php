<?php
require '../config/index.php';

$id = $_GET['id'];
$queryProduk = mysqli_query($conn, "SELECT * FROM product WHERE id_product='$id'");
$produk = mysqli_fetch_array($queryProduk);



if (isset($_POST['beli'])) {
    echo intval($produk['harga']);
    $hasil = $_POST['hasil'] ? (int)$_POST['hasil'] : 2 ;
    $total_harga = $hasil * intval($produk['harga']);
    $query = "INSERT INTO `transaksi_penjualan` (`jumlah`, `total_harga` )  VALUES ('$hasil', '$total_harga')";
    $result = mysqli_query($conn, $query);
    if ($result) {
        
    };
}
