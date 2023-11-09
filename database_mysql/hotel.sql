-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 07, 2023 at 05:00 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `fasilitas_hotel`
--

CREATE TABLE `fasilitas_hotel` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `nama_fasilitas` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fasilitas_hotel`
--

INSERT INTO `fasilitas_hotel` (`id`, `created_at`, `updated_at`, `nama_fasilitas`, `keterangan`, `gambar`) VALUES
(2, '2023-03-30 01:55:26', '2023-03-30 01:55:26', 'Kolam Renang', 'Sejuk dan menyegarkan', 'kolam.jpg'),
(3, '2023-03-30 01:55:40', '2023-03-30 01:55:40', 'Resto', 'Terletak di rooftop', 'resto.jpg'),
(4, '2023-04-06 07:24:30', '2023-04-06 07:24:30', 'Gym', 'Berlokasi di lantai 8', 'gym.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `fasilitas_kamar`
--

CREATE TABLE `fasilitas_kamar` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_kamar` bigint(20) UNSIGNED NOT NULL,
  `nama_fasilitas` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fasilitas_kamar`
--

INSERT INTO `fasilitas_kamar` (`id`, `created_at`, `updated_at`, `id_kamar`, `nama_fasilitas`) VALUES
(1, '2023-03-30 01:54:28', '2023-04-06 06:36:13', 2, 'Kipas Angin'),
(2, '2023-03-30 01:54:34', '2023-03-30 01:54:34', 2, 'TV'),
(3, '2023-03-30 01:54:40', '2023-03-30 01:54:40', 1, 'Bath Tub'),
(4, '2023-03-30 01:54:46', '2023-03-30 01:54:46', 1, 'AC'),
(5, '2023-03-30 01:54:51', '2023-03-30 01:54:58', 1, 'TV'),
(13, '2023-04-06 06:26:24', '2023-04-06 06:26:24', 1, 'Balcon');

-- --------------------------------------------------------

--
-- Table structure for table `kamar`
--

CREATE TABLE `kamar` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `tipe_kamar` varchar(255) NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `jumlah_kamar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kamar`
--

INSERT INTO `kamar` (`id`, `created_at`, `updated_at`, `tipe_kamar`, `gambar`, `jumlah_kamar`) VALUES
(1, '2023-03-30 01:53:46', '2023-03-30 01:53:46', 'Superior', 'superior.jpg', 23),
(2, '2023-03-30 01:53:59', '2023-03-30 01:53:59', 'Deluxe', 'delux.jpg', 21);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(33, '2014_10_12_000000_create_users_table', 1),
(34, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(35, '2019_08_19_000000_create_failed_jobs_table', 1),
(36, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(37, '2023_03_30_042501_create_kamar_table', 1),
(38, '2023_03_30_045248_create_fasilitas_kamar_table', 1),
(39, '2023_03_30_054321_create_fasilitas_hotel_table', 1),
(40, '2023_03_30_064220_create_reservasi_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `reservasi`
--

CREATE TABLE `reservasi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `tgl_checkin` date NOT NULL,
  `tgl_checkout` date NOT NULL,
  `jumlah_kamar` int(11) NOT NULL,
  `nama_pemesan` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `no_hp` varchar(255) NOT NULL,
  `nama_tamu` varchar(255) NOT NULL,
  `id_kamar` bigint(20) UNSIGNED NOT NULL,
  `is_checkin` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reservasi`
--

INSERT INTO `reservasi` (`id`, `created_at`, `updated_at`, `tgl_checkin`, `tgl_checkout`, `jumlah_kamar`, `nama_pemesan`, `email`, `no_hp`, `nama_tamu`, `id_kamar`, `is_checkin`) VALUES
(1, '2023-03-30 02:14:56', '2023-03-31 00:53:48', '2023-03-30', '2023-03-31', 1, 'Vira', 'viraalfita@gmail.com', '08776382783', 'Vira', 2, 1),
(4, '2023-04-05 12:04:56', '2023-04-05 12:04:56', '2023-02-11', '2023-02-12', 1, 'Solikin', 'solikin@gmail.com', '081928378119', 'Solikin', 2, 0),
(5, '2023-04-06 06:13:04', '2023-04-06 06:13:04', '2023-04-07', '2023-04-08', 2, 'Yunia', 'alfitayunia@gmail.com', '08172983283', 'Yunia', 1, 0),
(6, '2023-04-06 07:03:16', '2023-04-06 07:22:31', '2023-04-07', '2023-04-08', 1, 'Bayu', 'bayuadk@gmail.com', '08172983283', 'Bayu Andika', 2, 1),
(7, '2023-04-06 07:29:08', '2023-04-06 07:29:08', '2023-04-15', '2023-04-22', 1, 'Mahmudi', 'mahmud@gmail.com', '08172983283', 'Mahmudi', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` enum('admin','resepsionis','tamu') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `username`, `password`, `level`, `created_at`, `updated_at`) VALUES
(1, 'Vira', 'admin', '$2y$10$bowxdbqJUk.DdncmqoDjWO37K2r.cUv45qnVWBWH9YM99f.RZxoaq', 'admin', '2023-03-30 08:51:00', '2023-03-30 08:51:00'),
(2, 'Faisal', 'faisal', '$2y$10$j11BAef6FFxLRMqLBB59he36iSyBLgrNtK9FkTKMWcsA7pjcWKtzy', 'tamu', '2023-03-30 01:51:40', '2023-03-30 01:51:40'),
(3, 'Bila', 'resepsionis', '$2y$10$XJObtnTW4X6z6HgcoAKcp.RVGodBbRW4BR6vT9ofpPSFMb.AsYgEu', 'resepsionis', '2023-03-30 01:51:55', '2023-03-30 01:51:55');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fasilitas_hotel`
--
ALTER TABLE `fasilitas_hotel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fasilitas_kamar`
--
ALTER TABLE `fasilitas_kamar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fasilitas_kamar_id_kamar_foreign` (`id_kamar`);

--
-- Indexes for table `kamar`
--
ALTER TABLE `kamar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reservasi`
--
ALTER TABLE `reservasi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reservasi_id_kamar_foreign` (`id_kamar`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fasilitas_hotel`
--
ALTER TABLE `fasilitas_hotel`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `fasilitas_kamar`
--
ALTER TABLE `fasilitas_kamar`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `kamar`
--
ALTER TABLE `kamar`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `reservasi`
--
ALTER TABLE `reservasi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `fasilitas_kamar`
--
ALTER TABLE `fasilitas_kamar`
  ADD CONSTRAINT `fasilitas_kamar_id_kamar_foreign` FOREIGN KEY (`id_kamar`) REFERENCES `kamar` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reservasi`
--
ALTER TABLE `reservasi`
  ADD CONSTRAINT `reservasi_id_kamar_foreign` FOREIGN KEY (`id_kamar`) REFERENCES `kamar` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
