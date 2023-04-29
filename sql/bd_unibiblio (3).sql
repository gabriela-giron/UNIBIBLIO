-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-04-2023 a las 05:54:36
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_unibiblio`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_prestamo`
--

CREATE TABLE `detalle_prestamo` (
  `ID_DETALLE_PRESTAMO` int(11) NOT NULL,
  `ID_PRESTAMO` int(11) NOT NULL,
  `ID_LIBRO` int(11) NOT NULL,
  `CANTIDAD` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `detalle_prestamo`
--

INSERT INTO `detalle_prestamo` (`ID_DETALLE_PRESTAMO`, `ID_PRESTAMO`, `ID_LIBRO`, `CANTIDAD`) VALUES
(1, 1, 32202301, 12),
(2, 2, 32202316, 4),
(3, 3, 32202305, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estatus`
--

CREATE TABLE `estatus` (
  `ID_ESTATUS` int(11) NOT NULL,
  `DESCRIPCION` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `estatus`
--

INSERT INTO `estatus` (`ID_ESTATUS`, `DESCRIPCION`) VALUES
(1, 'Solvente'),
(2, 'Insolvente'),
(3, 'Inactivo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo`
--

CREATE TABLE `grupo` (
  `ID_GRUPO` int(11) NOT NULL,
  `DESCRIPCION` varchar(100) NOT NULL,
  `STATUS` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `grupo`
--

INSERT INTO `grupo` (`ID_GRUPO`, `DESCRIPCION`, `STATUS`) VALUES
(1, 'Estudiante', 'Activo'),
(2, 'Profesor', 'Activo'),
(3, 'Externo', 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo_lib`
--

CREATE TABLE `grupo_lib` (
  `ID_GRUPO` int(11) NOT NULL,
  `DESCRIPCION` varchar(20) NOT NULL,
  `ESTATUS` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `grupo_lib`
--

INSERT INTO `grupo_lib` (`ID_GRUPO`, `DESCRIPCION`, `ESTATUS`) VALUES
(1, 'Fantasia', '1'),
(2, 'Historia', '1'),
(3, 'Aventura', '1'),
(4, 'Tecnologia', '1'),
(5, 'Romance', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libros`
--

CREATE TABLE `libros` (
  `ID_LIBRO` int(11) NOT NULL,
  `TITULO` varchar(100) NOT NULL,
  `TEMATICA` varchar(100) NOT NULL,
  `AUTOR` varchar(50) NOT NULL,
  `ID_GRUPO` int(11) NOT NULL,
  `STOCK` int(11) NOT NULL,
  `FECHA_RECIBIDO` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `libros`
--

INSERT INTO `libros` (`ID_LIBRO`, `TITULO`, `TEMATICA`, `AUTOR`, `ID_GRUPO`, `STOCK`, `FECHA_RECIBIDO`) VALUES
(32202301, 'Don Quijote', 'Fantasia', 'Miguel de Cervantes', 1, 1, NULL),
(32202302, 'Historia de dos ciudades', 'Historia', 'Charles Dickens', 2, 50, NULL),
(32202303, 'El Señor de los anillos', 'Fantasia', 'J.R.R Tolkien', 1, 18, NULL),
(32202305, 'Harry Potter y el Cáliz de Fuego', 'Fantasia', 'J.K Rowling', 1, 12, NULL),
(32202316, 'Dioses, tumbas y sabios', 'Historia', 'C.W Ceram', 2, 13, NULL),
(32202319, 'Microsiervos', 'Tecnologia', 'Douglas Coupland', 4, 25, NULL),
(32202325, 'Cumbres Borrascosas', 'Romance', 'Emily Bronte', 5, 29, NULL),
(2147483647, 'Cuentos y Relatos Fantásticos', 'Fantasía y Misterio', 'Edgar Allan Poe', 1, 13, NULL);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `lista_libros`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `lista_libros` (
`ID_LIBRO` int(11)
,`TITULO` varchar(100)
,`TEMATICA` varchar(100)
,`AUTOR` varchar(50)
,`DESCRIPCION` varchar(20)
,`STOCK` int(11)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `lista_prestamos`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `lista_prestamos` (
`ID_PRESTAMO` int(11)
,`ID_USUARIO` int(11)
,`NOMBRE` varchar(100)
,`COD_LIBRO` int(11)
,`TITULO` varchar(100)
,`CANTIDAD` int(11)
,`TIPO_PRESTAMO` varchar(100)
,`FECHA_SOLICITUD` date
,`FECHA_DEVOLUCION` date
,`ESTATUS` varchar(20)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `lista_usuarios`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `lista_usuarios` (
`Id Usuario` int(11)
,`Nombre` varchar(100)
,`Apellido` varchar(100)
,`DPI` bigint(20)
,`Telefono` int(11)
,`Correo` varchar(100)
,`Domicilio` varchar(100)
,`Libros Prestados` int(11)
,`Deuda` double
,`Estatus` varchar(20)
,`Grupo` varchar(100)
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prestamo`
--

CREATE TABLE `prestamo` (
  `ID_PRESTAMO` int(11) NOT NULL,
  `ID_USUARIO` int(11) NOT NULL,
  `ID_TIPO_PRESTAMO` int(11) NOT NULL,
  `FECHA_SOL` date NOT NULL,
  `FECHA_DEV` date NOT NULL,
  `STATUS` varchar(20) DEFAULT NULL,
  `CANTIDAD_TOTAL` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `prestamo`
--

INSERT INTO `prestamo` (`ID_PRESTAMO`, `ID_USUARIO`, `ID_TIPO_PRESTAMO`, `FECHA_SOL`, `FECHA_DEV`, `STATUS`, `CANTIDAD_TOTAL`) VALUES
(1, 1, 1, '2023-04-26', '2023-04-27', 'CERRADO', 12),
(2, 6, 1, '2023-04-01', '2023-04-05', 'ATRASADO', 4),
(3, 15, 1, '2023-04-13', '2023-04-25', 'ACTIVO', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_prestamo`
--

CREATE TABLE `tipo_prestamo` (
  `ID_TIPO_PRESTAMO` int(11) NOT NULL,
  `DESCRIPCION` varchar(100) NOT NULL,
  `ESTATUS` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipo_prestamo`
--

INSERT INTO `tipo_prestamo` (`ID_TIPO_PRESTAMO`, `DESCRIPCION`, `ESTATUS`) VALUES
(1, 'Normal', 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `ID_USUARIO` int(11) NOT NULL,
  `NOMBRE` varchar(100) NOT NULL,
  `APELLIDO` varchar(100) NOT NULL,
  `DPI` bigint(20) NOT NULL,
  `TELEFONO` int(11) NOT NULL,
  `CORREO` varchar(100) NOT NULL,
  `DOMICILIO` varchar(100) NOT NULL,
  `LIBROS_PRESTADOS` int(11) NOT NULL,
  `DEUDA` double NOT NULL,
  `ID_ESTATUS` int(11) NOT NULL,
  `ID_GRUPO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`ID_USUARIO`, `NOMBRE`, `APELLIDO`, `DPI`, `TELEFONO`, `CORREO`, `DOMICILIO`, `LIBROS_PRESTADOS`, `DEUDA`, `ID_ESTATUS`, `ID_GRUPO`) VALUES
(1, 'Juan', 'Pérez', 1234567890101, 12345678, 'juan.perez@example.com', '0', 5, 25.5, 2, 3),
(2, 'María', 'García', 9876543210101, 23456789, 'maria.garcia@example.com', '0', 2, 10.25, 1, 2),
(3, 'Pedro', 'Rodríguez', 4567890120101, 34567890, 'pedro.rodriguez@example.com', '0', 7, 35.75, 3, 1),
(4, 'Luisa', 'Martínez', 2468013579101, 45678901, 'luisa.martinez@example.com', '0', 3, 15.3, 2, 3),
(5, 'José', 'Sánchez', 1357902468101, 56789012, 'jose.sanchez@example.com', '0', 8, 42.6, 1, 2),
(6, 'Ana', 'Gómez', 3692581475101, 67890123, 'ana.gomez@example.com', '0', 4, 20.9, 3, 1),
(7, 'Manuel', 'Castillo', 1472583690101, 78901234, 'manuel.castillo@example.com', '0', 9, 51.2, 2, 3),
(8, 'Carla', 'Fuentes', 2583691475101, 89012345, 'carla.fuentes@example.com', '0', 1, 5.75, 1, 2),
(9, 'Miguel', 'López', 7890123450101, 90123456, 'miguel.lopez@example.com', '0', 6, 30.4, 3, 1),
(10, 'Isabel', 'Hernández', 6789012345101, 12345678, 'isabel.hernandez@example.com', '0', 2, 10.25, 2, 3),
(11, 'Sofía', 'González', 5678901230101, 23456789, 'sofia.gonzalez@example.com', '0', 5, 25.5, 1, 2),
(12, 'José', 'Méndez', 4567891230101, 57489361, 'jose.mendez@example.com', '0', 8, 0, 1, 1),
(13, 'Ana', 'Castillo', 8521479630101, 77777777, 'ana.castillo@example.com', '0', 1, 100, 3, 2),
(14, 'Pedro', 'Rodríguez', 9876543210101, 33333333, 'pedro.rodriguez@example.com', '0', 3, 70.5, 2, 3),
(15, 'Sofía', 'González', 1234567890101, 55555555, 'sofia.gonzalez@example.com', '0', 6, 20, 1, 1),
(16, 'David', 'Flores', 4567891230101, 22222222, 'david.flores@example.com', '0', 2, 0, 3, 2),
(17, 'Alejandra', 'Cruz', 8521479630101, 77777777, 'alejandra.cruz@example.com', '0', 1, 50, 2, 3),
(18, 'Jorge', 'Martínez', 9876543210101, 33333333, 'jorge.martinez@example.com', '0', 3, 30.5, 1, 1),
(19, 'Martha', 'Sánchez', 1234567890101, 55555555, 'martha.sanchez@example.com', '0', 6, 75, 3, 2),
(20, 'Miguel', 'Morales', 4567891230101, 22222222, 'miguel.morales@example.com', '0', 2, 0, 2, 3),
(21, 'Elena', 'Gutiérrez', 8521479630101, 77777777, 'elena.gutierrez@example.com', '0', 1, 150, 1, 1),
(22, 'Ricardo', 'Vásquez', 9876543210101, 33333333, 'ricardo.vasquez@example.com', '0', 3, 100.5, 3, 2),
(23, 'Fabiola', 'Hernández', 1234567890101, 55555555, 'fabiola.hernandez@example.com', '0', 6, 45, 2, 3),
(24, 'Mario', 'García', 4567891230101, 57489361, 'mario.garcia@example.com', '0', 8, 60, 1, 1),
(25, 'Gabriela', 'Sosa', 8521479630101, 77777777, 'gabriela.sosa@example.com', '0', 1, 90, 2, 2);

-- --------------------------------------------------------

--
-- Estructura para la vista `lista_libros`
--
DROP TABLE IF EXISTS `lista_libros`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `lista_libros`  AS SELECT `libros`.`ID_LIBRO` AS `ID_LIBRO`, `libros`.`TITULO` AS `TITULO`, `libros`.`TEMATICA` AS `TEMATICA`, `libros`.`AUTOR` AS `AUTOR`, `grupo_lib`.`DESCRIPCION` AS `DESCRIPCION`, `libros`.`STOCK` AS `STOCK` FROM (`libros` join `grupo_lib`) WHERE `libros`.`ID_GRUPO` = `grupo_lib`.`ID_GRUPO``ID_GRUPO`  ;

-- --------------------------------------------------------

--
-- Estructura para la vista `lista_prestamos`
--
DROP TABLE IF EXISTS `lista_prestamos`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `lista_prestamos`  AS SELECT `prestamo`.`ID_PRESTAMO` AS `ID_PRESTAMO`, `prestamo`.`ID_USUARIO` AS `ID_USUARIO`, `usuario`.`NOMBRE` AS `NOMBRE`, `detalle_prestamo`.`ID_LIBRO` AS `COD_LIBRO`, `libros`.`TITULO` AS `TITULO`, `detalle_prestamo`.`CANTIDAD` AS `CANTIDAD`, `tipo_prestamo`.`DESCRIPCION` AS `TIPO_PRESTAMO`, `prestamo`.`FECHA_SOL` AS `FECHA_SOLICITUD`, `prestamo`.`FECHA_DEV` AS `FECHA_DEVOLUCION`, `prestamo`.`STATUS` AS `ESTATUS` FROM ((((`prestamo` join `usuario`) join `tipo_prestamo`) join `detalle_prestamo`) join `libros`) WHERE `prestamo`.`ID_USUARIO` = `usuario`.`ID_USUARIO` AND `prestamo`.`ID_TIPO_PRESTAMO` = `tipo_prestamo`.`ID_TIPO_PRESTAMO` AND `detalle_prestamo`.`ID_PRESTAMO` = `prestamo`.`ID_PRESTAMO` AND `detalle_prestamo`.`ID_LIBRO` = `libros`.`ID_LIBRO``ID_LIBRO`  ;

-- --------------------------------------------------------

--
-- Estructura para la vista `lista_usuarios`
--
DROP TABLE IF EXISTS `lista_usuarios`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `lista_usuarios`  AS SELECT `u`.`ID_USUARIO` AS `Id Usuario`, `u`.`NOMBRE` AS `Nombre`, `u`.`APELLIDO` AS `Apellido`, `u`.`DPI` AS `DPI`, `u`.`TELEFONO` AS `Telefono`, `u`.`CORREO` AS `Correo`, `u`.`DOMICILIO` AS `Domicilio`, `u`.`LIBROS_PRESTADOS` AS `Libros Prestados`, `u`.`DEUDA` AS `Deuda`, `s`.`DESCRIPCION` AS `Estatus`, `g`.`DESCRIPCION` AS `Grupo` FROM ((`usuario` `u` join `estatus` `s` on(`u`.`ID_ESTATUS` = `s`.`ID_ESTATUS`)) join `grupo` `g` on(`u`.`ID_GRUPO` = `g`.`ID_GRUPO`))  ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `detalle_prestamo`
--
ALTER TABLE `detalle_prestamo`
  ADD PRIMARY KEY (`ID_DETALLE_PRESTAMO`),
  ADD KEY `ID_PRESTAMO` (`ID_PRESTAMO`),
  ADD KEY `ID_LIBRO` (`ID_LIBRO`),
  ADD KEY `ID_PRESTAMO_2` (`ID_PRESTAMO`);

--
-- Indices de la tabla `estatus`
--
ALTER TABLE `estatus`
  ADD PRIMARY KEY (`ID_ESTATUS`);

--
-- Indices de la tabla `grupo`
--
ALTER TABLE `grupo`
  ADD PRIMARY KEY (`ID_GRUPO`);

--
-- Indices de la tabla `grupo_lib`
--
ALTER TABLE `grupo_lib`
  ADD PRIMARY KEY (`ID_GRUPO`);

--
-- Indices de la tabla `libros`
--
ALTER TABLE `libros`
  ADD PRIMARY KEY (`ID_LIBRO`),
  ADD KEY `ID_GRUPO` (`ID_GRUPO`);

--
-- Indices de la tabla `prestamo`
--
ALTER TABLE `prestamo`
  ADD PRIMARY KEY (`ID_PRESTAMO`),
  ADD KEY `ID_USUARIO` (`ID_USUARIO`,`ID_TIPO_PRESTAMO`),
  ADD KEY `ID_TIPO_PRESTAMO` (`ID_TIPO_PRESTAMO`);

--
-- Indices de la tabla `tipo_prestamo`
--
ALTER TABLE `tipo_prestamo`
  ADD PRIMARY KEY (`ID_TIPO_PRESTAMO`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`ID_USUARIO`),
  ADD KEY `ID_STATUS` (`ID_ESTATUS`,`ID_GRUPO`),
  ADD KEY `ID_GRUPO` (`ID_GRUPO`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalle_prestamo`
--
ALTER TABLE `detalle_prestamo`
  ADD CONSTRAINT `detalle_prestamo_ibfk_1` FOREIGN KEY (`ID_LIBRO`) REFERENCES `libros` (`ID_LIBRO`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detalle_prestamo_ibfk_2` FOREIGN KEY (`ID_PRESTAMO`) REFERENCES `prestamo` (`ID_PRESTAMO`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `libros`
--
ALTER TABLE `libros`
  ADD CONSTRAINT `libros_ibfk_1` FOREIGN KEY (`ID_GRUPO`) REFERENCES `grupo_lib` (`ID_GRUPO`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `prestamo`
--
ALTER TABLE `prestamo`
  ADD CONSTRAINT `prestamo_ibfk_1` FOREIGN KEY (`ID_TIPO_PRESTAMO`) REFERENCES `tipo_prestamo` (`ID_TIPO_PRESTAMO`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `prestamo_ibfk_2` FOREIGN KEY (`ID_USUARIO`) REFERENCES `usuario` (`ID_USUARIO`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`ID_ESTATUS`) REFERENCES `estatus` (`ID_ESTATUS`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `usuario_ibfk_2` FOREIGN KEY (`ID_GRUPO`) REFERENCES `grupo` (`ID_GRUPO`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
