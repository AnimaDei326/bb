-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Фев 08 2019 г., 20:19
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
(1, 10, 'Финансовое моделирование и аудит моделей!!', 'Y', 1),
(2, 20, 'Сопровождение инвесторов и сделок M&A', 'Y', 1),
(3, 30, 'Получение субсидий и государственных льгот', 'Y', 1),
(4, 40, 'Защита запасов и экспертиза проектов', 'Y', 1),
(5, 50, 'Обучение и тренинги', 'Y', 1),
(6, 60, 'Управляющий учет, бюджетиирование', 'Y', 1),
(7, 10, 'Практический опыт показывает, что социально-экономическое развитие играет важную роль в формировании направлений прогрессивного развития? Не следует, однако, о том, что постоянный количественный рост и сфера нашей активности требует определеня и уточнения форм воздействия!', 'Y', 4),
(8, 10, 'experience.jpg', 'Y', 2),
(9, 20, 'experience1.jpg', 'Y', 2),
(10, 30, 'experience2.jpg', 'Y', 2),
(11, 10, 'shaneko.jpg', 'Y', 3),
(12, 20, 'Prologics.jpg', 'Y', 3),
(13, 30, 'image007.jpg', 'Y', 3);

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
(1, '&laquo;VIY Investment Fund&raquo;', 'widget__1.jpg'),
(2, '&laquo;ЕВРАЗ&raquo; и консорциум банков из ТОП-5 в РФ', 'widget__2.jpg');

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
(1, 10, '+7 (916) 804 27 97', 'info@bbconsulting.ru', 'Обсудить новый проект', 1, 'Y'),
(2, 20, '+7 (916) 804 27 97', 'info@bbconsulting.ru', 'Получить методологическую консультацию', 2, 'Y');

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
(1, 10, 'Y', 1, 'Оценка стоимости золотодобывающего актива и разработка сценарных финансово-экономических моделей развития объекта', 'Получение оценки стоимости и перспектив развития Актива', '5 мес.', 1),
(2, 20, 'Y', 1, 'Аудит финансово-экономических моделей активов для интеграции в единую систему их развития финансово-экономических моделей развития объекта', 'Получение заключения о достоверности и полноте данных в финансово-экономических моделях', '5 мес.', 2),
(3, 30, 'Y', 2, '6Аудит финансово-экономических моделей активов для интеграции в единую систему их развития финансово-экономических моделей развития объекта', '6Получение заключения о достоверности и полноте данных в финансово-экономических моделях', '6 мес.', 2),
(4, 40, 'Y', 3, '213Аудит финансово-экономических моделей активов для интеграции в единую систему их развития финансово-экономических моделей развития объекта', '6Пол3213учение заключения о достоверности и полноте данных в финансово-экономических моделях', '6 мес.2131', 2),
(5, 50, 'Y', 5, '213qweqweqweАудит финансово-экономических моделей активов для интеграции в единую систему их развития финансово-экономических моделей развития объекта', '6eqwewПол3213учение заключения о досqтоверности и полноте данных в финансово-экономических моделях', '6 wqeмес.2131', 1);

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
(1, 10, 'Комплексный анализ технико-экономических параметров объекта', 1, 1),
(2, 20, 'Аудит и корректировка расчетных алгоритмов и структуры имеющейся финансово-экономической модели (ФЭМ)', 1, 1),
(3, 30, 'Подготовка ФЭМ для двух сценариев реализации Проекта', 1, 1),
(4, 40, 'Независимый аудит экономического раздела отчета о подсчетах запасов, выдача замечаний и корректировок к заложенным в расчеты предпосылок', 1, 1),
(5, 10, 'Выполнены аудит и корректировка существующей финансово-экономической модели Проекта в части корректности расчетов и логики построения модели', 1, 2),
(6, 20, 'Подготовлена многосценарная ФЭМ для представления внешнему инвестору или потенциальному кредитору', 1, 2),
(7, 30, 'Произведена оценка стоимости актива на основе мультипликаторов, объектов аналогов и DCF-анализа', 1, 2),
(8, 40, 'Заказчику предоставлен отчет с рекомендациями по оптимизации ключевых финансово-экономических параметров объекта для повышения инвестиционной привлекательности актива', 1, 2),
(9, 10, 'Комплексный анализ текущих модели по шахтам и фабрикам', 2, 1),
(10, 20, 'Оценка структуры себестоимости и выручки', 2, 1),
(11, 30, 'Аудит инвестиционной стратегии Холдинга', 2, 1),
(12, 40, 'Анализ модели внутригрупповых денежных потоков в динамике', 2, 1),
(13, 50, 'Подготовка заключения о корректности и достоверности Финансово-экономических моделей шахт и фабрик', 2, 1),
(14, 10, 'Сформированы консолидированные отчетные формы по сводным показателям для Банков', 2, 2),
(15, 20, 'Проведен аудит финансово-экономических моделей', 2, 2),
(16, 30, 'Сформирован отчет об аудите и выданы рекомендации по оптимизации финансово-экономических моделей', 2, 2),
(17, 10, 'К12омплексный анализ текущих модели по шахтам и фабрикам', 3, 1),
(18, 20, 'О123ценка структуры себестоимости и выручки', 3, 1),
(19, 30, 'Ау312дит инвестиционной стратегии Холдинга', 3, 1),
(20, 40, 'Ан23ализ модели внутригрупповых денежных потоков в динамике', 3, 1),
(21, 50, 'По123дготовка заключения о корректности и достоверности Финансово-экономических моделей шахт и фабрик', 2, 1),
(22, 10, '123Сформированы консолидированные отчетные формы по сводным показателям для Банков', 3, 2),
(23, 20, '123Проведен аудит финансово-экономических моделей', 3, 2),
(24, 30, 'Сф123ормирован отчет об аудите и выданы рекомендации по оптимизации финансово-экономических моделей', 3, 2);

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
-- Структура таблицы `service`
--

CREATE TABLE `service` (
  `id` int(11) NOT NULL,
  `sort` int(3) DEFAULT NULL,
  `active` varchar(1) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `picture` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `service`
--

INSERT INTO `service` (`id`, `sort`, `active`, `name`, `picture`) VALUES
(1, 10, 'Y', 'Финансовое моделирование и аудит моделей', 'service1.jpg'),
(2, 20, 'Y', 'Сопровождение инвестпроектом и сделов M&A', 'service2.jpg'),
(3, 30, 'Y', 'Получение субсидий и государственных льгот', 'service3.jpg'),
(4, 40, 'Y', 'Оценка запасов и экспертиза проектов недропользователей', 'service4.jpg'),
(5, 50, 'Y', 'Обучение и тренинги', 'service5.jpg'),
(6, 60, 'Y', 'Управленческий учет, бюджетирование', 'service6.jpg');

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
(1, 10, 'Y', 'Разработка финансовых моеделй инвестпроектов и развития бизнеса', 1),
(2, 20, 'Y', 'Экспертизза финансовых моделей', 1),
(3, 30, 'Y', 'Оценка стоимости проектов и предприятий', 1),
(4, 40, 'Y', 'Разработка ТЭО Инвестиций и Бизнес-планов', 1),
(5, 10, 'Y', '&laquo;Упаковка&raquo; инвестпроектов', 2),
(6, 20, 'Y', 'Финансово-экономический Due Diligence', 2),
(7, 30, 'Y', 'Независимая комплексная экспертиза', 2),
(8, 40, 'Y', 'Оценка предложений по покупке, содействие в переговорах', 2),
(9, 50, 'Y', 'Оценка стоимости активов', 2),
(10, 10, 'Y', 'Разработка и сопровождение финмоделей для получения кредитов, госфинансирования и льгот', 3),
(11, 20, 'Y', 'Независимый финансовый аудит для банков', 3),
(12, 30, 'Y', 'Подготовка пакета документов для СПИК и финансирования Минпромторга', 3),
(13, 40, 'Y', 'Разработка моделей под требования ВЭБ', 3),
(14, 10, 'Y', 'Оценка ресурсной базы', 4),
(15, 20, 'Y', 'Технико-экономические аудиты', 4),
(16, 30, 'Y', 'ТЭР и ТЭО инвестиций для горной отрасли', 4),
(17, 40, 'Y', 'Технико-экономические расчеты для ЦКР-ТПИ и других пользователей', 4),
(18, 10, 'Y', 'Корпоративное обучение', 5),
(19, 20, 'Y', 'Индивидуальные тренинги', 5),
(20, 30, 'Y', 'Практические кейсы по финансовому моделированю, инвестиционной оценке, бизнес-планированию, бюджетированию и т.д.', 5),
(21, 10, 'Y', 'Постановка управленческого учета', 6),
(22, 20, 'Y', 'Внедрение и автоматизация системы бюджетирования', 6),
(23, 30, 'Y', 'Разработка и внедрение методологии управления финансами', 6),
(24, 40, 'Y', 'Взаимоувязка систем производственной и финансовой отчетности', 6);

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
(1, 10, 'Александр!', 'Билый', 'Специалист по построению ФЭМ', 'Выпускник вШЭ, финансист', 1, 'Biliy.jpg', 'Y'),
(2, 20, 'Никита', 'Борисов', 'Специалист по построению ФЭМ', 'Выпускник вШЭ, финансист', 1, 'Borisov.jpg', 'Y'),
(3, 70, 'Андрей', 'Яблонский', 'Мега-человек', 'Горные работы', 2, '', 'Y'),
(4, 80, 'Аленка', 'Цыбырина', 'Понабрали', 'По объявлению', 2, '', 'Y'),
(5, 90, 'Ленка', 'Бартко', 'Понабрали', 'По объявлению', 3, '', 'Y'),
(6, 100, 'Серега', 'Корогод', 'Понабрали', 'По объявлению', 3, '', 'Y'),
(7, 110, 'Дениска', 'Феоктистов', 'Понабрали', 'По объявлению', 3, '', 'Y');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `about_type`
--
ALTER TABLE `about_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `positions`
--
ALTER TABLE `positions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `project_items`
--
ALTER TABLE `project_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT для таблицы `project_items_type`
--
ALTER TABLE `project_items_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `service`
--
ALTER TABLE `service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `service_items`
--
ALTER TABLE `service_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT для таблицы `team`
--
ALTER TABLE `team`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `about`
--
ALTER TABLE `about`
  ADD CONSTRAINT `about_ibfk_1` FOREIGN KEY (`id_type`) REFERENCES `about_type` (`id`);

--
-- Ограничения внешнего ключа таблицы `contacts`
--
ALTER TABLE `contacts`
  ADD CONSTRAINT `contacts_ibfk_1` FOREIGN KEY (`id_Team`) REFERENCES `team` (`id`);

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
