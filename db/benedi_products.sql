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
-- Table structure for table `benedi_products`
--

CREATE TABLE `benedi_products` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `about` varchar(1000) NOT NULL,
  `price` int(11) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `finish` varchar(50) NOT NULL,
  `size` varchar(50) NOT NULL,
  `id_category` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `benedi_products`
--

INSERT INTO `benedi_products` (`id`, `name`, `about`, `price`, `photo`, `finish`, `size`, `id_category`) VALUES
(1, 'the varick', 'bold proportions and comfort-driven curvature make the varick a contemporary statement fit for everyday luxury. its oversized arms and low-slung profile lend a relaxed, casual feel.', 3175, 'assets/img/catalog/catalog-1.webp', 'mohair', '75', 1),
(2, 'the medium morro', 'artisanal woodworking gives tdfsfdsfsfdffdhe morro its shapely form and minimalist design. handcrafted with solid ash wood, each table harmoniously nests together or stands alone, adding an artful presence to any room.', 73543, 'assets/img/catalog/catalog-2.webp', 'driftwooddsds', 'full set', 4),
(3, 'the reade demilune console', 'a delicate balance of commanding proportions, the reade\'s handcrafted column legs and intricately designed tabletop create an unforgettable sculptural statement. expertly crafted of solid ash wood and finished with exquisite artisanship.', 1950, 'assets/img/catalog/catalog-3.webp', 'pecan', '42\" long, 21\" deep, 30\" high', 6),
(4, 'The Beekman Desk', 'handcrafted from richly grained oak, the beekman has the presence of modern sculpture. distinguished by its freeform shape, beveled edging, and tri-leg design, its organic silhouette is appealing from any angle.', 2550, 'assets/img/catalog/catalog-4.webp', 'pecan oak', '68”W, 32”D, 29”H', 11),
(5, 'the vestry tables', 'handcrafted of solid oak, the vestry’s organic shape and soft curvature display an expansive statement of natural materiality. designed to artfully nest together or stand alone in graceful proportion.', 1775, 'assets/img/catalog/catalog-5.webp', 'pecan oak', '48', 4),
(6, 'the carlisle dining table', 'defined by graphic angles and a striking form, the carlisle embodies a modern yet timeless design. each piece is expertly crafted of solid ash, with its striking form accentuated by a two-toned finish and delicate brass detailing.', 3450, 'assets/img/catalog/catalog-6.webp', 'driftwood with charcoal', '96', 9),
(7, 'the muir sectional', 'artisanal woodworking meets expertly tailored comfort in the muir sectional. its asymmetrical silhouette with built-in side table form a mixed material work of art.', 9895, 'assets/img/catalog/catalog-7.webp', 'natural ash', 'Left: 130\" / Right: 112\"', 7),
(9, 'the madison dining chair', 'clean-lined and classic, the madison\'s subtle curves and angular tension offer a fresh take on a traditional silhouette. handcrafted with solid ash and elegantly tailored for refined comfort.', 635, 'assets/img/catalog/catalog-9.webp', 'charcoal', '17.5\" Wide, 24\" Deep, 35\" Tall, 19\" Seat Height', 10),
(10, 'the mulberry ottoman', 'a sculptural pedestal base and plush seat make the mulberry a versatile design statement. expertly crafted with a solid ash wood base and tailored detailing.', 575, 'assets/img/catalog/catalog-10.webp', 'driftwood', '16.5” Wide, 16.5” Deep, 18” High', 8),
(11, 'the bond chair', 'a stylish nod to mod, the bond balances generous proportions with its contemporary profile. luxe, down-filled comfort makes it an everyday luxury.', 2115, 'assets/img/catalog/catalog-11.webp', 'tuscan leather - camel', '38\" Wide, 34\" Deep, 29\" Tall', 3),
(12, 'the clinton 1-drawer nightstand', 'handcrafted of solid ash with an optional leather-clad inlay, the clinton celebrates luxe materiality in functional form. artistry is on display—from the rounded corners and custom drawer pulls to the fully finished interiors and hand-shaped legs.', 1975, 'assets/img/catalog/catalog-12.webp', '27”W, 15”D, 22”H', 'pecan ash with tuscan leather camel', 5),
(13, 'the mercer chair', 'inspired by an iconic midcentury shape, the mercer is modern and minimal without sacrificing comfort. equal parts striking and casual, this piece will become the most coveted seat in your living room.', 1385, 'assets/img/catalog/catalog-13.webp', 'nubuck leather - tide', '30\" Wide, 31\" Deep, 27\" Tall', 3),
(15, 'sdsf', 'dsfg', 213, 'assets/img/catalog/1685463180muir-l-sectional_performance-textured-linen-pearl_natural-ash-l_9e945458-ddbf-436c-857b-1da8b6597464_2048x.webp', 'ewrw', 'rewrw', 6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `benedi_products`
--
ALTER TABLE `benedi_products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `benedi_products`
--
ALTER TABLE `benedi_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
