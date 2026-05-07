SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


CREATE TABLE `kriteria` (
  `id_kriteria` int(11) NOT NULL AUTO_INCREMENT,
  `kode_kriteria` varchar(5) DEFAULT NULL,
  `nama_kriteria` varchar(50) DEFAULT NULL,
  `bobot` float DEFAULT NULL,
  `jenis` enum('benefit','cost') DEFAULT NULL,
  PRIMARY KEY (`id_kriteria`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `kriteria` (`kode_kriteria`, `nama_kriteria`, `bobot`, `jenis`) VALUES
('C1', 'Golongan', 0.20, 'benefit'),
('C2', 'Surat Peringatan', 0.18, 'cost'),
('C3', 'H-Index Scopus', 0.16, 'benefit'),
('C4', 'Pendidikan', 0.14, 'benefit'),
('C5', 'Lama Mengajar', 0.11, 'benefit'),
('C6', 'Rank Sinta Institusi', 0.09, 'cost'),
('C7', 'Umur', 0.07, 'benefit'),
('C8', 'Pembicara Eksternal', 0.05, 'benefit');


CREATE TABLE `dosen` (
  `id_dosen` int(11) NOT NULL AUTO_INCREMENT,
  `nama_dosen` varchar(100) DEFAULT NULL,
  `c1_val` DOUBLE DEFAULT NULL,
  `c2_val` DOUBLE DEFAULT NULL,
  `c3_val` DOUBLE DEFAULT NULL,
  `c4_val` DOUBLE DEFAULT NULL,
  `c5_val` DOUBLE DEFAULT NULL,
  `c6_val` DOUBLE DEFAULT NULL,
  `c7_val` DOUBLE DEFAULT NULL,
  `c8_val` DOUBLE DEFAULT NULL,
  PRIMARY KEY (`id_dosen`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


INSERT INTO `dosen` (`nama_dosen`, `c1_val`, `c2_val`, `c3_val`, `c4_val`, `c5_val`, `c6_val`, `c7_val`, `c8_val`) VALUES
('A1', 4, 3, 3, 2, 5, 3, 30, 3),
('A2', 4, 3, 3, 2, 6, 9, 30, 3),
('A3', 4, 3, 3, 2, 4, 4, 30, 3),
('A4', 4, 3, 3, 2, 7, 1, 40, 5),
('A5', 3, 3, 3, 2, 4, 15, 30, 3),
('A6', 3, 3, 3, 2, 4, 8, 30, 3),
('A7', 3, 3, 1, 2, 4, 20, 30, 3),
('A8', 3, 3, 1, 2, 4, 5, 30, 3);

COMMIT;