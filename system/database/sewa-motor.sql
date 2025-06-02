-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2024 at 01:13 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sewa-motor`
--

-- --------------------------------------------------------

--
-- Table structure for table `motor`
--

CREATE TABLE `motor` (
  `id_motor` int(11) NOT NULL,
  `nama_motor` varchar(128) NOT NULL,
  `nama_type` varchar(120) NOT NULL,
  `merk` varchar(120) NOT NULL,
  `no_plat` varchar(20) NOT NULL,
  `warna` varchar(20) NOT NULL,
  `tahun` varchar(4) NOT NULL,
  `status` varchar(50) NOT NULL,
  `harga` int(11) NOT NULL,
  `denda` int(11) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `motor`
--

INSERT INTO `motor` (`id_motor`, `nama_motor`, `nama_type`, `merk`, `no_plat`, `warna`, `tahun`, `status`, `harga`, `denda`, `gambar`) VALUES
(45, 'Mio M3', 'Skuter', 'Yamaha', 'B 4910 OKE', 'Kuning', '2019', '0', 250000, 100000, 'mio-i-125-2021-yellow-768x768.png'),
(46, 'Mio Soul GT', 'Skuter', 'Yamaha', 'B 6789 YOI', 'Biru', '2012', '1', 200000, 100000, 'Gambar-Yamaha-Soul-GT-Warna-Biru.png'),
(47, 'Beat', 'Skuter', 'Honda', 'B 3456 YOO', 'Merah', '2019', '0', 270000, 100000, 'All-New-Honda-BeAT-2018-Filipina-Red-BMSPEED7_COM_.png'),
(48, 'XSR 155', 'Bebek Sport', 'Yamaha', 'B 4910 OKI', 'Abu-abu', '2020', '1', 350000, 150000, 'Yamaha-XSR1551.png'),
(49, 'FreeGo', 'Skuter', 'Yamaha', 'B 7878 OOO', 'Merah', '2024', '0', 250000, 100000, 'Yamaha_FreeGo_S_Versi_ABS.png');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_rental` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_motor` int(11) NOT NULL,
  `tgl_rental` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `harga` int(11) NOT NULL,
  `denda` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `total_denda` int(11) NOT NULL,
  `tgl_pengembalian` date NOT NULL,
  `status_rental` varchar(128) NOT NULL,
  `status_pengembalian` varchar(128) NOT NULL,
  `bukti_pembayaran` varchar(256) NOT NULL,
  `status_pembayaran` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_rental`, `id_user`, `id_motor`, `tgl_rental`, `tgl_kembali`, `harga`, `denda`, `total_harga`, `total_denda`, `tgl_pengembalian`, `status_rental`, `status_pengembalian`, `bukti_pembayaran`, `status_pembayaran`) VALUES
(31, 17, 46, '2023-07-03', '2023-07-12', 200000, 100000, 0, 200000, '2023-07-14', 'Selesai', 'Kembali', 'Screenshot_(15)3.png', 1),
(32, 21, 49, '0000-00-00', '0000-00-00', 250000, 100000, 0, 0, '0000-00-00', 'Belum Selesai', 'Belum Kembali', '', 0),
(33, 22, 45, '2024-01-04', '2024-01-06', 250000, 100000, 0, 0, '0000-00-00', 'Belum Selesai', 'Belum Kembali', '', 0),
(34, 22, 46, '2024-01-05', '2024-01-08', 200000, 100000, 0, 200000, '2024-01-10', 'Selesai', 'Kembali', 'Untitled_Diagram-Logout1.jpg', 0),
(35, 22, 47, '2024-01-10', '2024-01-18', 270000, 100000, 0, 0, '0000-00-00', 'Belum Selesai', 'Belum Kembali', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `id_type` int(11) NOT NULL,
  `nama_type` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`id_type`, `nama_type`) VALUES
(1, 'Skuter'),
(2, 'Elektrik Skuter'),
(3, 'Sport'),
(4, 'Motor Bebek'),
(12, 'Motor Bebek');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(128) NOT NULL,
  `username` varchar(128) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `no_identitas` varchar(20) NOT NULL,
  `password` varchar(120) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `username`, `alamat`, `no_telp`, `no_identitas`, `password`, `role_id`) VALUES
(15, 'Muhammad Raffy', 'Raffy', 'Mampang 2', '08993509756', '12345678910', 'e3de773003563cb6669ed1ae78eeb0fc', 2),
(18, 'Deviana', 'Deviana', 'Jl. Radio Dalam', '088299100373', '12345566', '7572af3ec21a357c34ba337dbcd3eb25', 1),
(19, 'Laden Arsyad', 'Laden1', 'pancoran', '081298374653', '110981726354', '6f380cba82cb0a6826fb8be1078222c7', 2),
(20, 'Rizky Nanda', 'Riskynanda', 'Kemang', '081345267876', '165242562534', '0733847ce0af919790b10cc45364f78e', 2),
(21, 'Muhammad Ibnu', 'Ibnu', 'Ragunan', '089867898098', '1234567897654321', '5c0bcba389669b3762cf64fb09471bb2', 2),
(22, 'nabila rohadatul aisy', 'nabila', 'pasar minggu', '088299100373', '1234567898760956', '2a0a1c5eb00d8d9e331bb67944efd47e', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `motor`
--
ALTER TABLE `motor`
  ADD PRIMARY KEY (`id_motor`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_rental`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`id_type`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `motor`
--
ALTER TABLE `motor`
  MODIFY `id_motor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_rental` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `id_type` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
