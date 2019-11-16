-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 10, 2018 at 07:33 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.0.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_links`
--

CREATE TABLE `tb_links` (
  `id` int(10) NOT NULL,
  `title` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `description` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `url` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `category` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `create_at` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_links`
--

INSERT INTO `tb_links` (`id`, `title`, `description`, `url`, `category`, `create_at`) VALUES
(1, 'Universal Website','Universal Holliday Center  Booking engine to rent and sell apartments in Tarragona coast. Application get data (all properties) from Avantio software by xml using cUrl with a cron in a linux server.Application there are a landing pages,dynamic blocks,opin', 'http://www.davidberruezo.com/projects/universal/', 'php', '2019-11-13 10:00:00'),
(2, 'MH Apartments', 'MH Apartments  Booking engine to rent apartments in Barcelona,Madrid and Praga. Application organize all apartments in buildings and have customized pages, offers, dynamic gallery, several languages', 'http://www.davidberruezo.com/projects/mhapartments/', 'php', '2019-11-13 10:00:00'),
(3, 'Hotel Villaemilia', 'Hotel Villa Emilia Luxury landing hotel website with backend and frontend .In the application there are a landing pages,dynamic blocks,rooms, advantatges,languages and documentation, offers, blog of news', 'http://www.davidberruezo.com/projects/hotelvillaemilia/', 'php', '2019-11-13 10:00:00'),
(4, 'Yurbban Hotels', 'Yurbban Hotels landing website hotel chain, with two hotels Yurbban Passage and Yurbban Trafalgar', 'http://www.davidberruezo.com/projects/yurbban/', 'php', '2019-11-13 10:00:00'),
(5, 'Hotel Yurbban Trafalgar', 'Yurbban Trafalgar  Yurbban Trafalgar Drupal website to show rooms and services of Yurbban Trafalgar hotel reservation system with witbooking', 'http://www.davidberruezo.com/projects/yurbbantrafalgar/', 'php', '2019-11-13 10:00:00'),
(6, 'Hotel Yurbban Passage', 'Yurbban Passage Hotel  Luxury landing website page for Yurbban Passage Hotels,include a good gallery with all hotel services and installations. Multilanguage application and witbooking reservation system', 'http://www.davidberruezo.com/projects/yurbbanpassage/', 'php', '2019-11-13 10:00:00'),
(7, 'Hotel Homiii', 'Homiii  Booking engine to rent apartments to students and professional living in Barcelona.Rooms,floats, galleries etc', 'http://www.davidberruezo.com/projects/homiii/', 'php', '2019-11-13 10:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_links`
--
ALTER TABLE `tb_links`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_links`
--
ALTER TABLE `tb_links`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
