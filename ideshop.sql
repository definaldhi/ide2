-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 31, 2018 at 05:16 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ideshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `admin_username` varchar(20) NOT NULL,
  `admin_password` varchar(20) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `admin_username`, `admin_password`, `nama_lengkap`) VALUES
(1, 'definaldhi', 'gunadarma', 'Dennis Finaldhi');

-- --------------------------------------------------------

--
-- Table structure for table `ongkir`
--

CREATE TABLE `ongkir` (
  `id_ongkir` int(5) NOT NULL,
  `nama_kota` varchar(100) NOT NULL,
  `tarif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ongkir`
--

INSERT INTO `ongkir` (`id_ongkir`, `nama_kota`, `tarif`) VALUES
(1, 'Jakarta', 10000),
(2, 'Bali', 25000);

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `nama_pelanggan` varchar(30) NOT NULL,
  `email_pelanggan` varchar(50) NOT NULL,
  `password_pelanggan` varchar(100) NOT NULL,
  `alamat_pelanggan` text,
  `telepon_pelanggan` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama_pelanggan`, `email_pelanggan`, `password_pelanggan`, `alamat_pelanggan`, `telepon_pelanggan`) VALUES
(1, 'Fuad Mahmud', 'fuad@gmail.com', 'hahaha', 'Jl. Komplek angkasa pura blok J', 818771109),
(2, 'chandra kun', 'chandra@gmail.com', 'hahahah', 'Jl. kapuk raya 24', 216547789),
(10, 'rakha', 'rakha@gmail.com', '67f3173658ee5142d4708657b618549b', 'Jl. Masjid Akbar Kemayoran', 828282172),
(11, 'Rangga', 'rangga@gmail.com', '863c2a4b6bff5e22294081e376fc1f51', 'Jl.Masjid Agung Sunter Jaya', NULL),
(12, 'mahmud', 'mahmud@gmail', 'c5d5410e7f14ba184b44f51bf3aaa691', 'Jl mahmud', NULL),
(13, 'riska', 'riska@gmail.co', 'fb059ad1c514876b15b3ec40df1acdac', NULL, 0),
(14, 'nadra mumtaz', 'nadra@gmail.com', '428bb12c1423a37b1a22f6d5d638fdc4', 'jl. pinang', NULL),
(15, 'rifat', 'rifat@gmail.com', '35c0c28414ac08bb8b6729631f69ee01', NULL, NULL),
(18, 'dennis finaldhi', 'dennis@gmail.com', '7daacea5f373b4c1c054158b126d317f', NULL, NULL),
(24, 'adam pratama', 'adam629pratama@gmail.com', '97b3259bd2d8cda60e642f159650b6eb', NULL, NULL),
(25, 'BIMA', 'dennis.finaldhi@gmail.com', '7fcba392d4dcca33791a44cd892b2112', NULL, NULL),
(26, 'celina intan fildzhani', 'intan@gmail.com', 'b1098cab9c2db3eb9f576eb66c33449c', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `processor`
--

CREATE TABLE `processor` (
  `id_processor` int(11) NOT NULL,
  `nama_processor` varchar(100) NOT NULL,
  `harga_processor` int(11) NOT NULL,
  `stock` int(3) NOT NULL,
  `ketersediaan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `processor`
--

INSERT INTO `processor` (`id_processor`, `nama_processor`, `harga_processor`, `stock`, `ketersediaan`) VALUES
(1, 'intel core i5-7640X', 3000000, 10, '10'),
(2, 'intel core 15 skylake', 2100000, 10, '10');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `harga_produk` int(11) NOT NULL,
  `deskripsi_produk` text NOT NULL,
  `foto_produk` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `harga_produk`, `deskripsi_produk`, `foto_produk`) VALUES
(2, 'VGA MSI Radeon RX 570 8GB DDR5 ', 5000000, '			ready stock		', 'vga.jpg'),
(3, 'XFX Radeon RX 580 8GB DDR5 GTS XXX OC+', 7800000, '												Ready Stock !								', 'xfx.jpg'),
(4, 'Hitachi 2.5\" 1TB SATA3 16MB 7200RPM', 810000, '																																	Garansi 3 Tahun Ready Stock!!!																						', 'New-1TB-25-HITACHI-SATA-INTERNAL-Hard-HGST.jpg'),
(5, 'Asus PRIME A320M-K', 979000, 'AM4, AMD Promontory A320, DDR4, USB 3.1, SATA3', 'ASUS_Prime_A320M_K.jpg'),
(6, 'Intel Core i5-7640X 4.0Ghz Up To 4.2Ghz', 2300000, 'ready  stock', 'processador-intel-core-5-7640x.jpg'),
(7, 'Aerocool 600W VX-600', 590000, '			 Efficiency Up To 85% - Most Valued Power - 2 Years Warranty Ready Stock!!!		', 'aerocool.jpg'),
(8, 'AMD Ryzen 3 Raven Ridge 2200G', 1390000, '			3.5Ghz Up To 3.7Ghz Cache 4MB 65W AM4 [Box] - 4 Core - YD2200C5FBBOX - With AMD Wraith Stealth 65W Cooler Ready Stock!!!		', 'ryzen.jpg'),
(9, 'Intel Core i3-4130 3.4Ghz', 1170000, '			 Cache 3MB [Tray] Socket LGA 1150 - Haswell Series		', 'intel 1.3 4130.jpg'),
(10, 'GEIL SO-DIMM DDR4 ', 670000, '						Ready Stock !!!		- Black PCB - PC19200 Single Channel 4GB (1x4GB)		', 'geil.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `ram`
--

CREATE TABLE `ram` (
  `id_ram` int(11) NOT NULL,
  `nama_ram` varchar(100) NOT NULL,
  `jenis` varchar(30) NOT NULL,
  `harga_ram` int(11) NOT NULL,
  `ketersediaan` varchar(30) NOT NULL,
  `stock` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `storage`
--

CREATE TABLE `storage` (
  `id_storage` int(11) NOT NULL,
  `nama_storage` varchar(100) NOT NULL,
  `jenis_storage` varchar(100) NOT NULL,
  `harga_storage` int(11) NOT NULL,
  `ketersediaan` varchar(30) NOT NULL,
  `stock` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tabel_pembelian`
--

CREATE TABLE `tabel_pembelian` (
  `id_pembelian` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `id_ongkir` int(5) NOT NULL,
  `tanggal_pembelian` date NOT NULL,
  `total_pembelian` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_pembelian`
--

INSERT INTO `tabel_pembelian` (`id_pembelian`, `id_pelanggan`, `id_ongkir`, `tanggal_pembelian`, `total_pembelian`) VALUES
(1, 1, 1, '2018-03-29', 0),
(2, 2, 2, '2018-03-28', 0),
(25, 11, 2, '2018-04-11', 1645000),
(26, 11, 2, '2018-04-11', 1645000),
(27, 11, 1, '2018-04-11', 1630000),
(28, 0, 0, '0000-00-00', 0),
(29, 0, 0, '0000-00-00', 0),
(30, 11, 0, '2018-04-11', 1620000),
(31, 11, 1, '2018-04-11', 1630000),
(32, 11, 0, '2018-04-11', 10000000),
(33, 11, 0, '2018-04-11', 10000000),
(34, 10, 0, '2018-04-17', 810000),
(35, 10, 0, '2018-04-19', 5810000),
(36, 10, 0, '2018-04-19', 5810000),
(37, 10, 1, '2018-04-19', 5820000),
(38, 10, 2, '2018-04-19', 5835000),
(39, 11, 1, '2018-04-20', 5820000),
(40, 25, 1, '2018-04-21', 1630000),
(41, 10, 1, '2018-04-30', 820000),
(42, 26, 1, '2018-05-06', 2080000),
(43, 11, 0, '2018-05-31', 810000),
(44, 10, 1, '2018-05-31', 5010000),
(45, 10, 0, '2018-05-31', 5000000);

-- --------------------------------------------------------

--
-- Table structure for table `vga`
--

CREATE TABLE `vga` (
  `id_vga` int(11) NOT NULL,
  `nama_vga` varchar(100) NOT NULL,
  `stock` int(3) NOT NULL,
  `harga_vga` int(11) NOT NULL,
  `ketersediaan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `ongkir`
--
ALTER TABLE `ongkir`
  ADD PRIMARY KEY (`id_ongkir`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `processor`
--
ALTER TABLE `processor`
  ADD PRIMARY KEY (`id_processor`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `ram`
--
ALTER TABLE `ram`
  ADD PRIMARY KEY (`id_ram`);

--
-- Indexes for table `tabel_pembelian`
--
ALTER TABLE `tabel_pembelian`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- Indexes for table `vga`
--
ALTER TABLE `vga`
  ADD PRIMARY KEY (`id_vga`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ongkir`
--
ALTER TABLE `ongkir`
  MODIFY `id_ongkir` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `processor`
--
ALTER TABLE `processor`
  MODIFY `id_processor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `ram`
--
ALTER TABLE `ram`
  MODIFY `id_ram` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tabel_pembelian`
--
ALTER TABLE `tabel_pembelian`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `vga`
--
ALTER TABLE `vga`
  MODIFY `id_vga` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
