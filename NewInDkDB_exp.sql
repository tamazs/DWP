-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 11, 2022 at 02:07 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `NewInDkDB`
--

-- --------------------------------------------------------

--
-- Table structure for table `Location`
--

CREATE TABLE `Location` (
  `postalCode` int(4) NOT NULL,
  `city` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Location`
--

INSERT INTO `Location` (`postalCode`, `city`) VALUES
(6700, 'Esbjerg');

-- --------------------------------------------------------

--
-- Table structure for table `Media`
--

CREATE TABLE `Media` (
  `mediaID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `Post`
--

CREATE TABLE `Post` (
  `postID` int(11) NOT NULL,
  `like` int(11) DEFAULT NULL,
  `typeID` int(4) NOT NULL,
  `mediaID` int(11) DEFAULT NULL,
  `text` varchar(255) NOT NULL,
  `timeStamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `PostHasMedia`
--

CREATE TABLE `PostHasMedia` (
  `mediaID` int(11) NOT NULL,
  `postID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `Role`
--

CREATE TABLE `Role` (
  `roleID` int(2) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Role`
--

INSERT INTO `Role` (`roleID`, `role`) VALUES
(1, 'user'),
(2, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `Type`
--

CREATE TABLE `Type` (
  `typeID` int(4) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Type`
--

INSERT INTO `Type` (`typeID`, `type`) VALUES
(1, 'post'),
(2, 'comment'),
(3, 'question'),
(4, 'answer');

-- --------------------------------------------------------

--
-- Table structure for table `User`
--

CREATE TABLE `User` (
  `userID` int(11) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `userName` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `roleID` int(2) NOT NULL,
  `postalCode` int(4) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `origin` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `User`
--

INSERT INTO `User` (`userID`, `firstName`, `lastName`, `userName`, `email`, `password`, `roleID`, `postalCode`, `description`, `origin`) VALUES
(8, 'Tamás', 'Major', 'tamas', 'majortamas313@gmail.com', '$2y$10$7Drb319qKLfAD0cxMw1tLuoGQQ2gVTXPENaMTj/7dfutP.EhY6aSe', 1, 6700, NULL, 'Esbjerg'),
(9, 'jozsi', 'punkosd', 'jozsi', 'jozsi@gmail.com', '$2y$10$zaymFo2Ph/Ukgfs5MUYlIeC9j2S5dMTbYB9AEKvqpHSSfzITp0rPy', 1, 6700, NULL, 'cigany'),
(10, 'test', 'test2', 'test3', 'asd@gmail.com', '$2y$10$SDC3bVHbqMYVvxbpEReWbu.Rrtd9tKgQolbArO/qklVceJag7gwX2', 1, 6700, NULL, 'asd');

-- --------------------------------------------------------

--
-- Table structure for table `UserHasPost`
--

CREATE TABLE `UserHasPost` (
  `userID` int(11) NOT NULL,
  `postID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Location`
--
ALTER TABLE `Location`
  ADD PRIMARY KEY (`postalCode`);

--
-- Indexes for table `Media`
--
ALTER TABLE `Media`
  ADD PRIMARY KEY (`mediaID`);

--
-- Indexes for table `Post`
--
ALTER TABLE `Post`
  ADD PRIMARY KEY (`postID`),
  ADD KEY `typeID` (`typeID`),
  ADD KEY `mediaID` (`mediaID`);

--
-- Indexes for table `PostHasMedia`
--
ALTER TABLE `PostHasMedia`
  ADD PRIMARY KEY (`mediaID`,`postID`),
  ADD KEY `postID` (`postID`);

--
-- Indexes for table `Role`
--
ALTER TABLE `Role`
  ADD PRIMARY KEY (`roleID`);

--
-- Indexes for table `Type`
--
ALTER TABLE `Type`
  ADD PRIMARY KEY (`typeID`);

--
-- Indexes for table `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`userID`),
  ADD KEY `roleID` (`roleID`),
  ADD KEY `postalCode` (`postalCode`);

--
-- Indexes for table `UserHasPost`
--
ALTER TABLE `UserHasPost`
  ADD PRIMARY KEY (`userID`,`postID`),
  ADD KEY `postID` (`postID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Media`
--
ALTER TABLE `Media`
  MODIFY `mediaID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Post`
--
ALTER TABLE `Post`
  MODIFY `postID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `User`
--
ALTER TABLE `User`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Post`
--
ALTER TABLE `Post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`typeID`) REFERENCES `Type` (`typeID`),
  ADD CONSTRAINT `post_ibfk_2` FOREIGN KEY (`mediaID`) REFERENCES `Media` (`mediaID`);

--
-- Constraints for table `PostHasMedia`
--
ALTER TABLE `PostHasMedia`
  ADD CONSTRAINT `posthasmedia_ibfk_1` FOREIGN KEY (`mediaID`) REFERENCES `Media` (`mediaID`),
  ADD CONSTRAINT `posthasmedia_ibfk_2` FOREIGN KEY (`postID`) REFERENCES `Post` (`postID`);

--
-- Constraints for table `User`
--
ALTER TABLE `User`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`roleID`) REFERENCES `Role` (`roleID`),
  ADD CONSTRAINT `user_ibfk_2` FOREIGN KEY (`postalCode`) REFERENCES `Location` (`postalCode`);

--
-- Constraints for table `UserHasPost`
--
ALTER TABLE `UserHasPost`
  ADD CONSTRAINT `userhaspost_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `User` (`userID`),
  ADD CONSTRAINT `userhaspost_ibfk_2` FOREIGN KEY (`postID`) REFERENCES `Post` (`postID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
