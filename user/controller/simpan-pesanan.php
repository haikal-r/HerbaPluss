<?php
require '../../config/index.php';

session_start();
$idUser = $_SESSION['id_user'];

$query = mysqli_query($conn, "SELECT * FROM keranjang WHERE id_pengguna = '$idUser' AND type = 'true'");
while ($data = mysqli_fetch_assoc($query)) {
    $idBarang = $data['id_barang'];
    $idKeranjang = $data['id_keranjang'];
    $tanggal = date("Y-m-d");
    $totalHarga = $data['total_harga'];
    $jumlah = $data['jumlah'];
    $query1 = "INSERT INTO `transaksi_penjualan` (`tanggal` ,`jumlah` ,`total_harga` ,`id_user` ,`id_product`)
                VALUES ('$tanggal','$jumlah','$totalHarga','$idUser', '$idBarang')";
    $result = mysqli_query($conn, $query1);
    if ($result) {
        $deleteKeranjang = mysqli_query($conn, "DELETE FROM keranjang WHERE id_keranjang='$idKeranjang' AND type= 'true'");
        echo "
            <script>
                alert('Pesanan telah dibuat')
                window.location.href = '../index.php'
            </script>
            ";
    }
}
