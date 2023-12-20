-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 20, 2023 at 07:40 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `minipbl`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `deskripsi` varchar(250) NOT NULL,
  `harga` int(100) NOT NULL,
  `stok` int(11) DEFAULT NULL,
  `gambar` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `deskripsi`, `harga`, `stok`, `gambar`) VALUES
(63, 'Wyvern', 'Meredakan batuk dan masuk angin, menekan batuk ( antitusive) , mengencerkan & mengeluarkan dahak, menthol berkhasiat sebagaii penyegar mulut, Jahe merah & Kencurnya berkhasiat sebagai penghangat tubuh.', 10000, 2, 'gambar2.jpeg'),
(64, 'Nofon', 'Nofon Masuk Angin adalah sirup herbal yang digunakan untuk meredakan gejala masuk angin. Nofon Masuk Angin Plus Ginseng mengandung ginseng untuk menghangatkan badan dan meredakan mual dan perut kembung. Nofon Kids Syrup digunakan untuk membantu mered', 15000, 6, 'gambar4.jpeg'),
(65, 'Tolak Angin', 'obat herbal yang diformulasi secara khusus untuk meringankan gejala selesma seperti : hidung tersumbat, pilek, sakit kepala dan badan terasa pegal.', 5000, 10, 'tolakangin.webp'),
(66, 'Komix Herbal Original', 'Komix Herbal Original merupakan obat herbal yang mengandung bahan alami berupa esktrak lagundi, ekstrak jahe merah, thymi herba, licorice, peppermint oil dan madu.', 17000, 6, 'komix.webp'),
(67, 'Tropicana Slim Sweetener Stevia', 'Stevia adalah pemanis buatan yang berasal dari daun tanaman Stevia rebaudiana. Tanaman ini berasal dari Amerika Selatan dan telah digunakan untuk makanan dan pengobatan selama ratusan tahun. \r\nProduk ini cocok Untuk anda yang sedang berdiet atau seda', 40000, 9, 'sweetener--1606993139.png'),
(80, 'Kamwo Herbal Creame', 'Krim herbal adalah produk perawatan kulit yang dirancang dengan menggunakan bahan-bahan alami yang berasal dari tumbuhan dan herba. Berbeda dengan krim konvensional yang mungkin mengandung bahan kimia atau bahan sintetis, krim herbal menekankan pen', 55000, 10, 'big_1.jpg'),
(83, 'Kamwo Soup Herbal', 'Sup herbal adalah hidangan sup yang dibuat dengan menggunakan berbagai jenis tumbuhan herbal dan rempah-rempah alami sebagai bahan utamanya. Berbeda dengan sup tradisional yang mungkin menggunakan kaldu daging atau sayuran sebagai dasar, sup herbal f', 80000, 5, 'img_sq_23.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `keranjang`
--

CREATE TABLE `keranjang` (
  `id_keranjang` int(11) NOT NULL,
  `jumlah` int(100) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `harga` int(100) NOT NULL,
  `total_harga` int(100) NOT NULL,
  `gambar` varchar(250) NOT NULL,
  `type` varchar(100) NOT NULL,
  `id_pengguna` int(100) NOT NULL,
  `id_barang` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `nomor_telepon` int(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `gambar` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `nama`, `alamat`, `nomor_telepon`, `email`, `role`, `password`, `gambar`) VALUES
(42, 'admin', 'legenda', 0, 'admin@if.local', 'penjual', '$2y$10$Eg2FV803P9.T61TcF4mTtuQEmYMv3.wtByr.jcinJP.ffx2WFeqda', ''),
(46, 'admin', 'Perumahan villa hanglekir, blok dd1 no.13, RT.4/RW.5', 892577084, 'admin@if.local', 'pembeli', '$2y$10$RTDDi6y/Wc.BOAL5UX.5oO.XamJZxKaaIE7rH64QcIA7WkxPSZ89u', 'lk1.png'),
(47, 'pembeli2', 'tiban', 28858556, 'soonhaikal88@gmail.com', 'pembeli', '$2y$10$gQ/53MfeubGZLEYuTM78F.uRkIpKJRykkP1inEYph3aYZEFeg.IOC', ''),
(48, '', '', 0, '', 'Choose...', '$2y$10$MYmTye/3U2rkPKiQLre8Ge.2LhWDK6WQrFF5OuY/gsWPKVWE8jwE6', '');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_penjualan`
--

CREATE TABLE `transaksi_penjualan` (
  `id_transaksi_penjualan` int(11) NOT NULL,
  `tanggal` varchar(100) NOT NULL,
  `gambar` varchar(250) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `jumlah` int(50) NOT NULL,
  `harga` int(100) NOT NULL,
  `total_harga` int(30) NOT NULL,
  `id_pengguna` int(11) DEFAULT NULL,
  `id_barang` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaksi_penjualan`
--

INSERT INTO `transaksi_penjualan` (`id_transaksi_penjualan`, `tanggal`, `gambar`, `nama_barang`, `jumlah`, `harga`, `total_harga`, `id_pengguna`, `id_barang`) VALUES
(1117, '2023-12-19', 'sweetener--1606993139.png', 'Tropicana Slim Sweetener Stevia', 1, 40000, 40000, 46, 67),
(1118, '2023-12-19', 'gambar2.jpeg', 'Wyvern', 1, 10000, 10000, 47, 63),
(1119, '2023-12-19', 'img_sq_23.jpg', 'Kamwo Soup Herbal', 1, 80000, 80000, 47, 83),
(1120, '2023-12-19', 'sweetener--1606993139.png', 'Tropicana Slim Sweetener Stevia', 1, 40000, 40000, 47, 67),
(1121, '2023-12-19', 'tolakangin.webp', 'Tolak Angin', 1, 5000, 5000, 47, 65),
(1122, '2023-12-20', 'img_sq_23.jpg', 'Kamwo Soup Herbal', 1, 80000, 80000, 47, 83);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`),
  ADD KEY `nama_barang` (`nama_barang`),
  ADD KEY `harga` (`harga`),
  ADD KEY `gambar` (`gambar`);

--
-- Indexes for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id_keranjang`),
  ADD KEY `fk_nama_barang` (`nama_barang`),
  ADD KEY `fk_harga` (`harga`),
  ADD KEY `fk_gambar` (`gambar`),
  ADD KEY `fk_id_user` (`id_pengguna`),
  ADD KEY `fk_id_product` (`id_barang`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indexes for table `transaksi_penjualan`
--
ALTER TABLE `transaksi_penjualan`
  ADD PRIMARY KEY (`id_transaksi_penjualan`),
  ADD KEY `fk_orders_user` (`id_pengguna`),
  ADD KEY `fk_orders_products` (`id_barang`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id_keranjang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=173;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `transaksi_penjualan`
--
ALTER TABLE `transaksi_penjualan`
  MODIFY `id_transaksi_penjualan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1123;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD CONSTRAINT `fk_gambar` FOREIGN KEY (`gambar`) REFERENCES `barang` (`gambar`),
  ADD CONSTRAINT `fk_harga` FOREIGN KEY (`harga`) REFERENCES `barang` (`harga`),
  ADD CONSTRAINT `fk_id_product` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`),
  ADD CONSTRAINT `fk_id_user` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`),
  ADD CONSTRAINT `fk_nama_barang` FOREIGN KEY (`nama_barang`) REFERENCES `barang` (`nama_barang`);

--
-- Constraints for table `transaksi_penjualan`
--
ALTER TABLE `transaksi_penjualan`
  ADD CONSTRAINT `fk_orders_products` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`),
  ADD CONSTRAINT `fk_orders_user` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
