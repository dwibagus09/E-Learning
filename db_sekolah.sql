-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2020 at 09:38 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

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
-- Table structure for table `tb_filetugas`
--

CREATE TABLE `tb_filetugas` (
  `id_file` int(11) NOT NULL,
  `id_tugas` int(11) NOT NULL,
  `file_tugas` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_guru`
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
-- Dumping data for table `tb_guru`
--

INSERT INTO `tb_guru` (`nip`, `nama_guru`, `alamat`, `foto`, `jenis_kelamin`, `id`) VALUES
(126782, 'Dwi Bagus Krisdianto Wicaksono', 'Kp.Krajan RT01/RW03 Selomukti Kec.Mlandingan - Situbondo', '1586731749666.png', 'Pria', 42),
(232434, 'sahdi', 'gfhfgfh', '', 'Pria', 51);

-- --------------------------------------------------------

--
-- Table structure for table `tb_jawaban`
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
-- Table structure for table `tb_jurusan`
--

CREATE TABLE `tb_jurusan` (
  `id_jurusan` int(11) NOT NULL,
  `nama_jurusan` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_jurusan`
--

INSERT INTO `tb_jurusan` (`id_jurusan`, `nama_jurusan`) VALUES
(25, 'IPA'),
(32, 'IPS'),
(33, 'Bahasa Inggris');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kelas`
--

CREATE TABLE `tb_kelas` (
  `id_kelas` int(11) NOT NULL,
  `kelas` varchar(10) NOT NULL,
  `nama_kelas` varchar(10) NOT NULL,
  `id_jurusan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kelas`
--

INSERT INTO `tb_kelas` (`id_kelas`, `kelas`, `nama_kelas`, `id_jurusan`) VALUES
(12, '10', 'IPA 1', 25),
(13, '10', 'IPA 2', 25),
(15, '10', 'IPS 1', 32),
(17, '10', 'IPA 1', 25);

-- --------------------------------------------------------

--
-- Table structure for table `tb_login`
--

CREATE TABLE `tb_login` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  `akses` enum('1','2','3') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_login`
--

INSERT INTO `tb_login` (`id`, `username`, `password`, `akses`) VALUES
(1, 'admin', 'admin', '1'),
(37, '0001', '0001', '3'),
(42, 'dwibagus', 'dwibagus', '2'),
(49, 'dasa', 'fdfd', '3'),
(51, 'sahdi', 'sahdi', '2');

-- --------------------------------------------------------

--
-- Table structure for table `tb_mapel`
--

CREATE TABLE `tb_mapel` (
  `id_mapel` int(11) NOT NULL,
  `nama` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_mapel`
--

INSERT INTO `tb_mapel` (`id_mapel`, `nama`) VALUES
(1, 'Bahasa Indonesia'),
(2, 'Matematika');

-- --------------------------------------------------------

--
-- Table structure for table `tb_materi`
--

CREATE TABLE `tb_materi` (
  `id_materi` int(11) NOT NULL,
  `nama_materi` varchar(12) NOT NULL,
  `file_materi` varchar(100) NOT NULL,
  `id_mengajar` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_materi`
--

INSERT INTO `tb_materi` (`id_materi`, `nama_materi`, `file_materi`, `id_mengajar`, `id_kelas`) VALUES
(1, 'Bahasa Indo', 'ashjsjdhjsd.pdf', 1, 0),
(2, 'BIN', '1588630708312.pdf', 1, 13);

-- --------------------------------------------------------

--
-- Table structure for table `tb_mengajar`
--

CREATE TABLE `tb_mengajar` (
  `id_mengajar` int(11) NOT NULL,
  `id_kelas` int(11) DEFAULT NULL,
  `id_mapel` int(11) DEFAULT NULL,
  `nip` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_mengajar`
--

INSERT INTO `tb_mengajar` (`id_mengajar`, `id_kelas`, `id_mapel`, `nip`) VALUES
(1, 12, 1, 126782),
(2, 12, NULL, NULL),
(4, 13, 1, 126782),
(6, 12, 2, 232434);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pertanyaan`
--

CREATE TABLE `tb_pertanyaan` (
  `id_pertanyaan` int(11) NOT NULL,
  `soal` varchar(255) NOT NULL,
  `a` varchar(100) NOT NULL,
  `b` varchar(100) NOT NULL,
  `c` varchar(100) NOT NULL,
  `d` varchar(100) NOT NULL,
  `id_ujian` int(11) NOT NULL,
  `jawaban_benar` int(1) NOT NULL,
  `keterangan` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pertanyaan`
--

INSERT INTO `tb_pertanyaan` (`id_pertanyaan`, `soal`, `a`, `b`, `c`, `d`, `id_ujian`, `jawaban_benar`, `keterangan`) VALUES
(1, 'A long time ago in a galaxy far, far away...', 'sdfsdf', 'sdfdsf', 'sdfsdf', 'dsfsdf', 2, 0, ''),
(2, 'A long time ago in a galaxy far, far away...', 'dsfds', 'dsfdsf', 'dsfsdf', 'dsfsdf', 2, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_result`
--

CREATE TABLE `tb_result` (
  `id_hasil` int(11) NOT NULL,
  `nilai` int(11) NOT NULL,
  `id_tugas` int(11) NOT NULL,
  `nis` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_siswa`
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
-- Dumping data for table `tb_siswa`
--

INSERT INTO `tb_siswa` (`nis`, `nama_siswa`, `alamat`, `jenis_kelamin`, `No_Telepon`, `foto`, `id_kelas`, `id`) VALUES
(23324, 'fdfdf', 'dfdfdg', 'Wanita', '435435', '1588403954385.png', 12, 49);

-- --------------------------------------------------------

--
-- Table structure for table `tb_tugas`
--

CREATE TABLE `tb_tugas` (
  `id_tugas` int(11) NOT NULL,
  `kd_tugas` varchar(10) NOT NULL,
  `deskripsi` varchar(100) NOT NULL,
  `waktu_mulai` date NOT NULL,
  `waktu_selesai` date NOT NULL,
  `id_mengajar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_ujian`
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
-- Dumping data for table `tb_ujian`
--

INSERT INTO `tb_ujian` (`id_ujian`, `tgl_ujian`, `keterangan`, `id_mapel`, `id_kelas`, `id_mengajar`) VALUES
(1, '2020-05-07', 'dwdd', 1, 13, 1),
(2, '2020-05-09', 'asdsds', 1, 12, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_filetugas`
--
ALTER TABLE `tb_filetugas`
  ADD PRIMARY KEY (`id_file`),
  ADD UNIQUE KEY `id_tugas` (`id_tugas`);

--
-- Indexes for table `tb_guru`
--
ALTER TABLE `tb_guru`
  ADD PRIMARY KEY (`nip`),
  ADD KEY `id2` (`id`);

--
-- Indexes for table `tb_jawaban`
--
ALTER TABLE `tb_jawaban`
  ADD PRIMARY KEY (`id_jawaban`),
  ADD KEY `id_pertanyaan` (`id_pertanyaan`),
  ADD KEY `nis` (`nis`);

--
-- Indexes for table `tb_jurusan`
--
ALTER TABLE `tb_jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indexes for table `tb_kelas`
--
ALTER TABLE `tb_kelas`
  ADD PRIMARY KEY (`id_kelas`),
  ADD KEY `id_jurusan` (`id_jurusan`);

--
-- Indexes for table `tb_login`
--
ALTER TABLE `tb_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_mapel`
--
ALTER TABLE `tb_mapel`
  ADD PRIMARY KEY (`id_mapel`);

--
-- Indexes for table `tb_materi`
--
ALTER TABLE `tb_materi`
  ADD PRIMARY KEY (`id_materi`),
  ADD UNIQUE KEY `id_kelas` (`id_kelas`),
  ADD KEY `id_mengajar` (`id_mengajar`);

--
-- Indexes for table `tb_mengajar`
--
ALTER TABLE `tb_mengajar`
  ADD PRIMARY KEY (`id_mengajar`),
  ADD KEY `id_kelas` (`id_kelas`),
  ADD KEY `id_mapel` (`id_mapel`),
  ADD KEY `nip` (`nip`);

--
-- Indexes for table `tb_pertanyaan`
--
ALTER TABLE `tb_pertanyaan`
  ADD PRIMARY KEY (`id_pertanyaan`),
  ADD KEY `id_tugas` (`id_ujian`);

--
-- Indexes for table `tb_result`
--
ALTER TABLE `tb_result`
  ADD PRIMARY KEY (`id_hasil`),
  ADD KEY `id_tugas` (`id_tugas`),
  ADD KEY `nis` (`nis`);

--
-- Indexes for table `tb_siswa`
--
ALTER TABLE `tb_siswa`
  ADD PRIMARY KEY (`nis`),
  ADD KEY `id_kelas` (`id_kelas`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `tb_tugas`
--
ALTER TABLE `tb_tugas`
  ADD PRIMARY KEY (`id_tugas`),
  ADD KEY `id_mengajar` (`id_mengajar`);

--
-- Indexes for table `tb_ujian`
--
ALTER TABLE `tb_ujian`
  ADD PRIMARY KEY (`id_ujian`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_filetugas`
--
ALTER TABLE `tb_filetugas`
  MODIFY `id_file` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_jawaban`
--
ALTER TABLE `tb_jawaban`
  MODIFY `id_jawaban` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_jurusan`
--
ALTER TABLE `tb_jurusan`
  MODIFY `id_jurusan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `tb_kelas`
--
ALTER TABLE `tb_kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tb_login`
--
ALTER TABLE `tb_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `tb_mapel`
--
ALTER TABLE `tb_mapel`
  MODIFY `id_mapel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_materi`
--
ALTER TABLE `tb_materi`
  MODIFY `id_materi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_mengajar`
--
ALTER TABLE `tb_mengajar`
  MODIFY `id_mengajar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_pertanyaan`
--
ALTER TABLE `tb_pertanyaan`
  MODIFY `id_pertanyaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_result`
--
ALTER TABLE `tb_result`
  MODIFY `id_hasil` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_ujian`
--
ALTER TABLE `tb_ujian`
  MODIFY `id_ujian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_filetugas`
--
ALTER TABLE `tb_filetugas`
  ADD CONSTRAINT `tb_filetugas_ibfk_1` FOREIGN KEY (`id_tugas`) REFERENCES `tb_ujian` (`id_ujian`);

--
-- Constraints for table `tb_guru`
--
ALTER TABLE `tb_guru`
  ADD CONSTRAINT `id2` FOREIGN KEY (`id`) REFERENCES `tb_login` (`id`);

--
-- Constraints for table `tb_jawaban`
--
ALTER TABLE `tb_jawaban`
  ADD CONSTRAINT `tb_jawaban_ibfk_1` FOREIGN KEY (`id_pertanyaan`) REFERENCES `tb_pertanyaan` (`id_pertanyaan`),
  ADD CONSTRAINT `tb_jawaban_ibfk_2` FOREIGN KEY (`nis`) REFERENCES `tb_siswa` (`nis`);

--
-- Constraints for table `tb_kelas`
--
ALTER TABLE `tb_kelas`
  ADD CONSTRAINT `tb_kelas_ibfk_1` FOREIGN KEY (`id_jurusan`) REFERENCES `tb_jurusan` (`id_jurusan`);

--
-- Constraints for table `tb_materi`
--
ALTER TABLE `tb_materi`
  ADD CONSTRAINT `tb_materi_ibfk_1` FOREIGN KEY (`id_mengajar`) REFERENCES `tb_mengajar` (`id_mengajar`);

--
-- Constraints for table `tb_mengajar`
--
ALTER TABLE `tb_mengajar`
  ADD CONSTRAINT `id_kelas` FOREIGN KEY (`id_kelas`) REFERENCES `tb_kelas` (`id_kelas`),
  ADD CONSTRAINT `nip` FOREIGN KEY (`nip`) REFERENCES `tb_guru` (`nip`),
  ADD CONSTRAINT `tb_mengajar_ibfk_1` FOREIGN KEY (`id_mapel`) REFERENCES `tb_mapel` (`id_mapel`);

--
-- Constraints for table `tb_pertanyaan`
--
ALTER TABLE `tb_pertanyaan`
  ADD CONSTRAINT `tb_pertanyaan_ibfk_1` FOREIGN KEY (`id_ujian`) REFERENCES `tb_ujian` (`id_ujian`);

--
-- Constraints for table `tb_result`
--
ALTER TABLE `tb_result`
  ADD CONSTRAINT `tb_result_ibfk_2` FOREIGN KEY (`nis`) REFERENCES `tb_siswa` (`nis`);

--
-- Constraints for table `tb_siswa`
--
ALTER TABLE `tb_siswa`
  ADD CONSTRAINT `tb_siswa_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `tb_kelas` (`id_kelas`),
  ADD CONSTRAINT `tb_siswa_ibfk_3` FOREIGN KEY (`id`) REFERENCES `tb_login` (`id`);

--
-- Constraints for table `tb_tugas`
--
ALTER TABLE `tb_tugas`
  ADD CONSTRAINT `tb_tugas_ibfk_1` FOREIGN KEY (`id_mengajar`) REFERENCES `tb_mengajar` (`id_mengajar`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
