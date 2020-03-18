-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 18, 2020 at 07:17 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `savings`
--

-- --------------------------------------------------------

--
-- Table structure for table `listsaving`
--

CREATE TABLE `listsaving` (
  `list_id` int(5) NOT NULL,
  `user_id` varchar(5) NOT NULL,
  `list_type_id` int(2) NOT NULL,
  `list_name` varchar(50) NOT NULL,
  `amount` int(10) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `listsaving`
--

INSERT INTO `listsaving` (`list_id`, `user_id`, `list_type_id`, `list_name`, `amount`, `date`) VALUES
(3, 's003', 2, 'ค่าเล่าเรียน', 25000, '2020-03-03'),
(4, 's004', 1, 'เงินเดือน', 20000, '2020-03-10'),
(5, 's005', 1, 'เงินเดือน', 15000, '2020-03-05'),
(11, 's006', 2, 'ค่าเล่าเรียน', 20000, '2020-03-12'),
(12, 's006', 1, 'เงินเดือน', 15000, '2020-03-12'),
(13, 's003', 2, 'ค่าบ้านเช่า', 7500, '2020-03-18'),
(16, 's003', 2, 'ค่าเล่าเรียน', 15005, '2020-03-18');

-- --------------------------------------------------------

--
-- Table structure for table `list_type`
--

CREATE TABLE `list_type` (
  `list_type_id` int(2) NOT NULL,
  `list_type_name` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `list_type`
--

INSERT INTO `list_type` (`list_type_id`, `list_type_name`) VALUES
(1, 'รายรับ'),
(2, 'รายจ่าย');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(5) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_sname` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phonenumber` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `user_name`, `user_sname`, `address`, `phonenumber`) VALUES
(0, '', '', '', '', '', ''),
(1, 's0001', '1234', 'อาราวี', 'มะแอเคียน', '110 ม.4 เขารูปช้าง เมือง สงขลา 90000', ''),
(2, 's0002', '1235', 'รุสดี', 'ฮะยีบิลัง', '64/6 ต.เขารูปช้าง อ.เมือง จ.สงขลา 90000', '1234567890'),
(3, 's003', '1236', 'ลัน', 'สอลาหมาด', '64/4 ต.เขารูปช้าง อ.เมือง จ.สงขลา 90000', '0805405410'),
(4, 's004', '1234', 'หนิง', 'สบูบก', '1/1 ต.แประ อ.ท่าเเพ จ.สตูล', '0901234568'),
(5, 's006', '543', 'หนิง', 'ขาวแท้', '112/4', '1597531230');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `listsaving`
--
ALTER TABLE `listsaving`
  ADD PRIMARY KEY (`list_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `listsaving`
--
ALTER TABLE `listsaving`
  MODIFY `list_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
