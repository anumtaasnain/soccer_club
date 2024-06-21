-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 21, 2024 at 06:49 PM
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
-- Database: `soccer_club`
--

-- --------------------------------------------------------

--
-- Table structure for table `matches`
--

CREATE TABLE `matches` (
  `MatchID` int(11) NOT NULL,
  `MatchDate` date DEFAULT NULL,
  `MatchTime` time DEFAULT NULL,
  `Team1ID` int(11) DEFAULT NULL,
  `Team2ID` int(11) DEFAULT NULL,
  `Competition` varchar(100) DEFAULT NULL,
  `Stadium` varchar(100) DEFAULT NULL,
  `MatchStatus` enum('scheduled','completed') DEFAULT 'scheduled'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `matches`
--

INSERT INTO `matches` (`MatchID`, `MatchDate`, `MatchTime`, `Team1ID`, `Team2ID`, `Competition`, `Stadium`, `MatchStatus`) VALUES
(1, '2024-06-22', '14:34:00', 1, 3, 'soccers', 'newyork', ''),
(2, '2024-06-22', '14:34:00', 1, 1, 'soccers', 'newyork', ''),
(3, '2024-06-29', '12:54:00', 3, 1, 'soccer', 'pakistan lahore', 'scheduled'),
(4, '2024-06-29', '12:54:00', 3, 1, 'soccer', 'pakistan lahore', 'scheduled');

-- --------------------------------------------------------

--
-- Table structure for table `players`
--

CREATE TABLE `players` (
  `PlayerID` int(11) NOT NULL,
  `PlayerName` varchar(100) NOT NULL,
  `TeamID` int(11) DEFAULT NULL,
  `Position` varchar(50) DEFAULT NULL,
  `JerseyNumber` int(11) DEFAULT NULL,
  `DateOfBirth` date DEFAULT NULL,
  `Nationality` varchar(100) DEFAULT NULL,
  `Height` decimal(5,2) DEFAULT NULL,
  `Weight` decimal(5,2) DEFAULT NULL,
  `PlayerImageURL` varchar(255) DEFAULT NULL,
  `CareerStatistics` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`CareerStatistics`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `players`
--

INSERT INTO `players` (`PlayerID`, `PlayerName`, `TeamID`, `Position`, `JerseyNumber`, `DateOfBirth`, `Nationality`, `Height`, `Weight`, `PlayerImageURL`, `CareerStatistics`) VALUES
(1, 'messi', 1, '1st', 202, '2024-05-30', 'american', 5.60, 60.00, 'arrival-bg.jpg', NULL),
(2, 'ronaldo', 3, '2nd', 101, '2024-06-22', 'americam', 10.90, 200.00, 'pic-5.png', NULL),
(3, 'ronaldo', 3, '2nd', 101, '2024-06-22', 'americam', 10.90, 200.00, 'pic-5.png', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `pname` text NOT NULL,
  `pdesc` text NOT NULL,
  `pprice` text NOT NULL,
  `pqty` text NOT NULL,
  `pimage` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `pname`, `pdesc`, `pprice`, `pqty`, `pimage`) VALUES
(1, 'perfume', 'here is perfume', '1200', '19', '2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `teamID` int(11) NOT NULL,
  `teamName` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `coach` varchar(100) DEFAULT NULL,
  `foundedYear` date DEFAULT NULL,
  `logoURL` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`teamID`, `teamName`, `country`, `coach`, `foundedYear`, `logoURL`) VALUES
(1, 'Zimbabe', 'pakistan', 'pakistan', '2024-06-07', 'client.jpg'),
(3, 'America', 'argentenia', 'ronaldo', '2024-06-07', 'testimonial-2.jpg'),
(4, 'Austrailia', 'argentenia', 'ronaldo', '2024-06-07', 'testimonial-2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contactNumber` varchar(20) DEFAULT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `address` text DEFAULT NULL,
  `registrationDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `name`, `email`, `contactNumber`, `username`, `password`, `address`, `registrationDate`) VALUES
(1, 'rfay', 'rafay@gmail.com', '0315330757', 'rafay123', '1234', 'krachi', '2024-06-04 19:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `matches`
--
ALTER TABLE `matches`
  ADD PRIMARY KEY (`MatchID`),
  ADD KEY `Team1ID` (`Team1ID`),
  ADD KEY `Team2ID` (`Team2ID`);

--
-- Indexes for table `players`
--
ALTER TABLE `players`
  ADD PRIMARY KEY (`PlayerID`),
  ADD KEY `TeamID` (`TeamID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`teamID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `matches`
--
ALTER TABLE `matches`
  MODIFY `MatchID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `players`
--
ALTER TABLE `players`
  MODIFY `PlayerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `teamID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `matches`
--
ALTER TABLE `matches`
  ADD CONSTRAINT `matches_ibfk_1` FOREIGN KEY (`Team1ID`) REFERENCES `teams` (`teamID`),
  ADD CONSTRAINT `matches_ibfk_2` FOREIGN KEY (`Team2ID`) REFERENCES `teams` (`teamID`);

--
-- Constraints for table `players`
--
ALTER TABLE `players`
  ADD CONSTRAINT `players_ibfk_1` FOREIGN KEY (`TeamID`) REFERENCES `teams` (`teamID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
