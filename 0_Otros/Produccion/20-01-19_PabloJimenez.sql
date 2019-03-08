##Se crea tabla grupos_formacion_usuarios, para grupos de vida, dispulado y pcm
#o ministerios de formación en general

--
-- Base de datos: `pan_con_queso`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupos_formacion_usuarios`
--

CREATE TABLE `grupos_formacion_usuarios` (
  `id_grupo_formacion` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `fc_ingreso` int(11) DEFAULT NULL,
  `bo_moredador` int(11) NOT NULL DEFAULT '0',
  `json_otros_datos` int(11) DEFAULT NULL,
  `id_usuario_crea` int(11) DEFAULT NULL,
  `id_usuario_actualiza` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


RENAME TABLE `usuario_ministerio` TO `usuarios_ministerios`;
RENAME TABLE `usuario_recomendaciones` TO `usuarios_recomendaciones`;


ALTER TABLE `usuarios_ministerios` CHANGE `id_usuario` `id_usuario` INT(11) UNSIGNED NULL DEFAULT NULL AFTER `id_usuario_ministerio`;
ALTER TABLE `usuarios_ministerios` CHANGE `id_ministerio` `id_ministerio` INT(11) UNSIGNED NULL DEFAULT NULL AFTER `id_usuario`;
ALTER TABLE `usuarios_ministerios` CHANGE `id_ministerio_departamento` `id_ministerio_departamento` INT(11) UNSIGNED NULL DEFAULT NULL AFTER `id_ministerio`;
ALTER TABLE `usuarios_ministerios` CHANGE `bo_directiva` `bo_directiva` TINYINT(1) NOT NULL DEFAULT '0' AFTER `id_ministerio_departamento`;
ALTER TABLE `users` ADD `bo_activo` INT(1) NOT NULL DEFAULT '1' COMMENT '1 = Activo' AFTER `bo_corporacion`;
