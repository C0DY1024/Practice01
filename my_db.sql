-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2023-06-01 03:37:16
-- 伺服器版本： 10.4.27-MariaDB
-- PHP 版本： 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `my_db`
--

-- --------------------------------------------------------

--
-- 資料表結構 `article`
--

CREATE TABLE `article` (
  `id` int(11) UNSIGNED NOT NULL COMMENT '文章 id',
  `title` varchar(30) NOT NULL DEFAULT '' COMMENT '標題',
  `category` varchar(50) NOT NULL DEFAULT '' COMMENT '分類',
  `content` text NOT NULL COMMENT '內文',
  `publish` tinyint(1) NOT NULL COMMENT '是否發布',
  `create_date` datetime NOT NULL COMMENT '建立日期',
  `modify_date` datetime DEFAULT NULL COMMENT '修改日期',
  `creater_id` int(11) DEFAULT NULL COMMENT '建立者id'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- 傾印資料表的資料 `article`
--

INSERT INTO `article` (`id`, `title`, `category`, `content`, `publish`, `create_date`, `modify_date`, `creater_id`) VALUES
(12, 'test', '新聞', 'test1', 1, '2023-05-27 01:19:16', '2023-06-01 03:06:13', 4);

-- --------------------------------------------------------

--
-- 資料表結構 `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL COMMENT '使用者id',
  `username` varchar(30) NOT NULL COMMENT '登⼊帳號',
  `password` varchar(100) NOT NULL COMMENT '使用者密碼',
  `name` varchar(30) NOT NULL COMMENT '名字'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- 傾印資料表的資料 `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `name`) VALUES
(4, 'test', '098f6bcd4621d373cade4e832627b4f6', 'test'),
(8, 'cody', '4a7d1ed414474e4033ac29ccb8653d9b', 'cody');

-- --------------------------------------------------------

--
-- 資料表結構 `works`
--

CREATE TABLE `works` (
  `id` int(11) NOT NULL COMMENT '作品 id',
  `intro` text NOT NULL COMMENT '簡介',
  `category` varchar(50) NOT NULL COMMENT '分類',
  `save_path` text NOT NULL COMMENT '路徑',
  `publish` tinyint(1) NOT NULL COMMENT '是否發布',
  `upload_date` datetime NOT NULL COMMENT '上傳時間',
  `create_user_id` int(11) NOT NULL COMMENT '誰上傳的(建⽴立者id)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- 傾印資料表的資料 `works`
--

INSERT INTO `works` (`id`, `intro`, `category`, `save_path`, `publish`, `upload_date`, `create_user_id`) VALUES
(35, 'test', '圖片', 'files/images/NCRimage.jpeg', 1, '2023-06-01 03:35:38', 4),
(36, 'test-video', '影片', 'files/videos/NCR_video.mp4', 0, '2023-06-01 03:36:09', 4);

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `works`
--
ALTER TABLE `works`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '文章 id', AUTO_INCREMENT=13;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '使用者id', AUTO_INCREMENT=9;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `works`
--
ALTER TABLE `works`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '作品 id', AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
