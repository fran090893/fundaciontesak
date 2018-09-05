-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 16, 2018 at 10:04 PM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fundaciontesak`
--

-- --------------------------------------------------------

--
-- Table structure for table `alumno`
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
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alumno`
--

INSERT INTO `alumno` (`id_alumno`, `alumno_nombre`, `alumno_apellido`, `alumno_fecha`, `alumno_sexo`, `alumno_instituto`, `id_grupo`) VALUES
(9, 'Gabriela Lourdes', 'Carranza Flores', '1996-02-11', 'Femenino', 'csbp', 8),
(10, 'salvador', 'balmore', '1998-10-10', '', 'csbp', 8),
(11, 'miguel', 'martinez', '1998-12-20', '', 'csbp', 8),
(12, 'manuel', 'alvarado', '1998-08-09', '', 'csbp', 8),
(13, 'gabriela', 'romero', '1998-12-05', '', 'csbp', 8),
(14, 'milton', 'orellana', '2018-07-18', 'masculino', 'sdh', 42);

-- --------------------------------------------------------

--
-- Table structure for table `asistencia`
--

DROP TABLE IF EXISTS `asistencia`;
CREATE TABLE IF NOT EXISTS `asistencia` (
  `id_asistencia` int(11) NOT NULL AUTO_INCREMENT,
  `id_alumno` int(11) NOT NULL,
  `id_evento` int(11) NOT NULL,
  PRIMARY KEY (`id_asistencia`),
  KEY `id_alumno` (`id_alumno`,`id_evento`),
  KEY `id_grupo` (`id_evento`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `asistencia`
--

INSERT INTO `asistencia` (`id_asistencia`, `id_alumno`, `id_evento`) VALUES
(8, 9, 3),
(11, 10, 4),
(10, 11, 4),
(9, 12, 4),
(7, 13, 3);

-- --------------------------------------------------------

--
-- Table structure for table `cargo`
--

DROP TABLE IF EXISTS `cargo`;
CREATE TABLE IF NOT EXISTS `cargo` (
  `id_cargo` int(11) NOT NULL AUTO_INCREMENT,
  `cargo` varchar(145) NOT NULL,
  PRIMARY KEY (`id_cargo`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cargo`
--

INSERT INTO `cargo` (`id_cargo`, `cargo`) VALUES
(1, 'Administrador'),
(2, 'Coordinador'),
(3, 'Colaborador');

-- --------------------------------------------------------

--
-- Table structure for table `departamento`
--

DROP TABLE IF EXISTS `departamento`;
CREATE TABLE IF NOT EXISTS `departamento` (
  `id_departamento` int(11) NOT NULL AUTO_INCREMENT,
  `departamento_nombre` varchar(30) NOT NULL,
  `departamento_descripcion` varchar(30) NOT NULL,
  PRIMARY KEY (`id_departamento`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `departamento`
--

INSERT INTO `departamento` (`id_departamento`, `departamento_nombre`, `departamento_descripcion`) VALUES
(1, 'PAN Y CHAN 1', 'actibidades recreativas'),
(2, 'centro de interpretacion', 'centro de interpretacion'),
(3, 'teatro YULKUIKAT', 'teatro'),
(4, 'ecoventura', 'ecoventura'),
(5, 'iniciativa por la paz', 'iniciativa por la paz');

-- --------------------------------------------------------

--
-- Table structure for table `evento`
--

DROP TABLE IF EXISTS `evento`;
CREATE TABLE IF NOT EXISTS `evento` (
  `id_evento` int(11) NOT NULL AUTO_INCREMENT,
  `evento_nombre` varchar(45) NOT NULL,
  `evento_descripcion` varchar(45) NOT NULL,
  `id_grupo` int(11) NOT NULL,
  PRIMARY KEY (`id_evento`),
  UNIQUE KEY `fk_evento_grupo` (`id_grupo`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `evento`
--

INSERT INTO `evento` (`id_evento`, `evento_nombre`, `evento_descripcion`, `id_grupo`) VALUES
(3, 'charla', 'charla motivacional', 8),
(4, 'cine matine', 'proyeccion de peliculas de aprendizaje', 11),
(6, 'manualidades', 'manualidades', 42);

-- --------------------------------------------------------

--
-- Table structure for table `grupo`
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
-- Dumping data for table `grupo`
--

INSERT INTO `grupo` (`id_grupo`, `grupo_nombre`, `grupo_direccion`, `grupo_encargado`, `grupo_tel`, `grupo_descripcion`, `grupo_municipio`, `id_departamento`, `grupo_celular`) VALUES
(8, 'Casa de la cultura SBP', 'perulapia', 'jose mauricio martinez', '2379-8565', 'niÃ±os delas edades de 8 a 12 aÃ±os', 'San bartolome perulapia', 1, '7896-4563'),
(11, 'centor escolar jorge larde', 'san martin ', 'miguel montes', '2258-9632', 'alunos del centro escolar jorge larde de cuarto grado', 'san martin', 5, '7845-3254'),
(42, 'centro escolar san jose', 'san jose', 'maria hernandez', '2563-9874', 'alumnos de sexto grado del centro escolar san jose', 'san jose', 5, '7954-6321');

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `usuario_nombre`, `usuario_apellido`, `usuario_telefono`, `usuario`, `usuario_password`, `id_departamento`, `id_cargo`, `usuario_correo`) VALUES
(1, 'Jose ', 'Melgar Aguilar', '78773552', 'admin', '123456', 1, 1, 'jjanthonyma@gmail.com');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `alumno`
--
ALTER TABLE `alumno`
  ADD CONSTRAINT `alumno_ibfk_1` FOREIGN KEY (`id_grupo`) REFERENCES `grupo` (`id_grupo`);

--
-- Constraints for table `asistencia`
--
ALTER TABLE `asistencia`
  ADD CONSTRAINT `asistencia_ibfk_1` FOREIGN KEY (`id_alumno`) REFERENCES `alumno` (`id_alumno`),
  ADD CONSTRAINT `asistencia_ibfk_2` FOREIGN KEY (`id_evento`) REFERENCES `evento` (`id_evento`);

--
-- Constraints for table `evento`
--
ALTER TABLE `evento`
  ADD CONSTRAINT `evento_ibfk_1` FOREIGN KEY (`id_grupo`) REFERENCES `grupo` (`id_grupo`);

--
-- Constraints for table `grupo`
--
ALTER TABLE `grupo`
  ADD CONSTRAINT `grupo_ibfk_2` FOREIGN KEY (`id_departamento`) REFERENCES `departamento` (`id_departamento`);

--
-- Constraints for table `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`id_cargo`) REFERENCES `cargo` (`id_cargo`),
  ADD CONSTRAINT `usuario_ibfk_2` FOREIGN KEY (`id_departamento`) REFERENCES `departamento` (`id_departamento`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
