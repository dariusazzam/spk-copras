-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 04, 2026 at 06:54 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_spk_copras`
--

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `id_dosen` int(11) NOT NULL,
  `nama_dosen` varchar(100) DEFAULT NULL,
  `c1_val` int(11) DEFAULT NULL,
  `c2_val` int(11) DEFAULT NULL,
  `c3_val` int(11) DEFAULT NULL,
  `c4_val` int(11) DEFAULT NULL,
  `c5_val` int(11) DEFAULT NULL,
  `c6_val` int(11) DEFAULT NULL,
  `c7_val` int(11) DEFAULT NULL,
  `c8_val` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`id_dosen`, `nama_dosen`, `c1_val`, `c2_val`, `c3_val`, `c4_val`, `c5_val`, `c6_val`, `c7_val`, `c8_val`) VALUES
(2, 'A1', 4, 3, 3, 2, 5, 3, 30, 3),
(3, 'A2', 4, 3, 3, 2, 6, 9, 30, 3),
(4, 'A3', 4, 3, 3, 2, 4, 4, 30, 3),
(5, 'A4', 4, 3, 3, 2, 7, 1, 40, 5),
(6, 'A5', 3, 3, 3, 2, 4, 15, 30, 3),
(7, 'A6', 3, 3, 3, 2, 4, 8, 30, 3),
(8, 'A7', 3, 3, 1, 2, 4, 20, 30, 3),
(9, 'A8', 3, 3, 1, 2, 4, 5, 30, 3);

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `id_kriteria` int(11) NOT NULL,
  `kode_kriteria` varchar(5) DEFAULT NULL,
  `nama_kriteria` varchar(50) DEFAULT NULL,
  `bobot` float DEFAULT NULL,
  `jenis` enum('benefit','cost') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `kode_kriteria`, `nama_kriteria`, `bobot`, `jenis`) VALUES
(1, 'C1', 'Golongan', 0.2, 'benefit'),
(2, 'C2', 'Surat Peringatan', 0.18, 'cost'),
(3, 'C3', 'H-Index Scopus', 0.16, 'benefit'),
(4, 'C4', 'Pendidikan', 0.14, 'benefit'),
(5, 'C5', 'Lama Mengajar', 0.11, 'benefit'),
(6, 'C6', 'Rank Sinta Institusi', 0.09, 'cost'),
(7, 'C7', 'Umur', 0.07, 'benefit'),
(8, 'C8', 'Pembicara Eksternal', 0.05, 'benefit');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id_dosen`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id_dosen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
