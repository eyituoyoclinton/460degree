-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 27, 2022 at 03:52 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `460degree`
--

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(100) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`, `created`, `modified`) VALUES
(1, 'Individual', '2022-01-26 21:16:53', '2022-01-26 21:16:53'),
(2, 'Corporate', '2022-01-26 21:16:53', '2022-01-26 21:16:53'),
(3, 'Reseller', '2022-01-26 21:17:25', '2022-01-26 21:17:25'),
(4, 'Super seller', '2022-01-26 21:17:25', '2022-01-26 21:17:25');

-- --------------------------------------------------------

--
-- Table structure for table `user_tbl`
--

CREATE TABLE `user_tbl` (
  `id` int(11) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(120) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'Individual',
  `password` text NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_tbl`
--

INSERT INTO `user_tbl` (`id`, `slug`, `fullname`, `username`, `email`, `role`, `password`, `created`, `modified`) VALUES
(1, 'jhtg-hgfse', 'Clinton Tuoyos', 'clinton', 'clinton@gmail.com', 'Super seller', '$2y$10$qb44hqvW.3gDf6pSKm.oAugifl/KlJV9atEZ2VjS1wgQOgn4krYZC', '2022-01-26 18:33:42', '2022-01-27 08:50:09'),
(2, 'hgtyuiuyhg', 'Emiko Ali', 'emiko', 'emiko@gmail.com', 'Individual', '$2y$10$rnnE9k3mW3sXM6Fp3m0BmObdFdBZ.DGTdeakATZJ0XACeu8S.3SnK', '2022-01-26 21:57:21', '2022-01-27 06:42:40'),
(3, 'kiuoiuytgh', 'Elo Sarahs', 'sarah', 'sarah@gmail.com', 'Super seller', '$2y$10$aT7vyHEdJNZeaiSaU3ukCuK2n5qmo9gZmu6Cs6Zls9jAHw5loEibO', '2022-01-26 21:57:21', '2022-01-27 10:12:16'),
(4, 'cLZwzRVgXM', 'Clinton Joy', 'joy', 'joy@gmaul.com', 'Reseller', '$2y$10$y/mkh5AY01.HORsQrC.Wa.UZsnVbMfdtsH4q9ZAPITSN1/O6cik1C', '2022-01-27 07:32:27', '2022-01-27 07:32:27'),
(5, 'tFlLYOPF8T', 'Collins Tuoyo', 'collins', 'collins@gmail.com', 'Individual', '$2y$10$pGgHcqf9B.iVCBIOOxUUU.3aMKeJMDk43EyYJSFQoWmoZzleZ//oS', '2022-01-27 11:23:38', '2022-01-27 11:23:38');

-- --------------------------------------------------------

--
-- Table structure for table `user_transaction`
--

CREATE TABLE `user_transaction` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `transaction` text NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_transaction`
--

INSERT INTO `user_transaction` (`id`, `user_id`, `transaction`, `created`) VALUES
(3, 3, 'Updated account successfully', '2022-01-27 10:11:41'),
(4, 3, 'Updated account successfully', '2022-01-27 10:11:57'),
(7, 5, 'Logged in', '2022-01-27 11:23:52'),
(8, 3, 'Logged in', '2022-01-27 11:32:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_tbl`
--
ALTER TABLE `user_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_transaction`
--
ALTER TABLE `user_transaction`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `user_tbl`
--
ALTER TABLE `user_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `user_transaction`
--
ALTER TABLE `user_transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
