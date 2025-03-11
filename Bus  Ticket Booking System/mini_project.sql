-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 05, 2023 at 06:31 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mini_project`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `def_admin` ()   BEGIN
INSERT INTO admin_details(Email_id,mobile_no,pass) VALUES('admin@gmail.com',64567456,'admin123');
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `admin_details`
--

CREATE TABLE `admin_details` (
  `Email_id` varchar(20) NOT NULL,
  `mobile_no` int(20) NOT NULL,
  `pass` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_details`
--

INSERT INTO `admin_details` (`Email_id`, `mobile_no`, `pass`) VALUES
('admin@gmail.com', 2147483647, 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `bus_details`
--

CREATE TABLE `bus_details` (
  `bus_id` int(11) NOT NULL,
  `bus_reg_no` varchar(20) NOT NULL,
  `bus_name` varchar(10) NOT NULL,
  `type_id` int(11) NOT NULL,
  `total_no_of_seats` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bus_details`
--

INSERT INTO `bus_details` (`bus_id`, `bus_reg_no`, `bus_name`, `type_id`, `total_no_of_seats`) VALUES
(6, '19-ka-2002', 'APM', 5, 32),
(7, '22-ka-2045', 'sugama', 13, 36),
(12, '22-ka-2084', 'KSRTC', 13, 28),
(13, '22-ka-1096', 'sugama-2', 13, 28),
(14, '22-ka-809', 'APM-2', 5, 28);

-- --------------------------------------------------------

--
-- Table structure for table `bus_type`
--

CREATE TABLE `bus_type` (
  `type_id` int(11) NOT NULL,
  `bus_type` varchar(20) NOT NULL,
  `t_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bus_type`
--

INSERT INTO `bus_type` (`type_id`, `bus_type`, `t_price`) VALUES
(5, 'ac sleeper', 600),
(13, 'non-ac sleeper', 500),
(18, 'ac non-sleeper', 500);

--
-- Triggers `bus_type`
--
DELIMITER $$
CREATE TRIGGER `min_itype_price` BEFORE INSERT ON `bus_type` FOR EACH ROW BEGIN 
    IF NEW.t_price < 500 THEN 
        SET NEW.t_price = 500; 
    END IF; 
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `min_utype_price` BEFORE UPDATE ON `bus_type` FOR EACH ROW BEGIN 
    IF NEW.t_price < 500 THEN 
        SET NEW.t_price = 500; 
    END IF; 
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `payment_id` varchar(40) NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `payment_id`, `user_id`, `amount`) VALUES
(3, '26266', 1, 1300),
(4, '50466', 1, 1000),
(5, '80790', 1, 1150);

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `res_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `bus_name` varchar(20) NOT NULL,
  `source` varchar(20) NOT NULL,
  `destination` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `seat_id` varchar(4) NOT NULL,
  `amount` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`res_id`, `user_id`, `bus_name`, `source`, `destination`, `date`, `time`, `seat_id`, `amount`) VALUES
(3, 1, 'APM', 'kundapura', 'banglore', '2023-02-01', '09:26:59', 'A1', 1000),
(35, 2, 'KSRTC', 'kundapura', 'banglore', '2023-02-10', '22:02:00', 'D1', 1500),
(38, 1, 'KSRTC', 'banglore', 'kundapura', '2023-02-08', '02:57:00', 'A1', 1300),
(39, 2, 'APM-2', 'kundapura', 'banglore', '2023-02-08', '20:00:00', 'B2', 1200),
(40, 2, 'APM-2', 'kundapura', 'banglore', '2023-02-08', '20:00:00', 'B2', 1200),
(43, 1, 'KSRTC', 'banglore', 'kundapura', '2023-02-08', '02:57:00', 'B1', 1300),
(44, 1, 'sugama-2', 'kundapura', 'banglore', '2023-02-08', '20:05:00', 'D7', 1000),
(45, 1, 'APM', 'kundapura', 'banglore', '2023-02-05', '16:20:00', 'D1', 1150);

-- --------------------------------------------------------

--
-- Table structure for table `route_details`
--

CREATE TABLE `route_details` (
  `route_id` int(11) NOT NULL,
  `source` varchar(20) NOT NULL,
  `destination` varchar(20) NOT NULL,
  `r_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `route_details`
--

INSERT INTO `route_details` (`route_id`, `source`, `destination`, `r_price`) VALUES
(5, 'kundapura', 'banglore', 550),
(14, 'banglore', 'kundapura', 500),
(15, 'kundapura', 'mysore', 600),
(16, 'mysore', 'kundapura', 600),
(17, 'moodlekatte', 'banglore', 500);

--
-- Triggers `route_details`
--
DELIMITER $$
CREATE TRIGGER `min_iroute_price` BEFORE INSERT ON `route_details` FOR EACH ROW BEGIN 
    IF NEW.r_price < 500 THEN 
        SET NEW.r_price = 500; 
    END IF; 
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `min_uroute_type` BEFORE UPDATE ON `route_details` FOR EACH ROW BEGIN 
    IF NEW.r_price < 500 THEN 
        SET NEW.r_price = 500; 
    END IF; 
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `schedule_id` int(11) NOT NULL,
  `bus_id` int(11) NOT NULL,
  `route_id` int(11) NOT NULL,
  `dep_date` date NOT NULL,
  `dep_time` time NOT NULL,
  `total_amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`schedule_id`, `bus_id`, `route_id`, `dep_date`, `dep_time`, `total_amount`) VALUES
(65, 12, 14, '2023-02-08', '02:57:00', 1300),
(66, 7, 14, '2023-02-08', '03:58:00', 1300),
(67, 14, 5, '2023-02-08', '20:00:00', 1200),
(68, 13, 5, '2023-02-08', '20:05:00', 1000);

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `user_id` int(11) NOT NULL,
  `email_id` varchar(30) NOT NULL,
  `pass` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `mobile_no` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`user_id`, `email_id`, `pass`, `username`, `mobile_no`) VALUES
(1, 'prathwik@gmail.com', 'prathwik2318', 'prathwik', '9019736866'),
(2, 'prathwik123@gamil.com', 'prathwik2318', 'levi ackerman', '9019736866'),
(5, 'prathwik124@gamil.com', 'prathwik2318', 'virat', '9019736866');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_details`
--
ALTER TABLE `admin_details`
  ADD PRIMARY KEY (`Email_id`);

--
-- Indexes for table `bus_details`
--
ALTER TABLE `bus_details`
  ADD PRIMARY KEY (`bus_id`),
  ADD KEY `bus_details_ibfk_1` (`type_id`);

--
-- Indexes for table `bus_type`
--
ALTER TABLE `bus_type`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`res_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `route_details`
--
ALTER TABLE `route_details`
  ADD PRIMARY KEY (`route_id`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`schedule_id`),
  ADD KEY `bus_id` (`bus_id`),
  ADD KEY `schedule_ibfk_2` (`route_id`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bus_details`
--
ALTER TABLE `bus_details`
  MODIFY `bus_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `bus_type`
--
ALTER TABLE `bus_type`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `res_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `route_details`
--
ALTER TABLE `route_details`
  MODIFY `route_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `schedule_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bus_details`
--
ALTER TABLE `bus_details`
  ADD CONSTRAINT `bus_details_ibfk_1` FOREIGN KEY (`type_id`) REFERENCES `bus_type` (`type_id`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_details` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_details` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `schedule`
--
ALTER TABLE `schedule`
  ADD CONSTRAINT `schedule_ibfk_1` FOREIGN KEY (`bus_id`) REFERENCES `bus_details` (`bus_id`),
  ADD CONSTRAINT `schedule_ibfk_2` FOREIGN KEY (`route_id`) REFERENCES `route_details` (`route_id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
