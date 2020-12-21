-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 21, 2020 at 05:38 AM
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
CREATE DEFINER=`root`@`localhost` PROCEDURE `registrasi` (IN `i_username` VARCHAR(100), IN `i_pass` VARCHAR(255), IN `i_tingkatan_user` VARCHAR(50), IN `i_nama` VARCHAR(30), IN `i_email` VARCHAR(30), IN `i_alamat` VARCHAR(50), IN `i_notelp` VARCHAR(50), IN `i_jenis_kelamin` VARCHAR(30), IN `i_tempat_lahir` VARCHAR(30), IN `i_tgl_lahir` DATE, IN `i_ktp_selfie` VARCHAR(30), IN `i_foto_ktp` VARCHAR(30))  BEGIN
	INSERT INTO user_jubeta (username, passwd, tingkatan_user) VALUES (i_username, i_pass, i_tingkatan_user);
	INSERT INTO detail_user (id_pembeli, nama, email,alamat, no_telp, jenis_kelamin, tempat_lahir, tgl_lahir,   ktp_selfie, foto_ktp) VALUES (LAST_INSERT_ID(),i_nama, i_email, i_alamat, i_notelp, i_jenis_kelamin, i_tempat_lahir, i_tgl_lahir,i_ktp_selfie, i_foto_ktp); 	

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
  `nama` varchar(100) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_telp` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(25) DEFAULT NULL,
  `ktp_selfie` varchar(225) NOT NULL,
  `foto_ktp` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_user`
--

INSERT INTO `detail_user` (`id_detail_user`, `id_pembeli`, `foto_user`, `nama`, `email`, `tempat_lahir`, `tgl_lahir`, `alamat`, `no_telp`, `jenis_kelamin`, `ktp_selfie`, `foto_ktp`) VALUES
(2, 1, 'adxsa', 'hemanda', 'dbshja', 'csa', '2020-12-01', 'cssas', 'csa', 'csacs', 'cs', 'cs'),
(23, 29, '', 'Novia Ardi', 'putunovia546@gmail.com', 'bangli', '2020-12-03', 'Kerambitan, Tabanan', '089232423343', 'Perempuan', '527-641-828-Screenshot (1).png', '527-428-828-Screenshot (1).png'),
(24, 31, '', 'umbara dewi yanti', 'putunovia546@gmail.com', 'bangli', '2020-12-01', 'Kerambitan, Tabanan', '089232423343', 'Perempuan', '994-950-641-828-Screenshot (1)', '994-527-641-828-Screenshot (1)');

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
  `quantity` int(11) DEFAULT NULL,
  `total_harga` int(12) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pesan`
--

INSERT INTO `pesan` (`id_pesan`, `id_produk`, `id_user`, `tgl_order`, `jam_order`, `quantity`, `total_harga`, `status`) VALUES
(63, 30, 1, '2020-12-20', '13:30:07', 1, 3500000, 'checkout'),
(70, 30, 31, '2021-12-20', '12:09:44', 1, 3500000, 'checkout'),
(71, 30, 31, '2021-12-20', '12:12:33', 1, 3500000, 'checkout'),
(72, 29, 31, '2021-12-20', '12:26:31', 1, 70000000, 'checkout'),
(78, 28, 31, '2021-12-20', '12:36:37', 1, 12500000, 'checkout');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(100) NOT NULL,
  `nama_produk` varchar(100) DEFAULT NULL,
  `harga_produk` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `merk` varchar(100) DEFAULT NULL,
  `deskripsi` varchar(100) DEFAULT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `harga_produk`, `quantity`, `merk`, `deskripsi`, `foto`) VALUES
(19, 'Vespa VBB', 2500000, 2, 'Vespa', 'Model	VBB\r\nKapasitas Mesin(cc)	145,50\r\nWarna	Blue\r\nTransmisi	4-speed', '836-Vespa_Sprint_L_1.jpg'),
(24, 'Honda CB100', 2000000, 1, 'Honda', 'Model	CB100\r\nKapasitas Mesin(cc)	100,00\r\nWarna	Red\r\nTransmisi	5-speed', '906-Honda_CB100_L_1.jpg'),
(25, 'Kawasaki W175', 182000000, 5, 'Kawasaki', 'Model	W175\r\nKapasitas Mesin(cc)	177,00\r\nWarna	White\r\nTransmisi	5-speed', '237-uploaded_eec76fe4172416a9a47d230106cb5f8b.jpg'),
(26, 'Honda CB125CL', 3400000, 1, 'Honda', 'Model	CB125CL\r\nKapasitas Mesin(cc)	124,80\r\nWarna	Black Red Blue\r\nTransmisi	4-speed', '59-Honda_CB125CL_L_1.jpg'),
(27, 'Royal Enfield Classic 350', 8500000, 2, 'Royal Enfield', 'Model	Classic 350\r\nKapasitas Mesin(cc)	346,00\r\nWarna	Black Silver White Red Blue\r\nTransmisi	5-speed', '946-x.pagespeed.ic.LAWiZwgt_Z.jpg'),
(28, ' KTM Duke 200', 12500000, 7, 'KTM', 'Model	Duke 200\r\nKapasitas Mesin(cc)	200,00\r\nWarna	Black\r\nTransmisi	6-speed', '128-ktm-200-duke-bs-vi20200130112649.jpg'),
(29, 'Yamaha SR400', 70000000, 0, 'Yamaha', 'Model	SR400\r\nKapasitas Mesin(cc)	399,00\r\nWarna	Black Gray Red Blue\r\nTransmisi	5-speed', '988-Yamaha_SR400_2_L_1.jpg'),
(30, 'Suzuki GD110', 3500000, 3, 'Suzukii', 'Model	GD110\r\nKapasitas Mesin(cc)	112,80\r\nWarna	Black Red Blue\r\nTransmisi	4-speed', '7-Suzuki_GD110.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_pesan` int(100) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `metode_pembayaran` varchar(100) NOT NULL,
  `status` varchar(25) DEFAULT NULL,
  `total_harga` int(11) DEFAULT NULL,
  `bukti_pembayaran` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_pesan`, `id_user`, `tgl_transaksi`, `metode_pembayaran`, `status`, `total_harga`, `bukti_pembayaran`) VALUES
(77, 63, 1, '0000-00-00', 'COD', 'sudah bayar', 3500000, '440-tanda tangan elvina.PNG'),
(78, 70, 31, '2020-12-21', 'Transfer', 'Belum Bayar', 3500000, '904-950-641-828-Screenshot (1).png'),
(79, 71, 31, '2020-12-21', 'Transfer', 'Belum Bayar', 3500000, '904-950-641-828-Screenshot (1).png'),
(80, 72, 31, '2020-12-21', 'Transfer', 'Belum Bayar', 70000000, '904-950-641-828-Screenshot (1).png'),
(81, 78, 31, '2020-12-21', 'COD', 'lunas', 12500000, '');

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
-- Dumping data for table `user_jubeta`
--

INSERT INTO `user_jubeta` (`id_user`, `username`, `passwd`, `tingkatan_user`) VALUES
(1, 'hemanda', 'e10adc3949ba59abbe56e057f20f883e', 'user'),
(2, 'salsa10', '250cf8b51c773f3f8dc8b4be867a9a02', 'admin'),
(29, 'novia10', '202cb962ac59075b964b07152d234b70', 'user'),
(30, 'ardiyantinovia', 'e10adc3949ba59abbe56e057f20f883e', 'admin'),
(31, 'sayacoba', 'e10adc3949ba59abbe56e057f20f883e', 'user');

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
  ADD PRIMARY KEY (`id_pesan`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_produk` (`id_produk`);

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
  ADD KEY `id_pesan` (`id_pesan`);

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
  MODIFY `id_detail_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `pesan`
--
ALTER TABLE `pesan`
  MODIFY `id_pesan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `user_jubeta`
--
ALTER TABLE `user_jubeta`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_user`
--
ALTER TABLE `detail_user`
  ADD CONSTRAINT `detail_user_ibfk_1` FOREIGN KEY (`id_pembeli`) REFERENCES `user_jubeta` (`id_user`);

--
-- Constraints for table `pesan`
--
ALTER TABLE `pesan`
  ADD CONSTRAINT `pesan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user_jubeta` (`id_user`),
  ADD CONSTRAINT `pesan_ibfk_2` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`);

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_pesan`) REFERENCES `pesan` (`id_pesan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
