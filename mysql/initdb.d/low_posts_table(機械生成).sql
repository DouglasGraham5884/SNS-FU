-- phpMyAdmin SQL Dump
-- version 2.11.11.3
-- http://www.phpmyadmin.net
--
-- ホスト: mysql1.php.xdomain.ne.jp
-- 生成時間: 2023 年 2 月 28 日 02:26
-- サーバのバージョン: 5.0.95
-- PHP のバージョン: 5.3.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- データベース: `fugraham_sns`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `post_id` int(11) unsigned NOT NULL auto_increment,
  `user_id` int(11) unsigned NOT NULL,
  `user_name` varchar(64) collate utf8_unicode_ci NOT NULL,
  `title` varchar(32) collate utf8_unicode_ci NOT NULL,
  `message` text collate utf8_unicode_ci NOT NULL,
  `file_type_01` varchar(32) collate utf8_unicode_ci default NULL,
  `file_type_02` varchar(32) collate utf8_unicode_ci default NULL,
  `file_type_03` varchar(32) collate utf8_unicode_ci default NULL,
  `file_type_04` varchar(32) collate utf8_unicode_ci default NULL,
  `file_path_01` varchar(511) collate utf8_unicode_ci default NULL,
  `file_path_02` varchar(511) collate utf8_unicode_ci default NULL,
  `file_path_03` varchar(511) collate utf8_unicode_ci default NULL,
  `file_path_04` varchar(511) collate utf8_unicode_ci default NULL,
  `created_at` timestamp NOT NULL default CURRENT_TIMESTAMP,
  PRIMARY KEY  (`post_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=21 ;

--
-- テーブルのデータをダンプしています `posts`
--

