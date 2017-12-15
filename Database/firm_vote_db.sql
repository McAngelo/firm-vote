-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2017 at 07:46 PM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_firmpoll`
--

-- --------------------------------------------------------

--
-- Table structure for table `access_tbl`
--

CREATE TABLE `access_tbl` (
  `acc_id` int(11) NOT NULL,
  `acc_lvl` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `access_tbl`
--

INSERT INTO `access_tbl` (`acc_id`, `acc_lvl`) VALUES
(1, 'System Administrator'),
(2, 'EC Chairman'),
(3, 'EC Member'),
(4, 'Voter');

-- --------------------------------------------------------

--
-- Table structure for table `candidates_polls_tbl`
--

CREATE TABLE `candidates_polls_tbl` (
  `ID` tinyint(5) NOT NULL,
  `candidate_id` varchar(5) NOT NULL,
  `polls` int(11) NOT NULL DEFAULT '0',
  `totalvotes` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `candidates_tbl`
--

CREATE TABLE `candidates_tbl` (
  `can_ID` int(11) NOT NULL,
  `student_id` tinyint(5) NOT NULL,
  `position_id` tinyint(5) NOT NULL,
  `image_link` varchar(200) NOT NULL,
  `place` tinyint(1) NOT NULL,
  `polls` int(20) NOT NULL DEFAULT '0',
  `date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `candidates_tbl`
--

INSERT INTO `candidates_tbl` (`can_ID`, `student_id`, `position_id`, `image_link`, `place`, `polls`, `date`) VALUES
(1, 3, 2, 'uploads/567213.jpg', 1, 24, '2013-04-17'),
(2, 4, 2, 'uploads/88333.jpg', 2, 0, '2013-04-17'),
(3, 8, 1, 'uploads/58032.jpg', 1, 15, '2013-04-17'),
(4, 9, 1, 'uploads/356115.jpg', 2, 4, '2013-04-17'),
(5, 5, 3, 'uploads/34994.jpg', 1, 5, '2013-04-17'),
(6, 6, 3, 'uploads/419414.jpg', 2, 14, '2013-04-17'),
(7, 7, 3, 'uploads/35841.jpg', 3, 0, '2013-04-17'),
(8, 10, 4, 'uploads/780219.jpg', 1, 16, '2013-04-17'),
(9, 11, 4, 'uploads/119517.jpg', 2, 3, '2013-04-17'),
(10, 12, 5, 'uploads/63199.jpg', 1, 7, '2013-04-17'),
(11, 13, 5, 'uploads/94085.jpg', 2, 12, '2013-04-17'),
(12, 14, 6, 'uploads/732216.jpg', 1, 13, '2013-04-17'),
(13, 15, 6, 'uploads/836518.jpg', 2, 4, '2013-04-17'),
(14, 16, 7, 'uploads/75998.jpg', 1, 20, '2013-04-17'),
(15, 17, 8, 'uploads/92656.jpg', 1, 13, '2013-04-17'),
(16, 18, 8, 'uploads/25467.jpg', 2, 2, '2013-04-17'),
(17, 19, 9, 'uploads/584912.jpg', 1, 15, '2013-04-17'),
(18, 20, 10, 'uploads/574011.jpg', 1, 14, '2013-04-17'),
(19, 21, 11, 'uploads/982710.jpg', 1, 15, '2013-04-17');

-- --------------------------------------------------------

--
-- Table structure for table `commissioner_log_tbl`
--
-- Error reading structure for table db_firmpoll.commissioner_log_tbl: #1932 - Table 'db_firmpoll.commissioner_log_tbl' doesn't exist in engine
-- Error reading data for table db_firmpoll.commissioner_log_tbl: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'FROM `db_firmpoll`.`commissioner_log_tbl`' at line 1

-- --------------------------------------------------------

--
-- Table structure for table `commissioner_tbl`
--
-- Error reading structure for table db_firmpoll.commissioner_tbl: #1932 - Table 'db_firmpoll.commissioner_tbl' doesn't exist in engine
-- Error reading data for table db_firmpoll.commissioner_tbl: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'FROM `db_firmpoll`.`commissioner_tbl`' at line 1

-- --------------------------------------------------------

--
-- Table structure for table `department_tbl`
--

CREATE TABLE `department_tbl` (
  `ID` int(11) NOT NULL,
  `dep_name` varchar(250) NOT NULL,
  `date_cr` datetime NOT NULL,
  `up_date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department_tbl`
--

INSERT INTO `department_tbl` (`ID`, `dep_name`, `date_cr`, `up_date`) VALUES
(2, 'Computer Science', '2013-03-29 08:35:38', '0000-00-00 00:00:00'),
(3, 'Business Administration', '2013-04-06 22:12:38', '0000-00-00 00:00:00'),
(4, 'Nursing', '2015-05-31 10:38:19', '0000-00-00 00:00:00'),
(5, 'Theology', '2015-05-31 12:20:02', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `electrates_tbl`
--

CREATE TABLE `electrates_tbl` (
  `ele_ID` tinyint(5) NOT NULL,
  `acc_lvl` tinyint(2) NOT NULL DEFAULT '4',
  `student_id` varchar(15) NOT NULL,
  `title` varchar(5) NOT NULL,
  `surname` varchar(70) NOT NULL,
  `firstName` varchar(64) NOT NULL,
  `middleName` varchar(70) NOT NULL,
  `image` varchar(255) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `department` tinyint(3) NOT NULL,
  `level` tinyint(3) NOT NULL,
  `email` varchar(64) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `registrar_id` tinyint(5) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `electrates_tbl`
--

INSERT INTO `electrates_tbl` (`ele_ID`, `acc_lvl`, `student_id`, `title`, `surname`, `firstName`, `middleName`, `image`, `gender`, `department`, `level`, `email`, `phone`, `registrar_id`, `date`) VALUES
(3, 4, 'CS2098376', 'Mr.', 'Oxford', 'Henry', '', '', 'Male', 2, 8, 'henry@yahoo.com', '', 1, '2013-04-07 18:54:01'),
(4, 4, 'BS029832', 'Mr.', 'Wright', 'Bismark', '', '', 'Male', 3, 8, 'bis@yahoo.com', '', 1, '2013-04-07 19:27:20'),
(5, 4, 'BA0928342', 'Miss', 'Right', 'Amanda', '', '', 'Female', 3, 7, 'amanda@gmail.com', '', 1, '2013-04-07 19:43:30'),
(6, 4, 'CS1293842', 'Miss', 'Quaye', 'Frida', '', '', 'Female', 2, 8, 'fri@yahoo.com', '', 1, '2013-04-07 19:45:06'),
(7, 4, 'BA 789673', 'Miss', 'Mensah', 'Abigal', '', '', 'Female', 3, 8, 'abi@yahoo.com', '', 1, '2013-04-07 19:46:57'),
(8, 4, 'BA8192834', 'Mr.', 'Martey', 'Greg', '', '', 'Male', 3, 8, 'greg@yahoo.com', '', 1, '2013-04-07 19:48:14'),
(9, 4, 'CS9837412', 'Mr.', 'Freeman', 'Wilson', '', '', 'Male', 2, 8, 'frm@gmail.com', '', 1, '2013-04-07 19:49:27'),
(10, 4, 'BA6093764', 'Mr.', 'Mantey', 'Kofi', '', '', 'Male', 3, 7, 'kofi@yahoo.com', '', 1, '2013-04-07 19:51:18'),
(11, 4, 'CS60938475', 'Mr.', 'Hanlali', 'Mohamed', '', '', 'Male', 2, 8, 'han@yahoo.com', '', 1, '2013-04-07 19:54:05'),
(12, 4, 'BA509387473', 'Mr.', 'Ofori', 'Francis', '', '', 'Male', 3, 7, 'ofi@yahoo.com', '', 1, '2013-04-07 19:55:04'),
(13, 4, 'CS40938472', 'Mr.', 'Nkrah', 'Asesi', '', '', 'Male', 2, 7, 'asesi@yahoo.com', '', 1, '2013-04-07 19:56:08'),
(14, 4, 'CS30746591', 'Miss', 'Lartey', 'Ophilia', '', '', 'Female', 2, 8, 'ophi@yahoo.com', '', 1, '2013-04-07 19:59:12'),
(15, 4, 'CS47635481', 'Miss', 'Deka', 'Ivy', '', '', 'Female', 2, 7, 'deka@gmail.com', '', 1, '2013-04-07 20:00:45'),
(16, 4, 'BA3098574', 'Mr.', 'Wrighter', 'Goodman', '', '', 'Male', 3, 8, 'gman@yahoo.com', '', 1, '2013-04-07 20:02:10'),
(17, 4, 'BA49037645', 'Miss', 'Krane', 'Dorcas', '', '', 'Male', 3, 8, 'k@yahoo.com', '', 1, '2013-04-07 20:03:01'),
(18, 4, 'CS57893641', 'Mr.', 'Agbemenyali', 'Daniel', '', '', 'Male', 2, 7, 'age@yahoo.com', '', 1, '2013-04-07 20:04:57'),
(19, 4, 'BA10283947', 'Mr.', 'Koviko', 'Kwesi', '', '', 'Male', 3, 8, 'kovi@yahoo.com', '', 1, '2013-04-07 20:06:54'),
(20, 4, 'BA36789642', 'Mr.', 'Samlafo', 'Hamza', '', '', 'Male', 3, 8, 'sam@yahoo.com', '', 1, '2013-04-07 20:07:42'),
(21, 4, 'BA5893746', 'Mr.', 'Asamaoh', 'Mensah', '', '', 'Male', 3, 8, 'asa@yahoo.com', '', 1, '2013-04-07 20:08:31');

-- --------------------------------------------------------

--
-- Table structure for table `level_tbl`
--

CREATE TABLE `level_tbl` (
  `ID` int(11) NOT NULL,
  `level` varchar(5) NOT NULL,
  `date` datetime NOT NULL,
  `up_date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `level_tbl`
--

INSERT INTO `level_tbl` (`ID`, `level`, `date`, `up_date`) VALUES
(6, '100', '2013-03-29 07:54:20', '0000-00-00 00:00:00'),
(7, '200', '2013-04-06 22:12:04', '0000-00-00 00:00:00'),
(8, '300', '2013-04-06 22:12:11', '0000-00-00 00:00:00'),
(9, '400', '2013-04-06 22:12:17', '0000-00-00 00:00:00'),
(10, '500', '2015-05-31 12:34:47', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `position_tbl`
--

CREATE TABLE `position_tbl` (
  `ID` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `post_name` varchar(20) NOT NULL,
  `page_number` tinyint(3) NOT NULL,
  `date_cr` datetime NOT NULL,
  `up_date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `position_tbl`
--

INSERT INTO `position_tbl` (`ID`, `name`, `post_name`, `page_number`, `date_cr`, `up_date`) VALUES
(1, 'Vice President', 'vicepresident', 2, '2013-03-29 09:03:51', '2013-03-29 09:19:29'),
(2, 'President', 'president', 1, '2013-03-29 09:08:15', '2013-03-29 09:18:38'),
(3, 'Executive Secretary', 'executivesecretary', 3, '2013-04-06 22:22:45', '0000-00-00 00:00:00'),
(4, 'Financial Officer', 'financialofficer', 4, '2013-04-06 22:32:11', '0000-00-00 00:00:00'),
(5, 'Organizing Secretary', 'organizingsecretary', 5, '2013-04-06 22:33:02', '0000-00-00 00:00:00'),
(6, 'Assist. Organizing Secretary', 'assistorganizingsec', 6, '2013-04-06 22:36:25', '0000-00-00 00:00:00'),
(7, 'Chaplain', 'chaplain', 7, '2013-04-06 22:37:10', '0000-00-00 00:00:00'),
(8, 'Editor', 'editor', 8, '2013-04-06 22:37:21', '0000-00-00 00:00:00'),
(9, 'Public Relation Officer', 'publicrelationoffice', 9, '2013-04-06 22:37:43', '0000-00-00 00:00:00'),
(10, 'Food Service Officer', 'foodserviceofficer', 10, '2013-04-06 22:38:17', '0000-00-00 00:00:00'),
(11, 'Sergeant At Arms', 'sergeantatarms', 11, '2013-04-06 22:38:45', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `system_admin_tbl`
--

CREATE TABLE `system_admin_tbl` (
  `sysAd_id` int(11) NOT NULL,
  `acc_lvl` int(5) NOT NULL,
  `title` varchar(5) NOT NULL,
  `firstName` varchar(70) NOT NULL,
  `lastName` varchar(70) NOT NULL,
  `userName` varchar(54) NOT NULL,
  `password` varchar(30) NOT NULL,
  `date` datetime NOT NULL,
  `last_login` datetime NOT NULL,
  `current_login` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `system_admin_tbl`
--

INSERT INTO `system_admin_tbl` (`sysAd_id`, `acc_lvl`, `title`, `firstName`, `lastName`, `userName`, `password`, `date`, `last_login`, `current_login`) VALUES
(1, 1, 'Mr.', 'Michael', 'Johnson', 'McAngelo', 'zordz@ll3t', '2013-04-07 16:47:59', '2016-07-13 17:24:46', '2016-07-13 23:49:10');

-- --------------------------------------------------------

--
-- Table structure for table `system_tbl`
--

CREATE TABLE `system_tbl` (
  `sys_id` int(11) NOT NULL,
  `sys_name` varchar(250) NOT NULL,
  `logo` varchar(200) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `date_cr` datetime NOT NULL,
  `up_date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `system_tbl`
--

INSERT INTO `system_tbl` (`sys_id`, `sys_name`, `logo`, `status`, `date_cr`, `up_date`) VALUES
(2, 'Accra Polytechnic', 'assets/uploads/logo/7237ban.png', 1, '2013-03-29 12:13:34', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `votes_tbl`
--

CREATE TABLE `votes_tbl` (
  `ID` int(11) NOT NULL,
  `student_id` varchar(15) NOT NULL,
  `status` tinyint(2) NOT NULL DEFAULT '0',
  `time` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `votes_tbl`
--

INSERT INTO `votes_tbl` (`ID`, `student_id`, `status`, `time`) VALUES
(48, 'CS2098376', 1, '2015-01-29 00:19:42'),
(47, 'BA5893746', 1, '2015-01-26 15:40:24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `access_tbl`
--
ALTER TABLE `access_tbl`
  ADD PRIMARY KEY (`acc_id`);

--
-- Indexes for table `candidates_polls_tbl`
--
ALTER TABLE `candidates_polls_tbl`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `candidates_tbl`
--
ALTER TABLE `candidates_tbl`
  ADD PRIMARY KEY (`can_ID`);

--
-- Indexes for table `department_tbl`
--
ALTER TABLE `department_tbl`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `electrates_tbl`
--
ALTER TABLE `electrates_tbl`
  ADD PRIMARY KEY (`ele_ID`);

--
-- Indexes for table `level_tbl`
--
ALTER TABLE `level_tbl`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `position_tbl`
--
ALTER TABLE `position_tbl`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `system_admin_tbl`
--
ALTER TABLE `system_admin_tbl`
  ADD PRIMARY KEY (`sysAd_id`);

--
-- Indexes for table `system_tbl`
--
ALTER TABLE `system_tbl`
  ADD PRIMARY KEY (`sys_id`);

--
-- Indexes for table `votes_tbl`
--
ALTER TABLE `votes_tbl`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `access_tbl`
--
ALTER TABLE `access_tbl`
  MODIFY `acc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `candidates_polls_tbl`
--
ALTER TABLE `candidates_polls_tbl`
  MODIFY `ID` tinyint(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `candidates_tbl`
--
ALTER TABLE `candidates_tbl`
  MODIFY `can_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `department_tbl`
--
ALTER TABLE `department_tbl`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `electrates_tbl`
--
ALTER TABLE `electrates_tbl`
  MODIFY `ele_ID` tinyint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `level_tbl`
--
ALTER TABLE `level_tbl`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `position_tbl`
--
ALTER TABLE `position_tbl`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `system_admin_tbl`
--
ALTER TABLE `system_admin_tbl`
  MODIFY `sysAd_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `system_tbl`
--
ALTER TABLE `system_tbl`
  MODIFY `sys_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `votes_tbl`
--
ALTER TABLE `votes_tbl`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
