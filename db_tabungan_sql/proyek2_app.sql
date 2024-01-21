-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 21, 2024 at 03:58 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

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
-- Table structure for table `admins`
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
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `email`, `password`, `jenis_kelamin`, `jabatan`, `created_at`, `updated_at`, `profile_picture`) VALUES
(2, 'ibra12', 'ibrah@gmail.com', '$2y$10$2SNsLa9eYeOKsmW12DuqaOO5Kvat.H81irIcE7vTnWW6HVxr/n0Ii', 'laki-laki', 'admin 2', NULL, NULL, NULL),
(3, 'hurul03', 'hurul@gmail.com', '$2y$10$sddEu0T2lTOpuCDTVLltxu.3mZTNqO21MDb2NzOEMOQECBvQ9kwDu', 'perempuan', 'admin 3', NULL, NULL, NULL),
(4, 'Zahra01', 'syzahraaa12@gmail.com', '$2y$10$eOMvddPei11/EWe1Yp4Aq.oQGy.KdcbOUOMyAbhgpaInI7dygmhCe', 'Perempuan', 'admin 1', NULL, '2024-01-01 20:31:48', 'profile_pictures/GbpoNTYdNwCAUmO2UWHfP6OltoN8zTSvOrxsaGGo.gif');

-- --------------------------------------------------------

--
-- Table structure for table `aduan_siswa`
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
-- Dumping data for table `aduan_siswa`
--

INSERT INTO `aduan_siswa` (`id`, `id_aduan`, `id_siswa`, `id_kelas`, `aduan`, `created_at`, `updated_at`, `bukti_aduan`) VALUES
(30, 2, 71, 1, 'Salah input nominal', '2024-01-07 10:35:24', '2024-01-07 10:35:24', '1704648924_bg.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `all_prestasis`
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
-- Dumping data for table `all_prestasis`
--

INSERT INTO `all_prestasis` (`id`, `subjudul`, `deskripsi`, `foto_tampilan`, `foto_dokumentasi`, `created_at`, `updated_at`) VALUES
(4, 'Juara Perlombaan Tari Tradisional', '<p><strong>Juara perlombaan tari tradisional adalah seorang seniman yang telah mengukir prestasi gemilang melalui keahlian dan dedikasinya dalam melestarikan dan mengembangkan seni tari tradisional. </strong>Dengan penuh semangat dan keuletan, mereka telah berhasil mengungkapkan keindahan budaya dan warisan leluhur melalui gerak-gerik tari yang memukau. Sebagai juara, mereka tidak hanya memperlihatkan kecakapan teknis dalam menari, tetapi juga mampu menyampaikan cerita dan makna mendalam yang terkandung dalam setiap gerakan. Kepekaan artistik mereka memungkinkan penonton merasakan emosi dan kekayaan budaya yang terkandung dalam setiap penampilan. </p><p><br></p><p><strong>Para juara ini bukan hanya penari ulung, tetapi juga penerima warisan budaya yang berusaha keras untuk mempertahankan tradisi yang terkadang dihadapkan pada tantangan </strong>modernisasi. Mereka menjadi duta seni budaya, memperkenalkan kekayaan tari tradisional kepada khalayak lebih luas dan mendukung pelestarian serta pengembangan seni tersebut. Keberhasilan seorang juara dalam perlombaan tari tradisional juga mencerminkan komitmen mereka terhadap pembelajaran dan pengembangan pribadi. Mereka terus berusaha untuk mengasah keterampilan mereka, menggali lebih dalam ke dalam aspek-aspek artistik, sejarah, dan makna budaya yang melandasi setiap tarian yang mereka persembahkan. Dengan menjadi juara, mereka bukan hanya meraih prestise, tetapi juga menjelma menjadi inspirasi bagi generasi muda untuk menghargai dan mencintai warisan budaya mereka sendiri. Keberhasilan mereka di atas panggung menjadi sumber motivasi bagi para penari muda dan pemerhati seni tradisional untuk terus berdedikasi dalam melestarikan keindahan tari tradisional.</p>', '1704039550_tampilan.jpg', '1704263441_dokumentasi.jpg', '2023-12-31 09:19:10', '2024-01-06 08:33:14'),
(5, 'Juara Internasional', '<p><strong>Juara perlombaan basket internasional</strong> adalah tim yang tidak hanya unggul dalam keterampilan bola basket, tetapi juga mencerminkan semangat tim yang solid, kekompakan, dan keinginan untuk meraih keunggulan di panggung dunia. Dengan kerja sama yang apik, strategi permainan yang cerdas, dan kemampuan atletik yang luar biasa, tim ini telah menunjukkan dominasi mereka di kancah kompetisi internasional. Para pemain juara ini bukan hanya atlet berbakat, tetapi juga penerimaan kreativitas, kecerdikan, dan kemampuan adaptasi di lapangan. Mereka tidak hanya mengandalkan keunggulan fisik, tetapi juga memiliki pemahaman yang mendalam tentang taktik permainan, strategi bertahan dan menyerang, serta kemampuan berpikir cepat yang diperlukan dalam situasi kompetitif. Keberhasilan mereka bukan hanya tercermin dalam jumlah poin yang mereka cetak, tetapi juga dalam keterampilan menghadapi tekanan dan tantangan dalam setiap pertandingan. Juara perlombaan basket internasional memiliki mentalitas pemenang yang kuat, mampu mempertahankan keunggulan dalam situasi sulit, dan tidak pernah menyerah meskipun dihadapkan pada tekanan yang tinggi. Selain itu, para pemain dan pelatih tim juara ini juga memainkan peran penting dalam mempromosikan nilai-nilai positif di dunia olahraga. Mereka menjadi panutan bagi generasi muda, menunjukkan dedikasi, kerja keras, dan semangat sportifitas dalam upaya mencapai kesuksesan. Keberhasilan tim ini juga menciptakan rasa kebanggaan nasional dan merajut solidaritas di antara para penggemar olahraga di seluruh dunia. Juara perlombaan basket internasional bukan hanya sekadar pemegang gelar, tetapi juga pelopor prestasi luar biasa yang akan terus diingat dalam sejarah olahraga. Keberhasilan mereka tidak hanya merayakan kehebatan atletik, tetapi juga membangun warisan positif untuk generasi yang akan datang, mendorong semangat persatuan dan keberagaman melalui cinta terhadap olahraga ini.</p>', '1704263620_tampilan.jpg', '1704263620_dokumentasi.jpg', '2023-12-31 11:02:42', '2024-01-06 08:37:22'),
(6, 'Juara Lomba Pramuka Tingkat Provinsi', '<p><em>Juara perlombaan Pramuka</em> adalah sosok yang menonjol dalam keterampilan, semangat kepemimpinan, dan nilai-nilai kepramukaan. Mereka tidak hanya memiliki keahlian dalam keterampilan dasar pramuka, seperti berkemah, menyalakan api tanpa korek api, dan peta penjelajahan, tetapi juga menunjukkan kepemimpinan yang kuat dan kemampuan bekerja sama dalam berbagai situasi. Seorang juara Pramuka memahami dan menerapkan nilai-nilai dasar kepramukaan, seperti kemandirian, tanggung jawab, kejujuran, dan kepedulian terhadap sesama. Mereka menjadi teladan bagi anggota regu atau gugusnya dalam mengembangkan sikap positif, moralitas, dan karakter yang kuat. Keterampilan dasar kepramukaan, seperti membuat perangkat berkemah, mengikuti jejak, dan menyusun peta, tidak hanya dikuasai dengan baik oleh juara ini, tetapi juga diaplikasikan secara efektif dalam situasi nyata. Mereka mampu berpikir kreatif, bersikap responsif terhadap tantangan, dan menunjukkan ketangguhan mental dalam menjalani berbagai kegiatan pramuka.</p><p><br></p><p><strong>Selain itu, juara Pramuka seringkali menjadi pemimpin</strong> yang visioner dalam merancang dan melaksanakan proyek-proyek bermanfaat bagi masyarakat. Mereka terlibat aktif dalam kegiatan sosial, proyek lingkungan, atau kegiatan kemanusiaan, mencerminkan semangat kepedulian dan tanggung jawab sosial yang melekat pada gerakan pramuka. Keberhasilan seorang juara Pramuka juga menciptakan rasa kebersamaan dan kebanggaan di antara anggota regunya. Mereka memotivasi teman-teman pramuka untuk terus berkembang, belajar, dan berkontribusi positif terhadap lingkungan sekitar. Juara Pramuka bukan hanya sekadar pemimpin, tetapi juga teman yang memberikan inspirasi dan dukungan bagi rekan-rekannya dalam perjalanan kepramukaan mereka.</p>', '1704263756_tampilan.jpg', '1704263756_dokumentasi.jpg', '2024-01-02 22:02:07', '2024-01-06 08:58:59');

-- --------------------------------------------------------

--
-- Table structure for table `arsip_tabungan_bulanan`
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
-- Dumping data for table `arsip_tabungan_bulanan`
--

INSERT INTO `arsip_tabungan_bulanan` (`id`, `id_siswa`, `tanggal_arsip`, `total`, `saldo`, `created_at`, `updated_at`, `id_kelas`) VALUES
(53, 71, '2024-01-07', 50000.00, 50000.00, '2024-01-07 10:32:27', '2024-01-07 10:32:27', 1),
(54, 82, '2024-01-08', 0.00, 200000.00, '2024-01-07 20:17:36', '2024-01-07 20:20:23', 1);

-- --------------------------------------------------------

--
-- Table structure for table `eskuls`
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
-- Dumping data for table `eskuls`
--

INSERT INTO `eskuls` (`id`, `subjudul`, `deskripsi`, `foto_tampilan`, `foto_dokumentasi1`, `foto_dokumentasi2`, `created_at`, `updated_at`) VALUES
(15, 'EKSTRAKURIKULER BASKET', '<p>Ekstrakurikuler Basket di sekolah kami tidak hanya menjadi kegiatan rutin, melainkan juga sebuah komunitas dinamis yang membentuk karakter, semangat tim, dan keterampilan atletik para pesertanya. Dengan pelatih yang berpengalaman dan dedikasi tinggi, ekskul basket menjadi wadah yang ideal bagi siswa-siswa yang tertarik mengembangkan potensi dalam olahraga bola basket.</p><p>Setiap latihan di ekstrakurikuler basket tidak hanya menekankan pada teknik dan strategi permainan, tetapi juga pada nilai-nilai seperti kerjasama, kepemimpinan, dan disiplin diri. Melalui latihan intensif, peserta belajar tidak hanya menjadi pemain yang baik tetapi juga individu yang memiliki karakter kuat di dalam dan di luar lapangan.</p><p>Ekskul basket di sekolah kami memberikan peluang bagi siswa untuk mengasah keterampilan dasar seperti dribbling, passing, dan shooting, sambil menggali potensi sebagai pemimpin dalam tim. Pemain-pemain muda kami didorong untuk mengembangkan pemahaman taktis, menghargai peran setiap anggota tim, dan berkomunikasi efektif di lapangan.</p><p>Keikutsertaan dalam turnamen dan kompetisi regional adalah bagian integral dari program ekskul basket kami. Ini bukan hanya tentang meraih kemenangan, tetapi juga tentang pengalaman berharga dalam mengelola tekanan, belajar dari kekalahan, dan merayakan keberhasilan bersama sebagai tim.</p><p>Selain itu, ekstrakurikuler basket tidak hanya menciptakan atlet handal tetapi juga memupuk rasa solidaritas dan persahabatan di antara pesertanya. Semua anggota tim merasakan kehangatan dalam lingkungan yang mendukung, di mana kerja keras dihargai dan setiap pencapaian, baik besar maupun kecil, dirayakan bersama.</p><p>Dengan fasilitas olahraga yang memadai dan semangat kompetitif yang positif, ekskul basket di sekolah kami menjadi peluang yang menyenangkan dan bermakna bagi para siswa untuk mengejar passion mereka dalam dunia olahraga dan membangun fondasi yang kuat untuk masa depan yang sukses.</p>', '1704679813_2.jpg', '1704679813_6.jpg', '1704679813_12.jpeg', '2024-01-07 18:56:09', '2024-01-07 19:10:13'),
(17, 'EKSTRAKURIKULER PRAMUKA', '<p>Ekstrakurikuler Pramuka adalah wadah yang memungkinkan siswa untuk mengembangkan keterampilan kepemimpinan, jiwa petualangan, dan rasa tanggung jawab. Berikut adalah deskripsi mengenai Ekstrakurikuler Pramuka:</p><p><br></p><p>Ekstrakurikuler Pramuka merupakan kegiatan yang melibatkan siswa dalam petualangan, pembelajaran, dan pengembangan karakter. Dengan mengikuti kegiatan ini, siswa tidak hanya mendapatkan pengetahuan praktis tentang kehidupan di alam terbuka, tetapi juga memperoleh nilai-nilai kepramukaan yang mendorong pertumbuhan kepribadian yang tangguh dan bertanggung jawab.</p><p><br></p><p>Dalam kegiatan Pramuka, siswa akan diajak untuk belajar berbagai keterampilan dasar seperti kemah, memasak di alam terbuka, peta dan kompas, serta pertolongan pertama. Selain itu, melalui kegiatan kelompok, mereka akan mengasah keterampilan sosial, kerjasama tim, dan kepemimpinan.</p><p><br></p><p>Kepramukaan juga mendorong pengembangan nilai-nilai moral, integritas, dan kejujuran. Peserta Pramuka diharapkan dapat menjalankan prinsip \"Dwi Darma\" (cinta alam dan cinta tanah air) dalam setiap tindakan mereka, menjadikan mereka individu yang peduli terhadap lingkungan dan masyarakat.</p><p><br></p><p>Sebagai sebuah ekskul, Pramuka memberikan suasana belajar yang berbeda, di luar lingkungan kelas yang konvensional. Melalui petualangan, siswa dapat menemukan potensi diri, mengatasi tantangan, dan belajar untuk mandiri. Selain itu, kebersamaan dalam kemah dan kegiatan lainnya mempererat hubungan antar siswa, menciptakan ikatan persahabatan yang kuat.</p><p><br></p><p>Partisipasi dalam Ekstrakurikuler Pramuka bukan hanya tentang mendapatkan medali atau tanda penghargaan, tetapi lebih pada proses pembelajaran sepanjang hidup. Dengan menjadi bagian dari Pramuka, siswa memiliki kesempatan untuk mengembangkan karakter yang kuat, pengetahuan praktis yang bermanfaat, dan rasa cinta terhadap alam dan sesama.</p>', '1704679895_5.jpg', '1704679895_4.jpg', '1704679895_7.jpg', '2024-01-07 19:11:35', '2024-01-07 19:11:35'),
(18, 'EKSTRAKURIKULER FUTSAL', '<p>Ekstrakurikuler Futsal di sekolah kami merupakan wadah yang dinamis bagi para siswa yang memiliki semangat olahraga, keinginan untuk mengembangkan keterampilan sepak bola dalam skala lebih kecil, dan tentunya memiliki hasrat untuk meningkatkan kebugaran fisik. Dengan semangat kebersamaan dan semangat persaingan yang sehat, Ekstrakurikuler Futsal menjadi salah satu kegiatan yang sangat dinantikan di kalangan siswa.</p><p>Dalam setiap sesi latihan, peserta Ekstrakurikuler Futsal tidak hanya diajarkan teknik dasar futsal seperti umpan, tendangan, dan gerakan strategis, tetapi juga dibimbing untuk memahami konsep kerjasama tim, tanggung jawab, serta kedisiplinan. Tim pelatih yang berdedikasi bekerja sama dengan siswa untuk mengembangkan potensi individu sekaligus membangun kekuatan tim yang solid.</p><p>Keunikan dari Ekstrakurikuler Futsal ini terletak pada atmosfer kekeluargaan yang tercipta di antara para peserta. Mereka tidak hanya menjadi rekan setim di lapangan, tetapi juga sahabat di luar lapangan. Dalam suasana yang penuh semangat, siswa belajar tidak hanya menjadi pemain futsal yang handal tetapi juga pribadi yang bertanggung jawab, disiplin, dan memiliki jiwa kepemimpinan.</p><p>Partisipasi dalam kegiatan kompetisi antar-ekstrakurikuler maupun turnamen futsal di luar sekolah menjadi peluang bagi siswa untuk mengasah keterampilan mereka secara praktis dan merasakan atmosfer persaingan yang sehat. Ekstrakurikuler Futsal di sekolah kami bertujuan untuk memberikan pengalaman olahraga yang bermakna, membangun karakter, dan menciptakan kenangan indah di masa sekolah.</p><p>Dengan semangat sportivitas dan dedikasi untuk mencapai prestasi, Ekstrakurikuler Futsal di sekolah kami memberikan pengalaman yang mendalam bagi setiap peserta, mempersiapkan mereka untuk tantangan di dunia olahraga sekaligus membentuk individu yang sehat dan berprestasi.i generasi mendatang untuk terus melestarikan dan mengembangkan kekayaan budaya lewat seni tari.</p>', '1704680075_9.jpg', '1704680075_10.jpg', '1704680075_11.jpeg', '2024-01-07 19:14:35', '2024-01-07 19:14:35');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
-- Table structure for table `kategori_aduan`
--

CREATE TABLE `kategori_aduan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ket_aduan` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategori_aduan`
--

INSERT INTO `kategori_aduan` (`id`, `ket_aduan`, `created_at`, `updated_at`) VALUES
(1, 'Sekolah', NULL, NULL),
(2, 'Tabungan', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kategori_transaksi`
--

CREATE TABLE `kategori_transaksi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategori_transaksi`
--

INSERT INTO `kategori_transaksi` (`id`, `deskripsi`, `created_at`, `updated_at`) VALUES
(1, 'Pemasukkan', NULL, NULL),
(2, 'Pengeluaran', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ket_kelas` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kelas`
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
(11, 'Kelas 9C', '2023-12-23 02:29:56', '2023-12-23 02:29:56');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
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
(49, '2024_01_02_185007_modify_aduan_siswa_table', 20),
(50, '2024_01_06_061059_create_profil_guru_table', 21),
(51, '2024_01_06_085356_create_profil_kepsek_table', 22);

-- --------------------------------------------------------

--
-- Table structure for table `murid`
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
-- Dumping data for table `murid`
--

INSERT INTO `murid` (`id`, `nisn_murid`, `nama_murid`, `jenis_kelamin`, `tgl_lahir`, `id_kelas`, `id_ta`, `created_at`, `updated_at`) VALUES
(71, '2203001', 'Vira Nur Zahra', 'Perempuan', '2003-12-01', 1, 3, '2024-01-07 10:31:43', '2024-01-07 10:31:43'),
(72, '2203082', 'Putra Maulana Ibrahim', 'Laki-laki', '2004-12-07', 2, 3, '2024-01-07 17:52:20', '2024-01-07 17:52:20'),
(73, '2203077', 'Rizky Ridho', 'Laki-laki', '2003-03-20', 3, 3, '2024-01-07 17:53:04', '2024-01-07 17:53:04'),
(74, '2203089', 'Muhamad Jaenudin', 'Laki-laki', '2003-08-22', 4, 3, '2024-01-07 17:54:10', '2024-01-07 17:54:10'),
(75, '2203060', 'Siti Nur Mala', 'Perempuan', '2003-05-06', 5, 2, '2024-01-07 17:55:12', '2024-01-07 17:55:12'),
(76, '2203055', 'Khaerudin', 'Laki-laki', '2002-09-29', 6, 2, '2024-01-07 17:56:06', '2024-01-07 17:56:06'),
(77, '2203044', 'Adhiel Tamara', 'Laki-laki', '2002-02-03', 7, 2, '2024-01-07 17:57:02', '2024-01-07 17:57:02'),
(78, '2203011', 'Annisa Tiarra', 'Perempuan', '2002-12-19', 8, 2, '2024-01-07 17:57:45', '2024-01-07 17:57:45'),
(79, '2203066', 'Damar Riski', 'Laki-laki', '2001-05-19', 9, 1, '2024-01-07 17:58:34', '2024-01-07 18:00:34'),
(80, '2203024', 'Azzizah Komalasari', 'Perempuan', '2002-05-19', 10, 2, '2024-01-07 17:59:15', '2024-01-07 17:59:15'),
(81, '2203054', 'Iqbal Ramadhan', 'Laki-laki', '2001-08-22', 11, 1, '2024-01-07 18:00:11', '2024-01-07 18:00:11'),
(82, '2203033', 'Intan Dewi Puspita', 'Perempuan', '2004-02-11', 1, 3, '2024-01-07 18:01:35', '2024-01-07 18:01:35'),
(83, '2203080', 'Jaehyun Komarudin', 'Laki-laki', '2003-12-06', 2, 3, '2024-01-07 18:02:17', '2024-01-07 18:02:17'),
(84, '2203023', 'Lesti Khoirunnisa', 'Perempuan', '2004-02-02', 3, 3, '2024-01-07 18:03:11', '2024-01-07 18:03:11'),
(85, '2203050', 'Muhamad Azhar Syah', 'Laki-laki', '2004-02-22', 4, 3, '2024-01-07 18:04:07', '2024-01-07 18:04:07'),
(86, '2203010', 'Rizal Fauzi', 'Laki-laki', '2003-11-12', 5, 2, '2024-01-07 18:04:50', '2024-01-07 18:04:50'),
(87, '2203090', 'Indra Setiawan', 'Laki-laki', '2002-04-20', 6, 2, '2024-01-07 18:05:24', '2024-01-07 18:05:24'),
(88, '2203015', 'Sandika Galih', 'Laki-laki', '2002-08-29', 8, 2, '2024-01-07 18:07:22', '2024-01-07 18:07:22'),
(89, '2203073', 'Waludin Komar', 'Laki-laki', '2001-04-23', 10, 1, '2024-01-07 18:09:26', '2024-01-07 18:09:26'),
(90, '2203076', 'Windini Putri', 'Perempuan', '2001-05-04', 11, 1, '2024-01-07 18:09:55', '2024-01-07 18:09:55');

-- --------------------------------------------------------

--
-- Table structure for table `murid_kelas`
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
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
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
-- Table structure for table `prestasis`
--

CREATE TABLE `prestasis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul_utama` varchar(255) NOT NULL,
  `gambar_utama` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `prestasis`
--

INSERT INTO `prestasis` (`id`, `judul_utama`, `gambar_utama`, `created_at`, `updated_at`) VALUES
(5, 'PRESTASI YANG PERNAH DIRAIH OLEH SISWA/SISWI', '1704110488.jpg', '2024-01-01 05:01:28', '2024-01-06 04:22:59');

-- --------------------------------------------------------

--
-- Table structure for table `profil_guru`
--

CREATE TABLE `profil_guru` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_guru` varchar(255) NOT NULL,
  `jabatan` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `foto_guru` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profil_guru`
--

INSERT INTO `profil_guru` (`id`, `nama_guru`, `jabatan`, `alamat`, `foto_guru`, `created_at`, `updated_at`) VALUES
(16, 'Putra Adiwijaya', 'Guru Pendidikan Agama Islam', 'Pabean udik, RSS. jl.Cumi-Cumi 13, Kec.Indramayu', '1704676662_guru5.jpg', '2024-01-07 18:17:42', '2024-01-07 18:36:08'),
(17, 'Maryadi Kusuma', 'Guru Bahasa Indonesia', 'Desa Bulak, Blok.Kalimenir no.11, Kec.Celeng Selatan', '1704676764_guru6.jpeg', '2024-01-07 18:19:24', '2024-01-07 18:19:24'),
(18, 'Rukmini', 'Guru Matematika', 'Desa Suka urip, jl.madagaskar, Kec.New zeland', '1704676860_guru4.jpg', '2024-01-07 18:21:00', '2024-01-07 18:21:00'),
(19, 'Yosi Dwi Puspita', 'Guru Bahasa Inggris', 'Rambatan Kulon, jl.mekarsari Kec.Sindang. Indramayu', '1704676982_guru1.jpg', '2024-01-07 18:23:02', '2024-01-07 18:39:35'),
(20, 'Hurul Damayati', 'Guru Bimbingan Konseling', 'Jl.Sudirman, Desa Kertawinangun, Kec.Anjatan, Indramayu', '1704677955_guru2.jpg', '2024-01-07 18:38:34', '2024-01-07 18:39:15'),
(21, 'Karsim Sartono', 'Guru Pendidikan Kewarganegaraan', 'Desa.Kalijaga Blok.Condong jl.Sontong Kec.Lohboner Kab.Indramayu', '1704678198_guru3.jpg', '2024-01-07 18:43:18', '2024-01-07 18:43:18');

-- --------------------------------------------------------

--
-- Table structure for table `profil_kepsek`
--

CREATE TABLE `profil_kepsek` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_kepsek` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `foto_kepsek` varchar(255) NOT NULL,
  `foto_bersama` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profil_kepsek`
--

INSERT INTO `profil_kepsek` (`id`, `nama_kepsek`, `alamat`, `foto_kepsek`, `foto_bersama`, `created_at`, `updated_at`) VALUES
(9, 'Vira Nur Zahra', 'Ds. Eretan Kulon, Kec. Kandanghaur, Kab. Indramayu', '1704545113_guru.jpeg', '1704545274_Stakeholder SMP 69.jpeg', '2024-01-06 04:11:28', '2024-01-06 05:47:54');

-- --------------------------------------------------------

--
-- Table structure for table `sekolah`
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
-- Dumping data for table `sekolah`
--

INSERT INTO `sekolah` (`id`, `nama`, `npsn`, `status_sekolah`, `sk_pendirian`, `tgl_sk_pendirian`, `status_kepemilikan`, `sk_izin_operasional`, `tgl_sk_izin_operasional`, `npwp`, `created_at`, `updated_at`, `deskripsi_sekolah`, `no_telp`, `email_sekolah`, `logo_path`) VALUES
(1, 'SMP 2 SINDANG', '20216093', 'Swasta', '402/102/KEP/E/94', '1994-06-15', 'Yayasan', '402/102/KEP/E/94', '1994-06-15', '027258441437000', '2023-12-28 09:25:29', '2024-01-07 20:16:11', 'SMP Nurul Halim Widasari berkomitmen untuk membentuk peserta didik yang memiliki karakter unggul melalui pendekatan holistik. Sekolah ini mengedepankan nilai-nilai keagamaan dengan melaksanakan kegiatan keagamaan yang kaya makna, bertujuan membentuk peserta didik yang religius dan berakhlak mulia. Proses penilaian terhadap peserta didik dilakukan secara obyektif, memberikan gambaran yang akurat terkait perkembangan akademis mereka.', '351669', 'smpnurulhalim93@gmail.com', 'images/SxA1qMjC1pgvpbuvMKwcvK7oHhCtiQINTLkpYEJp.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tahun_angkatan`
--

CREATE TABLE `tahun_angkatan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tahun` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tahun_angkatan`
--

INSERT INTO `tahun_angkatan` (`id`, `tahun`, `created_at`, `updated_at`) VALUES
(1, '2021/2022', '2023-12-23 02:31:32', '2023-12-23 02:31:32'),
(2, '2022/2023', '2023-12-23 02:31:32', '2023-12-23 02:31:32'),
(3, '2023/2024', '2023-12-23 02:31:32', '2023-12-23 02:31:32');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_tabungan`
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
-- Dumping data for table `transaksi_tabungan`
--

INSERT INTO `transaksi_tabungan` (`id`, `id_siswa`, `tanggal`, `id_kategori`, `nominal`, `total`, `created_at`, `updated_at`, `id_kelas`) VALUES
(164, 71, NULL, NULL, NULL, 0.00, '2024-01-07 10:31:43', '2024-01-07 10:31:43', 1),
(165, 71, '2024-01-08', 1, 50000.00, 50000.00, '2024-01-07 10:32:27', '2024-01-07 10:32:27', 1),
(166, 72, NULL, NULL, NULL, 0.00, '2024-01-07 17:52:20', '2024-01-07 17:52:20', 2),
(167, 73, NULL, NULL, NULL, 0.00, '2024-01-07 17:53:04', '2024-01-07 17:53:04', 3),
(168, 74, NULL, NULL, NULL, 0.00, '2024-01-07 17:54:10', '2024-01-07 17:54:10', 4),
(169, 75, NULL, NULL, NULL, 0.00, '2024-01-07 17:55:12', '2024-01-07 17:55:12', 5),
(170, 76, NULL, NULL, NULL, 0.00, '2024-01-07 17:56:06', '2024-01-07 17:56:06', 6),
(171, 77, NULL, NULL, NULL, 0.00, '2024-01-07 17:57:02', '2024-01-07 17:57:02', 7),
(172, 78, NULL, NULL, NULL, 0.00, '2024-01-07 17:57:45', '2024-01-07 17:57:45', 8),
(173, 79, NULL, NULL, NULL, 0.00, '2024-01-07 17:58:34', '2024-01-07 17:58:34', 9),
(174, 80, NULL, NULL, NULL, 0.00, '2024-01-07 17:59:15', '2024-01-07 17:59:15', 10),
(175, 81, NULL, NULL, NULL, 0.00, '2024-01-07 18:00:11', '2024-01-07 18:00:11', 11),
(176, 82, NULL, NULL, NULL, 0.00, '2024-01-07 18:01:36', '2024-01-07 18:01:36', 1),
(177, 83, NULL, NULL, NULL, 0.00, '2024-01-07 18:02:17', '2024-01-07 18:02:17', 2),
(178, 84, NULL, NULL, NULL, 0.00, '2024-01-07 18:03:11', '2024-01-07 18:03:11', 3),
(179, 85, NULL, NULL, NULL, 0.00, '2024-01-07 18:04:07', '2024-01-07 18:04:07', 4),
(180, 86, NULL, NULL, NULL, 0.00, '2024-01-07 18:04:50', '2024-01-07 18:04:50', 5),
(181, 87, NULL, NULL, NULL, 0.00, '2024-01-07 18:05:24', '2024-01-07 18:05:24', 6),
(182, 88, NULL, NULL, NULL, 0.00, '2024-01-07 18:07:22', '2024-01-07 18:07:22', 8),
(183, 89, NULL, NULL, NULL, 0.00, '2024-01-07 18:09:26', '2024-01-07 18:09:26', 10),
(184, 90, NULL, NULL, NULL, 0.00, '2024-01-07 18:09:55', '2024-01-07 18:09:55', 11),
(185, 82, '2024-01-08', 1, 200000.00, 200000.00, '2024-01-07 20:17:36', '2024-01-07 20:17:36', 1),
(186, 82, '2024-01-08', 2, 50000.00, 50000.00, '2024-01-07 20:18:00', '2024-01-07 20:18:00', 1),
(187, 82, '2024-01-08', 2, 150000.00, 150000.00, '2024-01-07 20:20:23', '2024-01-07 20:20:23', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
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

-- --------------------------------------------------------

--
-- Table structure for table `visi_misi`
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
-- Dumping data for table `visi_misi`
--

INSERT INTO `visi_misi` (`id`, `judul_halaman`, `visi`, `misi`, `tujuan`, `created_at`, `updated_at`) VALUES
(2, '\"Hebat Bermartabat\"', '<p>Visi Sekolah adalah terwujudnya warga sekolah yang “<strong>ROHMATAN</strong>”. <strong>R</strong> = eligius; <strong>O</strong> = byektif; <strong>H </strong>= umanis;<strong> M</strong> = andiri; <strong>A</strong> = manah; <strong>T</strong> = oleransi; <strong>A</strong> = khlakul karimah; <strong>N</strong> = asionalis Indikator Pencapaian Visi</p>', '<p>a.	Melaksanakan kegiatan keagamaan untuk membentuk peserta didik yang Religius</p><p>b.	Melaksanakan proses penilaian terhadap peserta didik secara Obyektif</p><p>c.	Menyelesaikan permasalahan dengan menggunakan pendekatan Humanis</p><p>d.	Membina ke Mandirian peserta didik melalui pembiasaan program sekoalh</p><p>e.	Melaksanakan pegelolaan dan pembiayaan dengan Amanah</p><p>f.	Membangun kehidupan warga sekolah yang toleran terhadap perbedaan-perbedaan yang ada</p><p>g.	Melaksanakan kegiatan 3M (Menyapa Guru, Menyapa teman dan Menjaga sopan santun) untuk membentuk generasi yang berAkhlakul karimah</p><p>h.	Menumbuh kembangkan jiwa Nasional pada peserta didik</p>', '<p>Tujuan SMP Nurul Halim Widasari pada Tahun Ajaran 2023/2024 yaitu:</p><p>a)	Menjadikan peserta didik yang religius</p><p>b)	Mewujudkan proses penilaian yang obyektif</p><p>c)	Membiasakan dengan pendekatan humanis dalam menyelesaikan semua permasalahan</p><p>d)	Mejadikan lulusan yang mandiri</p><p>e)	Terwujudnya sikap amanah dalam kehidupan sehari-hari</p><p>f)	Tumbuhnya budaya toleransi antar warga sekolah</p><p>g)	Terbentuknya karakter peserta didik yang berAkhlakul karimah</p><p>h)	Terwujudnya jiwa nasionalis pada warga sekolah</p>', '2024-01-01 10:23:16', '2024-01-06 09:41:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_username_unique` (`username`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `aduan_siswa`
--
ALTER TABLE `aduan_siswa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `aduan_siswa_id_aduan_foreign` (`id_aduan`),
  ADD KEY `aduan_siswa_id_siswa_foreign` (`id_siswa`),
  ADD KEY `aduan_siswa_id_kelas_foreign` (`id_kelas`);

--
-- Indexes for table `all_prestasis`
--
ALTER TABLE `all_prestasis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `arsip_tabungan_bulanan`
--
ALTER TABLE `arsip_tabungan_bulanan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `arsip_tabungan_bulanan_id_siswa_foreign` (`id_siswa`),
  ADD KEY `arsip_tabungan_bulanan_id_kelas_foreign` (`id_kelas`);

--
-- Indexes for table `eskuls`
--
ALTER TABLE `eskuls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `kategori_aduan`
--
ALTER TABLE `kategori_aduan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori_transaksi`
--
ALTER TABLE `kategori_transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `murid`
--
ALTER TABLE `murid`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `murid_nisn_murid_unique` (`nisn_murid`),
  ADD KEY `murid_id_kelas_foreign` (`id_kelas`),
  ADD KEY `murid_id_ta_foreign` (`id_ta`);

--
-- Indexes for table `murid_kelas`
--
ALTER TABLE `murid_kelas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `murid_kelas_id_kelas_foreign` (`id_kelas`),
  ADD KEY `murid_kelas_id_siswa_foreign` (`id_siswa`),
  ADD KEY `murid_kelas_id_ta_foreign` (`id_ta`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `prestasis`
--
ALTER TABLE `prestasis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profil_guru`
--
ALTER TABLE `profil_guru`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profil_kepsek`
--
ALTER TABLE `profil_kepsek`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sekolah`
--
ALTER TABLE `sekolah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tahun_angkatan`
--
ALTER TABLE `tahun_angkatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi_tabungan`
--
ALTER TABLE `transaksi_tabungan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaksi_tabungan_id_siswa_foreign` (`id_siswa`),
  ADD KEY `transaksi_tabungan_id_kategori_foreign` (`id_kategori`),
  ADD KEY `transaksi_tabungan_id_kelas_foreign` (`id_kelas`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_id_siswa_foreign` (`id_siswa`);

--
-- Indexes for table `visi_misi`
--
ALTER TABLE `visi_misi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `aduan_siswa`
--
ALTER TABLE `aduan_siswa`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `all_prestasis`
--
ALTER TABLE `all_prestasis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `arsip_tabungan_bulanan`
--
ALTER TABLE `arsip_tabungan_bulanan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `eskuls`
--
ALTER TABLE `eskuls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategori_aduan`
--
ALTER TABLE `kategori_aduan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kategori_transaksi`
--
ALTER TABLE `kategori_transaksi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `murid`
--
ALTER TABLE `murid`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `murid_kelas`
--
ALTER TABLE `murid_kelas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `prestasis`
--
ALTER TABLE `prestasis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `profil_guru`
--
ALTER TABLE `profil_guru`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `profil_kepsek`
--
ALTER TABLE `profil_kepsek`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `sekolah`
--
ALTER TABLE `sekolah`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tahun_angkatan`
--
ALTER TABLE `tahun_angkatan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `transaksi_tabungan`
--
ALTER TABLE `transaksi_tabungan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=188;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `visi_misi`
--
ALTER TABLE `visi_misi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `aduan_siswa`
--
ALTER TABLE `aduan_siswa`
  ADD CONSTRAINT `aduan_siswa_id_aduan_foreign` FOREIGN KEY (`id_aduan`) REFERENCES `kategori_aduan` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `aduan_siswa_id_kelas_foreign` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `aduan_siswa_id_siswa_foreign` FOREIGN KEY (`id_siswa`) REFERENCES `murid` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `arsip_tabungan_bulanan`
--
ALTER TABLE `arsip_tabungan_bulanan`
  ADD CONSTRAINT `arsip_tabungan_bulanan_id_kelas_foreign` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `arsip_tabungan_bulanan_id_siswa_foreign` FOREIGN KEY (`id_siswa`) REFERENCES `murid` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `murid`
--
ALTER TABLE `murid`
  ADD CONSTRAINT `murid_id_kelas_foreign` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `murid_id_ta_foreign` FOREIGN KEY (`id_ta`) REFERENCES `tahun_angkatan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `murid_kelas`
--
ALTER TABLE `murid_kelas`
  ADD CONSTRAINT `murid_kelas_id_kelas_foreign` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `murid_kelas_id_siswa_foreign` FOREIGN KEY (`id_siswa`) REFERENCES `murid` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `murid_kelas_id_ta_foreign` FOREIGN KEY (`id_ta`) REFERENCES `tahun_angkatan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaksi_tabungan`
--
ALTER TABLE `transaksi_tabungan`
  ADD CONSTRAINT `transaksi_tabungan_id_kategori_foreign` FOREIGN KEY (`id_kategori`) REFERENCES `kategori_transaksi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_tabungan_id_kelas_foreign` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_tabungan_id_siswa_foreign` FOREIGN KEY (`id_siswa`) REFERENCES `murid` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_id_siswa_foreign` FOREIGN KEY (`id_siswa`) REFERENCES `murid` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
