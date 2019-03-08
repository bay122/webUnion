-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 07-03-2019 a las 15:31:40
-- Versión del servidor: 5.7.22-0ubuntu0.16.04.1
-- Versión de PHP: 7.0.30-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de datos: `pan_con_queso`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfiles`
--

CREATE TABLE `perfiles` (
  `id_perfil` int(11) NOT NULL,
  `gl_nombre` varchar(99) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gl_descripcion` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_ministerio` int(11) DEFAULT NULL,
  `id_ministerio_departamento` int(11) DEFAULT NULL,
  `gl_json_permisos` text COLLATE utf8_unicode_ci,
  `bo_activo` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'Perfil activa (1: activo, 0: finalizado)',
  `bo_estado` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'Registro eliminado (1: activo, 0: eliminado)',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `perfiles`
--

INSERT INTO `perfiles` (`id_perfil`, `gl_nombre`, `gl_descripcion`, `id_ministerio`, `id_ministerio_departamento`, `gl_json_permisos`, `bo_activo`, `bo_estado`, `created_at`, `updated_at`) VALUES
(1, 'Lider Discipulado', 'Lider Discipulado', 1, NULL, '{"ver":1,"ingresar":1,"editar":1,"eliminar":1}', 1, 1, NULL, NULL),
(2, 'Directiva Discipulado', 'Directiva Discipulado', 1, NULL, '{"ver":1,"ingresar":1,"editar":1,"eliminar":1}', 1, 1, NULL, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `perfiles`
--
ALTER TABLE `perfiles`
  ADD PRIMARY KEY (`id_perfil`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `perfiles`
--
ALTER TABLE `perfiles`
  MODIFY `id_perfil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;


-- ------------------------------------------------------------------------------
-- ------------------------------------------------------------------------------


-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 07-03-2019 a las 15:32:07
-- Versión del servidor: 5.7.22-0ubuntu0.16.04.1
-- Versión de PHP: 7.0.30-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de datos: `pan_con_queso`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfiles_usuario`
--

CREATE TABLE `perfiles_usuario` (
  `id_perfil_usuario` int(11) NOT NULL,
  `id_perfil` int(11) UNSIGNED DEFAULT NULL,
  `id_usuario` int(11) UNSIGNED DEFAULT NULL,
  `bo_activo` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'Relación con el perfil activo (1: activo, 0: finalizado)',
  `bo_estado` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'Registro eliminado (1: activo, 0: eliminado)',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `perfiles_usuario`
--
ALTER TABLE `perfiles_usuario`
  ADD PRIMARY KEY (`id_perfil_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `perfiles_usuario`
--
ALTER TABLE `perfiles_usuario`
  MODIFY `id_perfil_usuario` int(11) NOT NULL AUTO_INCREMENT;