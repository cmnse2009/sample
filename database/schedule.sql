-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- ホスト: 127.0.0.1
-- 生成日時: 2021-07-07 11:03:23
-- サーバのバージョン： 10.4.18-MariaDB
-- PHP のバージョン: 8.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `cms`
--

--
-- テーブルのデータのダンプ `schedule`
--

INSERT INTO `schedule` (`id`, `schedule_name`, `s_start`, `s_end`, `s_list`, `play_flag`, `delete_flag`, `created_at`, `updated_at`) VALUES
(1, 'sample01', '2021-06-21 15:57:00', '2021-06-21 18:57:00', '{\"1\":\"v2\",\"2\":\"v4\"}', 0, 0, '2021-06-21 06:57:40', '2021-06-21 06:57:40'),
(2, 'sample02', '2021-06-22 15:08:00', '2021-06-22 15:10:00', '{\"1\":\"v2\",\"2\":\"v4\"}', 1, 0, '2021-06-21 06:58:02', '2021-06-22 06:03:48'),
(3, '0622', '2021-06-22 01:58:00', '2021-06-22 09:55:00', '{\"1\":\"v4\",\"2\":\"v2\",\"3\":\"v3\",\"4\":\"v4\"}', 1, 0, '2021-06-21 06:59:06', '2021-06-25 06:10:05'),
(4, '0000000001', '2021-06-22 14:00:00', '2021-06-22 16:00:00', '{\"1\":\"v4\",\"2\":\"v5\",\"3\":\"v2\"}', 1, 0, '2021-06-22 01:28:37', '2021-06-22 06:54:02'),
(5, '0623', '2021-06-23 10:30:00', '2021-06-23 23:30:00', '{\"1\":\"v5\",\"2\":\"v4\",\"3\":\"v1\"}', 0, 0, '2021-06-22 01:34:41', '2021-06-22 01:34:41'),
(6, 'test-a', '2021-06-22 14:35:00', '2021-06-22 15:49:00', '{\"1\":\"v3\",\"2\":\"v4\",\"3\":\"v2\"}', 1, 0, '2021-06-22 04:49:55', '2021-06-22 05:33:59'),
(7, 'aaaaaaa', '2021-06-22 14:50:00', '2021-06-22 14:56:00', '{\"1\":\"v2\",\"2\":\"v4\",\"3\":\"v3\"}', 1, 0, '2021-06-22 05:41:35', '2021-06-22 05:41:35');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;