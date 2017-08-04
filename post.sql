DROP DATABASE IF EXISTS `cyrille_posts_db`;

CREATE DATABASE `cyrille_posts_db` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

USE `cyrille_posts_db`;

CREATE TABLE `posts` (
    `id`        INT AUTO_INCREMENT PRIMARY KEY,
    `contenu`   TEXT NOT NULL,
    `date`      TIMESTAMP NOT NULL
    );