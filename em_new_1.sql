-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 01, 2012 at 01:50 PM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `em_new_1`
--

-- --------------------------------------------------------

--
-- Table structure for table `complaints`
--

CREATE TABLE IF NOT EXISTS `complaints` (
  `username` varchar(100) NOT NULL,
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `designation` varchar(50) NOT NULL,
  `location` varchar(50) NOT NULL,
  `description` tinyint(4) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `processed` tinyint(1) NOT NULL DEFAULT '0',
  `area` tinyint(2) NOT NULL,
  `department` varchar(50) NOT NULL,
  `room` varchar(50) NOT NULL,
  `timing` tinyint(3) unsigned NOT NULL,
  `availablefrom` varchar(1000) NOT NULL,
  `availableto` varchar(1000) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contactPerson` varchar(100) NOT NULL,
  `contactNumber` varchar(255) NOT NULL,
  `descText` mediumtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=154 ;

--
-- Dumping data for table `complaints`
--

INSERT INTO `complaints` (`username`, `id`, `name`, `designation`, `location`, `description`, `time`, `processed`, `area`, `department`, `room`, `timing`, `availablefrom`, `availableto`, `contact`, `email`, `contactPerson`, `contactNumber`, `descText`) VALUES
('', 52, 'Rishabh', 'Student', 'Sapphire', 1, '2009-03-19 03:30:14', 2, 1, 'Computer Applications', '8', 1, '', '', '', '205107007', 'John', '9629587387', ''),
('', 53, 'Dr. A Vadivel', 'Faculty', 'Computer Applications', 31, '2009-03-19 06:28:45', 2, 3, 'Computer Applications', 'NotApplicable', 1, '', '', '', 'vadi', '', '0', ''),
('', 54, 'S R Balaji', 'Student', 'Agate', 10, '2009-04-05 17:05:29', 2, 1, 'Production Engineering', '59', 4, '', '', '', '106108082', '', '0', ''),
('', 55, 'sathish kumar', 'Student', 'Zircon-B', 17, '2009-06-05 04:49:17', 2, 1, 'Computer Applications', '89', 1, '', '', '9786424488', '205108023', '', '0', ''),
('', 56, 'Manivasagan', 'Student', 'Zircon-B', 8, '2009-08-11 10:20:19', 2, 1, 'Computer Applications', '95', 1, '', '', '9952864070', '205108023', '', '0', ''),
('', 57, 'sdgvdsv', 'Faculty', 'A', 0, '2009-08-11 10:21:02', 1, 2, 'Architecture', 'dfc', 0, '', '', '', '205108023', '', '0', ''),
('', 58, 'E RAVI SHANKAR', 'Student', 'Garnett-A', 16, '2009-08-11 20:24:13', 2, 1, 'Production Engineering', '24', 1, '', '', '9865876457', '114106042', '', '0', ''),
('', 59, 'T S SADAGOAPAN', 'Student', 'Garnett-A', 14, '2009-08-11 20:26:49', 1, 1, 'Production Engineering', '20', 4, '', '', '', '114106042', '', '0', ''),
('', 60, 'Gokul Sundar G', 'Student', 'Beryl', 2, '2009-09-06 13:41:15', 2, 1, 'Computer Science and Engineering', '136', 2, '', '', '', '106108089', '', '0', ''),
('', 61, 'srg', 'Student', 'C', 3, '2009-11-06 09:24:59', 2, 2, 'Electrical and Electronics Engineering', '23', 0, '', '', '563634534', '205107007', '', '0', ''),
('', 62, 'Rishabh', 'Student', 'Sapphire', 3, '2009-11-06 11:38:23', 2, 1, 'Computer Applications', '8', 1, '', '', '', '205107007', '', '0', ''),
('', 63, 'anil', 'Student', 'Zircon-B', 0, '2010-01-18 05:49:47', 2, 1, 'Computer Applications', '97', 4, '', '', '', '205108066', 'sktest', '9629587387', ''),
('', 64, '205109046', 'Student', 'Agate', 0, '2010-10-26 07:25:18', 1, 1, 'Computer Applications', '11', 1, '', '', '', '205109046', 'John', '9629587387', ''),
('', 65, 'Vipul Kumar', 'Student', 'Garnett-A', 0, '2010-10-26 07:26:01', 1, 1, 'Civil Engineering', '44', 1, '', '', '9047551098', '205109011', 'Girish', '9595959595', ''),
('', 66, '205109046', 'Student', 'Admin Block', 0, '2010-10-26 07:26:42', 0, 5, 'Chemical Engineering', 'NotApplicable', 1, '', '', '', '205109046', '', '0', ''),
('', 67, '205109046', 'Faculty', 'Agate', 0, '2010-10-26 07:28:25', 0, 1, 'Chemical Engineering', '11', 0, '', '', '', '205109046', '', '0', ''),
('', 68, 'master', 'Student', 'Agate', 0, '2010-10-26 07:29:57', 0, 1, 'Chemistry', '1', 1, '', '', '', 'master', '', '0', ''),
('', 69, '205109046', 'Student', 'Agate', 0, '2010-10-26 07:30:20', 0, 1, 'Chemical Engineering', '2', 0, '', '', '', 'master', '', '0', ''),
('', 70, '205109046', 'Faculty', 'Agate', 0, '2010-10-26 07:33:15', 0, 1, 'Chemical Engineering', '44', 0, '', '', '', 'master', '', '0', ''),
('', 71, '205109046', 'Student', 'Agate', 0, '2010-10-26 07:37:18', 0, 1, 'Chemical Engineering', '111', 0, '', '', '', 'master', '', '0', ''),
('', 72, '205109046', 'Student', 'Agate', 31, '2010-10-26 07:39:41', 0, 1, 'Chemical Engineering', '1', 7, '', '', '', 'master', '', '0', ''),
('', 73, '205109046', 'Student', 'Agate', 1, '2010-10-26 07:40:52', 0, 1, 'Chemical Engineering', '1', 1, '', '', '', 'master', '', '0', ''),
('', 74, '205109046', 'Student', 'Agate', 16, '2010-10-26 07:41:56', 0, 1, 'Chemical Engineering', '1', 0, '', '', '', 'master', '', '0', ''),
('', 75, '205109046', 'Student', 'Agate', 1, '2010-10-26 07:42:36', 0, 1, 'Chemical Engineering', '4', 1, '', '', '', 'master', '', '0', ''),
('', 76, '205109046', 'Student', 'Agate', 1, '2010-10-26 07:43:10', 2, 1, 'Chemical Engineering', '77', 0, '', '', '', 'master', 'p1', '9658746542', ''),
('', 77, '205109046', 'Student', 'Agate', 0, '2010-10-26 07:45:56', 1, 1, 'Chemical Engineering', '1', 0, '', '0', '', 'master', 'p1', '9658746542', ''),
('', 78, '205109046', 'Student', 'Agate', 0, '2010-10-26 07:46:45', 1, 1, 'Chemical Engineering', '1', 0, '0', '0', '', 'master', 'p1', '9658746542', ''),
('', 79, '205109046', 'Student', 'Agate', 31, '2010-10-26 07:47:08', 1, 1, 'Chemical Engineering', '11', 0, '0', '0', '', 'master', 'p1', '9658746542', ''),
('', 80, 'Vgdy', 'Faculty', 'Architecture', 0, '2010-10-26 07:51:58', 0, 3, 'Chemistry', 'NotApplicable', 0, '0', '0', '', '205109011', '', '0', ''),
('', 81, '12', 'Student', 'Agate', 0, '2010-10-26 08:07:31', 0, 1, 'Architecture', '1', 0, '0', '0', '', 'master', '', '0', ''),
('', 82, '205109046', 'Student', 'Agate', 0, '2010-10-26 08:07:47', 0, 1, 'Chemical Engineering', '1', 0, '0', '0', '', 'master', '', '0', ''),
('', 83, '205109046', 'Student', 'Agate', 0, '2010-10-26 08:09:48', 0, 1, 'Architecture', '1', 7, '0', '0', '', 'master', '', '0', ''),
('', 84, 'master', 'Student', 'Agate', 0, '2010-10-26 08:24:31', 0, 1, 'Chemical Engineering', '4', 0, '0', '0', '', 'master', '', '0', ''),
('', 85, 'master', 'Student', 'Agate', 0, '2010-10-26 08:24:41', 0, 1, 'Chemical Engineering', '123', 7, '0', '0', '', 'master', '', '0', ''),
('', 86, 'asdfghjkl', 'Student', 'Agate', 31, '2010-10-26 08:26:09', 0, 1, 'Chemical Engineering', '123', 7, '0', '0', '', 'master', '', '0', ''),
('', 87, 'master', 'Student', 'Agate', 0, '2010-10-26 08:26:56', 0, 1, 'Chemical Engineering', '1111111', 7, '0', '0', '', 'master', '', '0', ''),
('', 88, 'master', 'Student', 'Agate', 0, '2010-10-26 08:27:16', 0, 1, 'Chemical Engineering', '111', 4, '0', '0', '', 'master', '', '0', ''),
('', 89, 'master', 'Student', 'Agate', 0, '2010-10-26 08:28:24', 0, 1, 'Chemical Engineering', '111', 7, '0', '0', '', 'master', '', '0', ''),
('', 90, 'master', 'Student', 'Agate', 10, '2010-10-26 08:41:59', 0, 1, 'Chemical Engineering', '11', 7, '0', '0', '', '205109046', '', '0', ''),
('', 91, '205109046', 'Student', 'Agate', 0, '2010-10-28 12:26:46', 0, 1, 'Chemical Engineering', '11', 7, '0', '0', '', '205109046', '', '0', ''),
('', 92, 'Vipul Kumar', 'Student', 'Zircon-B', 1, '2010-10-28 12:56:11', 0, 1, 'Computer Applications', '70', 1, '0', '0', '9047551928', '205109011', '', '0', ''),
('', 93, 'Mari Ganesan', 'Student', 'Zircon-B', 6, '2010-12-20 09:26:17', 0, 1, 'Computer Applications', '46', 1, '0', '0', '9566425725', '205109006', '', '0', ''),
('', 94, 'abhishek', 'Student', 'Sapphire', 16, '2011-02-10 04:09:19', 0, 1, 'Computer Science and Engineering', '34', 7, '0', '0', '8124271597', '106108098', '', '0', ''),
('', 95, 'Nagasundaram', 'Student', 'Agate', 8, '2011-02-10 07:50:50', 0, 1, 'Computer Applications', 'Amber103', 7, '0', '0', '', '205110006', '', '0', ''),
('', 96, 'mukesh kumar', 'Student', 'Garnett-B', 8, '2011-02-15 09:07:21', 0, 1, 'Computer Science and Engineering', '26', 1, '0', '0', '9092232215', '106109047', '', '0', ''),
('', 97, 'ajit kumar', 'Student', 'Garnett-A', 1, '2011-02-15 09:08:36', 0, 1, 'Computer Science and Engineering', '86', 1, '0', '0', '9025382605', '106109047', '', '0', ''),
('', 98, 'Divya bharthi', 'Student', 'Opal-A', 0, '2011-03-31 06:39:09', 0, 1, 'Mechanical Engineering', '79', 2, '0', '0', '', '111108009', '', '0', ''),
('', 99, 'Gaurav Kumar', 'Student', 'Garnett-B', 2, '2011-04-09 08:54:12', 0, 1, 'Electrical and Electronics Engineering', '95', 1, '0', '0', '8144225258', '107109025', '', '0', ''),
('', 100, 'Dhruv Kumar Vadsara', 'Student', 'Zircon-B', 18, '2011-08-05 10:25:04', 0, 1, 'Electronics and Communication Engineering', 'Zircon C 214', 1, '0', '0', '09843260901', '108110024', '', '0', ''),
('', 101, 'Abhijeet Ramanand', 'Student', 'Zircon-B', 1, '2011-09-08 08:53:22', 0, 1, 'Electrical and Electronics Engineering', 'Zircon -c 240', 1, '0', '0', '', '107110001', '', '0', ''),
('', 102, 'sumanta', 'Student', 'Jade', 3, '2011-09-08 13:32:06', 0, 1, 'Computer Applications', '100', 1, '0', '0', '8144238770', '216111004', '', '0', ''),
('', 103, 'naveen', 'Student', 'Garnett-B', 28, '2011-09-18 10:04:29', 0, 1, 'Instrumentation and Control Engineering', '35', 1, '0', '0', '', '110109017', '', '0', ''),
('', 104, 'ARIMA', 'Student', 'Garnett-A', 1, '2011-09-23 07:23:58', 0, 1, 'Electrical and Electronics Engineering', '36', 1, '0', '0', '9176494976', '107109094', '', '0', ''),
('', 105, 'Gokkula Sudan R', 'Student', 'Zircon-A', 8, '2012-04-10 07:12:12', 0, 1, 'Computer Science and Engineering', '72', 1, '0', '0', '+919940101230', '106110027', '', '0', ''),
('', 106, 'SELVENDRAN S', 'Student', 'Diamond', 15, '2012-04-16 10:30:08', 0, 1, 'Electrical and Electronics Engineering', '3', 3, '0', '0', '9003243401', '107111085', '', '0', ''),
('', 107, 'rajeev dwivedi', 'Student', 'Garnett-A', 0, '2012-08-07 12:37:21', 0, 1, 'Computer Applications', '141', 7, '0', '0', '', '205111049', '', '0', ''),
('', 108, 'master', 'Student', 'Computer Applications', 2, '2012-09-15 13:41:01', 0, 3, 'Computer Applications', 'NotApplicable', 8, '0', '0', '', 'userb', '', '0', ''),
('', 109, 'master', 'Student', 'Computer Applications', 2, '2012-09-15 13:45:40', 0, 3, 'Computer Applications', 'NotApplicable', 8, '0', '0', '', 'userb', '', '0', ''),
('', 110, 'master', 'Student', 'Computer Applications', 2, '2012-09-15 13:45:55', 0, 3, 'Computer Applications', 'NotApplicable', 8, '0', '0', '', 'userb', '', '0', ''),
('', 111, '8903600468', 'Student', 'Agate', 1, '2012-09-15 13:46:12', 0, 1, 'Chemical Engineering', '110', 3, '0', '0', '', 'userb', '', '0', ''),
('', 112, '8903600468', 'Student', 'Agate', 1, '2012-09-15 13:46:33', 0, 1, 'Chemical Engineering', '110', 3, '0', '0', '', 'userb', '', '0', ''),
('', 113, '8903600468', 'Student', 'Agate', 1, '2012-09-15 13:46:42', 0, 1, 'Chemical Engineering', '110', 3, '0', '0', '', 'userb', '', '0', ''),
('', 114, '8903600468', 'Student', 'Agate', 1, '2012-09-15 13:46:49', 0, 1, 'Chemical Engineering', '110', 3, '0', '0', '', 'userb', '', '0', ''),
('', 115, '8903600468', 'Student', 'Agate', 1, '2012-09-15 13:46:54', 0, 1, 'Chemical Engineering', '110', 3, '0', '0', '', 'userb', '', '0', ''),
('', 116, '8903600468', 'Student', 'Agate', 1, '2012-09-15 13:46:59', 0, 1, 'Chemical Engineering', '110', 3, '0', '0', '', 'userb', '', '0', ''),
('', 117, '8903600468', 'Student', 'Agate', 1, '2012-09-15 13:47:13', 0, 1, 'Chemical Engineering', '110', 3, '0', '0', '', 'userb', '', '0', ''),
('', 118, '8903600468', 'Student', 'Agate', 1, '2012-09-15 13:47:18', 0, 1, 'Chemical Engineering', '110', 3, '0', '0', '', 'userb', '', '0', ''),
('', 119, '8903600468', 'Student', 'Agate', 1, '2012-09-15 13:47:22', 0, 1, 'Chemical Engineering', '110', 3, '0', '0', '', 'userb', '', '0', ''),
('', 120, '8903600468', 'Student', 'Agate', 1, '2012-09-15 13:47:28', 0, 1, 'Chemical Engineering', '110', 3, '0', '0', '', 'userb', '', '0', ''),
('', 121, '8903600468', 'Student', 'Agate', 1, '2012-09-15 13:47:30', 0, 1, 'Chemical Engineering', '110', 3, '0', '0', '', 'userb', '', '0', ''),
('', 122, '8903600468', 'Student', 'Agate', 1, '2012-09-15 13:47:35', 0, 1, 'Chemical Engineering', '110', 3, '0', '0', '', 'userb', '', '0', ''),
('', 123, '8903600468', 'Student', 'Agate', 1, '2012-09-15 13:47:40', 0, 1, 'Chemical Engineering', '110', 3, '0', '0', '', 'userb', '', '0', ''),
('', 124, '8903600468', 'Student', 'Agate', 1, '2012-09-15 13:48:12', 0, 1, 'Chemical Engineering', '110', 3, '0', '0', '', 'userb', '', '0', ''),
('', 125, '8903600468', 'Student', 'Agate', 1, '2012-09-15 13:50:07', 0, 1, 'Chemical Engineering', '110', 3, '0', '0', '', 'userb', '', '0', ''),
('', 126, '8903600468', 'Student', 'Agate', 1, '2012-09-15 13:51:23', 0, 1, 'Chemical Engineering', '110', 3, '0', '0', '', 'userb', '', '0', ''),
('', 127, '8903600468', 'Student', 'Agate', 1, '2012-09-15 13:51:25', 0, 1, 'Chemical Engineering', '110', 3, '0', '0', '', 'userb', '', '0', ''),
('', 128, '8903600468', 'Student', 'Agate', 1, '2012-09-15 13:52:24', 0, 1, 'Chemical Engineering', '110', 3, '0', '0', '', 'userb', '', '0', ''),
('', 129, '8903600468', 'Student', 'Agate', 1, '2012-09-15 13:52:52', 1, 1, 'Chemical Engineering', '110', 3, '0', '0', '', 'userb', 'Mag', '9696969696', ''),
('', 130, '8903600468', 'Student', 'Agate', 1, '2012-09-15 13:52:59', 0, 1, 'Chemical Engineering', '110', 3, '0', '0', '', 'userb', '', '0', ''),
('', 131, '8903600468', 'Student', 'Agate', 1, '2012-09-15 13:53:01', 0, 1, 'Chemical Engineering', '110', 3, '0', '0', '', 'userb', '', '0', ''),
('', 132, '8903600468', 'Student', 'Agate', 1, '2012-09-15 13:53:04', 0, 1, 'Chemical Engineering', '110', 3, '0', '0', '', 'userb', '', '0', ''),
('', 133, '8903600468', 'Student', 'Agate', 1, '2012-09-15 13:53:09', 0, 1, 'Chemical Engineering', '110', 3, '0', '0', '', 'userb', '', '0', ''),
('', 134, '8903600468', 'Student', 'Agate', 1, '2012-09-15 13:53:13', 0, 1, 'Chemical Engineering', '110', 3, '0', '0', '', 'userb', '', '0', ''),
('', 135, '8903600468', 'Student', 'Agate', 1, '2012-09-15 13:53:27', 0, 1, 'Chemical Engineering', '110', 3, '0', '0', '', 'userb', '', '0', ''),
('', 136, '8903600468', 'Student', 'Agate', 1, '2012-09-15 13:57:06', 0, 1, 'Chemical Engineering', '110', 3, '0', '0', '', 'userb', '', '0', ''),
('', 137, '8903600468', 'Student', 'Agate', 1, '2012-09-15 13:57:21', 0, 1, 'Chemical Engineering', '110', 3, '0', '0', '', 'userb', '', '0', ''),
('', 138, '8903600468', 'Student', 'Agate', 1, '2012-09-15 13:57:54', 1, 1, 'Chemical Engineering', '110', 3, '0', '0', '', 'userb', 'kjfdsghkfdjhg', '8394893489', ''),
('', 139, '8903600468', 'Student', 'A', 8, '2012-09-15 13:59:12', 1, 2, 'Chemical Engineering', '25', 7, '0', '0', '', 'userc', 'Josh', '1125221145', ''),
('', 140, '8903600468', 'Student', 'A', 8, '2012-09-15 14:00:12', 1, 2, 'Chemical Engineering', '25', 7, '0', '0', '', 'userc', 'Mason', '2147483647', ''),
('', 141, '8903600468', 'Faculty', 'C', 1, '2012-09-15 14:07:23', 1, 2, 'Chemistry', '20', 7, '0', '0', '', 'userb', 'Josh', '1125221145', ''),
('', 142, '8903600468', 'Faculty', 'C', 1, '2012-09-15 14:08:06', 1, 2, 'Chemistry', '20', 7, '0', '0', '', 'userb', '', '0', ''),
('', 143, '8903600468', 'Faculty', 'C', 1, '2012-09-15 14:08:20', 1, 2, 'Chemistry', '20', 7, '0', '0', '', 'userb', '', '0', ''),
('', 144, '8903600468', 'Faculty', 'D', 2, '2012-09-15 14:45:38', 1, 2, 'Chemistry', '20', 7, '0', '0', '', 'userb', 'PIHHVHER', '2147483647', ''),
('', 145, 'asdasd', 'Faculty', 'C', 1, '2012-09-15 15:02:14', 1, 2, 'Chemistry', '25', 7, '0', '0', '', 'usera', 'JSADHFJFD', '7834872384', ''),
('', 146, '8903600468', 'Faculty', 'C', 31, '2012-09-15 16:32:37', 0, 2, 'Chemistry', '20', 7, '0', '0', '', 'userc', '', '', ''),
('userb', 147, '8903600468', 'Faculty', 'D', 2, '2012-09-16 09:40:57', 0, 2, 'Chemistry', '20', 7, '0', '0', '', 'userb', 'MSDMSDM', '48934893', ''),
('userb', 148, '8903600468', 'Faculty', 'D', 2, '2012-09-16 09:41:38', 0, 2, 'Chemistry', '20', 7, '0', '0', '', 'userb', 'MSDMSDM', '48934893', ''),
('userb', 149, '8903600468', 'Faculty', 'D', 2, '2012-09-16 09:41:58', 1, 2, 'Chemistry', '20', 7, '0', '0', '', 'userb', 'MSDMSDM', '48934893', ''),
('usera', 150, 'USERONE', 'Student', 'Zircon-A', 2, '2012-09-26 10:12:38', 0, 1, 'Computer Applications', '120', 1, '0', '0', '9629587387', 'usera', '', '', ''),
('usera', 151, 'Ram', 'Faculty', 'A', 2, '2012-10-04 07:34:31', 0, 2, 'Chemistry', '123', 7, '0', '0 - Saturday(9am to 5pm)', '962000000', 'usera', '', '', '0'),
('usera', 152, 'Ram', 'Faculty', 'A', 2, '2012-10-04 07:36:30', 0, 2, 'Chemistry', '123', 7, '0', '0 - Saturday(9am to 5pm)', '962000000', 'usera', '', '', '0'),
('usera', 153, 'Shanrtha', 'Student', 'Diamond', 8, '2012-10-04 11:27:19', 0, 1, 'Computer Applications', '120', 7, '0', 'Evening(4pm to 6pm) - 0', '9568475621', 'usera', '', '', '0');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE IF NOT EXISTS `feedback` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `user` varchar(50) NOT NULL,
  `feed` text NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `user`, `feed`, `time`) VALUES
(20, '205107007', 'dsfsdfdsfsdfsdfsd', '2009-04-22 11:08:35'),
(21, '205107007', 'wfsd', '2009-11-06 09:25:09'),
(22, '205109011', 'Nice Work!!! :)', '2010-10-28 12:57:07'),
(23, '110107018', 'There is no Lapis in hostel list', '2011-03-11 13:49:47');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE IF NOT EXISTS `inventory` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `item` varchar(50) NOT NULL,
  `quantity` int(10) NOT NULL,
  `cost` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`id`, `item`, `quantity`, `cost`) VALUES
(1, 'TubeLight', 135, 100),
(2, 'Fan', 82, 200),
(3, 'Switch', 104, 300),
(4, 'Plugpoint', 110, 200),
(5, 'Regulator', 104, 200);

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE IF NOT EXISTS `locations` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `hostel` varchar(50) DEFAULT NULL,
  `department` varchar(50) DEFAULT NULL,
  `mess` varchar(50) DEFAULT NULL,
  `other` varchar(50) DEFAULT NULL,
  `street` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `hostel`, `department`, `mess`, `other`, `street`) VALUES
(1, 'Agate', 'Architecture', 'Mess A', 'Library', 'A'),
(2, 'Beryl', 'Chemical Engineering', 'Mess B', 'Sports Complex', 'B'),
(3, 'Coral', 'Chemistry', 'Mess C', 'Octagon', 'C'),
(4, 'Diamond', 'Civil Engineering', 'Mess D', 'Annexe Lab', 'D'),
(5, 'Emerald', 'Computer Applications', 'Mess E', 'Admin Block', 'E'),
(6, 'Pearl', 'Computer Science and Engineering', 'Mess F', NULL, 'F'),
(7, 'Topaz', 'Electrical and Electronics Engineering', 'Mess G', NULL, 'G'),
(8, 'Sapphire', 'Electronics and Communication Engineering', NULL, NULL, 'H'),
(9, 'Jade', 'Humanities (English)', NULL, NULL, 'Temple'),
(10, 'Ruby', 'Instrumentation and Control Engineering', NULL, NULL, NULL),
(11, 'Opal-A', 'Management Studies', NULL, NULL, NULL),
(12, 'Garnett-A', 'Mathematics', NULL, NULL, NULL),
(13, 'Garnett-B', 'Mechanical Engineering', NULL, NULL, NULL),
(14, 'Zircon-A', 'Metallurgical and Materials Engineering', NULL, NULL, NULL),
(15, 'Zircon-B', 'Physics', NULL, NULL, NULL),
(16, 'Opal-B', 'Production Engineering', NULL, NULL, NULL),
(17, 'Opal-C', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `materials`
--

CREATE TABLE IF NOT EXISTS `materials` (
  `indentNo` int(100) NOT NULL AUTO_INCREMENT,
  `complaintNo` varchar(100) NOT NULL,
  `fan` int(11) NOT NULL,
  `tubelight` int(11) NOT NULL,
  `switch` int(11) NOT NULL,
  `plugPoint` int(11) NOT NULL,
  `regulator` int(11) NOT NULL,
  `fan_used` int(100) DEFAULT NULL,
  `tubelight_used` int(100) DEFAULT NULL,
  `switch_used` int(100) DEFAULT NULL,
  `plugPoint_used` int(100) DEFAULT NULL,
  `regulator_used` int(100) DEFAULT NULL,
  `status` int(10) NOT NULL DEFAULT '1',
  `indentOpen_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `indentClose_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`indentNo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=43 ;

--
-- Dumping data for table `materials`
--

INSERT INTO `materials` (`indentNo`, `complaintNo`, `fan`, `tubelight`, `switch`, `plugPoint`, `regulator`, `fan_used`, `tubelight_used`, `switch_used`, `plugPoint_used`, `regulator_used`, `status`, `indentOpen_date`, `indentClose_date`) VALUES
(7, 'EL100251', 1, 2, 3, 4, 5, 1, 1, 2, 1, 2, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(17, 'EL1929291', 2, 0, 0, 0, 0, 2, 0, 0, 0, 0, 2, '0000-00-00 00:00:00', '2012-10-31 19:44:37'),
(34, 'ET0098', 4, 0, 0, 0, 0, 2, 0, 0, 0, 0, 2, '0000-00-00 00:00:00', '2012-10-31 19:39:20'),
(35, 'TEST', 2, 12, 11, 7, 8, 2, 2, 2, 2, 2, 2, '0000-00-00 00:00:00', '2012-10-31 19:31:05'),
(40, 'TestNew', 2, 2, 2, 2, 4, 2, 2, 2, 2, 2, 2, '2012-10-30 16:55:56', '2012-10-31 19:43:00'),
(41, 'IN005,IN87', 2, 0, 0, 0, 0, 1, NULL, NULL, NULL, NULL, 2, '2012-10-31 17:26:57', '2012-10-31 17:27:05'),
(42, 'EL0007899', 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, '2012-10-31 17:32:05', '2012-10-31 19:42:02');

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE IF NOT EXISTS `report` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `itemid` int(10) unsigned NOT NULL,
  `quantity` int(10) unsigned NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `noOfcomplaints` bigint(20) unsigned NOT NULL,
  `cost` float unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`id`, `itemid`, `quantity`, `time`, `noOfcomplaints`, `cost`) VALUES
(1, 1, 5, '2009-04-23 06:02:27', 6, 500),
(2, 2, 13, '2009-11-06 09:27:50', 10, 2600),
(3, 3, 5, '2009-11-06 11:34:38', 6, 1500),
(4, 4, 5, '2009-11-06 11:40:37', 6, 1000),
(5, 5, 5, '2012-10-31 18:52:30', 6, 1000);

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE IF NOT EXISTS `transaction` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item` varchar(50) NOT NULL,
  `quantity` int(10) NOT NULL,
  `cost` float NOT NULL,
  `trans_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`id`, `item`, `quantity`, `cost`, `trans_date`) VALUES
(1, 'Switch', 10, 10, '2012-10-31 18:34:43');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` tinyint(1) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`) VALUES
(1, 'master', '0f869632dedf073cb0587e8dfa43ec94c872abfc', 5),
(2, 'user1', '0f869632dedf073cb0587e8dfa43ec94c872abfc', 2),
(3, 'user2', '0f869632dedf073cb0587e8dfa43ec94c872abfc', 3),
(4, 'user3', '0f869632dedf073cb0587e8dfa43ec94c872abfc', 4),
(5, 'master1', 'master1', 5),
(6, 'usera', 'usera', 1),
(7, 'userb', 'userb', 2),
(8, 'userc', 'userc', 3),
(9, 'userd', 'userd', 4);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
