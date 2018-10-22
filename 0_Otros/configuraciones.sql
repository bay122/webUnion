-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 31-08-2018 a las 03:44:55
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

--
-- Estructura de tabla para la tabla `configuraciones`
--

CREATE TABLE `configuraciones` (
  `id` int(10) UNSIGNED NOT NULL,
  `contenido` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `col` int(2) NOT NULL,
  `titulo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'Capsula',
  `categoria` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'Video',
  `fecha` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '2018',
  `descripcion` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `html` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estado` int(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `configuraciones`
--

INSERT INTO `configuraciones` (`id`, `contenido`, `col`, `descripcion`, `estado`, `created_at`, `updated_at`) VALUES
(1, '<iframe class=\"embed-responsive-item\" src=\"https://www.youtube.com/embed/1pV7i5mvkbo\" frameborder=\"0\" allow=\"autoplay; encrypted-media\" allowfullscreen></iframe>', 6, '<div class=\"padding-five fl-left bg-gray width-100\">\r\n                        <div class=\"blog-details text-center\">\r\n                            <h2 class=\"alt-font font-weight-600 title-small text-mid-gray margin-six no-margin-bottom text-uppercase entry-title blog-layout-title\">\r\n                                <a rel=\"bookmark\" href=\"http://wpdemos.themezaa.com/paperio/anchali/first-for-celebrity-news/\">Ácimos</a>\r\n                            </h2>\r\n                            <div class=\"margin-two-bottom no-margin-lr letter-spacing-2 text-extra-small text-uppercase border-bottom-mid-gray padding-one-bottom xs-margin-six display-inline-block\">\r\n                                <ul class=\"post-meta-box meta-box-style2 blog-layout-meta\">\r\n                                    <li>\r\n                                        <a rel=\"category tag\" class=\"text-link-light-gray blog-layout-meta-link\" href=\"#\">1° Corintios 5:6-8</a>\r\n                                    </li>\r\n                                    <li class=\"published\">25 Abril 2018</li>\r\n                                </ul>\r\n                            </div>\r\n                            <p class=\"margin-four-bottom xs-margin-eight-bottom sm-margin-five-bottom width-80 sm-width-100 margin-lr-auto entry-summary\">\r\n                                6 No es buena vuestra jactancia. ¿No sabéis que un poco de levadura leuda toda la masa?\r\n                                7 Limpiaos, pues, de la vieja levadura, para que seáis nueva masa, sin levadura como sois; porque nuestra pascua, que es Cristo, ya fue sacrificada por nosotros.\r\n                                8 Así que celebremos la fiesta, no con la vieja levadura, ni con la levadura de malicia y de maldad, sino con panes sin levadura, de sinceridad y de verdad.\r\n                            </p>\r\n                           \r\n                        </div>\r\n                    </div>', 1, '2018-08-20 03:00:00', '2018-08-30 07:47:30');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `configuraciones`
--
ALTER TABLE `configuraciones`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `configuraciones`
--
ALTER TABLE `configuraciones`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
