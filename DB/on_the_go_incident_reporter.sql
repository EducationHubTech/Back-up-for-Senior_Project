-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 16, 2023 at 06:32 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `on_the_go incident reporter`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` varchar(50) CHARACTER SET latin1 NOT NULL,
  `admin_pass` varchar(50) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_pass`) VALUES
('senior@123', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `complaint`
--

CREATE TABLE `complaint` (
  `c_id` int(11) NOT NULL,
  `id_no` bigint(12) NOT NULL,
  `location` varchar(50) NOT NULL,
  `type_crime` varchar(50) NOT NULL,
  `d_o_c` date NOT NULL,
  `repo_time_and_date` varchar(50) NOT NULL DEFAULT current_timestamp(),
  `description` varchar(7000) NOT NULL,
  `inc_status` varchar(50) DEFAULT 'Unassigned',
  `pol_status` varchar(50) DEFAULT 'null',
  `p_id` varchar(50) DEFAULT 'Null'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `complaint`
--

INSERT INTO `complaint` (`c_id`, `id_no`, `location`, `type_crime`, `d_o_c`, `repo_time_and_date`, `description`, `inc_status`, `pol_status`, `p_id`) VALUES
(1, 13577, 'Addis Ketema', 'Robbery', '2023-03-13', '2023-03-13 17:24:00', 'some one robbed the house!!', 'Unassigned', 'null', 'Null'),
(3, 22345, 'Akaki-Kality', 'Theft', '2023-03-13', '2023-03-13 19:00:58', 'he ...', 'Unassigned', 'null', 'Null'),
(7, 13577, 'Akaki-Kality', 'Robbery', '2023-03-16', '2023-03-16 20:25:33', 'is it work or not', 'Unassigned', 'null', 'Null');

-- --------------------------------------------------------

--
-- Table structure for table `del_taker`
--

CREATE TABLE `del_taker` (
  `c_id` int(11) NOT NULL,
  `id_no` bigint(12) NOT NULL,
  `type_crime` varchar(50) CHARACTER SET latin1 NOT NULL,
  `d_o_c` date NOT NULL,
  `repo_time_and_date` varchar(50) CHARACTER SET latin1 NOT NULL,
  `location` varchar(50) CHARACTER SET latin1 NOT NULL,
  `description` varchar(7000) CHARACTER SET latin1 NOT NULL,
  `inc_status` varchar(50) CHARACTER SET latin1 NOT NULL,
  `p_id` varchar(50) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `handler`
--

CREATE TABLE `handler` (
  `h_id` varchar(50) CHARACTER SET latin1 NOT NULL,
  `h_name` varchar(50) CHARACTER SET latin1 NOT NULL,
  `h_pass` varchar(50) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `handler`
--

INSERT INTO `handler` (`h_id`, `h_name`, `h_pass`) VALUES
('ahlam@22', 'Ahlam', '1235'),
('girum@23', 'Girum', '2345');

-- --------------------------------------------------------

--
-- Table structure for table `p_handler`
--

CREATE TABLE `p_handler` (
  `c_id` int(11) NOT NULL,
  `id_no` bigint(12) NOT NULL,
  `type_crime` varchar(50) CHARACTER SET latin1 NOT NULL,
  `d_o_c` date NOT NULL,
  `repo_time_and_date` varchar(50) CHARACTER SET latin1 NOT NULL,
  `location` varchar(50) CHARACTER SET latin1 NOT NULL,
  `description` varchar(7000) CHARACTER SET latin1 NOT NULL,
  `inc_status` varchar(50) CHARACTER SET latin1 NOT NULL,
  `p_id` varchar(50) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `p_handler`
--

INSERT INTO `p_handler` (`c_id`, `id_no`, `type_crime`, `d_o_c`, `repo_time_and_date`, `location`, `description`, `inc_status`, `p_id`) VALUES
(1, 13577, 'Robbery', '2023-03-13', '2023-03-13 17:24:00', 'Addis Ketema', 'some one robbed the house!!', 'Unassigned', 'Null'),
(3, 22345, 'Theft', '2023-03-13', '2023-03-13 19:00:58', 'Akaki-Kality', 'he ...', 'Unassigned', 'Null'),
(7, 13577, 'Robbery', '2023-03-16', '2023-03-16 20:25:33', 'Akaki-Kality', 'is it work or not', 'Unassigned', 'Null');

-- --------------------------------------------------------

--
-- Table structure for table `p_police`
--

CREATE TABLE `p_police` (
  `c_id` int(11) NOT NULL,
  `id_no` bigint(12) NOT NULL,
  `type_crime` varchar(50) CHARACTER SET latin1 NOT NULL,
  `d_o_c` date NOT NULL,
  `repo_time_and_date` varchar(50) CHARACTER SET latin1 NOT NULL,
  `location` varchar(50) CHARACTER SET latin1 NOT NULL,
  `description` varchar(7000) CHARACTER SET latin1 NOT NULL,
  `inc_status` varchar(50) CHARACTER SET latin1 NOT NULL,
  `p_id` varchar(50) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sub_police`
--

CREATE TABLE `sub_police` (
  `p_name` varchar(50) NOT NULL,
  `p_id` varchar(50) NOT NULL,
  `spec` varchar(50) NOT NULL,
  `location` varchar(50) NOT NULL,
  `p_pass` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_police`
--

INSERT INTO `sub_police` (`p_name`, `p_id`, `spec`, `location`, `p_pass`) VALUES
('Manuhe', '001', 'Inspector', 'Bole', '12@3456'),
('yoseph', '002', 'Inspector', 'Akaki-Kality', '1234'),
('Mahlet', '12344', 'Surf', 'Kolfe Keranio', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `taker`
--

CREATE TABLE `taker` (
  `T_id` varchar(50) CHARACTER SET latin1 NOT NULL,
  `T_name` varchar(50) CHARACTER SET latin1 NOT NULL,
  `T_pass` varchar(50) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `taker`
--

INSERT INTO `taker` (`T_id`, `T_name`, `T_pass`) VALUES
('123@45', 'girum', '222333');

-- --------------------------------------------------------

--
-- Table structure for table `update_case`
--

CREATE TABLE `update_case` (
  `c_id` int(11) NOT NULL,
  `d_o_u` timestamp NOT NULL DEFAULT current_timestamp(),
  `case_update` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `u_name` varchar(50) NOT NULL,
  `u_id` varchar(50) NOT NULL,
  `u_pass` varchar(50) NOT NULL,
  `sub` varchar(50) NOT NULL,
  `woreda` int(2) NOT NULL,
  `id_no` bigint(12) NOT NULL,
  `gen` varchar(15) NOT NULL,
  `mob` bigint(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`u_name`, `u_id`, `u_pass`, `sub`, `woreda`, `id_no`, `gen`, `mob`) VALUES
('mahlet worku', 'mahlet13@gmail.com', 'mahi12', 'Lideta', 13, 13577, 'Female', 251345674833),
('girum seifu', 'girum@3452', '222333', 'Lemi Kura', 4, 22345, 'Male', 251945678689),
('ahlam', 'ahlam42@gmail.com', '12@3456', 'Kolfe Keranio', 14, 32145, 'Female', 254987654234),
('Manuhe Melakmu', 'manuhe11melkamu@gmail.com', '12@3456', 'Arada', 0, 54322, 'Male', 251920730239);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `complaint`
--
ALTER TABLE `complaint`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `handler`
--
ALTER TABLE `handler`
  ADD PRIMARY KEY (`h_id`);

--
-- Indexes for table `sub_police`
--
ALTER TABLE `sub_police`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `taker`
--
ALTER TABLE `taker`
  ADD PRIMARY KEY (`T_id`);

--
-- Indexes for table `update_case`
--
ALTER TABLE `update_case`
  ADD UNIQUE KEY `d_o_u` (`d_o_u`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_no`),
  ADD UNIQUE KEY `u_id` (`u_id`),
  ADD UNIQUE KEY `mob` (`mob`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `complaint`
--
ALTER TABLE `complaint`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
