-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 15, 2025 at 02:18 PM
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
  `Confirmation_code` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking_tbl`
--
ALTER TABLE booking_tbl ADD COLUMN user_id INT;
ALTER TABLE booking_tbl ADD COLUMN room_id INT;



INSERT INTO `booking_tbl` (`Id`, `Room_type`, `Guest`, `Checkin_date`, `Checkout_date`, `Created_at`, `Total_price`, `Confirmation_code`) VALUES
(1, 'standard', 1, '2025-06-12', '2025-06-15', '2025-06-12 09:12:13', 0.00, '');

-- --------------------------------------------------------

--
-- Table structure for table `room_tbl`
--

CREATE TABLE rooms_tbl (
    room_id INT AUTO_INCREMENT PRIMARY KEY,
    room_name VARCHAR(100),
    room_type VARCHAR(100),
    bed_info VARCHAR(100),
    view_info VARCHAR(100),
    guest_capacity INT,
    price_per_night DECIMAL(10, 2),
    availability BOOLEAN DEFAULT TRUE,
    image_path VARCHAR(255)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users_tbl`
--

CREATE TABLE `users_tbl` (
  `Id` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users_tbl`
--

INSERT INTO `users_tbl` (`Id`, `Name`, `Email`, `Password`) VALUES
(1, 'lawrence bontog', 'lawrence5@gmail.com', '$2y$10$KCuBlxWYKSOrMwnbW71h3OvvLOypEoZnY3325YvxyLE6cHKIyGxHa');

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
-- Indexes for table `room_tbl`
--
ALTER TABLE `room_tbl`
  ADD PRIMARY KEY (`room_id`);

--
-- Indexes for table `users_tbl`
--
ALTER TABLE `users_tbl`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking_tbl`
--
ALTER TABLE `booking_tbl`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `room_tbl`
--
ALTER TABLE `room_tbl`
  MODIFY `room_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users_tbl`
--
ALTER TABLE `users_tbl`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
