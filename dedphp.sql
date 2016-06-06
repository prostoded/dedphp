-- phpMyAdmin SQL Dump
-- version 4.0.10
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3307
-- Время создания: Июн 06 2016 г., 11:38
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
-- Структура таблицы `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` tinytext NOT NULL,
  `email` tinytext NOT NULL,
  `area` text NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=142 ;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id`, `name`, `email`, `area`, `date`) VALUES
(138, '', '', '', '0000-00-00'),
(139, '', '', '', '2016-06-05'),
(140, '', '', '', '2016-06-05'),
(141, 'jh', 'jh@ds.gf', '<p>gf</p>\r\n', '2016-06-06');

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
(1, '', '<p>В 1949 году тогда Кихачиро Онитсука (Kihachiro Onitsuka) основал в японском городе Кобе компанию Onitsuka Co. — предшественника нынешней марки Asics. Он был мотивирован использованием спорта в качестве средства реабилитации несовершеннолетних после Второй мировой войны и хотел производить спортивную обувь для восходящих звезд японского баскетбола. Несмотря на то, что Кихачиро не хватало опыта в создании обуви, он с головой окунулся в изучение ее конструкции. Также он активно использовал идеи, взятые из других сфер жизни. Например, дизайн подошвы одной из моделей баскетбольных кроссовок от Онитсука вдохновлен щупальцами осьминога, а именно — присосками на них. </p>\r\n\r\n<p>Фактически, компания стала первым японским производителем баскетбольных кроссовок. На подошве первой модели, которая называлась «Bashu», была изображена голова тигра. Впоследствии это изображение превратилось в торговую марку, а сам бренд был известен под именем Onitsuka Tiger.</p>\r\n\r\n<p>С самого начала компания Onitsuka активно использовала инновации при изготовлении обуви. Так, первые волейбольные кроссовки марки, выпущенные в 1951 году, имели подошву из вулканизированной резины. Модель The Tiger Marathon Tabi также включила в себя ряд технологических новшеств, например, синтетическое волокно Vinylon, из которого была изготовлена верхняя часть кроссовок. Полоса, расположенная вдоль боковой части кроссовка, способствовала фиксации стопы.</p>', 'index', 'Ru', 'show', '2016-05-11'),
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `name`, `email`, `body`, `status`, `address`, `phone`, `comment`) VALUES
(1, 0, 'cvncv', 'ncvnc@jhj.ru', 'a:1:{i:12;s:1:"1";}', 'NEW', '', '4534', ''),
(2, 0, 'ad', 'asgfas@fd.gfd', 'a:3:{i:6;s:1:"1";i:11;s:1:"1";i:12;s:1:"1";}', 'NEW', '', '4363', ''),
(3, 0, 'vitya', 'sgrs@dsf.tu', 'a:0:{}', 'NEW', '', '', ''),
(4, 0, 'dsfsdf', 'sgrs@dsf.tu', 'a:0:{}', 'NEW', '', '', ''),
(5, 0, 'ddsd', 'df@ds.yt', 'a:0:{}', 'NEW', '', '', '');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=42 ;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `cat_id`, `name`, `body`, `price`, `product_code`, `picture`, `picture_small`, `currency`, `status`, `user_id`, `putdate`, `showhide`) VALUES
(22, 1, 'BADMINTON 68', '', '55', 'D533N-9999', '1464686870badminton.jpg', '', '', 'NEW', '1', '2016-05-31', 'show'),
(23, 1, 'ULTIMATE 81', '', '105', 'D520N-5001', '1464686918ultimate.jpg', '', '', 'NEW', '1', '2016-05-31', 'show'),
(24, 1, 'COLORADO EIGHTY-FIVE', '', '105', 'D514N-1301', '1464686958COLORADO EIGHTY-FIVE.jpg', '', '', 'NEW', '1', '2016-05-31', 'show'),
(25, 1, 'EDR 78', '', '105', 'D526L-9090', '1464687031EDR 78.jpg', '', '', 'NEW', '1', '2016-05-31', 'show'),
(26, 1, 'MEXICO 66', '', '105', 'D508N-9001', '1464687090presentation_1.jpg', '', '', 'NEW', '1', '2016-05-31', 'show'),
(27, 1, 'CURREO', '', '115', 'D4K3N-9004', '1464687144CURREO.jpg', '', '', 'NEW', '1', '2016-05-31', 'show'),
(28, 1, 'AARON', '', '115', 'D515N-0150', '1464687194AARON.jpg', '', '', 'NEW', '1', '2016-05-31', 'show'),
(29, 1, 'LAWNSHIP', '', '115', 'D516N-0101', '1464687250LAWNSHIP.jpg', '', '', 'NEW', '1', '2016-05-31', 'show'),
(30, 2, 'FASHION FIELD JACKET', '', '155', '122745-0904', '1464687302FASHION FIELD JACKET.jpg', '', '', 'NEW', '1', '2016-05-31', 'show'),
(31, 2, 'FASHION CHINO SHORT', '', '85', '122743-0330', '1464687347FASHION CHINO SHORT.jpg', '', '', 'NEW', '1', '2016-05-31', 'show'),
(32, 2, 'FASHION BLOCKED TEE', '', '60', '122740-0068', '1464687387FASHION BLOCKED TEE.jpg', '', '', 'NEW', '1', '2016-05-31', 'show'),
(33, 2, 'JERSEY SHORT', '', '120', '122728-5003', '1464687427JERSEY SHORT.jpg', '', '', 'NEW', '1', '2016-05-31', 'show'),
(34, 2, 'CORE LOGO TEE', '', '60', '122720-0001', '1464687476CORE LOGO TEE.jpg', '', '', 'NEW', '1', '2016-05-31', 'show'),
(35, 2, 'Crew Sweat', '', '85', '123494-0504', '1464687546Crew Sweat.jpg', '', '', 'NEW', '1', '2016-05-31', 'show'),
(36, 1, 'HOLDALL DUFFEL', '', '85', '110829-0779', '1464687583HOLDALL DUFFEL.jpg', '', '', 'NEW', '1', '2016-05-31', 'show'),
(37, 3, 'MESSENGER BAG', '', '85', '110828-0716', '1464687637110828-0716.jpg', '', '', 'NEW', '1', '2016-05-31', 'show'),
(38, 3, 'DRESS SOCKS 2PP', '', '10', '110858-0904', '1464687681DRESS SOCKS 2PP.jpg', '', '', 'NEW', '1', '2016-05-31', 'show'),
(39, 3, '2PP ANKLE SOCKS', '', '10', '110857-5004', '14646877232PP ANKLE SOCKS.jpg', '', '', 'NEW', '1', '2016-05-31', 'show'),
(40, 3, 'BASIC CAP', 'BASIC CAP', '30', '113936-0714', '1464687752BASIC CAP.jpg', '', '', 'NEW', '1', '2016-05-31', 'show'),
(41, 1, 'CORE TECH BACK PACK', 'CORE TECH BACK PACK', '90', '122761-0904', '1464687796CORE TECH BACK PACK.jpg', '', '', 'NEW', '1', '2016-05-31', 'show');

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
(1, 're@fs.ru', '123', '123', 'unblock', '2016-05-16', '2016-05-31 12:14:47'),
(2, 're@fd.ru', '123', '123', 'unblock', '2016-05-16', '2016-05-16 10:21:16'),
(3, 're@fs.ru', 'name', '123', 'unblock', '2016-05-16', '2016-05-16 10:32:40'),
(4, 're@fs.ru', 'fga', '123', 'unblock', '2016-05-16', '2016-05-16 10:36:56');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
