-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 19, 2016 at 02:14 AM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.5.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ulp_geologi`
--

-- --------------------------------------------------------

--
-- Table structure for table `feature`
--

CREATE TABLE `feature` (
  `id_feature` int(11) NOT NULL,
  `feature_name` varchar(255) DEFAULT NULL,
  `controller` varchar(255) DEFAULT NULL,
  `icon` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feature`
--

INSERT INTO `feature` (`id_feature`, `feature_name`, `controller`, `icon`) VALUES
(1, 'User', 'User', '<i class="fa fa-user"></i>'),
(3, 'Kegiatan', 'Event', '<i class="fa fa-calendar"></i>'),
(6, 'Role', 'Role', '<i class="fa fa-users"></i>'),
(7, 'Feature', 'Feature', '<i class="fa fa-gear"></i>'),
(8, 'Unit Satuan Kerja', 'Unit', ''),
(10, 'Swakelola', 'Swakelola', ''),
(11, 'Penyedia', 'Penyedia', ''),
(12, 'Pegawai', 'Pegawai', ''),
(13, 'Usulan Kegiatan', 'Usulan_Kegiatan', ''),
(14, 'Pelaksanaan Kegiatan', 'Pelaksanaan_Kegiatan', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `feature`
--
ALTER TABLE `feature`
  ADD PRIMARY KEY (`id_feature`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `feature`
--
ALTER TABLE `feature`
  MODIFY `id_feature` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
