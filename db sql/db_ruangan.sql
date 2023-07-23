-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 05, 2023 at 06:11 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_ruangan`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` int(11) NOT NULL,
  `user` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `user`, `pass`, `nama`, `email`) VALUES
(1, 'admin', '123456', 'admin', 'admin@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tb_anggota`
--

CREATE TABLE `tb_anggota` (
  `id_anggota` int(11) NOT NULL,
  `anggota_id` varchar(255) NOT NULL,
  `nama_anggota` varchar(255) NOT NULL,
  `NIM` varchar(255) NOT NULL,
  `jenis_kelamin` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_anggota`
--

INSERT INTO `tb_anggota` (`id_anggota`, `anggota_id`, `nama_anggota`, `NIM`, `jenis_kelamin`, `email`) VALUES
(1, 'AG001', 'han', '1111', 'Laki-Laki', 'han@gmail.com'),
(2, 'AG002', 'bangchan', '2222', 'Laki-Laki', 'bangchan@gmail.com'),
(3, 'AG003', 'hyunjin', '3333', 'Laki-Laki', 'hyunjin@gmail.com'),
(6, 'AG004', 'seungmin', '4444', 'Laki-Laki', 'seungmin@gmail.com'),
(7, 'AG007', 'seungcheol', '5555', 'Laki-Laki', 'seungcheol@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pinjam`
--

CREATE TABLE `tb_pinjam` (
  `id_pinjam` int(11) NOT NULL,
  `pinjam_id` varchar(255) NOT NULL,
  `tanggal_pinjam` varchar(255) NOT NULL,
  `waktu_pinjam` varchar(255) NOT NULL,
  `waktu_selesai` varchar(255) NOT NULL,
  `anggota_id` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `ruangan_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pinjam`
--

INSERT INTO `tb_pinjam` (`id_pinjam`, `pinjam_id`, `tanggal_pinjam`, `waktu_pinjam`, `waktu_selesai`, `anggota_id`, `deskripsi`, `ruangan_id`) VALUES
(1, 'PJ001', '2023-07-05', '12:00', '15:00', 'AG002', 'keperluan acara', 'RG001'),
(2, 'PJ002', '2023-07-07', '15:00', '16:00', 'AG002', 'kelas matematika', 'RG002'),
(40, 'PJ003', '2023-07-14', '22:38', '22:40', 'AG002', 'matkul pcd', 'RG003'),
(43, 'PJ0041', '2023-07-18', '08:10', '10:10', 'AG004', 'seminar', 'RG003');

-- --------------------------------------------------------

--
-- Table structure for table `tb_ruangan`
--

CREATE TABLE `tb_ruangan` (
  `id_ruangan` int(11) NOT NULL,
  `ruangan_id` varchar(255) NOT NULL,
  `gedung` varchar(255) NOT NULL,
  `jenis_ruangan` varchar(255) NOT NULL,
  `nama_ruangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_ruangan`
--

INSERT INTO `tb_ruangan` (`id_ruangan`, `ruangan_id`, `gedung`, `jenis_ruangan`, `nama_ruangan`) VALUES
(1, 'RG001', 'GSG', 'Aula', 'aula'),
(2, 'RG002', 'GSG', 'Kelas', 'kelas 202'),
(3, 'RG003', 'Perpustakaan', 'perpustakaan', 'perpustakaan'),
(4, 'RG004', 'AA', 'Kelas', 'kelas 204'),
(5, 'RG005', 'GSG', 'Lab', 'lab 303'),
(8, 'RG006', 'Perpustakaan', 'Auditorium', 'auditorium'),
(9, 'RG009', 'AA', 'Auditorium', 'auditorium');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tb_anggota`
--
ALTER TABLE `tb_anggota`
  ADD PRIMARY KEY (`id_anggota`);

--
-- Indexes for table `tb_pinjam`
--
ALTER TABLE `tb_pinjam`
  ADD PRIMARY KEY (`id_pinjam`);

--
-- Indexes for table `tb_ruangan`
--
ALTER TABLE `tb_ruangan`
  ADD PRIMARY KEY (`id_ruangan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_anggota`
--
ALTER TABLE `tb_anggota`
  MODIFY `id_anggota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_pinjam`
--
ALTER TABLE `tb_pinjam`
  MODIFY `id_pinjam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `tb_ruangan`
--
ALTER TABLE `tb_ruangan`
  MODIFY `id_ruangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
