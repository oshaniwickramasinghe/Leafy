CREATE TABLE `duplicate_user_count` (
  `role` varchar(20) NOT NULL,
  `count` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `duplicate_user_count`
--

INSERT INTO `duplicate_user_count` (`role`, `count`) VALUES
('customer', 4),
('agriculturalist', 5),
('instructor', 6),
('delivery_person', 7);

-- --------------------------------------------------------


CREATE TABLE `user_count` (
  `role` varchar(20) NOT NULL,
  `count` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user_count`
--

INSERT INTO `user_count` (`role`, `count`) VALUES
('agriculturalist', 1),
('customer', 3),
('delivery agent', 0),
('instructor', 0);

-- --------------------------------------------------------