-- phpMyAdmin SQL Dump
-- version 4.0.10
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3307
-- Время создания: Май 13 2016 г., 11:30
-- Версия сервера: 5.5.38-log
-- Версия PHP: 5.5.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `dedphp`
--

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` tinytext NOT NULL,
  `parent_id` int(11) NOT NULL,
  `showhide` enum('show','hide') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `name`, `parent_id`, `showhide`) VALUES
(1, 'Обувь', 0, 'show'),
(2, 'Одежда', 0, 'show'),
(3, 'Аксессуары', 0, 'show');

-- --------------------------------------------------------

--
-- Структура таблицы `maintexts`
--

CREATE TABLE IF NOT EXISTS `maintexts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` tinytext NOT NULL,
  `body` text NOT NULL,
  `url` tinytext NOT NULL,
  `lang` enum('Ru','En','De') NOT NULL DEFAULT 'Ru',
  `showhide` enum('show','hide') NOT NULL DEFAULT 'show',
  `putdate` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Дамп данных таблицы `maintexts`
--

INSERT INTO `maintexts` (`id`, `name`, `body`, `url`, `lang`, `showhide`, `putdate`) VALUES
(1, 'Обувь (выбранный раздел):', 'На нашем сайте можете ознакомится с товарами и выбрать из тех, которые находятся в наличии. Также можно оформить товар под заказ. В данном случае время доставки составит от 5 до 10 дней.', 'index', 'Ru', 'show', '2016-05-11'),
(2, 'Контакты', '+375 (29) 203-78-79<br>\r\n+375 (44) 753-78-79<br>\r\nre5s@mail.ru', 'contacts', 'Ru', 'show', '2016-05-11'),
(3, 'О компании', '<p>История компании ASICS началась в 1949 году в послевоенной Японии. Кихатиро Оницука (яп. 鬼塚 喜八郎) задумался, как он может помочь японской молодёжи в такое тяжелое для страны время. Решение пришло быстро, господин Оницука решил создать спортивный бренд для всех, чтобы с помощью спорта воодушевить своих сограждан. Так родилась фирма Onitsuka Tiger.</p><br>\r\n\r\n<p>В первое время своего существования компания поставляла товар только на внутренний рынок Японии, и этим воспользовались основатели корпорации Nike Фил Найт и Билл Бауэрман, закупая кроссовки и перепродавая их в США. В 1977 году после расширения компания Onitsuka Tiger была переименована в ASICS — аббревиатура от «Anima sana in corpore sano», что в переводе с латыни означает «В здоровом теле здоровый дух». </p>', 'about', 'Ru', 'show', '2016-05-11'),
(4, 'Вакансии', 'Высылайте Ваше резюме на почту re5s@mail.ru', 'vacancy', 'Ru', 'show', '2016-05-11');

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_id` int(11) NOT NULL,
  `name` tinytext NOT NULL,
  `body` text NOT NULL,
  `price` tinytext NOT NULL,
  `product_code` tinytext NOT NULL,
  `picture` tinytext NOT NULL,
  `picture_small` tinytext NOT NULL,
  `currency` tinytext NOT NULL,
  `status` tinytext NOT NULL,
  `user_id` tinytext NOT NULL,
  `putdate` date NOT NULL,
  `showhide` enum('show','hide') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
