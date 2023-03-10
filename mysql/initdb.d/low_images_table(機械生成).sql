-- phpMyAdmin SQL Dump
-- version 2.11.11.3
-- http://www.phpmyadmin.net
--
-- ホスト: mysql1.php.xdomain.ne.jp
-- 生成時間: 2023 年 2 月 28 日 02:21
-- サーバのバージョン: 5.0.95
-- PHP のバージョン: 5.3.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- データベース: `fugraham_sns`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `images`
--

DROP TABLE IF EXISTS `images`;
CREATE TABLE IF NOT EXISTS `images` (
  `image_id` int(10) unsigned NOT NULL auto_increment,
  `user_id` int(10) unsigned NOT NULL,
  `post_id` int(10) unsigned default NULL,
  `use_for` enum('post','prof') collate utf8_unicode_ci NOT NULL,
  `file_name` varchar(255) collate utf8_unicode_ci NOT NULL,
  `local_path` varchar(255) collate utf8_unicode_ci NOT NULL,
  `remote_path` varchar(255) collate utf8_unicode_ci NOT NULL,
  `description` varchar(140) collate utf8_unicode_ci default NULL,
  `uploaded_at` timestamp NOT NULL default CURRENT_TIMESTAMP,
  PRIMARY KEY  (`image_id`),
  UNIQUE KEY `remote_path` (`remote_path`),
  UNIQUE KEY `local_path` (`local_path`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=13 ;

--
-- テーブルのデータをダンプしています `images`
--

