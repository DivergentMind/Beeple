-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2018 at 05:13 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `beeple_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `beeple_table`
--

CREATE TABLE `beeple_table` (
  `ID` int(11) NOT NULL,
  `HiveID` varchar(255) COLLATE utf8_bin NOT NULL,
  `Date` date NOT NULL,
  `Worker` varchar(255) COLLATE utf8_bin NOT NULL,
  `Loc` varchar(255) COLLATE utf8_bin NOT NULL,
  `NumOfDeeps` int(11) NOT NULL,
  `NumOfMediums` int(11) NOT NULL,
  `NumOfShallows` int(11) NOT NULL,
  `Temperament` varchar(11) COLLATE utf8_bin NOT NULL,
  `QueenSeen` varchar(11) COLLATE utf8_bin NOT NULL,
  `LayingPattern` varchar(11) COLLATE utf8_bin NOT NULL,
  `NumbBroodFrames` tinyint(4) NOT NULL,
  `EggsSeen` varchar(11) COLLATE utf8_bin NOT NULL,
  `EggComments` text COLLATE utf8_bin NOT NULL,
  `Population` tinyint(11) NOT NULL,
  `Crowded` varchar(11) COLLATE utf8_bin NOT NULL,
  `HoneyStores` varchar(11) COLLATE utf8_bin NOT NULL,
  `PollenStores` varchar(11) COLLATE utf8_bin NOT NULL,
  `MiteCheck` varchar(11) COLLATE utf8_bin NOT NULL,
  `SamplingMethod` varchar(11) COLLATE utf8_bin NOT NULL,
  `MiteCount` int(11) NOT NULL,
  `MiteTreat` varchar(11) COLLATE utf8_bin NOT NULL,
  `MiteTreatType` varchar(255) COLLATE utf8_bin NOT NULL,
  `MiteTreatOtherText` text COLLATE utf8_bin NOT NULL,
  `TreatRemoveDate` date NOT NULL,
  `OtherProbs` varchar(255) COLLATE utf8_bin NOT NULL,
  `OtherProbOtherText` text COLLATE utf8_bin NOT NULL,
  `OtherProbTreat` text COLLATE utf8_bin NOT NULL,
  `OtherProbComments` text COLLATE utf8_bin NOT NULL,
  `Dead` varchar(11) COLLATE utf8_bin NOT NULL,
  `DeadComments` text COLLATE utf8_bin NOT NULL,
  `GenComments` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `beeple_table`
--

INSERT INTO `beeple_table` (`ID`, `HiveID`, `Date`, `Worker`, `Loc`, `NumOfDeeps`, `NumOfMediums`, `NumOfShallows`, `Temperament`, `QueenSeen`, `LayingPattern`, `NumbBroodFrames`, `EggsSeen`, `EggComments`, `Population`, `Crowded`, `HoneyStores`, `PollenStores`, `MiteCheck`, `SamplingMethod`, `MiteCount`, `MiteTreat`, `MiteTreatType`, `MiteTreatOtherText`, `TreatRemoveDate`, `OtherProbs`, `OtherProbOtherText`, `OtherProbTreat`, `OtherProbComments`, `Dead`, `DeadComments`, `GenComments`) VALUES
(1, '000', '2018-05-04', 'Me', 'Blackfoot, id', 0, 2, 0, 'Calm', 'No', 'Beaut', 0, 'Yes', '', 0, 'No', 'Fine', 'Fine', 'No', 'NA', 0, 'No', 'NA', '', '0000-00-00', '', '', '', '', 'No', '', ''),
(2, '000', '2018-05-05', 'Jordan and Jessie', 'Blackfoot, Id', 0, 2, 0, 'Calm', 'Yes', 'Beaut', 0, 'Yes', '', 0, 'No', 'Fine', 'Fine', 'No', 'NA', 0, 'No', 'NA', '', '0000-00-00', '', '', '', '', 'No', '', ''),
(3, '000', '2018-05-09', 'Jordan', 'Blackfoot, ID', 0, 3, 0, 'Calm', 'Yes', 'Beaut', 0, 'Yes', '', 0, 'No', 'Fine', 'Fine', 'Yes', 'Sugar', 0, 'No', 'NA', '', '0000-00-00', '', '', '', '', 'No', '', 'Maybe ready to split in a few weeks.'),
(10, 'blah', '0000-00-00', '', '', 0, 0, 0, 'NA', 'No', '0', 0, 'No', '', 0, 'No', 'NA', 'NA', 'No', 'NA', 0, 'No', 'NA', '', '0000-00-00', 'a:1:{i:0;s:2:\"NA\";}', '', '', '', 'No', '', ''),
(11, '000', '2018-05-13', 'Jordan', 'Blackfoot, ID', 0, 3, 0, 'NA', 'Yes', '0', 0, 'Yes', '', 0, 'No', 'NA', 'NA', 'No', 'NA', 0, 'No', 'NA', '', '0000-00-00', 'a:1:{i:0;s:2:\"NA\";}', '', '', '', 'No', '', 'Making brood - getting ready to split'),
(12, 'Blagh', '0000-00-00', 'lskfg', 'asdfgh', 0, 2, 0, 'NA', 'Yes', 'NA', 0, 'No', 'empty', 5, 'No', 'NA', 'NA', 'No', 'NA', 0, 'No', 'NA', '', '0000-00-00', 'a:2:{i:0;s:3:\"Nos\";i:1;s:2:\"NA\";}', '', '', '', 'No', '', 'Delete me');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `beeple_table`
--
ALTER TABLE `beeple_table`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `beeple_table`
--
ALTER TABLE `beeple_table`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
