-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2018 at 12:53 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `todo`
--

-- --------------------------------------------------------

--
-- Table structure for table `todotable`
--

CREATE TABLE `todotable` (
  `username` varchar(50) NOT NULL,
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `descrip` varchar(400) NOT NULL,
  `from` varchar(50) NOT NULL,
  `towhere` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `todotable`
--

INSERT INTO `todotable` (`username`, `id`, `title`, `descrip`, `from`, `towhere`, `status`) VALUES
('asasssa', 141, '', '', 'menadm', 'ggggg@gmail.com', ''),
('noran monsef', 143, '', '', 'keroless is my', 'mr', ''),
('keroles', 144, '', '', '0122654654654', 'what is this', ''),
('mena1234', 146, '', '', '1', 'somanilfkjf', ''),
('mena', 147, '', '', '', 'somanilfkjf', ''),
('keroles monsef', 148, '', '', ';lk', ';l', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `kero` varchar(255) DEFAULT NULL,
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(30) DEFAULT NULL,
  `ip_address` varchar(20) DEFAULT NULL,
  `time` varchar(30) DEFAULT NULL,
  `data` varchar(30) DEFAULT NULL,
  `email` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`kero`, `id`, `username`, `password`, `ip_address`, `time`, `data`, `email`) VALUES
(NULL, 1, 'keroles', '2', '::1', '11:41:14', '2018-02-17', 'kerolesmonsef@gmail.com'),
(NULL, 2, 'beshoy1', '2', '::1', '09:55:01', '2018-02-18', 'fkfklfj@kfjhkj.hfkj'),
(NULL, 3, 'menaddk', '1', '::1', '02:01:27', '2018-02-24', 'dkdljdk@dkljdk.dkjh'),
(NULL, 4, 'menaddksss', '1', '::1', '02:03:45', '2018-02-24', 'dkdljdk@dkljdk.dkjh'),
(NULL, 5, 'oiuouoiuoiuoiu', '1', '::1', '06:48:20', '2018-02-27', 'oiuoiuoiu@kjhkjhj.flkjflkfjl');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `todotable`
--
ALTER TABLE `todotable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `todotable`
--
ALTER TABLE `todotable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=149;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
