-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 16, 2025 at 01:01 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pembayaran_spp`
--

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `idkelas` int(11) NOT NULL,
  `namakelas` varchar(50) NOT NULL,
  `keterangan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`idkelas`, `namakelas`, `keterangan`) VALUES
(3, 'X IPA 1', 'Kelas X jurusan IPA 1'),
(4, 'X IPA 2', 'Kelas X jurusan IPA 2'),
(5, 'X IPS 1', 'Kelas X jurusan IPS 1'),
(6, 'X IPS 2', 'Kelas X jurusan IPS 2'),
(7, 'XI IPA 1', 'Kelas XI jurusan IPA 1'),
(8, 'XI IPA 2', 'Kelas XI jurusan IPA 2'),
(9, 'XI IPS 1', 'Kelas XI jurusan IPS 1'),
(10, 'XI IPS 2', 'Kelas XI jurusan IPS 2'),
(11, 'XII IPA 1', 'Kelas XII jurusan IPA 1'),
(12, 'XII IPA 2', 'Kelas XII jurusan IPA 2'),
(13, 'XII IPS 1', 'Kelas XII jurusan IPS 1'),
(14, 'XII IPS 2', 'Kelas XII jurusan IPS 2'),
(15, 'X Bahasa', 'Kelas X jurusan Bahasa'),
(16, 'XI Bahasa', 'Kelas XI jurusan Bahasa'),
(17, 'XII Bahasa', 'Kelas XII jurusan Bahasa');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `idpembayaran` int(11) NOT NULL,
  `idspp` int(11) DEFAULT NULL,
  `idsiswa` int(11) DEFAULT NULL,
  `tanggalbayar` date NOT NULL,
  `bulanbayar` varchar(20) NOT NULL,
  `jumlahbayar` int(11) NOT NULL,
  `statuspembayaran` varchar(25) NOT NULL DEFAULT 'Belum Bayar',
  `idpengguna` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `idpengguna` int(11) NOT NULL,
  `namapengguna` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `hakakses` varchar(25) NOT NULL,
  `kontak` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`idpengguna`, `namapengguna`, `username`, `password`, `hakakses`, `kontak`) VALUES
(1, 'Admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Admin', NULL),
(2, 'Kudus Jitmau', 'kudus', '1dfa42a45ff00d1e5e9b028131d4d183', 'Superadmin', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `idsiswa` int(11) NOT NULL,
  `nisn` varchar(10) NOT NULL,
  `namasiswa` varchar(100) NOT NULL,
  `jeniskelamin` varchar(10) NOT NULL,
  `alamat` text DEFAULT NULL,
  `telp` varchar(20) DEFAULT NULL,
  `idkelas` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`idsiswa`, `nisn`, `namasiswa`, `jeniskelamin`, `alamat`, `telp`, `idkelas`) VALUES
(202507034, '1000000031', 'Eka Wulandari', 'Perempuan', 'Jl. Merpati No.1', '081234567031', 4),
(202507035, '1000000032', 'Fajar Nugroho', 'Laki-laki', 'Jl. Merpati No.2', '081234567032', 4),
(202507036, '1000000033', 'Gita Ayuningtyas', 'Perempuan', 'Jl. Merpati No.3', '081234567033', 4),
(202507037, '1000000034', 'Hendra Wijaya', 'Laki-laki', 'Jl. Merpati No.4', '081234567034', 4),
(202507038, '1000000035', 'Intan Maharani', 'Perempuan', 'Jl. Merpati No.5', '081234567035', 4),
(202507039, '1000000036', 'Joko Saputra', 'Laki-laki', 'Jl. Merpati No.6', '081234567036', 4),
(202507040, '1000000037', 'Kartika Dewi', 'Perempuan', 'Jl. Merpati No.7', '081234567037', 4),
(202507041, '1000000038', 'Lukman Hakim', 'Laki-laki', 'Jl. Merpati No.8', '081234567038', 4),
(202507042, '1000000039', 'Maya Sari', 'Perempuan', 'Jl. Merpati No.9', '081234567039', 4),
(202507043, '1000000040', 'Niko Prabowo', 'Laki-laki', 'Jl. Merpati No.10', '081234567040', 4),
(202507044, '1000000041', 'Oktavia Rahma', 'Perempuan', 'Jl. Angin No.1', '081234567041', 5),
(202507045, '1000000042', 'Pandu Arya', 'Laki-laki', 'Jl. Angin No.2', '081234567042', 5),
(202507046, '1000000043', 'Qiana Putri', 'Perempuan', 'Jl. Angin No.3', '081234567043', 5),
(202507047, '1000000044', 'Rendi Saputra', 'Laki-laki', 'Jl. Angin No.4', '081234567044', 5),
(202507048, '1000000045', 'Sinta Nuraini', 'Perempuan', 'Jl. Angin No.5', '081234567045', 5),
(202507049, '1000000046', 'Tomi Hartanto', 'Laki-laki', 'Jl. Angin No.6', '081234567046', 5),
(202507050, '1000000047', 'Utami Larasati', 'Perempuan', 'Jl. Angin No.7', '081234567047', 5),
(202507051, '1000000048', 'Vino Setiawan', 'Laki-laki', 'Jl. Angin No.8', '081234567048', 5),
(202507052, '1000000049', 'Wulan Citra', 'Perempuan', 'Jl. Angin No.9', '081234567049', 5),
(202507053, '1000000050', 'Yusuf Hidayat', 'Laki-laki', 'Jl. Angin No.10', '081234567050', 5),
(202507054, '1000000051', 'Zahra Salma', 'Perempuan', 'Jl. Mawar No.1', '081234567051', 6),
(202507055, '1000000052', 'Aditya Putra', 'Laki-laki', 'Jl. Mawar No.2', '081234567052', 6),
(202507056, '1000000053', 'Bella Sari', 'Perempuan', 'Jl. Mawar No.3', '081234567053', 6),
(202507057, '1000000054', 'Cahyo Wicaksono', 'Laki-laki', 'Jl. Mawar No.4', '081234567054', 6),
(202507058, '1000000055', 'Dita Laras', 'Perempuan', 'Jl. Mawar No.5', '081234567055', 6),
(202507059, '1000000056', 'Evan Julianto', 'Laki-laki', 'Jl. Mawar No.6', '081234567056', 6),
(202507060, '1000000057', 'Farah Indriani', 'Perempuan', 'Jl. Mawar No.7', '081234567057', 6),
(202507061, '1000000058', 'Galang Prasetyo', 'Laki-laki', 'Jl. Mawar No.8', '081234567058', 6),
(202507062, '1000000059', 'Hani Nurul', 'Perempuan', 'Jl. Mawar No.9', '081234567059', 6),
(202507063, '1000000060', 'Imam Surya', 'Laki-laki', 'Jl. Mawar No.10', '081234567060', 6),
(202507064, '1000000061', 'Imam Sahal', 'Laki-laki', 'Jl. Mawar No.10', '081234567060', 6);

-- --------------------------------------------------------

--
-- Table structure for table `spp`
--

CREATE TABLE `spp` (
  `idspp` int(11) NOT NULL,
  `nominal` int(11) NOT NULL,
  `tahunpelajaran` varchar(10) NOT NULL,
  `keterangan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`idkelas`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`idpembayaran`),
  ADD KEY `idspp` (`idspp`),
  ADD KEY `idsiswa` (`idsiswa`),
  ADD KEY `idpengguna` (`idpengguna`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`idpengguna`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`idsiswa`),
  ADD KEY `idkelas` (`idkelas`);

--
-- Indexes for table `spp`
--
ALTER TABLE `spp`
  ADD PRIMARY KEY (`idspp`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `idkelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `idpembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `idpengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `idsiswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=202507065;

--
-- AUTO_INCREMENT for table `spp`
--
ALTER TABLE `spp`
  MODIFY `idspp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`idspp`) REFERENCES `spp` (`idspp`),
  ADD CONSTRAINT `pembayaran_ibfk_2` FOREIGN KEY (`idsiswa`) REFERENCES `siswa` (`idsiswa`),
  ADD CONSTRAINT `pembayaran_ibfk_3` FOREIGN KEY (`idpengguna`) REFERENCES `pengguna` (`idpengguna`);

--
-- Constraints for table `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `siswa_ibfk_1` FOREIGN KEY (`idkelas`) REFERENCES `kelas` (`idkelas`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
