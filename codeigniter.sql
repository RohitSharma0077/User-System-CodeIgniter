-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 07, 2020 at 09:28 PM
-- Server version: 5.7.28-0ubuntu0.18.04.4
-- PHP Version: 7.2.24-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `codeigniter`
--

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` int(5) NOT NULL,
  `user_id` varchar(20) NOT NULL,
  `file_name` varchar(100) NOT NULL,
  `uploaded_on` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`id`, `user_id`, `file_name`, `uploaded_on`) VALUES
(4, '4', 'uploads/files/Download.jpeg', '2020-01-06 21:10:24'),
(5, '1', 'uploads/files/download.png', '2020-01-06 21:11:52'),
(6, '5', 'uploads/files/Download1.jpeg', '2020-01-06 21:12:56'),
(7, '1', 'uploads/files/r_(another_copy).png', '2020-01-06 21:28:04');

-- --------------------------------------------------------

--
-- Table structure for table `passreset`
--

CREATE TABLE `passreset` (
  `id` int(12) NOT NULL,
  `userid` int(11) DEFAULT NULL,
  `confirmemail` varchar(50) NOT NULL,
  `token` longtext NOT NULL,
  `expiry` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `passreset`
--

INSERT INTO `passreset` (`id`, `userid`, `confirmemail`, `token`, `expiry`) VALUES
(1, 1, 'ee@gmail.com', '$2y$10$/VlplEyCOEzje45YISzdveW6e3lw6LkmEXraV3Fgz9z0IbVf5O29O', '1577201951'),
(3, 4, 'rwork007@gmail.com', '$2y$10$qzYZGsS4yo/arJvldok.Ou6pshCDmqQhIKdLYgZ8vsGQem/G600fG', '1577224678');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(5) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(11) NOT NULL,
  `password` varchar(70) NOT NULL,
  `current_status` varchar(30) NOT NULL DEFAULT '1',
  `status` varchar(50) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `username`, `password`, `current_status`, `status`) VALUES
(1, 'M@gmail.com', 'aaa', '111', '1', 'active'),
(4, 'w@gmail.com', 'qwa', '333', '1', 'active'),
(5, 'w1@gmail.com', 'qqq', '121', '0', 'active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `passreset`
--
ALTER TABLE `passreset`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `passreset`
--
ALTER TABLE `passreset`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
