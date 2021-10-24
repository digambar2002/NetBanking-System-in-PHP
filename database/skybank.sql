-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 01, 2021 at 02:23 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skybank`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL,
  `AccountNo` varchar(12) NOT NULL,
  `Balance` varchar(100) NOT NULL,
  `SavingBalance` varchar(100) NOT NULL,
  `SavingTarget` varchar(100) NOT NULL,
  `AccountType` text NOT NULL,
  `State` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `AccountNo`, `Balance`, `SavingBalance`, `SavingTarget`, `AccountType`, `State`) VALUES
(1, '417210931070', '211', '0.0', '', 'Saving', 0),
(3, '428211056080', '100.0', '0.0', '', 'Saving', 0),
(4, '430211112350', '400', '0.0', '', 'Saving', 0),
(5, '410211023120', '0.0', '0.0', '', 'Saving', 0),
(6, '410211027350', '0.0', '0.0', '', 'Saving', 0),
(7, '410211106420', '1900', '215', '1000', 'Saving', 0),
(8, '521211855380', '100', '', '', 'Saving', 0),
(9, '525211930120', '3620', '700', '2000', 'Saving', 0),
(10, '65210906260', '0.0', '', '', 'Saving', 0),
(11, '731211034570', '0.0', '0.0', '', 'Saving', 0),
(12, '805210624200', '4700', '0.0', '', 'Saving', 0);

-- --------------------------------------------------------

--
-- Table structure for table `cards`
--

CREATE TABLE `cards` (
  `srNo` int(11) NOT NULL,
  `AccountNo` varchar(12) NOT NULL,
  `Name` varchar(80) NOT NULL,
  `CardNo` varchar(16) NOT NULL,
  `cvv` int(3) NOT NULL,
  `IssuedDate` varchar(20) NOT NULL,
  `ExpiryDate` varchar(20) NOT NULL,
  `Status` varchar(12) NOT NULL,
  `Verified` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cards`
--

INSERT INTO `cards` (`srNo`, `AccountNo`, `Name`, `CardNo`, `cvv`, `IssuedDate`, `ExpiryDate`, `Status`, `Verified`) VALUES
(16, '410211106420', 'HARRY SHRIVASTAV', '0273121091056041', 743, '31/07/21', '07/31', 'Active', 'Yes'),
(19, '525211930120', 'KUNAL BARI', '5273121092425052', 542, '', '', 'Inactive', 'No'),
(20, '731211034570', 'LINA PATEL', '1273121103631073', 803, '', '', 'Inactive', 'No'),
(22, '805210624200', 'MEGHNA PATEL', '5280521063021080', 797, '05/08/21', '08/31', 'Active', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `customer_detail`
--

CREATE TABLE `customer_detail` (
  `C_No` int(11) NOT NULL,
  `Account_No` varchar(12) NOT NULL,
  `C_First_Name` text NOT NULL,
  `C_Last_Name` text NOT NULL,
  `Gender` text NOT NULL,
  `C_Father_Name` text NOT NULL,
  `C_Mother_Name` text NOT NULL,
  `C_Birth_Date` date NOT NULL,
  `C_Adhar_No` varchar(12) NOT NULL,
  `C_Pan_No` varchar(10) NOT NULL,
  `C_Mobile_No` varchar(10) NOT NULL,
  `C_Email` varchar(200) NOT NULL,
  `C_Pincode` varchar(6) NOT NULL,
  `C_Adhar_Doc` varchar(500) NOT NULL,
  `C_Pan_Doc` varchar(500) NOT NULL,
  `Create_Date` date NOT NULL DEFAULT current_timestamp(),
  `ProfileColor` varchar(100) NOT NULL,
  `ProfileImage` varchar(400) NOT NULL,
  `Bio` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_detail`
--

INSERT INTO `customer_detail` (`C_No`, `Account_No`, `C_First_Name`, `C_Last_Name`, `Gender`, `C_Father_Name`, `C_Mother_Name`, `C_Birth_Date`, `C_Adhar_No`, `C_Pan_No`, `C_Mobile_No`, `C_Email`, `C_Pincode`, `C_Adhar_Doc`, `C_Pan_Doc`, `Create_Date`, `ProfileColor`, `ProfileImage`, `Bio`) VALUES
(1, '410211023120', 'Admin', 'Bhai', 'Male', 'Jarvis', 'Alexa', '2002-01-01', '123456789011', 'DBCDD1234C', '6622894805', 'admin@gmail.com', '123456', 'customer_data/Adhar_doc/admin.jpg', 'customer_data/Pan_doc/Pan04102021102312.jpg', '2021-03-15', 'Blue', 'customer_data/Profile_Img/Admin.jpg', ''),
(2, '410211027350', 'Baban', 'Ambani', '', 'Cortana Mark Sharma', 'Alexa Skynet Sharma', '1999-05-01', '123456789012', 'SKYJA1234T', '1234567890', 'welcome@wel.com', '123456', 'customer_data/Adhar_doc/Pan04102021102735.jpg', 'customer_data/Pan_doc/D_c04102021102735.jpg', '2021-03-21', 'yellow', '', ''),
(3, '410211106420', 'Harry', 'Shrivastav', 'Male', 'Jarvisbaba Lucky Shrivastav', 'Cortana Jarvisbaba Shrivastav', '1997-01-10', '123456789013', 'WERTY1234Q', '9044327865', 'dummymail@gmail.com', '123456', 'customer_data/Adhar_doc/m204102021110642.png', 'customer_data/Pan_doc/m104102021110642.png', '2021-04-26', 'skyblue', '../customer_data/Profile_Img/v3_0355000Harry123.jpg', 'Hi I am Online'),
(4, '417210931070', 'Magan', 'Chaudhari', '', 'Salman', 'Katrina', '2002-04-18', '123456789017', 'ASDFG1234W', '8877994432', 'yemade8983@zcai66.com', '123456', 'customer_data/Adhar_doc/Adhar04172021093107.png', 'customer_data/Pan_doc/Pan04172021093107.jpg', '2021-04-17', 'Pink', '', ''),
(6, '428211056080', 'Megha', 'Chavhan', '', 'Magan', 'Masha', '1995-01-28', '123456789020', 'WERTY1234I', '4466239877', 'velidig313@iludir.com', '112345', 'customer_data/Adhar_doc/Adhar04282021105608.png', 'customer_data/Pan_doc/Pan04282021105608.jpg', '2021-04-28', 'Orange', '', ''),
(7, '430211112350', 'Sohan', 'Mital', '', 'Johan', 'Sara', '1990-09-30', '123456789022', 'WERTY1234R', '1234557890', 'rjzn5n5y8m@happy-new-year.top', '112345', 'customer_data/Adhar_doc/PngItem_508463404302021111235.png', 'customer_data/Pan_doc/Logo_final04302021111235.png', '2021-04-30', 'Red', '', ''),
(8, '521211855380', 'Rohit', 'Kumar', '', 'Sanjiv', 'Priyanka', '1995-01-21', '123456789018', 'OLXEW1234E', '7634564421', 'xebaw19064@geekale.com', '435306', 'customer_data/Adhar_doc/156480115131905212021185538.jpg', 'customer_data/Pan_doc/156480115117605212021185538.jpg', '2021-05-21', '#5aeb8f', '', ''),
(9, '525211930120', 'Kunal', 'Bari', 'Male', 'Ravindra', 'Ujwalla', '2002-10-28', '123456789021', 'KKLLR3245E', '8899456612', 'KunalBari@gmail.com', '425303', 'customer_data/Adhar_doc/testimonials-305252021193012.jpg', 'customer_data/Pan_doc/testimonials-205252021193012.jpg', '2021-05-25', '#b87b84', '../customer_data/Profile_Img/v3_0785098KunalB.jpg', 'Always Happy In My Life'),
(10, '65210906260', 'Gopal', 'Bhand', '', 'Sham', 'Isha', '1999-12-29', '123456789001', 'ASDFP1234L', '2266889944', 'mental@gmail.com', '123456', 'customer_data/Adhar_doc/2a3e152383712a5f4e5e1d42fa51ba2b0652021090626.jpg', 'customer_data/Pan_doc/photo-1566127992631-137a642a90f40652021090626.jpg', '2021-06-05', '#dec47a', '', ''),
(11, '731211034570', 'Lina', 'Patel', 'Female', 'Mohanlal Patel', 'Laxmi Patel', '1998-07-28', '123456789009', 'ASDFG1234P', '5588094476', 'rebof55478@insgogc.com', '123456', 'customer_data/Adhar_doc/BingWallpaper07312021103457.jpg', 'customer_data/Pan_doc/D_c07312021103457.jpg', '2021-07-31', '#f9a652', '', 'The purpose of our lives is to be happy'),
(12, '805210624200', 'Mohini', 'Patel', 'Female', 'Mohanlal Patel', 'Laxmi Patel', '1998-01-05', '123456789007', 'ASDFG1234Y', '5588094476', 'notyrota@microcreditoabruzzo.it', '123456', 'customer_data/Adhar_doc/Dummy-Aadhaar-Screenshot0852021062420.png', 'customer_data/Pan_doc/dummy-pan-card-unique-identity-260nw-16816655950852021062420.jpg', '2021-08-05', '#3916d7', '../customer_data/Profile_Img/v2_0529879Meghna.jpg', 'The purpose of our lives is to be happy');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `ID` int(11) NOT NULL,
  `AccountNo` varchar(12) NOT NULL,
  `Username` varchar(30) NOT NULL,
  `Password` varchar(40) NOT NULL,
  `Status` varchar(20) NOT NULL,
  `State` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`ID`, `AccountNo`, `Username`, `Password`, `Status`, `State`) VALUES
(1, '410211023120', 'Admin', '044568cbbe7dc05fcbd6f801676ac972', 'Super', 1),
(2, '410211027350', 'PinkuTata', '044568cbbe7dc05fcbd6f801676ac972', 'Active', 0),
(3, '410211106420', 'Harry321', '044568cbbe7dc05fcbd6f801676ac972', 'Active', 0),
(4, '417210931070', 'Digambar123', '434534a52a36369238901f7bbaa48c18', 'Active', 0),
(6, '428211056080', 'Many123', '044568cbbe7dc05fcbd6f801676ac972', 'Inactive', 0),
(7, '430211112350', 'Harrya12', '044568cbbe7dc05fcbd6f801676ac972', 'Active', 0),
(8, '521211855380', 'rohityeda', '044568cbbe7dc05fcbd6f801676ac972', 'Deactivated', 0),
(9, '525211930120', 'KunalB', '044568cbbe7dc05fcbd6f801676ac972', 'Active', 0),
(10, '65210906260', 'Gopal123', '044568cbbe7dc05fcbd6f801676ac972', 'Inactive', 0),
(11, '731211034570', 'LinaPatel', '044568cbbe7dc05fcbd6f801676ac972', 'Active', 0),
(12, '805210624200', 'Meghna', '044568cbbe7dc05fcbd6f801676ac972', 'Active', 0);

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `id` int(11) NOT NULL,
  `AccountNo` varchar(12) NOT NULL,
  `FAccountNo` varchar(12) NOT NULL,
  `Name` text NOT NULL,
  `Amount` varchar(100) NOT NULL,
  `Debit` varchar(100) NOT NULL,
  `Credit` varchar(100) NOT NULL,
  `Date` date NOT NULL DEFAULT current_timestamp(),
  `Status` text NOT NULL,
  `ProfileColor` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`id`, `AccountNo`, `FAccountNo`, `Name`, `Amount`, `Debit`, `Credit`, `Date`, `Status`, `ProfileColor`) VALUES
(1, '412211317400', '410211106420', 'Marry Mahajan', '-100', '100', '0.0', '2021-04-16', 'Debited', 'green'),
(2, '410211106420', '412211317400', 'Harry Shrivastav', '100', '0.0', '100', '2021-04-16', 'Credited', 'skyblue'),
(3, '410211106420', '412211317400', 'Marry Mahajan', '100', '0.0', '100', '2021-04-16', 'Credited', 'green'),
(4, '412211317400', '410211106420', 'Harry Shrivastav', '-100', '100', '0.0', '2021-04-16', 'Debited', 'skyblue'),
(5, '410211106420', '412211317400', 'Marry Mahajan', '100', '0.0', '100', '2021-04-16', 'Credited', 'green'),
(6, '412211317400', '410211106420', 'Harry Shrivastav', '100', '0.0', '100', '2021-04-16', 'Credited', 'skyblue'),
(7, '410211106420', '412211317400', 'Marry Mahajan', '-100', '100', '0.0', '2021-04-16', 'Debited', 'green'),
(8, '410211106420', '412211317400', 'Marry Mahajan', '200', '0.0', '200', '2021-04-16', 'Credited', 'green'),
(9, '412211317400', '410211106420', 'Harry Shrivastav', '-200', '200', '0.0', '2021-05-16', 'Debited', 'skyblue'),
(10, '410211106420', 'NA', 'SKY BANK', '200', '0.0', '200', '2021-05-16', 'Credited', 'blue'),
(11, '410211106420', 'NA', 'SKY BANK', '400', '0.0', '400', '2021-05-16', 'Credited', 'blue'),
(12, '412211317400', 'NA', 'SKY BANK', '300', '0.0', '300', '2021-05-16', 'Credited', 'blue'),
(13, '410211106420', 'NA', 'SKY BANK', '-100', '100', '0.0', '2021-05-16', 'Debited', 'blue'),
(14, '410211106420', 'NA', 'SKY BANK', '-100', '100', '0.0', '2021-05-16', 'Debited', 'blue'),
(15, '410211106420', '412211317400', 'Marry Mahajan', '200', '0.0', '200', '2021-05-21', 'Credited', 'green'),
(16, '412211317400', '410211106420', 'Harry Shrivastav', '-200', '200', '0.0', '2021-05-21', 'Debited', 'skyblue'),
(17, '410211106420', 'NA', 'SKY BANK', '-300', '300', '0.0', '2021-05-21', 'Debited', 'blue'),
(18, '412211317400', '410211106420', 'Harry Shrivastav', '200', '0.0', '200', '2021-05-21', 'Credited', 'skyblue'),
(19, '410211106420', '412211317400', 'Marry Mahajan', '-200', '200', '0.0', '2021-05-21', 'Debited', 'green'),
(20, '410211106420', 'NA', 'SKY BANK', '-100', '100', '0.0', '2021-05-21', 'Debited', 'blue'),
(21, '410211106420', '412211317400', 'Marry Mahajan', '175', '0.0', '175', '2021-05-21', 'Credited', 'green'),
(22, '412211317400', '410211106420', 'Harry Shrivastav', '-175', '175', '0.0', '2021-05-21', 'Debited', 'skyblue'),
(23, '410211106420', 'NA', 'SKY BANK', '-100', '100', '0.0', '2021-05-21', 'Debited', 'blue'),
(24, '412211317400', 'NA', 'SKY BANK', '400', '0.0', '400', '2021-05-21', 'Credited', 'blue'),
(25, '412211317400', 'NA', 'SKY BANK', '-110', '110', '0.0', '2021-05-21', 'Debited', 'blue'),
(26, '521211855380', 'NA', 'SKY BANK', '1000', '0.0', '1000', '2021-05-21', 'Credited', 'blue'),
(27, '521211855380', '410211106420', 'Harry Shrivastav', '400', '0.0', '400', '2021-05-21', 'Credited', 'skyblue'),
(28, '410211106420', '521211855380', 'Rohit Kumar', '-400', '400', '0.0', '2021-05-21', 'Debited', '#5aeb8f'),
(29, '410211106420', '521211855380', 'Rohit Kumar', '1300', '0.0', '1300', '2021-05-21', 'Credited', '#5aeb8f'),
(30, '521211855380', '410211106420', 'Harry Shrivastav', '-1300', '1300', '0.0', '2021-05-21', 'Debited', 'skyblue'),
(31, '410211106420', 'NA', 'SKY BANK', '500', '0.0', '500', '2021-05-22', 'Credited', 'blue'),
(32, '410211106420', 'NA', 'SKY BANK', '200', '0.0', '200', '2021-05-22', 'Credited', 'blue'),
(33, '410211106420', 'NA', 'SKY BANK', '-100', '100', '0.0', '2021-05-22', 'Debited', 'blue'),
(34, '412211317400', '410211106420', 'Harry Shrivastav', '20', '0.0', '20', '2021-05-23', 'Credited', 'skyblue'),
(35, '410211106420', '412211317400', 'Marry Mahajan', '-20', '20', '0.0', '2021-05-23', 'Debited', 'green'),
(36, '412211317400', '410211106420', 'Harry Shrivastav', '10', '0.0', '10', '2021-05-23', 'Credited', 'skyblue'),
(37, '410211106420', '412211317400', 'Marry Mahajan', '-10', '10', '0.0', '2021-05-23', 'Debited', 'green'),
(38, '412211317400', '410211106420', 'Harry Shrivastav', '10', '0.0', '10', '2021-05-23', 'Credited', 'skyblue'),
(39, '410211106420', '412211317400', 'Marry Mahajan', '-10', '10', '0.0', '2021-05-23', 'Debited', 'green'),
(40, '412211317400', '410211106420', 'Harry Shrivastav', '44', '0.0', '44', '2021-05-23', 'Credited', 'skyblue'),
(41, '410211106420', '412211317400', 'Marry Mahajan', '-44', '44', '0.0', '2021-05-23', 'Debited', 'green'),
(42, '412211317400', '410211106420', 'Harry Shrivastav', '11', '0.0', '11', '2021-05-23', 'Credited', 'skyblue'),
(43, '410211106420', '412211317400', 'Marry Mahajan', '-11', '11', '0.0', '2021-05-23', 'Debited', 'green'),
(44, '412211317400', '410211106420', 'Harry Shrivastav', '12', '0.0', '12', '2021-05-23', 'Credited', 'skyblue'),
(45, '410211106420', '412211317400', 'Marry Mahajan', '-12', '12', '0.0', '2021-05-23', 'Debited', 'green'),
(46, '412211317400', '410211106420', 'Harry Shrivastav', '10', '0.0', '10', '2021-05-23', 'Credited', 'skyblue'),
(47, '410211106420', '412211317400', 'Marry Mahajan', '-10', '10', '0.0', '2021-05-23', 'Debited', 'green'),
(48, '410211106420', '412211317400', 'Marry Mahajan', '200', '0.0', '200', '2021-05-23', 'Credited', 'green'),
(49, '412211317400', '410211106420', 'Harry Shrivastav', '-200', '200', '0.0', '2021-05-23', 'Debited', 'skyblue'),
(50, '417210931070', '412211317400', 'Marry Mahajan', '111', '0.0', '111', '2021-05-25', 'Credited', 'green'),
(51, '412211317400', '417210931070', 'Magan Chaudhari', '-111', '111', '0.0', '2021-05-25', 'Debited', 'Pink'),
(55, '525211930120', 'NA', 'SKY BANK', '5000', '0.0', '5000', '2021-05-25', 'Credited', 'blue'),
(56, '412211317400', '525211930120', 'Kunal Bari', '1000', '0.0', '1000', '2021-05-25', 'Credited', '#b87b84'),
(57, '525211930120', '412211317400', 'Marry Mahajan', '-1000', '1000', '0.0', '2021-05-25', 'Debited', 'green'),
(58, '412211317400', '525211930120', 'Kunal Bari', '10', '0.0', '10', '2021-05-25', 'Credited', '#b87b84'),
(59, '525211930120', '412211317400', 'Marry Mahajan', '-10', '10', '0.0', '2021-05-25', 'Debited', 'green'),
(60, '410211106420', '525211930120', 'Kunal Bari', '20', '0.0', '20', '2021-05-25', 'Credited', '#b87b84'),
(61, '525211930120', '410211106420', 'Harry Shrivastav', '-20', '20', '0.0', '2021-05-25', 'Debited', 'skyblue'),
(62, '412211317400', '525211930120', 'Kunal Bari', '20', '0.0', '20', '2021-05-25', 'Credited', '#b87b84'),
(63, '525211930120', '412211317400', 'Marry Mahajan', '-20', '20', '0.0', '2021-05-25', 'Debited', 'green'),
(64, '412211317400', '525211930120', 'Kunal Bari', '30', '0.0', '30', '2021-05-25', 'Credited', '#b87b84'),
(65, '525211930120', '412211317400', 'Marry Mahajan', '-30', '30', '0.0', '2021-05-25', 'Debited', 'green'),
(66, '412211317400', '525211930120', 'Kunal Bari', '200', '0.0', '200', '2021-05-25', 'Credited', '#b87b84'),
(67, '525211930120', '412211317400', 'Marry Mahajan', '-200', '200', '0.0', '2021-05-25', 'Debited', 'green'),
(70, '410211106420', '412211317400', 'Marry Mahajan', '30', '0.0', '30', '2021-05-26', 'Credited', 'green'),
(71, '412211317400', '410211106420', 'Harry Shrivastav', '-30', '30', '0.0', '2021-05-26', 'Debited', 'skyblue'),
(72, '410211106420', '412211317400', 'Marry Mahajan', '1000', '0.0', '	 1000', '2021-05-26', 'Credited', 'green'),
(73, '412211317400', '410211106420', 'Harry Shrivastav', '-1000', '	 1000', '0.0', '2021-05-26', 'Debited', 'skyblue'),
(74, '410211106420', '412211317400', 'Marry Mahajan', '40', '0.0', '40', '2021-05-26', 'Credited', 'green'),
(75, '412211317400', '410211106420', 'Harry Shrivastav', '-40', '40', '0.0', '2021-05-26', 'Debited', 'skyblue'),
(76, '412211317400', '410211106420', 'Harry Shrivastav', '1000', '0.0', '1000', '2021-05-26', 'Credited', 'skyblue'),
(77, '410211106420', '412211317400', 'Marry Mahajan', '-1000', '1000', '0.0', '2021-05-26', 'Debited', 'green'),
(78, '410211106420', '412211317400', 'Marry Mahajan', '500', '0.0', '500', '2021-05-26', 'Credited', 'green'),
(79, '412211317400', '410211106420', 'Harry Shrivastav', '-500', '500', '0.0', '2021-05-26', 'Debited', 'skyblue'),
(80, '412211317400', '410211106420', 'Harry Shrivastav', '1400', '0.0', '1400', '2021-05-26', 'Credited', 'skyblue'),
(81, '410211106420', '412211317400', 'Marry Mahajan', '-1400', '1400', '0.0', '2021-05-26', 'Debited', 'green'),
(82, '412211317400', '525211930120', 'Kunal Bari', '400', '0.0', '400', '2021-05-26', 'Credited', '#b87b84'),
(83, '525211930120', '412211317400', 'Marry Mahajan', '-400', '400', '0.0', '2021-05-26', 'Debited', 'green'),
(84, '430211112350', '412211317400', 'Marry Mahajan', '400', '0.0', '400', '2021-05-26', 'Credited', 'green'),
(85, '412211317400', '430211112350', 'Sohan Mital', '-400', '400', '0.0', '2021-05-26', 'Debited', 'Red'),
(86, '410211106420', '412211317400', 'Marry Mahajan', '30', '0.0', '30', '2021-05-26', 'Credited', 'green'),
(87, '412211317400', '410211106420', 'Harry Shrivastav', '-30', '30', '0.0', '2021-05-26', 'Debited', 'skyblue'),
(88, '410211106420', '412211317400', 'Marry Mahajan', '200', '0.0', '200', '2021-05-28', 'Credited', 'green'),
(89, '412211317400', '410211106420', 'Harry Shrivastav', '-200', '200', '0.0', '2021-05-28', 'Debited', 'skyblue'),
(90, '410211106420', '412211317400', 'Marry Shrivastav', '30', '0.0', '30', '2021-06-03', 'Credited', 'green'),
(91, '412211317400', '410211106420', 'Harry Shrivastav', '-30', '30', '0.0', '2021-06-03', 'Debited', 'skyblue'),
(92, '412211317400', 'NA', 'SKY BANK', '5000', '0.0', '5000', '2021-06-05', 'Credited', 'blue'),
(93, '410211106420', '412211317400', 'Marry Shrivastav', '100', '0.0', '100', '2021-06-05', 'Credited', 'green'),
(94, '412211317400', '410211106420', 'Harry Shrivastav', '-100', '100', '0.0', '2021-06-05', 'Debited', 'skyblue'),
(95, '412211317400', 'NA', 'SKY BANK', '200', '0.0', '	 200', '2021-06-05', 'Credited', 'blue'),
(96, '412211317400', 'NA', 'SKY BANK', '-100', '100', '0.0', '2021-06-05', 'Debited', 'blue'),
(97, '412211317400', 'NA', 'SKY BANK', '400', '0.0', '400', '2021-06-05', 'Credited', 'blue'),
(98, '606211350260', 'NA', 'SKY BANK', '1000', '0.0', '	 1000', '2021-06-06', 'Credited', 'blue'),
(99, '606211350260', 'NA', 'SKY BANK', '-999', '999', '0.0', '2021-06-06', 'Debited', 'blue'),
(100, '412211317400', '410211106420', 'Harry Shrivastav', '200', '0.0', '200', '2021-06-06', 'Credited', 'skyblue'),
(101, '410211106420', '412211317400', 'Marry Shrivastav', '-200', '200', '0.0', '2021-06-06', 'Debited', 'green'),
(102, '410211106420', '412211317400', 'Marry Shrivastav', '1000', '0.0', '1000', '2021-06-06', 'Credited', 'green'),
(103, '412211317400', '410211106420', 'Harry Shrivastav', '-1000', '1000', '0.0', '2021-06-06', 'Debited', 'skyblue'),
(104, '410211106420', 'NA', 'SKY BANK', '-300', '300', '0.0', '2021-06-06', 'Debited', 'blue'),
(105, '410211106420', 'NA', 'SKY BANK', '2000', '0.0', '2000', '2021-06-06', 'Credited', 'blue'),
(106, '410211106420', '412211317400', 'Marry Shrivastav', '20', '0.0', '20', '2021-06-29', 'Credited', 'green'),
(107, '412211317400', '410211106420', 'Harry Shrivastav', '-20', '20', '0.0', '2021-06-29', 'Debited', 'skyblue'),
(108, '410211106420', '525211930120', 'Kunal Bari', '300', '0.0', '300', '2021-07-31', 'Credited', '#b87b84'),
(109, '525211930120', '410211106420', 'Harry Shrivastav', '-300', '300', '0.0', '2021-07-31', 'Debited', 'skyblue'),
(110, '525211930120', '410211106420', 'Harry Shrivastav', '1000', '0.0', '1000', '2021-07-31', 'Credited', 'skyblue'),
(111, '410211106420', '525211930120', 'Kunal Bari', '-1000', '1000', '0.0', '2021-07-31', 'Debited', '#b87b84'),
(112, '525211930120', '410211106420', 'Harry Shrivastav', '200', '0.0', '200', '2021-08-04', 'Credited', 'skyblue'),
(113, '410211106420', '525211930120', 'Kunal Bari', '-200', '200', '0.0', '2021-08-04', 'Debited', '#b87b84'),
(114, '804211817510', 'NA', 'SKY BANK', '10000', '0.0', '10000', '2021-08-04', 'Credited', 'blue'),
(115, '804211817510', 'NA', 'SKY BANK', '-10000', '10000', '0.0', '2021-08-04', 'Debited', 'blue'),
(116, '525211930120', '410211106420', 'Harry Shrivastav', '100', '0.0', '100', '2021-08-05', 'Credited', 'skyblue'),
(117, '410211106420', '525211930120', 'Kunal Bari', '-100', '100', '0.0', '2021-08-05', 'Debited', '#b87b84'),
(118, '805210624200', 'NA', 'SKY BANK', '5000', '0.0', '5000', '2021-08-05', 'Credited', 'blue'),
(119, '410211106420', '805210624200', 'Meghna Patel', '200', '0.0', '200', '2021-08-05', 'Credited', '#3916d7'),
(120, '805210624200', '410211106420', 'Harry Shrivastav', '-200', '200', '0.0', '2021-08-05', 'Debited', 'skyblue'),
(121, '805210624200', 'NA', 'SKY BANK', '-100', '100', '0.0', '2021-08-05', 'Debited', 'blue');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `AccountNo` (`AccountNo`);

--
-- Indexes for table `cards`
--
ALTER TABLE `cards`
  ADD PRIMARY KEY (`srNo`),
  ADD UNIQUE KEY `AccountNo` (`AccountNo`),
  ADD UNIQUE KEY `CardNo` (`CardNo`);

--
-- Indexes for table `customer_detail`
--
ALTER TABLE `customer_detail`
  ADD PRIMARY KEY (`C_No`),
  ADD UNIQUE KEY `Account_No` (`Account_No`),
  ADD UNIQUE KEY `C_Pan_No` (`C_Pan_No`),
  ADD UNIQUE KEY `C_Adhar_No` (`C_Adhar_No`),
  ADD UNIQUE KEY `C_Email` (`C_Email`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`AccountNo`),
  ADD UNIQUE KEY `Unique` (`ID`),
  ADD UNIQUE KEY `AccountNo` (`AccountNo`),
  ADD UNIQUE KEY `Username` (`Username`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `cards`
--
ALTER TABLE `cards`
  MODIFY `srNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `customer_detail`
--
ALTER TABLE `customer_detail`
  MODIFY `C_No` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
