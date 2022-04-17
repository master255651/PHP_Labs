-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Мар 13 2022 г., 10:51
-- Версия сервера: 8.0.28
-- Версия PHP: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `library`
--

-- --------------------------------------------------------

--
-- Структура таблицы `elib`
--

CREATE TABLE `elib` (
  `Id` int NOT NULL,
  `Title` varchar(30) DEFAULT NULL,
  `Author` varchar(30) DEFAULT NULL,
  `Book_year` int DEFAULT NULL,
  `Publishing` varchar(30) DEFAULT NULL,
  `Subjects` text,
  `Price` int DEFAULT NULL,
  `Photo` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `elib`
--

INSERT INTO `elib` (`Id`, `Title`, `Author`, `Book_year`, `Publishing`, `Subjects`, `Price`, `Photo`) VALUES
(1, 'The Tempest', 'William Shakespeare', 1611, 'New Haven', 'The Tempest tells a fairly straightforward story involving an unjust act, the usurpation of Prosperos throne by his brother, and Prosperos quest to re-establish justice by restoring himself to power.', 32, 'Tempest.jpg'),
(2, 'The Tragedy of Macbeth', 'William Shakespeare', 1622, 'New Haven', 'A brave Scottish general named Macbeth receives a prophecy from a trio of witches that one day he will become King of Scotland. Consumed by ambition and spurred to action by his wife, Macbeth murders King Duncan and takes the Scottish throne for himself. ', 55, 'Macbeth.jpg'),
(3, 'The Tragedie of Julius Cæsar', 'William Shakespeare', 1613, 'New Haven', 'Julius Caesar is a tragedy, as it tells the story of an honorable hero who makes several critical errors of judgment by misreading people and events, leading to his own death and a bloody civil war that consumes his nation.', 77, 'Julius.jpg'),
(4, 'Hamlet', 'William Shakespeare', 1608, 'New Haven', 'Hamlet, written by William Shakespeare around 1600, is a tragedy that explores themes of friendship, madness, and revenge.', 44, 'Hamlet.jpg'),
(5, 'Much Ado About Nothing', 'William Shakespeare', 1609, 'Barrons Educational Services', 'There are many themes running through this comedy by Shakespeare, including love, confusion and the theme of nothing itself. In this story of crossed wires, hidden identities and feelings, honour and deceit, we are also presented with themes of friendship and marriage.', 54, 'About_Nothing.jpg'),
(6, 'King Lear', 'William Shakespeare', 1615, 'Barrons Educational Services', 'King Lear is about political authority as much as it is about family dynamics. Lear is not only a father but also a king, and when he gives away his authority to the unworthy and evil Goneril and Regan, he delivers not only himself and his family but all of Britain into chaos and cruelty.', 12, 'King.jpg'),
(7, 'The Merchant of Venice', 'William Shakespeare', 1605, 'Barrons Educational Services', 'Shakespeares The Merchant of Venice is a much loved – and studied – play, set in Venice, Italy. The main themes are justice, mercy, revenge, love, and friendship, and though much of the subject matter is rather dark, it is regarded as one of Shakespeares comedy plays.', 23, 'Merchant.jpg');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `elib`
--
ALTER TABLE `elib`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `elib`
--
ALTER TABLE `elib`
  MODIFY `Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
