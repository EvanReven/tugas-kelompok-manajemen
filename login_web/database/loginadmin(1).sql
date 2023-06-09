-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Jun 2023 pada 16.19
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `loginadmin`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(12) NOT NULL,
  `username` varchar(20) NOT NULL,
  `no_hp` varchar(12) NOT NULL,
  `fotoPath` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `login`
--

INSERT INTO `login` (`id`, `nama`, `email`, `password`, `username`, `no_hp`, `fotoPath`) VALUES
(17, 'admin', 'admin2gmail.com', '123', 'admin', '85249761879', 'uploads/1.jpg'),
(18, 'evan', 'evan12321@gmai.com', '123', 'evan', '85249728666', 'uploads/yande.re 1022187 sample bocchi_the_rock! kerorira kita_ikuyo seifuku sketch.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `lowongan`
--

CREATE TABLE `lowongan` (
  `lowongan_id` int(11) NOT NULL,
  `perusahaan_id` int(11) DEFAULT NULL,
  `kategori_id` varchar(11) NOT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `persyaratan` text DEFAULT NULL,
  `lokasi` varchar(100) DEFAULT NULL,
  `jenis_pekerjaan` varchar(50) DEFAULT NULL,
  `tanggal_posting` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `lowongan`
--

INSERT INTO `lowongan` (`lowongan_id`, `perusahaan_id`, `kategori_id`, `judul`, `deskripsi`, `persyaratan`, `lokasi`, `jenis_pekerjaan`, `tanggal_posting`) VALUES
(21, 1, 'IT', 'Web Developer', 'Sebagai Web Developer di perusahaan kami, Anda akan bertanggung jawab dalam pengembangan, pemeliharaan, dan peningkatan situs web yang inovatif. Anda akan bekerja dengan tim yang kolaboratif untuk mengimplementasikan fitur-fitur baru, memperbaiki bug, dan mengoptimalkan kinerja situs. Keahlian dalam HTML, CSS, JavaScript, dan pengalaman dengan kerangka kerja seperti Laravel sangat dihargai.', 'Persyaratan Web Developer', 'Jakarta', 'Penuh Waktu', '2023-01-01'),
(22, 2, 'Pemasaran', 'Marketing Executive', 'Sebagai Marketing Executive di perusahaan kami, Anda akan bertanggung jawab dalam mengembangkan dan melaksanakan strategi pemasaran yang efektif. Anda akan melakukan riset pasar, merencanakan kampanye pemasaran, mengelola media sosial, dan menganalisis data untuk mengukur keberhasilan kampanye. Keahlian dalam komunikasi, kreativitas, dan pemahaman tentang tren pemasaran digital sangat dihargai.', 'Persyaratan Marketing Executive', 'Surabaya', 'Paruh Waktu', '2023-02-01'),
(23, 1, 'Keuangan', 'Accounting Staff', 'Sebagai Accounting Staff di perusahaan kami, Anda akan bertanggung jawab dalam mengelola dan memantau keuangan perusahaan. Tugas Anda termasuk pembukuan, pemrosesan transaksi keuangan, penyusunan laporan keuangan, dan pemenuhan kewajiban pajak. Keahlian dalam pemahaman akuntansi, penggunaan perangkat lunak akuntansi, dan ketelitian yang tinggi sangat dihargai.', 'Persyaratan Accounting Staff', 'Bandung', 'Penuh Waktu', '2023-03-01'),
(24, 3, 'IT', 'Web Developer', 'Sebagai Web Developer di perusahaan kami, Anda akan bertanggung jawab dalam pengembangan, pemeliharaan, dan peningkatan aplikasi web yang inovatif. Anda akan bekerja dengan tim pengembang untuk mengimplementasikan fitur-fitur baru, memperbaiki bug, dan meningkatkan pengalaman pengguna. Keahlian dalam HTML, CSS, JavaScript, dan pengalaman dengan kerangka kerja seperti React sangat dihargai.', 'Persyaratan Web Developer', 'Yogyakarta', 'Paruh Waktu', '2023-04-01'),
(25, 2, 'Lainnya', 'Human Resources Manager', 'Sebagai Human Resources Manager di perusahaan kami, Anda akan bertanggung jawab dalam pengelolaan semua aspek sumber daya manusia. Anda akan mengoordinasikan perekrutan, pelatihan, kompensasi, dan manajemen kinerja. Keahlian dalam komunikasi, pemecahan masalah, dan pemahaman tentang kebijakan sumber daya manusia sangat dihargai.', 'Persyaratan Human Resources Manager', 'Semarang', 'Penuh Waktu', '2023-05-01'),
(26, 1, 'Pemasaran', 'Marketing Coordinator', 'Sebagai Marketing Coordinator di perusahaan kami, Anda akan bertanggung jawab dalam mendukung pelaksanaan strategi pemasaran. Anda akan melakukan riset pasar, mengelola kampanye pemasaran, mengawasi materi pemasaran, dan membantu dalam analisis data. Keahlian dalam koordinasi, analitis, dan pemahaman tentang tren pemasaran sangat dihargai.', 'Persyaratan Marketing Coordinator', 'Medan', 'Penuh Waktu', '2023-06-01'),
(27, 3, 'IT', 'Software Engineer', 'Sebagai Software Engineer di perusahaan kami, Anda akan bertanggung jawab dalam pengembangan, pemeliharaan, dan peningkatan perangkat lunak yang inovatif. Anda akan bekerja dengan tim pengembang untuk merancang dan mengimplementasikan solusi teknis. Keahlian dalam pemrograman, pemecahan masalah, dan pengetahuan tentang bahasa pemrograman seperti Java, Python, atau C++ sangat dihargai.', 'Persyaratan Software Engineer', 'Makassar', 'Paruh Waktu', '2023-07-01'),
(28, 2, 'IT', 'Business Analyst', 'Sebagai Business Analyst di perusahaan kami, Anda akan bertanggung jawab dalam menganalisis kebutuhan bisnis, merancang solusi teknis, dan memastikan kesesuaian antara sistem dan tujuan bisnis. Anda akan berinteraksi dengan berbagai pemangku kepentingan untuk mengumpulkan dan menganalisis persyaratan. Keahlian dalam analisis bisnis, komunikasi, dan pemahaman tentang domain bisnis sangat dihargai.', 'Persyaratan Business Analyst', 'Palembang', 'Penuh Waktu', '2023-08-01'),
(29, 1, 'IT', 'Graphic Designer', 'Sebagai Graphic Designer di perusahaan kami, Anda akan bertanggung jawab dalam merancang materi visual yang menarik dan efektif. Anda akan mengembangkan desain untuk keperluan pemasaran, branding, dan komunikasi visual. Keahlian dalam desain grafis, kreativitas, dan pemahaman tentang tren desain sangat dihargai.', 'Persyaratan Graphic Designer', 'Denpasar', 'Paruh Waktu', '2023-09-01'),
(30, 3, 'Pemasaran', 'Sales Manager', 'Sebagai Sales Manager di perusahaan kami, Anda akan bertanggung jawab dalam mengelola dan mengembangkan tim penjualan. Anda akan merencanakan strategi penjualan, memantau pencapaian target, dan membangun hubungan dengan pelanggan. Keahlian dalam kepemimpinan, negosiasi, dan pengalaman dalam industri penjualan sangat dihargai.', 'Persyaratan Sales Manager', 'Pontianak', 'Penuh Waktu', '2023-10-01'),
(31, 2, 'Lainnya', 'Project Manager', 'Sebagai Project Manager di perusahaan kami, Anda akan bertanggung jawab dalam mengelola dan mengawasi proyek-proyek teknologi informasi. Anda akan merencanakan, mengkoordinasikan, dan mengontrol aktivitas proyek untuk memastikan pencapaian tujuan dan pengiriman tepat waktu. Keahlian dalam manajemen proyek, komunikasi, dan kepemimpinan sangat dihargai.', 'Persyaratan Project Manager', 'Padang', 'Paruh Waktu', '2023-11-01'),
(32, 1, 'IT', 'Data Analyst', 'Sebagai Data Analyst di perusahaan kami, Anda akan bertanggung jawab dalam menganalisis data untuk memberikan wawasan bisnis yang berharga. Anda akan mengumpulkan, membersihkan, menganalisis, dan memvisualisasikan data untuk membantu pengambilan keputusan. Keahlian dalam analisis data, pemrograman, dan pemahaman tentang alat analisis data seperti SQL atau Python sangat dihargai.', 'Persyaratan Data Analyst', 'Malang', 'Penuh Waktu', '2023-12-01'),
(33, 3, 'Pemasaran', 'Digital Marketer', 'Sebagai Digital Marketer di perusahaan kami, Anda akan bertanggung jawab dalam merancang, melaksanakan, dan mengoptimalkan strategi pemasaran digital. Anda akan menggunakan media sosial, SEO, PPC, dan alat pemasaran digital lainnya untuk meningkatkan visibilitas merek dan menghasilkan lead. Keahlian dalam pemasaran digital, analitis, dan kreativitas sangat dihargai.', 'Persyaratan Digital Marketer', 'Samarinda', 'Penuh Waktu', '2024-01-01'),
(34, 2, 'Lainnya', 'Content Writer', 'Sebagai Content Writer di perusahaan kami, Anda akan bertanggung jawab dalam membuat konten yang menarik dan informatif untuk berbagai platform. Anda akan menulis artikel, blog, konten media sosial, dan materi pemasaran lainnya. Keahlian dalam penulisan kreatif, penelitian, dan pemahaman tentang SEO sangat dihargai.', 'Persyaratan Content Writer', 'Bogor', 'Paruh Waktu', '2024-02-01'),
(35, 1, 'Keuangan', 'Account Manager', 'Sebagai Account Manager di perusahaan kami, Anda akan bertanggung jawab dalam membangun dan memelihara hubungan yang kuat dengan klien. Anda akan mengelola akun klien, menawarkan solusi yang sesuai, dan memastikan kepuasan klien. Keahlian dalam komunikasi, negosiasi, dan pemahaman tentang industri yang relevan sangat dihargai.', 'Persyaratan Account Manager', 'Bandar Lampung', 'Penuh Waktu', '2024-03-01'),
(36, 3, 'IT', 'Web Designer', 'Sebagai Web Designer di perusahaan kami, Anda akan bertanggung jawab dalam merancang tampilan visual dan pengalaman pengguna yang menarik untuk situs web. Anda akan menggunakan alat-alat desain, mengimplementasikan desain ke dalam kode, dan mengoptimalkan desain untuk kompatibilitas lintas platform. Keahlian dalam desain web, HTML, CSS, dan pemahaman tentang UX/UI sangat dihargai.', 'Persyaratan Web Designer', 'Tangerang', 'Paruh Waktu', '2024-04-01'),
(37, 2, 'Keuangan', 'Finance Analyst', 'Sebagai Finance Analyst di perusahaan kami, Anda akan bertanggung jawab dalam menganalisis data keuangan, menyusun laporan keuangan, dan memberikan wawasan keuangan yang berharga. Anda akan memantau kinerja keuangan, menganalisis tren, dan memberikan rekomendasi untuk pengambilan keputusan. Keahlian dalam analisis keuangan, penggunaan alat analisis seperti Excel, dan pemahaman tentang prinsip akuntansi sangat dihargai.', 'Persyaratan Finance Analyst', 'Pekanbaru', 'Penuh Waktu', '2024-05-01'),
(38, 1, 'Pemasaran', 'Product Manager', 'Sebagai Product Manager di perusahaan kami, Anda akan bertanggung jawab dalam merencanakan, mengembangkan, dan mengelola produk perusahaan. Anda akan melakukan riset pasar, merancang strategi produk, mengawasi pengembangan produk, dan mengelola siklus hidup produk. Keahlian dalam manajemen produk, analisis pasar, dan pemahaman tentang kebutuhan pengguna sangat dihargai.', 'Persyaratan Product Manager', 'Balikpapan', 'Paruh Waktu', '2024-06-01'),
(39, 3, 'IT', 'Network Administrator', 'Sebagai Network Administrator di perusahaan kami, Anda akan bertanggung jawab dalam merancang, menginstal, mengonfigurasi, dan memelihara infrastruktur jaringan. Anda akan memastikan keamanan, ketersediaan, dan kinerja jaringan. Keahlian dalam jaringan komputer, protokol jaringan, dan pemecahan masalah jaringan sangat dihargai.', 'Persyaratan Network Administrator', 'Batam', 'Penuh Waktu', '2024-07-01'),
(40, 2, 'Pemasaran', 'Sales Executive', 'Sebagai Sales Executive di perusahaan kami, Anda akan bertanggung jawab dalam mencari pelanggan baru, membangun hubungan dengan pelanggan, dan mencapai target penjualan. Anda akan melakukan presentasi produk, negosiasi, dan mengelola siklus penjualan. Keahlian dalam komunikasi, negosiasi, dan pemahaman tentang produk sangat dihargai.', 'Persyaratan Sales Executive', 'Jayapura', 'Paruh Waktu', '2024-08-01');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `lowongan`
--
ALTER TABLE `lowongan`
  ADD PRIMARY KEY (`lowongan_id`),
  ADD KEY `perusahaan_id` (`perusahaan_id`),
  ADD KEY `kategori_id` (`kategori_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `lowongan`
--
ALTER TABLE `lowongan`
  MODIFY `lowongan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `lowongan`
--
ALTER TABLE `lowongan`
  ADD CONSTRAINT `lowongan_ibfk_1` FOREIGN KEY (`perusahaan_id`) REFERENCES `perusahaan` (`perusahaan_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
