<?php
// include database connection file
include '../../config/index.php';
$id = $_GET['id'];
$nama = $_POST['nama'];
$harga=$_POST['harga'];
$deskripsi=$_POST['deskripsi'];
$stok=$_POST['stok'];
$result = mysqli_query($conn, "UPDATE product SET
nama_barang = '$nama',harga = '$harga',deskripsi='$deskripsi',stok='$stok' WHERE id = '$id'");
// Redirect to homepage to display updated user in list
header("Location: ../view/produk.php");
?>