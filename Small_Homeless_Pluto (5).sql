-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 29, 2017 at 05:35 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Small Homeless Pluto`
--

-- --------------------------------------------------------

--
-- Table structure for table `Asteroid`
--

CREATE TABLE `Asteroid` (
  `AName` varchar(15) NOT NULL,
  `Member of AB` tinyint(1) DEFAULT NULL,
  `Asteroid Number` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Celestial Body`
--

CREATE TABLE `Celestial Body` (
  `Name` varchar(15) NOT NULL,
  `Gravity` float DEFAULT NULL,
  `Mass` int(11) DEFAULT NULL,
  `Diameter` int(11) DEFAULT NULL,
  `Date Discovered` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Composition`
--

CREATE TABLE `Composition` (
  `Name` varchar(15) NOT NULL,
  `Substance` varchar(15) NOT NULL,
  `Percent` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Meteor`
--

CREATE TABLE `Meteor` (
  `MeteorName` varchar(15) NOT NULL,
  `PName` varchar(15) NOT NULL,
  `Date` date DEFAULT NULL,
  `Struck Surface` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Moon`
--

CREATE TABLE `Moon` (
  `MName` varchar(15) NOT NULL,
  `PName` varchar(15) NOT NULL,
  `Moon Number` int(11) DEFAULT NULL,
  `Orbit Distance` float DEFAULT NULL,
  `Orbit Time` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Planet`
--

CREATE TABLE `Planet` (
  `PName` varchar(15) NOT NULL,
  `Dwarf Planet` tinyint(1) DEFAULT NULL,
  `Planet Number` int(11) DEFAULT NULL,
  `Population` int(11) DEFAULT NULL,
  `Orbit Distance` float DEFAULT NULL,
  `Year Length` float DEFAULT NULL,
  `Surface Temp Day` float DEFAULT NULL,
  `Surface Temp Night` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Star`
--

CREATE TABLE `Star` (
  `SName` varchar(15) NOT NULL,
  `Surface Temp` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Asteroid`
--
ALTER TABLE `Asteroid`
  ADD KEY `Ast_Name` (`AName`);

--
-- Indexes for table `Celestial Body`
--
ALTER TABLE `Celestial Body`
  ADD PRIMARY KEY (`Name`);

--
-- Indexes for table `Composition`
--
ALTER TABLE `Composition`
  ADD PRIMARY KEY (`Name`,`Substance`);

--
-- Indexes for table `Meteor`
--
ALTER TABLE `Meteor`
  ADD PRIMARY KEY (`MeteorName`),
  ADD KEY `Meteor_Planet` (`PName`);

--
-- Indexes for table `Moon`
--
ALTER TABLE `Moon`
  ADD PRIMARY KEY (`MName`),
  ADD KEY `Moon_Planet` (`PName`);

--
-- Indexes for table `Planet`
--
ALTER TABLE `Planet`
  ADD PRIMARY KEY (`PName`);

--
-- Indexes for table `Star`
--
ALTER TABLE `Star`
  ADD PRIMARY KEY (`SName`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Asteroid`
--
ALTER TABLE `Asteroid`
  ADD CONSTRAINT `Ast_Name` FOREIGN KEY (`AName`) REFERENCES `Celestial Body` (`Name`);

--
-- Constraints for table `Composition`
--
ALTER TABLE `Composition`
  ADD CONSTRAINT `Comp_Name` FOREIGN KEY (`Name`) REFERENCES `Celestial Body` (`Name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Meteor`
--
ALTER TABLE `Meteor`
  ADD CONSTRAINT `Meteor_Name` FOREIGN KEY (`MeteorName`) REFERENCES `Celestial Body` (`Name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Meteor_Planet` FOREIGN KEY (`PName`) REFERENCES `Planet` (`PName`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Moon`
--
ALTER TABLE `Moon`
  ADD CONSTRAINT `Moon_Planet` FOREIGN KEY (`PName`) REFERENCES `Planet` (`PName`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Planet`
--
ALTER TABLE `Planet`
  ADD CONSTRAINT `Planet_Name` FOREIGN KEY (`PName`) REFERENCES `Celestial Body` (`Name`);

--
-- Constraints for table `Star`
--
ALTER TABLE `Star`
  ADD CONSTRAINT `Star_Name` FOREIGN KEY (`SName`) REFERENCES `Celestial Body` (`Name`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
