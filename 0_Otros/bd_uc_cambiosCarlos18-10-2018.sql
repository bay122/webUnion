-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-10-2018 a las 06:37:29
-- Versión del servidor: 10.1.33-MariaDB
-- Versión de PHP: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_uc`
--

-- --------------------------------------------------------



CREATE TABLE `contacts` (
  `id` int(11) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `message` text COLLATE utf8_unicode_ci NOT NULL,
  `id_ministerio` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `contacts`
--

INSERT INTO `contacts` (`id`, `created_at`, `updated_at`, `name`, `email`, `message`, `id_ministerio`) VALUES
(1, '2018-08-13 04:56:52', '2018-08-13 04:56:52', 'Yessenia Ondricka', 'ole.reilly@example.com', 'YET,\' she said to a mouse: she had put the hookah out of the trees upon her arm, with its legs hanging down, but generally, just as she could. The next thing is, to get out again. The rabbit-hole.', NULL),
(2, '2018-08-13 04:56:52', '2018-08-13 04:56:52', 'Heloise Schulist', 'ebba.hayes@example.org', 'And here Alice began telling them her adventures from the trees as well as she spoke; \'either you or your head must be what he did not appear, and after a minute or two the Caterpillar took the.', NULL),
(3, '2018-08-13 04:56:52', '2018-08-13 04:56:52', 'Mrs. Fleta Schinner', 'ghyatt@example.org', 'Alice, who felt very curious to know your history, you know,\' Alice gently remarked; \'they\'d have been changed in the air: it puzzled her too much, so she helped herself to some tea and.', NULL),
(4, '2018-08-13 04:56:52', '2018-08-13 04:56:52', 'Bernhard Schneider', 'claude.vandervort@example.org', 'I think I could, if I must, I must,\' the King said gravely, \'and go on in the direction it pointed to, without trying to invent something!\' \'I--I\'m a little faster?\" said a timid voice at her side.', NULL),
(5, '2018-08-13 04:56:52', '2018-08-13 04:56:52', 'Emilia Kuvalis', 'dkoss@example.org', 'Duchess said to herself; \'his eyes are so VERY much out of the house down!\' said the Hatter; \'so I can\'t understand it myself to begin with; and being ordered about by mice and rabbits. I almost.', NULL),
(6, '2018-08-13 04:56:54', '2018-08-13 04:56:54', 'Softagonopoulos', 'grady.marlen@example.org', 'Panther were sharing a pie--\' [later editions continued as follows The Panther took pie-crust, and gravy, and meat, While the Panther were sharing a pie--\' [later editions continued as follows When.', NULL);

-- --------------------------------------------------------


--
-- Estructura de tabla para la tabla `ministerios`
--

CREATE TABLE `ministerios` (
  `id_ministerio` int(11) NOT NULL,
  `gl_nombre` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_ministerio_tipo` int(11) UNSIGNED DEFAULT NULL,
  `gl_descripcion` varchar(99) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `ministerios`
--

INSERT INTO `ministerios` (`id_ministerio`, `gl_nombre`, `id_ministerio_tipo`, `gl_descripcion`, `created_at`, `updated_at`) VALUES
(1, 'Discipulado Fundamental', 1, 'Descripción Discipulado Fundamental', '2018-10-16 22:54:00', '2018-10-16 22:54:00'),
(2, 'Comunidad de Vida', 1, 'Descripción Comunidad de Vida', '2018-10-16 22:56:00', '2018-10-16 22:56:00'),
(3, 'Instituto de Capacitación Ministerial (ICM)', 1, 'Descripción ICM', '2018-10-16 22:57:00', '2018-10-16 22:57:00'),
(4, 'Niños y Adolescentes', 2, 'Descripción Ministerio de Niños y Adolescentes', '2018-10-16 22:58:00', '2018-10-16 22:59:00'),
(5, 'Jóvenes Intermedios', 2, 'Descripción Jóvenes Intermedios', '2018-10-17 01:01:00', '2018-10-17 01:02:00'),
(6, 'Jóvenes Adultos', 2, 'Descripción Jóvenes Adultos', '2018-10-17 01:03:00', '2018-10-17 01:04:00'),
(7, 'Matrimonios', 2, 'Descripción Matrimonios', '2018-10-17 01:05:00', '2018-10-17 01:06:00'),
(8, 'Damas', 2, 'Descripción Damas', '2018-10-17 01:07:00', '2018-10-17 01:08:00'),
(9, 'Varones', 2, 'Descripción Varones', '2018-10-17 01:09:00', '2018-10-17 01:10:00'),
(10, 'Años Dorados', 2, 'Descripción Años Dorados', '2018-10-17 01:11:00', '2018-10-17 01:12:00'),
(11, 'Misericordia', 3, 'Descripción Misericordia', '2018-10-17 01:20:00', '2018-10-17 01:21:00'),
(12, 'Misiones Transculturales', 3, 'Descripción Misiones Transculturales', '2018-10-17 01:22:00', '2018-10-17 01:23:00'),
(13, 'Música', 4, 'Descripción Ministerio de Música', '2018-10-17 01:25:00', '2018-10-17 01:26:00'),
(14, 'Oración ', 4, 'Descripción Oración ', '2018-10-17 01:27:00', '2018-10-17 01:28:00'),
(15, 'Medios', 4, 'Descripción Comunicación y Medios', '2018-10-17 01:31:00', '2018-10-17 01:32:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ministerios_tipos`
--

CREATE TABLE `ministerios_tipos` (
  `id_ministerio_tipo` int(11) NOT NULL,
  `gl_nombre` varchar(99) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gl_descripcion` varchar(99) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `ministerios_tipos`
--

INSERT INTO `ministerios_tipos` (`id_ministerio_tipo`, `gl_nombre`, `gl_descripcion`, `created_at`, `updated_at`) VALUES
(1, 'Enseñanza', 'Descripción Enseñanza', '2018-10-16 19:54:00', '2018-10-16 19:54:00'),
(2, 'Familia', 'Descripción Familia', '2018-10-16 19:54:00', '2018-10-16 19:54:00'),
(3, 'Misiones', 'Descripción Misiones', '2018-10-16 19:54:00', '2018-10-16 19:54:00'),
(4, 'Transversales', 'Descripción Transversales', '2018-10-16 19:54:00', '2018-10-16 19:54:00');



--
-- Indices de la tabla `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);


--
-- Indices de la tabla `ministerios`
--
ALTER TABLE `ministerios`
  ADD PRIMARY KEY (`id_ministerio`);

--
-- Indices de la tabla `ministerios_tipos`
--
ALTER TABLE `ministerios_tipos`
  ADD PRIMARY KEY (`id_ministerio_tipo`);


--
-- AUTO_INCREMENT de la tabla `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;


--
-- AUTO_INCREMENT de la tabla `ministerios`
--
ALTER TABLE `ministerios`
  MODIFY `id_ministerio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `ministerios_tipos`
--
ALTER TABLE `ministerios_tipos`
  MODIFY `id_ministerio_tipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;


