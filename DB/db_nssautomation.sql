-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 04, 2025 at 08:21 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_nssautomation`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(50) NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  `admin_password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_name`, `admin_email`, `admin_password`) VALUES
(4, 'Deltas Dominic', 'deltas@gmail.com', 'deltas@123');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_attendance`
--

CREATE TABLE `tbl_attendance` (
  `attendance_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `Volunteers_id` int(11) NOT NULL,
  `attendance_status` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_attendance`
--

INSERT INTO `tbl_attendance` (`attendance_id`, `event_id`, `Volunteers_id`, `attendance_status`) VALUES
(2, 14, 2, '1'),
(3, 14, 4, '3'),
(4, 18, 2, '0'),
(5, 18, 4, '3'),
(6, 18, 5, '1'),
(7, 19, 4, '1'),
(8, 21, 5, '1'),
(9, 22, 5, '3'),
(10, 27, 4, '1'),
(11, 27, 4, '1'),
(12, 32, 6, '3'),
(13, 34, 2, '1'),
(14, 34, 4, '0'),
(15, 35, 2, '1'),
(16, 35, 4, '1'),
(17, 35, 5, '1'),
(18, 35, 6, '1'),
(19, 35, 8, '0'),
(20, 24, 2, '1'),
(21, 24, 4, '1'),
(22, 24, 5, '1'),
(23, 24, 6, '1'),
(24, 24, 8, '1'),
(25, 32, 2, '1'),
(26, 32, 4, '1'),
(27, 32, 5, '1'),
(28, 32, 8, '1'),
(29, 36, 2, '1'),
(30, 36, 4, '1'),
(31, 36, 5, '1'),
(32, 36, 6, '1'),
(33, 36, 8, '1'),
(34, 38, 9, '1'),
(35, 38, 10, '1'),
(36, 38, 12, '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_attendance_committee`
--

CREATE TABLE `tbl_attendance_committee` (
  `ac_id` int(11) NOT NULL,
  `ac_name` varchar(50) NOT NULL,
  `ac_email` varchar(50) NOT NULL,
  `ac_password` varchar(50) NOT NULL,
  `ac_proof` varchar(50) NOT NULL,
  `ac_photo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_attendance_committee`
--

INSERT INTO `tbl_attendance_committee` (`ac_id`, `ac_name`, `ac_email`, `ac_password`, `ac_proof`, `ac_photo`) VALUES
(2, 'Sura Bhaskar', 'sura@gmail.com', 'sura@123', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bill`
--

CREATE TABLE `tbl_bill` (
  `bill_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `BC_id` int(11) NOT NULL,
  `bill_title` varchar(50) NOT NULL,
  `bill_amount` int(11) NOT NULL,
  `bill_file` varchar(100) NOT NULL,
  `bill_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_bill`
--

INSERT INTO `tbl_bill` (`bill_id`, `event_id`, `BC_id`, `bill_title`, `bill_amount`, `bill_file`, `bill_status`) VALUES
(25, 0, 0, 'Purchase Bill', 5600, 'bill.jpeg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bill_committee`
--

CREATE TABLE `tbl_bill_committee` (
  `bc_id` int(11) NOT NULL,
  `bc_name` varchar(50) NOT NULL,
  `bc_email` varchar(50) NOT NULL,
  `bc_password` varchar(50) NOT NULL,
  `bc_proof` varchar(50) NOT NULL,
  `bc_photo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_bill_committee`
--

INSERT INTO `tbl_bill_committee` (`bc_id`, `bc_name`, `bc_email`, `bc_password`, `bc_proof`, `bc_photo`) VALUES
(1, 'Jyothish PS', 'jyothish@gmail.com', 'jyothish@123', 'LG_Aomine.webp', 'LG_Kuroko.webp');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_complaint`
--

CREATE TABLE `tbl_complaint` (
  `complaint_id` int(11) NOT NULL,
  `complaint_title` varchar(50) NOT NULL,
  `complaint_content` varchar(50) NOT NULL,
  `complaint_reply` varchar(50) NOT NULL,
  `complaint_status` varchar(50) NOT NULL DEFAULT '0',
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_complaint`
--

INSERT INTO `tbl_complaint` (`complaint_id`, `complaint_title`, `complaint_content`, `complaint_reply`, `complaint_status`, `user_id`) VALUES
(2, 'Submission', 'There is an error while uploading', 'its okay babe\r\n', '0', 2),
(3, 'ffff', 'bbbbb', 'reload again', '0', 2),
(4, 'hssdwjdj', 'gdgddh', '', '0', 2),
(5, 'complaint1', 'asdfgh', '', '0', 2),
(6, 'complaint2', 'lkjhgfdsa', '', '0', 0),
(7, 'complaint7', 'poiuyfdsf', 'eveything is fine reload it\r\n', '0', 0),
(8, 'complaint8', 'qsdcvbnm', 'sure let our team check it', '0', 1),
(9, 'submit error', 'A submit error occurs when a user tries to submit ', '', '0', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_event`
--

CREATE TABLE `tbl_event` (
  `event_id` int(11) NOT NULL,
  `event_name` varchar(50) NOT NULL,
  `event_desc` varchar(500) NOT NULL,
  `event_date` varchar(50) NOT NULL,
  `event_count` int(11) NOT NULL,
  `event_status` char(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_event`
--

INSERT INTO `tbl_event` (`event_id`, `event_name`, `event_desc`, `event_date`, `event_count`, `event_status`) VALUES
(38, 'Christmas Evening', 'During the Christmas evening program, the volunteers organized a variety of activities, including games, a cake shop, Christmas songs, dances, and decorations. The event saw active participation from students, teachers, and other faculty members.', '23/12/24', 26, '1'),
(39, 'Blood Donation Camp', 'During the blood donation camp, the volunteers organized various arrangements, including registration, donor assistance, and awareness sessions. The event witnessed active participation from students, teachers, and other faculty members, fostering a spirit of community and service.', '19/09/2023', 21, '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_feedback`
--

CREATE TABLE `tbl_feedback` (
  `feedback_id` int(11) NOT NULL,
  `feedback_content` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gallery`
--

CREATE TABLE `tbl_gallery` (
  `gallery_id` int(11) NOT NULL,
  `gallery_title` varchar(50) NOT NULL,
  `event_id` int(11) NOT NULL,
  `gallery_file` varchar(250) NOT NULL,
  `mc_id` int(11) NOT NULL,
  `gallery_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_gallery`
--

INSERT INTO `tbl_gallery` (`gallery_id`, `gallery_title`, `event_id`, `gallery_file`, `mc_id`, `gallery_status`) VALUES
(21, 'Christmas Eve', 38, 'chirtmas.jpeg', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_media_committee`
--

CREATE TABLE `tbl_media_committee` (
  `mc_id` int(11) NOT NULL,
  `mc_name` varchar(50) NOT NULL,
  `mc_email` varchar(50) NOT NULL,
  `mc_password` varchar(50) NOT NULL,
  `mc_proof` varchar(50) NOT NULL,
  `mc_photo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_media_committee`
--

INSERT INTO `tbl_media_committee` (`mc_id`, `mc_name`, `mc_email`, `mc_password`, `mc_proof`, `mc_photo`) VALUES
(3, 'Libin Mathews', 'libin@gmail.com', 'libin@123', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payment`
--

CREATE TABLE `tbl_payment` (
  `payment_id` int(11) NOT NULL,
  `payment_price` varchar(50) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `payment_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_programme_officer`
--

CREATE TABLE `tbl_programme_officer` (
  `po_id` int(11) NOT NULL,
  `po_name` varchar(50) NOT NULL,
  `po_email` varchar(50) NOT NULL,
  `po_password` varchar(50) NOT NULL,
  `po_proof` varchar(50) NOT NULL,
  `po_photo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_programme_officer`
--

INSERT INTO `tbl_programme_officer` (`po_id`, `po_name`, `po_email`, `po_password`, `po_proof`, `po_photo`) VALUES
(6, 'Hiran Joy', 'hiranjoy@gmail.com', 'hiran@123', 'LG_Murasakibara.webp', 'LG_Murasakibara.webp'),
(12, 'Elizabeth Poulose', 'elizabeth@gmail.com', 'Elizabeth@123', 'ph1.jpg', 'ph1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_program_committee`
--

CREATE TABLE `tbl_program_committee` (
  `pc_id` int(11) NOT NULL,
  `pc_name` varchar(50) NOT NULL,
  `pc_email` varchar(50) NOT NULL,
  `pc_password` varchar(50) NOT NULL,
  `pc_proof` varchar(50) NOT NULL,
  `pc_photo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_program_committee`
--

INSERT INTO `tbl_program_committee` (`pc_id`, `pc_name`, `pc_email`, `pc_password`, `pc_proof`, `pc_photo`) VALUES
(4, 'Madhu jr', 'madhu@gmail.com', 'madhu@123', 'LG_Murasakibara.webp', 'LG_Murasakibara.webp');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_report`
--

CREATE TABLE `tbl_report` (
  `report_id` int(11) NOT NULL,
  `report_report` varchar(30) NOT NULL,
  `report_file` varchar(250) NOT NULL,
  `report_title` varchar(11) NOT NULL,
  `report_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_report_committee`
--

CREATE TABLE `tbl_report_committee` (
  `rc_id` int(11) NOT NULL,
  `rc_name` varchar(50) NOT NULL,
  `rc_email` varchar(50) NOT NULL,
  `rc_password` varchar(50) NOT NULL,
  `rc_proof` varchar(50) NOT NULL,
  `rc_photo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_report_committee`
--

INSERT INTO `tbl_report_committee` (`rc_id`, `rc_name`, `rc_email`, `rc_password`, `rc_proof`, `rc_photo`) VALUES
(2, 'Joseph Antony', 'joseph@gmail.com', 'joseph@123', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_volunteers`
--

CREATE TABLE `tbl_volunteers` (
  `volunteers_id` int(11) NOT NULL,
  `volunteers_name` varchar(50) NOT NULL,
  `volunteers_email` varchar(50) NOT NULL,
  `volunteers_password` varchar(50) NOT NULL,
  `volunteers_proof` varchar(50) NOT NULL,
  `volunteers_photo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_volunteers`
--

INSERT INTO `tbl_volunteers` (`volunteers_id`, `volunteers_name`, `volunteers_email`, `volunteers_password`, `volunteers_proof`, `volunteers_photo`) VALUES
(9, 'Bennet George', 'bennet@gmail.com', 'bennet@123', 'aadhaar card.webp', 'boy profile.png'),
(10, 'Cenna Elias', 'cenna@gmail.com', 'cenna@123', 'aadhaar card.webp', 'girl profile.jpeg'),
(12, 'Jisna Thomas', 'jisna@gmail.com', 'jisna@123', 'aadhaar card.webp', 'girl profile.jpeg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tbl_attendance`
--
ALTER TABLE `tbl_attendance`
  ADD PRIMARY KEY (`attendance_id`);

--
-- Indexes for table `tbl_attendance_committee`
--
ALTER TABLE `tbl_attendance_committee`
  ADD PRIMARY KEY (`ac_id`);

--
-- Indexes for table `tbl_bill`
--
ALTER TABLE `tbl_bill`
  ADD PRIMARY KEY (`bill_id`);

--
-- Indexes for table `tbl_bill_committee`
--
ALTER TABLE `tbl_bill_committee`
  ADD PRIMARY KEY (`bc_id`);

--
-- Indexes for table `tbl_complaint`
--
ALTER TABLE `tbl_complaint`
  ADD PRIMARY KEY (`complaint_id`);

--
-- Indexes for table `tbl_event`
--
ALTER TABLE `tbl_event`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  ADD PRIMARY KEY (`feedback_id`);

--
-- Indexes for table `tbl_gallery`
--
ALTER TABLE `tbl_gallery`
  ADD PRIMARY KEY (`gallery_id`);

--
-- Indexes for table `tbl_media_committee`
--
ALTER TABLE `tbl_media_committee`
  ADD PRIMARY KEY (`mc_id`);

--
-- Indexes for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `tbl_programme_officer`
--
ALTER TABLE `tbl_programme_officer`
  ADD PRIMARY KEY (`po_id`);

--
-- Indexes for table `tbl_program_committee`
--
ALTER TABLE `tbl_program_committee`
  ADD PRIMARY KEY (`pc_id`);

--
-- Indexes for table `tbl_report`
--
ALTER TABLE `tbl_report`
  ADD PRIMARY KEY (`report_id`);

--
-- Indexes for table `tbl_report_committee`
--
ALTER TABLE `tbl_report_committee`
  ADD PRIMARY KEY (`rc_id`);

--
-- Indexes for table `tbl_volunteers`
--
ALTER TABLE `tbl_volunteers`
  ADD PRIMARY KEY (`volunteers_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_attendance`
--
ALTER TABLE `tbl_attendance`
  MODIFY `attendance_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `tbl_attendance_committee`
--
ALTER TABLE `tbl_attendance_committee`
  MODIFY `ac_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_bill`
--
ALTER TABLE `tbl_bill`
  MODIFY `bill_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tbl_bill_committee`
--
ALTER TABLE `tbl_bill_committee`
  MODIFY `bc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_complaint`
--
ALTER TABLE `tbl_complaint`
  MODIFY `complaint_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_event`
--
ALTER TABLE `tbl_event`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_gallery`
--
ALTER TABLE `tbl_gallery`
  MODIFY `gallery_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbl_media_committee`
--
ALTER TABLE `tbl_media_committee`
  MODIFY `mc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_programme_officer`
--
ALTER TABLE `tbl_programme_officer`
  MODIFY `po_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_program_committee`
--
ALTER TABLE `tbl_program_committee`
  MODIFY `pc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_report`
--
ALTER TABLE `tbl_report`
  MODIFY `report_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_report_committee`
--
ALTER TABLE `tbl_report_committee`
  MODIFY `rc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_volunteers`
--
ALTER TABLE `tbl_volunteers`
  MODIFY `volunteers_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
