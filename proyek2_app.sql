-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 02 Jan 2024 pada 20.24
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `proyek2_app`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `jenis_kelamin` varchar(255) NOT NULL,
  `jabatan` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `profile_picture` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `admins`
--

INSERT INTO `admins` (`id`, `username`, `email`, `password`, `jenis_kelamin`, `jabatan`, `created_at`, `updated_at`, `profile_picture`) VALUES
(2, 'ibra12', 'ibrah@gmail.com', '$2y$10$2SNsLa9eYeOKsmW12DuqaOO5Kvat.H81irIcE7vTnWW6HVxr/n0Ii', 'laki-laki', 'admin 2', NULL, NULL, NULL),
(3, 'hurul03', 'hurul@gmail.com', '$2y$10$sddEu0T2lTOpuCDTVLltxu.3mZTNqO21MDb2NzOEMOQECBvQ9kwDu', 'perempuan', 'admin 3', NULL, NULL, NULL),
(4, 'Zahra01', 'syzahraaa12@gmail.com', '$2y$10$eOMvddPei11/EWe1Yp4Aq.oQGy.KdcbOUOMyAbhgpaInI7dygmhCe', 'Perempuan', 'admin 1', NULL, '2024-01-01 20:31:48', 'profile_pictures/GbpoNTYdNwCAUmO2UWHfP6OltoN8zTSvOrxsaGGo.gif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `aduan_siswa`
--

CREATE TABLE `aduan_siswa` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_aduan` bigint(20) UNSIGNED DEFAULT NULL,
  `id_siswa` bigint(20) UNSIGNED NOT NULL,
  `id_kelas` bigint(20) UNSIGNED DEFAULT NULL,
  `aduan` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `bukti_aduan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `aduan_siswa`
--

INSERT INTO `aduan_siswa` (`id`, `id_aduan`, `id_siswa`, `id_kelas`, `aduan`, `created_at`, `updated_at`, `bukti_aduan`) VALUES
(23, 2, 24, 11, 'Salah input data', '2024-01-01 03:14:32', '2024-01-01 03:14:32', '1704104072_bg_landing.jpg'),
(28, 1, 27, 8, 'Kritikan tentang sekolah', '2024-01-02 12:17:31', '2024-01-02 12:17:31', '1704223050_1.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `all_prestasis`
--

CREATE TABLE `all_prestasis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subjudul` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `foto_tampilan` varchar(255) NOT NULL,
  `foto_dokumentasi` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `all_prestasis`
--

INSERT INTO `all_prestasis` (`id`, `subjudul`, `deskripsi`, `foto_tampilan`, `foto_dokumentasi`, `created_at`, `updated_at`) VALUES
(4, 'Tentang olimpiade', 'Olimpiade merujuk pada serangkaian acara olahraga tingkat internasional yang diadakan setiap empat tahun sekali. Olimpiade adalah acara prestisius yang membawa bersama atlet-atlet terbaik dari seluruh dunia untuk bersaing dalam berbagai cabang olahraga. Berikut adalah beberapa poin penting tentang Olimpiade:\r\n\r\nTingkat Internasional: Olimpiade merupakan acara olahraga yang mencakup atlet dan tim dari seluruh dunia. Ini menjadi forum utama di mana negara-negara dapat bersaing secara damai dan memamerkan kemampuan olahraga terbaik mereka.\r\n\r\nCeremoni Pembukaan dan Penutupan: Olimpiade dimulai dengan sebuah seremoni pembukaan yang spektakuler, melibatkan pertunjukan seni, parade atlet, dan pencahayaan obor olimpiade. Acara ini dirancang untuk merayakan keragaman dan persatuan atlet internasional. Olimpiade juga ditutup dengan seremoni penutupan yang meriah.\r\n\r\nCabang Olahraga: Olimpiade mencakup berbagai cabang olahraga, seperti atletisme, renang, sepak bola, bulu tangkis, angkat besi, dan banyak lagi. Setiap cabang olahraga memiliki kompetisi sendiri-sendiri, dan medali emas, perak, dan perunggu diberikan kepada para pemenang.\r\n\r\nOlimpiade Musim Panas dan Musim Dingin: Olimpiade dibagi', '1704039550_tampilan.jpg', '1704096424_dokumentasi.jpg', '2023-12-31 09:19:10', '2024-01-01 04:56:33'),
(5, 'Juara Internasional', 'Pramuka, singkatan dari Praja Muda Karana, adalah gerakan kepramukaan yang merupakan organisasi pendidikan di Indonesia. Pramuka didirikan oleh Soekarno pada 14 Agustus 1961 dengan tujuan untuk membentuk generasi muda yang memiliki karakter, kedisiplinan, dan semangat kebangsaan. Gerakan ini mewujudkan konsep pembinaan karakter melalui kegiatan-kegiatan yang bersifat pendidikan nonformal.\r\n\r\nBerikut adalah beberapa poin penting tentang pramuka:\r\n\r\nMetode Kepanduan: Pramuka menggunakan metode kepramukaan yang terdiri dari pendidikan karakter, belajar sambil bermain, hidup alam, dan berdikari. Metode ini bertujuan untuk mengembangkan potensi fisik, mental, dan sosial peserta didik.\r\n\r\nLambang dan Seragam: Pramuka memiliki lambang dan seragam khas yang mencerminkan nilai-nilai kepramukaan. Seragam ini memberikan identitas dan rasa persatuan di antara anggota pramuka.\r\n\r\nTingkatan dan Pendidikan: Pramuka terdiri dari beberapa tingkatan, mulai dari Siaga untuk anak-anak usia dini hingga Penggalang, Penegak, dan Pandega untuk tingkatan remaja. Setiap tingkatan memiliki program pendidikan yang sesuai dengan perkembangan fisik dan mental peserta didik.\r\n\r\nKemah dan Ekspedisi: Kegiatan kemah dan ekspedisi menjadi bagian integral dari kegiatan pramuka. Ini bertujuan untuk mengasah keterampilan bertahan hidup, membangun kerjasama tim, dan menghargai alam.', '1704045762_tampilan.jpg', '1704045762_dokumentasi.jpg', '2023-12-31 11:02:42', '2023-12-31 11:02:42');

-- --------------------------------------------------------

--
-- Struktur dari tabel `arsip_tabungan_bulanan`
--

CREATE TABLE `arsip_tabungan_bulanan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_siswa` bigint(20) UNSIGNED NOT NULL,
  `tanggal_arsip` date NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `saldo` decimal(10,2) NOT NULL DEFAULT 0.00,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_kelas` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `arsip_tabungan_bulanan`
--

INSERT INTO `arsip_tabungan_bulanan` (`id`, `id_siswa`, `tanggal_arsip`, `total`, `saldo`, `created_at`, `updated_at`, `id_kelas`) VALUES
(27, 24, '2023-12-25', 150000.00, 10000.00, '2023-12-25 07:50:26', '2024-01-02 06:21:05', 11),
(29, 29, '2023-12-25', 49000.00, 9000.00, '2023-12-25 08:30:40', '2024-01-01 22:13:39', 1),
(30, 30, '2023-12-25', 23900.00, 78900.00, '2023-12-25 08:32:02', '2024-01-01 22:14:11', 7),
(31, 27, '2023-12-27', 14000.00, 20000.00, '2023-12-27 01:00:59', '2024-01-01 22:15:13', 8),
(32, 36, '2024-01-02', 19000.00, 34000.00, '2024-01-01 22:48:41', '2024-01-01 23:14:10', 17),
(33, 39, '2024-01-02', 54000.00, 30000.00, '2024-01-01 23:03:08', '2024-01-01 23:03:41', 18),
(34, 41, '2024-01-02', 24000.00, 24000.00, '2024-01-01 23:08:49', '2024-01-01 23:08:49', 14);

-- --------------------------------------------------------

--
-- Struktur dari tabel `eskuls`
--

CREATE TABLE `eskuls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subjudul` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `foto_tampilan` varchar(255) NOT NULL,
  `foto_dokumentasi1` varchar(255) DEFAULT NULL,
  `foto_dokumentasi2` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `eskuls`
--

INSERT INTO `eskuls` (`id`, `subjudul`, `deskripsi`, `foto_tampilan`, `foto_dokumentasi1`, `foto_dokumentasi2`, `created_at`, `updated_at`) VALUES
(5, 'Judul olimpiade', 'cdaapasjddnnmc', 'uploads/5WUprcPFZ8wiUTNwM3AXGGrFTALZ6JPBqvMScAHr.jpg', 'uploads/Ei3ysybWjdpucUm7xCwfz0unXQgl2d0fG6ONfTeF.jpg', 'uploads/PEdB8dRxF8khbBUP28HDXtzmC2zzu7ILUmFLdcB4.jpg', '2024-01-01 09:43:14', '2024-01-01 09:43:14'),
(6, 'Judul olimpiade', 'cdaapasjddnnmc', 'uploads/DjIsoWRP3KMWaiynlD44LybKT77cXjU1JS0z0T7a.jpg', 'uploads/lU2vFeOvsjtlEzHvBKgAFtgcnP52NxxiwlRj4S2v.jpg', 'uploads/LXoy0wXW5WrexChjrPwkFaqoPsTPu4wYsje6z1XL.jpg', '2024-01-01 09:43:37', '2024-01-01 09:43:37');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_aduan`
--

CREATE TABLE `kategori_aduan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ket_aduan` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kategori_aduan`
--

INSERT INTO `kategori_aduan` (`id`, `ket_aduan`, `created_at`, `updated_at`) VALUES
(1, 'Sekolah', NULL, NULL),
(2, 'Tabungan', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_transaksi`
--

CREATE TABLE `kategori_transaksi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kategori_transaksi`
--

INSERT INTO `kategori_transaksi` (`id`, `deskripsi`, `created_at`, `updated_at`) VALUES
(1, 'Pemasukkan', NULL, NULL),
(2, 'Pengeluaran', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ket_kelas` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`id`, `ket_kelas`, `created_at`, `updated_at`) VALUES
(1, 'Kelas 7A', '2023-12-23 02:29:56', '2023-12-23 02:29:56'),
(2, 'Kelas 7B', '2023-12-23 02:29:56', '2023-12-23 02:29:56'),
(3, 'Kelas 7C', '2023-12-23 02:29:56', '2023-12-23 02:29:56'),
(4, 'Kelas 7D', '2023-12-23 02:29:56', '2023-12-23 02:29:56'),
(5, 'Kelas 8A', '2023-12-23 02:29:56', '2023-12-23 02:29:56'),
(6, 'Kelas 8B', '2023-12-23 02:29:56', '2023-12-23 02:29:56'),
(7, 'Kelas 8C', '2023-12-23 02:29:56', '2023-12-23 02:29:56'),
(8, 'Kelas 8D', '2023-12-23 02:29:56', '2023-12-23 02:29:56'),
(9, 'Kelas 9A', '2023-12-23 02:29:56', '2023-12-23 02:29:56'),
(10, 'Kelas 9B', '2023-12-23 02:29:56', '2023-12-23 02:29:56'),
(11, 'Kelas 9C', '2023-12-23 02:29:56', '2023-12-23 02:29:56'),
(12, 'Kelas 7A', '2023-12-23 02:30:17', '2023-12-23 02:30:17'),
(13, 'Kelas 7B', '2023-12-23 02:30:17', '2023-12-23 02:30:17'),
(14, 'Kelas 7C', '2023-12-23 02:30:17', '2023-12-23 02:30:17'),
(15, 'Kelas 7D', '2023-12-23 02:30:17', '2023-12-23 02:30:17'),
(16, 'Kelas 8A', '2023-12-23 02:30:17', '2023-12-23 02:30:17'),
(17, 'Kelas 8B', '2023-12-23 02:30:17', '2023-12-23 02:30:17'),
(18, 'Kelas 8C', '2023-12-23 02:30:17', '2023-12-23 02:30:17'),
(19, 'Kelas 8D', '2023-12-23 02:30:17', '2023-12-23 02:30:17'),
(20, 'Kelas 9A', '2023-12-23 02:30:17', '2023-12-23 02:30:17'),
(21, 'Kelas 9B', '2023-12-23 02:30:17', '2023-12-23 02:30:17'),
(22, 'Kelas 9C', '2023-12-23 02:30:17', '2023-12-23 02:30:17');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(16, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(17, '2019_08_19_000000_create_failed_jobs_table', 1),
(18, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(19, '2023_11_21_155848_create_admins_table', 1),
(20, '2023_11_23_152900_add_profile_picture_to_admins', 1),
(21, '2023_12_09_141824_create_kelas_table', 1),
(22, '2023_12_09_142044_create_tahun_angkatan_table', 1),
(23, '2023_12_09_142603_create_murid_table', 1),
(24, '2023_12_09_144229_create_murid_kelas_table', 1),
(25, '2023_12_09_144305_create_pemasukkan_tabungan_table', 1),
(26, '2023_12_09_144336_create_pengeluaran_tabungan_table', 1),
(27, '2023_12_09_144403_create_arsip_tabungan_bulanan_table', 1),
(28, '2023_12_09_155923_create_users_table', 1),
(29, '2023_12_11_143433_create_kategori_transaksi', 1),
(30, '2023_12_11_143758_create_transaksi_tabungan', 1),
(31, '2023_12_23_113341_add_saldo_to_arsip_tabungan_bulanan', 2),
(32, '2023_12_23_113638_add_total_to_transaksi_tabungan', 3),
(33, '2023_12_23_153742_tambahkan_id_kelas_transaksitabungan', 4),
(34, '2023_12_23_154150_tambahkan_id_kelas_arsiptabungan', 5),
(35, '2023_12_28_042027_create_kategori_aduan_table', 6),
(36, '2023_12_28_042105_create_aduan_siswa_table', 7),
(37, '2023_12_28_044147_add_kelas_id_to_aduan_siswa_table', 8),
(38, '2023_12_28_071256_add_bukti_aduan_to_aduan_siswa', 9),
(39, '2023_12_28_162015_create_sekolah_table', 10),
(40, '2023_12_31_084604_create_prestasis_table', 11),
(41, '2023_12_31_085153_create_all_prestasis_table', 12),
(42, '2023_12_31_121830_create_all_prestasis_table', 13),
(43, '2023_12_29_135857_add_foto_to_admins_table', 14),
(44, '2024_01_01_093935_add_columns_to_sekolah_table', 15),
(45, '2024_01_01_100039_create_eskul_table', 16),
(46, '2024_01_01_165231_create_visi_misi_table', 17),
(47, '2024_01_01_180702_add_logo_path_to_sekolah_table', 18),
(48, '2024_01_02_060047_modify_transaksi_tabungan_table', 19),
(49, '2024_01_02_185007_modify_aduan_siswa_table', 20);

-- --------------------------------------------------------

--
-- Struktur dari tabel `murid`
--

CREATE TABLE `murid` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nisn_murid` varchar(255) NOT NULL,
  `nama_murid` varchar(255) NOT NULL,
  `jenis_kelamin` varchar(255) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `id_kelas` bigint(20) UNSIGNED NOT NULL,
  `id_ta` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `murid`
--

INSERT INTO `murid` (`id`, `nisn_murid`, `nama_murid`, `jenis_kelamin`, `tgl_lahir`, `id_kelas`, `id_ta`, `created_at`, `updated_at`) VALUES
(24, '567890', 'Vira nur zahra', 'Perempuan', '2023-12-24', 11, 1, '2023-12-24 04:07:25', '2023-12-25 07:57:47'),
(27, '3162990531', 'Elenor Reilly', 'Perempuan', '2023-12-24', 8, 2, '2023-12-25 08:02:54', '2023-12-25 10:15:06'),
(29, '2203089', 'Maulana', 'Laki-laki', '2023-12-25', 12, 2, '2023-12-25 08:04:25', '2023-12-25 08:04:25'),
(30, '78903567', 'Prasetya', 'Perempuan', '2023-12-20', 18, 2, '2023-12-25 08:13:31', '2023-12-25 08:13:31'),
(36, '789035', 'Ibrahim', 'Laki-laki', '2024-01-02', 17, 2, '2024-01-01 22:47:47', '2024-01-01 22:47:47'),
(39, '316299', 'Zahra', 'Perempuan', '2024-01-02', 18, 2, '2024-01-01 23:02:43', '2024-01-01 23:02:43'),
(41, '7890', 'Rohani', 'Perempuan', '2024-01-02', 14, 3, '2024-01-01 23:08:18', '2024-01-01 23:08:18'),
(43, '31629', 'Rosani', 'Perempuan', '2024-01-03', 18, 2, '2024-01-02 11:47:57', '2024-01-02 11:47:57'),
(44, '22030', 'Royani', 'Laki-laki', '2024-01-03', 17, 2, '2024-01-02 11:51:44', '2024-01-02 11:51:44'),
(45, '2203', 'Rosidah', 'Perempuan', '2024-01-18', 15, 1, '2024-01-02 11:53:28', '2024-01-02 11:53:28'),
(46, '3162923', 'Nur', 'Perempuan', '2024-01-03', 11, 2, '2024-01-02 11:58:03', '2024-01-02 11:58:03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `murid_kelas`
--

CREATE TABLE `murid_kelas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_siswa` bigint(20) UNSIGNED NOT NULL,
  `id_kelas` bigint(20) UNSIGNED NOT NULL,
  `id_ta` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `prestasis`
--

CREATE TABLE `prestasis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul_utama` varchar(255) NOT NULL,
  `gambar_utama` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `prestasis`
--

INSERT INTO `prestasis` (`id`, `judul_utama`, `gambar_utama`, `created_at`, `updated_at`) VALUES
(5, 'PRESTASI SMP NURUL HALIM WIDASARI', '1704110488.jpg', '2024-01-01 05:01:28', '2024-01-01 05:01:28');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sekolah`
--

CREATE TABLE `sekolah` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `npsn` varchar(255) NOT NULL,
  `status_sekolah` varchar(255) NOT NULL,
  `sk_pendirian` varchar(255) NOT NULL,
  `tgl_sk_pendirian` date NOT NULL,
  `status_kepemilikan` varchar(255) NOT NULL,
  `sk_izin_operasional` varchar(255) NOT NULL,
  `tgl_sk_izin_operasional` date NOT NULL,
  `npwp` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deskripsi_sekolah` text DEFAULT NULL,
  `no_telp` varchar(255) DEFAULT NULL,
  `email_sekolah` varchar(255) DEFAULT NULL,
  `logo_path` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sekolah`
--

INSERT INTO `sekolah` (`id`, `nama`, `npsn`, `status_sekolah`, `sk_pendirian`, `tgl_sk_pendirian`, `status_kepemilikan`, `sk_izin_operasional`, `tgl_sk_izin_operasional`, `npwp`, `created_at`, `updated_at`, `deskripsi_sekolah`, `no_telp`, `email_sekolah`, `logo_path`) VALUES
(1, 'SMP NURUL HALIM WIDASARI', '20216093', 'Swasta', '402/102/KEP/E/94', '1994-06-15', 'Yayasan', '402/102/KEP/E/94', '1994-06-15', '027258441437000', '2023-12-28 09:25:29', '2024-01-01 11:53:20', 'SMP Nurul Halim Widasari berkomitmen untuk membentuk peserta didik yang memiliki karakter unggul melalui pendekatan holistik. Sekolah ini mengedepankan nilai-nilai keagamaan dengan melaksanakan kegiatan keagamaan yang kaya makna, bertujuan membentuk peserta didik yang religius dan berakhlak mulia. Proses penilaian terhadap peserta didik dilakukan secara obyektif, memberikan gambaran yang akurat terkait perkembangan akademis mereka.', '351669', 'smpnurulhalim93@gmail.com', '/storage/images//M7Tf2ICT6UWu2jaAEnHwYX1Vu3LNCbMWVBdU8ZV7.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tahun_angkatan`
--

CREATE TABLE `tahun_angkatan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tahun` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tahun_angkatan`
--

INSERT INTO `tahun_angkatan` (`id`, `tahun`, `created_at`, `updated_at`) VALUES
(1, '2021/2022', '2023-12-23 02:31:32', '2023-12-23 02:31:32'),
(2, '2022/2023', '2023-12-23 02:31:32', '2023-12-23 02:31:32'),
(3, '2023/2024', '2023-12-23 02:31:32', '2023-12-23 02:31:32');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi_tabungan`
--

CREATE TABLE `transaksi_tabungan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_siswa` bigint(20) UNSIGNED NOT NULL,
  `tanggal` date DEFAULT NULL,
  `id_kategori` bigint(20) UNSIGNED DEFAULT NULL,
  `nominal` decimal(10,2) DEFAULT NULL,
  `total` decimal(10,2) NOT NULL DEFAULT 0.00,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_kelas` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `transaksi_tabungan`
--

INSERT INTO `transaksi_tabungan` (`id`, `id_siswa`, `tanggal`, `id_kategori`, `nominal`, `total`, `created_at`, `updated_at`, `id_kelas`) VALUES
(57, 24, '2023-12-25', 1, 30000.00, 10000.00, '2023-12-25 07:50:26', '2023-12-27 09:42:46', 11),
(59, 29, '2023-12-25', 1, 2000.00, 9000.00, '2023-12-25 08:30:40', '2023-12-27 09:34:47', 1),
(60, 30, '2023-12-25', 1, 78900.00, 78900.00, '2023-12-25 08:32:02', '2023-12-25 08:32:02', 7),
(61, 24, '2023-12-26', 1, 30000.00, 2000.00, '2023-12-25 10:35:05', '2023-12-27 21:14:58', 11),
(62, 29, '2023-12-27', 1, 12000.00, 12000.00, '2023-12-27 00:06:30', '2023-12-27 00:06:30', NULL),
(63, 30, '2023-12-27', 1, 30000.00, 30000.00, '2023-12-27 00:49:09', '2023-12-27 00:49:09', NULL),
(64, 30, '2023-12-27', 1, 30000.00, 30000.00, '2023-12-27 00:50:18', '2023-12-27 00:50:18', NULL),
(65, 27, '2023-12-27', 1, 26000.00, 20000.00, '2023-12-27 01:00:59', '2023-12-27 09:38:05', 8),
(66, 27, '2023-12-27', 1, 23000.00, 21000.00, '2023-12-27 01:01:20', '2023-12-27 09:42:23', 8),
(67, 24, '2023-12-28', 2, 23000.00, 23000.00, '2023-12-28 07:23:11', '2023-12-28 07:23:11', 11),
(68, 27, '2023-12-29', 1, 50000.00, 50000.00, '2023-12-28 22:43:48', '2023-12-28 22:43:48', 8),
(69, 30, '2023-12-29', 2, 40000.00, 40000.00, '2023-12-29 06:34:56', '2023-12-29 06:34:56', 18),
(70, 27, '2023-12-29', 2, 23000.00, 23000.00, '2023-12-29 06:36:56', '2023-12-29 06:36:56', 8),
(71, 24, '2023-12-30', 1, 27000.00, 27000.00, '2023-12-29 23:52:50', '2023-12-29 23:52:50', 11),
(72, 30, '2024-01-01', 2, 30000.00, 30000.00, '2024-01-01 05:07:56', '2024-01-01 05:07:56', 18),
(73, 27, '2024-01-02', 2, 100000.00, 100000.00, '2024-01-01 11:00:16', '2024-01-01 11:00:16', 8),
(74, 29, '2024-01-02', 1, 10000.00, 10000.00, '2024-01-01 21:13:56', '2024-01-01 21:13:56', NULL),
(75, 29, '2024-01-02', 1, 10000.00, 10000.00, '2024-01-01 21:17:50', '2024-01-01 21:17:50', NULL),
(76, 29, '2024-01-02', 1, 6000.00, 6000.00, '2024-01-01 21:23:23', '2024-01-01 21:23:23', 1),
(77, 30, '2024-01-02', 2, 25000.00, 25000.00, '2024-01-01 21:25:11', '2024-01-01 21:25:11', 7),
(78, 29, '2024-01-02', 2, 100000.00, 100000.00, '2024-01-01 21:47:09', '2024-01-01 21:47:09', 12),
(79, 27, '2024-01-02', 2, 100000.00, 100000.00, '2024-01-01 22:05:28', '2024-01-01 22:05:28', 8),
(80, 30, '2024-01-02', 2, 50000.00, 50000.00, '2024-01-01 22:08:20', '2024-01-01 22:08:20', 7),
(81, 29, '2024-01-02', 1, 100000.00, 100000.00, '2024-01-01 22:13:39', '2024-01-01 22:13:39', 1),
(82, 30, '2024-01-02', 1, 30000.00, 30000.00, '2024-01-01 22:14:11', '2024-01-01 22:14:11', 18),
(83, 27, '2024-01-02', 1, 23000.00, 23000.00, '2024-01-01 22:14:41', '2024-01-01 22:14:41', 8),
(84, 27, '2024-01-02', 1, 50000.00, 50000.00, '2024-01-01 22:15:13', '2024-01-01 22:15:13', 8),
(85, 36, '2024-01-02', 1, 0.00, 0.00, '2024-01-01 22:47:47', '2024-01-01 22:47:47', 17),
(86, 36, '2024-01-02', 1, 34000.00, 34000.00, '2024-01-01 22:48:41', '2024-01-01 22:48:41', 17),
(87, 36, '2024-01-02', 1, 15000.00, 15000.00, '2024-01-01 22:49:58', '2024-01-01 22:49:58', 17),
(88, 39, NULL, NULL, NULL, 0.00, '2024-01-01 23:02:43', '2024-01-01 23:02:43', 18),
(89, 39, '2024-01-02', 1, 30000.00, 30000.00, '2024-01-01 23:03:08', '2024-01-01 23:03:08', 18),
(90, 39, '2024-01-02', 1, 24000.00, 24000.00, '2024-01-01 23:03:41', '2024-01-01 23:03:41', 18),
(91, 41, NULL, NULL, NULL, 0.00, '2024-01-01 23:08:18', '2024-01-01 23:08:18', 14),
(92, 41, '2024-01-02', 1, 24000.00, 24000.00, '2024-01-01 23:08:49', '2024-01-01 23:08:49', 14),
(93, 24, '2024-01-02', 2, 20000.00, 20000.00, '2024-01-01 23:11:42', '2024-01-01 23:11:42', 11),
(94, 24, '2024-01-02', 2, 10000.00, 10000.00, '2024-01-01 23:13:23', '2024-01-01 23:13:23', 11),
(95, 36, '2024-01-02', 2, 30000.00, 30000.00, '2024-01-01 23:14:09', '2024-01-01 23:14:10', 17),
(97, 24, '2024-01-02', 1, 40000.00, 100000.00, '2024-01-02 06:19:27', '2024-01-02 06:21:05', 11),
(98, 43, NULL, NULL, NULL, 0.00, '2024-01-02 11:47:57', '2024-01-02 11:47:57', 18),
(99, 44, NULL, NULL, NULL, 0.00, '2024-01-02 11:51:44', '2024-01-02 11:51:44', 17),
(100, 45, NULL, NULL, NULL, 0.00, '2024-01-02 11:53:28', '2024-01-02 11:53:28', 15),
(101, 46, NULL, NULL, NULL, 0.00, '2024-01-02 11:58:03', '2024-01-02 11:58:03', 11);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_siswa` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `id_siswa`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 24, 'viranurzahra1@example.com', NULL, 'password1', NULL, NULL, NULL),
(11, 27, 'elenorreilly1@example.com', NULL, 'password2', NULL, NULL, NULL),
(21, 29, 'maulana1@example.com', NULL, 'password3', NULL, NULL, NULL),
(31, 30, 'prasetya1@example.com', NULL, 'password4', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `visi_misi`
--

CREATE TABLE `visi_misi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul_halaman` varchar(255) NOT NULL,
  `visi` text NOT NULL,
  `misi` text NOT NULL,
  `tujuan` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `visi_misi`
--

INSERT INTO `visi_misi` (`id`, `judul_halaman`, `visi`, `misi`, `tujuan`, `created_at`, `updated_at`) VALUES
(2, 'VISI & MISI', 'Visi Sekolah adalah terwujudnya warga sekolah yang “ROHMATAN”.\r\nR = eligius; O = byektif; H = umanis; M = andiri; A = manah; T = oleransi; \r\nA = khlakul karimah; N = asionalis\r\nIndikator Pencapaian Visi', 'a.	Melaksanakan kegiatan keagamaan untuk membentuk peserta didik yang Religius\r\nb.	Melaksanakan proses penilaian terhadap peserta didik secara Obyektif\r\nc.	Menyelesaikan permasalahan dengan menggunakan pendekatan Humanis\r\nd.	Membina ke Mandirian peserta didik melalui pembiasaan program sekoalh\r\ne.	Melaksanakan pegelolaan dan pembiayaan dengan Amanah\r\nf.	Membangun kehidupan warga sekolah yang toleran terhadap perbedaan-perbedaan yang ada\r\ng.	Melaksanakan kegiatan 3M (Menyapa Guru, Menyapa teman dan Menjaga sopan santun) untuk membentuk generasi yang berAkhlakul karimah\r\nh.	Menumbuh kembangkan jiwa Nasional pada peserta didik', 'Tujuan SMP Nurul Halim Widasari pada Tahun Ajaran 2023/2024 yaitu:\r\na)	Menjadikan peserta didik yang religius\r\nb)	Mewujudkan proses penilaian yang obyektif\r\nc)	Membiasakan dengan pendekatan humanis dalam menyelesaikan semua permasalahan\r\nd)	Mejadikan lulusan yang mandiri\r\ne)	Terwujudnya sikap amanah dalam kehidupan sehari-hari\r\nf)	Tumbuhnya budaya toleransi antar warga sekolah\r\ng)	Terbentuknya karakter peserta didik yang berAkhlakul karimah\r\nh)	Terwujudnya jiwa nasionalis pada warga sekolah', '2024-01-01 10:23:16', '2024-01-02 06:36:57');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_username_unique` (`username`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indeks untuk tabel `aduan_siswa`
--
ALTER TABLE `aduan_siswa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `aduan_siswa_id_aduan_foreign` (`id_aduan`),
  ADD KEY `aduan_siswa_id_siswa_foreign` (`id_siswa`),
  ADD KEY `aduan_siswa_id_kelas_foreign` (`id_kelas`);

--
-- Indeks untuk tabel `all_prestasis`
--
ALTER TABLE `all_prestasis`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `arsip_tabungan_bulanan`
--
ALTER TABLE `arsip_tabungan_bulanan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `arsip_tabungan_bulanan_id_siswa_foreign` (`id_siswa`),
  ADD KEY `arsip_tabungan_bulanan_id_kelas_foreign` (`id_kelas`);

--
-- Indeks untuk tabel `eskuls`
--
ALTER TABLE `eskuls`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `kategori_aduan`
--
ALTER TABLE `kategori_aduan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kategori_transaksi`
--
ALTER TABLE `kategori_transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `murid`
--
ALTER TABLE `murid`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `murid_nisn_murid_unique` (`nisn_murid`),
  ADD KEY `murid_id_kelas_foreign` (`id_kelas`),
  ADD KEY `murid_id_ta_foreign` (`id_ta`);

--
-- Indeks untuk tabel `murid_kelas`
--
ALTER TABLE `murid_kelas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `murid_kelas_id_kelas_foreign` (`id_kelas`),
  ADD KEY `murid_kelas_id_siswa_foreign` (`id_siswa`),
  ADD KEY `murid_kelas_id_ta_foreign` (`id_ta`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `prestasis`
--
ALTER TABLE `prestasis`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sekolah`
--
ALTER TABLE `sekolah`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tahun_angkatan`
--
ALTER TABLE `tahun_angkatan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `transaksi_tabungan`
--
ALTER TABLE `transaksi_tabungan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaksi_tabungan_id_siswa_foreign` (`id_siswa`),
  ADD KEY `transaksi_tabungan_id_kategori_foreign` (`id_kategori`),
  ADD KEY `transaksi_tabungan_id_kelas_foreign` (`id_kelas`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_id_siswa_foreign` (`id_siswa`);

--
-- Indeks untuk tabel `visi_misi`
--
ALTER TABLE `visi_misi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `aduan_siswa`
--
ALTER TABLE `aduan_siswa`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `all_prestasis`
--
ALTER TABLE `all_prestasis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `arsip_tabungan_bulanan`
--
ALTER TABLE `arsip_tabungan_bulanan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT untuk tabel `eskuls`
--
ALTER TABLE `eskuls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kategori_aduan`
--
ALTER TABLE `kategori_aduan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `kategori_transaksi`
--
ALTER TABLE `kategori_transaksi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT untuk tabel `murid`
--
ALTER TABLE `murid`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT untuk tabel `murid_kelas`
--
ALTER TABLE `murid_kelas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `prestasis`
--
ALTER TABLE `prestasis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `sekolah`
--
ALTER TABLE `sekolah`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tahun_angkatan`
--
ALTER TABLE `tahun_angkatan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `transaksi_tabungan`
--
ALTER TABLE `transaksi_tabungan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT untuk tabel `visi_misi`
--
ALTER TABLE `visi_misi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `aduan_siswa`
--
ALTER TABLE `aduan_siswa`
  ADD CONSTRAINT `aduan_siswa_id_aduan_foreign` FOREIGN KEY (`id_aduan`) REFERENCES `kategori_aduan` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `aduan_siswa_id_kelas_foreign` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `aduan_siswa_id_siswa_foreign` FOREIGN KEY (`id_siswa`) REFERENCES `murid` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `arsip_tabungan_bulanan`
--
ALTER TABLE `arsip_tabungan_bulanan`
  ADD CONSTRAINT `arsip_tabungan_bulanan_id_kelas_foreign` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `arsip_tabungan_bulanan_id_siswa_foreign` FOREIGN KEY (`id_siswa`) REFERENCES `murid` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `murid`
--
ALTER TABLE `murid`
  ADD CONSTRAINT `murid_id_kelas_foreign` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `murid_id_ta_foreign` FOREIGN KEY (`id_ta`) REFERENCES `tahun_angkatan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `murid_kelas`
--
ALTER TABLE `murid_kelas`
  ADD CONSTRAINT `murid_kelas_id_kelas_foreign` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `murid_kelas_id_siswa_foreign` FOREIGN KEY (`id_siswa`) REFERENCES `murid` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `murid_kelas_id_ta_foreign` FOREIGN KEY (`id_ta`) REFERENCES `tahun_angkatan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `transaksi_tabungan`
--
ALTER TABLE `transaksi_tabungan`
  ADD CONSTRAINT `transaksi_tabungan_id_kategori_foreign` FOREIGN KEY (`id_kategori`) REFERENCES `kategori_transaksi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_tabungan_id_kelas_foreign` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_tabungan_id_siswa_foreign` FOREIGN KEY (`id_siswa`) REFERENCES `murid` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_id_siswa_foreign` FOREIGN KEY (`id_siswa`) REFERENCES `murid` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
