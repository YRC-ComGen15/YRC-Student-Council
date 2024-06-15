-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 15, 2024 at 08:39 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `student-council`
--

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `link` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `link`, `title`, `icon`) VALUES
(1, 'https://google.com', 'สภานักเรียน', '<i class=\"fa-solid fa-users\"></i>'),
(2, 'https://google.com', 'คู่มือนักเรียน', '<i class=\"fa-solid fa-book\"></i>'),
(3, 'https://google.com', 'กฏระเบียบ', '<i class=\"fa-solid fa-people-group\"></i>'),
(4, 'https://google.com', 'แผนที่โรงเรียน', '<i class=\"fa-solid fa-map\"></i>'),
(5, 'https://google.com', 'กิจกรรมโรงเรียน', '<i class=\"fa-solid fa-school\"></i>'),
(6, './project.php', 'โครงการ', '<i class=\"fa-solid fa-chalkboard\"></i>'),
(7, 'https://google.com', 'ปฏิทิน', '<i class=\"fa-solid fa-calendar-days\"></i>'),
(8, 'https://google.com', 'comment', '<i class=\"fa-solid fa-comments\"></i>');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
