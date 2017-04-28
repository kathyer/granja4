-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-04-2017 a las 19:34:11
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `granja4`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `nif` varchar(12) COLLATE utf8_spanish_ci DEFAULT NULL,
  `nombreGestor` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `direccion` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `codigoPostal` varchar(5) COLLATE utf8_spanish_ci DEFAULT NULL,
  `localidad` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `telefono` varchar(30) COLLATE utf8_spanish_ci DEFAULT NULL,
  `telefono2` varchar(30) COLLATE utf8_spanish_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `nombre`, `nif`, `nombreGestor`, `direccion`, `codigoPostal`, `localidad`, `telefono`, `telefono2`, `email`) VALUES
(1, 'Nombre Cliente 1', 'G-8951332', 'Juan', 'Calle Falsa 123', '06193', 'Springfield', '666666666', '777777777', 'email@suEmail.com'),
(3, 'Viajes Futuro', '', 'Marty McFly', 'Lyon States', '66789', 'Hill Valley', '111111111', '', ''),
(277, 'Taladros Vernon', '', 'Vernon Dursley', 'Privet Drive Nº4', '00000', 'Londres', '666666666', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenesproducto`
--

CREATE TABLE `imagenesproducto` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_producto` int(10) UNSIGNED NOT NULL,
  `rutaImagen` text COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `precios`
--

CREATE TABLE `precios` (
  `id_producto` int(10) UNSIGNED NOT NULL,
  `id_cliente` int(10) UNSIGNED NOT NULL,
  `precioCliente` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `precios`
--

INSERT INTO `precios` (`id_producto`, `id_cliente`, `precioCliente`) VALUES
(6, 1, 5),
(15, 1, 3),
(14, 1, 6),
(12, 1, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `unidades` int(10) UNSIGNED NOT NULL,
  `referencia` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `precio` float NOT NULL,
  `iva` int(10) UNSIGNED NOT NULL,
  `precioIVA` float NOT NULL,
  `precioMinimo` float NOT NULL,
  `categoria` int(10) UNSIGNED NOT NULL,
  `restaurante` tinyint(1) NOT NULL,
  `web` tinyint(1) NOT NULL,
  `descripcion` text COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `unidades`, `referencia`, `precio`, `iva`, `precioIVA`, `precioMinimo`, `categoria`, `restaurante`, `web`, `descripcion`) VALUES
(6, 'adfadsf', 50, 'GT-TER', 1.35, 21, 1.6335, 1.8, 2, 0, 0, 'Bolsa transparente'),
(10, 'Servilletas 20x20', 50, 'SERV-20X20-50', 1, 21, 1.21, 1.5, 5, 1, 1, 'Servilletas grandes'),
(12, 'Bolsa grande', 100, 'Grande-Bolsa', 1.45, 21, 1.7545, 2, 2, 0, 0, 'bolsa hiper grande'),
(13, 'Tarra 400ml', 10, '', 2.5, 21, 3.025, 4, 3, 0, 1, ''),
(14, 'Tarra grande', 10, '', 2.5, 21, 3.025, 4, 3, 0, 1, ''),
(15, 'Tarrina 40ml', 100, 'TAR-40-100', 1.7, 4, 1.768, 2.5, 3, 0, 0, ''),
(16, 'Boite 60 cl', 20, '60CL-BOTE-20', 2.47, 4, 2.5688, 3, 3, 0, 0, ''),
(17, 'XL Estuche', 1, 'XL-E', 1.25, 4, 1.3, 1.4, 1, 0, 1, 'Estuche de Huevos tamaño XL. Contiene 1 Docena de huevos'),
(18, 'L Estuche', 1, 'L-E', 1.09, 4, 1.1336, 1.24, 1, 0, 1, 'Estuche de Huevos tamaño L. Contiene 1 Docena de huevos'),
(19, 'M Estuche', 1, 'M-E', 0.94, 4, 0.9776, 1.09, 1, 0, 1, 'Estuche de Huevos tamaño M. Contiene 1 Docena de huevos'),
(20, 'XL Granel', 1, 'XL-G', 1.09, 4, 1.1336, 1.24, 1, 0, 1, 'Cartón de Huevos tamaño XL. Contiene 20 Huevos'),
(21, 'L Granel', 1, 'L-G', 0.94, 4, 0.9776, 1.09, 1, 0, 1, 'Cartón de Huevos tamaño L. Contiene 30 Huevos'),
(22, 'M Granel', 1, 'M-G', 0.79, 4, 0.8216, 0.94, 1, 0, 1, 'Cartón de Huevos tamaño M. Contiene 30 Huevos'),
(23, 'S Granel', 1, 'S-G', 0.64423, 4, 0.669999, 0.75, 1, 0, 1, 'Cartón de Huevos tamaño S. Contiene 30 Huevos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(10) UNSIGNED NOT NULL,
  `usuario` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `contrasena` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `rol` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `contrasena`, `nombre`, `rol`) VALUES
(1, 'huevos', '5d32757090f47af266278c0efe48c7528f9a6cd3', 'Admin Granja', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `imagenesproducto`
--
ALTER TABLE `imagenesproducto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indices de la tabla `precios`
--
ALTER TABLE `precios`
  ADD KEY `id_producto` (`id_producto`),
  ADD KEY `id_cliente` (`id_cliente`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=278;
--
-- AUTO_INCREMENT de la tabla `imagenesproducto`
--
ALTER TABLE `imagenesproducto`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `imagenesproducto`
--
ALTER TABLE `imagenesproducto`
  ADD CONSTRAINT `imagenesproducto_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `precios`
--
ALTER TABLE `precios`
  ADD CONSTRAINT `precios_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `precios_ibfk_2` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
