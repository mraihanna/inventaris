-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 03, 2022 at 12:46 PM
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

-- --------------------------------------------------------

--
-- Table structure for table `kib_b`
--

CREATE TABLE `kib_b` (
  `id` int(11) NOT NULL,
  `nomor_aset` varchar(288) NOT NULL,
  `nama_barang` varchar(128) NOT NULL,
  `merk` varchar(128) NOT NULL,
  `bahan` varchar(128) NOT NULL,
  `kondisi` varchar(128) NOT NULL,
  `kategori` varchar(128) NOT NULL,
  `ruangan` varchar(120) NOT NULL,
  `tanggal_pengadaan` varchar(120) NOT NULL,
  `tahun` varchar(4) NOT NULL,
  `jumlah` varchar(128) NOT NULL,
  `harga` varchar(128) NOT NULL,
  `id_sumber_barang` int(11) NOT NULL,
  `status_barang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `kib_c`
--

CREATE TABLE `kib_c` (
  `id` int(11) NOT NULL,
  `nomor_aset` varchar(128) NOT NULL,
  `nama_barang` varchar(128) NOT NULL,
  `kondisi` varchar(128) NOT NULL,
  `luas` varchar(128) NOT NULL,
  `lokasi` varchar(288) NOT NULL,
  `tahun` varchar(4) NOT NULL,
  `harga` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(1, 1, 'admin', 'inventarisbarangsmpn2kjr@gmail.com', 'default.jpg', '$2y$10$/kWYLS5hsgeJkB/NhJzC7eIBKZ33242R.3Z31a7/pKdBdpFUZ/xGC', 1, 1637984685),
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
(29, 1, 25);

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
(25, 'Aset');

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
(42, 25, 'KIB C', 'aset/kib_c', 'fas fa-fw fa-regular fa-building', 1);

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
-- AUTO_INCREMENT for table `kib_a`
--
ALTER TABLE `kib_a`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kib_b`
--
ALTER TABLE `kib_b`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kib_c`
--
ALTER TABLE `kib_c`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
