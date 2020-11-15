-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 16, 2018 at 05:09 PM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.5.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `music`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `total_songs` (OUT `total_songs` INT)  NO SQL
select sum(no_of_songs) into total_songs from album$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `album`
--

CREATE TABLE `album` (
  `album_id` int(8) NOT NULL,
  `artist_id` int(8) NOT NULL,
  `album_name` varchar(20) NOT NULL,
  `censored_date` date NOT NULL,
  `release_date` date NOT NULL,
  `genre_id` int(8) NOT NULL,
  `no_of_songs` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `album`
--

INSERT INTO `album` (`album_id`, `artist_id`, `album_name`, `censored_date`, `release_date`, `genre_id`, `no_of_songs`) VALUES
(1111, 111111, 'not alone', '2017-10-11', '2017-09-11', 11111, 20),
(2222, 111111, 'no lie', '2017-09-17', '2017-09-19', 11111, 20),
(3333, 222222, 'new rules', '2016-09-22', '2016-09-24', 22222, 50),
(4444, 222222, 'faded', '2016-10-25', '2016-10-27', 22222, 10);

--
-- Triggers `album`
--
DELIMITER $$
CREATE TRIGGER `release_date` BEFORE INSERT ON `album` FOR EACH ROW set new.release_date= (new.censored_date+2)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `artist`
--

CREATE TABLE `artist` (
  `artist_id` int(11) NOT NULL,
  `artist_name` varchar(20) NOT NULL,
  `address` varchar(20) NOT NULL,
  `phn_no` varchar(12) NOT NULL,
  `gender` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `artist`
--

INSERT INTO `artist` (`artist_id`, `artist_name`, `address`, `phn_no`, `gender`) VALUES
(12, 'MNVJJ', 'mutj', '121111111', ' male'),
(111111, 'sp bs', 'bangalore', '9966885541', ' male'),
(222222, 'DUA LIPA', 'california', '9663120633', ' female'),
(333333, 'RIHANA', 'london', '9668230633', ' female'),
(444444, 'SEAN PAUL', 'mexico', '9987356122', ' male');

--
-- Triggers `artist`
--
DELIMITER $$
CREATE TRIGGER `MysqlTrigger` BEFORE INSERT ON `artist` FOR EACH ROW set
new.artist_name=upper(new.artist_name)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `genre`
--

CREATE TABLE `genre` (
  `genre_id` int(8) NOT NULL,
  `genre_name` varchar(20) NOT NULL,
  `discription` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `genre`
--

INSERT INTO `genre` (`genre_id`, `genre_name`, `discription`) VALUES
(11111, 'rock', 'rock is awesome'),
(22222, 'pop', 'suitable for dance'),
(33333, 'jazz', 'special genre'),
(44444, 'hip hop', 'formality dance');

-- --------------------------------------------------------

--
-- Table structure for table `song`
--

CREATE TABLE `song` (
  `song_id` int(8) NOT NULL,
  `language` varchar(20) NOT NULL,
  `rating` int(5) NOT NULL,
  `album-id` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `song`
--

INSERT INTO `song` (`song_id`, `language`, `rating`, `album-id`) VALUES
(11, 'english', 5, 1111),
(22, 'spanish', 3, 1111),
(33, 'urdu', 4, 2222),
(44, 'engish', 5, 3333);

-- --------------------------------------------------------

--
-- Table structure for table `track`
--

CREATE TABLE `track` (
  `track_id` int(8) NOT NULL,
  `album_id` int(8) NOT NULL,
  `track_name` varchar(20) NOT NULL,
  `lyric` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `track`
--

INSERT INTO `track` (`track_id`, `album_id`, `track_name`, `lyric`) VALUES
(111, 1111, 'need guest', 'iam not alone so'),
(222, 1111, 'gayana go', 'lets do that baby'),
(333, 2222, 'london ruit', 'we gonna leave'),
(444, 3333, 'gone goa', 'lets begin party');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`album_id`),
  ADD KEY `artist_id` (`artist_id`),
  ADD KEY `genre_id` (`genre_id`);

--
-- Indexes for table `artist`
--
ALTER TABLE `artist`
  ADD PRIMARY KEY (`artist_id`);

--
-- Indexes for table `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`genre_id`);

--
-- Indexes for table `song`
--
ALTER TABLE `song`
  ADD PRIMARY KEY (`song_id`),
  ADD KEY `album-id` (`album-id`);

--
-- Indexes for table `track`
--
ALTER TABLE `track`
  ADD PRIMARY KEY (`track_id`),
  ADD KEY `album_id` (`album_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `album`
--
ALTER TABLE `album`
  ADD CONSTRAINT `album_ibfk_1` FOREIGN KEY (`artist_id`) REFERENCES `artist` (`artist_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `album_ibfk_2` FOREIGN KEY (`genre_id`) REFERENCES `genre` (`genre_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `song`
--
ALTER TABLE `song`
  ADD CONSTRAINT `song_ibfk_1` FOREIGN KEY (`album-id`) REFERENCES `album` (`album_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `track`
--
ALTER TABLE `track`
  ADD CONSTRAINT `track_ibfk_1` FOREIGN KEY (`album_id`) REFERENCES `album` (`album_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
