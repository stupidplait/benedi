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
-- Table structure for table `benedi_users`
--

CREATE TABLE `benedi_users` (
  `id` int(11) NOT NULL,
  `lastname` varchar(100) DEFAULT NULL,
  `name` varchar(100) NOT NULL,
  `patronymic` varchar(100) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `phone` int(11) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `benedi_users`
--

INSERT INTO `benedi_users` (`id`, `lastname`, `name`, `patronymic`, `birthday`, `phone`, `email`, `password`, `role`) VALUES
(1, 'dsgdss', 'ruslan', '', '2006-04-05', 2345678, 'ruslan@gmail.com', '25f9e794323b453885f5181f1b624d0b', 2),
(2, '', 'ruslan', '', '2004-02-21', 123456, 'ruslan2@gmail.com', '1441f19754335ca4638bfdf1aea00c6d', 1),
(3, '', 'ruslan', '', '2004-02-21', 123456, 'ruslan3@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1),
(4, NULL, 'admin', NULL, NULL, NULL, 'admin@mail.ru', 'f6fdffe48c908deb0f4c3bd36c032e72', 2),
(5, NULL, 'user', NULL, NULL, NULL, 'user@mail.ru', '5cc32e366c87c4cb49e4309b75f57d64', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `benedi_users`
--
ALTER TABLE `benedi_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `benedi_users`
--
ALTER TABLE `benedi_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
