-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 26, 2024 at 09:43 PM
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
-- Database: `resit_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `Booking_ID` int(11) NOT NULL,
  `Movie_ID` int(11) NOT NULL,
  `UserName` varchar(50) NOT NULL,
  `Zone` varchar(50) NOT NULL,
  `DateOfBooking` date NOT NULL,
  `NumberOfSeats` int(11) NOT NULL,
  `Approved` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`Booking_ID`, `Movie_ID`, `UserName`, `Zone`, `DateOfBooking`, `NumberOfSeats`, `Approved`) VALUES
(1, 1, 'test1', 'A', '2024-04-21', 2, 1),
(2, 6, 'test1', 'A', '2024-04-22', 4, 1),
(3, 4, 'test1', 'C', '2024-04-16', 4, 1),
(4, 4, 'giorgos', 'B', '2024-04-03', 3, 1),
(5, 4, 'test1', 'B', '2024-04-09', 2, 1),
(6, 3, 'test1', 'B', '2024-04-02', 2, 1),
(7, 3, 'test1', 'B', '2024-04-10', 6, 1),
(8, 3, 'test1', 'C', '2024-04-10', 5, 1),
(9, 2, 'test1', 'B', '2024-04-26', 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `Movie_ID` int(11) NOT NULL,
  `Movie_Name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`Movie_ID`, `Movie_Name`) VALUES
(1, 'BARBIE 1'),
(2, 'BARBIE 2'),
(3, 'MEAN GIRLS'),
(4, 'TOP GUN'),
(5, 'DUNE'),
(6, 'DUNE 2');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserName` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `ISAdmin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserName`, `Password`, `ISAdmin`) VALUES
('Admin', '1', 1),
('angela', '12345', 0),
('distef', 'babas123', 0),
('ff', 'gg', 0),
('ff1', 'ggggg', 0),
('giorgos', '2', 0),
('kali', 'kali', 0),
('kallia', 'p1234', 1),
('kallia1', '1', 0),
('kalliopi', 'kal', 0),
('lambis', 'kkkkk', 0),
('love', '12', 0),
('love2', '2', 0),
('test', '1', 0),
('test1', '1', 0),
('test2', '2', 0),
('test3', '3', 0),
('totos', 'totos', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`Booking_ID`);

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`Movie_ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserName`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `Booking_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `Movie_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
