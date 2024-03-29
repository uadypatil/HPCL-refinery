-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 27, 2024 at 01:12 PM
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
-- Database: `hpcl`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `address` varchar(250) NOT NULL,
  `mobile_no` varchar(250) NOT NULL,
  `product_name` varchar(250) NOT NULL,
  `date` date NOT NULL,
  `delete_status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `address`, `mobile_no`, `product_name`, `date`, `delete_status`) VALUES
(1, 'Uday patil', 'meharun, jalgaon', '7385975192', 'Product one', '2024-03-22', 1),
(2, 'Prasad deore', 'Nashik', '7894560123', 'Product two', '2024-03-22', 1),
(3, 'asdfllkj', 'Mumbai, maharashtra', '7354646484', 'Product name here', '2024-03-25', 1),
(4, 'qwepoiu', 'Nashik, maharashtra', '4565328425', 'Product name', '2024-03-25', 1);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `type` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`, `type`, `name`) VALUES
(1, 'admin', 'admin', 'admin', 'udayadmin'),
(2, 'refinery1', 'refinery1', 'refinery', 'udayrefinery'),
(3, 'customer1', 'customer1', 'customer', 'udaycustomer');

-- --------------------------------------------------------

--
-- Table structure for table `query_status`
--

CREATE TABLE `query_status` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `query` varchar(1000) NOT NULL,
  `status` varchar(20) DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `query_status`
--

INSERT INTO `query_status` (`id`, `customer_id`, `query`, `status`) VALUES
(1, 1, 'customer one query goes here', 'done'),
(2, 2, 'customer two query goes here', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `refinery`
--

CREATE TABLE `refinery` (
  `refinery_id` int(11) NOT NULL,
  `sample_label` varchar(250) NOT NULL,
  `supply_location` varchar(250) NOT NULL,
  `regional_office` varchar(250) NOT NULL,
  `retail_outletname` varchar(250) NOT NULL,
  `location` varchar(250) NOT NULL,
  `oil_companyname` varchar(250) NOT NULL,
  `product_name` varchar(250) NOT NULL,
  `sample_source` varchar(250) NOT NULL,
  `dispense_unitno` varchar(20) NOT NULL,
  `sample_drawndt` date NOT NULL,
  `sample_drawntime` time NOT NULL,
  `tank_no` varchar(20) NOT NULL,
  `den_rec_denregister` varchar(250) NOT NULL,
  `den_obs_inspofficer` varchar(250) NOT NULL,
  `p_lreceipt_invoicedt` date NOT NULL,
  `lastreceipt_tanklorryno` varchar(20) NOT NULL,
  `cash_memono` varchar(20) NOT NULL,
  `woodbox_plastsealno` varchar(20) NOT NULL,
  `cash_memodt` date NOT NULL,
  `delete_status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `refinery`
--

INSERT INTO `refinery` (`refinery_id`, `sample_label`, `supply_location`, `regional_office`, `retail_outletname`, `location`, `oil_companyname`, `product_name`, `sample_source`, `dispense_unitno`, `sample_drawndt`, `sample_drawntime`, `tank_no`, `den_rec_denregister`, `den_obs_inspofficer`, `p_lreceipt_invoicedt`, `lastreceipt_tanklorryno`, `cash_memono`, `woodbox_plastsealno`, `cash_memodt`, `delete_status`) VALUES
(1, 'sampal label', 'supply location', 'regional office', 'retail outlet name', 'location', 'oil company name', 'product name', 'sample source', 'dispense unit number', '2024-03-21', '17:50:00', '10T2', 'density recorded in density register at 15 deg c', 'density observed by inspecting officer at 15deg c', '2024-03-21', '1001', '1001', '1001', '2024-03-21', 1),
(2, 'Demo label', 'Demo location', 'Demo office', 'outlet name here', 'nashik, maharashtra', 'Oil company', 'Petrol', 'source of sample here', 'e220', '2024-03-22', '16:22:26', '10T3', 'Density', 'Density', '2024-03-22', '1002', '1002', 'w002', '2024-03-22', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `query_status`
--
ALTER TABLE `query_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `refinery`
--
ALTER TABLE `refinery`
  ADD PRIMARY KEY (`refinery_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `query_status`
--
ALTER TABLE `query_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
