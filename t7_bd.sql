-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Мар 23 2015 г., 06:58
-- Версия сервера: 5.6.21
-- Версия PHP: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `t7_bd`
--

-- --------------------------------------------------------

--
-- Структура таблицы `country`
--

CREATE TABLE IF NOT EXISTS `country` (
`country_id` int(11) NOT NULL,
  `country_name` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `country`
--

INSERT INTO `country` (`country_id`, `country_name`) VALUES
(1, 'Россия'),
(2, 'Украина'),
(3, 'Германия'),
(15, 'Канада');

-- --------------------------------------------------------

--
-- Структура таблицы `guest`
--

CREATE TABLE IF NOT EXISTS `guest` (
`guest_id` int(11) NOT NULL,
  `guest_name` varchar(30) NOT NULL,
  `guest_surname` varchar(30) NOT NULL,
  `guest_country` int(11) NOT NULL,
  `guest_card` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=284 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `guest`
--

INSERT INTO `guest` (`guest_id`, `guest_name`, `guest_surname`, `guest_country`, `guest_card`) VALUES
(1, 'Александр', 'Пушкин', 1, '12345678'),
(2, 'Владимер', 'Маяковский', 2, '12345679'),
(3, 'Виктор', 'Петров', 1, '23254352'),
(4, 'Константин', 'Сидоров', 3, '34534534'),
(6, 'Сергей', 'Симонов', 2, '00345345'),
(185, 'ajax1', 'test1', 4, ' 0000001'),
(186, 'ajax2', 'test2', 4, ' 0000002'),
(187, 'ajax3', 'test3', 4, ' 0000003'),
(188, 'ajax4', 'test4', 4, ' 0000004'),
(189, 'ajax5', 'test5', 4, ' 0000005'),
(190, 'ajax6', 'test6', 4, ' 0000006'),
(191, 'ajax7', 'test7', 4, ' 0000007'),
(192, 'ajax8', 'test8', 4, ' 0000008'),
(193, 'ajax9', 'test9', 4, ' 0000009'),
(194, 'ajax10', 'test10', 4, ' 00000010'),
(195, 'ajax11', 'test11', 4, ' 00000011'),
(196, 'ajax12', 'test12', 4, ' 00000012'),
(197, 'ajax13', 'test13', 4, ' 00000013'),
(198, 'ajax14', 'test14', 4, ' 00000014'),
(199, 'ajax15', 'test15', 4, ' 00000015'),
(200, 'ajax16', 'test16', 4, ' 00000016'),
(201, 'ajax17', 'test17', 4, ' 00000017'),
(202, 'ajax18', 'test18', 4, ' 00000018'),
(203, 'ajax19', 'test19', 4, ' 00000019'),
(204, 'ajax20', 'test20', 4, ' 00000020'),
(205, 'ajax21', 'test21', 4, ' 00000021'),
(206, 'ajax22', 'test22', 4, ' 00000022'),
(207, 'ajax23', 'test23', 4, ' 00000023'),
(208, 'ajax24', 'test24', 4, ' 00000024'),
(209, 'ajax25', 'test25', 4, ' 00000025'),
(210, 'ajax26', 'test26', 4, ' 00000026'),
(211, 'ajax27', 'test27', 4, ' 00000027'),
(212, 'ajax28', 'test28', 4, ' 00000028'),
(213, 'ajax29', 'test29', 4, ' 00000029'),
(214, 'ajax30', 'test30', 4, ' 00000030'),
(215, 'ajax31', 'test31', 4, ' 00000031'),
(216, 'ajax32', 'test32', 4, ' 00000032'),
(217, 'ajax33', 'test33', 4, ' 00000033'),
(218, 'ajax34', 'test34', 4, ' 00000034'),
(219, 'ajax35', 'test35', 4, ' 00000035'),
(220, 'ajax36', 'test36', 4, ' 00000036'),
(221, 'ajax37', 'test37', 4, ' 00000037'),
(222, 'ajax38', 'test38', 4, ' 00000038'),
(223, 'ajax39', 'test39', 4, ' 00000039'),
(224, 'ajax40', 'test40', 4, ' 00000040'),
(225, 'ajax41', 'test41', 4, ' 00000041'),
(226, 'ajax42', 'test42', 4, ' 00000042'),
(227, 'ajax43', 'test43', 4, ' 00000043'),
(228, 'ajax44', 'test44', 4, ' 00000044'),
(229, 'ajax45', 'test45', 4, ' 00000045'),
(230, 'ajax46', 'test46', 4, ' 00000046'),
(231, 'ajax47', 'test47', 4, ' 00000047'),
(232, 'ajax48', 'test48', 4, ' 00000048'),
(233, 'ajax49', 'test49', 4, ' 00000049'),
(234, 'ajax50', 'test50', 4, ' 00000050'),
(235, 'ajax51', 'test51', 4, ' 00000051'),
(236, 'ajax52', 'test52', 4, ' 00000052'),
(237, 'ajax53', 'test53', 4, ' 00000053'),
(238, 'ajax54', 'test54', 4, ' 00000054'),
(239, 'ajax55', 'test55', 4, ' 00000055'),
(240, 'ajax56', 'test56', 4, ' 00000056'),
(241, 'ajax57', 'test57', 4, ' 00000057'),
(242, 'ajax58', 'test58', 4, ' 00000058'),
(243, 'ajax59', 'test59', 4, ' 00000059'),
(244, 'ajax60', 'test60', 4, ' 00000060'),
(245, 'ajax61', 'test61', 4, ' 00000061'),
(246, 'ajax62', 'test62', 4, ' 00000062'),
(247, 'ajax63', 'test63', 4, ' 00000063'),
(248, 'ajax64', 'test64', 4, ' 00000064'),
(249, 'ajax65', 'test65', 4, ' 00000065'),
(250, 'ajax66', 'test66', 4, ' 00000066'),
(251, 'ajax67', 'test67', 4, ' 00000067'),
(252, 'ajax68', 'test68', 4, ' 00000068'),
(253, 'ajax69', 'test69', 4, ' 00000069'),
(254, 'ajax70', 'test70', 4, ' 00000070'),
(255, 'ajax71', 'test71', 4, ' 00000071'),
(256, 'ajax72', 'test72', 4, ' 00000072'),
(257, 'ajax73', 'test73', 4, ' 00000073'),
(258, 'ajax74', 'test74', 4, ' 00000074'),
(259, 'ajax75', 'test75', 4, ' 00000075'),
(260, 'ajax76', 'test76', 4, ' 00000076'),
(261, 'ajax77', 'test77', 4, ' 00000077'),
(262, 'ajax78', 'test78', 4, ' 00000078'),
(263, 'ajax79', 'test79', 4, ' 00000079'),
(264, 'ajax80', 'test80', 4, ' 00000080'),
(265, 'ajax81', 'test81', 4, ' 00000081'),
(266, 'ajax82', 'test82', 4, ' 00000082'),
(267, 'ajax83', 'test83', 4, ' 00000083'),
(268, 'ajax84', 'test84', 4, ' 00000084'),
(269, 'ajax85', 'test85', 4, ' 00000085'),
(270, 'ajax86', 'test86', 4, ' 00000086'),
(271, 'ajax87', 'test87', 4, ' 00000087'),
(272, 'ajax88', 'test88', 4, ' 00000088'),
(273, 'ajax89', 'test89', 4, ' 00000089'),
(274, 'ajax90', 'test90', 4, ' 00000090'),
(275, 'ajax91', 'test91', 4, ' 00000091'),
(276, 'ajax92', 'test92', 4, ' 00000092'),
(277, 'ajax93', 'test93', 4, ' 00000093'),
(278, 'ajax94', 'test94', 4, ' 00000094'),
(279, 'ajax95', 'test95', 4, ' 00000095'),
(280, 'ajax96', 'test96', 4, ' 00000096'),
(281, 'ajax97', 'test97', 4, ' 00000097'),
(282, 'ajax98', 'test98', 4, ' 00000098'),
(283, 'ajax99', 'test99', 4, ' 00000099');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `country`
--
ALTER TABLE `country`
 ADD PRIMARY KEY (`country_id`);

--
-- Индексы таблицы `guest`
--
ALTER TABLE `guest`
 ADD PRIMARY KEY (`guest_id`), ADD UNIQUE KEY `guest_card` (`guest_card`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `country`
--
ALTER TABLE `country`
MODIFY `country_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT для таблицы `guest`
--
ALTER TABLE `guest`
MODIFY `guest_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=284;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
