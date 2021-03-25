-- Adminer 4.8.0 MySQL 8.0.23 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

CREATE DATABASE `super_geheime_intel` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `super_geheime_intel`;

CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(64) NOT NULL,
  `password` varchar(256) NOT NULL,
  `challenge` tinyint NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `users` (`id`, `username`, `password`, `challenge`) VALUES
(1,	'admin',	'512fb371848e45a695df83f5506f08624327846a68a63b1e2802590c028812bc6fb2a2b5dbdbf37045d646885f0e571800d17756ddc9e1db5429aaa3a4929e36',	9),
(2,	'demo',	'8abf375537f0f4dee7ef440305f968a38ae2f2d6281622e2dabe9897a296d96036c18600bf58dcfcb4665350bc5f42b4a2194503d6e88f91101ec439b781f6bd',	0);

-- 2021-03-25 14:14:23