-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 09, 2023 at 07:04 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_absensi_cikancung`
--

-- --------------------------------------------------------

--
-- Table structure for table `auth_activation_attempts`
--

CREATE TABLE `auth_activation_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups`
--

CREATE TABLE `auth_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_groups`
--

INSERT INTO `auth_groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'akses admin'),
(2, 'user', 'akses user'),
(3, 'kepsek', 'akses kepsek');

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups_permissions`
--

CREATE TABLE `auth_groups_permissions` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups_users`
--

CREATE TABLE `auth_groups_users` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_groups_users`
--

INSERT INTO `auth_groups_users` (`group_id`, `user_id`) VALUES
(1, 11);

-- --------------------------------------------------------

--
-- Table structure for table `auth_logins`
--

CREATE TABLE `auth_logins` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `user_id` int(11) UNSIGNED DEFAULT NULL,
  `date` datetime NOT NULL,
  `success` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_logins`
--

INSERT INTO `auth_logins` (`id`, `ip_address`, `email`, `user_id`, `date`, `success`) VALUES
(1, '::1', 'asd', NULL, '2023-01-08 06:48:50', 0),
(2, '::1', 'email123@gmail.com', 3, '2023-01-08 07:27:46', 1),
(3, '::1', 'email123@gmail.com', 3, '2023-01-08 07:29:25', 1),
(4, '::1', 'kepsek12@smansa.com', NULL, '2023-01-08 07:48:29', 0),
(5, '::1', 'kepsek12@smansa.com', 4, '2023-01-08 07:48:40', 1),
(6, '::1', 'email123@gmail.com', 3, '2023-01-08 08:05:45', 1),
(7, '::1', 'ayomicahyo@gmail.com', 1, '2023-01-08 08:07:26', 0),
(8, '::1', 'cahyo12@akun.com', 5, '2023-01-08 08:09:12', 1),
(9, '::1', 'ayomicahyo@gmail.com', NULL, '2023-01-08 15:51:35', 0),
(10, '::1', 'cahyo12@akun.com', NULL, '2023-01-08 15:52:00', 0),
(11, '::1', 'cahyo12@akun.com', NULL, '2023-01-08 15:52:09', 0),
(12, '::1', 'kepsek12@smansa.com', NULL, '2023-01-08 15:52:57', 0),
(13, '::1', 'kepsek12@smansa.com', NULL, '2023-01-08 16:02:21', 0),
(14, '::1', 'kepsek12@smansa.com', NULL, '2023-01-08 16:06:39', 0),
(15, '::1', 'admin@smansa.com', NULL, '2023-01-08 16:15:06', 0),
(16, '::1', 'kepsep12#', NULL, '2023-01-08 16:15:47', 0),
(17, '::1', 'kepsek12@smansa.com', NULL, '2023-01-08 16:21:44', 0),
(18, '::1', 'kepsek12@smansa.com', NULL, '2023-01-08 16:22:05', 0),
(19, '::1', 'kepsek12@smansa.com', NULL, '2023-01-08 16:26:32', 0),
(20, '::1', 'kepsek12@smansa.com', NULL, '2023-01-08 16:30:48', 0),
(21, '::1', 'kepsek12@smansa.com', NULL, '2023-01-08 16:30:58', 0),
(22, '::1', 'kepsek12@smansa.com', NULL, '2023-01-08 16:38:37', 0),
(23, '::1', 'kepsek12@smansa.com', NULL, '2023-01-08 16:39:40', 0),
(24, '::1', 'kepsek12@smansa.com', NULL, '2023-01-08 16:45:43', 0),
(25, '::1', 'kepsek12@smansa.com', NULL, '2023-01-08 16:47:18', 0),
(26, '::1', 'kepsek12@smansa.com', NULL, '2023-01-08 17:18:24', 0),
(27, '::1', 'ayomicahyo@gmail.com', NULL, '2023-01-08 17:33:17', 0),
(28, '::1', 'ayomicahyo@gmail.com', NULL, '2023-01-08 17:34:41', 0),
(29, '::1', 'ayomicahyo@gmail.com', NULL, '2023-01-08 17:35:56', 0),
(30, '::1', 'ayomicahyo@gmail.com', NULL, '2023-01-08 17:37:29', 0),
(31, '::1', 'ayomicahyo@gmail.com', NULL, '2023-01-08 17:37:36', 0),
(32, '::1', 'ayomicahyo@gmail.com', NULL, '2023-01-08 17:48:44', 0),
(33, '::1', 'ayomicahyo@gmail.com', NULL, '2023-01-08 17:50:10', 0),
(34, '::1', 'ayomicahyo@gmail.com', NULL, '2023-01-08 20:05:18', 0);

-- --------------------------------------------------------

--
-- Table structure for table `auth_permissions`
--

CREATE TABLE `auth_permissions` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_reset_attempts`
--

CREATE TABLE `auth_reset_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_tokens`
--

CREATE TABLE `auth_tokens` (
  `id` int(11) UNSIGNED NOT NULL,
  `selector` varchar(255) NOT NULL,
  `hashedValidator` varchar(255) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `expires` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_users_permissions`
--

CREATE TABLE `auth_users_permissions` (
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(1, '2017-11-20-223112', 'Myth\\Auth\\Database\\Migrations\\CreateAuthTables', 'default', 'Myth\\Auth', 1673181638, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_absensi`
--

CREATE TABLE `tb_absensi` (
  `id` int(20) NOT NULL,
  `id_karyawan` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_absensi`
--

INSERT INTO `tb_absensi` (`id`, `id_karyawan`, `date`, `status`) VALUES
(1, 'adm01', '2023-01-06', 'Masuk'),
(4, 'adm01', '2023-01-10', 'Izin'),
(5, 'adm01', '2023-01-10', 'Masuk'),
(6, 'adm01', '2023-01-06', 'Masuk'),
(10, 'adm2', '2023-01-06', 'Izin'),
(11, 'adm01', '2023-01-06', 'Izin'),
(16, 'adm01', '2023-01-07', 'Masuk'),
(17, 'adm01', '2023-01-20', 'Izin'),
(18, 'adm01', '2023-01-20', 'Izin'),
(19, 'adm01', '2023-01-27', 'Izin'),
(21, 'adm01', '2023-01-08', 'Masuk'),
(22, 'adm01', '2023-01-25', 'Izin');

-- --------------------------------------------------------

--
-- Table structure for table `tb_annual_leave_request`
--

CREATE TABLE `tb_annual_leave_request` (
  `id` int(8) NOT NULL,
  `requester_id` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `reason` varchar(255) NOT NULL,
  `attachment` varchar(255) NOT NULL,
  `status` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_annual_leave_request`
--

INSERT INTO `tb_annual_leave_request` (`id`, `requester_id`, `date`, `reason`, `attachment`, `status`) VALUES
(1, 'Syabani Ahmad Fauzi', '2023-01-06', 'Nonton yang main PS', '#', 'Approved'),
(2, 'Utomo', '2023-01-06', 'Izin main bareng Ucok', '#', 'Approved'),
(3, 'ayu dewi', '2023-01-06', 'Izin main PS', '#', 'Rejected'),
(8, 'Syabani Ahmad Fauzi', '2023-01-20', 'dads', '1673106374_0339ef1f46ae1060179b.png', 'Approved'),
(9, 'Syabani Ahmad Fauzi', '2023-01-27', 'main bola', '1673108547_38ad518b8aea4dd2ebeb.png', 'Approved'),
(10, 'Syabani Ahmad Fauzi', '2023-01-25', 'Main Game', '1673155856_b60d17fbd7700c41fe9e.png', 'Approved');

-- --------------------------------------------------------

--
-- Table structure for table `tb_data_karyawan`
--

CREATE TABLE `tb_data_karyawan` (
  `id` varchar(8) NOT NULL,
  `position` varchar(20) NOT NULL,
  `office` varchar(20) NOT NULL,
  `start_date` date NOT NULL,
  `salary` float NOT NULL,
  `name` varchar(255) NOT NULL,
  `ttl` date NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_data_karyawan`
--

INSERT INTO `tb_data_karyawan` (`id`, `position`, `office`, `start_date`, `salary`, `name`, `ttl`, `phone`, `email`) VALUES
('adm01', 'admina', 'office-a', '2023-01-01', 2000000, 'Syabani Ahmad Fauzi', '1999-02-02', '08123232323', ''),
('adm2', 'admina', 'office-b', '2023-01-09', 1000, 'Utomo', '2023-01-09', '0825151515', ''),
('adm3', 'admina', 'office-a', '2023-01-19', 70000000, 'ayu dewi', '2023-01-15', '089566788932', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_setting`
--

CREATE TABLE `tb_setting` (
  `id` int(11) NOT NULL,
  `scanner_link` varchar(255) NOT NULL,
  `latitude` float NOT NULL,
  `longitude` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_setting`
--

INSERT INTO `tb_setting` (`id`, `scanner_link`, `latitude`, `longitude`) VALUES
(1, 'https://demo.dynamsoft.com/dbr_wasm/barcode_reader_javascript.html', -6.97517, 107.585);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password_hash` varchar(255) NOT NULL,
  `reset_hash` varchar(255) DEFAULT NULL,
  `reset_at` datetime DEFAULT NULL,
  `reset_expires` datetime DEFAULT NULL,
  `activate_hash` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `status_message` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `force_pass_reset` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `password_hash`, `reset_hash`, `reset_at`, `reset_expires`, `activate_hash`, `status`, `status_message`, `active`, `force_pass_reset`, `created_at`, `updated_at`, `deleted_at`) VALUES
(11, 'admin@smansa.com', 'admin1#', '$2y$10$LxPyC.xotiAUv6L7vm5Dce52nw7giVpJ74Jetxjt9wdkOWcWMaG8y', NULL, NULL, NULL, '32f6860b80e4dcef23ccf9443b7e8ec0', NULL, NULL, 0, 0, NULL, NULL, NULL),
(19, 'ayomicahyo@gmail.com', 'ayomicahyo21', '$2y$10$09zJj2ohHsGjtEp20tLWrOGhJOlSzX6TpXRxhwtrVNs9XnxH.6Uf2', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_groups`
--
ALTER TABLE `auth_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD KEY `auth_groups_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `group_id_permission_id` (`group_id`,`permission_id`);

--
-- Indexes for table `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD KEY `auth_groups_users_user_id_foreign` (`user_id`),
  ADD KEY `group_id_user_id` (`group_id`,`user_id`);

--
-- Indexes for table `auth_logins`
--
ALTER TABLE `auth_logins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `auth_permissions`
--
ALTER TABLE `auth_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auth_tokens_user_id_foreign` (`user_id`),
  ADD KEY `selector` (`selector`);

--
-- Indexes for table `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD KEY `auth_users_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `user_id_permission_id` (`user_id`,`permission_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_absensi`
--
ALTER TABLE `tb_absensi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_annual_leave_request`
--
ALTER TABLE `tb_annual_leave_request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_data_karyawan`
--
ALTER TABLE `tb_data_karyawan`
  ADD PRIMARY KEY (`id`(5));

--
-- Indexes for table `tb_setting`
--
ALTER TABLE `tb_setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auth_groups`
--
ALTER TABLE `auth_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `auth_logins`
--
ALTER TABLE `auth_logins`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `auth_permissions`
--
ALTER TABLE `auth_permissions`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_absensi`
--
ALTER TABLE `tb_absensi`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tb_annual_leave_request`
--
ALTER TABLE `tb_annual_leave_request`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_setting`
--
ALTER TABLE `tb_setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD CONSTRAINT `auth_groups_permissions_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD CONSTRAINT `auth_groups_users_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD CONSTRAINT `auth_tokens_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD CONSTRAINT `auth_users_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_users_permissions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
