-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 21, 2020 at 12:44 PM
-- Server version: 5.6.38
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toko-game`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang`
--

CREATE TABLE `tb_barang` (
  `id_brg` int(11) NOT NULL,
  `nama_brg` varchar(128) NOT NULL,
  `keterangan` varchar(225) NOT NULL,
  `kategori` varchar(60) NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(4) NOT NULL,
  `gambar` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_barang`
--

INSERT INTO `tb_barang` (`id_brg`, `nama_brg`, `keterangan`, `kategori`, `harga`, `stok`, `gambar`) VALUES
(1, 'Zelda Breath Of Wild', 'The Legend Of Zelda Breath Of Wild nintendo switch', 'nintendo', 600000, 29, 'botw.jpeg'),
(2, 'Pokemon Lets go eeve', 'Pokemon Let\'s go eeve nintendo switch', 'nintendo', 450000, 30, 'pokemon_eeve.jpg'),
(3, 'CTR Nitro Fueled', 'Crash Team Racing Nitro Fueled nintendo switch', 'nintendo', 450000, 30, 'ctr_ns.jpeg'),
(4, 'Pokemon Sword ', 'Pokemon Sword and shield nintendo switch', 'nintendo', 500000, 12, 'psns2.jpeg'),
(15, 'Jumanji the video game', 'Jumanji the video game ,Outright Games xbox one', 'xbox', 490000, 10, 'jumanji.jpg'),
(16, 'titanfall 2', 'titanfall 2 ,Respawn Electronic Arts xbox one', 'xbox', 400000, 10, 'titanfall2ea.jpeg'),
(17, 'Gears 5', 'Gears of Wars 5 xbox one console exclusive', 'xbox', 500000, 10, 'gears5.jpg'),
(18, 'Star Wars jedi fallen order', 'Star Wars jedi fallen order xbox one', 'xbox', 450000, 10, 'starwarjedi.jpeg'),
(20, 'Monster Hunter World', 'Monster hunter World Iceborn Playstation 4', 'playstation', 499000, 10, 'mhw.jpg'),
(21, 'NFS heat', 'Need For Speed Heat, Electronic Arts. Playstation 4', 'playstation', 455000, 10, 'nfsheatps4.jpeg'),
(26, 'RDR 2', 'Red Dead Redemption 2 Playstation 4', 'playstation', 450000, 10, 'rdr22.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_invoice`
--

CREATE TABLE `tb_invoice` (
  `id` int(11) NOT NULL,
  `nama` varchar(56) NOT NULL,
  `alamat` varchar(256) NOT NULL,
  `tgl_pesan` datetime NOT NULL,
  `batas_bayar` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_invoice`
--

INSERT INTO `tb_invoice` (`id`, `nama`, `alamat`, `tgl_pesan`, `batas_bayar`) VALUES
(1, 'mohamad albar', 'Depok, Jawa Barat', '2020-11-20 00:26:45', '2027-03-13 00:26:45'),
(2, 'babang', 'Depok, Jawa Barat', '2020-11-20 00:39:36', '2020-11-21 00:39:36'),
(3, '', '', '2020-11-20 14:55:23', '2020-11-21 14:55:23'),
(4, 'albar', 'Depok, Jawa Barat', '2020-11-20 14:59:25', '2020-11-21 14:59:25'),
(5, 'bbg', 'Depok, Jawa Barat', '2020-11-20 15:48:11', '2020-11-21 15:48:11');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pesanan`
--

CREATE TABLE `tb_pesanan` (
  `id` int(11) NOT NULL,
  `id_invoice` int(11) NOT NULL,
  `id_brg` int(11) NOT NULL,
  `nama_brg` varchar(56) NOT NULL,
  `jumlah` int(3) NOT NULL,
  `harga` int(10) NOT NULL,
  `pilihan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_pesanan`
--

INSERT INTO `tb_pesanan` (`id`, `id_invoice`, `id_brg`, `nama_brg`, `jumlah`, `harga`, `pilihan`) VALUES
(1, 1, 1, 'kamera', 2, 4000000, ''),
(2, 2, 8, 'CTR Nitro Fueled', 1, 450000, ''),
(3, 3, 17, 'Gears 5', 1, 500000, ''),
(4, 3, 18, 'Star Wars jedi fallen order', 1, 450000, ''),
(5, 3, 16, 'titanfall 2', 1, 400000, ''),
(6, 3, 15, 'Jumanji the video game', 1, 490000, ''),
(7, 4, 1, 'Zelda Breath Of Wild', 1, 600000, ''),
(8, 4, 2, 'Pokemon Lets go eeve', 1, 450000, ''),
(9, 5, 1, 'Zelda Breath Of Wild', 1, 600000, '');

--
-- Triggers `tb_pesanan`
--
DELIMITER $$
CREATE TRIGGER `pesanan_penjualan` AFTER INSERT ON `tb_pesanan` FOR EACH ROW BEGIN
    UPDATE tb_barang SET stok = stok-NEW.jumlah
    WHERE id_brg = NEW.id_brg;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `nama` varchar(56) NOT NULL,
  `username` varchar(56) NOT NULL,
  `password` varchar(500) NOT NULL,
  `role_id` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `nama`, `username`, `password`, `role_id`) VALUES
(1, 'admin', 'admin', '123', 1),
(2, 'user', 'user', '123', 2),
(3, 'babang ', 'babang', '123', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`id_brg`);

--
-- Indexes for table `tb_invoice`
--
ALTER TABLE `tb_invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_pesanan`
--
ALTER TABLE `tb_pesanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_barang`
--
ALTER TABLE `tb_barang`
  MODIFY `id_brg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tb_invoice`
--
ALTER TABLE `tb_invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_pesanan`
--
ALTER TABLE `tb_pesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
