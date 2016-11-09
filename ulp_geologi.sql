-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2016 at 11:14 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.5.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ulp_geologi`
--

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `id_event` int(11) NOT NULL,
  `event_name` varchar(100) NOT NULL DEFAULT '',
  `event_description` text,
  `date_start` date NOT NULL DEFAULT '0000-00-00',
  `date_end` date NOT NULL DEFAULT '0000-00-00',
  `place` varchar(255) DEFAULT NULL,
  `pic` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id_event`, `event_name`, `event_description`, `date_start`, `date_end`, `place`, `pic`, `created_at`, `modified_at`) VALUES
(2, 'mnjb', '', '2016-03-11', '2016-03-12', 'mnb', ',kn', '2016-03-19 10:46:56', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `feature`
--

CREATE TABLE `feature` (
  `id_feature` int(11) NOT NULL,
  `feature_name` varchar(255) DEFAULT NULL,
  `controller` varchar(255) DEFAULT NULL,
  `icon` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feature`
--

INSERT INTO `feature` (`id_feature`, `feature_name`, `controller`, `icon`) VALUES
(1, 'User', 'User', '<i class="fa fa-user"></i>'),
(2, 'Guest Book', 'GuestBook', '<i class="fa fa-book"></i>'),
(3, 'Event', 'Event', '<i class="fa fa-calendar"></i>'),
(5, 'Event Content', 'EventContent', '<i class="fa fa-th"></i>'),
(6, 'Role', 'Role', '<i class="fa fa-users"></i>'),
(7, 'Feature', 'Feature', '<i class="fa fa-gear"></i>');

-- --------------------------------------------------------

--
-- Table structure for table `file`
--

CREATE TABLE `file` (
  `id_file` int(11) NOT NULL,
  `id_event` int(11) DEFAULT NULL,
  `file_name` varchar(255) NOT NULL DEFAULT '',
  `file_path` varchar(255) NOT NULL DEFAULT '',
  `file_description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `file`
--

INSERT INTO `file` (`id_file`, `id_event`, `file_name`, `file_path`, `file_description`) VALUES
(1, 2, 'Chrysanthemum.jpg', '', 'asdf'),
(10, 2, 'Penguins1.jpg', '', 'er');

-- --------------------------------------------------------

--
-- Table structure for table `guest_book`
--

CREATE TABLE `guest_book` (
  `id_guest_book` int(11) NOT NULL,
  `id_event` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `institute` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `visit_time` datetime DEFAULT '0000-00-00 00:00:00',
  `interesting_product` varchar(255) DEFAULT NULL,
  `institution_address` varchar(255) DEFAULT NULL,
  `city` int(4) UNSIGNED DEFAULT NULL,
  `provinsi` int(2) UNSIGNED DEFAULT NULL,
  `division` varchar(255) DEFAULT NULL,
  `institute_phone` varchar(255) DEFAULT NULL,
  `institute_email` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `satisfaction` varchar(255) DEFAULT NULL,
  `visit_time_out` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `id_jabatan` int(20) NOT NULL,
  `kode_jabatan` varchar(20) NOT NULL,
  `nama_jabatan` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jenis_belanja`
--

CREATE TABLE `jenis_belanja` (
  `id_jenis_belanja` int(11) NOT NULL,
  `keterangan` varchar(500) NOT NULL,
  `kode_jenis_belanja` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kabupaten`
--

CREATE TABLE `kabupaten` (
  `id` int(4) UNSIGNED NOT NULL COMMENT 'ID',
  `provinsi_id` int(2) UNSIGNED DEFAULT NULL COMMENT 'Provinsi',
  `nama_kabupaten` varchar(255) NOT NULL DEFAULT '' COMMENT 'Nama Kabupaten'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kabupaten`
--

INSERT INTO `kabupaten` (`id`, `provinsi_id`, `nama_kabupaten`) VALUES
(1101, 11, 'Simeulue'),
(1102, 11, 'Aceh Singkil'),
(1103, 11, 'Aceh Selatan'),
(1104, 11, 'Aceh Tenggara'),
(1105, 11, 'Aceh Timur'),
(1106, 11, 'Aceh Tengah'),
(1107, 11, 'Aceh Barat'),
(1108, 11, 'Aceh Besar'),
(1109, 11, 'Pidie'),
(1110, 11, 'Bireuen'),
(1111, 11, 'Aceh Utara'),
(1112, 11, 'Aceh Barat Daya'),
(1113, 11, 'Gayo Lues'),
(1114, 11, 'Aceh Tamiang'),
(1115, 11, 'Nagan Raya'),
(1116, 11, 'Aceh Jaya'),
(1117, 11, 'Bener Meriah'),
(1118, 11, 'Pidie Jaya'),
(1171, 11, 'Kota Banda Aceh'),
(1172, 11, 'Kota Sabang'),
(1173, 11, 'Kota Langsa'),
(1174, 11, 'Kota Lhokseumawe'),
(1175, 11, 'Kota Subulussalam'),
(1201, 12, 'Nias'),
(1202, 12, 'Mandailing Natal'),
(1203, 12, 'Tapanuli Selatan'),
(1204, 12, 'Tapanuli Tengah'),
(1205, 12, 'Tapanuli Utara'),
(1206, 12, 'Toba Samosir'),
(1207, 12, 'Labuhan Batu'),
(1208, 12, 'Asahan'),
(1209, 12, 'Simalungun'),
(1210, 12, 'Dairi'),
(1211, 12, 'Karo'),
(1212, 12, 'Deli Serdang'),
(1213, 12, 'Langkat'),
(1214, 12, 'Nias Selatan'),
(1215, 12, 'Humbang Hasundutan'),
(1216, 12, 'Pakpak Bharat'),
(1217, 12, 'Samosir'),
(1218, 12, 'Serdang Bedagai'),
(1219, 12, 'Batu Bara'),
(1220, 12, 'Padang Lawas Utara'),
(1221, 12, 'Padang Lawas'),
(1222, 12, 'Labuhan Batu Selatan'),
(1223, 12, 'Labuhan Batu Utara'),
(1224, 12, 'Nias Utara'),
(1225, 12, 'Nias Barat'),
(1271, 12, 'Kota Sibolga'),
(1272, 12, 'Kota Tanjung Balai'),
(1273, 12, 'Kota Pematang Siantar'),
(1274, 12, 'Kota Tebing Tinggi'),
(1275, 12, 'Kota Medan'),
(1276, 12, 'Kota Binjai'),
(1277, 12, 'Kota Padangsidimpuan'),
(1278, 12, 'Kota Gunungsitoli'),
(1301, 13, 'Kepulauan Mentawai'),
(1302, 13, 'Pesisir Selatan'),
(1303, 13, 'Solok'),
(1304, 13, 'Sijunjung'),
(1305, 13, 'Tanah Datar'),
(1306, 13, 'Padang Pariaman'),
(1307, 13, 'Agam'),
(1308, 13, 'Lima Puluh Kota'),
(1309, 13, 'Pasaman'),
(1310, 13, 'Solok Selatan'),
(1311, 13, 'Dharmasraya'),
(1312, 13, 'Pasaman Barat'),
(1371, 13, 'Kota Padang'),
(1372, 13, 'Kota Solok'),
(1373, 13, 'Kota Sawah Lunto'),
(1374, 13, 'Kota Padang Panjang'),
(1375, 13, 'Kota Bukittinggi'),
(1376, 13, 'Kota Payakumbuh'),
(1377, 13, 'Kota Pariaman'),
(1401, 14, 'Kuantan Singingi'),
(1402, 14, 'Indragiri Hulu'),
(1403, 14, 'Indragiri Hilir'),
(1404, 14, 'Pelalawan'),
(1405, 14, 'S I A K'),
(1406, 14, 'Kampar'),
(1407, 14, 'Rokan Hulu'),
(1408, 14, 'Bengkalis'),
(1409, 14, 'Rokan Hilir'),
(1410, 14, 'Kepulauan Meranti'),
(1471, 14, 'Kota Pekanbaru'),
(1473, 14, 'Kota D U M A I'),
(1501, 15, 'Kerinci'),
(1502, 15, 'Merangin'),
(1503, 15, 'Sarolangun'),
(1504, 15, 'Batang Hari'),
(1505, 15, 'Muaro Jambi'),
(1506, 15, 'Tanjung Jabung Timur'),
(1507, 15, 'Tanjung Jabung Barat'),
(1508, 15, 'Tebo'),
(1509, 15, 'Bungo'),
(1571, 15, 'Kota Jambi'),
(1572, 15, 'Kota Sungai Penuh'),
(1601, 16, 'Ogan Komering Ulu'),
(1602, 16, 'Ogan Komering Ilir'),
(1603, 16, 'Muara Enim'),
(1604, 16, 'Lahat'),
(1605, 16, 'Musi Rawas'),
(1606, 16, 'Musi Banyuasin'),
(1607, 16, 'Banyu Asin'),
(1608, 16, 'Ogan Komering Ulu Selatan'),
(1609, 16, 'Ogan Komering Ulu Timur'),
(1610, 16, 'Ogan Ilir'),
(1611, 16, 'Empat Lawang'),
(1671, 16, 'Kota Palembang'),
(1672, 16, 'Kota Prabumulih'),
(1673, 16, 'Kota Pagar Alam'),
(1674, 16, 'Kota Lubuklinggau'),
(1701, 17, 'Bengkulu Selatan'),
(1702, 17, 'Rejang Lebong'),
(1703, 17, 'Bengkulu Utara'),
(1704, 17, 'Kaur'),
(1705, 17, 'Seluma'),
(1706, 17, 'Mukomuko'),
(1707, 17, 'Lebong'),
(1708, 17, 'Kepahiang'),
(1709, 17, 'Bengkulu Tengah'),
(1771, 17, 'Kota Bengkulu'),
(1801, 18, 'Lampung Barat'),
(1802, 18, 'Tanggamus'),
(1803, 18, 'Lampung Selatan'),
(1804, 18, 'Lampung Timur'),
(1805, 18, 'Lampung Tengah'),
(1806, 18, 'Lampung Utara'),
(1807, 18, 'Way Kanan'),
(1808, 18, 'Tulangbawang'),
(1809, 18, 'Pesawaran'),
(1810, 18, 'Pringsewu'),
(1811, 18, 'Mesuji'),
(1812, 18, 'Tulang Bawang Barat'),
(1871, 18, 'Kota Bandar Lampung'),
(1872, 18, 'Kota Metro'),
(1901, 19, 'Bangka'),
(1902, 19, 'Belitung'),
(1903, 19, 'Bangka Barat'),
(1904, 19, 'Bangka Tengah'),
(1905, 19, 'Bangka Selatan'),
(1906, 19, 'Belitung Timur'),
(1971, 19, 'Kota Pangkal Pinang'),
(2101, 21, 'Karimun'),
(2102, 21, 'Bintan'),
(2103, 21, 'Natuna'),
(2104, 21, 'Lingga'),
(2105, 21, 'Kepulauan Anambas'),
(2171, 21, 'Kota B A T A M'),
(2172, 21, 'Kota Tanjung Pinang'),
(2222, 32, 'Negla'),
(3101, 31, 'Kepulauan Seribu'),
(3171, 31, 'Kota Jakarta Selatan'),
(3172, 31, 'Kota Jakarta Timur'),
(3173, 31, 'Kota Jakarta Pusat'),
(3174, 31, 'Kota Jakarta Barat'),
(3175, 31, 'Kota Jakarta Utara'),
(3201, 32, 'Bogor'),
(3202, 32, 'Sukabumi'),
(3203, 32, 'Cianjur'),
(3204, 32, 'Bandung'),
(3205, 32, 'Garut'),
(3206, 32, 'Tasikmalaya'),
(3207, 32, 'Ciamis'),
(3208, 32, 'Kuningan'),
(3209, 32, 'Cirebon'),
(3210, 32, 'Majalengka'),
(3211, 32, 'Sumedang'),
(3212, 32, 'Indramayu'),
(3213, 32, 'Subang'),
(3214, 32, 'Purwakarta'),
(3215, 32, 'Karawang'),
(3216, 32, 'Bekasi'),
(3217, 32, 'Bandung Barat'),
(3271, 32, 'Kota Bogor'),
(3272, 32, 'Kota Sukabumi'),
(3273, 32, 'Kota Bandung'),
(3274, 32, 'Kota Cirebon'),
(3275, 32, 'Kota Bekasi'),
(3276, 32, 'Kota Depok'),
(3277, 32, 'Kota Cimahi'),
(3278, 32, 'Kota Tasikmalaya'),
(3279, 32, 'Kota Banjar'),
(3301, 33, 'Cilacap'),
(3302, 33, 'Banyumas'),
(3303, 33, 'Purbalingga'),
(3304, 33, 'Banjarnegara'),
(3305, 33, 'Kebumen'),
(3306, 33, 'Purworejo'),
(3307, 33, 'Wonosobo'),
(3308, 33, 'Magelang'),
(3309, 33, 'Boyolali'),
(3310, 33, 'Klaten'),
(3311, 33, 'Sukoharjo'),
(3312, 33, 'Wonogiri'),
(3313, 33, 'Karanganyar'),
(3314, 33, 'Sragen'),
(3315, 33, 'Grobogan'),
(3316, 33, 'Blora'),
(3317, 33, 'Rembang'),
(3318, 33, 'Pati'),
(3319, 33, 'Kudus'),
(3320, 33, 'Jepara'),
(3321, 33, 'Demak'),
(3322, 33, 'Semarang'),
(3323, 33, 'Temanggung'),
(3324, 33, 'Kendal'),
(3325, 33, 'Batang'),
(3326, 33, 'Pekalongan'),
(3327, 33, 'Pemalang'),
(3328, 33, 'Tegal'),
(3329, 33, 'Brebes'),
(3371, 33, 'Kota Magelang'),
(3372, 33, 'Kota Surakarta'),
(3373, 33, 'Kota Salatiga'),
(3374, 33, 'Kota Semarang'),
(3375, 33, 'Kota Pekalongan'),
(3376, 33, 'Kota Tegal'),
(3401, 34, 'Kulon Progo'),
(3402, 34, 'Bantul'),
(3403, 34, 'Gunung Kidul'),
(3404, 34, 'Sleman'),
(3471, 34, 'Kota Yogyakarta'),
(3501, 35, 'Pacitan'),
(3502, 35, 'Ponorogo'),
(3503, 35, 'Trenggalek'),
(3504, 35, 'Tulungagung'),
(3505, 35, 'Blitar'),
(3506, 35, 'Kediri'),
(3507, 35, 'Malang'),
(3508, 35, 'Lumajang'),
(3509, 35, 'Jember'),
(3510, 35, 'Banyuwangi'),
(3511, 35, 'Bondowoso'),
(3512, 35, 'Situbondo'),
(3513, 35, 'Probolinggo'),
(3514, 35, 'Pasuruan'),
(3515, 35, 'Sidoarjo'),
(3516, 35, 'Mojokerto'),
(3517, 35, 'Jombang'),
(3518, 35, 'Nganjuk'),
(3519, 35, 'Madiun'),
(3520, 35, 'Magetan'),
(3521, 35, 'Ngawi'),
(3522, 35, 'Bojonegoro'),
(3523, 35, 'Tuban'),
(3524, 35, 'Lamongan'),
(3525, 35, 'Gresik'),
(3526, 35, 'Bangkalan'),
(3527, 35, 'Sampang'),
(3528, 35, 'Pamekasan'),
(3529, 35, 'Sumenep'),
(3571, 35, 'Kota Kediri'),
(3572, 35, 'Kota Blitar'),
(3573, 35, 'Kota Malang'),
(3574, 35, 'Kota Probolinggo'),
(3575, 35, 'Kota Pasuruan'),
(3576, 35, 'Kota Mojokerto'),
(3577, 35, 'Kota Madiun'),
(3578, 35, 'Kota Surabaya'),
(3579, 35, 'Kota Batu'),
(3601, 36, 'Pandeglang'),
(3602, 36, 'Lebak'),
(3603, 36, 'Tangerang'),
(3604, 36, 'Serang'),
(3671, 36, 'Kota Tangerang'),
(3672, 36, 'Kota Cilegon'),
(3673, 36, 'Kota Serang'),
(3674, 36, 'Kota Tangerang Selatan'),
(5101, 51, 'Jembrana'),
(5102, 51, 'Tabanan'),
(5103, 51, 'Badung'),
(5104, 51, 'Gianyar'),
(5105, 51, 'Klungkung'),
(5106, 51, 'Bangli'),
(5107, 51, 'Karang Asem'),
(5108, 51, 'Buleleng'),
(5171, 51, 'Kota Denpasar'),
(5201, 52, 'Lombok Barat'),
(5202, 52, 'Lombok Tengah'),
(5203, 52, 'Lombok Timur'),
(5204, 52, 'Sumbawa'),
(5205, 52, 'Dompu'),
(5206, 52, 'Bima'),
(5207, 52, 'Sumbawa Barat'),
(5208, 52, 'Lombok Utara'),
(5271, 52, 'Kota Mataram'),
(5272, 52, 'Kota Bima'),
(5301, 53, 'Sumba Barat'),
(5302, 53, 'Sumba Timur'),
(5303, 53, 'Kupang'),
(5304, 53, 'Timor Tengah Selatan'),
(5305, 53, 'Timor Tengah Utara'),
(5306, 53, 'Belu'),
(5307, 53, 'Alor'),
(5308, 53, 'Lembata'),
(5309, 53, 'Flores Timur'),
(5310, 53, 'Sikka'),
(5311, 53, 'Ende'),
(5312, 53, 'Ngada'),
(5313, 53, 'Manggarai'),
(5314, 53, 'Rote Ndao'),
(5315, 53, 'Manggarai Barat'),
(5316, 53, 'Sumba Tengah'),
(5317, 53, 'Sumba Barat Daya'),
(5318, 53, 'Nagekeo'),
(5319, 53, 'Manggarai Timur'),
(5320, 53, 'Sabu Raijua'),
(5371, 53, 'Kota Kupang'),
(6101, 61, 'Sambas'),
(6102, 61, 'Bengkayang'),
(6103, 61, 'Landak'),
(6104, 61, 'Pontianak'),
(6105, 61, 'Sanggau'),
(6106, 61, 'Ketapang'),
(6107, 61, 'Sintang'),
(6108, 61, 'Kapuas Hulu'),
(6109, 61, 'Sekadau'),
(6110, 61, 'Melawi'),
(6111, 61, 'Kayong Utara'),
(6112, 61, 'Kubu Raya'),
(6171, 61, 'Kota Pontianak'),
(6172, 61, 'Kota Singkawang'),
(6201, 62, 'Kotawaringin Barat'),
(6202, 62, 'Kotawaringin Timur'),
(6203, 62, 'Kapuas'),
(6204, 62, 'Barito Selatan'),
(6205, 62, 'Barito Utara'),
(6206, 62, 'Sukamara'),
(6207, 62, 'Lamandau'),
(6208, 62, 'Seruyan'),
(6209, 62, 'Katingan'),
(6210, 62, 'Pulang Pisau'),
(6211, 62, 'Gunung Mas'),
(6212, 62, 'Barito Timur'),
(6213, 62, 'Murung Raya'),
(6271, 62, 'Kota Palangka Raya'),
(6301, 63, 'Tanah Laut'),
(6302, 63, 'Kota Baru'),
(6303, 63, 'Banjar'),
(6304, 63, 'Barito Kuala'),
(6305, 63, 'Tapin'),
(6306, 63, 'Hulu Sungai Selatan'),
(6307, 63, 'Hulu Sungai Tengah'),
(6308, 63, 'Hulu Sungai Utara'),
(6309, 63, 'Tabalong'),
(6310, 63, 'Tanah Bumbu'),
(6311, 63, 'Balangan'),
(6371, 63, 'Kota Banjarmasin'),
(6372, 63, 'Kota Banjar Baru'),
(6401, 64, 'Paser'),
(6402, 64, 'Kutai Barat'),
(6403, 64, 'Kutai Kartanegara'),
(6404, 64, 'Kutai Timur'),
(6405, 64, 'Berau'),
(6406, 64, 'Malinau'),
(6407, 64, 'Bulungan'),
(6408, 64, 'Nunukan'),
(6409, 64, 'Penajam Paser Utara'),
(6410, 64, 'Tana Tidung'),
(6471, 64, 'Kota Balikpapan'),
(6472, 64, 'Kota Samarinda'),
(6473, 64, 'Kota Tarakan'),
(6474, 64, 'Kota Bontang'),
(7101, 71, 'Bolaang Mongondow'),
(7102, 71, 'Minahasa'),
(7103, 71, 'Kepulauan Sangihe'),
(7104, 71, 'Kepulauan Talaud'),
(7105, 71, 'Minahasa Selatan'),
(7106, 71, 'Minahasa Utara'),
(7107, 71, 'Bolaang Mongondow Utara'),
(7108, 71, 'Siau Tagulandang Biaro'),
(7109, 71, 'Minahasa Tenggara'),
(7110, 71, 'Bolaang Mongondow Selatan'),
(7111, 71, 'Bolaang Mongondow Timur'),
(7171, 71, 'Kota Manado'),
(7172, 71, 'Kota Bitung'),
(7173, 71, 'Kota Tomohon'),
(7174, 71, 'Kota Kotamobagu'),
(7201, 72, 'Banggai Kepulauan'),
(7202, 72, 'Banggai'),
(7203, 72, 'Morowali'),
(7204, 72, 'Poso'),
(7205, 72, 'Donggala'),
(7206, 72, 'Toli-Toli'),
(7207, 72, 'Buol'),
(7208, 72, 'Parigi Moutong'),
(7209, 72, 'Tojo Una-Una'),
(7210, 72, 'Sigi'),
(7271, 72, 'Kota Palu'),
(7301, 73, 'Kepulauan Selayar'),
(7302, 73, 'Bulukumba'),
(7303, 73, 'Bantaeng'),
(7304, 73, 'Jeneponto'),
(7305, 73, 'Takalar'),
(7306, 73, 'Gowa'),
(7307, 73, 'Sinjai'),
(7308, 73, 'Maros'),
(7309, 73, 'Pangkajene Dan Kepulauan'),
(7310, 73, 'Barru'),
(7311, 73, 'Bone'),
(7312, 73, 'Soppeng'),
(7313, 73, 'Wajo'),
(7314, 73, 'Sidenreng Rappang'),
(7315, 73, 'Pinrang'),
(7316, 73, 'Enrekang'),
(7317, 73, 'Luwu'),
(7318, 73, 'Tana Toraja'),
(7322, 73, 'Luwu Utara'),
(7325, 73, 'Luwu Timur'),
(7326, 73, 'Toraja Utara'),
(7371, 73, 'Kota Makassar'),
(7372, 73, 'Kota Pare-Pare'),
(7373, 73, 'Kota Palopo'),
(7401, 74, 'Buton'),
(7402, 74, 'Muna'),
(7403, 74, 'Konawe'),
(7404, 74, 'Kolaka'),
(7405, 74, 'Konawe Selatan'),
(7406, 74, 'Bombana'),
(7407, 74, 'Wakatobi'),
(7408, 74, 'Kolaka Utara'),
(7409, 74, 'Buton Utara'),
(7410, 74, 'Konawe Utara'),
(7471, 74, 'Kota Kendari'),
(7472, 74, 'Kota Baubau'),
(7501, 75, 'Boalemo'),
(7502, 75, 'Gorontalo'),
(7503, 75, 'Pohuwato'),
(7504, 75, 'Bone Bolango'),
(7505, 75, 'Gorontalo Utara'),
(7571, 75, 'Kota Gorontalo'),
(7601, 76, 'Majene'),
(7602, 76, 'Polewali Mandar'),
(7603, 76, 'Mamasa'),
(7604, 76, 'Mamuju'),
(7605, 76, 'Mamuju Utara'),
(8101, 81, 'Maluku Tenggara Barat'),
(8102, 81, 'Maluku Tenggara'),
(8103, 81, 'Maluku Tengah'),
(8104, 81, 'Buru'),
(8105, 81, 'Kepulauan Aru'),
(8106, 81, 'Seram Bagian Barat'),
(8107, 81, 'Seram Bagian Timur'),
(8108, 81, 'Maluku Barat Daya'),
(8109, 81, 'Buru Selatan'),
(8171, 81, 'Kota Ambon'),
(8172, 81, 'Kota Tual'),
(8201, 82, 'Halmahera Barat'),
(8202, 82, 'Halmahera Tengah'),
(8203, 82, 'Kepulauan Sula'),
(8204, 82, 'Halmahera Selatan'),
(8205, 82, 'Halmahera Utara'),
(8206, 82, 'Halmahera Timur'),
(8207, 82, 'Pulau Morotai'),
(8271, 82, 'Kota Ternate'),
(8272, 82, 'Kota Tidore Kepulauan'),
(9101, 91, 'Fakfak'),
(9102, 91, 'Kaimana'),
(9103, 91, 'Teluk Wondama'),
(9104, 91, 'Teluk Bintuni'),
(9105, 91, 'Manokwari'),
(9106, 91, 'Sorong Selatan'),
(9107, 91, 'Sorong'),
(9108, 91, 'Raja Ampat'),
(9109, 91, 'Tambrauw'),
(9110, 91, 'Maybrat'),
(9171, 91, 'Kota Sorong'),
(9401, 94, 'Merauke'),
(9402, 94, 'Jayawijaya'),
(9403, 94, 'Jayapura'),
(9404, 94, 'Nabire'),
(9408, 94, 'Kepulauan Yapen'),
(9409, 94, 'Biak Numfor'),
(9410, 94, 'Paniai'),
(9411, 94, 'Puncak Jaya'),
(9412, 94, 'Mimika'),
(9413, 94, 'Boven Digoel'),
(9414, 94, 'Mappi'),
(9415, 94, 'Asmat'),
(9416, 94, 'Yahukimo'),
(9417, 94, 'Pegunungan Bintang'),
(9418, 94, 'Tolikara'),
(9419, 94, 'Sarmi'),
(9420, 94, 'Keerom'),
(9426, 94, 'Waropen'),
(9427, 94, 'Supiori'),
(9428, 94, 'Mamberamo Raya'),
(9429, 94, 'Nduga'),
(9430, 94, 'Lanny Jaya'),
(9431, 94, 'Mamberamo Tengah'),
(9432, 94, 'Yalimo'),
(9433, 94, 'Puncak'),
(9434, 94, 'Dogiyai'),
(9435, 94, 'Intan Jaya'),
(9436, 94, 'Deiyai'),
(9471, 94, 'Kota Jayapura');

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan`
--

CREATE TABLE `kegiatan` (
  `id_kegiatan` int(20) NOT NULL,
  `kode_kegiatan` varchar(20) NOT NULL,
  `nama_kegiatan` varchar(200) NOT NULL,
  `tahun_anggaran` year(4) NOT NULL,
  `awal_pelaksanaan` date NOT NULL,
  `akhir_pelaksanaan` date NOT NULL,
  `jenis_kegiatan` varchar(100) NOT NULL,
  `jenis_anggaran` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `metode_pemilihan`
--

CREATE TABLE `metode_pemilihan` (
  `id_metode_pemilihan` int(20) NOT NULL,
  `kode_metode_pemilihan` varchar(20) NOT NULL,
  `keterangan` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` int(20) NOT NULL,
  `nama_pegawai` varchar(50) NOT NULL,
  `kode_pegawai` varchar(20) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `pendidikan` varchar(100) NOT NULL,
  `jenis_kelamin` varchar(50) NOT NULL,
  `id_jabatan` int(20) NOT NULL,
  `id_unit_satuan_kerja` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pengadaan`
--

CREATE TABLE `pengadaan` (
  `id_pengadaan` int(20) NOT NULL,
  `kode_pengadaan` varchar(20) NOT NULL,
  `id_jenis_belanja` int(20) NOT NULL,
  `id_kegiatan` int(20) NOT NULL,
  `id_unit_satuan_kerja` int(20) NOT NULL,
  `keterangan` text NOT NULL,
  `jumlah_pengeluaran` int(50) NOT NULL,
  `id_metode_pemilihan` int(20) NOT NULL,
  `tanggal_pengadaan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `provinsi`
--

CREATE TABLE `provinsi` (
  `id` int(2) UNSIGNED NOT NULL COMMENT 'ID',
  `nama_provinsi` varchar(255) NOT NULL DEFAULT '' COMMENT 'Nama Provinsi'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `provinsi`
--

INSERT INTO `provinsi` (`id`, `nama_provinsi`) VALUES
(51, 'Bali'),
(36, 'Banten'),
(17, 'Bengkulu'),
(34, 'DI Yogyakarta'),
(31, 'DKI Jakarta'),
(75, 'Gorontalo'),
(15, 'Jambi'),
(32, 'Jawa Barat'),
(33, 'Jawa Tengah'),
(35, 'Jawa Timur'),
(61, 'Kalimantan Barat'),
(63, 'Kalimantan Selatan'),
(62, 'Kalimantan Tengah'),
(64, 'Kalimantan Timur'),
(19, 'Kep. Bangka Belitung'),
(21, 'Kepulauan Riau'),
(18, 'Lampung'),
(81, 'Maluku'),
(82, 'Maluku Utara'),
(11, 'Nangroe Aceh Darussalam'),
(52, 'Nusa Tenggara Barat'),
(53, 'Nusa Tenggara Timur'),
(91, 'Papua'),
(94, 'Papua Barat'),
(14, 'Riau'),
(76, 'Sulawesi Barat'),
(73, 'Sulawesi Selatan'),
(72, 'Sulawesi Tengah'),
(74, 'Sulawesi Tenggara'),
(71, 'Sulawesi Utara'),
(13, 'Sumatera Barat'),
(16, 'Sumatera Selatan'),
(12, 'Sumatera Utara');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id_role` int(11) NOT NULL,
  `role_name` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id_role`, `role_name`) VALUES
(1, 'admin'),
(2, 'operator'),
(3, 'opt'),
(7, 'marketing'),
(8, 'CS'),
(9, 'mnnm');

-- --------------------------------------------------------

--
-- Table structure for table `role_feature`
--

CREATE TABLE `role_feature` (
  `id_role_feature` int(11) NOT NULL,
  `id_role` int(11) DEFAULT NULL,
  `id_feature` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role_feature`
--

INSERT INTO `role_feature` (`id_role_feature`, `id_role`, `id_feature`) VALUES
(1, 1, 7),
(3, 1, 1),
(4, 1, 2),
(5, 1, 5),
(6, 1, 6);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(100) NOT NULL,
  `id_guest_book` int(100) NOT NULL,
  `barang` varchar(500) NOT NULL,
  `jumlah` int(10) NOT NULL,
  `harga_satuan` int(10) NOT NULL,
  `harga_total` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `unit_satuan_kerja`
--

CREATE TABLE `unit_satuan_kerja` (
  `id_unit_satuan_kerja` int(20) NOT NULL,
  `kode_unit_satuan_kerja` varchar(20) NOT NULL,
  `nama_unit` varchar(200) NOT NULL,
  `lokasi` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(255) NOT NULL DEFAULT '',
  `password` varchar(255) NOT NULL DEFAULT '',
  `id_role` int(11) DEFAULT NULL,
  `id_pegawai` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `id_role`, `id_pegawai`) VALUES
(74, 'admin', '21232f297a57a5a743894a0e4a801fc3', 1, 0),
(75, 'customerservice', '2995cc7d3abbc615a9203427f9b2cf33', 8, 0),
(76, 'admin', '8a30ec6807f71bc69d096d8e4d501ade', 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id_event`);

--
-- Indexes for table `feature`
--
ALTER TABLE `feature`
  ADD PRIMARY KEY (`id_feature`);

--
-- Indexes for table `file`
--
ALTER TABLE `file`
  ADD PRIMARY KEY (`id_file`),
  ADD KEY `FK_event_file` (`id_event`);

--
-- Indexes for table `guest_book`
--
ALTER TABLE `guest_book`
  ADD PRIMARY KEY (`id_guest_book`),
  ADD KEY `FK_kota` (`city`),
  ADD KEY `FK_provinsi` (`provinsi`),
  ADD KEY `FK_event` (`id_event`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id_jabatan`),
  ADD KEY `id_jabatan` (`id_jabatan`);

--
-- Indexes for table `jenis_belanja`
--
ALTER TABLE `jenis_belanja`
  ADD PRIMARY KEY (`id_jenis_belanja`),
  ADD KEY `id_jenis_belanja` (`id_jenis_belanja`);

--
-- Indexes for table `kabupaten`
--
ALTER TABLE `kabupaten`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nama` (`nama_kabupaten`),
  ADD KEY `FK_kabupaten_propinsi` (`provinsi_id`);

--
-- Indexes for table `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD PRIMARY KEY (`id_kegiatan`),
  ADD KEY `id_kegiatan` (`id_kegiatan`);

--
-- Indexes for table `metode_pemilihan`
--
ALTER TABLE `metode_pemilihan`
  ADD PRIMARY KEY (`id_metode_pemilihan`),
  ADD KEY `id_metode_pemilihan` (`id_metode_pemilihan`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`),
  ADD UNIQUE KEY `id_pegawai` (`id_pegawai`),
  ADD KEY `id_unit_satuan_kerja` (`id_unit_satuan_kerja`),
  ADD KEY `id_jabatan` (`id_jabatan`),
  ADD KEY `id_pegawai_2` (`id_pegawai`),
  ADD KEY `id_pegawai_3` (`id_pegawai`);

--
-- Indexes for table `pengadaan`
--
ALTER TABLE `pengadaan`
  ADD PRIMARY KEY (`id_pengadaan`),
  ADD KEY `id_unit_satuan_kerja` (`id_unit_satuan_kerja`),
  ADD KEY `id_metode_pemilihan` (`id_metode_pemilihan`),
  ADD KEY `id_kegiatan` (`id_kegiatan`),
  ADD KEY `id_jenis_belanja` (`id_jenis_belanja`);

--
-- Indexes for table `provinsi`
--
ALTER TABLE `provinsi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nama` (`nama_provinsi`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `role_feature`
--
ALTER TABLE `role_feature`
  ADD PRIMARY KEY (`id_role_feature`),
  ADD KEY `FK_role_feature` (`id_role`),
  ADD KEY `FK_feature` (`id_feature`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_guest_book` (`id_guest_book`);

--
-- Indexes for table `unit_satuan_kerja`
--
ALTER TABLE `unit_satuan_kerja`
  ADD PRIMARY KEY (`id_unit_satuan_kerja`),
  ADD KEY `id_unit_satuan_kerja` (`id_unit_satuan_kerja`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `FK_role` (`id_role`),
  ADD KEY `id_pegawai` (`id_pegawai`),
  ADD KEY `id_pegawai_2` (`id_pegawai`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id_event` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `feature`
--
ALTER TABLE `feature`
  MODIFY `id_feature` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `file`
--
ALTER TABLE `file`
  MODIFY `id_file` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `guest_book`
--
ALTER TABLE `guest_book`
  MODIFY `id_guest_book` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id_jabatan` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `jenis_belanja`
--
ALTER TABLE `jenis_belanja`
  MODIFY `id_jenis_belanja` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `kegiatan`
--
ALTER TABLE `kegiatan`
  MODIFY `id_kegiatan` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `metode_pemilihan`
--
ALTER TABLE `metode_pemilihan`
  MODIFY `id_metode_pemilihan` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_pegawai` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pengadaan`
--
ALTER TABLE `pengadaan`
  MODIFY `id_pengadaan` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `role_feature`
--
ALTER TABLE `role_feature`
  MODIFY `id_role_feature` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(100) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `unit_satuan_kerja`
--
ALTER TABLE `unit_satuan_kerja`
  MODIFY `id_unit_satuan_kerja` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `file`
--
ALTER TABLE `file`
  ADD CONSTRAINT `FK_event_file` FOREIGN KEY (`id_event`) REFERENCES `event` (`id_event`) ON DELETE CASCADE;

--
-- Constraints for table `guest_book`
--
ALTER TABLE `guest_book`
  ADD CONSTRAINT `FK_event` FOREIGN KEY (`id_event`) REFERENCES `event` (`id_event`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_kota` FOREIGN KEY (`city`) REFERENCES `kabupaten` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_provinsi` FOREIGN KEY (`provinsi`) REFERENCES `provinsi` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `kabupaten`
--
ALTER TABLE `kabupaten`
  ADD CONSTRAINT `FK_kabupaten_provinsi` FOREIGN KEY (`provinsi_id`) REFERENCES `provinsi` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD CONSTRAINT `pegawai_ibfk_1` FOREIGN KEY (`id_unit_satuan_kerja`) REFERENCES `unit_satuan_kerja` (`id_unit_satuan_kerja`),
  ADD CONSTRAINT `pegawai_ibfk_2` FOREIGN KEY (`id_jabatan`) REFERENCES `jabatan` (`id_jabatan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pengadaan`
--
ALTER TABLE `pengadaan`
  ADD CONSTRAINT `pengadaan_ibfk_1` FOREIGN KEY (`id_metode_pemilihan`) REFERENCES `metode_pemilihan` (`id_metode_pemilihan`),
  ADD CONSTRAINT `pengadaan_ibfk_2` FOREIGN KEY (`id_jenis_belanja`) REFERENCES `jenis_belanja` (`id_jenis_belanja`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pengadaan_ibfk_3` FOREIGN KEY (`id_kegiatan`) REFERENCES `kegiatan` (`id_kegiatan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pengadaan_ibfk_4` FOREIGN KEY (`id_unit_satuan_kerja`) REFERENCES `unit_satuan_kerja` (`id_unit_satuan_kerja`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `role_feature`
--
ALTER TABLE `role_feature`
  ADD CONSTRAINT `FK_feature` FOREIGN KEY (`id_feature`) REFERENCES `feature` (`id_feature`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_role_feature` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`) ON DELETE CASCADE;

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_guest_book`) REFERENCES `guest_book` (`id_guest_book`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `FK_role` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
