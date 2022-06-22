-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 22, 2020 at 12:53 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `siyatim`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `nama`, `email`) VALUES
(1, 'dimas', 'fcd6b7a2b8d8bf6f1bd03ae00eb10366', 'Dimas Satria', 'dimassatriia@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `donasi`
--

CREATE TABLE `donasi` (
  `id_donasi` int(11) NOT NULL,
  `id_donatur` int(11) NOT NULL,
  `id_panti` int(11) NOT NULL,
  `nama_rekening` varchar(50) NOT NULL,
  `jumlah_transfer` int(11) NOT NULL,
  `pendapatan_panti` int(11) NOT NULL,
  `untuk_platform` int(11) NOT NULL,
  `bukti_transfer` varchar(50) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `tgl_donasi` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `donasi`
--

INSERT INTO `donasi` (`id_donasi`, `id_donatur`, `id_panti`, `nama_rekening`, `jumlah_transfer`, `pendapatan_panti`, `untuk_platform`, `bukti_transfer`, `status`, `tgl_donasi`) VALUES
(1, 1, 1, 'Dimas Satria Bintang Prakasa', 1000000, 970000, 30000, '', 1, '2018-03-16 01:41:27'),
(2, 1, 1, 'Dimas Satria Bintang Prakasa', 1000000, 970000, 30000, '', 1, '2019-03-16 01:41:36'),
(3, 1, 1, 'Dimas Satria Bintang Prakasa', 1000000, 970000, 30000, '', 1, '2019-04-16 01:41:36');

-- --------------------------------------------------------

--
-- Table structure for table `donatur`
--

CREATE TABLE `donatur` (
  `id_donatur` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `foto` varchar(50) NOT NULL,
  `token` varchar(50) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `donatur`
--

INSERT INTO `donatur` (`id_donatur`, `nama`, `email`, `password`, `foto`, `token`, `status`) VALUES
(1, 'Dimas', 'dimas@gmail.com', '7d49e40f4b3d8f68c19406a58303f826', 'dimas.jpg', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `foto_panti`
--

CREATE TABLE `foto_panti` (
  `id_foto_panti` int(11) NOT NULL,
  `nama_file` varchar(50) NOT NULL,
  `id_panti` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `kota`
--

CREATE TABLE `kota` (
  `KODEKOTA` int(5) NOT NULL,
  `KODEPROPINSI` int(5) NOT NULL,
  `NAMAPROPINSI` varchar(40) NOT NULL,
  `NAMAKOTA` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kota`
--

INSERT INTO `kota` (`KODEKOTA`, `KODEPROPINSI`, `NAMAPROPINSI`, `NAMAKOTA`) VALUES
(999, 999, 'Seluruh Indonesia', 'Seluruh Indonesia'),
(1101, 11, 'Aceh', 'Kab. Aceh Selatan'),
(1102, 11, 'Aceh', 'Kab. Aceh Tenggara'),
(1103, 11, 'Aceh', 'Kab. Aceh Timur'),
(1104, 11, 'Aceh', 'Kab. Aceh Tengah'),
(1105, 11, 'Aceh', 'Kab. Aceh Barat'),
(1106, 11, 'Aceh', 'Kab. Aceh Besar'),
(1107, 11, 'Aceh', 'Kab. Pidie'),
(1108, 11, 'Aceh', 'Kab. Aceh Utara'),
(1109, 11, 'Aceh', 'Kab. Simeulue'),
(1110, 11, 'Aceh', 'Kab. Aceh Singkil'),
(1111, 11, 'Aceh', 'Kab. Bireuen'),
(1112, 11, 'Aceh', 'Kab. Aceh Barat Daya'),
(1113, 11, 'Aceh', 'Kab. Gayo Lues'),
(1114, 11, 'Aceh', 'Kab. Aceh Jaya'),
(1115, 11, 'Aceh', 'Kab. Nagan Raya'),
(1116, 11, 'Aceh', 'Kab. Aceh Tamiang'),
(1117, 11, 'Aceh', 'Kab. Bener Meriah'),
(1118, 11, 'Aceh', 'Kab. Pidie Jaya'),
(1171, 11, 'Aceh', 'Kota Banda Aceh'),
(1172, 11, 'Aceh', 'Kota Sabang'),
(1173, 11, 'Aceh', 'Kota Lhokseumawe'),
(1174, 11, 'Aceh', 'Kota Langsa'),
(1175, 11, 'Aceh', 'Kota Subulussalam'),
(1201, 12, 'Sumatera Utara', 'Kab. Tapanuli Tengah'),
(1202, 12, 'Sumatera Utara', 'Kab. Tapanuli Utara'),
(1203, 12, 'Sumatera Utara', 'Kab. Tapanuli Selatan'),
(1204, 12, 'Sumatera Utara', 'Kab. Nias'),
(1205, 12, 'Sumatera Utara', 'Kab. Langkat'),
(1206, 12, 'Sumatera Utara', 'Kab. Karo'),
(1207, 12, 'Sumatera Utara', 'Kab. Deli Serdang'),
(1208, 12, 'Sumatera Utara', 'Kab. Simalungun'),
(1209, 12, 'Sumatera Utara', 'Kab. Asahan'),
(1210, 12, 'Sumatera Utara', 'Kab. Labuhanbatu'),
(1211, 12, 'Sumatera Utara', 'Kab. Dairi'),
(1212, 12, 'Sumatera Utara', 'Kab. Toba Samosir'),
(1213, 12, 'Sumatera Utara', 'Kab. Mandailing Natal'),
(1214, 12, 'Sumatera Utara', 'Kab. Nias Selatan'),
(1215, 12, 'Sumatera Utara', 'Kab. Pakpak Bharat'),
(1216, 12, 'Sumatera Utara', 'Kab. Humbang Hasundutan'),
(1217, 12, 'Sumatera Utara', 'Kab. Samosir'),
(1218, 12, 'Sumatera Utara', 'Kab. Serdang Bedagai'),
(1219, 12, 'Sumatera Utara', 'Kab. Batu Bara'),
(1220, 12, 'Sumatera Utara', 'Kab. Padang Lawas Utara'),
(1221, 12, 'Sumatera Utara', 'Kab. Padang Lawas'),
(1222, 12, 'Sumatera Utara', 'Kab. Labuhanbatu Selatan'),
(1223, 12, 'Sumatera Utara', 'Kab. Labuhanbatu Utara'),
(1224, 12, 'Sumatera Utara', 'Kab. Nias Utara'),
(1225, 12, 'Sumatera Utara', 'Kab. Nias Barat'),
(1271, 12, 'Sumatera Utara', 'Kota Medan'),
(1272, 12, 'Sumatera Utara', 'Kota Pematangsiantar'),
(1273, 12, 'Sumatera Utara', 'Kota Sibolga'),
(1274, 12, 'Sumatera Utara', 'Kota Tanjung Balai'),
(1275, 12, 'Sumatera Utara', 'Kota Binjai'),
(1276, 12, 'Sumatera Utara', 'Kota Tebing Tinggi'),
(1277, 12, 'Sumatera Utara', 'Kota Padang Sidempuan'),
(1278, 12, 'Sumatera Utara', 'Kota Gunung Sitoli'),
(1301, 13, 'Sumatera Barat', 'Kab. Pesisir Selatan'),
(1302, 13, 'Sumatera Barat', 'Kab. Solok'),
(1303, 13, 'Sumatera Barat', 'Kab. Sijunjung'),
(1304, 13, 'Sumatera Barat', 'Kab. Tanah Datar'),
(1305, 13, 'Sumatera Barat', 'Kab. Padang Pariaman'),
(1306, 13, 'Sumatera Barat', 'Kab. Agam'),
(1307, 13, 'Sumatera Barat', 'Kab. Lima Puluh Kota'),
(1308, 13, 'Sumatera Barat', 'Kab. Pasaman'),
(1309, 13, 'Sumatera Barat', 'Kab. Kepulauan Mentawai'),
(1310, 13, 'Sumatera Barat', 'Kab. Dharmasraya'),
(1311, 13, 'Sumatera Barat', 'Kab. Solok Selatan'),
(1312, 13, 'Sumatera Barat', 'Kab. Pasaman Barat'),
(1371, 13, 'Sumatera Barat', 'Kota Padang'),
(1372, 13, 'Sumatera Barat', 'Kota Solok'),
(1373, 13, 'Sumatera Barat', 'Kota Sawahlunto'),
(1374, 13, 'Sumatera Barat', 'Kota Padangpanjang'),
(1375, 13, 'Sumatera Barat', 'Kota Bukittinggi'),
(1376, 13, 'Sumatera Barat', 'Kota Payakumbuh'),
(1377, 13, 'Sumatera Barat', 'Kota Pariaman'),
(1401, 14, 'Riau', 'Kab. Kampar'),
(1402, 14, 'Riau', 'Kab. Indragiri Hulu'),
(1403, 14, 'Riau', 'Kab. Bengkalis'),
(1404, 14, 'Riau', 'Kab. Indragiri Hilir'),
(1405, 14, 'Riau', 'Kab. Pelalawan'),
(1406, 14, 'Riau', 'Kab. Rokan Hulu'),
(1407, 14, 'Riau', 'Kab. Rokan Hilir'),
(1408, 14, 'Riau', 'Kab. Siak'),
(1409, 14, 'Riau', 'Kab. Kuantan Singingi'),
(1410, 14, 'Riau', 'Kab. Kepulauan Meranti'),
(1471, 14, 'Riau', 'Kota Pekanbaru'),
(1472, 14, 'Riau', 'Kota Dumai'),
(1501, 15, 'Jambi', 'Kab. Kerinci'),
(1502, 15, 'Jambi', 'Kab. Merangin'),
(1503, 15, 'Jambi', 'Kab. Sarolangun'),
(1504, 15, 'Jambi', 'Kab. Batang Hari'),
(1505, 15, 'Jambi', 'Kab. Muaro Jambi'),
(1506, 15, 'Jambi', 'Kab. Tanjung Jabung Barat'),
(1507, 15, 'Jambi', 'Kab. Tanjung Jabung Timur'),
(1508, 15, 'Jambi', 'Kab. Bungo'),
(1509, 15, 'Jambi', 'Kab. Tebo'),
(1571, 15, 'Jambi', 'Kota Jambi'),
(1572, 15, 'Jambi', 'Kota Sungai Penuh'),
(1601, 16, 'Sumatera Selatan', 'Kab. Ogan Komering Ulu'),
(1602, 16, 'Sumatera Selatan', 'Kab. Ogan Komering Ilir'),
(1603, 16, 'Sumatera Selatan', 'Kab. Muara Enim'),
(1604, 16, 'Sumatera Selatan', 'Kab. Lahat'),
(1605, 16, 'Sumatera Selatan', 'Kab. Musi Rawas'),
(1606, 16, 'Sumatera Selatan', 'Kab. Musi Banyuasin'),
(1607, 16, 'Sumatera Selatan', 'Kab. Banyuasin'),
(1608, 16, 'Sumatera Selatan', 'Kab. Ogan Komering Ulu Timur'),
(1609, 16, 'Sumatera Selatan', 'Kab. Ogan Komering Ulu Selatan'),
(1610, 16, 'Sumatera Selatan', 'Kab. Ogan Ilir'),
(1611, 16, 'Sumatera Selatan', 'Kab. Empat Lawang'),
(1612, 16, 'Sumatera Selatan', 'Kab. Penukal Arab Lematang Ilir'),
(1613, 16, 'Sumatera Selatan', 'Kab. Musi Rawas Utara'),
(1671, 16, 'Sumatera Selatan', 'Kota Palembang'),
(1672, 16, 'Sumatera Selatan', 'Kota Pagar Alam'),
(1673, 16, 'Sumatera Selatan', 'Kota Lubuklinggau'),
(1674, 16, 'Sumatera Selatan', 'Kota Prabumulih'),
(1701, 17, 'Bengkulu', 'Kab. Bengkulu Selatan'),
(1702, 17, 'Bengkulu', 'Kab. Rejang Lebong'),
(1703, 17, 'Bengkulu', 'Kab. Bengkulu Utara'),
(1704, 17, 'Bengkulu', 'Kab. Kaur'),
(1705, 17, 'Bengkulu', 'Kab. Seluma'),
(1706, 17, 'Bengkulu', 'Kab. Mukomuko'),
(1707, 17, 'Bengkulu', 'Kab. Lebong'),
(1708, 17, 'Bengkulu', 'Kab. Kepahiang'),
(1709, 17, 'Bengkulu', 'Kab. Bengkulu Tengah'),
(1771, 17, 'Bengkulu', 'Kota Bengkulu'),
(1801, 18, 'Lampung', 'Kab. Lampung Selatan'),
(1802, 18, 'Lampung', 'Kab. Lampung Tengah'),
(1803, 18, 'Lampung', 'Kab. Lampung Utara'),
(1804, 18, 'Lampung', 'Kab. Lampung Barat'),
(1805, 18, 'Lampung', 'Kab. Tulang Bawang'),
(1806, 18, 'Lampung', 'Kab. Tanggamus'),
(1807, 18, 'Lampung', 'Kab. Lampung Timur'),
(1808, 18, 'Lampung', 'Kab. Way Kanan'),
(1809, 18, 'Lampung', 'Kab. Pesawaran'),
(1810, 18, 'Lampung', 'Kab. Pringsewu'),
(1811, 18, 'Lampung', 'Kab. Mesuji'),
(1812, 18, 'Lampung', 'Kab. Tulang Bawang Barat'),
(1813, 18, 'Lampung', 'Kab. Pesisir Barat'),
(1871, 18, 'Lampung', 'Kota Bandar Lampung'),
(1872, 18, 'Lampung', 'Kota Metro'),
(1901, 19, 'Kepulauan Bangka Belitung', 'Kab. Bangka'),
(1902, 19, 'Kepulauan Bangka Belitung', 'Kab. Belitung'),
(1903, 19, 'Kepulauan Bangka Belitung', 'Kab. Bangka Selatan'),
(1904, 19, 'Kepulauan Bangka Belitung', 'Kab. Bangka Tengah'),
(1905, 19, 'Kepulauan Bangka Belitung', 'Kab. Bangka Barat'),
(1906, 19, 'Kepulauan Bangka Belitung', 'Kab. Belitung Timur'),
(1971, 19, 'Kepulauan Bangka Belitung', 'Kota Pangkal Pinang'),
(2101, 21, 'Kepulauan Riau', 'Kab. Bintan'),
(2102, 21, 'Kepulauan Riau', 'Kab. Karimun'),
(2103, 21, 'Kepulauan Riau', 'Kab. Natuna'),
(2104, 21, 'Kepulauan Riau', 'Kab. Lingga'),
(2105, 21, 'Kepulauan Riau', 'Kab. Kepulauan Anambas'),
(2171, 21, 'Kepulauan Riau', 'Kota Batam'),
(2172, 21, 'Kepulauan Riau', 'Kota Tanjung Pinang'),
(3101, 31, 'DKI Jakarta', 'Administrasi Kepulauan Seribu'),
(3171, 31, 'DKI Jakarta', 'Kota Administrasi Jakarta Pusat'),
(3172, 31, 'DKI Jakarta', 'Kota Administrasi Jakarta Utara'),
(3173, 31, 'DKI Jakarta', 'Kota Administrasi Jakarta Barat'),
(3174, 31, 'DKI Jakarta', 'Kota Administrasi Jakarta Selatan'),
(3175, 31, 'DKI Jakarta', 'Kota Administrasi Jakarta Timur'),
(3201, 32, 'Jawa Barat', 'Kab. Bogor'),
(3202, 32, 'Jawa Barat', 'Kab. Sukabumi'),
(3203, 32, 'Jawa Barat', 'Kab. Cianjur'),
(3204, 32, 'Jawa Barat', 'Kab. Bandung'),
(3205, 32, 'Jawa Barat', 'Kab. Garut'),
(3206, 32, 'Jawa Barat', 'Kab. Tasikmalaya'),
(3207, 32, 'Jawa Barat', 'Kab. Ciamis'),
(3208, 32, 'Jawa Barat', 'Kab. Kuningan'),
(3209, 32, 'Jawa Barat', 'Kab. Cirebon'),
(3210, 32, 'Jawa Barat', 'Kab. Majalengka'),
(3211, 32, 'Jawa Barat', 'Kab. Sumedang'),
(3212, 32, 'Jawa Barat', 'Kab. Indramayu'),
(3213, 32, 'Jawa Barat', 'Kab. Subang'),
(3214, 32, 'Jawa Barat', 'Kab. Purwakarta'),
(3215, 32, 'Jawa Barat', 'Kab. Karawang'),
(3216, 32, 'Jawa Barat', 'Kab. Bekasi'),
(3217, 32, 'Jawa Barat', 'Kab. Bandung Barat'),
(3271, 32, 'Jawa Barat', 'Kota Bogor'),
(3272, 32, 'Jawa Barat', 'Kota Sukabumi'),
(3273, 32, 'Jawa Barat', 'Kota Bandung'),
(3274, 32, 'Jawa Barat', 'Kota Cirebon'),
(3275, 32, 'Jawa Barat', 'Kota Bekasi'),
(3276, 32, 'Jawa Barat', 'Kota Depok'),
(3277, 32, 'Jawa Barat', 'Kota Cimahi'),
(3278, 32, 'Jawa Barat', 'Kota Tasikmalaya'),
(3279, 32, 'Jawa Barat', 'Kota Banjar'),
(3301, 33, 'Jawa Tengah', 'Kab. Cilacap'),
(3302, 33, 'Jawa Tengah', 'Kab. Banyumas'),
(3303, 33, 'Jawa Tengah', 'Kab. Purbalingga'),
(3304, 33, 'Jawa Tengah', 'Kab. Banjarnegara'),
(3305, 33, 'Jawa Tengah', 'Kab. Kebumen'),
(3306, 33, 'Jawa Tengah', 'Kab. Purworejo'),
(3307, 33, 'Jawa Tengah', 'Kab. Wonosobo'),
(3308, 33, 'Jawa Tengah', 'Kab. Magelang'),
(3309, 33, 'Jawa Tengah', 'Kab. Boyolali'),
(3310, 33, 'Jawa Tengah', 'Kab. Klaten'),
(3311, 33, 'Jawa Tengah', 'Kab. Sukoharjo'),
(3312, 33, 'Jawa Tengah', 'Kab. Wonogiri'),
(3313, 33, 'Jawa Tengah', 'Kab. Karanganyar'),
(3314, 33, 'Jawa Tengah', 'Kab. Sragen'),
(3315, 33, 'Jawa Tengah', 'Kab. Grobogan'),
(3316, 33, 'Jawa Tengah', 'Kab. Blora'),
(3317, 33, 'Jawa Tengah', 'Kab. Rembang'),
(3318, 33, 'Jawa Tengah', 'Kab. Pati'),
(3319, 33, 'Jawa Tengah', 'Kab. Kudus'),
(3320, 33, 'Jawa Tengah', 'Kab. Jepara'),
(3321, 33, 'Jawa Tengah', 'Kab. Demak'),
(3322, 33, 'Jawa Tengah', 'Kab. Kab. Semarang'),
(3323, 33, 'Jawa Tengah', 'Kab. Temanggung'),
(3324, 33, 'Jawa Tengah', 'Kab. Kendal'),
(3325, 33, 'Jawa Tengah', 'Kab. Batang'),
(3326, 33, 'Jawa Tengah', 'Kab. Pekalongan'),
(3327, 33, 'Jawa Tengah', 'Kab. Pemalang'),
(3328, 33, 'Jawa Tengah', 'Kab. Tegal'),
(3329, 33, 'Jawa Tengah', 'Kab. Brebes'),
(3371, 33, 'Jawa Tengah', 'Kota Magelang'),
(3372, 33, 'Jawa Tengah', 'Kota Surakarta'),
(3373, 33, 'Jawa Tengah', 'Kota Salatiga'),
(3374, 33, 'Jawa Tengah', 'Kota Semarang'),
(3375, 33, 'Jawa Tengah', 'Kota Pekalongan'),
(3376, 33, 'Jawa Tengah', 'Kota Tegal'),
(3401, 34, 'Daerah Istimewa Yogyakarta', 'Kab. Kulon Progo'),
(3402, 34, 'Daerah Istimewa Yogyakarta', 'Kab. Bantul'),
(3403, 34, 'Daerah Istimewa Yogyakarta', 'Kab. Gunung Kidul'),
(3404, 34, 'Daerah Istimewa Yogyakarta', 'Kab. Sleman'),
(3471, 34, 'Daerah Istimewa Yogyakarta', ''),
(3501, 35, 'Jawa Timur', 'Kab. Pacitan'),
(3502, 35, 'Jawa Timur', 'Kab. Ponorogo'),
(3503, 35, 'Jawa Timur', 'Kab. Trenggalek'),
(3504, 35, 'Jawa Timur', 'Kab. Tulungagung'),
(3505, 35, 'Jawa Timur', 'Kab. Blitar'),
(3506, 35, 'Jawa Timur', 'Kab. Kediri'),
(3507, 35, 'Jawa Timur', 'Kab. Malang'),
(3508, 35, 'Jawa Timur', 'Kab. Lumajang'),
(3509, 35, 'Jawa Timur', 'Kab. Jember'),
(3510, 35, 'Jawa Timur', 'Kab. Banyuwangi'),
(3511, 35, 'Jawa Timur', 'Kab. Bondowoso'),
(3512, 35, 'Jawa Timur', 'Kab. Situbondo'),
(3513, 35, 'Jawa Timur', 'Kab. Probolinggo'),
(3514, 35, 'Jawa Timur', 'Kab. Pasuruan'),
(3515, 35, 'Jawa Timur', 'Kab. Sidoarjo'),
(3516, 35, 'Jawa Timur', 'Kab. Mojokerto'),
(3517, 35, 'Jawa Timur', 'Kab. Jombang'),
(3518, 35, 'Jawa Timur', 'Kab. Nganjuk'),
(3519, 35, 'Jawa Timur', 'Kab. Madiun'),
(3520, 35, 'Jawa Timur', 'Kab. Magetan'),
(3521, 35, 'Jawa Timur', 'Kab. Ngawi'),
(3522, 35, 'Jawa Timur', 'Kab. Bojonegoro'),
(3523, 35, 'Jawa Timur', 'Kab. Tuban'),
(3524, 35, 'Jawa Timur', 'Kab. Lamongan'),
(3525, 35, 'Jawa Timur', 'Kab. Gresik'),
(3526, 35, 'Jawa Timur', 'Kab. Bangkalan'),
(3527, 35, 'Jawa Timur', 'Kab. Sampang'),
(3528, 35, 'Jawa Timur', 'Kab. Pamekasan'),
(3529, 35, 'Jawa Timur', 'Kab. Sumenep'),
(3571, 35, 'Jawa Timur', 'Kota Kediri'),
(3572, 35, 'Jawa Timur', 'Kota Blitar'),
(3573, 35, 'Jawa Timur', 'Kota Malang'),
(3574, 35, 'Jawa Timur', 'Kota Probolinggo'),
(3575, 35, 'Jawa Timur', 'Kota Pasuruan'),
(3576, 35, 'Jawa Timur', 'Kota Mojokerto'),
(3577, 35, 'Jawa Timur', 'Kota Madiun'),
(3578, 35, 'Jawa Timur', 'Kota Surabaya'),
(3579, 35, 'Jawa Timur', 'Kota Batu'),
(3601, 36, 'Banten', 'Kab. Pandeglang'),
(3602, 36, 'Banten', 'Kab. Lebak'),
(3603, 36, 'Banten', 'Kab. Tangerang'),
(3604, 36, 'Banten', 'Kab. Serang'),
(3671, 36, 'Banten', 'Kota Tangerang'),
(3672, 36, 'Banten', 'Kota Cilegon'),
(3673, 36, 'Banten', 'Kota Serang'),
(3674, 36, 'Banten', 'Kota Tangerang Selatan'),
(5101, 51, 'Bali', 'Kab. Jembrana'),
(5102, 51, 'Bali', 'Kab. Tabanan'),
(5103, 51, 'Bali', 'Kab. Badung'),
(5104, 51, 'Bali', 'Kab. Gianyar'),
(5105, 51, 'Bali', 'Kab. Klungkung'),
(5106, 51, 'Bali', 'Kab. Bangli'),
(5107, 51, 'Bali', 'Kab. Karangasem'),
(5108, 51, 'Bali', 'Kab. Buleleng'),
(5171, 51, 'Bali', 'Kota Denpasar'),
(5201, 52, 'Nusa Tenggara Barat', 'Kab. Lombok Barat'),
(5202, 52, 'Nusa Tenggara Barat', 'Kab. Lombok Tengah'),
(5203, 52, 'Nusa Tenggara Barat', 'Kab. Lombok Timur'),
(5204, 52, 'Nusa Tenggara Barat', 'Kab. Sumbawa'),
(5205, 52, 'Nusa Tenggara Barat', 'Kab. Dompu'),
(5206, 52, 'Nusa Tenggara Barat', 'Kab. Bima'),
(5207, 52, 'Nusa Tenggara Barat', 'Kab. Sumbawa Barat'),
(5208, 52, 'Nusa Tenggara Barat', 'Kab. Lombok Utara'),
(5271, 52, 'Nusa Tenggara Barat', 'Kab. Kota Mataram'),
(5272, 52, 'Nusa Tenggara Barat', 'Kota Bima'),
(5301, 53, 'Nusa Tenggara Timur', 'Kab. Kupang'),
(5302, 53, 'Nusa Tenggara Timur', 'Kab. Timor Tengah Selatan'),
(5303, 53, 'Nusa Tenggara Timur', 'Kab. Timor Tengah Utara'),
(5304, 53, 'Nusa Tenggara Timur', 'Kab. Belu'),
(5305, 53, 'Nusa Tenggara Timur', 'Kab. Alor'),
(5306, 53, 'Nusa Tenggara Timur', 'Kab. Flores Timur'),
(5307, 53, 'Nusa Tenggara Timur', 'Kab. Sikka'),
(5308, 53, 'Nusa Tenggara Timur', 'Kab. Ende'),
(5309, 53, 'Nusa Tenggara Timur', 'Kab. Ngada'),
(5310, 53, 'Nusa Tenggara Timur', 'Kab. Manggarai'),
(5311, 53, 'Nusa Tenggara Timur', 'Kab. Sumba Timur'),
(5312, 53, 'Nusa Tenggara Timur', 'Kab. Sumba Barat'),
(5313, 53, 'Nusa Tenggara Timur', 'Kab. Lembata'),
(5314, 53, 'Nusa Tenggara Timur', 'Kab. Rote Ndao'),
(5315, 53, 'Nusa Tenggara Timur', 'Kab. Manggarai Barat'),
(5316, 53, 'Nusa Tenggara Timur', 'Kab. Nagekeo'),
(5317, 53, 'Nusa Tenggara Timur', 'Kab. Sumba Tengah'),
(5318, 53, 'Nusa Tenggara Timur', 'Kab. Sumba Barat Daya'),
(5319, 53, 'Nusa Tenggara Timur', 'Kab. Manggarai Timur'),
(5320, 53, 'Nusa Tenggara Timur', 'Kab. Sabu Raijua'),
(5371, 53, 'Nusa Tenggara Timur', 'Kota Kupang'),
(6101, 61, 'Kalimantan Barat', 'Kab. Sambas'),
(6102, 61, 'Kalimantan Barat', 'Kab. Mempawah'),
(6103, 61, 'Kalimantan Barat', 'Kab. Sanggau'),
(6104, 61, 'Kalimantan Barat', 'Kab. Ketapang'),
(6105, 61, 'Kalimantan Barat', 'Kab. Sintang'),
(6106, 61, 'Kalimantan Barat', 'Kab. Kapuas Hulu'),
(6107, 61, 'Kalimantan Barat', 'Kab. Bengkayang'),
(6108, 61, 'Kalimantan Barat', 'Kab. Landak'),
(6109, 61, 'Kalimantan Barat', 'Kab. Sekadau'),
(6110, 61, 'Kalimantan Barat', 'Kab. Melawi'),
(6111, 61, 'Kalimantan Barat', 'Kab. Kayong Utara'),
(6112, 61, 'Kalimantan Barat', 'Kab. Kubu Raya'),
(6171, 61, 'Kalimantan Barat', 'Kota Pontianak'),
(6172, 61, 'Kalimantan Barat', 'Kota Singkawang'),
(6201, 62, 'Kalimantan Tengah', 'Kab. Kotawaringin Barat'),
(6202, 62, 'Kalimantan Tengah', 'Kab. Kotawaringin Timur'),
(6203, 62, 'Kalimantan Tengah', 'Kab. Kapuas'),
(6204, 62, 'Kalimantan Tengah', 'Kab. Barito Selatan'),
(6205, 62, 'Kalimantan Tengah', 'Kab. Barito Utara'),
(6206, 62, 'Kalimantan Tengah', 'Kab. Katingan'),
(6207, 62, 'Kalimantan Tengah', 'Kab. Seruyan'),
(6208, 62, 'Kalimantan Tengah', 'Kab. Sukamara'),
(6209, 62, 'Kalimantan Tengah', 'Kab. Lamandau'),
(6210, 62, 'Kalimantan Tengah', 'Kab. Gunung Mas'),
(6211, 62, 'Kalimantan Tengah', 'Kab. Pulang Pisau'),
(6212, 62, 'Kalimantan Tengah', 'Kab. Murung Raya'),
(6213, 62, 'Kalimantan Tengah', 'Kab. Barito Timur'),
(6271, 62, 'Kalimantan Tengah', 'Kota Palangka Raya'),
(6301, 63, 'Kalimantan Selatan', 'Kab. Tanah Laut'),
(6302, 63, 'Kalimantan Selatan', 'Kab. Kotabaru'),
(6303, 63, 'Kalimantan Selatan', 'Kab. Banjar'),
(6304, 63, 'Kalimantan Selatan', 'Kab. Barito Kuala'),
(6305, 63, 'Kalimantan Selatan', 'Kab. Tapin'),
(6306, 63, 'Kalimantan Selatan', 'Kab. Hulu Sungai Selatan'),
(6307, 63, 'Kalimantan Selatan', 'Kab. Hulu Sungai Tengah'),
(6308, 63, 'Kalimantan Selatan', 'Kab. Hulu Sungai Utara'),
(6309, 63, 'Kalimantan Selatan', 'Kab. Tabalong'),
(6310, 63, 'Kalimantan Selatan', 'Kab. Tanah Bumbu'),
(6311, 63, 'Kalimantan Selatan', 'Kab. Balangan'),
(6371, 63, 'Kalimantan Selatan', 'Kota Banjarmasin'),
(6372, 63, 'Kalimantan Selatan', 'Kota Banjarbaru'),
(6401, 64, 'Kalimantan Timur', 'Kab. Paser'),
(6402, 64, 'Kalimantan Timur', 'Kab. Kutai Kartanegara'),
(6403, 64, 'Kalimantan Timur', 'Kab. Berau'),
(6407, 64, 'Kalimantan Timur', 'Kab. Kutai Barat'),
(6408, 64, 'Kalimantan Timur', 'Kab. Kutai Timur'),
(6409, 64, 'Kalimantan Timur', 'Kab. Penajam Paser Utara'),
(6411, 64, 'Kalimantan Timur', 'Kab. Mahakam Ulu'),
(6471, 64, 'Kalimantan Timur', 'Kota Balikpapan'),
(6472, 64, 'Kalimantan Timur', 'Kota Samarinda'),
(6474, 64, 'Kalimantan Timur', 'Kota Bontang'),
(6501, 65, 'Kalimantan Utara', 'Kab. Bulungan'),
(6502, 65, 'Kalimantan Utara', 'Kab. Malinau'),
(6503, 65, 'Kalimantan Utara', 'Kab. Nunukan'),
(6504, 65, 'Kalimantan Utara', 'Kab. Tana Tidung'),
(6571, 65, 'Kalimantan Utara', 'Kota Tarakan'),
(7101, 71, 'Sulawesi Utara', 'Kab. Bolaang Mongondow'),
(7102, 71, 'Sulawesi Utara', 'Kab. Minahasa'),
(7103, 71, 'Sulawesi Utara', 'Kab. Kepulauan Sangihe'),
(7104, 71, 'Sulawesi Utara', 'Kab. Kepulauan Talaud'),
(7105, 71, 'Sulawesi Utara', 'Kab. Minahasa Selatan'),
(7106, 71, 'Sulawesi Utara', 'Kab. Minahasa Utara'),
(7107, 71, 'Sulawesi Utara', 'Kab. Minahasa Tenggara'),
(7108, 71, 'Sulawesi Utara', 'Kab. Bolaang Mongondow Utara'),
(7109, 71, 'Sulawesi Utara', 'Kab. Kepulauan Siau Tagulandang Biaro'),
(7110, 71, 'Sulawesi Utara', 'Kab. Bolaang Mongondow Timur'),
(7111, 71, 'Sulawesi Utara', 'Kab. Bolaang Mongondow Selatan'),
(7171, 71, 'Sulawesi Utara', 'Kota Manado'),
(7172, 71, 'Sulawesi Utara', 'Kota Bitung'),
(7173, 71, 'Sulawesi Utara', 'Kota Tomohon'),
(7174, 71, 'Sulawesi Utara', 'Kota Kotamobagu'),
(7201, 72, 'Sulawesi Tengah', 'Kab. Banggai'),
(7202, 72, 'Sulawesi Tengah', 'Kab. Poso'),
(7203, 72, 'Sulawesi Tengah', 'Kab. Donggala'),
(7204, 72, 'Sulawesi Tengah', 'Kab. Toli-Toli'),
(7205, 72, 'Sulawesi Tengah', 'Kab. Buol'),
(7206, 72, 'Sulawesi Tengah', 'Kab. Morowali'),
(7207, 72, 'Sulawesi Tengah', 'Kab. Banggai Kepulauan'),
(7208, 72, 'Sulawesi Tengah', 'Kab. Parigi Moutong'),
(7209, 72, 'Sulawesi Tengah', 'Kab. Tojo Una-Una'),
(7210, 72, 'Sulawesi Tengah', 'Kab. Sigi'),
(7211, 72, 'Sulawesi Tengah', 'Kab. Banggai Laut'),
(7212, 72, 'Sulawesi Tengah', 'Kab. Morowali Utara'),
(7271, 72, 'Sulawesi Tengah', 'Kota Palu'),
(7301, 73, 'Sulawesi Selatan', 'Kab. Kepulauan Selayar'),
(7302, 73, 'Sulawesi Selatan', 'Kab. Bulukumba'),
(7303, 73, 'Sulawesi Selatan', 'Kab. Bantaeng'),
(7304, 73, 'Sulawesi Selatan', 'Kab. Jeneponto'),
(7305, 73, 'Sulawesi Selatan', 'Kab. Takalar'),
(7306, 73, 'Sulawesi Selatan', 'Kab. Gowa'),
(7307, 73, 'Sulawesi Selatan', 'Kab. Sinjai'),
(7308, 73, 'Sulawesi Selatan', 'Kab. Bone'),
(7309, 73, 'Sulawesi Selatan', 'Kab. Maros'),
(7310, 73, 'Sulawesi Selatan', 'Kab. Pangkajene dan Kepulauan'),
(7311, 73, 'Sulawesi Selatan', 'Kab. Barru'),
(7312, 73, 'Sulawesi Selatan', 'Kab. Soppeng'),
(7313, 73, 'Sulawesi Selatan', 'Kab. Wajo'),
(7314, 73, 'Sulawesi Selatan', 'Kab. Sidenreng Rappang'),
(7315, 73, 'Sulawesi Selatan', 'Kab. Pinrang'),
(7316, 73, 'Sulawesi Selatan', 'Kab. Enrekang'),
(7317, 73, 'Sulawesi Selatan', 'Kab. Luwu'),
(7318, 73, 'Sulawesi Selatan', 'Kab. Tana Toraja'),
(7322, 73, 'Sulawesi Selatan', 'Kab. Luwu Utara'),
(7324, 73, 'Sulawesi Selatan', 'Kab. Luwu Timur'),
(7326, 73, 'Sulawesi Selatan', 'Kab. Toraja Utara'),
(7371, 73, 'Sulawesi Selatan', 'Kota Makassar'),
(7372, 73, 'Sulawesi Selatan', 'Kota Parepare'),
(7373, 73, 'Sulawesi Selatan', 'Kota Palopo'),
(7401, 74, 'Sulawesi Tenggara', 'Kab. Kolaka'),
(7402, 74, 'Sulawesi Tenggara', 'Kab. Konawe'),
(7403, 74, 'Sulawesi Tenggara', 'Kab. Muna'),
(7404, 74, 'Sulawesi Tenggara', 'Kab. Buton'),
(7405, 74, 'Sulawesi Tenggara', 'Kab. Konawe Selatan'),
(7406, 74, 'Sulawesi Tenggara', 'Kab. Bombana'),
(7407, 74, 'Sulawesi Tenggara', 'Kab. Wakatobi'),
(7408, 74, 'Sulawesi Tenggara', 'Kab. Kolaka Utara'),
(7409, 74, 'Sulawesi Tenggara', 'Kab. Konawe Utara'),
(7410, 74, 'Sulawesi Tenggara', 'Kab. Buton Utara'),
(7411, 74, 'Sulawesi Tenggara', 'Kab. Kolaka Timur'),
(7412, 74, 'Sulawesi Tenggara', 'Kab. Konawe Kepulauan'),
(7413, 74, 'Sulawesi Tenggara', 'Kab. Muna Barat'),
(7414, 74, 'Sulawesi Tenggara', 'Kab. Buton Tengah'),
(7415, 74, 'Sulawesi Tenggara', 'Kab. Buton Selatan'),
(7471, 74, 'Sulawesi Tenggara', 'Kota Kendari'),
(7472, 74, 'Sulawesi Tenggara', 'Kota Bau-Bau'),
(7501, 75, 'Gorontalo', 'Kab. Gorontalo'),
(7502, 75, 'Gorontalo', 'Kab. Boalemo'),
(7503, 75, 'Gorontalo', 'Kab. Bone Bolango'),
(7504, 75, 'Gorontalo', 'Kab. Pohuwato'),
(7505, 75, 'Gorontalo', 'Kab. Gorontalo Utara'),
(7571, 75, 'Gorontalo', 'Kota Gorontalo'),
(7601, 76, 'Sulawesi Barat', 'Kab. Mamuju Utara'),
(7602, 76, 'Sulawesi Barat', 'Kab. Mamuju'),
(7603, 76, 'Sulawesi Barat', 'Kab. Mamasa'),
(7604, 76, 'Sulawesi Barat', 'Kab. Polewali Mandar'),
(7605, 76, 'Sulawesi Barat', 'Kab. Majene'),
(7606, 76, 'Sulawesi Barat', 'Kab. Mamuju Tengah'),
(8101, 81, 'Maluku', 'Kab. Maluku Tengah'),
(8102, 81, 'Maluku', 'Kab. Maluku Tenggara'),
(8103, 81, 'Maluku', 'Kab. Maluku Tenggara Barat'),
(8104, 81, 'Maluku', 'Kab. Buru'),
(8105, 81, 'Maluku', 'Kab. Seram Bagian Timur'),
(8106, 81, 'Maluku', 'Kab. Seram Bagian Barat'),
(8107, 81, 'Maluku', 'Kab. Kepulauan Aru'),
(8108, 81, 'Maluku', 'Kab. Maluku Barat Daya'),
(8109, 81, 'Maluku', 'Kab. Buru Selatan'),
(8171, 81, 'Maluku', 'Kota Ambon'),
(8172, 81, 'Maluku', 'Kota Tual'),
(8201, 82, 'Maluku Utara', 'Kab. Halmahera Barat'),
(8202, 82, 'Maluku Utara', 'Kab. Halmahera Tengah'),
(8203, 82, 'Maluku Utara', 'Kab. Halmahera Utara'),
(8204, 82, 'Maluku Utara', 'Kab. Halmahera Selatan'),
(8205, 82, 'Maluku Utara', 'Kab. Kepulauan Sula'),
(8206, 82, 'Maluku Utara', 'Kab. Halmahera Timur'),
(8207, 82, 'Maluku Utara', 'Kab. Pulau Morotai'),
(8208, 82, 'Maluku Utara', 'Kab. Pulau Taliabu'),
(8271, 82, 'Maluku Utara', 'Kota Ternate'),
(8272, 82, 'Maluku Utara', 'Kota Tidore Kepulauan'),
(9101, 91, 'Papua', 'Kab. Merauke'),
(9102, 91, 'Papua', 'Kab. Jayawijaya'),
(9103, 91, 'Papua', 'Kab. Jayapura'),
(9104, 91, 'Papua', 'Kab. Nabire'),
(9105, 91, 'Papua', 'Kab. Kepulauan Yapen'),
(9106, 91, 'Papua', 'Kab. Biak Numfor'),
(9107, 91, 'Papua', 'Kab. Puncak Jaya'),
(9108, 91, 'Papua', 'Kab. Paniai'),
(9109, 91, 'Papua', 'Kab. Mimika'),
(9110, 91, 'Papua', 'Kab. Sarmi'),
(9111, 91, 'Papua', 'Kab. Keerom'),
(9112, 91, 'Papua', 'Kab. Pegunungan Bintang'),
(9113, 91, 'Papua', 'Kab. Yahukimo'),
(9114, 91, 'Papua', 'Kab. Tolikara'),
(9115, 91, 'Papua', 'Kab. Waropen'),
(9116, 91, 'Papua', 'Kab. Boven Digoel'),
(9117, 91, 'Papua', 'Kab. Mappi'),
(9118, 91, 'Papua', 'Kab. Asmat'),
(9119, 91, 'Papua', 'Kab. Supiori'),
(9120, 91, 'Papua', 'Kab. Mamberamo Raya'),
(9121, 91, 'Papua', 'Kab. Mamberamo Tengah'),
(9122, 91, 'Papua', 'Kab. Yalimo'),
(9123, 91, 'Papua', 'Kab. Lanny Jaya'),
(9124, 91, 'Papua', 'Kab. Nduga'),
(9125, 91, 'Papua', 'Kab. Puncak'),
(9126, 91, 'Papua', 'Kab. Dogiyai'),
(9127, 91, 'Papua', 'Kab. Intan Jaya'),
(9128, 91, 'Papua', 'Kab. Deiyai'),
(9171, 91, 'Papua', 'Kota Jayapura'),
(9201, 92, 'Papua Barat', 'Kab. Sorong'),
(9202, 92, 'Papua Barat', 'Kab. Manokwari'),
(9203, 92, 'Papua Barat', 'Kab. Fakfak'),
(9204, 92, 'Papua Barat', 'Kab. Sorong Selatan'),
(9205, 92, 'Papua Barat', 'Kab. Raja Ampat'),
(9206, 92, 'Papua Barat', 'Kab. Teluk Bintuni'),
(9207, 92, 'Papua Barat', 'Kab. Teluk Wondama'),
(9208, 92, 'Papua Barat', 'Kab. Kaimana'),
(9209, 92, 'Papua Barat', 'Kab. Tambrauw'),
(9210, 92, 'Papua Barat', 'Kab. Maybrat'),
(9211, 92, 'Papua Barat', 'Kab. Manokwari Selatan'),
(9212, 92, 'Papua Barat', 'Kab. Pegunungan Arfak'),
(9271, 92, 'Papua Barat', 'Kota Sorong');

-- --------------------------------------------------------

--
-- Table structure for table `panti`
--

CREATE TABLE `panti` (
  `id_panti` int(11) NOT NULL,
  `nama_panti` varchar(50) NOT NULL,
  `jmlh_anak_yatim` int(11) DEFAULT 0,
  `ketua_panti` varchar(50) NOT NULL,
  `email_panti` varchar(50) NOT NULL,
  `password_panti` varchar(50) NOT NULL,
  `alamat_panti` varchar(50) NOT NULL,
  `telepon_panti` varchar(30) NOT NULL,
  `deskripsi_panti_singkat` varchar(200) NOT NULL,
  `deskripsi_panti_lengkap` text NOT NULL,
  `logo_panti` varchar(30) NOT NULL DEFAULT 'default.jpg',
  `gambar_utama` varchar(50) NOT NULL DEFAULT 'default.jpg',
  `kodekota` int(11) NOT NULL DEFAULT 999,
  `status_panti` int(11) NOT NULL DEFAULT 1,
  `status_hapus` int(11) NOT NULL DEFAULT 0,
  `tgl_daftar` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `panti`
--

INSERT INTO `panti` (`id_panti`, `nama_panti`, `jmlh_anak_yatim`, `ketua_panti`, `email_panti`, `password_panti`, `alamat_panti`, `telepon_panti`, `deskripsi_panti_singkat`, `deskripsi_panti_lengkap`, `logo_panti`, `gambar_utama`, `kodekota`, `status_panti`, `status_hapus`, `tgl_daftar`) VALUES
(1, 'Panti Asuhan 1', 100, 'Dimas S', 'panti11@gmail.com', '37114f84a396dc776c58289c000945cd', 'Jl. Surabaya', '031-12314', 'Lorem ipsum dolor sit amet consectetur', '<p>Tes ajasih&nbsp;</p><p><b><strike>Aku rindu</strike></b></p><p><b><strike><br></strike></b></p><table class=\"table table-bordered\"><tbody><tr><td><br></td><td><br></td><td><br></td><td><br></td></tr><tr><td><br></td><td><br></td><td><br></td><td><br></td></tr><tr><td><br></td><td><br></td><td><br></td><td><br></td></tr></tbody></table><p><b><strike><br></strike></b></p>', '1-1584282161.jpg', '1-1584282251.jpg', 3515, 1, 0, '2020-03-15'),
(2, 'Panti Asuhan 2', 0, 'Dimas', 'panti2@gmail.com', '1da549dde193f29781c3a3246249573c', 'Jl. Surabaya', '031-12314', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.', '', 'default.jpg', 'default.jpg', 1102, 1, 1, '2020-03-15'),
(4, 'Panti Asuhan 3', 0, '', 'panti3@gmail.com', '1da549dde193f29781c3a3246249573c', '', '', '', '', 'default.jpg', 'default.jpg', 999, 1, 1, '2020-03-15'),
(5, 'Panti Asuhan 4', 0, '', 'panti4@gmail.com', '1da549dde193f29781c3a3246249573c', '', '', '', '', 'default.jpg', 'default.jpg', 999, 1, 1, '2020-03-15'),
(7, 'Panti Asuhan 5', 0, '', 'panti5@gmail.com', '37114f84a396dc776c58289c000945cd', '', '', '', '', 'default.jpg', 'default.jpg', 999, 1, 1, '2020-03-15'),
(8, 'dimas', 0, '', 'asfsf', '37114f84a396dc776c58289c000945cd', '', '', '', '', 'default.jpg', 'default.jpg', 999, 1, 1, '2020-03-15'),
(9, 'Bayu', 0, 'Joko', 'bayu@gmail.com', '37114f84a396dc776c58289c000945cd', 'Jl. Mawar', '0891423', 'Panti ini adalah', '<p><i>Haloo</i></p>', 'default.jpg', '9-1584313961.jpg', 999, 1, 0, '2020-03-15'),
(10, 'Teees', 0, '', 'halo@gmail.com', '37114f84a396dc776c58289c000945cd', '', '', '', '', 'default.jpg', 'default.jpg', 999, 1, 1, '2020-03-15'),
(11, '&lt;h1&gt;dsfsd&lt;/h1&gt;', 0, '', 'dsdgdg', '37114f84a396dc776c58289c000945cd', '', '', '', '', 'default.jpg', 'default.jpg', 999, 1, 0, '2020-03-15'),
(12, 'Panti 99', 0, '', 'panti99@gmail.com', '37114f84a396dc776c58289c000945cd', '', '', '', '', 'default.jpg', 'default.jpg', 999, 1, 0, '2020-03-15'),
(13, 'Sukes', 0, '', 'sukses@mailc.om', '37114f84a396dc776c58289c000945cd', '', '', '', '', 'default.jpg', 'default.jpg', 999, 1, 0, '2020-03-15'),
(14, 'Panti baru 1', 0, '', 'baru1@gmail.com', '37114f84a396dc776c58289c000945cd', '', '', '', '', 'default.jpg', 'default.jpg', 999, 1, 0, '2020-03-15'),
(16, 'Panti baru 1', 0, '', 'baru1a@gmail.com', '37114f84a396dc776c58289c000945cd', '', '', '', '', 'default.jpg', 'default.jpg', 999, 1, 0, '2020-03-15'),
(17, 'Bayu', 0, 'Joko', 'bayu1@gmail.com', '37114f84a396dc776c58289c000945cd', 'Jl. Mawar', '0891423', 'Panti ini adalah', '<p><i>Haloo</i></p>', 'default.jpg', '9-1584313961.jpg', 999, 1, 0, '2020-03-15'),
(18, 'Bayu', 0, 'Joko', 'bayu2@gmail.com', '37114f84a396dc776c58289c000945cd', 'Jl. Mawar', '0891423', 'Panti ini adalah', '<p><i>Haloo</i></p>', 'default.jpg', '9-1584313961.jpg', 999, 1, 0, '2020-03-15'),
(19, 'Bayu', 0, 'Joko', 'bayu3@gmail.com', '37114f84a396dc776c58289c000945cd', 'Jl. Mawar', '0891423', 'Panti ini adalah', '<p><i>Haloo</i></p>', 'default.jpg', '9-1584313961.jpg', 999, 1, 0, '2020-03-15'),
(20, 'Bayu', 0, 'Joko', 'bayu4@gmail.com', '37114f84a396dc776c58289c000945cd', 'Jl. Mawar', '0891423', 'Panti ini adalah', '<p><i>Haloo</i></p>', 'default.jpg', '9-1584313961.jpg', 999, 1, 0, '2020-03-15'),
(21, 'Bayu', 0, 'Joko', 'bayu5@gmail.com', '37114f84a396dc776c58289c000945cd', 'Jl. Mawar', '0891423', 'Panti ini adalah', '<p><i>Haloo</i></p>', 'default.jpg', '9-1584313961.jpg', 999, 1, 0, '2020-03-15'),
(22, 'Bayu', 0, 'Joko', 'bayu6@gmail.com', '37114f84a396dc776c58289c000945cd', 'Jl. Mawar', '0891423', 'Panti ini adalah', '<p><i>Haloo</i></p>', 'default.jpg', '9-1584313961.jpg', 999, 1, 0, '2020-03-15'),
(23, 'Bayu', 0, 'Joko', 'bayu7@gmail.com', '37114f84a396dc776c58289c000945cd', 'Jl. Mawar', '0891423', 'Panti ini adalah', '<p><i>Haloo</i></p>', 'default.jpg', '9-1584313961.jpg', 999, 1, 0, '2020-03-15'),
(24, 'Bayu', 0, 'Joko', 'bayu8@gmail.com', '37114f84a396dc776c58289c000945cd', 'Jl. Mawar', '0891423', 'Panti ini adalah', '<p><i>Haloo</i></p>', 'default.jpg', '9-1584313961.jpg', 999, 1, 0, '2020-03-15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `donasi`
--
ALTER TABLE `donasi`
  ADD PRIMARY KEY (`id_donasi`),
  ADD KEY `id_donatur` (`id_donatur`),
  ADD KEY `id_panti` (`id_panti`);

--
-- Indexes for table `donatur`
--
ALTER TABLE `donatur`
  ADD PRIMARY KEY (`id_donatur`);

--
-- Indexes for table `foto_panti`
--
ALTER TABLE `foto_panti`
  ADD PRIMARY KEY (`id_foto_panti`),
  ADD KEY `id_panti` (`id_panti`);

--
-- Indexes for table `kota`
--
ALTER TABLE `kota`
  ADD PRIMARY KEY (`KODEKOTA`);

--
-- Indexes for table `panti`
--
ALTER TABLE `panti`
  ADD PRIMARY KEY (`id_panti`),
  ADD UNIQUE KEY `email_panti` (`email_panti`),
  ADD KEY `kodekota` (`kodekota`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `donasi`
--
ALTER TABLE `donasi`
  MODIFY `id_donasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `donatur`
--
ALTER TABLE `donatur`
  MODIFY `id_donatur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `foto_panti`
--
ALTER TABLE `foto_panti`
  MODIFY `id_foto_panti` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `panti`
--
ALTER TABLE `panti`
  MODIFY `id_panti` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `donasi`
--
ALTER TABLE `donasi`
  ADD CONSTRAINT `donasi_ibfk_1` FOREIGN KEY (`id_donatur`) REFERENCES `donatur` (`id_donatur`),
  ADD CONSTRAINT `donasi_ibfk_2` FOREIGN KEY (`id_panti`) REFERENCES `panti` (`id_panti`);

--
-- Constraints for table `foto_panti`
--
ALTER TABLE `foto_panti`
  ADD CONSTRAINT `foto_panti_ibfk_1` FOREIGN KEY (`id_panti`) REFERENCES `panti` (`id_panti`);

--
-- Constraints for table `panti`
--
ALTER TABLE `panti`
  ADD CONSTRAINT `panti_ibfk_1` FOREIGN KEY (`kodekota`) REFERENCES `kota` (`KODEKOTA`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
