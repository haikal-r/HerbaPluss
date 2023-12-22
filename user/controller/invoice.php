<?php
include '../../libs/fpdf/fpdf.php';
include '../../config/index.php';
include '../../config/format-rupiah.php';
session_start();

$id = $_GET['id'];
$idUser = $_SESSION['id_user'];
$username = $_SESSION['username'];
$alamat = $_SESSION['alamat'];
$nomorTelepon =  $_SESSION['nomor_telepon'];
$tanggal = date("Y-m-d");

ob_start();
$pdf = new FPDF("P", "cm", "A4");
$pdf->SetMargins(1.5, 1, 1);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 14);
$imagePath = "../../assets/img/HerbaPluss.jpg";
$pdf->Image($imagePath, 1.5, 1.5);
$pdf->SetY(3.5);
$pdf->Cell(0, 0, 'Invoice');  // Menambahkan teks pada baris pertama dengan jarak 10 di atas dan 0 di bawah
$pdf->ln(0.2);  // Pindah ke baris berikutnya
$pdf->SetFont('Arial', '', 10);  // Font normal (medium) dengan ukuran 10 untuk baris kedua
$pdf->Cell(0, 0.8, 'Diterbitkan atas nama:');
$pdf->ln(0.7);  // Pindah ke baris berikutnya
$pdf->SetFont('Arial', 'B', 10);  // Font normal (medium) dengan ukuran 10 untuk baris kedua
$pdf->Cell(1, 1, 'Pembeli', 0, 0);  // Jarak 1 di bawah, tetapi 0 di sebelah kiri (tanpa pindah baris)

// Menambahkan jarak antara "Nama Pembeli" dan "Pembeli"
$pdf->Cell(1.5); // Jarak horizontal sebanyak 0.5 cm

// Menambahkan teks "Nama Pembeli"
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(0, 1, $username, 0, 1);  // Jarak 1 di bawah

$pdf->SetFont('Arial', 'B', 10);  // Font normal (medium) dengan ukuran 10 untuk baris kedua
$pdf->Cell(1, 0.5, 'Tanggal', 0, 0);  // Jarak 1 di bawah, tetapi 0 di sebelah kiri (tanpa pindah baris)

// Menambahkan jarak antara "Nama Pembeli" dan "Pembeli"
$pdf->Cell(1.5); // Jarak horizontal sebanyak 0.5 cm

// Menambahkan teks "Nama Pembeli"
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(0, 0.5, $tanggal, 0, 1);  // Jarak 1 di bawah

$pdf->SetDrawColor(192, 192, 192);
$pdf->Cell(0, 0.7, '', 'B', 1);

// end header

// start table
$pdf->SetX(2);
$pdf->SetFont('Arial', 'B', 10.5);
$pdf->Cell(6, 1.5, "Nama Produk", 0, 0);
$pdf->Cell(4, 1.5, "Jumlah Barang", 0, 0, 'C');
$pdf->Cell(4, 1.5, "Harga Barang", 0, 0, 'C');
$pdf->Cell(4, 1.5, "Total Harga", 0, 1, 'C');
$pdf->SetFont('Arial', '', 10);
$no = 1;
$tampil = mysqli_query($conn, "SELECT * FROM transaksi_penjualan WHERE id_pengguna = '$idUser' AND id_transaksi_penjualan = '$id' ");
while ($hasil = mysqli_fetch_array($tampil)) {
    $pdf->SetX(2);
    $pdf->SetFont('Arial', '', 10.5);
    $pdf->Cell(6, 1, $hasil['nama_barang'], 0, 0);
    $pdf->Cell(4, 1, $hasil['jumlah'], 0, 0, 'C');
    $pdf->Cell(4, 1, formatRupiah($hasil['harga']), 0, 0, 'C');
    $pdf->Cell(4, 1, formatRupiah($hasil['total_harga']), 0, 1, 'C');
};
$pdf->SetFont('Arial', 'B', 10);
$pdf->SetFillColor(220, 220, 220);
$pdf->Cell(0.4, 1, "", 0, 0, 'C', true);
$pdf->Cell(6, 1, "Subtotal", 0, 0, 'L', true);
$pdf->Cell(4, 1, "", 0, 0, 'C', true);
$pdf->Cell(4, 1, "", 0, 0, 'C', true);
$queryTotal = mysqli_query($conn, "SELECT SUM(total_harga) AS total_harga FROM transaksi_penjualan WHERE id_transaksi_penjualan = '$id'");
$data1 = mysqli_fetch_assoc($queryTotal);
$pdf->Cell(4, 1, formatRupiah($data1['total_harga']), 0, 1, 'C', true);

$pdf->SetDrawColor(192, 192, 192);
$pdf->Cell(0, 0.7, '', 'B', 1);
// end table

// start total
$pdf->Cell(0, 0.6, "", 0, 1);

$pdf->SetX($pdf->GetPageWidth() - 11);
$pdf->SetFillColor(220, 220, 220);
$pdf->SetFont('Arial', 'B', 12);
$pdf->SetTextColor(0, 128, 0);
$pdf->Cell(0.4, 1, "", 0, 0, 'C', true);
$pdf->Cell(4.1, 1, "Total", 0, 0, 'L', true);
$pdf->Cell(4.5, 1, formatRupiah($data1['total_harga']), 0, 0, 'R', true);
$pdf->Cell(1, 1, "", 0, 1, 'C', true);

$pdf->SetDrawColor(192, 192, 192);
$pdf->Cell(0, 0.7, '', 'B', 1);

// end total
$pdf->SetFont('Arial', 'B', 11);
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(0, 2, 'Tujuan Pegiriman');

$pdf->ln(0.7);  // Pindah ke baris berikutnya

$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(0, 2, $username);

$pdf->ln(0.7);  // Pindah ke baris berikutnya

$pdf->SetFont('Arial', '', 10);
$pdf->Cell(2, 2, $alamat, 0, 0);





$pdf->Output("invoice.pdf", "I");

?>