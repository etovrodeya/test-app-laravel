-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Авг 12 2019 г., 11:56
-- Версия сервера: 5.5.62
-- Версия PHP: 7.1.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `orders_app`
--

-- --------------------------------------------------------

--
-- Структура таблицы `addresses`
--

CREATE TABLE `addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `city` varchar(2) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `addresses`
--

INSERT INTO `addresses` (`id`, `city`, `address`, `created_at`, `updated_at`) VALUES
(1, 'NN', 'пл. Революции, 5А', '2019-08-11 16:48:13', '2019-08-11 16:48:13'),
(2, 'SP', 'ул. Ленина, 1', '2019-08-11 16:48:30', '2019-08-11 16:48:30');

-- --------------------------------------------------------

--
-- Структура таблицы `clients`
--

CREATE TABLE `clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `clients`
--

INSERT INTO `clients` (`id`, `first_name`, `last_name`, `phone`, `created_at`, `updated_at`) VALUES
(1, 'Иван', 'Иванов', '81112223344', '2019-08-11 16:48:59', '2019-08-11 16:48:59'),
(2, 'Петр', 'Петров', '84445557799', '2019-08-11 18:01:12', '2019-08-11 18:01:12'),
(3, 'Василий', 'Васильев', '86665557711', '2019-08-11 18:02:17', '2019-08-11 18:02:17');

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_08_09_104739_create_clients_table', 1),
(2, '2019_08_09_105121_create_addresses_table', 1),
(3, '2019_08_09_105122_create_tariffs_table', 1),
(4, '2019_08_09_105123_create_orders_table', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `clients_id` bigint(20) UNSIGNED NOT NULL,
  `tariffs_id` bigint(20) UNSIGNED NOT NULL,
  `addresses_id` bigint(20) UNSIGNED NOT NULL,
  `price` int(10) UNSIGNED NOT NULL,
  `count` int(10) UNSIGNED NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delivery_day` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `clients_id`, `tariffs_id`, `addresses_id`, `price`, `count`, `status`, `delivery_day`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 900, 1200, 'active', '2019-08-11', '2019-08-11 17:09:30', '2019-08-11 17:09:30'),
(2, 1, 2, 2, 1200, 800, 'active', '2019-08-15', '2019-08-11 17:09:45', '2019-08-11 17:09:45'),
(3, 1, 2, 2, 1200, 1100, 'active', '2019-08-15', '2019-08-11 17:09:53', '2019-08-11 17:09:53'),
(4, 1, 3, 1, 2500, 1100, 'active', '2019-08-11', '2019-08-11 17:09:59', '2019-08-11 17:09:59'),
(5, 1, 1, 1, 900, 900, 'active', '2019-08-11', '2019-08-11 17:43:36', '2019-08-11 17:43:36'),
(6, 2, 1, 1, 900, 900, 'active', '2019-08-11', '2019-08-11 18:01:12', '2019-08-11 18:01:12'),
(7, 2, 1, 1, 900, 1200, 'active', '2019-08-11', '2019-08-11 18:01:16', '2019-08-11 18:01:16'),
(8, 2, 2, 2, 1200, 1200, 'active', '2019-08-15', '2019-08-11 18:01:20', '2019-08-11 18:01:20'),
(9, 3, 1, 1, 900, 900, 'active', '2019-08-11', '2019-08-11 18:02:17', '2019-08-11 18:02:17'),
(10, 3, 1, 1, 900, 1200, 'active', '2019-08-11', '2019-08-11 18:02:25', '2019-08-11 18:02:25'),
(11, 3, 2, 2, 1200, 1200, 'active', '2019-08-15', '2019-08-11 18:02:27', '2019-08-11 18:02:27'),
(12, 3, 3, 1, 2500, 1200, 'active', '2019-08-11', '2019-08-11 18:02:29', '2019-08-11 18:02:29'),
(13, 3, 3, 1, 2500, 1200, 'active', '2019-08-11', '2019-08-11 19:51:06', '2019-08-11 19:51:06'),
(14, 3, 3, 1, 2500, 1200, 'active', '2019-08-11', '2019-08-11 19:51:07', '2019-08-11 19:51:07'),
(15, 2, 3, 1, 2500, 1200, 'active', '2019-08-11', '2019-08-11 19:51:38', '2019-08-11 19:51:38'),
(16, 2, 3, 1, 2500, 1200, 'active', '2019-08-11', '2019-08-11 19:51:38', '2019-08-11 19:51:38');

-- --------------------------------------------------------

--
-- Структура таблицы `tariffs`
--

CREATE TABLE `tariffs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(10) UNSIGNED NOT NULL,
  `discription` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `delivery_days` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(2) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `tariffs`
--

INSERT INTO `tariffs` (`id`, `title`, `price`, `discription`, `delivery_days`, `city`, `created_at`, `updated_at`) VALUES
(1, 'Первый тариф', 900, 'Ограничение по городам NN. Дни доставки Суббота, Воскресенье', '6 0', 'NN', '2019-08-11 16:45:52', '2019-08-11 16:45:52'),
(2, 'Второй тариф', 1200, 'Ограничение по городам SP. Дни доставки Четверг, Пятница', '4 5', 'SP', '2019-08-11 16:46:35', '2019-08-11 16:46:35'),
(3, 'Третий тариф', 2500, 'Ограничения по городам нет. Дни доставки любой день недели', '1 2 3 4 5 6 0', NULL, '2019-08-11 16:47:19', '2019-08-11 16:47:19');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `clients_phone_unique` (`phone`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_clients_id_foreign` (`clients_id`),
  ADD KEY `orders_tariffs_id_foreign` (`tariffs_id`),
  ADD KEY `orders_addresses_id_foreign` (`addresses_id`);

--
-- Индексы таблицы `tariffs`
--
ALTER TABLE `tariffs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `clients`
--
ALTER TABLE `clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT для таблицы `tariffs`
--
ALTER TABLE `tariffs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_addresses_id_foreign` FOREIGN KEY (`addresses_id`) REFERENCES `addresses` (`id`),
  ADD CONSTRAINT `orders_clients_id_foreign` FOREIGN KEY (`clients_id`) REFERENCES `clients` (`id`),
  ADD CONSTRAINT `orders_tariffs_id_foreign` FOREIGN KEY (`tariffs_id`) REFERENCES `tariffs` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
