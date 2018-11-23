-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 16, 2018 at 05:59 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hms`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_doctor`
--

CREATE TABLE `add_doctor` (
  `id` int(11) NOT NULL,
  `s_d_s` varchar(111) NOT NULL,
  `a_d_name` varchar(111) NOT NULL,
  `a_d_fees` varchar(111) NOT NULL,
  `a_d_number` varchar(111) NOT NULL,
  `a_d_email` varchar(111) NOT NULL,
  `a_d_password` varchar(111) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `add_doctor`
--

INSERT INTO `add_doctor` (`id`, `s_d_s`, `a_d_name`, `a_d_fees`, `a_d_number`, `a_d_email`, `a_d_password`) VALUES
(1, 'Medicin', 'mr.x', '400tk', '+880123456789', 'dr.x@gmail.com', '12345'),
(2, 'Bones Specialist', 'dr.y', '500tk', '+880123456789', 'dr.x@gmail.com', '123456789');

-- --------------------------------------------------------

--
-- Table structure for table `a_register`
--

CREATE TABLE `a_register` (
  `id` int(50) NOT NULL,
  `a_name` varchar(100) NOT NULL,
  `a_password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `a_register`
--

INSERT INTO `a_register` (`id`, `a_name`, `a_password`) VALUES
(1, 'admin', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `bookappoinment`
--

CREATE TABLE `bookappoinment` (
  `s_d_s` varchar(111) NOT NULL,
  `d_name` varchar(111) NOT NULL,
  `s_a_d_name` varchar(111) NOT NULL,
  `s_a_d_date` varchar(111) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bookappoinment`
--

INSERT INTO `bookappoinment` (`s_d_s`, `d_name`, `s_a_d_name`, `s_a_d_date`) VALUES
('Bones Specialist', 'dr.y', '500tk', '15/01/18');

-- --------------------------------------------------------

--
-- Table structure for table `doctor_special`
--

CREATE TABLE `doctor_special` (
  `id` int(111) NOT NULL,
  `d_s_name` varchar(111) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctor_special`
--

INSERT INTO `doctor_special` (`id`, `d_s_name`) VALUES
(1, 'General Physician'),
(2, 'Dentist'),
(3, 'Bones Specialist'),
(4, 'Medicin');

-- --------------------------------------------------------

--
-- Table structure for table `p_register`
--

CREATE TABLE `p_register` (
  `id` int(111) NOT NULL,
  `p_name` varchar(100) NOT NULL,
  `p_address` varchar(100) NOT NULL,
  `p_city` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `p_email` varchar(100) NOT NULL,
  `p_password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `p_register`
--

INSERT INTO `p_register` (`id`, `p_name`, `p_address`, `p_city`, `gender`, `p_email`, `p_password`) VALUES
(1, 'Toaha', 'Muradpur,ctg,bd', 'ctg,bangladesh', 'Male', 'toaha871954@gmail.com', '12345'),
(2, 'raju', 'Muradpur,ctg', 'ctg,bangladesh', 'Male', 'ismat1@gmail.com', '12345'),
(3, 'bappy', 'Muradpur,ctg,bd', 'ctg,bd', 'Male', 'ismat@gmail.com', '12345'),
(4, 'yeasin', 'Muradpur,ctg,bd', 'ctg', 'Male', 'ismat@gmail.com', '12345');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_doctor`
--
ALTER TABLE `add_doctor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `a_register`
--
ALTER TABLE `a_register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctor_special`
--
ALTER TABLE `doctor_special`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `p_register`
--
ALTER TABLE `p_register`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `add_doctor`
--
ALTER TABLE `add_doctor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `a_register`
--
ALTER TABLE `a_register`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `doctor_special`
--
ALTER TABLE `doctor_special`
  MODIFY `id` int(111) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `p_register`
--
ALTER TABLE `p_register`
  MODIFY `id` int(111) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
