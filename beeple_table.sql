-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 26, 2018 at 11:09 PM
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
  `QueenSeen` varchar(11) COLLATE utf8_bin NOT NULL,
  `LayingPattern` varchar(11) COLLATE utf8_bin NOT NULL,
  `NumbBroodFrames` tinyint(4) NOT NULL,
  `EggsSeen` varchar(11) COLLATE utf8_bin NOT NULL,
  `EggComments` mediumtext COLLATE utf8_bin NOT NULL,
  `Population` tinyint(11) NOT NULL,
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
  `GenComments` longtext COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `beeple_table`
--

INSERT INTO `beeple_table` (`ID`, `HiveID`, `Date`, `Worker`, `Loc`, `QueenSeen`, `LayingPattern`, `NumbBroodFrames`, `EggsSeen`, `EggComments`, `Population`, `HoneyStores`, `PollenStores`, `MiteCheck`, `SamplingMethod`, `MiteCount`, `MiteTreat`, `MiteTreatType`, `MiteTreatOtherText`, `TreatRemoveDate`, `OtherProbs`, `OtherProbOtherText`, `OtherProbTreat`, `OtherProbComments`, `Dead`, `DeadComments`, `GenComments`) VALUES
(1, '000', '2018-05-04', 'Me', 'Blackfoot, id', 'No', 'Beaut', 0, 'Yes', '', 0, 'Fine', 'Fine', 'No', 'NA', 0, 'No', 'NA', '', '0000-00-00', '', '', '', '', 'No', '', ''),
(2, '000', '2018-05-05', 'Jordan and Jessie', 'Blackfoot, Id', 'Yes', 'Beaut', 0, 'Yes', '', 0, 'Fine', 'Fine', 'No', 'NA', 0, 'No', 'NA', '', '0000-00-00', '', '', '', '', 'No', '', ''),
(3, '000', '2018-05-09', 'Jordan', 'Blackfoot, ID', 'Yes', 'Beaut', 0, 'Yes', '', 0, 'Fine', 'Fine', 'Yes', 'Sugar', 0, 'No', 'NA', '', '0000-00-00', '', '', '', '', 'No', '', 'Maybe ready to split in a few weeks.'),
(11, '000', '2018-05-13', 'Jordan', 'Blackfoot, ID', 'Yes', '0', 0, 'Yes', '', 0, 'NA', 'NA', 'No', 'NA', 0, 'No', 'NA', '', '0000-00-00', 'a:1:{i:0;s:2:\"NA\";}', '', '', '', 'No', '', 'Making brood - getting ready to split'),
(16, '000', '2018-05-19', 'Jordan', 'Blackfoot, ID', 'Yes', 'Beaut', 11, 'Yes', 'Queen in the bottom box', 17, 'Fine', 'Sparse', 'No', 'NA', 0, 'No', 'NA', '', '0000-00-00', 'a:1:{i:0;s:2:\"NA\";}', '', '', '', 'No', '', 'Ready to split. Needs to be fed both sugar and pollen'),
(17, '001', '2018-05-20', 'Jordan', 'Blackfoot, ID', 'Yes', 'Beaut', 3, 'Yes', 'Tiger striped queen', 6, 'Fine', 'Fine', 'No', 'NA', 0, 'No', 'NA', '', '0000-00-00', 'a:1:{i:0;s:2:\"NA\";}', '', '', '', 'No', '', 'Package installed may 12. Queen accepted. Treated with Oxalic acid.'),
(18, '002', '2018-05-20', 'Jordan', 'Blackfoot, ID', 'Yes', 'Beaut', 4, 'Yes', 'Black Queen', 7, 'Fine', 'Fine', 'No', 'NA', 0, 'No', 'NA', '', '0000-00-00', 'a:1:{i:0;s:2:\"NA\";}', '', '', '', 'No', '', 'Package installed may 12. Queen accepted. Treated with Oxalic acid.'),
(19, '000', '2018-05-21', 'Jordan', 'Blackfoot, ID', 'No', 'Beaut', 0, 'Yes', '', 0, 'Fine', 'Fine', 'No', 'NA', 0, 'No', 'NA', '', '0000-00-00', 'a:1:{i:0;s:2:\"NA\";}', '', '', '', 'No', '', 'Split hive. Moved old queen with 2 boxes.  '),
(20, '003', '2018-05-21', 'Jordan', 'Blackfoot, ID', 'Yes', 'Beaut', 7, 'Yes', 'Introduced a new mated queen.', 8, 'Fine', 'Fine', 'No', 'NA', 0, 'No', 'NA', '', '0000-00-00', 'a:1:{i:0;s:2:\"NA\";}', '', '', '', 'No', '', 'New split hive from hive# 000. '),
(22, '001', '2018-05-24', 'Jordan', 'Blackfoot, ID', 'No', 'Medio', 4, 'Yes', '', 6, 'Fine', 'Fine', 'No', 'NA', 0, 'No', 'NA', '', '0000-00-00', '', '', '', '', 'No', '', ''),
(23, '002', '2018-05-24', 'Jordan', 'Blackfoot, ID', 'Yes', 'Beaut', 7, 'Yes', '', 7, 'Fine', 'Fine', 'No', 'NA', 0, 'No', 'NA', '', '0000-00-00', '', '', '', '', 'No', '', 'Added box'),
(24, '003', '2018-05-24', 'Jordan', 'Blackfoot, ID', 'Yes', 'Beaut', 7, 'No', 'This is the split hive - recently installed a mated queen', 8, 'Fine', 'Fine', 'No', 'NA', 0, 'No', 'NA', '', '0000-00-00', '', '', '', '', 'No', '', 'Added box. fed suryp. Queen seems to be accepted but need to check on her soon.'),
(25, '003', '2018-05-26', 'Jordan', 'Blackfoot, ID', 'Yes', 'Beaut', 8, 'Yes', 'New queen, started laying. Chubby blonde.', 9, 'Sparse', 'Sparse', 'No', 'NA', 0, 'No', 'NA', '', '0000-00-00', '', '', '', '', 'No', '', 'Needs suryp and pollen patty.'),
(26, '001', '2018-05-26', 'Jordan', 'Blackfoot, ID', 'Yes', 'Beaut', 4, 'Yes', 'Queen moved to top box which is mostly empty.', 8, 'Fine', 'Fine', 'No', 'NA', 0, 'No', 'NA', '', '0000-00-00', '', '', '', '', 'No', '', 'Found a frame without foundation -- needs to be replaced. How did that even get in there?'),
(27, '002', '2018-05-26', 'Jordan', 'Blackfoot, ID', 'Yes', 'Beaut', 6, 'Yes', 'Queen moved to top box which is mostly empty.', 10, 'Fine', 'Fine', 'No', 'NA', 0, 'No', 'NA', '', '0000-00-00', '', '', '', '', 'No', '', ''),
(28, '000', '2018-05-27', 'Jordan', 'Blackfoot, ID', 'Yes', 'Beaut', 7, 'Yes', 'A bit more drone comb then is good. probably due to \"natural\" comb left over from the hippy days.', 11, 'Sparse', 'Fine', 'No', 'NA', 0, 'No', 'NA', '', '0000-00-00', '', '', '', '', 'No', '', 'Needs suryp.'),
(29, '000', '2018-05-31', 'Jordan', 'Blackfoot, ID', 'Yes', 'Beaut', 6, 'Yes', '', 11, 'Fine', 'Fine', 'No', 'NA', 0, 'No', 'NA', '', '0000-00-00', '', '', '', '', 'No', '', ''),
(30, '003', '2018-05-31', 'Jordan', 'Blackfoot, ID', 'Yes', 'Beaut', 6, 'Yes', '', 13, 'Fine', 'Fine', 'No', 'NA', 0, 'No', 'NA', '', '0000-00-00', '', '', '', '', 'No', '', ''),
(31, '002', '2018-05-31', 'Jordan', 'Blackfoot, ID', 'Yes', 'Beaut', 9, 'Yes', '', 12, 'Fine', 'Fine', 'No', 'NA', 0, 'No', 'NA', '', '0000-00-00', '', '', '', '', 'No', '', ''),
(32, '001', '2018-05-31', 'Jordan', 'Blackfoot, ID', 'No', 'Medio', 5, 'Yes', '', 11, 'Fine', 'Fine', 'No', 'NA', 0, 'No', 'NA', '', '0000-00-00', '', '', '', '', 'No', '', ''),
(33, '000', '2018-06-05', 'Jordan', 'Blackfoot, ID', 'Yes', 'Beaut', 7, 'Yes', '', 9, 'Sparse', 'Sparse', 'No', 'NA', 0, 'No', 'NA', '', '0000-00-00', '', '', '', '', 'No', '', 'Need to feed suryp'),
(34, '001', '2018-06-05', 'Jordan', 'Blackfoot, ID', 'Yes', 'Medio', 5, 'Yes', 'Found supresedure cell. Left it there - letting them re-queen.', 8, 'Sparse', 'Sparse', 'No', 'NA', 0, 'No', 'NA', '', '0000-00-00', '', '', '', '', 'No', '', 'Need to feed suryp'),
(35, '002', '2018-06-05', 'Jordan', 'Blackfoot, ID', 'Yes', 'Beaut', 9, 'Yes', '', 13, 'Sparse', 'Sparse', 'No', 'NA', 0, 'No', 'NA', '', '0000-00-00', '', '', '', '', 'No', '', 'Need to feed suryp, need to add box soon.'),
(36, '003', '2018-06-05', 'Jordan', 'Blackfoot, ID', 'Yes', 'Beaut', 7, 'Yes', 'Found swarm cell -- cut it out.', 14, 'Sparse', 'Sparse', 'No', 'NA', 0, 'No', 'NA', '', '0000-00-00', '', '', '', '', 'No', '', 'Need to feed suryp, need to add box soon.'),
(37, '000', '2018-06-24', 'Jordan', 'Blackfoot, ID', 'Yes', 'Beaut', 9, 'Yes', '', 12, 'Fine', 'Fine', 'Yes', 'Sugar', 0, 'No', 'NA', '', '0000-00-00', '', '', '', '', 'No', '', 'Not drawing out comb as fast as I\'d like -- consider feeding.'),
(38, '001', '2018-06-24', 'Jordan', 'Blackfoot, ID', 'No', 'Medio', 5, 'Yes', 'Needs requeening', 8, 'Fine', 'Fine', 'Yes', 'Sugar', 0, 'No', 'NA', '', '0000-00-00', '', '', '', '', 'No', '', ''),
(39, '002', '2018-06-24', 'Jordan', 'Blackfoot, ID', 'No', 'Beaut', 11, 'Yes', '', 16, 'Fine', 'Fine', 'Yes', 'Sugar', 0, 'No', 'NA', '', '0000-00-00', '', '', '', '', 'No', '', ''),
(40, '003', '2018-06-24', 'Jordan', 'Blackfoot, ID', 'Yes', 'Beaut', 8, 'Yes', 'Stole 2 brood frames for nuc hive -- would have been 11 brood frames.', 13, 'Fine', 'Fine', 'Yes', 'Sugar', 0, 'No', 'NA', '', '0000-00-00', '', '', '', '', 'No', '', ''),
(42, 'blah', '0000-00-00', '', '', 'No', 'Beaut', 0, 'No', '', 0, 'Plenty', 'Plenty', 'No', 'NA', 0, 'No', 'NA', '', '0000-00-00', '', '', '', '', 'No', '', ''),
(43, 'blah', '0000-00-00', '', '', 'No', 'Beaut', 0, 'No', '', 0, 'Plenty', 'Plenty', 'No', 'NA', 0, 'No', 'NA', '', '0000-00-00', '', '', '', '', 'No', '', '');

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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
