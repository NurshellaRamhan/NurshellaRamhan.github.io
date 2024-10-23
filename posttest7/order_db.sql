-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 23, 2024 at 05:08 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `order_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`) VALUES
(1, 'sigit', '$2y$10$Z1m8xfWZqSIeolkgZOpq9e7oDJMOhJ./UMXEelEt4vCmx3NWiOcB2');

-- --------------------------------------------------------

--
-- Table structure for table `order_box`
--

CREATE TABLE `order_box` (
  `id` int(11) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `flower_order` varchar(255) NOT NULL,
  `flower_price` int(11) NOT NULL,
  `message` text NOT NULL,
  `payment_method` enum('COD','Debit Card','Credit Card','Ovo','Paypal','Pay Later') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_box`
--

INSERT INTO `order_box` (`id`, `foto`, `name`, `email`, `password`, `flower_order`, `flower_price`, `message`, `payment_method`) VALUES
(5, '16-10-2024-lily.jpg', 'bill gates', 'a@gmail.com', '123', 'musk lily', 2, 'cut the leaves', 'Ovo'),
(7, '23-10-24-peony.jpg', 'bruce lee', 'lee@gmail.com', '123456', 'pink peony', 1, 'nope', 'Ovo'),
(8, '23-10-24-silk orchid.jpg', 'albert eintesin', 'garut@gmail.com', 'aaa', 'orchid malang', 2, 'gatau', 'Paypal'),
(9, '23-10-24-poduct.jpg', 'pakde isaac newton', 'apeljatuh@gmail.com', 'duatigaayam mekdi', 'tulip cibaduyut', 4, 'ga pake sambal', 'Pay Later'),
(10, '23-10-24-product8.jpg', 'pakde daniel bernoulli', 'gacorkang@email.com', 'iyaaja', 'mawar nganjuk', 3, 'y', 'Paypal');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_box`
--
ALTER TABLE `order_box`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `order_box`
--
ALTER TABLE `order_box`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
