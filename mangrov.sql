-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 27, 2022 at 05:39 PM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mangrov`
--

-- --------------------------------------------------------

--
-- Table structure for table `desa`
--

CREATE TABLE `desa` (
  `iddes` bigint(20) UNSIGNED NOT NULL,
  `idkec` bigint(20) UNSIGNED NOT NULL,
  `namadesa` varchar(35) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dataakses` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `userid` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `desa`
--

INSERT INTO `desa` (`iddes`, `idkec`, `namadesa`, `dataakses`, `userid`, `created_at`, `updated_at`) VALUES
(3, 2, '2312', '2022-12-21 02:52:33', 1, '2022-12-20 12:52:33', '2022-12-20 12:52:33'),
(4, 3, 'weasdasd', '2022-12-21 02:52:41', 1, '2022-12-20 12:52:41', '2022-12-20 12:52:41'),
(5, 2, 'asdwqeqweqwe', '2022-12-21 20:23:08', 1, '2022-12-21 06:23:08', '2022-12-21 06:23:08');

-- --------------------------------------------------------

--
-- Table structure for table `detail_tanaman`
--

CREATE TABLE `detail_tanaman` (
  `idmangrovesat` bigint(20) UNSIGNED NOT NULL,
  `idtanam` bigint(20) UNSIGNED NOT NULL,
  `tinggi` double NOT NULL,
  `lebarbatang` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jenismangrove`
--

CREATE TABLE `jenismangrove` (
  `idjenis` bigint(20) UNSIGNED NOT NULL,
  `namajenislatin` varchar(35) COLLATE utf8mb4_unicode_ci NOT NULL,
  `namajenisindo` varchar(35) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dataakses` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `userid` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jenismangrove`
--

INSERT INTO `jenismangrove` (`idjenis`, `namajenislatin`, `namajenisindo`, `dataakses`, `userid`, `created_at`, `updated_at`) VALUES
(1, 'test1', 'test1', '2022-12-22 17:48:22', 1, '2022-12-22 03:48:22', '2022-12-22 12:47:36'),
(3, 'test2', 'test2', '2022-12-23 02:47:42', 1, '2022-12-22 12:47:42', '2022-12-22 12:47:42'),
(4, 'test3', 'test3', '2022-12-23 02:47:48', 1, '2022-12-22 12:47:48', '2022-12-22 12:47:48');

-- --------------------------------------------------------

--
-- Table structure for table `kecamatan`
--

CREATE TABLE `kecamatan` (
  `idkec` bigint(20) UNSIGNED NOT NULL,
  `namakec` varchar(35) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dataakses` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `userid` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kecamatan`
--

INSERT INTO `kecamatan` (`idkec`, `namakec`, `dataakses`, `userid`, `created_at`, `updated_at`) VALUES
(1, 'asdasdsss', '2022-12-17 07:40:45', 1, NULL, '2022-12-20 12:12:39'),
(2, 'test', '2022-12-17 23:10:30', 1, '2022-12-17 09:10:30', '2022-12-17 09:10:30'),
(3, 'test4', '2022-12-17 23:22:03', 1, '2022-12-17 09:22:03', '2022-12-17 09:22:03'),
(4, 'test4', '2022-12-17 23:23:01', 1, '2022-12-17 09:23:01', '2022-12-17 09:23:01'),
(6, 'test', '2022-12-21 00:31:20', 1, '2022-12-20 10:31:20', '2022-12-20 10:31:20');

-- --------------------------------------------------------

--
-- Table structure for table `lahan`
--

CREATE TABLE `lahan` (
  `idlahan` bigint(20) UNSIGNED NOT NULL,
  `iddesa` bigint(20) UNSIGNED NOT NULL,
  `namalahan` varchar(35) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kepemilikan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `luas` double NOT NULL,
  `latitude` double NOT NULL,
  `longitude` double NOT NULL,
  `dataakses` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `userid` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lahan`
--

INSERT INTO `lahan` (`idlahan`, `iddesa`, `namalahan`, `kepemilikan`, `luas`, `latitude`, `longitude`, `dataakses`, `userid`, `created_at`, `updated_at`) VALUES
(1, 4, 'test lahan', 'test lahan', 15, 1214, 12331, '2022-12-26 00:45:15', 1, '2022-12-25 10:45:15', '2022-12-25 10:45:15');

-- --------------------------------------------------------

--
-- Table structure for table `mangrove`
--

CREATE TABLE `mangrove` (
  `idmangrove` bigint(20) UNSIGNED NOT NULL,
  `idjenis` bigint(20) UNSIGNED NOT NULL,
  `mangrovelatin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mangroveindo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dataakses` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `userid` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mangrove`
--

INSERT INTO `mangrove` (`idmangrove`, `idjenis`, `mangrovelatin`, `mangroveindo`, `dataakses`, `userid`, `created_at`, `updated_at`) VALUES
(6, 1, 'test mangrove', 'test mangrove', '2022-12-26 00:43:15', 1, '2022-12-25 10:43:15', '2022-12-25 10:43:15'),
(7, 3, 'test mangrove2', 'test mangrove 2', '2022-12-26 00:43:27', 1, '2022-12-25 10:43:27', '2022-12-25 10:43:27');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_12_08_031423_create_kecamatan_table', 1),
(6, '2022_12_08_031452_create_desa_table', 1),
(7, '2022_12_08_031517_create_lahan_table', 1),
(8, '2022_12_08_031546_create_jenis_mangrov_table', 1),
(9, '2022_12_08_031555_create_mangrov_table', 1),
(10, '2022_12_08_031605_create_penanaman_mangrov_table', 1),
(11, '2022_12_08_031617_create_monev_mangrov_table', 1),
(12, '2022_12_08_031631_create_detail_tanaman_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `monev_mangrov`
--

CREATE TABLE `monev_mangrov` (
  `idmonev` bigint(20) UNSIGNED NOT NULL,
  `idmangrovesat` bigint(20) UNSIGNED NOT NULL,
  `tglmonev` datetime NOT NULL,
  `tinggi` int(11) NOT NULL,
  `lebarbatang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `statusmonev` int(11) NOT NULL,
  `dataakses` datetime NOT NULL,
  `userid` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `penanaman_mangrove`
--

CREATE TABLE `penanaman_mangrove` (
  `idtanam` bigint(20) UNSIGNED NOT NULL,
  `idmangrove` bigint(20) UNSIGNED NOT NULL,
  `jmltanam` int(11) NOT NULL,
  `statustanam` int(11) NOT NULL,
  `dataakses` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `userid` bigint(20) UNSIGNED NOT NULL,
  `idlahan` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hakakses` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `telp`, `hakakses`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@mangrove.com', NULL, '$2y$10$J/4vnjjKVYXJ4pINhhEAzegE1c9fj9ojpW9Zpu05ODV0zd/8AQEw6', '123123123', 1, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `desa`
--
ALTER TABLE `desa`
  ADD PRIMARY KEY (`iddes`);

--
-- Indexes for table `detail_tanaman`
--
ALTER TABLE `detail_tanaman`
  ADD PRIMARY KEY (`idmangrovesat`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jenismangrove`
--
ALTER TABLE `jenismangrove`
  ADD PRIMARY KEY (`idjenis`);

--
-- Indexes for table `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD PRIMARY KEY (`idkec`);

--
-- Indexes for table `lahan`
--
ALTER TABLE `lahan`
  ADD PRIMARY KEY (`idlahan`);

--
-- Indexes for table `mangrove`
--
ALTER TABLE `mangrove`
  ADD PRIMARY KEY (`idmangrove`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `monev_mangrov`
--
ALTER TABLE `monev_mangrov`
  ADD PRIMARY KEY (`idmonev`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `penanaman_mangrove`
--
ALTER TABLE `penanaman_mangrove`
  ADD PRIMARY KEY (`idtanam`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

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
-- AUTO_INCREMENT for table `desa`
--
ALTER TABLE `desa`
  MODIFY `iddes` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `detail_tanaman`
--
ALTER TABLE `detail_tanaman`
  MODIFY `idmangrovesat` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jenismangrove`
--
ALTER TABLE `jenismangrove`
  MODIFY `idjenis` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kecamatan`
--
ALTER TABLE `kecamatan`
  MODIFY `idkec` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `lahan`
--
ALTER TABLE `lahan`
  MODIFY `idlahan` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mangrove`
--
ALTER TABLE `mangrove`
  MODIFY `idmangrove` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `monev_mangrov`
--
ALTER TABLE `monev_mangrov`
  MODIFY `idmonev` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `penanaman_mangrove`
--
ALTER TABLE `penanaman_mangrove`
  MODIFY `idtanam` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
