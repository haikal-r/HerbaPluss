<?php
    include '../config/index.php';
    $nama = $_POST['nama_barang'];
    $harga= $_POST['harga'];
    $stok = $_POST['stok'];
    $gambar = $_POST['gambar'];
    $input = mysqli_query($conn, "INSERT INTO `product` (`nama_barang`, `harga`, `stok`, `gambar`) VALUES('$nama', '$harga', '$stok', '$gambar')") or die(mysqli_error($koneksi));

    if($input){
        echo "Data Berhasil Disimpan";
        header("location:produk.php");
    }else{
        echo "Gagal Disimpan";
    }
?>