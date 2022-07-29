-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 20-07-2022 a las 04:49:07
-- Versión del servidor: 5.7.36
-- Versión de PHP: 7.4.26

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
  `idabono` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` date DEFAULT NULL,
  `idempleado` int(11) NOT NULL,
  `tipo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `importe` decimal(11,2) NOT NULL,
  `idusuario` int(11) NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`idabono`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `abono`
--

INSERT INTO `abono` (`idabono`, `fecha`, `idempleado`, `tipo`, `importe`, `idusuario`, `fecha_creacion`) VALUES
(1, '2022-03-09', 1, 'ABONO A PRESTAMO', '1250.00', 1, '2022-03-09 19:58:50');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `caja_ahorro`
--

DROP TABLE IF EXISTS `caja_ahorro`;
CREATE TABLE IF NOT EXISTS `caja_ahorro` (
  `idcaja_ahorro` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` date DEFAULT NULL,
  `folio` int(11) NOT NULL,
  `idempleado` int(11) NOT NULL,
  `concepto` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `importe` decimal(11,2) NOT NULL,
  `idusuario` int(11) NOT NULL,
  PRIMARY KEY (`idcaja_ahorro`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

DROP TABLE IF EXISTS `cliente`;
CREATE TABLE IF NOT EXISTS `cliente` (
  `idcliente` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `domicilio` text COLLATE utf8_spanish_ci NOT NULL,
  `tel_1` text COLLATE utf8_spanish_ci NOT NULL,
  `tel_2` text COLLATE utf8_spanish_ci NOT NULL,
  `email_1` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `email_2` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `status` int(11) NOT NULL,
  `idusuario` int(11) NOT NULL,
  PRIMARY KEY (`idcliente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `deposito`
--

DROP TABLE IF EXISTS `deposito`;
CREATE TABLE IF NOT EXISTS `deposito` (
  `iddeposito` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(10) NOT NULL,
  `concepto` varchar(100) NOT NULL,
  `importe` decimal(11,2) NOT NULL,
  `cant1` int(11) NOT NULL,
  `cant2` int(11) NOT NULL,
  `cant3` int(11) NOT NULL,
  `cant4` int(11) NOT NULL,
  `cant5` int(11) NOT NULL,
  `cant6` int(11) NOT NULL,
  `cant7` decimal(10,2) NOT NULL,
  `fecha` date DEFAULT NULL,
  `idusuario` int(11) NOT NULL,
  `idsucursal` int(11) NOT NULL,
  PRIMARY KEY (`iddeposito`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `deposito`
--

INSERT INTO `deposito` (`iddeposito`, `tipo`, `concepto`, `importe`, `cant1`, `cant2`, `cant3`, `cant4`, `cant5`, `cant6`, `cant7`, `fecha`, `idusuario`, `idsucursal`) VALUES
(6, 'FISCAL', 'TARJETA  ', '3915.00', 0, 0, 0, 0, 0, 0, '0.00', '2022-02-14', 15, 1),
(7, 'FISCAL', 'DEPÓSITO  CAMBIO', '1300.00', 0, 0, 0, 0, 0, 0, '0.00', '2022-02-14', 15, 1),
(8, 'FISCAL', 'DEPÓSITO  ', '5400.00', 0, 0, 0, 0, 0, 0, '0.00', '2022-02-14', 15, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

DROP TABLE IF EXISTS `empleado`;
CREATE TABLE IF NOT EXISTS `empleado` (
  `idempleado` int(11) NOT NULL AUTO_INCREMENT,
  `num_empleado` varchar(5) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `sueldo_dia` decimal(6,2) NOT NULL,
  `domicilio` text COLLATE utf8_spanish_ci NOT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `fecha_contrato` date DEFAULT NULL,
  `ine_frente` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `ine_reverso` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `tel_1` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `tel_2` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `tel_3` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `tel_4` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `foto` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `idusuario` int(11) NOT NULL,
  `idsucursal` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idempleado`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`idempleado`, `num_empleado`, `nombre`, `sueldo_dia`, `domicilio`, `fecha_nacimiento`, `fecha_contrato`, `ine_frente`, `ine_reverso`, `tel_1`, `tel_2`, `tel_3`, `tel_4`, `foto`, `idusuario`, `idsucursal`, `status`) VALUES
(1, '1', 'José Cruz', '320.00', '', '1988-05-25', '2021-01-01', '', '', '5620059618', '', '', '', '', 15, 1, 1),
(2, '2', 'SANDRA ESPEJO OLGUIN', '300.00', '', '0000-00-00', '2022-02-16', '', '', '', '', '', '', '', 15, 1, 1),
(3, '3', 'ALLAN MICHEL RANGEL GUAJARDO', '300.00', '', '0000-00-00', '2022-02-16', '', '', '', '', '', '', '', 15, 1, 1),
(4, '9', 'MARTHA', '250.00', '', '0000-00-00', '2022-02-16', '', '', '', '', '', '', '', 15, 1, 1),
(5, '4', 'RODOLFO  MEJORADA', '330.00', '', '0000-00-00', '0000-00-00', '', '', '', '', '', '', '', 15, 1, 1),
(6, '5', 'VIOLETA GUAJARDO', '300.00', '', '0000-00-00', '0000-00-00', '', '', '', '', '', '', '', 15, 1, 1),
(7, '6', 'ALEJANDRA', '250.00', '', '0000-00-00', '0000-00-00', '', '', '', '', '', '', '', 15, 1, 1),
(8, '7', 'ANITA', '266.00', '', '0000-00-00', '0000-00-00', '', '', '', '', '', '', '', 15, 1, 1),
(9, '8', 'PATRICIA GONZALEZ ALBAVERA', '300.00', '', '0000-00-00', '0000-00-00', '', '', '', '', '', '', '', 15, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

DROP TABLE IF EXISTS `factura`;
CREATE TABLE IF NOT EXISTS `factura` (
  `idfactura` int(11) NOT NULL AUTO_INCREMENT,
  `folio` varchar(10) NOT NULL,
  `importe` decimal(11,2) NOT NULL,
  `fecha` date DEFAULT NULL,
  `idusuario` int(11) NOT NULL,
  `idsucursal` int(11) NOT NULL,
  PRIMARY KEY (`idfactura`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gasto`
--

DROP TABLE IF EXISTS `gasto`;
CREATE TABLE IF NOT EXISTS `gasto` (
  `idgasto` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` date DEFAULT NULL,
  `concepto` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `tipo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `importe` decimal(11,2) NOT NULL,
  `idusuario` int(11) NOT NULL,
  `idsucursal` int(11) NOT NULL,
  PRIMARY KEY (`idgasto`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `gasto`
--

INSERT INTO `gasto` (`idgasto`, `fecha`, `concepto`, `tipo`, `importe`, `idusuario`, `idsucursal`) VALUES
(2, '2022-02-14', 'BASURA', 'TIENDA', '15.00', 15, 1),
(3, '2022-02-14', 'TRUPER', 'TIENDA', '751.00', 15, 1),
(4, '2022-02-17', 'COMIDA JOANA', 'PERSONAL', '200.00', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `linea`
--

DROP TABLE IF EXISTS `linea`;
CREATE TABLE IF NOT EXISTS `linea` (
  `idlinea` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `status` int(11) NOT NULL,
  `idusuario` int(11) NOT NULL,
  PRIMARY KEY (`idlinea`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `linea`
--

INSERT INTO `linea` (`idlinea`, `nombre`, `status`, `idusuario`) VALUES
(1, 'VELAS', 1, 15);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `liquidaciones`
--

DROP TABLE IF EXISTS `liquidaciones`;
CREATE TABLE IF NOT EXISTS `liquidaciones` (
  `idliquidacion` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL,
  `concepto` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `importe` decimal(11,2) NOT NULL,
  `idusuario` int(11) NOT NULL,
  `idsucursal` int(11) NOT NULL,
  PRIMARY KEY (`idliquidacion`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `liquidaciones`
--

INSERT INTO `liquidaciones` (`idliquidacion`, `fecha`, `concepto`, `importe`, `idusuario`, `idsucursal`) VALUES
(1, '2022-02-14', 'PAGO PEDIDO', '3300.00', 15, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nomina`
--

DROP TABLE IF EXISTS `nomina`;
CREATE TABLE IF NOT EXISTS `nomina` (
  `idnomina` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL,
  `idempleado` int(11) NOT NULL,
  `dias` decimal(11,2) NOT NULL,
  `t_extra` decimal(11,2) NOT NULL,
  `ventas` decimal(11,2) NOT NULL,
  `t_perdido` decimal(11,2) NOT NULL,
  `a_cuenta` decimal(11,2) NOT NULL,
  `abono` decimal(11,2) NOT NULL,
  `mercancia` decimal(11,2) NOT NULL,
  `caja_ahorro` decimal(11,2) NOT NULL,
  `t_general` decimal(11,2) NOT NULL,
  `tipo` int(11) NOT NULL,
  `idusuario` int(11) NOT NULL,
  `idsucursal` int(11) NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`idnomina`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `nomina`
--

INSERT INTO `nomina` (`idnomina`, `fecha`, `idempleado`, `dias`, `t_extra`, `ventas`, `t_perdido`, `a_cuenta`, `abono`, `mercancia`, `caja_ahorro`, `t_general`, `tipo`, `idusuario`, `idsucursal`, `fecha_creacion`) VALUES
(2, '2022-02-16', 3, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '550.00', 2, 15, 1, '2022-02-16 19:05:31'),
(3, '2022-02-17', 7, '9.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2250.00', 1, 1, 1, '2022-02-17 03:29:28');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notas_credito`
--

DROP TABLE IF EXISTS `notas_credito`;
CREATE TABLE IF NOT EXISTS `notas_credito` (
  `idnota` int(11) NOT NULL AUTO_INCREMENT,
  `folio` varchar(10) NOT NULL,
  `cliente` varchar(100) NOT NULL,
  `importe` decimal(10,2) NOT NULL,
  `abono` decimal(10,2) NOT NULL,
  `fecha` date DEFAULT NULL,
  `idsucursal` int(11) NOT NULL,
  `idusuario` int(11) NOT NULL,
  PRIMARY KEY (`idnota`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pago_proveedor`
--

DROP TABLE IF EXISTS `pago_proveedor`;
CREATE TABLE IF NOT EXISTS `pago_proveedor` (
  `idpagoproveedor` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` date DEFAULT NULL,
  `concepto` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `importe` decimal(11,2) NOT NULL,
  `idusuario` int(11) NOT NULL,
  `idsucursal` int(11) NOT NULL,
  PRIMARY KEY (`idpagoproveedor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permiso`
--

DROP TABLE IF EXISTS `permiso`;
CREATE TABLE IF NOT EXISTS `permiso` (
  `idpermiso` tinyint(4) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  PRIMARY KEY (`idpermiso`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

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
  `idprestamo` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` date DEFAULT NULL,
  `idempleado` int(11) NOT NULL,
  `tipo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `importe` decimal(11,2) NOT NULL,
  `idusuario` int(11) NOT NULL,
  PRIMARY KEY (`idprestamo`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `prestamo`
--

INSERT INTO `prestamo` (`idprestamo`, `fecha`, `idempleado`, `tipo`, `importe`, `idusuario`) VALUES
(2, '2022-02-14', 5, 'ADELANTO DE NOMINA', '1100.00', 15),
(4, '2022-02-14', 9, 'ADELANTO DE NOMINA', '300.00', 15),
(5, '2022-02-14', 1, 'ADELANTO DE NOMINA', '1000.00', 15),
(6, '2022-02-14', 2, 'ADELANTO DE NOMINA', '900.00', 15),
(7, '2022-02-14', 7, 'ADELANTO DE NOMINA', '200.00', 15),
(8, '2022-02-14', 4, 'ADELANTO DE NOMINA', '800.00', 15),
(9, '2022-02-14', 3, 'ADELANTO DE NOMINA', '280.00', 15),
(10, '2022-02-16', 2, 'ADELANTO DE NOMINA', '100.00', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

DROP TABLE IF EXISTS `producto`;
CREATE TABLE IF NOT EXISTS `producto` (
  `idproducto` int(11) NOT NULL AUTO_INCREMENT,
  `codigo1` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `codigo2` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `idproveedor` int(11) NOT NULL,
  `idlinea` int(11) NOT NULL,
  `precio1` decimal(11,2) NOT NULL,
  `precio2` decimal(11,2) NOT NULL,
  `imagen` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `status` int(11) NOT NULL,
  `idusuario` int(11) NOT NULL,
  PRIMARY KEY (`idproducto`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`idproducto`, `codigo1`, `codigo2`, `nombre`, `idproveedor`, `idlinea`, `precio1`, `precio2`, `imagen`, `status`, `idusuario`) VALUES
(1, '001VEL002', '1315564534', 'VELA ANGEL CEPILLADO', 1, 1, '37.00', '34.00', '', 1, 0),
(2, '0014JAB0012', '', 'ÁNGEL CON DECENARIO AZUL', 1, 1, '25.00', '19.00', '', 1, 0),
(3, '0014JAB0012', '12345678901141', 'ÁNGEL CON DECENARIO AZUL', 1, 1, '25.00', '20.00', '', 1, 0),
(4, '0014JAB00113', '1234567890114133', 'RUZ ÁNGEL MOSAICO', 1, 1, '35.00', '29.00', '', 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

DROP TABLE IF EXISTS `proveedor`;
CREATE TABLE IF NOT EXISTS `proveedor` (
  `idproveedor` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `status` int(11) NOT NULL,
  `idusuario` int(11) NOT NULL,
  PRIMARY KEY (`idproveedor`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`idproveedor`, `nombre`, `status`, `idusuario`) VALUES
(1, 'CLAUDIA MERAZ', 1, 15);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro_caja`
--

DROP TABLE IF EXISTS `registro_caja`;
CREATE TABLE IF NOT EXISTS `registro_caja` (
  `idcaja` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` date DEFAULT NULL,
  `folio` int(11) NOT NULL,
  `nombre` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `concepto` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `importe` decimal(11,2) NOT NULL,
  `idusuario` int(11) NOT NULL,
  PRIMARY KEY (`idcaja`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro_notas`
--

DROP TABLE IF EXISTS `registro_notas`;
CREATE TABLE IF NOT EXISTS `registro_notas` (
  `idnota` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL,
  `rango_folios` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `concepto` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `total` decimal(13,2) NOT NULL,
  `cliente` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `tipo_pago` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `observaciones` text COLLATE utf8_spanish_ci NOT NULL,
  `idusuario` int(11) NOT NULL,
  PRIMARY KEY (`idnota`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `registro_notas`
--

INSERT INTO `registro_notas` (`idnota`, `fecha`, `rango_folios`, `concepto`, `total`, `cliente`, `tipo_pago`, `observaciones`, `idusuario`) VALUES
(1, '2022-02-14', '001-250', 'NOTAS REMISIÓN', '8945.00', '', 'EFECTIVO', '', 15),
(2, '2022-02-14', '001-009', 'TICKETS FISCALES', '3915.64', '', '', '', 15);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `saldo`
--

DROP TABLE IF EXISTS `saldo`;
CREATE TABLE IF NOT EXISTS `saldo` (
  `idsaldo` int(11) NOT NULL AUTO_INCREMENT,
  `folio` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `importe` decimal(10,2) NOT NULL,
  `fecha` date DEFAULT NULL,
  `idusuario` int(11) NOT NULL,
  `idsucursal` int(11) NOT NULL,
  PRIMARY KEY (`idsaldo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sucursal`
--

DROP TABLE IF EXISTS `sucursal`;
CREATE TABLE IF NOT EXISTS `sucursal` (
  `idsucursal` int(11) NOT NULL AUTO_INCREMENT,
  `razon_social` varchar(100) NOT NULL,
  `logo` varchar(120) NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`idsucursal`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

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
  `idtotal` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` date DEFAULT NULL,
  `total_f` decimal(13,2) NOT NULL,
  `folio_1` varchar(15) NOT NULL,
  `folio_2` varchar(15) NOT NULL,
  `total_r` decimal(13,2) NOT NULL,
  `folio_3` varchar(15) NOT NULL,
  `folio_4` varchar(15) NOT NULL,
  `nota` text NOT NULL,
  `idusuario` int(11) NOT NULL,
  `idsucursal` int(11) NOT NULL,
  PRIMARY KEY (`idtotal`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `idusuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `login` varchar(20) NOT NULL,
  `clave` varchar(64) NOT NULL,
  `imagen` varchar(200) NOT NULL,
  `sucursal_idsucursal` int(11) DEFAULT NULL,
  `condicion` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idusuario`),
  UNIQUE KEY `login_UNIQUE` (`login`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idusuario`, `nombre`, `login`, `clave`, `imagen`, `sucursal_idsucursal`, `condicion`) VALUES
(1, 'Jaime Hernández Ortiz', 'Jimmy', '75c9e3299679b3f4fb637737be89c7ee062d80342b80f6116eb468991c68a067', 'vistas/img/usuarios/Jaime Hernández Ortiz1632190951.jpg', 1, 1),
(10, 'Nezuko', 'Nezuko', '75c9e3299679b3f4fb637737be89c7ee062d80342b80f6116eb468991c68a067', 'vistas/img/usuarios/Nezuko1632190999.png', 1, 1),
(12, 'Usuario de Preuba', 'user', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '', 1, 1),
(13, 'Usuario de Preuba1', '123', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '', 1, 1),
(14, 'Usuario de Preuba2', '1234', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', '', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_permiso`
--

DROP TABLE IF EXISTS `usuario_permiso`;
CREATE TABLE IF NOT EXISTS `usuario_permiso` (
  `idusuario_permiso` int(11) NOT NULL AUTO_INCREMENT,
  `idusuario` int(11) NOT NULL,
  `idpermiso` int(11) NOT NULL,
  PRIMARY KEY (`idusuario_permiso`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario_permiso`
--

INSERT INTO `usuario_permiso` (`idusuario_permiso`, `idusuario`, `idpermiso`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(5, 1, 5),
(6, 1, 6),
(7, 1, 7);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
