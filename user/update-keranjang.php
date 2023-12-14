<?php
require '../config/index.php';
$id = $_GET['id'];
$jumlah = $_POST['hasil'];


if (isset($_POST['tambah'])) {
    $hasil = $jumlah + 1;
    $result = mysqli_query($conn, "UPDATE keranjang SET jumlah = '$hasil' WHERE id_product = '$id'");
    header('location: keranjang.php');
    echo "ditambah";
}

if (isset($_POST['kurang'])) {
    // Pastikan jumlah tidak kurang dari 0
    if ($jumlah > 0) {
        $hasil = $jumlah - 1;
        $result = mysqli_query($conn, "UPDATE keranjang SET jumlah = '$hasil' WHERE id_product = '$id'");
        header('location: keranjang.php');
        echo "dikurang";
    } else {
        
    }
}
