DROP DATABASE IF EXISTS `cyrille_posts_db`;

CREATE DATABASE `cyrille_posts_db` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

GRANT ALL PRIVILEGES ON `cyrille_posts_db`.* TO 'ajax-chat-user'@'localhost' IDENTIFIED BY 'We Love SQL API!';

USE `posts_db`;

CREATE TABLE `posts` (
    `id`        INT AUTO_INCREMENT PRIMARY KEY,
    `contenu`   TEXT NOT NULL,
    `date`      TIMESTAMP NOT NULL
    );