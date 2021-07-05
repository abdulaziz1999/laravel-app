-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 05, 2021 at 09:30 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_kepegawaian_uas_pwl`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cuti`
--

CREATE TABLE `tbl_cuti` (
  `id` int(11) NOT NULL,
  `pegawai_id` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_cuti`
--

INSERT INTO `tbl_cuti` (`id`, `pegawai_id`, `start_date`, `end_date`, `jumlah`) VALUES
(1, 2, '2021-07-02', '2021-07-04', 4),
(2, 3, '2021-07-01', '2021-07-03', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_golongan`
--

CREATE TABLE `tbl_golongan` (
  `id` int(11) NOT NULL,
  `kode` varchar(6) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `tunjangan_suami_istri` int(11) NOT NULL,
  `tunjangan_anak` int(11) NOT NULL,
  `uang_makan` int(11) NOT NULL,
  `uang_lembur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_golongan`
--

INSERT INTO `tbl_golongan` (`id`, `kode`, `nama`, `tunjangan_suami_istri`, `tunjangan_anak`, `uang_makan`, `uang_lembur`) VALUES
(1, 'A001', 'Golongan Pertama', 100000, 100000, 50000, 50000),
(2, 'A002', 'Golongan Kedua', 50000, 50000, 25000, 25000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jabatan`
--

CREATE TABLE `tbl_jabatan` (
  `id` int(11) NOT NULL,
  `kode` varchar(6) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `gapok` int(11) NOT NULL,
  `tunjangan_jabatan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_jabatan`
--

INSERT INTO `tbl_jabatan` (`id`, `kode`, `nama`, `gapok`, `tunjangan_jabatan`) VALUES
(1, 'J001', 'Karyawan', 5000000, 500000),
(2, 'J002', 'Manager', 12000000, 1000000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_lembur`
--

CREATE TABLE `tbl_lembur` (
  `id` int(11) NOT NULL,
  `pegawai_id` int(11) NOT NULL,
  `tgl_lembur` date NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_lembur`
--

INSERT INTO `tbl_lembur` (`id`, `pegawai_id`, `tgl_lembur`, `jumlah`) VALUES
(1, 2, '2021-07-04', 5),
(2, 3, '2021-07-03', 4);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pegawai`
--

CREATE TABLE `tbl_pegawai` (
  `id` int(11) NOT NULL,
  `nik` bigint(20) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `no_telp` bigint(11) NOT NULL,
  `jk` enum('L','P') NOT NULL,
  `tgl_lahir` date NOT NULL,
  `tmp_lahir` varchar(30) NOT NULL,
  `agama` enum('Islam','Protestan','Katolik','Hindu','Budha','Konghucu') NOT NULL,
  `status` enum('Menikah','Belum Menikah') NOT NULL,
  `foto` varchar(30) NOT NULL,
  `jabatan_id` int(11) NOT NULL,
  `golongan_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_pegawai`
--

INSERT INTO `tbl_pegawai` (`id`, `nik`, `nama`, `email`, `no_telp`, `jk`, `tgl_lahir`, `tmp_lahir`, `agama`, `status`, `foto`, `jabatan_id`, `golongan_id`) VALUES
(2, 32034247545877, 'Ardelingga ', 'ardelingga@gmail.com', 811123123321, 'L', '2011-07-11', 'Cirebon', 'Islam', 'Belum Menikah', 'ardelingga.png', 2, 1),
(3, 32143243545, 'Abdul Aziz', 'abdulaziz@gmail.com', 811321321123, 'L', '2012-07-02', 'Kalbar', 'Islam', 'Menikah', 'abdulaziz.png', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_penggajihan`
--

CREATE TABLE `tbl_penggajihan` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `pegawai_id` int(11) NOT NULL,
  `masuk` int(11) NOT NULL,
  `sakit` int(11) NOT NULL,
  `izin` int(11) NOT NULL,
  `alpha` int(11) NOT NULL,
  `lembur` int(11) NOT NULL,
  `potongan` int(11) NOT NULL,
  `total_gaji_diterima` int(11) NOT NULL,
  `ket` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_penggajihan`
--

INSERT INTO `tbl_penggajihan` (`id`, `date`, `pegawai_id`, `masuk`, `sakit`, `izin`, `alpha`, `lembur`, `potongan`, `total_gaji_diterima`, `ket`) VALUES
(1, '2021-07-07', 2, 28, 1, 1, 0, 0, 0, 12000000, '-'),
(2, '2021-07-11', 3, 29, 1, 0, 0, 2, 100000, 6000000, '-');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_roles`
--

CREATE TABLE `tbl_roles` (
  `id` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_roles`
--

INSERT INTO `tbl_roles` (`id`, `nama`) VALUES
(1, 'Super Admin'),
(2, 'Admin'),
(3, 'Operator'),
(4, 'User');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `jk` enum('L','P') NOT NULL,
  `email` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `nama`, `jk`, `email`, `username`, `password`, `role_id`) VALUES
(1, 'Operator ', 'L', 'operator@gmail.com', 'operator', '$2y$10$wJreTiN0FIQLVyaUyi9m9epo11tLxzF8V73RZ5pEpRayoGKYPQGni', 3),
(2, 'Admin', 'P', 'admin@gmail.com', 'admin', '$2y$10$ek2VXTXstM9Nbv2hElbFLOmguA5ndGXHqp5U.GORjxEnQVLDohSLe', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_cuti`
--
ALTER TABLE `tbl_cuti`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_cuti_ibfk_1` (`pegawai_id`);

--
-- Indexes for table `tbl_golongan`
--
ALTER TABLE `tbl_golongan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_jabatan`
--
ALTER TABLE `tbl_jabatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_lembur`
--
ALTER TABLE `tbl_lembur`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pegawai_id` (`pegawai_id`);

--
-- Indexes for table `tbl_pegawai`
--
ALTER TABLE `tbl_pegawai`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nik` (`nik`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `no_telp` (`no_telp`),
  ADD KEY `jabatan_id` (`jabatan_id`),
  ADD KEY `golongan_id` (`golongan_id`);

--
-- Indexes for table `tbl_penggajihan`
--
ALTER TABLE `tbl_penggajihan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pegawai_id` (`pegawai_id`);

--
-- Indexes for table `tbl_roles`
--
ALTER TABLE `tbl_roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_cuti`
--
ALTER TABLE `tbl_cuti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_golongan`
--
ALTER TABLE `tbl_golongan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_jabatan`
--
ALTER TABLE `tbl_jabatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_lembur`
--
ALTER TABLE `tbl_lembur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_pegawai`
--
ALTER TABLE `tbl_pegawai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_penggajihan`
--
ALTER TABLE `tbl_penggajihan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_roles`
--
ALTER TABLE `tbl_roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_cuti`
--
ALTER TABLE `tbl_cuti`
  ADD CONSTRAINT `tbl_cuti_ibfk_1` FOREIGN KEY (`pegawai_id`) REFERENCES `tbl_pegawai` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_lembur`
--
ALTER TABLE `tbl_lembur`
  ADD CONSTRAINT `tbl_lembur_ibfk_1` FOREIGN KEY (`pegawai_id`) REFERENCES `tbl_pegawai` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_pegawai`
--
ALTER TABLE `tbl_pegawai`
  ADD CONSTRAINT `tbl_pegawai_ibfk_1` FOREIGN KEY (`jabatan_id`) REFERENCES `tbl_jabatan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_pegawai_ibfk_2` FOREIGN KEY (`golongan_id`) REFERENCES `tbl_golongan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_penggajihan`
--
ALTER TABLE `tbl_penggajihan`
  ADD CONSTRAINT `tbl_penggajihan_ibfk_1` FOREIGN KEY (`pegawai_id`) REFERENCES `tbl_pegawai` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD CONSTRAINT `tbl_users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `tbl_roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
