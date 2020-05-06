-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 06 2020 г., 23:15
-- Версия сервера: 5.6.41
-- Версия PHP: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `typecodesite`
--

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Dota'),
(2, 'Counter Strike'),
(3, 'LoL'),
(4, 'Minecraft'),
(5, 'Garrys Mod');

-- --------------------------------------------------------

--
-- Структура таблицы `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `content` text NOT NULL,
  `category_id` int(255) DEFAULT '0',
  `datetime` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `posts`
--

INSERT INTO `posts` (`id`, `name`, `image`, `content`, `category_id`, `datetime`) VALUES
(1, 'Пост №1', 'https://aktur.com.ua/images/trips/dragobrat/600x150.jpg', '<p>\r\nLorem ipsum dolor sit, amet consectetur adipisicing elit. Aut, in? Obcaecati eveniet commodi facere quas odio modi corporis possimus, officiis numquam nostrum voluptate architecto itaque, nemo fuga? Ea, sit voluptatum.\r\n\r\n<b>Коля ЛОХ</b>\r\n\r\nLorem ipsum dolor sit, amet consectetur adipisicing elit. Aut, in? Obcaecati eveniet commodi facere quas odio modi corporis possimus, officiis numquam nostrum voluptate architecto itaque, nemo fuga? Ea, sit voluptatum.\r\nLorem ipsum dolor sit, amet consectetur adipisicing elit. Aut, in? Obcaecati eveniet commodi facere quas odio modi corporis possimus, officiis numquam nostrum voluptate architecto itaque, nemo fuga? Ea, sit voluptatum.\r\n</p>', 1, 1545519167),
(2, 'Пост №2', 'https://aktur.com.ua/images/trips/voskhozhdenie-na-khomyak-bukovel/600x150.jpg', '<p>\r\nLorem ipsum dolor sit, amet consectetur adipisicing elit. Aut, in? Obcaecati eveniet commodi facere quas odio modi corporis possimus, officiis numquam nostrum voluptate architecto itaque, nemo fuga? Ea, sit voluptatum.<br>\r\nLorem ipsum dolor sit, amet consectetur adipisicing elit. Aut, in? Obcaecati eveniet commodi facere quas odio modi corporis possimus, officiis numquam nostrum voluptate architecto itaque, nemo fuga? Ea, sit voluptatum.\r\n\r\n</p>', 2, 1545519167);

-- --------------------------------------------------------

--
-- Структура таблицы `subscribers`
--

CREATE TABLE `subscribers` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `code` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `subscribers`
--

INSERT INTO `subscribers` (`id`, `email`, `status`, `code`) VALUES
(2, 'vedmedenko.nikita356@gmail.com', 0, 'S5WHW7Cq'),
(4, 'vedmedenko.nikita345@gmail.com', 0, 'dt0o9Jp'),
(5, 'vedmedenko228@mail.ru', 0, '5t5vtJ4'),
(6, 'vedmedenko.ua@mail.ru', 0, '2OCsvOQw');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
