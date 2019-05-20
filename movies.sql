-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 13, 2019 at 06:11 AM
-- Server version: 5.7.25
-- PHP Version: 7.1.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `movies`
--
CREATE DATABASE IF NOT EXISTS `movies` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `movies`;
-- --------------------------------------------------------

--
-- Table structure for table `movie`
--

CREATE TABLE `movie` (
  `uid` varchar(36) NOT NULL,
  `title` varchar(255) NOT NULL,
  `year` int(4) NOT NULL,
  `format` enum('DVD','VHS','Blu-Ray') NOT NULL,
  `actors` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DELIMITER $
 
CREATE PROCEDURE `check_movie`(IN year INT(4), IN title varchar(255))
BEGIN
    IF year < 1878 THEN
        SIGNAL SQLSTATE '45000'
           SET MESSAGE_TEXT = 'year can not be lower than 1878';
    END IF;

    IF year > 2030 THEN
        SIGNAL SQLSTATE '45001'
           SET MESSAGE_TEXT = 'year can not be higher than 2030';
    END IF;

    IF LENGTH(title) = 0 THEN
        SIGNAL SQLSTATE '45002'
           SET MESSAGE_TEXT = 'title can not be empty';
    END IF;
END$
DELIMITER ;

DELIMITER $
CREATE TRIGGER `movie_before_insert` BEFORE INSERT ON `movie`
FOR EACH ROW
BEGIN
    CALL check_movie(new.year, new.title);
END$   
DELIMITER ;

-- before update
DELIMITER $
CREATE TRIGGER `movie_before_update` BEFORE UPDATE ON `movie`
FOR EACH ROW
BEGIN
    CALL check_movie(new.year, new.title);
END$   
DELIMITER ;

--
-- Indexes for table `movie`
--
ALTER TABLE `movie`
  ADD PRIMARY KEY (`uid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
