-- Adminer 4.8.0 MySQL 8.0.23 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `credentials_ENCRYPTED`;
CREATE TABLE `credentials_ENCRYPTED` (
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `credentials_ENCRYPTED` (`username`, `password`) VALUES
('5ffd0fb60306475563b9a1890b395f36',	'b13d4bb1aac47bc80625872301045025'),
('8a034eba2276afb3f95d2d1651a16a55',	'd51aa55bdc95869486149b9e029c3a64'),
('8899158445846b703defc362c35c43f0',	'59a9e477c8b5cd962746ec17f0bd2fa3'),
('4b93c9ac40c218a6b76c46b32e2692d1',	'272d62ef9c9dea3932df1332436911fb');

-- 2021-04-13 13:00:22
