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
-- テーブルの構造 `logs`
--

DROP TABLE IF EXISTS `logs`;
CREATE TABLE IF NOT EXISTS `logs` (
  `log_id` int(10) unsigned NOT NULL auto_increment,
  `user_id` smallint(5) unsigned default NULL,
  `user_name` varchar(64) collate utf8_unicode_ci default NULL,
  `action` enum('login','logout','insert','delete','update') collate utf8_unicode_ci NOT NULL,
  `target` enum('user','post','file') collate utf8_unicode_ci NOT NULL,
  `result` enum('success','fail') collate utf8_unicode_ci NOT NULL,
  `post_id` int(10) unsigned default NULL,
  `at` timestamp NOT NULL default CURRENT_TIMESTAMP,
  PRIMARY KEY  (`log_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=53 ;

--
-- テーブルのデータをダンプしています `logs`
--

