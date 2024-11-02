-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Jan 2024 pada 13.41
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kkp`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `anggota`
--

CREATE TABLE `anggota` (
  `id_anggota` int(4) NOT NULL,
  `nama_pengguna` varchar(16) NOT NULL,
  `kata_sandi` varchar(32) NOT NULL,
  `nama_lengkap` varchar(35) NOT NULL,
  `jenis_kelamin` varchar(6) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `agama` varchar(10) NOT NULL,
  `email` varchar(40) NOT NULL,
  `no_telp` varchar(13) NOT NULL,
  `alamat` text NOT NULL,
  `tgl_daftar` date NOT NULL,
  `foto_anggota` varchar(50) NOT NULL DEFAULT 'img-blank.png'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `anggota`
--

INSERT INTO `anggota` (`id_anggota`, `nama_pengguna`, `kata_sandi`, `nama_lengkap`, `jenis_kelamin`, `tgl_lahir`, `agama`, `email`, `no_telp`, `alamat`, `tgl_daftar`, `foto_anggota`) VALUES
(18, 'fajar', '827ccb0eea8a706c4c34a16891f84e7b', 'fajar', 'Pria', '2024-01-27', 'Islam', 'fjr@gmail.com', '082320232', 'null', '2024-01-27', '20240127201142download_image_1706200232209.png'),
(19, 'audy', 'e10adc3949ba59abbe56e057f20f883e', 'Audy Ryandhani H', 'Wanita', '2024-01-27', 'Islam', 'audyrh@gmai.com', '0819219831', 'null', '2024-01-27', 'img-blank.png'),
(20, 'anggun', 'e10adc3949ba59abbe56e057f20f883e', 'anggun', 'Pria', '2024-01-27', 'Islam', 'guns@gmail.com', '0812812913', 'null', '2024-01-27', 'img-blank.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `galeri`
--

CREATE TABLE `galeri` (
  `id_galeri` int(4) NOT NULL,
  `nama_galeri` text NOT NULL,
  `gambar` text,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `galeri`
--

INSERT INTO `galeri` (`id_galeri`, `nama_galeri`, `gambar`, `tanggal`) VALUES
(60, 'Pemanasan', '1700472469.jpg', '2023-11-19 17:00:00'),
(61, 'Latihan Tunggal', '1700472747.png', '2023-11-19 17:00:00'),
(62, 'Persiapan Palang Pintu', '1700472828.jpg', '2023-11-19 17:00:00'),
(63, 'Pengukuhan Ketua Umum', '1700473121.jpg', '2023-11-19 17:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jam_masuk`
--

CREATE TABLE `jam_masuk` (
  `id_jam_masuk` int(11) NOT NULL,
  `jam_masuk` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jam_masuk`
--

INSERT INTO `jam_masuk` (`id_jam_masuk`, `jam_masuk`) VALUES
(1, '1500');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kejuaraan`
--

CREATE TABLE `kejuaraan` (
  `id_kejuaraan` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `gambar` varchar(225) DEFAULT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kejuaraan`
--

INSERT INTO `kejuaraan` (`id_kejuaraan`, `judul`, `gambar`, `tanggal`) VALUES
(16, 'UMJOT 2019', '1700471066.jpg', '2023-11-20'),
(17, 'Walikota Cup Tingkat SD', '1700471554.jpg', '2023-11-20'),
(18, 'Kejuaraan Piala Kemenpora Cilacap ', '1700471777.jpg', '2023-11-20'),
(19, 'Kejuaraan Piala Kemenpora Malang', '1700471805.jpg', '2023-11-20'),
(20, 'Kejuaraan POMPROV DKI JAKARTA 2023', '1700471851.jpg', '2023-11-20'),
(21, 'Pesta Olahraga Antar Kampus ', '1700472083.jpg', '2023-11-20'),
(22, 'POMNAS 2023', '1700472161.jpg', '2023-11-20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `komentar`
--

CREATE TABLE `komentar` (
  `id_komen` int(4) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_postingan` int(4) NOT NULL,
  `nama_anggota` varchar(100) NOT NULL,
  `komentar` varchar(1000) NOT NULL,
  `tanggal_wkt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `gambar_komentar` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `komentar`
--

INSERT INTO `komentar` (`id_komen`, `id_user`, `id_postingan`, `nama_anggota`, `komentar`, `tanggal_wkt`, `gambar_komentar`) VALUES
(1, 13, 1, 'fajar', 'sangat bagus\r\n', '2023-11-09 11:40:51', ''),
(2, 18, 3, 'fajar', 'Goodjobb', '2024-01-29 17:30:57', '20240127201142download_image_1706200232209.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelatih`
--

CREATE TABLE `pelatih` (
  `id_pelatih` int(11) NOT NULL,
  `nama_pelatih` varchar(255) NOT NULL,
  `gambar` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `tgl_upload` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pelatih`
--

INSERT INTO `pelatih` (`id_pelatih`, `nama_pelatih`, `gambar`, `tgl_upload`) VALUES
(19, 'Ahmad Fadlillah,.S.Pd', '1699463310.jpg', '2023-11-07 17:00:00'),
(20, 'Rian Ariya,.S.Pd.Kor', 'Yayan.JPG', '2023-11-07 17:00:00'),
(21, 'Hidrat Nur Ibadin.,S.Or', 'hidrat.jpg', '2023-11-07 17:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `postingan`
--

CREATE TABLE `postingan` (
  `id_post` int(11) NOT NULL,
  `id_admin` varchar(300) NOT NULL,
  `judul` text CHARACTER SET latin1 NOT NULL,
  `isi_post` text CHARACTER SET latin1 NOT NULL,
  `gambar` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `nm_pemosting` varchar(100) CHARACTER SET latin1 NOT NULL,
  `tgl_posting` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `gambar_pemosting` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `postingan`
--

INSERT INTO `postingan` (`id_post`, `id_admin`, `judul`, `isi_post`, `gambar`, `nm_pemosting`, `tgl_posting`, `gambar_pemosting`) VALUES
(1, '1', 'Masa Orientasi Pesilat (MOP) 2022', 'Masa Orientasi Pesilat adalah sebuah kegiatan yang umum dilaksanakan oleh perguruan pencak silat  setiap awal tahun ajaran baru dengan tujuan menyambut kedatangan pesilat didik baru.', 'MOP.jpg', 'fauzi', '2023-11-09 11:35:21', 'gb.jpg'),
(2, '1', 'UKT (Ujian Kenaikan Tingkat)', 'Ujian Kenaikan Tingkat adalah  sebuah kegiatan yang umum dilaksanakan oleh setiap perguruan pencak silat setelah pesilat mengikuti MOP (Masa Orientasi Pesilat) pada awal tahun ajaran baru dengan tujuan lebih mengenal perguruan lebih mendalam dan mematangkan apa yang sudah di pelajari setelah Masa Orientasi Pesilat (MOP)', '1700473548.jpg', 'fauzi', '2023-11-20 09:45:47', 'gb.jpg'),
(3, '1', 'POMNAS 2023', 'POMNAS (Pekan Olahraga Mahasiswa Nasional) merupakan sebuah ajang kompetisi olahraga yang melibatkan mahasiswa dari berbagai perguruan tinggi di Indonesia. Lomba ini menyediakan kesempatan bagi mahasiswa untuk berkompetisi dalam berbagai cabang olahraga. Cabang olahraga di tahun ini yaitu atletik, panjat tebing, renang, karate, gulat, tae kwon do, tenis lapangan, kempo, catur, pencak silat, bridge, sepak takraw, futsal, bulu tangkis, bola basket dan bola voli pasir. Pada POMNAS ini PPSC JAYA MBP mengikuti salah satu pesilat nya pada kejuaraan POMNAS ini dan mendapatkan Juara 2 Tanding Kelas E Putri', '1700473712.jpg', 'fauzi', '2023-11-20 09:48:32', 'gb.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_absen`
--

CREATE TABLE `tb_absen` (
  `id_absen` int(11) NOT NULL,
  `id_anggota` varchar(30) NOT NULL,
  `nama_pengguna` varchar(30) NOT NULL,
  `tanggal` text NOT NULL,
  `jam` text NOT NULL,
  `jam2` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_absen`
--

INSERT INTO `tb_absen` (`id_absen`, `id_anggota`, `nama_pengguna`, `tanggal`, `jam`, `jam2`) VALUES
(74, '11', 'octa', '14-11-2023', '01:00 pm', '0100'),
(75, '13', 'fajar', '14-11-2023', '01:02 pm', '0102');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` int(4) NOT NULL,
  `nama_pengguna` varchar(35) NOT NULL,
  `kata_sandi` varchar(32) NOT NULL,
  `nama_admin` varchar(35) NOT NULL,
  `foto_admin` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `nama_pengguna`, `kata_sandi`, `nama_admin`, `foto_admin`) VALUES
(1, 'fauzi', '21232f297a57a5a743894a0e4a801fc3', 'Fauzi Darmawan', 'gb.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_keterangan`
--

CREATE TABLE `tb_keterangan` (
  `id` int(11) NOT NULL,
  `id_anggota` varchar(30) NOT NULL,
  `nama_pengguna` text NOT NULL,
  `nama_lengkap` text NOT NULL,
  `keterangan` text NOT NULL,
  `alasan` text NOT NULL,
  `tanggal` text NOT NULL,
  `jam` text NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `teknik`
--

CREATE TABLE `teknik` (
  `id_teknik` int(11) NOT NULL,
  `nama_teknik` varchar(50) NOT NULL,
  `gambar` varchar(225) DEFAULT NULL,
  `isi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `teknik`
--

INSERT INTO `teknik` (`id_teknik`, `nama_teknik`, `gambar`, `isi`) VALUES
(17, 'Teknik Tendangan', '1653221680.jpg', 'Selain teknik pukulan, salah satu teknik dasar pencak silat yang tak kalah penting adalah teknik tendangan.\r\n\r\nPada dasarnya, ada lima jenis teknik tendangan dalam pencak silat, yaitu:\r\n\r\nTendangan lurus\r\nTendangan melingkar\r\nTendangan jejag\r\nTendangan sabit\r\nTendangan T\r\nTendangan belakang'),
(18, 'Teknik Tangkisan', '1653221798.jpg', 'Selain teknik menyerang, salah satu teknik dasar pencak silat dalam posisi bertahan yang penting dipelajari adalah teknik tangiksan.\r\n\r\nTangkisan merupakan upaya untuk bertahan dari serangan lawan. Ada dua jenis teknik tangkisan, yakni dengan satu lengan dan dua lengan.\r\n\r\nTeknik tangkisan satu lengan mencakup tangkisan dalam, tangkisan luar, tangkisan atas, dan tangkisan bawah.\r\n\r\nSedangkan teknik tangkisan dua lengan mencakup tangkisan dua lengan dengan telapak tangan dan tangkisan dua lengan dengan lengan bawah.'),
(19, 'Teknik Pukulan', '1653221840.jpg', 'Sama seperti bela diri lainnya, pencak silat juga memiliki teknik pukulan. Dalam pencak silat, teknik pukulan bisa digunakan pada posisi menyerang maupun bertahan.'),
(20, 'Teknik Arah / Delapan Penjuru Mata ', '1653221874.jpg', 'Teknik arah atau delapan penjuru mata angin pencak silat berfungsi supaya kita bisa menentukan arah dengan baik.\r\n\r\nDalam pencak silat, kita memerlukan arah agar dapat menyerang lawan dengan tepat.'),
(21, 'Teknik Pola Langkah', '1653221908.jpg', 'Teknik pola langkah berfungsi untuk membuat pergerakan kita tidak mudah ditebak oleh lawan.\r\n\r\nPola langkah dilakukan dengan cara mengubah pijakan kaki dari satu tempat ke tempat lainnya dengan pola yang disusun sendiri.\r\n\r\nTeknik ini membutuhkan koordinasi yang baik antara sikap badan, sikap tangan, pola lantai, dan pola kaki dalam melangkah.'),
(22, 'Teknik Sikap Pasang', '1653221938.jpg', 'Setelah menguasai teknik kuda-kuda dengan baik dan benar, teknik selanjutnya yang harus dikuasai adalah teknik Sikap pasang.\r\n\r\nTeknik sikap pasang adalah posisi yang dikombinasikan dengan kuda-kuda dan bersifat fleksibel sesuai dengan situasi menyerang ataupun bertahan.'),
(23, 'Teknik Kuda Kuda', '1653221963.jpg', 'Teknik dasar pencak silat yang paling utama adalah teknik kuda-kuda. Teknik ini berfungsi untuk menjaga keseimbangan tubuh, baik dalam posisi menyerang maupun bertahan.\r\n\r\nCara melakukan kuda-kuda dalam pencak silat yakni dengan menapakkan kaki ke tanah dengan posisi tubuh dan kaki seperti orang yang sedang menunggangi kuda.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(4) NOT NULL,
  `nia` varchar(10) NOT NULL,
  `nama_lengkap` varchar(35) NOT NULL,
  `email` varchar(40) NOT NULL,
  `no_telp` varchar(13) NOT NULL,
  `total` varchar(8) NOT NULL,
  `catatan` text NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `foto_bukti` varchar(100) CHARACTER SET utf8mb4 DEFAULT '',
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `nia`, `nama_lengkap`, `email`, `no_telp`, `total`, `catatan`, `tgl_transaksi`, `foto_bukti`, `status`) VALUES
(9, 'NIA001', 'fajar', 'fjr@gmail.com', '082320232', '50000', 'Biaya pendaftaran', '2024-01-27', 'img-blank.png', ''),
(10, 'NIA002', 'Audy Ryandhani H', 'audyrh@gmai.com', '0819219831', '50000', 'Biaya pendaftaran', '2024-01-27', '20240127202525', ''),
(11, 'NIA003', 'anggun', 'guns@gmail.com', '0812812913', '50000', 'Biaya pendaftaran', '2024-01-27', '20240127203109', '');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id_anggota`);

--
-- Indeks untuk tabel `galeri`
--
ALTER TABLE `galeri`
  ADD PRIMARY KEY (`id_galeri`);

--
-- Indeks untuk tabel `jam_masuk`
--
ALTER TABLE `jam_masuk`
  ADD PRIMARY KEY (`id_jam_masuk`);

--
-- Indeks untuk tabel `kejuaraan`
--
ALTER TABLE `kejuaraan`
  ADD PRIMARY KEY (`id_kejuaraan`);

--
-- Indeks untuk tabel `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id_komen`);

--
-- Indeks untuk tabel `pelatih`
--
ALTER TABLE `pelatih`
  ADD PRIMARY KEY (`id_pelatih`);

--
-- Indeks untuk tabel `postingan`
--
ALTER TABLE `postingan`
  ADD PRIMARY KEY (`id_post`);

--
-- Indeks untuk tabel `tb_absen`
--
ALTER TABLE `tb_absen`
  ADD PRIMARY KEY (`id_absen`);

--
-- Indeks untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `tb_keterangan`
--
ALTER TABLE `tb_keterangan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `teknik`
--
ALTER TABLE `teknik`
  ADD PRIMARY KEY (`id_teknik`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id_anggota` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `galeri`
--
ALTER TABLE `galeri`
  MODIFY `id_galeri` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT untuk tabel `jam_masuk`
--
ALTER TABLE `jam_masuk`
  MODIFY `id_jam_masuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `kejuaraan`
--
ALTER TABLE `kejuaraan`
  MODIFY `id_kejuaraan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id_komen` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `pelatih`
--
ALTER TABLE `pelatih`
  MODIFY `id_pelatih` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `postingan`
--
ALTER TABLE `postingan`
  MODIFY `id_post` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_absen`
--
ALTER TABLE `tb_absen`
  MODIFY `id_absen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_admin` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_keterangan`
--
ALTER TABLE `tb_keterangan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `teknik`
--
ALTER TABLE `teknik`
  MODIFY `id_teknik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
