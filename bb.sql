-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 05 2019 г., 14:53
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
  `name` varchar(1000) DEFAULT NULL,
  `active` varchar(255) DEFAULT NULL,
  `id_type` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `about`
--

INSERT INTO `about` (`id`, `sort`, `name`, `active`, `id_type`) VALUES
(7, 10, 'Практический опыт показывает, что социально-экономическое развитие играет важную роль в формировании направлений прогрессивного развития? Не следует, однако, о том, что постоянный количественный рост и сфера нашей активности требует определения и уточнения форм воздействия!', 'Y', 4),
(28, 100, 'Финансовое моделирование и аудит моделей', 'Y', 1),
(29, 200, 'Сопровождение инвестпроектов и сделок M&A', 'Y', 1),
(30, 300, 'Получение субсидий и государственных льгот', 'Y', 1),
(31, 400, 'Защита запасов и экспертиза проектов недропользователей', 'Y', 1),
(32, 500, 'Обучение и тренинги', 'Y', 1),
(33, 600, 'Управленческий учет, бюджетирование', 'Y', 1),
(34, 100, 'BiFwD1R99wq6u1xJAKOM.jpg', 'Y', 3),
(35, 200, 'el9GB36LpJyT7upySBaU.jpg', 'Y', 3),
(36, 300, 'RyJIAikDNDZd8he4ATi1.jpg', 'Y', 3),
(37, 100, 'Z6YPhOkazQ8EJA6kmRPG.jpg', 'Y', 2),
(38, 200, 'NY3SjaNSD4GAvyPMPuk0.jpg', 'Y', 2),
(39, 300, 'RLmx5yemNY8IE950ini9.jpg', 'Y', 2);

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
(3, 'partner'),
(4, 'desc');

-- --------------------------------------------------------

--
-- Структура таблицы `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `picture` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `clients`
--

INSERT INTO `clients` (`id`, `name`, `picture`) VALUES
(11, '&laquo;VIY Investment Fund&raquo;', 'MhnWEGrmvmGqbKeD7fN3.jpg'),
(12, '&laquo;ЕВРАЗ&raquo; и консорциум банков из ТОП-5 в РФ', 'jani9uEjUIYbJu699LjO.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `sort` int(3) DEFAULT NULL,
  `telephone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `id_Team` int(11) DEFAULT NULL,
  `active` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `contacts`
--

INSERT INTO `contacts` (`id`, `sort`, `telephone`, `email`, `description`, `id_Team`, `active`) VALUES
(3, 100, '+7 (916) 804 - 27 - 97', 'info@bbconsulting.ru', NULL, 8, 'Y');

-- --------------------------------------------------------

--
-- Структура таблицы `form_contact`
--

CREATE TABLE `form_contact` (
  `id` int(12) NOT NULL,
  `view` varchar(1) NOT NULL DEFAULT 'N',
  `phone` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `comment` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `positions`
--

CREATE TABLE `positions` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `code` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `positions`
--

INSERT INTO `positions` (`id`, `name`, `code`) VALUES
(1, 'Управляющие партнеры', 'boss'),
(2, 'Эксперты', 'expert'),
(3, 'Консультанты', 'consult');

-- --------------------------------------------------------

--
-- Структура таблицы `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `sort` int(3) DEFAULT NULL,
  `active` varchar(1) NOT NULL,
  `id_Service` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `goal` varchar(255) DEFAULT NULL,
  `time` varchar(255) DEFAULT NULL,
  `id_Clients` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `projects`
--

INSERT INTO `projects` (`id`, `sort`, `active`, `id_Service`, `name`, `goal`, `time`, `id_Clients`) VALUES
(1, 10, 'Y', NULL, 'Оценка стоимости золотодобывающего актива и разработка сценарных финансово-экономических моделей развития объекта', 'Получение оценки стоимости и перспектив развития Актива', '5 мес.', NULL),
(5, 50, 'Y', NULL, '213qweqweqweАудит финансово-экономических моделей активов для интеграции в единую систему их развития финансово-экономических моделей развития объекта', '6eqwewПол3213учение заключения о досqтоверности и полноте данных в финансово-экономических моделях', '6 wqeмес.2131', NULL),
(6, 10, 'Y', NULL, 'Оцasdенка стоимости золотодобывающего актива и разработка сценарных финансово-экономических моделей развития объекта', 'Получение оценки стоимости и перспектив развития Актива', '5 мес.', NULL),
(10, 50, 'Y', NULL, '21fgf3qweqweqweАудит финансово-экономических моделей активов для интеграции в единую систему их развития финансово-экономических моделей развития объекта', '6eqwewПол3213учение заключения о досqтоверности и полноте данных в финансово-экономических моделях', '6 wqeмес.2131', NULL),
(11, 10, 'Y', NULL, 'Оцasdенка стоимости золотодобывающего актива и разработка сценарных финансово-экономических моделей развития объекта', 'Получение оценки стоимости и перспектив развития Актива', '5 мес.', NULL),
(15, 50, 'Y', NULL, '21fgf3qweqweqweАудит финансово-экономических моделей активов для интеграции в единую систему их развития финансово-экономических моделей развития объекта', '6eqwewПол3213учение заключения о досqтоверности и полноте данных в финансово-экономических моделях', '6 wqeмес.2131', NULL),
(16, 10, 'Y', NULL, 'Оцasdенка стоимости золотодобывающего актива и разработка сценарных финансово-экономических моделей развития объекта', 'Получение оценки стоимости и перспектив развития Актива', '5 мес.', NULL),
(20, 50, 'Y', NULL, '21fgf3qweqweqweАудит финансово-экономических моделей активов для интеграции в единую систему их развития финансово-экономических моделей развития объекта', '6eqwewПол3213учение заключения о досqтоверности и полноте данных в финансово-экономических моделях', '6 wqeмес.2131', NULL),
(21, 321, 'N', NULL, 'kdjfb', 'kjdbfj', 'bdfjhb', NULL),
(26, 100, 'Y', 19, 'Оценка стоимости золотодобывающего актива и разработка сценарных финансово-экономических моделей развития объекта', 'Получение оценки стоимости и перспектив развития Актива', '5 мес', 11),
(27, 200, 'Y', 19, 'Аудит финансово-экономических моделей активов для интеграции в единую систему их развития финансово-экономических моделей развития объекта', 'Получение заключения о достоверности и полноте данных в финансово-экономических моделях', '5 мес', 12),
(28, 100, 'Y', 20, 'Для примера', '', '', 11);

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

--
-- Дамп данных таблицы `project_items`
--

INSERT INTO `project_items` (`id`, `sort`, `name`, `id_Projects`, `id_Project_items_type`) VALUES
(83, 23, 'ghj', NULL, 1),
(84, 34, '34', NULL, 2),
(85, 100, 'йцуйцу', NULL, 1),
(86, 100, 'аааа', NULL, 1),
(87, 100, 'аааа', NULL, 2),
(88, 100, 'раб', NULL, 1),
(89, 100, 'рез ', NULL, 2),
(93, 100, 'Комплексных анализ технико-экономических параметров объекта', 26, 1),
(94, 200, 'Аудит и корректировка расчетных алгоритмов и структуры имеющейся финансово-экономический модели (ФЭМ)', 26, 1),
(95, 300, 'Подготовка ФЭМ для двух сценариев реализации Проекта', 26, 1),
(96, 400, 'Незавимисый аудит экономического раздела отчета о подсчетах запасов, выдача замечаний и корректировок к заложенным в расчеты предпосылок', 26, 1),
(97, 100, 'Выполнены аудит и корректировка существующей финансово-экономической модели Проекта в части корректировка расчетов и логики построения модели', 26, 2),
(98, 200, 'Подготовлена многосценарная ФЭМ для представления внешнему инвестору или потенциальному кредитору', 26, 2),
(99, 300, 'Произведена оценка стоимости актива на основе мультипликаторов, объектов аналогов и DCS-анализа', 26, 2),
(100, 400, 'Заказчику предоставлен отчет с рекомендациями по оптимизации ключевых финансово-экономических параметров объекта для повышения инвестиционной привлекательности актива', 26, 2),
(101, 100, 'Комплексный анализ текущих моделей по шахтам и фабрикам', 27, 1),
(102, 200, 'Оценка структуры себестоимости выручки', 27, 1),
(103, 300, 'Аудит инвестиционной стратегии Холдинга', 27, 1),
(104, 400, 'Подготовка заключения о корректности и достоверности финансово-экономических моделей шахт и фабрик', 27, 1),
(105, 100, 'Сформированы консолидированные отчетные формы по сводным показателям для Банков', 27, 2),
(106, 200, 'Проведен аудит финансово-экономических моделей', 27, 2),
(107, 300, 'Сформирован отчет об аудите и выданы рекомендации по оптимизации финансово-экономических моделей', 27, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `project_items_type`
--

CREATE TABLE `project_items_type` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `code` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `project_items_type`
--

INSERT INTO `project_items_type` (`id`, `name`, `code`) VALUES
(1, 'Выполненные работы', 'done'),
(2, 'Результаты работ', 'result');

-- --------------------------------------------------------

--
-- Структура таблицы `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `user_role_name` varchar(50) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `role`
--

INSERT INTO `role` (`id`, `user_role_name`, `name`) VALUES
(1, 'admin', 'Администратор'),
(2, 'manager', 'Менеджер'),
(3, 'user', 'Пользователь');

-- --------------------------------------------------------

--
-- Структура таблицы `service`
--

CREATE TABLE `service` (
  `id` int(11) NOT NULL,
  `sort` int(3) DEFAULT NULL,
  `active` varchar(1) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `picture` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `subtitle` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `service`
--

INSERT INTO `service` (`id`, `sort`, `active`, `name`, `picture`, `title`, `subtitle`) VALUES
(19, 100, 'Y', 'Финансовое моделирование и аудит моделей', 'udpR1WF9oN1a26XuE7tN.jpg', 'Оценка бизнеса и финансовое моделирование', 'Аудит финансовых моделей'),
(20, 200, 'Y', 'Сопровождение инвестпроектов и делок M&A', 'y8ZzkrHCNEcOI6cEtcMg.png', 'Заголовок для всплывающего окна', 'Подзаголовок для всплывающего окна'),
(21, 300, 'Y', 'Получение субсидий и государственных льгот', 'O28NNru588Ukk0Hvodc1.jpg', 'Заголовок для всплывающего окна', 'Подзаголовок для всплывающего окна'),
(22, 400, 'Y', 'Оценка запасов и экспертиза проектов недропользователей', 'P9CAdfrQ2DCAlhKVsdv4.jpg', 'Заголовок для всплывающего окна', 'Подзаголовок для всплывающего окна'),
(23, 500, 'Y', 'Обучение и тренинги', 'vDuXeQzTSmG3IgyZZ7bA.jpg', 'Заголовок для всплывающего окна', 'Подзаголовок для всплывающего окна'),
(24, 600, 'Y', 'Управленческий учет, бюджетирование', 'Q8zZsrfYhjjqt1s63igC.jpg', 'Заголовок для всплывающего окна', 'Подзаголовок для всплывающего окна');

-- --------------------------------------------------------

--
-- Структура таблицы `service_items`
--

CREATE TABLE `service_items` (
  `id` int(11) NOT NULL,
  `sort` int(3) DEFAULT NULL,
  `active` varchar(1) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `id_Service` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `service_items`
--

INSERT INTO `service_items` (`id`, `sort`, `active`, `name`, `id_Service`) VALUES
(31, 100, 'Y', 'ввв', NULL),
(32, 100, 'Y', 'аа', NULL),
(62, 100, 'Y', 'Разработка финансовых моделей инвестпроектов и развития бизнеса', 19),
(63, 200, 'Y', 'Экспертиза финансовых моделей', 19),
(64, 300, 'Y', 'Оценка стоимости проектов и предприятия', 19),
(65, 400, 'Y', 'Разработка ТЭО Инвестиций и Бизнес-планов', 19),
(66, 100, 'Y', '&laquo;Упаковка&raquo;  инвестпроектов', 20),
(67, 200, 'Y', 'Финансово-экономический Due Diligence', 20),
(68, 300, 'Y', 'Независимая комплексная экспертиза', 20),
(69, 400, 'Y', 'Оценка предложений по покупке, содействие в переговорах', 20),
(70, 500, 'Y', 'Оценка стоимости активов', 20),
(71, 100, 'Y', 'Разработка и сопровождение финмоделей для получения кредитов, госфинансирования и льгот', 21),
(72, 200, 'Y', 'Независимый финансовый аудит для банков', 21),
(73, 300, 'Y', 'Подготовка пакета документов для СПИК и финансирования Минпромторга', 21),
(74, 400, 'Y', 'Разработка моделей под требования ВЭБ', 21),
(75, 100, 'Y', 'Оценка ресурсной базы', 22),
(76, 200, 'Y', 'Технико-экономические аудиты', 22),
(77, 300, 'Y', 'ТЭР и ТЭО инвестиций для горной отрасли', 22),
(78, 400, 'Y', 'Технико-экономические расчета для ЦКР-ТПИ и других пользователей', 22),
(79, 100, 'Y', 'Корпоративное обучение', 23),
(80, 200, 'Y', 'Индивидуальные тренинги', 23),
(81, 300, 'Y', 'Практические кейсы по финансовому моделированию, инвестиционной оценке, бизнес-планированию, бюджетированию и т. д.', 23),
(82, 100, 'Y', 'Постановка управленческого учета', 24),
(83, 200, 'Y', 'Внедрение и автоматизация системы бюджетирования', 24),
(84, 300, 'Y', 'Разработка и внедрение методологии управления финансами', 24),
(85, 400, 'Y', 'Взаимоувязка систем производственной и финансовой отчетности', 24);

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
  `id_Positions` int(11) DEFAULT NULL,
  `picture` varchar(50) NOT NULL,
  `active` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `team`
--

INSERT INTO `team` (`id`, `sort`, `first_name`, `second_name`, `speciality`, `institution`, `id_Positions`, `picture`, `active`) VALUES
(8, 100, 'Александр', 'Билый', 'Специалист по построению ФЭМ', 'Выпускник вШЭ, финансист', 1, '0Qklxokz8GORGvSVVdSP.jpg', 'Y'),
(9, 200, 'Никита', 'Борисов', 'Специалист по построению ФЭМ', 'Выпускник вШЭ, финансист', 1, 'XIOPvPjhyc0cooNHOm13.jpg', 'Y'),
(10, 100, 'Иван', 'Иванов', 'Специалист по построению ФЭМ', 'Выпускник вШЭ, финансист', 2, '', 'Y'),
(11, 200, 'Иван', 'Иванов', 'Специалист по построению ФЭМ', 'Выпускник вШЭ, финансист', 2, '', 'Y'),
(12, 300, 'Иван', 'Иванов', 'Специалист по построению ФЭМ', 'Выпускник вШЭ, финансист', 3, '', 'Y'),
(13, 400, 'Иван', 'Иванов', 'Специалист по построению ФЭМ', 'Выпускник вШЭ, финансист', 3, '', 'Y');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  `session_id` varchar(50) DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `photo` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `session_id`, `first_name`, `last_name`, `photo`) VALUES
(1, 'admin', 'admin', 'gvdt58mau9kcd793hcrlfpoa90', 'Билый', 'Алесандр', 'Biliy.jpg'),
(2, 'manager', 'manager', '', NULL, NULL, NULL),
(3, 'user', 'user', '', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user_role`
--

INSERT INTO `user_role` (`id`, `id_user`, `id_role`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 3, 3);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_Team` (`id_Team`);

--
-- Индексы таблицы `form_contact`
--
ALTER TABLE `form_contact`
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
-- Индексы таблицы `role`
--
ALTER TABLE `role`
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
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_role` (`id_role`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `about`
--
ALTER TABLE `about`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT для таблицы `about_type`
--
ALTER TABLE `about_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `form_contact`
--
ALTER TABLE `form_contact`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT для таблицы `positions`
--
ALTER TABLE `positions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT для таблицы `project_items`
--
ALTER TABLE `project_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT для таблицы `project_items_type`
--
ALTER TABLE `project_items_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `service`
--
ALTER TABLE `service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT для таблицы `service_items`
--
ALTER TABLE `service_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT для таблицы `team`
--
ALTER TABLE `team`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `about`
--
ALTER TABLE `about`
  ADD CONSTRAINT `about_ibfk_1` FOREIGN KEY (`id_type`) REFERENCES `about_type` (`id`) ON DELETE SET NULL;

--
-- Ограничения внешнего ключа таблицы `contacts`
--
ALTER TABLE `contacts`
  ADD CONSTRAINT `contacts_ibfk_1` FOREIGN KEY (`id_Team`) REFERENCES `team` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `projects_ibfk_1` FOREIGN KEY (`id_Service`) REFERENCES `service` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `projects_ibfk_2` FOREIGN KEY (`id_Clients`) REFERENCES `clients` (`id`) ON DELETE SET NULL;

--
-- Ограничения внешнего ключа таблицы `project_items`
--
ALTER TABLE `project_items`
  ADD CONSTRAINT `project_items_ibfk_1` FOREIGN KEY (`id_Projects`) REFERENCES `projects` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `project_items_ibfk_2` FOREIGN KEY (`id_Project_items_type`) REFERENCES `project_items_type` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `service_items`
--
ALTER TABLE `service_items`
  ADD CONSTRAINT `service_items_ibfk_1` FOREIGN KEY (`id_Service`) REFERENCES `service` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `team`
--
ALTER TABLE `team`
  ADD CONSTRAINT `team_ibfk_1` FOREIGN KEY (`id_Positions`) REFERENCES `positions` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
