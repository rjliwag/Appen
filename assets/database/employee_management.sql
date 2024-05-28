-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 28, 2024 at 12:49 PM
-- Server version: 8.3.0
-- PHP Version: 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `appen_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `employee_management`
--

DROP TABLE IF EXISTS `employee_management`;
CREATE TABLE IF NOT EXISTS `employee_management` (
  `id` int NOT NULL AUTO_INCREMENT,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email_address` varchar(100) NOT NULL,
  `project_assign` varchar(100) NOT NULL,
  `rate` varchar(100) NOT NULL,
  `date_hired` varchar(50) NOT NULL,
  `total_income` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `employee_management`
--

INSERT INTO `employee_management` (`id`, `first_name`, `last_name`, `email_address`, `project_assign`, `rate`, `date_hired`, `total_income`) VALUES
(1, 'Deslie', 'Badillo', 'desliebadillo@gmail.com', 'crater', '50', '2024-05-27 19:09:33', 0),
(2, 'jovic', 'maglinao', 'jovicmaglinao@gmail.com', 'conness', '50', '2024-05-27 19:36:15', 0),
(3, 'Haezel', 'Ilagan', 'haezelilagan@gmail.com', 'crater', '50', '2024-05-27 20:54:08', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
