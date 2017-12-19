-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 19, 2017 at 07:50 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(11) NOT NULL,
  `hospital` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `hospital`, `Email`, `password`) VALUES
(1, 'Grande International Hospital', 'info@grande.com', '12345'),
(2, 'Tribhuvan University Teaching Hospital', 'info@teaching.com', 'teaching'),
(3, 'Norvic International Hospital', 'info@norvic.com', 'norvic');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_appointment`
--

CREATE TABLE `tbl_appointment` (
  `p_id` int(11) NOT NULL,
  `p_name` varchar(255) NOT NULL,
  `p_address` varchar(255) NOT NULL,
  `p_contact` varchar(255) NOT NULL,
  `p_email` varchar(255) NOT NULL,
  `p_gender` varchar(5) NOT NULL,
  `p_age` int(100) NOT NULL,
  `arrival_time` varchar(255) NOT NULL,
  `deadline` varchar(255) NOT NULL,
  `book_date` varchar(255) NOT NULL,
  `hospital_id` int(100) NOT NULL,
  `doctor_id` int(100) NOT NULL,
  `p_message` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `appointment_status` varchar(255) NOT NULL DEFAULT 'pending',
  `booked_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_appointment`
--

INSERT INTO `tbl_appointment` (`p_id`, `p_name`, `p_address`, `p_contact`, `p_email`, `p_gender`, `p_age`, `arrival_time`, `deadline`, `book_date`, `hospital_id`, `doctor_id`, `p_message`, `user_id`, `appointment_status`, `booked_at`) VALUES
(1, 'Bijaya kumar Budhathoki', 'Ranibari,Kathmandu', '9861040135', 'bijayabudhathoki98@gmail.com', 'male', 22, '10:00:AM', '15:00:PM', '2017-12-17', 1, 2, 'this is the test appoitment', 1, 'Rejected', '2017-12-19 06:45:46');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_blood_donators`
--

CREATE TABLE `tbl_blood_donators` (
  `donator_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_blood_donators`
--

INSERT INTO `tbl_blood_donators` (`donator_id`, `name`, `address`, `phone`, `photo`, `email`) VALUES
(1, 'bijay budhathoki', 'Ranibari,Kathmandu', '9861040135', '1f49e19d3bd8c83ffdef7117af8b8876.jpg', 'bijayabudhathoki98@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_departments`
--

CREATE TABLE `tbl_departments` (
  `dep_id` int(11) NOT NULL,
  `dep_name` varchar(255) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `h_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_doctors`
--

CREATE TABLE `tbl_doctors` (
  `d_id` int(11) NOT NULL,
  `d_name` varchar(100) NOT NULL,
  `d_address` varchar(100) NOT NULL,
  `d_phone` varchar(255) NOT NULL,
  `d_email` varchar(255) NOT NULL,
  `d_photo` varchar(255) NOT NULL,
  `d_profession` varchar(255) NOT NULL,
  `d_experience` varchar(255) NOT NULL,
  `added_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `about_doctor` text NOT NULL,
  `statu` tinyint(4) NOT NULL,
  `h_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_doctors`
--

INSERT INTO `tbl_doctors` (`d_id`, `d_name`, `d_address`, `d_phone`, `d_email`, `d_photo`, `d_profession`, `d_experience`, `added_at`, `about_doctor`, `statu`, `h_id`) VALUES
(1, 'Dr.Govinda K.C.', 'lazimpat', '5638765347', 'govinda@gmaiil.com', 'govindaKc.jpg', 'Heart specialist', '20 year', '2017-12-16 15:17:53', 'Dr. govinda kc is best doctor in the context of nepal', 0, 2),
(2, 'Dr.Bhola Rijal', 'Basundara', '974684576', 'bhola@gmail.com', 'bhola.jpg', 'Denstinst', '15 year', '2017-12-16 15:17:53', 'he is also a best doctor in nepal', 0, 1),
(3, 'Dr. Jyotindra Sharma ', 'kathmandu', '9861040204', 'jyotindra@gmail.com', '4c17f89c3fee041f229c8486e24d1aa9.jpg', 'Consultant Cardio Vascular Surgeon,', '10 year', '2017-12-19 05:57:14', 'he is doc doctor of nepal.', 0, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_hospitals`
--

CREATE TABLE `tbl_hospitals` (
  `h_id` int(11) NOT NULL,
  `h_name` varchar(255) NOT NULL,
  `h_address` varchar(255) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `pic` varchar(100) NOT NULL,
  `about` text NOT NULL,
  `doc_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_hospitals`
--

INSERT INTO `tbl_hospitals` (`h_id`, `h_name`, `h_address`, `phone`, `pic`, `about`, `doc_id`) VALUES
(1, 'Grande International Hospital', 'Tokha Road, Kathmandu 44600', '01-5159266', 'grandehospital.jpg', 'this is one of the best hospital in the nepal.', 1),
(2, 'Tribhuvan University Teaching Hospital', 'Maharajgunj Rd, Kathmandu 44600', '01-4410911', 'teaching.jpg', 'Tribhuvan University Teaching Hospital is one of the best hospital in the nepal.', 2),
(3, 'Norvic International Hospital', 'Kathmandu 44617', '01-4258554', 'norvic.jpg', 'Norvic International Hospital is the 1st private hospital to introduce the Cardiac Catheterization Lab in the country, we offer one of the worldâ€™s best Invasive & Non-Invasive Cardiac facilities to the nation.', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `u_id` int(11) NOT NULL,
  `u_name` varchar(255) NOT NULL,
  `u_address` varchar(255) NOT NULL,
  `u_email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`u_id`, `u_name`, `u_address`, `u_email`, `password`) VALUES
(1, 'bijay budhathoki', 'Ranibari', 'bijayabudhathoki98@gmail.com', '12345');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tbl_appointment`
--
ALTER TABLE `tbl_appointment`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `tbl_blood_donators`
--
ALTER TABLE `tbl_blood_donators`
  ADD PRIMARY KEY (`donator_id`);

--
-- Indexes for table `tbl_departments`
--
ALTER TABLE `tbl_departments`
  ADD PRIMARY KEY (`dep_id`);

--
-- Indexes for table `tbl_doctors`
--
ALTER TABLE `tbl_doctors`
  ADD PRIMARY KEY (`d_id`);

--
-- Indexes for table `tbl_hospitals`
--
ALTER TABLE `tbl_hospitals`
  ADD PRIMARY KEY (`h_id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_appointment`
--
ALTER TABLE `tbl_appointment`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_blood_donators`
--
ALTER TABLE `tbl_blood_donators`
  MODIFY `donator_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_departments`
--
ALTER TABLE `tbl_departments`
  MODIFY `dep_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_doctors`
--
ALTER TABLE `tbl_doctors`
  MODIFY `d_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_hospitals`
--
ALTER TABLE `tbl_hospitals`
  MODIFY `h_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
