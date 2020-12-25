-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 25, 2020 at 08:27 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wisuda`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_complaint`
--

CREATE TABLE `data_complaint` (
  `id` int(50) NOT NULL,
  `tanggal` datetime DEFAULT NULL,
  `tgl_proses` datetime NOT NULL,
  `nim` varchar(100) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `nama_admin` int(11) NOT NULL,
  `lingkupkel` varchar(100) DEFAULT NULL,
  `subject` varchar(100) DEFAULT NULL,
  `uraian` varchar(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `status_unik` bigint(20) NOT NULL,
  `angka_random` bigint(20) NOT NULL,
  `gambar` text NOT NULL,
  `gambar_dari_admin` text NOT NULL,
  `deskripsi_penanganan` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_complaint`
--

INSERT INTO `data_complaint` (`id`, `tanggal`, `tgl_proses`, `nim`, `nama`, `nama_admin`, `lingkupkel`, `subject`, `uraian`, `status`, `status_unik`, `angka_random`, `gambar`, `gambar_dari_admin`, `deskripsi_penanganan`) VALUES
(1, '2019-06-14 12:00:11', '2019-06-14 22:57:36', '11214277', 'dapi', 4, 'Akademik', 'Complaint 1', 'Ini Complaint 1', '99', 0, 1, '-', '-', 'Selesai'),
(2, '2019-06-15 12:03:12', '2019-06-15 23:11:12', '11214277', 'dapi', 5, 'Fasilitas', 'Complaint 2', 'Ini Complaint 2', '99', 0, 871152, '-', '-', 'Selesai'),
(3, '2019-06-16 18:19:14', '2019-06-16 19:20:22', '11214277', 'dapi', 4, 'Akademik', 'Complaint 3', 'Ini Complaint 3', '99', 0, 280814, '-', '-', 'Selesai'),
(4, '2019-05-15 13:11:12', '2020-05-25 12:20:59', '11214277', 'dapi', 5, 'Fasilitas', 'Complaint 4', 'Ini Complaint 4', '3', 0, 123456, '-', '-', 'Kerusakan AC ganti freon type 3'),
(5, '2019-06-15 13:11:12', '2019-06-15 13:11:12', '11214277', 'dapi', 4, 'Akademik', 'Complaint 5', 'Ini Complaint 5', '3', 0, 789123, '-', '-', 'Selesai'),
(6, '2020-05-25 13:46:56', '0000-00-00 00:00:00', '11214277', 'dapi', 0, '-', 'Infokus rusak ', 'infokus rusak', '1', 0, 649077, '-', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `id` bigint(20) NOT NULL,
  `id_complaint` bigint(20) NOT NULL,
  `id_admin` bigint(20) NOT NULL,
  `lingkupkel` varchar(100) NOT NULL,
  `tgl_proses` datetime NOT NULL,
  `status` bigint(20) NOT NULL,
  `deskripsi_penanganan` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`id`, `id_complaint`, `id_admin`, `lingkupkel`, `tgl_proses`, `status`, `deskripsi_penanganan`) VALUES
(1, 1, 0, '', '0000-00-00 00:00:00', 1, ''),
(2, 1, 3, 'Akademik', '2019-06-14 12:52:04', 2, 'Dialihkan ke bagian Akademik'),
(3, 1, 4, 'Akademik', '2019-06-14 15:55:42', 3, 'Complaint sedang di Proses'),
(4, 1, 4, 'Akademik', '2019-06-14 16:57:36', 99, 'Selesai'),
(5, 871152, 0, '', '0000-00-00 00:00:00', 1, ''),
(6, 871152, 3, 'Fasilitas', '2019-06-15 13:03:12', 2, 'Dialihkan ke bagian Fasilitas'),
(7, 871152, 5, 'Fasilitas', '2019-06-15 17:03:12', 2, 'Di alihkan ke bagian ahli'),
(8, 871152, 5, 'Fasilitas', '2019-06-15 20:10:33', 3, 'Sedang di proses oleh ahli'),
(9, 871152, 5, 'Fasilitas', '2019-06-15 23:11:12', 99, 'Selesai'),
(10, 280814, 0, '', '0000-00-00 00:00:00', 1, ''),
(11, 280814, 3, 'Akademik', '2019-06-16 18:19:14', 2, 'Dialihkan ke bagian Akademik'),
(12, 280814, 4, 'Akademik', '2019-06-16 19:20:22', 99, 'Selesai'),
(13, 123456, 3, 'Fasilitas', '0000-00-00 00:00:00', 1, ''),
(14, 123456, 5, 'Fasilitas', '2019-05-15 23:11:12', 99, 'Selesai'),
(15, 789123, 0, '', '0000-00-00 00:00:00', 1, ''),
(16, 789123, 3, 'Akademik', '0000-00-00 00:00:00', 0, 'Dialihkan ke bagian Akademik'),
(17, 789123, 4, 'Akademik', '2019-06-15 13:11:12', 3, 'Dialihkan ke bagian Dosen'),
(18, 123456, 5, 'Fasilitas', '2020-05-25 12:20:59', 3, 'Kerusakan AC ganti freon type 3'),
(19, 649077, 0, '', '0000-00-00 00:00:00', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` bigint(20) NOT NULL,
  `nama` varchar(250) DEFAULT NULL,
  `link` varchar(250) DEFAULT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `nama`, `link`, `status`) VALUES
(7, 'Home', 'index.php', '0'),
(9, 'Buat Complaint', 'input.php', '0'),
(11, 'History', 'history.php', '0'),
(15, 'Kotak Masuk', 'inbox.php', '1'),
(16, 'Proses', 'diproses.php', '1'),
(17, 'Selesai', 'selesai.php', '1'),
(18, 'Pencarian', 'pencarian.php', '0'),
(20, 'logout', 'proses_login.php?action=logout', '99'),
(21, 'Kotak Masuk', 'inboxadmin.php', '2'),
(22, 'Proses', 'diprosesadmin.php', '2'),
(23, 'Selesai', 'selesai.php', '2'),
(24, 'Kotak Masuk', 'inboxadmin.php', '3'),
(25, 'Proses', 'diprosesadmin.php', '3'),
(26, 'Selesai', 'selesai.php', '3'),
(27, 'Kotak Masuk', 'inboxadmin.php', '4'),
(28, 'Proses', 'diprosesadmin.php', '4'),
(29, 'Selesai', 'selesai.php', '4'),
(30, 'Diagram', 'diagram.php', '1');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id` int(20) NOT NULL,
  `status` varchar(20) NOT NULL,
  `kondisi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `status`, `kondisi`) VALUES
(1, '1', 'Belum di Proses'),
(2, '2', 'Dialihkan'),
(3, '3', 'Proses'),
(4, '99', 'Selesai');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` bigint(20) NOT NULL,
  `nim` varchar(20) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(10) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nim`, `nama`, `email`, `password`, `status`) VALUES
(1, '11214277', 'dapi', 'dapi@gmail.com', 'dapi123', 0),
(2, '1121', 'wawa', 'keke', 'kopi', 0),
(3, 'admin', 'admin', 'admin@unsera.com', 'admin', 1),
(4, 'akademik', 'akademik', 'nilai@unsera.com', 'akademik', 2),
(5, 'fasilitas', 'fasilitas', 'fasilitas@unsera.com', 'fasilitas', 3),
(6, 'akademik_1', 'Faisal Nugroho', 'pelayanan@unsera.com', 'pelayanan', 2),
(7, 'fasilitas_1', 'Ujang', 'ujang_bedil@gmail.co', 'fasilitas', 3),
(8, 'fasilitas_2', 'Dadang', 'Dadang.konelo@gmail.', 'fasilitas', 3),
(9, '11214369', 'fisi', 'fisi123', 'fisi123', 0),
(10, '51117127', 'Isal', 'isaldempeu@gmail.com', 'isal123', 0),
(11, 'akademik_2', 'Fredo Fahreza', 'fredocuy@gmail.com', 'akademik', 2),
(12, 'akademik_3', 'Farhan Niaga', 'farhannih@gmail.com', 'akademik', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_complaint`
--
ALTER TABLE `data_complaint`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_complaint`
--
ALTER TABLE `data_complaint`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
