-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 25, 2017 at 03:30 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `voting`
--

-- --------------------------------------------------------

--
-- Table structure for table `aadhar`
--

CREATE TABLE `aadhar` (
  `id` int(11) NOT NULL,
  `vid` int(255) NOT NULL,
  `aadharno` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aadhar`
--

INSERT INTO `aadhar` (`id`, `vid`, `aadharno`) VALUES
(47, 21, '123456789012'),
(48, 22, '123456789012'),
(49, 21, '121212121212'),
(50, 21, '123456789017'),
(51, 22, '123456789017');

-- --------------------------------------------------------

--
-- Table structure for table `login_data`
--

CREATE TABLE `login_data` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login_data`
--

INSERT INTO `login_data` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `voting_count`
--

CREATE TABLE `voting_count` (
  `id` int(255) NOT NULL,
  `vid` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `count` int(255) NOT NULL,
  `description` varchar(2000) NOT NULL,
  `img_path` varchar(2000) NOT NULL DEFAULT 'member.png'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `voting_count`
--

INSERT INTO `voting_count` (`id`, `vid`, `name`, `count`, `description`, `img_path`) VALUES
(25, 21, 'member 1', 1, 'good member', 'user1.png'),
(26, 21, 'member 2', 1, 'good person', 'user2.png'),
(27, 21, 'member 3', 1, 'excellent member. must get selected', 'user3.png'),
(28, 22, 'member 3', 2, 'bjbjb', 'user4.png');

-- --------------------------------------------------------

--
-- Table structure for table `voting_name`
--

CREATE TABLE `voting_name` (
  `id` int(11) NOT NULL,
  `voting_name` varchar(255) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `img_path` varchar(2000) NOT NULL DEFAULT 'election.png'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `voting_name`
--

INSERT INTO `voting_name` (`id`, `voting_name`, `description`, `img_path`) VALUES
(21, 'Voting 1', 'Good voting', 'thumb1.png'),
(22, 'voting 2', 'fdahbkj', 'thumb2.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aadhar`
--
ALTER TABLE `aadhar`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `login_data`
--
ALTER TABLE `login_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `voting_count`
--
ALTER TABLE `voting_count`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `voting_name`
--
ALTER TABLE `voting_name`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aadhar`
--
ALTER TABLE `aadhar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT for table `login_data`
--
ALTER TABLE `login_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `voting_count`
--
ALTER TABLE `voting_count`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `voting_name`
--
ALTER TABLE `voting_name`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
