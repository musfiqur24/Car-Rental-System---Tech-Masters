-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 27, 2024 at 01:06 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `carrental`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `UserName` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `updationDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `UserName`, `Password`, `updationDate`) VALUES
(1, 'admin', 'admin', '0000-00-00 00:00:00'),
(2, '1', '1', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tblbooking`
--

CREATE TABLE `tblbooking` (
  `id` int(11) NOT NULL,
  `userEmail` varchar(100) DEFAULT NULL,
  `VehicleId` int(11) DEFAULT NULL,
  `FromDate` varchar(20) DEFAULT NULL,
  `ToDate` varchar(20) DEFAULT NULL,
  `message` varchar(255) DEFAULT NULL,
  `Status` int(11) DEFAULT NULL,
  `PostingDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblbooking`
--

INSERT INTO `tblbooking` (`id`, `userEmail`, `VehicleId`, `FromDate`, `ToDate`, `message`, `Status`, `PostingDate`) VALUES
(1, 'test@gmail.com', 2, '22/05/2024', '25/05/2024', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco', 1, '2024-05-19 20:15:43'),
(2, 'test@gmail.com', 3, '30/05/2024', '02/06/2024', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco', 2, '2024-05-26 20:15:43'),
(3, 'test@gmail.com', 4, '02/06/2024', '07/06/2024', 'Lorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ', 0, '2024-05-26 21:10:06'),
(4, '1@gmail.com', 3, '12', '13', '23', 2, '2024-06-27 13:10:25'),
(5, '1@gmail.com', 3, '12', '23', '3dw', 2, '2024-06-27 14:44:09'),
(6, '1@gmail.com', 6, '12', '13', 'For Visit', 1, '2024-06-29 14:29:23'),
(7, 'rehnumatahsin08@gmail.com', 6, '06/07/2024', '10/07/2024', 'Hi. I would like to...', 0, '2024-07-06 10:39:11'),
(8, 'rehnumatahsin99@gmail.com', 3, '07/07/2024', '12/07/2024', 'Hi. I would like to ....', 1, '2024-07-06 11:19:13'),
(9, 'rehnumatahsin23@gmail.com', 7, '06/07/2024', '12/07/2024', 'Hi. I would like to....', 1, '2024-07-26 13:50:35');

-- --------------------------------------------------------

--
-- Table structure for table `tblbrands`
--

CREATE TABLE `tblbrands` (
  `id` int(11) NOT NULL,
  `BrandName` varchar(120) NOT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblbrands`
--

INSERT INTO `tblbrands` (`id`, `BrandName`, `CreationDate`, `UpdationDate`) VALUES
(1, 'Maruti', '2024-05-18 16:24:34', '2024-05-19 06:42:23'),
(2, 'BMW', '2024-05-18 16:24:50', NULL),
(3, 'Audi', '2024-05-18 16:25:03', NULL),
(4, 'Nissan', '2024-05-18 16:25:13', NULL),
(5, 'Toyota', '2024-05-18 16:25:24', NULL),
(7, 'Marutiu', '2024-05-19 06:22:13', NULL),
(8, 'Royal', '2024-06-27 14:31:03', NULL),
(9, 'Shafa', '2024-06-28 10:51:07', NULL),
(16, 'Volkswagen', '2024-07-06 11:20:00', NULL),
(17, 'Proton', '2024-07-26 13:52:13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblusers`
--

CREATE TABLE `tblusers` (
  `id` int(11) NOT NULL,
  `FullName` varchar(120) DEFAULT NULL,
  `EmailId` varchar(100) DEFAULT NULL,
  `Password` varchar(100) DEFAULT NULL,
  `ContactNo` char(11) DEFAULT NULL,
  `dob` varchar(100) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `City` varchar(100) DEFAULT NULL,
  `Country` varchar(100) DEFAULT NULL,
  `RegDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblusers`
--

INSERT INTO `tblusers` (`id`, `FullName`, `EmailId`, `Password`, `ContactNo`, `dob`, `Address`, `City`, `Country`, `RegDate`, `UpdationDate`) VALUES
(5, 'Clive Dela Cruz', 'clive@gmail.com', '588844f1b69fe83502cac2a6df440452', '0945208280', NULL, NULL, NULL, NULL, '2024-04-22 13:38:20', NULL),
(6, '1', '1@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', '1', '', '1', '1', '1', '2024-06-27 13:08:42', '2024-06-27 13:13:56'),
(7, 'Rehnuma', 'rehnumatahsin08@gmail.com', '6ebe76c9fb411be97b3b0d48b791a7c9', '0123456789', NULL, NULL, NULL, NULL, '2024-07-06 09:57:58', NULL),
(8, 'Rehnuma Tahsin', 'rehnumatahsin99@gmail.com', '6ebe76c9fb411be97b3b0d48b791a7c9', '0123456789', NULL, NULL, NULL, NULL, '2024-07-06 11:17:59', NULL),
(9, 'Rahim Rehnuma ', 'rehnumatahsin23@gmail.com', '6ebe76c9fb411be97b3b0d48b791a7c9', '0123456789', NULL, NULL, NULL, NULL, '2024-07-26 13:49:36', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblvehicles`
--

CREATE TABLE `tblvehicles` (
  `id` int(11) NOT NULL,
  `VehiclesTitle` varchar(150) DEFAULT NULL,
  `VehiclesBrand` int(11) DEFAULT NULL,
  `VehiclesOverview` longtext DEFAULT NULL,
  `PricePerDay` int(11) DEFAULT NULL,
  `FuelType` varchar(100) DEFAULT NULL,
  `ModelYear` int(6) DEFAULT NULL,
  `SeatingCapacity` int(11) DEFAULT NULL,
  `Vimage1` varchar(120) DEFAULT NULL,
  `Vimage2` varchar(120) DEFAULT NULL,
  `Vimage3` varchar(120) DEFAULT NULL,
  `Vimage4` varchar(120) DEFAULT NULL,
  `Vimage5` varchar(120) DEFAULT NULL,
  `AirConditioner` int(11) DEFAULT NULL,
  `PowerDoorLocks` int(11) DEFAULT NULL,
  `AntiLockBrakingSystem` int(11) DEFAULT NULL,
  `BrakeAssist` int(11) DEFAULT NULL,
  `PowerSteering` int(11) DEFAULT NULL,
  `DriverAirbag` int(11) DEFAULT NULL,
  `PassengerAirbag` int(11) DEFAULT NULL,
  `PowerWindows` int(11) DEFAULT NULL,
  `CDPlayer` int(11) DEFAULT NULL,
  `CentralLocking` int(11) DEFAULT NULL,
  `CrashSensor` int(11) DEFAULT NULL,
  `LeatherSeats` int(11) DEFAULT NULL,
  `RegDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblvehicles`
--

INSERT INTO `tblvehicles` (`id`, `VehiclesTitle`, `VehiclesBrand`, `VehiclesOverview`, `PricePerDay`, `FuelType`, `ModelYear`, `SeatingCapacity`, `Vimage1`, `Vimage2`, `Vimage3`, `Vimage4`, `Vimage5`, `AirConditioner`, `PowerDoorLocks`, `AntiLockBrakingSystem`, `BrakeAssist`, `PowerSteering`, `DriverAirbag`, `PassengerAirbag`, `PowerWindows`, `CDPlayer`, `CentralLocking`, `CrashSensor`, `LeatherSeats`, `RegDate`, `UpdationDate`) VALUES
(3, 'Avanza', 4, 'Nissan Avanza, All new Nissan Avanza ready to go for a trip.', 63, 'CNG', 2012, 5, 'featured-img-3.jpg', 'dealer-logo.jpg', 'img_390x390.jpg', 'listing_img3.jpg', '', 1, 1, 1, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, '2024-05-19 16:18:20', '2024-07-06 10:24:21'),
(5, 'Carrera GT', 5, 'Carrera Gt go have a thrilling trip with this Carrera Gt', 45, 'Petrol', 2012, 7, 'car_755x430.png', NULL, NULL, NULL, NULL, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2024-06-20 17:57:09', '2024-06-29 16:46:58'),
(6, 'Toyota Corolla', 5, 'TOYOTA COROLLA. Discover the true meaning of class with the Corolla. A sleek exterior with a performance that will rise to every occasion', 32, 'Petrol', 2021, 5, '2019_Toyota_Corolla_Icon_Tech_VVT-i_Hybrid_1.8.jpg', 'Toyota-Corolla-Sedan-GR-Sport-Europe-1-e1595395684614.jpg', 'toyota-corolla_2010_Sedans_15102121644_5.jpg', 'maxresdefault.jpg', '', 1, 1, 1, 1, NULL, 1, 1, NULL, NULL, 1, NULL, NULL, '2024-06-27 14:37:43', NULL),
(7, 'i7', 2, 'The first fully electric BMW i7 combines electric performance and multisensory entertainment to produce an unforgettable motoring experience.\r\n\r\n \r\n\r\nWelcoming scenario “Great Entrance Moments”\r\nCrystal headlights and illuminated BMW ‘Iconic Glow’ kidney grille\r\nLuxurious lounge atmosphere in the interior with individual My Modes\r\nCinema experience on 31.3” Theatre Screen in the rear passenger compartment\r\nMore than 440 kW* and over 600 km* fully electric range', 50, 'Petrol', 2018, 5, '2022-bmw-i7.jpg', '2023-G70-BMW-i7-xDrive60-debut-17.jpg', 'bmw-7-series-i7-cp-design-interior-desktop.jpg', 'BMW-i7-2.webp', 'bmw-i7-2023-live-photos-interior-design-19.jpg', 1, 1, 1, 1, NULL, 1, 1, 1, NULL, NULL, 1, 1, '2024-06-27 16:38:50', NULL),
(10, 'Proton X50', 17, 'This is a brand new Proton X50 car', 40, 'Petrol', 2023, 5, 'about_us_img4.jpg', 'blog_img4.jpg', 'banner-image.jpg', 'banner-image-1.jpg', '', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2024-07-26 13:55:10', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblbooking`
--
ALTER TABLE `tblbooking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblbrands`
--
ALTER TABLE `tblbrands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblusers`
--
ALTER TABLE `tblusers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblvehicles`
--
ALTER TABLE `tblvehicles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblbooking`
--
ALTER TABLE `tblbooking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tblbrands`
--
ALTER TABLE `tblbrands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tblusers`
--
ALTER TABLE `tblusers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tblvehicles`
--
ALTER TABLE `tblvehicles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
