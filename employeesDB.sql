-- phpMyAdmin SQL Dump
-- version 4.4.15.10
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 23, 2019 at 06:00 PM
-- Server version: 5.6.43
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `employeesDB`
--

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
  `empId` int(11) NOT NULL,
  `fname` varchar(30) DEFAULT NULL,
  `lname` varchar(30) DEFAULT NULL,
  `fatherName` varchar(30) DEFAULT NULL,
  `motherName` varchar(30) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `contact` varchar(10) DEFAULT NULL,
  `gender` varchar(2) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `country` varchar(30) DEFAULT NULL,
  `state` varchar(30) DEFAULT NULL,
  `city` varchar(30) DEFAULT NULL,
  `zip` varchar(6) DEFAULT NULL,
  `aadhar` varchar(20) DEFAULT NULL,
  `pancard` varchar(30) DEFAULT NULL,
  `technology` varchar(100) DEFAULT NULL,
  `dob` date NOT NULL,
  `deleteFlg` char(1) DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=137 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`empId`, `fname`, `lname`, `fatherName`, `motherName`, `email`, `contact`, `gender`, `address`, `country`, `state`, `city`, `zip`, `aadhar`, `pancard`, `technology`, `dob`, `deleteFlg`) VALUES
(13, 'rajkumar', 'sing1', 'aaaa', 'sssssssss', 'rajkumar.2017@vitstudent.ac.in', '8878878056', 'm', 'asdasdadasd', 'India', 'madhya pradesh', 'sagar', '474020', '1222222222222', '867867675675', '[java,script ,]', '2019-02-12', '0'),
(14, 'rajkumar', 'sing2', 'hhhhhhhh', 'mmmmmmmmmm', 'rajkumar.2017@vitstudent.ac.in', '8770779321', 'm', 'vit vellore L-block', 'Austria', 'Daman and Diu', 'Indore', '632014', '121222222222', 'ppppp8877t', '[HTML5,,,]', '1995-09-18', '1'),
(15, 'Sonal', 'sawant', 'pta nisd', 'pta nidsf', 'rajkumar.2017@vitstudent.ac.in', '9039462734', 'f', 'pta ni', 'Algeria', 'Assam', 'Kolkata', '632014', '554466885522', 'aaata2277a', '[,Java Script,,]', '2018-01-09', '0'),
(16, 'prudhvi', 'muddmu4', 'ffffffffffffffffffffffff', 'mmmmmmmmmmmmm', 'muddam@prudhavi.com', '7766889943', 'm', 'vit vellore L-block ihjihnjhlkjjjjjjjjjjjjjjjjjjjjjjj nnnnnnnnnnnnnnnnnnnnnnnnnn kkkkkkkkkkkkkkkkk lllllllllllllllllllllllllllll', 'India', 'Tamil Nadu', 'Lucknow', '632014', '662233885566', 'ppppp8877t', '[Java Script,CSS,]', '1995-02-23', '0'),
(17, 'prudhvi', 'muddmu5', 'ffffffffffffffffffffffff', 'mmmmmmmmmmmmm', 'muddam@prudhavi.com', '7766889943', 'm', 'vit vellore L-block ihjihnjhlkjjjjjjjjjjjjjjjjjjjjjjj nnnnnnnnnnnnnnnnnnnnnnnnnn kkkkkkkkkkkkkkkkk lllllllllllllllllllllllllllll', 'India', 'Tamil Nadu', 'Lucknow', '632014', '662233885566', 'ppppp8877t', '[Java Script,CSS,]', '1995-02-23', '0'),
(18, 'prudhvi', 'muddmu6', 'ffffffffffffffffffffffff', 'mmmmmmmmmmmmm', 'muddam@prudhavi.com', '7766889943', 'm', 'vit vellore L-block ihjihnjhlkjjjjjjjjjjjjjjjjjjjjjjj nnnnnnnnnnnnnnnnnnnnnnnnnn kkkkkkkkkkkkkkkkk lllllllllllllllllllllllllllll', 'India', 'Tamil Nadu', 'Lucknow', '632014', '662233885566', 'ppppp8877t', '[Java Script,CSS,]', '1995-02-23', '0'),
(19, 'prudhvi', 'muddmu7', 'ffffffffffffffffffffffff', 'mmmmmmmmmmmmm', 'muddam@prudhavi.com', '7766889943', 'm', 'vit vellore L-block ihjihnjhlkjjjjjjjjjjjjjjjjjjjjjjj nnnnnnnnnnnnnnnnnnnnnnnnnn kkkkkkkkkkkkkkkkk lllllllllllllllllllllllllllll', 'India', 'Tamil Nadu', 'Lucknow', '632014', '662233885566', 'ppppp8877t', '[Java Script,CSS,]', '1995-02-23', '0'),
(20, 'prudhvi', 'muddmu8', 'ffffffffffffffffffffffff', 'mmmmmmmmmmmmm', 'muddam@prudhavi.com', '7766889943', 'm', 'vit vellore L-block ihjihnjhlkjjjjjjjjjjjjjjjjjjjjjjj nnnnnnnnnnnnnnnnnnnnnnnnnn kkkkkkkkkkkkkkkkk lllllllllllllllllllllllllllll', 'India', 'Tamil Nadu', 'Lucknow', '632014', '662233885566', 'ppppp8877t', '[Java Script,CSS,]', '1995-02-23', '0'),
(21, 'prudhvi', 'muddmu9', 'ffffffffffffffffffffffff', 'mmmmmmmmmmmmm', 'muddam@prudhavi.com', '7766889943', 'm', 'vit vellore L-block ihjihnjhlkjjjjjjjjjjjjjjjjjjjjjjj nnnnnnnnnnnnnnnnnnnnnnnnnn kkkkkkkkkkkkkkkkk lllllllllllllllllllllllllllll', 'India', 'Tamil Nadu', 'Lucknow', '632014', '662233885566', 'ppppp8877t', '[Java Script,CSS,]', '1995-02-23', '0'),
(22, 'prudhvi', 'muddmu10', 'ffffffffffffffffffffffff', 'mmmmmmmmmmmmm', 'muddam@prudhavi.com', '7766889943', 'm', 'vit vellore L-block ihjihnjhlkjjjjjjjjjjjjjjjjjjjjjjj nnnnnnnnnnnnnnnnnnnnnnnnnn kkkkkkkkkkkkkkkkk lllllllllllllllllllllllllllll', 'India', 'Tamil Nadu', 'Lucknow', '632014', '662233885566', 'ppppp8877t', '[Java Script,CSS,]', '1995-02-23', '0'),
(104, 'indrapreet', 'baggha', 'tejpratap baggha', 'kanta devi', 'indra@preet.com', '7788556644', 'm', 'sagar', 'India', 'Madhya Pradesh', 'Sagar', '474001', '667755448899', 'ttggh6758t', '[Java Script,CSS,Node]', '2019-02-12', '1'),
(105, 'rajendrs', 'dangi', 'tejpratap baggha', 'kanta devi', 'indra@preet.com', '7788556644', 'm', 'sagar', 'India', 'Madhya Pradesh', 'Sagar', '474001', '667755448899', 'ttggh6758t', '[Java Script,CSS,Node]', '2055-02-12', '0'),
(106, 'prabha', 'parmar', 'tejpratap baggha', 'kanta devi', 'indra@preet.com', '7788556644', 'm', 'sagar', 'India', 'Madhya Pradesh', 'Sagar', '474001', '667755448899', 'ttggh6758t', '[Java Script,CSS,Node]', '2066-02-12', '0'),
(107, 'indrapreet', 'baggha', 'tejpratap baggha', 'kanta devi', 'indra@preet.com', '7788556644', 'm', 'sagar', 'India', 'Madhya Pradesh', 'Sagar', '474001', '667755448899', 'ttggh6758t', '[Java Script,CSS,Node]', '2019-02-12', '0'),
(108, 'rajendrs', 'dangi', 'tejpratap baggha', 'kanta devi', 'indra@preet.com', '7788556644', 'm', 'sagar', 'India', 'Madhya Pradesh', 'Sagar', '474001', '667755448899', 'ttggh6758t', '[Java Script,CSS,Node]', '2055-02-12', '0'),
(109, 'prabha', 'parmar', 'tejpratap baggha', 'kanta devi', 'indra@preet.com', '7788556644', 'm', 'sagar', 'India', 'Madhya Pradesh', 'Sagar', '474001', '667755448899', 'ttggh6758t', '[Java Script,CSS,Node]', '2066-02-12', '0'),
(110, 'indrapreet', 'baggha', 'tejpratap baggha', 'kanta devi', 'indra@preet.com', '7788556644', 'm', 'sagar', 'India', 'Madhya Pradesh', 'Sagar', '474001', '667755448899', 'ttggh6758t', '[Java Script,CSS,Node]', '2019-02-12', '0'),
(111, 'rajendrs', 'dangi', 'tejpratap baggha', 'kanta devi', 'indra@preet.com', '7788556644', 'm', 'sagar', 'India', 'Madhya Pradesh', 'Sagar', '474001', '667755448899', 'ttggh6758t', '[Java Script,CSS,Node]', '2055-02-12', '0'),
(112, 'prabha', 'parmar', 'tejpratap baggha', 'kanta devi', 'indra@preet.com', '7788556644', 'm', 'sagar', 'India', 'Madhya Pradesh', 'Sagar', '474001', '667755448899', 'ttggh6758t', '[Java Script,CSS,Node]', '2066-02-12', '0'),
(113, 'rajendrs', 'dangi', 'tejpratap baggha', 'kanta devi', 'indra@preet.com', '7788556644', 'm', 'sagar', 'India', 'Madhya Pradesh', 'Sagar', '474001', '667755448899', 'ttggh6758t', '[Java Script,CSS,Node]', '2055-02-12', '0'),
(114, 'prabha', 'parmar', 'tejpratap baggha', 'kanta devi', 'indra@preet.com', '7788556644', 'm', 'sagar', 'India', 'Madhya Pradesh', 'Sagar', '474001', '667755448899', 'ttggh6758t', '[Java Script,CSS,Node]', '2066-02-12', '1'),
(115, 'indrapreet', 'baggha', 'tejpratap baggha', 'kanta devi', 'indra@preet.com', '7788556644', 'm', 'sagar', 'India', 'Madhya Pradesh', 'Sagar', '474001', '667755448899', 'ttggh6758t', '[Java Script,CSS,Node]', '2019-02-12', '0'),
(116, 'rajendrs', 'dangi', 'tejpratap baggha', 'kanta devi', 'indra@preet.com', '7788556644', 'm', 'sagar', 'India', 'Madhya Pradesh', 'Sagar', '474001', '667755448899', 'ttggh6758t', '[Java Script,CSS,Node]', '2055-02-12', '0'),
(117, 'prabha', 'parmar', 'tejpratap baggha', 'kanta devi', 'indra@preet.com', '7788556644', 'm', 'sagar', 'India', 'Madhya Pradesh', 'Sagar', '474001', '667755448899', 'ttggh6758t', '[Java Script,CSS,Node]', '2066-02-12', '0'),
(118, 'indrapreet', 'baggha', 'tejpratap baggha', 'kanta devi', 'indra@preet.com', '7788556644', 'm', 'sagar', 'India', 'Madhya Pradesh', 'Sagar', '474001', '667755448899', 'ttggh6758t', '[Java Script,CSS,Node]', '2019-02-12', '0'),
(119, 'rajendrs', 'dangi', 'tejpratap baggha', 'kanta devi', 'indra@preet.com', '7788556644', 'm', 'sagar', 'India', 'Madhya Pradesh', 'Sagar', '474001', '667755448899', 'ttggh6758t', '[Java Script,CSS,Node]', '2055-02-12', '0'),
(120, 'prabha', 'parmar', 'tejpratap baggha', 'kanta devi', 'indra@preet.com', '7788556644', 'm', 'sagar', 'India', 'Madhya Pradesh', 'Sagar', '474001', '667755448899', 'ttggh6758t', '[Java Script,CSS,Node]', '2066-02-12', '0'),
(121, 'indrapreet', 'baggha', 'tejpratap baggha', 'kanta devi', 'indra@preet.com', '7788556644', 'm', 'sagar', 'India', 'Madhya Pradesh', 'Sagar', '474001', '667755448899', 'ttggh6758t', '[Java Script,CSS,Node]', '2019-02-12', '0'),
(122, 'rajendrs', 'dangi', 'tejpratap baggha', 'kanta devi', 'indra@preet.com', '7788556644', 'm', 'sagar', 'India', 'Madhya Pradesh', 'Sagar', '474001', '667755448899', 'ttggh6758t', '[Java Script,CSS,Node]', '2055-02-12', '0'),
(123, 'prabha', 'parmar', 'tejpratap baggha', 'kanta devi', 'indra@preet.com', '7788556644', 'm', 'sagar', 'India', 'Madhya Pradesh', 'Sagar', '474001', '667755448899', 'ttggh6758t', '[Java Script,CSS,Node]', '2066-02-12', '1'),
(124, 'indrapreet', 'baggha', 'tejpratap baggha', 'kanta devi', 'indra@preet.com', '7788556644', 'm', 'sagar', 'India', 'Madhya Pradesh', 'Sagar', '474001', '667755448899', 'ttggh6758t', '[Java Script,CSS,Node]', '2019-02-12', '0'),
(125, 'rajendrs', 'dangi', 'tejpratap baggha', 'kanta devi', 'indra@preet.com', '7788556644', 'm', 'sagar', 'India', 'Madhya Pradesh', 'Sagar', '474001', '667755448899', 'ttggh6758t', '[Java Script,CSS,Node]', '2055-02-12', '1'),
(126, 'prabha', 'parmar', 'tejpratap baggha', 'kanta devi', 'indra@preet.com', '7788556644', 'm', 'sagar', 'India', 'Madhya Pradesh', 'Sagar', '474001', '667755448899', 'ttggh6758t', '[Java Script,CSS,Node]', '2066-02-12', '1'),
(127, 'indrapreet', 'baggha', 'tejpratap baggha', 'kanta devi', 'indra@preet.com', '7788556644', 'm', 'sagar', 'India', 'Madhya Pradesh', 'Sagar', '474001', '667755448899', 'ttggh6758t', '[Java Script,CSS,Node]', '2019-02-12', '0'),
(128, 'rajendrs', 'dangi', 'tejpratap baggha', 'kanta devi', 'indra@preet.com', '7788556644', 'm', 'sagar', 'India', 'Madhya Pradesh', 'Sagar', '474001', '667755448899', 'ttggh6758t', '[Java Script,CSS,Node]', '2055-02-12', '1'),
(129, 'prabha', 'parmar', 'tejpratap baggha', 'kanta devi', 'indra@preet.com', '7788556644', 'm', 'sagar', 'India', 'Madhya Pradesh', 'Sagar', '474001', '667755448899', 'ttggh6758t', '[Java Script,CSS,Node]', '2066-02-12', '1'),
(130, 'indrapreet', 'baggha', 'tejpratap baggha', 'kanta devi', 'indra@preet.com', '7788556644', 'm', 'sagar', 'India', 'Madhya Pradesh', 'Sagar', '474001', '667755448899', 'ttggh6758t', '[Java Script,CSS,Node]', '2019-02-12', '1'),
(131, 'prabha', 'parmar', 'tejpratap baggha', 'kanta devi', 'indra@preet.com', '7788556644', 'm', 'sagar', 'India', 'Madhya Pradesh', 'Sagar', '474001', '667755448899', 'ttggh6758t', '[Java Script,CSS,Node]', '2066-02-12', '1'),
(132, 'rajendrs', 'dangi', 'tejpratap baggha', 'kanta devi', 'indra@preet.com', '7788556644', 'm', 'sagar', 'India', 'Madhya Pradesh', 'Sagar', '474001', '667755448899', 'ttggh6758t', '[Java Script,CSS,Node]', '2055-02-12', '1'),
(133, 'rajendrs', 'dangi', 'tejpratap baggha', 'kanta devi', 'indra@preet.com', '7788556644', 'm', 'sagar', 'India', 'Madhya Pradesh', 'Sagar', '474001', '667755448899', 'ttggh6758t', '[Java Script,CSS,Node]', '2055-02-12', '0'),
(134, 'indrapreet', 'baggha', 'tejpratap baggha', 'kanta devi', 'indra@preet.com', '7788556644', 'm', 'sagar', 'India', 'Madhya Pradesh', 'Sagar', '474001', '667755448899', 'ttggh6758t', '[Java Script,CSS,Node]', '2019-02-12', '0'),
(135, 'indrapreet', 'baggha', 'tejpratap baggha', 'kanta devi', 'indra@preet.com', '7788556644', 'm', 'sagar', 'India', 'Madhya Pradesh', 'Sagar', '474001', '667755448899', 'ttggh6758t', '[Java Script,CSS,Node]', '2019-02-12', '0'),
(136, 'rajendrs', 'dangi', 'tejpratap baggha', 'kanta devi', 'indra@preet.com', '7788556644', 'm', 'sagar', 'India', 'Madhya Pradesh', 'Sagar', '474001', '667755448899', 'ttggh6758t', '[Java Script,CSS,Node]', '2055-02-12', '0');

-- --------------------------------------------------------

--
-- Table structure for table `passRecovery`
--

CREATE TABLE IF NOT EXISTS `passRecovery` (
  `id` int(11) NOT NULL,
  `uniqueCode` varchar(150) DEFAULT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `email` varchar(150) NOT NULL,
  `flg` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `email` varchar(150) NOT NULL,
  `name` varchar(50) NOT NULL,
  `mob` varchar(15) NOT NULL,
  `password` varchar(150) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`email`, `name`, `mob`, `password`, `id`) VALUES
('rajkumar.2017@vitstudent.ac.in', 'rajkumar sing', '8770779321', '7815696ecbf1c96e6894b779456d330e', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`empId`);

--
-- Indexes for table `passRecovery`
--
ALTER TABLE `passRecovery`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `uniqueCode` (`uniqueCode`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `email_2` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `empId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=137;
--
-- AUTO_INCREMENT for table `passRecovery`
--
ALTER TABLE `passRecovery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
