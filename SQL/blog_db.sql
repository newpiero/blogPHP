-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Сен 27 2020 г., 10:34
-- Версия сервера: 10.4.13-MariaDB
-- Версия PHP: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `blog_db`
--

-- --------------------------------------------------------

--
-- Структура таблицы `articles`
--

CREATE TABLE `articles` (
  `id_article` int(10) UNSIGNED NOT NULL,
  `title` varchar(256) NOT NULL,
  `content` text NOT NULL,
  `date_creation_article` timestamp NOT NULL DEFAULT current_timestamp(),
  `id_category` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `articles`
--

INSERT INTO `articles` (`id_article`, `title`, `content`, `date_creation_article`, `id_category`) VALUES
(1, 'Как создать модуль на Drupal22233333', 'Тут мой текст на данную тему.3334444443', '2020-09-06 18:37:35', 0),
(2, 'Как натянуть верстку на CMS Drupal', 'Вот моя очередная статья на данную тематику', '2020-09-06 18:37:35', 0),
(3, 'Как стать программистом за 3 дня?', 'Тут текст данной веселенькой статьи', '2020-09-06 18:50:40', 0),
(4, 'Как стать программистом за 10 дней?', 'Тут текст данной веселенькой статьи. Новый текст', '2020-09-06 18:53:55', 0),
(5, 'Мой тестовый заголовок 1', 'Мой тестовый текст статьи 1', '2020-09-06 19:16:34', 2),
(6, 'Мой тестовый заголовок 2', 'Мой тестовый текст статьи 2', '2020-09-06 19:16:52', 3),
(7, 'Мой тестовый заголовок 3', 'Мой тестовый текст статьи 3', '2020-09-06 19:24:42', 4),
(8, 'Мой тестовый заголовок 3', 'Мой тестовый текст статьи 3', '2020-09-07 16:13:58', 1),
(9, 'Мой тестовый заголовок 3', 'Мой тестовый текст статьи 3', '2020-09-07 16:14:00', 2),
(10, 'ываываываыв', 'ывафываыафыаыфвпавыпвапавпвыпавыпавпвапвапвап', '2020-09-07 16:57:46', 4),
(11, 'апвпвапавпавпаа', 'вапыапывапвапвапвапвапывапывапывапвапвапвыапавпва', '2020-09-07 17:12:04', 0),
(12, 'апвпвапавпавпаа', 'вапыапывапвапвапвапвапывапывапывапвапвапвыапавпва', '2020-09-07 17:12:53', 1),
(13, 'выаыапвапвапвапвапвапв', 'выаываываыва', '2020-09-07 17:28:13', 2),
(14, '123444444444444', '555555555555555555555555', '2020-09-07 17:28:57', 1),
(16, 'test title', 'test content', '2020-09-07 18:49:30', 1),
(18, 'qqqqqqqqqqqqqqqqqqqq', 'qqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqq', '2020-09-20 16:31:28', 1),
(19, 'wwwwwwwwwwwwwwwwwwwwwww', 'wwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwww', '2020-09-20 16:46:37', 0),
(32, '2222222222222222222222222222', '222222222222222222222222222222', '2020-09-25 20:51:07', 0),
(33, '444444444444444444', 'dsfsdfsd', '2020-09-25 21:00:46', 6),
(34, '22333', '222333', '2020-09-25 21:03:21', 0),
(35, 'ывыавыа', 'ываываыва', '2020-09-26 08:02:13', 0),
(36, 'вавыаывавыа', 'выаываыва', '2020-09-26 16:20:39', 6),
(37, 'dhghgfhfgh', 'sfdgdfgdfg', '2020-09-26 19:22:05', 5),
(38, 'sdfdsfasdf', 'adsgfsgfdg', '2020-09-26 21:11:12', 6),
(39, 'dfsdfsdf', 'sdfsdafsdf', '2020-09-26 21:11:57', 6),
(40, 'dsfsdafdsfg', 'afsdfsdfsdf', '2020-09-26 21:12:56', 6);

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id_category` int(10) UNSIGNED NOT NULL,
  `name` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id_category`, `name`) VALUES
(5, 'Первая категория'),
(6, 'Вторая категория');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id_article`),
  ADD KEY `id_category` (`id_category`);

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id_category`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `articles`
--
ALTER TABLE `articles`
  MODIFY `id_article` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id_category` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
