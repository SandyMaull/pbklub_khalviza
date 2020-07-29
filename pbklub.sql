-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 30, 2020 at 02:41 AM
-- Server version: 10.1.44-MariaDB-0ubuntu0.18.04.1
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pbklub`
--

-- --------------------------------------------------------

--
-- Table structure for table `bahan`
--

CREATE TABLE `bahan` (
  `id` int(10) UNSIGNED NOT NULL,
  `kode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis` enum('Narkotik','Non Narkotik') COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat_penyimpanan` enum('Ruang Bahan','Ruang Standar') COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah` double(8,2) NOT NULL,
  `harga` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `satuan` enum('mg','ml') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bahan`
--

INSERT INTO `bahan` (`id`, `kode`, `nama`, `jenis`, `tempat_penyimpanan`, `jumlah`, `harga`, `satuan`, `created_at`, `updated_at`) VALUES
(5, 'NON1', 'Tes 1', 'Non Narkotik', 'Ruang Bahan', 10.00, '00000', 'mg', NULL, '2020-07-29 10:30:56'),
(7, 'NR1', 'Tes 3', 'Narkotik', 'Ruang Standar', 249910.00, '78000000', 'ml', NULL, '2020-04-06 05:58:01'),
(8, 'NR2', 'Tes 4', 'Narkotik', 'Ruang Standar', 459.00, '50000', 'ml', NULL, NULL),
(9, 'NR3', 'Tes 5', 'Narkotik', 'Ruang Standar', 200.00, '750000', 'ml', NULL, NULL),
(10, 'NON7', 'Tes 7 ', 'Non Narkotik', 'Ruang Bahan', 14977.00, '', 'ml', NULL, '2020-04-06 05:58:14'),
(11, 'NON8', 'Tes 8', 'Non Narkotik', 'Ruang Standar', 10000.00, '250000', 'mg', NULL, NULL),
(12, 'NON9', 'Tes 10', 'Non Narkotik', 'Ruang Bahan', 45000.00, '50000', 'mg', '2020-04-06 05:36:41', '2020-04-06 05:36:41'),
(13, 'NR8', 'Tes 10', 'Non Narkotik', 'Ruang Standar', 200.00, '5000', 'mg', '2020-04-06 05:37:21', '2020-04-06 05:37:21'),
(14, 'NR9', 'Tes 11', 'Non Narkotik', 'Ruang Bahan', 400.00, '100000', 'mg', '2020-04-06 05:38:01', '2020-04-06 05:38:01'),
(15, 'NR12', 'Tes 12', 'Narkotik', 'Ruang Bahan', 500.00, '25000', 'mg', '2020-04-06 05:38:42', '2020-04-06 05:47:32'),
(16, 'NON14', 'Tes 14', 'Non Narkotik', 'Ruang Bahan', 400.00, '50000', 'mg', '2020-04-06 05:46:54', '2020-04-06 05:46:54'),
(17, 'ASAsa', 'Haha', 'Narkotik', 'Ruang Bahan', 10000.00, '00000', 'mg', '2020-07-29 10:24:10', '2020-07-29 10:24:10');

-- --------------------------------------------------------

--
-- Table structure for table `bahan_masuk`
--

CREATE TABLE `bahan_masuk` (
  `id` int(10) UNSIGNED NOT NULL,
  `bahan_id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jumlah` double(8,2) DEFAULT NULL,
  `nama_pengguna` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `logbook_penggunas`
--

CREATE TABLE `logbook_penggunas` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jumlah` double(8,2) DEFAULT NULL,
  `nama_pengguna` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `logbook_penggunas`
--

INSERT INTO `logbook_penggunas` (`id`, `nama`, `jumlah`, `nama_pengguna`, `created_at`, `updated_at`) VALUES
(1, '1', 20.00, 'Annisa Aulya', '2020-04-04 04:26:20', '2020-04-04 04:26:20'),
(2, '7', 90.00, 'Edwina Suciati', '2020-04-06 05:58:01', '2020-04-06 05:58:01'),
(3, '10', 23.00, 'Edwina Suciati', '2020-04-06 05:58:14', '2020-04-06 05:58:14'),
(4, '5', 50000.00, 'Arina Febrianti', '2020-04-06 06:00:56', '2020-04-06 06:00:56');

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
(21, '2014_10_12_000000_create_users_table', 1),
(22, '2014_10_12_100000_create_password_resets_table', 1),
(23, '2019_08_19_000000_create_failed_jobs_table', 1),
(24, '2020_02_20_184657_create_sessions_table', 1),
(25, '2020_02_24_021449_create_roles_table', 1),
(71, '2020_02_24_030202_create_bahan_table', 2),
(72, '2020_03_24_140105_create_users_table', 3),
(73, '2020_06_26_035121_create_bahan_masuk', 4);

-- --------------------------------------------------------

--
-- Table structure for table `penggunas`
--

CREATE TABLE `penggunas` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pendidikan` enum('SMA','D3','D4','S1','S2','S3') COLLATE utf8mb4_unicode_ci NOT NULL,
  `instansi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profil` mediumtext COLLATE utf8mb4_unicode_ci,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `penggunas`
--

INSERT INTO `penggunas` (`id`, `user_id`, `nama`, `email`, `pendidikan`, `instansi`, `profil`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 8, 'Edwina Suciati', 'edwina@gmail.com', 'D3', 'Universitas Indonesia', NULL, NULL, '2020-04-06 05:49:07', '2020-04-06 05:49:07'),
(3, 9, 'Arina Febrianti', 'arina@gmail.com', 'S1', 'IPB University', NULL, NULL, '2020-04-06 05:59:35', '2020-04-06 05:59:35'),
(4, 10, 'AHMAD HAMMAM ARRUMI', 'sandymaulana0@gmail.com', 'D3', 'AS', NULL, NULL, '2020-07-29 10:38:10', '2020-07-29 10:38:10');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `role` enum('admin','manager_teknik','analis','pengguna') COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `profil` mediumtext COLLATE utf8mb4_unicode_ci,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role`, `name`, `email`, `email_verified_at`, `profil`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Khalviza Dwi', 'khalviza@gmail.com', NULL, NULL, '$2y$10$IRzA/RG/yUmw6VXHCsJRsuA.YxVvaMyzcCkwyycxA5WfEn0Flm.pO', NULL, '2020-04-04 04:21:10', '2020-04-04 04:21:10'),
(4, 'manager_teknik', 'Elfina Mulidia', 'elfina@gmail.com', NULL, 'IKMP 52.jpg', '$2y$10$bZ.PyShOk/zXX2MZlA/oHeKIpdiav1uDuFERTe9KU5HVr9cTfC6yO', NULL, '2020-04-04 04:24:20', '2020-04-04 04:24:20'),
(5, 'admin', 'Shelvinta', 'shelvinta@gmail.com', NULL, NULL, '$2y$10$tUQfO0REj/3NGj7u9Bt65.bU0Oz0ILnsH.QLRoDmAafkKulzSWnNm', NULL, '2020-04-04 06:30:05', '2020-04-04 06:30:05'),
(6, 'admin', 'Gilang', 'gilang@gmail.com', NULL, NULL, '$2y$10$zDf2IQyswSPxgLgRMA/TKOboEgnkDVlxpRhNUpf75vFNrUJHJcth6', NULL, '2020-04-04 23:04:26', '2020-04-04 23:04:26'),
(7, 'admin', 'Khalviza Dwi Shelviani', 'khalviza.shelviani@gmail.com', NULL, 'ChannelLogopng.png', '$2y$10$bqQz7e9c9uVb19KxpdxlRewfe9y4gaVicL6GRWgoXYLltGPqYI5h2', NULL, '2020-04-06 05:30:31', '2020-04-06 05:56:04'),
(8, 'pengguna', 'Edwina Suciati', 'edwina@gmail.com', NULL, NULL, '$2y$10$IeL5tzjDDgKnzGd9Gflj..ddWfq64o9d5uW.ls7fxdTVMsvD46InG', NULL, '2020-04-06 05:49:07', '2020-04-06 05:49:07'),
(9, 'pengguna', 'Arina Febrianti', 'arina@gmail.com', NULL, NULL, '$2y$10$3cckrPbsW2yd5eRVyqnjjO1/yKskrSeEgF5dpfzOxM.fAa.wDodBC', NULL, '2020-04-06 05:59:34', '2020-04-06 05:59:34'),
(10, 'pengguna', 'AHMAD HAMMAM ARRUMI', 'sandymaulana0@gmail.com', NULL, NULL, '$2y$10$Gt2xWOhVb1vpcym6.ShWWOv7WBZHhC804BeHvS90hwjI/Tbh.rnEG', NULL, '2020-07-29 10:38:10', '2020-07-29 10:38:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bahan`
--
ALTER TABLE `bahan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `bahan_kode_unique` (`kode`);

--
-- Indexes for table `bahan_masuk`
--
ALTER TABLE `bahan_masuk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bahan_masuk_bahan_id_foreign` (`bahan_id`);

--
-- Indexes for table `logbook_penggunas`
--
ALTER TABLE `logbook_penggunas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penggunas`
--
ALTER TABLE `penggunas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bahan`
--
ALTER TABLE `bahan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `bahan_masuk`
--
ALTER TABLE `bahan_masuk`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `logbook_penggunas`
--
ALTER TABLE `logbook_penggunas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;
--
-- AUTO_INCREMENT for table `penggunas`
--
ALTER TABLE `penggunas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `bahan_masuk`
--
ALTER TABLE `bahan_masuk`
  ADD CONSTRAINT `bahan_masuk_bahan_id_foreign` FOREIGN KEY (`bahan_id`) REFERENCES `bahan` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
