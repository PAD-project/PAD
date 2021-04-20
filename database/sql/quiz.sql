-- Adminer 4.8.0 MySQL 8.0.23 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `Quiz`;
CREATE TABLE `Quiz` (
  `challenge` int NOT NULL,
  `outro` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `quiz_vraag` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `correct_antwoord` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `antwoorden` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `Quiz` (`challenge`, `outro`, `quiz_vraag`, `correct_antwoord`, `antwoorden`) VALUES
(0,	'What did you just do? You looked at the html code and within it you found a little piece of JavaScript which contained the username and password you needed. You couldn\'t just copy paste this though, because the data was obfuscated. So we used a deobfuscator to get the correct username and password.',	'How would you call this way of storing a username and password?',	'Hashing',	'The best way possible|Hardcoded|Obfuscation\n'),
(1,	'',	'',	'',	''),
(2,	'',	'',	'',	''),
(3,	'What did we just do? We used a program to find the password used by the user. How does this program work? It loads a dictionary of words commonly used for passwords, then it starts trying out every option in this list. When there is not a match it will try the next option until it reaches a match. The lessons learned in this challenge, 1 a password is not a lot of bits, so it is easy to calcite for a computer. 2 Never and we mean never use a password that is in a dictionary or commonly used, because those passwords are in the list of options that hackers will try out.',	'Is the following command a hydra command?\n\nhydra.exe -V -l admin -P .\\passlist.txt -s 8080 localhost http-post-form \"/bruteforce/bruteforce.php:username=admin&password=GIVEMETHE^PASS^&USERNAME?submit=Login:Wrong Password',	'True',	'False \n'),
(4,	'This challenge looked a lot like the one before it. But there are some significant differences, the previous challenge worked a lot faster but has the problem that your password must be in the list of possibilities. In this challenge it takes a lot more time because every option is being tried. But because it tries every option there possibly is, and there is the one thing we should narrow down. The length of your password dictates the amount of time needed to guess your password. Every character increases the time by square needed to calculate the answer.',	'With what you have just learned, what do you think is the safest password of the following options?',	'Th!sP4ssW!llN4RBYCR$CKED',	'IloveBritneySpears|Th!sP4ssW!llN4RBYCR$CKED|Abcdefghijklmnopquvwrstyz0123456789|ILOVEPIZZA\n'),
(5,	'',	'',	'',	''),
(6,	'',	'',	'',	''),
(7,	'',	'',	'',	''),
(8,	'',	'',	'',	'');

-- 2021-04-14 13:01:33
