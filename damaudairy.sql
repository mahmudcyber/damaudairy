-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 05, 2023 at 12:30 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `damaudairy`
--

-- --------------------------------------------------------

--
-- Table structure for table `booktable`
--

CREATE TABLE `booktable` (
  `booktable_id` int(11) NOT NULL,
  `customer_id` varchar(100) NOT NULL,
  `booking_date` date NOT NULL,
  `book_status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `food_id` varchar(100) NOT NULL,
  `order_by` varchar(100) NOT NULL,
  `food_name` varchar(100) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` float NOT NULL,
  `discount` float DEFAULT NULL,
  `total_price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `food_id`, `order_by`, `food_name`, `quantity`, `price`, `discount`, `total_price`) VALUES
(73, '1138980Chocolate', 'sado001', 'Chocolate', 2, 500, 0, 1000),
(74, '1453799989Cheeses', 'sado001', 'Cheeses', 3, 1500, 0, 4500),
(96, '1138980Chocolate', 'dorathy1', 'Chocolate', 20, 1500, 600, 29400),
(97, '1453799989Cheeses', 'dorathy1', 'Cheeses', 10, 1500, 0, 15000),
(98, '935871469Yoghurt', 'dorathy1', 'Yoghurt', 4, 1500, 0, 6000),
(99, '1138980Chocolate', '636AE5A37C9B6', 'Chocolate', 50, 1500, 1500, 73500);

-- --------------------------------------------------------

--
-- Table structure for table `creditcard`
--

CREATE TABLE `creditcard` (
  `credit_card_id` int(11) NOT NULL,
  `card_number` varchar(100) NOT NULL,
  `cvv` int(50) NOT NULL,
  `expiry_month` varchar(11) NOT NULL,
  `expiry_year` varchar(11) NOT NULL,
  `payment` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `creditcard`
--

INSERT INTO `creditcard` (`credit_card_id`, `card_number`, `cvv`, `expiry_month`, `expiry_year`, `payment`) VALUES
(19, '2583558712493305', 111, '01', '24', 29),
(20, '2583558712493305', 222, '01', '24', 30),
(21, '2583558712493305', 333, '01', '24', 31),
(22, '2583558712493305', 222, '01', '24', 32),
(23, '2583558712493305', 333, '01', '24', 33);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` varchar(100) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `customer_email` varchar(100) NOT NULL,
  `customer_contact` varchar(100) NOT NULL,
  `customer_address` varchar(100) NOT NULL,
  `customer_gender` varchar(100) NOT NULL,
  `customer_status` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_name`, `customer_email`, `customer_contact`, `customer_address`, `customer_gender`, `customer_status`, `date`, `user_id`) VALUES
('636AE5A37C9B6', 'Dorothy Abui', 'dorathy@gmail.com', '07015233712', 'Arewa House, Kaduna', 'male', 'active', '2022-11-09', 8),
('636AE8DE405F1', 'Musa Usman', 'musa@gmail.com', '08167692290', 'sokoto meseum', 'male', 'active', '2022-11-09', 9),
('638BCAD3A22AD', 'Maryam Lawal', 'lawal@gmail.com', '08136554896', '01,Barakallah, Kaduna', 'female', 'active', '2022-12-03', 10);

-- --------------------------------------------------------

--
-- Table structure for table `delivery`
--

CREATE TABLE `delivery` (
  `delivery_id` int(11) NOT NULL,
  `order_id` varchar(100) NOT NULL,
  `deliver_by` varchar(100) DEFAULT NULL,
  `deliver_to` varchar(100) NOT NULL,
  `delivery_contact` varchar(100) NOT NULL,
  `delivery_address` varchar(100) NOT NULL,
  `delivery_status` varchar(100) NOT NULL,
  `delivery_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `delivery`
--

INSERT INTO `delivery` (`delivery_id`, `order_id`, `deliver_by`, `deliver_to`, `delivery_contact`, `delivery_address`, `delivery_status`, `delivery_date`) VALUES
(15, '643FF2A0D2A71', '', 'Moses Isaac', '08169552333', 'Shop10, Kasuwan Barci Kaduna.', 'undelivered', '0000-00-00 00:00:00'),
(16, '644013AE968A9', '', 'Musa Usman', '08169552331', 'No 10, Arewa House, Kaduna', 'undelivered', '0000-00-00 00:00:00'),
(17, '6440157DDDC27', '', 'Maryam Lawal', '08169552332', 'No 10, Arewa House, Kaduna', 'undelivered', '0000-00-00 00:00:00'),
(18, '64401755AD74C', '', 'Maryam Lawal', '08169552330', 'No 10, Arewa House, Kaduna', 'undelivered', '0000-00-00 00:00:00'),
(19, '644017F9822A6', '', 'Maryam Lawal', '08169552330', 'No 10, Arewa House, Kaduna', 'undelivered', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `food_id` varchar(100) NOT NULL,
  `food_name` varchar(100) NOT NULL,
  `food_price` float NOT NULL,
  `food_description` varchar(225) NOT NULL,
  `food_image` varchar(100) NOT NULL,
  `food_status` varchar(100) NOT NULL,
  `total_qty` int(100) NOT NULL,
  `qty_remain` int(100) NOT NULL,
  `expiry_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`food_id`, `food_name`, `food_price`, `food_description`, `food_image`, `food_status`, `total_qty`, `qty_remain`, `expiry_date`) VALUES
('1138980Chocolate', 'Chocolate', 1500, 'Chocolate has been shown to lower blood pressure, reduce the risk of clotting and increase blood circulation.', 'menu-images/7284menu.jpeg', 'available', 1000, 850, '2023-05-10'),
('1453799989Cheeses', 'Cheeses', 1500, 'Cheese is a good source of calcium, a key nutrient for healthy bones and teeth, blood clotting, and wound healing.', 'menu-images/1115menu.jpeg', 'available', 1000, 700, '2023-03-13'),
('1641997765Milk', 'Milk', 1500, 'Milk contains nutrients important for bone health such as calcium, phosphorus, vitamin D, and protein. ', 'menu-images/7179menu.jpeg', 'available', 1000, 850, '2023-10-01'),
('272162973Butter', 'Butter', 2000, 'Butter contains vitamin D, a vital nutrient for bone growth and development. It also has calcium.', 'menu-images/3028menu.jpeg', 'available', 180, 180, '2023-10-01'),
('935871469Yoghurt', 'Yoghurt', 1500, 'Yogurts protect bones and teeth, help prevent digestive problems, and enhance gut microbiota.', 'menu-images/4876menu.jpeg', 'available', 500, 490, '2023-10-01');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `order_id` varchar(100) NOT NULL,
  `order_by` varchar(100) NOT NULL,
  `discount` float NOT NULL,
  `total_amount` float NOT NULL,
  `order_date` datetime NOT NULL,
  `order_status` varchar(100) NOT NULL,
  `payment_status` varchar(100) DEFAULT NULL,
  `exp_delivery_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`order_id`, `order_by`, `discount`, `total_amount`, `order_date`, `order_status`, `payment_status`, `exp_delivery_date`) VALUES
('643FF2A0D2A71', '636AE5A37C9B6', 600, 42900, '2023-04-19 14:54:40', 'active', 'paid', '0000-00-00 00:00:00'),
('644013AE968A9', '636AE8DE405F1', 660, 35340, '2023-04-19 17:15:42', 'active', 'paid', '0000-00-00 00:00:00'),
('6440157DDDC27', '638BCAD3A22AD', 600, 30900, '2023-04-19 17:23:25', 'active', 'paid', '0000-00-00 00:00:00'),
('64401755AD74C', '638BCAD3A22AD', 630, 30870, '2023-04-19 17:31:17', 'active', 'paid', '0000-00-00 00:00:00'),
('644017F9822A6', '638BCAD3A22AD', 0, 1500, '2023-04-19 17:34:01', 'active', 'paid', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `order_detail_id` int(11) NOT NULL,
  `order_id` varchar(100) NOT NULL,
  `food_id` varchar(100) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `price_per_food` float NOT NULL,
  `total_price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`order_detail_id`, `order_id`, `food_id`, `quantity`, `price_per_food`, `total_price`) VALUES
(68, '643FF2A0D2A71', '1138980Chocolate', 20, 1500, 29400),
(69, '643FF2A0D2A71', '1641997765Milk', 4, 1500, 6000),
(70, '643FF2A0D2A71', '935871469Yoghurt', 5, 1500, 7500),
(71, '644013AE968A9', '1138980Chocolate', 22, 1500, 32340),
(72, '644013AE968A9', '1453799989Cheeses', 1, 1500, 1500),
(73, '644013AE968A9', '1641997765Milk', 1, 1500, 1500),
(74, '6440157DDDC27', '1453799989Cheeses', 1, 1500, 1500),
(75, '6440157DDDC27', '935871469Yoghurt', 20, 1500, 29400),
(76, '64401755AD74C', '1138980Chocolate', 21, 1500, 30870),
(77, '644017F9822A6', '1453799989Cheeses', 1, 1500, 1500);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL,
  `order_id` varchar(100) NOT NULL,
  `amount` float NOT NULL,
  `paid_by` varchar(100) NOT NULL,
  `payment_date` date NOT NULL,
  `payment_type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `order_id`, `amount`, `paid_by`, `payment_date`, `payment_type`) VALUES
(29, '643FF2A0D2A71', 42900, '636AE5A37C9B6', '2023-04-19', 'online'),
(30, '644013AE968A9', 35340, '636AE8DE405F1', '2023-04-19', 'ondelivery'),
(31, '6440157DDDC27', 30900, '638BCAD3A22AD', '2023-04-19', 'ondelivery'),
(32, '64401755AD74C', 30870, '638BCAD3A22AD', '2023-04-19', 'ondelivery'),
(33, '644017F9822A6', 1500, '638BCAD3A22AD', '2023-04-19', 'ondelivery');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `rev_id` int(11) NOT NULL,
  `review` text NOT NULL,
  `customer_id` varchar(100) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`rev_id`, `review`, `customer_id`, `date`) VALUES
(5, 'mahmud admau', '07051282246', '2022-08-01 02:30:35'),
(6, 'mahmud testing?', '07051282246', '2022-08-01 02:32:36'),
(7, 'sweet aletr', '07051282246', '2022-08-01 02:34:18'),
(8, 'i can say that chapter two need more explanation i can say that chapter two need more explanation i can say that chapter two need more explanation i can say that chapter two need more explanation i can say that chapter two need more explanation i can say that chapter two need more explanation i can say that chapter two need more explanation i can say that chapter two need more explanation', '07051282246', '2023-04-10 13:35:52'),
(9, '07051282246 What is that you don\'t understand in specific?', 'admin', '2022-08-01 03:21:24'),
(10, 'sir, chapter two is not clear, we need more explanation', '07051282246', '2022-08-01 09:16:21'),
(11, 'ok i wil get back to you guys', 'admin', '2022-08-01 09:21:35'),
(12, 'sir idi', '1610310179', '2022-09-04 02:05:36'),
(13, 'what are you saying', 'admin', '2022-10-15 03:56:59'),
(14, 'is anyone online', 'admin', '2022-10-15 04:00:19');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staff_id` varchar(100) NOT NULL,
  `staff_name` varchar(100) NOT NULL,
  `staff_email` varchar(100) NOT NULL,
  `staff_contact` varchar(100) NOT NULL,
  `staff_gender` varchar(100) NOT NULL,
  `staff_address` varchar(100) NOT NULL,
  `staff_rank` varchar(100) NOT NULL,
  `staff_status` tinyint(1) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staff_id`, `staff_name`, `staff_email`, `staff_contact`, `staff_gender`, `staff_address`, `staff_rank`, `staff_status`, `date`) VALUES
('flamingo002', 'Kasimu Isah', 'kasim@gmail.com', '07010000002', 'male', 'Sokoto State University', 'officer', 1, '2022-11-05'),
('flamingo003', 'Usman Umar', 'usman.damaud@gmail.com', '07010000003', 'male', 'Kaduna', 'manager', 1, '2022-11-05'),
('flamingo004', 'Maryam Lawal', 'maryam.damaud@gmail.com', '07051262246', 'male', 'GRA Rigachikun', 'officer', 1, '2022-11-06');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `category` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `category`) VALUES
(8, 'dorathy', 'c58227f15dea6e9162e55f41c1dd4656', 2),
(9, 'musa', 'f883771cb92d70deb73cea0950cb6749', 2),
(10, '@lawal', 'feee55c3f8cecd41a10d5cec95fd663d', 2),
(15, 'mahmudcyber@gmail.com', 'b94147d866e5641e19ef22637b5d45c3', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booktable`
--
ALTER TABLE `booktable`
  ADD PRIMARY KEY (`booktable_id`),
  ADD KEY `customer_book` (`customer_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `food_cart` (`food_id`),
  ADD KEY `staff_order` (`order_by`);

--
-- Indexes for table `creditcard`
--
ALTER TABLE `creditcard`
  ADD PRIMARY KEY (`credit_card_id`),
  ADD KEY `payment` (`payment`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`),
  ADD KEY `user_fk` (`user_id`);

--
-- Indexes for table `delivery`
--
ALTER TABLE `delivery`
  ADD PRIMARY KEY (`delivery_id`),
  ADD KEY `order_delivery` (`order_id`);

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`food_id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`order_detail_id`),
  ADD KEY `order_detail` (`order_id`),
  ADD KEY `food_order` (`food_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `order_payment` (`order_id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`rev_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staff_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booktable`
--
ALTER TABLE `booktable`
  MODIFY `booktable_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `creditcard`
--
ALTER TABLE `creditcard`
  MODIFY `credit_card_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `delivery`
--
ALTER TABLE `delivery`
  MODIFY `delivery_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `order_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `rev_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booktable`
--
ALTER TABLE `booktable`
  ADD CONSTRAINT `customer_book` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `food_cart` FOREIGN KEY (`food_id`) REFERENCES `food` (`food_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `creditcard`
--
ALTER TABLE `creditcard`
  ADD CONSTRAINT `payment` FOREIGN KEY (`payment`) REFERENCES `payment` (`payment_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `user_fk` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `delivery`
--
ALTER TABLE `delivery`
  ADD CONSTRAINT `order_delivery` FOREIGN KEY (`order_id`) REFERENCES `order` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD CONSTRAINT `food_order` FOREIGN KEY (`food_id`) REFERENCES `food` (`food_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_detail` FOREIGN KEY (`order_id`) REFERENCES `order` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `order_payment` FOREIGN KEY (`order_id`) REFERENCES `order` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
