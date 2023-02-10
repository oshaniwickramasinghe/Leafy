-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 10, 2023 at 04:35 AM
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
-- Database: `second_year_leafy`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `fname` varchar(45) NOT NULL,
  `lname` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(45) NOT NULL,
  `code` varchar(255) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `fname`, `lname`, `email`, `password`, `role`, `code`, `image`) VALUES
(1, 'govi', 'sahas', 'govi@gmail.com', '$2y$10$V1l8/czDdfNO9Ro9RZiRqeznjleyX/yBYLwrLnvgezv8eUD6eNPqa', 'customer', '53f5eace4a175f2443c9a7d81f538f961e0dadf7', ''),
(2, 'fname', 'lname', 'email', 'password', 'role', 'code', ''),
(3, 'govi', 'sahas', 'saha@gmail.com', '$2y$10$CWdQ1ICslQ2rKHzjZz8uo.tNxo6ya.r9MrUZmOjZah2OlnBnikOMm', 'customer', 'a3ecabbf85f547f7fdfac7a413f0b00258755402', ''),
(4, 'govi', 'sahas', 'ss@gmail.com', '$2y$10$1zKdCer0xC1.619CoTICT.rlRvMXItW2Utdw5KS3zRpQJg8nwYeW6', 'customer', '752aebe9b974f7a4d928705dd3768f4ea039d0fb', ''),
(5, 'ss', 'gg', 'gg@gmail.com', '$2y$10$2KqEqVxnD4klX631wmjUmOTQqEvWUuCOZRBytT3lUv1.VTaXnBQru', 'Agriculturalist', '258227c830a063c3a8e11e3cbeedfd01eae80c3e', ''),
(7, 'Nadeesha', 'Rajapaksha', 'r.w.m.e.n.rajapaksha@gmail.com', '$2y$10$3g7GzOHlmTsuv0qK91oJOeX30Xs3/JsnBcWcqNR7lFKxgZ3Z1HcvC', 'Instructor', '3b74e5cdde381fe644182e7bba39616c930f247e', ''),
(8, 'yugds', 'd', 'nadee@gmail.com', '$2y$10$zd2TM/Dl0VRzsWpNxDHzYup6.BK4BqHBmvMHXNqZxoXZ.e3dm0HSa', 'Instructor', 'a2f62cdf9f90f9a11567f4278486edfd33e58d17', ''),
(9, 'Nadeesha', 'Rajapaksha', 'raja@gmail.com', '$2y$10$OhLRduf81e7FJIhP.dtdzuhPPoPEGguzEr2tFpNxVmePoFrj.y5ci', 'Instructor', 'd16d55a6d95280f798297153582dabe674cb5b17', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
