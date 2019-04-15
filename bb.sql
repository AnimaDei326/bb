-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Апр 15 2019 г., 23:58
-- Версия сервера: 5.7.21-20-beget-5.7.21-20-1-log
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
-- База данных: `animadqu_bb`
--

-- --------------------------------------------------------

--
-- Структура таблицы `about`
--
-- Создание: Апр 03 2019 г., 21:26
-- Последнее обновление: Апр 03 2019 г., 21:32
--

DROP TABLE IF EXISTS `about`;
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
(1, 10, 'Финансовое моделирование и аудит моделей', 'Y', 1),
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
-- Создание: Апр 03 2019 г., 21:26
-- Последнее обновление: Апр 03 2019 г., 21:26
--

DROP TABLE IF EXISTS `about_type`;
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
-- Создание: Апр 03 2019 г., 21:26
-- Последнее обновление: Апр 03 2019 г., 21:26
--

DROP TABLE IF EXISTS `clients`;
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
-- Создание: Апр 03 2019 г., 21:26
-- Последнее обновление: Апр 03 2019 г., 21:26
--

DROP TABLE IF EXISTS `contacts`;
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
(1, 30, '+7 (916) 804 27 97', 'info@bbconsulting.ru', 'Обсудить новый проект', 1, 'Y'),
(2, 20, '+7 (916) 804 27 97', 'info@bbconsulting.ru', 'Получить методологическую консультацию', 2, 'Y');

-- --------------------------------------------------------

--
-- Структура таблицы `positions`
--
-- Создание: Апр 03 2019 г., 21:26
-- Последнее обновление: Апр 03 2019 г., 21:26
--

DROP TABLE IF EXISTS `positions`;
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
-- Создание: Апр 03 2019 г., 21:26
-- Последнее обновление: Апр 03 2019 г., 21:48
--

DROP TABLE IF EXISTS `projects`;
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
(5, 50, 'Y', 5, '213qweqweqweАудит финансово-экономических моделей активов для интеграции в единую систему их развития финансово-экономических моделей развития объекта', '6eqwewПол3213учение заключения о досqтоверности и полноте данных в финансово-экономических моделях', '6 wqeмес.2131', 1),
(6, 10, 'Y', 2, 'Оцasdенка стоимости золотодобывающего актива и разработка сценарных финансово-экономических моделей развития объекта', 'Получение оценки стоимости и перспектив развития Актива', '5 мес.', 1),
(7, 20, 'Y', 1, 'Аdsудит финансово-экономических моделей активов для интеграции в единую систему их развития финансово-экономических моделей развития объекта', 'Получение заключения о достоверности и полноте данных в финансово-экономических моделях', '5 мес.', 2),
(8, 30, 'Y', 1, '6Аfgdfудит финансово-экономических моделей активов для интеграции в единую систему их развития финансово-экономических моделей развития объекта', '6Получение заключения о достоверности и полноте данных в финансово-экономических моделях', '6 мес.', 2),
(9, 40, 'Y', 3, '213Аasdудит финансово-экономических моделей активов для интеграции в единую систему их развития финансово-экономических моделей развития объекта', '6Пол3213учение заключения о достоверности и полноте данных в финансово-экономических моделях', '6 мес.2131', 2),
(10, 50, 'Y', 5, '21fgf3qweqweqweАудит финансово-экономических моделей активов для интеграции в единую систему их развития финансово-экономических моделей развития объекта', '6eqwewПол3213учение заключения о досqтоверности и полноте данных в финансово-экономических моделях', '6 wqeмес.2131', 1),
(11, 10, 'Y', 4, 'Оцasdенка стоимости золотодобывающего актива и разработка сценарных финансово-экономических моделей развития объекта', 'Получение оценки стоимости и перспектив развития Актива', '5 мес.', 1),
(12, 20, 'Y', 6, 'Аdsудит финансово-экономических моделей активов для интеграции в единую систему их развития финансово-экономических моделей развития объекта', 'Получение заключения о достоверности и полноте данных в финансово-экономических моделях', '5 мес.', 2),
(13, 30, 'Y', 1, '6Аfgdfудит финансово-экономических моделей активов для интеграции в единую систему их развития финансово-экономических моделей развития объекта', '6Получение заключения 4 достоверности и полноте данных в финансово-экономических моделях', '6 мес.', 2),
(14, 40, 'Y', 4, '213Аasdудит финансово-экономических моделей активов для интеграции в единую систему их развития финансово-экономических моделей развития объекта', '6Пол3213учение заключения о достоверности и полноте данных в финансово-экономических моделях', '6 мес.2131', 2),
(15, 50, 'Y', 6, '21fgf3qweqweqweАудит финансово-экономических моделей активов для интеграции в единую систему их развития финансово-экономических моделей развития объекта', '6eqwewПол3213учение заключения о досqтоверности и полноте данных в финансово-экономических моделях', '6 wqeмес.2131', 1),
(16, 10, 'Y', 3, 'Оцasdенка стоимости золотодобывающего актива и разработка сценарных финансово-экономических моделей развития объекта', 'Получение оценки стоимости и перспектив развития Актива', '5 мес.', 1),
(17, 20, 'Y', 6, 'Аdsудит финансово-экономических моделей активов для интеграции в единую систему их развития финансово-экономических моделей развития объекта', 'Получение заключения о достоверности и полноте данных в финансово-экономических моделях', '5 мес.', 2),
(18, 30, 'Y', 3, '6Аfgdfудит финансово-экономических моделей активов для интеграции в единую систему их развития финансово-экономических моделей развития объекта', '6Получение заключения 4 достоверности и полноте данных в финансово-экономических моделях', '6 мес.', 2),
(19, 40, 'Y', 4, '213Аasdудит финансово-экономических моделей активов для интеграции в единую систему их развития финансово-экономических моделей развития объекта', '6Пол3213учение заключения о достоверности и полноте данных в финансово-экономических моделях', '6 мес.2131', 2),
(20, 50, 'Y', 2, '21fgf3qweqweqweАудит финансово-экономических моделей активов для интеграции в единую систему их развития финансово-экономических моделей развития объекта', '6eqwewПол3213учение заключения о досqтоверности и полноте данных в финансово-экономических моделях', '6 wqeмес.2131', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `project_items`
--
-- Создание: Апр 03 2019 г., 21:26
-- Последнее обновление: Апр 03 2019 г., 21:52
--

DROP TABLE IF EXISTS `project_items`;
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
(24, 30, 'Сф123ормирован отчет об аудите и выданы рекомендации по оптимизации финансово-экономических моделей', 4, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `project_items_type`
--
-- Создание: Апр 03 2019 г., 21:26
-- Последнее обновление: Апр 03 2019 г., 21:26
--

DROP TABLE IF EXISTS `project_items_type`;
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
-- Создание: Апр 03 2019 г., 21:26
-- Последнее обновление: Апр 03 2019 г., 21:26
--

DROP TABLE IF EXISTS `role`;
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
-- Создание: Апр 03 2019 г., 21:26
-- Последнее обновление: Апр 09 2019 г., 10:52
--

DROP TABLE IF EXISTS `service`;
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
(1, 10, 'Y', 'Финансовое моделирование и аудит моделей', 'service1.jpg', 'titl12e', 'subti123tle'),
(2, 20, 'Y', 'Сопровождение инвестпроектом и сделов M&A', 'service2.jpg', 'ti12tle', 'subewrwertitle'),
(3, 30, 'Y', 'Получение субсидий и государственных льгот', 'service3.jpg', 'titqwele', 'sub45t34r23title'),
(4, 40, 'Y', 'Оценка запасов и экспертиза проектов недропользователей', 'service4.jpg', 'title', 'subtitle'),
(5, 50, 'Y', 'Обучение и тренинги', 'W2knGz55bu8HCQ15kVny.', 'title', 'subtitle'),
(6, 60, 'Y', 'Управленческий учет, бюджетирование', 'service6.jpg', 'title', 'subtitle');

-- --------------------------------------------------------

--
-- Структура таблицы `service_items`
--
-- Создание: Апр 03 2019 г., 21:26
-- Последнее обновление: Апр 09 2019 г., 10:52
--

DROP TABLE IF EXISTS `service_items`;
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
-- Создание: Апр 03 2019 г., 21:26
-- Последнее обновление: Апр 03 2019 г., 21:26
--

DROP TABLE IF EXISTS `team`;
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
(1, 30, 'Александр!', 'Билый', 'Специалист по построению ФЭМ', 'Выпускник вШЭ, финансист', 1, 'Biliy.jpg', 'Y'),
(2, 20, 'Никита', 'Борисов', 'Специалист по построению ФЭМ', 'Выпускник вШЭ, финансист', 1, 'Borisov.jpg', 'Y'),
(3, 70, 'Андрей', 'Яблонский', 'Мега-человек', 'Горные работы', 2, '', 'Y'),
(4, 80, 'Аленка', 'Цыбырина', 'Понабрали', 'По объявлению', 2, '', 'Y'),
(5, 90, 'Ленка', 'Бартко', 'Понабрали', 'По объявлению', 3, '', 'Y'),
(6, 100, 'Серега', 'Корогод', 'Понабрали', 'По объявлению', 3, '', 'Y'),
(7, 110, 'Дениска', 'Феоктистов', 'Понабрали', 'По объявлению', 3, '', 'Y');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--
-- Создание: Апр 03 2019 г., 21:26
-- Последнее обновление: Апр 15 2019 г., 20:30
--

DROP TABLE IF EXISTS `users`;
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
(1, 'admin', 'admin', '7ed42b6b65e6438e1c14e44bf90136f3', 'Билый', 'Алесандр', 'Biliy.jpg'),
(2, 'manager', 'manager', '', NULL, NULL, NULL),
(3, 'user', 'user', '', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `user_role`
--
-- Создание: Апр 03 2019 г., 21:26
-- Последнее обновление: Апр 03 2019 г., 21:26
--

DROP TABLE IF EXISTS `user_role`;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

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
-- AUTO_INCREMENT для таблицы `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  ADD CONSTRAINT `about_ibfk_1` FOREIGN KEY (`id_type`) REFERENCES `about_type` (`id`) ON DELETE SET NULL ;

--
-- Ограничения внешнего ключа таблицы `contacts`
--
ALTER TABLE `contacts`
  ADD CONSTRAINT `contacts_ibfk_1` FOREIGN KEY (`id_Team`) REFERENCES `team` (`id`) ON DELETE CASCADE ;

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
  ADD CONSTRAINT `project_items_ibfk_1` FOREIGN KEY (`id_Projects`) REFERENCES `projects` (`id`) ON DELETE CASCADE ,
  ADD CONSTRAINT `project_items_ibfk_2` FOREIGN KEY (`id_Project_items_type`) REFERENCES `project_items_type` (`id`) ON DELETE CASCADE ;

--
-- Ограничения внешнего ключа таблицы `service_items`
--
ALTER TABLE `service_items`
  ADD CONSTRAINT `service_items_ibfk_1` FOREIGN KEY (`id_Service`) REFERENCES `service` (`id`) ON DELETE CASCADE ;

--
-- Ограничения внешнего ключа таблицы `team`
--
ALTER TABLE `team`
  ADD CONSTRAINT `team_ibfk_1` FOREIGN KEY (`id_Positions`) REFERENCES `positions` (`id`) ON DELETE SET NULL ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
