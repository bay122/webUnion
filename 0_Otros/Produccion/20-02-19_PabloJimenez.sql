ALTER TABLE `grupos_formacion` ADD `id_grupo_formacion_tipo` INT NULL DEFAULT NULL AFTER `id_ministerio_departamento`;
ALTER TABLE `grupos_formacion` ADD `id_grupo_formacion_tipos_sexo` INT NULL AFTER `id_grupo_formacion_tipo`;
ALTER TABLE `grupos_formacion` CHANGE `bo_estado` `bo_estado` INT(1) NOT NULL DEFAULT '1' COMMENT 'Registro eliminado (1: activo, 0: eliminado)';
ALTER TABLE `grupos_formacion` ADD `bo_activo` TINYINT(1) NOT NULL DEFAULT '1' COMMENT 'Relación con el ministerio activa (1: activo, 0: finalizado)' AFTER `fc_fin`;

ALTER TABLE `grupos_formacion` ADD `hr_inicio` TIME NULL DEFAULT NULL AFTER `nr_cupo_minimo`, 
							   ADD `hr_fin` TIME NULL DEFAULT NULL AFTER `hr_inicio`, 
							   ADD `nr_dia_semana` INT NULL DEFAULT NULL COMMENT 'día de la semana en el cual se realizara (1: lun, 2: mar, 3: mier, etc)' AFTER `hr_fin`;



-- --------------------------------------------------------

CREATE TABLE `grupos_formacion_tipos` (
  `id_grupo_formacion_tipo` int(11) NOT NULL,
  `id_ministerio` int(11) NOT NULL,
  `id_ministerio_departamento` int(11) DEFAULT NULL,
  `gl_nombre` varchar(120) NOT NULL,
  `gl_descripcion` varchar(255) DEFAULT NULL,
  `json_datos` text,
  `bo_activo` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `grupos_formacion_tipos`
--

INSERT INTO `grupos_formacion_tipos` (`id_grupo_formacion_tipo`, `id_ministerio`, `id_ministerio_departamento`, `gl_nombre`, `gl_descripcion`, `json_datos`, `bo_activo`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, 'Adolescentes', 'Adolescentes desde 12 hasta 18 años', '{"nr_edad_minima":12,"nr_edad_maxima":18}', 1, '2019-02-20 03:00:00', '2019-02-20 03:00:00'),
(2, 1, NULL, 'Jóvenes', 'Jóvenes desde 18 hasta 40 años', '{"nr_edad_minima":18,"nr_edad_maxima":40}', 1, '2019-02-20 03:00:00', '2019-02-20 03:00:00'),
(3, 1, NULL, 'Varones', 'Varones desde 40 hasta 60 años', '{"nr_edad_minima":40,"nr_edad_maxima":60}', 1, '2019-02-20 03:00:00', '2019-02-20 03:00:00'),
(4, 1, NULL, 'Damas', 'Damas desde 40 hasta 60 años', '{"nr_edad_minima":40,"nr_edad_maxima":60}', 1, '2019-02-20 03:00:00', '2019-02-20 03:00:00'),
(5, 1, NULL, 'Años Dorados', 'Ancianos desde 60 hasta 120 años', '{"nr_edad_minima":60,"nr_edad_maxima":120}', 1, '2019-02-20 03:00:00', '2019-02-20 03:00:00'),
(6, 1, NULL, 'Matrimonios', 'Matrimonios desde 18 hasta 120 años', '{"nr_edad_minima":18,"nr_edad_maxima":120}', 1, '2019-02-20 03:00:00', '2019-02-20 03:00:00');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `grupos_formacion_tipos`
--
ALTER TABLE `grupos_formacion_tipos`
  ADD PRIMARY KEY (`id_grupo_formacion_tipo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `grupos_formacion_tipos`
--
ALTER TABLE `grupos_formacion_tipos`
  MODIFY `id_grupo_formacion_tipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupos_formacion_tipos_sexo`
--

CREATE TABLE `grupos_formacion_tipos_sexo` (
  `id_grupo_formacion_tipos_sexo` int(11) NOT NULL,
  `gl_nombre` varchar(120) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `grupos_formacion_tipos_sexo`
--

INSERT INTO `grupos_formacion_tipos_sexo` (`id_grupo_formacion_tipos_sexo`, `gl_nombre`, `created_at`, `updated_at`) VALUES
(1, 'Masculino', '2019-02-20 06:00:00', '2019-02-20 06:00:00'),
(2, 'Femenino', '2019-02-20 06:00:00', '2019-02-20 06:00:00'),
(3, 'Mixto', '2019-02-20 06:00:00', '2019-02-20 06:00:00');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `grupos_formacion_tipos_sexo`
--
ALTER TABLE `grupos_formacion_tipos_sexo`
  ADD PRIMARY KEY (`id_grupo_formacion_tipos_sexo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `grupos_formacion_tipos_sexo`
--
ALTER TABLE `grupos_formacion_tipos_sexo`
  MODIFY `id_grupo_formacion_tipos_sexo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;






-- --------------------------------------------------------

--
-- Nuevos campos en grupos_formacion_usuarios
--
ALTER TABLE `grupos_formacion_usuarios` ADD `bo_activo` TINYINT(1) NOT NULL DEFAULT '1' COMMENT 'Relación con el ministerio activa (1: activo, 0: finalizado)' AFTER `json_otros_datos`, ADD `bo_estado` TINYINT(1) NOT NULL DEFAULT '1' COMMENT 'Registro eliminado (1: activo, 0: eliminado)' AFTER `bo_activo`;



ALTER TABLE `grupos_formacion_usuarios` ADD `id_grupo_formacion_usuario` INT NOT NULL AUTO_INCREMENT FIRST, ADD PRIMARY KEY (`id_grupo_formacion_usuario`);
ALTER TABLE `grupos_formacion_usuarios` CHANGE `json_otros_datos` `json_otros_datos` TEXT NULL DEFAULT NULL;
