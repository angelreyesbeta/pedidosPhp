-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-09-2020 a las 17:15:02
-- Versión del servidor: 10.3.16-MariaDB
-- Versión de PHP: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pedidosbdd`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalleservicio`
--

CREATE TABLE `detalleservicio` (
  `id` int(11) NOT NULL,
  `servicio` int(11) NOT NULL,
  `usuario` int(11) NOT NULL,
  `numeroPedido` int(11) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `cantidad` int(11) NOT NULL DEFAULT 1,
  `valorUnitario` decimal(10,0) NOT NULL,
  `valorTotal` decimal(10,0) NOT NULL,
  `cliente` varchar(100) NOT NULL,
  `telefono` varchar(10) DEFAULT NULL,
  `Direccion` text NOT NULL,
  `fecha` datetime NOT NULL,
  `formaPago` varchar(50) DEFAULT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `detalleservicio`
--

INSERT INTO `detalleservicio` (`id`, `servicio`, `usuario`, `numeroPedido`, `descripcion`, `cantidad`, `valorUnitario`, `valorTotal`, `cliente`, `telefono`, `Direccion`, `fecha`, `formaPago`, `estado`) VALUES
(36, 46, 1, 21, 'LASAÑA MIXTA', 1, '13000', '13000', 'ANGEL REYES', '0', 'NIÑO JESUS', '2020-08-13 12:15:47', 'Efectivo', 1),
(37, 46, 1, 22, 'LASAÑA MIXTAS', 5, '13000', '65000', 'TAILY', '0', 'CESAR CONTO', '2020-08-13 12:16:42', 'Efectivo', 1),
(38, 46, 1, 23, 'LASAÑA MIXTA', 2, '13000', '26000', 'DOLLY PARRA', '0', 'NIÑO JESUS', '2020-08-13 12:18:01', '0', 0),
(39, 46, 1, 24, 'LASAÑA', 1, '13000', '13000', 'NEGRI', '0', 'NIÑO JESUS', '2020-08-13 12:19:45', 'Efectivo', 1),
(40, 46, 1, 25, 'LASAÑA', 1, '13000', '13000', 'VIRCY', '0', 'KEENNEDY', '2020-08-13 12:21:15', '0', 0),
(41, 46, 1, 26, 'LASAÑA', 1, '13000', '13000', 'YADIRA', '0', 'SANVICENTE', '2020-08-13 12:22:32', 'Efectivo', 1),
(42, 46, 1, 27, 'LASAÑA', 2, '13000', '26000', 'ANGIE', '0', 'OBAPO', '2020-08-13 12:23:16', '0', 0),
(43, 46, 1, 28, 'LASAÑA', 2, '13000', '26000', 'ITIANA', '0', 'NIÑO JESUS', '2020-08-13 12:25:05', 'Efectivo', 1),
(44, 46, 1, 29, 'LASAÑA', 4, '13000', '52000', 'LEISY', '0', 'OBAPO', '2020-08-13 12:25:48', 'Efectivo', 1),
(45, 46, 1, 30, 'LASAÑA', 1, '13000', '13000', 'MAYRA LUNA', '0', 'OBAPO', '2020-08-13 12:26:52', 'Transferencia', 1),
(46, 46, 1, 31, 'LASAÑA', 1, '13000', '13000', 'YULI AMIGA ELEANA', '0', 'OBAPO', '2020-08-13 12:27:39', 'Transferencia', 1),
(47, 46, 1, 32, 'LASAÑA', 1, '13000', '13000', 'LEIDY AMIGA ELEANA', '0', 'PLAYITA', '2020-08-13 12:28:11', 'Efectivo', 1),
(48, 46, 1, 33, 'LASAÑA', 2, '13000', '26000', 'GISEL AMIGA ELEANA', '0', 'OBAPO', '2020-08-13 12:29:25', 'Efectivo', 1),
(49, 46, 1, 34, 'LASAÑA', 1, '13000', '13000', 'JOSE  MANUEL REYES', '0', 'NIÑO JESUS', '2020-08-13 12:29:57', 'Efectivo', 1),
(50, 46, 1, 35, 'LASAÑA', 1, '13000', '13000', 'JHONSITO', '3145979065', 'NIÑO JESUS', '2020-08-13 12:30:34', 'Efectivo', 1),
(51, 46, 1, 36, 'LASAÑA', 3, '13000', '39000', 'NILSON YASMINA', '0', 'NIÑO JESUS', '2020-08-13 12:31:28', 'Efectivo', 1),
(52, 46, 1, 37, 'LASAÑA', 1, '13000', '13000', 'CUCHA', '0', 'NIÑO JESUS', '2020-08-13 12:32:12', 'Efectivo', 1),
(53, 46, 1, 38, 'LASAÑA', 4, '13000', '52000', 'EDINSON', '0', 'NIÑO JESUS', '2020-08-13 12:33:15', 'Transferencia', 1),
(54, 46, 1, 39, 'LASAÑA', 2, '13000', '26000', 'PATRICIA', '0', 'NIÑO JESUS', '2020-08-13 12:34:12', 'Efectivo', 1),
(56, 46, 1, 41, 'LASAÑA', 4, '13000', '52000', 'IDALMY', '0', 'CENTRO 5TA', '2020-08-13 12:36:23', 'Efectivo', 1),
(58, 46, 1, 43, 'LASAÑA', 2, '13000', '26000', 'FACMEN', '0', 'KENNEDY', '2020-08-13 12:37:38', '0', 0),
(59, 46, 1, 44, 'LASAÑA', 1, '13000', '13000', 'ELEANA REYES', '0', 'NIÑO JESUS', '2020-08-13 12:38:18', 'Efectivo', 1),
(60, 46, 1, 45, 'LASAÑA', 1, '13000', '13000', 'TIMOTEO', '0', 'AMERICAS', '2020-08-13 12:39:32', 'Efectivo', 1),
(61, 46, 1, 46, 'LASAÑA', 2, '13000', '26000', 'ROBERTO BETANCUR', '0', 'JARDIN', '2020-08-13 12:40:36', 'Efectivo', 1),
(62, 46, 1, 47, 'LASAÑA', 1, '13000', '13000', 'INDIRA JHON JAIRO', '0', 'LA 19', '2020-08-13 12:41:26', 'Efectivo', 1),
(63, 46, 1, 48, 'LASAÑA MIXTA', 3, '13000', '39000', 'ANDRES LOZANO POPIO', '0', 'NIÑO JESUS', '2020-08-13 12:44:57', 'Transferencia', 1),
(64, 46, 1, 49, 'LASAÑA', 1, '13000', '13000', 'TATIANA AMIGA DE ELEANA', '0', 'CENTRO', '2020-08-13 12:45:28', 'Efectivo', 1),
(66, 46, 1, 50, 'LASAÑA', 1, '13000', '13000', 'MELISSA ZAPATA', '0', 'OBAPO', '2020-08-14 13:36:45', 'Transferencia', 1),
(67, 46, 1, 51, 'LASAÑA', 1, '13000', '13000', 'MARICELA', '0', 'NIÑO JESUS', '2020-08-14 13:37:31', 'Efectivo', 1),
(68, 46, 1, 52, 'LASAÑA', 3, '13000', '39000', 'JOSE REYES', '0', 'NIÑO JESUS', '2020-08-14 14:17:45', 'Efectivo', 1),
(69, 46, 1, 53, 'LASAÑA', 4, '13000', '52000', 'CRISMAN', '0', 'NIÑO JESUS', '2020-08-15 08:57:39', 'Efectivo', 1),
(70, 46, 1, 54, 'LASAÑA', 1, '13000', '13000', 'ALMA', '0', 'NIÑO JESUS', '2020-08-15 08:58:09', 'Efectivo', 1),
(71, 46, 1, 55, 'LASAÑA', 1, '13000', '13000', 'OTRO', '0', 'CENTRO', '2020-08-15 11:56:54', 'Efectivo', 1),
(72, 47, 1, 56, 'ARROZ CON 5 CARNES', 1, '15000', '15000', 'Mafe Amiga Eleana', '0', 'Buenos Aires', '2020-08-27 16:58:29', '0', 0),
(73, 47, 1, 57, 'ARROZ CON 5 CARNES', 2, '15000', '30000', 'Gissel', '0', 'Jardin', '2020-08-27 20:04:03', '0', 0),
(74, 47, 1, 58, 'ARROZ CON 5 CARNES', 1, '15000', '15000', 'Saya', '0', 'MEDRANO - VIENTO LIBRE', '2020-09-02 14:55:40', '0', 0),
(75, 47, 1, 59, 'ARROZ CON 5 CARNES', 2, '15000', '30000', 'MARY YADIRA', '0', 'NIÑO JESUS', '2020-09-02 16:08:04', '0', 0),
(76, 47, 1, 60, 'ARROZ CON 5 CARNES', 2, '15000', '30000', 'Tania', '3103795765', 'Esmeralda por donde Alix', '2020-09-02 20:55:52', '0', 0),
(77, 47, 1, 61, 'ARROZ CON 5 CARNES', 2, '15000', '30000', 'Juan Amigo Leisy', '3115419920', 'Buenos Aires', '2020-09-02 21:12:59', '0', 0),
(78, 47, 1, 62, 'ARROZ CON 5 CARNES', 2, '15000', '30000', 'Tatiana', '0', 'Centro', '2020-09-02 22:36:25', '0', 0),
(79, 47, 1, 63, 'ARROZ CON 5 CARNES', 2, '15000', '30000', 'Doña Idalmy', '0', 'Centro', '2020-09-02 23:39:01', '0', 0),
(80, 47, 1, 64, 'ARROZ CON 5 CARNES', 2, '15000', '30000', 'Manuel Dario', '3105490530', 'Terrazas', '2020-09-03 09:59:13', '0', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `egresoservicio`
--

CREATE TABLE `egresoservicio` (
  `id` int(11) NOT NULL,
  `servicio` int(11) NOT NULL,
  `usuario` int(11) NOT NULL,
  `descripcion` text NOT NULL,
  `valor` float NOT NULL,
  `fechaHora` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `egresoservicio`
--

INSERT INTO `egresoservicio` (`id`, `servicio`, `usuario`, `descripcion`, `valor`, `fechaHora`) VALUES
(6, 46, 1, '2 JAMONES EN LONCHA', 15600, '2020-08-13 12:00:43'),
(7, 46, 1, 'BOLSA PARA EMPACAR', 10800, '2020-08-13 12:01:13'),
(8, 46, 1, 'PECHUGAS DE POLLO', 41300, '2020-08-13 12:04:50'),
(9, 46, 1, 'QUESO EN BLOQUE 31000,  QUESO MOZARELLA 6000, CREMA DE LECHE 11800, TOCINETA 15000', 63800, '2020-08-13 12:07:03'),
(10, 46, 1, 'MOLDE ALUMINO PARA LASAÑA X 3 13500, TAPARA PARA LASAÑAS 9600, GINGER 2000, CUBIERTOS 8000', 33100, '2020-08-13 12:10:14'),
(11, 46, 1, 'MENTAS', 2000, '2020-08-13 12:11:01'),
(12, 46, 1, 'LEGUMBRE', 17000, '2020-08-13 12:11:32'),
(13, 46, 1, 'RES MOLIDA', 69500, '2020-08-14 13:40:39'),
(14, 46, 1, 'MANTEQUILLA, HARINA, NUEZMOSCADA', 6300, '2020-08-14 13:41:28'),
(15, 46, 1, 'SERVILLETA', 4200, '2020-08-14 13:42:30'),
(16, 46, 1, 'PASTAS, LECHES, ADERESOS, SALSAS', 65000, '2020-08-14 13:43:12'),
(17, 46, 1, 'TOSTADAS', 10000, '2020-08-14 15:53:18'),
(18, 46, 1, 'PASTAS', 12000, '2020-08-17 16:50:58'),
(21, 47, 1, 'IMAGEN DE PUBLICIDAD', 15000, '2020-09-02 16:09:27');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicio`
--

CREATE TABLE `servicio` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `inversion` decimal(10,0) NOT NULL,
  `precioVenta` decimal(10,0) NOT NULL,
  `fecha` datetime NOT NULL,
  `usuario` int(11) NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `servicio`
--

INSERT INTO `servicio` (`id`, `descripcion`, `inversion`, `precioVenta`, `fecha`, `usuario`, `estado`) VALUES
(46, 'LASAÑAS', '0', '0', '2020-08-13 11:59:28', 1, 0),
(47, 'ARROZ CON 5 CARNES', '350000', '15000', '2020-08-27 00:00:00', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `mail`, `pass`) VALUES
(1, 'angelreyesbeta@hotmail.com', 'Emmanuel110922.');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `detalleservicio`
--
ALTER TABLE `detalleservicio`
  ADD PRIMARY KEY (`id`),
  ADD KEY `servicio` (`servicio`),
  ADD KEY `usuario` (`usuario`);

--
-- Indices de la tabla `egresoservicio`
--
ALTER TABLE `egresoservicio`
  ADD PRIMARY KEY (`id`),
  ADD KEY `servicio` (`servicio`),
  ADD KEY `usuario` (`usuario`);

--
-- Indices de la tabla `servicio`
--
ALTER TABLE `servicio`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario` (`usuario`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `detalleservicio`
--
ALTER TABLE `detalleservicio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT de la tabla `egresoservicio`
--
ALTER TABLE `egresoservicio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `servicio`
--
ALTER TABLE `servicio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalleservicio`
--
ALTER TABLE `detalleservicio`
  ADD CONSTRAINT `detalleservicio_ibfk_1` FOREIGN KEY (`servicio`) REFERENCES `servicio` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `detalleservicio_ibfk_2` FOREIGN KEY (`usuario`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `egresoservicio`
--
ALTER TABLE `egresoservicio`
  ADD CONSTRAINT `egresoservicio_ibfk_1` FOREIGN KEY (`servicio`) REFERENCES `servicio` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `egresoservicio_ibfk_2` FOREIGN KEY (`usuario`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `servicio`
--
ALTER TABLE `servicio`
  ADD CONSTRAINT `servicio_ibfk_1` FOREIGN KEY (`usuario`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
