-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2017 at 03:42 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sewalapangan`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `hostname` varchar(45) NOT NULL,
  `last_login_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `email`, `password`, `ip_address`, `hostname`, `last_login_date`) VALUES
(1, 'indra@ide.web.id', '0192023a7bbd73250516f069df18b500', '::1', 'indra-hp', '2017-05-16 14:47:44'),
(2, 'rahmat.rtr@bsi.ac.id', '0192023a7bbd73250516f069df18b500', '::1', 'indra-hp', '2017-05-16 15:40:13');

-- --------------------------------------------------------

--
-- Table structure for table `lapangan`
--

CREATE TABLE `lapangan` (
  `lapangan_id` int(11) NOT NULL,
  `kode_lapangan` varchar(11) DEFAULT NULL,
  `nama_lapangan` varchar(45) DEFAULT NULL,
  `creation_date` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `last_update_date` datetime DEFAULT NULL,
  `last_updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lapangan`
--

INSERT INTO `lapangan` (`lapangan_id`, `kode_lapangan`, `nama_lapangan`, `creation_date`, `created_by`, `last_update_date`, `last_updated_by`) VALUES
(18, 'LP58FCF8342', 'LAPANGAN FUTSAL 1', '2017-04-23 20:53:52', 1, '2017-04-25 17:39:37', 1),
(20, 'LP58FF6DBBC', 'LAPANGAN FUTSAL 2', '2017-04-25 17:39:46', 1, NULL, NULL),
(21, 'LP58FF6DC98', 'LAPANGAN BULU TANGKIS', '2017-04-25 17:40:04', 1, '2017-04-25 18:48:49', 1),
(22, 'LP58FF6DD60', 'LAPANGAN VOLEY', '2017-04-25 17:40:13', 1, '2017-04-25 18:48:46', 1),
(23, 'LP5908BC7AD', 'LAPANGAN BASKET', '2017-05-02 19:06:13', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `pelanggan_id` int(11) NOT NULL,
  `kode_pelanggan` varchar(11) DEFAULT NULL,
  `nama_pelanggan` varchar(50) DEFAULT NULL,
  `alamat` varchar(90) DEFAULT NULL,
  `telepon` varchar(20) DEFAULT NULL,
  `creation_date` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `last_update_date` datetime DEFAULT NULL,
  `last_updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`pelanggan_id`, `kode_pelanggan`, `nama_pelanggan`, `alamat`, `telepon`, `creation_date`, `created_by`, `last_update_date`, `last_updated_by`) VALUES
(1, 'PL58FF44D7A', 'INDRA PRAMANA', 'JL. JATIPADANG NO. 2', '085294076828', '2017-04-25 14:45:32', 1, NULL, NULL),
(2, 'PL58FF4518D', 'ELIANA', 'JL. JAGAKARSA NO. 16', '085771628089', '2017-04-25 14:47:38', 1, NULL, NULL),
(3, 'PL58FF456D3', 'SARAH SUNDARI', 'JL. BEIJI NO. 88', '08812213212', '2017-04-25 14:48:53', 1, '2017-04-25 17:16:55', 1),
(4, 'PL58FF48B67', 'LIS PURWANTI', 'JL. PASAR MINGGU NO. 8', '087682761122', '2017-04-25 15:02:10', 1, NULL, NULL),
(5, 'PL58FF6873C', 'HESTI PANGESTU', 'JL. MAMPANG PRAPATAN', '08726573521', '2017-04-25 17:17:25', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `pembayaran_id` int(11) NOT NULL,
  `sewa_id` int(11) NOT NULL,
  `tanggal_bayar` date DEFAULT NULL,
  `sisa_bayar` float DEFAULT NULL,
  `jumlah_bayar` float DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `creation_date` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `last_update_date` datetime DEFAULT NULL,
  `last_updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`pembayaran_id`, `sewa_id`, `tanggal_bayar`, `sisa_bayar`, `jumlah_bayar`, `status`, `creation_date`, `created_by`, `last_update_date`, `last_updated_by`) VALUES
(4, 16, NULL, 0, 35000, NULL, '2017-05-02 18:56:03', 1, NULL, NULL),
(6, 2, NULL, NULL, 10000, NULL, '2017-05-06 10:39:18', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sewa`
--

CREATE TABLE `sewa` (
  `sewa_id` int(11) NOT NULL,
  `lapangan_id` int(11) NOT NULL,
  `pelanggan_id` int(11) NOT NULL,
  `tarif_id` int(11) NOT NULL,
  `tanggal_booking` date DEFAULT NULL,
  `jam_booking` time DEFAULT NULL,
  `uang_muka` float DEFAULT NULL,
  `biaya_sewa` float DEFAULT NULL,
  `status_pembayaran` int(1) DEFAULT NULL,
  `creation_date` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `last_update_date` datetime DEFAULT NULL,
  `last_updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sewa`
--

INSERT INTO `sewa` (`sewa_id`, `lapangan_id`, `pelanggan_id`, `tarif_id`, `tanggal_booking`, `jam_booking`, `uang_muka`, `biaya_sewa`, `status_pembayaran`, `creation_date`, `created_by`, `last_update_date`, `last_updated_by`) VALUES
(2, 23, 5, 3, '2017-05-06', '15:00:00', 70000, 80000, NULL, '2017-05-06 10:39:18', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tarif`
--

CREATE TABLE `tarif` (
  `tarif_id` int(11) NOT NULL,
  `kode_tarif` varchar(11) NOT NULL,
  `mulai` time DEFAULT NULL,
  `selesai` time DEFAULT NULL,
  `perjam` double DEFAULT NULL,
  `total` double DEFAULT NULL,
  `creation_date` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `last_update_date` datetime DEFAULT NULL,
  `last_updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tarif`
--

INSERT INTO `tarif` (`tarif_id`, `kode_tarif`, `mulai`, `selesai`, `perjam`, `total`, `creation_date`, `created_by`, `last_update_date`, `last_updated_by`) VALUES
(1, 'TF58FF4786E', '08:00:00', '09:00:00', 80000, 80000, '2017-04-25 14:56:52', 0, '2017-05-01 12:53:20', 1),
(2, 'TF58FF6C397', '09:00:00', '10:00:00', 80000, 80000, '2017-04-25 17:33:30', 1, '2017-05-01 12:53:23', 1),
(3, 'TF58FF6C546', '10:00:00', '11:00:00', 80000, 80000, '2017-04-25 17:34:04', 1, '2017-05-01 12:53:26', 1),
(4, 'TF58FF6CB24', '11:00:00', '12:00:00', 80000, 80000, '2017-04-25 17:35:29', 1, '2017-05-01 12:53:30', 1),
(5, 'TF58FF6D538', '12:00:00', '13:00:00', 100000, 100000, '2017-04-25 17:38:11', 1, '2017-05-01 12:53:32', 1),
(6, 'TF58FF6D6A2', '13:00:00', '14:00:00', 100000, 100000, '2017-04-25 17:38:34', 1, '2017-05-01 12:53:39', 1),
(7, 'TF58FF6DFAB', '14:00:00', '15:00:00', 100000, 100000, '2017-04-25 17:40:57', 1, '2017-05-01 12:53:35', 1),
(8, 'TF58FF6E0F1', '15:00:00', '16:00:00', 100000, 100000, '2017-04-25 17:41:41', 1, '2017-05-01 12:53:43', 1),
(9, 'TF58FF6E401', '16:00:00', '17:00:00', 135000, 135000, '2017-04-25 17:42:14', 1, '2017-05-01 12:53:47', 1),
(10, 'TF58FF6E7C5', '17:00:00', '18:00:00', 135000, 135000, '2017-04-25 17:43:04', 1, '2017-05-01 12:53:45', 1),
(11, 'TF5907135B4', '18:00:00', '19:00:00', 150000, 150000, '2017-05-01 12:52:32', 1, '2017-05-02 19:01:39', 1),
(12, 'TF5908BB5AD', '19:00:00', '20:00:00', 150000, 150000, '2017-05-02 19:01:31', 1, '2017-05-02 19:01:45', 1),
(13, 'TF5908BB7DF', '20:00:00', '21:00:00', 150000, 150000, '2017-05-02 19:02:05', 1, NULL, NULL),
(14, 'TF5908BB93B', '21:00:00', '22:00:00', 135000, 135000, '2017-05-02 19:02:32', 1, NULL, NULL),
(15, 'TF5908BBB17', '22:00:00', '23:00:00', 100000, 100000, '2017-05-02 19:03:07', 1, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `lapangan`
--
ALTER TABLE `lapangan`
  ADD PRIMARY KEY (`lapangan_id`),
  ADD UNIQUE KEY `kode_lapangan` (`kode_lapangan`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`pelanggan_id`),
  ADD UNIQUE KEY `kode_pelanggan` (`kode_pelanggan`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`pembayaran_id`),
  ADD KEY `sewa_id` (`sewa_id`);

--
-- Indexes for table `sewa`
--
ALTER TABLE `sewa`
  ADD PRIMARY KEY (`sewa_id`),
  ADD KEY `tarif_id` (`tarif_id`),
  ADD KEY `pelanggan_id` (`pelanggan_id`),
  ADD KEY `lapangan_id` (`lapangan_id`);

--
-- Indexes for table `tarif`
--
ALTER TABLE `tarif`
  ADD PRIMARY KEY (`tarif_id`),
  ADD UNIQUE KEY `kode_tarif` (`kode_tarif`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `lapangan`
--
ALTER TABLE `lapangan`
  MODIFY `lapangan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `pelanggan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `pembayaran_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `sewa`
--
ALTER TABLE `sewa`
  MODIFY `sewa_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tarif`
--
ALTER TABLE `tarif`
  MODIFY `tarif_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `sewa`
--
ALTER TABLE `sewa`
  ADD CONSTRAINT `sewa_ibfk_1` FOREIGN KEY (`pelanggan_id`) REFERENCES `pelanggan` (`pelanggan_id`),
  ADD CONSTRAINT `sewa_ibfk_2` FOREIGN KEY (`tarif_id`) REFERENCES `tarif` (`tarif_id`),
  ADD CONSTRAINT `sewa_ibfk_3` FOREIGN KEY (`lapangan_id`) REFERENCES `lapangan` (`lapangan_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
