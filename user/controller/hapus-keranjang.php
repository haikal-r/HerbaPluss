<?php
// include database connection file
require '../../config/index.php';
$id = $_GET['id'];
$result = mysqli_query($conn, "DELETE FROM keranjang WHERE id_keranjang='$id'");
header("Location: ../keranjang.php");
?>
