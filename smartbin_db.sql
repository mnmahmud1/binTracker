-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 20, 2023 at 02:03 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smartbin_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(60) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `username`, `password`, `updated_at`, `created_at`) VALUES
(1, 'M Nurhasan Mahmudi', 'admin', '$2y$10$fxL7FBltv3.ehAFfRFoEDuY4eg9gIJWoBSPMqJscSb2.lcXQlMKHS', '2022-10-21 14:26:51', '2022-09-01 22:50:39');

-- --------------------------------------------------------

--
-- Table structure for table `devices`
--

CREATE TABLE `devices` (
  `id` int(11) NOT NULL,
  `code` varchar(6) NOT NULL,
  `description` text NOT NULL,
  `loc_lat` varchar(20) NOT NULL,
  `loc_long` varchar(20) NOT NULL,
  `update_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `devices`
--

INSERT INTO `devices` (`id`, `code`, `description`, `loc_lat`, `loc_long`, `update_at`, `created_at`) VALUES
(1, 'PROTO1', 'STTM 07/10/2022', '-6.3991213999999985', '106.96599335582061', '2022-10-07 16:49:45', '2022-10-07 23:45:12'),
(2, 'PROTO2', 'ELOK JAYA 07/10/2022', '-6.394749101487642', '106.96994335054359', '2022-10-07 16:51:11', '2022-10-07 23:50:55'),
(3, 'PROTO3', 'di sungai cileungsi', '-6.398321029200823', '106.9734082120388', '2022-10-23 07:15:03', '2022-10-08 22:44:02');

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `id` int(11) NOT NULL,
  `id_device` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `status` varchar(3) DEFAULT NULL,
  `adopt` int(11) DEFAULT NULL,
  `volume` int(11) NOT NULL,
  `update_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`id`, `id_device`, `id_user`, `status`, `adopt`, `volume`, `update_at`, `created_at`) VALUES
(1, 1, NULL, NULL, NULL, 0, '2022-10-07 16:57:05', '2022-10-07 23:57:05'),
(2, 1, NULL, NULL, NULL, -5, '2022-10-07 16:57:11', '2022-10-07 23:57:11'),
(3, 1, NULL, NULL, NULL, 71, '2022-10-07 16:57:17', '2022-10-07 23:57:17'),
(4, 1, NULL, NULL, NULL, -5, '2022-10-07 16:57:23', '2022-10-07 23:57:23'),
(5, 1, NULL, NULL, NULL, -5, '2022-10-07 16:57:29', '2022-10-07 23:57:29'),
(6, 1, NULL, NULL, NULL, -5, '2022-10-07 16:57:35', '2022-10-07 23:57:35'),
(7, 1, 6, 'TRF', NULL, -5, '2022-10-08 13:48:01', '2022-10-07 23:57:42'),
(8, 2, 6, 'TRF', NULL, 20, '2022-10-21 14:23:05', '2022-10-08 20:21:02'),
(9, 1, 2, 'TRF', NULL, -5, '2022-10-08 13:51:25', '2022-10-08 20:48:01'),
(10, 1, 7, 'TRF', NULL, -5, '2022-10-15 12:53:59', '2022-10-08 20:51:25'),
(11, 1, 5, 'TRF', NULL, -5, '2022-10-15 12:56:33', '2022-10-15 19:53:59'),
(12, 1, 8, 'TRF', NULL, -5, '2022-10-15 18:39:06', '2022-10-15 19:56:33'),
(13, 1, 6, 'TRF', NULL, -5, '2022-10-15 18:42:20', '2022-10-16 01:39:06'),
(14, 1, 7, 'TRF', 7, -5, '2022-10-15 18:42:20', '2022-10-16 01:42:20'),
(15, 2, 5, 'TRF', NULL, 20, '2022-10-21 14:23:26', '2022-10-21 21:23:05'),
(16, 2, 6, 'TRF', 6, 20, '2022-10-21 14:23:26', '2022-10-21 21:23:26'),
(17, 3, 6, 'TRF', 6, 100, '2022-10-23 01:05:09', '2022-10-23 13:22:05'),
(18, 3, 6, 'TRF', NULL, 80, '2022-10-23 06:45:30', '2022-10-23 13:42:05'),
(19, 3, 6, 'TRF', NULL, 76, '2022-10-23 09:11:19', '2022-10-23 13:44:05');

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `id_user` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`id`, `title`, `message`, `id_user`, `status`, `updated_at`, `created_at`) VALUES
(1, 'Permasalahan dibagian sign in', 'bug username', 2, 1, '2022-09-15 15:53:15', '2022-09-04 22:53:12'),
(2, 'Permasalahan dibagian sign up', 'tombol disabled bermasalah', 2, 1, '2022-09-15 15:53:22', '2022-09-04 22:53:12'),
(3, 'Tidak bisa login dengan wifi', 'tidak bisa login dengan wifi dengan freq 5Ghz', 2, 1, '2022-09-15 15:53:25', '2022-09-04 22:53:12'),
(4, 'Tidak bisa sign up user baru', 'dengan username cstamanbunga', 5, 0, '2022-09-15 15:58:18', '2022-09-15 17:58:18'),
(5, 'Tidak bisa sign  in new user', 'tidak bisa', 5, 1, '2022-09-17 13:41:05', '2022-09-15 23:02:50');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `bussines` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `tel` varchar(13) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(60) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `bussines`, `address`, `tel`, `email`, `username`, `password`, `updated_at`, `created_at`) VALUES
(5, 'Taman Bunga Nusantara', 'Flower', 'Jl. Mariwati No.KM. 7, Kawungluwuk, Kec. Sukaresmi, Kabupaten Cianjur, Jawa Barat 43254', '0263581617', 'cstamanbunga@gmail.com', 'cstamanbunga', '$2y$10$8J0ZxiJxoHvXf1quuBRVwuQprIc2yG/9EnGTrpq8Dx6oMkIydlEpC', '2022-09-15 15:51:56', '2022-09-04 22:51:49'),
(6, 'Curug Ciherang (Jonggol-Sukamakmur)', 'Nature', 'Sirnajaya, Wargajaya, Kec. Sukamakmur, Kabupaten Bogor, Jawa Barat 16830', '085710691261', 'csciherang@ymail.com', 'csciherang', '$2y$10$6PWOBd9ADWRlqtNTpiaCJ.xRCcmu9IJIO1RL/NuIf8xaempHzFr2e', '2022-09-15 15:51:59', '2022-09-04 22:51:49'),
(7, 'Cibodas Botanical Garden (Kebun Raya Cibodas)', 'Natures', 'Jl. Kebun Raya Cibodas, Sindangjaya, Kec. Cipanas, Kabupaten Cianjur, Jawa Barat 43253', '0263512233', 'cskbcibodas@gmail.com', 'cskbcibodas', '$2y$10$KBF5Fs9mC16qLqnkFYcswOKu3DQjPsrWZre.S0B0CKYuXVfZpCrw.', '2022-09-15 15:52:03', '2022-09-04 22:51:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `devices`
--
ALTER TABLE `devices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `devices`
--
ALTER TABLE `devices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
