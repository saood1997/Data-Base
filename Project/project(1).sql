-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 15, 2019 at 09:49 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--
CREATE DATABASE IF NOT EXISTS `project` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `project`;

-- --------------------------------------------------------

--
-- Table structure for table `CUSTOMER`
--

CREATE TABLE `CUSTOMER` (
  `CUS_ID` int(11) NOT NULL,
  `FIRST_NAME` varchar(10) NOT NULL,
  `LAST_NAME` varchar(10) NOT NULL,
  `ADDRESS` varchar(30) NOT NULL,
  `CONTACT` varchar(20) NOT NULL,
  `PASS` varchar(20) NOT NULL,
  `USER_NAME` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `CUSTOMER`
--

INSERT INTO `CUSTOMER` (`CUS_ID`, `FIRST_NAME`, `LAST_NAME`, `ADDRESS`, `CONTACT`, `PASS`, `USER_NAME`) VALUES
(1, 'wajahat', 'raza', 'Fast University, Peshawar', '01231234567', 'teatime', 'wajahatraza');

-- --------------------------------------------------------

--
-- Table structure for table `EMPLOYEE`
--

CREATE TABLE `EMPLOYEE` (
  `EMP_ID` int(11) NOT NULL,
  `FIRST_NAME` varchar(10) NOT NULL,
  `LAST_NAME` varchar(10) NOT NULL,
  `ADDRESS` varchar(30) NOT NULL,
  `CONTACT` varchar(20) NOT NULL,
  `PASS` varchar(20) NOT NULL,
  `USER_NAME` varchar(25) NOT NULL,
  `TYPE` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `EMPLOYEE`
--

INSERT INTO `EMPLOYEE` (`EMP_ID`, `FIRST_NAME`, `LAST_NAME`, `ADDRESS`, `CONTACT`, `PASS`, `USER_NAME`, `TYPE`) VALUES
(1, 'saood', 'rehman', 'charsadda', '0987-1238675', '123', 'saoodrehman', 'Manager');

-- --------------------------------------------------------

--
-- Table structure for table `OrderDetails`
--

CREATE TABLE `OrderDetails` (
  `ORDER_ID` int(11) NOT NULL,
  `PROD_ID` int(11) NOT NULL,
  `LINE_QTY` varchar(20) NOT NULL,
  `LINE_PRICE` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `OrderDetails`
--

INSERT INTO `OrderDetails` (`ORDER_ID`, `PROD_ID`, `LINE_QTY`, `LINE_PRICE`) VALUES
(2, 1, '3', 600),
(2, 2, '2', 100),
(3, 1, '1', 200),
(3, 2, '2', 100),
(4, 1, '3', 600),
(4, 2, '3', 150),
(5, 1, '2', 400);

-- --------------------------------------------------------

--
-- Table structure for table `ORDERS`
--

CREATE TABLE `ORDERS` (
  `ORDER_ID` int(11) NOT NULL,
  `CUS_ID` int(11) NOT NULL,
  `ORDER_DATE` varchar(10) NOT NULL,
  `PRICE` int(11) NOT NULL,
  `STATUS` varchar(15) NOT NULL DEFAULT 'Pending',
  `EMP_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ORDERS`
--

INSERT INTO `ORDERS` (`ORDER_ID`, `CUS_ID`, `ORDER_DATE`, `PRICE`, `STATUS`, `EMP_ID`) VALUES
(2, 1, '2019-05-08', 700, 'Pending', NULL),
(3, 1, '2019-05-09', 300, 'Pending', NULL),
(4, 1, '2019-05-10', 750, 'Pending', NULL),
(5, 1, '2019-05-11', 400, 'Pending', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `PRODUCTS`
--

CREATE TABLE `PRODUCTS` (
  `PROD_ID` int(11) NOT NULL,
  `NAME` varchar(20) NOT NULL,
  `QUANTITY` int(11) NOT NULL,
  `PRICE` int(11) NOT NULL,
  `PIC_PATH` text NOT NULL,
  `SUPP_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `PRODUCTS`
--

INSERT INTO `PRODUCTS` (`PROD_ID`, `NAME`, `QUANTITY`, `PRICE`, `PIC_PATH`, `SUPP_ID`) VALUES
(1, 'surfexel', 7, 200, 'images/surfexel.jpeg', 0),
(2, 'safeguard', 6, 50, 'images/safeguard.jpeg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `SUPPLIER`
--

CREATE TABLE `SUPPLIER` (
  `SUPP_ID` int(11) NOT NULL,
  `NAME` varchar(20) NOT NULL,
  `CONTACT` varchar(20) NOT NULL,
  `ADDRESS` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `SUPPLIER`
--

INSERT INTO `SUPPLIER` (`SUPP_ID`, `NAME`, `CONTACT`, `ADDRESS`) VALUES
(1, 'Arshad Brothers', '0234-2344351', 'Lahore');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `CUSTOMER`
--
ALTER TABLE `CUSTOMER`
  ADD PRIMARY KEY (`CUS_ID`);

--
-- Indexes for table `EMPLOYEE`
--
ALTER TABLE `EMPLOYEE`
  ADD PRIMARY KEY (`EMP_ID`);

--
-- Indexes for table `OrderDetails`
--
ALTER TABLE `OrderDetails`
  ADD PRIMARY KEY (`ORDER_ID`,`PROD_ID`),
  ADD KEY `PROD_ID` (`PROD_ID`);

--
-- Indexes for table `ORDERS`
--
ALTER TABLE `ORDERS`
  ADD PRIMARY KEY (`ORDER_ID`),
  ADD KEY `fk_order` (`CUS_ID`),
  ADD KEY `EMP_ID` (`EMP_ID`);

--
-- Indexes for table `PRODUCTS`
--
ALTER TABLE `PRODUCTS`
  ADD PRIMARY KEY (`PROD_ID`),
  ADD KEY `SUPP_ID` (`SUPP_ID`);

--
-- Indexes for table `SUPPLIER`
--
ALTER TABLE `SUPPLIER`
  ADD PRIMARY KEY (`SUPP_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `CUSTOMER`
--
ALTER TABLE `CUSTOMER`
  MODIFY `CUS_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `EMPLOYEE`
--
ALTER TABLE `EMPLOYEE`
  MODIFY `EMP_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ORDERS`
--
ALTER TABLE `ORDERS`
  MODIFY `ORDER_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `PRODUCTS`
--
ALTER TABLE `PRODUCTS`
  MODIFY `PROD_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `SUPPLIER`
--
ALTER TABLE `SUPPLIER`
  MODIFY `SUPP_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `OrderDetails`
--
ALTER TABLE `OrderDetails`
  ADD CONSTRAINT `OrderDetails_ibfk_1` FOREIGN KEY (`ORDER_ID`) REFERENCES `ORDERS` (`ORDER_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `OrderDetails_ibfk_2` FOREIGN KEY (`PROD_ID`) REFERENCES `PRODUCTS` (`PROD_ID`) ON UPDATE CASCADE;

--
-- Constraints for table `ORDERS`
--
ALTER TABLE `ORDERS`
  ADD CONSTRAINT `cus_fk_order` FOREIGN KEY (`CUS_ID`) REFERENCES `CUSTOMER` (`CUS_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `emp_fk_order` FOREIGN KEY (`EMP_ID`) REFERENCES `EMPLOYEE` (`EMP_ID`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
