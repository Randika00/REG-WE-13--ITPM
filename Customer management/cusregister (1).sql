-- phpMyAdmin SQL Dump
-- version 5.3.0-dev+20220503.92457c1607
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2022 at 09:45 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `moments`
--

-- --------------------------------------------------------

--
-- Table structure for table `cusregister`
--

CREATE TABLE `cusregister` (
  `cusId` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Address` varchar(50) NOT NULL,
  `NIC` varchar(15) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `contactNum` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cusregister`
--

INSERT INTO `cusregister` (`cusId`, `Name`, `Address`, `NIC`, `Email`, `password`, `contactNum`) VALUES
(30, 'Laki', 'No.4,Lake Terrace,Athurugiriya', '200012345678', 'laki@gmailcom', 'laki', 771234567),
(44, 'Shane', '8/Temple road,Colombo', '976765865v', 'shane@gmail.com', 'shane', 761234567),
(46, 'Hirantha', '8/Airport road,Katunayake', '926467558v', 'hirantha@gmail.com', 'hirantha', 766547643),
(47, 'Dilesha', '9/147,Japalawatta,Minuwangoda', '200012345677', 'dilesha@gmail.com', 'dilesha', 714567821),
(48, 'Chama', '7,Nochchiyagma,Anuradhapura', '991234567v', 'chama@gmail.com', 'chama', 777654321),
(49, 'Tharusha', 'No.4/Niwithigaqla,Rathnapura', '786521588v', 'tharusha@gmail.com', 'tharusha', 719876543);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cusregister`
--
ALTER TABLE `cusregister`
  ADD PRIMARY KEY (`cusId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cusregister`
--
ALTER TABLE `cusregister`
  MODIFY `cusId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;



