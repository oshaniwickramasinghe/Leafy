-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2022 at 05:10 PM
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
  `date` date NOT NULL DEFAULT current_timestamp(),
  `image` varchar(200) NOT NULL,
  `time` time NOT NULL DEFAULT current_timestamp(),
  `user_ID` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`blog_ID`, `title`, `author`, `content`, `comment`, `date`, `image`, `time`, `user_ID`) VALUES
(1, 'green', 'nadessha', 'djyyjuryr', 'fufi', '2022-11-23', '', '06:30:51', 3),
(2, 'green', 'nadessha', 'djyyjuryr', 'fufi', '2022-11-23', '', '06:30:51', 3),
(3, 'seeds', 'nadessha', 'djyyjuryr', 'fufi', '2022-11-23', '', '06:30:51', 3),
(4, 'green house effect', 'Nadeesha', 'there are lot of country which haven\'t enough sun light, therefore these country\'s use this green houses which is created based on green house effect', '', '2022-11-25', '', '06:30:51', 3),
(5, 'green house effect', 'Nadeesha', 'there are lot of country which haven\'t enough sun light, therefore these country\'s use this green houses which is created based on green house effect', '', '2022-11-25', '', '06:30:51', 3),
(6, 'New', 'Nadeesha', 'content', 'comment', '0000-00-00', '', '06:30:51', 3),
(7, 'dysadysdyudsu', 'Nadeesha', 'ddfuffu', 'fufi', '2022-11-29', '', '06:30:51', 3),
(8, 'dysadysdyudsu', 'Nadeesha', 'ddfuffu', 'fufi', '2022-11-29', '', '06:30:51', 3),
(9, 'ever green', 'Nadeesha', 'fifsifg', 'iyipyy', '2022-12-06', '', '06:30:51', 3),
(10, 'green houses', 'nishani', 'there are lot of country which haven\'t enough sun light, therefore these country\'s use this green houses which is created based on green house effect', '', '2022-12-25', '', '06:30:51', 3),
(11, 'new', '', 'gkwgdkgfkgw', '', '0000-00-00', '', '06:30:51', 3),
(12, 'new', '', 'gkwgdkgfkgw', '', '0000-00-00', '', '06:30:51', 3),
(13, 'new', '', 'gkwgdkgfkgw', '', '0000-00-00', '', '06:30:51', 3),
(14, 'new', '', 'gkwgdkgfkgw', '', '0000-00-00', '', '06:30:51', 3),
(24, 'newly', '', 'fsjyfsyfsyjfyjsfd', '', '2022-12-15', '', '11:09:11', 4),
(25, 'fdwuefdf', '', 'egfkegfelgf', '', '2022-12-15', '', '11:10:09', 4),
(26, 'dethejejr', '', 'dhedjrjr', '', '2022-12-15', '', '11:13:13', 4),
(27, 'newly created', '', 'fjfjtikkg', '', '2022-12-15', '', '19:56:37', 20);

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
(7, 'nimal', 'soysa', 'nimal@123', '0782016953', '827ccb0eea8a706c4c34a16891f84e7b', 'ggit', 'dsdf', 'bbbb', 'customer', ''),
(8, 'erandathi', 'Rajapaksha', 'erandathi142@gmail.com', '0765294457', '3bfe7ab5ddeaaa93afa0653f5b8392cd', 'hjvvv', 'vvvv', 'dudusufd', 'instructor', ''),
(9, 'sanjeewa', 'Rajapaksha', 'Sanjeewa@123', '0753017896', '202cb962ac59075b964b07152d234b70', 'srdthfhf', 'dtfufuj', 'bbbb', 'instructor', ''),
(10, 'Danushika', 'Wijesinghe', 'danu98@gmail.com', '0753017896', 'a29e5a0efaa2b1521ebea7cf10cd0eab', 'water management and moni', 'water management', 'Other', 'instructor', ''),
(11, 'sonali', 'edirisinghe', 'sonali@gmaol.com', '0782016953', 'a9610e955c9bb8905ed96926c6ec1aa2', 'water management and moni', 'water management', 'advanced_level', 'agriculturalist', 'bd5.jpg'),
(12, 'dasith', 'dissanayake', 'dasith@gmail.com', '0765294457', '9b5ed6941fe51c3b36c97bd8b826d5f8', 'water management and moni', 'water management', 'degree', 'agriculturalist', 'bd16.jpg'),
(13, 'bawanth', 'kallora', 'kallora@gmail.com', '0782016953', 'ef0285691e27bc3fc32b21aefe221177', 'water management and moni', 'water management', 'advanced_level', 'agriculturalist', 'bd2.jpg'),
(14, 'roshan', 'ranaweera', 'roshan@gmail.com', '0765294457', 'd6dfb33a2052663df81c35e5496b3b1b', 'water management and moni', 'water management', 'advanced_level', 'agriculturalist', 'bd2.jpg'),
(15, 'roshana', 'ranaweera', 'roshana@gmail.com', '0765294457', '3c58577fddcb8e41ef986373233094a5', 'water management and moni', 'water management', 'advanced_level', 'agriculturalist', 'bd2.jpg'),
(16, 'roshani', 'ranaweera', 'roshani@gmail.com', '0765294457', 'df23a65a4c4ee9e29ef2bcba94d70874', 'water management and moni', 'water management', 'advanced_level', 'agriculturalist', 'bd2.jpg'),
(17, 'nimali', 'ranaweera', 'nimali@gmail.com', '0765294457', '08e8591a88914b14b38c0b5b2aab83ba', 'water management and moni', 'water management', 'advanced_level', 'agriculturalist', '3.jpg'),
(18, 'nishani', 'edirisinghe', 'nishani@gmail.com', '0753017896', 'f34e88e13e1ae7000f9804d6a8456f65', 'water management and moni', 'water management', 'degree', 'instructor', 'bd2.jpg'),
(19, 'nilshan', 'samarawikrama', 'nilshan@gmail.com', '0815789634', '8e2c51d69d41162ed6bebf6feeea12cb', 'water and soil', 'soil resourses', 'degree', 'agriculturalist', 'bd5.jpg'),
(20, 'nadee', 'Rajapaksha', 'nadee@gmail.com', '0765294457', 'e070cb6987205ddc34af94866d07a1fe', 'water management and moni', 'water management', 'degree', 'Instructor', 'bd2.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`blog_ID`),
  ADD KEY `user_ID` (`user_ID`);

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
  MODIFY `blog_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `instructor`
--
ALTER TABLE `instructor`
  MODIFY `user_ID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blog`
--
ALTER TABLE `blog`
  ADD CONSTRAINT `Test` FOREIGN KEY (`user_ID`) REFERENCES `instructor` (`user_ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
