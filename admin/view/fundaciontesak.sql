-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 13-08-2018 a las 15:38:04
-- Versión del servidor: 5.7.21
-- Versión de PHP: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `fundaciontesak`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumno`
--

DROP TABLE IF EXISTS `alumno`;
CREATE TABLE IF NOT EXISTS `alumno` (
  `id_alumno` int(11) NOT NULL AUTO_INCREMENT,
  `alumno_nombre` varchar(225) NOT NULL,
  `alumno_apellido` varchar(225) NOT NULL,
  `alumno_fecha` date NOT NULL,
  `alumno_sexo` varchar(25) NOT NULL,
  `alumno_instituto` varchar(225) NOT NULL,
  `id_grupo` int(11) NOT NULL,
  PRIMARY KEY (`id_alumno`),
  KEY `id_grupo` (`id_grupo`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `alumno`
--

INSERT INTO `alumno` (`id_alumno`, `alumno_nombre`, `alumno_apellido`, `alumno_fecha`, `alumno_sexo`, `alumno_instituto`, `id_grupo`) VALUES
(9, 'Gabriela Lourdes', 'Carranza Barrios', '1996-02-11', 'nada', 'csbp', 8),
(13, 'gabriela', 'romero', '1998-12-05', '', 'csbp', 8),
(14, 'milton', 'orellana', '2018-07-18', 'masculino', 'sdh', 42),
(15, 'manuel', 'martinez', '2018-07-21', '', 'jorge larde', 11),
(18, 'joel', 'aguilar', '1994-12-14', 'Femenino', 'csbp', 8),
(19, 'miguel', 'perez', '1994-12-15', 'masculino', 'csbp', 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asistencia`
--

DROP TABLE IF EXISTS `asistencia`;
CREATE TABLE IF NOT EXISTS `asistencia` (
  `id_asistencia` int(11) NOT NULL AUTO_INCREMENT,
  `id_alumno` int(11) NOT NULL,
  `id_evento` int(11) NOT NULL,
  `asistencia` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_asistencia`),
  KEY `id_alumno` (`id_alumno`,`id_evento`),
  KEY `id_grupo` (`id_evento`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `asistencia`
--

INSERT INTO `asistencia` (`id_asistencia`, `id_alumno`, `id_evento`, `asistencia`) VALUES
(1, 9, 7, 1),
(2, 13, 7, 0),
(3, 18, 7, 1),
(4, 19, 7, 0),
(5, 9, 19, 1),
(6, 13, 19, 1),
(7, 18, 19, 1),
(8, 19, 19, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargo`
--

DROP TABLE IF EXISTS `cargo`;
CREATE TABLE IF NOT EXISTS `cargo` (
  `id_cargo` int(11) NOT NULL AUTO_INCREMENT,
  `cargo` varchar(145) NOT NULL,
  PRIMARY KEY (`id_cargo`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cargo`
--

INSERT INTO `cargo` (`id_cargo`, `cargo`) VALUES
(1, 'Administrador'),
(2, 'Coordinador'),
(3, 'Colaborador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento`
--

DROP TABLE IF EXISTS `departamento`;
CREATE TABLE IF NOT EXISTS `departamento` (
  `id_departamento` int(11) NOT NULL AUTO_INCREMENT,
  `departamento_nombre` varchar(30) NOT NULL,
  `departamento_descripcion` varchar(30) NOT NULL,
  PRIMARY KEY (`id_departamento`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `departamento`
--

INSERT INTO `departamento` (`id_departamento`, `departamento_nombre`, `departamento_descripcion`) VALUES
(1, 'PAN Y CHAN 1', 'actibidades recreativas'),
(2, 'centro de interpretacion', 'centro de interpretacion'),
(3, 'teatro YULKUIKAT', 'teatro'),
(4, 'ecoventura', 'ecoventura'),
(5, 'iniciativa por la paz', 'iniciativa por la paz');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evento`
--

DROP TABLE IF EXISTS `evento`;
CREATE TABLE IF NOT EXISTS `evento` (
  `id_evento` int(11) NOT NULL AUTO_INCREMENT,
  `evento_nombre` varchar(45) NOT NULL,
  `evento_descripcion` varchar(45) NOT NULL,
  `id_grupo` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `estado` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id_evento`),
  KEY `fk_evento_grupo` (`id_grupo`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `evento`
--

INSERT INTO `evento` (`id_evento`, `evento_nombre`, `evento_descripcion`, `id_grupo`, `fecha`, `estado`) VALUES
(7, 'charla', 'charla motivacional', 8, '2018-07-20', 1),
(9, 'cine matine', 'proyeccion de peliculas', 11, '2018-07-18', 0),
(14, 'recorrido teatro', 'recorrido por las artesanias ', 42, '2018-07-21', 0),
(17, 'recorrido teatro', 'recorrido por las artesanias ', 8, '2018-07-24', 0),
(18, 'MaÃ±ana alegre', 'Venta de comida, bebidas y show musical', 11, '2018-08-06', 0),
(19, 'carrera', 'carrera', 8, '2018-08-15', 1),
(21, 'cine educativo', 'proyeccion de peliculas educativas', 8, '2018-02-08', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo`
--

DROP TABLE IF EXISTS `grupo`;
CREATE TABLE IF NOT EXISTS `grupo` (
  `id_grupo` int(11) NOT NULL AUTO_INCREMENT,
  `grupo_nombre` varchar(225) NOT NULL,
  `grupo_direccion` varchar(225) NOT NULL,
  `grupo_encargado` varchar(225) NOT NULL,
  `grupo_tel` varchar(225) NOT NULL,
  `grupo_descripcion` varchar(225) NOT NULL,
  `grupo_municipio` varchar(225) NOT NULL,
  `id_departamento` int(11) NOT NULL,
  `grupo_celular` varchar(25) NOT NULL,
  PRIMARY KEY (`id_grupo`),
  KEY `id_departamento` (`id_departamento`),
  KEY `id_departamento_2` (`id_departamento`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `grupo`
--

INSERT INTO `grupo` (`id_grupo`, `grupo_nombre`, `grupo_direccion`, `grupo_encargado`, `grupo_tel`, `grupo_descripcion`, `grupo_municipio`, `id_departamento`, `grupo_celular`) VALUES
(8, 'Casa de la cultura SBP', 'perulapia', 'jose mauricio martinez', '2379-8565', 'niÃ±os delas edades de 8 a 12 aÃ±os', 'San bartolome perulapia', 1, '7896-4563'),
(11, 'centor escolar jorge larde', 'san martin ', 'miguel montes', '2258-9632', 'alunos del centro escolar jorge larde de cuarto grado', 'san martin', 5, '7845-3254'),
(42, 'centro escolar san jose', 'san jose', 'maria hernandez', '2563-9874', 'alumnos de sexto grado del centro escolar san jose', 'san jose', 5, '7954-6321');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `usuario_nombre` varchar(45) NOT NULL,
  `usuario_apellido` varchar(45) NOT NULL,
  `usuario_telefono` varchar(25) NOT NULL,
  `usuario` varchar(100) NOT NULL,
  `usuario_password` varchar(100) NOT NULL,
  `id_departamento` int(11) NOT NULL,
  `id_cargo` int(11) NOT NULL,
  `usuario_correo` varchar(255) NOT NULL,
  PRIMARY KEY (`id_usuario`),
  KEY `id_cargo` (`id_cargo`),
  KEY `id_departamento` (`id_departamento`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `usuario_nombre`, `usuario_apellido`, `usuario_telefono`, `usuario`, `usuario_password`, `id_departamento`, `id_cargo`, `usuario_correo`) VALUES
(1, 'Jose ', 'Melgar Aguilar', '78773552', 'admin', '123456', 1, 1, 'jjanthonyma@gmail.com'),
(2, 'Nelquin DarÃ­o', 'Budde PortÃ¡n', '', 'depto', '123456', 3, 2, 'budde994@gmail.com'),
(3, 'Juanito Dario', 'Budde PortÃ¡n', '', 'coolaborador', '123456', 4, 3, 'bjuanito@gmail.com');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alumno`
--
ALTER TABLE `alumno`
  ADD CONSTRAINT `alumno_ibfk_1` FOREIGN KEY (`id_grupo`) REFERENCES `grupo` (`id_grupo`);

--
-- Filtros para la tabla `asistencia`
--
ALTER TABLE `asistencia`
  ADD CONSTRAINT `asistencia_ibfk_1` FOREIGN KEY (`id_alumno`) REFERENCES `alumno` (`id_alumno`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `asistencia_ibfk_2` FOREIGN KEY (`id_evento`) REFERENCES `evento` (`id_evento`);

--
-- Filtros para la tabla `evento`
--
ALTER TABLE `evento`
  ADD CONSTRAINT `evento_ibfk_1` FOREIGN KEY (`id_grupo`) REFERENCES `grupo` (`id_grupo`);

--
-- Filtros para la tabla `grupo`
--
ALTER TABLE `grupo`
  ADD CONSTRAINT `grupo_ibfk_2` FOREIGN KEY (`id_departamento`) REFERENCES `departamento` (`id_departamento`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`id_cargo`) REFERENCES `cargo` (`id_cargo`),
  ADD CONSTRAINT `usuario_ibfk_2` FOREIGN KEY (`id_departamento`) REFERENCES `departamento` (`id_departamento`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
