-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 04, 2018 at 03:46 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.8

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
  `nip` varchar(10) NOT NULL,
  `nama_karyawan` varchar(50) NOT NULL,
  `unit` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `contact` varchar(13) NOT NULL,
  `username` varchar(10) NOT NULL,
  `passwd` varchar(6) NOT NULL,
  `id_role` varchar(2) NOT NULL,
  `img` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`nip`, `nama_karyawan`, `unit`, `email`, `contact`, `username`, `passwd`, `id_role`, `img`) VALUES
('GARUDA0001', 'M Iriansyah Putra Pratama', 'JKTMX-1', 'pace@gmail.com', '6282248080870', 'pace', 'pace', '1', '3.jpg'),
('GARUDA0002', 'Thufail Erlangga', 'JKTMX-2', 'erlangga@gmail.com', '6281344303816', 'angga', 'angga', '2', '1.jpg');

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
  `id_vendor` varchar(10) NOT NULL,
  `nama_perusahaan` varchar(50) NOT NULL,
  `email_vendor` varchar(40) NOT NULL,
  `alamat_vendor` varchar(150) NOT NULL,
  `contact_vendor` varchar(15) NOT NULL,
  `username` varchar(10) NOT NULL,
  `passwd` varchar(6) NOT NULL,
  `id_role` varchar(2) NOT NULL,
  `img` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_vendor`
--

INSERT INTO `master_vendor` (`id_vendor`, `nama_perusahaan`, `email_vendor`, `alamat_vendor`, `contact_vendor`, `username`, `passwd`, `id_role`, `img`) VALUES
('VENDOR0001', 'Beritagar.id', 'redaksi@beritagar.com', 'Jln. Jatibaru, Tanah Abang Jakarta', '6288999989899', 'beritagar', 'tagar', '3', 'beritagar.png'),
('VENDOR0002', 'KASKUS INDONESIA', 'hrd@kaskus.com', 'Jln. Duren Sawit, Jakarta', '6283040506070', 'kaskus', 'kaskus', '3', 'LOGO-KASKUS.jpg'),
('VENDOR0003', 'Microsoft Indonesia', 'about@microsoft.com', 'Jln. Cempaka Putih, Jakarta', '6281112131415', 'microsoft', 'micro', '3', 'microsoft.png'),
('VENDOR0004', 'Indonesia Comnet Plus', 'lel@iconplus.com', 'Jln. Hayam Wuruk Jakarta Pusat', '6282021222324', 'iconplus', 'plus', '3', 'iconplus.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pesan`
--

CREATE TABLE `pesan` (
  `id_pesan` int(10) NOT NULL,
  `subjek` varchar(30) DEFAULT NULL,
  `isi` text,
  `jawaban` text,
  `nip` varchar(10) DEFAULT NULL,
  `id_vendor` varchar(10) DEFAULT NULL,
  `created_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pesan`
--

INSERT INTO `pesan` (`id_pesan`, `subjek`, `isi`, `jawaban`, `nip`, `id_vendor`, `created_at`) VALUES
(1, 'Gagal Upload', 'kenapa pada saat ngupload materi ada error ya, makasih', 'kayaknya mas salah ngupload gambarnya deh.. coba nanti dicek aja lagi ya.. ', 'GARUDA0001', NULL, '2018-02-28'),
(2, 'Chart error', 'pak. kenapa pas upload chart, malah error dan nggak muncul. mohon bantuannya.. ', 'oke.. siap.. segera dicek ya mas... (y)', NULL, 'VENDOR0001', '2018-02-28'),
(3, 'Profil tampil error', 'mas kenapa ya ketika saya mau edit profil, munculnya error nggak jelas. makasih mas. mohon pencerahannya..', NULL, NULL, 'VENDOR0003', '2018-03-01'),
(4, 'Email', 'Mas, saya belom dapat email masuk.. kenapa ya mas ??', NULL, NULL, 'VENDOR0003', '2018-03-02'),
(7, 'Gagal Download', 'mas, kenapa masih gagal download ya ??', 'coba dicek lagi mas.. sdh bisa kok. makasih..', 'GARUDA0001', NULL, '2018-03-02'),
(9, 'Error Export', 'Mas, kenapa ketika saya export ke PDF, malah error ya muncul query error..', 'coba dicek mas.. sekarang sdh masuk itu.. makasih', 'GARUDA0002', NULL, '2018-03-03'),
(10, 'lkkfklnfk', 'KNFKLAFLNKA', 'LKNZLZNGZLKG', NULL, 'VENDOR0001', '2018-03-04');

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
-- Table structure for table `role_login`
--

CREATE TABLE `role_login` (
  `id_role` varchar(2) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='role login apps';

--
-- Dumping data for table `role_login`
--

INSERT INTO `role_login` (`id_role`, `status`) VALUES
('1', 'admin'),
('2', 'super user'),
('3', 'vendor');

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
  ADD PRIMARY KEY (`nip`);

--
-- Indexes for table `master_kontrak`
--
ALTER TABLE `master_kontrak`
  ADD PRIMARY KEY (`kd_kontrak`);

--
-- Indexes for table `master_vendor`
--
ALTER TABLE `master_vendor`
  ADD PRIMARY KEY (`id_vendor`);

--
-- Indexes for table `pesan`
--
ALTER TABLE `pesan`
  ADD PRIMARY KEY (`id_pesan`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`kd_report`),
  ADD KEY `fk_transaksi` (`kd_transaksi`),
  ADD KEY `fk_NIP` (`NIP`),
  ADD KEY `fk_tipeSLA` (`tipe_sla`);

--
-- Indexes for table `role_login`
--
ALTER TABLE `role_login`
  ADD PRIMARY KEY (`id_role`);

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pesan`
--
ALTER TABLE `pesan`
  MODIFY `id_pesan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
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
  ADD CONSTRAINT `fk_vendor` FOREIGN KEY (`kd_vendor`) REFERENCES `master_vendor` (`id_vendor`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
