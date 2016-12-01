-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-12-2016 a las 03:25:03
-- Versión del servidor: 10.1.16-MariaDB
-- Versión de PHP: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `chatusip`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `chat`
--

CREATE TABLE `chat` (
  `id` int(11) NOT NULL,
  `userId` int(11) DEFAULT NULL,
  `message` text,
  `updateDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `chat`
--

INSERT INTO `chat` (`id`, `userId`, `message`, `updateDate`) VALUES
(1, 1, 'hola', '2016-11-28 00:19:31'),
(2, 1, 'sdasd', '2016-11-28 01:22:43'),
(3, 1, 'asd', '2016-11-28 02:12:33'),
(4, 2, 'hola', '2016-11-28 02:12:44'),
(5, 1, 'hola', '2016-11-28 02:14:48'),
(6, 2, 'sdfsdf', '2016-11-28 02:15:03'),
(7, 1, 'sdfsdf', '2016-11-28 02:15:34'),
(8, 1, '767', '2016-11-28 02:15:48'),
(9, 2, '5675645', '2016-11-28 02:16:25'),
(10, 1, 'sdfsd5435', '2016-11-28 02:17:27'),
(11, 1, 'dfgdfg', '2016-11-28 02:17:35'),
(12, 1, '7867h', '2016-11-28 02:17:58'),
(13, 2, 'dfg45', '2016-11-28 02:18:07'),
(14, 2, 'sdfsdf', '2016-11-28 02:19:07'),
(15, 2, 'hola asdasdasdas', '2016-11-28 02:19:13'),
(16, 1, 'funciona', '2016-11-28 02:19:32'),
(17, 1, 'si', '2016-11-28 02:20:10'),
(18, 2, 'pepe', '2016-11-28 02:21:21'),
(19, 3, 'q', '2016-11-28 02:21:31'),
(20, 1, 'xD', '2016-11-28 02:21:40'),
(21, 3, 'david marica', '2016-11-29 22:24:27'),
(22, 2, '.l.', '2016-11-29 22:24:40'),
(23, 1, 'hola', '2016-11-30 13:58:14'),
(24, 3, 'q', '2016-11-30 13:58:19');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1480291605),
('m130524_201442_init', 1480291608);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `Id` int(11) NOT NULL,
  `Rol` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`Id`, `Rol`) VALUES
(1, 'Administrador'),
(2, 'Usuario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `session_frontend_user`
--

CREATE TABLE `session_frontend_user` (
  `id` char(80) NOT NULL,
  `user_id` int(11) NOT NULL,
  `ip` varchar(15) CHARACTER SET utf8 NOT NULL,
  `expire` int(11) DEFAULT NULL,
  `data` longblob
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `session_frontend_user`
--

INSERT INTO `session_frontend_user` (`id`, `user_id`, `ip`, `expire`, `data`) VALUES
('k45opspvc14on26qnj6v0veo70', 3, '::1', 1480529374, 0x5f5f666c6173687c613a303a7b7d5f5f69647c693a333b);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `Id_Rol` int(11) NOT NULL DEFAULT '2'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`, `Id_Rol`) VALUES
(1, 'sergio', 'jgeK7EXGJb1ZEQT-m9DWlwyeCEM8MXbX', '$2y$13$8mN9nNZGHYu4.w.Ze8NNTewh5OKvlRj/LFCQC/sYzna5eSDEUcJBq', NULL, 'sergio@gmail.com', 10, 1480292339, 1480292339, 2),
(2, 'cristian', '2FK-9Ek9PqPtVxDJVDYU4w9YsxW5lvcZ', '$2y$13$xrOO99UHBiPsklrrNm3.cOm.UzGqgNyErft8HD2ROf7a00Vo2seVe', NULL, 'cristian@gmail.com', 10, 1480296710, 1480296710, 2),
(3, 'pepe12', 'SYEHhxW9pX58aoDGXo7MD4xVbhmSmGDa', '$2y$13$SktYtpzfjtg9jzMJ2UL9VekDrcVapqTIAjgq286y/pxtXOwO9PLMK', NULL, 'pepe@gmail.com', 10, 1480299641, 1480299641, 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `session_frontend_user`
--
ALTER TABLE `session_frontend_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `expire` (`expire`),
  ADD KEY `user_id` (`user_id`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`),
  ADD KEY `Id_Rol` (`Id_Rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `session_frontend_user`
--
ALTER TABLE `session_frontend_user`
  ADD CONSTRAINT `session_frontend_user_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Filtros para la tabla `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`Id_Rol`) REFERENCES `roles` (`Id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
