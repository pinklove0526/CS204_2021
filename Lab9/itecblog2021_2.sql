-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Aug 09, 2021 at 11:17 AM
-- Server version: 5.7.32
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `itecblog2021_2`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `ID` bigint(20) NOT NULL,
  `comment_text` text NOT NULL,
  `comment_user` int(11) NOT NULL,
  `comment_post` int(11) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `comment_parent` int(11) DEFAULT NULL,
  `reply_to_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`ID`, `comment_text`, `comment_user`, `comment_post`, `date_created`, `comment_parent`, `reply_to_user`) VALUES
(1, 'this is a test comment', 11, 7, '2021-06-05 15:47:40', NULL, NULL),
(2, 'test', 11, 7, '2021-06-05 15:48:12', NULL, NULL),
(3, 'test 3', 1, 7, '2021-06-05 15:48:30', NULL, NULL),
(4, 'We can comment', 11, 7, '2021-06-05 15:48:48', NULL, NULL),
(5, 'We can comment', 1, 7, '2021-06-05 15:48:58', NULL, NULL),
(6, 'htrhtr', 1, 7, '2021-06-05 15:49:20', NULL, NULL),
(7, 'Konichi wa', 11, 7, '2021-06-05 15:49:40', NULL, NULL),
(8, 'ter', 1, 7, '2021-06-05 15:50:21', NULL, NULL),
(9, 'Hio everyone\\n', 1, 7, '2021-06-05 15:50:53', NULL, NULL),
(10, 'Hi everone', 11, 7, '2021-06-05 15:53:23', NULL, NULL),
(11, 'Tesy 123', 1, 7, '2021-06-05 15:53:41', NULL, NULL),
(12, 'Wow this actually works?!', 11, 7, '2021-06-05 15:54:12', NULL, NULL),
(13, 'Here is another comment~', 1, 7, '2021-06-05 15:54:42', NULL, NULL),
(14, 'Here is another comment~', 1, 7, '2021-06-05 15:54:56', NULL, NULL),
(15, 'WTF are my comments!\\n', 11, 7, '2021-06-05 15:55:25', NULL, NULL),
(16, 'Hello Everyone', 1, 7, '2021-06-05 15:55:47', NULL, NULL),
(17, 'Tesy', 1, 1, '2021-06-05 15:56:08', NULL, NULL),
(18, 'hre', 1, 2, '2021-06-05 15:56:30', NULL, NULL),
(19, 'HI there', 1, 2, '2021-06-05 15:56:49', NULL, NULL),
(20, 'Hello Wor;d!', 1, 2, '2021-06-05 15:57:22', NULL, NULL),
(21, 'coudin kerrt', 1, 2, '2021-06-05 15:57:47', NULL, NULL),
(22, 'baka', 11, 2, '2021-06-05 15:58:14', NULL, NULL),
(23, 'test', 1, 2, '2021-06-05 15:58:26', NULL, NULL),
(24, 'Hello everyone', 11, 7, '2021-06-05 15:58:44', NULL, NULL),
(25, 'Hello', 1, 4, '2021-06-05 15:58:56', NULL, NULL),
(26, 'Hello 2', 1, 4, '2021-06-05 15:59:10', NULL, NULL),
(27, 'test', 1, 7, '2021-06-05 15:59:23', NULL, NULL),
(28, 'test', 1, 7, '2021-06-05 15:59:30', NULL, NULL),
(29, 'test', 1, 7, '2021-06-05 15:59:38', NULL, NULL),
(30, 'hrthtr', 1, 7, '2021-06-05 16:00:00', NULL, NULL),
(31, 'test', 1, 7, '2021-06-05 16:00:19', NULL, NULL),
(32, 'Hi there', 1, 2, '2021-06-05 16:00:33', NULL, NULL),
(33, 'tes test etst', 1, 7, '2021-06-05 16:01:03', NULL, NULL),
(34, 'fgre', 1, 4, '2021-06-05 16:01:18', NULL, NULL),
(35, 'test', 1, 4, '2021-06-05 16:01:30', NULL, NULL),
(36, 'ty34', 1, 0, '2021-06-05 16:01:44', NULL, NULL),
(37, 'htr', 1, 0, '2021-06-05 16:01:58', NULL, NULL),
(38, 'htrt65j', 1, 0, '2021-06-05 16:02:32', NULL, NULL),
(39, 'hgrt', 1, 0, '2021-06-05 16:02:47', NULL, NULL),
(40, 'jyt', 1, 0, '2021-06-05 16:03:03', NULL, NULL),
(41, 'yjty', 1, 0, '2021-06-05 16:03:16', NULL, NULL),
(42, '10 million', 1, 0, '2021-06-05 16:03:36', NULL, NULL),
(43, 'xin test', 1, 4, '2021-06-05 16:03:55', NULL, NULL),
(44, 'we', 1, 2, '2021-06-05 16:04:06', NULL, NULL),
(45, 'fgbdhd', 11, 2, '2021-06-05 16:04:27', NULL, NULL),
(46, 'Helo 모두 무슨 일이야', 11, 2, '2021-06-05 16:04:47', NULL, NULL),
(47, 'This is a test', 11, 2, '2021-06-05 16:05:39', NULL, NULL),
(48, 'this is a test', 11, 2, '2021-06-05 16:05:48', NULL, NULL),
(49, 'This is troll man', 11, 2, '2021-06-05 16:06:01', NULL, NULL),
(50, 'This is troll man', 11, 2, '2021-06-05 16:06:12', NULL, NULL),
(51, 'Is this actually working?', 11, 2, '2021-06-05 16:06:38', NULL, NULL),
(52, 'Hey suckas\\n', 11, 2, '2021-06-05 16:07:02', NULL, NULL),
(53, 'The is written using SQL', 1, 1, '2021-06-30 19:21:08', NULL, NULL),
(54, 'ghrhere', 11, 2, '2021-06-30 19:22:19', NULL, NULL),
(55, 'Everythign is working fine!', 11, 2, '2021-06-30 19:22:42', NULL, NULL),
(56, 'jyjyttj', 11, 2, '2021-06-30 19:23:21', NULL, NULL),
(57, 'nrthjtrj', 11, 2, '2021-06-30 19:23:33', NULL, NULL),
(58, 'Finaly it workl eureka', 11, 2, '2021-06-30 19:23:50', NULL, NULL),
(59, 'Eureka', 1, 7, '2021-06-30 19:24:01', NULL, NULL),
(60, 'Finally it works!', 1, 7, '2021-06-30 19:24:22', NULL, NULL),
(61, 'You so baaka', 1, 2, '2021-06-30 19:25:10', NULL, NULL),
(62, 'hello world\\n', 1, 7, '2021-06-30 19:25:30', NULL, NULL),
(63, 'fg34g3', 1, 7, '2021-06-30 19:25:49', NULL, NULL),
(64, 'vgre', 1, 7, '2021-06-30 19:26:03', NULL, NULL),
(65, 'vewgwer', 1, 4, '2021-06-30 19:26:26', NULL, NULL),
(66, 'g3g3\\n', 1, 4, '2021-06-30 19:27:28', NULL, NULL),
(67, '43lt3\\n', 1, 4, '2021-06-30 19:27:43', NULL, NULL),
(68, 'fewgrew', 1, 4, '2021-06-30 19:28:05', NULL, NULL),
(69, 'vvwevew', 1, 7, '2021-06-30 19:28:28', NULL, NULL),
(70, 'regerg', 1, 7, '2021-06-30 19:28:49', NULL, NULL),
(71, 'Another test', 1, 7, '2021-06-30 19:29:01', NULL, NULL),
(72, '', 1, 7, '2021-06-30 19:29:25', NULL, NULL),
(73, 'gewegewrse', 1, 7, '2021-06-30 19:30:00', NULL, NULL),
(74, 'gegrewfewgwe', 1, 7, '2021-06-30 19:30:19', NULL, NULL),
(75, 'gwegw', 1, 7, '2021-06-30 19:30:39', NULL, NULL),
(76, 'fgm[mg4eg', 1, 7, '2021-06-30 19:31:30', NULL, NULL),
(77, 'ewfewfwe', 1, 7, '2021-06-30 19:32:47', NULL, NULL),
(78, 'gg3w4gt54;5h\\\'54hl; g re geggg3w4gt54;5h\\\'54hl; g re geggg3w4gt54;5h\\\'54hl; g re geggg3w4gt54;5h\\\'54hl; g re geggg3w4gt54;5h\\\'54hl; g re geggg3w4gt54;5h\\\'54hl; g re geggg3w4gt54;5h\\\'54hl; g re geggg3w4gt54;5h\\\'54hl; g re geg', 1, 7, '2021-06-30 19:33:47', NULL, NULL),
(79, 'admin | 2021-06-04 21:08:57\\ngg3w4gt54;5h\\\'54hl; g re geggg3w4gt54;5h\\\'54hl; g re geggg3w4gt54;5h\\\'54hl; g re geggg3w4gt54;5h\\\'54hl; g re geggg3w4gt54;5h\\\'54hl; g re geggg3w4gt5', 1, 7, '2021-06-30 19:34:02', NULL, NULL),
(80, 'Trolling down the riverTrolling down the riverTrolling down the riverTrolling down the riverTrolling down the riverTrolling down the riverTrolling down the riverTrolling down the river', 11, 7, '2021-06-30 19:34:48', NULL, NULL),
(81, 'fewfwegwe', 12, 0, '2021-06-30 19:35:30', 66, 1),
(82, 'vdsbvs', 12, 0, '2021-06-30 19:35:54', 65, 1),
(83, 'This is a real response to a comment!', 12, 0, '2021-06-30 19:36:09', 3, 11),
(84, 'fewfwe', 12, 0, '2021-06-30 19:36:42', 99, 1),
(85, 'vsdasvdsdcs', 12, 7, '2021-06-30 19:37:01', 11, 11),
(86, 'Heloe baka baka baka', 12, 7, '2021-06-30 19:37:15', 11, 11),
(87, 'post check', 12, 7, '2021-06-30 19:37:30', 72, 1),
(88, 'come here baka', 12, 7, '2021-06-30 19:37:45', 116, 12),
(89, 'Admin is a loser!', 12, 7, '2021-06-30 19:38:02', 9, 1),
(90, 'fewgewgewvcw', 1, 7, '2021-06-30 19:38:18', 92, 1),
(91, 'baka', 12, 7, '2021-06-30 19:38:54', 122, 12),
(92, 'test 23333\\n', 12, 7, '2021-06-30 19:39:16', 99, 1),
(93, 'erbqbq', 12, 7, '2021-06-30 19:39:38', 66, 1),
(94, 'fmgl;erge', 12, 7, '2021-06-30 19:39:53', 9, 1),
(95, '33333333333333333', 1, 7, '2021-06-30 19:40:18', 124, 12),
(96, 'what do tiy wabt?', 1, 7, '2021-06-30 19:40:52', 131, 1),
(97, 'fewfewf', 1, 7, '2021-06-30 19:41:15', 66, 1),
(98, 'Tezgt 1000million', 12, 7, '2021-06-30 19:41:34', NULL, NULL),
(99, 'jt6j6', 1, 4, '2021-06-30 19:41:53', 44, 1),
(100, 'jkrjkry', 1, 4, '2021-06-30 19:42:12', 27, 1),
(101, 'jjtyjyjkty', 1, 4, '2021-06-30 19:42:28', 27, 1),
(102, 'Helloo 2 you 2', 1, 4, '2021-06-30 19:42:47', 26, 1),
(103, 'Well aren\\\'t you handsome admin', 1, 4, '2021-06-30 19:43:06', 26, 1),
(104, 'What aer you teting', 1, 7, '2021-06-30 19:43:27', 1, 11),
(105, 'anthre test', 1, 7, '2021-06-30 19:43:39', 1, 11),
(106, 'jtrjt', 1, 7, '2021-06-30 19:44:01', 1, 11),
(107, 'tykytkyt', 1, 7, '2021-06-30 19:44:16', 1, 11),
(108, 'ju5ruj5', 1, 7, '2021-06-30 19:44:31', 8, 11),
(109, 'hrehre', 1, 7, '2021-06-30 19:44:48', 8, 11),
(110, 'another comment', 1, 7, '2021-06-30 19:45:06', 134, 12),
(111, 'whcha testing?', 1, 7, '2021-06-30 19:45:22', 134, 12),
(112, 'test onemillion', 1, 7, '2021-06-30 19:45:36', 134, 12),
(113, 'can i try', 1, 7, '2021-06-30 19:45:50', 134, 12),
(114, 'CID', 1, 7, '2021-06-30 19:46:05', 103, 11),
(115, 'No Cid', 1, 7, '2021-06-30 19:46:22', 103, 11),
(116, 'Can I troll?', 1, 7, '2021-06-30 19:46:44', 103, 11),
(117, 'Anyeong', 1, 7, '2021-06-30 19:47:02', 8, 11),
(118, '<script>alert(\\\"Antong\\\");</script>', 1, 7, '2021-06-30 19:47:17', 14, 1),
(119, 'veer', 1, 7, '2021-06-30 19:47:37', 3, 11),
(120, 'gregre', 1, 7, '2021-06-30 19:48:02', 3, 11),
(121, 'f3', 1, 7, '2021-06-30 19:48:33', 158, 1),
(122, 'f32f32', 1, 7, '2021-06-30 19:48:49', 158, 1),
(123, '', 12, 7, '2021-06-30 19:49:00', NULL, NULL),
(124, 'This a new comment', 12, 7, '2021-06-30 19:49:13', NULL, NULL),
(125, 'hhrtht', 1, 1, '2021-06-30 19:50:38', 155, 1),
(126, 'Encode this', 1, 1, '2021-06-30 19:51:06', 154, 1),
(127, 'Encode this for real', 1, 1, '2021-06-30 19:51:21', 154, 1),
(128, 'Encode this for real', 1, 1, '2021-06-30 19:51:28', 154, 1),
(129, 'Encode this for real', 1, 1, '2021-06-30 19:51:34', 154, 1),
(130, 'trolling sux', 1, 1, '2021-06-30 19:51:58', 134, 12),
(131, 'ghrthr', 1, 1, '2021-06-30 19:52:16', 161, 12),
(132, 'rthher', 1, 1, '2021-06-30 19:52:36', 157, 1),
(133, 'work plz', 1, 1, '2021-06-30 20:33:58', 154, 1),
(134, 'gwregwe', 1, 1, '2021-06-30 20:34:12', 129, 1),
(135, 'rtwe', 1, 1, '2021-06-30 20:34:33', 127, 12),
(136, 'no you are bala', 1, 1, '2021-06-30 20:34:54', 123, 12),
(137, 'Outpuut comment here', 1, 1, '2021-06-30 20:35:16', 132, 1),
(138, 'Hi there', 1, 4, '2021-06-30 20:35:38', 71, 1),
(139, 'This is a comment, I need coffee', 1, 4, '2021-06-30 20:35:53', NULL, NULL),
(140, 'Anyeong 2', 1, 0, '2021-06-30 20:36:12', 153, 1),
(141, 'No!', 1, 0, '2021-06-30 20:36:26', 152, 1),
(142, 'u56u54', 1, 0, '2021-06-30 20:36:43', 150, 1),
(143, 'hrthtr', 1, 0, '2021-06-30 20:36:57', 134, 12),
(144, '4444', 1, 0, '2021-06-30 20:37:12', 129, 1),
(145, 'ntr', 1, 0, '2021-06-30 20:37:26', 127, 12),
(146, 'reh3434', 1, 0, '2021-06-30 20:37:40', 126, 12),
(147, 'hrth4th34', 1, 0, '2021-06-30 20:37:56', 188, 1),
(148, 'htrhtr', 1, 7, '2021-06-30 20:38:19', 162, 12),
(149, 'htrhtr', 1, 7, '2021-06-30 20:38:29', 162, 12),
(150, 'htrhtr', 1, 7, '2021-06-30 20:38:37', 162, 12),
(151, 'htrhtr', 1, 7, '2021-06-30 20:38:45', 162, 12),
(152, 'hhrthtr', 1, 1, '2021-06-30 20:39:04', 193, 1),
(153, 'htrhtrh', 1, 7, '2021-06-30 20:39:19', NULL, NULL),
(154, 'jyt', 1, 7, '2021-06-30 20:39:36', NULL, NULL),
(155, 'htrhtr', 1, 7, '2021-06-30 20:40:01', 99, 1),
(156, 'Hey how ya doin', 1, 7, '2021-06-30 20:40:15', 196, 1),
(157, 'Sup yo!', 12, 7, '2021-06-30 20:40:30', 11, 11),
(158, 'No likes?', 1, 7, '2021-06-30 20:40:41', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `ID` bigint(20) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_body` text NOT NULL,
  `post_author` int(11) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_modified` datetime NOT NULL,
  `post_img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`ID`, `post_title`, `post_body`, `post_author`, `date_created`, `date_modified`, `post_img`) VALUES
(1, 'Test 1', 'ffgwfgwe', 1, '2021-05-29 07:32:43', '2021-05-14 15:15:52', ''),
(2, 'Konichiwa World', 'This is hello in Japanese', 1, '2021-05-29 07:33:20', '2021-05-14 15:16:16', ''),
(3, 'Annyong World', 'This is hello in Korean', 1, '2021-05-29 07:35:19', '2021-05-14 15:19:53', ''),
(4, 'Xin chao World', 'This is hello in Vietnamese', 1, '2021-05-29 07:35:51', '2021-05-14 15:27:56', ''),
(5, 'LanLan post', 'Lans post', 9, '2021-05-29 07:36:21', '2021-05-14 15:30:12', ''),
(6, 'Lorem ipsum', 'Something something', 1, '2021-05-29 07:36:54', '2021-05-14 15:57:26', ''),
(7, 'i756', '6767o76', 1, '2021-05-29 07:37:53', '2021-05-18 18:07:23', 'images/Capture_60a39feb1315f.png'),
(8, 'test', 'y54', 1, '2021-05-29 07:38:34', '2021-05-18 18:09:11', 'images/15052021_60a3a05732f38.png'),
(9, 'jtrjtr', 'jtrjtr', 1, '2021-05-29 07:40:09', '2021-05-18 18:10:44', 'images/17052021_60a3a0b4b6a5b.png'),
(10, 'jtrjtr', 'jtrjtr', 1, '2021-05-29 07:40:41', '2021-05-18 18:12:43', 'images/17052021_60a3a12b278ad.png'),
(11, 'jtrjtr', 'jtrjtr', 1, '2021-05-29 07:41:11', '2021-05-18 18:14:50', 'images/17052021_60a3a1aacc41e.png'),
(12, 'jtrjtr', 'jtrjtr', 1, '2021-05-29 07:42:09', '2021-05-18 18:15:18', 'images/17052021_60a3a1c60f7e2.png'),
(13, 'jtrjtr', 'jtrjtr', 1, '2021-05-29 07:42:37', '2021-05-18 18:15:58', 'images/17052021_60a3a1ee2fc98.png'),
(14, 'trjhutrj', 'jtrjtrjtr', 1, '2021-05-29 07:43:37', '2021-05-18 18:16:42', 'images/13052021_60a3a21abee02.png'),
(15, 'trjhutrj', 'jtrjtrjtr', 1, '2021-05-29 07:44:38', '2021-05-18 18:19:30', 'images/13052021_60a3a2c224cdb.png'),
(16, 'trjhutrj', 'jtrjtrjtr', 1, '2021-05-29 07:45:16', '2021-05-18 18:34:08', 'images/13052021_60a3a630e2fa9.png'),
(17, 'Test100', 'errhrehre', 1, '2021-05-29 07:45:52', '2021-05-19 17:12:27', 'images/z2496181608229_4f1f21adffcfefa4f895995d1f7efd79_60a4e48bc551e.jpg'),
(18, 'Geo Legos', 'Geo playing with Legos', 1, '2021-05-29 07:46:45', '2021-05-20 09:55:49', 'images/z2466769992378_c47fe5b685561b8a31a47d77cee60919_60a5cfb514558.jpg'),
(19, 'Nam playing with Legos', 'Nam playing with LegosNam playing with LegosNam playing with LegosNam playing with LegosNam playing with LegosNam playing with LegosNam playing with LegosNam playing with LegosNam playing with LegosNam playing with Legos\\r\\nNam playing with LegosNam playing with LegosNam playing with LegosNam playing with LegosNam playing with LegosNam playing with LegosNam playing with LegosNam playing with Legos', 1, '2021-05-29 07:47:32', '2021-05-20 10:09:34', 'images/z2466770042114_36957a730c691ce2836633a2402e00b9_60a5d2ee8cf4b.jpg'),
(20, 'Broadcast 24', 'greregrre', 1, '2021-06-05 16:09:31', '2021-05-21 09:59:38', 'images2/60a7221a80daf6.97186624.jpeg'),
(21, 'Final test', 'bhtrhtrhrthrt', 1, '2021-06-05 16:10:16', '2021-05-21 10:02:17', 'images2/60a722b96ea1c7.79700945.jpeg'),
(22, 'Geometric Post', 'BREAKTIME [0920-0930]\\r\\nToday\\\'s Topic:\\r\\n\\r\\n---------------------------------------------------------\\r\\n-Create a post with an image\\r\\n-Create a checkPost() function that will handle the post\\r\\nvalidation as well as file validation.\\r\\n-Then hand of the post content and img path to a\\r\\ncreatePost() function\\r\\n-Validate the file upload with a function validateFile()\\r\\nwhich returns either an error or the path file for the image \\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\nBREAK TIME [1430-1455]\\r\\n\\r\\nToday\\\'s Topic:\\r\\n---------------------------------------------------------\\r\\n-$_FILES superglobal and managing file uploads\\r\\n-Validating file uploads [extentions, size, errors]\\r\\n-Moving files from \\\'temp\\\' directory to project directory\\r\\n-Writing file locations to the DB\\r\\n-Refactoring PRODCEDURAL code into FUNCTIONAL code\\r\\n---------------------------------------------------------\\r\\n\\r\\nActivity: \\r\\n-Convert ITEC Blog from PROCEDURAL to FUNCTIONAL code\\r\\n-Add blog image uploading', 1, '2021-06-05 16:11:35', '2021-05-21 10:28:23', 'images2/60a728d7ae0ac5.85947678.png'),
(23, 'My kids', 'Tghem playing', 1, '2021-06-05 16:12:16', '2021-05-21 13:09:00', 'images2/60a74e7ca2f8d8.17369237.jpeg'),
(24, 'Broadcast 24', 'gregre', 1, '2021-06-05 16:12:56', '2021-05-21 14:51:19', 'images2/60a76677e8976.jpeg'),
(25, 'Purple Geometry', '\\r\\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\\r\\n\\r\\n\\r\\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 1, '2021-06-05 16:13:55', '2021-05-21 15:00:30', 'images2/60a7689ea3a44.jpeg'),
(26, 'Nam and Geo', 'They ar eplaying with Legoos. BREAKTIME [1415-1428];\\r\\nToday\\\'s Topic:\\r\\n\\r\\n---------------------------------------------------------\\r\\n-Create a post with an image\\r\\n-Create a checkPost() function that will handle the post\\r\\nvalidation as well as file validation.\\r\\n-Then hand of the post content and img path to a\\r\\ncreatePost() function\\r\\n-Validate the file upload with a function validateFile()\\r\\nwhich returns either an error or the path file for the image \\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\nBREAK TIME [1430-1455]\\r\\n\\r\\nToday\\\'s Topic:\\r\\n---------------------------------------------------------\\r\\n-$_FILES superglobal and managing file uploads\\r\\n-Validating file uploads [extentions, size, errors]\\r\\n-Moving files from \\\'temp\\\' directory to project directory\\r\\n-Writing file locations to the DB\\r\\n-Refactoring PRODCEDURAL code into FUNCTIONAL code\\r\\n---------------------------------------------------------\\r\\n\\r\\nActivity: \\r\\n-Convert ITEC Blog from PROCEDURAL to FUNCTIONAL code\\r\\n-Add blog image uploading', 1, '2021-06-05 16:14:58', '2021-05-21 15:18:47', 'images2/60a76ce7e44fb.jpeg'),
(27, 'Broadcast 24', 'ghher', 1, '2021-06-05 16:15:40', '2021-05-28 08:08:21', 'images2/60b04285b09c67.06262054.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `ID` bigint(20) NOT NULL,
  `review_value` int(11) NOT NULL,
  `review_type` varchar(255) NOT NULL DEFAULT 'thumb',
  `user_id` int(11) NOT NULL,
  `comment_id` int(11) DEFAULT NULL,
  `post_id` int(11) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`ID`, `review_value`, `review_type`, `user_id`, `comment_id`, `post_id`, `date_created`) VALUES
(1, 2, 'thumb', 1, 196, 7, '2021-06-30 18:58:01'),
(2, 2, 'thumb', 1, 103, 7, '2021-06-30 18:58:36'),
(3, 1, 'thumb', 1, 84, 7, '2021-06-30 18:58:56'),
(4, 2, 'thumb', 1, 78, 7, '2021-06-30 18:59:08'),
(5, 1, 'thumb', 1, 75, 7, '2021-06-30 18:59:23'),
(6, 2, 'thumb', 1, 74, 7, '2021-06-30 18:59:34'),
(7, 2, 'thumb', 1, 73, 7, '2021-06-30 18:59:59'),
(8, 1, 'thumb', 1, 195, 7, '2021-06-30 19:02:16'),
(9, 1, 'thumb', 1, 162, 7, '2021-06-30 19:02:30'),
(10, 1, 'thumb', 1, 148, 7, '2021-06-30 19:02:42'),
(11, 2, 'thumb', 1, 150, 7, '2021-06-30 19:02:55'),
(12, 2, 'thumb', 1, 151, 7, '2021-06-30 19:03:06'),
(13, 2, 'thumb', 1, 152, 7, '2021-06-30 19:03:20'),
(14, 1, 'thumb', 1, 14, 7, '2021-06-30 19:03:32'),
(15, 2, 'thumb', 1, 99, 7, '2021-06-30 19:03:48'),
(16, 1, 'thumb', 1, 77, 7, '2021-06-30 19:04:06'),
(17, 1, 'thumb', 1, 72, 7, '2021-06-30 19:04:17'),
(18, 1, 'thumb', 1, 66, 7, '2021-06-30 19:04:27'),
(19, 1, 'thumb', 1, 65, 7, '2021-06-30 19:04:46'),
(20, 1, 'thumb', 1, 93, 7, '2021-06-30 19:04:59'),
(21, 2, 'thumb', 1, 199, 7, '2021-06-30 19:05:11'),
(22, 2, 'thumb', 1, 134, 7, '2021-06-30 19:05:23'),
(23, 1, 'thumb', 11, 196, 7, '2021-06-30 19:05:35'),
(24, 2, 'thumb', 11, 199, 7, '2021-06-30 19:05:55'),
(25, 2, 'thumb', 11, 195, 7, '2021-06-30 19:06:08'),
(26, 1, 'thumb', 11, 162, 7, '2021-06-30 19:06:21'),
(27, 2, 'thumb', 11, 190, 7, '2021-06-30 19:06:48'),
(28, 2, 'thumb', 11, 193, 7, '2021-06-30 19:07:00'),
(29, 2, 'thumb', 11, 134, 7, '2021-06-30 19:07:14'),
(30, 2, 'thumb', 11, 161, 7, '2021-06-30 19:07:29'),
(31, 1, 'thumb', 11, 148, 7, '2021-06-30 19:07:56'),
(32, 2, 'thumb', 11, 103, 7, '2021-06-30 19:08:08'),
(33, 1, 'thumb', 11, 150, 7, '2021-06-30 19:08:20'),
(34, 2, 'thumb', 11, 152, 7, '2021-06-30 19:08:41'),
(35, 1, 'thumb', 11, 99, 7, '2021-06-30 19:08:52'),
(36, 1, 'thumb', 11, 198, 7, '2021-06-30 19:09:06'),
(37, 1, 'thumb', 11, 124, 7, '2021-06-30 19:09:23'),
(38, 2, 'thumb', 11, 149, 7, '2021-06-30 19:09:35'),
(39, 1, 'thumb', 11, 98, 7, '2021-06-30 19:09:46'),
(40, 2, 'thumb', 11, 93, 7, '2021-06-30 19:09:58'),
(41, 1, 'thumb', 11, 84, 7, '2021-06-30 19:10:09'),
(42, 2, 'thumb', 11, 78, 7, '2021-06-30 19:10:39'),
(43, 2, 'thumb', 11, 79, 7, '2021-06-30 19:10:50'),
(44, 1, 'thumb', 11, 75, 7, '2021-06-30 19:11:01'),
(45, 2, 'thumb', 11, 74, 7, '2021-06-30 19:11:13'),
(46, 2, 'thumb', 12, 199, 7, '2021-06-30 19:11:26'),
(47, 2, 'thumb', 12, 195, 7, '2021-06-30 19:11:41'),
(48, 2, 'thumb', 12, 162, 7, '2021-06-30 19:11:55'),
(49, 2, 'thumb', 12, 190, 7, '2021-06-30 19:12:05'),
(50, 2, 'thumb', 12, 191, 7, '2021-06-30 19:12:18'),
(51, 2, 'thumb', 12, 193, 7, '2021-06-30 19:12:33'),
(52, 2, 'thumb', 12, 134, 7, '2021-06-30 19:12:44'),
(53, 1, 'thumb', 12, 147, 7, '2021-06-30 19:12:58'),
(54, 1, 'thumb', 12, 149, 7, '2021-06-30 19:13:10'),
(55, 2, 'thumb', 12, 103, 7, '2021-06-30 19:13:22'),
(56, 2, 'thumb', 12, 150, 7, '2021-06-30 19:13:33'),
(57, 2, 'thumb', 12, 151, 7, '2021-06-30 19:13:43'),
(58, 1, 'thumb', 12, 99, 7, '2021-06-30 19:13:52'),
(59, 1, 'thumb', 12, 198, 7, '2021-06-30 19:14:01'),
(60, 1, 'thumb', 12, 72, 7, '2021-06-30 19:14:17'),
(61, 1, 'thumb', 12, 118, 7, '2021-06-30 19:15:05'),
(62, 1, 'thumb', 12, 66, 7, '2021-06-30 19:15:19'),
(63, 2, 'thumb', 12, 126, 7, '2021-06-30 19:15:34'),
(64, 2, 'thumb', 12, 133, 7, '2021-06-30 19:15:47'),
(65, 2, 'thumb', 12, 65, 7, '2021-06-30 19:15:57'),
(66, 1, 'thumb', 12, 8, 7, '2021-06-30 19:16:08'),
(67, 1, 'thumb', 12, 192, 7, '2021-06-30 19:16:19'),
(68, 2, 'thumb', 12, 11, 7, '2021-06-30 19:16:35'),
(69, 2, 'thumb', 12, 200, 7, '2021-06-30 19:16:45'),
(70, 2, 'thumb', 12, 78, 7, '2021-06-30 19:16:58'),
(71, 1, 'thumb', 12, 79, 7, '2021-06-30 19:17:08'),
(72, 2, 'thumb', 12, 98, 7, '2021-06-30 19:17:19'),
(73, 2, 'thumb', 12, 196, 7, '2021-06-30 19:17:36'),
(74, 2, 'thumb', 12, 73, 7, '2021-06-30 19:17:47'),
(75, 2, 'thumb', 12, 152, 7, '2021-06-30 19:17:56'),
(76, 2, 'thumb', 1, 5, 7, '2021-06-30 19:18:06'),
(77, 2, 'thumb', 1, 124, 7, '2021-06-30 19:18:16'),
(78, 2, 'thumb', 1, 198, 7, '2021-06-30 19:18:27'),
(79, 1, 'thumb', 1, 133, 7, '2021-06-30 19:18:40'),
(80, 2, 'thumb', 1, 154, 7, '2021-06-30 19:18:57'),
(81, 1, 'thumb', 1, 155, 7, '2021-06-30 19:19:09'),
(82, 2, 'thumb', 1, 157, 7, '2021-06-30 19:19:18');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` bigint(20) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_hash` varchar(255) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_role` int(11) NOT NULL DEFAULT '2',
  `user_img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `user_name`, `user_email`, `user_hash`, `date_created`, `user_role`, `user_img`) VALUES
(1, 'admin', 'admin@gmail.com', '$2y$10$GVDIQlbrdhvHz/uvCnjVfOrviyJlXw82y0GThSBnnku/3hCv8cmE2', '2021-05-28 17:31:32', 1, ''),
(2, 'sammy', 'spenceraustinmartin@gmail.com', '$2y$10$WvU2ZpRw4D89mI4T5gP94uWAlCtQAS4DEKaletM4EbSVXXIv62xLG', '2021-05-28 17:32:18', 2, ''),
(3, 'itecsam', 'itec@gmail.com', '$2y$10$SorJT/f0POgxherI65T.m.6LBMj8h79C4O6g3D9/aPRVDTei5d4Lq', '2021-05-28 17:32:55', 2, ''),
(4, 'sammy5', 'itec@gmail.com', '$2y$10$Nvne/vpMGf346RrfqrMU2uelb808MXU9Xd1brliUr0Vi0G2NGxE..', '2021-05-28 17:33:25', 2, ''),
(5, 'lanlan', 'lan@gmail.com', '$2y$10$5wboupRIFbCFzSQ6qrIGzeICVWgkJ7ZWMsbLRzvmoUsnDCw21rgXa', '2021-05-28 17:33:55', 2, ''),
(6, 'lanlan2', 'spenceraustinmartin@gmail.com', '$2y$10$5fSkqGXIT1.apsTicHQbwOAlZd8wkB0vSn3aEcTHgQ0driTysUJ62', '2021-05-28 17:34:29', 2, ''),
(7, 'lanlan22', 'spenceraustinmartin@gmail.com', '$2y$10$aKZKm1kvq1CHMqsjaR2LG.xyvgPCTrNUVxz9kqJ1ft1GwjlM7.XPW', '2021-05-28 17:35:52', 2, ''),
(8, 'admin10', 'austinma@hawaii.edu', '$2y$10$zHtcMUf9Vmgu7oFB/22Dbe4KtbAdZEX6omLCaR55/D3C97KFqAu1y', '2021-05-28 17:36:39', 2, ''),
(9, 'Lanlanlan', 'lan@gmail.com', '$2y$10$mkaU.KrADYNMLN0L/la6v.VhPDQDcDZCcsBFmQAXtBHm610nyBGJC', '2021-05-28 17:37:10', 2, ''),
(10, 'admin444', 'austinma@hawaii.edu', '$2y$10$gc9oXn1mhk/NdnVA1R3M1uybhKCZVFkwYxGs1j9lHmcky9FSPVLJ2', '2021-05-28 17:37:40', 2, ''),
(11, 'Troll2021', 'austinma@hawaii.edu', '$2y$10$FGYkfzXIyhdZ0cz9s9LmOOYQfn7Xsp61yzYe9Q3iZ3thDCR3BDELa', '2021-06-05 16:17:35', 2, ''),
(12, 'TrollMaster', 'austinma@hawaii.edu', '$2y$10$J4E5Z5MtCvI5YgPtLx8J1OZHpQXv/J1ZDYlDgE6JB6PfB872xrY6K', '2021-06-30 18:57:16', 2, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=159;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
