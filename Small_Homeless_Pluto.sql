-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 04, 2017 at 04:17 AM
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

--
-- Dumping data for table `Asteroid`
--

INSERT INTO `Asteroid` (`AName`, `Member of AB`, `Asteroid Number`) VALUES
('Ceres', 1, 1),
('Palma', 0, 372),
('Pallas', 1, 2),
('Vesta', 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `Celestial Body`
--

CREATE TABLE `Celestial Body` (
  `Name` varchar(15) NOT NULL,
  `Gravity` float DEFAULT NULL,
  `Mass` float DEFAULT NULL,
  `Diameter` int(11) DEFAULT NULL,
  `Date Discovered` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Celestial Body`
--

INSERT INTO `Celestial Body` (`Name`, `Gravity`, `Mass`, `Diameter`, `Date Discovered`) VALUES
('Ceres', 0.6, 1794, 946, '1801-01-01'),
('Earth', 9.8, 6, 7918, '0001-01-01'),
('Io', 1.796, 0.08932, 3643, '1610-05-09'),
('Jupiter', 24.79, 18.986, 139822, '1610-01-10'),
('Mars', 3.711, 0.64171, 6779, '1659-03-18'),
('Moon', 1.62, 0.07342, 3434, '0001-01-01'),
('Pallas', 1.36, 1037, 512, '1802-03-28'),
('Palma', 0.04, 984, 189, '1893-08-19'),
('Sun', 274, 100000, 1391400, '0001-01-01'),
('Venus', 8.87, 4.8675, 12203, '1610-10-07'),
('Vesta', 0.94, 804, 525, '1807-03-29');

-- --------------------------------------------------------

--
-- Table structure for table `Composition`
--

CREATE TABLE `Composition` (
  `Name` varchar(15) NOT NULL,
  `Substance` varchar(15) NOT NULL,
  `Percent` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Composition`
--

INSERT INTO `Composition` (`Name`, `Substance`, `Percent`) VALUES
('Earth', 'Argon', 0.93),
('Earth', 'Nitrogen', 78.08),
('Earth', 'Oxygen', 20.95),
('Io', 'Sulfur Dioxide', 90),
('Jupiter', 'Helium', 10.2),
('Jupiter', 'Hydrogen', 89.8),
('Jupiter', 'Methane', 0.3),
('Mars', 'Argon', 1.93),
('Mars', 'Carbon Dioxide', 95.97),
('Mars', 'Nitrogen', 1.89),
('Moon', 'Aluminum', 3),
('Moon', 'Calcium', 3),
('Moon', 'Iron', 10),
('Moon', 'Magnesium', 19),
('Moon', 'Oxygen', 43),
('Moon', 'Silicon', 20),
('Sun', 'Helium', 8.7),
('Sun', 'Hydrogen', 91.2),
('Venus', 'Carbon Dioxide', 96.5),
('Venus', 'Nitrogen', 3.5);

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

--
-- Dumping data for table `Meteor`
--

INSERT INTO `Meteor` (`MeteorName`, `PName`, `Date`, `Struck Surface`) VALUES
('Palma', 'Earth', '1957-04-27', 1);

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

--
-- Dumping data for table `Moon`
--

INSERT INTO `Moon` (`MName`, `PName`, `Moon Number`, `Orbit Distance`, `Orbit Time`) VALUES
('Io', 'Jupiter', 2, 422000, 1.769),
('Moon', 'Earth', 1, 385000, 27);

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
  `Average Surface Temp` int(11) DEFAULT NULL,
  `SName` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Planet`
--

INSERT INTO `Planet` (`PName`, `Dwarf Planet`, `Planet Number`, `Population`, `Orbit Distance`, `Year Length`, `Average Surface Temp`, `SName`) VALUES
('Earth', 0, 1, 7000, 150, 1, 16, 'Sun'),
('Jupiter', 0, 4, 0, 778, 4332.59, 165, 'Sun'),
('Mars', 0, 2, 0, 288, 687, -63, 'Sun'),
('Venus', 0, 3, 0, 108, 225, 462, 'Sun');

-- --------------------------------------------------------

--
-- Table structure for table `Star`
--

CREATE TABLE `Star` (
  `SName` varchar(15) NOT NULL,
  `Surface Temp` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Star`
--

INSERT INTO `Star` (`SName`, `Surface Temp`) VALUES
('Sun', 5778);

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
  ADD PRIMARY KEY (`PName`),
  ADD KEY `Planet_Star` (`SName`);

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
  ADD CONSTRAINT `Moon_Name` FOREIGN KEY (`MName`) REFERENCES `Celestial Body` (`Name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Moon_Planet` FOREIGN KEY (`PName`) REFERENCES `Planet` (`PName`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Planet`
--
ALTER TABLE `Planet`
  ADD CONSTRAINT `Planet_Name` FOREIGN KEY (`PName`) REFERENCES `Celestial Body` (`Name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Planet_Star` FOREIGN KEY (`SName`) REFERENCES `Star` (`SName`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Star`
--
ALTER TABLE `Star`
  ADD CONSTRAINT `Star_Name` FOREIGN KEY (`SName`) REFERENCES `Celestial Body` (`Name`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
