-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Waktu pembuatan: 28. Juli 2013 jam 13:19
-- Versi Server: 5.1.44
-- Versi PHP: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_wisata`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `captcha`
--

CREATE TABLE IF NOT EXISTS `captcha` (
  `captcha_id` bigint(13) unsigned NOT NULL AUTO_INCREMENT,
  `captcha_time` int(10) unsigned NOT NULL,
  `word` varchar(20) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`captcha_id`),
  KEY `word` (`word`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=135 ;

--
-- Dumping data untuk tabel `captcha`
--

INSERT INTO `captcha` (`captcha_id`, `captcha_time`, `word`) VALUES
(134, 1375017151, 'INFRN');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dlmbg_album`
--

CREATE TABLE IF NOT EXISTS `dlmbg_album` (
  `id_album` int(5) NOT NULL AUTO_INCREMENT,
  `album` varchar(100) NOT NULL,
  PRIMARY KEY (`id_album`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data untuk tabel `dlmbg_album`
--

INSERT INTO `dlmbg_album` (`id_album`, `album`) VALUES
(2, 'Kenangan Bersamamu'),
(3, 'Kenangan Bersamamu'),
(4, 'Kenangan Bersamamu'),
(5, 'Kenangan Bersamamu'),
(6, 'Kenangan Bersamamu'),
(7, 'Kenangan Bersamamu'),
(8, 'Kenangan Bersamamu'),
(9, 'Kenangan Bersamamu'),
(10, 'Kenangan Bersamamu'),
(11, 'Kenangan Bersamamuu'),
(12, 'Kenangan Bersamamu'),
(13, 'Kenangan Bersamamu'),
(14, 'Kenangan Bersamamu'),
(15, 'Kenangan Bersamamu');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dlmbg_berita`
--

CREATE TABLE IF NOT EXISTS `dlmbg_berita` (
  `id_berita` int(5) NOT NULL AUTO_INCREMENT,
  `judul` varchar(150) NOT NULL,
  `isi` text NOT NULL,
  PRIMARY KEY (`id_berita`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `dlmbg_berita`
--

INSERT INTO `dlmbg_berita` (`id_berita`, `judul`, `isi`) VALUES
(2, 'AMD Umuman APU E-Series Terbaru', 'di sini ane cuma mo pamer ato lagakin hasil karya ane aje hehehehe \r\nyaitu parodinye The Avengers, ane namain The Kaskusers, charnya ane ambil dari hero2 di sono trus ane kombinasiin ama smiley kaskus kita tercinta ini '),
(3, 'Hadir di Indonesia, Xbox 360 Slim Dibanderol Rp 3,4 Juta', 'di sini ane cuma mo pamer ato lagakin hasil karya ane aje hehehehe \r\nyaitu parodinye The Avengers, ane namain The Kaskusers, charnya ane ambil dari hero2 di sono trus ane kombinasiin ama smiley kaskus kita tercinta ini ');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dlmbg_biro_wisata`
--

CREATE TABLE IF NOT EXISTS `dlmbg_biro_wisata` (
  `id_biro` int(5) NOT NULL AUTO_INCREMENT,
  `nama_biro` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `telepon` varchar(30) NOT NULL,
  PRIMARY KEY (`id_biro`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data untuk tabel `dlmbg_biro_wisata`
--

INSERT INTO `dlmbg_biro_wisata` (`id_biro`, `nama_biro`, `alamat`, `telepon`) VALUES
(1, 'Cipaganti Travell', 'Banyuwangi', '0333419185'),
(2, 'Cipaganti Travel', 'Banyuwangi', '0333419185'),
(3, 'Cipaganti Travel', 'Banyuwangi', '0333419185'),
(4, 'Cipaganti Travel', 'Banyuwangi', '0333419185'),
(5, 'Cipaganti Travel', 'Banyuwangi', '0333419185'),
(6, 'Cipaganti Travel', 'Banyuwangi', '0333419185'),
(7, 'Cipaganti Travel', 'Banyuwangi', '0333419185'),
(8, 'Cipaganti Travel', 'Banyuwangi', '0333419185');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dlmbg_buku_tamu`
--

CREATE TABLE IF NOT EXISTS `dlmbg_buku_tamu` (
  `id_buku_tamu` int(5) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `jk` varchar(20) NOT NULL,
  `asal` varchar(150) NOT NULL,
  `tanggal` varchar(50) NOT NULL,
  `pesan` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `stts` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_buku_tamu`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `dlmbg_buku_tamu`
--

INSERT INTO `dlmbg_buku_tamu` (`id_buku_tamu`, `nama`, `jk`, `asal`, `tanggal`, `pesan`, `email`, `stts`) VALUES
(2, 'Adi Januardi', 'Pria', 'bali', '2013-06-08 05:45:37', 'ffff', 'go_blind_32@yahoo.com', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `dlmbg_contact`
--

CREATE TABLE IF NOT EXISTS `dlmbg_contact` (
  `id_contact` int(10) NOT NULL AUTO_INCREMENT,
  `nama` varchar(150) NOT NULL,
  `email` varchar(100) NOT NULL,
  `asal` varchar(150) NOT NULL,
  `no_telpon` varchar(100) NOT NULL,
  `pesan` text NOT NULL,
  PRIMARY KEY (`id_contact`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `dlmbg_contact`
--

INSERT INTO `dlmbg_contact` (`id_contact`, `nama`, `email`, `asal`, `no_telpon`, `pesan`) VALUES
(3, 'as', 'dd', 'dd', 'dd', 'd');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dlmbg_galeri`
--

CREATE TABLE IF NOT EXISTS `dlmbg_galeri` (
  `id_galeri` int(5) NOT NULL AUTO_INCREMENT,
  `id_album` int(5) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  PRIMARY KEY (`id_galeri`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data untuk tabel `dlmbg_galeri`
--

INSERT INTO `dlmbg_galeri` (`id_galeri`, `id_album`, `judul`, `gambar`) VALUES
(4, 2, 'AMD Umuman APU E-Series Terbaru', '1bc152d42b750dbc40bba0033effb91b.JPG'),
(5, 2, 'Desain Web Tutorial : Contoh Desain Web Portal Berita / Magazine News Dengan HTML+CSS+JS – Red Ray', '2ad85b22ca70e9ddce072b03f3785128.jpg'),
(6, 2, 'fdfd', 'c95adc7d97d5e5c3c90bd7a93ff8fe68.jpg'),
(7, 2, 'dsds', '0faacbc44179b29ab14c63fcee428743.JPG'),
(8, 2, 'dsds', 'd17560ffe35524b2c45add55f9c48eb7.JPG'),
(9, 2, 'dsds', '22688dab4383484784343cc22a6cb95b.JPG');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dlmbg_hotel`
--

CREATE TABLE IF NOT EXISTS `dlmbg_hotel` (
  `id_hotel` int(5) NOT NULL AUTO_INCREMENT,
  `nama_hotel` varchar(100) NOT NULL,
  `telepon` varchar(20) NOT NULL,
  `jml_kamar` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `keterangan` text NOT NULL,
  PRIMARY KEY (`id_hotel`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data untuk tabel `dlmbg_hotel`
--

INSERT INTO `dlmbg_hotel` (`id_hotel`, `nama_hotel`, `telepon`, `jml_kamar`, `alamat`, `keterangan`) VALUES
(1, '0', '0333419185', '0', 'Banyuwangi', '<p><img alt="" style="width: 160px; height: 213px;" src="/ci-wisata/asset/ckeditor/kcfinder/upload/images/1043936_3200470308452_504114592_n.jpg" />ds</p>'),
(2, 'Hotel Karawang', '0333419185', '5', 'Bandung', '<p><img alt="" style="width: 160px; height: 213px;" src="/ci-wisata/asset/ckeditor/kcfinder/upload/images/1043936_3200470308452_504114592_n.jpg" /></p>'),
(3, 'Hotel Mirah', '', '', '', ''),
(4, 'Hotel Banyuwangi BEach', '', '', '', ''),
(5, 'Hotel Berlian Abadi', '', '', '', ''),
(6, 'Hotel Ketapang Indah', '0333419185', '10', 'Bali', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dlmbg_instansi`
--

CREATE TABLE IF NOT EXISTS `dlmbg_instansi` (
  `id_instansi` int(5) NOT NULL AUTO_INCREMENT,
  `nama_instansi` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `keterangan` text NOT NULL,
  PRIMARY KEY (`id_instansi`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data untuk tabel `dlmbg_instansi`
--

INSERT INTO `dlmbg_instansi` (`id_instansi`, `nama_instansi`, `alamat`, `keterangan`) VALUES
(2, 'Bapeda Kab', 'Jln. Dewi Madri', 'Khusus penangan potensi daerah'),
(3, 'Bapeda Kab', 'Jln. Dewi Madri', 'Khusus penangan potensi daerah'),
(4, 'Bapeda Kab', 'Jln. Dewi Madri', 'Khusus penangan potensi daerah'),
(5, 'Bapeda Kab', 'Jln. Dewi Madri', 'Khusus penangan potensi daerah'),
(6, 'Bapeda Kab', 'Jln. Dewi Madri', 'Khusus penangan potensi daerah');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dlmbg_jawaban_polling`
--

CREATE TABLE IF NOT EXISTS `dlmbg_jawaban_polling` (
  `id_jawaban_polling` int(5) NOT NULL AUTO_INCREMENT,
  `id_polling` int(5) NOT NULL,
  `jawaban_polling` varchar(100) NOT NULL,
  `hit` int(5) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_jawaban_polling`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data untuk tabel `dlmbg_jawaban_polling`
--

INSERT INTO `dlmbg_jawaban_polling` (`id_jawaban_polling`, `id_polling`, `jawaban_polling`, `hit`) VALUES
(1, 1, 'Pariwisata Daerahh', 23),
(2, 1, 'Wisata Kuliner', 51),
(3, 1, 'Kesehatan', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `dlmbg_kategori`
--

CREATE TABLE IF NOT EXISTS `dlmbg_kategori` (
  `id_kategori` binary(24) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dlmbg_kategori`
--

INSERT INTO `dlmbg_kategori` (`id_kategori`, `nama_kategori`) VALUES
('74f020e2c84511e2910c7c10', 'Pendidikannn'),
('78520098c84511e2910c7c10', 'Cuap-Cuap'),
('bb782b26f76711e2879d54e3', 'sdsds');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dlmbg_kecamatan`
--

CREATE TABLE IF NOT EXISTS `dlmbg_kecamatan` (
  `id_kecamatan` int(10) NOT NULL AUTO_INCREMENT,
  `nama_kecamatan` varchar(100) NOT NULL,
  PRIMARY KEY (`id_kecamatan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data untuk tabel `dlmbg_kecamatan`
--

INSERT INTO `dlmbg_kecamatan` (`id_kecamatan`, `nama_kecamatan`) VALUES
(2, 'Titehena'),
(3, 'Ilebura'),
(4, 'Tanjung Bunga'),
(5, 'Lewolema'),
(6, 'Larantuka'),
(7, 'Ile Mandiri'),
(8, 'Demon Pagong'),
(9, 'Solor Barat'),
(10, 'Solor Timur'),
(11, 'Adonara Baratttt'),
(12, 'Wotanulumado'),
(13, 'Adonara Tengah'),
(14, 'Adonara Timur'),
(15, 'Ile Boleng'),
(16, 'Witihama'),
(17, 'Kelubagolit'),
(18, 'Adonara'),
(19, 'dddd');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dlmbg_kelurahan`
--

CREATE TABLE IF NOT EXISTS `dlmbg_kelurahan` (
  `id_kelurahan` int(5) NOT NULL AUTO_INCREMENT,
  `id_kecamatan` int(5) NOT NULL,
  `kelurahan` varchar(100) NOT NULL,
  PRIMARY KEY (`id_kelurahan`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `dlmbg_kelurahan`
--

INSERT INTO `dlmbg_kelurahan` (`id_kelurahan`, `id_kecamatan`, `kelurahan`) VALUES
(1, 3, 'Sumerta Kelod');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dlmbg_kunjungan`
--

CREATE TABLE IF NOT EXISTS `dlmbg_kunjungan` (
  `id_kunjungan` int(5) NOT NULL AUTO_INCREMENT,
  `id_hotel` int(5) NOT NULL,
  `tanggal` varchar(50) NOT NULL,
  `asal` varchar(50) NOT NULL,
  `jk` varchar(20) NOT NULL,
  `total` varchar(20) NOT NULL,
  `lama_inap` varchar(20) NOT NULL,
  PRIMARY KEY (`id_kunjungan`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data untuk tabel `dlmbg_kunjungan`
--

INSERT INTO `dlmbg_kunjungan` (`id_kunjungan`, `id_hotel`, `tanggal`, `asal`, `jk`, `total`, `lama_inap`) VALUES
(4, 4, '2013-06-01', 'bali', 'Pria', '10', '10'),
(2, 3, '2013-06-15', 'Bandung', 'Wanita', '5', '2'),
(3, 2, '05-05-2013', 'Denpasar', 'Pria', '5', '4');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dlmbg_makanan`
--

CREATE TABLE IF NOT EXISTS `dlmbg_makanan` (
  `id_makanan` int(5) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `keterangan` text NOT NULL,
  PRIMARY KEY (`id_makanan`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data untuk tabel `dlmbg_makanan`
--

INSERT INTO `dlmbg_makanan` (`id_makanan`, `nama`, `keterangan`) VALUES
(1, 'Onde-Ondee', '<p>Rasanya enak, dengan lapisan wijen<img alt="" style="width: 160px; height: 213px;" src="/ci-wisata/asset/ckeditor/kcfinder/upload/images/1043936_3200470308452_504114592_n.jpg" /></p>'),
(2, 'Onde-Onde', 'Rasanya enak, dengan lapisan wijen'),
(3, 'Onde-Onde', 'Rasanya enak, dengan lapisan wijen'),
(4, 'Onde-Onde', 'Rasanya enak, dengan lapisan wijen'),
(5, 'Onde-Onde', 'Rasanya enak, dengan lapisan wijen'),
(6, 'Onde-Onde', 'Rasanya enak, dengan lapisan wijen'),
(7, 'Onde-Onde', 'Rasanya enak, dengan lapisan wijen'),
(8, 'Onde-Onde', 'Rasanya enak, dengan lapisan wijen'),
(9, 'Onde-Onde', 'Rasanya enak, dengan lapisan wijen');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dlmbg_menu`
--

CREATE TABLE IF NOT EXISTS `dlmbg_menu` (
  `id_menu` int(5) NOT NULL AUTO_INCREMENT,
  `id_parent` int(5) NOT NULL DEFAULT '0',
  `menu` varchar(50) NOT NULL,
  `url_route` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `jenis` varchar(20) NOT NULL,
  PRIMARY KEY (`id_menu`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data untuk tabel `dlmbg_menu`
--

INSERT INTO `dlmbg_menu` (`id_menu`, `id_parent`, `menu`, `url_route`, `content`, `jenis`) VALUES
(1, 0, 'Home', 'web', '', 'menu'),
(2, 0, 'Peta', 'web/peta', '', 'menu'),
(3, 0, 'Kategori', '', '', 'menu'),
(4, 0, 'Fasilitas', '', '', 'menu'),
(5, 0, 'Transportasi', 'web/transportasi', '', 'menu'),
(6, 0, 'Galeri', 'web/galeri', '', 'menu'),
(7, 0, 'Buku Tamu', 'web/buku_tamu', '', 'menu'),
(8, 0, 'Forum', 'forum', '', 'menu'),
(9, 0, 'Log In', 'login', '', 'menu'),
(10, 0, 'Contact', 'web/contact', '', 'menu'),
(11, 3, 'Wisata Religi', 'web/wisata/set/religi', '', 'menu'),
(12, 3, 'Wisata Alam', 'web/wisata/set/alam', '', 'menu'),
(13, 3, 'Wisata Budaya', 'web/wisata/set/budaya', '', 'menu'),
(14, 3, 'Wisata Sejarah', 'web/wisata/set/sejarah', '', 'menu'),
(15, 3, 'Wisata Agro', 'web/wisata/set/agro', '', 'menu'),
(16, 4, 'Hotel', 'web/hotel', '', 'menu'),
(17, 4, 'Restoran', 'web/restoran', '', 'menu'),
(18, 4, 'Makanan Khas', 'web/makanan', '', 'menu'),
(19, 4, 'Sanggar Seni Budaya', 'web/sanggar', '', 'menu'),
(20, 4, 'Toko Cenderamata', 'web/toko', '', 'menu'),
(21, 4, 'Biro Perjalanan', 'web/biro', '', 'menu'),
(22, 4, 'Instansi Penunjang Wisata', 'web/instansi', '', 'menu'),
(23, 0, 'Berita', 'web/berita', '', 'menu'),
(24, 0, 'Pengumuman', 'web/pengumuman', '', 'menu'),
(25, 0, 'Profil', '', '', 'menu'),
(26, 8, 'New Thread', 'forum/post_new', '', 'menu'),
(27, 8, 'Sub Forum', 'forum', '', 'menu');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dlmbg_objek_wisata`
--

CREATE TABLE IF NOT EXISTS `dlmbg_objek_wisata` (
  `id_objek_wisata` int(5) NOT NULL AUTO_INCREMENT,
  `id_kelurahan` int(5) NOT NULL,
  `nama_objek_wisata` varchar(100) NOT NULL,
  `jenis` varchar(30) NOT NULL,
  `alamat` text NOT NULL,
  `koordinat` varchar(100) NOT NULL,
  `keterangan` text NOT NULL,
  PRIMARY KEY (`id_objek_wisata`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data untuk tabel `dlmbg_objek_wisata`
--

INSERT INTO `dlmbg_objek_wisata` (`id_objek_wisata`, `id_kelurahan`, `nama_objek_wisata`, `jenis`, `alamat`, `koordinat`, `keterangan`) VALUES
(9, 1, 'fdfdf', 'religi', '<p>fdfdfd</p>', '567,344,570,355,577,350,567,347', '<p><img alt="" style="width: 160px; height: 213px;" src="/ci-wisata/asset/ckeditor/kcfinder/upload/images/1043936_3200470308452_504114592_n.jpg" /></p>');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dlmbg_pengumuman`
--

CREATE TABLE IF NOT EXISTS `dlmbg_pengumuman` (
  `id_pengumuman` int(5) NOT NULL AUTO_INCREMENT,
  `judul` varchar(150) NOT NULL,
  `isi` text NOT NULL,
  PRIMARY KEY (`id_pengumuman`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=610 ;

--
-- Dumping data untuk tabel `dlmbg_pengumuman`
--

INSERT INTO `dlmbg_pengumuman` (`id_pengumuman`, `judul`, `isi`) VALUES
(1, 'Hadir di Indonesia, Xbox 360 Slim Dibanderol Rp 3,4 Juta', '<p>ddd</p>'),
(2, 'AMD Umuman APU E-Series Terbaru', ''),
(3, 'Hadir di Indonesia, Xbox 360 Slim Dibanderol Rp 3,4 Juta', ''),
(609, 'gf', '<p>fff</p>');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dlmbg_peta_online`
--

CREATE TABLE IF NOT EXISTS `dlmbg_peta_online` (
  `id_peta_online` int(10) NOT NULL AUTO_INCREMENT,
  `id_kelurahan` int(10) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `jenis` varchar(100) NOT NULL,
  `keterangan` text NOT NULL,
  `lat` double NOT NULL,
  `lang` double NOT NULL,
  PRIMARY KEY (`id_peta_online`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data untuk tabel `dlmbg_peta_online`
--

INSERT INTO `dlmbg_peta_online` (`id_peta_online`, `id_kelurahan`, `judul`, `jenis`, `keterangan`, `lat`, `lang`) VALUES
(17, 1, 'fffffddddddd', 'Kawasan Bencana', 'ffffd', -6.25045901739336, 106.337871551514),
(16, 1, 'Naskeleng', 'Sarana Kesehatan', 'bbbb', -6.25122690101504, 106.338129043579);

-- --------------------------------------------------------

--
-- Struktur dari tabel `dlmbg_polling`
--

CREATE TABLE IF NOT EXISTS `dlmbg_polling` (
  `id_polling` int(5) NOT NULL AUTO_INCREMENT,
  `soal` varchar(150) NOT NULL,
  `aktif` int(1) NOT NULL,
  PRIMARY KEY (`id_polling`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `dlmbg_polling`
--

INSERT INTO `dlmbg_polling` (`id_polling`, `soal`, `aktif`) VALUES
(1, 'Menurut anda, rubrik atau kategori apa yang perlu ditambahkan di Harian Banyuwangi?', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `dlmbg_reply_forum`
--

CREATE TABLE IF NOT EXISTS `dlmbg_reply_forum` (
  `id_reply_forum` binary(24) NOT NULL,
  `id_anggota` binary(24) NOT NULL,
  `id_forum` varchar(36) NOT NULL,
  `judul` varchar(200) NOT NULL,
  `isi` text NOT NULL,
  `tanggal` date NOT NULL,
  `waktu` time NOT NULL,
  PRIMARY KEY (`id_reply_forum`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dlmbg_reply_forum`
--

INSERT INTO `dlmbg_reply_forum` (`id_reply_forum`, `id_anggota`, `id_forum`, `judul`, `isi`, `tanggal`, `waktu`) VALUES
('68ef8e46d6e011e2a5a5d0f3', '5e7b22acc62a11e291df14da', '558211bac94f11e2910c7c10da17e330', 'fff', '<p>fff</p>', '2013-06-17', '08:56:49'),
('6e832e12d6e011e2a5a5d0f3', '5e7b22acc62a11e291df14da', '558211bac94f11e2910c7c10da17e330', 'fdfdf', '<p>fdfdf</p>', '2013-06-17', '08:56:58'),
('c63e9992cc3711e29a37a2f2', '5e7b22acc62a11e291df14da', '558211bac94f11e2910c7c10da17e330', '-', '<p>gileeee lu ndro</p><p>naskeleng</p>', '2013-06-03', '19:24:29'),
('fd53c878cbbd11e29a37a2f2', 'a41faba8c93a11e2910c7c10', '02622e06c95011e2910c7c10da17e330', 'd', '<p>jancuk</p>', '2013-06-03', '04:52:43');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dlmbg_restoran`
--

CREATE TABLE IF NOT EXISTS `dlmbg_restoran` (
  `id_restoran` int(5) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  PRIMARY KEY (`id_restoran`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data untuk tabel `dlmbg_restoran`
--

INSERT INTO `dlmbg_restoran` (`id_restoran`, `nama`, `alamat`) VALUES
(1, 'Padis Resort', 'Banyuwangi'),
(2, 'Padis Resort', 'Banyuwangi'),
(3, 'Padis Resort', 'Banyuwangi'),
(4, 'Padis Resort', 'Banyuwangi'),
(5, 'Padis Resort', 'Banyuwangi'),
(6, 'Padis Resortt', '<p>Banyuwangi</p>'),
(7, 'Padis Resort', 'Banyuwangi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dlmbg_sanggar`
--

CREATE TABLE IF NOT EXISTS `dlmbg_sanggar` (
  `id_sanggar` int(5) NOT NULL AUTO_INCREMENT,
  `id_kelurahan` int(5) NOT NULL,
  `nama_sanggar` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `keterangan` text NOT NULL,
  PRIMARY KEY (`id_sanggar`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data untuk tabel `dlmbg_sanggar`
--

INSERT INTO `dlmbg_sanggar` (`id_sanggar`, `id_kelurahan`, `nama_sanggar`, `alamat`, `keterangan`) VALUES
(1, 1, 'Sayu Wiwittt', '<p>Banyuwangi</p>', '<p>Sanggar Tari dan Budaya</p>'),
(2, 1, 'Sayu Wiwit', 'Banyuwangi', 'Sanggar Tari dan Budaya'),
(3, 1, 'Sayu Wiwit', 'Banyuwangi', 'Sanggar Tari dan Budaya'),
(4, 1, 'Sayu Wiwit', 'Banyuwangi', 'Sanggar Tari dan Budaya'),
(5, 1, 'Sayu Wiwit', 'Banyuwangi', 'Sanggar Tari dan Budaya'),
(6, 1, 'Sayu Wiwit', 'Banyuwangi', 'Sanggar Tari dan Budaya'),
(7, 1, 'Sayu Wiwit', 'Banyuwangi', 'Sanggar Tari dan Budaya');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dlmbg_setting`
--

CREATE TABLE IF NOT EXISTS `dlmbg_setting` (
  `id_setting` int(10) NOT NULL AUTO_INCREMENT,
  `tipe` varchar(50) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content_setting` text NOT NULL,
  PRIMARY KEY (`id_setting`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data untuk tabel `dlmbg_setting`
--

INSERT INTO `dlmbg_setting` (`id_setting`, `tipe`, `title`, `content_setting`) VALUES
(1, 'site_title', 'Nama Situs', 'Website Pariwisata Kabupaten Flores'),
(2, 'site_footer', 'Teks Footer', '<p>Copyright &copy; 2013 Website Pariwisata Kabupaten Flores</p><p>Designed &amp; Developed by Gede Lumbung - http://gedelumbung.com</p>'),
(3, 'site_quotes', 'Quotes Situs', 'Website Pariwisata Kabupaten Flores - Health for Nation'),
(4, 'site_theme', 'Nama Tampilan', 'red-maroon'),
(5, 'key_login', 'Key Hash Login', 'AppWisata'),
(6, 'site_limit_small', 'Limit Data Kecil', '5'),
(7, 'site_limit_medium', 'Limit Data Medium', '12'),
(8, 'site_welcome', 'Kata Sambutan', '<p><strong>Assalamualaikum Wr. Wb. </strong><br /><br />Selamat datang di Website Dinas Perhubungan, Komunikasi dan Informatika Kota Pekanbaru, Website ini dimaksudkan sebagai sarana publikasi untuk memberikan Informasi dan gambaran Dinas Perhubungan, Komunikasi dan Informatika Kota Pekanbaru dalam melaksanakan pelayanan perhubungan. Melalui keberadaan website ini kiranya masyarakat dapat mengetahui seluruh informasi tentang Kebijakan Pemerintah Kota Pekanbaru didalam pengelolaan sektor transportasi dan telekomunikasi di wilayah Kotamadya Pekanbaru.</p><p>Kritik dan saran terhadap kekurangan dan kesalahan yang ada sangat kami harapkan guna penyempurnaan Website ini dimasa datang. Semoga Website ini memberikan manfaat bagi kita semua.<br /><br />Terima kasih.<br /><br /><strong>S. SAYUTI</strong><br />Kepala Dinas Perhubungan, Komunikasi dan Informatika Kota Pekanbaru</p>');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dlmbg_thread_forum`
--

CREATE TABLE IF NOT EXISTS `dlmbg_thread_forum` (
  `id_forum` varchar(36) NOT NULL,
  `id_kategori` binary(24) NOT NULL,
  `id_anggota` binary(24) NOT NULL,
  `judul` text NOT NULL,
  `isi` longtext NOT NULL,
  `post_date` datetime NOT NULL,
  `last_date` datetime NOT NULL,
  `hitung` int(10) NOT NULL,
  PRIMARY KEY (`id_forum`),
  FULLTEXT KEY `judul` (`judul`,`isi`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dlmbg_thread_forum`
--

INSERT INTO `dlmbg_thread_forum` (`id_forum`, `id_kategori`, `id_anggota`, `judul`, `isi`, `post_date`, `last_date`, `hitung`) VALUES
('558211bac94f11e2910c7c10da17e330', '74f020e2c84511e2910c7c10', 'a41faba8c93a11e2910c7c10', 'Resep Jomblo Biar Awet Muda - The Power of ngeFap', '<p>anda jomblo??</p><p>pengen awet muda??</p><p>coba ngeFap, banyak teman saya yang jomblo, setelah ngeFap, merek awet muda</p><p>Sudah terbukti oleh teman saya, tapi saya belum coba</p><p>kapan-kapan aja #halah</p>', '2013-05-31 02:35:34', '2013-06-17 08:56:58', 62),
('02622e06c95011e2910c7c10da17e330', '78520098c84511e2910c7c10', 'a41faba8c93a11e2910c7c10', 'AMD Umuman APU E-Series Terbaruuu', '<p>asleole</p>', '2013-05-31 02:40:24', '2013-05-31 02:40:24', 4),
('81897bb2d6cf11e2a5a5d0f354c7e93a', '74f020e2c84511e2910c7c10', '5e7b22acc62a11e291df14da', 'aselole', '<p>tes</p>', '2013-06-17 06:55:49', '2013-06-17 06:55:49', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `dlmbg_toko_cinderamata`
--

CREATE TABLE IF NOT EXISTS `dlmbg_toko_cinderamata` (
  `id_toko` int(5) NOT NULL AUTO_INCREMENT,
  `nama_toko` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `keterangan` text NOT NULL,
  PRIMARY KEY (`id_toko`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data untuk tabel `dlmbg_toko_cinderamata`
--

INSERT INTO `dlmbg_toko_cinderamata` (`id_toko`, `nama_toko`, `alamat`, `keterangan`) VALUES
(2, 'Krisna Oleh-Oleh Bali', 'Jln. Nusa Indah', 'Mantap dan keren'),
(3, 'Krisna Oleh-Oleh Bali', 'Jln. Nusa Indah', 'Mantap dan keren'),
(4, 'Krisna Oleh-Oleh Bali', 'Jln. Nusa Indah', 'Mantap dan keren'),
(5, 'Krisna Oleh-Oleh Bali', 'Jln. Nusa Indah', 'Mantap dan keren'),
(6, 'Krisna Oleh-Oleh Bali', 'Jln. Nusa Indah', 'Mantap dan keren'),
(7, 'Krisna Oleh-Oleh Bali', 'Jln. Nusa Indah', 'Mantap dan keren');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dlmbg_transportasi`
--

CREATE TABLE IF NOT EXISTS `dlmbg_transportasi` (
  `id_transportasi` int(5) NOT NULL AUTO_INCREMENT,
  `jenis` varchar(50) NOT NULL,
  `tujuan` text NOT NULL,
  `jam_berangkat` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  PRIMARY KEY (`id_transportasi`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data untuk tabel `dlmbg_transportasi`
--

INSERT INTO `dlmbg_transportasi` (`id_transportasi`, `jenis`, `tujuan`, `jam_berangkat`, `alamat`) VALUES
(2, 'Travel', 'Denpasar - Surabaya', '17.00 WITA', 'Jln. Dewi Madri'),
(3, 'Travel', 'Denpasar - Surabaya', '17.00 WITA', 'Jln. Dewi Madri'),
(4, 'Travel', 'Denpasar - Surabaya', '17.00 WITA', 'Jln. Dewi Madri'),
(5, 'Travel', 'Denpasar - Surabaya', '17.00 WITA', 'Jln. Dewi Madri'),
(6, 'Travel', 'Denpasar - Surabaya', '17.00 WITA', 'Jln. Dewi Madri'),
(7, 'Travel', 'Denpasar - Surabaya', '17.00 WITA', 'Jln. Dewi Madri'),
(8, 'Travel', 'Denpasar - Surabaya', '17.00 WITA', 'Jln. Dewi Madri'),
(9, 'Travel', 'Denpasar - Surabaya', '17.00 WITA', 'Jln. Dewi Madri'),
(10, 'Travel', 'Denpasar - Surabaya', '17.00 WITA', 'Jln. Dewi Madri'),
(11, 'Travel', 'Denpasar - Surabaya', '17.00 WITA', 'Jln. Dewi Madri');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dlmbg_user`
--

CREATE TABLE IF NOT EXISTS `dlmbg_user` (
  `kode_user` binary(24) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama_user` varchar(100) NOT NULL,
  `level` varchar(30) NOT NULL,
  `gbr` varchar(100) NOT NULL,
  PRIMARY KEY (`kode_user`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dlmbg_user`
--

INSERT INTO `dlmbg_user` (`kode_user`, `username`, `password`, `nama_user`, `level`, `gbr`) VALUES
('5e7b22acc62a11e291df14da', 'admin', 'e95b101f465efc36dce45c98dfca38f0', 'Gede Lumbung', 'admin', 'b3da8da6e3b72cb6d324aa1e29b77d09.JPG');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_counter`
--

CREATE TABLE IF NOT EXISTS `tbl_counter` (
  `id_counter` int(10) NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(20) NOT NULL,
  `tanggal` varchar(30) NOT NULL,
  PRIMARY KEY (`id_counter`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=40 ;

--
-- Dumping data untuk tabel `tbl_counter`
--

INSERT INTO `tbl_counter` (`id_counter`, `ip_address`, `tanggal`) VALUES
(1, '::1', '15-May-2013 12:00:25'),
(2, '::1', '04-Jun-2013 06:40:55'),
(3, '::1', '07-Jun-2013 17:59:18'),
(4, '::1', '08-Jun-2013 01:06:30'),
(5, '::1', '08-Jun-2013 09:16:01'),
(6, '::1', '08-Jun-2013 10:01:19'),
(7, '::1', '11-Jun-2013 03:36:58'),
(8, '::1', '11-Jun-2013 19:12:15'),
(9, '::1', '11-Jun-2013 19:24:08'),
(10, '::1', '11-Jun-2013 19:32:08'),
(11, '::1', '11-Jun-2013 19:32:22'),
(12, '::1', '11-Jun-2013 19:34:43'),
(13, '::1', '11-Jun-2013 19:37:15'),
(14, '::1', '11-Jun-2013 19:37:46'),
(15, '::1', '11-Jun-2013 19:37:47'),
(16, '::1', '11-Jun-2013 19:38:07'),
(17, '::1', '11-Jun-2013 19:38:12'),
(18, '::1', '11-Jun-2013 19:43:13'),
(19, '::1', '11-Jun-2013 21:23:09'),
(20, '::1', '12-Jun-2013 01:37:58'),
(21, '::1', '16-Jun-2013 02:05:51'),
(22, '::1', '16-Jun-2013 11:32:36'),
(23, '::1', '16-Jun-2013 11:33:26'),
(24, '::1', '16-Jun-2013 11:48:24'),
(25, '::1', '16-Jun-2013 11:50:18'),
(26, '::1', '16-Jun-2013 22:05:43'),
(27, '::1', '17-Jun-2013 06:13:25'),
(28, '::1', '18-Jun-2013 01:06:11'),
(29, '::1', '21-Jun-2013 04:11:08'),
(30, '::1', '22-Jun-2013 00:57:36'),
(31, '::1', '22-Jun-2013 21:11:27'),
(32, '::1', '23-Jun-2013 09:52:18'),
(33, '::1', '03-Jul-2013 07:04:49'),
(34, '::1', '04-Jul-2013 15:35:25'),
(35, '::1', '08-Jul-2013 00:20:59'),
(36, '::1', '28-Jul-2013 17:57:36'),
(37, '::1', '28-Jul-2013 18:26:56'),
(38, '::1', '28-Jul-2013 18:27:01'),
(39, '::1', '28-Jul-2013 18:28:02');
