-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 30, 2020 at 03:14 AM
-- Server version: 5.7.32
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `passport_auth`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(4, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(5, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(6, '2016_06_01_000004_create_oauth_clients_table', 1),
(7, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(8, '2019_08_19_000000_create_failed_jobs_table', 1),
(10, '2020_07_07_195042_create_persons_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('0195a76c1109a27a9380d789c8b491012a631b3429c41e5c5451a19195a0883bde321886ecb7df85', 10, 1, 'app', '[]', 0, '2020-08-28 14:26:50', '2020-08-28 14:26:50', '2021-08-28 20:26:50'),
('02bd104056b27b6095660e328491ab367138d24dec914fa5e4a9e62a81431aa4ffba52412f07729e', 11, 1, 'app', '[]', 0, '2020-09-13 02:35:36', '2020-09-13 02:35:36', '2021-09-13 08:35:36'),
('02dc9e40ef322813cc93819392ee8887041da189166faa564638d4273a97d472620e3bb673b2b94e', 14, 1, 'app', '[]', 0, '2020-10-14 12:15:12', '2020-10-14 12:15:12', '2021-10-14 18:15:12'),
('03098258216e7bc4e98a69657f7cee0b4cd91d62d2ac134339a9727a617e4b3fcee19b2744e88064', 1, 1, 'app', '[]', 0, '2020-07-28 21:38:30', '2020-07-28 21:38:30', '2021-07-29 00:38:30'),
('07162de1b26ca1d86e9d85b358da598f245bb40d38ee7ad7c00f122fe873cee747a71c661021e53b', 10, 1, 'app', '[]', 0, '2020-08-28 14:26:36', '2020-08-28 14:26:36', '2021-08-28 20:26:36'),
('0ec2eda7d2dfdaa5d830493be48b99ad70dbef7ace47e715cd38373138854fc8f722ee785d5d9241', 19, 1, 'app', '[]', 0, '2020-10-22 15:12:16', '2020-10-22 15:12:16', '2021-10-22 21:12:16'),
('0ecbdaf894817e6351239e1fe01cb3a330e2838157bc6b93a88aefda1282d3f8de675fd078c2f2e8', 3, 1, 'app', '[]', 0, '2020-07-31 20:35:44', '2020-07-31 20:35:44', '2021-07-31 23:35:44'),
('10af09dd57637264678d4fe4185b4d6cefd21abdf49cf67d23ba56dd2e0eb1bb396580ad6bf3fe0e', 5, 1, 'app', '[]', 0, '2020-08-19 22:16:11', '2020-08-19 22:16:11', '2021-08-20 04:16:11'),
('116d4c5053c86ccb9da0c49143c3691b31e20d268e2df67bc764d98ea4f139146e7241b3b61c3ef0', 3, 1, 'app', '[]', 0, '2020-07-31 20:36:37', '2020-07-31 20:36:37', '2021-07-31 23:36:37'),
('12dabac53c9ea23503c748ca9ec19fe68acf444ccb310d9477b759d6e512c3e1d5bd7e00377b7b65', 1, 1, 'app', '[]', 0, '2020-07-28 21:35:22', '2020-07-28 21:35:22', '2021-07-29 00:35:22'),
('16d634fe0b5b11dcb688d38f3b228a53bdb804ffd312ca2709687adcd1d1f33390d4a2e8fdf3ab31', 11, 1, 'app', '[]', 0, '2020-09-13 06:19:26', '2020-09-13 06:19:26', '2021-09-13 12:19:26'),
('17bfe036be3589ec9f288a7fbe85b0fb084518c66a1bb83722c1199d776bd3421f3edc284e14be32', 3, 1, 'app', '[]', 0, '2020-07-30 20:09:24', '2020-07-30 20:09:24', '2021-07-30 23:09:24'),
('199dbe9f12fbcbfac2c5fde08ac3d848f444b0c077ec971fdb0c895c964386fb0cc9daeb6b660d2f', 6, 1, 'app', '[]', 0, '2020-08-28 10:50:50', '2020-08-28 10:50:50', '2021-08-28 16:50:50'),
('1a303615bf8dec9d6e4757257a87dfd964d57617b1f33f4808ab9bc0b115006c9f354cce7502ed34', 19, 1, 'app', '[]', 0, '2020-10-22 15:12:35', '2020-10-22 15:12:35', '2021-10-22 21:12:35'),
('1f31d249c4e60d23e4ef4a3985b632af9c193c00870f2b34a4f774813475f4e026b675dd12e76e63', 3, 1, 'app', '[]', 0, '2020-07-30 20:17:27', '2020-07-30 20:17:27', '2021-07-30 23:17:27'),
('20994f271783b74caf0e8f18c5c214aec1ecdb678e20df49efea5fb6107db1460cbc30a869c6562f', 6, 1, 'app', '[]', 0, '2020-08-20 10:05:51', '2020-08-20 10:05:51', '2021-08-20 16:05:51'),
('2479d68ed4fb1d73e7ccf702a0dc2be828d77fbe047fba78da6fa20d3c24ec61fce89ce8ef03b622', 3, 1, 'app', '[]', 0, '2020-07-31 23:45:38', '2020-07-31 23:45:38', '2021-08-01 02:45:38'),
('260b57c7ec4a3016447e8971611179d9107734d6fe1b2cd3e1d966b46e7314f07c394d24996954c6', 6, 1, 'app', '[]', 0, '2020-08-28 10:49:00', '2020-08-28 10:49:00', '2021-08-28 16:49:00'),
('2b4e4bd910c52a4d960be8381911265d0f00785c2046d6ac4d89bace89040466c778ccf215f31bbb', 6, 1, 'app', '[]', 0, '2020-08-30 03:34:56', '2020-08-30 03:34:56', '2021-08-30 09:34:56'),
('2c78e3c2c74c0d9f517387f3c24e9951905a3631d282eba7e86ad1a0332fba1b1bc6cd59a1158112', 3, 1, 'app', '[]', 0, '2020-07-30 20:03:40', '2020-07-30 20:03:40', '2021-07-30 23:03:40'),
('2fd0ead538edf936c38ccf889e6e8a06c536e4fb652b12d7ec2c8c355ac70b0a52a8372f210631c5', 13, 1, 'app', '[]', 0, '2020-10-14 12:09:09', '2020-10-14 12:09:09', '2021-10-14 18:09:09'),
('3a51d8003677cd536d6906100847e34f6c72b8c89aca02c65f6be7ce628afc2458f75d3bfd223901', 8, 1, 'app', '[]', 0, '2020-08-22 23:18:24', '2020-08-22 23:18:24', '2021-08-23 05:18:24'),
('3b22adf689af394dc4b2801c0de6ed7ab1cddafc9ad16fa62d579b6b7ca146a8ed60288d15acb021', 17, 1, 'app', '[]', 0, '2020-10-24 07:48:09', '2020-10-24 07:48:09', '2021-10-24 13:48:09'),
('41a3eb4825a8bd506d57e0152155ee2b3d8411474a706a6df463d364a7cf20854835dd900be45055', 3, 1, 'app', '[]', 0, '2020-07-30 19:55:09', '2020-07-30 19:55:09', '2021-07-30 22:55:09'),
('41bd1baa651d0daa6f9c64652603c33263cff3b399d4a0a074489b6a8563f19803c27474879bf8b9', 3, 1, 'app', '[]', 0, '2020-07-30 20:16:06', '2020-07-30 20:16:06', '2021-07-30 23:16:06'),
('452b89450fa3c75d566a5f0c2948b8a4be730d3d52564d81873f38807a57b98d1d583a7ca942efce', 3, 1, 'app', '[]', 0, '2020-07-30 20:05:05', '2020-07-30 20:05:05', '2021-07-30 23:05:05'),
('46f6329ce96fc947dc6f85a37858e6f11721c3cbea6716b497c05114449ab6398fd593ea6e6b4e68', 6, 1, 'app', '[]', 0, '2020-08-20 10:09:06', '2020-08-20 10:09:06', '2021-08-20 16:09:06'),
('4832135e4ebcb0445db7dd8a3d612ad187accdf4d2d1d6c19cb5bbecb15aa0b5364fa29990005de3', 3, 1, 'app', '[]', 0, '2020-07-30 19:50:24', '2020-07-30 19:50:24', '2021-07-30 22:50:24'),
('49bf14acf5df23f8eb31e61289f59df17485918deaaa300824346a7b940811b9c9b12444dc0b79fb', 3, 1, 'app', '[]', 0, '2020-07-31 23:52:11', '2020-07-31 23:52:11', '2021-08-01 02:52:11'),
('4b4cc793b54aba81e3799e50d4fae5770f67daf5dfe38eef497a6379f0867634047039f66caaa3d9', 8, 1, 'app', '[]', 0, '2020-08-22 23:45:47', '2020-08-22 23:45:47', '2021-08-23 05:45:47'),
('5145da93605f4967947fcf1bd238d327fd5c4c2d62d38e5d91e97840934e0b1700a91a1f5315fc50', 6, 1, 'app', '[]', 0, '2020-08-20 08:58:35', '2020-08-20 08:58:35', '2021-08-20 14:58:35'),
('53cd1417bcdc4bc95b228c7e08d340da9c47b74d2a160d16a2ea736f61a5a9df089ad8782f8ca3a5', 18, 1, 'app', '[]', 0, '2020-10-21 18:09:35', '2020-10-21 18:09:35', '2021-10-22 00:09:35'),
('58f9b1b85f83c3d508c6b578cbbfacc8373651435544ba89f240803e06407d3d9d3f1b34e73c1b46', 17, 1, 'app', '[]', 0, '2020-10-14 12:47:04', '2020-10-14 12:47:04', '2021-10-14 18:47:04'),
('5c7431c5ae855f6fc8dadd909805151af7e95f658d55bdb3acb0ed1280cf76169ad0b9be30102c55', 1, 1, 'app', '[]', 0, '2020-07-28 21:06:39', '2020-07-28 21:06:39', '2021-07-29 00:06:39'),
('5d0ad0a347e58a9e6ed5ace0699be6d196f63da20584bdc7cb42514f2bd482edcc2b4f0f99b08d97', 6, 1, 'app', '[]', 0, '2020-08-25 05:15:40', '2020-08-25 05:15:40', '2021-08-25 11:15:40'),
('5de33a6e32efa25ae00ba0d0855ed5d206ef7533534e78646970941716a8601112c66d038cf6f548', 2, 1, 'app', '[]', 0, '2020-07-30 18:13:11', '2020-07-30 18:13:11', '2021-07-30 21:13:11'),
('5fc9f1bc03b6a1075829cf5a4906cab6a45fe7fb4dafd3f9782501a7e697d10e8548cda6a4c5e8cd', 1, 1, 'app', '[]', 0, '2020-07-29 20:14:33', '2020-07-29 20:14:33', '2021-07-29 23:14:33'),
('60c0567332b804dfb55b13189f2260be312e3f31c8c9576331748dc407fb140b2597e711cbf3e5b8', 3, 1, 'app', '[]', 0, '2020-07-30 20:11:14', '2020-07-30 20:11:14', '2021-07-30 23:11:14'),
('624bfa6e82084bddb76f3d008b79bbd115f8922b8ad847d7f2d31c5273b2f86e9b2d85d9775f3711', 9, 1, 'app', '[]', 0, '2020-08-28 11:48:24', '2020-08-28 11:48:24', '2021-08-28 17:48:24'),
('6e47ba66c53636a0890cdf4ccbf859589f87c0577524fa172ae3e250f54cb0b25c4c568261ac7e5c', 3, 1, 'app', '[]', 0, '2020-07-31 21:47:35', '2020-07-31 21:47:35', '2021-08-01 00:47:35'),
('6ecd37c6a1591b46d4808515e7d4cc482bf11ea29554e016353c0032c65396354a9dc37e596a0f2b', 1, 1, 'app', '[]', 0, '2020-07-29 20:13:29', '2020-07-29 20:13:29', '2021-07-29 23:13:29'),
('6f4919f8911052bdb54ba662cb5da66046518daafce16155b244995e5f51d3c9b14a1abaca2d1c90', 3, 1, 'app', '[]', 0, '2020-07-30 19:48:47', '2020-07-30 19:48:47', '2021-07-30 22:48:47'),
('767a51595df16683d239796986aea23f38d83a6994b07666cc0baa0d80fc04867d06267c0b3c6c3d', 9, 1, 'app', '[]', 0, '2020-08-28 11:49:50', '2020-08-28 11:49:50', '2021-08-28 17:49:50'),
('785bd2b53ee3432845e1965668f6bb4753513cf9b1ea00e51f16c57259d4b740feefeb3e337b6655', 6, 1, 'app', '[]', 0, '2020-08-20 00:02:15', '2020-08-20 00:02:15', '2021-08-20 06:02:15'),
('7a8e16cf005c4934a76a54b14e872778fd45b741450f11b363f4a2791bbce2dcb9bc345652a4dd1b', 3, 1, 'app', '[]', 0, '2020-07-30 19:41:39', '2020-07-30 19:41:39', '2021-07-30 22:41:39'),
('7adb30561d777c1e8bf2b8973494e7d1eee0760a5d4c87ed7caccd54b0c9325f2f5d9aa64b822f68', 1, 1, 'app', '[]', 0, '2020-07-29 19:19:34', '2020-07-29 19:19:34', '2021-07-29 22:19:34'),
('7c1a79d2b6987265c3ae6853b794c6583dfc99f79e846ac99f0da846af7288e0ff8378393fe548e6', 17, 1, 'app', '[]', 0, '2020-10-14 12:44:29', '2020-10-14 12:44:29', '2021-10-14 18:44:29'),
('7f879ba81d3d99f9486526f6ac71bf626ab73948b7989ec7cf730ed6ec5e33c4dcbc2be070374b16', 6, 1, 'app', '[]', 0, '2020-08-20 21:33:51', '2020-08-20 21:33:51', '2021-08-21 03:33:51'),
('818aa44a409e5c74b532b004a6ac9c743ee190ae0f2b4012d63aa28f62f7ef5698f6d2db54b7ed31', 17, 1, 'app', '[]', 0, '2020-10-24 03:16:04', '2020-10-24 03:16:04', '2021-10-24 09:16:04'),
('81dfdea035f525e39c56715f9d84310f25098fe91dac2b6c093ac3e1f715068984787b83a4fb9ee9', 17, 1, 'app', '[]', 0, '2020-10-14 12:45:31', '2020-10-14 12:45:31', '2021-10-14 18:45:31'),
('8304087d9206b165de538c35dcdc9d77b44e225fc6176f2fdc653baef8dbd28f9919d195c6fa4516', 6, 1, 'app', '[]', 0, '2020-08-20 21:35:53', '2020-08-20 21:35:53', '2021-08-21 03:35:53'),
('8614ae7a300cae26501ad006dcf40f3f32eec69694b94657780533ede34f0097e8877276f2705a16', 3, 1, 'app', '[]', 0, '2020-07-30 19:58:51', '2020-07-30 19:58:51', '2021-07-30 22:58:51'),
('8e4815b380f640606fe3132b86a224669188e648696a74b94cae05b02e532112d88b00d1625a5a44', 4, 1, 'app', '[]', 0, '2020-08-19 22:14:02', '2020-08-19 22:14:02', '2021-08-20 04:14:02'),
('94a7048f13b81ef4e56af69ddbc40a5e5052c596cb5e05f704e2b831629318279dcbe0b4d46f9598', 3, 1, 'app', '[]', 0, '2020-07-30 20:08:13', '2020-07-30 20:08:13', '2021-07-30 23:08:13'),
('9e15c5ff4668f5b8f3893eb3956fd62b87730bbbcde187b20b13c6e5be3ff41275d6c98e0fa548c6', 11, 1, 'app', '[]', 0, '2020-09-13 02:35:57', '2020-09-13 02:35:57', '2021-09-13 08:35:57'),
('a1f343bfeb5e28b7ab39cf44276f826e0767ae8e1c819157dfb48b05462f0898751777dca641590c', 1, 1, 'app', '[]', 0, '2020-07-28 15:40:34', '2020-07-28 15:40:34', '2021-07-28 18:40:34'),
('a34009a85a9cdcf53d9ada13e4f61d22153d1a01bea26216af80b764abd619d63caad6878563a9fb', 17, 1, 'app', '[]', 0, '2020-10-14 12:42:50', '2020-10-14 12:42:50', '2021-10-14 18:42:50'),
('a468560b35be7bd300be6d73152c04170b7bb89623d671ff344d3c0733152c09457e9204597c755b', 3, 1, 'app', '[]', 0, '2020-07-30 20:20:48', '2020-07-30 20:20:48', '2021-07-30 23:20:48'),
('a487a35141154b2b8f5ee6fdc1edda33ffed1c7a43f77ea4f89a5151b556493d407af0aa3bc98ffb', 3, 1, 'app', '[]', 0, '2020-07-30 19:52:27', '2020-07-30 19:52:27', '2021-07-30 22:52:27'),
('a538faf946828706baf1dd94d94edd631a3d22e6edcd84f78d19fd39f53ae80093b2905b98598822', 1, 1, 'app', '[]', 0, '2020-07-28 21:25:32', '2020-07-28 21:25:32', '2021-07-29 00:25:32'),
('a6c54c5e16f7611e7446de50210a182af19bc41228f1c41acf72b55da2832c3a27255a27764e87f4', 3, 1, 'app', '[]', 0, '2020-07-30 20:14:03', '2020-07-30 20:14:03', '2021-07-30 23:14:03'),
('b0ac1ff748a83ce1b8ac4369a80bf7ab4b44b6c143d5aca0da746157577d448a7ef7072ae71a198e', 1, 1, 'app', '[]', 0, '2020-07-28 20:41:51', '2020-07-28 20:41:51', '2021-07-28 23:41:51'),
('b420907d903b9b56eca6e2d0a4b0a29283ba073e5e092a549de2153833ca419dbb5e3bc1744e3fab', 16, 1, 'app', '[]', 0, '2020-10-14 12:41:00', '2020-10-14 12:41:00', '2021-10-14 18:41:00'),
('b4b402342cb7efe50a173d0402858a3c4ac3fb7b6e396b6d6616deefdd443da7a384dedfd7855e5c', 3, 1, 'app', '[]', 0, '2020-07-30 19:18:24', '2020-07-30 19:18:24', '2021-07-30 22:18:24'),
('b5c33505b306c52e7cf06106668cec4cb964c020ce6bf63e38486132a3f7cdfdf0452d5d78489b59', 8, 1, 'app', '[]', 0, '2020-08-22 23:38:32', '2020-08-22 23:38:32', '2021-08-23 05:38:32'),
('ba21f150694d3a47729db72cbdbce56ea6b8fddc52c706f25c9a10fd55ac3d55229bd85b2625342a', 6, 1, 'app', '[]', 0, '2020-08-20 09:41:26', '2020-08-20 09:41:26', '2021-08-20 15:41:26'),
('bbd1ddfef7abcbebb06c9f3f698642bbc7478028ed760302dd9caa36671a53bab96d604dce8e604e', 1, 1, 'app', '[]', 0, '2020-07-30 18:00:21', '2020-07-30 18:00:21', '2021-07-30 21:00:21'),
('bbf6760d066c6113c31eecc61a9f13cb1175d75a99e2bc3cea12a25e71afebed984a54a6e18625e9', 6, 1, 'app', '[]', 0, '2020-08-20 22:00:17', '2020-08-20 22:00:17', '2021-08-21 04:00:17'),
('bc79f6ad9b80457b06db3fcf1aa995ffa39b5fbccff6004544e956abcd1d69b631e15ec7c01b9b8b', 3, 1, 'app', '[]', 0, '2020-07-31 20:34:39', '2020-07-31 20:34:39', '2021-07-31 23:34:39'),
('c5c3c913889870ca2c857c2c229507ede2d5b35731e1f475432fa94eeafe036d9ec8c9e4ed79c15a', 1, 1, 'app', '[]', 0, '2020-07-30 18:00:09', '2020-07-30 18:00:09', '2021-07-30 21:00:09'),
('c6477d35d460eb76bd29cbf391c36b9724c651ba67b47a443df7eae3886b3c7840af4031101fcae2', 3, 1, 'app', '[]', 0, '2020-07-30 19:56:09', '2020-07-30 19:56:09', '2021-07-30 22:56:09'),
('c7091b25da0742c77d432841fb6e0620b36b11e0d55aeb9871accdd1ae073569e846a91390fd55fb', 17, 1, 'app', '[]', 0, '2020-10-21 13:53:24', '2020-10-21 13:53:24', '2021-10-21 19:53:24'),
('ca45ce7b25d5554886b1e9e98e7cd3d63f756351b5113ddee451883208617efb93b91806b89523d4', 3, 1, 'app', '[]', 0, '2020-07-30 20:12:33', '2020-07-30 20:12:33', '2021-07-30 23:12:33'),
('cc968dfec5ab26eaebe1e6b587fa66bdddfebdb2f4d7b1bc8e0b38593cc47dd72fd6d735ed650b6a', 1, 1, 'app', '[]', 0, '2020-07-29 19:22:04', '2020-07-29 19:22:04', '2021-07-29 22:22:04'),
('cd6a6f6a96ccb5095187e40ce6a4dc5aaa36e9d9fe6365005e42c61288bb9f70e1c43208eb9384e5', 3, 1, 'app', '[]', 0, '2020-07-30 20:06:31', '2020-07-30 20:06:31', '2021-07-30 23:06:31'),
('d034493b48877d51f8cad0936374cdfa3e8c1d557c09423468ceb465caa687fe22e06a723793577d', 6, 1, 'app', '[]', 0, '2020-08-20 00:08:32', '2020-08-20 00:08:32', '2021-08-20 06:08:32'),
('d563d2642d44a0cfcb38b2e138c8c1db6beea1c8f475b43876c3b51647991cddc640eeb96a8bf629', 3, 1, 'app', '[]', 0, '2020-07-30 18:49:18', '2020-07-30 18:49:18', '2021-07-30 21:49:18'),
('da1a0c4013a6bfe57613306240030583dd62d256837559a93410ff7cdc851bbbcf61fceef1681b6c', 17, 1, 'app', '[]', 0, '2020-10-15 13:10:21', '2020-10-15 13:10:21', '2021-10-15 19:10:21'),
('e1f0538415109a5f388581e75d3e1696bfe1e326eb6fbd8b31fd1831eb610bee1d7d9a374809f945', 3, 1, 'app', '[]', 0, '2020-07-30 19:58:42', '2020-07-30 19:58:42', '2021-07-30 22:58:42'),
('e4673a580480d5894889adb51f697dd20582c20ce96cb4975557374571b489818991b8bcf0bcbbce', 3, 1, 'app', '[]', 0, '2020-07-30 19:46:08', '2020-07-30 19:46:08', '2021-07-30 22:46:08'),
('e68c030ba3c0a4fe7337ca27edc9b63475f26121366ec8a7372ad6d96da2d1d6f54df7d2a4fab035', 8, 1, 'app', '[]', 0, '2020-08-22 23:23:31', '2020-08-22 23:23:31', '2021-08-23 05:23:31'),
('e7a64a0d328583a8aa92b7c2aa124ab75130ccdcb15df38f4fa8cccd5346e0d4f8674cb0bb582d09', 12, 1, 'app', '[]', 0, '2020-10-14 12:06:20', '2020-10-14 12:06:20', '2021-10-14 18:06:20'),
('e87cf9021c0d4bb09c880c8008c2c2ea9215a293bb397e0b15d04723406e9ee8a94cd4c0db78b69e', 1, 1, 'app', '[]', 0, '2020-07-30 18:00:16', '2020-07-30 18:00:16', '2021-07-30 21:00:16'),
('eefac89bd01b49e6357bbb71e8dbb2330f797d8b40dad89334a71685c2ae44a5b20b7dffcf31631b', 6, 1, 'app', '[]', 0, '2020-08-20 00:03:26', '2020-08-20 00:03:26', '2021-08-20 06:03:26'),
('f09bd30252888e41e3660817141ece0e85cbb6edb65ba3b14e08e0974201464cbaa9345ef40b07b1', 8, 1, 'app', '[]', 0, '2020-08-22 23:29:51', '2020-08-22 23:29:51', '2021-08-23 05:29:51'),
('f0c3e67faafd36cd1a472de93fe4142fd1b4aaf0e0f24cdcae436161ff694316346a65e08bc56447', 3, 1, 'app', '[]', 0, '2020-07-31 21:40:56', '2020-07-31 21:40:56', '2021-08-01 00:40:56'),
('f1a75d054cc983f1af585373b8840b1711cbfb488f0c2bdf163fa826631ffde1a2851fc8f7235578', 7, 1, 'app', '[]', 0, '2020-08-20 09:02:47', '2020-08-20 09:02:47', '2021-08-20 15:02:47'),
('f251111f6af791c2e08c5d53a99be5ab0be0f55d6b2e06e59fa00bd976671588902ad6d4a14e9895', 15, 1, 'app', '[]', 0, '2020-10-14 12:36:02', '2020-10-14 12:36:02', '2021-10-14 18:36:02'),
('f2e0f4f6221760724da764a8bd2882eaf2d02f525da13eaa8267d896452e2c9d7d9fc0104a863379', 5, 1, 'app', '[]', 0, '2020-08-19 22:14:23', '2020-08-19 22:14:23', '2021-08-20 04:14:23'),
('f46e7721d203ec53077aaf68b29e42d97bf655e4efd8f8beab36f9dd1dbd10e58a65862f1f2d706b', 3, 1, 'app', '[]', 0, '2020-07-31 20:33:55', '2020-07-31 20:33:55', '2021-07-31 23:33:55'),
('f9146382ae632c7c96950b84f026b735bdf7b22ef88a6a3c2287c8b1716888ee07753a58cfb6e111', 3, 1, 'app', '[]', 0, '2020-07-31 21:26:14', '2020-07-31 21:26:14', '2021-08-01 00:26:14'),
('f990c32ea5acb009072e6cc3cbc9355aca5b75e846d24e22f30eec67e89f3e41de4e024e50f51503', 3, 1, 'app', '[]', 0, '2020-07-30 19:54:18', '2020-07-30 19:54:18', '2021-07-30 22:54:18'),
('fa91dde2f41aa7b1e2b529200a23de8618edd2179b75eb27b2cd4bf86f34694e2d2ad5ba38972912', 1, 1, 'app', '[]', 0, '2020-07-29 19:17:15', '2020-07-29 19:17:15', '2021-07-29 22:17:15'),
('fd830851e47d88b12c1c37bd3e5514df560026d95190754e6936c0a4f09f6a35df386bd98ae261ce', 6, 1, 'app', '[]', 0, '2020-08-22 23:22:49', '2020-08-22 23:22:49', '2021-08-23 05:22:49'),
('fd93c1f215c42be89f81c63794896a7b7b1c6128ee28876e0f871f13b9378268768199a0acd3f3cf', 3, 1, 'app', '[]', 0, '2020-07-30 19:47:12', '2020-07-30 19:47:12', '2021-07-30 22:47:12'),
('ffd08827bdab9258b7735b393724209a9a4c84009af5b352f0d895a418150d93fff3e85a4f92f8a1', 3, 1, 'app', '[]', 0, '2020-07-30 19:51:30', '2020-07-30 19:51:30', '2021-07-30 22:51:30');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `provider`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Laravel Personal Access Client', 'NFGzq4Y1WVEdk6sOPd59rPmgqHfcTSiYglbDmsa2', NULL, 'http://localhost', 1, 0, 0, '2020-07-28 15:38:54', '2020-07-28 15:38:54'),
(2, NULL, 'Laravel Password Grant Client', '1EFvuKno8mI1VymtGGzZMWv4crcPFRxN2nZQvMhN', 'users', 'http://localhost', 0, 1, 0, '2020-07-28 15:38:54', '2020-07-28 15:38:54');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2020-07-28 15:38:54', '2020-07-28 15:38:54');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `id` int(255) NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`id`, `email`, `token`, `created_at`) VALUES
(2, 'M.deefalla@gmail.com', '28666', NULL),
(4, 'mm887549@gmail.com', '22832', NULL),
(5, 'mm887549@gmail.com', '62536', NULL),
(6, 'mm887549@gmail.com', '97586', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `persons`
--

CREATE TABLE `persons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `latitude` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `longitude` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `persons`
--

INSERT INTO `persons` (`id`, `name`, `email`, `mobile`, `age`, `latitude`, `longitude`, `image`, `created_at`, `updated_at`) VALUES
(32, 'Nur Mohammed', 'murad@gmail.com', '01736778155', '28', '37.4219499', '-122.0839602', 'persons/1597939791.png', '2020-08-20 10:09:51', '2020-08-20 10:09:51');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `mobile`, `address`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(6, 'Mohammed Nur', 'azmisoft1997@gmail.com', NULL, NULL, NULL, '$2y$10$ArdO5zCCHggXhQ25nYZdCeIivLAHhq20ctCURoEJxZZX9FrTe8A6W', NULL, '2020-08-20 00:02:15', '2020-08-20 00:02:15'),
(7, 'Mohammed nur', 'mohammednur1997@yahoo.com', NULL, NULL, NULL, '$2y$10$26qNW5xkTrVA4d/i/eq8wuzfVPVe/SPph/ijW.LFi0Fn2BHIixX8q', NULL, '2020-08-20 09:02:47', '2020-08-20 09:02:47'),
(8, 'moh', 'm.deefalla@gmail.com', NULL, NULL, NULL, '$2y$10$n0IVfo5KqxrMyzz42Id1NOS5Bapjj9dyAzDtwichjKJGHakXtT3Zm', NULL, '2020-08-22 23:18:24', '2020-08-22 23:18:24'),
(9, 'Rabbil', 'Test@test.com', NULL, NULL, NULL, '$2y$10$OEjL3bJTkH3AE3mOCNonbuiREqnvr6ZYITNI5vas.pnpOXMgcUj4O', NULL, '2020-08-28 11:48:24', '2020-08-28 11:48:24'),
(10, 'Zillur Rahman', 'zillurrahman68582@gmail.com', NULL, NULL, NULL, '$2y$10$ycEi37YkjaSWHKvV836NLeZf8E6bLASyoEUM.PYnvukxkVuz5fVEq', NULL, '2020-08-28 14:26:36', '2020-08-28 14:26:36'),
(11, 'Dr. Abdulaziz Alharbi', 'QUSDC2011@GMAIL.COM', NULL, NULL, NULL, '$2y$10$846qvPb28XqM7dBOKfx7MOMd6YxZUcjcKZrWYpbYkRHKKwtTLoCZK', NULL, '2020-09-13 02:35:36', '2020-09-13 02:35:36'),
(17, 'Mohammed Nur', 'mm887549@gmail.com', '01836778155', 'Dhaka', NULL, '$2y$10$DxHbMmwwTvqQdvDHcOvhe.HD/ZtP1ZNQehE6mmDMt74QplHLESw1K', NULL, '2020-10-14 12:42:50', '2020-10-14 12:42:50'),
(18, 'Davida', 'Davida', NULL, NULL, NULL, '$2y$10$GXPnwf1DF4Mh8v68s2DVBOF63VkXSP1pVCSaBTOHa5EVhSdtuZxvu', NULL, '2020-10-21 18:09:35', '2020-10-21 18:09:35'),
(19, 'Abu', 'Bradbach76@icloud.com', '123', 'Klmno', NULL, '$2y$10$ZsDniQ6p4X60NQanoK.JBe5tFEJVKdPe8gNHSc1KYwsK1ka0KHm2y', NULL, '2020-10-22 15:12:16', '2020-10-22 15:12:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `persons`
--
ALTER TABLE `persons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `password_resets`
--
ALTER TABLE `password_resets`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `persons`
--
ALTER TABLE `persons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
