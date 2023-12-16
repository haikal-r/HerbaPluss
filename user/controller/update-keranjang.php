<?php
require '../config/index.php';
$id = $_GET['id'];
$jumlah = $_POST['hasil'];
$harga = $_GET['harga'];
$jumlahProduk = $_GET['jumlah'];
echo $jumlahProduk;

if (isset($_POST['checkbox'])) {
    $result = mysqli_query($conn, "UPDATE keranjang SET type = 'true' WHERE id_product = '$id'");
    echo "adda";
    header('location: keranjang.php');
}else{
    $result = mysqli_query($conn, "UPDATE keranjang SET type = 'false' WHERE id_product = '$id'");
echo "tidak ada";
header('location: keranjang.php');
}




if (isset($_POST['tambah'])) {
    $hasil = $jumlah + 1;
    $totalHarga = $hasil * $harga;
    $result = mysqli_query($conn, "UPDATE keranjang SET jumlah = '$hasil', total_harga = '$totalHarga' WHERE id_product = '$id'");
    header('location: keranjang.php');
    echo "ditambah";
}

if (isset($_POST['kurang'])) {
    // Pastikan jumlah tidak kurang dari 0
    if ($jumlah > 0) {
        $hasil = $jumlah - 1;
        $totalHarga = $hasil * $harga;
        $result = mysqli_query($conn, "UPDATE keranjang SET jumlah = '$hasil', total_harga = '$totalHarga' WHERE id_product = '$id'");
        header('location: keranjang.php');
        echo "dikurang";
    } else {
        
    }
}
