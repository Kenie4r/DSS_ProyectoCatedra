-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: b1k1eq92tfle9dvefsn9-mysql.services.clever-cloud.com:3306
-- Tiempo de generación: 07-04-2022 a las 18:17:00
-- Versión del servidor: 8.0.15-5
-- Versión de PHP: 7.3.33-1+ubuntu18.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `agendaproyectocatedra`
--
CREATE DATABASE IF NOT EXISTS `agendaproyectocatedra` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `agendaproyectocatedra`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `idCategoria` int(11) NOT NULL,
  `Titulo` varchar(50) NOT NULL,
  `Descripcion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`idCategoria`, `Titulo`, `Descripcion`) VALUES
(1, 'Concierto', 'Para definir un concierto ya sea publico o privado y que tipo de musica en el concierto'),
(2, 'E-Torneo', 'Torneo de E-Sports, es decir torneos profesionales o puede ser de novato, puede ser público o privado '),
(3, 'Cumpleaños', '...'),
(4, 'Graduación', '...'),
(12, 'Gamer', '...'),
(16, '15 años', '...'),
(23, 'Despedida de soltero', '...'),
(33, 'Iglesia', 'Tipo de iglesia y las ubicaciones exactas de ellas'),
(45, 'Futbol', 'Torneos cortos de 16 equipos para reunirse sobre futbol'),
(47, 'prueba8', 'prueba8');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_eventocategoria`
--

CREATE TABLE `detalle_eventocategoria` (
  `idDetalle` int(11) NOT NULL,
  `idEvento` int(11) NOT NULL,
  `idCategoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
(34, 25, 45);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_usuarioevento`
--

CREATE TABLE `detalle_usuarioevento` (
  `idDetalle` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `idEvento` int(11) NOT NULL,
  `Confirmacion` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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

CREATE TABLE `evento` (
  `idEvento` int(11) NOT NULL,
  `Titulo` varchar(50) NOT NULL,
  `Descripcion` text NOT NULL,
  `FechaInicio` datetime NOT NULL,
  `FechaFin` datetime NOT NULL,
  `TipoEvento` int(11) NOT NULL,
  `MaximoPersonas` int(11) NOT NULL,
  `Banner` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `evento`
--

INSERT INTO `evento` (`idEvento`, `Titulo`, `Descripcion`, `FechaInicio`, `FechaFin`, `TipoEvento`, `MaximoPersonas`, `Banner`) VALUES
(6, 'Torneo Duel Links ', 'Torneo para un juego de YGo', '2022-03-17 00:00:00', '2022-03-17 00:00:00', 1, 123, '../evento/banners/untitled-c308d.jpg'),
(10, 'Reunión de poketuber', '¡Describe tu evento!', '2022-03-02 00:00:00', '2022-03-02 00:00:00', 2, 12, '../evento/banners/1366_2000.jpeg'),
(15, 'Torneo TCG Pokémon', 'grande blaziken', '2022-04-01 00:00:00', '2022-04-01 00:00:00', 2, 200, '../evento/banners/wp1944119.jpg'),
(16, 'Torneo Programacion', 'torneo donde podras enviar tu programa y enviarlo para calificarlo', '2022-09-07 00:00:00', '2022-09-07 00:00:00', 2, 50, '../evento/banners/PROGRAMACION.jpg'),
(18, 'Via Crusis', '¡Describe tu evento!', '2022-03-30 08:36:00', '2022-03-30 08:36:00', 1, 130, '../evento/banners/viacrusis.jpg'),
(23, 'Feliz cumpleaños jaimito', '¡Describe tu evento!', '2022-04-23 15:35:00', '2022-04-21 15:35:00', 1, 12, '../evento/banners/wp1944119.jpg'),
(25, 'Torneo de futbol: Iglesia', 'Ven y muestra de que estas hecho.', '2022-04-24 02:57:00', '2022-04-14 01:57:00', 1, 200, '../evento/banners/5f4000cb02b629a887356252c9d9bb61.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Rol`
--

CREATE TABLE `Rol` (
  `idRol` int(11) NOT NULL,
  `Titulo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `Rol`
--

INSERT INTO `Rol` (`idRol`, `Titulo`) VALUES
(1, 'Administrador'),
(3, 'Asistente'),
(2, 'Creador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipoevento`
--

CREATE TABLE `tipoevento` (
  `IdTipo` int(11) NOT NULL,
  `Titulo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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

CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL,
  `Username` varchar(20) NOT NULL,
  `Password` varchar(35) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Apellido` varchar(50) NOT NULL,
  `Genero` char(1) NOT NULL,
  `Rolusuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `Username`, `Password`, `Nombre`, `Apellido`, `Genero`, `Rolusuario`) VALUES
(1, 'admin', 'e10adc3949ba59abbe56e057f20f883e', 'admin', 'eventos', 'M', 1),
(2, 'creador', '202cb962ac59075b964b07152d234b70', 'creador', 'de eventos', 'M', 2),
(5, 'diegosan', 'e10adc3949ba59abbe56e057f20f883e', 'Diego', 'Mancía', 'M', 2),
(6, 'dmancia', 'e10adc3949ba59abbe56e057f20f883e', 'Diego', 'Mancía', 'M', 3);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`idCategoria`);

--
-- Indices de la tabla `detalle_eventocategoria`
--
ALTER TABLE `detalle_eventocategoria`
  ADD PRIMARY KEY (`idDetalle`),
  ADD KEY `idEvento` (`idEvento`),
  ADD KEY `idCategoria` (`idCategoria`);

--
-- Indices de la tabla `detalle_usuarioevento`
--
ALTER TABLE `detalle_usuarioevento`
  ADD PRIMARY KEY (`idDetalle`),
  ADD KEY `idUsuario` (`idUsuario`),
  ADD KEY `idEvento` (`idEvento`);

--
-- Indices de la tabla `evento`
--
ALTER TABLE `evento`
  ADD PRIMARY KEY (`idEvento`),
  ADD KEY `TipoEvento` (`TipoEvento`);

--
-- Indices de la tabla `Rol`
--
ALTER TABLE `Rol`
  ADD PRIMARY KEY (`idRol`),
  ADD UNIQUE KEY `Titulo` (`Titulo`);

--
-- Indices de la tabla `tipoevento`
--
ALTER TABLE `tipoevento`
  ADD PRIMARY KEY (`IdTipo`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`),
  ADD UNIQUE KEY `user_nameforUser` (`Username`),
  ADD KEY `User_ROLuser` (`Rolusuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `idCategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT de la tabla `detalle_eventocategoria`
--
ALTER TABLE `detalle_eventocategoria`
  MODIFY `idDetalle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de la tabla `detalle_usuarioevento`
--
ALTER TABLE `detalle_usuarioevento`
  MODIFY `idDetalle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `evento`
--
ALTER TABLE `evento`
  MODIFY `idEvento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `Rol`
--
ALTER TABLE `Rol`
  MODIFY `idRol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tipoevento`
--
ALTER TABLE `tipoevento`
  MODIFY `IdTipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`Rolusuario`) REFERENCES `Rol` (`idRol`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
