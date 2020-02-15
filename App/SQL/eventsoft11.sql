-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 14-02-2020 a las 15:06:59
-- Versión del servidor: 5.7.26
-- Versión de PHP: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `eventsoft11`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `card`
--

DROP TABLE IF EXISTS `card`;
CREATE TABLE IF NOT EXISTS `card` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Arte'),
(2, 'Causas'),
(3, 'Comedia'),
(4, 'Manualidades'),
(5, 'Danzas'),
(6, 'Bebidas'),
(7, 'Cine'),
(8, 'Fitness'),
(9, 'Comida'),
(10, 'Juegos'),
(11, 'Jardinería'),
(12, 'Salud'),
(13, 'Hogar'),
(14, 'Literatura'),
(15, 'Música'),
(16, ' Redes profesionales'),
(17, 'Fiesta'),
(18, 'Religión'),
(19, 'Compras'),
(20, 'Deportes'),
(21, 'Bienestar'),
(22, 'Teatro'),
(23, 'Otro');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `classification`
--

DROP TABLE IF EXISTS `classification`;
CREATE TABLE IF NOT EXISTS `classification` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `classification`
--

INSERT INTO `classification` (`id`, `name`) VALUES
(1, 'Apto para todo público'),
(2, 'Apto sólo para mayores de 18 años'),
(3, 'Para niños de todas las edades'),
(4, 'Se sugiere el control de los padres');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `event`
--

DROP TABLE IF EXISTS `event`;
CREATE TABLE IF NOT EXISTS `event` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `start_date` datetime NOT NULL,
  `duration` time NOT NULL,
  `description` longtext NOT NULL,
  `title` varchar(100) NOT NULL,
  `cover_image` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `user_id` int(11) NOT NULL,
  `addressname` varchar(100) DEFAULT NULL,
  `lat` varchar(45) DEFAULT NULL,
  `long` varchar(45) DEFAULT NULL,
  `categorie_id` int(11) NOT NULL,
  `wordskeys` longtext,
  `classification_id` int(11) NOT NULL,
  `showguestlist` tinyint(1) NOT NULL DEFAULT '0',
  `interest` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `fk_event_user1_idx` (`user_id`),
  KEY `fk_event_categorie1_idx` (`categorie_id`),
  KEY `fk_event_classification1_idx` (`classification_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventassistant`
--

DROP TABLE IF EXISTS `eventassistant`;
CREATE TABLE IF NOT EXISTS `eventassistant` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `surname` varchar(45) NOT NULL,
  `phone` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `attended` tinyint(1) NOT NULL DEFAULT '0',
  `check_in` datetime DEFAULT NULL,
  `event_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_eventassistant_event1_idx` (`event_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventlog`
--

DROP TABLE IF EXISTS `eventlog`;
CREATE TABLE IF NOT EXISTS `eventlog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(100) NOT NULL,
  `status` varchar(45) NOT NULL,
  `repro_date` datetime NOT NULL,
  `date_log` datetime NOT NULL,
  `event_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_eventlog_event1_idx` (`event_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `galery`
--

DROP TABLE IF EXISTS `galery`;
CREATE TABLE IF NOT EXISTS `galery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(255) NOT NULL,
  `route` varchar(100) NOT NULL,
  `counter` int(11) NOT NULL DEFAULT '0',
  `order` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_galery_event1_idx` (`event_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `payment`
--

DROP TABLE IF EXISTS `payment`;
CREATE TABLE IF NOT EXISTS `payment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `price_id` int(11) NOT NULL,
  `subscription_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_payment_price1_idx` (`price_id`),
  KEY `fk_payment_subscription1_idx` (`subscription_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `price`
--

DROP TABLE IF EXISTS `price`;
CREATE TABLE IF NOT EXISTS `price` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `price` decimal(10,4) NOT NULL,
  `type` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `social`
--

DROP TABLE IF EXISTS `social`;
CREATE TABLE IF NOT EXISTS `social` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `link` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_social_user1_idx` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subscription`
--

DROP TABLE IF EXISTS `subscription`;
CREATE TABLE IF NOT EXISTS `subscription` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `credit_card` varchar(45) NOT NULL,
  `due_date` varchar(45) NOT NULL,
  `enable` tinyint(1) NOT NULL,
  `card_expiration_date` datetime NOT NULL,
  `subscription_register` datetime NOT NULL,
  `subcription_expiration` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  `card_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_subscription_user1_idx` (`user_id`),
  KEY `fk_subscription_card1_idx` (`card_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `password` varchar(254) NOT NULL,
  `roles` varchar(100) NOT NULL,
  `online` tinyint(1) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `surname` varchar(45) DEFAULT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `address` varchar(45) DEFAULT NULL,
  `gender` varchar(45) NOT NULL,
  `birthday` datetime NOT NULL,
  `company` char(1) DEFAULT NULL,
  `companyid` varchar(45) DEFAULT NULL,
  `description` longtext,
  `coverimage` varchar(200) DEFAULT NULL,
  `coverprofile` varchar(200) DEFAULT NULL,
  `photo` char(1) NOT NULL,
  `timezone` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `roles`, `online`, `created_at`, `updated_at`, `name`, `surname`, `phone`, `address`, `gender`, `birthday`, `company`, `companyid`, `description`, `coverimage`, `coverprofile`, `photo`, `timezone`) VALUES
(12, 'cesar.freitas.dev@gmail.com', '$2y$04$DS4p53BVOM8RbcqDCkCZZOiOaNx.87SYFKwgeoXNVGfnbGr4jCozm', '\"ROLE_USER\"', NULL, '2020-02-11 00:33:55', '2020-02-11 00:33:55', 'Cesar', 'Freitas', '950896817', NULL, '1', '1900-01-01 00:00:00', '', '73095092', 'hellow', NULL, '5e423cc337a11.jpg', '1', 'America/New_York'),
(14, 'novia.hermosa@gmail.com', '$2y$04$2CtYNWl9H.bdB57SZKFCaODUQHr7ieP4Ef4g7OE05.N9cLzBregwS', '\"ROLE_USER\"', NULL, '2020-02-11 20:46:59', '2020-02-11 20:46:59', 'Isabel Fiorella', 'Llallico Quispe', '960737473', NULL, '0', '1997-05-12 00:00:00', NULL, NULL, NULL, NULL, '5e435913039e9.jpg', '1', 'America/New_York');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `userxevent`
--

DROP TABLE IF EXISTS `userxevent`;
CREATE TABLE IF NOT EXISTS `userxevent` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `attended` tinyint(1) NOT NULL,
  `check_in` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `interest` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `fk_userxevent_user1_idx` (`user_id`),
  KEY `fk_userxevent_event1_idx` (`event_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `event`
--
ALTER TABLE `event`
  ADD CONSTRAINT `fk_event_categorie1` FOREIGN KEY (`categorie_id`) REFERENCES `category` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_event_classification1` FOREIGN KEY (`classification_id`) REFERENCES `classification` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_event_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `eventassistant`
--
ALTER TABLE `eventassistant`
  ADD CONSTRAINT `fk_eventassistant_event1` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `eventlog`
--
ALTER TABLE `eventlog`
  ADD CONSTRAINT `fk_eventlog_event1` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `galery`
--
ALTER TABLE `galery`
  ADD CONSTRAINT `fk_galery_event1` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `fk_payment_price1` FOREIGN KEY (`price_id`) REFERENCES `price` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_payment_subscription1` FOREIGN KEY (`subscription_id`) REFERENCES `subscription` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `social`
--
ALTER TABLE `social`
  ADD CONSTRAINT `fk_social_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `subscription`
--
ALTER TABLE `subscription`
  ADD CONSTRAINT `fk_subscription_card1` FOREIGN KEY (`card_id`) REFERENCES `card` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_subscription_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `userxevent`
--
ALTER TABLE `userxevent`
  ADD CONSTRAINT `fk_userxevent_event1` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_userxevent_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
