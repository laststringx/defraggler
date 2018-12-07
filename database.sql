-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 05, 2015 at 05:52 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `defrag`
--

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE IF NOT EXISTS `answer` (
  `id` smallint(4) NOT NULL,
  `string_1` varchar(32) NOT NULL,
  `string_2` varchar(32) NOT NULL,
  `string_3` varchar(32) NOT NULL,
  `string_4` varchar(32) NOT NULL,
  `string_5` varchar(32) NOT NULL,
  `string_6` varchar(32) NOT NULL,
  `string_7` varchar(32) NOT NULL,
  `string_8` varchar(32) NOT NULL,
  `string_9` varchar(32) NOT NULL,
  `string_10` varchar(32) NOT NULL,
  `string_1_1` varchar(32) NOT NULL,
  `string_5_1` varchar(32) NOT NULL,
  `output_8` varchar(32) NOT NULL,
  `output_9` varchar(32) NOT NULL,
  `output_10` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`id`, `string_1`, `string_2`, `string_3`, `string_4`, `string_5`, `string_6`, `string_7`, `string_8`, `string_9`, `string_10`, `string_1_1`, `string_5_1`, `output_8`, `output_9`, `output_10`) VALUES
(1, 'CGBIAHDFE', 'HCDFAEBG', 'HEAGCIDFB', 'FCIBHADEG', 'CADFIEHBG', 'DIAGCHEBF', 'CHJBAKEDGFI', 'ADBFHGCE', 'GKHBAICJFDE', 'JGDBLKCHAFIE', 'CFEGBIAHD', 'ACDFIEHBG', 'YES', 'No', 'at+bac++cd+^*');

-- --------------------------------------------------------

--
-- Table structure for table `match`
--

CREATE TABLE IF NOT EXISTS `match` (
  `team_name` varchar(32) NOT NULL,
  `temp_1` varchar(32) NOT NULL DEFAULT 'ABCDEFGHI',
  `temp_2` varchar(32) NOT NULL DEFAULT 'ABCDEFGH',
  `temp_3` varchar(32) NOT NULL DEFAULT 'ABCDEFGHI',
  `temp_4` varchar(32) NOT NULL DEFAULT 'ABCDEFGHI',
  `temp_5` varchar(32) NOT NULL DEFAULT 'ABCDEFGHI',
  `temp_6` varchar(32) NOT NULL DEFAULT 'ABCDEFGHI',
  `temp_7` varchar(32) NOT NULL DEFAULT 'ABCDEFGHIJK',
  `temp_8` varchar(32) NOT NULL DEFAULT 'ABCDEFGH',
  `temp_9` varchar(32) NOT NULL DEFAULT 'ABCDEFGHIJK',
  `temp_10` varchar(32) NOT NULL DEFAULT 'ABCDEFGHIJKL',
  PRIMARY KEY (`team_name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `match`
--

INSERT INTO `match` (`team_name`, `temp_1`, `temp_2`, `temp_3`, `temp_4`, `temp_5`, `temp_6`, `temp_7`, `temp_8`, `temp_9`, `temp_10`) VALUES
('demo', 'CGBHADEFI', 'ABCDEFGH', 'ABCDEFGHI', 'ABCDEFGHI', 'ABCDEFGHI', 'ABCDEFGHI', 'ABCDEFGHIJK', 'ABCDEFGH', 'ABCDEFGHIJK', 'ABCDEFGHIJKL');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE IF NOT EXISTS `members` (
  `team_name` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `member_1` varchar(32) NOT NULL,
  `member_2` varchar(32) NOT NULL,
  `college_name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`team_name`),
  UNIQUE KEY `team_name` (`team_name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`team_name`, `password`, `member_1`, `member_2`, `college_name`) VALUES
('demo', 'demo', 'demo', 'demo2', 'KNIT');

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE IF NOT EXISTS `result` (
  `team_name` varchar(32) NOT NULL,
  `points_1` int(11) NOT NULL DEFAULT '0',
  `points_2` int(11) NOT NULL DEFAULT '0',
  `points_3` int(11) NOT NULL DEFAULT '0',
  `points_4` int(11) NOT NULL DEFAULT '0',
  `points_5` int(11) NOT NULL DEFAULT '0',
  `points_6` int(11) NOT NULL DEFAULT '0',
  `points_7` int(11) NOT NULL DEFAULT '0',
  `points_8` int(11) NOT NULL DEFAULT '0',
  `points_9` int(11) NOT NULL DEFAULT '0',
  `points_10` int(11) NOT NULL DEFAULT '0',
  `total` int(11) NOT NULL DEFAULT '0',
  `timestamp` timestamp(6) NULL DEFAULT NULL,
  PRIMARY KEY (`team_name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`team_name`, `points_1`, `points_2`, `points_3`, `points_4`, `points_5`, `points_6`, `points_7`, `points_8`, `points_9`, `points_10`, `total`, `timestamp`) VALUES
('demo', 0, 0, 0, 0, 50, 0, 0, 0, 0, 0, 150, NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
