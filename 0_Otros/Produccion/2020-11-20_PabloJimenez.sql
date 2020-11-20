-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos_encuesta_jovenes`
--

CREATE TABLE `datos_encuesta_jovenes` (
  `id_datos_encuesta_joven` int(11) NOT NULL,
  `gl_rut` varchar(250) NOT NULL,
  `gl_ciudad_verano` varchar(250) NOT NULL,
  `gl_participarias` varchar(250) NOT NULL,
  `gl_ciudad` varchar(250) NOT NULL,
  `gl_dia_actividad` varchar(250) NOT NULL,
  `gl_fin_semestre` varchar(250) NOT NULL,
  `gl_tematica_clubs` varchar(250) NOT NULL,
  `gl_retiro` varchar(250) NOT NULL,
  `gl_dia_retiro` varchar(250) NOT NULL,
  `gl_seminario` varchar(250) NOT NULL,
  `gl_dia_seminario` varchar(250) NOT NULL,
  `gl_actividades` varchar(250) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `datos_encuesta_jovenes`
--
ALTER TABLE `datos_encuesta_jovenes`
  ADD PRIMARY KEY (`id_datos_encuesta_joven`),
  ADD UNIQUE KEY `gl_rut` (`gl_rut`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `datos_encuesta_jovenes`
--
ALTER TABLE `datos_encuesta_jovenes`
  MODIFY `id_datos_encuesta_joven` int(11) NOT NULL AUTO_INCREMENT;