-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Мар 20 2022 г., 19:31
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
-- База данных: `user`
--

-- --------------------------------------------------------

--
-- Структура таблицы `user_data`
--

CREATE TABLE `user_data` (
  `Id` int NOT NULL,
  `Login` varchar(20) DEFAULT NULL,
  `Password` varchar(16) DEFAULT NULL,
  `Email` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `user_data`
--

INSERT INTO `user_data` (`Id`, `Login`, `Password`, `Email`) VALUES
(1, 'admin', 'admin', 'admin@gmail.com');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `user_data`
--
ALTER TABLE `user_data`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `Login` (`Login`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `user_data`
--
ALTER TABLE `user_data`
  MODIFY `Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
