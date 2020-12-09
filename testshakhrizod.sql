-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Дек 09 2020 г., 18:49
-- Версия сервера: 8.0.19
-- Версия PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `testshakhrizod`
--

-- --------------------------------------------------------

--
-- Структура таблицы `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1607511460),
('m201209_090428_products', 1607511461),
('m201209_091923_ware_enter', 1607511462),
('m201209_091931_ware_exit', 1607511463);

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` int NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `name`, `created_at`) VALUES
(1, 'Nitro 5', '2020-12-09 10:57:55');

-- --------------------------------------------------------

--
-- Структура таблицы `ware_enter`
--

CREATE TABLE `ware_enter` (
  `id` int NOT NULL,
  `product_id` int NOT NULL,
  `coming_price` int NOT NULL,
  `amount` int NOT NULL,
  `date` date NOT NULL,
  `number` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `ware_enter`
--

INSERT INTO `ware_enter` (`id`, `product_id`, `coming_price`, `amount`, `date`, `number`, `created_at`) VALUES
(2, 1, 123, 111, '2020-12-23', '123', '2020-12-09 11:01:48'),
(3, 1, 123, 121, '2020-12-09', '4555', '2020-12-09 11:43:58'),
(4, 1, 123, 123, '2020-12-09', '', '2020-12-09 11:44:13'),
(5, 1, 100, 123, '2020-12-09', '', '2020-12-09 11:44:19');

-- --------------------------------------------------------

--
-- Структура таблицы `ware_exit`
--

CREATE TABLE `ware_exit` (
  `id` int NOT NULL,
  `product_id` int NOT NULL,
  `sell_price` int NOT NULL,
  `amount` int NOT NULL,
  `date` date NOT NULL,
  `number` varchar(255) DEFAULT NULL,
  `ware_enter_id` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `ware_exit`
--

INSERT INTO `ware_exit` (`id`, `product_id`, `sell_price`, `amount`, `date`, `number`, `ware_enter_id`, `created_at`) VALUES
(8, 1, 1000, 2, '2020-12-09', '4555', 3, '2020-12-09 15:02:15');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `ware_enter`
--
ALTER TABLE `ware_enter`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `ware_exit`
--
ALTER TABLE `ware_exit`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `ware_enter`
--
ALTER TABLE `ware_enter`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `ware_exit`
--
ALTER TABLE `ware_exit`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
