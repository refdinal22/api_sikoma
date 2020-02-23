-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Feb 2020 pada 07.53
-- Versi server: 10.3.16-MariaDB
-- Versi PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbkompetisi_mhs`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbm_competitions`
--

CREATE TABLE `tbm_competitions` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `institute` varchar(100) NOT NULL,
  `location` varchar(100) NOT NULL,
  `competition_level_id` int(1) NOT NULL,
  `year` year(4) NOT NULL,
  `regist_closedate` date NOT NULL,
  `regist_opendate` date NOT NULL,
  `event_startdate` date NOT NULL,
  `event_enddate` date NOT NULL,
  `exception` int(2) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tbm_competitions`
--

INSERT INTO `tbm_competitions` (`id`, `name`, `institute`, `location`, `competition_level_id`, `year`, `regist_closedate`, `regist_opendate`, `event_startdate`, `event_enddate`, `exception`, `created_at`, `updated_at`) VALUES
(1, 'Gemastik', 'Universitas Gajah Mada', 'Daerah Istimewa Yogyakarta', 2, 2019, '2019-10-31', '2019-10-10', '2019-11-10', '2019-11-16', 1, '2019-11-12 05:57:35', '2019-12-13 06:51:28'),
(2, 'Ideafuse', 'STMIK Mikroskill', 'Medan', 2, 2021, '2019-11-16', '2019-11-13', '2019-11-19', '2019-11-26', 0, '2019-11-12 07:22:01', '2019-11-12 07:22:01'),
(3, 'Arkavidia', 'Institut Teknologi Bandung', 'Bandung', 2, 2020, '2019-11-15', '2019-11-11', '2020-01-13', '2020-01-13', 0, '2019-11-15 12:19:40', '2019-11-15 12:19:40'),
(4, 'COMPFEST', 'UGM', 'Yogyakarta', 2, 2019, '2019-11-21', '2019-11-19', '2019-12-16', '2019-12-16', 1, '2019-11-17 18:32:36', '2019-12-13 07:11:57'),
(5, 'Hackathon ', 'Binus', 'Jakarta', 2, 2019, '2019-11-22', '2019-11-18', '2019-11-25', '2019-11-29', 0, '2019-11-17 18:51:53', '2019-11-17 18:51:53'),
(6, 'Tisigram', 'POLBAN', 'Bandung', 4, 2019, '2019-11-20', '2019-11-18', '2019-11-25', '2019-11-25', 0, '2019-11-18 03:57:23', '2019-11-18 03:57:23'),
(7, 'Kompetisi Mahasiswa bidang Informatika Politeknik Nasional (KMIPN)', 'POLBAN', 'Bandung', 2, 2019, '2019-12-23', '2019-12-02', '2019-12-28', '2019-12-29', 0, '2019-12-01 15:55:15', '2019-12-13 07:10:11'),
(8, 'FINDIT', 'UGM', 'Yogyakarta', 2, 2019, '2019-12-11', '2019-12-09', '2019-12-16', '2019-12-16', 0, '2019-12-06 01:07:49', '2019-12-06 01:07:49'),
(9, 'KJIKBGI', 'PNJ', 'Jakarta', 2, 2019, '2019-12-09', '2019-12-07', '2019-12-16', '2019-12-16', 0, '2019-12-06 02:59:19', '2019-12-06 02:59:19'),
(10, 'Kompetisi Mobil Listrik Indonesia (KMLI)', 'Politeknik Negeri Bandung', 'Bandung', 2, 2019, '2019-12-15', '2019-12-03', '2019-12-20', '2019-12-20', 0, '2019-12-13 05:49:02', '2019-12-13 05:49:02'),
(11, 'Hackathon', 'POLBAN', 'Bandung', 2, 2019, '2019-12-23', '2019-12-19', '2019-12-27', '2019-12-27', 0, '2019-12-20 01:39:01', '2019-12-20 01:39:01'),
(12, 'FIND IT', 'UGM', 'Yogyakarta', 2, 2020, '2020-02-22', '2020-02-19', '2020-02-24', '2020-02-24', 1, '2020-02-18 07:22:42', '2020-02-18 07:23:36');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbm_competitions_cat`
--

CREATE TABLE `tbm_competitions_cat` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbm_competitions_cat`
--

INSERT INTO `tbm_competitions_cat` (`id`, `name`, `created_at`, `updated_at`) VALUES
(2, 'Capture The Flag', '2019-11-30 17:00:00', '2019-12-02 23:17:07'),
(5, 'Competitive Programming', '2019-12-01 11:31:29', '2019-12-02 23:17:15'),
(6, 'Yang Lainnya', '2019-12-02 23:16:55', '2019-12-02 23:16:55'),
(7, 'Robotika', '2019-12-13 04:06:03', '2019-12-13 04:06:03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbm_competition_levels`
--

CREATE TABLE `tbm_competition_levels` (
  `id` int(11) NOT NULL,
  `level` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tbm_competition_levels`
--

INSERT INTO `tbm_competition_levels` (`id`, `level`, `created_at`, `update_at`) VALUES
(1, 'Internasional', '2019-11-12 05:57:35', '2019-11-12 05:57:35'),
(2, 'Nasional', '2019-11-12 05:57:35', '2019-11-12 05:57:35'),
(3, 'Provinsi', '2019-11-12 05:57:35', '2019-11-12 05:57:35'),
(4, 'Kota', '2019-11-12 05:57:35', '2019-11-12 05:57:35');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbm_department`
--

CREATE TABLE `tbm_department` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tbm_department`
--

INSERT INTO `tbm_department` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Teknik Komputer dan Informatika', '2019-11-12 07:20:51', '2019-12-01 11:57:41'),
(4, 'Teknik Sipil', '2019-12-03 02:27:39', '2019-12-03 02:27:39'),
(5, 'Teknik Mesin', '2019-12-03 02:27:39', '2019-12-03 02:27:39'),
(6, 'Teknik Refrigerasi dan Tata Udara', '2019-12-03 02:27:39', '2019-12-03 02:27:39'),
(7, 'Teknik Konversi Energi', '2019-12-03 02:27:39', '2019-12-03 02:27:39'),
(8, 'Teknik Elektro', '2019-12-03 02:27:39', '2019-12-03 02:27:39'),
(9, 'Teknik Kimia', '2019-12-03 02:27:39', '2019-12-03 02:27:39'),
(10, 'Akuntansi', '2019-12-03 02:27:39', '2019-12-03 02:27:39'),
(11, 'Administrasi Niaga', '2019-12-03 02:27:39', '2019-12-03 02:27:39'),
(12, 'Bahasa Inggris', '2019-12-03 02:27:39', '2019-12-03 02:27:39'),
(13, 'Teknik Telekomunikasi', '2019-12-03 02:36:33', '2019-12-03 02:36:33');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbm_lecturers`
--

CREATE TABLE `tbm_lecturers` (
  `id` int(11) NOT NULL,
  `nip` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `tbm_lecturers`
--

INSERT INTO `tbm_lecturers` (`id`, `nip`, `name`, `user_id`, `department_id`, `created_at`, `updated_at`) VALUES
(1, '197407182001121002 ', 'Yudi Widhiyasana, S.Si., M.T. ', 9, 1, '2019-11-17 13:38:26', '2019-11-17 13:38:26');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbm_organization`
--

CREATE TABLE `tbm_organization` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `acronym` varchar(20) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `max_unfinished_submission` int(11) NOT NULL DEFAULT 3,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbm_organization`
--

INSERT INTO `tbm_organization` (`id`, `name`, `acronym`, `user_id`, `max_unfinished_submission`, `created_at`, `updated_at`) VALUES
(1, 'Himpunan Mahasiswa Komputer', 'HIMAKOM', 10, 3, '2019-12-01 13:10:54', '2019-12-13 02:40:26'),
(7, 'Himpunan Mahasiswa Telekomunikasi', 'HIMATEL', 15, 3, '2019-12-06 00:54:11', '2019-12-06 00:54:11');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbm_reviewers`
--

CREATE TABLE `tbm_reviewers` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbm_revision_notes`
--

CREATE TABLE `tbm_revision_notes` (
  `id` int(11) NOT NULL,
  `proposal_id` int(11) NOT NULL,
  `budget_notes` text NOT NULL,
  `content_notes` text NOT NULL,
  `due_date` datetime DEFAULT NULL,
  `status` int(2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tbm_revision_notes`
--

INSERT INTO `tbm_revision_notes` (`id`, `proposal_id`, `budget_notes`, `content_notes`, `due_date`, `status`, `created_at`, `updated_at`) VALUES
(16, 51, '-', '-', '2019-12-15 00:00:00', 1, '2019-12-13 05:26:12', '2019-12-13 05:26:12'),
(17, 52, 'Tidak Sesuai Format', '', '2019-12-17 00:00:00', 1, '2019-12-13 05:27:41', '2019-12-13 05:32:53'),
(19, 55, 'Tidak sesuai format', '', '2019-12-23 00:00:00', 1, '2019-12-20 01:23:06', '2019-12-20 01:25:36'),
(20, 55, 'belum sesuai', 'format salah', '2019-12-23 00:00:00', 1, '2019-12-20 01:28:15', '2019-12-20 01:30:53');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbm_students`
--

CREATE TABLE `tbm_students` (
  `id` int(11) NOT NULL,
  `nim` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `year` year(4) NOT NULL,
  `study_programme_id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL DEFAULT 0,
  `email` varchar(40) COLLATE utf8_unicode_ci NOT NULL DEFAULT '-',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `tbm_students`
--

INSERT INTO `tbm_students` (`id`, `nim`, `name`, `year`, `study_programme_id`, `department_id`, `email`, `created_at`, `updated_at`) VALUES
(1, 171511023, 'Refdinal Tubagus', 2017, 1, 1, 'refdinal.tubagus.tif17@polban.ac.id', '2019-11-14 17:57:24', '2019-11-14 17:57:24'),
(2, 171511046, 'Kiki Pratiwi', 2017, 1, 1, 'kiki.pratiwi.tif17@polban.ac.id', '2019-11-14 17:57:54', '2019-11-14 17:57:54'),
(3, 171511050, 'Mufida Nuha Salimah', 2017, 1, 1, 'mufida.nuha.tif17@polban.ac.id', '2019-11-14 17:58:33', '2019-11-14 17:58:33'),
(4, 171511019, 'Muhamad Wahyu Maulana Akbar', 2017, 1, 0, 'muhamad.wahyu.tif17@polban.ac.id', '2019-12-03 02:56:26', '2019-12-03 02:56:26'),
(5, 171511001, 'Alfina Sukma Kinanti', 2017, 1, 0, 'alfina.sukma.tif17@polban.ac.id', '2019-12-03 03:02:14', '2019-12-06 00:55:05'),
(6, 171511016, 'Mochamad Dava Harvela Dermawan', 2017, 1, 0, 'dava@polban.ac.id', '2019-12-06 02:39:15', '2019-12-06 02:39:15'),
(7, 171511006, 'Egi Nurfikri', 2017, 1, 0, 'egi@polban.ac.id', '2019-12-06 02:39:38', '2019-12-06 02:39:38'),
(8, 171511024, 'Rico Joviandri Inspirano', 2017, 1, 0, 'rico@polban.ac.id', '2019-12-06 02:39:58', '2019-12-06 02:39:58');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbm_study_programme`
--

CREATE TABLE `tbm_study_programme` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `department_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `tbm_study_programme`
--

INSERT INTO `tbm_study_programme` (`id`, `name`, `department_id`, `created_at`, `updated_at`) VALUES
(1, 'D3 Teknik Infomatika', 1, '2019-11-14 17:56:00', '2019-11-14 17:56:00'),
(3, 'D4 Teknik Informatika', 1, '2019-12-01 12:50:27', '2019-12-01 12:50:27'),
(4, 'D3-Teknik Konstruksi Gedung', 4, '2019-12-03 02:35:24', '2019-12-03 02:35:24'),
(5, 'D3-Teknik Konstruksi Sipil', 4, '2019-12-03 02:35:24', '2019-12-03 02:35:24'),
(6, 'D3-Teknik Konstruksi Gedung', 4, '2019-12-03 02:35:48', '2019-12-03 02:35:48'),
(7, 'D3-Teknik Konstruksi Sipil', 4, '2019-12-03 02:35:48', '2019-12-03 02:35:48'),
(8, 'D4-Teknik Perancangan Jalan Dan Jembatan', 4, '2019-12-03 02:35:48', '2019-12-03 02:35:48'),
(9, 'D4-Teknik Perawatan dan Perbaikan Gedung', 4, '2019-12-03 02:35:48', '2019-12-03 02:35:48'),
(10, 'D3-Teknik Mesin', 5, '2019-12-03 02:35:48', '2019-12-03 02:35:48'),
(11, 'D3-Aeronautika', 5, '2019-12-03 02:35:48', '2019-12-03 02:35:48'),
(12, 'D4-Teknik Perancangan dan Konstruksi Mesin', 5, '2019-12-03 02:35:48', '2019-12-03 02:35:48'),
(13, 'D4-Proses Manufaktur', 5, '2019-12-03 02:35:48', '2019-12-03 02:35:48'),
(14, 'D3-Teknik Pendingin dan Tata Udara', 6, '2019-12-03 02:35:48', '2019-12-03 02:35:48'),
(15, 'D4-Teknik Pendingin dan Tata Udara', 6, '2019-12-03 02:35:48', '2019-12-03 02:35:48'),
(16, 'D3-Teknik Konversi Energi', 7, '2019-12-03 02:35:48', '2019-12-03 02:35:48'),
(17, 'D4-Teknologi Pembangkit Tenaga Listrik', 7, '2019-12-03 02:35:48', '2019-12-03 02:35:48'),
(18, 'D4-Teknik Konservasi Energi', 7, '2019-12-03 02:35:48', '2019-12-03 02:35:48'),
(19, 'D3-Teknik Elektronika', 8, '2019-12-03 02:35:48', '2019-12-03 02:35:48'),
(20, 'D3-Teknik Listrik', 8, '2019-12-03 02:35:48', '2019-12-03 02:35:48'),
(21, 'D3-Teknik Telekomunikasi', 8, '2019-12-03 02:35:48', '2019-12-03 02:35:48'),
(22, 'D4-Teknik Elektronika', 8, '2019-12-03 02:35:48', '2019-12-03 02:35:48'),
(23, 'D4-Teknik Otomasi Industri', 8, '2019-12-03 02:35:48', '2019-12-03 02:35:48'),
(24, 'D3-Teknik Kimia', 9, '2019-12-03 02:35:48', '2019-12-03 02:35:48'),
(25, 'D3-Analis Kimia', 9, '2019-12-03 02:35:48', '2019-12-03 02:35:48'),
(26, 'D4-Teknik Kimia Produksi Bersih', 9, '2019-12-03 02:35:48', '2019-12-03 02:35:48'),
(27, 'D3-Akuntansi', 10, '2019-12-03 02:35:48', '2019-12-03 02:35:48'),
(28, 'D3-Keuangan dan Perbankan', 10, '2019-12-03 02:35:48', '2019-12-03 02:35:48'),
(29, 'D4-Akuntansi Manajemen Pemerintahan', 10, '2019-12-03 02:35:48', '2019-12-03 02:35:48'),
(30, 'D4-Keuangan Syariah', 10, '2019-12-03 02:35:48', '2019-12-03 02:35:48'),
(31, 'D4-Akuntansi', 10, '2019-12-03 02:35:48', '2019-12-03 02:35:48'),
(32, 'D3-Administrasi Bisnis', 11, '2019-12-03 02:35:48', '2019-12-03 02:35:48'),
(33, 'D3-Usaha Perjalanan Wisata', 11, '2019-12-03 02:35:48', '2019-12-03 02:35:48'),
(34, 'D3-Manajemen Pemasaran', 11, '2019-12-03 02:35:48', '2019-12-03 02:35:48'),
(35, 'D4-Administrasi Bisnis', 11, '2019-12-03 02:35:48', '2019-12-03 02:35:48'),
(36, 'D4-Manajemen Aset', 11, '2019-12-03 02:35:48', '2019-12-03 02:35:48'),
(37, 'D4-Manajemen Pemasaran', 11, '2019-12-03 02:35:48', '2019-12-03 02:35:48'),
(38, 'D3-Bahasa Inggris', 12, '2019-12-03 02:35:48', '2019-12-03 02:35:48'),
(39, 'D4-Teknik Telekomunikasi', 13, '2019-12-03 02:37:28', '2019-12-03 02:37:28');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbm_teams`
--

CREATE TABLE `tbm_teams` (
  `id` int(11) NOT NULL,
  `leader_id` int(11) NOT NULL,
  `member1_id` int(11) NOT NULL,
  `member2_id` int(11) NOT NULL,
  `member3_id` int(11) NOT NULL,
  `member4_id` int(11) NOT NULL,
  `proposal_id` int(11) NOT NULL,
  `mentor_id` varchar(30) NOT NULL,
  `ranking` varchar(100) DEFAULT NULL,
  `competition_cat` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tbm_teams`
--

INSERT INTO `tbm_teams` (`id`, `leader_id`, `member1_id`, `member2_id`, `member3_id`, `member4_id`, `proposal_id`, `mentor_id`, `ranking`, `competition_cat`, `created_at`, `updated_at`) VALUES
(39, 2, 1, 3, 0, 0, 51, '1', NULL, 2, '2019-12-12 23:59:21', '2019-12-12 23:59:21'),
(40, 1, 0, 0, 0, 0, 52, '1', NULL, 2, '2019-12-13 05:26:51', '2019-12-13 05:26:51'),
(43, 1, 2, 3, 0, 0, 55, '1', NULL, 5, '2019-12-20 01:22:39', '2019-12-20 01:22:39'),
(44, 1, 0, 0, 0, 0, 56, '1', NULL, 5, '2020-02-18 07:26:41', '2020-02-18 07:26:41');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbm_users`
--

CREATE TABLE `tbm_users` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(80) NOT NULL,
  `role` int(2) NOT NULL,
  `last_signin` timestamp NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tbm_users`
--

INSERT INTO `tbm_users` (`id`, `email`, `password`, `role`, `last_signin`, `created_at`, `updated_at`) VALUES
(5, 'admin@gmail.com', '$2y$10$IRpygR6t.rMhCoy5naoKEeKPGRw90WIA0uWBWfe/KFC/kRkL.hzn6', 4, '2019-11-17 18:58:27', '2019-11-17 18:58:27', '2019-12-20 01:37:23'),
(6, 'reviewer@gmail.com', '$2y$10$ENHuXGJijsZGQz.xaWGS8O4BFZNta1JilhDmJ4ycoMxMf.eaQ8.RS', 3, '2019-11-17 18:58:53', '2019-11-17 18:58:53', '2019-12-20 00:42:20'),
(9, 'yudi@gmail.com', '$2y$10$71Tc.AydsY5ry9ee8uyrl.ADnyT065lXOdzUH3uZsFNuxl6du3Q8a', 2, '2019-11-17 19:00:26', '2019-11-17 19:00:26', '2019-12-20 01:37:03'),
(10, 'himakom@gmail.com', '$2y$10$MFjJ5jZytiNvbb3C5tGXfubK3eb3w9lvsrtPkTE9Tx5Yjw5MPkPnS', 1, '2019-11-23 11:54:18', '2019-11-23 11:54:18', '2020-02-18 07:16:52'),
(15, 'himatel@polban.ac.id', '$2y$10$NEywARPrnymEuVt0LGXMn.MJbr0BQCM5RWP/F6BAocDzDP1VWnjla', 1, '2019-12-06 00:54:11', '2019-12-06 00:54:11', '2019-12-06 00:54:11'),
(16, 'reviewer2@polban.ac.id', '$2y$10$qepaON5s9a8mH8Up2vd0TOghIYmlmCtMRUNWoSa60BXAIs4XD6NWu', 3, '2019-12-13 04:03:12', '2019-12-13 04:03:12', '2019-12-13 04:03:12'),
(17, 'staff@polban.ac.id', '$2y$10$SabD0QTLW9ZhD.5imCvOY.nYiM7mmRlmnofHeHB0j7pAaBugAAosS', 5, '2019-12-13 04:22:47', '2019-12-13 04:22:47', '2019-12-13 04:22:47'),
(18, 'reviewer3@gmail.com', '$2y$10$ly0nWwVCosLuS6yPJBOUPOf5EWyd/6b/1gDN6KQgaW/6nRPZdIUhW', 3, '2020-02-18 07:12:36', '2020-02-18 07:12:36', '2020-02-18 07:12:36');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbr_proposals`
--

CREATE TABLE `tbr_proposals` (
  `id` int(11) NOT NULL,
  `competition_id` int(11) NOT NULL,
  `organization_id` int(11) NOT NULL,
  `status` varchar(15) NOT NULL,
  `accountability_report` int(2) DEFAULT 0,
  `financial_report` int(2) NOT NULL DEFAULT 0,
  `financial_note` varchar(50) DEFAULT NULL,
  `legalization` varchar(50) DEFAULT NULL,
  `draft_budget` int(11) NOT NULL,
  `realisazion_budget` int(11) DEFAULT 0,
  `approved_budget` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `proposal` varchar(100) NOT NULL,
  `budget_source` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tbr_proposals`
--

INSERT INTO `tbr_proposals` (`id`, `competition_id`, `organization_id`, `status`, `accountability_report`, `financial_report`, `financial_note`, `legalization`, `draft_budget`, `realisazion_budget`, `approved_budget`, `created_at`, `updated_at`, `proposal`, `budget_source`) VALUES
(51, 7, 1, 'DONE', 1, 1, 'belum sesuai\r\n', 'Pengesahan_Proposal_51.png', 700000, 800000, 780000, '2019-12-12 23:59:21', '2019-12-13 04:16:48', 'Proposal71576195161.pdf', 'POLBAN'),
(52, 3, 1, 'DONE', 1, 1, NULL, 'Pengesahan_Proposal_52.png', 6000000, 5000000, 4800000, '2019-12-13 05:26:50', '2019-12-13 05:45:00', 'Proposal31576214810.pdf', 'POLBAN'),
(55, 3, 1, 'DONE', 1, 1, 'tidak sesuai', 'Pengesahan_Proposal_55.png', 4550000, 4500000, 4500000, '2019-12-20 01:22:39', '2019-12-20 06:33:35', 'Proposal31576804959.pdf', 'POLBAN'),
(56, 12, 1, 'DONE', 1, 1, NULL, 'Pengesahan_Proposal_56.png', 5000000, 5000000, 4800000, '2020-02-18 07:26:41', '2020-02-18 07:41:50', 'Proposal121582010800.pdf', 'POLBAN');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbm_competitions`
--
ALTER TABLE `tbm_competitions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `competition_level_id` (`competition_level_id`);

--
-- Indeks untuk tabel `tbm_competitions_cat`
--
ALTER TABLE `tbm_competitions_cat`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbm_competition_levels`
--
ALTER TABLE `tbm_competition_levels`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbm_department`
--
ALTER TABLE `tbm_department`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbm_lecturers`
--
ALTER TABLE `tbm_lecturers`
  ADD PRIMARY KEY (`id`,`nip`);

--
-- Indeks untuk tabel `tbm_organization`
--
ALTER TABLE `tbm_organization`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `tbm_reviewers`
--
ALTER TABLE `tbm_reviewers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbm_reviewers` (`user_id`);

--
-- Indeks untuk tabel `tbm_revision_notes`
--
ALTER TABLE `tbm_revision_notes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `proposal_id` (`proposal_id`);

--
-- Indeks untuk tabel `tbm_students`
--
ALTER TABLE `tbm_students`
  ADD PRIMARY KEY (`id`,`nim`),
  ADD KEY `study_programme_id` (`study_programme_id`);

--
-- Indeks untuk tabel `tbm_study_programme`
--
ALTER TABLE `tbm_study_programme`
  ADD PRIMARY KEY (`id`),
  ADD KEY `department_id` (`department_id`);

--
-- Indeks untuk tabel `tbm_teams`
--
ALTER TABLE `tbm_teams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `leader_id` (`leader_id`),
  ADD KEY `member1_id` (`member1_id`),
  ADD KEY `member2_id` (`member2_id`),
  ADD KEY `member3_id` (`member3_id`),
  ADD KEY `member4_id` (`member4_id`),
  ADD KEY `mentor_id` (`mentor_id`),
  ADD KEY `proposal` (`proposal_id`);

--
-- Indeks untuk tabel `tbm_users`
--
ALTER TABLE `tbm_users`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbr_proposals`
--
ALTER TABLE `tbr_proposals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `competition_id` (`competition_id`),
  ADD KEY `department_id` (`organization_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbm_competitions`
--
ALTER TABLE `tbm_competitions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `tbm_competitions_cat`
--
ALTER TABLE `tbm_competitions_cat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tbm_competition_levels`
--
ALTER TABLE `tbm_competition_levels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tbm_department`
--
ALTER TABLE `tbm_department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `tbm_lecturers`
--
ALTER TABLE `tbm_lecturers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbm_organization`
--
ALTER TABLE `tbm_organization`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tbm_reviewers`
--
ALTER TABLE `tbm_reviewers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbm_revision_notes`
--
ALTER TABLE `tbm_revision_notes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `tbm_students`
--
ALTER TABLE `tbm_students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tbm_study_programme`
--
ALTER TABLE `tbm_study_programme`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT untuk tabel `tbm_teams`
--
ALTER TABLE `tbm_teams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT untuk tabel `tbm_users`
--
ALTER TABLE `tbm_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `tbr_proposals`
--
ALTER TABLE `tbr_proposals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tbm_competitions`
--
ALTER TABLE `tbm_competitions`
  ADD CONSTRAINT `tbm_competitions_ibfk_1` FOREIGN KEY (`competition_level_id`) REFERENCES `tbm_competition_levels` (`id`);

--
-- Ketidakleluasaan untuk tabel `tbm_reviewers`
--
ALTER TABLE `tbm_reviewers`
  ADD CONSTRAINT `tbm_reviewers` FOREIGN KEY (`user_id`) REFERENCES `tbm_users` (`id`);

--
-- Ketidakleluasaan untuk tabel `tbm_revision_notes`
--
ALTER TABLE `tbm_revision_notes`
  ADD CONSTRAINT `tbm_revision_notes_ibfk_1` FOREIGN KEY (`proposal_id`) REFERENCES `tbr_proposals` (`id`);

--
-- Ketidakleluasaan untuk tabel `tbm_students`
--
ALTER TABLE `tbm_students`
  ADD CONSTRAINT `fk_studyprogramme` FOREIGN KEY (`study_programme_id`) REFERENCES `tbm_study_programme` (`id`);

--
-- Ketidakleluasaan untuk tabel `tbm_study_programme`
--
ALTER TABLE `tbm_study_programme`
  ADD CONSTRAINT `fk_department` FOREIGN KEY (`department_id`) REFERENCES `tbm_department` (`id`);

--
-- Ketidakleluasaan untuk tabel `tbm_teams`
--
ALTER TABLE `tbm_teams`
  ADD CONSTRAINT `tbm_teams_ibfk_7` FOREIGN KEY (`proposal_id`) REFERENCES `tbr_proposals` (`id`);

--
-- Ketidakleluasaan untuk tabel `tbr_proposals`
--
ALTER TABLE `tbr_proposals`
  ADD CONSTRAINT `tbr_proposals_ibfk_1` FOREIGN KEY (`competition_id`) REFERENCES `tbm_competitions` (`id`),
  ADD CONSTRAINT `tbr_proposals_organization_1` FOREIGN KEY (`organization_id`) REFERENCES `tbm_organization` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
