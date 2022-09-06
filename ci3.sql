-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 06, 2022 at 04:30 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ci3`
--

-- --------------------------------------------------------

--
-- Table structure for table `icon`
--

CREATE TABLE `icon` (
  `id` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `alias` varchar(128) NOT NULL,
  `class` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `icon`
--

INSERT INTO `icon` (`id`, `nama`, `alias`, `class`) VALUES
(1, 'fas fa-fw fa-tachometer-alt', 'Tachometer', '<i class=\"fas fa-fw fa-tachometer-alt\"></i>'),
(2, 'fas fa-fw fa-user', 'User', '<i class=\"fas fa-fw fa-user\"></i>'),
(3, 'fas fa-fw fa-user-edit', 'User Edit', '<i class=\"fas fa-fw fa-user-edit\"></i>'),
(4, 'fas fa-fw fa-folder', 'Folder', '<i class=\"fas fa-fw fa-folder\"></i>'),
(5, 'fas fa-fw fa-folder-open', 'Folder Open', '<i class=\"fas fa-fw fa-folder-open\"></i>'),
(6, 'fas fa-fw fa-user-tie', 'User Tie', '<i class=\"fas fa-fw fa-user-tie\"></i>'),
(7, 'fas fa-fw fa-key', 'Key', '<i class=\"fas fa-fw fa-key\"></i>'),
(8, 'fas fa-fw fa-file-alt', 'File', '<i class=\"fas fa-fw fa-file-alt\"></i>'),
(9, 'fas fa-fw fa-university', 'University', '<i class=\"fas fa-fw fa-university\"></i>'),
(10, 'fas fa-fw fa-address-book', 'Address Book', '<i class=\"fas fa-fw fa-address-book\"></i>'),
(21, 'fas fa-fw fa-edit', 'Edit', '<i class=\"fas fa-fw fa-edit\"></i>'),
(22, 'fas fa-fw fa-table', 'Tabel', '<i class=\"fas fa-fw fa-table\"></i>'),
(23, 'fas fa-fw fa-calendar-alt', 'Kalender', '<i class=\"fas fa-fw fa-calendar-alt\"></i>'),
(24, 'fas fa-fw fa-graduation-cap', 'Topi Graduasi', '<i class=\"fas fa-fw fa-graduation-cap\"></i>'),
(25, 'fas fa-fw fa-book-open', 'Buku Terbuka', '<i class=\"fas fa-fw fa-book-open\"></i>'),
(26, 'fas fa-fw fa-bell', 'Lonceng', '<i class=\"fas fa-fw fa-bell\"></i>');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `kategori` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `kategori`) VALUES
(1, 'Alat Belajar'),
(2, 'Alat Elektronik'),
(3, 'Furniture'),
(4, 'Alat Informasi'),
(5, 'Alat Kebersihan');

-- --------------------------------------------------------

--
-- Table structure for table `kib_a`
--

CREATE TABLE `kib_a` (
  `id` int(11) NOT NULL,
  `nomor_aset` varchar(288) NOT NULL,
  `nama_barang` varchar(128) NOT NULL,
  `luas` int(11) NOT NULL,
  `tahun` varchar(128) NOT NULL,
  `nomor_sertifikat` varchar(288) NOT NULL,
  `harga` varchar(288) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kib_a`
--

INSERT INTO `kib_a` (`id`, `nomor_aset`, `nama_barang`, `luas`, `tahun`, `nomor_sertifikat`, `harga`) VALUES
(1, 'KIB/A/12.01.10.15.08.01/69/2015/00001', 'Tanah Sekolah', 10840, '2015', '16.08.01.02.1.01234', '800000000'),
(2, 'KIB/A/12.01.10.15.08.01/69/2015/00002', 'Tanah Terbangun', 3137, '2015', '16.08.01.02.1.01234', '1300000000');

-- --------------------------------------------------------

--
-- Table structure for table `kib_b`
--

CREATE TABLE `kib_b` (
  `id` int(11) NOT NULL,
  `id_kondisi` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `id_ruangan` int(11) NOT NULL,
  `id_sumber_barang` int(11) NOT NULL,
  `nomor_aset` varchar(288) NOT NULL,
  `nama_barang` varchar(128) NOT NULL,
  `merk` varchar(128) NOT NULL,
  `bahan` varchar(128) NOT NULL,
  `tanggal_pengadaan` date NOT NULL,
  `tahun` varchar(4) NOT NULL,
  `umur_ekonomis` varchar(2) NOT NULL,
  `jumlah` varchar(128) NOT NULL,
  `harga` varchar(128) NOT NULL,
  `kode_sumber_barang` varchar(255) NOT NULL,
  `status_barang` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kib_b`
--

INSERT INTO `kib_b` (`id`, `id_kondisi`, `id_kategori`, `id_ruangan`, `id_sumber_barang`, `nomor_aset`, `nama_barang`, `merk`, `bahan`, `tanggal_pengadaan`, `tahun`, `umur_ekonomis`, `jumlah`, `harga`, `kode_sumber_barang`, `status_barang`) VALUES
(88, 1, 3, 1, 1, 'KIB/B/12.01.10.15.08.01/69/3/1/2017/00001', 'Meja', '-', 'Kayu', '2017-09-16', '2017', '8', '10', '300000', 'BOS/2017', 'Deadstock/Tidak Bisa diperbaiki'),
(89, 3, 3, 1, 1, 'KIB/B/12.01.10.15.08.01/69/3/1/2017/00002', 'Meja', '-', 'Kayu', '2017-09-16', '2017', '8', '10', '300000', 'BOS/2017', '-'),
(90, 3, 3, 1, 1, 'KIB/B/12.01.10.15.08.01/69/3/1/2017/00003', 'Meja', '-', 'Kayu', '2017-09-16', '2017', '8', '10', '300000', 'BOS/2017', '-'),
(91, 3, 3, 1, 1, 'KIB/B/12.01.10.15.08.01/69/3/1/2017/00004', 'Meja', '-', 'Kayu', '2017-09-16', '2017', '8', '10', '300000', 'BOS/2017', '-'),
(92, 3, 3, 1, 1, 'KIB/B/12.01.10.15.08.01/69/3/1/2017/00005', 'Meja', '-', 'Kayu', '2017-09-16', '2017', '8', '10', '300000', 'BOS/2017', '-'),
(93, 3, 3, 1, 1, 'KIB/B/12.01.10.15.08.01/69/3/1/2017/00006', 'Meja', '-', 'Kayu', '2017-09-16', '2017', '8', '10', '300000', 'BOS/2017', '-'),
(94, 3, 3, 1, 1, 'KIB/B/12.01.10.15.08.01/69/3/1/2017/00007', 'Meja', '-', 'Kayu', '2017-09-16', '2017', '8', '10', '300000', 'BOS/2017', '-'),
(95, 3, 3, 1, 1, 'KIB/B/12.01.10.15.08.01/69/3/1/2017/00008', 'Meja', '-', 'Kayu', '2017-09-16', '2017', '8', '10', '300000', 'BOS/2017', '-'),
(96, 3, 3, 1, 1, 'KIB/B/12.01.10.15.08.01/69/3/1/2017/00009', 'Meja', '-', 'Kayu', '2017-09-16', '2017', '8', '10', '300000', 'BOS/2017', '-'),
(97, 3, 3, 1, 1, 'KIB/B/12.01.10.15.08.01/69/3/1/2017/00010', 'Meja', '-', 'Kayu', '2017-09-16', '2017', '8', '10', '300000', 'BOS/2017', '-'),
(98, 2, 3, 1, 1, 'KIB/B/12.01.10.15.08.01/69/3/1/2015/00011', 'Kursi', '-', 'Kayu', '2015-09-09', '2015', '8', '10', '500000', 'BOS/2015', 'Bisa Diperbaiki/Direnovasi'),
(99, 3, 3, 1, 1, 'KIB/B/12.01.10.15.08.01/69/3/1/2015/00012', 'Kursi', '-', 'Kayu', '2015-09-09', '2015', '8', '10', '500000', 'BOS/2015', '-'),
(100, 3, 3, 1, 1, 'KIB/B/12.01.10.15.08.01/69/3/1/2015/00013', 'Kursi', '-', 'Kayu', '2015-09-09', '2015', '8', '10', '500000', 'BOS/2015', '-'),
(101, 3, 3, 1, 1, 'KIB/B/12.01.10.15.08.01/69/3/1/2015/00014', 'Kursi', '-', 'Kayu', '2015-09-09', '2015', '8', '10', '500000', 'BOS/2015', '-'),
(102, 3, 3, 1, 1, 'KIB/B/12.01.10.15.08.01/69/3/1/2015/00015', 'Kursi', '-', 'Kayu', '2015-09-09', '2015', '8', '10', '500000', 'BOS/2015', '-'),
(103, 3, 3, 1, 1, 'KIB/B/12.01.10.15.08.01/69/3/1/2015/00016', 'Kursi', '-', 'Kayu', '2015-09-09', '2015', '8', '10', '500000', 'BOS/2015', '-'),
(104, 3, 3, 1, 1, 'KIB/B/12.01.10.15.08.01/69/3/1/2015/00017', 'Kursi', '-', 'Kayu', '2015-09-09', '2015', '8', '10', '500000', 'BOS/2015', '-'),
(105, 3, 3, 1, 1, 'KIB/B/12.01.10.15.08.01/69/3/1/2015/00018', 'Kursi', '-', 'Kayu', '2015-09-09', '2015', '8', '10', '500000', 'BOS/2015', '-'),
(106, 3, 3, 1, 1, 'KIB/B/12.01.10.15.08.01/69/3/1/2015/00019', 'Kursi', '-', 'Kayu', '2015-09-09', '2015', '8', '10', '500000', 'BOS/2015', '-'),
(107, 3, 3, 1, 1, 'KIB/B/12.01.10.15.08.01/69/3/1/2015/00020', 'Kursi', '-', 'Kayu', '2015-09-09', '2015', '8', '10', '500000', 'BOS/2015', '-'),
(108, 3, 1, 1, 3, 'KIB/B/12.01.10.15.08.01/69/1/1/2015/00021', 'Papan Tulis`', '-', 'Kayu', '2015-12-20', '2015', '8', '2', '700000', 'APBD/2015', '-'),
(109, 3, 1, 7, 3, 'KIB/B/12.01.10.15.08.01/69/7/1/2015/00022', 'Papan Tulis`', '-', 'Kayu', '2015-12-20', '2015', '8', '2', '700000', 'APBD/2015', '-'),
(110, 3, 2, 5, 1, 'KIB/B/12.01.10.15.08.01/69/2/5/2016/00023', 'Laptop', 'Asus', 'Mesin', '2016-12-27', '2016', '5', '1', '12000000', 'BOS/2016', '-');

-- --------------------------------------------------------

--
-- Table structure for table `kib_c`
--

CREATE TABLE `kib_c` (
  `id` int(11) NOT NULL,
  `id_kondisi` int(11) NOT NULL,
  `nomor_aset` varchar(128) NOT NULL,
  `nama_barang` varchar(128) NOT NULL,
  `luas` varchar(128) NOT NULL,
  `lokasi` varchar(288) NOT NULL,
  `tahun` varchar(4) NOT NULL,
  `harga` varchar(128) NOT NULL,
  `umur_ekonomis` varchar(255) NOT NULL,
  `status_barang` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kib_c`
--

INSERT INTO `kib_c` (`id`, `id_kondisi`, `nomor_aset`, `nama_barang`, `luas`, `lokasi`, `tahun`, `harga`, `umur_ekonomis`, `status_barang`) VALUES
(7, 3, 'KIB/C/12.01.10.15.08.01/69/2015/00001', 'Gedung Ruang Kelas', '12 x 7', 'Desa Sutopati, Kec. Kajoran, Kab. Magelang', '2015', '350000000', '20', '-'),
(8, 3, 'KIB/C/12.01.10.15.08.01/69/2015/00002', 'Gedung Ruang Guru', '10 x 10', 'Desa Sutopati, Kec. Kajoran, Kab. Magelang', '2015', '300000000', '20', '-'),
(9, 1, 'KIB/C/12.01.10.15.08.01/69/2015/00003', 'Gedung Kesenian', '7 x 7', 'Desa Sutopati, Kec. Kajoran, Kab. Magelang', '2015', '200000000', '20', 'Perlu Renovasi Besar');

-- --------------------------------------------------------

--
-- Table structure for table `kondisi`
--

CREATE TABLE `kondisi` (
  `id` int(11) NOT NULL,
  `kondisi` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kondisi`
--

INSERT INTO `kondisi` (`id`, `kondisi`) VALUES
(1, 'Rusak Berat'),
(2, 'Rusak Ringan'),
(3, 'Baik'),
(4, 'Baru');

-- --------------------------------------------------------

--
-- Table structure for table `monitoring`
--

CREATE TABLE `monitoring` (
  `id` int(11) NOT NULL,
  `nomor_aset` varchar(255) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `tahun` varchar(255) NOT NULL,
  `status_barang` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `penyusutan`
--

CREATE TABLE `penyusutan` (
  `id` int(11) NOT NULL,
  `nomor_aset` varchar(255) NOT NULL,
  `nama_aset` varchar(255) NOT NULL,
  `residu` varchar(128) NOT NULL,
  `penyusutan` varchar(255) NOT NULL,
  `pemakaian` varchar(255) NOT NULL,
  `aset` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penyusutan`
--

INSERT INTO `penyusutan` (`id`, `nomor_aset`, `nama_aset`, `residu`, `penyusutan`, `pemakaian`, `aset`) VALUES
(19, 'KIB/B/12.01.10.15.08.01/69/3/1/2017/00001', 'Meja', '37500', '32812.5', '5', 'B'),
(20, 'KIB/B/12.01.10.15.08.01/69/3/1/2017/00002', 'Meja', '37500', '32812.5', '5', 'B'),
(21, 'KIB/B/12.01.10.15.08.01/69/3/1/2017/00003', 'Meja', '37500', '32812.5', '5', 'B'),
(22, 'KIB/B/12.01.10.15.08.01/69/3/1/2017/00004', 'Meja', '37500', '32812.5', '5', 'B'),
(23, 'KIB/B/12.01.10.15.08.01/69/3/1/2017/00005', 'Meja', '37500', '32812.5', '5', 'B'),
(24, 'KIB/B/12.01.10.15.08.01/69/3/1/2017/00006', 'Meja', '37500', '32812.5', '5', 'B'),
(25, 'KIB/B/12.01.10.15.08.01/69/3/1/2017/00007', 'Meja', '37500', '32812.5', '5', 'B'),
(26, 'KIB/B/12.01.10.15.08.01/69/3/1/2017/00008', 'Meja', '37500', '32812.5', '5', 'B'),
(27, 'KIB/B/12.01.10.15.08.01/69/3/1/2017/00009', 'Meja', '37500', '32812.5', '5', 'B'),
(28, 'KIB/B/12.01.10.15.08.01/69/3/1/2017/00010', 'Meja', '37500', '32812.5', '5', 'B'),
(30, 'KIB/C/12.01.10.15.08.01/69/2015/00001', 'Gedung Ruang Kelas', '17500000', '16625000', '7', 'C'),
(31, 'KIB/B/12.01.10.15.08.01/69/3/1/2015/00011', 'Kursi', '62500', '54687.5', '7', 'B'),
(32, 'KIB/B/12.01.10.15.08.01/69/3/1/2015/00012', 'Kursi', '62500', '54687.5', '7', 'B'),
(33, 'KIB/B/12.01.10.15.08.01/69/3/1/2015/00013', 'Kursi', '62500', '54687.5', '7', 'B'),
(34, 'KIB/B/12.01.10.15.08.01/69/3/1/2015/00014', 'Kursi', '62500', '54687.5', '7', 'B'),
(35, 'KIB/B/12.01.10.15.08.01/69/3/1/2015/00015', 'Kursi', '62500', '54687.5', '7', 'B'),
(36, 'KIB/B/12.01.10.15.08.01/69/3/1/2015/00016', 'Kursi', '62500', '54687.5', '7', 'B'),
(37, 'KIB/B/12.01.10.15.08.01/69/3/1/2015/00017', 'Kursi', '62500', '54687.5', '7', 'B'),
(38, 'KIB/B/12.01.10.15.08.01/69/3/1/2015/00018', 'Kursi', '62500', '54687.5', '7', 'B'),
(39, 'KIB/B/12.01.10.15.08.01/69/3/1/2015/00019', 'Kursi', '62500', '54687.5', '7', 'B'),
(40, 'KIB/B/12.01.10.15.08.01/69/3/1/2015/00020', 'Kursi', '62500', '54687.5', '7', 'B'),
(41, 'KIB/B/12.01.10.15.08.01/69/1/1/2015/00021', 'Papan Tulis`', '87500', '76562.5', '7', 'B'),
(42, 'KIB/B/12.01.10.15.08.01/69/1/1/2015/00022', 'Papan Tulis`', '87500', '76562.5', '7', 'B'),
(43, 'KIB/C/12.01.10.15.08.01/69/2015/00002', 'Gedung Ruang Guru', '15000000', '14250000', '7', 'C'),
(44, 'KIB/C/12.01.10.15.08.01/69/2015/00003', 'Gedung Kesenian', '10000000', '9500000', '7', 'C'),
(45, 'KIB/B/12.01.10.15.08.01/69/2/5/2016/00023', 'Laptop', '2400000', '1920000', '6', 'B');

-- --------------------------------------------------------

--
-- Table structure for table `ruangan`
--

CREATE TABLE `ruangan` (
  `id` int(11) NOT NULL,
  `ruangan` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ruangan`
--

INSERT INTO `ruangan` (`id`, `ruangan`) VALUES
(1, 'Ruang Kelas VII'),
(3, 'Ruang UKS'),
(4, 'Ruang Kantor'),
(5, 'Lab Komputer'),
(6, 'Ruang Guru'),
(7, 'Ruang Kelas VIII'),
(8, 'Ruang Kelas IX');

-- --------------------------------------------------------

--
-- Table structure for table `sumber_barang`
--

CREATE TABLE `sumber_barang` (
  `id` int(11) NOT NULL,
  `sumber_barang` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sumber_barang`
--

INSERT INTO `sumber_barang` (`id`, `sumber_barang`) VALUES
(1, 'BOS'),
(2, 'DAK'),
(3, 'APBD'),
(4, 'HIBAH'),
(5, 'Life Skill');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_active` int(11) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `role_id`, `name`, `email`, `image`, `password`, `is_active`, `date_created`) VALUES
(1, 1, 'admin', 'inventarisbarangsmpn2kjr@gmail.com', 'admin.jpeg', '$2y$10$/kWYLS5hsgeJkB/NhJzC7eIBKZ33242R.3Z31a7/pKdBdpFUZ/xGC', 1, 1637984685),
(48, 2, 'Mahfud Fauzi', 'fmahfud015@gmail.com', 'default.jpg', '$2y$10$MyETuSGu1YXKZMsE2sZ4qukuz4un9HjACnoUTaIsjzFZF/2lLJKVK', 1, 1662195502),
(49, 2, 'Kepala Sekolah', 'kepalasekolahsmpn2kjr@gmail.com', 'default.jpg', '$2y$10$Ukx5qPZT2sZ3rVHom8NnwuFKLumhnOOUZk6orBHWNXiciTDzLwoZa', 1, 1662195871);

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(3, 2, 2),
(9, 1, 8),
(13, 1, 3),
(15, 1, 11),
(17, 3, 2),
(18, 1, 14),
(20, 3, 11),
(21, 3, 15),
(22, 3, 16),
(23, 2, 17),
(26, 1, 2),
(28, 1, 22),
(29, 1, 25),
(30, 1, 26),
(31, 1, 28),
(32, 1, 27),
(33, 2, 27),
(34, 2, 26),
(35, 2, 25);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'User'),
(3, 'Menu'),
(25, 'Aset'),
(26, 'Penyusutan'),
(27, 'Monitoring'),
(28, 'Setup');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'Kepala Sekolah');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'admin', 'fas fa-fw fa-tachometer-alt', 1),
(2, 2, 'My Profile', 'user', 'fas fa-fw fa-user', 1),
(3, 2, 'Edit Profile', 'user/edit', 'fas fa-fw fa-user-edit', 1),
(4, 3, 'Menu Management', 'menu', 'fas fa-fw fa-folder', 1),
(5, 3, 'Sub Menu Management', 'menu/submenu', 'fas fa-fw fa-folder-open', 1),
(6, 1, 'Role', 'admin/role', 'fas fa-fw fa-user-tie', 1),
(7, 2, 'Change Password', 'user/changepassword', 'fas fa-fw fa-key', 1),
(40, 25, 'KIB A', 'aset/kib_a', 'fas fa-fw fa-map', 1),
(41, 25, 'KIB B', 'aset/kib_b', 'fas fa-fw fa-solid fa-cubes', 1),
(42, 25, 'KIB C', 'aset/kib_c', 'fas fa-fw fa-regular fa-building', 1),
(44, 26, 'Penyusutan', 'penyusutan', 'fas fa-fw fa-solid fa-chart-line', 1),
(45, 27, 'Monitoring', 'monitoring', 'fas fa-fw fa-solid fa-desktop', 1),
(46, 28, 'Kondisi', 'setup/kondisi', 'fas fa-fw fa-solid fa-wheelchair', 1),
(47, 28, 'Kategori', 'setup/kategori', 'fas fa-fw fa-solid fa-filter', 1),
(48, 28, 'Ruangan', 'setup/ruangan', 'fas fa-fw fa-solid fa-landmark', 1),
(49, 28, 'Sumber Barang', 'setup/sumber_barang', 'fas fa-fw fa-solid fa-hand-holding-heart', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_token`
--

INSERT INTO `user_token` (`id`, `email`, `token`, `date_created`) VALUES
(54, 'kepalasekolahsmpn2kjr@gmail.com', '+Ilg5xlWpGNSIeVYqtksXZ7WQs2guiRIvUITHOL3il8=', 1662195871);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `icon`
--
ALTER TABLE `icon`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kib_a`
--
ALTER TABLE `kib_a`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kib_b`
--
ALTER TABLE `kib_b`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kib_c`
--
ALTER TABLE `kib_c`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kondisi`
--
ALTER TABLE `kondisi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `monitoring`
--
ALTER TABLE `monitoring`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penyusutan`
--
ALTER TABLE `penyusutan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ruangan`
--
ALTER TABLE `ruangan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sumber_barang`
--
ALTER TABLE `sumber_barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `icon`
--
ALTER TABLE `icon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `kib_a`
--
ALTER TABLE `kib_a`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kib_b`
--
ALTER TABLE `kib_b`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT for table `kib_c`
--
ALTER TABLE `kib_c`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `kondisi`
--
ALTER TABLE `kondisi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `monitoring`
--
ALTER TABLE `monitoring`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `penyusutan`
--
ALTER TABLE `penyusutan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `ruangan`
--
ALTER TABLE `ruangan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `sumber_barang`
--
ALTER TABLE `sumber_barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
