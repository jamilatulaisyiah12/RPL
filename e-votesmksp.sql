-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 16, 2021 at 07:50 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e-votesmksp`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_paslon`
--

CREATE TABLE `data_paslon` (
  `id` int(11) NOT NULL,
  `nim_ketua` varchar(9) NOT NULL,
  `nm_paslon_ketua` varchar(50) NOT NULL,
  `gambar1` varchar(100) NOT NULL,
  `nim_wakil` varchar(9) NOT NULL,
  `nm_paslon_wakil` varchar(50) NOT NULL,
  `gambar2` varchar(100) NOT NULL,
  `no_urut` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_paslon`
--

INSERT INTO `data_paslon` (`id`, `nim_ketua`, `nm_paslon_ketua`, `gambar1`, `nim_wakil`, `nm_paslon_wakil`, `gambar2`, `no_urut`) VALUES
(32, '123', 'coba', 'logorybd.jpg', '321', 'aboc', 'Screenshot (54).png', 1),
(33, '1001', 'ketua', 'logorybd.jpg', '1002', 'wakil', 'logorybd.jpg', 2),
(34, '2001', 'calon', 'logorybd.jpg', '2002', 'calonjuga', 'logorybd.jpg', 3),
(35, '2001', 'dsf', 'logorybd.jpg', '324', 'ds', 'logorybd.jpg', 4),
(36, '23421', 'fd', 'logorybd.jpg', '4353', 'dsfs', 'logorybd.jpg', 5);

-- --------------------------------------------------------

--
-- Table structure for table `data_siswa`
--

CREATE TABLE `data_siswa` (
  `NIS` int(20) NOT NULL,
  `Nama_siswa` varchar(250) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `Kelas` varchar(30) NOT NULL,
  `Tgl_lahir` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_siswa`
--

INSERT INTO `data_siswa` (`NIS`, `Nama_siswa`, `jenis_kelamin`, `Kelas`, `Tgl_lahir`) VALUES
(1006311001, 'Nuke Sephiana', 'Perempuan', 'X ATPH', '23 Maret 2004'),
(1006311002, 'Desta Chilyani', 'Perempuan', 'X TKJ', '31 Desember 2004'),
(1006311003, 'Alfinatul Hasanah', 'Perempuan', 'XI TKJ', '21 Agustus 2003'),
(1006311004, 'Jamilatul Aisyah', 'Perempuan', 'XI ATPH', '12 Februari 2003'),
(1006311005, 'Shinta Dwi Wulandari', 'Perempuan', 'XII TKJ', '24 November 2003'),
(1006311006, 'Rizal Abul Fata', 'Laki-laki', 'XII TKJ', '21-Desember-2003');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `level` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`username`, `password`, `level`) VALUES
('1006311001', 'A001', ''),
('1006311002', 'A002', ''),
('1006311003', 'A003', ''),
('1006311004', 'A004', ''),
('1006311005', 'A005', ''),
('1006311006', 'A006', 'siswa'),
('admin1', 'ADMIN1', 'admin'),
('admin2', 'ADMIN2', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_dpt`
--

CREATE TABLE `tabel_dpt` (
  `username` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `status` varchar(30) NOT NULL,
  `waktu` enum('Sudah','Belum memilih') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tabel_dpt`
--

INSERT INTO `tabel_dpt` (`username`, `nama`, `status`, `waktu`) VALUES
('1006311001', 'Nuke Sephiana', 'Pemilih', 'Belum memilih'),
('1006311002', 'Desta Chilyani', 'Pemilih', 'Belum memilih'),
('1006311003', 'Alfinatul Hasanah', 'Pemilih', 'Belum memilih'),
('1006311004', 'Jamilatul Aisyah', 'Pemilih', 'Belum memilih'),
('1006311005', 'Shinta Dwi Wulandari', 'Pemilih', ''),
('1006311006', 'Rizal Abul Fata', 'Pemilih', ''),
('admin1', 'admin1', 'Admin', ''),
('admin2', 'admin2', 'Admin', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dpt`
--

CREATE TABLE `tbl_dpt` (
  `username` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `status` varchar(30) NOT NULL,
  `waktu` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_dpt`
--

INSERT INTO `tbl_dpt` (`username`, `nama`, `status`, `waktu`) VALUES
('1006311001', 'Siswa1', 'Pemilih', ''),
('admin1', 'admin1', 'Admin', ''),
('admin2', 'Admin2', 'Admin', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_paslon`
--

CREATE TABLE `tbl_paslon` (
  `kode_akses` varchar(6) NOT NULL,
  `nomor_paslon` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_paslon`
--
ALTER TABLE `data_paslon`
  ADD PRIMARY KEY (`id`,`nim_ketua`);

--
-- Indexes for table `data_siswa`
--
ALTER TABLE `data_siswa`
  ADD PRIMARY KEY (`NIS`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `tabel_dpt`
--
ALTER TABLE `tabel_dpt`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `tbl_dpt`
--
ALTER TABLE `tbl_dpt`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `tbl_paslon`
--
ALTER TABLE `tbl_paslon`
  ADD PRIMARY KEY (`kode_akses`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_paslon`
--
ALTER TABLE `data_paslon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
