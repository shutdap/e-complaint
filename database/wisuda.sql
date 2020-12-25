-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.3.15-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             10.1.0.5464
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for wisuda
DROP DATABASE IF EXISTS `wisuda`;
CREATE DATABASE IF NOT EXISTS `wisuda` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */;
USE `wisuda`;

-- Dumping structure for table wisuda.data_complaint
DROP TABLE IF EXISTS `data_complaint`;
CREATE TABLE IF NOT EXISTS `data_complaint` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
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
  `deskripsi_penanganan` longtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Dumping data for table wisuda.data_complaint: ~5 rows (approximately)
DELETE FROM `data_complaint`;
/*!40000 ALTER TABLE `data_complaint` DISABLE KEYS */;
INSERT INTO `data_complaint` (`id`, `tanggal`, `tgl_proses`, `nim`, `nama`, `nama_admin`, `lingkupkel`, `subject`, `uraian`, `status`, `status_unik`, `angka_random`, `gambar`, `gambar_dari_admin`, `deskripsi_penanganan`) VALUES
	(1, '2019-06-14 12:00:11', '2019-06-14 22:57:36', '11214277', 'dapi', 4, 'Akademik', 'Complaint 1', 'Ini Complaint 1', '99', 0, 1, '-', '-', 'Selesai');
INSERT INTO `data_complaint` (`id`, `tanggal`, `tgl_proses`, `nim`, `nama`, `nama_admin`, `lingkupkel`, `subject`, `uraian`, `status`, `status_unik`, `angka_random`, `gambar`, `gambar_dari_admin`, `deskripsi_penanganan`) VALUES
	(2, '2019-06-15 12:03:12', '2019-06-15 23:11:12', '11214277', 'dapi', 5, 'Fasilitas', 'Complaint 2', 'Ini Complaint 2', '99', 0, 871152, '-', '-', 'Selesai');
INSERT INTO `data_complaint` (`id`, `tanggal`, `tgl_proses`, `nim`, `nama`, `nama_admin`, `lingkupkel`, `subject`, `uraian`, `status`, `status_unik`, `angka_random`, `gambar`, `gambar_dari_admin`, `deskripsi_penanganan`) VALUES
	(3, '2019-06-16 18:19:14', '2019-06-16 19:20:22', '11214277', 'dapi', 4, 'Akademik', 'Complaint 3', 'Ini Complaint 3', '99', 0, 280814, '-', '-', 'Selesai');
INSERT INTO `data_complaint` (`id`, `tanggal`, `tgl_proses`, `nim`, `nama`, `nama_admin`, `lingkupkel`, `subject`, `uraian`, `status`, `status_unik`, `angka_random`, `gambar`, `gambar_dari_admin`, `deskripsi_penanganan`) VALUES
	(4, '2019-05-15 13:11:12', '2019-05-15 23:11:12', '11214277', 'dapi', 5, 'Fasilitas', 'Complaint 4', 'Ini Complaint 4', '2', 0, 123456, '-', '-', 'Selesai');
INSERT INTO `data_complaint` (`id`, `tanggal`, `tgl_proses`, `nim`, `nama`, `nama_admin`, `lingkupkel`, `subject`, `uraian`, `status`, `status_unik`, `angka_random`, `gambar`, `gambar_dari_admin`, `deskripsi_penanganan`) VALUES
	(5, '2019-06-15 13:11:12', '2019-06-15 13:11:12', '11214277', 'dapi', 4, 'Akademik', 'Complaint 5', 'Ini Complaint 5', '3', 0, 789123, '-', '-', 'Selesai');
/*!40000 ALTER TABLE `data_complaint` ENABLE KEYS */;

-- Dumping structure for table wisuda.log
DROP TABLE IF EXISTS `log`;
CREATE TABLE IF NOT EXISTS `log` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_complaint` bigint(20) NOT NULL,
  `id_admin` bigint(20) NOT NULL,
  `lingkupkel` varchar(100) NOT NULL,
  `tgl_proses` datetime NOT NULL,
  `status` bigint(20) NOT NULL,
  `deskripsi_penanganan` longtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

-- Dumping data for table wisuda.log: ~17 rows (approximately)
DELETE FROM `log`;
/*!40000 ALTER TABLE `log` DISABLE KEYS */;
INSERT INTO `log` (`id`, `id_complaint`, `id_admin`, `lingkupkel`, `tgl_proses`, `status`, `deskripsi_penanganan`) VALUES
	(1, 1, 0, '', '0000-00-00 00:00:00', 1, '');
INSERT INTO `log` (`id`, `id_complaint`, `id_admin`, `lingkupkel`, `tgl_proses`, `status`, `deskripsi_penanganan`) VALUES
	(2, 1, 3, 'Akademik', '2019-06-14 12:52:04', 2, 'Dialihkan ke bagian Akademik');
INSERT INTO `log` (`id`, `id_complaint`, `id_admin`, `lingkupkel`, `tgl_proses`, `status`, `deskripsi_penanganan`) VALUES
	(3, 1, 4, 'Akademik', '2019-06-14 15:55:42', 3, 'Complaint sedang di Proses');
INSERT INTO `log` (`id`, `id_complaint`, `id_admin`, `lingkupkel`, `tgl_proses`, `status`, `deskripsi_penanganan`) VALUES
	(4, 1, 4, 'Akademik', '2019-06-14 16:57:36', 99, 'Selesai');
INSERT INTO `log` (`id`, `id_complaint`, `id_admin`, `lingkupkel`, `tgl_proses`, `status`, `deskripsi_penanganan`) VALUES
	(5, 871152, 0, '', '0000-00-00 00:00:00', 1, '');
INSERT INTO `log` (`id`, `id_complaint`, `id_admin`, `lingkupkel`, `tgl_proses`, `status`, `deskripsi_penanganan`) VALUES
	(6, 871152, 3, 'Fasilitas', '2019-06-15 13:03:12', 2, 'Dialihkan ke bagian Fasilitas');
INSERT INTO `log` (`id`, `id_complaint`, `id_admin`, `lingkupkel`, `tgl_proses`, `status`, `deskripsi_penanganan`) VALUES
	(7, 871152, 5, 'Fasilitas', '2019-06-15 17:03:12', 2, 'Di alihkan ke bagian ahli');
INSERT INTO `log` (`id`, `id_complaint`, `id_admin`, `lingkupkel`, `tgl_proses`, `status`, `deskripsi_penanganan`) VALUES
	(8, 871152, 5, 'Fasilitas', '2019-06-15 20:10:33', 3, 'Sedang di proses oleh ahli');
INSERT INTO `log` (`id`, `id_complaint`, `id_admin`, `lingkupkel`, `tgl_proses`, `status`, `deskripsi_penanganan`) VALUES
	(9, 871152, 5, 'Fasilitas', '2019-06-15 23:11:12', 99, 'Selesai');
INSERT INTO `log` (`id`, `id_complaint`, `id_admin`, `lingkupkel`, `tgl_proses`, `status`, `deskripsi_penanganan`) VALUES
	(10, 280814, 0, '', '0000-00-00 00:00:00', 1, '');
INSERT INTO `log` (`id`, `id_complaint`, `id_admin`, `lingkupkel`, `tgl_proses`, `status`, `deskripsi_penanganan`) VALUES
	(11, 280814, 3, 'Akademik', '2019-06-16 18:19:14', 2, 'Dialihkan ke bagian Akademik');
INSERT INTO `log` (`id`, `id_complaint`, `id_admin`, `lingkupkel`, `tgl_proses`, `status`, `deskripsi_penanganan`) VALUES
	(12, 280814, 4, 'Akademik', '2019-06-16 19:20:22', 99, 'Selesai');
INSERT INTO `log` (`id`, `id_complaint`, `id_admin`, `lingkupkel`, `tgl_proses`, `status`, `deskripsi_penanganan`) VALUES
	(13, 123456, 3, 'Fasilitas', '0000-00-00 00:00:00', 1, '');
INSERT INTO `log` (`id`, `id_complaint`, `id_admin`, `lingkupkel`, `tgl_proses`, `status`, `deskripsi_penanganan`) VALUES
	(14, 123456, 5, 'Fasilitas', '2019-05-15 23:11:12', 99, 'Selesai');
INSERT INTO `log` (`id`, `id_complaint`, `id_admin`, `lingkupkel`, `tgl_proses`, `status`, `deskripsi_penanganan`) VALUES
	(15, 789123, 0, '', '0000-00-00 00:00:00', 1, '');
INSERT INTO `log` (`id`, `id_complaint`, `id_admin`, `lingkupkel`, `tgl_proses`, `status`, `deskripsi_penanganan`) VALUES
	(16, 789123, 3, 'Akademik', '0000-00-00 00:00:00', 0, 'Dialihkan ke bagian Akademik');
INSERT INTO `log` (`id`, `id_complaint`, `id_admin`, `lingkupkel`, `tgl_proses`, `status`, `deskripsi_penanganan`) VALUES
	(17, 789123, 4, 'Akademik', '2019-06-15 13:11:12', 3, 'Dialihkan ke bagian Dosen');
/*!40000 ALTER TABLE `log` ENABLE KEYS */;

-- Dumping structure for table wisuda.menu
DROP TABLE IF EXISTS `menu`;
CREATE TABLE IF NOT EXISTS `menu` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `nama` varchar(250) DEFAULT NULL,
  `link` varchar(250) DEFAULT NULL,
  `status` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

-- Dumping data for table wisuda.menu: ~18 rows (approximately)
DELETE FROM `menu`;
/*!40000 ALTER TABLE `menu` DISABLE KEYS */;
INSERT INTO `menu` (`id`, `nama`, `link`, `status`) VALUES
	(7, 'Home', 'index.php', '0');
INSERT INTO `menu` (`id`, `nama`, `link`, `status`) VALUES
	(9, 'Buat Complaint', 'input.php', '0');
INSERT INTO `menu` (`id`, `nama`, `link`, `status`) VALUES
	(11, 'History', 'history.php', '0');
INSERT INTO `menu` (`id`, `nama`, `link`, `status`) VALUES
	(15, 'Kotak Masuk', 'inbox.php', '1');
INSERT INTO `menu` (`id`, `nama`, `link`, `status`) VALUES
	(16, 'Proses', 'diproses.php', '1');
INSERT INTO `menu` (`id`, `nama`, `link`, `status`) VALUES
	(17, 'Selesai', 'selesai.php', '1');
INSERT INTO `menu` (`id`, `nama`, `link`, `status`) VALUES
	(18, 'Pencarian', 'pencarian.php', '0');
INSERT INTO `menu` (`id`, `nama`, `link`, `status`) VALUES
	(20, 'logout', 'proses_login.php?action=logout', '99');
INSERT INTO `menu` (`id`, `nama`, `link`, `status`) VALUES
	(21, 'Kotak Masuk', 'inboxadmin.php', '2');
INSERT INTO `menu` (`id`, `nama`, `link`, `status`) VALUES
	(22, 'Proses', 'diprosesadmin.php', '2');
INSERT INTO `menu` (`id`, `nama`, `link`, `status`) VALUES
	(23, 'Selesai', 'selesai.php', '2');
INSERT INTO `menu` (`id`, `nama`, `link`, `status`) VALUES
	(24, 'Kotak Masuk', 'inboxadmin.php', '3');
INSERT INTO `menu` (`id`, `nama`, `link`, `status`) VALUES
	(25, 'Proses', 'diprosesadmin.php', '3');
INSERT INTO `menu` (`id`, `nama`, `link`, `status`) VALUES
	(26, 'Selesai', 'selesai.php', '3');
INSERT INTO `menu` (`id`, `nama`, `link`, `status`) VALUES
	(27, 'Kotak Masuk', 'inboxadmin.php', '4');
INSERT INTO `menu` (`id`, `nama`, `link`, `status`) VALUES
	(28, 'Proses', 'diprosesadmin.php', '4');
INSERT INTO `menu` (`id`, `nama`, `link`, `status`) VALUES
	(29, 'Selesai', 'selesai.php', '4');
INSERT INTO `menu` (`id`, `nama`, `link`, `status`) VALUES
	(30, 'Diagram', 'diagram.php', '1');
/*!40000 ALTER TABLE `menu` ENABLE KEYS */;

-- Dumping structure for table wisuda.status
DROP TABLE IF EXISTS `status`;
CREATE TABLE IF NOT EXISTS `status` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `status` varchar(20) NOT NULL,
  `kondisi` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table wisuda.status: ~4 rows (approximately)
DELETE FROM `status`;
/*!40000 ALTER TABLE `status` DISABLE KEYS */;
INSERT INTO `status` (`id`, `status`, `kondisi`) VALUES
	(1, '1', 'Belum di Proses');
INSERT INTO `status` (`id`, `status`, `kondisi`) VALUES
	(2, '2', 'Dialihkan');
INSERT INTO `status` (`id`, `status`, `kondisi`) VALUES
	(3, '3', 'Proses');
INSERT INTO `status` (`id`, `status`, `kondisi`) VALUES
	(4, '99', 'Selesai');
/*!40000 ALTER TABLE `status` ENABLE KEYS */;

-- Dumping structure for table wisuda.user
DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `nim` varchar(20) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(10) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

-- Dumping data for table wisuda.user: ~12 rows (approximately)
DELETE FROM `user`;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id`, `nim`, `nama`, `email`, `password`, `status`) VALUES
	(1, '11214277', 'dapi', 'dapi@gmail.com', 'dapi123', 0);
INSERT INTO `user` (`id`, `nim`, `nama`, `email`, `password`, `status`) VALUES
	(2, '1121', 'wawa', 'keke', 'kopi', 0);
INSERT INTO `user` (`id`, `nim`, `nama`, `email`, `password`, `status`) VALUES
	(3, 'admin', 'admin', 'admin@unsera.com', 'admin', 1);
INSERT INTO `user` (`id`, `nim`, `nama`, `email`, `password`, `status`) VALUES
	(4, 'akademik', 'akademik', 'nilai@unsera.com', 'akademik', 2);
INSERT INTO `user` (`id`, `nim`, `nama`, `email`, `password`, `status`) VALUES
	(5, 'fasilitas', 'fasilitas', 'fasilitas@unsera.com', 'fasilitas', 3);
INSERT INTO `user` (`id`, `nim`, `nama`, `email`, `password`, `status`) VALUES
	(6, 'akademik_1', 'Faisal Nugroho', 'pelayanan@unsera.com', 'pelayanan', 2);
INSERT INTO `user` (`id`, `nim`, `nama`, `email`, `password`, `status`) VALUES
	(7, 'fasilitas_1', 'Ujang', 'ujang_bedil@gmail.co', 'fasilitas', 3);
INSERT INTO `user` (`id`, `nim`, `nama`, `email`, `password`, `status`) VALUES
	(8, 'fasilitas_2', 'Dadang', 'Dadang.konelo@gmail.', 'fasilitas', 3);
INSERT INTO `user` (`id`, `nim`, `nama`, `email`, `password`, `status`) VALUES
	(9, '11214369', 'fisi', 'fisi123', 'fisi123', 0);
INSERT INTO `user` (`id`, `nim`, `nama`, `email`, `password`, `status`) VALUES
	(10, '51117127', 'Isal', 'isaldempeu@gmail.com', 'isal123', 0);
INSERT INTO `user` (`id`, `nim`, `nama`, `email`, `password`, `status`) VALUES
	(11, 'akademik_2', 'Fredo Fahreza', 'fredocuy@gmail.com', 'akademik', 2);
INSERT INTO `user` (`id`, `nim`, `nama`, `email`, `password`, `status`) VALUES
	(12, 'akademik_3', 'Farhan Niaga', 'farhannih@gmail.com', 'akademik', 2);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
