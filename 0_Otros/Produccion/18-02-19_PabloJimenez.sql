ALTER TABLE `users` CHANGE `password` `password` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL;
ALTER TABLE `usuarios_contacto` CHANGE `bo_estado` `bo_activo` TINYINT(1) NOT NULL DEFAULT '1';

--
-- Volcado de datos para la tabla `usuarios_tipo_contacto`
--

INSERT INTO `usuarios_tipo_contacto` (`id_usuario_tipo_contacto`, `gl_nombre`) VALUES
(1, 'Teléfono Fijo'),
(2, 'Teléfono Movil'),
(3, 'Dirección'),
(4, 'Email'),
(5, 'Casilla Postal');


#show index from users;
drop index users_name_unique on users;


ALTER TABLE `grupos_formacion_usuarios` CHANGE `fc_ingreso` `fc_ingreso` DATE NULL DEFAULT NULL;
