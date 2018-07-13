-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 30 Jun 2018 pada 08.11
-- Versi Server: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `products_list`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `products_list`
--

CREATE TABLE `products_list` (
  `id` int(11) NOT NULL,
  `product_name` varchar(60) NOT NULL,
  `product_speck` varchar(100) NOT NULL,
  `product_desc` text NOT NULL,
  `product_code` varchar(60) NOT NULL,
  `product_price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `products_list`
--

INSERT INTO `products_list` (`id`, `product_name`, `product_speck`, `product_desc`, `product_code`, `product_price`) VALUES
(1, 'Kamera MC 1500', 'MC 1500', '', 'Multimedia', '1000000.00'),
(2, 'Kamera MC 2500', 'MC 2500', '', 'Multimedia', '1000000.00'),
(3, 'Kamera Sony X70', 'Sony X70', '', 'Multimedia', '1500000.00'),
(4, 'Kamera PXW X 160', 'PXW X160', '', 'Multimedia', '2000000.00'),
(5, 'Mixer V8, V40, Black Magic', 'V8, V40, Black Magic', 'Harga mulai Rp 500.000', 'Multimedia', '500000.00'),
(6, 'Jimmy Jib', 'Full Install, Operator, Kamera', '', 'Multimedia', '1500000.00'),
(7, 'Jimmy Jib', 'Install, Operator', '', 'Multimedia', '3000000.00'),
(8, 'Jimmy Jib', 'Jib Only', '', 'Multimedia', '2500000.00'),
(9, 'Drone', 'Drone', 'Per 1 Batere (20 menit)', 'Multimedia', '1000000.00'),
(10, 'Projector', '5.000 Lumens', '', 'Multimedia', '1250000.00'),
(11, 'Projector 7.700 Lumens', '7.700 Lumens', '', 'Multimedia', '2500000.00'),
(12, 'Projector 10.000 Lumens', '10.000 Lumens', '', 'Multimedia', '3500000.00'),
(13, 'Projector 15.000 Lumens', '15.000 Lumens', 'Harga Call', 'Multimedia', '0.00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products_list`
--
ALTER TABLE `products_list`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products_list`
--
ALTER TABLE `products_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
