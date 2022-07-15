-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- ホスト: 127.0.0.1
-- 生成日時: 2022 年 7 朁E15 日 07:11
-- サーバのバージョン： 10.4.22-MariaDB
-- PHP のバージョン: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `shop`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `dat_sales_product`
--

CREATE TABLE `dat_sales_product` (
  `code` int(11) NOT NULL,
  `seles_menber_code` int(11) NOT NULL,
  `code_product` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- テーブルの構造 `menber`
--

CREATE TABLE `menber` (
  `code` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `tel` varchar(20) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `menber`
--

INSERT INTO `menber` (`code`, `name`, `email`, `address`, `tel`, `password`) VALUES
(1, 'やまだ', 'test@test.co.jp', '茨城県神栖市', '0299950000', '098f6bcd4621d373cade4e832627b4f6'),
(2, '佐藤', 'test@docomo.ne.jp', '千葉県旭市', '0299950000', '098f6bcd4621d373cade4e832627b4f6'),
(3, '田中', 'test@icloud.com', '東京都', '09000000000', '098f6bcd4621d373cade4e832627b4f6'),
(7, '岩瀬', 'iwase@test.co.jp', '千葉県', '09000000000', '098f6bcd4621d373cade4e832627b4f6'),
(14, 'あ', 'aaa@test.co.jp', '千葉県', '09000000000', '098f6bcd4621d373cade4e832627b4f6');

-- --------------------------------------------------------

--
-- テーブルの構造 `mst_product`
--

CREATE TABLE `mst_product` (
  `code` int(11) NOT NULL,
  `category` varchar(10) NOT NULL,
  `name` varchar(30) NOT NULL,
  `price` int(11) NOT NULL,
  `gazou` varchar(30) NOT NULL,
  `explanation` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `mst_product`
--

INSERT INTO `mst_product` (`code`, `category`, `name`, `price`, `gazou`, `explanation`) VALUES
(3, '食品', 'シーチキン', 1500, 'シーチキンjpg.jpg', 'シーチキンマイルド×１２缶'),
(4, '食品', 'カロリーメイト', 2000, 'カロリーメイト.jpg', 'カロリーメイト×１０個'),
(5, '書籍', '気づけばプロ並みPHP 改訂版', 3000, 'PHP.jpg', '気づけばプロ並みPHP 改訂版--ゼロから作れる人になる!'),
(6, '書籍', 'ホームページ辞典 第6版', 2000, 'ホームページ辞典jpg.jpg', 'ホームページ辞典 第6版 HTML・CSS・JavaScript '),
(7, '日用品', 'サランラップ', 1000, 'サランラップ.jpg', 'サランラップ３本パック'),
(8, '日用品', 'ファブリーズ', 300, 'ファブリーズ.jpg', 'ファブリーズ消臭スプレー'),
(9, 'その他', '長財布', 15000, '長財布.jpg', '長財布'),
(10, 'その他', 'ビジネスバッグ', 5000, 'ビジネスバッグ.jpg', 'ビジネスバッグ'),
(13, '家電', 'arrowsU', 22000, 'スマホ.jpg', '誰でも使いこなせる。日本メーカーのあんしんスマホ。'),
(15, '家電', 'TV', 50000, 'テレビjpg.jpg', 'テレビです。'),
(28, '家電', 'スマホ', 50000, 'スマホ.jpg', 'スマホです。');

-- --------------------------------------------------------

--
-- テーブルの構造 `mst_staff`
--

CREATE TABLE `mst_staff` (
  `code` int(11) NOT NULL,
  `name` varchar(15) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `mst_staff`
--

INSERT INTO `mst_staff` (`code`, `name`, `password`) VALUES
(1, '岩瀬', '098f6bcd4621d373cade4e832627b4f6'),
(2, '田中', '098f6bcd4621d373cade4e832627b4f6'),
(4, '山田', '098f6bcd4621d373cade4e832627b4f6');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `dat_sales_product`
--
ALTER TABLE `dat_sales_product`
  ADD PRIMARY KEY (`code`);

--
-- テーブルのインデックス `menber`
--
ALTER TABLE `menber`
  ADD PRIMARY KEY (`code`);

--
-- テーブルのインデックス `mst_product`
--
ALTER TABLE `mst_product`
  ADD PRIMARY KEY (`code`);

--
-- テーブルのインデックス `mst_staff`
--
ALTER TABLE `mst_staff`
  ADD PRIMARY KEY (`code`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `dat_sales_product`
--
ALTER TABLE `dat_sales_product`
  MODIFY `code` int(11) NOT NULL AUTO_INCREMENT;

--
-- テーブルの AUTO_INCREMENT `menber`
--
ALTER TABLE `menber`
  MODIFY `code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- テーブルの AUTO_INCREMENT `mst_product`
--
ALTER TABLE `mst_product`
  MODIFY `code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- テーブルの AUTO_INCREMENT `mst_staff`
--
ALTER TABLE `mst_staff`
  MODIFY `code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
