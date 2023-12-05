-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Dec 05, 2023 at 02:51 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kinerja_mahasiswa`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_akses`
--

CREATE TABLE `tbl_akses` (
  `id` int(11) NOT NULL,
  `nim` char(8) NOT NULL,
  `level` enum('admin','mahasiswa') NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_akses`
--

INSERT INTO `tbl_akses` (`id`, `nim`, `level`, `password`, `remember_token`) VALUES
(1, '11122008', 'mahasiswa', '$2y$12$QFykLGzZGGap79w9PHOTFuePdt01UI74nckyvOOh8dpja8CRi1FVq', NULL),
(2, '00000000', 'admin', '$2y$12$/3HfZRs0ppGDT/IuFBxSwuD7dh8GrsS4c.8JWUMtLkE7hRKXAP.C2', NULL),
(3, '11122016', 'mahasiswa', '$2y$12$HK0zAtiatP.zmFP.ycH8XetGyCLZZjJY7PoI3c.v5NgV3OjqwOIDW', NULL),
(4, '11122013', 'mahasiswa', '$2y$12$u92qh5xdoQanMlyHuj6Tq.lvx6GFqZSEWSUTsAk6V0BraTdLglmWu', NULL),
(5, '11122012', 'mahasiswa', '$2y$12$ODTEVNOWyi1DjWeOH2h10enl7H1LCLyPUDaU9QAbFTAfMEKi8E22q', NULL),
(6, '11119016', 'mahasiswa', '$2y$12$830Cr2jVUL6/yUhMlIEpOel1VB7Q42bnPsHuAENMK3CHujPE8Lex.', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kelompok`
--

CREATE TABLE `tbl_kelompok` (
  `kd_kelompok` char(4) NOT NULL,
  `kd_penilaian` char(4) NOT NULL,
  `nim` char(10) NOT NULL,
  `nk_kurang` double NOT NULL,
  `nk_cukup` double NOT NULL,
  `nk_baik` double NOT NULL,
  `nt_kurang` double NOT NULL,
  `nt_cukup` double NOT NULL,
  `nt_baik` double NOT NULL,
  `nq_kurang` double NOT NULL,
  `nq_cukup` double NOT NULL,
  `nq_baik` double NOT NULL,
  `nm_kurang` double NOT NULL,
  `nm_cukup` double NOT NULL,
  `nm_baik` double NOT NULL,
  `nf_kurang` double NOT NULL,
  `nf_cukup` double NOT NULL,
  `nf_baik` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_kelompok`
--

INSERT INTO `tbl_kelompok` (`kd_kelompok`, `kd_penilaian`, `nim`, `nk_kurang`, `nk_cukup`, `nk_baik`, `nt_kurang`, `nt_cukup`, `nt_baik`, `nq_kurang`, `nq_cukup`, `nq_baik`, `nm_kurang`, `nm_cukup`, `nm_baik`, `nf_kurang`, `nf_cukup`, `nf_baik`) VALUES
('K001', 'P001', '11122008', 0, 0.14, 0.86, 0, 0.22, 0.33, 0, 0.5, 0.13, 0, 0.67, 0, 0, 0, 0.5),
('K002', 'P003', '11122016', 0, 0.86, 0.14, 0.25, 0.33, 0, 0, 0.33, 0.25, 0, 0.33, 0.25, 0, 1, 0),
('K003', 'P004', '11122013', 0, 1, 0, 0, 0.33, 0.25, 0, 1, 0, 0, 0.67, 0, 0, 0.67, 0),
('K004', 'P005', '11122012', 0, 0.71, 0.29, 0, 1, 0, 0, 0.67, 0, 0, 0.67, 0, 0, 0.67, 0),
('K005', 'P006', '11119016', 0, 0.29, 0.71, 0, 0, 0.5, 0, 0.33, 0.25, 0, 0.33, 0.25, 0, 0, 0.75);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mahasiswa`
--

CREATE TABLE `tbl_mahasiswa` (
  `id` int(11) NOT NULL,
  `nim` char(8) NOT NULL,
  `nama_depan` varchar(15) NOT NULL,
  `nama_belakang` varchar(15) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `email` varchar(30) NOT NULL,
  `universitas` varchar(30) NOT NULL,
  `nohp` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_mahasiswa`
--

INSERT INTO `tbl_mahasiswa` (`id`, `nim`, `nama_depan`, `nama_belakang`, `tgl_lahir`, `email`, `universitas`, `nohp`) VALUES
(2, '11122008', 'Farhan', 'Sabil JIhadi', '2004-04-08', 'farhansabil22@gmail.com', 'Universitas Serang Raya', '089652606942'),
(3, '00000000', 'admin', 'admin', '2023-12-05', 'admin12@gmail.com', 'UNIVADMIN', '081234567890'),
(4, '11122016', 'Muhammad', 'Iqbal', '1997-07-17', 'miqbal22@gmail.com', 'Universitas Serang Raya', '088294100438'),
(5, '11122013', 'Muhammad', 'Ariel', '2003-04-11', 'mariel12@gmail.com', 'Universitas Serang Raya', '083848582818'),
(6, '11122012', 'Kevin', 'Irawan', '2004-07-23', 'kevinirawan@gmail.com', 'Universitas Serang Raya', '08975675462'),
(7, '11119016', 'Muhammad', 'Riki', '2002-07-05', 'mriki12@gmail.com', 'Universitas Serang Raya', '085566772182');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_penilaian`
--

CREATE TABLE `tbl_penilaian` (
  `kd_penilaian` char(4) NOT NULL,
  `nim` char(8) NOT NULL,
  `tanggalnilai` date NOT NULL,
  `nilai_kehadiran` int(2) NOT NULL,
  `nilai_tugas` int(3) NOT NULL,
  `nilai_quiz` int(3) NOT NULL,
  `nilai_uts` int(3) NOT NULL,
  `nilai_uas` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_penilaian`
--

INSERT INTO `tbl_penilaian` (`kd_penilaian`, `nim`, `tanggalnilai`, `nilai_kehadiran`, `nilai_tugas`, `nilai_quiz`, `nilai_uts`, `nilai_uas`) VALUES
('P001', '11122008', '2023-12-05', 13, 87, 83, 80, 90),
('P002', '11122016', '2023-12-05', 8, 65, 85, 85, 75),
('P003', '11122016', '2023-12-05', 8, 65, 85, 85, 75),
('P004', '11122013', '2023-12-05', 7, 85, 75, 80, 80),
('P005', '11122012', '2023-12-05', 9, 75, 80, 80, 80),
('P006', '11119016', '2023-12-05', 12, 90, 85, 85, 95);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_akses`
--
ALTER TABLE `tbl_akses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nim` (`nim`);

--
-- Indexes for table `tbl_kelompok`
--
ALTER TABLE `tbl_kelompok`
  ADD PRIMARY KEY (`kd_kelompok`),
  ADD KEY `kd_penilaian` (`kd_penilaian`),
  ADD KEY `nim` (`nim`);

--
-- Indexes for table `tbl_mahasiswa`
--
ALTER TABLE `tbl_mahasiswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_penilaian`
--
ALTER TABLE `tbl_penilaian`
  ADD PRIMARY KEY (`kd_penilaian`),
  ADD KEY `nim` (`nim`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_akses`
--
ALTER TABLE `tbl_akses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_mahasiswa`
--
ALTER TABLE `tbl_mahasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
