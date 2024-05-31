-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 31 Bulan Mei 2024 pada 16.35
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `magang`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `acc_admins`
--

CREATE TABLE `acc_admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `acc_admins`
--

INSERT INTO `acc_admins` (`id`, `name`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Adriel Felix', '$2y$10$prw.1MGQWesBAdiTZOdUzeMSsbOFCv104qQG/7kxYFsZ6V2DYTFoy', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `banner`
--

CREATE TABLE `banner` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `nama` varchar(255) NOT NULL,
  `lokasi` varchar(255) NOT NULL,
  `tglfilm` varchar(255) NOT NULL,
  `jamfilm` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `banner`
--

INSERT INTO `banner` (`id`, `gambar`, `nama`, `lokasi`, `tglfilm`, `jamfilm`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '1715574798.jpg', 'Avengerr', 'Search', '2024-05-13', '01:50', 'Publish', NULL, '2024-05-12 21:33:18', '2024-05-12 21:34:05'),
(2, '1715574836.jpg', 'Anime', 'Search', '2024-05-13', '11:33', 'Publish', NULL, '2024-05-12 21:33:56', '2024-05-12 21:34:10'),
(3, '1715644047.jpg', 'Mario', 'Search', '2024-05-14', '06:47', 'Publish', NULL, '2024-05-13 16:47:27', '2024-05-13 16:47:27'),
(4, '1715644222.jpg', 'Kimi no nawa', 'Utama', '2024-05-14', '06:49', 'Publish', NULL, '2024-05-13 16:50:22', '2024-05-13 16:50:22'),
(5, '1715644325.jpg', 'The Roundup', 'Utama', '2024-05-14', '06:51', 'Publish', NULL, '2024-05-13 16:52:05', '2024-05-13 16:52:05'),
(7, '1715645173.jpg', 'Sonic', 'Utama', '2024-05-14', '07:05', 'Publish', NULL, '2024-05-13 17:06:13', '2024-05-13 17:06:13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `episodes`
--

CREATE TABLE `episodes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `episode` varchar(255) NOT NULL,
  `season_id` bigint(20) UNSIGNED NOT NULL,
  `serial` varchar(255) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `thumb_eps` varchar(255) DEFAULT NULL,
  `vid_eps` varchar(255) DEFAULT NULL,
  `is_publish` tinyint(1) NOT NULL DEFAULT 0,
  `desk_eps` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `episodes`
--

INSERT INTO `episodes` (`id`, `episode`, `season_id`, `serial`, `judul`, `thumb_eps`, `vid_eps`, `is_publish`, `desk_eps`, `created_at`, `updated_at`) VALUES
(1, '1', 1, '12', 'The Outsider', '17156793381617788738.webp', 'https://www.youtube.com/watch?v=HZarmNqfL7s', 1, 'test', '2024-05-14 02:35:39', '2024-05-14 02:35:39');

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
-- Struktur dari tabel `films`
--

CREATE TABLE `films` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) NOT NULL,
  `thumbnail` varchar(255) DEFAULT NULL,
  `deskripsi` longtext NOT NULL,
  `tahun` int(11) NOT NULL,
  `usia` varchar(255) NOT NULL,
  `perusahaan` varchar(255) NOT NULL,
  `sutradara` varchar(255) NOT NULL,
  `video` varchar(255) DEFAULT NULL,
  `durasi` varchar(255) DEFAULT NULL,
  `view` bigint(20) DEFAULT NULL,
  `kategori_id` bigint(20) UNSIGNED DEFAULT NULL,
  `tipe` enum('Film','Serial') NOT NULL DEFAULT 'Film',
  `is_publish` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `films`
--

INSERT INTO `films` (`id`, `judul`, `thumbnail`, `deskripsi`, `tahun`, `usia`, `perusahaan`, `sutradara`, `video`, `durasi`, `view`, `kategori_id`, `tipe`, `is_publish`, `created_at`, `updated_at`) VALUES
(1, 'Kisah Tanah Jawa Poncong Gundul', '1715588315.jpg', 'test', 2022, '17+', 'MD Pictures', 'Sidharta Tata', 'https://youtu.be/xDkeXcSso5Y?si=tSKCPs-fjRmqp_tp', '1j 55mnt', NULL, 1, 'Film', 1, '2024-05-13 01:18:35', '2024-05-13 01:18:35'),
(2, 'KKN', '1715636357.jpg', 'test', 2023, '17+', 'MD Pictures', 'Sidharta Tata', 'https://youtu.be/dndhSSujEFQ?si=AyCXs1Hx9POyw9ys', '1j 55mnt', NULL, 1, 'Film', 1, '2024-05-13 14:39:17', '2024-05-13 14:39:17'),
(4, 'Kuntilanak', '1715636440.jpg', 'test', 2023, '17+', 'MD Pictures', 'Sidharta Tata', 'https://youtu.be/dndhSSujEFQ?si=AyCXs1Hx9POyw9ys', '1j 55mnt', NULL, 1, 'Film', 1, '2024-05-13 14:40:40', '2024-05-13 14:40:40'),
(5, 'Mata Batin 2', '1715637850.jpg', 'test', 2023, '17+', 'MD Pictures', 'Sidharta Tata', 'https://youtu.be/dndhSSujEFQ?si=AyCXs1Hx9POyw9ys', '1j 55mnt', NULL, 1, 'Film', 1, '2024-05-13 15:04:10', '2024-05-13 15:04:10'),
(6, 'Megan', '1715637901.jpg', 'test', 2023, '17+', 'MD Pictures', 'Sidharta Tata', 'https://youtu.be/dndhSSujEFQ?si=AyCXs1Hx9POyw9ys', '1j 55mnt', NULL, 1, 'Film', 1, '2024-05-13 15:05:01', '2024-05-13 15:05:01'),
(7, 'IT', '1715638094.jpg', 'test', 2022, '17+', 'MD Pictures', 'Sidharta Tata', 'https://youtu.be/dndhSSujEFQ?si=AyCXs1Hx9POyw9ys', '1j 55mnt', NULL, 1, 'Film', 1, '2024-05-13 15:08:14', '2024-05-13 15:08:14'),
(8, 'Dead Silence', '1715638190.jpg', 'test', 2022, '17+', 'MD Pictures', 'Sidharta Tata', 'https://youtu.be/dndhSSujEFQ?si=AyCXs1Hx9POyw9ys', '1j 55mnt', NULL, 1, 'Film', 1, '2024-05-13 15:09:50', '2024-05-13 15:09:50'),
(9, 'The Doll 3', '1715638858.jpg', 'test', 2023, '17+', 'MD Pictures', 'Sidharta Tata', 'https://youtu.be/dndhSSujEFQ?si=AyCXs1Hx9POyw9ys', '1j 55mnt', NULL, 1, 'Film', 1, '2024-05-13 15:20:58', '2024-05-13 15:20:58'),
(10, 'Saw', '1715638934.jpg', 'test', 2023, '17+', 'MD Pictures', 'Sidharta Tata', 'https://youtu.be/dndhSSujEFQ?si=AyCXs1Hx9POyw9ys', '1j 55mnt', NULL, 1, 'Film', 1, '2024-05-13 15:22:14', '2024-05-13 15:22:14'),
(11, 'The Conjuring', '1715639139.jpg', 'test', 2022, '17+', 'MD Pictures', 'Sidharta Tata', 'https://youtu.be/g4Hbz2jLxvQ?si=XnvNy3hACSf2-jxp', '1j 55mnt', NULL, 1, 'Film', 1, '2024-05-13 15:25:39', '2024-05-13 15:25:39'),
(12, 'Switchover', '1715676930.jpg', 'Kembalinya Anna ke Jakarta membawa kebahagiaan bagi Jones, ayahnya. Anna merasa tak nyaman setelah kematian Jones berkaitan dengan geng motor Griffin.', 2023, '13+', 'Screenplay Films', 'Angling Sagaran', NULL, '1', NULL, NULL, 'Serial', 1, '2024-05-14 01:55:30', '2024-05-14 01:55:30'),
(13, 'Kalian Pantas Mati', '1717160261.jpg', 'Seorang pemuda yang memiliki kemampuan untuk berkomunikasi dengan orang yang sudah meninggal. Dia harus menggunakan kemampuannya untuk menghentikan roh jahat yang dipenuhi dendam terhadap teman sekolahnya. Sementara itu dia bertekad untuk membantu sesosok hantu cantik untuk mengembalikan ingatannya.', 2022, '17+', 'Paragon Pictures', 'Ginanti Rona', 'https://youtu.be/dndhSSujEFQ?si=AyCXs1Hx9POyw9ys', '1j 46m', NULL, 1, 'Film', 1, '2024-05-31 05:57:41', '2024-05-31 06:04:41'),
(14, 'Aku Tahu Kapan Kamu Mati', '1717160925.jpg', 'Setelah mengalami mati suri, Siena mendapatkan kemampuan untuk melihat kapan seseorang akan meninggal. Kemampuan tersebut ditandai dengan adanya sesosok hantu yang mengikuti orang yang akan meninggal. Korban pertama adalah siswi SMA yang bunuh diri, disusul oleh Pak Somad, tetangga Siena yang meninggal karena sakitnya kambuh. Korban ketiga adalah Brama, kakak kelas Siena, yang mulai mendekatinya pasca dia mengalami mati suri. Siena mencoba untuk meyakinkan tiga sahabatnya, Flo, Neni, dan Vina, akan kemampuannya. Mereka awalnya tidak percaya, sampai Brama tewas ditabrak truk tepat di depan mata mereka.', 2023, '17+', 'Unlimited Production', 'Oswin Bonifanz', 'https://youtu.be/dndhSSujEFQ?si=AyCXs1Hx9POyw9ys', '1j 34m', NULL, 1, 'Film', 1, '2024-05-31 06:08:45', '2024-05-31 06:08:45'),
(15, 'Waktu Maghrib', '1717161117.jpg', 'mengisahkan kisah seram yang berawal dari desa terpencil bernama Desa Jatijajar, Jawa Tengah, di mana tiga anak bernama Adi, Saman, dan Ayu tinggal. Mereka sering membantu keluarga mereka di ladang, yang mengakibatkan keterlambatan mereka ke sekolah.', 2023, '17+', 'Rapi Films', 'Sidharta Tata', 'https://youtu.be/dndhSSujEFQ?si=AyCXs1Hx9POyw9ys', '1j 44m', NULL, 1, 'Film', 1, '2024-05-31 06:11:57', '2024-05-31 06:11:57'),
(16, 'Sabrina', '1717161375.jpg', 'MAIRA hidup bahagia di pernikahan barunya bersama AIDEN, pembuat boneka Sabrina sekaligus pemilik sebuah perusahaan mainan. Tapi kebahagiaan mereka belum sempurna karena VANYA, anak angkat sekaligus keponakan Aiden yang yang piatu belum bisa menerima kehadiran Maira sebagai ibunya karena Vanya masih belum bisa merelakan kepergian ANDINI, bundanya yang sudah meninggal. Suatu hari, Vanya melakukan permainan ‘Pensil Charlie’ untuk memanggil bundanya dan kejanggalan-kejanggalan pun mulai terjadi. Maira dan Aiden Adak percaya, hingga akhirnya Maira mengalami serentetan kejadian menakutkan dan mereka melihat sendiri sosok Andini. Maira pun memanggil BU LARAS, seorang paranormal yang dulu pernah membantunya. Tapi Andini ternyata bukanlah Andini, melainkan iblis keji bernama BAGHIAH yang menetap di boneka Sabrina dan menginginkan tubuh manusia...', 2018, '17+', 'Mirage Enterprises Sandollar Productions', 'Rocky Soraya', 'https://youtu.be/dndhSSujEFQ?si=AyCXs1Hx9POyw9ys', '1j 52m', NULL, NULL, 'Film', 1, '2024-05-31 06:16:15', '2024-05-31 06:16:15'),
(17, 'Mereka Yang Tak Terlihat', '1717161615.jpg', 'Saras (Estelle Linden), seorang anak indigo yang bisa melihat makhluk-makhluk tak kasatmata sejak ia kecil. Ia merupakan putri dari Lidya (Sophia Latjuba), seorang single parent yang memiliki usaha kue kering untuk menyambung hidup. Ia memiliki adik bernama Laras. Lidya sendiri menganggap kelebihan Saras tidak masuk akal, sehingga membuat hubungan ibu dan anak itu menjadi berjarak. Lidya semakin lama semakin tidak mengerti dengan tingkah Saras.\r\n\r\nDi usia 17 tahun, Saras dua kali kesurupan dan hal ini membuat Lidya sangat khawatir dan meminta kakaknya yang bernama Tante Rima (Roweina Umboh), seorang psikolog, untuk menangani Saras. Namun, Tante Rima bersikeras ke Lidya bahwa hanya Lidya lah yang harus menangani Saras sebagai ibu kandungnya. Sampai suatu hari Saras didatangi oleh arwah bernama Dinda (Frislly Herlind), siswi SMA yang meninggal karena dibully di sekolah oleh Citra (Aliyah Faizah). Arwah Dinda meminta Saras untuk menemui ibunya yang bernama Dayu (Dayu Wijanto). Dinda ingin agar Dayu ikhlas merelakan kepergiannya dan memaafkan Citra yang selama ini dianggap sebagai penyebab kematiannya. Hubungan Saras dengan Lidya semakin kritis ketika keduanya mengutarakan kekecewaan terhadap sikap masing-masing dan saling menyalahkan, sampai sebuah peristiwa besar terjadi dalam kehidupan keluarga mereka.', 2022, '17+', 'Skylar Pictures', 'Billy Christian', 'https://youtu.be/dndhSSujEFQ?si=AyCXs1Hx9POyw9ys', '1j 34m', NULL, 1, 'Film', 1, '2024-05-31 06:20:15', '2024-05-31 06:20:15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategoris`
--

CREATE TABLE `kategoris` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `is_publish` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kategoris`
--

INSERT INTO `kategoris` (`id`, `kategori`, `is_publish`, `created_at`, `updated_at`) VALUES
(1, 'Horror', 1, '2024-05-13 01:09:30', '2024-05-13 01:15:32'),
(4, 'Film Korea', 1, '2024-05-13 01:11:21', '2024-05-13 01:11:21'),
(5, 'Super Hero', 1, '2024-05-13 01:11:33', '2024-05-13 01:11:33'),
(6, 'Animasi Anak Anak', 1, '2024-05-13 15:27:10', '2024-05-13 15:27:10'),
(7, 'Anime Jepang', 1, '2024-05-13 15:27:29', '2024-05-13 15:27:29'),
(8, 'Film Indonesia', 1, '2024-05-13 15:27:59', '2024-05-13 15:27:59');

-- --------------------------------------------------------

--
-- Struktur dari tabel `laporans`
--

CREATE TABLE `laporans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `laporan` varchar(255) NOT NULL,
  `lokasi` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_03_20_072332_banner', 1),
(6, '2024_03_22_043247_create_laporans_table', 1),
(7, '2024_03_22_074726_create_films_table', 1),
(8, '2024_03_27_043642_create_podcasts_table', 1),
(9, '2024_03_28_091019_create_rekomendasis_table', 1),
(10, '2024_04_01_061530_create_kategoris_table', 1),
(11, '2024_04_02_022335_create_relasi_kategoris_table', 1),
(12, '2024_04_23_025706_create_episodes_table', 1),
(13, '2024_04_23_025731_create_seasons_table', 1),
(17, '2024_05_08_041248_create_acc_admins_table', 2);

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
-- Struktur dari tabel `podcast`
--

CREATE TABLE `podcast` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) NOT NULL,
  `channel` varchar(255) NOT NULL,
  `host` varchar(255) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `view` varchar(255) DEFAULT NULL,
  `thumbnail` varchar(255) DEFAULT NULL,
  `video` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `podcast`
--

INSERT INTO `podcast` (`id`, `judul`, `channel`, `host`, `deskripsi`, `view`, `thumbnail`, `video`, `status`, `created_at`, `updated_at`) VALUES
(2, 'DZAWIN NUR BONGKAR RITUAL ILMU PEMANGGIL KUNTILANAK DILANGIT KELABU BARENG PRAZ TEGUH!!', 'HAS Creative', 'Praz Teguh', 'test', NULL, '1715640738.jpg', 'https://youtu.be/dndhSSujEFQ?si=AyCXs1Hx9POyw9ys', 'Publish', '2024-05-13 15:52:18', '2024-05-13 16:01:38'),
(3, 'Ganjar Marah Gara Gara  Video Loe!! Gue Telp Cak Imin!?', 'Deddy Corbuzier', 'Deddy Corbuzier', 'test', NULL, '1715641030.jpg', 'https://youtu.be/dndhSSujEFQ?si=AyCXs1Hx9POyw9ys', 'Publish', '2024-05-13 15:57:10', '2024-05-13 15:57:10'),
(4, 'BORIS BOKIR MALAH DIPUTUSIN CEWEK HABIS BAGI RAPOR', 'HAS Creative', 'Praz Teguh', 'test', NULL, '1715641419.jpg', 'https://youtu.be/faJb9aRWGR0?si=dGkgOnSGjD2IDHeX', 'Publish', '2024-05-13 16:03:39', '2024-05-13 16:03:39'),
(5, 'YAH BANGKRUT & JADI TULANG PUNGGUNG, PESULAP MERAH GAK SEMPET WUJUDIN CITA-CITA JADI SPIDERMAN', 'HAS Creative', 'Praz Teguh', 'test', NULL, '1715642019.jpg', 'https://youtu.be/UioVRDFab3c?si=re2IAlSyowbDitf1', 'Publish', '2024-05-13 16:13:39', '2024-05-13 16:13:39'),
(6, 'DODIT BIKIN NOVEL TENTANG MAKAM PONAKAN-NYA YANG DI BONGKAR DAN DIPAKE RITUAL PENJUAL BUNGA!', 'HAS Creative', 'Praz Teguh', 'test', NULL, '1715642135.jpg', 'https://youtu.be/xnq5FjrE-QE?si=y4x_7jFUKbQhb5yi', 'Publish', '2024-05-13 16:15:35', '2024-05-13 16:15:35'),
(7, 'SUDAH MENIKAH, MEGI IRAWAN PANIK DITANYA CEWE BERAMBUT PIRANG YANG DULU DIBAWA KE PWK', 'HAS Creative', 'Praz Teguh', 'test', NULL, '1715642607.jpg', 'https://youtu.be/Q9u31hWsKOo?si=7cUvclW2Erom-NEZ', 'Publish', '2024-05-13 16:23:27', '2024-05-13 16:23:27'),
(13, 'MISI HABIB JAFAR INGIN FOTO TOLERANSI BERAGAMA TIDAK LAGI VIRAL', 'HAS Creative', 'Praz Teguh', 'test', NULL, '1715642762.jpg', 'https://youtu.be/SQBW_0hRNNg?si=PB0fcUZzLdISN2ik', 'Publish', '2024-05-13 16:26:02', '2024-05-13 16:26:02'),
(14, 'HAPE ILANG PAS LAGI NGONTEN, DAVI SIUMBING DIBELIIN HAPE BARU SAMA NOPEK, TAPI DISURUH GANTI!', 'HAS Creative', 'Praz Teguh', 'test', NULL, '1715643011.jpg', 'https://youtu.be/J_WuWM454cE?si=h-b4RV7bIHiW9tKr', 'Publish', '2024-05-13 16:30:11', '2024-05-13 16:30:11'),
(15, 'KUKUH ADI INTROVERT, LIAT UFO DAN BISA NGERAGASUKMA, GARA-GARA SERING MAIN SAMA MAINAN!', 'HAS Creative', 'Praz Teguh', 'test', NULL, '1715643220.jpg', 'https://youtu.be/TrSeG1FmT9k?si=7vSO7byvtJDjc_Xr', 'Publish', '2024-05-13 16:33:40', '2024-05-13 16:33:40');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rekomendasis`
--

CREATE TABLE `rekomendasis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `judul` varchar(255) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `tgl` varchar(255) NOT NULL,
  `jam` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `rekomendasis`
--

INSERT INTO `rekomendasis` (`id`, `gambar`, `judul`, `deskripsi`, `tgl`, `jam`, `status`, `created_at`, `updated_at`) VALUES
(2, '1715680708.jpg', 'Demon Slayer', 'Pemburu Iblis', '2024-05-14', '16:58', 'Publish', '2024-05-14 02:58:28', '2024-05-14 02:58:28'),
(3, '1715681225.jpg', 'Ratatouille', 'Memasak dengan tikus', '2024-05-14', '17:00', 'Publish', '2024-05-14 03:07:05', '2024-05-14 03:07:05'),
(4, '1717165737.jpg', 'KKN', 'Kisah Desa Penari', '2024-05-31', '21:28', 'Publish', '2024-05-31 07:28:57', '2024-05-31 07:28:57'),
(5, '1717165815.webp', 'Mr. Bean', 'Kelakuan Kocak', '2024-05-31', '21:30', 'Publish', '2024-05-31 07:30:15', '2024-05-31 07:30:15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `relasi_kategori`
--

CREATE TABLE `relasi_kategori` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `seasons`
--

CREATE TABLE `seasons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `film_id` bigint(20) UNSIGNED NOT NULL,
  `season` varchar(255) DEFAULT NULL,
  `is_publish` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `seasons`
--

INSERT INTO `seasons` (`id`, `film_id`, `season`, `is_publish`, `created_at`, `updated_at`) VALUES
(1, 12, '1', 1, '2024-05-14 01:56:08', '2024-05-14 01:56:08');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `nohp` char(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `status` varchar(255) DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `nohp`, `email_verified_at`, `password`, `status`, `gambar`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'flx', 'flx@gmail.com', '085749453969', NULL, '$2y$12$dMKrKKVjR7EosWeP2FHCx.TjuC6E.6C15qTTKjspIZghNlykMohTC', 'Pengguna Lama', '1715659313.jpg', NULL, '2024-05-13 03:07:13', '2024-05-13 21:08:36');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `acc_admins`
--
ALTER TABLE `acc_admins`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `episodes`
--
ALTER TABLE `episodes`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `films`
--
ALTER TABLE `films`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kategoris`
--
ALTER TABLE `kategoris`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `laporans`
--
ALTER TABLE `laporans`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

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
-- Indeks untuk tabel `podcast`
--
ALTER TABLE `podcast`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `rekomendasis`
--
ALTER TABLE `rekomendasis`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `relasi_kategori`
--
ALTER TABLE `relasi_kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `seasons`
--
ALTER TABLE `seasons`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `acc_admins`
--
ALTER TABLE `acc_admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `banner`
--
ALTER TABLE `banner`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `episodes`
--
ALTER TABLE `episodes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `films`
--
ALTER TABLE `films`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `kategoris`
--
ALTER TABLE `kategoris`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `laporans`
--
ALTER TABLE `laporans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `podcast`
--
ALTER TABLE `podcast`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `rekomendasis`
--
ALTER TABLE `rekomendasis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `relasi_kategori`
--
ALTER TABLE `relasi_kategori`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `seasons`
--
ALTER TABLE `seasons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
