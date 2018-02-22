-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 24, 2017 at 01:27 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `finaldata`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE IF NOT EXISTS `accounts` (
  `sno` int(11) NOT NULL AUTO_INCREMENT,
  `accountNo` varchar(100) NOT NULL,
  PRIMARY KEY (`sno`),
  UNIQUE KEY `accountNo` (`accountNo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`sno`, `accountNo`) VALUES
(1, '1234567890'),
(2, '1234567891'),
(3, '1234567892'),
(4, '1234567893'),
(5, '1234567894'),
(6, '1234567895'),
(7, '1234567896'),
(8, '1234567897'),
(9, '1234567898'),
(10, '1234567899'),
(11, '1234567900'),
(12, '1234567901');

-- --------------------------------------------------------

--
-- Table structure for table `accountsummary`
--

CREATE TABLE IF NOT EXISTS `accountsummary` (
  `sno` int(11) NOT NULL AUTO_INCREMENT,
  `accountNo` varchar(15) NOT NULL,
  `date` varchar(1000) NOT NULL,
  `opening` varchar(1000) NOT NULL,
  `closing` varchar(1000) NOT NULL,
  `expenditure` varchar(1000) NOT NULL,
  `ip` varchar(20) NOT NULL,
  `uptime` varchar(11) NOT NULL,
  PRIMARY KEY (`sno`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `accountsummary`
--

INSERT INTO `accountsummary` (`sno`, `accountNo`, `date`, `opening`, `closing`, `expenditure`, `ip`, `uptime`) VALUES
(4, '1234567891', '2017-02-28', '456757', '75765', '6576', '::1', '2017-Feb-28');

-- --------------------------------------------------------

--
-- Table structure for table `cashinhand`
--

CREATE TABLE IF NOT EXISTS `cashinhand` (
  `sno` int(11) NOT NULL AUTO_INCREMENT,
  `accountNo` varchar(15) NOT NULL,
  `date` varchar(1000) NOT NULL,
  `opening` varchar(1000) NOT NULL,
  `closing` varchar(1000) NOT NULL,
  `expenditure` varchar(1000) NOT NULL,
  `ip` varchar(20) NOT NULL,
  `uptime` varchar(11) NOT NULL,
  PRIMARY KEY (`sno`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `cashinhand`
--

INSERT INTO `cashinhand` (`sno`, `accountNo`, `date`, `opening`, `closing`, `expenditure`, `ip`, `uptime`) VALUES
(4, '1234567891', '2017-02-28', '456757', '75765', '6576', '::1', '2017-Feb-28'),
(5, '1234567890', '2017-03-01', '58', '567578', '576', '::1', '2017-Mar-01');

-- --------------------------------------------------------

--
-- Table structure for table `constants`
--

CREATE TABLE IF NOT EXISTS `constants` (
  `sno` int(12) NOT NULL AUTO_INCREMENT,
  `key` varchar(10000) NOT NULL,
  `value` varchar(10000) NOT NULL,
  PRIMARY KEY (`sno`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `constants`
--

INSERT INTO `constants` (`sno`, `key`, `value`) VALUES
(1, 'LastApCode', '69');

-- --------------------------------------------------------

--
-- Table structure for table `f_dep`
--

CREATE TABLE IF NOT EXISTS `f_dep` (
  `sno` int(5) NOT NULL AUTO_INCREMENT,
  `dep_name` varchar(1000) NOT NULL,
  `amount` int(10) NOT NULL,
  `hits` int(5) NOT NULL,
  PRIMARY KEY (`sno`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=53 ;

--
-- Dumping data for table `f_dep`
--

INSERT INTO `f_dep` (`sno`, `dep_name`, `amount`, `hits`) VALUES
(1, 'Building Constructions', 0, 0),
(2, 'Staff Salaries', 0, 0),
(3, 'Mess Charges', 0, 0),
(4, 'Security,HouseKeeping', 0, 0),
(5, 'Electricity', 0, 0),
(6, 'Electrical Maintenance', 0, 0),
(7, 'Advertisement Charges', 0, 0),
(8, 'Books and Periodicals', 0, 0),
(9, 'Computer Peripherals', 0, 0),
(10, 'Conference/Summer Workshop', 0, 0),
(11, 'AMC Laptops', 0, 0),
(12, 'E-Journals', 0, 0),
(13, 'Audit Fee', 0, 0),
(14, 'BSN Net Deposited', 0, 0),
(15, 'Dobi Charges', 0, 0),
(16, 'Dust & Pest', 0, 0),
(17, 'Remuneration', 0, 0),
(18, 'Lifts AMC', 0, 0),
(19, 'Furniture ', 0, 0),
(20, 'Generator Maintanance', 0, 0),
(21, 'Gardening', 0, 0),
(22, 'Nanososium', 0, 0),
(23, 'Lab Consumables', 0, 0),
(24, 'Lab Equipment', 0, 0),
(25, 'Labor Charge', 0, 0),
(26, 'Library Books', 0, 0),
(27, 'Medical Expenses', 0, 0),
(28, 'Office Expenses', 0, 0),
(29, 'Placement Expenses', 0, 0),
(30, 'Krishna Water Charges', 0, 0),
(31, 'Plumbing material', 0, 0),
(32, 'Postage and Telephone', 0, 0),
(33, 'Printing and Stationary', 0, 0),
(34, 'Professional Tax', 0, 0),
(35, 'Property Tax', 0, 0),
(36, 'R.O Plant maintenance', 0, 0),
(37, 'Repairs and Maintenance', 6676576, 4),
(38, 'Refrigerator', 0, 0),
(39, 'Mattress and Pillows', 0, 0),
(40, 'National Events', 17340, 6),
(41, 'Sports Equipment', 0, 0),
(42, 'STP Plant Maintenance', 0, 0),
(43, 'STP Treated Water', 0, 0),
(44, 'TA and DA Expenses', 0, 0),
(45, 'Uniform/Show and sockss', 0, 0),
(46, 'Transport Expenses', 0, 0),
(47, 'Travelling Expenses', 0, 0),
(48, 'Vehicle Maintenance ', 0, 0),
(49, 'Vehicle Insurance ', 0, 0),
(50, 'Washing Machine', 0, 0),
(51, 'Water&Plumbing', 0, 0),
(52, 'White Board markers', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `f_users`
--

CREATE TABLE IF NOT EXISTS `f_users` (
  `sno` int(9) NOT NULL AUTO_INCREMENT,
  `f_id` varchar(100) NOT NULL,
  `f_pwd` varchar(100) NOT NULL,
  PRIMARY KEY (`sno`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `f_users`
--

INSERT INTO `f_users` (`sno`, `f_id`, `f_pwd`) VALUES
(1, 'Shyam', 'eed807024939b808083f0031a56e9872'),
(2, 'Director', 'eed807024939b808083f0031a56e9872'),
(3, 'AO', '2c64c5cf613d8b9f4f7f3980d29aca10');

-- --------------------------------------------------------

--
-- Table structure for table `incomedep`
--

CREATE TABLE IF NOT EXISTS `incomedep` (
  `sno` int(10) NOT NULL AUTO_INCREMENT,
  `dep_name` varchar(10000) NOT NULL,
  `amount` int(20) NOT NULL,
  `hits` varchar(10) NOT NULL,
  PRIMARY KEY (`sno`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `incomedep`
--

INSERT INTO `incomedep` (`sno`, `dep_name`, `amount`, `hits`) VALUES
(1, 'Student Fee', 1000, ''),
(2, 'Scholarship', 2000, ''),
(3, 'Rental Income', 3000, ''),
(4, 'AP State', 24000, ''),
(5, 'Consultancy Receipt', 5000, ''),
(6, 'Other Income', 6000, '');

-- --------------------------------------------------------

--
-- Table structure for table `income_history`
--

CREATE TABLE IF NOT EXISTS `income_history` (
  `sno` int(10) NOT NULL AUTO_INCREMENT,
  `date` varchar(11) NOT NULL,
  `source` varchar(1000) NOT NULL,
  `amount` varchar(1000) NOT NULL,
  `from` varchar(20) NOT NULL,
  `to` varchar(20) NOT NULL,
  `details` mediumtext NOT NULL,
  `ip` varchar(30) NOT NULL,
  `lastupdatedtime` varchar(1000) NOT NULL,
  `filename` varchar(1000) NOT NULL,
  `payeename` varchar(1000) NOT NULL,
  PRIMARY KEY (`sno`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `income_history`
--

INSERT INTO `income_history` (`sno`, `date`, `source`, `amount`, `from`, `to`, `details`, `ip`, `lastupdatedtime`, `filename`, `payeename`) VALUES
(1, '2017-08-30', 'Rental Income', '10000', '1234567890', '1234567891', 'wesrkghiusadgf  weoafuasdh u uhwaiueawh iuas u uas ufe iuyh uo iud i o', '10.4.43.219', '', '', ''),
(7, '2017-02-27', 'AP State', '20000', '1234567890', 'Account2', 'ap state fund', '::1', '2017-Feb-28', 'd3cceadb73d8edf5fa6bbb234d082653.png', 'manoj kumar');

-- --------------------------------------------------------

--
-- Table structure for table `loginrequests`
--

CREATE TABLE IF NOT EXISTS `loginrequests` (
  `sno` int(5) NOT NULL AUTO_INCREMENT,
  `username` varchar(1000) NOT NULL,
  `status` varchar(100) NOT NULL,
  `intime` varchar(100) NOT NULL,
  `outime` varchar(100) NOT NULL,
  `ip` varchar(100) NOT NULL,
  PRIMARY KEY (`sno`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `loginrequests`
--

INSERT INTO `loginrequests` (`sno`, `username`, `status`, `intime`, `outime`, `ip`) VALUES
(1, 'shyam', 'Success', '2017-Feb-Mon-20 12:42:21 am02', '', '::1'),
(2, 'f', 'Failed', '2017-Feb-Mon-20 12:45:39 am02', '', '::1'),
(3, 'shyam', 'Success', '2017-Feb-Mon-20 12:47:26 am02', '', '::1'),
(4, 'shyam', 'Success', '2017-Feb-Mon-20 12:53:13 am02', '', '::1'),
(5, 'shyam', 'Success', '2017-Feb-Mon-20 12:54:25 am02', '2017-Feb-Mon-20 12:54:36 am02', '::1'),
(6, 'fo', 'Failed', '2017-Feb-Mon-20 12:56:14 am02', '', '::1'),
(7, 'shyam', 'Success', '2017-Feb-Mon-20 01:01:47 am02', '2017-Feb-Mon-20 01:04:52 am02', '::1'),
(8, 'shyam', 'Success', '2017-Feb-Mon-20 01:06:17 am02', '2017-Feb-Mon-20 01:07:06 am02', '::1'),
(9, 'shyam', 'Success', '2017-Feb-Mon-20 01:08:13 am02', '2017-Feb-Mon-20 01:24:24 am02', '::1'),
(10, 'Director', 'Success', '2017-Feb-Mon-20 01:24:31 am02', '', '::1'),
(11, 'shyam', 'Success', '2017-Feb-Mon-20 03:36:15 pm02', '', '::1'),
(12, 'shyam', 'Success', '2017-Feb-Mon-20 06:59:00 pm02', '', '::1'),
(13, 'shyam', 'Success', '2017-Feb-Tue-21 07:13:51 pm02', '', '::1'),
(14, 'shyam', 'Success', '2017-Feb-Fri-24 10:52:25 pm02', '2017-Feb-Fri-24 11:00:22 pm02', '::1'),
(15, 'shyam', 'Success', '2017-Feb-Sun-26 10:12:07 pm02', '', '::1'),
(16, 'shyam', 'Success', '2017-Feb-Mon-27 12:36:39 pm02', '', '::1'),
(17, 'shyam', 'Success', '2017-Feb-Mon-27 09:29:02 pm02', '', '::1'),
(18, 'shyan', 'Failed', '2017-Feb-Tue-28 09:55:54 am02', '', '::1'),
(19, 'shyam', 'Success', '2017-Feb-Tue-28 09:56:03 am02', '', '::1'),
(20, 'shyam', 'Success', '2017-Feb-Tue-28 04:24:25 pm02', '', '::1'),
(21, 'shyam', 'Success', '2017-Mar-Wed-01 03:34:28 pm03', '2017-Mar-Wed-01 04:17:05 pm03', '::1'),
(22, 'director', 'Success', '2017-Mar-Wed-01 04:17:26 pm03', '', '::1'),
(23, '', 'Failed', '2017-Mar-Thu-02 11:01:11 pm03', '', '::1'),
(24, 'shyam', 'Success', '2017-Mar-Mon-06 05:41:40 pm03', '', '::1'),
(25, 'shyam', 'Success', '2017-Mar-Tue-07 04:51:55 pm03', '', '::1'),
(26, 'shyam', 'Success', '2017-Mar-Wed-15 05:01:07 am03', '', '::1'),
(27, 'fo', 'Failed', '2017-Mar-Fri-24 04:24:20 am03', '', '::1'),
(28, 'shyam', 'Success', '2017-Mar-Fri-24 04:24:30 am03', '2017-Mar-Fri-24 05:46:00 am03', '::1'),
(29, 'shyam', 'Success', '2017-Mar-Fri-24 04:39:20 am03', '', '10.4.43.101'),
(30, '', 'Failed', '2017-Mar-Fri-24 05:46:07 am03', '', '10.4.43.227'),
(31, '', 'Failed', '2017-Mar-Fri-24 05:46:13 am03', '', '10.4.43.227'),
(32, 'shyam', 'Success', '2017-Mar-Fri-24 05:47:09 am03', '', '10.4.43.227');

-- --------------------------------------------------------

--
-- Table structure for table `payment_history`
--

CREATE TABLE IF NOT EXISTS `payment_history` (
  `sno` int(5) NOT NULL AUTO_INCREMENT,
  `Date` varchar(1000) NOT NULL,
  `dep_name` varchar(10000) NOT NULL,
  `purpose` mediumtext NOT NULL,
  `proceeding_no` varchar(1000) NOT NULL,
  `amount` varchar(1000) NOT NULL,
  `check_no` varchar(100) NOT NULL,
  `from_account` varchar(100) NOT NULL,
  `to_account` varchar(100) NOT NULL,
  `status` int(10) NOT NULL,
  `ip` varchar(20) NOT NULL,
  `lastupdatedtime` varchar(100) NOT NULL,
  `filename` varchar(10000) NOT NULL,
  `payeename` varchar(10000) NOT NULL,
  `type` varchar(10000) NOT NULL,
  `sectiondep` varchar(10000) NOT NULL,
  `designation` varchar(10000) NOT NULL,
  `approvalStatus` varchar(100) NOT NULL DEFAULT '0',
  `approvalCode` varchar(1000) NOT NULL DEFAULT '0',
  PRIMARY KEY (`sno`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `payment_history`
--

INSERT INTO `payment_history` (`sno`, `Date`, `dep_name`, `purpose`, `proceeding_no`, `amount`, `check_no`, `from_account`, `to_account`, `status`, `ip`, `lastupdatedtime`, `filename`, `payeename`, `type`, `sectiondep`, `designation`, `approvalStatus`, `approvalCode`) VALUES
(1, '2017-02-14', 'Water&amp;Plumbing', 'repair motor', '123456789', '100', '1234567890', 'undefined', '123456789', 1, '::1', '2017-02-Tue', 'a6a0b0a91477087b00e41fc42970ef2c.pdf', '', '', '', '', '2', 'FY161700036'),
(2, '2017-02-14', 'Water&amp;Plumbing', 'repair motor', '123456789', '100', '1234567890', 'undefined', '123456789', 0, '::1', '2017-02-Tue', 'a6a0b0a91477087b00e41fc42970ef2c.pdf', '', '', '', '', '2', 'FY161700038'),
(3, '2017-02-14', 'Refrigerator', 'purpose', '12345678', '123', '1212512614276', '4764764674674', '764764674764', 0, '::1', '2017-02-Tue', '3303347b77efd850336540dd32bd49b6.png', '', '', '', '', '2', 'FY161700039'),
(4, '2017-02-15', 'R.O Plant maintenance', 'dadsfasdfasdfasd', '32412345', '4251245', '425235', '1421241', '2412414', 0, '::1', '2017-02-Wed', '346b2a46b22d6d795305e12b2d598ef1.pdf', '', '', '', '', '2', 'FY161700044'),
(5, '2017-02-15', 'R.O Plant maintenance', 'dadsfasdfasdfasd', '32412345', '4251245', '425235', '1421241', '2412414', 1, '::1', '2017-02-Wed', '346b2a46b22d6d795305e12b2d598ef1.pdf', '', '', '', '', '2', 'FY161700045'),
(6, '2017-02-16', 'Professional Tax', 'hs', 'hf', 'hg', 'gh', 'gf', 'gf', 0, '::1', '2017-02-Thu', '887ffd3d69c91364f39dc8637515a93e.pdf', '', '', '', '', '2', 'FY161700040'),
(7, '2017-02-16', 'Professional Tax', 'hs', 'hf', 'hg', 'gh', 'gf', 'gf', 0, '::1', '2017-02-Thu', '887ffd3d69c91364f39dc8637515a93e.pdf', '', '', '', '', '2', 'FY161700041'),
(8, '2017-02-16', 'Professional Tax', 'hs', 'hf', 'hg', 'gh', 'gf', 'gf', 1, '::1', '2017-02-Thu', '887ffd3d69c91364f39dc8637515a93e.pdf', '', '', '', '', '2', 'FY161700061'),
(9, '2017-02-16', 'R.O Plant maintenance', 'for the purpose for the puropse', 'inter/adfad/dsfasd/fasd/asdf/1237', '6000', '1234567890', 'undefined', '1234567890', 1, '::1', '2017-02-Thu', 'fd17dea2ac4d7be7215298cbe8a5df28.pdf', '', '', '', '', '2', 'FY161700062'),
(10, '2017-02-16', 'Refrigerator', 'for the purpose of checking', 'asdf/ghjk/1234/qwerty/zxvbnm123', '7000', '0987654321', 'Account6', '5895678901', 1, '::1', '2017-02-Thu', '50fe52618fc32b7217ca530ce5a059c0.pdf', '', '', '', '', '2', 'FY161700066'),
(11, '2017-02-16', 'Printing&amp;Stationary', 'testing purpose', 'dsaf/adfa/sadef/df/dasfads/123124/sdf/23', '60000', '1234567890', 'Account2', '0987654321', 1, '::1', '2017-02-Thu', '691ecb46a2702e0a72049080c8b8c07a.pdf', 'manojkumar', 'Advance', 'CSE', 'OTHERS', '2', 'FY161700067'),
(12, '2017-02-16', 'Professional Tax', 'manoj checking purpose', 'hdf/asdf/ds/f/asd/asd/fsd/f/asdf/asdf/sd/', '70000', '4635786798', 'Account2', '4253678904657', 1, '::1', '2017-02-Thu', '1cb02658b36c38d446e811ffeab7430d.pdf', 'manoj checing', 'Bill Settlement', 'MATHS', 'TEACHING', '2', 'FY161700068'),
(13, '2017-02-16', 'Professional Tax', 'manoj checking purpose', 'hdf/asdf/ds/f/asd/asd/fsd/f/asdf/asdf/sd/', '70000', '4635786798', 'Account2', '4253678904657', 1, '::1', '2017-02-Thu', '1cb02658b36c38d446e811ffeab7430d.pdf', 'manoj checing', 'Bill Settlement', 'MATHS', 'TEACHING', '2', 'FY161700069'),
(14, '2017-02-19', 'National Events', 'testing final time', 'dasf/asdf/sadf/asdf1/1223', '5780', '456785678', 'Account1', '32465789', 1, '::1', '2017-02-Sun', 'eef0eea3c6019bcd3fd5acef7c1535b0.jpg', '46789009', 'Advance', 'CSE', 'TEACHING', '0', 'FY161700057'),
(15, '2017-02-19', 'National Events', 'testing final time', 'dasf/asdf/sadf/asdf1/1223', '5780', '456785678', 'Account1', '32465789', 1, '::1', '2017-02-Sun', 'eef0eea3c6019bcd3fd5acef7c1535b0.jpg', '46789009', 'Advance', 'CSE', 'TEACHING', '2', 'FY161700058'),
(16, '2017-02-19', 'National Events', 'testing final time', 'dasf/asdf/sadf/asdf1/1223', '5780', '456785678', 'Account1', '32465789', 1, '::1', '2017-02-Sun', 'eef0eea3c6019bcd3fd5acef7c1535b0.jpg', '46789009', 'Advance', 'CSE', 'TEACHING', '2', 'FY161700059'),
(17, '2017-02-19', 'Repairs and Maintenance', 'rfaefa', 'fasdfga/fasdf/a/sdf/asd/f/a', '6676576', '3456789567', 'Account6', '758757858', 1, '::1', '2017-02-Sun', '4adfa13c1257a7b5dae8d4fcfb47e450.jpg', 'dasmfa', 'Bill Settlement', 'OTHERS', 'ADMINSTRATION', '2', 'FY161700060');

-- --------------------------------------------------------

--
-- Table structure for table `procurement`
--

CREATE TABLE IF NOT EXISTS `procurement` (
  `sno` int(5) NOT NULL AUTO_INCREMENT,
  `item` varchar(1000) NOT NULL,
  `qty` varchar(1000) NOT NULL,
  `dept` varchar(1000) NOT NULL,
  `pono` varchar(1000) NOT NULL,
  `date` varchar(1000) NOT NULL,
  `totalamount` varchar(10000) NOT NULL,
  `vendorname` varchar(1000) NOT NULL,
  `address` varchar(1000) NOT NULL,
  `contactno` varchar(100) NOT NULL,
  `tin` varchar(1000) NOT NULL,
  `paidamount` varchar(1000) NOT NULL,
  `nature` varchar(1000) NOT NULL,
  `approval` varchar(1000) NOT NULL,
  `file` mediumtext NOT NULL,
  `lastip` varchar(100) NOT NULL,
  `lastdate` varchar(100) NOT NULL,
  PRIMARY KEY (`sno`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
