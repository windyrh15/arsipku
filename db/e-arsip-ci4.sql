-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 24, 2024 at 08:05 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e-arsip-ci4`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_arsip`
--

CREATE TABLE `tbl_arsip` (
  `id_arsip` int(11) NOT NULL,
  `id_kategori` int(11) DEFAULT NULL,
  `no_arsip` varchar(18) DEFAULT NULL,
  `nama_file` varchar(255) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `tgl_upload` date DEFAULT NULL,
  `tgl_update` date DEFAULT NULL,
  `file_arsip` varchar(255) DEFAULT NULL,
  `tipe_file` varchar(8) DEFAULT NULL,
  `size_file` int(11) DEFAULT NULL,
  `id_jabatan` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_instansi` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_arsip`
--

INSERT INTO `tbl_arsip` (`id_arsip`, `id_kategori`, `no_arsip`, `nama_file`, `deskripsi`, `tgl_upload`, `tgl_update`, `file_arsip`, `tipe_file`, `size_file`, `id_jabatan`, `id_user`, `id_instansi`) VALUES
(1, 37, '007037230722-KPmtV', 'Foto survei - 15 November 2021', ' sebagai bukti hasil survei tentang kelayakan kualitas kayu.', '2023-07-22', '2023-07-22', '007037230722-1690004736_f04fd5c8707b4e956322.jpg', 'jpg', 43167, 1, 1, 7),
(2, 34, '007034230722-hwudC', 'Surat keputusan - 10 November 2021', 'Tidak ada deskripsi', '2023-07-22', '2023-07-22', '007034230722-1690004853_6b0050644aa1f7aa353c.pdf', 'pdf', 98069, 1, 1, 7),
(3, 31, '007031230722-SXI5p', 'pengumuman pelaksanaan - 12 November 2021', 'Pelaksanaan survei untuk mengecek apakah barang layak atau tidak untuk dieksport', '2023-07-22', '2023-07-22', '007031230722-1690011536_61eeee8ba6a937a5b416.pdf', 'pdf', 33703, 1, 1, 7),
(4, 32, '007032230722-jpz1m', 'Bukti tanda terima - 17 November 2021', 'Tidak ada deskripsi', '2023-07-22', '2023-07-22', '007032230722-1690011625_f7e0b026fa8e66097346.pdf', 'pdf', 58018, 1, 1, 7),
(5, 32, '007032230722-ZnNjw', 'Bukti tanda terima - 18 November 2021 - di ubah', 'Tidak ada deskripsi', '2023-07-22', '2023-07-22', '007032230722-1690011657_e2a42f19fbdfd74273a3.docx', 'docx', 11249, 1, 1, 7),
(6, 31, '004031230722-71RIG', 'pengumuman pelaksanaan - 12 Mei 2021', 'Pelaksanaan survei untuk memastikan kayu layak atau tidak untuk dieksport', '2023-07-22', '2023-07-22', '004031230722-1690011955_9dc4fcd042e3de5efe3e.docx', 'docx', 10946, 1, 1, 4),
(7, 37, '004037230722-9y56s', 'foto survei - 16 Mei 2021', 'Tidak ada deskripsi', '2023-07-22', '2023-07-22', '004037230722-1690012128_e8b6eb00b3f1573813de.jpg', 'jpg', 14316, 1, 1, 4),
(8, 32, '004032230722-Zq05f', 'Bukti tanda terima - 18 mei  2021', 'Tidak ada deskripsi', '2023-07-22', '2023-07-22', '004032230722-1690012272_716f53e0647b18e1b211.pdf', 'pdf', 58018, 1, 1, 4),
(9, 27, '004027230722-4lf7d', 'permohonan resertifikasi - - 20 Mei 2021', 'Tidak ada deskripsi', '2023-07-22', '2023-07-22', '004027230722-1690012646_6270d3cb2d746c92dc8e.pdf', 'pdf', 33226, 1, 1, 4),
(10, 32, '003032230722-wi4nu', 'Bukti tanda terima - 15 januari  2021', 'Tidak ada deskripsi', '2023-07-22', '2023-07-22', '003032230722-1690012712_5ab5ebbad18f066ef29e.pdf', 'pdf', 58018, 1, 1, 3),
(11, 31, '003031230722-raYiI', 'Surat Pelaksanaan - 18 Januari 2021', 'Surat pelaksanaan survei', '2023-07-22', '2023-07-22', '003031230722-1690019768_1d7cf25c372703567a84.pdf', 'pdf', 33703, 1, 1, 3),
(12, 34, '003034230722-jQVyT', 'surat keputusan - 20 Januari 2021', 'Tidak ada deskripsi', '2023-07-22', '2023-07-22', '003034230722-1690019825_700b3cc3b9d8cca437fb.docx', 'docx', 10527, 1, 1, 3),
(13, 34, '002034230722-dGS7O', 'surat keputusan hasil - 25 Januari 2021', 'Tidak ada deskripsi', '2023-07-22', '2023-07-22', '002034230722-1690020045_794ec41bb4838729f392.pdf', 'pdf', 33325, 1, 1, 2),
(14, 31, '002031230722-YGMhQ', 'Surat Pelaksanaan - 20 Januari 2021', 'Tidak ada deskripsi', '2023-07-22', '2023-07-22', '002031230722-1690020078_51dfcbbd2d860752d6bc.pdf', 'pdf', 33703, 1, 1, 2),
(15, 31, '001031230722-i6PaG', 'Surat Pelaksanaan - 13 April 2022', 'surat pelaksanaan survei kualitas kayu', '2023-07-22', '2023-07-22', '001031230722-1690020284_9856c8d5ef2b18c610dd.pdf', 'pdf', 33703, 1, 1, 1),
(16, 29, '001029230722-rendP', 'surat pemberitahuan kesiapan resertifikasi - 15 April 2022', 'Tidak ada deskripsi', '2023-07-22', '2023-07-22', '001029230722-1690020415_a8574983ee8f443da59b.pdf', 'pdf', 34148, 1, 1, 1),
(17, 37, '001037230722-ba709', 'foto survei - 17 April 2022', 'Tidak ada deskripsi', '2023-07-22', '2023-07-22', '001037230722-1690020514_a7e81b8e3428665208ee.jpg', 'jpg', 43167, 1, 1, 1),
(18, 37, '007037230722-e1lTm', 'Bukti rapat pt. indo jaya', 'foto rapat tgl 6-6-23', '2023-07-22', '2023-07-22', '007037230722-1690043150_4ed2bc4724e709334135.jpg', 'jpg', 43167, 1, 1, 7);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_instansi`
--

CREATE TABLE `tbl_instansi` (
  `id_instansi` int(11) NOT NULL,
  `nama_instansi` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_instansi`
--

INSERT INTO `tbl_instansi` (`id_instansi`, `nama_instansi`) VALUES
(1, 'PT.Murni nusantara 1'),
(2, 'PT.Sari Perjuangan 1'),
(3, 'PT.Sari Perjuangan 2'),
(4, 'PT.Murni nusantara 2'),
(7, 'PT. Samudra kusuma'),
(8, 'testing');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jabatan`
--

CREATE TABLE `tbl_jabatan` (
  `id_jabatan` int(11) NOT NULL,
  `nama_jabatan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_jabatan`
--

INSERT INTO `tbl_jabatan` (`id_jabatan`, `nama_jabatan`) VALUES
(1, 'Direktur Utama'),
(2, 'Direktur Sertifikasi'),
(3, 'Auditor VLK Hutan'),
(5, 'Manager Operasional'),
(6, 'Direktur Operasional'),
(7, 'Staff'),
(8, 'Administrasi'),
(9, 'Keuangan');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kategori`
--

CREATE TABLE `tbl_kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_kategori`
--

INSERT INTO `tbl_kategori` (`id_kategori`, `nama_kategori`) VALUES
(27, 'Surat permohonan'),
(28, 'Surat konfirmasi'),
(29, 'Surat Pemberitahuan'),
(30, 'Surat tanda terima'),
(31, 'Surat pelaksanaan'),
(32, 'Tanda terima'),
(33, 'Resume'),
(34, 'Surat keputusan'),
(37, 'Bukti foto'),
(38, 'Rencana');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `level` int(1) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `id_jabatan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `nama_user`, `email`, `password`, `level`, `foto`, `id_jabatan`) VALUES
(1, 'admin', 'admin@gmail.com', '$2y$10$estPnn.MiF6TYqLMuq/35eSC9J4/NEgYv8bsWYKD09ujYa76QiRFe', 1, 'user.jpg', 1),
(2, 'user', 'user@gmail.com', '$2y$10$aPtt9RFarq69ci.mqkduS.ahxkZ8Onj8v8oqE3Ev5kyfgFaCVXyYi', 2, '1686434726_20862b8018ca510539cf.jpg', 2),
(4, 'Rizky aditya', 'rizky@gmail.com', '$2y$10$RScZsT8jjav9iVxD2eWVHOIbq5hlwteCjxQ0.iIaHy88WCA3jfPtK', 2, 'user.jpg', 7),
(5, 'Reffi nugraha', 'Reffi@gmail.com', '$2y$10$ql.cgR1OtDGgPJuRuBqXKuBoK/0Gey/JnF8WzBq3bXhFIjv3KZtle', 2, 'user.jpg', 7),
(6, 'Axel wijaya', 'axel@gmail.com', '$2y$10$/cR4EWaaADQMgCOxIKc2pO9eYqppkCE0W9K48dOynpRARNEUETQ2e', 2, '1686435526_44aa19ff365a54597302.jpg', 9),
(7, 'tes', 'tes32das1@gmail.com', '$2y$10$N.6YYWwnY0jjRTF2Zdraq.Sbrm07/Sac19/zwk/ysTB3NLAklgP5.', 1, 'user.jpg', 7),
(8, 'windy riando', 'windy@gmail.com', '$2y$10$EXJg3WCVPm4aXdc4FrVEa.IioT2hG7Ob37ydnJg5N.gfq2lHj4H3G', 2, 'user.jpg', 7),
(9, 'windy riando ubah', 'windy1@gmail.com', '$2y$10$UNT7E88wTFBYOfIq7vJm3uP1KElNnGG31WdSMohKpFERwTCD3ZnVm', 2, '1690288663_e744ebb98fa5a25ef98d.jpg', 7),
(10, 'wenday babang', 'wendaybabang@gmail.com', '$2y$10$TnFEB2NioLTilq8ln/MrFepLUb1TVg2Q/psMZGlMF5aOYCvx1sPOW', 1, 'user.jpg', 7),
(11, 'tes22121', 'tes345@gmail.com', '$2y$10$kPdnrJzInMgVW9iMxZD4b.V81.P1m.loJ4id/0uR2r0NyFFVLOYqK', 2, 'user.jpg', 7),
(12, 'tes66', 'tes66@gmail.com', '$2y$10$E93.6J6sVnyntPMqG1Wkz.gbqmiu3KkfRl29DEBm5nDjv28XBRXgC', 2, 'user.jpg', 7);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_arsip`
--
ALTER TABLE `tbl_arsip`
  ADD PRIMARY KEY (`id_arsip`),
  ADD KEY `id_jabatan` (`id_jabatan`),
  ADD KEY `id_kategori` (`id_kategori`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_instansi` (`id_instansi`);

--
-- Indexes for table `tbl_instansi`
--
ALTER TABLE `tbl_instansi`
  ADD PRIMARY KEY (`id_instansi`);

--
-- Indexes for table `tbl_jabatan`
--
ALTER TABLE `tbl_jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_jabatan` (`id_jabatan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_arsip`
--
ALTER TABLE `tbl_arsip`
  MODIFY `id_arsip` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tbl_instansi`
--
ALTER TABLE `tbl_instansi`
  MODIFY `id_instansi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_jabatan`
--
ALTER TABLE `tbl_jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_arsip`
--
ALTER TABLE `tbl_arsip`
  ADD CONSTRAINT `tbl_arsip_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `tbl_kategori` (`id_kategori`),
  ADD CONSTRAINT `tbl_arsip_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `tbl_user` (`id_user`),
  ADD CONSTRAINT `tbl_arsip_ibfk_3` FOREIGN KEY (`id_instansi`) REFERENCES `tbl_instansi` (`id_instansi`);

--
-- Constraints for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD CONSTRAINT `tbl_user_ibfk_1` FOREIGN KEY (`id_jabatan`) REFERENCES `tbl_jabatan` (`id_jabatan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
