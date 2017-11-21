/*
	Christopher Raymond & Laramie DeBaun
	Databases Fall 2017
	Food database creation
*/

-- Database: `food`

CREATE DATABASE IF NOT EXISTS `food`;
USE `food`;

-- Table: `customer`

DROP TABLE IF EXISTS `customer`;
CREATE TABLE IF NOT EXISTS `customer` (
  `NAME` varchar(254) NOT NULL,
  `PHONENO` varchar(12) NOT NULL,
  `ADDRESS` varchar(256) NOT NULL,
  `EMAIL` varchar(100) NOT NULL,
  `USERNAME` varchar(12) NOT NULL,
  `PASSWORD` varchar(12) NOT NULL,
  `CREATEDDATE` datetime NOT NULL,
  `IDNUMBER` int NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`IDNUMBER`),
  UNIQUE KEY `EMAIL_UNIQUE` (`EMAIL`)
);

-- Table: `order`

DROP TABLE IF EXISTS `order`;
CREATE TABLE IF NOT EXISTS `order` (
  `PRODUCT_ID` int NOT NULL,
  `CUST_IDNO` int NOT NULL,
  `QUANTITY` int NOT NULL,
  `PRICE_EACH` varchar(10) NOT NULL,
  `TOTAL_PAID` varchar(10) NOT NULL,
  `ORDER_NUM` int NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`ORDER_NUM`),
  KEY `CUST_IDNO` (`CUST_IDNO`),
  KEY `PRODUCT_ID` (`PRODUCT_ID`)
);

-- Table: `product`

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `PRODUCT_ID` int NOT NULL AUTO_INCREMENT,
  `DESCRIPTION` varchar(256) NOT NULL,
  `TYPE` enum('APPETIZER','SALAD','BEVERAGE','MAINDISH','DESSERT') DEFAULT NULL,
  `QUANTITY` int NOT NULL,
  `COST` varchar(10) NOT NULL,
  `PRODUCT_IMAGE` varchar(256) NOT NULL,
  PRIMARY KEY (`PRODUCT_ID`)
);
