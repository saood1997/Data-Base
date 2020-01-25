-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 25, 2018 at 06:49 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1
DROP DATABASE IF EXISTS university;

CREATE DATABASE university;
use university;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `university`
--

-- --------------------------------------------------------

--
-- Table structure for table `student`
--


CREATE TABLE student (
  roll_no varchar(10) NOT NULL,
  st_name varchar(30) NOT NULL,
  f_name varchar(30) NOT NULL,
  gender varchar(10) NOT NULL,
  contact varchar(16) NOT NULL,
  address varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--


INSERT INTO student (`roll_no`, `st_name`, `f_name`, `gender`, `contact`, `address`) VALUES
('P19-6015', 'Ali Zafar', 'Zafar Khan', 'Male', '03339104258', 'Peshawar'),
('P20-6005', 'Shakeel', 'Kamran', 'Male', '03459871234', 'Karachi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `student`
--
ALTER TABLE student
  ADD PRIMARY KEY (`roll_no`);
COMMIT;

create table courses(
	course_code varchar(10) not null,		
	course_name varchar(10) not null,
	credit_hours int not null,
	PRIMARY KEY (course_code)
);



create table Registration(
	course_code varchar(10) not null,
	roll_no varchar(30) not null,
	constraint PRIMARY KEY (course_code,roll_no),
	CONSTRAINT roll_FK FOREIGN KEY(roll_no) REFERENCES student(roll_no),
	CONSTRAINT course_code_FK FOREIGN KEY(course_code) REFERENCES courses(course_code)
);

create table enroll(
	course_code varchar(10) not null,
	course_name varchar(10) not null,
	PRIMARY KEY (course_code)
)
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
