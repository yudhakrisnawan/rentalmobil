-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 01 Jun 2021 pada 07.00
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smbd_project`
--

DELIMITER $$
--
-- Prosedur
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `pengembalian` (IN `vidkembali` VARCHAR(10), IN `vidadmin` VARCHAR(10), IN `vidmobil` VARCHAR(10), IN `vidcustomer` VARCHAR(10), IN `vidsewa` VARCHAR(10), IN `vtanggalkembali` DATE, IN `vketerangan` VARCHAR(10), IN `vdenda` INT(10))  BEGIN UPDATE mobil SET keterangan='tersedia' 
    WHERE id_mobil = vidmobil 
    ;
    INSERT INTO `pengembalian` (`id_pengembalian`, `id_admin`, `id_mobil`, `id_customer`, `id_sewa`, `tanggal_kembali`, `keterangan`, `denda`) VALUES (vidkembali,  vidadmin, vidmobil, vidcustomer, vidsewa, vtanggalkembali, vketerangan, vdenda);
    DELETE FROM `penyewaan` WHERE `id_sewa` = vidsewa;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `penyewaan` (IN `vidsewa` VARCHAR(10), IN `vidadmin` VARCHAR(10), IN `vidmobil` VARCHAR(10), IN `vidcustomer` VARCHAR(10), IN `vtanggalsewa` DATE, IN `vwaktusewa` VARCHAR(10))  BEGIN UPDATE mobil SET keterangan='tidak tersedia' 
    WHERE id_mobil = vidmobil 
    ;
    INSERT INTO `penyewaan` (`id_sewa`, `id_admin`, `id_mobil`, `id_customer`, `tanggal_sewa`, `waktu_sewa`) 
    VALUES (vidsewa,vidadmin,vidmobil, vidcustomer, vtanggalsewa, vwaktusewa);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `tambah_mobil` (IN `vidmobil` VARCHAR(10), IN `tipemobil` VARCHAR(50), IN `hargasewa` INT(10), IN `vketerangan` VARCHAR(1000))  BEGIN INSERT INTO `mobil`(`id_mobil`, `Tipe_mobil`, `harga_sewa`, `keterangan`) VALUES (vidmobil,tipemobil,hargasewa,vketerangan); 
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `id_level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `nama`, `id_level`) VALUES
(1, 'jm', 'jm', 'JM Havidz', 1),
(2, 'yudha', 'yudha', 'Yudha Krisnawan', 2),
(3, 'fajar', 'fajar', 'Fajar Naufal Daffa', 1),
(4, 'andiko', 'andiko', 'Andiko Putra', 1),
(5, 'ridho', 'ridho', 'Ridho Hidayatullah', 2);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `bertipe_toyota`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `bertipe_toyota` (
`id_mobil` varchar(25)
,`Tipe_mobil` varchar(50)
,`tahun_produksi` int(4)
,`harga_sewa` int(10)
,`keterangan` varchar(1000)
);

-- --------------------------------------------------------

--
-- Struktur dari tabel `customer`
--

CREATE TABLE `customer` (
  `id_customer` varchar(25) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `no_ktp` varchar(25) NOT NULL,
  `alamat` varchar(25) NOT NULL,
  `tanggal_lahir` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `customer`
--

INSERT INTO `customer` (`id_customer`, `nama`, `no_ktp`, `alamat`, `tanggal_lahir`) VALUES
('C01', 'rizal', '12321', 'telang', '2000-05-01'),
('C02', 'lala', '32123', 'probolinggo', '2001-05-12'),
('C03', 'rif\'at Ch', '43234', 'gresik', '2000-05-18'),
('C04', 'Akiezz', '74637', 'Surabaya', '2002-03-17'),
('C05', 'sari', '73283', 'sidoarjo', '2003-08-17'),
('C06', 'haris', '12832', 'Madura', '2002-10-13'),
('C07', 'labib', '42432', 'Socah', '2001-08-16'),
('C09', 'aji', '13718', 'ngawi', '2002-04-20'),
('C10', 'Chuesnoel Moebarock', '83739', 'Surabaya', '2000-02-29'),
('CO8', 'fadkulz', '38173', 'lamongan', '2001-02-08');

-- --------------------------------------------------------

--
-- Struktur dari tabel `level_user`
--

CREATE TABLE `level_user` (
  `id_level` int(11) NOT NULL,
  `nama_level` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `level_user`
--

INSERT INTO `level_user` (`id_level`, `nama_level`) VALUES
(1, 'admin'),
(2, 'superadmin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mobil`
--

CREATE TABLE `mobil` (
  `id_mobil` varchar(25) NOT NULL,
  `Tipe_mobil` varchar(50) NOT NULL,
  `tahun_produksi` int(4) NOT NULL,
  `harga_sewa` int(10) NOT NULL,
  `keterangan` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mobil`
--

INSERT INTO `mobil` (`id_mobil`, `Tipe_mobil`, `tahun_produksi`, `harga_sewa`, `keterangan`) VALUES
('M 1212 T', 'Mitsubishi Lancer', 2016, 900000, 'tersedia'),
('M 123 L', 'Honda Brio', 2010, 250000, 'tersedia'),
('M 3113 K', 'Misuzu Elf Microbus', 2013, 1000000, 'tersedia'),
('M 321 L', 'Toyota Avanza', 2009, 300000, 'tersedia'),
('M 3212 J', 'Nissan GTR', 2019, 900000, 'tersedia'),
('M 3268 KM', 'Toyota Kijang Inova Reborn', 2017, 500000, 'tersedia'),
('M 6326 KM', 'Mitsubishi Xpender', 2020, 450000, 'tersedia'),
('M 7373 KM', 'Toyota Civic', 2017, 320000, 'tersedia'),
('M 8326 R', 'Mitsubishi Pajero', 2016, 700000, 'tersedia'),
('M 8736 KM', 'toyota Fortuner', 2010, 600000, 'tersedia'),
('M 929 L', 'toyota yaris', 2012, 225000, 'tersedia');

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `mobil_tersedia`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `mobil_tersedia` (
`id_mobil` varchar(25)
,`Tipe_mobil` varchar(50)
,`tahun_produksi` int(4)
,`harga_sewa` int(10)
,`keterangan` varchar(1000)
);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengembalian`
--

CREATE TABLE `pengembalian` (
  `id_pengembalian` varchar(25) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `id_mobil` varchar(25) NOT NULL,
  `id_customer` varchar(25) NOT NULL,
  `id_sewa` varchar(25) NOT NULL,
  `tanggal_kembali` date NOT NULL,
  `keterangan` varchar(1000) NOT NULL,
  `denda` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `penyewaan`
--

CREATE TABLE `penyewaan` (
  `id_sewa` varchar(25) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `id_mobil` varchar(25) NOT NULL,
  `id_customer` varchar(25) NOT NULL,
  `tanggal_sewa` date NOT NULL,
  `waktu_sewa` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `urutan_harga_terendah`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `urutan_harga_terendah` (
`id_mobil` varchar(25)
,`Tipe_mobil` varchar(50)
,`tahun_produksi` int(4)
,`harga_sewa` int(10)
,`keterangan` varchar(1000)
);

-- --------------------------------------------------------

--
-- Struktur untuk view `bertipe_toyota`
--
DROP TABLE IF EXISTS `bertipe_toyota`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `bertipe_toyota`  AS  select `mobil`.`id_mobil` AS `id_mobil`,`mobil`.`Tipe_mobil` AS `Tipe_mobil`,`mobil`.`tahun_produksi` AS `tahun_produksi`,`mobil`.`harga_sewa` AS `harga_sewa`,`mobil`.`keterangan` AS `keterangan` from `mobil` where `mobil`.`Tipe_mobil` like '%toyota%' ;

-- --------------------------------------------------------

--
-- Struktur untuk view `mobil_tersedia`
--
DROP TABLE IF EXISTS `mobil_tersedia`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `mobil_tersedia`  AS  select `mobil`.`id_mobil` AS `id_mobil`,`mobil`.`Tipe_mobil` AS `Tipe_mobil`,`mobil`.`tahun_produksi` AS `tahun_produksi`,`mobil`.`harga_sewa` AS `harga_sewa`,`mobil`.`keterangan` AS `keterangan` from `mobil` where `mobil`.`keterangan` in (select `mobil`.`keterangan` from DUAL  where `mobil`.`keterangan` = 'tersedia') ;

-- --------------------------------------------------------

--
-- Struktur untuk view `urutan_harga_terendah`
--
DROP TABLE IF EXISTS `urutan_harga_terendah`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `urutan_harga_terendah`  AS  select `mobil`.`id_mobil` AS `id_mobil`,`mobil`.`Tipe_mobil` AS `Tipe_mobil`,`mobil`.`tahun_produksi` AS `tahun_produksi`,`mobil`.`harga_sewa` AS `harga_sewa`,`mobil`.`keterangan` AS `keterangan` from `mobil` order by `mobil`.`harga_sewa` ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD KEY `id_level` (`id_level`);

--
-- Indeks untuk tabel `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id_customer`);

--
-- Indeks untuk tabel `level_user`
--
ALTER TABLE `level_user`
  ADD PRIMARY KEY (`id_level`);

--
-- Indeks untuk tabel `mobil`
--
ALTER TABLE `mobil`
  ADD PRIMARY KEY (`id_mobil`);

--
-- Indeks untuk tabel `pengembalian`
--
ALTER TABLE `pengembalian`
  ADD PRIMARY KEY (`id_pengembalian`),
  ADD UNIQUE KEY `id_mobil` (`id_mobil`),
  ADD UNIQUE KEY `id_customer` (`id_customer`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Indeks untuk tabel `penyewaan`
--
ALTER TABLE `penyewaan`
  ADD PRIMARY KEY (`id_sewa`),
  ADD UNIQUE KEY `id_mobil` (`id_mobil`),
  ADD UNIQUE KEY `id_customer` (`id_customer`),
  ADD KEY `id_admin` (`id_admin`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `level_user`
--
ALTER TABLE `level_user`
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`id_level`) REFERENCES `level_user` (`id_level`);

--
-- Ketidakleluasaan untuk tabel `pengembalian`
--
ALTER TABLE `pengembalian`
  ADD CONSTRAINT `pengembalian_ibfk_1` FOREIGN KEY (`id_customer`) REFERENCES `customer` (`id_customer`),
  ADD CONSTRAINT `pengembalian_ibfk_2` FOREIGN KEY (`id_mobil`) REFERENCES `mobil` (`id_mobil`),
  ADD CONSTRAINT `pengembalian_ibfk_3` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`);

--
-- Ketidakleluasaan untuk tabel `penyewaan`
--
ALTER TABLE `penyewaan`
  ADD CONSTRAINT `penyewaan_ibfk_1` FOREIGN KEY (`id_mobil`) REFERENCES `mobil` (`id_mobil`),
  ADD CONSTRAINT `penyewaan_ibfk_3` FOREIGN KEY (`id_customer`) REFERENCES `customer` (`id_customer`),
  ADD CONSTRAINT `penyewaan_ibfk_4` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
