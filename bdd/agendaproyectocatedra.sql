-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 08-04-2022 a las 02:46:34
-- Versión del servidor: 8.0.18
-- Versión de PHP: 7.4.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `agendaproyectocatedra`
--
CREATE DATABASE IF NOT EXISTS `agendaproyectocatedra` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `agendaproyectocatedra`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

DROP TABLE IF EXISTS `categoria`;
CREATE TABLE IF NOT EXISTS `categoria` (
  `idCategoria` int(11) NOT NULL AUTO_INCREMENT,
  `Titulo` varchar(50) NOT NULL,
  `Descripcion` text NOT NULL,
  PRIMARY KEY (`idCategoria`)
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`idCategoria`, `Titulo`, `Descripcion`) VALUES
(1, 'Concierto musical', 'Para definir un concierto ya sea publico o privado y que tipo de musica en el concierto'),
(2, 'E-Torneo', 'Torneo de E-Sports, es decir torneos profesionales o puede ser de novato, puede ser público o privado '),
(3, 'Cumpleaños', '...'),
(4, 'Graduación', '...'),
(12, 'Gamer', '...'),
(16, '15 años', '...'),
(23, 'Despedida de soltero', '...'),
(33, 'Iglesia', 'Tipo de iglesia y las ubicaciones exactas de ellas'),
(45, 'Futbol', 'Torneos cortos de 16 equipos para reunirse sobre futbol'),
(55, 'Boda', '...'),
(58, 'nueva categoria', '...');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_eventocategoria`
--

DROP TABLE IF EXISTS `detalle_eventocategoria`;
CREATE TABLE IF NOT EXISTS `detalle_eventocategoria` (
  `idDetalle` int(11) NOT NULL AUTO_INCREMENT,
  `idEvento` int(11) NOT NULL,
  `idCategoria` int(11) NOT NULL,
  PRIMARY KEY (`idDetalle`),
  KEY `idEvento` (`idEvento`),
  KEY `idCategoria` (`idCategoria`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `detalle_eventocategoria`
--

INSERT INTO `detalle_eventocategoria` (`idDetalle`, `idEvento`, `idCategoria`) VALUES
(4, 10, 12),
(5, 15, 2),
(7, 16, 16),
(9, 18, 33),
(25, 15, 3),
(26, 15, 4),
(27, 6, 2),
(28, 6, 12),
(34, 25, 45),
(36, 27, 55),
(37, 23, 3),
(44, 31, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_usuarioevento`
--

DROP TABLE IF EXISTS `detalle_usuarioevento`;
CREATE TABLE IF NOT EXISTS `detalle_usuarioevento` (
  `idDetalle` int(11) NOT NULL AUTO_INCREMENT,
  `idUsuario` int(11) NOT NULL,
  `idEvento` int(11) NOT NULL,
  `Confirmacion` varchar(10) NOT NULL,
  PRIMARY KEY (`idDetalle`),
  KEY `idUsuario` (`idUsuario`),
  KEY `idEvento` (`idEvento`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `detalle_usuarioevento`
--

INSERT INTO `detalle_usuarioevento` (`idDetalle`, `idUsuario`, `idEvento`, `Confirmacion`) VALUES
(5, 1, 10, 'Espera'),
(7, 1, 10, 'Espera'),
(8, 1, 10, 'Espera'),
(9, 1, 15, 'Espera'),
(11, 1, 16, 'Espera'),
(12, 1, 16, 'Espera');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evento`
--

DROP TABLE IF EXISTS `evento`;
CREATE TABLE IF NOT EXISTS `evento` (
  `idEvento` int(11) NOT NULL AUTO_INCREMENT,
  `Titulo` varchar(50) NOT NULL,
  `Descripcion` text NOT NULL,
  `FechaInicio` datetime NOT NULL,
  `FechaFin` datetime NOT NULL,
  `TipoEvento` int(11) NOT NULL,
  `MaximoPersonas` int(11) NOT NULL,
  `Banner` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`idEvento`),
  KEY `TipoEvento` (`TipoEvento`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `evento`
--

INSERT INTO `evento` (`idEvento`, `Titulo`, `Descripcion`, `FechaInicio`, `FechaFin`, `TipoEvento`, `MaximoPersonas`, `Banner`) VALUES
(6, 'Torneo Duel Links ', 'Torneo para un juego de YGo', '2022-03-17 00:00:00', '2022-03-17 00:00:00', 1, 123, '../evento/banners/untitled-c308d.jpg'),
(10, 'Reunión de poketuber', '¡Describe tu evento!', '2022-03-02 00:00:00', '2022-03-02 00:00:00', 2, 12, '../evento/banners/1366_2000.jpeg'),
(15, 'Torneo TCG Pokémon', 'grande blaziken', '2022-04-01 00:00:00', '2022-04-01 00:00:00', 2, 200, '../evento/banners/wp1944119.jpg'),
(16, 'Torneo Programacion', 'torneo donde podras enviar tu programa y enviarlo para calificarlo', '2022-09-07 00:00:00', '2022-09-07 00:00:00', 2, 50, '../evento/banners/PROGRAMACION.jpg'),
(18, 'Via Crusis', '¡Describe tu evento!', '2022-03-30 08:36:00', '2022-03-30 08:36:00', 1, 130, '../evento/banners/viacrusis.jpg'),
(23, 'Feliz cumpleaños jaimito', '¡Describe tu evento!', '2022-04-23 15:35:00', '2022-04-23 15:35:00', 1, 12, '../evento/banners/wp1944119.jpg'),
(25, 'Torneo de futbol: Iglesia', 'Ven y muestra de que estas hecho.', '2022-04-24 02:57:00', '2022-04-14 01:57:00', 1, 200, '../evento/banners/5f4000cb02b629a887356252c9d9bb61.png'),
(27, 'Boda Suárez', 'Y vivieron felices por siempre.', '2022-04-17 12:31:00', '2022-04-17 15:32:00', 2, 234, '../evento/banners/4_bodafeliz.jpg'),
(31, 'Nuevo Evento', '¡Describe tu evento!', '2022-04-23 20:30:00', '2022-04-20 20:30:00', 2, 1212, 'https://www.esneca.com/wp-content/uploads/eventos-sociales-1200x720.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

DROP TABLE IF EXISTS `rol`;
CREATE TABLE IF NOT EXISTS `rol` (
  `idRol` int(11) NOT NULL AUTO_INCREMENT,
  `Titulo` varchar(20) NOT NULL,
  PRIMARY KEY (`idRol`),
  UNIQUE KEY `Titulo` (`Titulo`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`idRol`, `Titulo`) VALUES
(1, 'Administrador'),
(3, 'Asistente'),
(2, 'Creador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipoevento`
--

DROP TABLE IF EXISTS `tipoevento`;
CREATE TABLE IF NOT EXISTS `tipoevento` (
  `IdTipo` int(11) NOT NULL AUTO_INCREMENT,
  `Titulo` varchar(20) NOT NULL,
  PRIMARY KEY (`IdTipo`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `tipoevento`
--

INSERT INTO `tipoevento` (`IdTipo`, `Titulo`) VALUES
(1, 'Público'),
(2, 'Privado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `idUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `Username` varchar(20) NOT NULL,
  `Password` varchar(35) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Apellido` varchar(50) NOT NULL,
  `Genero` char(1) NOT NULL,
  `Rolusuario` int(11) NOT NULL,
  PRIMARY KEY (`idUsuario`),
  UNIQUE KEY `user_nameforUser` (`Username`),
  KEY `User_ROLuser` (`Rolusuario`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `Username`, `Password`, `Nombre`, `Apellido`, `Genero`, `Rolusuario`) VALUES
(1, 'admin', 'e10adc3949ba59abbe56e057f20f883e', 'admin', 'eventos', 'M', 1),
(5, 'diegosan', 'e10adc3949ba59abbe56e057f20f883e', 'Diego', 'Mancía', 'M', 2),
(9, 'lemus', 'd41d8cd98f00b204e9800998ecf8427e', 'Fernando', 'Lemus', 'M', 3),
(14, 'diegomancia', 'd41d8cd98f00b204e9800998ecf8427e', 'Diego', 'Mancía', 'M', 3),
(15, 'creador', 'e10adc3949ba59abbe56e057f20f883e', 'Creador', 'de eventos', 'M', 2),
(16, 'visitante', 'e10adc3949ba59abbe56e057f20f883e', 'Usuario', 'Comun', 'M', 3);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalle_eventocategoria`
--
ALTER TABLE `detalle_eventocategoria`
  ADD CONSTRAINT `detalle_eventocategoria_ibfk_1` FOREIGN KEY (`idCategoria`) REFERENCES `categoria` (`idCategoria`),
  ADD CONSTRAINT `detalle_eventocategoria_ibfk_2` FOREIGN KEY (`idEvento`) REFERENCES `evento` (`idEvento`);

--
-- Filtros para la tabla `detalle_usuarioevento`
--
ALTER TABLE `detalle_usuarioevento`
  ADD CONSTRAINT `detalle_usuarioevento_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`),
  ADD CONSTRAINT `detalle_usuarioevento_ibfk_2` FOREIGN KEY (`idEvento`) REFERENCES `evento` (`idEvento`);

--
-- Filtros para la tabla `evento`
--
ALTER TABLE `evento`
  ADD CONSTRAINT `evento_ibfk_1` FOREIGN KEY (`TipoEvento`) REFERENCES `tipoevento` (`IdTipo`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`Rolusuario`) REFERENCES `rol` (`idRol`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
