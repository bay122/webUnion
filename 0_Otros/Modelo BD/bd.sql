-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-07-2018 a las 21:04:31
-- Versión del servidor: 10.1.31-MariaDB
-- Versión de PHP: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Base de datos: `webunion`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `title` varchar(99) NOT NULL DEFAULT 'NULL' COMMENT 'Unique',
  `slug` varchar(99) NOT NULL DEFAULT 'NULL' COMMENT 'unique, usado para rutas de web amigables'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `category_post`
--

CREATE TABLE `category_post` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `user_id_usuario` int(11) DEFAULT NULL,
  `post_id` int(11) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `lft` int(11) DEFAULT NULL COMMENT '????',
  `rgt` int(11) DEFAULT NULL,
  `depth` int(11) DEFAULT NULL,
  `body` mediumtext NOT NULL COMMENT 'cuerpo del comentario'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comunas`
--

CREATE TABLE `comunas` (
  `id_comuna` int(11) NOT NULL,
  `id_region` int(11) DEFAULT NULL,
  `gl_nombre_comuna` varchar(99) DEFAULT NULL,
  `gl_latitud` decimal(10,0) DEFAULT NULL,
  `gl_logintud` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `name` varchar(99) NOT NULL,
  `email` varchar(99) NOT NULL,
  `message` varchar(99) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingoings`
--

CREATE TABLE `ingoings` (
  `id` int(11) NOT NULL,
  `ingoing_id` int(11) DEFAULT NULL,
  `ingoing_type` varchar(99) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Funci�n desconosida';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ministerios`
--

CREATE TABLE `ministerios` (
  `id_ministerio` int(11) NOT NULL,
  `gl_nombre` varchar(120) DEFAULT NULL,
  `id_ministerio_tipo` int(11) DEFAULT NULL,
  `gl_descripcion` varchar(99) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ministerios_departamentos`
--

CREATE TABLE `ministerios_departamentos` (
  `id_ministerio_departamento` int(11) NOT NULL,
  `gl_nombre` int(11) DEFAULT NULL,
  `bo_activo` int(11) DEFAULT NULL,
  `id_ministerio_ministerio` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ministerios_tipos`
--

CREATE TABLE `ministerios_tipos` (
  `id_ministerio_tipo` int(11) NOT NULL,
  `gl_nombre` varchar(99) DEFAULT NULL,
  `gl_descripcion` varchar(99) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `type` varchar(99) NOT NULL,
  `notifiable` int(11) NOT NULL,
  `data` varchar(99) NOT NULL,
  `read_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paises`
--

CREATE TABLE `paises` (
  `id_pais` int(11) NOT NULL,
  `gl_nombre` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(99) NOT NULL,
  `slug` varchar(99) NOT NULL DEFAULT 'NULL' COMMENT 'para url amigables',
  `seo_title` varchar(99) DEFAULT NULL COMMENT 'para busqueda de indexadores de sitios',
  `excerpt` varchar(99) NOT NULL COMMENT '??????',
  `body` mediumtext NOT NULL COMMENT 'cuerpo del post',
  `meta_description` mediumtext NOT NULL COMMENT '????',
  `meta_keywords` mediumtext NOT NULL COMMENT '????',
  `active` bit(1) DEFAULT b'0' COMMENT 'Si el post se encuentra activo, y por ende, se lista en el s',
  `id_usuario` int(11) NOT NULL COMMENT 'Usuario que crea el post',
  `image` blob COMMENT 'Imagen del post'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `post_tag`
--

CREATE TABLE `post_tag` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `regiones`
--

CREATE TABLE `regiones` (
  `id_region` int(11) NOT NULL,
  `gl_nombre_region` varchar(99) DEFAULT NULL,
  `gl_nombre_corto` varchar(99) DEFAULT NULL,
  `gl_latitud` decimal(10,0) DEFAULT NULL,
  `gl_longitud` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `gl_nombre` varchar(99) DEFAULT NULL,
  `gl_json_permisos` varchar(99) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles_usuario`
--

CREATE TABLE `roles_usuario` (
  `id` int(11) NOT NULL,
  `id_rol` int(11) DEFAULT NULL,
  `id_usuario_usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tags`
--

CREATE TABLE `tags` (
  `id` int(11) NOT NULL,
  `tag` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `name` varchar(99) NOT NULL DEFAULT 'NULL' COMMENT 'name esta en "unique"',
  `email` varchar(99) DEFAULT NULL,
  `password` varchar(99) NOT NULL DEFAULT 'NULL' COMMENT 'Encriptado con SHA1',
  `rol` varchar(40) DEFAULT NULL,
  `size` enum('user','tripulante','admin') DEFAULT NULL,
  `valid` bit(1) NOT NULL DEFAULT b'0',
  `bo_bloqueado` int(11) NOT NULL DEFAULT '0',
  `bo_tripulante` int(11) NOT NULL DEFAULT '0',
  `bo_corporacion` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios_auditoria`
--

CREATE TABLE `usuarios_auditoria` (
  `id_usuario_auditoria` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `ultimo_login` datetime NOT NULL,
  `id_publica` varchar(99) DEFAULT NULL,
  `gl_tipo_medio` varchar(99) NOT NULL DEFAULT 'WEB'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios_contacto`
--

CREATE TABLE `usuarios_contacto` (
  `id_usuario_contacto` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `id_usuario_tipo_contacto` int(11) DEFAULT NULL,
  `bo_estado` bit(1) DEFAULT NULL,
  `gl_json_dato_contacto` varchar(99) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios_datos`
--

CREATE TABLE `usuarios_datos` (
  `id_usuarios_datos` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `gl_rut` varchar(99) DEFAULT NULL,
  `gl_nombres` varchar(99) DEFAULT NULL,
  `gl_apellido_paterno` varchar(99) DEFAULT NULL,
  `gl_apellido_materno` varchar(99) DEFAULT NULL,
  `id_region` int(11) DEFAULT NULL,
  `id_comuna` int(11) DEFAULT NULL,
  `fc_llegada_iglesia` date DEFAULT NULL,
  `fc_nacimiento` date DEFAULT NULL,
  `id_pais_origen` int(11) DEFAULT NULL,
  `id_nacionalidad` int(11) DEFAULT NULL,
  `gl_sexo` varchar(40) DEFAULT NULL,
  `size` enum('Masculino','Femenino') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios_tipo_contacto`
--

CREATE TABLE `usuarios_tipo_contacto` (
  `id_usuario_tipo_contacto` int(11) NOT NULL,
  `gl_nombre` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_ministerio`
--

CREATE TABLE `usuario_ministerio` (
  `id_usuario_ministerio` int(11) NOT NULL,
  `bo_participante` bit(1) NOT NULL DEFAULT b'1',
  `bo_equipo_trabajo` bit(1) NOT NULL DEFAULT b'0',
  `bo_directiva` bit(1) NOT NULL DEFAULT b'0',
  `bo_activo` bit(1) DEFAULT NULL,
  `fc_inicio` date NOT NULL,
  `fc_fin` date DEFAULT NULL,
  `id_ministerio_departamento` int(11) DEFAULT NULL,
  `id_ministerio` int(11) DEFAULT NULL,
  `id_usuario_users` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_ministerio_formacion`
--

CREATE TABLE `usuario_ministerio_formacion` (
  `id_usuario_ministerio_formacion` int(11) NOT NULL,
  `bo_participante` bit(1) NOT NULL DEFAULT b'1',
  `bo_activo` bit(1) NOT NULL,
  `fc_inicio` date DEFAULT NULL,
  `fc_fin` date DEFAULT NULL,
  `bo_finalizado` bit(1) NOT NULL DEFAULT b'0',
  `id_ministerio` int(11) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_recomendaciones`
--

CREATE TABLE `usuario_recomendaciones` (
  `id_usuario_recomendaciones` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `id_usuario_recomendado` int(11) DEFAULT NULL COMMENT 'Campo no obligatorio, la persona recomendada podr�a no ser n',
  `gl_json_datos_contacto` varchar(99) DEFAULT NULL,
  `fc_recomendacion` date DEFAULT NULL COMMENT 'se podr�a prescindir de este campo si se utiliza el campo de',
  `fc_entrada_vigencia` date DEFAULT NULL,
  `id_ministerio` int(11) DEFAULT NULL,
  `id_departamento` int(11) DEFAULT NULL,
  `gl_comentario` mediumtext
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `category_post`
--
ALTER TABLE `category_post`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id_usuario` (`user_id_usuario`);

--
-- Indices de la tabla `comunas`
--
ALTER TABLE `comunas`
  ADD PRIMARY KEY (`id_comuna`);

--
-- Indices de la tabla `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ingoings`
--
ALTER TABLE `ingoings`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ministerios`
--
ALTER TABLE `ministerios`
  ADD PRIMARY KEY (`id_ministerio`);

--
-- Indices de la tabla `ministerios_departamentos`
--
ALTER TABLE `ministerios_departamentos`
  ADD PRIMARY KEY (`id_ministerio_departamento`);

--
-- Indices de la tabla `ministerios_tipos`
--
ALTER TABLE `ministerios_tipos`
  ADD PRIMARY KEY (`id_ministerio_tipo`);

--
-- Indices de la tabla `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `paises`
--
ALTER TABLE `paises`
  ADD PRIMARY KEY (`id_pais`);

--
-- Indices de la tabla `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `post_tag`
--
ALTER TABLE `post_tag`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `regiones`
--
ALTER TABLE `regiones`
  ADD PRIMARY KEY (`id_region`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `roles_usuario`
--
ALTER TABLE `roles_usuario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- Indices de la tabla `usuarios_auditoria`
--
ALTER TABLE `usuarios_auditoria`
  ADD PRIMARY KEY (`id_usuario_auditoria`);

--
-- Indices de la tabla `usuarios_contacto`
--
ALTER TABLE `usuarios_contacto`
  ADD PRIMARY KEY (`id_usuario_contacto`);

--
-- Indices de la tabla `usuarios_datos`
--
ALTER TABLE `usuarios_datos`
  ADD PRIMARY KEY (`id_usuarios_datos`);

--
-- Indices de la tabla `usuarios_tipo_contacto`
--
ALTER TABLE `usuarios_tipo_contacto`
  ADD PRIMARY KEY (`id_usuario_tipo_contacto`);

--
-- Indices de la tabla `usuario_ministerio`
--
ALTER TABLE `usuario_ministerio`
  ADD PRIMARY KEY (`id_usuario_ministerio`);

--
-- Indices de la tabla `usuario_ministerio_formacion`
--
ALTER TABLE `usuario_ministerio_formacion`
  ADD PRIMARY KEY (`id_usuario_ministerio_formacion`);

--
-- Indices de la tabla `usuario_recomendaciones`
--
ALTER TABLE `usuario_recomendaciones`
  ADD PRIMARY KEY (`id_usuario_recomendaciones`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `category_post`
--
ALTER TABLE `category_post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `comunas`
--
ALTER TABLE `comunas`
  MODIFY `id_comuna` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ingoings`
--
ALTER TABLE `ingoings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ministerios`
--
ALTER TABLE `ministerios`
  MODIFY `id_ministerio` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ministerios_departamentos`
--
ALTER TABLE `ministerios_departamentos`
  MODIFY `id_ministerio_departamento` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ministerios_tipos`
--
ALTER TABLE `ministerios_tipos`
  MODIFY `id_ministerio_tipo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `paises`
--
ALTER TABLE `paises`
  MODIFY `id_pais` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `post_tag`
--
ALTER TABLE `post_tag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `regiones`
--
ALTER TABLE `regiones`
  MODIFY `id_region` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `roles_usuario`
--
ALTER TABLE `roles_usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios_auditoria`
--
ALTER TABLE `usuarios_auditoria`
  MODIFY `id_usuario_auditoria` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios_contacto`
--
ALTER TABLE `usuarios_contacto`
  MODIFY `id_usuario_contacto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios_datos`
--
ALTER TABLE `usuarios_datos`
  MODIFY `id_usuarios_datos` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios_tipo_contacto`
--
ALTER TABLE `usuarios_tipo_contacto`
  MODIFY `id_usuario_tipo_contacto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario_ministerio`
--
ALTER TABLE `usuario_ministerio`
  MODIFY `id_usuario_ministerio` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario_ministerio_formacion`
--
ALTER TABLE `usuario_ministerio_formacion`
  MODIFY `id_usuario_ministerio_formacion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario_recomendaciones`
--
ALTER TABLE `usuario_recomendaciones`
  MODIFY `id_usuario_recomendaciones` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`user_id_usuario`) REFERENCES `usuarios` (`id_usuario`);

--
-- Filtros para la tabla `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`);
COMMIT;
