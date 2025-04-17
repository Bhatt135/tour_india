-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 17, 2025 at 08:23 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tour_india`
--

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `destination` text NOT NULL,
  `fees` text NOT NULL,
  `card_number` text NOT NULL,
  `card_expirymonth` text NOT NULL,
  `card_expiryyear` text NOT NULL,
  `status` text NOT NULL,
  `paymentid` text NOT NULL,
  `added_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`id`, `name`, `email`, `destination`, `fees`, `card_number`, `card_expirymonth`, `card_expiryyear`, `status`, `paymentid`, `added_date`) VALUES
(5, 'diya', 'diya.dave1103@gmail.com', 'Daman', '15000', '', '', '', 'succeeded', 'txn_3RCQ9pB0Pd8uVfnl1gZqGIzE', '2025-04-10 20:49:02'),
(8, 'user', 'pratham.21beitv135@gmail.com', 'Goa', '20000', '', '', '', 'succeeded', 'txn_3RCbW7B0Pd8uVfnl1Gr9gJRB', '2025-04-11 08:56:47'),
(9, 'abhishek', 'abhigupta0015@gmail.com', 'Goa', '20000', '', '', '', 'succeeded', 'txn_3RCbswB0Pd8uVfnl0qgFDUAn', '2025-04-11 09:20:23'),
(11, 'mubin', 'mubinladhani5252@gmail.com', 'Goa', '20000', '', '', '', 'succeeded', 'txn_3RDfJfB0Pd8uVfnl0vlB8Lg3', '2025-04-14 07:12:18'),
(13, 'user', 'kasimshaikh1713@gmail.com', 'Amritsar (Punjab)', '9000', '', '', '', 'succeeded', 'txn_3RE1huB0Pd8uVfnl1SQPvOZ3', '2025-04-15 07:06:50');

-- --------------------------------------------------------

--
-- Table structure for table `tour_plans`
--

CREATE TABLE `tour_plans` (
  `id` int(11) NOT NULL,
  `destination` varchar(55) NOT NULL,
  `estimated_cost` int(11) NOT NULL,
  `tour_plan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tour_plans`
--

INSERT INTO `tour_plans` (`id`, `destination`, `estimated_cost`, `tour_plan`) VALUES
(1, 'example', 1, 'example'),
(2, 'Goa', 20000, 'From 15/05/2025 to 18/05/2025\r\nDay 1: Relax at Baga Beach, Visit Fort Aguada\r\nDay 2: Explore Old Goa Churches, Cruise on Mandovi River\r\nDay 3: Visit Anjuna Market, Enjoy nightlife at Tito’s'),
(3, 'Agra', 15000, 'From 15/05/2025 to 18/05/2025\r\nDay 1: Visit Taj Mahal, Agra Fort\r\nDay 2: Mehtab Bagh, Itimad-ud-Daulah, Fatehpur Sikri\r\nDay 3: Local market tour, Try Mughlai cuisine'),
(4, 'Daman', 15000, 'From 15/05/2025 to 18/05/2025\r\nDay 1: Visit Devka Beach, Enjoy sunset at Moti Daman Fort\r\nDay 2: Explore St. Jerome Fort, Daman Ganga Riverfront\r\nDay 3: Relax at Jampore Beach, Visit Dominican Monastery'),
(5, 'Delhi', 12000, 'From 15/05/2025 to 18/05/2025\r\nDay 1: Visit Red Fort, Jama Masjid, Chandni Chowk\r\nDay 2: Explore India Gate, Rashtrapati Bhavan, Qutub Minar\r\nDay 3: Lotus Temple, Akshardham, Hauz Khas Village'),
(6, 'Jaipur', 15000, 'From 15/05/2025 to 18/05/2025\r\nDay 1: Visit Amber Fort, Jal Mahal\r\nDay 2: Explore City Palace, Jantar Mantar, Hawa Mahal\r\nDay 3: Shop at Johari Bazaar, Visit Nahargarh Fort'),
(7, 'Kerala', 25000, 'From 15/05/2025 to 18/05/2025\r\nDay 1: Munnar tea gardens, Mattupetty Dam\r\nDay 2: Thekkady Wildlife Sanctuary, Spice Plantation Tour\r\nDay 3: Alleppey Backwaters Houseboat, Kumarakom Lake'),
(8, 'Mumbai', 18000, 'From 15/05/2025 to 18/05/2025\r\nDay 1: Gateway of India, Marine Drive, Elephanta Caves\r\nDay 2: Siddhivinayak Temple, Juhu Beach, Film City Tour\r\nDay 3: Colaba Causeway, Haji Ali Dargah'),
(10, 'Darjeeling', 16000, 'From 15/05/2025 to 18/05/2025\r\nDay 1: Tiger Hill sunrise, Batasia Loop\r\nDay 2: Darjeeling Himalayan Railway, Tea Estate Visit\r\nDay 3: Peace Pagoda, Rock Garden, Local Market'),
(11, 'Rajasthan Desert Safari', 22000, 'From 15/05/2025 to 18/05/2025\r\nDay 1: Jaisalmer Fort, Patwon Ki Haveli\r\nDay 2: Sam Sand Dunes, Camel Safari, Cultural Program\r\nDay 3: Bada Bagh, Gadisar Lake'),
(12, 'Diu', 18000, 'From 15/05/2025 to 18/05/2025\r\nDay 1: Explore Diu Fort, Relax at Nagoa Beach\r\nDay 2: Visit Gangeshwar Mahadev Temple, INS Khukri Memorial\r\nDay 3: Visit Naida Caves, Enjoy sunset at Chakratirth Beach'),
(13, 'Udaipur (Rajasthan)', 16000, 'From 15/05/2025 to 18/05/2025\r\nDay 1: City Palace, Lake Pichola boat ride\r\nDay 2: Sajjangarh, Fateh Sagar Lake\r\nDay 3: Jag Mandir, Saheliyon Ki Bari'),
(14, 'Varanasi (Uttar Pradesh)', 9000, 'From 15/05/2025 to 18/05/2025\r\nDay 1: Ghats & Ganga Aarti\r\nDay 2: Kashi Vishwanath Temple, Sarnath\r\nDay 3: Boat ride, local food tour'),
(15, 'Ladakh', 25000, 'From 15/05/2025 to 18/05/2025\r\nDay 1: Leh (Local sightseeing)\r\nDay 2: Nubra Valley (Sand Dunes)\r\nDay 3: Pangong Lake'),
(16, 'Rishikesh & Haridwar (Uttarakhand)', 12000, 'From 15/05/2025 to 18/05/2025\r\nDay 1: Rishikesh (River Rafting, Beatles Ashram)\r\nDay 2: Haridwar (Ganga Aarti, Temples)\r\nDay 3: Neelkanth Mahadev Temple'),
(17, 'Andaman & Nicobar Islands', 35000, 'From 15/05/2025 to 18/05/2025\r\nDay 1: Port Blair (Cellular Jail, Light & Sound Show)\r\nDay 2: Havelock Island (Radhanagar Beach)\r\nDay 3: Ross Island, Snorkeling'),
(18, 'Mysore (Karnataka)', 10000, 'From 15/05/2025 to 18/05/2025\r\nDay 1: Mysore Palace, Jaganmohan Palace\r\nDay 2: Chamundi Hills, St. Philomena’s Church\r\nDay 3: Brindavan Gardens, Srirangapatna'),
(19, 'Amritsar (Punjab)', 9000, 'From 15/05/2025 to 18/05/2025\r\nDay 1: Golden Temple, Jallianwala Bagh\r\nDay 2: Wagah Border Ceremony\r\nDay 3: Local food tour (Amritsari Kulcha)');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(55) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','user') NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`) VALUES
(4, 'admin', 'admin@gmail.com', 'admin', 'admin'),
(8, 'pratham', 'prathambhatt987@gmail.com', '1234', 'admin'),
(10, 'user', 'user@gmail.com', '1234', 'user'),
(13, 'diya', 'diya.dave1103@gmail.com', 'pratham', 'user'),
(14, 'user', '21it135@svitvasad.ac.in', '1234', 'user'),
(15, 'user', 'pratham.21beitv135@gmail.com', '1234', 'user'),
(16, 'abhishek', 'abhigupta0015@gmail.com', '1234', 'user'),
(17, 'mubin', 'mubinladhani5252@gmail.com', '1234', 'user'),
(18, 'alex', 'alex.1.laptop@gmail.com', '1234', 'user'),
(19, 'user', 'kasimshaikh1713@gmail.com', '1234', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `user_tours`
--

CREATE TABLE `user_tours` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `tour_id` int(11) NOT NULL,
  `selected_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tour_plans`
--
ALTER TABLE `tour_plans`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `place_name` (`destination`),
  ADD UNIQUE KEY `destination` (`destination`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `user_tours`
--
ALTER TABLE `user_tours`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `tour_id` (`tour_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tour_plans`
--
ALTER TABLE `tour_plans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `user_tours`
--
ALTER TABLE `user_tours`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `user_tours`
--
ALTER TABLE `user_tours`
  ADD CONSTRAINT `user_tours_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `user_tours_ibfk_2` FOREIGN KEY (`tour_id`) REFERENCES `tour_plans` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
