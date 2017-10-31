-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 31, 2017 at 03:48 AM
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
CREATE DATABASE IF NOT EXISTS `food` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `food`;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE IF NOT EXISTS `order` (
  `PRODUCT_ID` int(11) NOT NULL,
  `CUST_IDNO` int(11) NOT NULL,
  `QUANTITY` int(11) NOT NULL,
  `PRICE_EACH` varchar(10) NOT NULL,
  `TOTAL_PAID` varchar(10) NOT NULL,
  `ORDER_NUM` int(11) NOT NULL,
  PRIMARY KEY (`ORDER_NUM`),
  KEY `CUST_IDNO` (`CUST_IDNO`),
  KEY `PRODUCT_ID` (`PRODUCT_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `PRODUCT_ID` int(11) NOT NULL AUTO_INCREMENT,
  `DESCRIPTION` varchar(256) NOT NULL,
  `TYPE` enum('APPETIZER','SALAD','BEVERAGE','MAINDISH','DESSERT') DEFAULT NULL,
  `QUANTITY` int(11) NOT NULL,
  `COST` varchar(10) NOT NULL,
  `PRODUCT_IMAGE` varbinary(256) NOT NULL,
  PRIMARY KEY (`PRODUCT_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
