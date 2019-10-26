-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 26, 2019 at 04:16 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sip`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `ID_BUKU` varchar(12) NOT NULL,
  `JUDUL` varchar(50) NOT NULL,
  `DESKRIPSI` text NOT NULL,
  `PENERBIT` varchar(50) NOT NULL,
  `THN_TERBIT` varchar(4) NOT NULL,
  `STOK` int(11) NOT NULL,
  `ID_RAK` varchar(12) NOT NULL,
  `ID_KATEGORI` varchar(12) NOT NULL,
  `GAMBAR` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`ID_BUKU`, `JUDUL`, `DESKRIPSI`, `PENERBIT`, `THN_TERBIT`, `STOK`, `ID_RAK`, `ID_KATEGORI`, `GAMBAR`) VALUES
('BK1', 'Jago Android Dalam Seminggu', 'anu', 'anu', '2019', 19, 'RAK2', 'KAT2', ''),
('BK2', 'Ta\'aruf Jalan Menuju Ridho-Nya', 'lorem ipsum', 'UNIPDU', '2019', 30, 'RAK2', 'KAT3', '');

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `ID_HISTORY` int(11) NOT NULL,
  `ID_PEMINJAMAN` varchar(25) NOT NULL,
  `NIS` varchar(12) NOT NULL,
  `ID_BUKU` varchar(12) NOT NULL,
  `TGL_PINJAM` date NOT NULL,
  `STATUS_HISTORY` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`ID_HISTORY`, `ID_PEMINJAMAN`, `NIS`, `ID_BUKU`, `TGL_PINJAM`, `STATUS_HISTORY`) VALUES
(126, 'PJ20191025061945', '1234', 'BK1', '2019-10-25', 'dikembalikan'),
(127, 'PJ20191025062808', '1234', 'BK1', '2019-10-25', 'dikembalikan'),
(128, 'PJ20191025064250', '1234', 'BK2', '2019-10-25', 'dikembalikan'),
(129, 'PJ20191025064606', '1234', 'BK1', '2019-10-25', 'dikembalikan'),
(130, 'PJ20191025072212', '1234', 'BK2', '2019-10-25', 'dipinjam'),
(131, 'PJ20191025072452', '1234', 'BK1', '2019-10-25', 'dikembalikan'),
(132, 'PJ20191025073243', '1234', 'BK1', '2019-10-25', 'dikembalikan'),
(133, 'PJ20191025073245', '1234', 'BK2', '2019-10-25', 'dikembalikan'),
(134, 'PJ20191025083020', '1234', 'BK1', '2019-10-25', 'dikembalikan'),
(135, 'PJ20191025200713', '1234', 'BK1', '2019-10-25', 'dikembalikan'),
(136, 'PJ20191025200959', '1234', 'BK2', '2019-10-25', 'dikembalikan'),
(137, 'PJ20191025142833', '1234', 'BK1', '2019-10-25', 'dikembalikan'),
(138, 'PJ20191025143107', '1234', 'BK1', '2019-10-25', 'dipinjam');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `ID_KATEGORI` varchar(12) NOT NULL,
  `NAMA_KATEGORI` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`ID_KATEGORI`, `NAMA_KATEGORI`) VALUES
('KAT1', 'TEKNOLOGI'),
('KAT2', 'BISNIS'),
('KAT3', 'AGAMA'),
('KAT4', 'KESEHATAN');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `ID_KELAS` varchar(20) NOT NULL,
  `KELAS` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`ID_KELAS`, `KELAS`) VALUES
('KLS20191016153605', '7A'),
('KLS20191016153612', '7B'),
('KLS20191016153618', '7C'),
('KLS20191016153625', '8A'),
('KLS20191016153632', '8B'),
('KLS20191016153639', '8C');

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `ID_PEMINJAMAN` varchar(25) NOT NULL,
  `ID_BUKU` varchar(12) NOT NULL,
  `NIS` varchar(12) NOT NULL,
  `TGL_PINJAM` date NOT NULL,
  `TGL_KEMBALI` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`ID_PEMINJAMAN`, `ID_BUKU`, `NIS`, `TGL_PINJAM`, `TGL_KEMBALI`) VALUES
('PJ20191025143107', 'BK1', '1234', '2019-10-25', '2019-10-31');

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `ID_PETUGAS` varchar(12) NOT NULL,
  `NAMA_PETUGAS` varchar(50) NOT NULL,
  `ALAMAT` text NOT NULL,
  `KONTAK` varchar(20) NOT NULL,
  `USERNAME` varchar(50) NOT NULL,
  `PASSWORD` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`ID_PETUGAS`, `NAMA_PETUGAS`, `ALAMAT`, `KONTAK`, `USERNAME`, `PASSWORD`) VALUES
('PT1', 'Mawang', 'Rejoso', '09876543221', 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `rak`
--

CREATE TABLE `rak` (
  `ID_RAK` varchar(12) NOT NULL,
  `NAMA_RAK` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rak`
--

INSERT INTO `rak` (`ID_RAK`, `NAMA_RAK`) VALUES
('RAK1', 'A1'),
('RAK2', 'B1');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `NIS` varchar(12) NOT NULL,
  `NAMA` varchar(50) NOT NULL,
  `JK` enum('laki-laki','perempuan') NOT NULL,
  `TEMPAT_LAHIR` varchar(20) NOT NULL,
  `TGL_LAHIR` date NOT NULL,
  `NO_HP` varchar(20) NOT NULL,
  `ALAMAT` text NOT NULL,
  `ID_KELAS` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`NIS`, `NAMA`, `JK`, `TEMPAT_LAHIR`, `TGL_LAHIR`, `NO_HP`, `ALAMAT`, `ID_KELAS`) VALUES
('1234', 'Mawar', 'perempuan', 'Jombang', '2006-10-09', '085655949778', 'Kalibening', 'KLS20191016153605'),
('1290', 'Ani', 'perempuan', 'Jombang', '1999-10-01', '089000397474', 'Perak', 'KLS20191016153639');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`ID_BUKU`),
  ADD KEY `ID_RAK` (`ID_RAK`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`ID_HISTORY`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`ID_KATEGORI`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`ID_KELAS`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`ID_PEMINJAMAN`),
  ADD KEY `ID_BUKU` (`ID_BUKU`),
  ADD KEY `NIS` (`NIS`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`ID_PETUGAS`);

--
-- Indexes for table `rak`
--
ALTER TABLE `rak`
  ADD PRIMARY KEY (`ID_RAK`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`NIS`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `ID_HISTORY` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=139;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `buku`
--
ALTER TABLE `buku`
  ADD CONSTRAINT `buku_ibfk_1` FOREIGN KEY (`ID_RAK`) REFERENCES `rak` (`ID_RAK`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `peminjaman_ibfk_1` FOREIGN KEY (`NIS`) REFERENCES `siswa` (`nis`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
