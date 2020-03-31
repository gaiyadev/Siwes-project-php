-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 11, 2020 at 11:59 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `siwes`
--

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `id` int(15) NOT NULL,
  `body` text NOT NULL,
  `title` varchar(100) NOT NULL,
  `student_id` int(15) DEFAULT NULL,
  `supervisor_id` int(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`id`, `body`, `title`, `student_id`, `supervisor_id`) VALUES
(1, 'Your acceptance letter has been accepted', 'Success', 1, NULL),
(2, 'A student has been allocated to you, please check dashboard', 'Success', NULL, 1),
(3, 'Your acceptance letter has been accepted', 'Success', 4, NULL),
(4, 'A student has been allocated to you, please check dashboard', 'Success', NULL, 2),
(5, 'Your acceptance letter has been accepted', 'Success', 5, NULL),
(6, 'A student has been allocated to you, please check dashboard', 'Success', NULL, 3),
(7, 'Your acceptance letter has been accepted', 'Success', 6, NULL),
(8, 'A student has been allocated to you, please check dashboard', 'Success', NULL, 3),
(9, 'Your acceptance letter has been accepted', 'Success', 7, NULL),
(10, 'A student has been allocated to you, please check dashboard', 'Success', NULL, 3);

-- --------------------------------------------------------

--
-- Table structure for table `placement`
--

CREATE TABLE `placement` (
  `placement_id` int(15) NOT NULL,
  `student_id` int(15) NOT NULL,
  `supervisor_id` int(15) NOT NULL,
  `company_name` text NOT NULL,
  `acceptance_letter` varchar(250) NOT NULL,
  `designation` text NOT NULL,
  `designation_dept` varchar(150) NOT NULL,
  `placement_state` varchar(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `address` text NOT NULL,
  `internal_supervisor` text NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `state_id` int(15) NOT NULL,
  `phonenumber` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `placement`
--

INSERT INTO `placement` (`placement_id`, `student_id`, `supervisor_id`, `company_name`, `acceptance_letter`, `designation`, `designation_dept`, `placement_state`, `status`, `address`, `internal_supervisor`, `date_created`, `state_id`, `phonenumber`) VALUES
(1, 1, 1, 'CAC', '', 'fghj', 'yuklkj', '', 1, 'fghjkljhgf', 'fdfghb', '2020-01-22 11:40:04', 2, 'dfgh'),
(3, 4, 2, 'CBN', 'acceptances/inventory_updated.sql', 'Programming', 'Software Development', '', 1, 'gggggggggg', 'Engr. David Mark', '2020-01-25 06:41:31', 3, '08012348888'),
(4, 5, 3, 'National Institute of Information Technology, Abuja', 'acceptances/SIWES - Computer Science Dept.pdf', 'Data Analyst', 'ICT Department', '', 1, 'No. 13 Garki Abuja', 'Engr. Hamisu Aliyu Wada', '2020-01-29 14:39:07', 15, '08146006170'),
(5, 6, 3, 'Petroleum Technology Development Fund, Abuja', 'acceptances/SIWES - Computer Science Dept.pdf', 'Software Development ', 'ICT Department ', '', 1, '2 Memorial Close, Wuse, Abuja', 'Engr. Mubarak Mubeen', '2020-02-02 18:09:53', 15, '08133390621'),
(6, 7, 3, '4U Supermarket', 'acceptances/SIWES - Computer Science Dept.pdf', 'Maintenance ', 'ICT Department ', '', 1, 'No. 58 Adetukumbo Ademola Cresent Wuse II', 'Engr. Aliyu Sani', '2020-02-09 21:05:40', 15, '08162082016');

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `state_id` int(11) NOT NULL,
  `state_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COMMENT='States in Nigeria.';

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`state_id`, `state_name`) VALUES
(1, 'Abia'),
(2, 'Adamawa'),
(3, 'Akwa Ibom'),
(4, 'Anambra'),
(5, 'Bauchi'),
(6, 'Bayelsa'),
(7, 'Benue'),
(8, 'Borno'),
(9, 'Cross River'),
(10, 'Delta'),
(11, 'Ebonyi'),
(12, 'Edo'),
(13, 'Ekiti'),
(14, 'Enugu'),
(15, 'FCT'),
(16, 'Gombe'),
(17, 'Imo'),
(18, 'Jigawa'),
(19, 'Kaduna'),
(20, 'Kano'),
(21, 'Katsina'),
(22, 'Kebbi'),
(23, 'Kogi'),
(24, 'Kwara'),
(25, 'Lagos'),
(26, 'Nasarawa'),
(27, 'Niger'),
(28, 'Ogun'),
(29, 'Ondo'),
(30, 'Osun'),
(31, 'Oyo'),
(32, 'Plateau'),
(33, 'Rivers'),
(34, 'Sokoto'),
(35, 'Taraba'),
(36, 'Yobe'),
(37, 'Zamfara');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_id` int(15) NOT NULL,
  `password` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `regno` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `password`, `firstname`, `lastname`, `regno`, `state`, `phone`, `email`) VALUES
(1, '1234', 'Faisal ', 'Ibrahim', 'UG15/COMS/1042', 'Kano', '07035667788', 'jamfaz@gmail.com'),
(4, '1234', 'Yusuf', 'Abdulrazaq', 'UG15/COMS/1011', 'Kano', '08012345678', 'poacher@gmail.com'),
(5, 'themub3x', 'Mubarak', 'Hamisu', 'UG15/COMS/1038', 'Niger', '08146006170', 'trymubeen@gmail.com'),
(6, '1234', 'Mustapha Y.M', 'Bichi', 'UG15/COMS/1147', 'Kano', '08133390621', 'mrymbichi@gmail.com'),
(7, '1234', 'Kamal', 'Dahiru', 'UG15/COMS/1034', '', '08162082016', 'kamaldahir70@gmail.com'),
(8, 'themub3x', 'Mubeen', 'Khamis', 'UG15/COMS/1012', '', '08156766644', 'trymubeen@yahoo.com'),
(9, '1234', 'Musa', 'Aliyu', 'UG15/COMS/1010', '', '0810000000', 'haby@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `supervisor`
--

CREATE TABLE `supervisor` (
  `supervisor_id` int(15) NOT NULL,
  `fullname` varchar(150) NOT NULL,
  `password` varchar(100) NOT NULL,
  `image` varchar(250) NOT NULL,
  `state` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supervisor`
--

INSERT INTO `supervisor` (`supervisor_id`, `fullname`, `password`, `image`, `state`, `email`, `phone`) VALUES
(1, 'Dr Alhasan Adamu', '1234', 'image.png', 'Kano', 't@t.com', '123456789'),
(2, 'Prof. Y.M Kuta', 'kuta', '', 'Kaduna', 'ymkuta@gmail.com', '08012345678'),
(3, 'Dr. Salisu A. Mamman', '1234', '', '', 'salisu.abdul@gmail.com', '07038253026');

-- --------------------------------------------------------

--
-- Table structure for table `supervisor_state`
--

CREATE TABLE `supervisor_state` (
  `id` int(15) NOT NULL,
  `state_id` int(15) NOT NULL,
  `supervisor_id` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supervisor_state`
--

INSERT INTO `supervisor_state` (`id`, `state_id`, `supervisor_id`) VALUES
(1, 2, 1),
(2, 4, 1),
(3, 3, 2),
(4, 5, 2),
(5, 6, 2),
(6, 15, 3),
(7, 26, 3),
(8, 27, 3),
(9, 5, 4),
(10, 16, 4),
(11, 32, 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `placement`
--
ALTER TABLE `placement`
  ADD PRIMARY KEY (`placement_id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`state_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `supervisor`
--
ALTER TABLE `supervisor`
  ADD PRIMARY KEY (`supervisor_id`);

--
-- Indexes for table `supervisor_state`
--
ALTER TABLE `supervisor_state`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `placement`
--
ALTER TABLE `placement`
  MODIFY `placement_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `student_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `supervisor`
--
ALTER TABLE `supervisor`
  MODIFY `supervisor_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `supervisor_state`
--
ALTER TABLE `supervisor_state`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
