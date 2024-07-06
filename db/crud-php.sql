-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 05, 2024 at 07:21 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crud-php`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `id_akun` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`id_akun`, `nama`, `username`, `email`, `password`, `level`) VALUES
(1, 'Wahyu', 'admin', 'Freakwho123@gmail.com', '$2y$10$XbFPDUug0ol3UpoPe960YuI9RF7yFic9FzowX1swaaMXaGh.Fa2mW', '1'),
(2, 'Operator Barang', 'opbarang', 'opbarang@gmail.com', '$2y$10$czASZaoE9JqjLp5WDf/0uOpG8W5yqUeauqPCZP.Ha5sMCd8a7L0..', '2'),
(4, 'Operator Mahasiswa', 'opmahasiswa', 'opmahasiswa@gmail.com', '$2y$10$Zqhq7bhp.Vy7udfWQLFGde9nmT66iSJxziF8h/.HobE6Hfk76aUVW', '3');

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jumlah` varchar(50) NOT NULL,
  `harga` varchar(50) NOT NULL,
  `barcode` varchar(15) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `nama`, `jumlah`, `harga`, `barcode`, `tanggal`) VALUES
(2, 'Laptop', '8', '60000000', '555622', '2024-06-27 06:33:06'),
(4, 'Head Phone', '5', '2400000', '123456', '2024-06-27 06:35:24'),
(6, 'RAM', '10', '2000000', '169269', '2024-06-27 01:00:36'),
(7, 'Meja', '15', '50000000', '975613', '2024-06-27 06:35:47'),
(8, 'Baru', '5', '500000', '410829', '2024-06-30 07:21:00');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id_mahasiswa` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `prodi` varchar(50) NOT NULL,
  `jk` varchar(10) NOT NULL,
  `telepon` varchar(30) NOT NULL,
  `alamat` text NOT NULL,
  `email` varchar(30) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id_mahasiswa`, `nama`, `prodi`, `jk`, `telepon`, `alamat`, `email`, `foto`) VALUES
(1, 'Budi', 'Secret Agent', 'Laki-Laki', '085959526264', '<p>????</p>', 'cuki@yahoo.com', '667513d6ab934.jpg'),
(2, 'Eko', 'Management', 'Laki-Laki', '08596262451', '<p><span style=\"background-color:rgb(255,255,255);color:rgb(33,37,41);\">Manggarai Utara No. 56 RT/RT 08/05 12856</span></p>', 'EkoBahagia@gmail.com', '667c113dce2fb.jpg'),
(3, 'Putri', 'Communication', 'Perempuan', '0811222336655', '<p>Cicakrawa No. 56 RT/RT 08/05 12841</p>', 'PutriBahagia@gmail.com', '667c116892394.jpg'),
(6, 'Good guy', 'English', 'Laki-Laki', '126599484', '<p>Sedney</p>', 'GoodBoy@Rocket.us', '667d64ee12a97.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jabatan` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telepon` varchar(100) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `nama`, `jabatan`, `email`, `telepon`, `alamat`) VALUES
(1, 'bowo', 'ok', 'bowo@gmail.com', '02252525626', 'okbowo'),
(2, 'eka', 'office', 'ekba@rocket.us', '0202', 'efghnkm');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id_akun`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id_mahasiswa`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akun`
--
ALTER TABLE `akun`
  MODIFY `id_akun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id_mahasiswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
