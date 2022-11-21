CREATE DATABASE `project` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
CREATE TABLE `agriculturalist_course` (
  `date_enrolled` date NOT NULL,
  `rate` int DEFAULT NULL,
  `review` varchar(45) DEFAULT NULL,
  `user_id` int NOT NULL,
  `course_id` int NOT NULL,
  PRIMARY KEY (`user_id`,`course_id`),
  KEY `course_id_idx` (`course_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `available_item` (
  `item_id` int NOT NULL AUTO_INCREMENT,
  `item_name` varchar(45) NOT NULL,
  `category` varchar(45) NOT NULL,
  `item_image` varchar(45) NOT NULL,
  PRIMARY KEY (`item_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `blog` (
  `blog_id` int NOT NULL AUTO_INCREMENT,
  `content` varchar(1000) DEFAULT NULL,
  `title` varchar(45) NOT NULL,
  `date` date NOT NULL,
  `user_id` int NOT NULL,
  PRIMARY KEY (`blog_id`),
  KEY `fk4_idx` (`user_id`),
  CONSTRAINT `fk4` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `blog_agriculturalist` (
  `rate` int DEFAULT NULL,
  `review` varchar(45) DEFAULT NULL,
  `blog_id` int NOT NULL,
  `user_id` int NOT NULL,
  PRIMARY KEY (`blog_id`,`user_id`),
  KEY `fk6_idx` (`user_id`),
  CONSTRAINT `fk5` FOREIGN KEY (`blog_id`) REFERENCES `blog` (`blog_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk6` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `blog_customer` (
  `rate` int DEFAULT NULL,
  `review` varchar(45) DEFAULT NULL,
  `blog_id` int NOT NULL,
  `user_id` int NOT NULL,
  PRIMARY KEY (`blog_id`,`user_id`),
  KEY `fk8_idx` (`user_id`),
  CONSTRAINT `fk7` FOREIGN KEY (`blog_id`) REFERENCES `blog` (`blog_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk8` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `course` (
  `course_id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(45) NOT NULL,
  `duration` varchar(45) NOT NULL,
  `user_id` int NOT NULL,
  PRIMARY KEY (`course_id`),
  KEY `fk9_idx` (`user_id`),
  CONSTRAINT `fk9` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `customer_course` (
  `date_enrolled` int NOT NULL,
  `rate` int DEFAULT NULL,
  `review` varchar(45) DEFAULT NULL,
  `user_id` int NOT NULL,
  `course_id` int NOT NULL,
  PRIMARY KEY (`user_id`,`course_id`),
  KEY `fk12_idx` (`course_id`),
  CONSTRAINT `fk11` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk12` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `customer` (
  `house_no` int NOT NULL,
  `lane` varchar(45) NOT NULL,
  `city` varchar(45) NOT NULL,
  `user_id` int NOT NULL,
  PRIMARY KEY (`user_id`),
  CONSTRAINT `fk10` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `delivery_agent` (
  `location` varchar(45) NOT NULL,
  `license_no` varchar(45) NOT NULL,
  `user_id` int NOT NULL,
  PRIMARY KEY (`user_id`),
  CONSTRAINT `fk13` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `delivery_agent_area` (
  `Area` varchar(45) NOT NULL,
  `user_id` int NOT NULL,
  PRIMARY KEY (`user_id`),
  CONSTRAINT `fk14` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `delivery_agent_timeslot` (
  `Timeslot` time NOT NULL,
  `user_id` int NOT NULL,
  PRIMARY KEY (`user_id`),
  CONSTRAINT `fk15` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `delivery_vehicle` (
  `reg_no` int NOT NULL,
  `vehicle_no` varchar(45) NOT NULL,
  `type` varchar(45) NOT NULL,
  `fuel_type` varchar(45) NOT NULL,
  `capacity` varchar(45) NOT NULL,
  `user_id` int NOT NULL,
  PRIMARY KEY (`reg_no`,`vehicle_no`),
  KEY `fk16_idx` (`user_id`),
  CONSTRAINT `fk16` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `fruit_vegetable_post` (
  `expiry_date` int NOT NULL,
  `post_id` int NOT NULL,
  PRIMARY KEY (`post_id`),
  CONSTRAINT `fk17` FOREIGN KEY (`post_id`) REFERENCES `post` (`post_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `instructor` (
  `occupation` varchar(45) NOT NULL,
  `education_level` varchar(45) NOT NULL,
  `specialized_area` varchar(45) NOT NULL,
  `user_id` int NOT NULL,
  PRIMARY KEY (`user_id`),
  CONSTRAINT `fk18` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `order` (
  `order_id` int NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `delivery_required` tinyint(1) DEFAULT NULL,
  `u_id_customer` int NOT NULL,
  `u_id_delivery_agent` int NOT NULL,
  PRIMARY KEY (`order_id`),
  KEY `fk19_idx` (`u_id_customer`),
  KEY `fk20_idx` (`u_id_delivery_agent`),
  CONSTRAINT `fk19` FOREIGN KEY (`u_id_customer`) REFERENCES `customer` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk20` FOREIGN KEY (`u_id_delivery_agent`) REFERENCES `delivery_agent` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `order_rate` (
  `rate` int NOT NULL,
  `user_id` int NOT NULL,
  `order_id` int NOT NULL,
  PRIMARY KEY (`user_id`,`order_id`),
  KEY `fk22_idx` (`order_id`),
  CONSTRAINT `fk21` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk22` FOREIGN KEY (`order_id`) REFERENCES `order` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `payment` (
  `payment_id` int NOT NULL AUTO_INCREMENT,
  `amount` varchar(45) NOT NULL,
  `payment_type` varchar(45) NOT NULL,
  `Paymentcol` varchar(45) DEFAULT NULL,
  `u_id_customer` int NOT NULL,
  `u_id_delivery_agent` int NOT NULL,
  `u_id_agriculturalist` int NOT NULL,
  `order_id` int NOT NULL,
  PRIMARY KEY (`payment_id`),
  KEY `fk23_idx` (`u_id_customer`),
  KEY `fk24_idx` (`u_id_delivery_agent`),
  KEY `fk25_idx` (`u_id_agriculturalist`),
  KEY `fk26_idx` (`order_id`),
  CONSTRAINT `fk23` FOREIGN KEY (`u_id_customer`) REFERENCES `customer` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk24` FOREIGN KEY (`u_id_delivery_agent`) REFERENCES `delivery_agent` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk25` FOREIGN KEY (`u_id_agriculturalist`) REFERENCES `agriculturalist` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk26` FOREIGN KEY (`order_id`) REFERENCES `order` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `post` (
  `post_id` int NOT NULL AUTO_INCREMENT,
  `agriculturalist_name` varchar(45) NOT NULL,
  `district` varchar(45) NOT NULL,
  `location` varchar(45) NOT NULL,
  `quantity` varchar(45) NOT NULL,
  `unit_price` varchar(45) NOT NULL,
  `contact_no` varchar(45) NOT NULL,
  `created_date` date NOT NULL,
  `category` varchar(45) NOT NULL,
  `user_id` int NOT NULL,
  PRIMARY KEY (`post_id`),
  KEY `fk27_idx` (`user_id`),
  CONSTRAINT `fk27` FOREIGN KEY (`user_id`) REFERENCES `agriculturalist` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `question` (
  `question_id` int NOT NULL AUTO_INCREMENT,
  `content` varchar(500) NOT NULL,
  `usei_id` int NOT NULL,
  PRIMARY KEY (`question_id`),
  KEY `fk28_idx` (`usei_id`),
  CONSTRAINT `fk28` FOREIGN KEY (`usei_id`) REFERENCES `agriculturalist` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `question_instructor` (
  `reply` varchar(500) NOT NULL,
  `question_id` int NOT NULL,
  `user_id` int NOT NULL,
  PRIMARY KEY (`question_id`,`user_id`),
  KEY `fk30_idx` (`user_id`),
  CONSTRAINT `fk29` FOREIGN KEY (`question_id`) REFERENCES `question` (`question_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk30` FOREIGN KEY (`user_id`) REFERENCES `instructor` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `agriculturalist` (
  `location` varchar(100) NOT NULL,
  `rate` int NOT NULL,
  `user_id` int NOT NULL,
  PRIMARY KEY (`user_id`),
  CONSTRAINT `fk1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `shopping_cart` (
  `total_cost` int DEFAULT NULL,
  `user_id` int NOT NULL,
  `order_id` int NOT NULL,
  PRIMARY KEY (`user_id`,`order_id`),
  KEY `fk32_idx` (`order_id`),
  CONSTRAINT `fk31` FOREIGN KEY (`user_id`) REFERENCES `customer` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk32` FOREIGN KEY (`order_id`) REFERENCES `order` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `shopping_cart_product_details` (
  `item_id` int NOT NULL,
  `quantity` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`item_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `user` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `first_name` varchar(45) NOT NULL,
  `last_name` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `role` varchar(45) NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `user_contact` (
  `user_id` int NOT NULL,
  `contact_number` varchar(45) NOT NULL,
  PRIMARY KEY (`user_id`,`contact_number`),
  CONSTRAINT `fk33` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `wishlist` (
  `idWishlist` int NOT NULL,
  PRIMARY KEY (`idWishlist`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `wishlist_item` (
  `date` date NOT NULL,
  `item_id` int NOT NULL,
  `user_id` int NOT NULL,
  PRIMARY KEY (`item_id`,`user_id`),
  KEY `fk35_idx` (`user_id`),
  CONSTRAINT `fk34` FOREIGN KEY (`item_id`) REFERENCES `available_item` (`item_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk35` FOREIGN KEY (`user_id`) REFERENCES `customer` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
