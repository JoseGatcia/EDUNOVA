-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-10-2024 a las 04:38:31
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
-- Base de datos: `edunova`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `observaciones`
--

CREATE TABLE `observaciones` (
  `codObservacion` int(11) NOT NULL,
  `observacion` text DEFAULT NULL,
  `descargos` text DEFAULT NULL,
  `idEstudiante` int(11) DEFAULT NULL,
  `idProfesor` int(11) DEFAULT NULL,
  `firma` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `observaciones`
--

INSERT INTO `observaciones` (`codObservacion`, `observacion`, `descargos`, `idEstudiante`, `idProfesor`, `firma`) VALUES
(1, 'El estudiante no presentó el examen', 'No estudié y no la quise hacer', 12, 21, '../../../uploads/joker-comics.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios`
--

CREATE TABLE `servicios` (
  `CodigoServicio` int(11) NOT NULL,
  `NombreServicios` varchar(100) DEFAULT NULL,
  `DescripcionServicio` varchar(200) DEFAULT NULL,
  `Precio` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `servicios`
--

INSERT INTO `servicios` (`CodigoServicio`, `NombreServicios`, `DescripcionServicio`, `Precio`) VALUES
(2, 'Plan Pro', 'el Plan pro 69.999', 69);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tip_usua`
--

CREATE TABLE `tip_usua` (
  `cod_tip_usua` int(11) NOT NULL,
  `nombre_tip_usua` varchar(30) DEFAULT NULL,
  `descrip_tip_usua` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tip_usua`
--

INSERT INTO `tip_usua` (`cod_tip_usua`, `nombre_tip_usua`, `descrip_tip_usua`) VALUES
(1, 'Admin', 'El admin tiene acceso a todo el back end de la página además del tratamiento de datos'),
(2, 'Cliente', 'Usuario cliente');

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
  `Correo` varchar(50) NOT NULL,
  `Telefono` decimal(10,0) DEFAULT NULL,
  `Contrasena` varchar(50) DEFAULT NULL,
  `cod_tip_usuaFK` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`codigo_usuario`, `Nombre`, `Apellido`, `Edad`, `Direccion`, `Correo`, `Telefono`, `Contrasena`, `cod_tip_usuaFK`) VALUES
(1, 'Miguel Angel', 'Muñoz Hernandez', 6, 'Carrera 73A #98-55', 'ensayo@gmail.com', 3122194074, '0210', 1),
(1033182916, 'Alexander', 'Villa', 17, 'Carrera 73A #98-55', 'kollok094@gmail.com', 3122194074, '2007', 2),
(1019272, 'Marlyn', 'Espinosa', 17, 'Carrera 88', 'video@gmail.com', 11231382, '0720', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `correoFK` varchar(50) DEFAULT NULL,
  `cod_venta` int(11) NOT NULL,
  `fecha` date DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `cod_producto` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`correoFK`, `cod_venta`, `fecha`, `cantidad`, `cod_producto`, `total`) VALUES
('kollok094@gmail.com', 1, '2024-10-29', 3, 2, 207);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas_servicio`
--

CREATE TABLE `ventas_servicio` (
  `fecha` date DEFAULT NULL,
  `correoFK` varchar(30) DEFAULT NULL,
  `CodVentaServicio` int(11) DEFAULT NULL,
  `CodigoServicioFK` int(11) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `observaciones`
--
ALTER TABLE `observaciones`
  ADD PRIMARY KEY (`codObservacion`);

--
-- Indices de la tabla `servicios`
--
ALTER TABLE `servicios`
  ADD PRIMARY KEY (`CodigoServicio`);

--
-- Indices de la tabla `tip_usua`
--
ALTER TABLE `tip_usua`
  ADD PRIMARY KEY (`cod_tip_usua`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`Correo`),
  ADD KEY `cod_tip_usuaFK` (`cod_tip_usuaFK`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`cod_venta`),
  ADD KEY `correoFK` (`correoFK`);

--
-- Indices de la tabla `ventas_servicio`
--
ALTER TABLE `ventas_servicio`
  ADD KEY `correoFK` (`correoFK`),
  ADD KEY `CodigoServicioFK` (`CodigoServicioFK`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `observaciones`
--
ALTER TABLE `observaciones`
  MODIFY `codObservacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
