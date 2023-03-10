/*blog*/
-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 10, 2023 at 08:34 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.2.0

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
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `blog_id` int(11) NOT NULL,
  `title` varchar(45) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `time` time NOT NULL DEFAULT current_timestamp(),
  `content1` text NOT NULL,
  `image1` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  `topic` text NOT NULL,
  `Verified` tinyint(4) NOT NULL DEFAULT 0,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`blog_id`, `title`, `date`, `time`, `content1`, `image1`, `user_id`, `topic`, `Verified`, `description`) VALUES
(1, 'first one ', '2023-02-06', '13:23:38', '', '', 8, '', 0, ''),
(2, 'second blog', '2023-02-06', '13:36:27', '', '', 8, '', 0, ''),
(3, 'the blog ', '2023-02-06', '16:26:34', '', '4.jpg', 7, '', 0, ''),
(4, 'First one', '2023-02-10', '09:11:54', '', 'courses.jpg', 7, '', 0, ''),
(5, 'Seed Potato Production ', '2023-02-10', '09:36:33', '', 'organic-food-farm.jpg', 7, '', 0, 'Potato is the world’s fourth-largest food crop, following rice, wheat, and maize. Unlike other crops, it is a typical root crop with a special growth cycle pattern and underground tubers, which makes it harder to track the progress of potatoes and to provide automated crop management.'),
(6, 'test one', '2023-02-11', '22:17:48', '', 'farm-man-working-his-organic-lettuce-garden.jpg', 7, '', 0, 'this is just type sentence becuase I havent any thing to type'),
(12, 'Pumpkins', '2023-03-02', '06:22:06', '', 'course4.jpg', 7, '', 0, ''),
(13, 'Saline agriculture', '2023-03-02', '23:03:02', '<h1 style=\"text-align:center\"><strong>Saline agriculture</strong></h1>\r\n\r\n<h1 style=\"text-align:center\"><em>The practical solution</em></h1>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\"><em><img alt=\"\" height=\"187\" src=\"/ckfinder/userfiles/images/course5.jpg\" style=\"float:left\" width=\"280\" /></em>&nbsp; &nbsp;<span style=\"font-family:Comic Sans MS,cursive\"><span style=\"font-size:16px\">Saline agriculture improves food security, with minimal impact on already scarce fresh water supplies.</span></span></p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<p style=\"text-align:center\"><strong><span style=\"font-size:20px\">Saline agriculture: the practical solution</span></strong></p>\r\n\r\n<p style=\"text-align:justify\">People have long believed that&nbsp;salt-affected&nbsp;land was unusable. But as a result of in-depth research and years of testing, a practical solution was found: Saline agriculture.<br />\r\nIt is very well possible to grow crops on&nbsp;salt-affected&nbsp;land, as long as the right (salt tolerant) crops are being used, combined with alternative techniques in irrigation, fertilization and water management.&nbsp;<br />\r\nWith saline agriculture, food is produced on salt-affected soils and salt or brackish water is used for irrigation.</p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\"><iframe frameborder=\"0\" height=\"360\" src=\"https://www.youtube.com/embed/yoJTi54KM0o\" width=\"640\"></iframe></p>\r\n', 'course1.jpg', 7, '', 0, 'Saline agriculture improves food security, with minimal impact on already scarce  fresh water supplies.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`blog_id`),
  ADD KEY `fk4_idx` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `blog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blog`
--
ALTER TABLE `blog`
  ADD CONSTRAINT `fk4` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;









/*course*/
-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 10, 2023 at 08:36 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.2.0

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
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course_id` int(11) NOT NULL,
  `title` varchar(45) NOT NULL,
  `duration` varchar(45) NOT NULL,
  `user_id` int(11) NOT NULL,
  `verified` tinyint(4) NOT NULL DEFAULT 0,
  `description` text NOT NULL,
  `Topic` text NOT NULL,
  `status` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `steps` int(11) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `submit` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `title`, `duration`, `user_id`, `verified`, `description`, `Topic`, `status`, `image`, `steps`, `date`, `submit`) VALUES
(1, 'first one', '3months', 7, 0, 'this one is for testing', 'just something', 'continue', '', 0, '2023-03-09', 0),
(2, 'second one', '1 month', 7, 0, 'this is for only testing and I need some huge text to check whether the table width adjest to according to user enterred value size.', 'just testing', 'incomplete', '', 0, '2023-03-09', 0),
(3, 'Growing Organic Food Sustainably', '5 hours', 7, 0, 'This free online course on organic food gardening demonstrates the steps and strategies of growing organic foods. You will learn about the various considerations you need to take into account when growing various types of organic vegetables. By the end of this free online course you will be able to understand the best seasons for planting certain crops and how to sow and grow them accordingly.', ' ', 'Not Complete', '', 4, '2023-03-10', 0),
(4, 'Growing Organic Food Sustainably', '5 hours', 7, 0, 'This free online course on organic food gardening demonstrates the steps and strategies of growing organic foods. You will learn about the various considerations you need to take into account when growing various types of organic vegetables. By the end of this free online course you will be able to understand the best seasons for planting certain crops and how to sow and grow them accordingly.', ' agronomy', 'Complete', '', 4, '2023-03-10', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_id`),
  ADD KEY `fk9_idx` (`user_id`),
  ADD KEY `title` (`title`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `fk9` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;









/*instructor*/

-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 10, 2023 at 08:41 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.2.0

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
-- Table structure for table `instructor`
--

CREATE TABLE `instructor` (
  `occupation` varchar(45) NOT NULL,
  `education_level` varchar(45) NOT NULL,
  `specialized_area` varchar(45) NOT NULL,
  `user_id` int(11) NOT NULL,
  `contact_number` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `instructor`
--

INSERT INTO `instructor` (`occupation`, `education_level`, `specialized_area`, `user_id`, `contact_number`) VALUES
('soil and water ', 'Degree', 'soil and water', 8, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `instructor`
--
ALTER TABLE `instructor`
  ADD PRIMARY KEY (`user_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `instructor`
--
ALTER TABLE `instructor`
  ADD CONSTRAINT `fk18` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;










/*user*/


-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 10, 2023 at 08:44 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.2.0

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












