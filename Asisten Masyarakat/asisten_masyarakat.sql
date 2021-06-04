-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 03, 2021 at 07:36 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `asisten_masyarakat`
--

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `log_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `no` int(11) NOT NULL,
  `action` varchar(35) NOT NULL,
  `tanggal` datetime NOT NULL,
  `view` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `masyarakat`
--

CREATE TABLE `masyarakat` (
  `nomor` int(50) NOT NULL,
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `tempattgl_lahir` varchar(255) NOT NULL,
  `jenis_kelamin` text NOT NULL,
  `alamat` text NOT NULL,
  `agama` text NOT NULL,
  `status` text NOT NULL,
  `kewarganegaraan` text NOT NULL,
  `Permohonan` mediumtext NOT NULL,
  `file` varchar(255) NOT NULL,
  `tanggal` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6),
  `deadline` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Triggers `masyarakat`
--
DELIMITER $$
CREATE TRIGGER `Log` AFTER INSERT ON `masyarakat` FOR EACH ROW INSERT INTO logs VALUES (null, NEW.id, NEW.nomor, 'Permohonan Surat', NEW.tanggal, '0')
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `Tolak` AFTER DELETE ON `masyarakat` FOR EACH ROW INSERT INTO logs VALUES (null, OLD.id, OLD.nomor, 'Permohonan Ditolak', OLD.tanggal, '0')
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `Ubahan` BEFORE UPDATE ON `masyarakat` FOR EACH ROW INSERT INTO logs(log_id, id, no, action, view) VALUES (null, OLD.id, OLD.nomor, 'Permohonan Surat Diterima', '0')
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `user_ma`
--

CREATE TABLE `user_ma` (
  `ID` int(11) NOT NULL,
  `Nama` varchar(255) NOT NULL,
  `NIK` bigint(20) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `verify_key` varchar(45) NOT NULL,
  `verified` tinyint(1) NOT NULL DEFAULT 0,
  `date_created` timestamp(6) NOT NULL DEFAULT current_timestamp(6),
  `Kode` smallint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_ma`
--

INSERT INTO `user_ma` (`ID`, `Nama`, `NIK`, `Password`, `Email`, `verify_key`, `verified`, `date_created`, `Kode`) VALUES
(1, 'Mizwar Zulfachri', 19080107010087, '25d55ad283aa400af464c76d713c07ad', 'miswar_zul@mhs.unsyiah.ac.id', 'f24f73c5a3be44fe3f35dd4a02c93d27', 0, '2021-05-30 05:27:10.148736', 0),
(2, 'Boss Mizwar Zulfachri', 1908107010087, '5e8667a439c68f5145dd2fcbecf02209', 'miswar_zul@mhs.unsyiah.ac.id', 'af1e03f012f18c2fd7fc436ebd659950', 0, '2021-05-31 07:33:16.885275', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `masyarakat`
--
ALTER TABLE `masyarakat`
  ADD PRIMARY KEY (`nomor`);

--
-- Indexes for table `user_ma`
--
ALTER TABLE `user_ma`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `NIK` (`NIK`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `masyarakat`
--
ALTER TABLE `masyarakat`
  MODIFY `nomor` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_ma`
--
ALTER TABLE `user_ma`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
