-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2020 at 08:02 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jubeta`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_user` (IN `i_username` VARCHAR(100), IN `i_pass` VARCHAR(255), IN `i_tingkatan_user` VARCHAR(50), IN `i_nama` VARCHAR(30), IN `i_alamat` VARCHAR(50), IN `i_notelp` VARCHAR(50), IN `i_jenis_kelamin` VARCHAR(30), IN `i_tempat_lahir` VARCHAR(30), IN `i_tgl_lahir` DATE, IN `i_foto_user` VARCHAR(30), IN `i_ktp_selfie` VARCHAR(30), IN `i_foto_ktp` VARCHAR(30))  BEGIN
	INSERT INTO user_jubeta (username, passwd, tingkatan_user) VALUES (i_username, i_pass, i_tingkatan_user);
	insert into detail_user (id_pembeli, foto_user, nama, tempat_lahir, tgl_lahir, alamat, no_telp, jenis_kelamin, ktp_selfie, foto_ktp) VALUES (LAST_INSERT_ID(), i_foto_user, i_nama, i_tempat_lahir, i_tgl_lahir, i_alamat, i_no_telp, i_jenis_kelamin, i_ktp_selfie, i_foto_ktp); 	

	END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `detail_user`
--

CREATE TABLE `detail_user` (
  `id_detail_user` int(11) NOT NULL,
  `id_pembeli` int(11) NOT NULL,
  `foto_user` varchar(225) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_telp` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(25) DEFAULT NULL,
  `ktp_selfie` varchar(225) NOT NULL,
  `foto_ktp` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pesan`
--

CREATE TABLE `pesan` (
  `id_pesan` int(11) NOT NULL,
  `id_produk` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `tgl_order` date DEFAULT NULL,
  `jam_order` time DEFAULT NULL,
  `jml_order` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(100) NOT NULL,
  `kode_produk` varchar(100) NOT NULL,
  `nama_produk` varchar(100) DEFAULT NULL,
  `harga_produk` int(11) DEFAULT NULL,
  `stok` int(11) DEFAULT NULL,
  `merk` varchar(100) DEFAULT NULL,
  `deskripsi` varchar(100) DEFAULT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `kode_produk`, `nama_produk`, `harga_produk`, `stok`, `merk`, `deskripsi`, `foto`) VALUES
(15, 'sa32e23', 'we', 32, 23, 'e23', 'Tiga kali', '376-842-flawa.png'),
(16, 'U123', 'Motoran', 45000000, 12, 'Kawasaki', 'dua', '428-828-Screenshot (1).png'),
(18, 'sa32e23', 'Motor SAMI', 4535, 3, 'rtetet', 'sadask', '536-679-123-flawa.png'),
(19, 'asA', 'ADASD', 2, 2, 'WRWR', 'SFS', ''),
(20, 'ASNDAJSK', 'WQNDQWK', 1212, 12, 'WRKLWERJWKR32', 'SFSDFS', '641-828-Screenshot (1).png');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_pesan` int(100) NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `metode_pembayaran` enum('Transfer','COD','','') NOT NULL,
  `harga_antar` int(11) DEFAULT NULL,
  `status` varchar(25) DEFAULT NULL,
  `produk_status` varchar(50) NOT NULL,
  `total_harga` int(11) DEFAULT NULL,
  `bukti_pembayaran` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user_jubeta`
--

CREATE TABLE `user_jubeta` (
  `id_user` int(11) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `passwd` varchar(225) DEFAULT NULL,
  `tingkatan_user` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_user`
--
ALTER TABLE `detail_user`
  ADD PRIMARY KEY (`id_detail_user`),
  ADD KEY `userID` (`id_pembeli`) USING BTREE;

--
-- Indexes for table `pesan`
--
ALTER TABLE `pesan`
  ADD PRIMARY KEY (`id_pesan`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_produk` (`id_pesan`);

--
-- Indexes for table `user_jubeta`
--
ALTER TABLE `user_jubeta`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_user`
--
ALTER TABLE `detail_user`
  MODIFY `id_detail_user` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pesan`
--
ALTER TABLE `pesan`
  MODIFY `id_pesan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_jubeta`
--
ALTER TABLE `user_jubeta`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_user`
--
ALTER TABLE `detail_user`
  ADD CONSTRAINT `detail_user_ibfk_1` FOREIGN KEY (`id_pembeli`) REFERENCES `user_jubeta` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
