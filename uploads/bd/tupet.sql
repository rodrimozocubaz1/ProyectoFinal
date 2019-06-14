-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-06-2019 a las 06:38:22
-- Versión del servidor: 10.3.15-MariaDB
-- Versión de PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tupet`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mascotas`
--

CREATE TABLE `mascotas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(150) COLLATE latin1_spanish_ci DEFAULT NULL,
  `id_dueno` int(11) DEFAULT NULL,
  `raza` varchar(100) COLLATE latin1_spanish_ci DEFAULT NULL,
  `color` varchar(80) COLLATE latin1_spanish_ci DEFAULT NULL,
  `tamano` varchar(80) COLLATE latin1_spanish_ci DEFAULT NULL,
  `foto` varchar(150) COLLATE latin1_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `talleres`
--

CREATE TABLE `talleres` (
  `id` int(11) NOT NULL,
  `nombre` varchar(120) COLLATE latin1_spanish_ci NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `capacidad` tinyint(4) NOT NULL,
  `descripcion` varchar(200) COLLATE latin1_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `talleres`
--

INSERT INTO `talleres` (`id`, `nombre`, `fecha`, `hora`, `capacidad`, `descripcion`) VALUES
(1, 'Taller de primeros auxilios veterinarios', '2019-06-22', '09:00:00', 20, 'Se enseñara que medidas tomar en caso le suceda algo a su mascota.'),
(2, 'Taller de primeros auxilios veterinarios', '2019-06-22', '16:00:00', 20, 'Se enseñara que medidas tomar en caso le suceda algo a su mascota.'),
(3, 'Taller de primeros auxilios veterinarios', '2019-06-23', '09:00:00', 20, 'Se enseñara que medidas tomar en caso le suceda algo a su mascota.'),
(4, 'Taller de primeros auxilios veterinarios', '2019-06-23', '16:00:00', 20, 'Se enseñara que medidas tomar en caso le suceda algo a su mascota.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `taller_usuario`
--

CREATE TABLE `taller_usuario` (
  `id` int(11) NOT NULL,
  `id_taller` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(150) COLLATE latin1_spanish_ci NOT NULL,
  `nombres` varchar(250) COLLATE latin1_spanish_ci NOT NULL,
  `apellidos` varchar(250) COLLATE latin1_spanish_ci NOT NULL,
  `email` varchar(200) COLLATE latin1_spanish_ci NOT NULL,
  `direccion` varchar(200) COLLATE latin1_spanish_ci NOT NULL,
  `fecha_nac` date NOT NULL,
  `contrasena` varchar(100) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `nombres`, `apellidos`, `email`, `direccion`, `fecha_nac`, `contrasena`) VALUES
(2, 'gianko', 'Gianfranco', 'Mello Loayza', 'gianfranco.mello@usil.pe', 'jr. en mi jato puro 69', '2012-09-25', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vacunas`
--

CREATE TABLE `vacunas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(120) COLLATE latin1_spanish_ci NOT NULL,
  `fecha` date NOT NULL,
  `capacidad` tinyint(4) NOT NULL,
  `descripcion` varchar(200) COLLATE latin1_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `vacunas`
--

INSERT INTO `vacunas` (`id`, `nombre`, `fecha`, `capacidad`, `descripcion`) VALUES
(1, 'Vacuna contra la rabia', '2019-06-29', 30, 'Vacuna que protege a su mascota contra la rabia. Acercarse a partir de las 9 a.m.'),
(2, 'Vacuna contra la rabia', '2019-06-30', 30, 'Vacuna que protege a su mascota contra la rabia. Acercarse a partir de las 9 a.m.'),
(3, 'Vacuna Polivalente', '2019-06-29', 30, 'Vacuna contra el moquillo canino, la hepatitis infecciosa canina, la leptospirosis, parvovirosis, tos de las perreras y el coronavirus canino. Acercarse a partir de las 9 a.m.'),
(4, 'Vacuna Polivalente', '2019-06-30', 30, 'Vacuna contra el moquillo canino, la hepatitis infecciosa canina, la leptospirosis, parvovirosis, tos de las perreras y el coronavirus canino. Acercarse a partir de las 9 a.m.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vacunas_usuario`
--

CREATE TABLE `vacunas_usuario` (
  `id` int(11) NOT NULL,
  `id_vacunas` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `mascotas`
--
ALTER TABLE `mascotas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_dueno` (`id_dueno`);

--
-- Indices de la tabla `talleres`
--
ALTER TABLE `talleres`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `taller_usuario`
--
ALTER TABLE `taller_usuario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `vacunas`
--
ALTER TABLE `vacunas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `vacunas_usuario`
--
ALTER TABLE `vacunas_usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `mascotas`
--
ALTER TABLE `mascotas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `talleres`
--
ALTER TABLE `talleres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `taller_usuario`
--
ALTER TABLE `taller_usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `vacunas`
--
ALTER TABLE `vacunas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `vacunas_usuario`
--
ALTER TABLE `vacunas_usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
