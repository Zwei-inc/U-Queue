-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 16, 2020 at 09:31 AM
-- Server version: 10.3.22-MariaDB-cll-lve
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mrrobite_sad_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `email` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `role` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`email`, `name`, `username`, `password`, `role`) VALUES
('test2@admin.com', 'test Admin 2', 't_admin2', 't_admin2', 'sdc'),
('test@admin.com', 'Test Admin', 't_admin', 't_admin', 'sdc');

-- --------------------------------------------------------

--
-- Table structure for table `counter`
--

CREATE TABLE `counter` (
  `id` int(11) NOT NULL,
  `counter_no` varchar(200) NOT NULL,
  `total_served` varchar(200) NOT NULL,
  `start_time` varchar(300) NOT NULL,
  `end_time` varchar(300) NOT NULL,
  `status` varchar(200) NOT NULL,
  `sdc` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `counter`
--

INSERT INTO `counter` (`id`, `counter_no`, `total_served`, `start_time`, `end_time`, `status`, `sdc`) VALUES
(1, '1', '0', '2020-03-13 12:25:53', '0000-00-00 00:00:00', 'Active', 'test@admin.com'),
(2, '2', '0', '2020-03-13 12:25:44', '0000-00-00 00:00:00', 'Active', 'test2@admin.com');

-- --------------------------------------------------------

--
-- Table structure for table `queue`
--

CREATE TABLE `queue` (
  `token_no` varchar(50) NOT NULL,
  `email` varchar(200) NOT NULL,
  `starttime` varchar(300) DEFAULT NULL,
  `endtime` varchar(300) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'unfinished',
  `hold_on` int(11) NOT NULL DEFAULT 1,
  `pin` varchar(50) NOT NULL,
  `service_id` int(11) NOT NULL,
  `counter_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `queue`
--

INSERT INTO `queue` (`token_no`, `email`, `starttime`, `endtime`, `status`, `hold_on`, `pin`, `service_id`, `counter_id`) VALUES
('0656', 'mrrobi040@gmail.com', '2020/01/09 10:10:00', '2020/01/09 10:15:00', 'unfinished', 1, '989f', 1, 1),
('09f0', 'mrrobi040@gmail.com', '2020/03/13 10:50:00', '2020/03/13 10:55:00', 'unfinished', 1, 'c903', 1, 1),
('1088', 'mrrobi040@gmail.com', '2020/03/13 11:00:00', '2020/03/13 11:10:00', 'unfinished', 1, 'dc6a', 2, 2),
('1deb', 'mrrobi040@gmail.com', '2020/01/06 10:10:00', '2020/01/06 10:20:00', 'unfinished', 1, '59b8', 2, 1),
('294d', 'mrrobi040@gmail.com', '2020/03/13 10:20:00', '2020/03/13 10:30:00', 'unfinished', 1, '9e74', 2, 1),
('2a35', 'mrrobi040@gmail.com', '2020/01/15 10:10:00', '2020/01/15 10:15:00', 'unfinished', 1, 'daf1', 1, 1),
('2c00', 'juborajnaofel@gmail.com', '2020/03/13 11:10:00', '2020/03/13 11:15:00', 'unfinished', 1, 'f40d', 1, 1),
('3e8e', 'mrrobi040@gmail.com', '2020/03/13 10:40:00', '2020/03/13 10:45:00', 'unfinished', 1, 'f2db', 1, 2),
('45fd', 'mrrobi040@gmail.com', '2020/03/13 10:25:00', '2020/03/13 10:35:00', 'unfinished', 1, 'b1e8', 2, 2),
('6320', 'mahin.kkgb.km.ferdous@gmail.com', '2020/01/01 10:00:00', '2020/01/01 10:05:00', 'unfinished', 1, '793c', 1, 2),
('6e32', 'mrrobi040@gmail.com', '2020/03/13 10:10:00', '2020/03/13 10:15:00', 'unfinished', 1, '047f', 1, 1),
('74c7', 'mrrobi040@gmail.com', '2020/03/15 10:10:00', '2020/03/15 10:15:00', 'unfinished', 1, 'c8a5', 1, 1),
('82cd', 'mahin.kkgb.km@gmail.com', '2020/03/13 11:10:00', '2020/03/13 11:20:00', 'unfinished', 1, '1349', 2, 2),
('8409', 'mrrobi040@gmail.com', '2020/03/13 10:10:00', '2020/03/13 10:15:00', 'unfinished', 1, 'ad33', 1, 2),
('9eb2', 'mrrobi040@gmail.com', '2020/03/13 10:50:00', '2020/03/13 10:55:00', 'unfinished', 1, '8540', 1, 2),
('a602', 'mahin.kkgb.km@gmail.com', '2020/03/13 11:20:00', '2020/03/13 11:30:00', 'unfinished', 1, '7de1', 2, 1),
('a9bc', 'mahin.kkgb.km.ferdous@gmail.com', '2020/01/01 10:00:00', '2020/01/01 10:10:00', 'unfinished', 1, '9e95', 2, 1),
('bd56', 'mahin.kkgb.km.ferdous@gmail.com', '2020/01/02 10:10:00', '2020/01/02 10:20:00', 'unfinished', 1, '7e98', 2, 2),
('cb52', 'mrrobi040@gmail.com', '2020/01/08 10:10:00', '2020/01/08 10:15:00', 'unfinished', 1, '0971', 1, 1),
('d952', 'mrrobi040@gmail.com', '2020/03/13 11:00:00', '2020/03/13 11:10:00', 'unfinished', 1, '0659', 2, 1),
('e944', 'mrrobi040@gmail.com', '2020/01/16 10:10:00', '2020/01/16 10:15:00', 'unfinished', 1, '5244', 1, 1),
('f291', 'mahin.kkgb.km@gmail.com', '2020/01/01 10:15:00', '2020/01/01 10:25:00', 'unfinished', 1, 'c0aa', 2, 2),
('fcd3', 'mrrobi040@gmail.com', '2020/01/01 10:10:00', '2020/01/01 10:20:00', 'unfinished', 1, '606e', 2, 1),
('fe3e', 'mrrobi040@gmail.com', '2020/03/13 10:35:00', '2020/03/13 10:45:00', 'unfinished', 1, '55e8', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `report_table`
--

CREATE TABLE `report_table` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `date_time` datetime NOT NULL,
  `email` varchar(200) NOT NULL,
  `service_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `service_type`
--

CREATE TABLE `service_type` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `duration` varchar(20) NOT NULL,
  `details` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `service_type`
--

INSERT INTO `service_type` (`id`, `name`, `duration`, `details`) VALUES
(1, 'Deposit Money', '5', 'It is for depositing money into existing account'),
(2, 'Withdraw Money', '10', 'Withdraw money from existing account');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `email` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`email`, `name`) VALUES
('juborajnaofel@gmail.com', 'naofel'),
('mahin.kkgb.km.ferdous@gmail.com', 'kazi'),
('mahin.kkgb.km@gmail.com', 'Mahin'),
('mrrobi040@gmail.com', 'MD');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `counter`
--
ALTER TABLE `counter`
  ADD PRIMARY KEY (`id`),
  ADD KEY `counter_fk` (`sdc`);

--
-- Indexes for table `queue`
--
ALTER TABLE `queue`
  ADD PRIMARY KEY (`token_no`) USING BTREE,
  ADD KEY `service_id` (`service_id`),
  ADD KEY `queue_fk2` (`email`),
  ADD KEY `queue_fk3` (`counter_id`);

--
-- Indexes for table `report_table`
--
ALTER TABLE `report_table`
  ADD PRIMARY KEY (`id`),
  ADD KEY `repofk` (`email`),
  ADD KEY `repofk2` (`service_id`);

--
-- Indexes for table `service_type`
--
ALTER TABLE `service_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `counter`
--
ALTER TABLE `counter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `report_table`
--
ALTER TABLE `report_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `service_type`
--
ALTER TABLE `service_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `counter`
--
ALTER TABLE `counter`
  ADD CONSTRAINT `counter_fk` FOREIGN KEY (`sdc`) REFERENCES `admin` (`email`);

--
-- Constraints for table `queue`
--
ALTER TABLE `queue`
  ADD CONSTRAINT `queue_fk2` FOREIGN KEY (`email`) REFERENCES `user` (`email`),
  ADD CONSTRAINT `queue_fk3` FOREIGN KEY (`counter_id`) REFERENCES `counter` (`id`),
  ADD CONSTRAINT `queue_ibfk_1` FOREIGN KEY (`service_id`) REFERENCES `service_type` (`id`);

--
-- Constraints for table `report_table`
--
ALTER TABLE `report_table`
  ADD CONSTRAINT `repofk` FOREIGN KEY (`email`) REFERENCES `user` (`email`),
  ADD CONSTRAINT `repofk2` FOREIGN KEY (`service_id`) REFERENCES `service_type` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
