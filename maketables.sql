-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2017 at 12:17 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `solarsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `asteroid`
--

CREATE TABLE `asteroid` (
  `AName` varchar(15) NOT NULL,
  `SName` varchar(15) NOT NULL,
  `Member of AB` tinyint(1) DEFAULT NULL,
  `Asteroid Number` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `celestial body`
--

CREATE TABLE `celestial body` (
  `Name` varchar(15) NOT NULL,
  `Gravity` float DEFAULT NULL,
  `Mass` float DEFAULT NULL,
  `Diameter` int(11) DEFAULT NULL,
  `Date Discovered` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `meteor`
--

CREATE TABLE `meteor` (
  `MeteorName` varchar(15) NOT NULL,
  `PName` varchar(15) NOT NULL,
  `Date` date DEFAULT NULL,
  `Struck Surface` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `moon`
--

CREATE TABLE `moon` (
  `MName` varchar(15) NOT NULL,
  `PName` varchar(15) NOT NULL,
  `Moon Number` int(11) DEFAULT NULL,
  `Orbit Distance` float DEFAULT NULL,
  `Orbit Time` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `planet`
--

CREATE TABLE `planet` (
  `PName` varchar(15) NOT NULL,
  `Dwarf Planet` tinyint(1) DEFAULT NULL,
  `Planet Number` int(11) DEFAULT NULL,
  `Population` int(11) DEFAULT NULL,
  `Orbit Distance` float DEFAULT NULL,
  `Year Length` float DEFAULT NULL,
  `Average Surface Temp` int(11) DEFAULT NULL,
  `SName` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `star`
--

CREATE TABLE `star` (
  `SName` varchar(15) NOT NULL,
  `Surface Temp` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `accesslevel` varchar(25) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`, `accesslevel`) VALUES
('root', '', 'Admin'),
('Astronomer1', 'ilikespace', 'Admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `asteroid`
--
ALTER TABLE `asteroid`
  ADD KEY `Ast_Name` (`AName`),
  ADD KEY `SName` (`SName`);

--
-- Indexes for table `celestial body`
--
ALTER TABLE `celestial body`
  ADD PRIMARY KEY (`Name`);

--
-- Indexes for table `meteor`
--
ALTER TABLE `meteor`
  ADD PRIMARY KEY (`MeteorName`),
  ADD KEY `Meteor_Planet` (`PName`);

--
-- Indexes for table `moon`
--
ALTER TABLE `moon`
  ADD PRIMARY KEY (`MName`),
  ADD KEY `Moon_Planet` (`PName`);

--
-- Indexes for table `planet`
--
ALTER TABLE `planet`
  ADD PRIMARY KEY (`PName`),
  ADD KEY `Planet_Star` (`SName`);

--
-- Indexes for table `star`
--
ALTER TABLE `star`
  ADD PRIMARY KEY (`SName`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `asteroid`
--
ALTER TABLE `asteroid`
  ADD CONSTRAINT `Ast_Name` FOREIGN KEY (`AName`) REFERENCES `celestial body` (`Name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `asteroid_ibfk_1` FOREIGN KEY (`SName`) REFERENCES `star` (`SName`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `meteor`
--
ALTER TABLE `meteor`
  ADD CONSTRAINT `Meteor_Name` FOREIGN KEY (`MeteorName`) REFERENCES `asteroid` (`AName`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Meteor_Planet` FOREIGN KEY (`PName`) REFERENCES `planet` (`PName`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `moon`
--
ALTER TABLE `moon`
  ADD CONSTRAINT `Moon_Name` FOREIGN KEY (`MName`) REFERENCES `celestial body` (`Name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Moon_Planet` FOREIGN KEY (`PName`) REFERENCES `planet` (`PName`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `planet`
--
ALTER TABLE `planet`
  ADD CONSTRAINT `Planet_Name` FOREIGN KEY (`PName`) REFERENCES `celestial body` (`Name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Planet_Star` FOREIGN KEY (`SName`) REFERENCES `star` (`SName`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `star`
--
ALTER TABLE `star`
  ADD CONSTRAINT `Star_Name` FOREIGN KEY (`SName`) REFERENCES `celestial body` (`Name`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
