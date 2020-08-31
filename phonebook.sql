-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: db
-- Время создания: Авг 31 2020 г., 23:15
-- Версия сервера: 5.7.31
-- Версия PHP: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `phonebook`
--

-- --------------------------------------------------------

--
-- Структура таблицы `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `contacts`
--

INSERT INTO `contacts` (`id`, `user_id`, `first_name`, `last_name`, `email`, `phone`, `photo`, `created_at`, `updated_at`) VALUES
(1, 1, 'Antonina', 'Effertz', 'wterry@example.net', '+7683897006972', 'https://lorempixel.com/80/80/?52305', '2020-08-31 23:14:21', NULL),
(2, 1, 'Angelita', 'West', 'eugene63@example.org', '+6585808623232', 'https://lorempixel.com/80/80/?53975', '2020-08-31 23:14:21', NULL),
(3, 1, 'Justine', 'Berge', 'fbosco@example.com', '+3598084405670', 'https://lorempixel.com/80/80/?36709', '2020-08-31 23:14:21', NULL),
(4, 1, 'Stacy', 'Pacocha', 'miller.king@example.org', '+9623096877457', 'https://lorempixel.com/80/80/?89743', '2020-08-31 23:14:21', NULL),
(5, 1, 'Terry', 'McClure', 'volkman.torey@example.org', '+3914516869013', 'https://lorempixel.com/80/80/?14074', '2020-08-31 23:14:21', NULL),
(6, 1, 'Rahul', 'Dickens', 'torp.axel@example.org', '+1691509536210', 'https://lorempixel.com/80/80/?89186', '2020-08-31 23:14:21', NULL),
(7, 1, 'Lori', 'Cassin', 'emmet.haley@example.net', '+7175909412123', 'https://lorempixel.com/80/80/?58181', '2020-08-31 23:14:21', NULL),
(8, 1, 'Declan', 'Grant', 'wilkinson.giovanni@example.net', '+6403696339051', 'https://lorempixel.com/80/80/?57694', '2020-08-31 23:14:21', NULL),
(9, 1, 'Moises', 'Marks', 'araceli83@example.net', '+8200748664760', 'https://lorempixel.com/80/80/?31323', '2020-08-31 23:14:21', NULL),
(10, 1, 'Kaleb', 'Nitzsche', 'myah.jakubowski@example.net', '+1088482224343', 'https://lorempixel.com/80/80/?35710', '2020-08-31 23:14:21', NULL),
(11, 1, 'Arthur', 'Pollich', 'henderson.bayer@example.org', '+6983541495564', 'https://lorempixel.com/80/80/?87256', '2020-08-31 23:14:21', NULL),
(12, 1, 'Marta', 'Gleichner', 'renner.thalia@example.org', '+2464726902672', 'https://lorempixel.com/80/80/?65893', '2020-08-31 23:14:21', NULL),
(13, 1, 'Evalyn', 'Mann', 'betty64@example.com', '+3457479495129', 'https://lorempixel.com/80/80/?72806', '2020-08-31 23:14:21', NULL),
(14, 1, 'Albert', 'Kertzmann', 'dach.freida@example.org', '+9375798506333', 'https://lorempixel.com/80/80/?78158', '2020-08-31 23:14:21', NULL),
(15, 1, 'Vidal', 'Kautzer', 'susanna14@example.com', '+8670859407494', 'https://lorempixel.com/80/80/?33527', '2020-08-31 23:14:21', NULL),
(16, 1, 'Charlene', 'Larson', 'ywalter@example.net', '+5543244267880', 'https://lorempixel.com/80/80/?81267', '2020-08-31 23:14:21', NULL),
(17, 1, 'Annabell', 'Lubowitz', 'awalker@example.org', '+4249838964440', 'https://lorempixel.com/80/80/?82069', '2020-08-31 23:14:21', NULL),
(18, 1, 'Kaylie', 'Walter', 'julie.jenkins@example.org', '+4327148961237', 'https://lorempixel.com/80/80/?97173', '2020-08-31 23:14:21', NULL),
(19, 1, 'Trinity', 'Reichert', 'rogahn.melody@example.com', '+8051085568153', 'https://lorempixel.com/80/80/?75097', '2020-08-31 23:14:21', NULL),
(20, 1, 'Peter', 'Harvey', 'davion.kirlin@example.com', '+9961268272551', 'https://lorempixel.com/80/80/?17994', '2020-08-31 23:14:21', NULL),
(21, 1, 'Yasmine', 'Towne', 'mann.constantin@example.com', '+8961197846160', 'https://lorempixel.com/80/80/?50178', '2020-08-31 23:14:21', NULL),
(22, 1, 'Maida', 'Bauch', 'hills.london@example.com', '+7852318266268', 'https://lorempixel.com/80/80/?41567', '2020-08-31 23:14:21', NULL),
(23, 1, 'Ansel', 'Auer', 'dylan71@example.org', '+3454907743803', 'https://lorempixel.com/80/80/?53783', '2020-08-31 23:14:21', NULL),
(24, 1, 'Rosalyn', 'Blick', 'maryse.pacocha@example.com', '+5464045156575', 'https://lorempixel.com/80/80/?63239', '2020-08-31 23:14:21', NULL),
(25, 1, 'Abbey', 'Larkin', 'epowlowski@example.net', '+1985794852825', 'https://lorempixel.com/80/80/?13399', '2020-08-31 23:14:21', NULL),
(26, 1, 'Selena', 'Gleichner', 'schmitt.nona@example.com', '+4316873655980', 'https://lorempixel.com/80/80/?62591', '2020-08-31 23:14:21', NULL),
(27, 1, 'Agustina', 'Blanda', 'daniel.lavern@example.net', '+5312317955041', 'https://lorempixel.com/80/80/?83141', '2020-08-31 23:14:21', NULL),
(28, 1, 'Augusta', 'Fisher', 'darrell.toy@example.com', '+4956975119529', 'https://lorempixel.com/80/80/?89542', '2020-08-31 23:14:21', NULL),
(29, 1, 'Webster', 'O\'Connell', 'gregory31@example.net', '+6018254328181', 'https://lorempixel.com/80/80/?27601', '2020-08-31 23:14:21', NULL),
(30, 1, 'Kaitlyn', 'Ward', 'ted18@example.net', '+7934954001793', 'https://lorempixel.com/80/80/?30875', '2020-08-31 23:14:21', NULL),
(31, 1, 'Aron', 'Vandervort', 'cali43@example.net', '+1601007035818', 'https://lorempixel.com/80/80/?10793', '2020-08-31 23:14:21', NULL),
(32, 1, 'Sarah', 'Senger', 'dewayne86@example.org', '+4279021850968', 'https://lorempixel.com/80/80/?11261', '2020-08-31 23:14:21', NULL),
(33, 1, 'Tia', 'Keebler', 'thagenes@example.org', '+8057523503293', 'https://lorempixel.com/80/80/?52947', '2020-08-31 23:14:21', NULL),
(34, 1, 'Garett', 'Cassin', 'baumbach.kasey@example.org', '+7234190520470', 'https://lorempixel.com/80/80/?70923', '2020-08-31 23:14:21', NULL),
(35, 1, 'Mathilde', 'Pouros', 'pbeer@example.org', '+4549210508945', 'https://lorempixel.com/80/80/?14852', '2020-08-31 23:14:21', NULL),
(36, 1, 'Nelson', 'Feeney', 'maybell.schaden@example.org', '+9996949476557', 'https://lorempixel.com/80/80/?81403', '2020-08-31 23:14:21', NULL),
(37, 1, 'Cruz', 'Stokes', 'dean.heathcote@example.net', '+4414412474787', 'https://lorempixel.com/80/80/?48678', '2020-08-31 23:14:21', NULL),
(38, 1, 'Brielle', 'Stanton', 'ihuels@example.com', '+7607608309599', 'https://lorempixel.com/80/80/?98388', '2020-08-31 23:14:21', NULL),
(39, 1, 'Pearline', 'Keeling', 'colten.lynch@example.net', '+5685092565814', 'https://lorempixel.com/80/80/?83566', '2020-08-31 23:14:21', NULL),
(40, 1, 'Vida', 'Douglas', 'dfunk@example.org', '+3637449382860', 'https://lorempixel.com/80/80/?78868', '2020-08-31 23:14:21', NULL),
(41, 1, 'Sunny', 'Nicolas', 'makenna.schuppe@example.com', '+5726658035118', 'https://lorempixel.com/80/80/?19380', '2020-08-31 23:14:21', NULL),
(42, 1, 'Ignatius', 'Bechtelar', 'cstroman@example.org', '+6660020947925', 'https://lorempixel.com/80/80/?67262', '2020-08-31 23:14:21', NULL),
(43, 1, 'Wallace', 'Kling', 'cjakubowski@example.com', '+8091648917116', 'https://lorempixel.com/80/80/?80283', '2020-08-31 23:14:21', NULL),
(44, 1, 'Verlie', 'Muller', 'pstanton@example.net', '+4957479190827', 'https://lorempixel.com/80/80/?43374', '2020-08-31 23:14:21', NULL),
(45, 1, 'Tyrese', 'Rutherford', 'lionel.zieme@example.com', '+8265470004049', 'https://lorempixel.com/80/80/?12176', '2020-08-31 23:14:21', NULL),
(46, 1, 'Kiarra', 'Fadel', 'taya11@example.net', '+3539504227254', 'https://lorempixel.com/80/80/?69937', '2020-08-31 23:14:21', NULL),
(47, 1, 'Kasey', 'DuBuque', 'karelle17@example.com', '+7842426137189', 'https://lorempixel.com/80/80/?69124', '2020-08-31 23:14:21', NULL),
(48, 1, 'Kyra', 'Dickens', 'graham.libby@example.net', '+7201684376096', 'https://lorempixel.com/80/80/?79079', '2020-08-31 23:14:21', NULL),
(49, 1, 'Wilma', 'Kuvalis', 'fahey.pedro@example.com', '+7591471233458', 'https://lorempixel.com/80/80/?82777', '2020-08-31 23:14:21', NULL),
(50, 1, 'Ines', 'Doyle', 'amalia.okuneva@example.com', '+1271649109569', 'https://lorempixel.com/80/80/?44638', '2020-08-31 23:14:21', NULL),
(51, 2, 'Letitia', 'Dooley', 'alvera.stracke@example.com', '+3051687927894', 'https://lorempixel.com/80/80/?42677', '2020-08-31 23:14:21', NULL),
(52, 2, 'Karen', 'Hoeger', 'nnolan@example.com', '+7371457633872', 'https://lorempixel.com/80/80/?62546', '2020-08-31 23:14:21', NULL),
(53, 2, 'Henry', 'Dare', 'thomas67@example.com', '+4429658825980', 'https://lorempixel.com/80/80/?71286', '2020-08-31 23:14:21', NULL),
(54, 2, 'Coy', 'Rempel', 'beatty.sam@example.com', '+1838509561435', 'https://lorempixel.com/80/80/?35003', '2020-08-31 23:14:21', NULL),
(55, 2, 'Nelle', 'Labadie', 'lincoln.beahan@example.com', '+3050367211118', 'https://lorempixel.com/80/80/?32106', '2020-08-31 23:14:21', NULL),
(56, 2, 'Maiya', 'Greenfelder', 'mcassin@example.com', '+6150419562802', 'https://lorempixel.com/80/80/?47945', '2020-08-31 23:14:21', NULL),
(57, 2, 'Glenda', 'Feeney', 'gislason.evert@example.org', '+9783526830334', 'https://lorempixel.com/80/80/?93833', '2020-08-31 23:14:21', NULL),
(58, 2, 'Joseph', 'Zemlak', 'mazie.franecki@example.org', '+1960608231778', 'https://lorempixel.com/80/80/?31864', '2020-08-31 23:14:21', NULL),
(59, 2, 'Nestor', 'Dibbert', 'zkshlerin@example.com', '+7650377362016', 'https://lorempixel.com/80/80/?29282', '2020-08-31 23:14:21', NULL),
(60, 2, 'Hannah', 'Marquardt', 'cornell07@example.net', '+9925959035209', 'https://lorempixel.com/80/80/?59913', '2020-08-31 23:14:21', NULL),
(61, 2, 'Jamar', 'Franecki', 'eharber@example.com', '+4526205193679', 'https://lorempixel.com/80/80/?19194', '2020-08-31 23:14:21', NULL),
(62, 2, 'Barry', 'Feeney', 'qbruen@example.net', '+6245417498747', 'https://lorempixel.com/80/80/?89876', '2020-08-31 23:14:21', NULL),
(63, 2, 'Barbara', 'Kshlerin', 'tianna.bogan@example.net', '+5650277409173', 'https://lorempixel.com/80/80/?99742', '2020-08-31 23:14:21', NULL),
(64, 2, 'Marcelina', 'Schamberger', 'vkuphal@example.org', '+5944815679541', 'https://lorempixel.com/80/80/?63364', '2020-08-31 23:14:21', NULL),
(65, 2, 'Elliot', 'Heidenreich', 'okuneva.reynold@example.org', '+1844441459818', 'https://lorempixel.com/80/80/?57327', '2020-08-31 23:14:21', NULL),
(66, 2, 'Kathlyn', 'Wunsch', 'hlarkin@example.org', '+8834815028976', 'https://lorempixel.com/80/80/?20355', '2020-08-31 23:14:21', NULL),
(67, 2, 'Deion', 'West', 'mills.jaycee@example.com', '+7598447190474', 'https://lorempixel.com/80/80/?82501', '2020-08-31 23:14:21', NULL),
(68, 2, 'Elnora', 'Kuphal', 'ronaldo71@example.com', '+3584904558272', 'https://lorempixel.com/80/80/?34327', '2020-08-31 23:14:21', NULL),
(69, 2, 'Shana', 'O\'Keefe', 'ngislason@example.org', '+7520466106393', 'https://lorempixel.com/80/80/?19463', '2020-08-31 23:14:21', NULL),
(70, 2, 'Breanna', 'Ferry', 'winston87@example.com', '+9156953208431', 'https://lorempixel.com/80/80/?35842', '2020-08-31 23:14:21', NULL),
(71, 2, 'Hillary', 'Schowalter', 'reinhold89@example.com', '+7054261114664', 'https://lorempixel.com/80/80/?24692', '2020-08-31 23:14:21', NULL),
(72, 2, 'Orlo', 'Stanton', 'harris.kurtis@example.net', '+2069810298553', 'https://lorempixel.com/80/80/?44600', '2020-08-31 23:14:21', NULL),
(73, 2, 'Amiya', 'Moore', 'zulauf.unique@example.net', '+7172933937005', 'https://lorempixel.com/80/80/?41356', '2020-08-31 23:14:21', NULL),
(74, 2, 'Conner', 'Fay', 'fabiola.oreilly@example.com', '+2563980053050', 'https://lorempixel.com/80/80/?93789', '2020-08-31 23:14:21', NULL),
(75, 2, 'Douglas', 'Barton', 'aiden04@example.net', '+1994005063816', 'https://lorempixel.com/80/80/?42851', '2020-08-31 23:14:21', NULL),
(76, 2, 'Marshall', 'Barrows', 'destiney48@example.com', '+4132655661398', 'https://lorempixel.com/80/80/?81352', '2020-08-31 23:14:21', NULL),
(77, 2, 'Jarod', 'Wiegand', 'wilderman.godfrey@example.net', '+8955639117752', 'https://lorempixel.com/80/80/?97699', '2020-08-31 23:14:21', NULL),
(78, 2, 'Judge', 'Leannon', 'uriel55@example.com', '+7212761118739', 'https://lorempixel.com/80/80/?21216', '2020-08-31 23:14:21', NULL),
(79, 2, 'Katrina', 'Crooks', 'bartoletti.orpha@example.net', '+8264877076553', 'https://lorempixel.com/80/80/?35047', '2020-08-31 23:14:21', NULL),
(80, 2, 'Alyson', 'Rath', 'abigale49@example.net', '+2203941503590', 'https://lorempixel.com/80/80/?57709', '2020-08-31 23:14:21', NULL),
(81, 2, 'Aglae', 'Pfeffer', 'cara01@example.com', '+6041331884486', 'https://lorempixel.com/80/80/?97049', '2020-08-31 23:14:21', NULL),
(82, 2, 'Rae', 'Heidenreich', 'madams@example.net', '+8512780009533', 'https://lorempixel.com/80/80/?71007', '2020-08-31 23:14:21', NULL),
(83, 2, 'Clara', 'Price', 'sledner@example.org', '+8951290442400', 'https://lorempixel.com/80/80/?98940', '2020-08-31 23:14:21', NULL),
(84, 2, 'Russell', 'Greenfelder', 'ophelia95@example.net', '+3850390566986', 'https://lorempixel.com/80/80/?38452', '2020-08-31 23:14:21', NULL),
(85, 2, 'Fredrick', 'Gulgowski', 'toreilly@example.com', '+5438441066624', 'https://lorempixel.com/80/80/?44745', '2020-08-31 23:14:21', NULL),
(86, 2, 'Golden', 'White', 'anderson.kip@example.com', '+1287247741475', 'https://lorempixel.com/80/80/?94638', '2020-08-31 23:14:21', NULL),
(87, 2, 'Emile', 'Olson', 'ssipes@example.org', '+6011228125875', 'https://lorempixel.com/80/80/?69566', '2020-08-31 23:14:21', NULL),
(88, 2, 'Lazaro', 'Mosciski', 'swindler@example.net', '+6449459500216', 'https://lorempixel.com/80/80/?85995', '2020-08-31 23:14:21', NULL),
(89, 2, 'Jamir', 'Hettinger', 'dickinson.lawson@example.org', '+9770376716439', 'https://lorempixel.com/80/80/?74628', '2020-08-31 23:14:21', NULL),
(90, 2, 'Mark', 'Zemlak', 'patsy18@example.com', '+7296177407959', 'https://lorempixel.com/80/80/?48023', '2020-08-31 23:14:21', NULL),
(91, 2, 'Mable', 'Rice', 'isadore62@example.com', '+2348486021636', 'https://lorempixel.com/80/80/?38406', '2020-08-31 23:14:21', NULL),
(92, 2, 'Brandi', 'Conroy', 'jenkins.rebeka@example.net', '+4645959875354', 'https://lorempixel.com/80/80/?86171', '2020-08-31 23:14:21', NULL),
(93, 2, 'Chaim', 'Fritsch', 'carmen85@example.com', '+8866901690952', 'https://lorempixel.com/80/80/?84690', '2020-08-31 23:14:21', NULL),
(94, 2, 'Demario', 'Bergnaum', 'bettie28@example.org', '+5140884917479', 'https://lorempixel.com/80/80/?67750', '2020-08-31 23:14:21', NULL),
(95, 2, 'Stanley', 'Abshire', 'buckridge.tre@example.com', '+3310822576479', 'https://lorempixel.com/80/80/?49710', '2020-08-31 23:14:21', NULL),
(96, 2, 'Aletha', 'Ritchie', 'eloisa.hodkiewicz@example.net', '+2597412870392', 'https://lorempixel.com/80/80/?78727', '2020-08-31 23:14:21', NULL),
(97, 2, 'Nina', 'VonRueden', 'rosetta01@example.net', '+9331401483982', 'https://lorempixel.com/80/80/?16081', '2020-08-31 23:14:21', NULL),
(98, 2, 'Mona', 'Langosh', 'cmarks@example.com', '+8527080163209', 'https://lorempixel.com/80/80/?97302', '2020-08-31 23:14:21', NULL),
(99, 2, 'Rusty', 'Carroll', 'sasha.becker@example.com', '+5588275726897', 'https://lorempixel.com/80/80/?72687', '2020-08-31 23:14:21', NULL),
(100, 2, 'Mikel', 'Carter', 'mikel52@example.com', '+3154878590955', 'https://lorempixel.com/80/80/?39900', '2020-08-31 23:14:21', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `phinxlog`
--

CREATE TABLE `phinxlog` (
  `version` bigint(20) NOT NULL,
  `migration_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `start_time` timestamp NULL DEFAULT NULL,
  `end_time` timestamp NULL DEFAULT NULL,
  `breakpoint` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `phinxlog`
--

INSERT INTO `phinxlog` (`version`, `migration_name`, `start_time`, `end_time`, `breakpoint`) VALUES
(20200403000812, 'CreateUsersTable', '2020-08-31 23:14:20', '2020-08-31 23:14:20', 0),
(20200828103117, 'CreateContactsTable', '2020-08-31 23:14:20', '2020-08-31 23:14:20', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `login` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `email`, `is_admin`, `created_at`, `updated_at`) VALUES
(1, 'test', '$2y$10$HcmW2msmEcGCnbQ4///xT.JIUj1lADKt97uOEHMG4R5wYZAkCP2eC', 'schimmel.sonya@padberg.com', 0, '2020-08-31 23:14:21', NULL),
(2, 'ukonopelski', '$2y$10$iIhpW/e0wUtkBiZaUO2v1egtwRXmTYFpt1.u.8z.aaexJyX1It7Me', 'shields.heath@mitchell.biz', 0, '2020-08-31 23:14:21', NULL);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `phinxlog`
--
ALTER TABLE `phinxlog`
  ADD PRIMARY KEY (`version`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
