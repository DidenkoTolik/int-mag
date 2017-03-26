-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Мар 26 2017 г., 22:17
-- Версия сервера: 5.6.35
-- Версия PHP: 7.0.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `super_mag`
--

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `sort_order` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `name`, `sort_order`, `status`) VALUES
(9, 'Bosh', 1, 1),
(10, 'DWT', 2, 1),
(11, 'DeWalt', 3, 1),
(12, 'Forte', 4, 1),
(13, 'Hitachi', 5, 1),
(14, 'Makita', 6, 1),
(15, 'Дніпро-М', 7, 1),
(16, 'Фіолєнт', 8, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `code` int(11) NOT NULL,
  `price` float NOT NULL,
  `availability` int(11) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `is_new` int(11) NOT NULL DEFAULT '0',
  `is_recommended` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `product`
--

INSERT INTO `product` (`id`, `name`, `category_id`, `code`, `price`, `availability`, `brand`, `image`, `description`, `is_new`, `is_recommended`, `status`) VALUES
(11, 'Bosch PSB 750 RCE', 9, 7581, 2618, 1, 'Bosch', '', 'дарная дрель Bosch PSB 750 RCE – высокопроизводительная дрель из новой серии компактных инструментов от компании Bosch, созданных с использованием новейших технологий. Продуманный, эргономичный дизайн делает эту функциональную дрель удобной и безопасной при выполнении всего широкого ряда задач и работы во всех режимах: сверления с ударом, стандартного сверления, а так же заворачивания шурупов.\r\n', 1, 0, 1),
(12, 'Bosch PSB 500 RE', 9, 7458, 1454, 1, 'Bosch ', '', 'Практичная ударная дрель Bosch PSB 500 RE отличается небольшим весом и компактным размером. Эта ударная дрель невероятно удобна в эксплуатации и может применяться для работы с деревом, металлом, камнем и другими материалами.\r\n', 1, 0, 1),
(13, 'Bosch PSB 450 RE', 9, 8554, 1450, 1, 'Bosch ', '', 'Практичная ударная дрель PSB 450 RE от компании Bosch, отличается небольшим весом и компактным размером. Эта ударная дрель невероятно удобна в эксплуатации и может применяться для работы с деревом, металлом, камнем и другими материалами.\r\n', 0, 0, 1),
(14, 'DWT SBM-1050 Т ', 10, 6523, 1460, 1, 'DWT', '', 'Ударные электродрели DWT служат для сверления отверстий в различных материалах. Переключатель режимов работы и регулятор скорости позволяют выбрать необходимый режим работы: с ударом — для сверления в твердых материалах, таких как бетон, кирпич. Без удара — для сверления в древесине, пластике, металле, а также для закручивания шурупов. Эта модель оборудована двухступенчатым редуктором.\r\n', 1, 0, 1),
(15, 'DWT SBM-780', 10, 6598, 860, 1, 'DWT', '', 'Ударная дрель DWT SBM-780 служит для сверления отверстий в различных материалах. Переключатель режимов работы и регулятор скорости позволяют выбрать необходимый режим работы: сверление с ударом — для сверления в твердых материалах, таких как бетон, кирпич, сверление без удара — для сверления в древесине, пластике, металле, а также для заворачивания шурупов.\r\n', 0, 0, 1),
(16, 'DWT BM-400C', 10, 6541, 535, 1, 'DWT', '', 'Дрели DWT предназначены для выполнения сверлильных работ в различных материалах: древесине, металлах, синтетических материалах и др. Эта модель имеет функцию реверса, электронную регулировку скорости, регулятор скорости, легкий вес, компактный дизайн и идеально подходит для выполнения сборочных работ.\r\n', 0, 0, 1),
(17, 'DeWalt D21441', 11, 1234, 6500, 1, 'DeWalt', '', 'Дрель DeWALT D21441 – предназначена для профессиональных работ по сверлению и заворачиванию саморезов.\r\n\r\nЭлектронная бесступенчатая регулировка скорости позволит справиться с самыми разнообразными материалами. Эргономичный дизайн, облегченный вес и отличная балансировка облегчают нагрузку при регулярном использовании. Дрель DeWALT D21441 прекрасно зарекомендовала себя в разнообразных материалах. Сверла можно менять легко и без ключа — благодаря быстрозажимному 13-мм патрону в цельнометаллическом корпусе.', 0, 0, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`) VALUES
(13, 'Віталій', 'wade003@mail.ru', '123456');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT для таблицы `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
