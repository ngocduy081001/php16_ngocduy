-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 16, 2022 at 01:59 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `manager_rss`
--

-- --------------------------------------------------------

--
-- Table structure for table `rss`
--

CREATE TABLE `rss` (
  `id` int(11) NOT NULL,
  `link` varchar(255) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'active',
  `ordering` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rss`
--

INSERT INTO `rss` (`id`, `link`, `status`, `ordering`) VALUES
(10, 'https://www.facebook.com/', 'active', 2),
(11, 'https://www.facebook.com/', 'inactive', 2),
(15, 'https://www.facebook.com/', 'active', 2),
(16, 'https://www.facebook.com/', 'active', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `rss`
--
ALTER TABLE `rss`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `rss`
--
ALTER TABLE `rss`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
