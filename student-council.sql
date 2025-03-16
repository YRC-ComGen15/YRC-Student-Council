-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Mar 16, 2025 at 05:02 AM
-- Server version: 8.0.35
-- PHP Version: 8.2.20

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
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `project` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `role`, `name`, `project`) VALUES
(1, 'Nice2250', 'Nice2250', 'โสตทัศนูปกรณ์', 'วีราวรรธนุ์ กันธิพันธ์', 'LearnTogether'),
(7, '51834', '51834', 'สาราณี', 'วรปรัชญ์ หวลหงษ์', 'LearnTogether'),
(8, '53367', '53367', 'สาราณี', 'ปุญญิศา สดใส', 'LearnTogether'),
(9, '53421', '53421', 'โสตทัศนูปกรณ์', 'วีราวรรธนุ์ กันธิพันธ์', 'LearnTogether');

-- --------------------------------------------------------

--
-- Table structure for table `announce`
--

CREATE TABLE `announce` (
  `id` int NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `decp` mediumtext COLLATE utf8mb4_general_ci NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `edited` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `id` int NOT NULL,
  `project` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `files` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`id`, `project`, `files`) VALUES
(1, 'LearnTogether', '8778359820240616_092452.JPG'),
(2, 'We Health Care', '138317875320240616_085743.jpg'),
(3, 'FunFestival', '45630422920240616_085455.png'),
(4, 'WE SUPPORT SOCIAL', '168299123220240616_085839.png'),
(5, 'Green to Grow', '125170316220240625_170851.png');

-- --------------------------------------------------------

--
-- Table structure for table `banner3`
--

CREATE TABLE `banner3` (
  `id` int NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` int NOT NULL,
  `file_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`id`, `file_name`, `date`) VALUES
(4, 'ธรรมนูญโรงเรียนยุพราชวิทยาลัย-2566.pdf', '01-08-2024'),
(5, 'SCA calendar.pdf', '05-08-2024'),
(6, 'b5b95b65543dbf31ecec806d43cecbca.png', '16-03-2025'),
(7, 'b5b95b65543dbf31ecec806d43cecbca.png', '16-03-2025'),
(8, 'b5b95b65543dbf31ecec806d43cecbca.png', '16-03-2025');

-- --------------------------------------------------------

--
-- Table structure for table `learn_activity`
--

CREATE TABLE `learn_activity` (
  `id` int NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `decp` mediumtext COLLATE utf8mb4_general_ci NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `learn_activity`
--

INSERT INTO `learn_activity` (`id`, `title`, `decp`, `img`, `link`, `date`) VALUES
(1, 'Junior Webmaster Camp ครั้งที่ 13 by ODT ต่อเวลารับสมัครแล้ว ', 'ขอเชิญน้อง ๆ มัธยมที่มีอายุระหว่าง 15 - 18 ปี\r\nมาร่วมเรียนรู้และค้นหาตัวเอง ในแวดวงเว็บไซต์และสื่อออนไลน์ตลอด 3 วัน 2 คืน\r\n.\r\nพร้อมยกขบวนความรู้แบบจัดเต็ม! มาให้เลือกสมัครถึง 4 สาขา\r\n🧡สาขาดีไซน์ (Web Design)\r\n💚สาขามาร์เก็ตติ้ง (Web Marketing)\r\n💙สาขาโปรแกรมมิ่ง (Web Programming)\r\n💛สาขาคอนเทนต์ (Web Content)\r\n.\r\nเคลียร์ตารางให้พร้อม แล้วพบกันในค่าย วันที่ 20 - 22 กรกฎาคม 2567\r\nณ คณะเทคโนโลยีสารสนเทศ สถาบันเทคโนโลยีพระจอมเกล้าเจ้าคุณทหารลาดกระบัง\r\n.\r\nอย่าพลาดโอกาสดี ๆ ที่จะเปลี่ยนชีวิตน้องไปตลาดกาล\r\nสมัครเลย! วันนี้ - 23 มิถุนายน 2567 เวลา 23.59 น.', '33674687520240625_153313.png', 'https://13.jwc.in.th/', '25-06-2024');

-- --------------------------------------------------------

--
-- Table structure for table `learn_booksharing`
--

CREATE TABLE `learn_booksharing` (
  `id` int NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `decp` mediumtext COLLATE utf8mb4_general_ci NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `google_drive` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `learn_booksharing`
--

INSERT INTO `learn_booksharing` (`id`, `title`, `category`, `decp`, `img`, `date`, `name`, `status`, `google_drive`) VALUES
(1, 'ชีวิตเรามีแค่สี่พันสัปดาห์', 'หมวดหมู่ 1', 'เราสำรวจปรัชญาน่าทึ่งเกี่ยวกับเวลาและการบริหารเวลา ที่จะช่วยให้คุณมองเวลาชีวิตที่มีอยู่แค่ราวๆ 4000 พันสัปดาห์เปลี่ยนไปโดยสิ้นเชิง และปลดแอกตัวเองจาก “คำสาปของยุคโมเดิร์น” ที่เรียกร้องให้เรายัดทุกอย่างลงในเวลาที่มีอย่างมีประสิทธิภาพ ทำทุกอย่างให้เสร็จอย่างดี (getting thing done)  หนังสือทำให้เห็นว่า เราถูกตั้งโปรแกรมให้มีความคิดผิดเพี้ยนแค่ไหนเกี่ยวกับเวลา ความจริงด้านเวลาที่จะไม่มีวันเปลี่ยนแปลงคืออะไร พร้อมกับให้เครื่องมือที่ช่วยให้คุณได้สร้างชีวิตที่มีความหมาย ด้วยการยินดีโอบรับขีดจำกัดของชีวิต และเปลี่ยนแปลงสิ่งที่เราทำได้ในฐานะปัจเจก และสังคม', '1000255590_front_XXXL.jpg', '22-06-2024', 'วีราวรรธนุ์ กันธิพันธ์', 'active', '');

-- --------------------------------------------------------

--
-- Table structure for table `learn_category`
--

CREATE TABLE `learn_category` (
  `id` int NOT NULL,
  `category` varchar(11) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `learn_category`
--

INSERT INTO `learn_category` (`id`, `category`) VALUES
(1, 'หมวดหมู่ 1');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `link`, `title`, `icon`) VALUES
(1, './student-council.php', 'สภานักเรียน', '<i class=\"fa-solid fa-users\"></i>'),
(2, './pdf/ธรรมนูญโรงเรียนยุพราชวิทยาลัย-2566.pdf', 'ธรรมนูญโรงเรียน', '<i class=\"fa-solid fa-book\"></i>'),
(3, './pdf/ระเบียบโรงเรียนยุพราชวิทยาลัย ว่าด้วยการไว้ทรงผมของนักเรียน พ.ศ.2567.pdf', 'กฏระเบียบ', '<i class=\"fa-solid fa-people-group\"></i>'),
(4, 'https://www.yupparaj.ac.th/yrc_map/', 'แผนที่โรงเรียน', '<i class=\"fa-solid fa-map\"></i>'),
(5, 'https://drive.google.com/file/d/15wOY-CpJqlzmNU0nYvZ-8EhHRqdXdlCR/view', 'กิจกรรมโรงเรียน', '<i class=\"fa-solid fa-school\"></i>'),
(6, './project.php', 'โครงการของสภานักเรียน', '<i class=\"fa-solid fa-chalkboard\"></i>'),
(7, '	./pdf/SCA calendar.pdf', 'ปฏิทิน', '<i class=\"fa-solid fa-calendar-days\"></i>'),
(8, 'https://google.com', 'comment', '<i class=\"fa-solid fa-comments\"></i>');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `id` int NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`id`, `title`, `link`, `icon`) VALUES
(1, 'โครงการที่ 1', 'https://www.google.com', '1742099754_ตราสภานักเรียน.png'),
(2, 'โครงการที่ 2 Facebook', 'https://facebook.com', 'img_67d659941f82a3.63906542.png');

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `id` int NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `content` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id`, `title`, `content`) VALUES
(1, 'banner', 'Banner1.png'),
(2, 'banner2', 'Banner2.png');

-- --------------------------------------------------------

--
-- Table structure for table `studentcouncil`
--

CREATE TABLE `studentcouncil` (
  `id` int NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `edited` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `studentcouncil`
--

INSERT INTO `studentcouncil` (`id`, `title`, `edited`, `img`) VALUES
(1, 'โครงสร้างการบริหารกิจกรรมสภานักเรียนโรงเรียนยุพราชวิทยาลัย', '16-6-2024', '35762784420240829_154209.png');

-- --------------------------------------------------------

--
-- Table structure for table `summarize`
--

CREATE TABLE `summarize` (
  `id` int NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `visitors`
--

CREATE TABLE `visitors` (
  `id` int NOT NULL,
  `visit_date` date NOT NULL,
  `day_of_week` enum('Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday') COLLATE utf8mb4_general_ci NOT NULL,
  `visit_count` int DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `visitors`
--

INSERT INTO `visitors` (`id`, `visit_date`, `day_of_week`, `visit_count`) VALUES
(2, '2024-08-29', 'Thursday', 138),
(3, '2024-10-03', 'Thursday', 22),
(4, '2024-10-04', 'Friday', 62),
(5, '2024-10-05', 'Saturday', 1),
(6, '2024-10-09', 'Wednesday', 1),
(7, '2024-10-19', 'Saturday', 501),
(8, '2024-10-21', 'Monday', 24),
(9, '2024-10-29', 'Tuesday', 4),
(10, '2024-11-04', 'Monday', 3),
(11, '2024-11-13', 'Wednesday', 1),
(12, '2024-11-14', 'Thursday', 6),
(13, '2024-11-15', 'Friday', 1),
(14, '2024-12-06', 'Friday', 1),
(15, '2024-12-07', 'Saturday', 1),
(16, '2025-03-15', 'Saturday', 1),
(17, '2025-03-16', 'Sunday', 11);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `announce`
--
ALTER TABLE `announce`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banner3`
--
ALTER TABLE `banner3`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `learn_activity`
--
ALTER TABLE `learn_activity`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `learn_booksharing`
--
ALTER TABLE `learn_booksharing`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `learn_category`
--
ALTER TABLE `learn_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `studentcouncil`
--
ALTER TABLE `studentcouncil`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `summarize`
--
ALTER TABLE `summarize`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `visitors`
--
ALTER TABLE `visitors`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `announce`
--
ALTER TABLE `announce`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `banner3`
--
ALTER TABLE `banner3`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `learn_activity`
--
ALTER TABLE `learn_activity`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `learn_booksharing`
--
ALTER TABLE `learn_booksharing`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `learn_category`
--
ALTER TABLE `learn_category`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `studentcouncil`
--
ALTER TABLE `studentcouncil`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `summarize`
--
ALTER TABLE `summarize`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `visitors`
--
ALTER TABLE `visitors`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
