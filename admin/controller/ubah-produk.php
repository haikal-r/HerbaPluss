<?php
include '../../config/index.php';
$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM product WHERE id='$id'");
while ($data = mysqli_fetch_array($result)) {
    $nama = $data['nama_barang'];
    $harga = $data['harga'];
    $deskripsi = $data['deskripsi'];
    $stok = $data['stok'];
}
?>

