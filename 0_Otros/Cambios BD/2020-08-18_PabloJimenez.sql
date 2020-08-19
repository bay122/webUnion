ALTER TABLE `datos_miembros` CHANGE `gl_ciudad` `gl_ciudad` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL;
ALTER TABLE `datos_miembros` ADD `gl_barrio` VARCHAR(500) NULL DEFAULT NULL AFTER `gl_ciudad`;
