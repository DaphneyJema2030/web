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