-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 31-10-2024 a las 12:17:55
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyecto1ev`
--
CREATE DATABASE IF NOT EXISTS `proyecto1ev` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `proyecto1ev`;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--
CREATE OR REPLACE TABLE `empleados` (
  `id` int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contraseña` varchar(100) NOT NULL,
  `verificado` BOOLEAN DEFAULT 0,
  `cod_verificacion` varchar(8) UNIQUE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`id`, `nombre`, `apellido`, `email`, `contraseña`, `verificado`) VALUES
(1, 'Antonio', 'Luna', 'antonioluna@soporte.empresa.com', '81dc9bdb52d04dc20036dbd8313ed055', 1),
(2, 'Ana', 'Puertas', 'anapuertas@soporte.empresa.com', '81dc9bdb52d04dc20036dbd8313ed055', 1),
(3, 'Juan', 'Sevilla', 'juansevilla@empresa.com', '81dc9bdb52d04dc20036dbd8313ed055', 1),
(4, 'Macarena', 'Musgo', 'macarenamusgo@empresa.com', '81dc9bdb52d04dc20036dbd8313ed055', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tickets`
--
CREATE OR REPLACE TABLE `tickets` (
  `num` int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `título` varchar(50) NOT NULL,
  `mensaje` varchar(500) NOT NULL,
  `estado` varchar(11) NOT NULL DEFAULT 'Creado',
  `autor` int(11) DEFAULT NULL,
  `fecha` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ruta` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Estructura de tabla para la tabla `respuestas`
--

CREATE OR REPLACE TABLE `respuestas` (
  `num` int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `mensaje` varchar(500) NOT NULL,
  `autor` int(11) DEFAULT NULL,
  `ticket` int(11) DEFAULT NULL,
  `fecha` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tickets`
--

INSERT INTO `tickets` (`num`, `título`, `mensaje`, `estado`, `autor`) VALUES
(1, 'Ticket de prueba', 'Esto es una prueba', 'Abierto', 3);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  -- ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indices de la tabla `tickets`
--
-- ALTER TABLE `tickets`
--   ADD PRIMARY KEY (`num`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
