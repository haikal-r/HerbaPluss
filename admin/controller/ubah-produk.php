<?php
// include database connection file
include '../config/index.php';

$nama = $_POST['nama_barang'];
$harga = $_POST['harga'];
$stok = $_POST['stok'];
$gambar = $_POST['gambar'];
$result = mysqli_query($koneksi, "UPDATE product SET
nama_barang='$nama',harga='$harga',stok='$stok' WHERE gambar='$gambar'");

// Redirect to homepage to display updated user in list
header("Location: index.php");
