-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-06-2021 a las 22:29:29
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
(1, 'José Pintado  ', 'Av Carlos Bustamantedddddddddddddddd ddddddddddddddddddd ddddddddddd dddddddddd dddddddddddddd  ', '+51 938150845  ', ' jose@gmail.com', 1, '2021-01-15 05:06:44', '2021-01-15 04:06:44'),
(2, 'Angel Pelaye  ', 'Cordova  ', '9898989  ', ' angel@gmail.com', 1, '2021-03-20 06:09:31', '2021-03-20 06:09:31'),
(3, 'Público en general', '-', '-', '-', 3, '2021-03-20 07:36:54', '2021-03-18 22:19:19'),
(4, 'Manuel', 'Venida osbaldo', '787878787', ' manuel@gmail.com', 1, '2021-01-15 05:07:32', '2021-01-15 04:07:32'),
(5, 'Andres ', '1554578575', '7787878 ', 'fsdfsdf@ghh.com ', 0, '2021-03-06 04:08:20', '2021-03-06 03:08:20'),
(6, 'fdsfds', 'fsdf', 'fdsfdsf', 'dfsdfds', 0, '2021-03-18 22:11:33', '2021-03-18 22:11:33');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE `compras` (
  `id` int(11) NOT NULL,
  `folio` varchar(20) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_proveedor` int(11) NOT NULL,
  `activo` tinyint(3) NOT NULL DEFAULT 1,
  `fecha_alta` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `compras`
--

INSERT INTO `compras` (`id`, `folio`, `total`, `id_usuario`, `id_proveedor`, `activo`, `fecha_alta`) VALUES
(15, '605b705a0dbf1', '250.00', 1, 1, 1, '2021-03-24 17:01:24'),
(16, '605b707ca7a87', '26000.00', 1, 1, 1, '2021-03-24 17:02:12'),
(17, '605bd100d4d90', '12500.00', 1, 4, 1, '2021-03-24 23:54:26'),
(18, '6085a8031a464', '1200.00', 1, 1, 1, '2021-04-25 17:34:04'),
(19, '6085ac88db3d4', '600000.00', 1, 1, 1, '2021-04-25 17:53:27'),
(20, '60864993501c4', '1300000.00', 1, 1, 1, '2021-04-26 05:03:38');

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
(3, 'tienda_telefono', '99999888'),
(4, 'tienda_email', 'tienda@gmail.com'),
(5, 'tienda_direccion', 'Av jose Luis Martes y Lunes'),
(6, 'ticket_leyenda', 'Gracias por comprar aquí'),
(7, 'ticket_wp', '222222222');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_compra`
--

CREATE TABLE `detalle_compra` (
  `id` int(11) NOT NULL,
  `id_compra` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `cantidad` decimal(10,2) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `fecha_alta` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `detalle_compra`
--

INSERT INTO `detalle_compra` (`id`, `id_compra`, `id_producto`, `nombre`, `cantidad`, `precio`, `fecha_alta`) VALUES
(61, 15, 72, 'bolsón vacío', '1.00', '250.00', '2021-03-24 17:01:24'),
(62, 16, 36, 'Piedra', '10.00', '2600.00', '2021-03-24 17:02:12'),
(63, 17, 72, 'bolsón vacío', '50.00', '250.00', '2021-03-24 23:54:26'),
(64, 18, 35, 'Arena', '1.00', '1200.00', '2021-04-25 17:34:04'),
(65, 19, 35, 'Arena', '500.00', '1200.00', '2021-04-25 17:53:27'),
(66, 20, 36, 'Piedra', '500.00', '2600.00', '2021-04-26 05:03:38');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_venta`
--

CREATE TABLE `detalle_venta` (
  `id` int(11) NOT NULL,
  `id_venta` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `cantidad` decimal(10,2) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `adicional` decimal(10,2) NOT NULL,
  `fecha_alta` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `detalle_venta`
--

INSERT INTO `detalle_venta` (`id`, `id_venta`, `id_producto`, `nombre`, `cantidad`, `precio`, `adicional`, `fecha_alta`) VALUES
(121, 25, 76, 'bolsón - arena ', '1.00', '2000.00', '0.00', '2021-04-26 19:13:50'),
(122, 25, 77, 'bolsón - piedra', '1.00', '2000.00', '0.00', '2021-04-26 19:13:50'),
(123, 25, 78, 'bolsón - escombro', '1.00', '2000.00', '0.00', '2021-04-26 19:13:50'),
(124, 26, 76, 'bolsón - arena ', '2.00', '2000.00', '500.00', '2021-04-26 19:14:38'),
(125, 27, 76, 'bolsón - arena ', '1.00', '2000.00', '0.00', '2021-06-02 20:28:26');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `codigo` varchar(100) NOT NULL,
  `precio_venta` decimal(10,2) NOT NULL,
  `precio_compra` decimal(10,2) NOT NULL DEFAULT 0.00,
  `existencia` decimal(10,2) NOT NULL DEFAULT 0.00,
  `existencia_kg` decimal(10,2) NOT NULL DEFAULT 0.00,
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

INSERT INTO `productos` (`id`, `codigo`, `precio_venta`, `precio_compra`, `existencia`, `existencia_kg`, `stock_minimo`, `inventariable`, `id_unidad`, `activo`, `fecha_alta`, `fecha_edit`, `nombre`) VALUES
(3, '02020202', '800.00', '400.00', '94.00', '0.00', 0, 0, 4, 1, '2021-02-17 04:17:19', NULL, 'Cemento / Avellaneda'),
(5, '', '750.00', '350.00', '99.00', '0.00', 50, 0, 4, 1, '2021-01-11 15:11:29', '2020-12-01 03:33:04', 'Cemento / Holcim'),
(7, '', '800.00', '450.00', '89.00', '0.00', 80, 0, 4, 1, '2021-01-11 15:12:03', '2020-11-17 23:36:38', 'Cemento / Loma Negra'),
(9, '', '700.00', '300.00', '0.00', '0.00', 1111, 0, 4, 1, '2021-01-11 15:12:55', '2020-11-19 03:05:08', 'Cemento Albañilería / Plasticor'),
(10, '', '700.00', '300.00', '18.00', '0.00', 2, 0, 4, 1, '2021-01-11 15:13:15', NULL, 'Cemento Albañilería / Hidralit'),
(11, '', '700.00', '300.00', '99.00', '0.00', 5, 0, 4, 1, '2021-01-11 15:13:55', NULL, 'Pegamento Cerámica / Weber'),
(12, '', '600.00', '350.00', '-1.00', '0.00', 5, 0, 4, 1, '2021-01-11 15:14:18', NULL, 'Pegamento Cerámica / Perfecto'),
(13, '', '500.00', '300.00', '0.00', '0.00', 15, 0, 4, 1, '2021-01-11 12:14:54', NULL, 'Pegamento Cerámica / Normix'),
(14, '', '400.00', '200.00', '0.00', '0.00', 15, 0, 4, 1, '2021-01-11 15:16:11', NULL, 'Cal / Casique'),
(15, '', '400.00', '200.00', '0.00', '0.00', 15, 0, 4, 1, '2021-01-11 12:16:01', NULL, 'Cal / Hidrat'),
(16, '', '700.00', '300.00', '0.00', '0.00', 15, 0, 4, 1, '2021-01-11 12:17:56', NULL, 'Cal / Vicat'),
(17, '', '700.00', '300.00', '0.00', '0.00', 15, 0, 4, 1, '2021-01-11 12:18:17', NULL, 'Cal / Milagro'),
(18, '', '2200.00', '1500.00', '0.00', '0.00', 15, 0, 4, 1, '2021-01-11 12:19:24', NULL, 'Hierro - 10\"'),
(19, '', '1500.00', '900.00', '0.00', '0.00', 15, 0, 4, 1, '2021-01-11 15:20:52', NULL, 'Hierro - 8\"'),
(20, '', '900.00', '600.00', '0.00', '0.00', 15, 0, 4, 1, '2021-01-11 12:20:44', NULL, 'Hierro - 6\"'),
(21, '', '400.00', '200.00', '0.00', '0.00', 15, 0, 4, 1, '2021-01-11 12:21:21', NULL, 'Hierro - 4,2\"'),
(22, '', '350.00', '100.00', '0.00', '0.00', 15, 0, 4, 1, '2021-01-11 12:22:48', NULL, 'Alambre Fardo K6'),
(23, '', '300.00', '150.00', '0.00', '0.00', 100, 0, 4, 1, '2021-01-11 12:23:47', NULL, 'Clavos (2 _1/2)'),
(24, '', '300.00', '150.00', '0.00', '0.00', 100, 0, 4, 1, '2021-01-11 12:24:07', NULL, 'Clavos (2)'),
(25, '', '300.00', '150.00', '0.00', '0.00', 100, 0, 4, 1, '2021-01-11 12:24:23', NULL, 'Clavos (1)'),
(26, '', '650.00', '350.00', '0.00', '0.00', 100, 0, 4, 1, '2021-01-11 12:24:51', NULL, 'Clavos para chapa'),
(27, '', '2800.00', '1900.00', '0.00', '0.00', 20, 0, 4, 1, '2021-01-11 12:25:33', NULL, 'Mallas 4,2 _ 15x25'),
(28, '', '3400.00', '2600.00', '0.00', '0.00', 30, 0, 4, 1, '2021-01-11 12:25:59', NULL, 'Mallas 4,2 _ 15x15'),
(29, '', '0.00', '0.00', '0.00', '0.00', 30, 0, 4, 1, '2021-01-11 12:26:26', NULL, 'Mallas 6 _ 15x25'),
(30, '', '0.00', '0.00', '0.00', '0.00', 30, 0, 4, 1, '2021-01-11 12:26:43', NULL, 'Mallas 6 _ 15x15'),
(31, '', '1900.00', '900.00', '0.00', '0.00', 50, 0, 4, 1, '2021-01-11 12:29:43', NULL, 'Ceresita x 20kg'),
(32, '', '1200.00', '600.00', '0.00', '0.00', 50, 0, 4, 1, '2021-01-11 12:29:59', NULL, 'Ceresita x 10kg'),
(33, '', '600.00', '300.00', '0.00', '0.00', 50, 0, 4, 1, '2021-01-11 12:30:33', NULL, 'Ceresita x 4kg'),
(34, '', '300.00', '200.00', '0.00', '0.00', 50, 0, 4, 1, '2021-01-11 12:32:14', NULL, 'Ceresita x 1kg'),
(35, '', '1900.00', '1200.00', '484.00', '0.00', 150, 0, 3, 1, '2021-06-02 20:28:26', NULL, 'Arena'),
(36, '', '3500.00', '2600.00', '509.25', '0.00', 150, 0, 3, 1, '2021-04-26 19:13:50', NULL, 'Piedra'),
(37, '', '1500.00', '600.00', '186.25', '0.00', 150, 0, 3, 1, '2021-04-26 19:13:50', NULL, 'Escombro '),
(38, '', '500.00', '240.00', '-4.00', '0.00', 15, 0, 4, 0, '2021-03-22 16:06:03', NULL, 'Bolsones (Arena-Piedra-Escombro)'),
(39, '', '59.00', '50.00', '144.00', '0.00', 200, 0, 4, 1, '2021-02-05 01:51:31', NULL, 'Ladrillos Huecos (12-18-33x6)'),
(40, '', '61.00', '55.00', '0.00', '0.00', 200, 0, 4, 1, '2021-02-05 01:41:41', NULL, 'Ladrillos Huecos (12-18-33x9)'),
(41, '', '49.00', '45.00', '0.00', '0.00', 200, 0, 4, 1, '2021-02-05 01:42:42', NULL, 'Ladrillos Huecos (8-18-33)'),
(42, '', '22.00', '16.00', '0.00', '0.00', 200, 0, 4, 1, '2021-02-05 01:43:00', NULL, 'Ladrillos Comunes'),
(43, '', '200.00', '100.00', '0.00', '0.00', 10, 0, 4, 1, '2021-01-11 12:47:47', NULL, 'Filtros Chicos'),
(44, '', '250.00', '120.00', '0.00', '0.00', 10, 0, 4, 1, '2021-01-11 12:48:06', NULL, 'Filtros Grandes'),
(45, '', '300.00', '200.00', '0.00', '0.00', 10, 0, 4, 1, '2021-01-11 12:48:30', NULL, 'Baldes'),
(46, '', '0.00', '0.00', '0.00', '0.00', 10, 0, 4, 1, '2021-01-11 12:48:56', NULL, 'Caños - 4p 100\"'),
(47, '', '0.00', '0.00', '0.00', '0.00', 20, 0, 4, 1, '2021-01-11 12:56:25', NULL, 'Caños - 4p 110\"'),
(48, '', '0.00', '0.00', '0.00', '0.00', 50, 0, 4, 1, '2021-01-11 12:57:40', NULL, 'Caños - 2 1/2 60\"'),
(49, '', '0.00', '0.00', '0.00', '0.00', 50, 0, 4, 1, '2021-01-11 13:01:49', NULL, 'Caños - 2 50\"'),
(50, '', '0.00', '0.00', '0.00', '0.00', 50, 0, 4, 1, '2021-01-11 13:02:01', NULL, 'Caños - 1 1/2 40\"'),
(51, '', '0.00', '0.00', '0.00', '0.00', 50, 0, 4, 1, '2021-01-11 13:02:15', NULL, 'Caños - 1'),
(52, '', '0.00', '0.00', '0.00', '0.00', 50, 0, 4, 1, '2021-01-11 13:02:36', NULL, 'Caños 1 - Polipropileno'),
(53, '', '0.00', '0.00', '0.00', '0.00', 50, 0, 4, 1, '2021-01-11 13:03:33', NULL, 'Caños 1/2 - Polipropileno'),
(54, '', '0.00', '0.00', '0.00', '0.00', 50, 0, 4, 1, '2021-01-11 13:03:45', NULL, 'Caños 3/4 - Polipropileno'),
(55, '', '0.00', '0.00', '0.00', '0.00', 50, 0, 4, 1, '2021-01-11 13:04:02', NULL, 'Caños 7/8 - Corrugado'),
(56, '', '0.00', '0.00', '0.00', '0.00', 50, 0, 4, 1, '2021-01-11 13:05:03', NULL, 'Caños 3/4 - Corrugado'),
(57, '', '0.00', '0.00', '0.00', '0.00', 50, 0, 4, 1, '2021-01-11 13:05:18', NULL, 'Caños 1/2 - Corrugado'),
(58, '', '0.00', '0.00', '0.00', '0.00', 50, 0, 4, 1, '2021-01-11 13:05:33', NULL, 'Codo - 110°'),
(59, '', '0.00', '0.00', '0.00', '0.00', 50, 0, 4, 1, '2021-01-11 13:05:45', NULL, 'Curva - 110° '),
(60, '', '5000.00', '2800.00', '0.00', '0.00', 5, 0, 4, 1, '2021-01-11 13:06:14', NULL, 'Carretilla'),
(61, '', '21000.00', '16000.00', '0.00', '0.00', 50, 0, 4, 1, '2021-01-11 13:06:32', NULL, 'Hormigonera'),
(62, '', '0.00', '0.00', '0.00', '0.00', 5, 0, 4, 1, '2021-01-11 13:06:50', NULL, 'Pala ancha - Gherardi'),
(63, '', '0.00', '0.00', '0.00', '0.00', 5, 0, 4, 1, '2021-01-11 13:07:15', NULL, 'Pala punta - Gherardi'),
(64, '', '0.00', '0.00', '0.00', '0.00', 5, 0, 4, 1, '2021-01-11 13:07:31', NULL, 'Pala ancha - Moises'),
(65, '', '0.00', '0.00', '0.00', '0.00', 5, 0, 4, 1, '2021-01-11 13:11:30', NULL, 'Pala punta - Moises'),
(66, '', '800.00', '500.00', '500.00', '0.00', 5, 0, 4, 1, '2021-03-06 03:38:03', NULL, 'Piletas Material'),
(67, '', '0.00', '0.00', '0.00', '0.00', 5, 0, 4, 1, '2021-01-11 13:12:00', NULL, 'Piletas Mesada Polipropileno'),
(68, '', '0.00', '0.00', '0.00', '0.00', 10, 0, 4, 1, '2021-01-11 13:12:10', NULL, 'Ruberol x 20mts'),
(69, '', '0.00', '0.00', '0.00', '0.00', 5, 0, 4, 1, '2021-01-11 13:12:19', NULL, 'Ruberol x 40mts'),
(70, '', '0.00', '0.00', '0.00', '0.00', 5, 0, 4, 1, '2021-01-11 13:12:31', NULL, 'Membrana x 3mts'),
(71, '', '0.00', '0.00', '0.00', '0.00', 5, 0, 4, 1, '2021-01-11 13:12:41', NULL, 'Membrana x 4mts'),
(72, '', '500.00', '250.00', '97.00', '0.00', 2, 0, 4, 1, '2021-06-02 20:28:26', NULL, 'bolsón vacío'),
(73, '', '600.00', '500.00', '34.75', '0.00', 3, 0, 1, 0, '2021-03-22 16:09:48', NULL, 'prueba'),
(74, '', '600.00', '400.00', '10.00', '0.00', 8000, 0, 1, 0, '2021-03-22 16:09:43', NULL, '1/4 arena'),
(75, '', '60.00', '50.00', '49.00', '0.00', 3, 0, 7, 0, '2021-03-22 16:09:38', NULL, 'Tomate'),
(76, '', '2000.00', '500.00', '1.00', '0.00', 10, 0, 4, 1, '2021-03-24 16:57:13', NULL, 'bolsón - arena '),
(77, '', '2000.00', '500.00', '-11.00', '0.00', 10, 0, 4, 1, '2021-04-26 05:02:40', NULL, 'bolsón - piedra'),
(78, '', '2000.00', '500.00', '0.00', '0.00', 10, 0, 4, 1, '2021-03-22 16:11:01', NULL, 'bolsón - escombro');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `id` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `direccion` varchar(200) NOT NULL,
  `telefono` varchar(50) NOT NULL,
  `wp` varchar(50) NOT NULL,
  `correo` varchar(200) NOT NULL,
  `activo` tinyint(4) NOT NULL DEFAULT 1,
  `fecha_alta` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `fecha_edit` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`id`, `nombre`, `direccion`, `telefono`, `wp`, `correo`, `activo`, `fecha_alta`, `fecha_edit`) VALUES
(1, 'Proveedor en general', '-', '-', '-', '-', 3, '2021-03-20 07:38:28', '2021-03-20 06:18:59'),
(2, 'Hola dddd ', 'Hola dddddd ', '4545454  ', '  5555555555', 'fdsfsdfsd  ', 0, '2021-03-24 23:53:01', '2021-03-24 23:53:01'),
(3, 'sssssss  ', 'sssssss  ', '777777777  ', '888888888', 'ssssssss  ', 0, '2021-03-24 23:53:03', '2021-03-24 23:53:03'),
(4, 'Manuel', 'gfdgf', '454354545', '5454445', 'fdfdfd@gmail.com', 1, '2021-03-24 23:53:23', '2021-03-24 23:53:23');

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
  `cantidad` decimal(10,2) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `adicional` decimal(10,0) NOT NULL,
  `subtotal` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `temporal_compra`
--

INSERT INTO `temporal_compra` (`id`, `folio`, `id_producto`, `codigo`, `nombre`, `cantidad`, `precio`, `adicional`, `subtotal`) VALUES
(81, '60870164ef5e3', 76, '', 'bolsón - arena ', '1.00', '2000.00', '0', '2000.00'),
(86, '60870c9ddc956', 76, '', 'bolsón - arena ', '1.00', '2000.00', '0', '2000.00'),
(94, '60870e1c5da98', 76, '', 'bolsón - arena ', '105.00', '2000.00', '0', '210000.00'),
(101, '608717429cf12', 35, '', 'Arena', '1.00', '1900.00', '0', '1900.00'),
(102, '6087177d7e58e', 76, '', 'bolsón - arena ', '1.00', '2000.00', '0', '2000.00'),
(103, '60871dfb8573e', 76, '', 'bolsón - arena ', '1.00', '2000.00', '0', '2000.00');

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
(1, 'Metros cubicos', 'mt3', 1, '2021-02-04 21:02:41', '2021-02-04 20:02:41'),
(2, 'Litos', 'lt', 0, '2021-02-04 21:17:03', '2021-02-04 20:17:03'),
(3, 'Metros cuadrados', 'xm3', 0, '2021-02-04 21:16:59', '2021-02-04 20:16:59'),
(4, 'Unidad', 'uni', 1, '2021-01-11 12:07:22', '2021-01-11 12:07:22'),
(5, 'Unidad-Palet', 'uni-p', 0, '2021-02-04 21:16:53', '2021-02-04 20:16:53'),
(6, 'kilos ', 'kg', 0, '2021-02-04 21:16:48', '2021-02-04 20:16:48'),
(7, 'kilos', 'kg', 1, '2021-03-06 03:13:56', '2021-03-06 03:13:56');

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
  `envio_nombre` varchar(100) NOT NULL DEFAULT '---',
  `envio_direccion` varchar(200) NOT NULL DEFAULT '---',
  `envio_telefono` varchar(50) NOT NULL DEFAULT '---',
  `envio_costo` decimal(10,2) NOT NULL DEFAULT 0.00,
  `otro_detalle` varchar(200) NOT NULL DEFAULT '---',
  `otro_detalle_costo` decimal(10,2) NOT NULL DEFAULT 0.00,
  `activo` int(11) NOT NULL DEFAULT 1,
  `descuento` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id`, `folio`, `total`, `fecha_alta`, `id_usuario`, `id_caja`, `id_cliente`, `forma_pago`, `envio_nombre`, `envio_direccion`, `envio_telefono`, `envio_costo`, `otro_detalle`, `otro_detalle_costo`, `activo`, `descuento`) VALUES
(25, '608710d088f66', '6000.00', '2021-04-26 19:13:50', 1, 1, 3, '001', '', '', '', '0.00', '', '0.00', 1, '0.00'),
(26, '6087110dd50bd', '4500.00', '2021-04-26 19:14:38', 1, 1, 3, '001', '', '', '', '0.00', '', '0.00', 1, '0.00'),
(27, '60b7e9af022b3', '2000.00', '2021-06-02 20:28:26', 1, 1, 3, '001', '', '', '', '0.00', '', '0.00', 1, '0.00');

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
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `fk_compras_usuario` (`id_usuario`),
  ADD KEY `fk_compras_proveedor` (`id_proveedor`);

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
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_ventas_clientes` (`id_cliente`),
  ADD KEY `fk_ventas_caja` (`id_caja`),
  ADD KEY `fk_ventas_usuario` (`id_usuario`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `compras`
--
ALTER TABLE `compras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `configuracion`
--
ALTER TABLE `configuracion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `detalle_compra`
--
ALTER TABLE `detalle_compra`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT de la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `temporal_compra`
--
ALTER TABLE `temporal_compra`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT de la tabla `unidades`
--
ALTER TABLE `unidades`
  MODIFY `id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `compras`
--
ALTER TABLE `compras`
  ADD CONSTRAINT `fk_compras_proveedor` FOREIGN KEY (`id_proveedor`) REFERENCES `proveedores` (`id`),
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

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `fk_ventas_caja` FOREIGN KEY (`id_caja`) REFERENCES `cajas` (`id`),
  ADD CONSTRAINT `fk_ventas_clientes` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id`),
  ADD CONSTRAINT `fk_ventas_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
