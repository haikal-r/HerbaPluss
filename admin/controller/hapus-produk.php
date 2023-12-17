<?php
// include database connection file
include '../../config/index.php';
$id = $_GET['id'];
$result = mysqli_query($conn, "DELETE FROM barang WHERE id_barang='$id'");
header("Location: ../produk.php");
?>
