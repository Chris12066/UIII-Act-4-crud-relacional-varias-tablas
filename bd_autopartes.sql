-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-11-2023 a las 20:37:09
-- Versión del servidor: 10.1.28-MariaDB
-- Versión de PHP: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_autopartes`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carros_vendidos`
--

CREATE TABLE `carros_vendidos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_carro` bigint(20) UNSIGNED NOT NULL,
  `cantidad` bigint(20) UNSIGNED NOT NULL,
  `id_venta` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `carros_vendidos`
--

INSERT INTO `carros_vendidos` (`id`, `id_carro`, `cantidad`, `id_venta`) VALUES
(4, 1, 1, 6),
(5, 1, 1, 7),
(6, 1, 1, 8),
(7, 1, 1, 9),
(9, 1, 1, 11);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_carro`
--

CREATE TABLE `tbl_carro` (
  `id` int(3) NOT NULL,
  `id_carro` int(3) NOT NULL,
  `marca` varchar(50) NOT NULL,
  `modelo` varchar(50) NOT NULL,
  `anio` varchar(4) NOT NULL,
  `color` varchar(50) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  `cilindros` varchar(50) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `cantidad` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_carro`
--

INSERT INTO `tbl_carro` (`id`, `id_carro`, `marca`, `modelo`, `anio`, `color`, `tipo`, `cilindros`, `precio`, `cantidad`) VALUES
(1, 1, 'Nissan', 'Silvia s13', '1990', 'Menta', 'Coupe', '4', '40000.00', 100),
(4, 2, 'Toyota', 'AE86', '1990', 'Blanco', 'Coupe', '4', '30000.00', 100),
(6, 3, '3', 'Mazda', '1990', 'Amarillo', 'Coupe', '2', '90000.00', 100);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fecha` datetime NOT NULL,
  `total` decimal(7,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id`, `fecha`, `total`) VALUES
(4, '2023-11-16 03:56:27', '40000.00'),
(5, '2023-11-16 03:58:58', '40000.00'),
(10, '2023-11-16 20:27:58', '0.00'),
(11, '2023-11-16 20:31:15', '40000.00');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carros_vendidos`
--
ALTER TABLE `carros_vendidos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_carro` (`id_carro`),
  ADD KEY `id_venta` (`id_venta`);

--
-- Indices de la tabla `tbl_carro`
--
ALTER TABLE `tbl_carro`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carros_vendidos`
--
ALTER TABLE `carros_vendidos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `tbl_carro`
--
ALTER TABLE `tbl_carro`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
