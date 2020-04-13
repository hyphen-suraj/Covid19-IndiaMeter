-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 13, 2020 at 08:31 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `covid19`
--

-- --------------------------------------------------------

--
-- Table structure for table `countrywise`
--

CREATE TABLE `countrywise` (
  `id` int(3) NOT NULL,
  `country` varchar(235) NOT NULL,
  `confirmed` bigint(200) NOT NULL,
  `death` bigint(200) NOT NULL,
  `recovered` bigint(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `countrywise`
--

INSERT INTO `countrywise` (`id`, `country`, `confirmed`, `death`, `recovered`) VALUES
(219, 'United States', 299861, 8133, 14518),
(220, 'Spain', 124736, 11814, 34219),
(221, 'Italy', 124632, 15362, 20996),
(222, 'Italy', 124632, 15362, 20996),
(223, 'Germany', 92155, 1300, 14361),
(224, 'China', 81639, 3326, 76751),
(225, 'France', 64338, 6507, 14008),
(226, 'Iran', 55743, 3452, 17935);

-- --------------------------------------------------------

--
-- Table structure for table `dailylist`
--

CREATE TABLE `dailylist` (
  `date` varchar(235) NOT NULL,
  `active` int(30) NOT NULL,
  `recovered` int(30) NOT NULL,
  `dead` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dailylist`
--

INSERT INTO `dailylist` (`date`, `active`, `recovered`, `dead`) VALUES
('16 Mar', 127, 14, 2),
('17 Mar', 146, 15, 3),
('18 Mar', 171, 15, 3),
('19 Mar', 199, 20, 4),
('20 Mar', 258, 23, 4),
('21 Mar', 334, 23, 4),
('22 Mar', 403, 23, 7),
('23 Mar', 505, 25, 9),
('24 Mar', 571, 40, 10),
('25 Mar', 657, 43, 11),
('26 Mar', 735, 50, 16),
('27 Mar', 886, 75, 19),
('28 Mar', 1029, 85, 24),
('29 Mar', 1139, 102, 27),
('30 Mar', 1347, 137, 43);

-- --------------------------------------------------------

--
-- Table structure for table `outside`
--

CREATE TABLE `outside` (
  `id` int(3) NOT NULL,
  `country` varchar(235) NOT NULL,
  `active` int(11) NOT NULL,
  `death` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `outside`
--

INSERT INTO `outside` (`id`, `country`, `active`, `death`) VALUES
(1, 'Hong Kong', 1, 0),
(2, 'Iran', 254, 1),
(3, 'Italy', 5, 0),
(4, 'Kuwait', 1, 0),
(5, 'Rwanda', 1, 0),
(6, 'Singapore', 1, 0),
(7, 'Sri Lanka', 1, 0),
(8, 'United Arab Emirates', 12, 0);

-- --------------------------------------------------------

--
-- Table structure for table `statewiselist`
--

CREATE TABLE `statewiselist` (
  `state` varchar(235) NOT NULL,
  `confirmed` int(11) NOT NULL,
  `recovered` int(11) NOT NULL,
  `death` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `statewiselist`
--

INSERT INTO `statewiselist` (`state`, `confirmed`, `recovered`, `death`) VALUES
('Maharashtra', 423, 42, 21),
('Kerala', 286, 28, 2),
('Tamil Nadu', 309, 6, 1),
('Delhi', 293, 6, 4),
('Rajasthan', 133, 3, 0),
('Uttar Pradesh', 121, 17, 2),
('Andhra Pradesh', 149, 2, 0),
('Karnataka', 124, 11, 3),
('Telangana', 154, 17, 9),
('Gujarat', 88, 10, 7),
('Madhya Pradesh', 107, 0, 8),
('Jammu and Kashmir', 70, 3, 2),
('Punjab', 47, 1, 5),
('Haryana', 49, 27, 0),
('West Bengal', 53, 3, 6),
('Bihar', 29, 3, 1),
('Chandigarh', 18, 0, 0),
('Ladakh', 13, 3, 0),
('Assam', 16, 0, 0),
('Andaman and Nicobar Islands', 10, 0, 0),
('Chhattisgarh', 9, 3, 0),
('Uttarakhand', 10, 2, 0),
('Goa', 5, 0, 0),
('Odisha', 5, 1, 0),
('Himachal Pradesh', 6, 1, 1),
('Puducherry', 3, 0, 0),
('Jharkhand', 2, 0, 0),
('Manipur', 2, 0, 0),
('Mizoram', 1, 0, 0),
('Arunachal Pradesh', 1, 0, 0),
('Dadra and Nagar Haveli', 0, 0, 0),
('Daman and Diu', 0, 0, 0),
('Lakshadweep', 0, 0, 0),
('Meghalaya', 0, 0, 0),
('Nagaland', 0, 0, 0),
('Sikkim', 0, 0, 0),
('Tripura', 0, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `countrywise`
--
ALTER TABLE `countrywise`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `outside`
--
ALTER TABLE `outside`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `countrywise`
--
ALTER TABLE `countrywise`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=227;

--
-- AUTO_INCREMENT for table `outside`
--
ALTER TABLE `outside`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
