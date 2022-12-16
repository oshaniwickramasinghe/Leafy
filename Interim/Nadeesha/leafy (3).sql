-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 16, 2022 at 05:12 AM
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
(24, 'newly', '', 'fsjyfsyfsyjfyjsfd', '', '2022-12-15', '', '11:09:11', 4),
(25, 'fdwuefdf', '', 'egfkegfelgf', '', '2022-12-15', '', '11:10:09', 4),
(26, 'dethejejr', '', 'dhedjrjr', '', '2022-12-15', '', '11:13:13', 4),
(35, 'soil', '', 'we are newly', '', '2022-12-16', 'courses.jpg', '07:40:04', 22);

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
(4, 'Nadeesha', 'Rajapaksha', 'r.w.m.e.n.rajapaksha@gmail.com', '0782016953', '0194df503ce0cb20a583d87a148378f6', 'ggit', 'dsdf', 'dudusufd', 'instructor', '1.jpg'),
(22, 'Dihan', 'Rajapaksha', 'dihan@gmail.com', '0775612345', '81595bb45f99a02243d7627477326a2d', 'water and soil', 'water management', 'degree', 'Instructor', 'certificate.jpg');

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
  MODIFY `blog_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `instructor`
--
ALTER TABLE `instructor`
  MODIFY `user_ID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

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
