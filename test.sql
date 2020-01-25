-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 25, 2020 at 06:25 PM
-- Server version: 5.7.23
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`) VALUES
(19, 'Nenad', 'adminnenad@admin.com', '$2y$10$k.UyzAGTTg5Hi//r0t3KK.qnd9737L3bdhc/GlyDe2PoqsthWiuGO'),
(18, 'Miki', 'miki@gmail.com', '$2y$10$62xSH45Q5GxYqkmfhsTBxONOA0lqYgvhPkf5/8TPASfhD5vv39zvG'),
(17, 'Nikola', 'admin@admin.com', '$2y$10$vQQgYMClpDyJDGjVWQZ76eVzMzvr8Lz53Gd0.jR8mya/mlh.kHV5u'),
(16, 'Aleksandar', 'aleksandarmarkovic127@gmail.com', '$2y$10$Y49vQ/LJ4cVaqnVOPoHzz.L7RF6RwirQjp5ZWkzzV9Jgf1vLWKLjG');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
