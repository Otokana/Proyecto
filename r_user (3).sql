-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-04-2023 a las 07:57:20
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `r_user`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

CREATE TABLE `permisos` (
  `id` int(11) NOT NULL,
  `rol` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `permisos`
--

INSERT INTO `permisos` (`id`, `rol`) VALUES
(1, 'Administrador'),
(2, 'propietario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `platillos`
--

CREATE TABLE `platillos` (
  `platillo_id` int(11) NOT NULL,
  `propietario_id` int(11) NOT NULL,
  `p_nombre` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `p_precio` int(11) UNSIGNED NOT NULL,
  `p_descripcion` text COLLATE utf8_spanish_ci NOT NULL,
  `p_url_imagen` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `p_categoria` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `platillos`
--

INSERT INTO `platillos` (`platillo_id`, `propietario_id`, `p_nombre`, `p_precio`, `p_descripcion`, `p_url_imagen`, `p_categoria`, `activo`) VALUES
(4, 19, 'afasfasf', 13548674, 'as4f5a1f', 'paisaje2.jpg', 'Postre', 1),
(5, 0, 'afaffa', 1351, '51351asdf', 'paisaje2.jpg', 'Entrada', 1),
(6, 0, 'afaf', 438435, '1351', 'paisaje.jpg', 'Plato principal', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `restaurant`
--

CREATE TABLE `restaurant` (
  `id` int(11) NOT NULL,
  `r_nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `nit` int(11) NOT NULL,
  `direccion` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `r_telefono` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `url` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `id_propietario` varchar(60) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `restaurant`
--

INSERT INTO `restaurant` (`id`, `r_nombre`, `nit`, `direccion`, `r_telefono`, `url`, `id_propietario`) VALUES
(1, 'q', 78, '', '', '', ''),
(2, 'ee', 423, '', '', '', ''),
(3, 'buenavida', 135135, 'kjyhv', '135135', '../sources/paisaje2.jpg', '19');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(60) NOT NULL,
  `documento` varchar(60) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `telefono` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `rol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `nombre`, `apellido`, `documento`, `correo`, `telefono`, `password`, `rol`) VALUES
(18, 'herley', '', '0', 'admin@gmail.com', '1111111111111', '827ccb0eea8a706c4c34a16891f84e7b', 1),
(19, 'juan', '', '0', 'user@gmail.com', '2222222222222', '01cfcd4f6b8770febfb40cb906715822', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `platillos`
--
ALTER TABLE `platillos`
  ADD PRIMARY KEY (`platillo_id`),
  ADD KEY `propietario_id` (`propietario_id`);

--
-- Indices de la tabla `restaurant`
--
ALTER TABLE `restaurant`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permisos` (`rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `permisos`
--
ALTER TABLE `permisos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `platillos`
--
ALTER TABLE `platillos`
  MODIFY `platillo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `restaurant`
--
ALTER TABLE `restaurant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `permisos` FOREIGN KEY (`rol`) REFERENCES `permisos` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
