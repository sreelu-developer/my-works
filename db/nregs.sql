-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 20, 2019 at 07:39 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nregs`
--

-- --------------------------------------------------------

--
-- Table structure for table `area_development_society`
--

CREATE TABLE `area_development_society` (
  `ad_id` int(11) NOT NULL,
  `pw_id` int(11) DEFAULT NULL,
  `ad_firstname` varchar(50) NOT NULL,
  `ad_lastname` varchar(50) NOT NULL,
  `ad_gender` varchar(10) NOT NULL,
  `ad_dob` date NOT NULL,
  `ad_joindate` date NOT NULL,
  `ad_terminatedate` date NOT NULL,
  `ad_emailid` varchar(100) NOT NULL,
  `ad_password` varchar(15) NOT NULL,
  `ad_mobilenumber` varchar(20) NOT NULL,
  `ad_status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `area_development_society`
--

INSERT INTO `area_development_society` (`ad_id`, `pw_id`, `ad_firstname`, `ad_lastname`, `ad_gender`, `ad_dob`, `ad_joindate`, `ad_terminatedate`, `ad_emailid`, `ad_password`, `ad_mobilenumber`, `ad_status`) VALUES
(1, 22, 'nithya', 'priya', 'male', '1969-12-25', '2006-03-02', '0000-00-00', 'nithya@gmail.com', '4567', '9876543888', 'active'),
(2, 20, 'keerthi', 'suresh', 'female', '1990-06-08', '2008-02-12', '0000-00-00', 'keerthi@gmail.com', '9876', '9087654321', 'active'),
(3, 7, 'kavya', 'k s', 'female', '1989-03-12', '2009-12-13', '0000-00-00', 'kavya@gmail.com', 'abc123', '8956783412', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `assistant_engineer`
--

CREATE TABLE `assistant_engineer` (
  `ae_id` int(11) NOT NULL,
  `ae_firstname` varchar(30) NOT NULL,
  `ae_lastname` varchar(30) NOT NULL,
  `ae_gender` varchar(10) NOT NULL,
  `ae_dob` date NOT NULL,
  `ae_joindate` date NOT NULL,
  `ae_terminatedate` date NOT NULL,
  `ae_emailid` varchar(100) NOT NULL,
  `ae_password` varchar(15) NOT NULL,
  `ae_mobilenumber` varchar(30) NOT NULL,
  `ae_status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assistant_engineer`
--

INSERT INTO `assistant_engineer` (`ae_id`, `ae_firstname`, `ae_lastname`, `ae_gender`, `ae_dob`, `ae_joindate`, `ae_terminatedate`, `ae_emailid`, `ae_password`, `ae_mobilenumber`, `ae_status`) VALUES
(5, 'nithya', 'priya', 'female', '1998-12-12', '2009-12-19', '2018-12-01', 'nithyapriya@gmail.com', '', '9876543211', 'terminate'),
(6, 'neenu', 'jose', 'female', '1998-12-12', '2003-12-12', '2018-12-01', 'neenu@gmail.com', 'cde123', '26787389', 'terminate'),
(7, 'NITHA', 'LALY', 'female', '1998-11-11', '2009-12-12', '2018-12-01', 'FFFD@GMAIL.COM', '', '135657', 'terminate'),
(8, 'mahi', 'm', 'male', '1998-12-12', '2009-12-12', '0000-00-00', 'hdfhj@gmail.com', '12345', '1543526367', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `em_id` int(11) NOT NULL,
  `pw_id` int(11) DEFAULT NULL,
  `ad_id` int(11) DEFAULT NULL,
  `em_firstname` varchar(30) NOT NULL,
  `em_lastname` varchar(30) NOT NULL,
  `em_gender` varchar(10) NOT NULL,
  `em_dob` date NOT NULL,
  `em_emailid` varchar(100) NOT NULL,
  `em_mobilenumber` varchar(20) NOT NULL,
  `em_rationcardnumber` varchar(20) NOT NULL,
  `em_password` varchar(15) NOT NULL,
  `em_approvalstatus` varchar(20) NOT NULL,
  `em_status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`em_id`, `pw_id`, `ad_id`, `em_firstname`, `em_lastname`, `em_gender`, `em_dob`, `em_emailid`, `em_mobilenumber`, `em_rationcardnumber`, `em_password`, `em_approvalstatus`, `em_status`) VALUES
(7, 7, 3, 'Anusree', 'Rajeev', 'female', '1999-01-01', 'anu@gmail.com', '123423543', '14125235', '123', 'aeapproved', 'approved'),
(8, 22, 1, 'Employee 1', 'Employee 1', 'female', '2000-01-01', 'employee1@gmail.com', '9747957905', '1234567', '123', 'aeapproved', 'approved'),
(9, 22, 1, 'Employee 2', 'Employee 2', 'male', '2000-01-01', 'employee2@gmail.com', '9747057901', 'wrqwrwe', '', 'aeapproved', 'approved'),
(10, 22, 1, 'Employee 3', 'Employee 3', 'female', '2000-01-01', 'employee3@gmail.com', '9747057910', 'dsagfsdgsdhg', '', 'aeapproved', 'approved'),
(11, 22, 1, 'Employee 4', 'Employee 4', 'female', '2000-01-01', 'employee4@gmail.com', '9747057801', 'sfsaxcbuhj', '', 'aeapproved', 'approved'),
(12, 22, 1, 'Employee 5', 'Employee 5', 'female', '2000-01-01', 'employee5@gmail.com', '9874562312', 'vqqehn', '', 'aeapproved', 'approved'),
(13, 22, 1, 'Employee 6', 'Employee 6', 'female', '2000-01-01', 'employee6@gmail.com', '9876453213', 'safbcxpv', '', 'aeapproved', 'approved'),
(14, 22, 1, 'Employee 7', 'Employee 7', 'female', '2000-01-01', 'employee7@gmail.com', '8765342134', 'mmqqsff', '123', 'aeapproved', 'approved'),
(15, 22, 1, 'Employee 8', 'Employee 8', 'female', '2000-01-01', 'employee8@gmail.com', '9087564312', 'fdasfsagd', '', 'aeapproved', 'approved'),
(16, 22, 1, 'Employee 9', 'Employee 9', 'female', '2000-01-01', 'employee9@gmail.com', '7843123458', 'safsadgsd', '', 'aeapproved', 'approved'),
(17, 22, 1, 'Employee 10', 'Employee 10', 'male', '2000-10-10', 'employee10@gmail.com', '9867341234', 'vvxcbedrs', '', 'aeapproved', 'approved'),
(18, 22, 1, 'Employee 11', 'Employee 11', 'female', '2000-02-01', 'employee11@gmail.com', '9845231819', 'vvpsarv', '', 'aeapproved', 'approved');

-- --------------------------------------------------------

--
-- Table structure for table `equipments`
--

CREATE TABLE `equipments` (
  `eq_id` int(11) NOT NULL,
  `eq_name` varchar(30) NOT NULL,
  `eq_charge` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `equipments`
--

INSERT INTO `equipments` (`eq_id`, `eq_name`, `eq_charge`) VALUES
(4, 'mazhu', 8),
(5, 'kodali', 5);

-- --------------------------------------------------------

--
-- Table structure for table `equipment_distribution`
--

CREATE TABLE `equipment_distribution` (
  `ed_id` int(11) NOT NULL,
  `eq_id` int(11) DEFAULT NULL,
  `ad_id` int(11) DEFAULT NULL,
  `em_id` int(11) DEFAULT NULL,
  `ed_charge` double NOT NULL,
  `ed_startdate` date NOT NULL,
  `ed_enddate` date NOT NULL,
  `ed_totaldistribution` double NOT NULL,
  `ed_totalamount` double NOT NULL,
  `ed_status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `equipment_distribution`
--

INSERT INTO `equipment_distribution` (`ed_id`, `eq_id`, `ad_id`, `em_id`, `ed_charge`, `ed_startdate`, `ed_enddate`, `ed_totaldistribution`, `ed_totalamount`, `ed_status`) VALUES
(3, 4, 3, 7, 8, '2019-01-13', '2019-01-31', 1, 8, 'RETURNED'),
(4, 4, 3, 7, 8, '2019-01-14', '2019-01-31', 1, 8, 'RETURNED'),
(5, 5, 1, 8, 5, '2019-01-17', '2019-01-17', 1, 5, 'RETURNED'),
(6, 5, 1, 14, 5, '2019-01-20', '2019-01-20', 1, 5, 'RETURNED');

-- --------------------------------------------------------

--
-- Table structure for table `equipment_inward`
--

CREATE TABLE `equipment_inward` (
  `ei_id` int(11) NOT NULL,
  `eq_id` int(11) DEFAULT NULL,
  `ei_qty` int(11) NOT NULL,
  `ei_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `equipment_inward`
--

INSERT INTO `equipment_inward` (`ei_id`, `eq_id`, `ei_qty`, `ei_date`) VALUES
(1, 4, 100, '2019-01-13'),
(2, 5, 200, '2019-01-13');

-- --------------------------------------------------------

--
-- Table structure for table `equipment_inward_ads`
--

CREATE TABLE `equipment_inward_ads` (
  `en_id` int(11) NOT NULL,
  `eq_id` int(11) DEFAULT NULL,
  `ad_id` int(11) DEFAULT NULL,
  `en_qty` int(11) NOT NULL,
  `en_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `equipment_inward_ads`
--

INSERT INTO `equipment_inward_ads` (`en_id`, `eq_id`, `ad_id`, `en_qty`, `en_date`) VALUES
(3, 5, 3, 10, '2019-01-13');

-- --------------------------------------------------------

--
-- Table structure for table `equipment_outward_ads`
--

CREATE TABLE `equipment_outward_ads` (
  `eo_id` int(11) NOT NULL,
  `eq_id` int(11) DEFAULT NULL,
  `ad_id` int(11) DEFAULT NULL,
  `eo_qty` int(11) NOT NULL,
  `eo_date` date NOT NULL,
  `eo_returnstatus` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `equipment_outward_ads`
--

INSERT INTO `equipment_outward_ads` (`eo_id`, `eq_id`, `ad_id`, `eo_qty`, `eo_date`, `eo_returnstatus`) VALUES
(4, 4, 3, 10, '2019-01-13', 'NOT-RETURNED'),
(5, 5, 3, 10, '2019-01-13', 'RETURNED'),
(6, 4, 1, 100, '2019-01-17', 'NOT-RETURNED'),
(7, 5, 1, 100, '2019-01-17', 'NOT-RETURNED');

-- --------------------------------------------------------

--
-- Table structure for table `equipment_stock`
--

CREATE TABLE `equipment_stock` (
  `es_id` int(11) NOT NULL,
  `eq_id` int(11) DEFAULT NULL,
  `eq_qty` int(11) NOT NULL,
  `eq_status` varchar(10) NOT NULL,
  `eq_date` date NOT NULL,
  `eq_reference` int(11) NOT NULL,
  `eq_referencetype` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `equipment_stock`
--

INSERT INTO `equipment_stock` (`es_id`, `eq_id`, `eq_qty`, `eq_status`, `eq_date`, `eq_reference`, `eq_referencetype`) VALUES
(7, 4, 100, 'INWARD', '2019-01-13', 1, 'STOCK-ENTRY-BY-AE'),
(8, 5, 200, 'INWARD', '2019-01-13', 2, 'STOCK-ENTRY-BY-AE'),
(9, 4, -10, 'OUTWARD', '2019-01-13', 4, 'STOCK-OUTWARD-TO-ADS'),
(10, 5, -10, 'OUTWARD', '2019-01-13', 5, 'STOCK-OUTWARD-TO-ADS'),
(11, 5, 10, 'INWARD', '2019-01-13', 2, 'STOCK-INWARD-BY-ADS'),
(12, 5, 10, 'INWARD', '2019-01-13', 3, 'STOCK-INWARD-BY-ADS'),
(13, 4, -100, 'OUTWARD', '2019-01-17', 6, 'STOCK-OUTWARD-TO-ADS'),
(14, 5, -100, 'OUTWARD', '2019-01-17', 7, 'STOCK-OUTWARD-TO-ADS');

-- --------------------------------------------------------

--
-- Table structure for table `panchayath_secretary`
--

CREATE TABLE `panchayath_secretary` (
  `ps_id` int(11) NOT NULL,
  `ps_firstname` varchar(30) NOT NULL,
  `ps_lastname` varchar(30) NOT NULL,
  `ps_gender` varchar(10) NOT NULL,
  `ps_dob` date NOT NULL,
  `ps_joindate` date NOT NULL,
  `ps_terminatedate` date NOT NULL,
  `ps_emailid` varchar(100) NOT NULL,
  `ps_password` varchar(15) NOT NULL,
  `ps_mobilenumber` varchar(30) NOT NULL,
  `ps_status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `panchayath_secretary`
--

INSERT INTO `panchayath_secretary` (`ps_id`, `ps_firstname`, `ps_lastname`, `ps_gender`, `ps_dob`, `ps_joindate`, `ps_terminatedate`, `ps_emailid`, `ps_password`, `ps_mobilenumber`, `ps_status`) VALUES
(10, 'rre', 'fdfd', 'female', '1998-11-01', '2008-12-11', '2018-12-01', 'fdhvj@gmail.com', '', '254356456', 'terminate'),
(11, 'niya ', 'p s', 'female', '1998-12-12', '2009-02-02', '2018-12-01', 'hjjhdfhhj@gmail.com', '', '32536767', 'terminate'),
(12, 'nithya', 'priya', 'female', '1998-12-12', '2009-12-12', '0000-00-00', 'nithya@gmail.com', '1234', '3668487', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `panchayath_ward`
--

CREATE TABLE `panchayath_ward` (
  `pw_id` int(11) NOT NULL,
  `pw_number` varchar(30) DEFAULT NULL,
  `pw_name` varchar(50) NOT NULL,
  `pw_lat` double DEFAULT NULL,
  `pw_lon` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `panchayath_ward`
--

INSERT INTO `panchayath_ward` (`pw_id`, `pw_number`, `pw_name`, `pw_lat`, `pw_lon`) VALUES
(7, '5', 'manalur', 0, 0),
(20, '24', 'kanjany', 0, 0),
(22, '10', 'edappal', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `panchayath_ward_member`
--

CREATE TABLE `panchayath_ward_member` (
  `pm_id` int(11) NOT NULL,
  `pw_id` int(11) DEFAULT NULL,
  `pm_firstname` varchar(50) NOT NULL,
  `pm_lastname` varchar(50) NOT NULL,
  `pm_gender` varchar(10) NOT NULL,
  `pm_dob` date NOT NULL,
  `pm_joindate` date NOT NULL,
  `pm_terminatedate` date NOT NULL,
  `pm_emailid` varchar(100) NOT NULL,
  `pm_mobilenumber` varchar(20) NOT NULL,
  `pm_password` varchar(15) NOT NULL,
  `pm_status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `panchayath_ward_member`
--

INSERT INTO `panchayath_ward_member` (`pm_id`, `pw_id`, `pm_firstname`, `pm_lastname`, `pm_gender`, `pm_dob`, `pm_joindate`, `pm_terminatedate`, `pm_emailid`, `pm_mobilenumber`, `pm_password`, `pm_status`) VALUES
(6, 22, 'Rajasekar', 'Pottekkat', 'male', '1986-05-24', '2019-01-02', '0000-00-00', '229rajeev@gmail.com', '08138064035', 'member', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `wage_configuration`
--

CREATE TABLE `wage_configuration` (
  `wc_id` int(11) NOT NULL,
  `wc_amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wage_configuration`
--

INSERT INTO `wage_configuration` (`wc_id`, `wc_amount`) VALUES
(1, 215);

-- --------------------------------------------------------

--
-- Table structure for table `web_administrator`
--

CREATE TABLE `web_administrator` (
  `wa_id` int(11) NOT NULL,
  `wa_username` varchar(30) NOT NULL,
  `wa_password` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `web_administrator`
--

INSERT INTO `web_administrator` (`wa_id`, `wa_username`, `wa_password`) VALUES
(1, 'nregsuser@gmail.com', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `work`
--

CREATE TABLE `work` (
  `wk_id` int(11) NOT NULL,
  `pw_id` int(11) DEFAULT NULL,
  `ad_id` int(11) DEFAULT NULL,
  `wk_type` varchar(20) NOT NULL,
  `wk_address` text NOT NULL,
  `wk_startdate` date NOT NULL,
  `wk_finishdate` date NOT NULL,
  `wk_status` varchar(15) DEFAULT NULL,
  `wk_memberapplydate` date NOT NULL,
  `wk_contract` varchar(20) NOT NULL,
  `wk_employeeapplystrength` int(11) DEFAULT NULL,
  `wk_adsdate` date DEFAULT NULL,
  `wk_adsstatus` varchar(15) DEFAULT NULL,
  `wk_panchayathdate` date DEFAULT NULL,
  `wk_panchayathstatus` varchar(15) DEFAULT NULL,
  `wk_aedate` date DEFAULT NULL,
  `wk_aestatus` varchar(15) DEFAULT NULL,
  `wk_employeeapprovestrength` int(11) DEFAULT NULL,
  `wk_totalattendance` varchar(20) NOT NULL,
  `wk_perheadwages` int(11) NOT NULL,
  `wk_totalcost` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `work`
--

INSERT INTO `work` (`wk_id`, `pw_id`, `ad_id`, `wk_type`, `wk_address`, `wk_startdate`, `wk_finishdate`, `wk_status`, `wk_memberapplydate`, `wk_contract`, `wk_employeeapplystrength`, `wk_adsdate`, `wk_adsstatus`, `wk_panchayathdate`, `wk_panchayathstatus`, `wk_aedate`, `wk_aestatus`, `wk_employeeapprovestrength`, `wk_totalattendance`, `wk_perheadwages`, `wk_totalcost`) VALUES
(4, 22, 1, 'publicproperty', 'Rajasekar Pottekkar House', '2019-01-16', '2019-01-16', 'finished', '2019-01-02', '9747057905', 10, '2019-01-03', 'approved', '2019-01-03', 'approved', '2019-01-03', 'approved', 10, '3', 215, 645),
(5, 22, 1, 'privateproperty', 'Manikandan\r\nS/o Sasi\r\nKandassankadavu', '2019-01-20', '2019-01-20', 'finished', '2019-01-20', '8765432178', 5, '2019-01-20', 'approved', '2019-01-20', 'approved', '2019-01-20', 'approved', 3, '3', 215, 215),
(6, 22, 0, 'publicproperty', 'house number 100-5', '0000-00-00', '0000-00-00', 'new', '2019-01-20', '8765432145', 7, NULL, 'waiting', NULL, 'waiting', NULL, 'waiting', 7, '', 215, 0);

-- --------------------------------------------------------

--
-- Table structure for table `work_attendance`
--

CREATE TABLE `work_attendance` (
  `wr_id` int(11) NOT NULL,
  `wa_id` int(11) DEFAULT NULL,
  `wk_id` int(11) DEFAULT NULL,
  `wr_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `work_attendance`
--

INSERT INTO `work_attendance` (`wr_id`, `wa_id`, `wk_id`, `wr_date`) VALUES
(12, 1, 4, '2019-01-16'),
(13, 2, 4, '2019-01-16'),
(14, 1, 4, '2019-01-17'),
(15, 13, 5, '2019-01-20'),
(16, 14, 5, '2019-01-20'),
(17, 13, 5, '2019-01-21');

-- --------------------------------------------------------

--
-- Table structure for table `work_employee_allotment`
--

CREATE TABLE `work_employee_allotment` (
  `wa_id` int(11) NOT NULL,
  `wk_id` int(11) DEFAULT NULL,
  `em_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `work_employee_allotment`
--

INSERT INTO `work_employee_allotment` (`wa_id`, `wk_id`, `em_id`) VALUES
(1, 4, 8),
(2, 4, 9),
(3, 4, 10),
(4, 4, 11),
(5, 4, 12),
(6, 4, 13),
(7, 4, 14),
(8, 4, 15),
(9, 4, 16),
(12, 4, 18),
(13, 5, 10),
(14, 5, 12),
(15, 5, 13);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `area_development_society`
--
ALTER TABLE `area_development_society`
  ADD PRIMARY KEY (`ad_id`);

--
-- Indexes for table `assistant_engineer`
--
ALTER TABLE `assistant_engineer`
  ADD PRIMARY KEY (`ae_id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`em_id`);

--
-- Indexes for table `equipments`
--
ALTER TABLE `equipments`
  ADD PRIMARY KEY (`eq_id`);

--
-- Indexes for table `equipment_distribution`
--
ALTER TABLE `equipment_distribution`
  ADD PRIMARY KEY (`ed_id`);

--
-- Indexes for table `equipment_inward`
--
ALTER TABLE `equipment_inward`
  ADD PRIMARY KEY (`ei_id`);

--
-- Indexes for table `equipment_inward_ads`
--
ALTER TABLE `equipment_inward_ads`
  ADD PRIMARY KEY (`en_id`);

--
-- Indexes for table `equipment_outward_ads`
--
ALTER TABLE `equipment_outward_ads`
  ADD PRIMARY KEY (`eo_id`);

--
-- Indexes for table `equipment_stock`
--
ALTER TABLE `equipment_stock`
  ADD PRIMARY KEY (`es_id`);

--
-- Indexes for table `panchayath_secretary`
--
ALTER TABLE `panchayath_secretary`
  ADD PRIMARY KEY (`ps_id`);

--
-- Indexes for table `panchayath_ward`
--
ALTER TABLE `panchayath_ward`
  ADD PRIMARY KEY (`pw_id`),
  ADD UNIQUE KEY `pw_number` (`pw_number`);

--
-- Indexes for table `panchayath_ward_member`
--
ALTER TABLE `panchayath_ward_member`
  ADD PRIMARY KEY (`pm_id`);

--
-- Indexes for table `wage_configuration`
--
ALTER TABLE `wage_configuration`
  ADD PRIMARY KEY (`wc_id`);

--
-- Indexes for table `web_administrator`
--
ALTER TABLE `web_administrator`
  ADD PRIMARY KEY (`wa_id`);

--
-- Indexes for table `work`
--
ALTER TABLE `work`
  ADD PRIMARY KEY (`wk_id`);

--
-- Indexes for table `work_attendance`
--
ALTER TABLE `work_attendance`
  ADD PRIMARY KEY (`wr_id`);

--
-- Indexes for table `work_employee_allotment`
--
ALTER TABLE `work_employee_allotment`
  ADD PRIMARY KEY (`wa_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `area_development_society`
--
ALTER TABLE `area_development_society`
  MODIFY `ad_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `assistant_engineer`
--
ALTER TABLE `assistant_engineer`
  MODIFY `ae_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `em_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `equipments`
--
ALTER TABLE `equipments`
  MODIFY `eq_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `equipment_distribution`
--
ALTER TABLE `equipment_distribution`
  MODIFY `ed_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `equipment_inward`
--
ALTER TABLE `equipment_inward`
  MODIFY `ei_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `equipment_inward_ads`
--
ALTER TABLE `equipment_inward_ads`
  MODIFY `en_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `equipment_outward_ads`
--
ALTER TABLE `equipment_outward_ads`
  MODIFY `eo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `equipment_stock`
--
ALTER TABLE `equipment_stock`
  MODIFY `es_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `panchayath_secretary`
--
ALTER TABLE `panchayath_secretary`
  MODIFY `ps_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `panchayath_ward`
--
ALTER TABLE `panchayath_ward`
  MODIFY `pw_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `panchayath_ward_member`
--
ALTER TABLE `panchayath_ward_member`
  MODIFY `pm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `wage_configuration`
--
ALTER TABLE `wage_configuration`
  MODIFY `wc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `web_administrator`
--
ALTER TABLE `web_administrator`
  MODIFY `wa_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `work`
--
ALTER TABLE `work`
  MODIFY `wk_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `work_attendance`
--
ALTER TABLE `work_attendance`
  MODIFY `wr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `work_employee_allotment`
--
ALTER TABLE `work_employee_allotment`
  MODIFY `wa_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
