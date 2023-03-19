-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 14, 2021 at 02:42 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `food-delight-1`
--

-- --------------------------------------------------------

--
-- Table structure for table `delivery`
--

CREATE TABLE `delivery` (
  `id` int(11) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `location` varchar(200) NOT NULL,
  `number` bigint(15) NOT NULL,
  `message` varchar(2000) NOT NULL,
  `houseno` bigint(15) NOT NULL,
  `roadno` bigint(15) NOT NULL,
  `sector` bigint(15) NOT NULL,
  `block` varchar(200) NOT NULL,
  `area` varchar(200) NOT NULL,
  `postalcode` bigint(15) NOT NULL,
  `city` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `delivery`
--

INSERT INTO `delivery` (`id`, `firstName`, `lastName`, `email`, `location`, `number`, `message`, `houseno`, `roadno`, `sector`, `block`, `area`, `postalcode`, `city`) VALUES
(7, 'Rownita', 'Khanam', 'rownitakhanam@gmail.com', 'House no.100,Road no.18192,Uttara', 4517564893, 'I like this service', 0, 0, 0, '', '', 0, ''),
(8, 'Mumtahina', 'Muhsinat', 'mumtahina@gmail.com', '', 123716987028, 'I like this service. I want  burger and pizza', 46, 25, 4, 'A', 'Uttara', 13900, 'Dhaka'),
(9, '', '', '', '', 2451657427, 'I like this food delivery system...', 0, 0, 0, 'A', '', 0, 'Dhaka'),
(10, '', '', '', '', 2451657427, 'I like this food delivery system...', 0, 0, 0, 'A', '', 0, 'Dhaka');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `delivery`
--
ALTER TABLE `delivery`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `delivery`
--
ALTER TABLE `delivery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
