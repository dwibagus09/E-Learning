-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 18 Jun 2020 pada 04.57
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.3.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sekolah`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_filetugas`
--

CREATE TABLE `tb_filetugas` (
  `id_file` int(11) NOT NULL,
  `id_tugas` int(11) NOT NULL,
  `file_tugas` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_filetugas`
--

INSERT INTO `tb_filetugas` (`id_file`, `id_tugas`, `file_tugas`) VALUES
(99, 6, 'stringbase64'),
(122, 3, 'statistika.pdf/5ee90cc016570.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_guru`
--

CREATE TABLE `tb_guru` (
  `nip` int(11) NOT NULL,
  `nama_guru` varchar(100) DEFAULT NULL,
  `alamat` varchar(100) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `jenis_kelamin` enum('Pria','Wanita') DEFAULT NULL,
  `id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_guru`
--

INSERT INTO `tb_guru` (`nip`, `nama_guru`, `alamat`, `foto`, `jenis_kelamin`, `id`) VALUES
(126782, 'Dwi Bagus Krisdianto Wicaksono', 'Kp.Krajan RT01/RW03 Selomukti Kec.Mlandingan - Situbondo', '1586731749666.png', 'Pria', 42),
(232434, 'sahdi', 'jl mawar', '', 'Pria', 51),
(344343, 'mani', 'jl mawar', '1591914085154.png', 'Wanita', 52);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jawaban`
--

CREATE TABLE `tb_jawaban` (
  `id_jawaban` int(11) NOT NULL,
  `jawaban_siswa` int(1) NOT NULL,
  `status_benar` int(1) NOT NULL,
  `id_pertanyaan` int(11) NOT NULL,
  `nis` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jurusan`
--

CREATE TABLE `tb_jurusan` (
  `id_jurusan` int(11) NOT NULL,
  `nama_jurusan` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_jurusan`
--

INSERT INTO `tb_jurusan` (`id_jurusan`, `nama_jurusan`) VALUES
(25, 'IPA'),
(32, 'IPS'),
(34, 'Bahasa Alien');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kelas`
--

CREATE TABLE `tb_kelas` (
  `id_kelas` int(11) NOT NULL,
  `kelas` varchar(10) NOT NULL,
  `nama_kelas` varchar(10) NOT NULL,
  `id_jurusan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_kelas`
--

INSERT INTO `tb_kelas` (`id_kelas`, `kelas`, `nama_kelas`, `id_jurusan`) VALUES
(12, '10', 'IPA 1', 25),
(13, '10', 'IPA 2', 25),
(15, '10', 'IPS 1', 32);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_login`
--

CREATE TABLE `tb_login` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  `akses` enum('1','2','3') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_login`
--

INSERT INTO `tb_login` (`id`, `username`, `password`, `akses`) VALUES
(1, 'admin', 'admin', '1'),
(37, '0001', '0001', '3'),
(42, 'dwibagus', 'dwibagus', '2'),
(49, 'dasa', 'fdfd', '3'),
(51, 'sahdi', 'sahdi', '2'),
(52, 'man', '123', '2'),
(54, 'sanas', '123', '3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_mapel`
--

CREATE TABLE `tb_mapel` (
  `id_mapel` int(11) NOT NULL,
  `nama` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_mapel`
--

INSERT INTO `tb_mapel` (`id_mapel`, `nama`) VALUES
(1, 'Bahasa Indonesia'),
(2, 'Matematika');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_materi`
--

CREATE TABLE `tb_materi` (
  `id_materi` int(11) NOT NULL,
  `nama_materi` varchar(12) NOT NULL,
  `file_materi` varchar(100) NOT NULL,
  `id_mengajar` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_materi`
--

INSERT INTO `tb_materi` (`id_materi`, `nama_materi`, `file_materi`, `id_mengajar`, `id_kelas`) VALUES
(9, 'Stoikiometri', '1591930972779.pdf', 6, 12),
(13, 'Statistika', '1591931203084.pdf', 1, 13);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_mengajar`
--

CREATE TABLE `tb_mengajar` (
  `id_mengajar` int(11) NOT NULL,
  `id_kelas` int(11) DEFAULT NULL,
  `id_mapel` int(11) DEFAULT NULL,
  `nip` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_mengajar`
--

INSERT INTO `tb_mengajar` (`id_mengajar`, `id_kelas`, `id_mapel`, `nip`) VALUES
(1, 12, 1, 126782),
(4, 13, 1, 126782),
(6, 12, 2, 232434);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pertanyaan`
--

CREATE TABLE `tb_pertanyaan` (
  `id_pertanyaan` int(11) NOT NULL,
  `soal` varchar(255) NOT NULL,
  `a` varchar(100) NOT NULL,
  `b` varchar(100) NOT NULL,
  `c` varchar(100) NOT NULL,
  `d` varchar(100) NOT NULL,
  `id_ujian` int(11) NOT NULL,
  `jawaban_benar` varchar(10) NOT NULL,
  `keterangan` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_pertanyaan`
--

INSERT INTO `tb_pertanyaan` (`id_pertanyaan`, `soal`, `a`, `b`, `c`, `d`, `id_ujian`, `jawaban_benar`, `keterangan`) VALUES
(7, 'Anda seorang pengecut!', 'ya', 'ya!', 'tidak', 'tidak!', 6, '0', ''),
(8, 'yuhu!', '1', '2', '3', '4', 7, 'c', ''),
(9, 'assasdas', 'dsfdsfds', 'ww', 'wwww', 'aaaa', 8, 'd', ''),
(10, 'asadasdas!', 'w', 'aa', 'fdsfdfdsf', 'dfdf', 8, '', ''),
(11, 'assasdas1111111111111111', 'dsfdsfds', 'ww', 'wwww', 'aaaa', 8, 'a', ''),
(12, 'assasdas2222222222222222', 'dsfdsfds', 'ww', 'wwww', 'aaaa', 8, 'd', ''),
(13, 'asdasdas', 'w', 'www', 'www', 'wwwww', 9, 'b', ''),
(14, 'asdasdas', 'w', 'www', 'www', 'wwwww', 9, 'b', ''),
(15, 'yuhu!', '1', '2', '3', '4', 7, 'd', ''),
(16, 'buwung ape tuh man?', 'buwung puyuh', 'ayam goyeng', 'dahlah', 'tauk ah', 10, 'd', ''),
(17, 'buwung ape tuh man?', 'buwung puyuh', 'ayam goyeng', 'dahlah', 'tauk ah', 10, 'c', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_result`
--

CREATE TABLE `tb_result` (
  `id_hasil` int(11) NOT NULL,
  `nilai` int(11) NOT NULL,
  `id_tugas` int(11) NOT NULL,
  `nis` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_siswa`
--

CREATE TABLE `tb_siswa` (
  `nis` int(11) NOT NULL,
  `nama_siswa` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `jenis_kelamin` enum('Pria','Wanita') NOT NULL,
  `No_Telepon` char(12) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_siswa`
--

INSERT INTO `tb_siswa` (`nis`, `nama_siswa`, `alamat`, `jenis_kelamin`, `No_Telepon`, `foto`, `id_kelas`, `id`) VALUES
(23324, 'fdfdf', 'dfdfdg', 'Wanita', '435435', '1588403954385.png', 12, 49),
(60992, 'Sanaswati', 'jl mawar', 'Wanita', '089776456234', '1591914142692.png', 13, 54);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_tugas`
--

CREATE TABLE `tb_tugas` (
  `id_tugas` int(11) NOT NULL,
  `kd_tugas` varchar(10) NOT NULL,
  `deskripsi` varchar(100) NOT NULL,
  `waktu_mulai` date NOT NULL,
  `waktu_selesai` date NOT NULL,
  `id_mengajar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_tugas`
--

INSERT INTO `tb_tugas` (`id_tugas`, `kd_tugas`, `deskripsi`, `waktu_mulai`, `waktu_selesai`, `id_mengajar`) VALUES
(1, '101', 'hkjhkjh', '2020-05-24', '2020-05-25', 1),
(3, '101', 'buwung apa uh man?', '2020-06-12', '2020-06-13', 6),
(4, '101', 'ayam apa tu mbak? ayam goyeng....', '2020-06-12', '2020-06-13', 6),
(5, '103', 'fffffffffffffffffffffffffffffff', '2020-06-13', '2020-06-18', 1),
(6, '101', 'nanananna hehehehehe?', '2020-06-12', '2020-06-13', 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_ujian`
--

CREATE TABLE `tb_ujian` (
  `id_ujian` int(11) NOT NULL,
  `tgl_ujian` date NOT NULL,
  `keterangan` varchar(200) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `id_mengajar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_ujian`
--

INSERT INTO `tb_ujian` (`id_ujian`, `tgl_ujian`, `keterangan`, `id_mapel`, `id_kelas`, `id_mengajar`) VALUES
(6, '2020-05-25', 'ujiancbt', 1, 13, 1),
(7, '2020-05-25', 'ujiancat2', 1, 12, 1),
(10, '2020-06-12', 'ujiancbtcuy', 1, 13, 6);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_filetugas`
--
ALTER TABLE `tb_filetugas`
  ADD PRIMARY KEY (`id_file`),
  ADD KEY `id_tugas` (`id_tugas`) USING BTREE;

--
-- Indeks untuk tabel `tb_guru`
--
ALTER TABLE `tb_guru`
  ADD PRIMARY KEY (`nip`),
  ADD KEY `id2` (`id`);

--
-- Indeks untuk tabel `tb_jawaban`
--
ALTER TABLE `tb_jawaban`
  ADD PRIMARY KEY (`id_jawaban`),
  ADD KEY `id_pertanyaan` (`id_pertanyaan`),
  ADD KEY `nis` (`nis`);

--
-- Indeks untuk tabel `tb_jurusan`
--
ALTER TABLE `tb_jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indeks untuk tabel `tb_kelas`
--
ALTER TABLE `tb_kelas`
  ADD PRIMARY KEY (`id_kelas`),
  ADD KEY `id_jurusan` (`id_jurusan`);

--
-- Indeks untuk tabel `tb_login`
--
ALTER TABLE `tb_login`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_mapel`
--
ALTER TABLE `tb_mapel`
  ADD PRIMARY KEY (`id_mapel`);

--
-- Indeks untuk tabel `tb_materi`
--
ALTER TABLE `tb_materi`
  ADD PRIMARY KEY (`id_materi`),
  ADD KEY `id_mengajar` (`id_mengajar`),
  ADD KEY `id_kelas` (`id_kelas`) USING BTREE;

--
-- Indeks untuk tabel `tb_mengajar`
--
ALTER TABLE `tb_mengajar`
  ADD PRIMARY KEY (`id_mengajar`),
  ADD KEY `id_kelas` (`id_kelas`),
  ADD KEY `id_mapel` (`id_mapel`),
  ADD KEY `nip` (`nip`);

--
-- Indeks untuk tabel `tb_pertanyaan`
--
ALTER TABLE `tb_pertanyaan`
  ADD PRIMARY KEY (`id_pertanyaan`),
  ADD KEY `jawaban_benar` (`jawaban_benar`);

--
-- Indeks untuk tabel `tb_result`
--
ALTER TABLE `tb_result`
  ADD PRIMARY KEY (`id_hasil`),
  ADD KEY `id_tugas` (`id_tugas`),
  ADD KEY `nis` (`nis`);

--
-- Indeks untuk tabel `tb_siswa`
--
ALTER TABLE `tb_siswa`
  ADD PRIMARY KEY (`nis`),
  ADD KEY `id_kelas` (`id_kelas`),
  ADD KEY `id` (`id`);

--
-- Indeks untuk tabel `tb_tugas`
--
ALTER TABLE `tb_tugas`
  ADD PRIMARY KEY (`id_tugas`),
  ADD KEY `id_mengajar` (`id_mengajar`);

--
-- Indeks untuk tabel `tb_ujian`
--
ALTER TABLE `tb_ujian`
  ADD PRIMARY KEY (`id_ujian`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_filetugas`
--
ALTER TABLE `tb_filetugas`
  MODIFY `id_file` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

--
-- AUTO_INCREMENT untuk tabel `tb_jawaban`
--
ALTER TABLE `tb_jawaban`
  MODIFY `id_jawaban` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_jurusan`
--
ALTER TABLE `tb_jurusan`
  MODIFY `id_jurusan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT untuk tabel `tb_kelas`
--
ALTER TABLE `tb_kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `tb_login`
--
ALTER TABLE `tb_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT untuk tabel `tb_mapel`
--
ALTER TABLE `tb_mapel`
  MODIFY `id_mapel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_materi`
--
ALTER TABLE `tb_materi`
  MODIFY `id_materi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `tb_mengajar`
--
ALTER TABLE `tb_mengajar`
  MODIFY `id_mengajar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tb_pertanyaan`
--
ALTER TABLE `tb_pertanyaan`
  MODIFY `id_pertanyaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `tb_result`
--
ALTER TABLE `tb_result`
  MODIFY `id_hasil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_tugas`
--
ALTER TABLE `tb_tugas`
  MODIFY `id_tugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tb_ujian`
--
ALTER TABLE `tb_ujian`
  MODIFY `id_ujian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_filetugas`
--
ALTER TABLE `tb_filetugas`
  ADD CONSTRAINT `tb_filetugas_ibfk_1` FOREIGN KEY (`id_tugas`) REFERENCES `tb_tugas` (`id_tugas`);

--
-- Ketidakleluasaan untuk tabel `tb_guru`
--
ALTER TABLE `tb_guru`
  ADD CONSTRAINT `id2` FOREIGN KEY (`id`) REFERENCES `tb_login` (`id`);

--
-- Ketidakleluasaan untuk tabel `tb_jawaban`
--
ALTER TABLE `tb_jawaban`
  ADD CONSTRAINT `tb_jawaban_ibfk_1` FOREIGN KEY (`id_pertanyaan`) REFERENCES `tb_pertanyaan` (`id_pertanyaan`),
  ADD CONSTRAINT `tb_jawaban_ibfk_2` FOREIGN KEY (`nis`) REFERENCES `tb_siswa` (`nis`);

--
-- Ketidakleluasaan untuk tabel `tb_kelas`
--
ALTER TABLE `tb_kelas`
  ADD CONSTRAINT `tb_kelas_ibfk_1` FOREIGN KEY (`id_jurusan`) REFERENCES `tb_jurusan` (`id_jurusan`);

--
-- Ketidakleluasaan untuk tabel `tb_materi`
--
ALTER TABLE `tb_materi`
  ADD CONSTRAINT `tb_materi_ibfk_1` FOREIGN KEY (`id_mengajar`) REFERENCES `tb_mengajar` (`id_mengajar`);

--
-- Ketidakleluasaan untuk tabel `tb_mengajar`
--
ALTER TABLE `tb_mengajar`
  ADD CONSTRAINT `id_kelas` FOREIGN KEY (`id_kelas`) REFERENCES `tb_kelas` (`id_kelas`),
  ADD CONSTRAINT `nip` FOREIGN KEY (`nip`) REFERENCES `tb_guru` (`nip`),
  ADD CONSTRAINT `tb_mengajar_ibfk_1` FOREIGN KEY (`id_mapel`) REFERENCES `tb_mapel` (`id_mapel`);

--
-- Ketidakleluasaan untuk tabel `tb_result`
--
ALTER TABLE `tb_result`
  ADD CONSTRAINT `tb_result_ibfk_2` FOREIGN KEY (`nis`) REFERENCES `tb_siswa` (`nis`);

--
-- Ketidakleluasaan untuk tabel `tb_siswa`
--
ALTER TABLE `tb_siswa`
  ADD CONSTRAINT `tb_siswa_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `tb_kelas` (`id_kelas`),
  ADD CONSTRAINT `tb_siswa_ibfk_3` FOREIGN KEY (`id`) REFERENCES `tb_login` (`id`);

--
-- Ketidakleluasaan untuk tabel `tb_tugas`
--
ALTER TABLE `tb_tugas`
  ADD CONSTRAINT `tb_tugas_ibfk_1` FOREIGN KEY (`id_mengajar`) REFERENCES `tb_mengajar` (`id_mengajar`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
