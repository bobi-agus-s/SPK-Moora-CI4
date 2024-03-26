-- phpMyAdmin SQL Dump
-- version 5.3.0-dev+20220729.9c9ae5069e
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 14, 2022 at 01:34 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_spk_moora`
--

-- --------------------------------------------------------

--
-- Table structure for table `alternatif`
--

CREATE TABLE `alternatif` (
  `id_alternatif` int(5) UNSIGNED NOT NULL,
  `nama_alternatif` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `alternatif`
--

INSERT INTO `alternatif` (`id_alternatif`, `nama_alternatif`) VALUES
(1, 'Lado'),
(2, 'Taro'),
(3, 'Belinda'),
(4, 'TM'),
(5, 'Krispy'),
(6, 'Tebing'),
(7, 'Indra Pura'),
(8, 'Keling');

-- --------------------------------------------------------

--
-- Table structure for table `hasil`
--

CREATE TABLE `hasil` (
  `id_hasil` int(5) UNSIGNED NOT NULL,
  `id_alternatif` int(5) UNSIGNED NOT NULL,
  `hasil` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hasil`
--

INSERT INTO `hasil` (`id_hasil`, `id_alternatif`, `hasil`) VALUES
(1, 1, 0.178767),
(2, 2, 0.146921),
(3, 3, 0.157042),
(4, 4, 0.178047),
(5, 5, 0.0978512),
(6, 6, 0.116244),
(7, 7, 0.174177),
(8, 8, 0.0901101);

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `id_kriteria` int(5) UNSIGNED NOT NULL,
  `kode_kriteria` varchar(255) NOT NULL,
  `nama_kriteria` varchar(255) NOT NULL,
  `jenis_kriteria` enum('benefit','cost') NOT NULL DEFAULT 'benefit',
  `bobot` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `kode_kriteria`, `nama_kriteria`, `jenis_kriteria`, `bobot`) VALUES
(1, 'C1', 'Harga Bibit', 'cost', '10'),
(2, 'C2', 'Masa Panen', 'benefit', '15'),
(3, 'C3', 'Panjang Buah', 'benefit', '15'),
(4, 'C4', 'Berat Buah', 'benefit', '20'),
(5, 'C5', 'Penyakit', 'cost', '15'),
(6, 'C6', 'Cabang', 'benefit', '25');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2022-11-03-012702', 'App\\Database\\Migrations\\Kriteria', 'default', 'App', 1667957498, 1),
(2, '2022-11-03-012712', 'App\\Database\\Migrations\\Alternatif', 'default', 'App', 1667957498, 1),
(3, '2022-11-03-012721', 'App\\Database\\Migrations\\SubKriteria', 'default', 'App', 1667957498, 1),
(4, '2022-11-03-012732', 'App\\Database\\Migrations\\Penilaian', 'default', 'App', 1667957498, 1),
(5, '2022-11-03-033631', 'App\\Database\\Migrations\\Hasil', 'default', 'App', 1667957498, 1);

-- --------------------------------------------------------

--
-- Table structure for table `penilaian`
--

CREATE TABLE `penilaian` (
  `id_penilaian` int(5) UNSIGNED NOT NULL,
  `id_alternatif` int(5) UNSIGNED NOT NULL,
  `id_kriteria` int(5) UNSIGNED NOT NULL,
  `id_sub_kriteria` int(5) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `penilaian`
--

INSERT INTO `penilaian` (`id_penilaian`, `id_alternatif`, `id_kriteria`, `id_sub_kriteria`) VALUES
(1, 1, 1, 5),
(2, 1, 2, 7),
(3, 1, 3, 11),
(4, 1, 4, 16),
(5, 1, 5, 19),
(6, 1, 6, 22),
(7, 2, 1, 4),
(8, 2, 2, 7),
(9, 2, 3, 11),
(10, 2, 4, 16),
(11, 2, 5, 19),
(12, 2, 6, 21),
(13, 3, 1, 3),
(14, 3, 2, 7),
(15, 3, 3, 10),
(16, 3, 4, 15),
(17, 3, 5, 17),
(18, 3, 6, 21),
(19, 4, 1, 4),
(20, 4, 2, 7),
(21, 4, 3, 11),
(22, 4, 4, 15),
(23, 4, 5, 18),
(24, 4, 6, 22),
(25, 5, 1, 3),
(26, 5, 2, 8),
(27, 5, 3, 9),
(28, 5, 4, 15),
(29, 5, 5, 19),
(30, 5, 6, 22),
(31, 6, 1, 2),
(32, 6, 2, 8),
(33, 6, 3, 12),
(34, 6, 4, 15),
(35, 6, 5, 17),
(36, 6, 6, 20),
(37, 7, 1, 2),
(38, 7, 2, 8),
(39, 7, 3, 12),
(40, 7, 4, 15),
(41, 7, 5, 18),
(42, 7, 6, 22),
(43, 8, 1, 1),
(44, 8, 2, 8),
(45, 8, 3, 13),
(46, 8, 4, 15),
(47, 8, 5, 19),
(48, 8, 6, 20),
(49, 9, 1, 1),
(50, 9, 2, 6),
(51, 9, 3, 13),
(52, 9, 4, 16),
(53, 9, 5, 17),
(54, 9, 6, 22),
(55, 10, 1, 5),
(56, 10, 2, 8),
(57, 10, 3, 9),
(58, 10, 4, 14),
(59, 10, 5, 19),
(60, 10, 6, 20);

-- --------------------------------------------------------

--
-- Table structure for table `sub_kriteria`
--

CREATE TABLE `sub_kriteria` (
  `id_sub_kriteria` int(5) UNSIGNED NOT NULL,
  `id_kriteria` int(5) UNSIGNED NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `nilai` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sub_kriteria`
--

INSERT INTO `sub_kriteria` (`id_sub_kriteria`, `id_kriteria`, `deskripsi`, `nilai`) VALUES
(1, 1, '0 - 35.000', '1'),
(2, 1, '36.000 - 70.000', '2'),
(3, 1, '71.000 - 105.000', '3'),
(4, 1, '106.000 - 140.000', '4'),
(5, 1, '141.000 - 175.000', '5'),
(6, 2, '< 75', '5'),
(7, 2, '75 - 85', '3'),
(8, 2, '86 - 95', '1'),
(9, 3, '< 12', '1'),
(10, 3, '13 - 15', '2'),
(11, 3, '16 - 18', '3'),
(12, 3, '19 - 21', '4'),
(13, 3, '> 22', '5'),
(14, 4, '< 7 gram', '1'),
(15, 4, '7.1 - 8.0 gram', '3'),
(16, 4, '8.1 - 9.0 gram', '5'),
(17, 5, 'Kriting', '1'),
(18, 5, 'Mati Muda', '3'),
(19, 5, 'Busuk Buah', '5'),
(20, 6, 'Sedikit', '1'),
(21, 6, 'Sedang', '3'),
(22, 6, 'Banyak', '5');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` enum('admin','user') NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `nama_lengkap`, `password`, `level`) VALUES
(1, 'admin', 'Bobi Agus S', '123', 'admin'),
(3, 'hkgy', 'Hikigaya', '123', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alternatif`
--
ALTER TABLE `alternatif`
  ADD PRIMARY KEY (`id_alternatif`);

--
-- Indexes for table `hasil`
--
ALTER TABLE `hasil`
  ADD PRIMARY KEY (`id_hasil`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penilaian`
--
ALTER TABLE `penilaian`
  ADD PRIMARY KEY (`id_penilaian`);

--
-- Indexes for table `sub_kriteria`
--
ALTER TABLE `sub_kriteria`
  ADD PRIMARY KEY (`id_sub_kriteria`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alternatif`
--
ALTER TABLE `alternatif`
  MODIFY `id_alternatif` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `hasil`
--
ALTER TABLE `hasil`
  MODIFY `id_hasil` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id_kriteria` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `penilaian`
--
ALTER TABLE `penilaian`
  MODIFY `id_penilaian` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `sub_kriteria`
--
ALTER TABLE `sub_kriteria`
  MODIFY `id_sub_kriteria` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
