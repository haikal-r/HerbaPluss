<?php
require '../config/index.php';
$id = $_GET['id'];
$jumlah = $_POST['hasil'];
$harga = $_GET['harga'];

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
