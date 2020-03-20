-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos_jovenes`
--

CREATE TABLE `datos_jovenes` (
  `id_datos_jovenes` int(11) UNSIGNED NOT NULL,
  `gl_rut` varchar(99) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gl_nombres` varchar(99) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gl_apellidos` varchar(99) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nr_telefono` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gl_email` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gl_ciudad` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gl_calle` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nr_calle` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `json_otros_datos` text COLLATE utf8_unicode_ci,
  `id_region` int(11) UNSIGNED DEFAULT NULL,
  `id_comuna` int(11) UNSIGNED DEFAULT NULL,
  `fc_nacimiento` date DEFAULT NULL,
  `gl_sexo` char(1) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'M/F',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `datos_jovenes`
--
ALTER TABLE `datos_jovenes`
  ADD PRIMARY KEY (`id_datos_jovenes`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `datos_jovenes`
--
ALTER TABLE `datos_jovenes`
  MODIFY `id_datos_jovenes` int(1) UNSIGNED NOT NULL AUTO_INCREMENT;