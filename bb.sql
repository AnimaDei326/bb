-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Янв 29 2019 г., 18:01
-- Версия сервера: 5.7.23-log
-- Версия PHP: 7.0.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `bb`
--

-- --------------------------------------------------------

--
-- Структура таблицы `about`
--

CREATE TABLE `about` (
  `id` int(11) NOT NULL,
  `sort` int(3) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `active` varchar(255) DEFAULT NULL,
  `id_type` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `about`
--

INSERT INTO `about` (`id`, `sort`, `name`, `active`, `id_type`) VALUES
(1, 10, 'Финансовое моделирование и аудит моделей', 'Y', 1),
(2, 20, 'Сопровождение инвесторов и сделок M&A', 'Y', 1),
(3, 30, 'Получение субсидий и государственных льгот', 'Y', 1),
(4, 40, 'Защита запасов и экспертиза проектов', 'Y', 1),
(5, 50, 'Обучение и тренинги', 'Y', 1),
(6, 60, 'Управляющий учет, бюджетиирование', 'Y', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `about_type`
--

CREATE TABLE `about_type` (
  `id` int(11) NOT NULL,
  `type` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `about_type`
--

INSERT INTO `about_type` (`id`, `type`) VALUES
(1, 'text'),
(2, 'photo'),
(3, 'partner');

-- --------------------------------------------------------

--
-- Структура таблицы `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `sort` int(3) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `telephone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `positions`
--

CREATE TABLE `positions` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `sort` int(3) DEFAULT NULL,
  `id_Service` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `goal` varchar(255) DEFAULT NULL,
  `time` varchar(255) DEFAULT NULL,
  `id_Clients` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `project_items`
--

CREATE TABLE `project_items` (
  `id` int(11) NOT NULL,
  `sort` int(3) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `id_Projects` int(11) DEFAULT NULL,
  `id_Project_items_type` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `project_items_type`
--

CREATE TABLE `project_items_type` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `service`
--

CREATE TABLE `service` (
  `id` int(11) NOT NULL,
  `sort` int(3) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `picuture` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `service_items`
--

CREATE TABLE `service_items` (
  `id` int(11) NOT NULL,
  `sort` int(3) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `id_Service` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `team`
--

CREATE TABLE `team` (
  `id` int(11) NOT NULL,
  `sort` int(3) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `second_name` varchar(255) DEFAULT NULL,
  `speciality` varchar(255) DEFAULT NULL,
  `institution` varchar(255) DEFAULT NULL,
  `id_Positions` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_type` (`id_type`);

--
-- Индексы таблицы `about_type`
--
ALTER TABLE `about_type`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `positions`
--
ALTER TABLE `positions`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_Service` (`id_Service`),
  ADD KEY `id_Clients` (`id_Clients`);

--
-- Индексы таблицы `project_items`
--
ALTER TABLE `project_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_Projects` (`id_Projects`),
  ADD KEY `id_Project_items_type` (`id_Project_items_type`);

--
-- Индексы таблицы `project_items_type`
--
ALTER TABLE `project_items_type`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `service_items`
--
ALTER TABLE `service_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_Service` (`id_Service`);

--
-- Индексы таблицы `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_Positions` (`id_Positions`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `about`
--
ALTER TABLE `about`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `about_type`
--
ALTER TABLE `about_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `positions`
--
ALTER TABLE `positions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `project_items`
--
ALTER TABLE `project_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `project_items_type`
--
ALTER TABLE `project_items_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `service`
--
ALTER TABLE `service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `service_items`
--
ALTER TABLE `service_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `team`
--
ALTER TABLE `team`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `about`
--
ALTER TABLE `about`
  ADD CONSTRAINT `about_ibfk_1` FOREIGN KEY (`id_type`) REFERENCES `about_type` (`id`);

--
-- Ограничения внешнего ключа таблицы `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `projects_ibfk_1` FOREIGN KEY (`id_Service`) REFERENCES `service` (`id`),
  ADD CONSTRAINT `projects_ibfk_2` FOREIGN KEY (`id_Clients`) REFERENCES `clients` (`id`);

--
-- Ограничения внешнего ключа таблицы `project_items`
--
ALTER TABLE `project_items`
  ADD CONSTRAINT `project_items_ibfk_1` FOREIGN KEY (`id_Projects`) REFERENCES `projects` (`id`),
  ADD CONSTRAINT `project_items_ibfk_2` FOREIGN KEY (`id_Project_items_type`) REFERENCES `project_items_type` (`id`);

--
-- Ограничения внешнего ключа таблицы `service_items`
--
ALTER TABLE `service_items`
  ADD CONSTRAINT `service_items_ibfk_1` FOREIGN KEY (`id_Service`) REFERENCES `service` (`id`);

--
-- Ограничения внешнего ключа таблицы `team`
--
ALTER TABLE `team`
  ADD CONSTRAINT `team_ibfk_1` FOREIGN KEY (`id_Positions`) REFERENCES `positions` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
