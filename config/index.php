<?php

// koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "minipbl");

// Fungsi untuk mengubah integer ke format Rupiah
function formatRupiah($angka)
{
    $rupiah = "Rp " . number_format($angka, 0, ',', '.');
    return $rupiah;
}
