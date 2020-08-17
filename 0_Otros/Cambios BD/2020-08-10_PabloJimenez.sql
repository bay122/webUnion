-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rangos_llegada_iglesia`
--

CREATE TABLE `rangos_llegada_iglesia` (
  `id_llegada_iglesia` int(11) NOT NULL,
  `gl_nombre` varchar(120) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `rangos_llegada_iglesia`
--

INSERT INTO `rangos_llegada_iglesia` (`id_llegada_iglesia`, `gl_nombre`) VALUES
(1, 'Menos De 1 Año'),
(2, '1 a 3 Años'),
(3, '4 a 6 Años'),
(4, '7 a 9 Años'),
(5, '10 Años o Más');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `rangos_llegada_iglesia`
--
ALTER TABLE `rangos_llegada_iglesia`
  ADD PRIMARY KEY (`id_llegada_iglesia`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `rangos_llegada_iglesia`
--
ALTER TABLE `rangos_llegada_iglesia`
  MODIFY `id_llegada_iglesia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;




-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos_miembros`
--

CREATE TABLE `datos_miembros` (
  `id_datos_miembro` int(11) UNSIGNED NOT NULL,
  `gl_rut` varchar(99) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_datos_jovenes` int(11) DEFAULT NULL,
  `gl_nombres` varchar(99) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gl_apellidos` varchar(99) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nr_telefono` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gl_email` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gl_ciudad` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gl_direccion` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Ingresada por Google Maps',
  `gl_latitud` decimal(20,15) DEFAULT NULL,
  `gl_longitud` decimal(20,15) DEFAULT NULL,
  `gl_calle` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Ingresada Por el Usuario',
  `nr_calle` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Ingresada Por el Usuario',
  `json_otros_datos` text COLLATE utf8_unicode_ci,
  `id_llegada_iglesia` int(11) DEFAULT NULL,
  `gl_llegada_iglesia` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_region` int(11) UNSIGNED DEFAULT NULL,
  `gl_nombre_region` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_comuna` int(11) UNSIGNED DEFAULT NULL,
  `gl_nombre_comuna` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fc_nacimiento` date DEFAULT NULL,
  `gl_sexo` char(1) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'M/F',
  `id_tipo_participacion` int(11) DEFAULT NULL,
  `gl_tipo_participacion` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bo_participa_ministerio` tinyint(1) DEFAULT NULL,
  `gl_ministerio` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bo_vive_con_ninos` tinyint(1) DEFAULT NULL,
  `nr_vive_con_ninos` tinyint(4) DEFAULT NULL,
  `bo_vive_con_adolescentes` tinyint(1) DEFAULT NULL,
  `nr_vive_con_adolescentes` tinyint(4) DEFAULT NULL,
  `bo_validar` tinyint(1) DEFAULT '0' COMMENT 'Sospechoso de spam. 1: requere Revision, 0:Mensaje seguro',
  `bo_spam` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0:No, 1:Si',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `datos_miembros`
--
ALTER TABLE `datos_miembros`
  ADD PRIMARY KEY (`id_datos_miembro`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `datos_miembros`
--
ALTER TABLE `datos_miembros`
  MODIFY `id_datos_miembro` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;