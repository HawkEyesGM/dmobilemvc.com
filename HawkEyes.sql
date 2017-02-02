-- phpMyAdmin SQL Dump
-- version 4.4.15.7
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Янв 28 2017 г., 13:25
-- Версия сервера: 5.6.31
-- Версия PHP: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `HawkEyes`
--

-- --------------------------------------------------------

--
-- Структура таблицы `colors`
--

CREATE TABLE IF NOT EXISTS `colors` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `target` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `colors`
--

INSERT INTO `colors` (`id`, `name`, `target`) VALUES
(22, 'Black', 'd08c2ab4f60bb0da3ab21995ad8d3425.png'),
(23, 'Gold', 'd3d59f8435e2b054305af7f8b600789e.png'),
(24, 'Grey', '9ed147cc17e8fdde626d52ea3515a5ff.png'),
(25, 'Red', '07657bb411e27c1ea5ef54a0dce9cf35.png'),
(26, 'White', 'ed36b8e906a3b8bd76737cff84457d09.png');

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id_comm` int(10) unsigned NOT NULL,
  `g_id` int(10) unsigned NOT NULL,
  `comm_description` varchar(255) NOT NULL,
  `plus` varchar(255) NOT NULL,
  `minus` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id_comm`, `g_id`, `comm_description`, `plus`, `minus`) VALUES
(1, 31, 'text text text', 'text text text', 'text text text'),
(2, 31, 'text text text', 'text text text', 'text text text');

-- --------------------------------------------------------

--
-- Структура таблицы `features`
--

CREATE TABLE IF NOT EXISTS `features` (
  `id` int(10) unsigned NOT NULL,
  `feature_name` varchar(255) NOT NULL,
  `feature_img` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `features`
--

INSERT INTO `features` (`id`, `feature_name`, `feature_img`) VALUES
(4, '3G', '5588d93edc181f009ea86e61cf1364ab.png'),
(6, 'Кредит3мес', 'af24d10a9d4774d206198e24c6e737ad.jpg'),
(7, 'Кредит5мес', '540a16f2d88f420db7206cf0f90d20b8.jpg'),
(8, 'Samsung', '2f0dfe9303f76867d0ec9c569d266814.jpg'),
(9, 'SuperAmoled', '3caeb08ebe6a67229808e91c35204139.jpg'),
(10, 'IPS', '79ad7da79b362ce156bc54a8efc1f35c.png'),
(11, '4core', '25560f2eb0e8b15092f93e9f5e03a368.jpg'),
(12, '6core', 'dbdc1a2bfdcfe88ea2709dee178bf150.jpg'),
(13, '8core', 'a63ce8154fdba92cfc790b2ac5c18e4e.jpg'),
(14, 'Touch ID', '590bd9e09eae2668e37076c24aca74dc.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `goods`
--

CREATE TABLE IF NOT EXISTS `goods` (
  `id` int(11) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `demo` varchar(255) NOT NULL,
  `video` varchar(255) NOT NULL,
  `price` int(10) unsigned NOT NULL,
  `old_price` int(10) unsigned DEFAULT NULL,
  `description` text NOT NULL,
  `public` tinyint(4) NOT NULL DEFAULT '0',
  `sticker` varchar(255) NOT NULL,
  `in_stock` smallint(11) unsigned NOT NULL,
  `raiting` smallint(11) unsigned NOT NULL,
  `group_goods` varchar(255) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `alias` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=100 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `goods`
--

INSERT INTO `goods` (`id`, `name`, `demo`, `video`, `price`, `old_price`, `description`, `public`, `sticker`, `in_stock`, `raiting`, `group_goods`, `brand`, `alias`) VALUES
(95, 'Samsung S7', '111', '111', 11111, 111, '1112312', 1, 'Суперцена', 1, 11, 'phone', 'samsung', 'samsung_S7'),
(96, 'Iphone 7', 'ыва', 'вы', 18999, 22222, 'апыапывпывпывпывпывпывпывп', 1, 'Топ продаж', 0, 8, 'phone', 'apple', 'iphone_7'),
(97, 'Sony XZ', 'ыва', 'фы', 17555, 23233, 'явфывфывфывфыв', 1, 'Топ продаж', 0, 10, 'phone', 'sony', 'sony-xz'),
(98, 'Nokia', '', '', 33, 2344, 'sdfsdfsdgfasghadsfhgag', 1, 'Акция', 0, 1, 'phone', 'lenovo', 'nokia'),
(99, 'Samsung S8', 'https://www.youtube.com/watch?v=ILpAOZuDnCM', 'https://www.youtube.com/watch?v=ILpAOZuDnCM', 12999, 15999, 'fdgdfgdfgdfgdfgd', 1, 'Топ продаж', 1, 10, 'phone', 'samsung', '/samsungs8');

-- --------------------------------------------------------

--
-- Структура таблицы `goods_colors`
--

CREATE TABLE IF NOT EXISTS `goods_colors` (
  `g_id` int(10) unsigned NOT NULL,
  `c_id` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `goods_colors`
--

INSERT INTO `goods_colors` (`g_id`, `c_id`) VALUES
(95, 22),
(95, 23),
(95, 24),
(95, 25),
(95, 26),
(96, 22),
(97, 24),
(98, 26),
(99, 22),
(99, 24);

-- --------------------------------------------------------

--
-- Структура таблицы `goods_features`
--

CREATE TABLE IF NOT EXISTS `goods_features` (
  `g_id` int(10) unsigned NOT NULL,
  `f_id` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `goods_features`
--

INSERT INTO `goods_features` (`g_id`, `f_id`) VALUES
(95, 4),
(95, 6),
(95, 7),
(95, 8),
(95, 9),
(95, 10),
(95, 11),
(95, 12),
(95, 13),
(95, 14),
(96, 4),
(96, 7),
(96, 10),
(96, 11),
(96, 14),
(97, 10),
(97, 13),
(97, 14),
(98, 9),
(98, 13),
(98, 14),
(99, 10),
(99, 13),
(99, 14);

-- --------------------------------------------------------

--
-- Структура таблицы `goods_images`
--

CREATE TABLE IF NOT EXISTS `goods_images` (
  `g_id` int(10) unsigned NOT NULL,
  `i_id` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `goods_images`
--

INSERT INTO `goods_images` (`g_id`, `i_id`) VALUES
(95, 87),
(96, 88),
(97, 89),
(98, 90),
(99, 91);

-- --------------------------------------------------------

--
-- Структура таблицы `images`
--

CREATE TABLE IF NOT EXISTS `images` (
  `id` int(10) unsigned NOT NULL,
  `main_img` varchar(255) NOT NULL,
  `main_img_medium` varchar(255) NOT NULL,
  `main_img_small` varchar(255) NOT NULL,
  `alt_img` varchar(255) NOT NULL,
  `title_img` varchar(255) NOT NULL,
  `img_1` varchar(255) NOT NULL,
  `img_1_small` varchar(255) NOT NULL,
  `img_2` varchar(255) NOT NULL,
  `img_2_small` varchar(255) NOT NULL,
  `img_3` varchar(255) NOT NULL,
  `img_3_small` varchar(255) NOT NULL,
  `img_4` varchar(255) NOT NULL,
  `img_4_small` varchar(255) NOT NULL,
  `img_5` varchar(255) NOT NULL,
  `img_5_small` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=92 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `images`
--

INSERT INTO `images` (`id`, `main_img`, `main_img_medium`, `main_img_small`, `alt_img`, `title_img`, `img_1`, `img_1_small`, `img_2`, `img_2_small`, `img_3`, `img_3_small`, `img_4`, `img_4_small`, `img_5`, `img_5_small`) VALUES
(87, '937d953325405ba0911305843508cb77.png', '937d953325405ba0911305843508cb77_med.png', '937d953325405ba0911305843508cb77_small.png', '11', '11', '6bd54fdaeb2f28883db1c96a90258953.png', '6bd54fdaeb2f28883db1c96a90258953_small.png', '222aebc6623af39d0b7b461a204b101a.jpg', '222aebc6623af39d0b7b461a204b101a_small.jpg', '210d977864e5970e52972c61cf994b0b.jpg', '210d977864e5970e52972c61cf994b0b_small.jpg', '2bdd884a099b5389e86b6bc27fb57e30.jpg', '2bdd884a099b5389e86b6bc27fb57e30_small.jpg', '502a73e79a7e9ba9d7932bdf75be00a3.jpg', '502a73e79a7e9ba9d7932bdf75be00a3_small.jpg'),
(88, '2ae5553388f6f1c69ce2c05c407a9c18.png', '2ae5553388f6f1c69ce2c05c407a9c18_med.png', '2ae5553388f6f1c69ce2c05c407a9c18_small.png', 'пы', 'ывп', '332a62f99e0df9b719b7c7362b4b1b1d.png', '332a62f99e0df9b719b7c7362b4b1b1d_small.png', '3a035c02d7afd22eb20bcf573bf0aa92.jpg', '3a035c02d7afd22eb20bcf573bf0aa92_small.jpg', '883487ecaf8dd41c6372aa0b04ff00cf.jpg', '883487ecaf8dd41c6372aa0b04ff00cf_small.jpg', '81aa7ea4ebf831a3faa6b9ea0ce92e83.jpg', '81aa7ea4ebf831a3faa6b9ea0ce92e83_small.jpg', '000313f9647c323563bb8e1598543000.jpg', '000313f9647c323563bb8e1598543000_small.jpg'),
(89, '843dce3b0c7fb7008e6f1512083e4bbd.png', '843dce3b0c7fb7008e6f1512083e4bbd_med.png', '843dce3b0c7fb7008e6f1512083e4bbd_small.png', 'авпвап', 'вап', '70d176d1fb02c5bf47b2bb82a827598c.png', '70d176d1fb02c5bf47b2bb82a827598c_small.png', '66457df76b3f15ebef60ab1363e81f67.png', '66457df76b3f15ebef60ab1363e81f67_small.png', 'ca33bdf457fee2f8e6ea4d9a70a002a8.png', 'ca33bdf457fee2f8e6ea4d9a70a002a8_small.png', '141bee6a3a38f92ea236f4d24a10e271.png', '141bee6a3a38f92ea236f4d24a10e271_small.png', '705f077caebbc9fb40f389fb250f1ecf.png', '705f077caebbc9fb40f389fb250f1ecf_small.png'),
(90, 'f30cf76a14a1f88432c4d67287d88d45.png', 'f30cf76a14a1f88432c4d67287d88d45_med.png', 'f30cf76a14a1f88432c4d67287d88d45_small.png', 'asd', 'asd', 'f925486406d5c9c8218a911a52e854bf.jpg', 'f925486406d5c9c8218a911a52e854bf_small.jpg', '075d0d2826b4ede70bd5d5e0b5ef056a.jpg', '075d0d2826b4ede70bd5d5e0b5ef056a_small.jpg', '', '', '', '', '', ''),
(91, 'da82681fe1bd49d37333b3564113f245.png', 'da82681fe1bd49d37333b3564113f245_med.png', 'da82681fe1bd49d37333b3564113f245_small.png', '123', '123', '5e8dc787bd72d99029785032f363e097.png', '5e8dc787bd72d99029785032f363e097_small.png', '01d2f7d50797253cd8984bdd20f00d7d.png', '01d2f7d50797253cd8984bdd20f00d7d_small.png', '0fcd36c8376851c0685105d3fb9cafb2.png', '0fcd36c8376851c0685105d3fb9cafb2_small.png', '2d104f1cb271942f59d0073611477127.png', '2d104f1cb271942f59d0073611477127_small.png', 'ef9828f3f65830f7851d5a64d8a1b827.png', 'ef9828f3f65830f7851d5a64d8a1b827_small.png');

-- --------------------------------------------------------

--
-- Структура таблицы `routes`
--

CREATE TABLE IF NOT EXISTS `routes` (
  `id` int(11) NOT NULL,
  `good_id` int(10) unsigned NOT NULL,
  `real_url` varchar(255) NOT NULL,
  `alias` varchar(255) NOT NULL,
  `public` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `routes`
--

INSERT INTO `routes` (`id`, `good_id`, `real_url`, `alias`, `public`) VALUES
(1, 99, '/product?id=99', '/samsungs8', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `test`
--

CREATE TABLE IF NOT EXISTS `test` (
  `123` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `test`
--

INSERT INTO `test` (`123`) VALUES
(3),
(120),
(11);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL,
  `social_netw` varchar(255) NOT NULL,
  `social_netw_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `sec_name` varchar(255) NOT NULL,
  `phone` bigint(20) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `role` int(64) unsigned NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `social_netw`, `social_netw_id`, `name`, `sec_name`, `phone`, `email`, `password`, `avatar`, `role`) VALUES
(34, '', 0, 'Денис', 'Масло', 380663363988, 'denis@mail.ru', '$2y$10$DymrnbmfqdNNOzlQ8MgNuOofdTGPzQztVcBp3mZlsbdgszKVM1W6q', '51c270f439918a379765ed4e9e3afbc5.jpg', 10),
(35, '', 0, 'Виталий', 'Мотылевский', 380938745623, 'kertar@mail.ru', '$2y$10$D4YZSNmxqOxDeLhNQkg6s.7Qd3/CkuYNw4F.R2ft3SknrTT6wXTyu', '09a470f1d753a8aec645e643736a761c.jpeg', 20),
(36, '', 0, 'Наталья', 'Слободян', 380936696977, 'chernika@bk.ru', '$2y$10$ogGe91HyzmbrOTuae4N3ie0ZR34jxnfv5AhInC4W/ib7680tnDENq', 'cda444481317c7e48ffd725cb8cce5b5.jpg', 20),
(37, '', 0, 'Антон', 'Зартдинов', 380957777777, 'uc@seotech.com.ua', '$2y$10$taB6BNuV3pOvKv99PiIO0eUR4rDCjJFu4chkhC4XSr.Vxasmw4512', 'eeab68f5ae4be23bde6d8f95a248fe44.jpg', 20),
(38, '', 0, 'Ekaterina', 'Omelchenko', 380503331433, 'ekbOmel@gmail.com', '$2y$10$fAAlvAMHIBQWf773EmVp1.eAeqb9.89BCrc4Uv4hmZYxhTUssCTiW', '5176a3235e12244c47c70e0f86512ef5.jpg', 20),
(39, '', 0, 'Денис', 'Маслов', 380637773377, 'hawkeyes@mail.ru', '$2y$10$/NTcPkYX8E4Ef.Hv2SU.tuhlom9C2heXFfRVnBVi0Mq9YFmT6z3ZC', 'e5d363d72d7849cc93c1a4404caceb4e.png', 20),
(40, '', 0, 'Александр', 'Иванов', 380957894512, 'kertaaar@mail.ru', '$2y$10$nmOhpte/wpNKrljU2u6UOuYbsBQQ9va5v3592cVLHuFdUgreQwm/y', '3f3652aa8255cf248151fdef3f75f288.jpg', 20),
(41, 'facebook', 1741805612774714, 'Денис', 'Масло', NULL, '', '', '', 20),
(42, 'mailru', 15799016402890014224, 'Денис', 'Масло', NULL, NULL, NULL, NULL, 20),
(43, 'vkontakte', 161571723, 'Денис', 'Егоров', NULL, NULL, NULL, NULL, 20),
(44, '', 0, 'dfgdfgdfg', 'dfgdfg', 380663363988, 'f3@f3.com', '$2y$10$iJGpIIu0Gme5/pb7HCzOK.TRV4MSR2b7IIwgPiio1kW4XPMP2f/kW', 'stand_ava.jpg', 20);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id_comm`);

--
-- Индексы таблицы `features`
--
ALTER TABLE `features`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `goods`
--
ALTER TABLE `goods`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Индексы таблицы `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `routes`
--
ALTER TABLE `routes`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `colors`
--
ALTER TABLE `colors`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id_comm` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `features`
--
ALTER TABLE `features`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT для таблицы `goods`
--
ALTER TABLE `goods`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=100;
--
-- AUTO_INCREMENT для таблицы `images`
--
ALTER TABLE `images`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=92;
--
-- AUTO_INCREMENT для таблицы `routes`
--
ALTER TABLE `routes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=45;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
