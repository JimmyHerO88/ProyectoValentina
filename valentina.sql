-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 06-12-2022 a las 17:52:24
-- Versión del servidor: 8.0.27
-- Versión de PHP: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `valentina`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `abono`
--

DROP TABLE IF EXISTS `abono`;
CREATE TABLE IF NOT EXISTS `abono` (
  `idabono` int NOT NULL AUTO_INCREMENT,
  `fecha` date DEFAULT NULL,
  `idempleado` int NOT NULL,
  `tipo` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `importe` decimal(11,2) NOT NULL,
  `idusuario` int NOT NULL,
  `idnomina` int DEFAULT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`idabono`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `caja_ahorro`
--

DROP TABLE IF EXISTS `caja_ahorro`;
CREATE TABLE IF NOT EXISTS `caja_ahorro` (
  `idcaja_ahorro` int NOT NULL AUTO_INCREMENT,
  `fecha` date DEFAULT NULL,
  `folio` int NOT NULL,
  `idempleado` int NOT NULL,
  `concepto` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `importe` decimal(11,2) NOT NULL,
  `idusuario` int NOT NULL,
  PRIMARY KEY (`idcaja_ahorro`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

DROP TABLE IF EXISTS `cliente`;
CREATE TABLE IF NOT EXISTS `cliente` (
  `idcliente` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(200) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `domicilio` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `tel_1` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `tel_2` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `email_1` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `email_2` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `status` int NOT NULL,
  `idusuario` int NOT NULL,
  PRIMARY KEY (`idcliente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `deposito`
--

DROP TABLE IF EXISTS `deposito`;
CREATE TABLE IF NOT EXISTS `deposito` (
  `iddeposito` int NOT NULL AUTO_INCREMENT,
  `tipo` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `concepto` varchar(100) NOT NULL,
  `importe` decimal(11,2) NOT NULL,
  `cant1` int NOT NULL,
  `cant2` int NOT NULL,
  `cant3` int NOT NULL,
  `cant4` int NOT NULL,
  `cant5` int NOT NULL,
  `cant6` int NOT NULL,
  `cant7` decimal(10,2) NOT NULL,
  `fecha` date DEFAULT NULL,
  `idusuario` int NOT NULL,
  `idsucursal` int NOT NULL,
  PRIMARY KEY (`iddeposito`)
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `deposito`
--

INSERT INTO `deposito` (`iddeposito`, `tipo`, `concepto`, `importe`, `cant1`, `cant2`, `cant3`, `cant4`, `cant5`, `cant6`, `cant7`, `fecha`, `idusuario`, `idsucursal`) VALUES
(24, 'DEPÓSITO', '  ', '31000.00', 8, 9, 75, 21, 22, 15, '0.00', '2022-10-18', 0, 1),
(25, 'DEPÓSITO', '  DEPOSITO DE PRUEBA', '35500.00', 10, 10, 100, 0, 0, 0, '500.00', '2022-11-01', 0, 1),
(26, 'DEPÓSITO', '  PRUEBA 4', '0.00', 0, 0, 0, 0, 0, 0, '0.00', '2022-11-01', 0, 1),
(27, 'DEPÓSITO', '  ', '0.00', 0, 0, 0, 0, 0, 0, '0.00', '2022-11-01', 0, 1),
(28, 'DEPÓSITO', '  ', '0.00', 0, 0, 0, 0, 0, 0, '0.00', '2022-11-01', 0, 1),
(29, 'DEPÓSITO', '  ', '0.00', 0, 0, 0, 0, 0, 0, '0.00', '2022-11-01', 0, 1),
(30, 'DEPÓSITO', '  ', '0.00', 0, 0, 0, 0, 0, 0, '0.00', '2022-11-01', 0, 1),
(31, 'DEPÓSITO', '  ', '17640.00', 0, 25, 25, 1, 0, 2, '0.00', '2022-11-01', 0, 1),
(35, 'DEPÓSITO', '  DEPOSITO DE PRUEBA', '8800.00', 0, 15, 0, 0, 0, 15, '1000.00', '2022-11-16', 1, 1),
(39, 'DEPÓSITO', '  FISCAL 2', '13000.00', 0, 0, 15, 25, 50, 250, '0.00', '2022-11-17', 1, 1),
(40, 'DEPÓSITO', '  FISCAL 3', '3377.00', 1, 2, 3, 4, 5, 6, '7.00', '2022-11-17', 1, 1),
(41, 'DEPÓSITO', '  FISCAL 3', '3377.00', 1, 2, 3, 4, 5, 6, '7.00', '2022-11-17', 1, 1),
(42, 'DEPÓSITO', '  REMISION 3', '4370.00', 1, 2, 3, 4, 5, 6, '1000.00', '2022-11-17', 1, 1),
(43, 'DEPÓSITO', '  FISCAL 4', '27600.00', 20, 10, 5, 4, 3, 2, '1010.00', '2022-11-17', 1, 1),
(46, 'DEPÓSITO', '  REMISION', '21600.00', 5, 8, 9, 4, 5, 6, '10030.00', '2022-11-17', 1, 1),
(48, 'DEPÓSITO', '  REMISION 25', '200.00', 0, 0, 0, 0, 0, 5, '100.00', '2022-11-17', 1, 1),
(49, 'DEPÓSITO', '  FISCAL 25', '25000.00', 25, 0, 0, 0, 0, 0, '0.00', '2022-11-17', 1, 1),
(60, 'TARJETA', '  ', '12530.25', 0, 0, 0, 0, 0, 0, '12530.25', '2022-11-17', 1, 1),
(61, 'TARJETA', '  ', '4500.00', 0, 0, 0, 0, 0, 0, '4500.00', '2022-11-23', 1, 1),
(62, 'DEPÓSITO', '  PRUEBA 500', '37900.00', 0, 25, 0, 254, 0, 0, '0.00', '2022-11-23', 1, 1),
(65, 'DEPÓSITO', '  ', '15.00', 0, 0, 0, 0, 0, 0, '15.00', '2022-11-23', 1, 1),
(66, 'TRANSFERENCIA BANCAR', '  ', '5985.00', 0, 0, 0, 0, 0, 0, '5985.00', '2022-11-23', 1, 1),
(67, 'DEPÓSITO', '  ', '6400.00', 0, 5, 12, 10, 10, 0, '0.00', '2022-11-26', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

DROP TABLE IF EXISTS `empleado`;
CREATE TABLE IF NOT EXISTS `empleado` (
  `idempleado` int NOT NULL AUTO_INCREMENT,
  `num_empleado` varchar(5) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(150) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `sueldo_dia` decimal(6,2) NOT NULL,
  `domicilio` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `fecha_contrato` date DEFAULT NULL,
  `ine_frente` varchar(200) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `ine_reverso` varchar(200) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `tel_1` varchar(15) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `tel_2` varchar(15) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `tel_3` varchar(15) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `tel_4` varchar(15) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `foto` varchar(250) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `idusuario` int NOT NULL,
  `idsucursal` int NOT NULL,
  `status` tinyint NOT NULL DEFAULT '1',
  PRIMARY KEY (`idempleado`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`idempleado`, `num_empleado`, `nombre`, `sueldo_dia`, `domicilio`, `fecha_nacimiento`, `fecha_contrato`, `ine_frente`, `ine_reverso`, `tel_1`, `tel_2`, `tel_3`, `tel_4`, `foto`, `idusuario`, `idsucursal`, `status`) VALUES
(1, '1', 'José Cruz', '316.00', '', '0000-00-00', '0000-00-00', '', '', '5620059618', '', '', '', '', 17, 1, 1),
(2, '2', 'SANDRA ESPEJO OLGUIN', '300.00', '', '0000-00-00', '0000-00-00', '', '', '5527966127', '', '', '', '', 17, 1, 1),
(3, '3', 'ALLAN MICHEL RANGEL GUAJARDO', '300.00', '', '0000-00-00', '2022-02-16', '', '', '', '', '', '', '', 15, 1, 1),
(4, '9', 'MARTHA', '250.00', '', '0000-00-00', '2022-02-16', '', '', '', '', '', '', '', 15, 1, 1),
(5, '4', 'RODOLFO  MEJORADA', '300.00', '', '0000-00-00', '0000-00-00', '', '', '5623941949', '', '', '', '', 17, 1, 1),
(6, '5', 'VIOLETA GUAJARDO', '300.00', '', '0000-00-00', '0000-00-00', '', '', '', '', '', '', '', 15, 1, 1),
(7, '7', 'PILAR HERNANDEZ ORTIZ', '300.00', '', '0000-00-00', '0000-00-00', '', '', '5621271620', '', '', '', '', 17, 1, 1),
(8, '10', 'SILVIA ESPEJO OLGUIN', '300.00', '', '0000-00-00', '0000-00-00', '', '', '', '', '', '', '', 17, 1, 1),
(9, '8', 'PATRICIA GONZALEZ ALBAVERA', '300.00', '', '0000-00-00', '0000-00-00', '', '', '', '', '', '', '', 15, 1, 1),
(10, '11', 'ANITA', '250.00', '', '0000-00-00', '0000-00-00', '', '', '', '', '', '', '', 17, 1, 1),
(11, '15', 'ALEJANDRA', '250.00', '', '0000-00-00', '0000-00-00', '', '', '', '', '', '', '', 17, 1, 1),
(12, '13', 'Raquel', '100.00', '', '0000-00-00', '0000-00-00', '', '', '', '', '', '', '', 17, 1, 1),
(13, '17', 'AURORA GUAJARDO', '300.00', '', '0000-00-00', '0000-00-00', '', '', '', '', '', '', '', 17, 1, 1),
(25, '', 'Jaime Hernández Ortiz', '660.00', '', '0000-00-00', '0000-00-00', 'vistas/img/empleados/Jaime Hernández Ortiz1669241792 frente.jpg', 'vistas/img/empleados/Jaime Hernández Ortiz1669241792 reverso.jpg', '5620059618', '', '5512787271', '', 'vistas/img/empleados/Jaime Hernández Ortiz1669241792.png', 0, 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

DROP TABLE IF EXISTS `factura`;
CREATE TABLE IF NOT EXISTS `factura` (
  `idfactura` int NOT NULL AUTO_INCREMENT,
  `folio` varchar(10) NOT NULL,
  `importe` decimal(11,2) NOT NULL,
  `fecha` date DEFAULT NULL,
  `idusuario` int NOT NULL,
  `idsucursal` int NOT NULL,
  PRIMARY KEY (`idfactura`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gasto`
--

DROP TABLE IF EXISTS `gasto`;
CREATE TABLE IF NOT EXISTS `gasto` (
  `idgasto` int NOT NULL AUTO_INCREMENT,
  `fecha` date DEFAULT NULL,
  `concepto` varchar(150) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `tipo` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `importe` decimal(11,2) NOT NULL,
  `idusuario` int NOT NULL,
  `idsucursal` int NOT NULL,
  PRIMARY KEY (`idgasto`)
) ENGINE=InnoDB AUTO_INCREMENT=138 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `gasto`
--

INSERT INTO `gasto` (`idgasto`, `fecha`, `concepto`, `tipo`, `importe`, `idusuario`, `idsucursal`) VALUES
(86, '2022-11-10', 'XXX', 'TIENDA', '10.00', 1, 0),
(87, '2022-11-10', '222555DFSD', 'PERSONAL', '222.00', 1, 0),
(88, '2022-11-10', 'GJJFGJGJ', 'TIENDA', '250.00', 1, 0),
(89, '2022-11-10', 'XXX2', 'TIENDA', '230.00', 1, 0),
(90, '2022-11-10', 'GSDG', 'TIENDA', '213.00', 1, 0),
(91, '2022-11-10', 'GDZFHfh', 'TIENDA', '250.00', 1, 0),
(92, '2022-11-10', 'XXX3', 'TIENDA', '200.00', 1, 0),
(93, '2022-11-10', 'XXX4', 'TIENDA', '5451.00', 1, 0),
(94, '2022-11-10', 'XXX4', 'TIENDA', '2255.00', 1, 0),
(95, '2022-11-10', 'XXXXX1', 'TIENDA', '250.00', 1, 0),
(96, '2022-11-11', 'GASTO DE PRUEBA', 'TIENDA', '100.00', 1, 0),
(97, '2022-11-11', 'GASTO DE PRUEBA 22', 'TIENDA', '4354.00', 1, 0),
(98, '2022-11-11', 'COLEGIATURA DE VALENTINA Y NOCILE NOVIEMBRE 2022', 'PERSONAL', '5000.00', 1, 0),
(99, '2022-11-11', 'PRUEBA 5001', 'TIENDA', '145.00', 1, 0),
(100, '2022-11-11', 'COLEGIATURA DE VALENTINA Y NOCILE NOVIEMBRE 2022', 'PERSONAL', '15000.00', 1, 0),
(101, '2022-11-11', 'CHKJHK', 'PERSONAL', '100.00', 1, 0),
(102, '2022-11-11', 'XXX4', 'PERSONAL', '320.00', 1, 0),
(103, '2022-11-11', 'JFTUFTU', 'PERSONAL', '255.00', 1, 0),
(104, '2022-11-11', 'GASTO DE PRUEBA', 'TIENDA', '140.00', 1, 0),
(105, '2022-11-11', 'PRUEBA154', 'TIENDA', '120.00', 1, 0),
(106, '2022-11-11', 'PRUEBA DEFINITIVA', 'TIENDA', '230.00', 1, 0),
(107, '2022-11-11', 'PRUEBA DEFINITIVA', 'PERSONAL', '5000.00', 1, 0),
(108, '2022-11-11', 'PRUEBA DEFINITIVA', 'PERSONAL', '100.00', 1, 0),
(109, '2022-11-11', 'PRUEBA DEFINITIVA', 'PERSONAL', '1500.00', 1, 0),
(110, '2022-11-11', 'PRUEBA DEFINITIVA', 'TIENDA', '1500.00', 1, 0),
(111, '2022-11-11', 'GASTO DE PRUEBA 22', 'TIENDA', '250.00', 1, 0),
(112, '2022-11-11', 'DDHDFH', 'PERSONAL', '1000.00', 1, 0),
(113, '2022-11-11', 'PRUEBA DEFINITIVA', 'TIENDA', '1500.00', 1, 0),
(114, '2022-11-11', '254', 'PERSONAL', '25.00', 1, 0),
(115, '2022-11-11', 'PRUEBA DEFINITIVA', 'TIENDA', '2500.00', 1, 0),
(116, '2022-11-11', 'GASTO DE PRUEBA 22', 'TIENDA', '125.00', 1, 0),
(117, '2022-11-11', 'PRUEBA DEFINITIVA', 'TIENDA', '500.00', 1, 0),
(118, '2022-11-11', 'PRUEBA DEFINITIVA 200', 'TIENDA', '12580.00', 1, 0),
(119, '2022-11-11', 'COLEGIATURA DE VALENTINA Y NOCILE NOVIEMBRE 2022', 'PERSONAL', '15000.00', 1, 0),
(120, '2022-11-11', 'COLEGIATURA DE VALENTINA Y NOCILE NOVIEMBRE 2022', 'PERSONAL', '25000.00', 1, 0),
(121, '2022-11-11', 'COLEGIATURA DE VALENTINA Y NOCILE NOVIEMBRE 2022', 'TIENDA', '50000.00', 1, 0),
(122, '2022-11-11', 'COLEGIATURA DE VALENTINA Y NOCILE NOVIEMBRE 2022', 'PERSONAL', '125000.00', 1, 0),
(123, '2022-11-11', 'COLEGIATURA DE VALENTINA Y NOCILE NOVIEMBRE 2022', 'TIENDA', '50000.00', 1, 0),
(124, '2022-11-11', 'COLEGIATURA DE VALENTINA Y NOCILE NOVIEMBRE 2022', 'TIENDA', '30000.00', 1, 0),
(125, '2022-11-11', 'MORRALLA', 'TIENDA', '2500.00', 1, 0),
(126, '2022-11-11', 'PRUEBA DESDE MODAL', 'PERSONAL', '777.00', 1, 0),
(127, '2022-11-11', 'COMIDA', 'PERSONAL', '500.00', 1, 0),
(128, '2022-11-16', 'PRUEBA DEFINITIVA', 'TIENDA', '1500.00', 1, 0),
(129, '2022-11-17', 'GASTO DE PRUEBA 22', 'TIENDA', '1500.00', 1, 0),
(130, '2022-11-17', 'COLEGIATURA DE VALENTINA Y NOCILE NOVIEMBRE 2022', 'PERSONAL', '5600.00', 1, 0),
(131, '2022-11-17', 'PRUEBA 5001', 'TIENDA', '1500.00', 1, 0),
(132, '2022-11-17', 'COLEGIATURA DE VALENTINA Y NOCILE NOVIEMBRE 2022', 'TIENDA', '5200.00', 1, 0),
(133, '2022-11-17', 'COLEGIATURA DE VALENTINA Y NOCILE NOVIEMBRE 2022', 'TIENDA', '7000.00', 1, 0),
(134, '2022-11-23', 'RENTA', 'TIENDA', '15000.00', 1, 0),
(135, '2022-11-23', 'COMIDA JOANA', 'PERSONAL', '300.00', 1, 0),
(136, '2022-11-23', 'SERVICIO DE SISTEMA WEB', 'TIENDA', '2500.00', 1, 0),
(137, '2022-11-23', 'DESAYUNO', 'PERSONAL', '305.00', 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `linea`
--

DROP TABLE IF EXISTS `linea`;
CREATE TABLE IF NOT EXISTS `linea` (
  `idlinea` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(150) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `status` int NOT NULL,
  `idusuario` int NOT NULL,
  PRIMARY KEY (`idlinea`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `linea`
--

INSERT INTO `linea` (`idlinea`, `nombre`, `status`, `idusuario`) VALUES
(1, 'VELAS', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `liquidaciones`
--

DROP TABLE IF EXISTS `liquidaciones`;
CREATE TABLE IF NOT EXISTS `liquidaciones` (
  `idliquidacion` int NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL,
  `concepto` varchar(150) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `importe` decimal(11,2) NOT NULL,
  `idusuario` int NOT NULL,
  `idsucursal` int NOT NULL,
  PRIMARY KEY (`idliquidacion`)
) ENGINE=InnoDB AUTO_INCREMENT=91 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `liquidaciones`
--

INSERT INTO `liquidaciones` (`idliquidacion`, `fecha`, `concepto`, `importe`, `idusuario`, `idsucursal`) VALUES
(2, '2022-02-21', 'CAMBIO', '3000.00', 17, 1),
(3, '2022-02-21', 'FOLIO 1602', '120.00', 17, 1),
(4, '2022-02-21', 'CAMBIO DÍA ANTERIOR', '1467.00', 17, 1),
(5, '2022-02-21', 'VTA ANTERIOR', '1500.00', 17, 1),
(6, '2022-02-22', 'CAMBIO DÍA ANTERIOR', '3865.00', 17, 1),
(7, '2022-02-23', 'SANITIZANTE CLAU', '20.00', 17, 1),
(8, '2022-02-23', 'CAMBIO DÍA ANTERIOR', '4005.00', 17, 1),
(9, '2022-02-24', 'CAMBIO DÍA ANTERIOR', '3151.00', 17, 1),
(10, '2022-03-01', 'PILI', '82.00', 17, 1),
(11, '2022-03-01', 'VTA AYER', '1000.00', 17, 1),
(12, '2022-03-01', 'CAMBIO DÍA ANTERIOR', '3040.00', 17, 1),
(13, '2022-03-02', 'CAMBIO DÍA ANTERIOR', '3119.00', 17, 1),
(14, '2022-03-03', 'ÁNGEL', '1085.00', 17, 1),
(15, '2022-03-03', 'CAMBIO DÍA ANTERIOR', '2235.00', 17, 1),
(16, '2022-03-04', 'POLI AYER', '50.00', 17, 1),
(17, '2022-03-04', 'CAMBIO ÁNGEL', '3000.00', 17, 1),
(19, '2022-03-04', 'CAMBIO DÍA ANTERIOR', '1480.00', 17, 1),
(20, '2022-03-05', 'PAGO PRÉSTAMO PILI', '118.00', 17, 1),
(21, '2022-03-05', 'ENTREGA DE PEDIDO 1606', '900.00', 17, 1),
(22, '2022-03-05', 'CAMBIO ÁNGEL', '140.00', 17, 1),
(23, '2022-03-05', 'ENTREGA DE PEDIDO 1613', '410.00', 17, 1),
(24, '2022-03-05', 'CAMBIO DÍA ANTERIOR', '3315.00', 17, 1),
(25, '2022-03-06', '1615 PEDIDO LIQUIDADO', '700.00', 17, 1),
(26, '2022-03-06', 'CAMBIO JOANA', '1000.00', 17, 1),
(27, '2022-03-06', 'CAMBIO DÍA ANTERIOR', '1420.00', 17, 1),
(28, '2022-03-07', 'VTA AYER', '5900.00', 17, 1),
(29, '2022-03-07', 'VTA AYER', '12000.00', 17, 1),
(30, '2022-03-07', 'CAMBIO DÍA ANTERIOR', '1445.00', 17, 1),
(31, '2022-03-08', 'VTA AYER', '900.00', 17, 1),
(32, '2022-03-08', 'PAGO PRÉSTAMO PILI', '1000.00', 17, 1),
(33, '2022-03-08', 'CAMBIO ÁNGEL', '3000.00', 17, 1),
(34, '2022-03-08', 'JOANA', '9000.00', 17, 1),
(35, '2022-03-08', 'CAMBIO DÍA ANTERIOR', '365.00', 17, 1),
(36, '2022-03-09', 'CAMBIO DÍA ANTERIOR', '2842.00', 17, 1),
(37, '2022-03-10', 'RESINA LEYTE  2175', '840.00', 17, 1),
(38, '2022-03-10', 'CAMBIO DÍA ANTERIOR', '1844.00', 17, 1),
(39, '2022-03-11', 'PAGO VIOLE', '120.00', 17, 1),
(40, '2022-03-11', 'VTA AYER', '7000.00', 17, 1),
(41, '2022-03-11', 'CAMBIO ÁNGEL', '3000.00', 17, 1),
(42, '2022-03-11', 'ABONO PATY', '200.00', 17, 1),
(43, '2022-03-11', 'CAMBIO DÍA ANTERIOR', '300.00', 17, 1),
(44, '2022-03-12', 'PRÉSTAMO PILI', '1000.00', 17, 1),
(45, '2022-03-12', 'FUNKOS PILI', '220.00', 17, 1),
(46, '2022-03-12', 'CAMBIO TAXI RODOLFO', '50.00', 17, 1),
(47, '2022-03-12', 'CAMBIO DÍA ANTERIOR', '962.00', 17, 1),
(49, '2022-03-13', 'VTA JUEVES', '5000.00', 17, 1),
(50, '2022-03-13', 'PRÉSTAMO SANDRA', '20.00', 17, 1),
(51, '2022-03-13', 'CAMBIO DÍA ANTERIOR', '1505.00', 17, 1),
(52, '2022-03-14', 'CAMBIO ÁNGEL', '3000.00', 17, 1),
(53, '2022-03-14', 'CAMBIO DÍA ANTERIOR', '1300.00', 17, 1),
(56, '2022-03-15', 'CAMBIO DÍA ANTERIOR', '4132.00', 17, 1),
(57, '2022-03-15', 'VTA AYER', '840.00', 17, 1),
(58, '2022-03-15', 'PRESTAMO PILI', '415.00', 17, 1),
(59, '2022-03-16', 'VTA LUNES', '400.00', 17, 1),
(60, '2022-03-16', 'CAMBIO DÍA ANTERIOR', '3515.00', 17, 1),
(61, '2022-03-17', 'ABONO PATY', '200.00', 17, 1),
(62, '2022-03-17', 'CAMBIO DÍA ANTERIOR', '2380.00', 17, 1),
(63, '2022-03-18', 'VTA AYER', '11000.00', 17, 1),
(64, '2022-03-18', 'CAMBIO DÍA ANTERIOR', '1130.00', 17, 1),
(65, '2022-03-19', 'CAMBIO DÍA ANTERIOR', '1946.00', 17, 1),
(66, '2022-03-20', 'CAMBIO ÁNGEL', '3000.00', 17, 1),
(67, '2022-03-20', 'CAMBIO DÍA ANTERIOR', '394.00', 17, 1),
(68, '2022-03-21', 'VTA AYER', '2000.00', 17, 1),
(69, '2022-03-21', 'ALLAN AYER', '20.00', 17, 1),
(70, '2022-03-21', 'CAMBIO DÍA ANTERIOR', '2855.00', 17, 1),
(71, '2022-03-22', 'CAMBIO AGUA', '146.00', 17, 1),
(72, '2022-03-22', 'CAMBIO DÍA ANTERIOR', '2384.00', 17, 1),
(73, '2022-03-23', 'VTA LUNES', '14600.00', 17, 1),
(74, '2022-03-23', 'VTA ANTERIOR', '8000.00', 17, 1),
(75, '2022-03-23', 'CAMBIO DÍA ANTERIOR', '1941.00', 17, 1),
(76, '2022-03-24', 'NOM RODOLFO', '785.00', 17, 1),
(77, '2022-03-24', 'CAMBIO DÍA ANTERIOR', '1194.00', 17, 1),
(78, '2022-04-25', 'PAGO ADELANTO PILI', '300.00', 17, 1),
(79, '2022-04-25', 'CAMBIO ÁNGEL', '3200.00', 17, 1),
(80, '2022-04-25', 'IVA PARA FACTURAR', '70.50', 17, 1),
(81, '2022-04-25', 'CAMBIO DÍA ANTERIOR', '415.00', 17, 1),
(82, '2022-03-26', 'CAMBIO DÍA ANTERIOR', '2876.00', 17, 1),
(83, '2022-03-27', 'CAMBIO DÍA ANTERIOR', '1917.00', 17, 1),
(84, '2022-03-28', 'CAMBIO DÍA ANTERIOR', '1600.00', 17, 1),
(85, '2022-03-29', 'PRÉSTAMO PILI', '700.00', 17, 1),
(86, '2022-03-29', 'CAMBIO DÍA ANTERIOR', '1836.00', 17, 1),
(87, '2022-11-23', 'LIQUIDACION DE PRUEBA 500', '3000.00', 1, 1),
(88, '2022-11-23', 'LIQUIDACION DE PRUEBA 3', '500.00', 1, 1),
(89, '2022-11-23', 'PRUEBA DESDE EL MODAL EN RESUMEN', '2500.00', 1, 1),
(90, '2022-11-23', 'LIQUIDACION 501A', '4500.00', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nomina`
--

DROP TABLE IF EXISTS `nomina`;
CREATE TABLE IF NOT EXISTS `nomina` (
  `idnomina` int NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL,
  `idempleado` int NOT NULL,
  `dias` decimal(11,2) NOT NULL,
  `t_extra` decimal(11,2) NOT NULL,
  `ventas` decimal(11,2) NOT NULL,
  `t_perdido` decimal(11,2) NOT NULL,
  `a_cuenta` decimal(11,2) NOT NULL,
  `abono` decimal(11,2) NOT NULL,
  `mercancia` decimal(11,2) NOT NULL,
  `caja_ahorro` decimal(11,2) NOT NULL,
  `t_general` decimal(11,2) NOT NULL,
  `tipo` int NOT NULL,
  `idusuario` int NOT NULL,
  `idsucursal` int NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`idnomina`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `nomina`
--

INSERT INTO `nomina` (`idnomina`, `fecha`, `idempleado`, `dias`, `t_extra`, `ventas`, `t_perdido`, `a_cuenta`, `abono`, `mercancia`, `caja_ahorro`, `t_general`, `tipo`, `idusuario`, `idsucursal`, `fecha_creacion`) VALUES
(1, '2022-11-30', 1, '6.00', '100.00', '300.00', '50.00', '200.00', '300.00', '100.00', '50.00', '1200.00', 1, 1, 1, '2022-11-30 21:19:10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notas_credito`
--

DROP TABLE IF EXISTS `notas_credito`;
CREATE TABLE IF NOT EXISTS `notas_credito` (
  `idnota` int NOT NULL AUTO_INCREMENT,
  `folio` varchar(10) NOT NULL,
  `cliente` varchar(100) NOT NULL,
  `importe` decimal(10,2) NOT NULL,
  `abono` decimal(10,2) NOT NULL,
  `fecha` date DEFAULT NULL,
  `idsucursal` int NOT NULL,
  `idusuario` int NOT NULL,
  PRIMARY KEY (`idnota`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pago_proveedor`
--

DROP TABLE IF EXISTS `pago_proveedor`;
CREATE TABLE IF NOT EXISTS `pago_proveedor` (
  `idpagoproveedor` int NOT NULL AUTO_INCREMENT,
  `fecha` date DEFAULT NULL,
  `concepto` varchar(150) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `importe` decimal(11,2) NOT NULL,
  `idusuario` int NOT NULL,
  `idsucursal` int NOT NULL,
  PRIMARY KEY (`idpagoproveedor`)
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `pago_proveedor`
--

INSERT INTO `pago_proveedor` (`idpagoproveedor`, `fecha`, `concepto`, `importe`, `idusuario`, `idsucursal`) VALUES
(2, '2022-02-21', 'RESINA MATERIA', '9000.00', 17, 1),
(4, '2022-02-21', 'CLAUDIA', '9410.00', 17, 1),
(5, '2022-02-22', 'ARMANDO FUENTES', '980.00', 17, 1),
(6, '2022-02-22', 'EDMUNDO HERRERÍA', '3600.00', 17, 1),
(7, '2022-02-23', 'CLAUDIA', '3882.00', 17, 1),
(8, '2022-02-24', 'JONATHAN', '1451.00', 17, 1),
(9, '2022-03-02', 'SOAPELEGANCE', '1464.75', 17, 1),
(10, '2022-03-02', 'SOAPELEGANCE ATRASADA', '513.00', 17, 1),
(11, '2022-03-02', 'SOAPELEGANCE SALDO A FAVOR', '23.00', 17, 1),
(12, '2022-03-03', 'JONATHAN', '1512.00', 17, 1),
(13, '2022-03-04', 'JONATHAN', '1176.00', 17, 1),
(14, '2022-03-04', 'ACRILICO', '6120.00', 17, 1),
(15, '2022-03-05', 'IVÁN', '2400.00', 17, 1),
(16, '2022-03-05', 'CLAUDIA', '1650.00', 17, 1),
(17, '2022-03-07', 'FERNANDO ROMERO', '5975.00', 17, 1),
(18, '2022-03-07', 'CLAUDIA', '14265.00', 17, 1),
(19, '2022-03-07', 'JONATHAN', '2292.00', 17, 1),
(20, '2022-03-08', 'JORGE RETABLOS', '1050.00', 17, 1),
(21, '2022-03-08', 'CESAR MADERA', '11025.00', 17, 1),
(22, '2022-03-08', 'CLAUDIA', '625.00', 17, 1),
(23, '2022-03-09', 'CLAUDIA', '1625.00', 17, 1),
(24, '2022-03-10', 'CLAUDIA', '750.00', 17, 1),
(25, '2022-03-11', 'SR FERNANDO', '1575.00', 17, 1),
(26, '2022-03-11', 'SR EDMUNDO', '7680.00', 17, 1),
(27, '2022-03-11', 'DECENARIOS', '4320.00', 17, 1),
(28, '2022-03-11', 'CLAUDIA', '4000.00', 17, 1),
(29, '2022-03-11', 'JONATHAN', '1512.00', 17, 1),
(30, '2022-03-12', 'IVÁN', '1140.00', 17, 1),
(31, '2022-03-12', 'CLAUDIA', '4548.00', 17, 1),
(32, '2022-03-14', 'ARMANDO ROMERO', '1150.00', 17, 1),
(33, '2022-03-16', 'CLAUDIA', '2075.00', 17, 1),
(34, '2022-03-17', 'SOAPELEGANCE', '1000.00', 17, 1),
(35, '2022-03-18', 'FERNANDO ROMERO', '10100.00', 17, 1),
(36, '2022-03-18', 'EDMUNDO HERRERÍA', '2160.00', 17, 1),
(37, '2022-03-18', 'KAREN DECENARIOS', '4839.50', 17, 1),
(38, '2022-03-18', 'JONATHAN', '1055.00', 17, 1),
(39, '2022-03-18', 'CLAUDIA', '3600.00', 17, 1),
(40, '2022-03-22', 'CLAUDIA', '2400.00', 17, 1),
(41, '2022-03-22', 'JONATHAN', '406.00', 17, 1),
(42, '2022-03-23', 'CARLOS TIRADO', '15840.00', 17, 1),
(43, '2022-03-23', 'CLAUDIA', '2370.00', 17, 1),
(44, '2022-03-23', 'CESAR MADERA', '16057.00', 17, 1),
(45, '2022-03-24', 'EDUARDO F', '5810.00', 17, 1),
(46, '2022-03-25', 'FERNANDO ROMERO', '6400.00', 17, 1),
(47, '2022-03-25', 'POLIFORMAS', '1574.00', 17, 1),
(48, '2022-03-25', 'CLAUDIA', '4110.00', 17, 1),
(49, '2022-03-26', 'IVÁN', '720.00', 17, 1),
(50, '2022-03-29', 'ARMANDO FUENTES', '2400.00', 17, 1),
(53, '2022-11-17', 'CUBASA', '1250.00', 1, 1),
(54, '2022-11-17', 'VENCORT', '4500.00', 1, 1),
(55, '2022-11-17', 'FERFIL', '4590.00', 1, 1),
(56, '2022-11-23', 'TERSIL', '10000.00', 1, 1),
(57, '2022-11-23', 'VELAS', '4500.00', 1, 1),
(58, '2022-11-23', 'JABONES', '3500.00', 1, 1),
(59, '2022-11-23', 'TAZAS DE CERAMICA', '5000.00', 1, 1),
(61, '2022-11-23', 'VACA BARRILES', '6000.00', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permiso`
--

DROP TABLE IF EXISTS `permiso`;
CREATE TABLE IF NOT EXISTS `permiso` (
  `idpermiso` tinyint NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  PRIMARY KEY (`idpermiso`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `permiso`
--

INSERT INTO `permiso` (`idpermiso`, `nombre`) VALUES
(1, 'Acceso'),
(2, 'Corte de caja'),
(3, 'Nómina'),
(4, 'Escritorio'),
(5, 'Clientes'),
(6, 'Consultas'),
(7, 'Productos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prestamo`
--

DROP TABLE IF EXISTS `prestamo`;
CREATE TABLE IF NOT EXISTS `prestamo` (
  `idprestamo` int NOT NULL AUTO_INCREMENT,
  `fecha` date DEFAULT NULL,
  `idempleado` int NOT NULL,
  `tipo` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `importe` decimal(11,2) NOT NULL,
  `idusuario` int NOT NULL,
  PRIMARY KEY (`idprestamo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

DROP TABLE IF EXISTS `producto`;
CREATE TABLE IF NOT EXISTS `producto` (
  `idproducto` int NOT NULL AUTO_INCREMENT,
  `codigo1` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `codigo2` varchar(25) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(150) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `idproveedor` int NOT NULL,
  `idlinea` int NOT NULL,
  `precio1` decimal(11,2) NOT NULL,
  `precio2` decimal(11,2) NOT NULL,
  `status` int NOT NULL,
  `idusuario` int NOT NULL,
  PRIMARY KEY (`idproducto`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`idproducto`, `codigo1`, `codigo2`, `nombre`, `idproveedor`, `idlinea`, `precio1`, `precio2`, `status`, `idusuario`) VALUES
(1, '001VEL002', '1315564534', 'VELA ANGEL CEPILLADO', 1, 1, '37.00', '34.00', 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

DROP TABLE IF EXISTS `proveedor`;
CREATE TABLE IF NOT EXISTS `proveedor` (
  `idproveedor` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(200) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `status` int NOT NULL DEFAULT '1',
  `idusuario` int NOT NULL,
  PRIMARY KEY (`idproveedor`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`idproveedor`, `nombre`, `status`, `idusuario`) VALUES
(1, 'CLAUDIA VERAZ', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro_caja`
--

DROP TABLE IF EXISTS `registro_caja`;
CREATE TABLE IF NOT EXISTS `registro_caja` (
  `idcaja` int NOT NULL AUTO_INCREMENT,
  `fecha` date DEFAULT NULL,
  `folio` int NOT NULL,
  `nombre` varchar(150) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `concepto` varchar(200) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `importe` decimal(11,2) NOT NULL,
  `idusuario` int NOT NULL,
  PRIMARY KEY (`idcaja`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro_notas`
--

DROP TABLE IF EXISTS `registro_notas`;
CREATE TABLE IF NOT EXISTS `registro_notas` (
  `idnota` int NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL,
  `rango_folios` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `concepto` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `total` decimal(13,2) NOT NULL,
  `cliente` varchar(150) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `tipo_pago` varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `observaciones` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `idusuario` int NOT NULL,
  PRIMARY KEY (`idnota`)
) ENGINE=InnoDB AUTO_INCREMENT=218 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `registro_notas`
--

INSERT INTO `registro_notas` (`idnota`, `fecha`, `rango_folios`, `concepto`, `total`, `cliente`, `tipo_pago`, `observaciones`, `idusuario`) VALUES
(1, '2022-02-14', '001-250', 'NOTAS REMISIÓN', '8945.00', '', 'EFECTIVO', '', 15),
(2, '2022-02-14', '001-009', 'TICKETS FISCALES', '3915.64', '', '', '', 15),
(3, '2022-02-20', '2383', 'NOTAS REMISIÓN', '280.00', '', '', '', 17),
(4, '2022-02-20', '2384', 'NOTAS REMISIÓN', '70.00', '', '', '', 17),
(5, '2022-02-20', '2385', 'NOTAS REMISIÓN', '150.00', '', '', '', 17),
(6, '2022-02-20', '1607', 'NOTAS PEDIDOS', '372.00', '', 'EFECTIVO', 'PEDIDO  VELA DE ÁNGEL LISO BEIGE', 17),
(7, '2022-02-20', '1608', 'NOTAS PEDIDOS', '200.00', '', '', '200 A/C RESTAN 170', 17),
(8, '2022-02-21', '2386', 'NOTAS REMISIÓN', '60.00', '', '', '', 17),
(9, '2022-02-21', '2387', 'NOTAS REMISIÓN', '84.00', '', '', '', 17),
(10, '2022-02-21', '2388', 'NOTAS REMISIÓN', '438.00', '', '', '', 17),
(11, '2022-02-21', '2389', 'NOTAS REMISIÓN', '20.00', '', '', '', 17),
(12, '2022-02-21', '2390', 'NOTAS REMISIÓN', '90.00', '', '', '', 17),
(13, '2022-02-21', '2391', 'NOTAS REMISIÓN', '50.00', '', '', '', 17),
(14, '2022-02-21', '1609', 'NOTAS PEDIDOS', '500.00', '', '', '500 A/ CUENTA', 17),
(16, '2022-02-21', '18489', 'TICKETS FISCALES', '2748.00', '', '', '', 17),
(18, '2022-02-21', '15542158', 'TICKETS REMISONES', '35333.05', '', '', '', 17),
(19, '2022-02-22', '125-154', 'TICKETS FISCALES', '8490.80', '', '', '', 17),
(21, '2022-02-22', '251-5245', 'TICKETS REMISONES', '40588.70', '', '', '', 17),
(22, '2022-02-23', '2394', 'NOTAS REMISIÓN', '60.00', '', '', '', 17),
(23, '2022-02-23', '216463-164-', 'TICKETS REMISONES', '19646.00', '', '', '', 17),
(24, '2022-02-23', '2552-355', 'TICKETS FISCALES', '8193.00', '', 'TARJETA', '', 17),
(25, '2022-02-24', '2395', 'NOTAS REMISIÓN', '25.00', '', '', '', 17),
(26, '2022-02-24', '1612', 'NOTAS REMISIÓN', '408.00', '', '', '', 17),
(27, '2022-02-24', '1611', 'NOTAS REMISIÓN', '75.00', '', '', '', 17),
(28, '2022-02-24', '2167', 'NOTAS REMISIÓN', '2151.00', 'SR. LEYTE', '', 'RESINA', 17),
(29, '2022-02-24', '1610', 'NOTAS PEDIDOS', '200.00', '', '', '200 A/CUENTA', 17),
(30, '2022-02-24', '----', 'TICKETS REMISONES', '18127.00', '', '', '', 17),
(31, '2022-02-24', '---', 'TICKETS FISCALES', '3744.24', '', 'TARJETA', '', 17),
(32, '2022-03-01', '2404', 'NOTAS REMISIÓN', '30.00', '', '', '', 17),
(33, '2022-03-01', '1601', 'NOTAS PEDIDOS', '680.00', '', '', '', 17),
(34, '2022-03-01', '-', 'TICKETS REMISONES', '18605.15', '', '', '', 17),
(35, '2022-03-01', '--', 'TICKETS FISCALES', '9862.00', '', 'TARJETA', '', 17),
(36, '2022-03-02', '2405', 'NOTAS REMISIÓN', '24.00', '', '', '', 17),
(38, '2022-03-02', '---', 'TICKETS FISCALES', '1063.00', '', 'TARJETA', '', 17),
(39, '2022-03-02', '---', 'TICKETS REMISONES', '23020.00', '', '', '', 17),
(40, '2022-03-03', '--', 'NOTAS REMISIÓN', '20881.29', '', '', '', 17),
(41, '2022-03-03', '---', 'TICKETS FISCALES', '10825.20', '', 'TARJETA', '', 17),
(42, '2022-03-04', '2408', 'NOTAS REMISIÓN', '180.00', '', '', '', 17),
(43, '2022-03-04', '2174', 'NOTAS REMISIÓN', '2035.00', 'SR. LEYTE', '', '', 17),
(44, '2022-03-04', '1618', 'NOTAS PEDIDOS', '500.00', 'A/CUENTA', '', '', 17),
(45, '2022-03-04', '1619', 'NOTAS PEDIDOS', '300.00', 'A/CUENTA', '', '', 17),
(46, '2022-03-04', '9249-9258', 'TICKETS FISCALES', '13762.00', '', 'TARJETA', '', 17),
(47, '2022-03-04', '62699-62645', 'TICKETS REMISONES', '17930.95', '', 'EFECTIVO', '', 17),
(48, '2022-03-04', '1617', 'NOTAS PEDIDOS', '520.00', '', '', '', 17),
(49, '2022-03-05', '1621', 'NOTAS PEDIDOS', '500.00', '', '', '500 A/ CUENTA', 17),
(50, '2022-03-05', '1620', 'NOTAS PEDIDOS', '200.00', '', '', '200 A/CUENTA', 17),
(51, '2022-03-05', '2164', 'NOTAS REMISIÓN', '50.00', '', '', '', 17),
(52, '2022-03-05', '2411', 'NOTAS REMISIÓN', '75.00', '', '', '', 17),
(55, '2022-03-05', '62700-62817', 'TICKETS REMISONES', '33828.00', '', '', '', 17),
(56, '2022-03-05', '9259-9271', 'TICKETS FISCALES', '116601.78', '', 'TARJETA', '', 17),
(59, '2022-03-06', '2414', 'NOTAS REMISIÓN', '100.00', '', '', '', 17),
(60, '2022-03-06', '2413', 'NOTAS REMISIÓN', '50.00', '', '', '', 17),
(61, '2022-03-06', '62818- 62877', 'TICKETS REMISONES', '17806.00', '', '', '', 17),
(62, '2022-03-06', '9278-9292', 'TICKETS FISCALES', '14338.20', '', 'TARJETA', '', 17),
(63, '2022-03-07', '2417', 'NOTAS REMISIÓN', '90.00', '', '', '', 17),
(64, '2022-03-07', '2420', 'NOTAS REMISIÓN', '70.00', '', '', '', 17),
(65, '2022-03-07', '2418', 'NOTAS REMISIÓN', '50.00', '', '', '', 17),
(68, '2022-03-07', '----', 'TICKETS REMISONES', '13771.00', '', '', '', 17),
(69, '2022-03-07', '9293-9303', 'TICKETS FISCALES', '5532.00', '', 'TARJETA', '', 17),
(70, '2022-03-08', '2423', 'NOTAS REMISIÓN', '190.00', '', '', '', 17),
(71, '2022-03-08', '1623', 'NOTAS PEDIDOS', '1000.00', 'A/CUENTA', '', '', 17),
(72, '2022-03-08', '1624', 'NOTAS PEDIDOS', '238.00', 'A/CUENTA', '', '', 17),
(73, '2022-03-08', '62919-62975', 'TICKETS REMISONES', '10531.00', '', '', '', 17),
(74, '2022-03-08', '9304-9317', 'TICKETS FISCALES', '10263.76', '', 'TARJETA', '', 17),
(75, '2022-03-09', '2424', 'TICKETS REMISONES', '220.00', '', '', '', 17),
(76, '2022-03-09', '2425', 'TICKETS REMISONES', '50.00', '', '', '', 17),
(77, '2022-03-09', '2426', 'TICKETS REMISONES', '39.00', '', '', '', 17),
(78, '2022-03-09', '1625', 'NOTAS PEDIDOS', '500.00', 'A/CUENTA', '', '', 17),
(79, '2022-03-09', '1626', 'NOTAS PEDIDOS', '700.00', 'A/CUENTA', '', '', 17),
(80, '2022-03-09', '----', 'TICKETS REMISONES', '17601.00', '', '', '', 17),
(81, '2022-03-09', '----', 'TICKETS FISCALES', '3987.20', '', 'TARJETA', '', 17),
(82, '2022-03-10', '2428', 'NOTAS REMISIÓN', '30.00', '', '', '', 17),
(83, '2022-03-10', '2427', 'NOTAS REMISIÓN', '40.00', '', '', '', 17),
(84, '2022-03-10', '63033-63084', 'TICKETS REMISONES', '15474.75', '', '', '', 17),
(85, '2022-03-10', '9326-9334', 'TICKETS FISCALES', '4177.00', '', 'TARJETA', '', 17),
(86, '2022-03-11', '2429', 'NOTAS REMISIÓN', '80.00', '', '', '', 17),
(87, '2022-03-11', '63085-63125', 'TICKETS REMISONES', '12710.00', '', '', '', 17),
(88, '2022-03-11', '9337-9345', 'TICKETS FISCALES', '8418.52', '', 'TARJETA', '', 17),
(89, '2022-03-11', '2430', 'NOTAS REMISIÓN', '150.00', '', '', '', 17),
(90, '2022-03-11', '1623', 'NOTAS PEDIDOS', '200.00', '', '', '', 17),
(91, '2022-03-12', '2432', 'NOTAS REMISIÓN', '300.00', '', '', '', 17),
(92, '2022-03-12', '2433', 'NOTAS REMISIÓN', '290.00', '', '', '', 17),
(93, '2022-03-12', '2434', 'NOTAS REMISIÓN', '20.00', '', '', '', 17),
(94, '2022-03-12', '2435', 'NOTAS REMISIÓN', '100.00', '', '', '', 17),
(95, '2022-03-12', '2436', 'NOTAS REMISIÓN', '120.00', '', '', '', 17),
(96, '2022-03-12', '63126-63215', 'TICKETS REMISONES', '22097.00', '', '', '', 17),
(97, '2022-03-12', '9346-9359', 'TICKETS FISCALES', '14837.56', '', 'TARJETA', '', 17),
(98, '2022-03-13', '2437', 'NOTAS REMISIÓN', '65.00', '', '', '', 17),
(99, '2022-03-13', '2438', 'NOTAS REMISIÓN', '35.00', '', '', '', 17),
(100, '2022-03-13', '2439', 'NOTAS REMISIÓN', '120.00', '', '', '', 17),
(101, '2022-03-13', '2440', 'NOTAS REMISIÓN', '42.00', '', '', '', 17),
(102, '2022-03-13', '63216-63279', 'TICKETS REMISONES', '18166.60', '', 'EFECTIVO', '', 17),
(103, '2022-03-13', '9364-9368', 'TICKETS FISCALES', '3651.00', '', 'TARJETA', '', 17),
(104, '2022-03-14', '63280-63312', 'TICKETS REMISONES', '7782.00', '', '', '', 17),
(105, '2022-03-14', '9369-9376', 'TICKETS FISCALES', '5821.00', '', 'TARJETA', '', 17),
(111, '2022-03-15', '2441', 'NOTAS REMISIÓN', '840.00', '', '', '', 17),
(112, '2022-03-15', '2442', 'NOTAS REMISIÓN', '30.00', '', '', '', 17),
(113, '2022-03-15', '2443', 'NOTAS REMISIÓN', '135.00', '', '', '', 17),
(114, '2022-03-15', '2444', 'NOTAS REMISIÓN', '140.00', '', '', '', 17),
(115, '2022-03-15', '2445', 'NOTAS REMISIÓN', '55.00', '', '', '', 17),
(116, '2022-03-15', '63314-63355', 'TICKETS FISCALES', '12651.70', '', '', '', 17),
(117, '2022-03-15', '9377-9385', 'TICKETS FISCALES', '15556.40', '', 'TARJETA', '', 17),
(118, '2022-03-16', '63356-63412', 'TICKETS REMISONES', '19482.05', '', '', '', 17),
(119, '2022-03-16', '9386-9397', 'TICKETS FISCALES', '9996.00', '', 'TARJETA', '', 17),
(120, '2022-03-17', '2447', 'NOTAS REMISIÓN', '438.00', '', '', '', 17),
(121, '2022-03-17', '63413-63471', 'TICKETS REMISONES', '17000.00', '', '', '', 17),
(122, '2022-03-17', '9398-9404', 'TICKETS FISCALES', '8140.98', '', 'TARJETA', '', 17),
(123, '2022-03-17', '1620', 'NOTAS PEDIDOS', '110.00', '', '', '', 17),
(124, '2022-03-17', '1625', 'NOTAS PEDIDOS', '112.00', '', '', '', 17),
(125, '2022-03-17', '2095', 'NOTAS PEDIDOS', '260.00', '', '', '', 17),
(127, '2022-03-18', '2448', 'NOTAS REMISIÓN', '55.00', '', '', '', 17),
(128, '2022-03-18', '1614', 'NOTAS REMISIÓN', '60.00', '', '', '', 17),
(129, '2022-03-18', '2449', 'NOTAS REMISIÓN', '834.00', '', '', '', 17),
(130, '2022-03-18', '2452', 'NOTAS REMISIÓN', '81.00', '', '', '', 17),
(131, '2022-03-18', '2451', 'NOTAS REMISIÓN', '50.00', '', '', '', 17),
(132, '2022-03-18', '2450', 'NOTAS REMISIÓN', '250.00', '', '', '', 17),
(133, '2022-03-18', '1626', 'NOTAS PEDIDOS', '700.00', '', '', '', 17),
(134, '2022-03-18', '63512-63538', 'TICKETS REMISONES', '29105.96', '', '', '', 17),
(135, '2022-03-18', '9406-9414', 'TICKETS FISCALES', '18132.44', '', 'TARJETA', '', 17),
(136, '2022-03-19', '1628', 'NOTAS PEDIDOS', '500.00', '', '', '', 17),
(137, '2022-03-19', '1621', 'NOTAS PEDIDOS', '620.00', '', '', '', 17),
(138, '2022-03-19', '63539-63644', 'TICKETS REMISONES', '41067.00', '', '', '', 17),
(139, '2022-03-19', '9415-9432', 'TICKETS FISCALES', '8771.60', '', 'TARJETA', '', 17),
(140, '2022-03-20', '2454', 'NOTAS REMISIÓN', '40.00', '', '', '', 17),
(141, '2022-03-20', '63645-63692', 'TICKETS REMISONES', '9549.00', '', '', '', 17),
(142, '2022-03-20', '9433-9441', 'TICKETS FISCALES', '3260.00', '', 'TARJETA', '', 17),
(143, '2022-03-21', '2455', 'NOTAS REMISIÓN', '90.00', '', '', '', 17),
(144, '2022-03-21', '2456', 'NOTAS REMISIÓN', '50.00', '', '', '', 17),
(145, '2022-03-21', '5459', 'NOTAS REMISIÓN', '25.00', '', '', '', 17),
(146, '2022-03-21', '1629', 'NOTAS PEDIDOS', '200.00', '', '', '', 17),
(147, '2022-03-21', '1630', 'NOTAS PEDIDOS', '200.00', '', '', '', 17),
(148, '2022-03-21', '1632', 'NOTAS PEDIDOS', '400.00', '', '', '', 17),
(149, '2022-03-21', '63693-63765', 'TICKETS REMISONES', '17847.00', '', '', '', 17),
(150, '2022-03-21', '9442-9453', 'TICKETS FISCALES', '12095.00', '', 'TARJETA', '', 17),
(151, '2022-03-22', '2460', 'NOTAS REMISIÓN', '250.00', '', '', '', 17),
(152, '2022-03-22', '2461', 'NOTAS REMISIÓN', '70.00', '', '', '', 17),
(153, '2022-03-22', '2462', 'NOTAS REMISIÓN', '90.00', '', '', '', 17),
(154, '2022-03-22', '2463', 'NOTAS REMISIÓN', '30.00', '', '', '', 17),
(155, '2022-03-22', '63766-63805', 'TICKETS REMISONES', '12440.00', '', '', '', 17),
(156, '2022-03-22', '9454-9460', 'TICKETS FISCALES', '3970.00', '', 'TARJETA', '', 17),
(157, '2022-03-23', '2464', 'NOTAS REMISIÓN', '30.00', '', '', '', 17),
(158, '2022-03-23', '2465', 'NOTAS REMISIÓN', '180.00', '', '', '', 17),
(159, '2022-03-23', '2466', 'NOTAS REMISIÓN', '290.00', '', '', '', 17),
(160, '2022-03-23', '2467', 'NOTAS REMISIÓN', '100.00', '', '', '', 17),
(161, '2022-03-23', '63806-63845', 'TICKETS REMISONES', '13395.00', '', '', '', 17),
(162, '2022-03-23', '9461-9472', 'TICKETS FISCALES', '11671.26', '', 'TARJETA', '', 17),
(163, '2022-03-24', '2469', 'NOTAS REMISIÓN', '500.00', '', '', '', 17),
(164, '2022-03-24', '2468', 'NOTAS REMISIÓN', '225.00', '', '', '', 17),
(165, '2022-03-24', '2470', 'NOTAS REMISIÓN', '130.00', '', '', '', 17),
(166, '2022-03-24', '63846-63903', 'NOTAS REMISIÓN', '20046.00', '', '', '', 17),
(167, '2022-03-24', '9473-9484', 'TICKETS FISCALES', '8423.00', '', 'TARJETA', '', 17),
(168, '2022-03-25', '2471', 'NOTAS REMISIÓN', '70.00', '', '', '', 17),
(169, '2022-03-25', '2472', 'NOTAS REMISIÓN', '630.00', '', '', '', 17),
(170, '2022-03-25', '2473', 'NOTAS REMISIÓN', '345.00', '', '', '', 17),
(171, '2022-03-25', '63904-63962', 'TICKETS REMISONES', '18398.00', '', '', '', 17),
(172, '2022-03-25', '9485-9493', 'TICKETS FISCALES', '8500.00', '', 'TARJETA', '', 17),
(173, '2022-03-26', '2474', 'NOTAS REMISIÓN', '35.00', '', '', '', 17),
(174, '2022-03-26', '2475', 'NOTAS REMISIÓN', '75.00', '', '', '', 17),
(175, '2022-03-26', '2476', 'NOTAS REMISIÓN', '100.00', '', '', '', 17),
(176, '2022-03-26', '2477', 'NOTAS REMISIÓN', '25.00', '', '', '', 17),
(177, '2022-03-26', '2415', 'NOTAS REMISIÓN', '489.00', '', '', '', 17),
(178, '2022-03-26', '63963-64062', 'TICKETS REMISONES', '22027.00', '', '', '', 17),
(179, '2022-03-26', '9495-9508', 'TICKETS FISCALES', '12285.00', '', 'TARJETA', '', 17),
(180, '2022-03-27', '2479', 'NOTAS REMISIÓN', '560.00', '', '', '', 17),
(181, '2022-03-27', '2480', 'NOTAS REMISIÓN', '22.00', '', '', '', 17),
(182, '2022-03-27', '64064-64102', 'TICKETS REMISONES', '11419.00', '', '', '', 17),
(183, '2022-03-27', '9509-9517', 'TICKETS FISCALES', '4187.00', '', 'TARJETA', '', 17),
(184, '2022-03-28', '2481', 'NOTAS REMISIÓN', '330.00', '', '', '', 17),
(185, '2022-03-28', '2482', 'NOTAS REMISIÓN', '180.00', '', '', '', 17),
(186, '2022-03-28', '2483', 'NOTAS REMISIÓN', '362.00', '', '', '', 17),
(187, '2022-03-28', '2484', 'NOTAS REMISIÓN', '102.00', '', '', '', 17),
(188, '2022-03-28', '64103-64144', 'TICKETS REMISONES', '11349.00', '', '', '', 17),
(189, '2022-03-28', '9518-9522', 'TICKETS FISCALES', '3391.00', '', 'TARJETA', '', 17),
(190, '2022-11-16', '2485-2500', 'NOTAS REMISIÓN', '2540.00', '', 'EFECTIVO', '', 1),
(191, '2022-03-29', '2486', 'NOTAS REMISIÓN', '130.00', '', '', '', 17),
(192, '2022-03-29', '2487', 'NOTAS REMISIÓN', '60.00', '', '', '', 17),
(193, '2022-03-29', '2489', 'NOTAS REMISIÓN', '100.00', '', '', '', 17),
(194, '2022-03-29', '2488', 'NOTAS REMISIÓN', '715.00', '', '', '', 17),
(195, '2022-03-29', '2490', 'NOTAS REMISIÓN', '66.00', '', '', '', 17),
(196, '2022-03-29', '2492', 'NOTAS REMISIÓN', '540.00', '', '', '', 17),
(197, '2022-03-29', '64145-64196', 'TICKETS REMISONES', '16630.97', '', '', '', 17),
(198, '2022-03-29', '9523-9535', 'TICKETS FISCALES', '11892.00', '', 'TARJETA', '', 17),
(199, '2022-03-29', '1632', 'NOTAS PEDIDOS', '320.00', '', '', '', 17),
(200, '2022-03-29', '1638', 'NOTAS PEDIDOS', '700.00', '', '', '', 17),
(204, '2022-11-17', '25-90', 'TICKETS FISCALES', '125000.00', '', 'EFECTIVO', 'VENTA DEL DIA', 1),
(205, '2022-11-17', '100-150', 'NOTAS FORÁNEAS', '15000.00', 'CLIENTE DE RICHI', 'TRANSFERENCIA', 'TRANSFERENCIA 158777 DEL 16/11/2022', 1),
(206, '2022-11-17', '2485-2500', 'NOTAS FORÁNEAS', '6585.90', 'CLIENTE DE SAN NICOLAS', 'EFECTIVO', 'PAGO EN SUCURSAL', 1),
(207, '2022-11-17', '500-525', 'NOTAS FORÁNEAS', '14525.50', 'CLIENTE FORANEO', 'EFECTIVO', '', 1),
(208, '2022-11-17', '154', 'NOTAS FORÁNEAS', '1250.00', 'FULANITO', 'TRANSFERENCIA', '', 1),
(209, '2022-11-17', '1-30', 'NOTAS REMISIÓN', '15400.00', 'PUBLICO EN GENERAL', 'EFECTIVO', '', 1),
(210, '2022-11-17', '36-900', 'TICKETS REMISONES', '9850.00', '', 'EFECTIVO', '', 1),
(211, '2022-11-17', '5,8,9,11', 'NOTAS PEDIDOS', '35600.00', '', 'EFECTIVO', '', 1),
(212, '2022-11-23', '25-100', 'NOTAS FORÁNEAS', '2500.00', 'TAMAULIPAS', 'TRANSFERENCIA', '', 1),
(213, '2022-11-23', '125-301', 'NOTAS REMISIÓN', '6000.00', '', 'EFECTIVO', '', 1),
(214, '2022-11-23', '105', 'NOTAS PEDIDOS', '4500.00', 'PLASTICOS BIBIANA', 'EFECTIVO', '', 1),
(215, '2022-11-23', '10001-10230', 'TICKETS FISCALES', '35000.00', '', 'EFECTIVO', '', 1),
(216, '2022-11-23', '253-301', 'TICKETS REMISONES', '5000.00', '', 'EFECTIVO', '', 1),
(217, '2022-11-23', '35-50', 'NOTAS FORÁNEAS', '3000.00', 'CLIENTE DE PUEBLA, CERAMICA', 'EFECTIVO', '', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `saldo`
--

DROP TABLE IF EXISTS `saldo`;
CREATE TABLE IF NOT EXISTS `saldo` (
  `idsaldo` int NOT NULL AUTO_INCREMENT,
  `folio` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `importe` decimal(10,2) NOT NULL,
  `fecha` date DEFAULT NULL,
  `idusuario` int NOT NULL,
  `idsucursal` int NOT NULL,
  PRIMARY KEY (`idsaldo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sucursal`
--

DROP TABLE IF EXISTS `sucursal`;
CREATE TABLE IF NOT EXISTS `sucursal` (
  `idsucursal` int NOT NULL AUTO_INCREMENT,
  `razon_social` varchar(100) NOT NULL,
  `logo` varchar(120) NOT NULL,
  `status` tinyint NOT NULL,
  PRIMARY KEY (`idsucursal`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `sucursal`
--

INSERT INTO `sucursal` (`idsucursal`, `razon_social`, `logo`, `status`) VALUES
(1, 'Creaciones Valentina', 'vistas/img/sucursales/1632190917.png', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `totales`
--

DROP TABLE IF EXISTS `totales`;
CREATE TABLE IF NOT EXISTS `totales` (
  `idtotal` int NOT NULL AUTO_INCREMENT,
  `fecha` date DEFAULT NULL,
  `total_f` decimal(13,2) NOT NULL,
  `folio_1` varchar(15) NOT NULL,
  `folio_2` varchar(15) NOT NULL,
  `total_r` decimal(13,2) NOT NULL,
  `folio_3` varchar(15) NOT NULL,
  `folio_4` varchar(15) NOT NULL,
  `nota` text NOT NULL,
  `idusuario` int NOT NULL,
  `idsucursal` int NOT NULL,
  PRIMARY KEY (`idtotal`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `idusuario` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `login` varchar(20) NOT NULL,
  `clave` varchar(64) NOT NULL,
  `imagen` varchar(200) NOT NULL,
  `sucursal_idsucursal` int DEFAULT '1',
  `condicion` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idusuario`),
  UNIQUE KEY `login_UNIQUE` (`login`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idusuario`, `nombre`, `login`, `clave`, `imagen`, `sucursal_idsucursal`, `condicion`) VALUES
(1, 'Jaime Hernández Ortiz', 'Jimmy', '75c9e3299679b3f4fb637737be89c7ee062d80342b80f6116eb468991c68a067', 'vistas/img/usuarios/Jaime Hernández Ortiz1668635697.jpg', 1, 1),
(15, 'Joana Ortiz Guajardo', 'Joana', 'b1ab1e892617f210425f658cf1d361b5489028c8771b56d845fe1c62c1fbc8b0', '', 1, 1),
(17, 'Pilar Hernández Ortiz', 'Pilar', '9735d6d3bc3900684944005f7ae199c03ad97c12c31064409ba579ba397219db', '', 1, 1),
(21, 'Gadiel', 'Gadiel', '75c9e3299679b3f4fb637737be89c7ee062d80342b80f6116eb468991c68a067', 'vistas/img/usuarios/Gadiel1665521836.jpg', 1, 1),
(22, 'Usuario de Prueba', 'User', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', '', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_permiso`
--

DROP TABLE IF EXISTS `usuario_permiso`;
CREATE TABLE IF NOT EXISTS `usuario_permiso` (
  `idusuario_permiso` int NOT NULL AUTO_INCREMENT,
  `idusuario` int NOT NULL,
  `idpermiso` int NOT NULL,
  PRIMARY KEY (`idusuario_permiso`)
) ENGINE=InnoDB AUTO_INCREMENT=125 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `usuario_permiso`
--

INSERT INTO `usuario_permiso` (`idusuario_permiso`, `idusuario`, `idpermiso`) VALUES
(14, 0, 2),
(15, 0, 3),
(16, 0, 4),
(17, 0, 5),
(18, 0, 6),
(19, 0, 7),
(26, 15, 1),
(27, 15, 2),
(28, 15, 3),
(29, 15, 4),
(30, 15, 5),
(31, 15, 6),
(32, 15, 7),
(33, 17, 2),
(34, 17, 3),
(35, 17, 4),
(36, 17, 5),
(37, 17, 6),
(38, 17, 7),
(61, 18, 1),
(62, 18, 2),
(63, 18, 3),
(64, 18, 4),
(65, 18, 5),
(66, 18, 6),
(67, 18, 7),
(75, 19, 5),
(76, 19, 6),
(77, 19, 7),
(84, 20, 3),
(85, 20, 4),
(86, 20, 5),
(87, 20, 6),
(88, 20, 7),
(104, 21, 2),
(112, 1, 1),
(113, 1, 2),
(114, 1, 3),
(115, 1, 4),
(116, 1, 5),
(117, 1, 6),
(118, 1, 7),
(119, 22, 2),
(120, 22, 3),
(121, 22, 4),
(122, 22, 5),
(123, 22, 6),
(124, 22, 7);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
