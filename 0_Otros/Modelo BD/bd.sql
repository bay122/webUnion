-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 01-08-2018 a las 18:09:31
-- Versión del servidor: 5.7.22-0ubuntu0.16.04.1
-- Versión de PHP: 7.0.30-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pan_con_queso`
--
CREATE DATABASE IF NOT EXISTS `pan_con_queso` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `pan_con_queso`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `id` int(11) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'unique, usado para rutas de web amigables'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `category_post`
--

DROP TABLE IF EXISTS `category_post`;
CREATE TABLE `category_post` (
  `id` int(11) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `category_id` int(11) UNSIGNED NOT NULL,
  `post_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE `comments` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_usuario` int(11) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `post_id` int(11) UNSIGNED NOT NULL,
  `parent_id` int(11) UNSIGNED DEFAULT NULL,
  `lft` int(11) DEFAULT NULL,
  `rgt` int(11) DEFAULT NULL,
  `depth` int(11) DEFAULT NULL,
  `body` text COLLATE utf8_unicode_ci NOT NULL COMMENT 'cuerpo del comentario'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comunas`
--

DROP TABLE IF EXISTS `comunas`;
CREATE TABLE `comunas` (
  `id_comuna` int(11) NOT NULL,
  `id_region` int(11) UNSIGNED DEFAULT NULL,
  `gl_nombre_comuna` varchar(99) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gl_latitud` decimal(10,0) DEFAULT NULL,
  `gl_logintud` decimal(10,0) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contacts`
--

DROP TABLE IF EXISTS `contacts`;
CREATE TABLE `contacts` (
  `id` int(11) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `message` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingoings`
--

DROP TABLE IF EXISTS `ingoings`;
CREATE TABLE `ingoings` (
  `id` int(11) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `ingoing_id` int(11) UNSIGNED NOT NULL,
  `ingoing_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(11) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2017_02_01_233219_create_users_table', 1),
(3, '2017_02_02_232450_add_confirmation', 1),
(4, '2017_03_10_233219_create_categories_table', 1),
(5, '2017_03_10_233219_create_posts_table', 1),
(6, '2017_03_10_233220_create_comments_table', 1),
(7, '2017_03_10_233220_create_contacts_table', 1),
(8, '2017_03_10_233220_create_ingoings_table', 1),
(9, '2017_03_10_233220_create_notifications_table', 1),
(10, '2017_03_10_233220_create_post_tag_table', 1),
(11, '2017_03_10_233220_create_tags_table', 1),
(12, '2017_03_18_145906_create_category_post_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ministerios`
--

DROP TABLE IF EXISTS `ministerios`;
CREATE TABLE `ministerios` (
  `id_ministerio` int(11) NOT NULL,
  `gl_nombre` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_ministerio_tipo` int(11) UNSIGNED DEFAULT NULL,
  `gl_descripcion` varchar(99) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ministerios_departamentos`
--

DROP TABLE IF EXISTS `ministerios_departamentos`;
CREATE TABLE `ministerios_departamentos` (
  `id_ministerio_departamento` int(11) NOT NULL,
  `gl_nombre` int(11) DEFAULT NULL,
  `bo_activo` int(11) DEFAULT NULL,
  `id_ministerio` int(11) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ministerios_tipos`
--

DROP TABLE IF EXISTS `ministerios_tipos`;
CREATE TABLE `ministerios_tipos` (
  `id_ministerio_tipo` int(11) NOT NULL,
  `gl_nombre` varchar(99) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gl_descripcion` varchar(99) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notifications`
--

DROP TABLE IF EXISTS `notifications`;
CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `notifiable_id` int(11) UNSIGNED NOT NULL,
  `notifiable_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `data` text COLLATE utf8_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paises`
--

DROP TABLE IF EXISTS `paises`;
CREATE TABLE `paises` (
  `id_pais` int(11) NOT NULL,
  `gl_nombre` varchar(99) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE `posts` (
  `id` int(11) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'para url amigables',
  `seo_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'para busqueda de indexadores de sitios',
  `excerpt` text COLLATE utf8_unicode_ci NOT NULL COMMENT 'funcion desconocida (?)',
  `body` text COLLATE utf8_unicode_ci NOT NULL COMMENT 'cuerpo del post',
  `meta_description` text COLLATE utf8_unicode_ci NOT NULL COMMENT 'funcion desconocida (?)',
  `meta_keywords` text COLLATE utf8_unicode_ci NOT NULL COMMENT 'funcion desconocida (?)',
  `active` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Si el post se encuentra activo y debe listarse',
  `id_usuario` int(11) UNSIGNED NOT NULL COMMENT 'Usuario que crea el post',
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Imagen del post'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `post_tag`
--

DROP TABLE IF EXISTS `post_tag`;
CREATE TABLE `post_tag` (
  `id` int(11) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `post_id` int(11) UNSIGNED NOT NULL,
  `tag_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `regiones`
--

DROP TABLE IF EXISTS `regiones`;
CREATE TABLE `regiones` (
  `id_region` int(11) NOT NULL,
  `gl_nombre_region` varchar(99) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gl_nombre_corto` varchar(99) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gl_latitud` decimal(10,0) DEFAULT NULL,
  `gl_longitud` decimal(10,0) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `gl_nombre` varchar(99) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gl_json_permisos` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles_usuario`
--

DROP TABLE IF EXISTS `roles_usuario`;
CREATE TABLE `roles_usuario` (
  `id` int(11) NOT NULL,
  `id_rol` int(11) UNSIGNED DEFAULT NULL,
  `id_usuario` int(11) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tags`
--

DROP TABLE IF EXISTS `tags`;
CREATE TABLE `tags` (
  `id` int(11) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `tag` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `id_usuario` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `role` enum('user','tripulante','admin') COLLATE utf8_unicode_ci NOT NULL,
  `confirmed` tinyint(1) NOT NULL DEFAULT '0',
  `confirmation_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `valid` tinyint(1) NOT NULL DEFAULT '0',
  `bo_bloqueado` tinyint(1) NOT NULL DEFAULT '0',
  `bo_tripulante` tinyint(1) NOT NULL DEFAULT '0',
  `bo_corporacion` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios_auditoria`
--

DROP TABLE IF EXISTS `usuarios_auditoria`;
CREATE TABLE `usuarios_auditoria` (
  `id_usuario_auditoria` int(11) UNSIGNED NOT NULL,
  `id_usuario` int(11) UNSIGNED DEFAULT NULL,
  `fc_ultimo_login` datetime NOT NULL,
  `ip_publica` varchar(99) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gl_tipo_medio` varchar(99) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'WEB',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios_contacto`
--

DROP TABLE IF EXISTS `usuarios_contacto`;
CREATE TABLE `usuarios_contacto` (
  `id_usuario_contacto` int(11) UNSIGNED NOT NULL,
  `id_usuario` int(11) UNSIGNED DEFAULT NULL,
  `id_usuario_tipo_contacto` int(11) UNSIGNED DEFAULT NULL,
  `bo_estado` tinyint(1) NOT NULL DEFAULT '1',
  `gl_json_dato_contacto` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios_datos`
--

DROP TABLE IF EXISTS `usuarios_datos`;
CREATE TABLE `usuarios_datos` (
  `id_usuarios_datos` int(11) UNSIGNED NOT NULL,
  `id_usuario` int(11) UNSIGNED DEFAULT NULL,
  `gl_rut` varchar(99) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gl_nombres` varchar(99) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gl_apellido_paterno` varchar(99) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gl_apellido_materno` varchar(99) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_region` int(11) UNSIGNED DEFAULT NULL,
  `id_comuna` int(11) UNSIGNED DEFAULT NULL,
  `fc_llegada_iglesia` date DEFAULT NULL,
  `fc_nacimiento` date DEFAULT NULL,
  `id_pais_origen` int(11) UNSIGNED DEFAULT NULL,
  `id_nacionalidad` int(11) UNSIGNED DEFAULT NULL,
  `gl_sexo` enum('Masculino','Femenino') COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios_tipo_contacto`
--

DROP TABLE IF EXISTS `usuarios_tipo_contacto`;
CREATE TABLE `usuarios_tipo_contacto` (
  `id_usuario_tipo_contacto` int(11) UNSIGNED NOT NULL,
  `gl_nombre` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_ministerio`
--

DROP TABLE IF EXISTS `usuario_ministerio`;
CREATE TABLE `usuario_ministerio` (
  `id_usuario_ministerio` int(11) UNSIGNED NOT NULL,
  `bo_participante` tinyint(1) NOT NULL DEFAULT '1',
  `bo_equipo_trabajo` tinyint(1) NOT NULL DEFAULT '0',
  `bo_directiva` tinyint(1) NOT NULL DEFAULT '0',
  `bo_activo` tinyint(1) NOT NULL DEFAULT '1',
  `fc_inicio` date NOT NULL,
  `fc_fin` date DEFAULT NULL,
  `id_ministerio_departamento` int(11) UNSIGNED DEFAULT NULL,
  `id_ministerio` int(11) UNSIGNED DEFAULT NULL,
  `id_usuario` int(11) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_ministerio_formacion`
--

DROP TABLE IF EXISTS `usuario_ministerio_formacion`;
CREATE TABLE `usuario_ministerio_formacion` (
  `id_usuario_ministerio_formacion` int(11) UNSIGNED NOT NULL,
  `bo_participante` tinyint(1) NOT NULL DEFAULT '1',
  `bo_activo` tinyint(1) NOT NULL DEFAULT '1',
  `fc_inicio` date DEFAULT NULL,
  `fc_fin` date DEFAULT NULL,
  `bo_finalizado` tinyint(1) NOT NULL DEFAULT '0',
  `id_ministerio` int(11) UNSIGNED DEFAULT NULL,
  `id_usuario` int(11) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_recomendaciones`
--

DROP TABLE IF EXISTS `usuario_recomendaciones`;
CREATE TABLE `usuario_recomendaciones` (
  `id_usuario_recomendaciones` int(11) UNSIGNED NOT NULL,
  `id_usuario` int(11) UNSIGNED DEFAULT NULL,
  `id_usuario_recomendado` int(11) UNSIGNED DEFAULT NULL COMMENT 'Campo no obligatorio, la persona recomendada podr�a no ser n',
  `gl_json_datos_contacto` text COLLATE utf8_unicode_ci,
  `fc_recomendacion` date DEFAULT NULL COMMENT 'se podr�a prescindir de este campo si se utiliza el campo de',
  `fc_entrada_vigencia` date DEFAULT NULL,
  `id_ministerio` int(11) UNSIGNED DEFAULT NULL,
  `id_departamento` int(11) UNSIGNED DEFAULT NULL,
  `gl_comentario` mediumtext COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_title_unique` (`title`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`);

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
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `comments_parent_id_index` (`parent_id`),
  ADD KEY `comments_lft_index` (`lft`),
  ADD KEY `comments_rgt_index` (`rgt`);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `ingoings_ingoing_id_index` (`ingoing_id`),
  ADD KEY `ingoings_ingoing_type_index` (`ingoing_type`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
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
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_id_notifiable_type_index` (`notifiable_id`,`notifiable_type`);

--
-- Indices de la tabla `paises`
--
ALTER TABLE `paises`
  ADD PRIMARY KEY (`id_pais`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indices de la tabla `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `posts_slug_unique` (`slug`),
  ADD KEY `posts_user_id_foreign` (`id_usuario`);

--
-- Indices de la tabla `post_tag`
--
ALTER TABLE `post_tag`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_tag_post_id_foreign` (`post_id`),
  ADD KEY `post_tag_tag_id_foreign` (`tag_id`);

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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tags_tag_unique` (`tag`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `users_name_unique` (`name`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

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
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `category_post`
--
ALTER TABLE `category_post`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `comunas`
--
ALTER TABLE `comunas`
  MODIFY `id_comuna` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `ingoings`
--
ALTER TABLE `ingoings`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
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
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `post_tag`
--
ALTER TABLE `post_tag`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
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
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `usuarios_auditoria`
--
ALTER TABLE `usuarios_auditoria`
  MODIFY `id_usuario_auditoria` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `usuarios_contacto`
--
ALTER TABLE `usuarios_contacto`
  MODIFY `id_usuario_contacto` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `usuarios_datos`
--
ALTER TABLE `usuarios_datos`
  MODIFY `id_usuarios_datos` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `usuarios_tipo_contacto`
--
ALTER TABLE `usuarios_tipo_contacto`
  MODIFY `id_usuario_tipo_contacto` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `usuario_ministerio`
--
ALTER TABLE `usuario_ministerio`
  MODIFY `id_usuario_ministerio` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `usuario_ministerio_formacion`
--
ALTER TABLE `usuario_ministerio_formacion`
  MODIFY `id_usuario_ministerio_formacion` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `usuario_recomendaciones`
--
ALTER TABLE `usuario_recomendaciones`
  MODIFY `id_usuario_recomendaciones` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`);

--
-- Filtros para la tabla `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`);

--
-- Filtros para la tabla `post_tag`
--
ALTER TABLE `post_tag`
  ADD CONSTRAINT `post_tag_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `post_tag_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
