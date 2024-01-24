-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 10 Jan 2024 pada 13.19
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_akademik_gatra`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_guru`
--

CREATE TABLE `tbl_guru` (
  `id_guru` int(11) NOT NULL,
  `kode_guru` varchar(4) NOT NULL,
  `nip` int(20) NOT NULL,
  `nama_guru` varchar(50) NOT NULL,
  `foto_guru` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_guru`
--

INSERT INTO `tbl_guru` (`id_guru`, `kode_guru`, `nip`, `nama_guru`, `foto_guru`, `password`) VALUES
(1, 'A', 2147483644, 'Drs. Suprayitno', '', '1234'),
(2, 'B', 2147483645, 'Drs. Joko Warsito', 't-2.jpg', '1234'),
(3, 'C', 2147483646, 'Subejo, BA', 't-3.jpg', '1234'),
(4, 'D', 2147483647, 'Hj. Puji Astuti, S.Pd', 't-4.jpg', '1234'),
(5, 'E', 2147483643, 'Dra. Chandrlaroh', 't-5.jpg', '1234'),
(6, 'F', 2147483642, 'Tuti Herawati, S.Pd', 't-6.jpg', '1234'),
(7, 'G', 2147483641, 'Andi Dwi Siswandi, S.Pd', 't-7.jpg', '1234'),
(8, 'H', 2147483640, 'Indah Putriasih, SIP', 't-8.jpg', '1234'),
(9, 'J', 2147483639, 'Mufid', '', '1234'),
(10, 'K', 2147483638, 'Agus Susanto, S.Pd', '', '1234'),
(11, 'L', 5648741, 'Ike Indrawati, S.Pd', '', '1234'),
(12, 'M', 242135, 'Hartatik, SE', '', '1234'),
(13, 'N', 2421356, 'Rusmaliana', '', '1234'),
(14, 'O', 242135678, 'Lailatul Jannah, S.Pd', '', '1234'),
(15, 'P', 242135679, 'Nurkhayati, S.Kom', '', '1234'),
(16, 'Q', 242135680, 'Murnni, S.Pd', '', '1234'),
(17, 'X', 242135681, 'Riesa Putri Febriani,S.Kom', '1704864547_0649a3f47a6bcbaade46.jpg', '1234'),
(18, 'R', 242135682, 'Ulfa Mustafidah, SE', '', '1234'),
(19, 'S', 242135683, 'Ikrimatul Karimah, S.Pd', '', '1234'),
(20, 'T', 242135684, 'Pitaloka Diah Safitri, S.Pd', '', '1234'),
(21, 'U', 242135685, 'Drs. Ratnawati', '', '1234'),
(22, 'V', 242135686, 'Harlina Mutia Zulfa, S.Pd', '1704118186_a8c2718cb8e544a19c0a.jpeg', '1234'),
(23, 'W', 242135687, 'Muhammad Imamuddin, S.Kom', '1704118076_42de24f5fc86a279b06b.jpg', '1234'),
(126, 'G012', 324567, 'aisyah', '1704117920_13e26a0684bc6ef58e06.jpg', '1234');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_jadwal`
--

CREATE TABLE `tbl_jadwal` (
  `id_jadwal` int(11) NOT NULL,
  `id_jurusan` int(11) NOT NULL,
  `id_ta` int(4) NOT NULL,
  `id_rombel` int(11) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `id_guru` int(11) NOT NULL,
  `hari` varchar(255) NOT NULL,
  `jam_ke` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_jadwal`
--

INSERT INTO `tbl_jadwal` (`id_jadwal`, `id_jurusan`, `id_ta`, `id_rombel`, `id_mapel`, `id_guru`, `hari`, `jam_ke`) VALUES
(1, 1, 1, 1, 1, 5, 'Senin', '07.00 - 09.00'),
(8, 1, 1, 1, 6, 17, 'Selasa', '09.55-12.55'),
(9, 1, 1, 1, 15, 17, 'Sabtu', '11.15 - 12.55'),
(10, 1, 1, 1, 14, 17, 'Senin', '11.15 - 12.55'),
(11, 1, 1, 1, 14, 19, 'Rabu', '11.15 - 12.55'),
(12, 2, 1, 3, 7, 15, 'Senin', '07.00 - 09.00'),
(14, 1, 1, 4, 13, 17, 'Senin', '07.00-09.00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_jurusan`
--

CREATE TABLE `tbl_jurusan` (
  `id_jurusan` int(11) NOT NULL,
  `kode_jurusan` varchar(10) NOT NULL,
  `jurusan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_jurusan`
--

INSERT INTO `tbl_jurusan` (`id_jurusan`, `kode_jurusan`, `jurusan`) VALUES
(1, 'MM', 'Multimedia'),
(2, 'AK', 'Akuntansi'),
(3, 'AP', 'Administrasi Perkantoran'),
(4, 'DKV', 'Desain Komunikasi Visual');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kelas`
--

CREATE TABLE `tbl_kelas` (
  `id_kelas` int(11) NOT NULL,
  `kelas` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_kelas`
--

INSERT INTO `tbl_kelas` (`id_kelas`, `kelas`) VALUES
(1, 'Kelas 10'),
(2, 'Kelas 11'),
(3, 'Kelas 12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_mapel`
--

CREATE TABLE `tbl_mapel` (
  `id_mapel` int(11) NOT NULL,
  `kode_mapel` varchar(10) NOT NULL,
  `mapel` varchar(255) NOT NULL,
  `jam_pelajaran` int(1) NOT NULL,
  `kategori` varchar(10) NOT NULL,
  `smt` int(1) NOT NULL,
  `semester` varchar(10) NOT NULL,
  `id_jurusan` int(11) NOT NULL,
  `id_guru` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_mapel`
--

INSERT INTO `tbl_mapel` (`id_mapel`, `kode_mapel`, `mapel`, `jam_pelajaran`, `kategori`, `smt`, `semester`, `id_jurusan`, `id_guru`) VALUES
(1, 'MPPAMM10', 'Pendidikan Agama', 2, 'Umum', 1, 'Ganjil', 1, 5),
(2, 'MPBIMM10', 'Bahasa Indonesia', 2, 'Umum', 1, 'Ganjil', 1, 11),
(3, 'MPPSMM10', 'Sejarah', 2, 'Umum', 1, 'Ganjil', 1, 3),
(4, 'MPBJMM10', 'Bahasa Jawa', 2, 'Umum', 1, 'Ganjil', 1, 20),
(6, 'MPKIMM10', 'Informatika', 4, 'Kejuruan', 1, 'Ganjil', 1, 17),
(7, 'MPKIAK10', 'Informatika', 4, 'Kejuruan', 1, 'Ganjil', 2, 15),
(8, 'MPKIAP10', 'Informatika', 4, 'Kejuruan', 1, 'Ganjil', 3, 15),
(13, 'MPKDGP11', 'Desain Grafis Percetakan', 6, 'Kejuruan', 1, 'Ganjil', 1, 17),
(14, 'MPKDKV10', 'Dasar Dasar Keahlian', 6, 'Kejuruan', 1, 'Ganjil', 1, 19),
(15, 'MPKB10', 'Broadcasting', 2, 'Kejuruan', 1, 'Ganjil', 1, 17),
(16, 'MPMMIPAS10', 'IPAS', 4, 'Umum', 1, 'Ganjil', 1, 19),
(18, 'MPMMMTK10', 'Matematika', 4, 'Umum', 1, 'Ganjil', 1, 7),
(20, 'MPMMMTK11', 'Matematika', 4, 'Umum', 1, 'Ganjil', 1, 7),
(22, 'MPKDKV10', 'Dasar Dasar Keahlian', 6, 'Kejuruan', 1, 'Ganjil', 1, 17),
(26, 'MP08', 'Penjas', 3, 'Umum', 1, 'Ganjil', 1, 9);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_penilaian`
--

CREATE TABLE `tbl_penilaian` (
  `id_nilai` int(11) NOT NULL,
  `id_ta` int(4) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `id_rombel` int(11) NOT NULL,
  `id_jadwal` int(11) NOT NULL,
  `nilai` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_penilaian`
--

INSERT INTO `tbl_penilaian` (`id_nilai`, `id_ta`, `id_siswa`, `id_rombel`, `id_jadwal`, `nilai`) VALUES
(14, 1, 12, 1, 8, 75),
(15, 1, 10, 1, 8, 78);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_rombel`
--

CREATE TABLE `tbl_rombel` (
  `id_rombel` int(11) NOT NULL,
  `id_kelas` varchar(15) NOT NULL,
  `nama_rombel` varchar(50) NOT NULL,
  `id_jurusan` int(11) NOT NULL,
  `id_ta` int(4) NOT NULL,
  `id_guru` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_rombel`
--

INSERT INTO `tbl_rombel` (`id_rombel`, `id_kelas`, `nama_rombel`, `id_jurusan`, `id_ta`, `id_guru`) VALUES
(1, '1', '10-MM1', 1, 1, 19),
(2, '1', '10-MM2', 1, 1, 2),
(3, '1', '10-AK1', 2, 1, 3),
(4, '2', '11-MM1', 1, 1, 16),
(5, '1', '10-AP1', 3, 1, 7);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_sekolah`
--

CREATE TABLE `tbl_sekolah` (
  `id` int(1) NOT NULL,
  `nama_sekolah` varchar(50) NOT NULL,
  `alamat_sekolah` varchar(255) NOT NULL,
  `logo_sekolah` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_sekolah`
--

INSERT INTO `tbl_sekolah` (`id`, `nama_sekolah`, `alamat_sekolah`, `logo_sekolah`) VALUES
(1, 'SMK Gatra Praja Pekalongan', 'Jl. Perintis Kemerdekaan no.9 Pekalongn', 'gatra_praja_logo.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_siswa`
--

CREATE TABLE `tbl_siswa` (
  `id_siswa` int(11) NOT NULL,
  `NIS` varchar(11) NOT NULL,
  `nama_siswa` varchar(100) NOT NULL,
  `id_jurusan` int(11) NOT NULL,
  `foto_siswa` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `tahun_angkatan` year(4) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `status` int(1) NOT NULL,
  `id_rombel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_siswa`
--

INSERT INTO `tbl_siswa` (`id_siswa`, `NIS`, `nama_siswa`, `id_jurusan`, `foto_siswa`, `password`, `tahun_angkatan`, `id_kelas`, `status`, `id_rombel`) VALUES
(10, '5431', 'Sindibad Nugroho', 1, '1704121112_4f2e4fd81d1c38e5cc90.jpg', '1234', 2022, 1, 1, 1),
(12, '5430', 'Reza Al Farizi', 1, '1704171158_4fbc804c2080344876ed.jpg', '1234', 2022, 1, 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_ta`
--

CREATE TABLE `tbl_ta` (
  `id_ta` int(4) NOT NULL,
  `ta1` year(4) NOT NULL,
  `ta2` year(4) NOT NULL,
  `semester` varchar(10) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_ta`
--

INSERT INTO `tbl_ta` (`id_ta`, `ta1`, `ta2`, `semester`, `status`) VALUES
(1, 2023, 2024, 'Ganjil', 1),
(2, 2023, 2024, 'Genap', 0),
(3, 2024, 2025, 'Ganjil', 0),
(4, 2024, 2025, 'Genap', 0),
(6, 2025, 2026, 'Genap', 0),
(7, 2025, 2026, 'Ganjil', 0),
(10, 2022, 2023, 'Ganjil', 0),
(11, 2022, 2023, 'Genap', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(2) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` int(1) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `nama_user`, `username`, `password`, `level`, `foto`) VALUES
(1, 'Ayu Varisma Putri', 'admin', 'admin', 1, 'foto.jpg'),
(3, 'Dea Ayu', 'dea', '1234', 1, '1703502640_8d0fa5ce1f36605ccad0.jpg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_guru`
--
ALTER TABLE `tbl_guru`
  ADD PRIMARY KEY (`id_guru`);

--
-- Indeks untuk tabel `tbl_jadwal`
--
ALTER TABLE `tbl_jadwal`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indeks untuk tabel `tbl_jurusan`
--
ALTER TABLE `tbl_jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indeks untuk tabel `tbl_kelas`
--
ALTER TABLE `tbl_kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indeks untuk tabel `tbl_mapel`
--
ALTER TABLE `tbl_mapel`
  ADD PRIMARY KEY (`id_mapel`);

--
-- Indeks untuk tabel `tbl_penilaian`
--
ALTER TABLE `tbl_penilaian`
  ADD PRIMARY KEY (`id_nilai`);

--
-- Indeks untuk tabel `tbl_rombel`
--
ALTER TABLE `tbl_rombel`
  ADD PRIMARY KEY (`id_rombel`);

--
-- Indeks untuk tabel `tbl_sekolah`
--
ALTER TABLE `tbl_sekolah`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_siswa`
--
ALTER TABLE `tbl_siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- Indeks untuk tabel `tbl_ta`
--
ALTER TABLE `tbl_ta`
  ADD PRIMARY KEY (`id_ta`);

--
-- Indeks untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_guru`
--
ALTER TABLE `tbl_guru`
  MODIFY `id_guru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- AUTO_INCREMENT untuk tabel `tbl_jadwal`
--
ALTER TABLE `tbl_jadwal`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `tbl_jurusan`
--
ALTER TABLE `tbl_jurusan`
  MODIFY `id_jurusan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `tbl_kelas`
--
ALTER TABLE `tbl_kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tbl_mapel`
--
ALTER TABLE `tbl_mapel`
  MODIFY `id_mapel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `tbl_penilaian`
--
ALTER TABLE `tbl_penilaian`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `tbl_rombel`
--
ALTER TABLE `tbl_rombel`
  MODIFY `id_rombel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `tbl_sekolah`
--
ALTER TABLE `tbl_sekolah`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_siswa`
--
ALTER TABLE `tbl_siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `tbl_ta`
--
ALTER TABLE `tbl_ta`
  MODIFY `id_ta` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tbl_rombel`
--
ALTER TABLE `tbl_rombel`
  ADD CONSTRAINT `tbl_rombel_ibfk_1` FOREIGN KEY (`id_guru`) REFERENCES `tbl_guru` (`id_guru`),
  ADD CONSTRAINT `tbl_rombel_ibfk_2` FOREIGN KEY (`id_jurusan`) REFERENCES `tbl_jurusan` (`id_jurusan`),
  ADD CONSTRAINT `tbl_rombel_ibfk_3` FOREIGN KEY (`id_ta`) REFERENCES `tbl_ta` (`id_ta`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
