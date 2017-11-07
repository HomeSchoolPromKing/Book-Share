-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 07, 2017 at 11:24 PM
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
-- Database: `bookshare_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `ISBN` text,
  `Title` text,
  `Author` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`ISBN`, `Title`, `Author`) VALUES
('12345', 'Latin for Dummies', 'Publicus'),
('23456', 'Rich Dad Poor Dad', 'Adam Smith'),
('34567', 'Romeo and Juliet', 'Shakespeare'),
('45678', 'Dad vs. the World', 'Adam Jones'),
('56789', 'Adam Smith and the Modern Economy', 'Jed Jones');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books` ADD FULLTEXT KEY `Title` (`Title`);
ALTER TABLE `books` ADD FULLTEXT KEY `ISBN` (`ISBN`,`Author`);
ALTER TABLE `books` ADD FULLTEXT KEY `ISBN_2` (`ISBN`,`Title`,`Author`);
ALTER TABLE `books` ADD FULLTEXT KEY `Title_2` (`Title`,`Author`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
