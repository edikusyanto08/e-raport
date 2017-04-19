-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 19 Apr 2017 pada 03.58
-- Versi Server: 5.6.21
-- PHP Version: 5.5.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_raport`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `username` varchar(40) NOT NULL,
  `pass1` varchar(40) NOT NULL,
  `pass2` varchar(40) NOT NULL,
  `email` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`username`, `pass1`, `pass2`, `email`) VALUES
('admin', 'admin', 'admin', 'muhammad4zmi@gmail.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `akun`
--

CREATE TABLE IF NOT EXISTS `akun` (
  `username` varchar(15) NOT NULL,
  `password` varchar(50) NOT NULL,
  `password2` varchar(50) NOT NULL,
  `email` text NOT NULL,
  `nis` varchar(10) NOT NULL,
  `status` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=ascii;

--
-- Dumping data untuk tabel `akun`
--

INSERT INTO `akun` (`username`, `password`, `password2`, `email`, `nis`, `status`) VALUES
('111', 'cb0f60f353a03b04ec5993e52457345b', '81KFFvBXFqg=', 'anandaghea27@gmail.com', '111', 1),
('133', '1d4e51c76611c9c019dcfc4e54a93fea', 'j5/MM3qVIs8=', 'muhammad4zmi@gmail.com', '133', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `bantuan`
--

CREATE TABLE IF NOT EXISTS `bantuan` (
  `nis` int(11) NOT NULL,
  `nama_siswa` varchar(30) NOT NULL,
  `gender` char(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bantuan`
--

INSERT INTO `bantuan` (`nis`, `nama_siswa`, `gender`) VALUES
(111, 'Siti Hijratul Jihadah', 'P'),
(133, 'Muhammad Azmi', 'L');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal`
--

CREATE TABLE IF NOT EXISTS `jadwal` (
`id` int(11) NOT NULL,
  `nip` int(11) DEFAULT NULL,
  `kd_mapel` char(10) DEFAULT NULL,
  `id_kelas` char(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `presensi`
--

CREATE TABLE IF NOT EXISTS `presensi` (
`id` int(11) NOT NULL,
  `alfa` int(11) DEFAULT NULL,
  `izin` int(11) DEFAULT NULL,
  `sakit` int(11) DEFAULT NULL,
  `akhlak` char(2) DEFAULT NULL,
  `pribadi` char(2) DEFAULT NULL,
  `id_kelas` char(10) DEFAULT NULL,
  `semester` varchar(50) DEFAULT NULL,
  `nis` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `presensi`
--

INSERT INTO `presensi` (`id`, `alfa`, `izin`, `sakit`, `akhlak`, `pribadi`, `id_kelas`, `semester`, `nis`) VALUES
(2, 0, 0, 0, 'A', 'A', '8A1', 'Genap', 133),
(3, 20, 10, 0, 'D', 'D', '8A0', 'Genap', 111),
(4, 1, 1, 1, 'A', 'A', '8A1', 'Ganjil', 133),
(5, 1, 0, 1, 'A', 'A', '7B', 'Genap', 123);

-- --------------------------------------------------------

--
-- Struktur dari tabel `rapot`
--

CREATE TABLE IF NOT EXISTS `rapot` (
`id_raport` int(11) NOT NULL,
  `nis` int(11) DEFAULT NULL,
  `kd_mapel` char(10) DEFAULT NULL,
  `nilai` decimal(10,0) DEFAULT NULL,
  `kkm` decimal(10,0) NOT NULL,
  `ket_nilai` text,
  `deskripsi` text,
  `semester` char(10) DEFAULT NULL,
  `id_kelas` char(10) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=157 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `rapot`
--

INSERT INTO `rapot` (`id_raport`, `nis`, `kd_mapel`, `nilai`, `kkm`, `ket_nilai`, `deskripsi`, `semester`, `id_kelas`) VALUES
(150, 133, 'MP001', '90', '75', 'Sembilan puluh', 'sdfsdfsdf', 'Genap', '8A1'),
(151, 133, 'MP002', '85', '70', 'Delapan Lima', 'sdfsdfsdf', 'Genap', '8A1'),
(152, 133, 'MP003', '90', '70', 'Sembilan Puluh', 'sdfsdfsdf', 'Genap', '8A1'),
(153, 133, 'MP004', '85', '70', 'Delapan Lima', 'sdfsdfsdf', 'Genap', '8A1'),
(154, 111, 'MP001', '80', '70', 'Delapan Puluh', 'asdasdas', 'Genap', '8A0'),
(155, 111, 'MP002', '90', '75', 'Sembilan puluh', 'asdasdas', 'Genap', '8A0'),
(156, 133, 'MP004', '75', '70', 'Tujuh Lima', 'test', 'Ganjil', '8A1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rekap_nilai`
--

CREATE TABLE IF NOT EXISTS `rekap_nilai` (
`id_rekap` int(11) NOT NULL,
  `nis` int(11) DEFAULT NULL,
  `kd_mapel` char(10) DEFAULT NULL,
  `nip` int(11) DEFAULT NULL,
  `id_kelas` char(10) DEFAULT NULL,
  `semester` char(10) DEFAULT NULL,
  `kkm` decimal(10,0) DEFAULT NULL,
  `nilai_akhir` decimal(10,0) DEFAULT NULL,
  `keterangan` text
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `rekap_nilai`
--

INSERT INTO `rekap_nilai` (`id_rekap`, `nis`, `kd_mapel`, `nip`, `id_kelas`, `semester`, `kkm`, `nilai_akhir`, `keterangan`) VALUES
(10, 111, 'MP001', 8988, '8A0', 'Genap', '70', '80', 'Delapan Puluh'),
(11, 133, 'MP003', 1213445, '8A1', 'Genap', '70', '90', 'Sembilan Puluh'),
(12, 133, 'MP002', 77878, '8A1', 'Genap', '70', '85', 'Delapan Lima'),
(13, 133, 'MP004', 1213445, '8A1', 'Ganjil', '70', '75', 'Tujuh Lima'),
(15, 133, 'MP004', 1213445, '8A1', 'Genap', '70', '85', 'Delapan Lima'),
(16, 133, 'MP001', 8988, '8A1', 'Genap', '75', '90', 'Sembilan puluh'),
(17, 111, 'MP002', 77878, '8A0', 'Genap', '75', '90', 'Sembilan puluh'),
(18, 112, 'MP004', 8988, '8A2', 'Genap', '70', '80', 'Delapan Puluh'),
(19, 123, 'MP001', 8988, '7B', 'Genap', '70', '80', 'Sembilan Puluh');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_guru`
--

CREATE TABLE IF NOT EXISTS `tbl_guru` (
  `nip` int(11) NOT NULL,
  `nama_guru` varchar(45) DEFAULT NULL,
  `jk` varchar(10) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `agama` varchar(10) DEFAULT NULL,
  `alamat` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_guru`
--

INSERT INTO `tbl_guru` (`nip`, `nama_guru`, `jk`, `tgl_lahir`, `agama`, `alamat`) VALUES
(8988, 'Muhammad Azmi, S.Kom', 'Laki-Laki', '2016-02-10', 'Islam', 'Mataram'),
(77878, 'DindaQ', 'Laki-Laki', '2016-02-10', 'Islam', 'erewr'),
(123456, 'Test', 'Laki-Laki', '2016-02-11', 'Islam', 'Mataram'),
(445456, 'tfytryrty', 'Laki-Laki', '2017-04-18', 'Islam', 'fthfghfghfgh'),
(1213445, 'Udin', 'Laki-Laki', '2016-02-09', 'Islam', 'Sakra'),
(23534556, 'DindaQ', 'Prempuan', '2016-02-11', 'Islam', 'sadadad'),
(123456789, 'Coba Coba', 'Laki-Laki', '2016-02-09', 'Islam', 'Selong');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_help`
--

CREATE TABLE IF NOT EXISTS `tbl_help` (
`id` int(11) NOT NULL,
  `id_kelas` char(50) DEFAULT NULL,
  `kd_kelas` char(50) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_help`
--

INSERT INTO `tbl_help` (`id`, `id_kelas`, `kd_kelas`) VALUES
(1, '7A', 'VII'),
(2, '7B', 'VII'),
(3, '7C', 'VII'),
(4, '7D', 'VII'),
(5, '7E', 'VII'),
(6, '7F', 'VII'),
(7, '8A', 'VIII'),
(8, '8B', 'VIII'),
(9, '8C', 'VIII'),
(10, '8D', 'VIII'),
(11, '8E', 'VIII'),
(12, '8F', 'VIII'),
(13, '8G', 'VIII'),
(14, '7G', 'VII'),
(15, '9A', 'IX'),
(16, '9B', 'IX'),
(17, '9C', 'IX'),
(18, '9D', 'IX'),
(19, '9E', 'IX'),
(20, '9F', 'IX'),
(21, '9G', 'IX');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_info`
--

CREATE TABLE IF NOT EXISTS `tbl_info` (
`id_info` int(11) NOT NULL,
  `judul` varchar(50) DEFAULT '0',
  `isi` text,
  `tgl_post` date DEFAULT NULL,
  `tipe` varchar(50) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_info`
--

INSERT INTO `tbl_info` (`id_info`, `judul`, `isi`, `tgl_post`, `tipe`) VALUES
(16, 'sadasdsd', 'saya lapar', '2017-04-19', 'Pengumuman');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kelas`
--

CREATE TABLE IF NOT EXISTS `tbl_kelas` (
`id` int(11) NOT NULL,
  `id_kelas` char(10) NOT NULL,
  `kd_kelas` char(50) DEFAULT NULL,
  `kelas` varchar(45) DEFAULT NULL,
  `nis` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_kelas`
--

INSERT INTO `tbl_kelas` (`id`, `id_kelas`, `kd_kelas`, `kelas`, `nis`) VALUES
(1, '7B', 'VII', 'VIIB', 123),
(2, '8A0', 'VIII', 'VIIIA', 111),
(3, '8A1', 'VIII', 'VIIIA', 133),
(4, '8A2', 'VIII', 'VIIIA', 112),
(5, '8B3', 'VIII', 'VIIIB', 123),
(10, '7A4', 'VIII', 'VIIA', 112),
(11, '7C', 'VII', 'VIIC', 112);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_mapel`
--

CREATE TABLE IF NOT EXISTS `tbl_mapel` (
  `kd_mapel` char(10) NOT NULL,
  `nama_mapel` varchar(45) DEFAULT NULL,
  `nip` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_mapel`
--

INSERT INTO `tbl_mapel` (`kd_mapel`, `nama_mapel`, `nip`) VALUES
('MP001', 'Biologi Peminatan', 8988),
('MP002', 'Matematika', 77878),
('MP003', 'Fisika', 1213445),
('MP004', 'Terpadu', 8988);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_nilai`
--

CREATE TABLE IF NOT EXISTS `tbl_nilai` (
`id_nilai` int(11) NOT NULL,
  `nis` int(11) DEFAULT NULL,
  `id_kelas` char(10) DEFAULT NULL,
  `semester` varchar(50) DEFAULT NULL,
  `total_nilai` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_nilai`
--

INSERT INTO `tbl_nilai` (`id_nilai`, `nis`, `id_kelas`, `semester`, `total_nilai`) VALUES
(6, 111, '8A0', 'Genap', '95'),
(7, 133, '8A1', 'Ganjil', '75'),
(8, 133, '8A1', 'Genap', '350');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_prestasi`
--

CREATE TABLE IF NOT EXISTS `tbl_prestasi` (
`id_prestasi` int(11) NOT NULL,
  `nama_prestasi` varchar(45) DEFAULT NULL,
  `jenis` varchar(45) DEFAULT NULL,
  `tingkat` varchar(45) DEFAULT NULL,
  `waktu` date NOT NULL,
  `lokasi` text NOT NULL,
  `nis` int(11) DEFAULT NULL,
  `id_kelas` char(10) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_prestasi`
--

INSERT INTO `tbl_prestasi` (`id_prestasi`, `nama_prestasi`, `jenis`, `tingkat`, `waktu`, `lokasi`, `nis`, `id_kelas`) VALUES
(1, 'asdasd dgdsgdfgdfhgdg dfgdfgdfgdfg fdgfdgdfg', 'asdasd', 'adad', '2016-02-16', 'zczxvxzcxzcvxv', 111, '8A0'),
(2, 'Juara 1 Olimpiade Matematika', 'Sains', 'Provinsi', '2016-02-17', 'Kantor Gubernur NTB', 123, '7B');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_siswa`
--

CREATE TABLE IF NOT EXISTS `tbl_siswa` (
  `nis` int(11) NOT NULL,
  `nama_lengkap` varchar(45) DEFAULT NULL,
  `jk` enum('L','P') DEFAULT NULL,
  `nisn` int(11) DEFAULT NULL,
  `tempat_lahir` varchar(45) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `agama` varchar(45) DEFAULT NULL,
  `alamat` varchar(45) DEFAULT NULL,
  `desa` varchar(45) DEFAULT NULL,
  `kecamatan` varchar(45) DEFAULT NULL,
  `kabupaten` varchar(45) DEFAULT NULL,
  `provinsi` varchar(45) DEFAULT NULL,
  `alat_transportasi` varchar(45) DEFAULT NULL,
  `telpon` varchar(12) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `skhun_sd` varchar(45) DEFAULT NULL,
  `kps` enum('Ya','Tidak') DEFAULT NULL,
  `nama_ayah` varchar(45) DEFAULT NULL,
  `thn_lahir` year(4) DEFAULT NULL,
  `pekerjaan_ayah` varchar(45) DEFAULT NULL,
  `pendidikan_ayah` varchar(45) DEFAULT NULL,
  `penghasilan` varchar(12) DEFAULT NULL,
  `nama_ibu` varchar(45) DEFAULT NULL,
  `thnlahir` year(4) DEFAULT NULL,
  `pekerjaan_ibu` varchar(45) DEFAULT NULL,
  `pendidikan_ibu` varchar(45) DEFAULT NULL,
  `penghasilan_ibu` varchar(12) DEFAULT NULL,
  `tinggi_badan` int(11) DEFAULT NULL,
  `berat_badan` int(11) DEFAULT NULL,
  `jml_saudara` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_siswa`
--

INSERT INTO `tbl_siswa` (`nis`, `nama_lengkap`, `jk`, `nisn`, `tempat_lahir`, `tgl_lahir`, `agama`, `alamat`, `desa`, `kecamatan`, `kabupaten`, `provinsi`, `alat_transportasi`, `telpon`, `email`, `skhun_sd`, `kps`, `nama_ayah`, `thn_lahir`, `pekerjaan_ayah`, `pendidikan_ayah`, `penghasilan`, `nama_ibu`, `thnlahir`, `pekerjaan_ibu`, `pendidikan_ibu`, `penghasilan_ibu`, `tinggi_badan`, `berat_badan`, `jml_saudara`) VALUES
(111, 'Siti Hijratul Jihadah', 'P', 113, 'Dasan Baru', '1992-06-27', 'Islam', 'Sepit', '52.03.01.2004', '01&amp;kec=03&amp;prop=52', '03&amp;prop=52', '52', 'Kendaraan Umum', '0819121212', 'anandaghea27@gmail.com', '123456', 'Ya', 'Drs Marzuki Adami, M.Ap', 1960, 'PNS', 'Sarjana', 'Lebih 5 Juta', 'Dra Nurul Hidayah', 1970, 'Wiraswasta', 'Sarjana', 'Lebih 5 Juta', 160, 50, '3'),
(112, 'Erwin Indrawan', 'P', 1123, 'Jeneper', '2016-03-28', 'Islam', 'Jl.Amir Hamzah Gg.Actor No.1A Karang Sukun Ma', '5202040009', '5202040', '5202', '52', 'Kendaraan Pribadi', '081999999', 'erwin.jnefer@gmail.com', '9000', 'Ya', 'Yun', 1970, 'Petani', 'SMA', 'Lebih 1 Juta', 'SU', 1969, 'Petani', 'SMP', 'Kurang 1 Jut', 150, 50, '3'),
(123, 'Arif', 'P', 1234, 'Sepit', '2016-02-23', 'Islam', 'selong', '52.03.04.2004', '04&amp;kec=03&amp;prop=52', '03&amp;prop=52', '52', 'Kendaraan Pribadi', '0819121212', 'haekal@gmail.com', '456', 'Ya', 'H Ramli', 1950, 'Petani', 'SD', 'Kurang 1 Jut', 'Inak Ruminep', 1950, 'IRT', 'SD', 'Kurang 1 Jut', 179, 100, '3'),
(133, 'Muhammad Azmi', 'L', 1332, 'Tengeh', '1992-02-12', 'Islam', 'Mataram', '5203010008', '5203010', '5203', '52', 'Kendaraan Pribadi', '099121212', 'muhammad4zmi@gmail.com', '122121', 'Ya', 'H Hamdi', 1960, 'Petani', 'SD', 'Kurang 1 Jut', 'HJ Isnaini', 1967, 'IRT', 'SD', 'Lebih 1 Juta', 165, 62, '5');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE IF NOT EXISTS `tbl_user` (
`id` int(11) NOT NULL,
  `nip` int(11) NOT NULL,
  `nama_lengkap` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `jabatan` varchar(50) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `nip`, `nama_lengkap`, `password`, `jabatan`) VALUES
(1, 8988, 'Muhammad Azmi, S.Kom', '123', '1'),
(2, 77878, 'DindaQ', '123', '2'),
(3, 8988, 'Muhammad Azmi, S.Kom', '2016', '2'),
(4, 123456, 'Test', '123', '2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_walikelas`
--

CREATE TABLE IF NOT EXISTS `tbl_walikelas` (
`id_wali` int(11) NOT NULL,
  `id_kelas` char(10) NOT NULL,
  `kelas` char(10) NOT NULL,
  `nip` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_walikelas`
--

INSERT INTO `tbl_walikelas` (`id_wali`, `id_kelas`, `kelas`, `nip`) VALUES
(2, '8A0', 'VIIIA', 8988),
(3, '7B', 'VIIB', 123456),
(4, '8B3', 'VIIIB', 1213445),
(5, '7A4', 'VIIA', 23534556),
(6, '7C', 'VIIC', 123456789);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
 ADD PRIMARY KEY (`username`);

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
 ADD PRIMARY KEY (`username`), ADD KEY `fk_akun_mhs_idx` (`nis`);

--
-- Indexes for table `bantuan`
--
ALTER TABLE `bantuan`
 ADD PRIMARY KEY (`nis`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
 ADD PRIMARY KEY (`id`), ADD KEY `FK_jadwal_tbl_guru` (`nip`), ADD KEY `FK_jadwal_tbl_mapel` (`kd_mapel`), ADD KEY `FK_jadwal_tbl_kelas` (`id_kelas`);

--
-- Indexes for table `presensi`
--
ALTER TABLE `presensi`
 ADD PRIMARY KEY (`id`), ADD KEY `FK__tbl_siswa` (`nis`), ADD KEY `FK_presensi_tbl_kelas` (`id_kelas`);

--
-- Indexes for table `rapot`
--
ALTER TABLE `rapot`
 ADD PRIMARY KEY (`id_raport`), ADD KEY `fk_rapot_1_idx` (`nis`), ADD KEY `FK_rapot_tbl_kelas` (`id_kelas`), ADD KEY `fk_rapot_3` (`kd_mapel`);

--
-- Indexes for table `rekap_nilai`
--
ALTER TABLE `rekap_nilai`
 ADD PRIMARY KEY (`id_rekap`), ADD KEY `FK__tbl_kelas` (`id_kelas`), ADD KEY `FK__tbl_mapel` (`kd_mapel`), ADD KEY `FK__tbl_mapel_2` (`nip`), ADD KEY `FK_rekap_nilai_tbl_siswa` (`nis`);

--
-- Indexes for table `tbl_guru`
--
ALTER TABLE `tbl_guru`
 ADD PRIMARY KEY (`nip`);

--
-- Indexes for table `tbl_help`
--
ALTER TABLE `tbl_help`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_info`
--
ALTER TABLE `tbl_info`
 ADD PRIMARY KEY (`id_info`);

--
-- Indexes for table `tbl_kelas`
--
ALTER TABLE `tbl_kelas`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_kelas` (`nis`), ADD KEY `id_kelas` (`id_kelas`);

--
-- Indexes for table `tbl_mapel`
--
ALTER TABLE `tbl_mapel`
 ADD PRIMARY KEY (`kd_mapel`), ADD KEY `fk_tbl_mapel_1_idx` (`nip`);

--
-- Indexes for table `tbl_nilai`
--
ALTER TABLE `tbl_nilai`
 ADD PRIMARY KEY (`id_nilai`), ADD KEY `FK_tbl_nilai_tbl_kelas` (`nis`), ADD KEY `FK_tbl_nilai_tbl_kelas_2` (`id_kelas`);

--
-- Indexes for table `tbl_prestasi`
--
ALTER TABLE `tbl_prestasi`
 ADD PRIMARY KEY (`id_prestasi`), ADD KEY `fk_tbl_prestasi_2_idx` (`nis`), ADD KEY `FK_tbl_prestasi_tbl_kelas` (`id_kelas`);

--
-- Indexes for table `tbl_siswa`
--
ALTER TABLE `tbl_siswa`
 ADD PRIMARY KEY (`nis`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
 ADD PRIMARY KEY (`id`,`nip`);

--
-- Indexes for table `tbl_walikelas`
--
ALTER TABLE `tbl_walikelas`
 ADD PRIMARY KEY (`id_wali`), ADD KEY `nip` (`nip`), ADD KEY `FK_tbl_walikelas_tbl_kelas` (`id_kelas`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `presensi`
--
ALTER TABLE `presensi`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `rapot`
--
ALTER TABLE `rapot`
MODIFY `id_raport` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=157;
--
-- AUTO_INCREMENT for table `rekap_nilai`
--
ALTER TABLE `rekap_nilai`
MODIFY `id_rekap` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `tbl_help`
--
ALTER TABLE `tbl_help`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `tbl_info`
--
ALTER TABLE `tbl_info`
MODIFY `id_info` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `tbl_kelas`
--
ALTER TABLE `tbl_kelas`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `tbl_nilai`
--
ALTER TABLE `tbl_nilai`
MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tbl_prestasi`
--
ALTER TABLE `tbl_prestasi`
MODIFY `id_prestasi` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_walikelas`
--
ALTER TABLE `tbl_walikelas`
MODIFY `id_wali` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
ADD CONSTRAINT `FK_jadwal_tbl_guru` FOREIGN KEY (`nip`) REFERENCES `tbl_guru` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `FK_jadwal_tbl_kelas` FOREIGN KEY (`id_kelas`) REFERENCES `tbl_kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `FK_jadwal_tbl_mapel` FOREIGN KEY (`kd_mapel`) REFERENCES `tbl_mapel` (`kd_mapel`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `presensi`
--
ALTER TABLE `presensi`
ADD CONSTRAINT `FK__tbl_siswa` FOREIGN KEY (`nis`) REFERENCES `tbl_siswa` (`nis`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `FK_presensi_tbl_kelas` FOREIGN KEY (`id_kelas`) REFERENCES `tbl_kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `rapot`
--
ALTER TABLE `rapot`
ADD CONSTRAINT `FK_rapot_tbl_kelas` FOREIGN KEY (`id_kelas`) REFERENCES `tbl_kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `fk_rapot_1` FOREIGN KEY (`nis`) REFERENCES `tbl_siswa` (`nis`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `fk_rapot_3` FOREIGN KEY (`kd_mapel`) REFERENCES `tbl_mapel` (`kd_mapel`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `rekap_nilai`
--
ALTER TABLE `rekap_nilai`
ADD CONSTRAINT `FK__tbl_kelas` FOREIGN KEY (`id_kelas`) REFERENCES `tbl_kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `FK__tbl_mapel` FOREIGN KEY (`kd_mapel`) REFERENCES `tbl_mapel` (`kd_mapel`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `FK__tbl_mapel_2` FOREIGN KEY (`nip`) REFERENCES `tbl_guru` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `FK_rekap_nilai_tbl_siswa` FOREIGN KEY (`nis`) REFERENCES `tbl_siswa` (`nis`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_kelas`
--
ALTER TABLE `tbl_kelas`
ADD CONSTRAINT `tbl_kelas_ibfk_1` FOREIGN KEY (`nis`) REFERENCES `tbl_siswa` (`nis`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_mapel`
--
ALTER TABLE `tbl_mapel`
ADD CONSTRAINT `fk_tbl_mapel_1` FOREIGN KEY (`nip`) REFERENCES `tbl_guru` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_nilai`
--
ALTER TABLE `tbl_nilai`
ADD CONSTRAINT `FK_tbl_nilai_tbl_kelas` FOREIGN KEY (`nis`) REFERENCES `tbl_siswa` (`nis`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `FK_tbl_nilai_tbl_kelas_2` FOREIGN KEY (`id_kelas`) REFERENCES `tbl_kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_prestasi`
--
ALTER TABLE `tbl_prestasi`
ADD CONSTRAINT `FK_tbl_prestasi_tbl_kelas` FOREIGN KEY (`id_kelas`) REFERENCES `tbl_kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `fk_tbl_prestasi_2` FOREIGN KEY (`nis`) REFERENCES `tbl_siswa` (`nis`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_walikelas`
--
ALTER TABLE `tbl_walikelas`
ADD CONSTRAINT `FK_tbl_walikelas_tbl_kelas` FOREIGN KEY (`id_kelas`) REFERENCES `tbl_kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `fk_wali2` FOREIGN KEY (`nip`) REFERENCES `tbl_guru` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
