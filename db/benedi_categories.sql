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
-- Table structure for table `benedi_categories`
--

CREATE TABLE `benedi_categories` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `photo` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `benedi_categories`
--

INSERT INTO `benedi_categories` (`id`, `name`, `photo`) VALUES
(1, 'sofas', 'assets/img/categories/category-1.jpg'),
(2, 'beds', 'assets/img/categories/category-2.jpg'),
(3, 'chairs', 'assets/img/categories/category-3.jpg'),
(4, 'coffee tables', 'assets/img/categories/category-4.jpg'),
(5, 'nightstands & dressers', 'assets/img/categories/category-5.jpg'),
(6, 'console tables', 'assets/img/categories/category-6.jpg'),
(7, 'sectionals', 'assets/img/categories/category-7.jpg'),
(8, 'benches & ottomans', 'assets/img/categories/category-8.jpg'),
(9, 'dining tables', 'assets/img/categories/category-9.jpg'),
(10, 'dining chairs', 'assets/img/categories/category-10.jpg'),
(11, 'desks', 'assets/img/categories/category-11.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `benedi_categories`
--
ALTER TABLE `benedi_categories`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `benedi_categories`
--
ALTER TABLE `benedi_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
