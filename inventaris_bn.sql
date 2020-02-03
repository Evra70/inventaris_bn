-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 02, 2020 at 03:58 PM
-- Server version: 10.1.39-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventaris_bn`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(57, '2014_10_12_000000_create_users_table', 1),
(58, '2019_11_14_015614_create_table_barang', 1),
(59, '2019_11_14_015634_create_table_pinjam_barang', 1),
(60, '2019_11_14_015650_create_table_barang_masuk', 1),
(61, '2019_11_14_015712_create_table_suplier', 1),
(62, '2019_11_14_015725_create_table_barang_keluar', 1),
(63, '2019_11_14_015755_create_table_stok', 1);

-- --------------------------------------------------------

--
-- Table structure for table `t_barang`
--

CREATE TABLE `t_barang` (
  `barang_id` int(10) UNSIGNED NOT NULL,
  `nama_barang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `spesifikasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lokasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kondisi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sumber_dana` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `t_barang`
--

INSERT INTO `t_barang` (`barang_id`, `nama_barang`, `spesifikasi`, `lokasi`, `kondisi`, `sumber_dana`) VALUES
(1, 'Komoknok', 'ojnojnokn', 'oknoknokn', 'onoknokn', 'oknoknoknon');

-- --------------------------------------------------------

--
-- Table structure for table `t_barang_keluar`
--

CREATE TABLE `t_barang_keluar` (
  `barang_keluar_id` int(10) UNSIGNED NOT NULL,
  `barang_id` int(11) NOT NULL,
  `nama_barang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_keluar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jml_keluar` int(11) NOT NULL,
  `lokasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `penerima` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `t_barang_masuk`
--

CREATE TABLE `t_barang_masuk` (
  `barang_masuk_id` int(10) UNSIGNED NOT NULL,
  `barang_id` int(11) NOT NULL,
  `nama_barang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_masuk` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jml_masuk` int(11) NOT NULL,
  `suplier_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `t_pinjam_barang`
--

CREATE TABLE `t_pinjam_barang` (
  `pinjam_id` int(10) UNSIGNED NOT NULL,
  `peminjam_id` int(11) NOT NULL,
  `tgl_pinjam` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `barang_id` int(11) NOT NULL,
  `nama_barang` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jml_barang` int(11) NOT NULL,
  `tgl_kembali` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batas_kembali` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_kembali` int(11) NOT NULL,
  `kondisi` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `t_pinjam_barang`
--

INSERT INTO `t_pinjam_barang` (`pinjam_id`, `peminjam_id`, `tgl_pinjam`, `barang_id`, `nama_barang`, `jml_barang`, `tgl_kembali`, `batas_kembali`, `status_kembali`, `kondisi`) VALUES
(1, 1, '20200130', 1, 'Komoknok', 10, '20200210', '20200206', 4, 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `t_stok`
--

CREATE TABLE `t_stok` (
  `barang_id` int(10) UNSIGNED NOT NULL,
  `jml_masuk` int(11) NOT NULL,
  `jml_keluar` int(11) NOT NULL,
  `jml_pinjam` int(11) NOT NULL,
  `total_barang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `t_stok`
--

INSERT INTO `t_stok` (`barang_id`, `jml_masuk`, `jml_keluar`, `jml_pinjam`, `total_barang`) VALUES
(1, 0, 0, 0, 100);

-- --------------------------------------------------------

--
-- Table structure for table `t_suplier`
--

CREATE TABLE `t_suplier` (
  `suplier_id` int(10) UNSIGNED NOT NULL,
  `nama_suplier` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_suplier` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `telp_suplier` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `t_suplier`
--

INSERT INTO `t_suplier` (`suplier_id`, `nama_suplier`, `alamat_suplier`, `telp_suplier`) VALUES
(1, 'Ezra Smith', 'ASPA HA', '9080908');

-- --------------------------------------------------------

--
-- Table structure for table `t_user`
--

CREATE TABLE `t_user` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `fullname` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `t_user`
--

INSERT INTO `t_user` (`user_id`, `fullname`, `username`, `level`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Ephraim Jehudah', 'Evra70', 'administrator', '2a7d94e6d20ed9be4edca6f5ebe5e0ab', NULL, '2020-01-29 20:18:49', '2020-01-29 20:18:49'),
(2, 'Akuma Nana', 'Akuma17', 'manajemen', '2a7d94e6d20ed9be4edca6f5ebe5e0ab', NULL, '2020-01-30 03:24:56', '2020-01-30 03:26:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_barang`
--
ALTER TABLE `t_barang`
  ADD PRIMARY KEY (`barang_id`);

--
-- Indexes for table `t_barang_keluar`
--
ALTER TABLE `t_barang_keluar`
  ADD PRIMARY KEY (`barang_keluar_id`);

--
-- Indexes for table `t_barang_masuk`
--
ALTER TABLE `t_barang_masuk`
  ADD PRIMARY KEY (`barang_masuk_id`);

--
-- Indexes for table `t_pinjam_barang`
--
ALTER TABLE `t_pinjam_barang`
  ADD PRIMARY KEY (`pinjam_id`);

--
-- Indexes for table `t_stok`
--
ALTER TABLE `t_stok`
  ADD PRIMARY KEY (`barang_id`);

--
-- Indexes for table `t_suplier`
--
ALTER TABLE `t_suplier`
  ADD PRIMARY KEY (`suplier_id`);

--
-- Indexes for table `t_user`
--
ALTER TABLE `t_user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `t_user_username_unique` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `t_barang`
--
ALTER TABLE `t_barang`
  MODIFY `barang_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `t_barang_keluar`
--
ALTER TABLE `t_barang_keluar`
  MODIFY `barang_keluar_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_barang_masuk`
--
ALTER TABLE `t_barang_masuk`
  MODIFY `barang_masuk_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_pinjam_barang`
--
ALTER TABLE `t_pinjam_barang`
  MODIFY `pinjam_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `t_stok`
--
ALTER TABLE `t_stok`
  MODIFY `barang_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `t_suplier`
--
ALTER TABLE `t_suplier`
  MODIFY `suplier_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `t_user`
--
ALTER TABLE `t_user`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
