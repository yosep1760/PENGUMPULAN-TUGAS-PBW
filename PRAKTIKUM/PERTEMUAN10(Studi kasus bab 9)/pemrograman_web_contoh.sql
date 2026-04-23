-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 23, 2026 at 02:01 PM
-- Server version: 8.4.3
-- PHP Version: 8.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pemrograman_web_contoh`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `ID` int NOT NULL,
  `Judul` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `Tahun_terbit` int NOT NULL,
  `Harga` decimal(10,2) NOT NULL,
  `Stok` int NOT NULL,
  `Penulis` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`ID`, `Judul`, `Tahun_terbit`, `Harga`, `Stok`, `Penulis`) VALUES
(2, '7 Cara Mendapatkan My Bini', 2006, 500000.00, 4, 'Let Him Cook');

-- --------------------------------------------------------

--
-- Table structure for table `detail_pesanan`
--

CREATE TABLE `detail_pesanan` (
  `Pesanan_ID` int NOT NULL,
  `buku_ID` int NOT NULL,
  `Kuantitas` int NOT NULL,
  `Harga_Per_Satuan` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `detail_pesanan`
--

INSERT INTO `detail_pesanan` (`Pesanan_ID`, `buku_ID`, `Kuantitas`, `Harga_Per_Satuan`) VALUES
(1, 2, 1, 500000.00);

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `ID` int NOT NULL,
  `Nama` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `Alamat` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `Email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `Telepon` varchar(20) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`ID`, `Nama`, `Alamat`, `Email`, `Telepon`) VALUES
(1, 'Jokowi', 'Karawang', 'Jokowi@gmail.com', '08424756381'),
(2, 'Naruto', 'Konoha', 'Naruto@gmail.com', '0846172384912');

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `ID` int NOT NULL,
  `Tanggal_Pesanan` int NOT NULL,
  `Pelanggan_ID` int NOT NULL,
  `Total_Harga` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`ID`, `Tanggal_Pesanan`, `Pelanggan_ID`, `Total_Harga`) VALUES
(1, 20260423, 2, 500000.00);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `detail_pesanan`
--
ALTER TABLE `detail_pesanan`
  ADD KEY `Pesanan_ID` (`Pesanan_ID`),
  ADD KEY `buku_ID` (`buku_ID`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Pelanggan_ID` (`Pelanggan_ID`),
  ADD KEY `pesanan_ibfk_1` (`Tanggal_Pesanan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_pesanan`
--
ALTER TABLE `detail_pesanan`
  ADD CONSTRAINT `detail_pesanan_ibfk_2` FOREIGN KEY (`buku_ID`) REFERENCES `buku` (`ID`);

--
-- Constraints for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD CONSTRAINT `fk_pelanggan_pesanan` FOREIGN KEY (`Pelanggan_ID`) REFERENCES `pelanggan` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
