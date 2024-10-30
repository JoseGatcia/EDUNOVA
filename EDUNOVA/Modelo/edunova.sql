-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-09-2024 a las 17:24:10
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `edunova`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios`
--

CREATE TABLE `servicios` (
  `CodigoServicio` int(11) NOT NULL PRIMARY KEY,
  `NombreServicios` varchar(100) DEFAULT NULL,
  `DescripcionServicio` varchar(200) DEFAULT NULL,
  `Precio` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tip_usua`
--

CREATE TABLE `tip_usua` (
  `cod_tip_usua` int(11) NOT NULL PRIMARY KEY,
  `nombre_tip_usua` varchar(30) DEFAULT NULL,
  `descrip_tip_usua` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `codigo_usuario` int(11) DEFAULT NULL,
  `Nombre` varchar(30) DEFAULT NULL,
  `Apellido` varchar(30) DEFAULT NULL,
  `Edad` decimal(3,0) DEFAULT NULL,
  `Direccion` varchar(100) DEFAULT NULL,
  `Correo` varchar(50) NOT NULL PRIMARY KEY,
  `Telefono` decimal(10,0) DEFAULT NULL,
  `Contrasena` varchar(50) DEFAULT NULL,
  `cod_tip_usuaFK` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `correoFK` varchar(50) DEFAULT NULL,
  `cod_venta` int(11) NOT NULL PRIMARY KEY,
  `fecha` date DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `cod_producto` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas_servicio`
--

CREATE TABLE `ventas_servicio` (
  `id` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `fecha` date DEFAULT NULL,
  `correoFK` varchar(30) DEFAULT NULL,
  `CodVentaServicio` int(11) DEFAULT NULL,
  `CodigoServicioFK` int(11) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD KEY `cod_tip_usuaFK` (`cod_tip_usuaFK`);

--
-- Indices de la tabla `ventas_servicio`
--
ALTER TABLE `ventas_servicio`
  ADD KEY `correoFK` (`correoFK`),
  ADD KEY `CodigoServicioFK` (`CodigoServicioFK`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`cod_tip_usuaFK`) REFERENCES `tip_usua` (`cod_tip_usua`);

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `ventas_ibfk_1` FOREIGN KEY (`correoFK`) REFERENCES `usuario` (`Correo`);

--
-- Filtros para la tabla `ventas_servicio`
--
ALTER TABLE `ventas_servicio`
  ADD CONSTRAINT `ventas_servicio_ibfk_1` FOREIGN KEY (`correoFK`) REFERENCES `usuario` (`Correo`),
  ADD CONSTRAINT `ventas_servicio_ibfk_2` FOREIGN KEY (`CodigoServicioFK`) REFERENCES `servicios` (`CodigoServicio`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
