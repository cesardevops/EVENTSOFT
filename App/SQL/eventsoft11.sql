-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 17-02-2020 a las 20:29:34
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
  `shortdescription` varchar(254) NOT NULL,
  `start_date` datetime NOT NULL,
  `duration` time NOT NULL,
  `description` longtext NOT NULL,
  `title` varchar(100) NOT NULL,
  `cover_image` varchar(255) DEFAULT NULL,
  `thumb` varchar(100) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `addressname` varchar(100) DEFAULT NULL,
  `lat` varchar(45) DEFAULT NULL,
  `longt` varchar(45) DEFAULT NULL,
  `categorie_id` int(11) NOT NULL,
  `wordskeys` longtext,
  `classification_id` int(11) NOT NULL,
  `showguestlist` tinyint(1) NOT NULL DEFAULT '0',
  `interest` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `fk_event_user1_idx` (`user_id`),
  KEY `fk_event_categorie1_idx` (`categorie_id`),
  KEY `fk_event_classification1_idx` (`classification_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `event`
--

INSERT INTO `event` (`id`, `shortdescription`, `start_date`, `duration`, `description`, `title`, `cover_image`, `thumb`, `status`, `user_id`, `addressname`, `lat`, `longt`, `categorie_id`, `wordskeys`, `classification_id`, `showguestlist`, `interest`) VALUES
(2, 'la factoria', '2017-02-03 03:06:00', '17:16:00', '<p>adsdfdsf</p>', 'Conciert', '5f7e71afe860c7118afe058d25c8812f-5e46f9496faa7.jpeg', NULL, NULL, 12, 'sdfdf', NULL, NULL, 16, 'sdfdsfsdfsdfsd', 1, 1, 0),
(3, 'la factoria', '2017-02-03 03:06:00', '17:16:00', '<p>adsdfdsf</p>', 'Conciert', '6b322b83696b0815cb6010bff8220070-5e46f959382e9.jpeg', NULL, NULL, 12, 'sdfdf', NULL, NULL, 16, 'sdfdsfsdfsdfsd', 1, 1, 0),
(4, 'Nombre del evento', '2020-02-16 17:00:00', '01:10:00', '<h2 style=\"font-style:italic\"><span style=\"font-size:18px\"><span style=\"font-family:Comic Sans MS,cursive\"><span style=\"color:#2ecc71\"><strong><span style=\"background-color:#000000\">Lorem ipsum dolor sit amet</span></strong></span></span></span></h2>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-family:Comic Sans MS,cursive\">Consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Vitae sapien pellentesque habitant morbi. Laoreet id donec ultrices tincidunt arcu non sodales. Felis eget velit aliquet sagittis id consectetur purus ut faucibus. Ut enim blandit volutpat maecenas volutpat. Eget est lorem ipsum dolor sit amet. A pellentesque sit amet porttitor. Enim praesent elementum facilisis leo vel fringilla est ullamcorper. Eu ultrices vitae auctor eu augue ut lectus. Facilisis volutpat est velit egestas. Tempus egestas sed sed risus pretium. Velit sed ullamcorper morbi tincidunt ornare massa. Arcu non sodales neque sodales ut. Risus in hendrerit gravida rutrum quisque non tellus. Pharetra diam sit amet nisl suscipit adipiscing. Mi in nulla posuere sollicitudin aliquam ultrices sagittis orci. Nibh venenatis cras sed felis eget velit aliquet sagittis id. Eget mauris pharetra et ultrices neque</span>.<br />\r\n&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\"><img alt=\"Image Bunny\" src=\"https://loremflickr.com/640/360\" style=\"border-style:solid; border-width:1px; float:right; height:225px; width:400px\" /></p>', 'Evento nuevo', '5f7e71afe860c7118afe058d25c8812f-5e498f694bf36.jpeg', NULL, NULL, 12, 'Av siempre viva 123 SpringField', NULL, NULL, 23, 'EventSoft, Cats, Aventura', 1, 1, 0),
(5, 'marcis wit', '2020-03-18 21:00:00', '02:00:00', '<pre>\r\n<code>https://loremflickr.com/640/360</code></pre>', 'concierto cristiano', 'aaqhwsv-5e4a17fcbf1a1.jpeg', NULL, NULL, 12, 'Av siempre viva 123 SpringField', NULL, NULL, 1, 'EventSoft, Cats, Aventura', 1, 1, 0),
(6, 'marcis wit', '2020-03-18 21:00:00', '02:00:00', '<pre>\r\n<code>https://loremflickr.com/640/360</code></pre>', 'concierto rock', '1920x1080-5e4a181276bd5.png', NULL, NULL, 12, 'Av siempre viva 123 SpringField', NULL, NULL, 1, 'EventSoft, Cats, Aventura', 1, 1, 0),
(7, 'gdfgdfgdfgdfgdf', '2020-03-18 21:00:00', '02:00:00', '<pre>\r\n<code>https://loremflickr.com/640/360</code></pre>', 'concierto rockerggdfgdfgdfgdfgdfgdfgdfgdfgdfgdfgdfgdfgdfgdfgdfg', '20180923_5ba7e93146fab-5e4a181d4591e.jpeg', NULL, NULL, 12, 'Av siempre viva 123 SpringField', NULL, NULL, 1, 'EventSoft, Cats, Aventura', 1, 1, 0),
(8, 'gdfgdfgdfgdfgdf', '2020-03-18 21:00:00', '02:00:00', '<pre>\r\n<code>https://loremflickr.com/640/360</code></pre>', 'concierto rock', 'mchgrouplivemarketingaktivierung-5e4a18b76283f.jpeg', NULL, NULL, 12, 'Av siempre viva 123 SpringField', NULL, NULL, 1, 'EventSoft, Cats, Aventura', 1, 1, 0),
(9, 'gdfgdfgdfgdfgdf', '2020-03-18 21:00:00', '02:00:00', '<pre>\r\n<code>https://loremflickr.com/640/360</code></pre>', 'concierto rock', 'destacatadaa624x317-5e4a18d730065.jpeg', NULL, NULL, 12, 'Av siempre viva 123 SpringField', NULL, NULL, 1, 'EventSoft, Cats, Aventura', 1, 1, 0),
(10, 'gdfgdfgdfgdfgdf', '2020-03-18 21:00:00', '02:00:00', '<pre>\r\n<code>https://loremflickr.com/640/360</code></pre>', 'concierto rock', 'www-5e4a20f98c8cb.jpeg', NULL, NULL, 12, 'Av siempre viva 123 SpringField', NULL, NULL, 1, 'EventSoft, Cats, Aventura', 1, 1, 0),
(11, 'gdfgdfgdfgdfgdf', '2020-03-18 21:00:00', '02:00:00', '<pre>\r\n<code>https://loremflickr.com/640/360</code></pre>', 'concierto rock', 'www-5e4a2954ad27a.jpeg', NULL, NULL, 12, 'Av siempre viva 123 SpringField', NULL, NULL, 1, 'EventSoft, Cats, Aventura', 1, 1, 0),
(12, 'gdfgdfgdfgdfgdf', '2020-03-18 21:00:00', '02:00:00', '<pre>\r\n<code>https://loremflickr.com/640/360</code></pre>', 'concierto rock', 'www-5e4a2967d6759.jpeg', NULL, NULL, 12, 'Av siempre viva 123 SpringField', NULL, NULL, 1, 'EventSoft, Cats, Aventura', 1, 1, 0),
(13, 'gdfgdfgdfgdfgdf', '2020-03-18 21:00:00', '02:00:00', '<pre>\r\n<code>https://loremflickr.com/640/360</code></pre>', 'concierto rock', 'www-5e4a29f65fbac.jpeg', NULL, NULL, 12, 'Av siempre viva 123 SpringField', NULL, NULL, 1, 'EventSoft, Cats, Aventura', 1, 1, 0),
(14, 'MAC', '2020-03-18 10:00:00', '02:30:00', '<p><strong>Lorem ipsum dolor sit amet</strong></p>\r\n\r\n<p style=\"margin-left:40px\"><a href=\"https://www.google.com.\" target=\"_blank\">Consectetur adipiscing elit</a>, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Eget nunc lobortis mattis aliquam faucibus purus. Enim nunc faucibus a pellentesque sit amet porttitor eget. Nibh sit amet commodo nulla facilisi nullam. Congue mauris rhoncus aenean vel. Ac orci phasellus egestas tellus rutrum. Tristique nulla aliquet enim tortor at auctor urna nunc. Pellentesque pulvinar pellentesque habitant morbi tristique senectus et netus. Laoreet non curabitur gravida arcu ac tortor dignissim convallis aenean. Dolor magna eget est lorem ipsum dolor sit. Pulvinar proin gravida hendrerit lectus. Ipsum consequat nisl vel pretium lectus quam id leo. Sit amet mauris commodo quis imperdiet massa tincidunt. Amet mauris commodo quis imperdiet massa. Curabitur gravida arcu ac tortor dignissim convallis aenean. Cursus in hac habitasse platea dictumst quisque sagittis purus sit. Lacus viverra vitae congue eu consequat ac felis donec et. Eget aliquet nibh praesent tristique magna. Dolor sit amet consectetur adipiscing.</p>\r\n\r\n<p>&nbsp;</p>', 'Exposicion d earte', 'herographicfreeimg1-5e4a8ce6bcdcd.png', NULL, NULL, 12, 'Av siempre viva 123 SpringField', NULL, NULL, 16, 'EventSoft, Cats, Aventura', 1, 1, 0),
(15, 'Lady GAGA', '2020-06-08 04:00:00', '03:00:00', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Eget nunc lobortis mattis aliquam faucibus purus. Enim nunc faucibus a pellentesque sit amet porttitor eget. Nibh sit amet commodo nulla facilisi nullam. Congue mauris rhoncus aenean vel. Ac orci phasellus egestas tellus rutrum. Tristique nulla aliquet enim tortor at auctor urna nunc. Pellentesque pulvinar pellentesque habitant morbi tristique senectus et netus. Laoreet non curabitur gravida arcu ac tortor dignissim convallis aenean. Dolor magna eget est lorem ipsum dolor sit. Pulvinar proin gravida hendrerit lectus. Ipsum consequat nisl vel pretium lectus quam id leo. Sit amet mauris commodo quis imperdiet massa tincidunt. Amet mauris commodo quis imperdiet massa. Curabitur gravida arcu ac tortor dignissim convallis aenean. Cursus in hac habitasse platea dictumst quisque sagittis purus sit. Lacus viverra vitae congue eu consequat ac felis donec et. Eget aliquet nibh praesent tristique magna. Dolor sit amet consectetur adipiscing.</p>', 'Exposicion Musical', '20180923_5ba7e93146fab-5e4a92a660c57.jpeg', NULL, NULL, 12, 'Av siempre viva 123 SpringField', NULL, NULL, 16, 'EventSoft, Cats, Aventura', 1, 1, 0),
(16, 'asdasdas', '2015-02-03 01:02:00', '12:15:00', '<ul>\r\n	<li><strong>asdasdasdasdasda</strong></li>\r\n</ul>\r\n\r\n<p><strong>asd</strong></p>\r\n\r\n<p><strong>asd</strong></p>', 'Conciert asdas', '84730848_2670135076375386_6630667616480395264_n-5e4af6a7b0f4d.png', 'thumb-ev-images-5e4af6a7b9eb15e4af6a7b9eb4.jpg', NULL, 12, 'Av siempre viva 123 SpringField', NULL, NULL, 16, 'EventSoft, Cats, Aventura', 1, 1, 0);

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
(12, 'cesar.freitas.dev@gmail.com', '$2y$04$DS4p53BVOM8RbcqDCkCZZOiOaNx.87SYFKwgeoXNVGfnbGr4jCozm', '\"ROLE_USER\"', NULL, '2020-02-11 00:33:55', '2020-02-11 00:33:55', 'Cesar', 'Freitas', '950896817', NULL, '1', '1900-01-01 00:00:00', '', '73095092', 'hellow', NULL, 'ev-db-images-5e4995a2a576f5e4995a2a5773.jpg', '1', 'America/New_York'),
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
