-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 27, 2018 at 04:29 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbgcc`
--

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `NIP` varchar(10) NOT NULL,
  `nama_karyawan` varchar(50) NOT NULL,
  `ODESC` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `master_kontrak`
--

CREATE TABLE `master_kontrak` (
  `kd_kontrak` varchar(20) NOT NULL,
  `judul_kontrak` varchar(100) NOT NULL,
  `tipe_kontrak` varchar(50) NOT NULL,
  `category` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `master_vendor`
--

CREATE TABLE `master_vendor` (
  `kd_vendor` varchar(10) NOT NULL,
  `nama_vendor` varchar(50) NOT NULL,
  `alamat_vendor` varchar(150) NOT NULL,
  `contact_number` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `kd_report` varchar(10) NOT NULL,
  `kd_transaksi` varchar(20) NOT NULL,
  `NIP` varchar(10) NOT NULL,
  `tipe_sla` varchar(10) NOT NULL,
  `value` decimal(10,0) NOT NULL,
  `status` varchar(20) NOT NULL,
  `pic` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sla`
--

CREATE TABLE `sla` (
  `tipe_sla` varchar(10) NOT NULL,
  `value` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_login`
--

CREATE TABLE `tb_login` (
  `password` char(20) NOT NULL,
  `NIP` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_login`
--

INSERT INTO `tb_login` (`password`, `NIP`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `kd_transaksi` varchar(20) NOT NULL,
  `start_kontrak` date NOT NULL,
  `end_kontrak` date NOT NULL,
  `kd_vendor` varchar(10) NOT NULL,
  `kd_kontrak` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`NIP`);

--
-- Indexes for table `master_kontrak`
--
ALTER TABLE `master_kontrak`
  ADD PRIMARY KEY (`kd_kontrak`);

--
-- Indexes for table `master_vendor`
--
ALTER TABLE `master_vendor`
  ADD PRIMARY KEY (`kd_vendor`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`kd_report`),
  ADD KEY `fk_transaksi` (`kd_transaksi`),
  ADD KEY `fk_NIP` (`NIP`),
  ADD KEY `fk_tipeSLA` (`tipe_sla`);

--
-- Indexes for table `sla`
--
ALTER TABLE `sla`
  ADD PRIMARY KEY (`tipe_sla`);

--
-- Indexes for table `tb_login`
--
ALTER TABLE `tb_login`
  ADD PRIMARY KEY (`NIP`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`kd_transaksi`),
  ADD KEY `fk_vendor` (`kd_vendor`),
  ADD KEY `fk_kontrak` (`kd_kontrak`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `report`
--
ALTER TABLE `report`
  ADD CONSTRAINT `fk_NIP` FOREIGN KEY (`NIP`) REFERENCES `karyawan` (`NIP`),
  ADD CONSTRAINT `fk_tipeSLA` FOREIGN KEY (`tipe_sla`) REFERENCES `sla` (`tipe_sla`),
  ADD CONSTRAINT `fk_transaksi` FOREIGN KEY (`kd_transaksi`) REFERENCES `transaksi` (`kd_transaksi`);

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `fk_kontrak` FOREIGN KEY (`kd_kontrak`) REFERENCES `master_kontrak` (`kd_kontrak`),
  ADD CONSTRAINT `fk_vendor` FOREIGN KEY (`kd_vendor`) REFERENCES `master_vendor` (`kd_vendor`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
