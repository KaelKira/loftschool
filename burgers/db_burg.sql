-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Мар 02 2020 г., 20:27
-- Версия сервера: 5.6.43
-- Версия PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `db_burg`
--

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `adress` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `callback` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `adress`, `comment`, `payment`, `callback`) VALUES
(115, 23, 'Улица Тестовая,123к123 кв 123 этаж 123', 'НЕ ПЕРЕЗВАНИВАТЬ', 'on', 'Не звонить'),
(116, 23, 'Улица Тестовая,123к123 кв 123 этаж 123', 'GJPDJYBNY', 'on', 'Не звонить'),
(117, 23, 'Улица Тестовая,123к123 кв 123 этаж 123', 'Перезвонить', 'on', 'Перезвонить'),
(118, 23, 'Улица Тестовая,123к123 кв 123 этаж 123', 'Сдача ', 'on', 'Не звонить'),
(119, 23, 'Улица Тестовая,123к123 кв 123 этаж 123', 'Карта', 'on', 'Перезвонить'),
(120, 23, 'Улица Тестовая,123к123 кв 123 этаж 123', 'Карта', 'Оплата картой', 'Перезвонить'),
(121, 23, 'Улица Тестовая,123к123 кв 123 этаж 123', 'Сдача', 'Оплата картой', 'Перезвонить'),
(122, 23, 'Улица Тестовая,123к123 кв 123 этаж 123', 'Сдача', 'Оплата картой', 'Перезвонить'),
(123, 24, 'Улица 123,123к123 кв 123 этаж 123', 'Сдача', 'Оплата наличными', 'Перезвонить'),
(124, 25, 'Улица Тестовая,123к123 кв 123 этаж 123', 'Карта', 'Оплата картой', 'Не звонить'),
(125, 22, 'Улица Тестовая,23к1 кв 123 этаж 11', 'test', 'Оплата наличными', 'Перезвонить'),
(126, 22, 'Улица Тестовая,23к1 кв 123 этаж 11', 'test', 'Оплата наличными', 'Перезвонить'),
(127, 22, 'Улица Тестовая,23к1 кв 123 этаж 11', 'test', 'Оплата наличными', 'Перезвонить'),
(128, 22, 'Улица Тестовая,23к1 кв 123 этаж 11', 'test', 'Оплата наличными', 'Перезвонить'),
(129, 22, 'Улица Тестовая,23к1 кв 123 этаж 11', 'test', 'Оплата наличными', 'Перезвонить'),
(130, 22, 'Улица Тестовая,23к1 кв 123 этаж 11', 'test', 'Оплата наличными', 'Перезвонить'),
(131, 22, 'Улица Тестовая,23к1 кв 123 этаж 11', 'test', 'Оплата наличными', 'Перезвонить'),
(132, 22, 'Улица Тестовая,23к1 кв 123 этаж 11', 'test', 'Оплата наличными', 'Перезвонить');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_count` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `email`, `phone`, `total_count`, `name`) VALUES
(18, '1test@gmail.ru', '+7 (915) 111 11 1_', 2, 'тест'),
(19, '2test@gmail.ru', '+7 (915) 111 11 1_', 7, 'тест'),
(21, '', '', 3, ''),
(22, 'amatveev@avito.ru', '+7 (151) 516 51 65', 26, 'Матвеев Александр'),
(23, 'asdfasf@ya.ru', '+7 (123) 123 12 31', 13, 'Матвеев Александр'),
(24, '2123123@yan.ru', '+7 (111) 111 11 11', 1, 'Матвеев Александр'),
(25, 'kaelkira@gmail.com', '+7 (111) 111 11 11', 1, 'Матвеев Александр');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
