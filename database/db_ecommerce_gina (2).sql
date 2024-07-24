-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 02, 2024 at 06:17 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_ecommerce_gina`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `amount` int(11) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2024_02_26_065116_create_products_table', 1),
(7, '2024_02_26_065133_create_carts_table', 1),
(8, '2024_02_26_065156_create_orders_table', 1),
(9, '2024_02_26_065206_create_transactions_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `is_paid` tinyint(1) NOT NULL DEFAULT 0,
  `payment_receipt` varchar(255) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `is_paid`, `payment_receipt`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, '1709357999_1.png', 2, '2024-03-01 22:39:12', '2024-03-01 22:41:31'),
(2, 1, '1709370892_2.jpg', 2, '2024-03-02 02:13:45', '2024-03-02 02:17:45'),
(3, 1, '1709371023_3.jpg', 2, '2024-03-02 02:16:34', '2024-03-02 02:17:47'),
(4, 1, '1709392031_4.png', 2, '2024-03-02 07:56:11', '2024-03-02 09:58:53');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `stock` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `description`, `image`, `stock`, `created_at`, `updated_at`) VALUES
(2, 'Funicula funicula Karya Toshikazu Kawaguchi', 62000, 'Penulis: Toshikazu Kawaguchi\r\nAlih bahasa: Dania Sakti\r\nPenerbit: Gramedia Pustaka Utama\r\nCetakan kedua: Mei 2021\r\n\r\nProlog\r\nDi sebuah gang kecil di Tokyo, ada kafe tua yang bisa membawa pengunjungnya menjelajahi waktu. Keajaiban kafe itu menarik seorang wanita yang ingin memutar waktu untuk berbaikan dengan kekasihnya, seorang perawat yang ingin membaca surat yang tak sempat diberikan suaminya yang sakit, seorang kakak yang ingin menemui adiknya untuk terakhir kali, dan seorang ibu yang ingin bertemu dengan anak yang mungkin takkan pernah dikenalnya.\r\n\r\nNamun ada banyak peraturan yang harus diingat. Satu, mereka harus tetap duduk di kursi yang telah ditentukan. Dua, apa pun yang mereka lakukan di masa yang didatangi takkan mengubah kenyataan di masa kini. Tiga, mereka harus menghabiskan kopi khusus yang disajikan sebelum kopi itu dingin.\r\n\r\nRentetan peraturan lainnya tak menghentikan orang-orang itu untuk menjelajahi waktu. Akan tetapi, jika kepergian mereka tak mengubah satu hal pun di masa kini, layakkah semua itu dijalani?', '1709398434_Funicula funicula Karya Toshikazu Kawaguchi.jpg', 69, '2024-03-01 22:44:45', '2024-03-02 09:53:55'),
(3, 'Alster Lake Karya Auryn Vientanla', 89000, 'Penulis: Auryn Vientanla\r\nUkuran: 13 x 19 cm\r\nTebal: 264 hlm\r\nPenerbit: Bukuné\r\nISBN: 978-602-220-425-1\r\n\r\nProlog\r\nCerita ini berawal dari kisah seorang perempuan bernama Alea yang meninggalkan bukunya di perpustakaan, yang kemudian seseorang menemukan buku itu. Alea menceritakan betapa sukanya ia pada karakter fiksi di buku Alster Lake karya Dean Bjorn. Namun ternyata seseorang yang mengembalikan buku itu adalah penulisnya sendiri.\r\n\r\nMemiliki ketertarikan yang sama tentang Jerman, Dean Bjorn jatuh cinta untuk pertama kalinya pada pembacanya itu. Ia menyatakan cintanya ketika mereka sedang berlibur bersama di Hamburg, di tepi Alster Lake, menggunakan surat cinta. Tentu saja Alea tidak menolak, karena dari awal ia sudah jatuh cinta pada karakter fiksi yang dibuat oleh Dean, yang ternyata karakter itu adalah dirinya sendiri.\r\n\r\nSeiring berjalannya waktu mereka menjalin hubungan, ada satu masalah yang membuat mereka tak lama kemudian mengakhiri hubungan itu. Dean yang hilang kabar karena sibuk mementingkan studinya ke Jerman, sedangkan Alea yang tidak memberinya waktu untuk menjelaskan apa yang terjadi sebenarnya.\r\n\r\nMereka kembali menjadi dua orang asing. Tiba-tiba saat itu Alea menemukan judul buku yang tidak asing baginya, Alster Lake 2. Dimana buku itu menceritakan tentang seorang perempuan yang berarti bagi Dean. ketika membaca halaman terakhir buku itu, ia merasa buku itu tertuju pada dirnya. Dengan keberaniannya, ia berangkat ke Jerman dan mencari sosok laki-laki itu untuk menyelesaikan semuanya.', '1709363095_Alster Lake Karya Auryn Vientanla.jpg', 55, '2024-03-01 22:45:55', '2024-03-02 02:16:34'),
(5, 'Harry Potter and The Cursed Child Karya J.K Rowling', 112000, 'Penulis: J.K Rowling\r\nJumlah Halaman: 384\r\nBahasa: Indonesia\r\nPenerbit: Gramedia Pustaka Utama\r\nDimensi: 20 x 13.5 cm\r\nISBN: 9786020386201\r\n\r\nProlog\r\nMenjadi Harry Potter memang sulit dan sekarang pun tidak lebih mudah ketika ia menjadi pegawai Kementerian Sihir yang kelelahan, suami, dan ayah tiga anak usia sekolah.\r\n\r\nSementara Harry berjuang menghadapi masa lalu yang mengikutinya, putra bungsunya, Albus, harus berjuang menghadapi beban warisan keluarga yang tak pernah ia inginkan. Ketika masa lalu dan masa sekarang melebur, ayah dan anak pun mengetahui fakta yang tidak menyenangkan: terkadang kegelapan datang dari tempat-tempat yang tak terduga.\r\n\r\nBerdasarkan cerita asli baru karya J.K. Rowling, John Tiffany, dan Jack Thorne, naskah untuk Harry Potter dan si Anak Terkutuk aslinya dirilis sebagai “edisi latihan khusus” bersama pementasan perdana di West End London pada musim panas 2016.\r\n\r\nDrama ini mendapat ulasan positif dari para penonton dan kritikus teater, sementara naskahnya segera menjadi best seller global. Naskah definitif dan final ini berisi dialog drama, juga materi tambahan.\r\n\r\nSiapa yang tidak tahu tentang serial kenamaan Harry Potter? Kali ini, Harry Potter and The Cursed Child (Harry Potter dan Si Anak Terkutuk) hadir dalam bentuk skenario drama. Buku ini akan mengajak Kamu bertemu tokoh-tokoh terdahulu pada serial petualangan Harry Potter.', '1709363349_Harry Potter and The Cursed Child Karya J.K Rowling.jpg', 33, '2024-03-01 22:50:16', '2024-03-02 02:13:45'),
(6, 'Laut Bercerita Karya Leila S. Chudori', 92000, 'Penulis : Leila S. Chudori\r\nJumlah halaman : 400 halaman\r\nTanggal terbit : 21 Desember 2017\r\nPenerbit : Kepustakaan Populer Gramedia\r\nISBN : 9786024246945\r\nDimensi : 20 x 13.5 cm\r\n\r\nProlog\r\nBuku ini terdiri atas dua bagian. Bagian pertama mengambil sudut pandang seorang mahasiswa aktivis bernama Laut, menceritakan bagaimana Laut dan kawan-kawannya menyusun rencana, berpindah-pindah dalam pelarian, hingga tertangkap oleh pasukan rahasia. Sedangkan bagian kedua dikisahkan oleh Asmara, adik Laut. Bagian kedua mewakili perasaan keluarga korban penghilangan paksa, bagaimana pencarian mereka terhadap kerabat mereka yang tak pernah kembali.\r\nBuku ini ditulis sebagai bentuk tribute bagi para aktivis yang diculik, yang kembali, dan yang tak kembali dan keluarga yang terus menerus sampai sekarang mencari-cari jawaban.\r\n\r\nNovel ini merupakan perwujudan dalam bentuk fiksi bahwa kita sebagai bangsa Indonesia tidak boleh melupakan sejarah yang telah membentuk sekaligus menjadi tumpuan bangsa Ini. Novel ini juga mengajak pembaca menguak misteri-misteri bangsa ini yang mana tidak diajarkan di sekolah. Walaupun novel ini adalah fiksi, laut bercerita menunjukkan kepada pembaca bahwa negeri ini pernah memasuki masa pemerintahan yang kelam.', '1709363542_Laut Bercerita Karya Leila S. Chudori.jpg', 43, '2024-03-01 22:51:31', '2024-03-02 07:56:11'),
(9, 'The Prodigy Karya Midnightstalks', 89000, 'Penulis : Midnightstalks\r\nPenerbit : Fantasious\r\nUkuran : 14 x 120 cm\r\nHalaman : 300+ hlm.\r\nISBN : 978-623-310-035-9\r\n\r\nProlog\r\nNeostate, negara ini punya stratifikasinya sendiri. Tiap individu dinilai berdasarkan dari mana klan mereka berdiri. Neostate juga memiliki pendidikan eksklusif lewat satu institusi, yang diperuntukkan mencetak banyak sekali Prodigy. Mereka mengenalnya dengan, Neo Prodigy Academy (NPA). Para klan keluarga ini penuh ambisi. Berlomba membentuk generasi penerus mereka untuk menjadi Prodigy, yaitu calon manusia-manusia unggulan dari masing-masing klan keluarga yang namanya dikenal di seluruh penjuru negeri.\r\n\r\nHuang Rennath, awalnya tidak mau tahu dengan seluruh atribut sosial demikian. Namun, dia jadi berniat masuk dan terlibat ketika tahu bahwa klan di depan namanya telah dihilangkan. Eksistensi ibunya dengan seluruh rekam jejaknya telah dilenyapkan. Fakta mengenai jari dirinya telah disembunyikan. Di NPA, dia menemukan seluruh jawaban.\r\n\r\nRennath bersama teman-temannya, memiliki misi untuk membongkar semua kepalsuan.\r\n\r\nNovel The Prodigy mengisahkan tentang seorang anak laki-laki yang berusaha untuk mencari tahu kebenaran mengenai identitas dirinya dan masa lalu ibunya.\r\nDunia Prodigy adalah sebuah negara yang bernama Neostate yang terdiri dari tujuh distrik. Masing-masing distrik itu memiliki ciri khasnya sendiri dan diduduki oleh masing-masing klan yang diberi nama berdasarkan marga yang ada di negara Korea. Selain itu, di negara Neostate juga ada sebuah sistem pendidikan yang diberi nama Neo Prodigy Academy (NPA). Sistem pendidikan ini memiliki sejumlah empat bidang yang berfokus pada teknologi untuk membangun Neostate.', '1709364252_The Prodigy Karya Midnightstalks.jpg', 55, '2024-03-02 00:23:30', '2024-03-02 00:24:12'),
(10, 'Tanah Para Bandit Karya Tere Liye', 99000, 'Penulis : Tere Liye\r\nJumlah Halaman : 433\r\nPenerbit : Penerbit Sabak Grip\r\nISBN : 9786238829675\r\nDimensi : 14 x 20 cm\r\n\r\nProlog\r\nUsia lima belas tahun, aku menemukan tempat rahasia. Lokasinya berada di tengah hutan lebat, di lereng-lereng terjal Bukit Barisan. Dengan pohon-pohon tinggi. Semak belukar yang susah ditembus. Tumbuhan pakis, lumut, juga belalai rotan. Pertama kali aku menemukannya, kakiku, tanganku, juga bagian tubuh lain tidak terhitung meninggalkan baret dari duri, onak, atau ujung daun yang tajam, pun bisa membuat luka.\r\n\r\nDi sini, para penjahat dibesarkan sejak buaian. Dilatih lewat kebohongan. Dididik dengan kemunafikan. Diajarkan melalui ketidakpedulian.\r\nDi sini, semua bisa diatur sepanjang ada uangnya. Yang bodoh bisa menjadi pintar seketika. Yang tidak layak bisa segera memenuhi syarat. Yang bersalah bisa jadi benar. Yang bengkok bisa diluruskan. Tidak suka lurus? Mari dibengkokkan lagi.\r\nDi sini, di Tanah Para Bandit, tidak ada lagi beda antara penjahat bejat dengan tuan nyonya terhormat. Mencuri, merampok hak orang lain, lumrah saja. Ayo, jangan terlalu serius, Kawan. Kita berpesta malam ini.', '1709364434_Tanah Para Bandit Karya Tere Liye.jpg', 77, '2024-03-02 00:27:14', '2024-03-02 00:27:14'),
(11, 'Alaia', 89500, 'Penulis : Raden Chedid\r\nPenerbit : Fantasious\r\nTebal: 372 halaman\r\nISBN: 9786233100021\r\nDimensi: 20.5 cm x 14 cm\r\n\r\nProlog\r\nNovel Alaia merupakan novel ke 6 yang ditulis oleh Raden Chedid. Novel Alaia pertama kali diterbitkan pada tahun 2021. Hingga saat ini, novel Alaia telah diterbitkan sebanyak 5 kali. Pada masa pre-order novel Alaia saja, total 1000 buku berhasil terjual habis dalam waktu 10 menit saja.\r\n\r\nNovel Alaia pertama kali dipublikasi di platform Wattpad oleh Raden Chedid sendiri, dalam akunnya yang bernama @radexn. Novel Alaia sangat populer di masyarakat luas. Per bulan Mei 2022, novel Alaia telah dibaca 19,4 juta kali di Wattpad.\r\n\r\nNovel Alaia mengisahkan tentang seorang perempuan bernama Alaia. Alaia merupakan putri yang mulia dari lautan, yang merupakan keturunan dari Raja Siren dan Ratu Mermaid. Menjalani hubungan terlarang. Kutukan akan dipecahkan, menantang permainan alam yang bersembunyi di jantung laut.', '1709364626_Alaia.jpg', 55, '2024-03-02 00:30:26', '2024-03-02 00:30:26'),
(12, 'Turning Page Karya Auryn Vientania', 110000, 'Penulis: Auryn Vientania\r\nUkuran: 13 x 19 cm\r\nTebal: 220 halaman, BW (Hard cover)\r\nPenerbit: Bukuné\r\nISBN: 978-602-220-437-4\r\n\r\nProlog\r\nTurning Page adalah buku yang berisi gambar-gambar manis dan tulisan kecil Dean Bjorn tentang kekasihnya,\r\nAlea Khiar.\r\nSebenarnya, Dean tak pernah ingin menggambar manusia di buku sketsanya.\r\nMenurutnya, menggambar adalah untuk mengabadikan sesuatu. Dan manusia tidak pernah abadi.\r\nUntuk apa digambar, jika mereka bisa berubah sewaktu-waktu?\r\nTetapi, Alea adalah pengecualian. Memang, gadis itu sama seperti manusia pada umumnya, yang bisa berubah kapan saja.\r\n\r\nMungkin, tujuan Dean bukan untuk mengabadikan. Dia hanya ingin berharap, agar Alea tidak berubah, agar Alea selalu menjadi perempuan yang Dean kenal.', '1709364792_Turning Page Karya Auryn Vientania.jpg', 65, '2024-03-02 00:33:12', '2024-03-02 00:33:12'),
(13, 'Hello Cello Karya Nadia Ristivani', 89500, 'Penulis: Nadia Ristivani\r\nUkuran: 13 x 19 cm\r\nTebal: 428 hlm BW\r\nPenerbit: Bukuné\r\nISBN: 978-602-220-438-1\r\n\r\nProlog\r\nHmm, sepertinya itu tak ada lagi dalam kamus Helga. Kegagalannya dalam urusan cinta dan selalu disakiti oleh cowok, membuatnya sudah merasa cukup! Untuk apa mengulangi semuanya lagi dari awal?\r\n\r\nSebagai seorang penulis, Helga selalu mengabadikan hal yang berkesan di dalam hidupnya dalam bentuk buku. Dan di tengah proses penulisan buku keenamnya, ia malah dipertemukan dengan seorang ‘buaya’ tampan bernama Cello. Cello yang awalnya ingin mendekati Una – yaitu seorang gadis yang populer di kampusnya, justru terjebak dan malah semakin dekat dengan Helga yang aneh dan ajaib karena sering berpikir dan bersikap terlalu random.\r\n\r\nNamun, siapa sangka Cello malah semakin penasaran dengan gadis yang hatinya sudah membeku seperti itu? Baginya, Helga merupakan sosok yang ‘unik’ dan belum pernah ia jumpai sebelumnya. Mampukah Cello, akhirnya menaklukan hati Helga?', '1709364993_Hello Cello Karya Nadia Ristivani.jpg', 66, '2024-03-02 00:35:46', '2024-03-02 00:36:34'),
(14, 'Rendezvous', 93000, 'Penulis: Kil\r\nUkuran: 13 x 19 cm\r\nTebal: 308 hlm BW\r\nPenerbit: Bukuné\r\nISBN: 978-602-220-427-5\r\n\r\nProlog\r\nHazel Radella, mahasiswi semester lima jurusan International Business yang selama dua puluh satu tahun hidupnya selalu dikelilingi oleh hal-hal yang membosankan dan biasa saja. Ditambah, Hazel dibesarkan di lingkungan keluarga yang cukup ketat dan menuntutnya untuk selalu menjadi pribadi yang sempurna, terutama dalam bidang akademiknya. Hal ini juga membuat Hazel memiliki kepribadian yang introvert dan organized.\r\n\r\nSemua berubah saat Hazel tanpa sengaja berpapasan dengan Orion Genio, vokalis dan gitaris dari band rock yang sedang naik daun yaitu The 1995. Berbanding terbalik dengan kehidupan Hazel yang membosankan, Orion punya segudang cerita dan pengalaman yang menyenangkan. Orion juga tumbuh di lingkungan keluarga yang selalu mendukung apa pun yang dipilih olehnya selagi itu baik dan menguntungkan dirinya sendiri kelak.\r\n\r\nTadinya Hazel mengira Orion cukup aneh dan menyebalkan karena terkesan blak-blakan dan seenaknya. Namun, pada akhirnya mereka jadi akrab karena selera musik mereka yang sama dan ternyata Orion adalah teman yang cukup asyik untuk diajak mengobrol dan bercerita.\r\n\r\nSelama mengenal Orion, hari-hari Hazel jadi berbeda. Yang tadinya Hazel lebih senang berdiam diri di rumah membaca novel-novel kesukaannya ataupun belajar, sekarang Hazel jadi banyak mencoba hal-hal baru. Seperti makan di warung pinggiran, jalan-jalan ke tempat aneh namun ternyata menyenangkan, midnight driving bersama Orion untuk melepaskan penatnya, dan masih banyak lagi. Kehadiran Orion di hidup Hazel membuat hari-harinya lebih berwarna, dan tanpa sadar Hazel juga jadi lebih bisa menikmati kehidupannya. Tidak lagi terlalu tertekan dengan tuntutan keluarganya untuk menjadi pribadi yang sempurna setiap saat.', '1709365133_Rendezvous.jpg', 43, '2024-03-02 00:38:54', '2024-03-02 00:38:54');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `amount` int(11) NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `amount`, `product_id`, `order_id`, `created_at`, `updated_at`) VALUES
(2, 3, 2, 2, '2024-03-02 02:13:45', '2024-03-02 02:13:45'),
(3, 1, 5, 2, '2024-03-02 02:13:45', '2024-03-02 02:13:45'),
(4, 1, 3, 3, '2024-03-02 02:16:34', '2024-03-02 02:16:34'),
(5, 3, 2, 4, '2024-03-02 07:56:11', '2024-03-02 07:56:11'),
(6, 1, 6, 4, '2024-03-02 07:56:11', '2024-03-02 07:56:11');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `is_admin`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', NULL, '$2y$10$da5FgzzP4DNwSa6pWRadg.uwr3iLEzMhfZvEJV256IX/MqL.jTNWq', 1, NULL, NULL, NULL),
(2, 'Gina Enjelina', 'ginaenjelina53@gmail.com', NULL, '$2y$10$4RDg2DFxene/IoM3RlBPPe5bThUvTY0kYizYIpfBwEp3MLwl9k11.', 0, NULL, '2024-03-01 22:38:54', '2024-03-01 22:38:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_user_id_foreign` (`user_id`),
  ADD KEY `carts_product_id_foreign` (`product_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

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
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transactions_product_id_foreign` (`product_id`),
  ADD KEY `transactions_order_id_foreign` (`order_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transactions_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
