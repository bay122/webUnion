##Se crea tabla grupos_formacion, para grupos de vida, dispulado y pcm
#o ministerios de formación en general

--
-- Base de datos: `pan_con_queso`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupos_formacion`
--

CREATE TABLE `grupos_formacion` (
  `id_grupo_formacion` int(11) NOT NULL,
  `id_ministerio` int(11) NOT NULL,
  `id_ministerio_departamento` int(11) DEFAULT NULL,
  `nr_cupo_maximo` int(11) DEFAULT NULL,
  `nr_cupo_minimo` int(11) DEFAULT NULL,
  `fc_estimada_inicio` date DEFAULT NULL,
  `fc_inicio` date DEFAULT NULL,
  `fc_estimada_fin` date DEFAULT NULL,
  `fc_fin` date DEFAULT NULL,
  `bo_estado` int(1) NOT NULL DEFAULT '1',
  `json_datos` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `grupos_formacion`
--
ALTER TABLE `grupos_formacion`
  ADD PRIMARY KEY (`id_grupo_formacion`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `grupos_formacion`
--
ALTER TABLE `grupos_formacion`
  MODIFY `id_grupo_formacion` int(11) NOT NULL AUTO_INCREMENT;



##Correccion en ministerios_departamentos
ALTER TABLE `ministerios_departamentos` CHANGE `gl_nombre` `gl_nombre` VARCHAR(120) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL;