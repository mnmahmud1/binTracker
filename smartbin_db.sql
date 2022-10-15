-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 07, 2022 at 05:47 PM
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
(1, 'M Nurhasan Mahmudi', 'admin', '$2y$10$ocTvkqfSVWKxdYIUXmXdhOsXffJrk3TJ6E6aUyakjijkxi2e8d/02', '2022-09-15 15:50:50', '2022-09-01 22:50:39');

-- --------------------------------------------------------

--
-- Table structure for table `devices`
--

CREATE TABLE `devices` (
  `id` int(11) NOT NULL,
  `code` varchar(6) NOT NULL,
  `description` text NOT NULL,
  `update_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `devices`
--

INSERT INTO `devices` (`id`, `code`, `description`, `update_at`, `created_at`) VALUES
(1, '123456', 'Perangkat 1', '2022-09-17 16:37:04', '2022-09-08 21:56:28'),
(9, 'EKAPRA', 'dekat alfamidi', '2022-09-19 13:07:25', '2022-09-19 20:07:25'),
(10, 'APAKEK', 'opsional', '2022-09-19 18:14:43', '2022-09-20 01:14:43'),
(11, 'MAHMUD', 'ada dirumah mahmudi', '2022-09-22 16:49:03', '2022-09-22 23:49:03');

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
  `loc_lat` varchar(30) NOT NULL,
  `loc_long` varchar(30) NOT NULL,
  `update_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`id`, `id_device`, `id_user`, `status`, `adopt`, `volume`, `loc_lat`, `loc_long`, `update_at`, `created_at`) VALUES
(53, 1, NULL, NULL, NULL, 30, '-6.428218', '106.944584', '2022-09-23 15:12:51', '2022-09-23 22:12:51'),
(54, 1, 6, 'TRF', 6, 47, '-6.428218', '106.944584', '2022-09-23 15:54:51', '2022-09-23 22:12:51'),
(56, 9, 2, 'TRF', 2, 12, '-6.428224', '106.944511', '2022-09-23 16:00:14', '2022-09-23 22:12:51'),
(57, 9, 2, NULL, NULL, 34, '-6.428224', '106.944511', '2022-09-23 16:00:14', '2022-09-23 22:12:51'),
(58, 1, 6, NULL, NULL, 58, '-6.428218', '106.944584', '2022-09-25 09:00:18', '2022-09-23 22:12:51'),
(59, 10, NULL, NULL, NULL, 12, '-6.3991062', '106.965896', '2022-09-25 09:28:06', '2022-09-25 16:00:18'),
(61, 10, 2, 'TRF', 2, 12, '-6.3991062', '106.965896', '2022-09-25 09:28:06', '2022-09-25 16:00:18'),
(62, 10, 2, NULL, NULL, 21, '-6.428066', '106.9476664', '2022-09-25 09:40:06', '2022-09-25 16:00:18'),
(97, 11, NULL, NULL, NULL, 34, '-6.3991224', '106.9659016', '2022-09-25 12:20:12', '2022-09-25 19:20:12');

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
(2, 'STT Muhammadiyah Cileungsi', 'Education', 'Jl. Anggrek No.25, Perum. PTSC, Cileungsi, Kec. Cileungsi, Kabupaten Bogor, Jawa Barat 16820', '0218249550', 'sttmcileungsi@gmail.com', 'sttmc', '$2y$10$O9vJeSJCXC2d.f66J01Vzuy7oMdG.L3wWdFVHvq0f4Wl0JfwysnhO', '2022-09-15 15:51:53', '2022-09-04 22:51:49'),
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
