-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 28, 2023 at 04:32 AM
-- Server version: 5.7.39-log
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `z680`
--

-- --------------------------------------------------------

--
-- Table structure for table `benedi_orders`
--

CREATE TABLE `benedi_orders` (
  `id` int(11) NOT NULL,
  `place` varchar(1000) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_product` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `benedi_orders`
--

INSERT INTO `benedi_orders` (`id`, `place`, `id_user`, `id_product`) VALUES
(1, 'ertyugh', 1, 3),
(2, 'ertyugh', 1, 3),
(3, 'russia, kazan, bratiev kasymovych', 1, 12),
(4, 'vcxvxvxvcx dfgfghj wergh asdfgfgh', 1, 2),
(5, 'vcxvxvxvcx dfgfghj wergh asdfgfgh', 1, 2),
(6, 'vcxvxvxvcx dfgfghj wergh asdfgfgh', 1, 2),
(7, 'vcxvxvxvcx dfgfghj wergh asdfgfgh', 1, 2),
(8, 'vcxvxvxvcx dfgfghj wergh asdfgfgh', 1, 2),
(9, 'vcxvxvxvcx dfgfghj wergh asdfgfgh', 1, 2),
(10, 'vcxvxvxvcx dfgfghj wergh asdfgfgh', 1, 6),
(11, 'vcxvxvxvcx dfgfghj wergh asdfgfgh', 1, 6),
(12, 'vcxvxvxvcx dfgfghj wergh asdfgfgh', 1, 6),
(13, 'yjukhjhtg', 5, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `benedi_orders`
--
ALTER TABLE `benedi_orders`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `benedi_orders`
--
ALTER TABLE `benedi_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
