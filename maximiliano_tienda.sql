-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-12-2020 a las 16:26:20
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `maximiliano_tienda`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cajas`
--

CREATE TABLE `cajas` (
  `id` int(11) NOT NULL,
  `numero_caja` varchar(10) NOT NULL,
  `nombre` varchar(35) NOT NULL,
  `folio` int(11) NOT NULL,
  `activo` tinyint(4) NOT NULL DEFAULT 1,
  `fecha_alta` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `fecha_edit` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cajas`
--

INSERT INTO `cajas` (`id`, `numero_caja`, `nombre`, `folio`, `activo`, `fecha_alta`, `fecha_edit`) VALUES
(1, '1', 'caja General', 1, 1, '2020-11-10 00:57:28', NULL),
(2, '2', 'caja Secundaria', 2, 1, '2020-11-10 00:58:31', NULL),
(3, '3', 'caja Gerencial', 3, 1, '2020-11-16 02:01:33', '2020-11-16 02:01:33'),
(4, '03', 'Caja Admin', 0, 1, '2020-11-16 03:56:49', '2020-11-16 02:56:49'),
(5, 'dddddddd', 'ddddddd', 7, 0, '2020-11-16 03:53:51', '2020-11-16 02:53:51'),
(6, 'ww', '12332313123', 50, 0, '2020-11-16 03:53:48', '2020-11-16 02:53:48'),
(7, '20', '//////****', 20, 1, '2020-11-16 03:56:52', '2020-11-16 02:56:52');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `direccion` varchar(200) NOT NULL,
  `telefono` varchar(50) NOT NULL,
  `correo` varchar(200) NOT NULL,
  `activo` tinyint(4) NOT NULL DEFAULT 1,
  `fecha_alta` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `fecha_edit` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `nombre`, `direccion`, `telefono`, `correo`, `activo`, `fecha_alta`, `fecha_edit`) VALUES
(1, 'Jose Pintado', 'Av Carlos Bustamante', '+51 938150845', 'jose@gmail.com', 1, '2020-11-19 16:09:44', NULL),
(2, 'Angel Pelaye ', 'Cordova ', '9898989 ', '', 1, '2020-11-19 20:31:49', '2020-11-19 19:31:49'),
(3, 'ddd', 'ddddddd', 'ddd', 'ddddddd@f.c', 0, '2020-11-19 16:25:25', '2020-11-19 15:25:25'),
(4, 'DDDD', 'DDD', 'DDD', '', 1, '2020-11-19 19:31:40', '2020-11-19 19:31:40');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE `compras` (
  `id` int(11) NOT NULL,
  `folio` varchar(20) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `activo` tinyint(3) NOT NULL DEFAULT 1,
  `fecha_alta` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `compras`
--

INSERT INTO `compras` (`id`, `folio`, `total`, `id_usuario`, `activo`, `fecha_alta`) VALUES
(11, '5fd184668f0c7', '40.00', 1, 1, '2020-12-10 01:14:22'),
(12, '5fd187ff9d6db', '500.00', 1, 1, '2020-12-10 01:29:52'),
(13, '5fd18a42dd6b8', '250000.00', 1, 1, '2020-12-10 01:39:13'),
(14, '5fd18b086a27f', '49380.48', 1, 1, '2020-12-10 01:43:00'),
(15, '5fd1c19cdb048', '128451.20', 1, 1, '2020-12-10 05:35:24'),
(16, '5fd1c26416dfa', '50130.48', 1, 1, '2020-12-10 05:39:15'),
(17, '5fd24b13ee5cf', '27500.00', 1, 1, '2020-12-10 15:26:01'),
(18, '5fd24c518bc06', '13345.12', 1, 1, '2020-12-10 15:27:35'),
(19, '5fd2c433ada56', '669756.00', 1, 1, '2020-12-11 00:00:17'),
(20, '5fd2c4e7923b0', '4500.00', 1, 1, '2020-12-11 00:01:45'),
(21, '5fd9810d6ba76', '2500.00', 1, 1, '2020-12-16 02:39:36'),
(22, '5fd982117ac54', '3000.00', 1, 1, '2020-12-16 02:43:46'),
(23, '5fe3a89fe7eec', '500.00', 1, 1, '2020-12-23 19:29:26'),
(24, '5fe3c5df7b03f', '150.00', 1, 1, '2020-12-23 21:37:36'),
(25, '5fe3e8cb1d662', '5000.00', 1, 1, '2020-12-24 00:03:19');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `configuracion`
--

CREATE TABLE `configuracion` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `valor` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `configuracion`
--

INSERT INTO `configuracion` (`id`, `nombre`, `valor`) VALUES
(1, 'tienda_nombre', 'Tienda Arg'),
(2, 'tienda_rfc', 'XXXXXXAAAxxxxAAA'),
(3, 'tienda_telefono', '99999'),
(4, 'tienda_email', 'tienda@gmail.com'),
(5, 'tienda_direccion', 'Av jose Luis Martes y Lunes'),
(6, 'ticket_leyenda', 'Gracias por comprar aquí');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_compra`
--

CREATE TABLE `detalle_compra` (
  `id` int(11) NOT NULL,
  `id_compra` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `fecha_alta` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `detalle_compra`
--

INSERT INTO `detalle_compra` (`id`, `id_compra`, `id_producto`, `nombre`, `cantidad`, `precio`, `fecha_alta`) VALUES
(15, 11, 5, 'Agua', 20, '500.00', '2020-12-10 01:14:22'),
(16, 11, 7, 'Litio', 30, '1000.00', '2020-12-10 01:14:22'),
(17, 12, 5, 'Agua', 1000, '500.00', '2020-12-10 01:29:52'),
(18, 13, 5, 'Agua', 500, '500.00', '2020-12-10 01:39:13'),
(19, 14, 7, 'Litio', 4, '12345.12', '2020-12-10 01:43:00'),
(20, 15, 5, 'Agua', 10, '500.00', '2020-12-10 05:35:24'),
(21, 15, 7, 'Litio', 10, '12345.12', '2020-12-10 05:35:24'),
(22, 16, 5, 'Agua', 2, '500.00', '2020-12-10 05:39:15'),
(23, 16, 7, 'Litio', 4, '12345.12', '2020-12-10 05:39:15'),
(24, 17, 5, 'Agua', 50, '500.00', '2020-12-10 15:26:01'),
(25, 17, 10, 'Fierro', 5, '500.00', '2020-12-10 15:26:01'),
(26, 18, 10, 'Fierro', 1, '500.00', '2020-12-10 15:27:35'),
(27, 18, 5, 'Agua', 1, '500.00', '2020-12-10 15:27:35'),
(28, 18, 7, 'Litio', 1, '12345.12', '2020-12-10 15:27:35'),
(29, 19, 5, 'Agua', 100, '500.00', '2020-12-11 00:00:17'),
(30, 19, 7, 'Litio', 50, '12345.12', '2020-12-11 00:00:17'),
(31, 19, 10, 'Fierro', 5, '500.00', '2020-12-11 00:00:17'),
(32, 20, 10, 'Fierro', 9, '500.00', '2020-12-11 00:01:45'),
(33, 21, 5, 'Agua', 5, '500.00', '2020-12-16 02:39:36'),
(34, 22, 11, 'Metal', 100, '30.00', '2020-12-16 02:43:46'),
(35, 23, 5, 'Agua', 1, '500.00', '2020-12-23 19:29:26'),
(36, 24, 3, 'Fierro de construcción', 3, '50.00', '2020-12-23 21:37:36'),
(37, 25, 3, 'Fierro de construcción', 100, '50.00', '2020-12-24 00:03:19');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_venta`
--

CREATE TABLE `detalle_venta` (
  `id` int(11) NOT NULL,
  `id_venta` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `fecha_alta` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `detalle_venta`
--

INSERT INTO `detalle_venta` (`id`, `id_venta`, `id_producto`, `nombre`, `cantidad`, `precio`, `fecha_alta`) VALUES
(1, 19, 12, 'Aguas', 1, '500.00', '2020-12-24 00:13:12'),
(2, 19, 5, 'Agua', 1, '500.00', '2020-12-24 00:13:12'),
(3, 19, 3, 'Fierro de construcción', 1, '50.00', '2020-12-24 00:13:12'),
(4, 20, 3, 'Fierro de construcción', 1, '50.00', '2020-12-24 00:14:10'),
(5, 21, 3, 'Fierro de construcción', 1, '120.00', '2020-12-24 00:25:47'),
(6, 22, 5, 'Agua', 1, '800.00', '2020-12-24 02:43:20'),
(7, 23, 5, 'Agua', 1, '800.00', '2020-12-24 02:47:53'),
(8, 24, 5, 'Agua', 60, '800.00', '2020-12-24 03:20:06'),
(9, 24, 3, 'Fierro de construcción', 2, '120.00', '2020-12-24 03:20:06'),
(10, 24, 10, 'Fierro', 2, '600.00', '2020-12-24 03:20:06'),
(11, 25, 5, 'Agua', 10, '800.00', '2020-12-24 03:21:58'),
(12, 25, 7, 'Litio', 30, '1200.00', '2020-12-24 03:21:58'),
(13, 25, 3, 'Fierro de construcción', 1, '120.00', '2020-12-24 03:21:58'),
(14, 26, 5, 'Agua', 1, '800.00', '2020-12-29 03:43:25'),
(15, 27, 5, 'Agua', 10, '800.00', '2020-12-29 03:50:39'),
(16, 28, 5, 'Agua', 2, '800.00', '2020-12-29 13:11:15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `codigo` varchar(100) NOT NULL,
  `precio_venta` decimal(10,2) NOT NULL,
  `precio_compra` decimal(10,2) NOT NULL DEFAULT 0.00,
  `existencia` int(11) NOT NULL DEFAULT 0,
  `stock_minimo` int(11) NOT NULL DEFAULT 0,
  `inventariable` tinyint(4) NOT NULL,
  `id_unidad` smallint(6) NOT NULL,
  `activo` tinyint(3) NOT NULL DEFAULT 1,
  `fecha_alta` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `fecha_edit` timestamp NULL DEFAULT NULL,
  `nombre` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `codigo`, `precio_venta`, `precio_compra`, `existencia`, `stock_minimo`, `inventariable`, `id_unidad`, `activo`, `fecha_alta`, `fecha_edit`, `nombre`) VALUES
(3, '02020202', '120.00', '50.00', 97, 0, 0, 1, 1, '2020-12-24 04:21:58', NULL, 'Fierro de construcción'),
(5, '', '800.00', '500.00', 1614, 50, 0, 2, 1, '2020-12-29 14:11:15', '2020-12-01 03:33:04', 'Agua'),
(7, '', '1200.00', '12345.12', 89, 80, 0, 1, 1, '2020-12-24 04:21:58', '2020-11-17 23:36:38', 'Litio'),
(9, '', '5000.00', '5000.00', 0, 1111, 0, 1, 0, '2020-11-19 04:05:08', '2020-11-19 03:05:08', 'eeeeeee'),
(10, '', '600.00', '500.00', 18, 2, 0, 1, 1, '2020-12-24 04:20:06', NULL, 'Fierro'),
(11, '', '50.00', '30.00', 100, 5, 0, 1, 1, '2020-12-16 03:43:46', NULL, 'Metal'),
(12, '', '6000.00', '500.00', -1, 5, 0, 2, 1, '2020-12-24 01:13:12', NULL, 'Aguas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `activo` tinyint(4) NOT NULL DEFAULT 1,
  `fecha_alta` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `fecha_edit` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `nombre`, `activo`, `fecha_alta`, `fecha_edit`) VALUES
(1, 'admin', 1, '2020-11-10 00:59:48', NULL),
(2, 'cajero', 1, '2020-11-16 04:26:54', '2020-11-16 03:26:54');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `temporal_compra`
--

CREATE TABLE `temporal_compra` (
  `id` int(11) NOT NULL,
  `folio` varchar(20) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `codigo` varchar(30) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `subtotal` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `temporal_compra`
--

INSERT INTO `temporal_compra` (`id`, `folio`, `id_producto`, `codigo`, `nombre`, `cantidad`, `precio`, `subtotal`) VALUES
(83, '5fe3e079a1e94', 5, '', 'Agua', 2, '500.00', '1000.00'),
(84, '5fe3e20fa4164', 12, '', 'Aguas', 1, '500.00', '500.00'),
(85, '5fe3e237d083b', 5, '', 'Agua', 1, '500.00', '500.00'),
(86, '5fe3e296e111a', 5, '', 'Agua', 1, '500.00', '500.00'),
(87, '5fe3e46e563fb', 3, '02020202', 'Fierro de construcción', 1, '50.00', '50.00'),
(88, '5fe3e46e563fb', 10, '', 'Fierro', 1, '500.00', '500.00'),
(89, '5fe3e49e8690e', 5, '', 'Agua', 1, '500.00', '500.00'),
(90, '5fe3e4bd8d806', 3, '02020202', 'Fierro de construcción', 2, '50.00', '100.00'),
(91, '5fe3e58d4d08d', 3, '02020202', 'Fierro de construcción', 1, '50.00', '50.00'),
(92, '5fe3e63202377', 5, '', 'Agua', 1, '500.00', '500.00'),
(93, '5fe3e679054d2', 3, '02020202', 'Fierro de construcción', 1, '50.00', '50.00'),
(94, '5fe3e69592523', 5, '', 'Agua', 1, '500.00', '500.00'),
(95, '5fe3e7499130c', 3, '02020202', 'Fierro de construcción', 1, '50.00', '50.00'),
(96, '5fe3e80c46e21', 5, '', 'Agua', 3, '500.00', '1500.00'),
(97, '5fe3e84bc5fb2', 5, '', 'Agua', 1, '500.00', '500.00'),
(99, '5fe3e8e4498b5', 3, '02020202', 'Fierro de construcción', 1, '50.00', '50.00'),
(100, '5fe3e9b30ea30', 5, '', 'Agua', 1, '500.00', '500.00'),
(101, '5fe3ea49adb23', 5, '', 'Agua', 1, '500.00', '500.00'),
(103, '5fe3eaf59b36a', 3, '02020202', 'Fierro de construcción', 1, '50.00', '50.00'),
(104, '5fe3eaf59b36a', 5, '', 'Agua', 1, '500.00', '500.00'),
(105, '5fe3eaf59b36a', 12, '', 'Aguas', 2, '500.00', '1000.00'),
(110, '5fe3eb8165c26', 3, '02020202', 'Fierro de construcción', 3, '50.00', '150.00'),
(111, '5fe3ecc9d8afd', 5, '', 'Agua', 2, '500.00', '1000.00'),
(113, '5fe40e2ad934a', 5, '', 'Agua', 1, '800.00', '800.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `unidades`
--

CREATE TABLE `unidades` (
  `id` smallint(6) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `nombre_corto` varchar(100) NOT NULL,
  `activo` tinyint(3) NOT NULL DEFAULT 1,
  `fecha_alta` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `fecha_edit` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `unidades`
--

INSERT INTO `unidades` (`id`, `nombre`, `nombre_corto`, `activo`, `fecha_alta`, `fecha_edit`) VALUES
(1, 'Metros    ', 'mt', 1, '2020-11-18 00:32:31', '2020-11-17 23:32:31'),
(2, 'Litos', 'lt', 1, '2020-12-16 03:36:07', '2020-12-16 02:36:07'),
(3, 'litros', 'lt', 1, '2020-12-16 02:35:48', '2020-12-16 02:35:48');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(30) NOT NULL,
  `password` varchar(130) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `id_caja` int(11) NOT NULL,
  `id_rol` int(11) NOT NULL,
  `activo` tinyint(4) NOT NULL DEFAULT 1,
  `fecha_alta` timestamp NOT NULL DEFAULT current_timestamp(),
  `fecha_edit` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `password`, `nombre`, `id_caja`, `id_rol`, `activo`, `fecha_alta`, `fecha_edit`) VALUES
(1, 'jose', '$2y$10$qzC1P0UVdJ2tvEqFL3YJMOjd9xuLlDsum7SD188ebYvA1HHpXf30W', 'Jose Pintado', 1, 1, 0, '2020-11-10 01:39:59', '2020-11-16 01:34:31'),
(2, 'luis', '$2y$10$IHy3gKcutRPvl4VCslAlJO8.yBeqm2MLVRtFu.2xvqSBpo.DMvPx2', 'Luis Vasquez', 1, 1, 0, '2020-11-10 00:44:44', '2020-11-16 01:32:27'),
(3, 'manuel', '$2y$10$iAjxJdSUcGup4AgNIFU5rOTLKH3y/P7sVzarXGmXgGIONdMA9xgS6', 'Manuel Pintado', 1, 1, 0, '2020-11-10 00:49:00', '2020-11-16 01:26:16'),
(4, 'angel', '$2y$10$/Xr2iEOUwHMYa8YmuTdHG.D6.eQ6mDw3MpVWvVOn.OdFMQz/WTO4K', 'Angel Pelayes', 1, 2, 1, '2020-11-16 01:34:22', '2020-11-16 01:34:22'),
(5, 'litsen', '$2y$10$fqSpTT5AziwStfrIyPo3Z.nwnbGElEleGd6RSe1tXyG/pX/bw9P2e', 'litsen Free', 1, 1, 1, '2020-11-27 21:00:59', '2020-11-27 21:00:59');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id` int(11) NOT NULL,
  `folio` varchar(20) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `fecha_alta` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_usuario` int(11) NOT NULL,
  `id_caja` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `forma_pago` varchar(5) NOT NULL,
  `activo` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id`, `folio`, `total`, `fecha_alta`, `id_usuario`, `id_caja`, `id_cliente`, `forma_pago`, `activo`) VALUES
(10, ' 5fe3e80c46e21', '1500.00', '2020-12-24 00:00:13', 1, 1, 1, '001', 1),
(11, ' 5fe3e84bc5fb2', '500.00', '2020-12-24 00:01:13', 1, 1, 1, '001', 1),
(12, ' 5fe3e8e4498b5', '50.00', '2020-12-24 00:03:40', 1, 1, 1, '001', 1),
(13, ' 5fe3e9b30ea30', '500.00', '2020-12-24 00:07:04', 1, 1, 1, '001', 1),
(14, ' 5fe3ea49adb23', '500.00', '2020-12-24 00:09:34', 1, 1, 1, '001', 1),
(15, ' 5fe3ea49adb23', '500.00', '2020-12-24 00:11:38', 1, 1, 1, '001', 1),
(16, ' 5fe3ea49adb23', '500.00', '2020-12-24 00:12:19', 1, 1, 1, '001', 1),
(17, ' 5fe3ea49adb23', '500.00', '2020-12-24 00:12:20', 1, 1, 1, '001', 1),
(18, ' 5fe3ea49adb23', '500.00', '2020-12-24 00:12:20', 1, 1, 1, '001', 1),
(19, '5fe3eb16b87e7', '1050.00', '2020-12-24 00:13:12', 1, 1, 1, '001', 1),
(20, '5fe3eb5bcb673', '50.00', '2020-12-24 00:14:10', 1, 1, 1, '001', 1),
(21, '5fe3ee0de3bcd', '120.00', '2020-12-24 00:25:47', 1, 1, 1, '001', 1),
(22, '5fe40e4ee3d63', '800.00', '2020-12-24 02:43:20', 1, 1, 1, '001', 1),
(23, '5fe40f636ded9', '800.00', '2020-12-24 02:47:53', 1, 1, 1, '001', 1),
(24, '5fe416c9adcf9', '49440.00', '2020-12-24 03:20:06', 1, 1, 2, '001', 1),
(25, '5fe4173f9755c', '44120.00', '2020-12-24 03:21:58', 1, 1, 1, '001', 1),
(26, '5feab3c3be9ed', '800.00', '2020-12-29 03:43:25', 1, 1, 1, '001', 1),
(27, '5feab58e3254e', '8000.00', '2020-12-29 03:50:39', 1, 1, 1, '001', 1),
(28, '5feb38fb9f24e', '1600.00', '2020-12-29 13:11:15', 1, 1, 1, '001', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cajas`
--
ALTER TABLE `cajas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_compras_usuario` (`id_usuario`);

--
-- Indices de la tabla `configuracion`
--
ALTER TABLE `configuracion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `detalle_compra`
--
ALTER TABLE `detalle_compra`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_detalle_compra` (`id_compra`),
  ADD KEY `fk_detalle_producto` (`id_producto`);

--
-- Indices de la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `productos_idfk_1` (`id_unidad`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `temporal_compra`
--
ALTER TABLE `temporal_compra`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `unidades`
--
ALTER TABLE `unidades`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_caja` (`id_caja`),
  ADD KEY `id_rol` (`id_rol`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cajas`
--
ALTER TABLE `cajas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `compras`
--
ALTER TABLE `compras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `configuracion`
--
ALTER TABLE `configuracion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `detalle_compra`
--
ALTER TABLE `detalle_compra`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `temporal_compra`
--
ALTER TABLE `temporal_compra`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- AUTO_INCREMENT de la tabla `unidades`
--
ALTER TABLE `unidades`
  MODIFY `id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `compras`
--
ALTER TABLE `compras`
  ADD CONSTRAINT `fk_compras_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `detalle_compra`
--
ALTER TABLE `detalle_compra`
  ADD CONSTRAINT `fk_detalle_compra` FOREIGN KEY (`id_compra`) REFERENCES `compras` (`id`),
  ADD CONSTRAINT `fk_detalle_producto` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id`);

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_idfk_1` FOREIGN KEY (`id_unidad`) REFERENCES `unidades` (`id`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `fk_usuario_caja` FOREIGN KEY (`id_caja`) REFERENCES `cajas` (`id`),
  ADD CONSTRAINT `fk_usuario_rol` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
