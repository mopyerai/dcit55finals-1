-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 17, 2025 at 05:43 AM
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
-- Database: `hotel_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking_tbl`
--

CREATE TABLE `booking_tbl` (
  `Id` int(11) NOT NULL,
  `Room_type` varchar(50) NOT NULL,
  `Guest` int(11) NOT NULL,
  `Checkin_date` date NOT NULL,
  `Checkout_date` date NOT NULL,
  `Created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `Total_price` decimal(10,2) NOT NULL,
  `Confirmation_code` varchar(20) NOT NULL,
  `status` enum('Pending','Checked-in','Checked-out') NOT NULL DEFAULT 'Pending',
  `user_id` int(11) DEFAULT NULL,
  `room_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rooms_tbl`
--

CREATE TABLE `rooms_tbl` (
  `room_id` int(11) NOT NULL,
  `room_name` varchar(100) DEFAULT NULL,
  `room_type` varchar(100) DEFAULT NULL,
  `bed_info` varchar(100) DEFAULT NULL,
  `view_info` varchar(100) DEFAULT NULL,
  `guest_capacity` int(11) DEFAULT NULL,
  `price_per_night` decimal(10,2) DEFAULT NULL,
  `availability` tinyint(1) DEFAULT 1,
  `image_path` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rooms_tbl`
--

INSERT INTO `rooms_tbl` (`room_id`, `room_name`, `room_type`, `bed_info`, `view_info`, `guest_capacity`, `price_per_night`, `availability`, `image_path`) VALUES
(1, 'Luxury King Suite', 'Suite', '1 King Bed', 'Ocean View', 2, 320.00, 1, '../Image/Room-1.jpg'),
(2, 'Deluxe Double Room', 'Double', '2 Double Beds', 'City View', 4, 200.00, 1, '../Image/Room-2.jpg'),
(3, 'Standard Single Room', 'Single', '1 Single Bed', 'Garden View', 1, 120.00, 0, '../Image/Room-4.jpg'),
(4, 'Family Suite', 'Suite', '2 Queen Beds', 'Pool View', 5, 280.00, 1, '../Image/Room-5.jfif'),
(5, 'Presidential Suite', 'Suite', '3 King Beds', 'City & Ocean View', 6, 680.00, 1, '../Image/Room-6.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users_tbl`
--

CREATE TABLE `users_tbl` (
  `user_id` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking_tbl`
--
ALTER TABLE `booking_tbl`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `Confirmation_code` (`Confirmation_code`);

--
-- Indexes for table `rooms_tbl`
--
ALTER TABLE `rooms_tbl`
  ADD PRIMARY KEY (`room_id`);

--
-- Indexes for table `users_tbl`
--
ALTER TABLE `users_tbl`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking_tbl`
--
ALTER TABLE `booking_tbl`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `rooms_tbl`
--
ALTER TABLE `rooms_tbl`
  MODIFY `room_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users_tbl`
--
ALTER TABLE `users_tbl`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
