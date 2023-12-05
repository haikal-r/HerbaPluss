<?php
    include '../../config/index.php';
    $nama = $_POST['nama_barang'];
    $harga = $_POST['harga'];
    $deskripsi = $_POST['deskripsi'];
    $stok = $_POST['stok'];
    $input = mysqli_query($conn, "INSERT INTO `product` (`nama_barang`, `harga`, `deskripsi`, `stok`, `gambar`) VALUES('$nama', '$harga', '$deskripsi', '$stok', '')") or die(mysqli_error($koneksi));

    if($input){
        echo "Data Berhasil Disimpan";
        header("location: ../view/produk.php");
    }else{
        echo "Gagal Disimpan";
    }
?>