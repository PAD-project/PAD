-- Adminer 4.8.0 MySQL 8.0.23 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

CREATE DATABASE `credentials_ENCRYPTED` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `credentials_ENCRYPTED`;

DROP TABLE IF EXISTS `credentials_ENCRYPTED`;
CREATE TABLE `credentials_ENCRYPTED` (
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `credentials_ENCRYPTED` (`username`, `password`) VALUES
('desperate_enuf',	'6b21b2958b3ce2043ac78b1c1dcda5fd'),
('stinky_pinky',	'e7ffec49eb01e2dab35c19fe5b6969a1'),
('bad_karma',	'd615e0078551be8111ad222380b2cdbc'),
('harry_hond',	'272d62ef9c9dea3932df1332436911fb'),
('olie_gopolie',	'bafd00e88d3bc2053298e90d6c1a32e3'),
('karel_kat',	'02634eff3c24742057ecacbee91c4bbd'),
('average_student',	'9246f080c855a69012707ab53489b921'),
('butt_smasher',	'90cc74d5256f614fc6658cf7942dadd9');

CREATE USER 'beeste_bende'@'%' IDENTIFIED BY 'ikhouvantennisballen';
GRANT SELECT ON `credentials\_ENCRYPTED`.* TO 'beeste_bende'@'%';
-- 2021-04-13 13:33:25
