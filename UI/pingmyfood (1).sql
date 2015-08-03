-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 04, 2015 at 06:10 AM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pingmyfood`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `user` varchar(20) NOT NULL,
  `comment` varchar(100) NOT NULL,
  `locality` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`user`, `comment`, `locality`) VALUES
('blue', 'noodles was spicy', 'annanagar'),
('blue', 'ravioli was really tasty', 'annanagar'),
('blue', 'the fish was spicy', 'tmb'),
('blue', 'noodles was bad', 'tmb');

-- --------------------------------------------------------

--
-- Table structure for table `cooktable`
--

CREATE TABLE IF NOT EXISTS `cooktable` (
  `dish` varchar(10) NOT NULL,
  `qty` int(3) NOT NULL,
  `cost` varchar(4) NOT NULL,
  `aboutfood` varchar(200) NOT NULL,
  `userid` mediumint(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cooktable`
--

INSERT INTO `cooktable` (`dish`, `qty`, `cost`, `aboutfood`, `userid`) VALUES
('Fish Fry', 5, '80', 'Spicy and Crispy fish fry', 1),
('Biryani', 10, '160', 'Hyderabadi Chicken Biryani', 1),
('dosa', 2, '50', 'dosa with chutney, sambar', 2),
('sapathi', 100, '0', 'sapathi with kurma', 2),
('Poori', 10, '50', 'Masala poori', 5),
('dosa', 12, '50', 'Onion Dosa', 5),
('chicken', 2, '120', 'chicken 65, saucy', 6),
('gobi machu', 1, '90', 'gobi manchurian dry', 6),
('dosa', 5, '20', 'dosa with chutney', 2),
('poori', 1, '10', 'asd asd asd asd', 2);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE IF NOT EXISTS `reviews` (
  `username` varchar(20) NOT NULL,
  `dish` varchar(20) NOT NULL,
  `review` varchar(200) NOT NULL,
  `rating` int(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`username`, `dish`, `review`, `rating`) VALUES
('sharath', 'dosa', 'the food is good', 4),
('sharath', 'dosa', 'the food tastes bad', 4),
('TPsatish', 'Fish Fry', 'fish was excellent', 4),
('TPsatish', 'Fish Fry', 'bad', 4),
('TPsatish', 'Biryani', 'good', 5),
('TPsatish', 'Biryani', 'crispy', 5);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `userid` mediumint(5) NOT NULL,
  `name` varchar(25) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `address` varchar(50) NOT NULL,
  `locality` varchar(50) NOT NULL,
  `phno` bigint(15) NOT NULL,
  `emailid` varchar(40) NOT NULL,
  `type` varchar(20) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `img` varchar(50) NOT NULL,
  `rating` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `name`, `username`, `password`, `address`, `locality`, `phno`, `emailid`, `type`, `timestamp`, `img`, `rating`) VALUES
(1, 'Satish', 'TPsatish', '123', 'SSNCE', 'tmb', 9488515784, 'tpsatish95@gmail.com', 'cook', '2015-08-02 21:00:54', 'img/satish.jpg', 4),
(2, 'sharath', 'sharath', 'sharath', '123, ssn ce, gh1', 'annanagar', 8939583110, 'blizbare008@gmail.com', 'cook', '2015-08-02 21:07:27', 'img/sharath.jpg', 4),
(3, 'sudharshan', 'sudhu', 'sudhu', 'kk nagar, kknagar', 'kknagar', 9940571866, 'sudhu@gmail.com', 'foodie', '2015-08-02 21:09:59', '', 0),
(4, 'blue', 'blue', 'blue', 'blue moon, out of the earth', 'gdy', 312312, 'admin@moon.com', 'foodie', '2015-08-02 21:42:35', '', 0),
(5, 'Ram', 'ram123', '123', 'SSN', 'gdy', 9488515784, 'tpsatish95@gmail.com', 'cook', '2015-08-02 22:50:40', '', 0),
(6, 'sruthi', 'sruthi', 'sruthi', 'anna nagar,', 'annanagar', 8939583110, 'blizbare008@gmail.com', 'cook', '2015-08-02 23:24:11', '', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`), ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userid` mediumint(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
