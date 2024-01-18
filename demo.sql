-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 28, 2023 at 10:42 PM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `demo`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_company`
--

CREATE TABLE `data_company` (
  `id_company` int(11) NOT NULL,
  `company_name` varchar(30) COLLATE utf8_swedish_ci NOT NULL,
  `address` varchar(30) COLLATE utf8_swedish_ci NOT NULL,
  `start_date` varchar(30) COLLATE utf8_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Dumping data for table `data_company`
--

INSERT INTO `data_company` (`id_company`, `company_name`, `address`, `start_date`) VALUES
(1, 'Injectech', 'Sukamaju', '2023-05-08');

-- --------------------------------------------------------

--
-- Table structure for table `data_employee`
--

CREATE TABLE `data_employee` (
  `id_employee` int(11) NOT NULL,
  `name` varchar(30) COLLATE utf8_swedish_ci NOT NULL,
  `position` varchar(20) COLLATE utf8_swedish_ci NOT NULL,
  `office` varchar(30) COLLATE utf8_swedish_ci NOT NULL,
  `division` varchar(30) COLLATE utf8_swedish_ci NOT NULL,
  `age` int(20) NOT NULL,
  `start_date` varchar(20) COLLATE utf8_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Dumping data for table `data_employee`
--

INSERT INTO `data_employee` (`id_employee`, `name`, `position`, `office`, `division`, `age`, `start_date`) VALUES
(1, 'Ahmad Marzuqi ', 'HR Manager', 'Adaro', 'IT', 23, '2023-07-05');

-- --------------------------------------------------------

--
-- Table structure for table `data_salary`
--

CREATE TABLE `data_salary` (
  `id_employee` int(11) NOT NULL,
  `name` varchar(30) COLLATE utf8_swedish_ci NOT NULL,
  `position` varchar(30) COLLATE utf8_swedish_ci NOT NULL,
  `office` varchar(30) COLLATE utf8_swedish_ci NOT NULL,
  `division` varchar(20) COLLATE utf8_swedish_ci NOT NULL,
  `age` int(11) NOT NULL,
  `start_date` varchar(30) COLLATE utf8_swedish_ci NOT NULL,
  `status` varchar(20) COLLATE utf8_swedish_ci NOT NULL,
  `cuti` varchar(20) COLLATE utf8_swedish_ci NOT NULL,
  `salary` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Dumping data for table `data_salary`
--

INSERT INTO `data_salary` (`id_employee`, `name`, `position`, `office`, `division`, `age`, `start_date`, `status`, `cuti`, `salary`) VALUES
(1, 'RAUS', 'CEO', 'SLOT', 'Marketing', 50, '2023-05-08', 'Tetap', '30 Hari', 100000000),
(3, 'yasykurluthfi', 'CEO', 'Injectech', 'IT', 23, '2023-05-12', 'Tetap', '5 Hari', 0);

-- --------------------------------------------------------

--
-- Table structure for table `otp`
--

CREATE TABLE `otp` (
  `id` int(11) NOT NULL,
  `nomor` varchar(255) NOT NULL,
  `otp` varchar(15) NOT NULL,
  `waktu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `otp`
--

INSERT INTO `otp` (`id`, `nomor`, `otp`, `waktu`) VALUES
(4, '81369385717', '742917', 1677565335),
(7, '81275759300', '148085', 1677582999),
(8, '81391496048', '628988', 1677589795),
(9, '82282365623', '157150', 1677739238),
(43, '87884649035', '275029', 1677871713),
(44, '123125125123', '375225', 1677872854),
(49, '2147483647', '890685', 1680502695),
(57, '51276582375', '319482', 1680502944),
(135, '6287884649035', '904582', 1685303884);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(75) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` varchar(75) NOT NULL,
  `role` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `status_fitur` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `name`, `email`, `phone_number`, `role`, `status`, `status_fitur`) VALUES
(1, 'altundri', '$2y$10$iiFwsXENM1395b1jxnpGeuclkapDvjFUxags1jr5ilvmoH5ehKF.q', 'Altundri Wahyu Hidayatullah', 'altundriiwahyu@gmail.com', '2147483647', 'employee', '0', 0),
(2, 'altundri03', '$2y$10$rP6z0AcBakB8hXEzA63ie.00P3H9u6I23ysbf8D4AT5lxp8.O8a3e', 'Altundri Wahyu Hidayatullah', 'altundriiwahyu@gmail.com', '087884649035', 'employee', '0', 0),
(17, 'admin', '$2y$10$tIUgw2kTnaplBiSXpw4g/.I5ot5ArDhPb7Qdxafbn9kLmBMr76sNu', 'admin', 'admin@gmail.com', '081274128424', 'employee', '0', 0),
(18, 'admin2', '$2y$10$X.LLo498pcbBjtu04.3PGuJaUysj5Ki0LOaDPlsPTUg/AGkn0oYrC', 'admin2', 'admin2@gmail.com', '123125125123', 'employee', '0', 0),
(19, 'satria', '$2y$10$spggalkm9nPBR3FU4uh4OOpXll2QS.E0l7XksQuOiIEAOp0z6PNIe', 'satria', 'satria@gmail.com', '082280099504', 'employee', '0', 0),
(20, 'luthfi', '$2y$10$kgLm6sUC8J7PhtdCrDO4k.Pr0px2myvOZqzEfyrP/yPv/FOF6Fqb6', 'yasykurluthfi', 'yasykurluthfi07@gmail.com', '6287884649035', 'employee', '2', 2),
(21, 'admin123', '$2y$10$vHTo8IICe/43kF.iPq0zW.mF8x4Asx2eVC202TSPxKN73qpmt56T.', 'admin', 'admin123@gmail.com', '6287884649035', 'administrator', '0', 0),
(22, 'mimin', '$2y$10$CY9YW5Ad9znaAHbqWxVpquxdPUjVrUNsYLLL9KZOJ2bAXtgj.6Zuu', 'muslimin', 'dtmuslimin@gmail.com', '085267033793', 'administrator', '0', 0),
(23, 'iqbal', '$2y$10$MKsZyNCCH3Rwgv5THFBwBe/Y8sE/jdRO.D7ubbCQRvO6Xgtu//Y22', 'iqbal idris', 'iqbal@gmail.com', '082188997766', 'employee', '0', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_company`
--
ALTER TABLE `data_company`
  ADD PRIMARY KEY (`id_company`);

--
-- Indexes for table `data_employee`
--
ALTER TABLE `data_employee`
  ADD PRIMARY KEY (`id_employee`);

--
-- Indexes for table `data_salary`
--
ALTER TABLE `data_salary`
  ADD PRIMARY KEY (`id_employee`);

--
-- Indexes for table `otp`
--
ALTER TABLE `otp`
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
-- AUTO_INCREMENT for table `data_company`
--
ALTER TABLE `data_company`
  MODIFY `id_company` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `data_employee`
--
ALTER TABLE `data_employee`
  MODIFY `id_employee` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `data_salary`
--
ALTER TABLE `data_salary`
  MODIFY `id_employee` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `otp`
--
ALTER TABLE `otp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
