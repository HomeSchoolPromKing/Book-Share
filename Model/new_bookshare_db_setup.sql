-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 10, 2017 at 08:14 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookshare`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `book_ID` int(11) NOT NULL,
  `owner` varchar(16) NOT NULL,
  `title` varchar(255) NOT NULL,
  `author` varchar(40) NOT NULL,
  `ISBN-10` varchar(10) NOT NULL,
  `ISBN-13` varchar(13) NOT NULL,
  `wants` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`book_ID`, `owner`, `title`, `author`, `ISBN-10`, `ISBN-13`, `wants`) VALUES
(1, 'zack', 'Starting out with Programming Logic and Design', 'Tony Gaddis', '0132805456', '9780132805452', 'A big sack of money'),
(2, 'kat', 'Javascript & JQuery: Interactive Front-End Web Development', 'Jon Duckett', '1118531648', '9871118531648', 'painkillers for her neck'),
(3, 'brian', 'Discovering Computers & Microsoft Offices 201: A Fundamental Combined Approach', 'Vermaat', '1285169560', '9781285169568', 'everyone to just get along'),
(4, 'margie', 'Starting Out With Programming Logic and Design', 'Tony Gaddis', '0132805456', '9780132805452', 'everyone to do their homework'),
(5, 'zack', 'What if? Serious Scientific Answers to Absurd Hypothetical Questions', 'Randall Munroe', '0544272996', '9780544272996', 'everyone else to read this');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(7) NOT NULL,
  `username` varchar(16) NOT NULL,
  `password` varchar(40) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `email`) VALUES
(1, 'kat', 'password', 'kat@life.com'),
(2, 'zack', 'password', 'zack@somewhere.com'),
(3, 'brian', 'password', 'brian@orion.lion'),
(4, 'margie', 'password', 'margie@thenext.lvl');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`book_ID`),
  ADD KEY `owner` (`owner`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`) USING BTREE,
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `book_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_ibfk_1` FOREIGN KEY (`owner`) REFERENCES `user` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

ALTER TABLE `books` ADD FULLTEXT INDEX `fulltext-1` (`title`, `author`, `ISBN-10`, `ISBN-13`);
