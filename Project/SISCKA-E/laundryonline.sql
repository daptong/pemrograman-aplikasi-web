-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2022 at 05:15 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laundryonline`
--

-- --------------------------------------------------------

--
-- Table structure for table `driver`
--

CREATE TABLE `driver` (
  `driver_id` int(10) NOT NULL,
  `driver_nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `driver`
--

INSERT INTO `driver` (`driver_id`, `driver_nama`) VALUES
(1, 'Ahmad Naufal'),
(2, 'Agus Joko Susilo'),
(3, 'Samuel Anderson'),
(4, 'Edwin Nurdiansyah'),
(5, 'Freddy Yohanes Patty');

-- --------------------------------------------------------

--
-- Table structure for table `paket`
--

CREATE TABLE `paket` (
  `paket_id` int(10) NOT NULL,
  `transaksi_id` int(10) NOT NULL,
  `nama_customer` varchar(255) NOT NULL,
  `tanggal_pemesanan` date NOT NULL,
  `tanggal_pengiriman` date NOT NULL,
  `alamat_customer` varchar(255) NOT NULL,
  `paket_state` varchar(255) NOT NULL,
  `paket_ongkir` int(10) NOT NULL,
  `paket_driver` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `paket`
--

INSERT INTO `paket` (`paket_id`, `transaksi_id`, `nama_customer`, `tanggal_pemesanan`, `tanggal_pengiriman`, `alamat_customer`, `paket_state`, `paket_ongkir`, `paket_driver`) VALUES
(1, 1, 'daffa ganteng', '2022-05-20', '2022-05-21', 'rumah nugget', 'DELIVERING', 15000, 'Agus Joko Susilo'),
(2, 23, 'daffa firmansyah', '2022-05-20', '0000-00-00', 'Malang', 'ON HOLD', 15000, 'Edwin Nurdiansyah'),
(5, 34, 'daffa ganteng', '2022-05-21', '2022-05-21', 'rumah nugget', 'DELIVERING', 15000, 'Samuel Anderson');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `pelanggan_id` int(10) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `telepon` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `new_user` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`pelanggan_id`, `nama`, `username`, `password`, `alamat`, `telepon`, `email`, `new_user`) VALUES
(1, '', 'admin', '$2y$10$wj5NvJuauJfuBhTzB.pdg./VODNhzD.WpJdOcfkx5wGJr5K1vGkRm', '', '', 'admin@sisckae.com', 1),
(2, 'daffa firmansyah', 'upilkeren', '$2y$10$KtkwoiCDH3Lh3Rs2Oc1AsuaDTBGh8Hq3rWFMVDmyGFRfMLKzU1NGu', 'Malang', '14045', 'upilkeren48@gmail.com', 0),
(3, 'daffa ganteng', 'upilkeren28', '$2y$10$DLkwC./Akyxu79m3eFChreCcDPIME8KyVd6ubUR16WqHSEJ2E8zNK', 'rumah nugget', '081331857449', 'upilkeren28@gmail.com', 0),
(5, 'bomby', 'bombom', '$2y$10$pghNycnPiN7vvcwLDKNEBuinQSvO56w7IdQ7NYgU.DXJOxLVYgMVW', 'malang', '085656690064', 'bombom@google.com', 0);

-- --------------------------------------------------------

--
-- Table structure for table `status_laundry`
--

CREATE TABLE `status_laundry` (
  `status_id` int(10) NOT NULL,
  `transaksi_id` int(10) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `status_laundry`
--

INSERT INTO `status_laundry` (`status_id`, `transaksi_id`, `status`) VALUES
(1, 1, 'ON PROCESS'),
(53, 22, 'FINISHED'),
(54, 23, 'ON PROCESS'),
(55, 24, 'ON PROCESS'),
(58, 29, 'ON HOLD'),
(59, 30, 'FINISHED'),
(63, 34, 'FINISHED');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `transaksi_id` int(10) NOT NULL,
  `nama_customer` varchar(255) NOT NULL,
  `tanggal_pemesanan` date NOT NULL,
  `nama_laundry` varchar(255) NOT NULL,
  `tipe_laundry` varchar(255) NOT NULL,
  `antar_pickup_laundry` varchar(255) NOT NULL,
  `berat` int(10) NOT NULL,
  `total_harga` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`transaksi_id`, `nama_customer`, `tanggal_pemesanan`, `nama_laundry`, `tipe_laundry`, `antar_pickup_laundry`, `berat`, `total_harga`) VALUES
(1, 'daffa ganteng', '2022-05-20', 'Pakaian', 'Reguler', 'Antar', 2, 50000),
(22, 'daffa firmansyah', '2022-05-20', 'Bantal', 'Reguler', 'Pickup', 5, 52000),
(23, 'daffa firmansyah', '2022-05-20', 'Pakaian', 'Reguler', 'Antar', 5, 62000),
(24, 'daffa firmansyah', '2022-05-20', 'Bed Cover', 'Express', 'Pickup', 6, 63000),
(29, 'daffa firmansyah', '2022-05-21', 'Bed Cover', 'Express', 'Pickup', 9, 78000),
(30, 'daffa firmansyah', '2022-05-21', 'Selimut', 'Express', 'Pickup', 7, 71000),
(34, 'daffa ganteng', '2022-05-21', 'Selimut', 'Express', 'Antar', 7, 86000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `driver`
--
ALTER TABLE `driver`
  ADD PRIMARY KEY (`driver_id`);

--
-- Indexes for table `paket`
--
ALTER TABLE `paket`
  ADD PRIMARY KEY (`paket_id`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`pelanggan_id`);

--
-- Indexes for table `status_laundry`
--
ALTER TABLE `status_laundry`
  ADD PRIMARY KEY (`status_id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`transaksi_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `driver`
--
ALTER TABLE `driver`
  MODIFY `driver_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `paket`
--
ALTER TABLE `paket`
  MODIFY `paket_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `pelanggan_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `status_laundry`
--
ALTER TABLE `status_laundry`
  MODIFY `status_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `transaksi_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
