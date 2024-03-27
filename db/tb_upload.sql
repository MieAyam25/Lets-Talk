-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 27, 2024 at 06:39 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `upload`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_upload`
--

CREATE TABLE `tb_upload` (
  `id` int(11) NOT NULL,
  `image` varchar(75) NOT NULL,
  `nickname` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_upload`
--

INSERT INTO `tb_upload` (`id`, `image`, `nickname`) VALUES
(1, 'abhisa khun-65b0a1f4f0ba1-65d42a4f91a4f-65d445d68d40a.jpg', 'abi'),
(2, 'image 3-65d541657ce2f.png', 'hiha'),
(3, 'FGN_4304-65c9ca22b57cb-65d542aa7d5a5.jpg', 'dsdfsdf'),
(4, 'WhatsApp Image 2024-02-19 at 09-65d560192591e.jpeg', 'LUWH'),
(5, 'abhisa khun-65b0a1f4f0ba1-65d42a4f91a4f-65d563ae0a82f.jpg', 'kamu nanya'),
(7, 'IMG_20231226_064106-65e5404bc2fad.png', 'bisha banget');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_upload`
--
ALTER TABLE `tb_upload`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_upload`
--
ALTER TABLE `tb_upload`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
