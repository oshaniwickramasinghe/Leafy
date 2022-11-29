-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2022 at 08:05 AM
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
-- Database: `leafy`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `blog_ID` int(10) NOT NULL,
  `title` text NOT NULL,
  `author` text NOT NULL,
  `content` text NOT NULL,
  `comment` text NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`blog_ID`, `title`, `author`, `content`, `comment`, `date`) VALUES
(1, 'green', 'nadessha', 'djyyjuryr', 'fufi', '2022-11-23'),
(2, 'green', 'nadessha', 'djyyjuryr', 'fufi', '2022-11-23'),
(3, 'seeds', 'nadessha', 'djyyjuryr', 'fufi', '2022-11-23'),
(4, 'green house effect', 'Nadeesha', 'there are lot of country which haven\'t enough sun light, therefore these country\'s use this green houses which is created based on green house effect', '', '2022-11-25'),
(5, 'green house effect', 'Nadeesha', 'there are lot of country which haven\'t enough sun light, therefore these country\'s use this green houses which is created based on green house effect', '', '2022-11-25');

-- --------------------------------------------------------

--
-- Table structure for table `instructor`
--

CREATE TABLE `instructor` (
  `user_ID` int(100) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact_number` varchar(10) NOT NULL,
  `password` varchar(50) NOT NULL,
  `occupation` varchar(25) NOT NULL,
  `specialized_area` varchar(50) NOT NULL,
  `education_level` varchar(50) NOT NULL,
  `role` varchar(25) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `instructor`
--

INSERT INTO `instructor` (`user_ID`, `first_name`, `last_name`, `email`, `contact_number`, `password`, `occupation`, `specialized_area`, `education_level`, `role`, `image`) VALUES
(3, 'sonali', 'edirisinghe', 'erandathi142@gmail.com', '0815686653', '202cb962ac59075b964b07152d234b70', 'ggit', 'wtetete', 'dudusufd', 'instructor', ''),
(4, 'Nadeesha', 'Rajapaksha', 'r.w.m.e.n.rajapaksha@gmail.com', '0782016953', '202cb962ac59075b964b07152d234b70', 'ggit', 'dsdf', 'dudusufd', 'instructor', '1.jpg'),
(5, 'Nadeesha', 'Rajapaksha', 'rajapksha', '0782016953', '202cb962ac59075b964b07152d234b70', 'ggit', 'wtetete', 'dudusufd', 'instructor', ''),
(6, 'saman', 'Rajapaksha', 'saman@123', '0815686653', '827ccb0eea8a706c4c34a16891f84e7b', 'hjvvv', 'dsdf', 'bbbb', 'instructor', ''),
(7, 'nimal', 'soysa', 'nimal@123', '0782016953', '827ccb0eea8a706c4c34a16891f84e7b', 'ggit', 'dsdf', 'bbbb', 'customer', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`blog_ID`);

--
-- Indexes for table `instructor`
--
ALTER TABLE `instructor`
  ADD PRIMARY KEY (`user_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `blog_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `instructor`
--
ALTER TABLE `instructor`
  MODIFY `user_ID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
