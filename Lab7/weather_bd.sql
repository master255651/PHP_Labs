-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Фев 28 2022 г., 20:08
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
-- База данных: `weather_bd`
--

-- --------------------------------------------------------

--
-- Структура таблицы `weather_table`
--

CREATE TABLE `weather_table` (
  `Id` int NOT NULL,
  `DateOfDay` date DEFAULT NULL,
  `Temperature` int DEFAULT NULL,
  `Sign` varchar(20) DEFAULT NULL,
  `Speed` int DEFAULT NULL,
  `Direction` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `weather_table`
--

INSERT INTO `weather_table` (`Id`, `DateOfDay`, `Temperature`, `Sign`, `Speed`, `Direction`) VALUES
(1, '2022-03-05', 5, 'Sunny', 8, 'NE'),
(2, '2022-03-06', 8, 'Rainy', 16, 'NW'),
(3, '2022-03-07', 0, 'Cloudy', 2, 'NE'),
(4, '2022-03-08', 12, 'Sunny', 14, 'SE'),
(5, '2022-03-09', 4, 'Cloudy', 7, 'SW');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `weather_table`
--
ALTER TABLE `weather_table`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `weather_table`
--
ALTER TABLE `weather_table`
  MODIFY `Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
