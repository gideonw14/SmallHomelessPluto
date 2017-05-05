-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 05, 2017 at 06:33 AM
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

--
-- Dumping data for table `asteroid`
--

INSERT INTO `asteroid` (`AName`, `SName`, `Member of AB`, `Asteroid Number`) VALUES
('Ceres', 'Sun', 1, 1),
('Palma', 'Sun', 0, 372),
('Pallas', 'Sun', 1, 2),
('Vesta', 'Sun', 1, 4);

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

--
-- Dumping data for table `celestial body`
--

INSERT INTO `celestial body` (`Name`, `Gravity`, `Mass`, `Diameter`, `Date Discovered`) VALUES
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
-- Table structure for table `composition`
--

CREATE TABLE `composition` (
  `Name` varchar(15) NOT NULL,
  `Substance` varchar(15) NOT NULL,
  `Percent` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `composition`
--

INSERT INTO `composition` (`Name`, `Substance`, `Percent`) VALUES
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
-- Table structure for table `meteor`
--

CREATE TABLE `meteor` (
  `MeteorName` varchar(15) NOT NULL,
  `PName` varchar(15) NOT NULL,
  `Date` date DEFAULT NULL,
  `Struck Surface` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `meteor`
--

INSERT INTO `meteor` (`MeteorName`, `PName`, `Date`, `Struck Surface`) VALUES
('Palma', 'Earth', '1957-04-27', 1);

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

--
-- Dumping data for table `moon`
--

INSERT INTO `moon` (`MName`, `PName`, `Moon Number`, `Orbit Distance`, `Orbit Time`) VALUES
('Io', 'Jupiter', 2, 422000, 1.769),
('Moon', 'Earth', 1, 385000, 27);

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

--
-- Dumping data for table `planet`
--

INSERT INTO `planet` (`PName`, `Dwarf Planet`, `Planet Number`, `Population`, `Orbit Distance`, `Year Length`, `Average Surface Temp`, `SName`) VALUES
('Earth', 0, 1, 7000, 150, 1, 16, 'Sun'),
('Jupiter', 0, 4, 0, 778, 4332.59, 165, 'Sun'),
('Mars', 0, 2, 0, 288, 687, -63, 'Sun'),
('Venus', 0, 3, 0, 108, 225, 462, 'Sun');

-- --------------------------------------------------------

--
-- Table structure for table `star`
--

CREATE TABLE `star` (
  `SName` varchar(15) NOT NULL,
  `Surface Temp` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `star`
--

INSERT INTO `star` (`SName`, `Surface Temp`) VALUES
('Sun', 5778);

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
-- Indexes for table `composition`
--
ALTER TABLE `composition`
  ADD PRIMARY KEY (`Name`,`Substance`);

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
  ADD CONSTRAINT `Ast_Name` FOREIGN KEY (`AName`) REFERENCES `celestial body` (`Name`),
  ADD CONSTRAINT `asteroid_ibfk_1` FOREIGN KEY (`SName`) REFERENCES `star` (`SName`);

--
-- Constraints for table `composition`
--
ALTER TABLE `composition`
  ADD CONSTRAINT `Comp_Name` FOREIGN KEY (`Name`) REFERENCES `celestial body` (`Name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `meteor`
--
ALTER TABLE `meteor`
  ADD CONSTRAINT `Meteor_Name` FOREIGN KEY (`MeteorName`) REFERENCES `celestial body` (`Name`) ON DELETE CASCADE ON UPDATE CASCADE,
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
  ADD CONSTRAINT `Star_Name` FOREIGN KEY (`SName`) REFERENCES `celestial body` (`Name`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
