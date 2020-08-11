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
(1, 'menos de 1 año'),
(2, '1 a 3 años'),
(3, '3 a 6 años'),
(4, '6 a 10 años'),
(5, 'más de 10 años');

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