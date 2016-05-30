-- phpMyAdmin SQL Dump
-- version 4.0.10
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3307
-- Время создания: Май 30 2016 г., 11:41
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
-- Структура таблицы `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `name` tinytext NOT NULL,
  `email` tinytext NOT NULL,
  `body` text NOT NULL,
  `status` tinytext NOT NULL,
  `address` tinytext NOT NULL,
  `phone` tinytext NOT NULL,
  `comment` tinytext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `name`, `email`, `body`, `status`, `address`, `phone`, `comment`) VALUES
(1, 0, 'cvncv', 'ncvnc@jhj.ru', 'a:1:{i:12;s:1:"1";}', 'NEW', '', '4534', ''),
(2, 0, 'ad', 'asgfas@fd.gfd', 'a:3:{i:6;s:1:"1";i:11;s:1:"1";i:12;s:1:"1";}', 'NEW', '', '4363', '');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `cat_id`, `name`, `body`, `price`, `product_code`, `picture`, `picture_small`, `currency`, `status`, `user_id`, `putdate`, `showhide`) VALUES
(2, 1, 'Asics Кроссовки', 'Кроссовки', '75', '2', '16_05_30_10_55_15.jpg', '', '', 'NEW', '1', '2016-05-18', 'show'),
(3, 1, 'Onitsuka Tiger', 'Krost', '12', '3', '16_05_30_10_56_43.jpg', '', '', 'NEW', '1', '2016-05-20', 'show'),
(6, 1, 'hbgkguluihy', '<p>228</p>\r\n', '5576585', '567', '14637290129.jpg', '', '', 'NEW', '1', '2016-05-20', 'show'),
(7, 1, 'juykfyuky', '<p>228</p>\r\n', '54645645', '6456456456', '14637291046.jpg', '', '', 'NEW', '1', '2016-05-20', 'show'),
(8, 3, 'petyan', '', '35', '55', '1464116642images.jpg', '', '', 'NEW', '1', '2016-05-24', 'show'),
(9, 1, 'ujyikiu', '', '55', '7', '1464116785MkX0DgX3WG4.jpg', '', '', 'NEW', '1', '2016-05-24', 'show'),
(10, 2, 'hgmkg', '', '777', '228', '1464119921VbIvdHDPZzY.jpg', '', '', 'NEW', '1', '2016-05-24', 'show'),
(11, 2, 'kugyuk', '', '666', '76', '1464152240fon7.jpg', '', '', 'NEW', '1', '2016-05-25', 'show'),
(12, 3, ',lojbh,ij', '', '77', '8', '1464152256fon3.jpg', '', '', 'NEW', '1', '2016-05-25', 'show'),
(13, 3, 'ghk,jk.j', '', '7687', '87', '14641522697.jpg', '', '', 'NEW', '1', '2016-05-25', 'show'),
(14, 2, 'g,khul', '', '7676', '76', '1464152282fon8.jpg', '', '', 'NEW', '1', '2016-05-25', 'show'),
(15, 1, 'Asics ', '', '65', '25', '16_05_30_10_58_27.jpg', '', '', 'NEW', '1', '2016-05-30', 'show'),
(16, 1, 'Конь', '', '54', '23', '16_05_30_11_04_42.jpg', '', '', 'NEW', '1', '2016-05-30', 'show'),
(19, 3, 'Майка Asics', '', '32', '42', '16_05_30_11_25_38.jpg', '', '', 'NEW', '1', '2016-05-30', 'show'),
(20, 2, 'Футболка', '', '43', '53', '16_05_30_11_26_10.jpg', '', '', 'NEW', '1', '2016-05-30', 'show'),
(21, 1, 'BMW 750i', '', '43', '53', '16_05_30_11_37_51.jpg', '', '', 'NEW', '1', '2016-05-30', 'show');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` tinytext NOT NULL,
  `password` tinytext NOT NULL,
  `name` tinytext NOT NULL,
  `blockunblock` enum('block','unblock') NOT NULL,
  `date_reg` date NOT NULL,
  `lastvisit` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `name`, `blockunblock`, `date_reg`, `lastvisit`) VALUES
(1, 're@fs.ru', '123', '123', 'unblock', '2016-05-16', '2016-05-30 10:27:15'),
(2, 're@fd.ru', '123', '123', 'unblock', '2016-05-16', '2016-05-16 10:21:16'),
(3, 're@fs.ru', 'name', '123', 'unblock', '2016-05-16', '2016-05-16 10:32:40'),
(4, 're@fs.ru', 'fga', '123', 'unblock', '2016-05-16', '2016-05-16 10:36:56');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
