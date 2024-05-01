-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 01 2024 г., 15:15
-- Версия сервера: 8.0.30
-- Версия PHP: 8.0.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `cargo_transit_db`
--

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id_users` int NOT NULL,
  `is_manager` tinyint(1) DEFAULT NULL COMMENT 'is_manager = 1 - менеджер, если = 0, клиент',
  `first_name` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `second_name` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `patronymic` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `address` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `phone_number` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `company` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `login` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `password` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Таблица пользователя';

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id_users`, `is_manager`, `first_name`, `second_name`, `patronymic`, `address`, `phone_number`, `company`, `login`, `password`) VALUES
(1, 0, 'ААА', 'ЫЫВ', 'Mikhailovich', 'Vladivostok', '+79242291482', 'BigMoneyCompany', 'pavelRos', 'pavelRos123'),
(3, 0, 'Oleg', 'Bidos', 'ssss', NULL, NULL, NULL, NULL, NULL),
(5, 1, 'Sassm', 'SamS', 'SamFs', 'Oliaskaf', '6123566789', 'BigCompanyf', 'bogs4412', '123456'),
(6, 1, 'Juliana', 'SamS', 'SamF', 'Oliaska', '6123006789', 'BigCompany', 'jill', '123456'),
(9, 1, 'Juno', 'Scott', 'Sanrinosd', 'New Yorkf', '+18324445516', 'Googles', 'Juno442', 'tttfgf2'),
(11, 1, 'Sam', 'SamS', 'SamF', 'Oliaska', '0123566789', 'BigCompany', 'bos3s4412', '123456'),
(13, 0, '65464213', 'asdasd', 'asdsa213', '213', 'sdasd', 'asdasd', 'sadasd', '$2y$10$qhxd3WJaUXyLsnyqXlTleecINDQqgracPfHFLFeuFYa2ulP7nkpBK'),
(14, 1, 'ghfhggfh', 'gfhhgf', '324312', '421sad', 'asd', '34asd', 'zsaada', '$2y$10$UKssQL077O5bXdzCDb6QC.ldSO811vso1IkiPuS5hwriWrS6swbpK'),
(16, 0, 'gfdgd', 'asdas', 'asd', 'asd', 'asd65766', 'asdas', 'gfdazf', '$2y$10$EBQpqMokTa9nJuqGeErXoe5VmBEnM.S5IiXqBzPRTDLy.4V86nUqe'),
(17, 0, 'hgdhdfjj231', 'hgjcsad2', 'hgjhkol', 'hgf5467', '45455899645', 'jkjghfg', 'lkjjmnh89i', '$2y$10$9Y.IjH3HVYEot8tRt/sGP.i6OGkhgrm5y3o/UtJc6Rim5zGf7DcSW'),
(19, 0, 'hhgfhjfg', 'hgjcsad2', 'hgjhkol', 'hgf5467', '4545543s899645', 'jkjghfg', 'gfhfhfg', '$2y$10$DMiMFHVDngsdJqlChSzE2.ZUkFTFzjbUOrzFydOp29/PJTHBXcqBi'),
(20, 1, 'Dima', 'Petrov', 'Genadievich', 'Vladivostok', '+904444721', 'SictyCompany', 'Ayiaska000', 'qwe123'),
(21, 0, 'Name', 'Fama', 'Mikh', 'city', '+85858521', 'Comp', 'ligggg', '$2y$10$I3m9mTFQTDJA/wBySgvjR.ZNduO9D8wLY/RCGj26mltL5.GBlabji'),
(25, 0, 'пфпфы', 'фып', 'фып', 'фыпфып', 'фыппыф', 'ппфып', 'пфп', '$2y$10$9ud9yUdGspc67yUoAIne/eOTogsgTNThEnnnAZXEpG.tnmyuBFPD6'),
(26, 0, 'фыаыфапыфа', 'фыаыфа', 'ыфафыа', 'фывыфв', 'фывыф', 'ыфвыфв', 'фыафаы', '$2y$10$SvYg1AT96trmM/avRVITpe3Al9rBcJOOPsrk789las/s5z.6ZeU62'),
(27, 0, 'апрпа', 'пврапр', 'ыфппарап', 'рпарпа', 'пар', 'парпа', 'фывфыв', '$2y$10$MtM8AT4NPujCDjQ24JSEt.H1dy1.DRMJrEOfBtmx8tgTP1I9nm9u2'),
(33, 0, 'dasd', 'asd', 'asd', 'asdas', 'dasda', 'asdasd', 'asdsad', '$2y$10$ipm4HIoizw7rbf62vpxxB.oLnF0zbeSXlXLSZLQGd/yBfSippn6i.'),
(34, 0, 'gggggg65656', 'gggggg65656', 'gggggg65656', 'gggggg65656', 'gggggg65656', 'gggggg65656', 'gggggg65656', '$2y$10$ivbdQnymv6K1rUG2J3T67OiO59xZlFnyF0D23V/hkskM0tRiKF4V6'),
(35, 0, 'dfg', 'gdfgdfg', 'fdgfd', 'sadasd', 'phone_number', 'jhghgfgdsf', 'gfdhgjgfhdfg', '$2y$10$reo.L4ymhVZmknqHuv91qecIOOLRTni/y/7IKZclm4F/zRdHYajES'),
(36, 0, 'Павел', 'Рослый', 'Михайлович', 'Vladivostok', '+95024857712', 'Transit', 'pavelros123', '$2y$10$VaLcii5cuR5yogqid0VYA..qdmDxyjdOd5L1LMQSStPVECWB1M2hy'),
(37, 0, 'рарлапаоппр', 'апар', 'парапр', 'ап', 'апрпарпа', 'апрапрапр', 'ЛЛОООЧЧЧ', '$2y$10$3wyKj3rVifPoEfMKF1FYmuuxjEhIqYkAoxxdherFP5wTu.1gqpj7G'),
(38, 0, 'saffs', 'asffsafas', 'asfasff', 'asffas', '0000000000000', 'asfasf', 'fasfaffs', '$2y$10$h5WObDccAWx/WpxrgLu8de74tH1jUd2nebEwmkdxxv1/1jMxO9G0q'),
(39, 0, 'ghfhfgh', 'fghfghf', 'gfghgfh', 'hhgjh', 'gjhgjghjg8888', 'hggjghj', 'gfh', '$2y$10$GNo80oPSXto.hv2UiZz7u.C1ZZyQuIib1T29gnPSSlSBD/xeuDaou'),
(40, 0, 'safsaf', 'affsa', 'df', 'asfsaf', 'ffff', 'asfasf', 'asfsaf', '$2y$10$U3zaTXxefsw/y0sjNiFhn.94vo42a.WlBTxmReOv5NX14ubnsLTz6'),
(41, 0, 'saffs', 'asffsafas', 'asfasff', 'asffas', '4354353453543', 'asfasf', '4354нппаа', '$2y$10$cx1019EV8BWZGiecSnIXme2xqNFDqWoja.dKPFTIOoYZYcPWqm6qa'),
(42, 0, 'ghfdg', 'fdg', 'dfgdfg', 'gfdgdfg', 'dfgdfg', 'gdfg', 'dfgdfgdf', '$2y$10$8QfuoZkHOrf9BbWsKGjN5.IGeqV8dQvtP1VvBgSYfFJ83d1O5bXNa'),
(43, 0, 'ghfdg', 'fdg', 'dfgdfg', 'gfdgdfg', 'dfgdfgfdg2', 'gdfgfgd', 'dfgdfgdffgd', '$2y$10$VUmpyq1Z8PwD7RskM2NIL.ah2v9SpQ5IHX4Rgg9F1CPw.Ls8UTOuO'),
(44, 0, 'ghfdg', 'fdg', 'dfgdfg', 'gfdgdfg', 'dfgdfgfdg24242', 'gdfgfgd', 'dfgdfgdffgd4224', '$2y$10$FaydI9sYoIWv6MdVi7RmRu8ynM2g.yx1.wP9MGNqNfrSjxtM3XihK'),
(45, 0, 'ghfdg', 'fdg', 'dfgdfg', 'gfdgdfg', 'dfgdfgfdg24242554', 'gdfgfgd', 'dfgdfgdffgd422433', '$2y$10$vbpbGZjRgNRaYq44Znfx5.oQbvhLdEbJYmn17uW9EvS6zNq/T1FQ2'),
(46, 0, 'ghfdg', 'fdg', 'dfgdfg', 'gfdgdfg', 'dfgdfgf2424242554', 'gdfgfgd', 'dfgd24ffgd422433', '$2y$10$KHtu9j8ARPU/9GLXrTRPieTM8v/p/gInK9emXDpnzvwzZnKr9s2ku'),
(47, 0, 'ghfdg', 'fdg', 'dfgdfg', 'gfdgdfg', 'dfgdfjjj242554', 'gdfgfgd', 'djjjjffgd422433', '$2y$10$XT3jqh1dnaJ8jvaERzHm.eRrr6spq64GCy9XTBr1fbaAvHsKXARw6'),
(48, 0, 'ghfdg', 'fdg', 'dfgdfg', 'gfdgdfg', 'dfgdhghghg', 'gdfgfgd', 'djjjjffgdhgghhg', '$2y$10$OMvrCSJq8SgsKEBW2Hry9uTRV3G.yEaqJBiaMBcqwk/CqzbghmMsm'),
(49, 1, 'gkgkkgkg', 'ghjgjghjgh', 'jghjghjghj', 'gghjhgj', 'ghjghj', 'jghjhgj', 'ghjghj', '$2y$10$TMgaceAqPpsg96R/N/fUxuvQIu9iYHy6dDezUiyTfPoStko7BvjTy'),
(50, 0, 'рппврапр', 'апраппа', 'апрап3434', 'пывпвып', 'пвып332', 'пыпвы', 'ывавыа', '$2y$10$Wv6iILwYUGhL9LeVzrnuIeHoZQcSu7.f094dHcgWBrAG9SnHMe1aO'),
(51, 0, 'hghghghg', 'hgjgjjg', 'csac', 'sadasxsa', 'dasfsaf', 'sghfvd341', 'c233213', '$2y$10$pT8xRegbTaG/oYw188lT/.B2gdHUc4lNYGM.Ojk9AdWiF6hF9aTDe'),
(52, 0, 'gdsgds', 'gdsg', 'dsgds', 'sadasd21d', 'asdas', 'asdasd21d', 'gdsgds', '$2y$10$RGrZtcxTFB.oS8ai.CnsDups5Vc.GXX0hyWAZqETX8YqihbUt6mhq'),
(53, 1, 'hgfdhgfh', 'gdsg', 'sadasd', 'sdgds', 'gggggggg77', 'gdsgds', 'Manager2222333', '$2y$10$BOS5NzfzTxsPteEjOyCBMeDpVPbDVPCkk5Vgij/iHBsl9PE1OBCpG'),
(54, 1, 'дапвдрадврдв', 'павпвпав', 'павпвапва', 'миттмтмт', 'митмитмим', 'авравмититм', 'павпав', '$2y$10$yB1A4DuR1/k7ZQZdvPUo2OafJ94KjgF8XArvQwcpHSQlQuOtAO1y2'),
(55, 0, 'sadsadggg', 'fdgdfg', 'dfgfdgfd', 'fdgfdggfd', 'fdfgd', 'afsjghjfjgd', 'Pavel', '$2y$10$lajJG5jkhkrQYxl8S/mTJeYORcQIITVhKKDSzQIRK2Yej0TwvvLq.'),
(56, 0, 'qwewqeewq', 'qweqwe', 'qweqwe', 'qweqwe', 'wqewqe', 'qweqweewq', 'bibs', '$2y$10$GONigPdJGpgr5nxojM4KNeZGYMuPnomXjkcRxIRvLyXNSYvAiLsJ.'),
(57, 0, 'asddsa', 'adsdas', 'adsdas', 'asdads', 'adsdsa', 'asddas', 'doo', '$2y$10$raT6Rni.eM2urtqf/HIUYu1y8Cv5qRdzlbJ8LfNpmcAY53n0UFVi.'),
(58, 1, 'ddsddsa', 'asdasd', 'asdfasffsa', 'fdsfds', 'fdsfds', 'fdgsdfs', 'doo2', '$2y$10$lSlGLnQ5Y4S6H0ax48CsI.YZNgiPi1.weHj8DLmc0R.CRTLMx8dZq'),
(59, 0, 'вфывфы', 'вфывфы', 'вфывфы', 'фыаыф', 'ыфаафы', 'фыаыаф', 'ыфааыф', '$2y$10$AyGTNGP/aGz0gto.yZ1jbOkDSyvNwirqcE8/Eom08Ml0J9pQlwJSy'),
(60, 0, 'dasdsa', 'dsadas', 'das', 'dasdsa', 'asdsad', 'dsadas', 'asd', '$2y$10$sBav.EW93M6bHlj/z6Gu2OFK5f2eK8TmugoywYF8ieKy6m2Vo0Wxe'),
(62, 1, 'gtfdsgds', 'fsdfds', 'fdsfdsfds', 'dsggdsg', 'dsgdsg', 'sdgdsg', 'fgsfsdg', '$2y$10$UMQCyvaZ0mnXuwIebcNY5u/4B8wqI0yXplphSa9Up4Syya3wz.dTi'),
(64, 0, 'hgfhgf', 'hgf', 'hgfhgfh', 'fghfgh', 'gfhfgh', 'gfh', 'gfgfh', '$2y$10$U5wrbt7BLppVfJQfkStA2uWV3MPFN/RtQD/22hQyzub8wChJFHDKa');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_users`),
  ADD UNIQUE KEY `login` (`login`),
  ADD UNIQUE KEY `phone_number` (`phone_number`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
