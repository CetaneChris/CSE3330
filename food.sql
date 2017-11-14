-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 14, 2017 at 09:07 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `food`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE IF NOT EXISTS `customer` (
  `NAME` varchar(254) NOT NULL,
  `PHONENO` varchar(12) NOT NULL,
  `ADDRESS` varchar(256) NOT NULL,
  `EMAIL` varchar(100) NOT NULL,
  `USERNAME` varchar(12) NOT NULL,
  `PASSWORD` varchar(12) NOT NULL,
  `CREATEDDATE` datetime NOT NULL,
  `IDNUMBER` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`IDNUMBER`),
  UNIQUE KEY `EMAIL_UNIQUE` (`EMAIL`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` VALUES('Christopher Raymond', '512-997-8819', '1111 Maple Street', 'christopher@gmail.com', 'GoodLuck', '1234pass', '2017-11-08 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

DROP TABLE IF EXISTS `order`;
CREATE TABLE IF NOT EXISTS `order` (
  `PRODUCT_ID` int(11) NOT NULL,
  `CUST_IDNO` int(11) NOT NULL,
  `QUANTITY` int(11) NOT NULL,
  `PRICE_EACH` varchar(10) NOT NULL,
  `TOTAL_PAID` varchar(10) NOT NULL,
  `ORDER_NUM` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`ORDER_NUM`),
  KEY `CUST_IDNO` (`CUST_IDNO`),
  KEY `PRODUCT_ID` (`PRODUCT_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order`
--

INSERT INTO `order` VALUES(1, 1, 2, '1.25', '2.50', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `PRODUCT_ID` int(11) NOT NULL AUTO_INCREMENT,
  `DESCRIPTION` varchar(256) NOT NULL,
  `TYPE` enum('APPETIZER','SALAD','BEVERAGE','MAINDISH','DESSERT') DEFAULT NULL,
  `QUANTITY` int(11) NOT NULL,
  `COST` varchar(10) NOT NULL,
  `PRODUCT_IMAGE` varchar(256) NOT NULL,
  PRIMARY KEY (`PRODUCT_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` VALUES(1, 'Hot Dog', 'MAINDISH', 50, '$1.50', 'hotdog.png');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
