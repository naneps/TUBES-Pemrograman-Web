-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2021 at 12:02 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tubes_web`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_menu`
--

CREATE TABLE `tb_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(50) NOT NULL,
  `harga` int(15) NOT NULL,
  `detail` text NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_menu`
--

INSERT INTO `tb_menu` (`id`, `menu`, `harga`, `detail`, `img`) VALUES
(23, 'Tahu Krispi', 5000, 'Enak Sekali', 'tahu.jpg'),
(24, 'tahu walik', 5000, 'dkajsh kaj k ', 'tahu.jpg'),
(25, 'Tahu Setan', 6000, 'Pedes bangettt', 'tahu.jpg'),
(26, 'madya', 1000, 'enak Sekalifa', '12344'),
(27, 'dlskada', 0, 'sad', 'sadsa'),
(28, 'ldsklfka', 0, 'sadklnalfk', 'slkfaflak'),
(29, 'tahu', 10000, 'loremipsum', 'dada'),
(30, 'kesfksd', 0, 'klsml', 'lkdsfmlk'),
(31, 'kdnklsa', 5000, 'dkajsh kaj k ', 'lklksc'),
(32, 'kdnklsa', 5000, 'dkajsh kaj k ', 'lklksc'),
(33, 'dlsajla', 0, 'lkmfdsl', 'lmld'),
(34, 'tahu  bulat ', 0, 'dadakan', 'limaratusan'),
(35, 'ksdjasi', 0, 'lskdkla', 'clknkacl'),
(36, '11', 1, 'Pedes bangettt', '60c30fd53be6f.jpg'),
(37, '', 0, '', '60c3100a008a0.'),
(38, '2', 222, '2', '60c310b701560.jpg'),
(39, '', 0, '', '60c312af650f8.');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `nama`, `email`, `password`) VALUES
(1, 'admin', 'Nandang Eka Prasetya', 'admin@admin.com', '21232f297a57a5a743894a0e4a801fc3'),
(2, 'Epsa', 'Prasetya', 'ekaprasetya2244@gmail.com', '25d55ad283aa400af464c76d713c07ad'),
(4, 'jamal', 'Jamal', 'jamal1@gmail.com', '25d55ad283aa400af464c76d713c07ad');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_menu`
--
ALTER TABLE `tb_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_menu`
--
ALTER TABLE `tb_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
