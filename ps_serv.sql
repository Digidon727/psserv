-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Дек 29 2022 г., 06:52
-- Версия сервера: 8.0.29
-- Версия PHP: 8.0.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `ps_serv`
--

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `email`, `name`, `password`, `token`) VALUES
(83, 'ivntik77@gmail.com', 'Ivan', '$2y$10$fc/EREg7MdzZCrVv8Ree4.om5x8sJk3SUmihllLZdkdMT941D7Q7K', 'xWTZVQjn9oZ0GkP8FqXiclXFIxvwfNcZx1Aahnkdm6DR7JoanCtpGiRi8HLhn3zV'),
(84, 'ivntik@gmail.com', 'ivntik@gmail.com', '$2y$10$QaHmzub9wW0sIc9XOkADLuOx7bGb4yMT0g6QvlqSmPiAaRgQgqQja', 'xWTZVQjn9oZ0GkP8FqXiclXFIxvwfNcZx1Aahnkdm6DR7JoanCtpGiRi8HLhn3zV');

-- --------------------------------------------------------

--
-- Структура таблицы `user_register`
--

CREATE TABLE `user_register` (
  `id` int UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `status` varchar(255) NOT NULL,
  `device_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `model` varchar(255) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` int NOT NULL,
  `master` varchar(100) NOT NULL,
  `is_public` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `user_register`
--

INSERT INTO `user_register` (`id`, `date`, `status`, `device_type`, `model`, `name`, `phone`, `master`, `is_public`) VALUES
(1, '2022-12-29', 'Приняты', 'Системный блок', 'i3', 'Иванов Сергеевич', 555207565, 'Антон Русланович', 1),
(2, '2022-12-27', 'qwer', 'qwer', '213as', 'иван', 132412, 'Антон', 1),
(3, '2022-12-27', 'qwer', 'qwer', '213as', 'иван', 13241234, 'Антон', 1),
(4, '2022-12-27', '', 'qwer', '213as', 'иван', 13241234, 'Антон', 1),
(5, '2022-12-27', '', 'qwer', '213as', 'иван', 13241234, 'Антон', 1),
(6, '2022-12-28', 'Выданные', 'принтер', '213as', 'иван', 13241234, 'Антон', 1),
(7, '2022-12-28', 'Приняты', 'Телефон', '213as', 'Петров', 132, 'Антон Русланович', 0),
(8, '2022-12-29', 'Приняты', 'Ноутбук', 'ASUS', 'Никита', 596554548, 'Антон', 1),
(9, '2022-12-28', 'Приняты', 'PC', 'ASUS', 'Андрей', 556556565, 'Тихонов Иван', 1),
(10, '2022-12-28', 'Выданные', 'PC', 'ASUS', 'Андрей', 556556565, 'Тихонов Иван', 1),
(11, '2022-12-28', 'Выданные', 'PC', 'ASUS', 'Андрей', 556556565, 'Тихонов Иван', 1),
(12, '2022-12-28', 'Приняты', 'принтер', '213as', 'иван', 13241234, 'Антон', 0),
(13, '2022-12-22', 'Выданные', 'принтер', '213as', 'иван', 13241234, 'Антон', 1),
(14, '2022-12-22', 'Выданные', 'принтер', '213as', 'иван', 13241234, 'Антон', 1),
(16, '2022-12-28', 'Выданные', 'принтер', '213as ASUS', 'Андрей', 789798798, 'Тихонов Иван', 1),
(17, '2022-12-28', 'Приняты', 'qwer', '213as', 'иван', 13241234, 'Тихонов Иван', 0),
(18, '2022-12-28', 'Приняты', 'qwer', '213as', 'иван', 13241234, 'Тихонов Иван', 1),
(19, '2022-12-03', 'Выданные', 'принтер', 'ASUS', 'Андрей', 13241234, 'Тихонов Иван', 0),
(20, '2022-12-25', 'Приняты', 'принтер', '213as', 'Андрей', 13241234, 'Тихонов Иван', 1),
(21, '2022-12-27', 'Приняты', 'принтер', '213as', 'Андрей', 13241234, 'Тихонов Иван', 0),
(22, '2022-12-29', 'Приняты', 'принтер', '213as', 'иван', 13241234, 'Антон', 0),
(23, '2022-12-30', 'Выданные', 'принтер', '213as', 'иван', 13241234, 'Антон', 0),
(24, '2022-12-29', 'Приняты', 'принтер', '213as', 'иван', 13241234, 'Антон', 0),
(25, '2022-12-29', 'Приняты', 'принтер', '213as', 'иван', 13241234, 'Антон', 0),
(26, '2022-12-02', 'Приняты', 'принтер', '213as', 'иван', 13241234, 'Антон', 1),
(27, '2022-12-02', 'Приняты', 'принтер', '213as', 'иван', 13241234, 'Антон', 1),
(28, '2022-12-29', 'Приняты', 'принтер', 'ASUS', 'Никита', 13241234, 'Антон', 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Индексы таблицы `user_register`
--
ALTER TABLE `user_register`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT для таблицы `user_register`
--
ALTER TABLE `user_register`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
