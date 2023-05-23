-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2023 at 01:09 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `maptest`
--

-- --------------------------------------------------------

--
-- Table structure for table `markers`
--

CREATE TABLE `markers` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `address` varchar(80) NOT NULL,
  `lat` float(10,6) NOT NULL,
  `lng` float(10,6) NOT NULL,
  `type` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `markers`
--

INSERT INTO `markers` (`id`, `name`, `address`, `lat`, `lng`, `type`) VALUES
(1, 'สวนหลวง ร.9', 'ถนน เฉลิมพระเกียรติ ร. 9 เเขวง หนองบอน เขต ประเวศ กรุงเทพมหานคร 10250', 13.684504, 100.658249, 'Park'),
(2, 'เซ็นทรัล บางนา', '587 589 ซอย บางนา-ตราด 42 บางนาเหนือ เขตบางนา กรุงเทพมหานคร 10260', 13.669167, 100.632187, 'Departmentstore'),
(3, 'ไอคอนสยาม', '299 ซอย เจริญนคร 5 แขวงคลองต้นไทร เขตคลองสาน กรุงเทพมหานคร 10600', 13.726384, 100.507118, 'Departmentstore'),
(4, 'วัดบางพลี', '130 หมู่ที่ 10 ตำบล บางพลีใหญ่ อำเภอบางพลี สมุทรปราการ 10540', 13.746127, 100.472008, 'Temple');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
