-- phpMyAdmin SQL Dump
-- version 2.11.11.3
-- http://www.phpmyadmin.net
--
-- ホスト: mysql1.php.xdomain.ne.jp
-- 生成時間: 2023 年 3 月 08 日 04:49
-- サーバのバージョン: 5.0.95
-- PHP のバージョン: 5.3.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- データベース: `fugraham_sns`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) unsigned NOT NULL auto_increment,
  `user_name` varchar(64) collate utf8_unicode_ci NOT NULL,
  `company_name` varchar(128) collate utf8_unicode_ci default NULL,
  `email` varchar(191) collate utf8_unicode_ci NOT NULL,
  `password` varchar(191) collate utf8_unicode_ci NOT NULL,
  `type` enum('public','admin') collate utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL default CURRENT_TIMESTAMP,
  `description` text collate utf8_unicode_ci,
  `profile_picture_path` text collate utf8_unicode_ci,
  PRIMARY KEY  (`user_id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- テーブルのデータをダンプしています `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `company_name`, `email`, `password`, `type`, `created_at`, `description`, `profile_picture_path`) VALUES
(1, 'Graham Kobayashi', NULL, 'kobayashigraham@icloud.com', '$2y$10$yBal8FCusH7QA.vFTAiMXOsviTo.EMV4e6wqIMWGLqiPPXxyrw6A2', 'public', '2023-02-27 22:21:47', NULL, NULL),
(2, 'Sota.hamaguchi', NULL, 's.hamaguchi@w-fu.com', '$2y$10$JjFcUe6k0IPzAFdLjhs5i.1sk.WKoz8xmpjZ0G96826cUwOitdaDG', 'admin', '2023-02-28 06:31:52', NULL, NULL),
(3, 'Adminer', 'FU', 'adminer@admin.com', '$2y$10$w.655b8mxfwh365KA8e85.rogxxrkXR1Egr3ukzGS9PCpPpCYPIAq', 'admin', '2023-03-01 20:17:11', NULL, NULL),
(4, 'tester', NULL, 'tester@test.com', '$2y$10$lTUftL99Wuk7ZwGVVFUZgOpjJh2EXs1hHZMt4p4WalZm5vys0RlEK', 'public', '2023-03-01 22:44:29', NULL, NULL),
(5, 'Mitsuda', NULL, 'manden2nd@gmail.com', '$2y$10$RQ8JjQTCaiHpXxl8.r8nzu6uwh4GU8NyiKwIQThxfmsBNTXfnhHy.', 'admin', '2023-03-07 19:26:53', NULL, NULL);
