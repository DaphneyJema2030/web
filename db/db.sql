DROP DATABASE IF EXISTS `sect`;
CREATE DATABASE IF NOT EXISTS `sect`;
USE `sect`;

DROP TABLE IF EXISTS users;
CREATE TABLE IF NOT EXISTS users(
    UserId bigint(11) NOT NULL AUTO_INCREMENT,
    firstname varchar (50) NOT NULL DEFAULT '',
    lastname varchar (50) NOT NULL DEFAULT '',
    email varchar (50) NOT NULL DEFAULT '',
    username varchar (50) NOT NULL DEFAULT '',
    password varchar (60) NOT NULL DEFAULT '',
    userType varchar (30) NOT NULL DEFAULT '',
    userImage varchar (50) NOT NULL DEFAULT 'userImage.jpg',
    created bigint(10) NOT NULL DEFAULT '0',
    updated bigint(10) NOT NULL DEFAULT '0',
    UNIQUE KEY (username),
    UNIQUE KEY (email),
    UNIQUE KEY (UserId)

);

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `messageId` bigint(11) NOT NULL AUTO_INCREMENT,
CREATE TABLE `messages` (
  `messageId` bigint(11) NOT NULL,
  `name` varchar(50) NOT NULL DEFAULT '',
  `email` varchar(50) NOT NULL DEFAULT '',
  `phone` varchar(13) NOT NULL DEFAULT '',
  `subject` text DEFAULT NULL,
  `message` text DEFAULT NULL,
  `dateCreate` datetime DEFAULT current_timestamp(),
  `dateUpdate` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
)
 ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
);