-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-06-2019 a las 23:33:22
-- Versión del servidor: 10.1.25-MariaDB
-- Versión de PHP: 7.1.7

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
  `foto` varchar(200) COLLATE latin1_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `mascotas`
--

INSERT INTO `mascotas` (`id`, `nombre`, `id_dueno`, `raza`, `color`, `tamano`, `foto`) VALUES
(1, 'Rabioso', 2, 'Pitbull', 'Marrón', 'mediano', '../uploads/fotos/descarga.jpg'),
(2, 'Maní', NULL, 'Pekinés', 'Marrón claro', 'pequeño', NULL),
(3, 'Comelon', 2, 'boxer', 'Atigrado', 'Mediano', NULL),
(17, 'Pancracio', 2, 'Bulldog', 'marrón claro', 'mediano', '../uploads/fotos/2019-06-17_1560756885_foto_perrito.png'),
(18, 'Mata Venecos', 3, 'Pastor Alemán', 'Negro', 'Grande', '../uploads/fotos/2019-06-18_1560889361_pastor.jpg'),
(19, 'Presidiario', NULL, 'Dalmata', 'Mnonocromático', 'Pequeño', '../uploads/fotos/2019-06-18_1560889470_presidiario.jpg'),
(20, 'Danial', NULL, 'Gran Danés', 'Negro', 'Grande', '../uploads/fotos/2019-06-18_1560889583_daniel.jpg'),
(21, 'Apruebeme Profe', 2, 'Husky', 'Balnco y Negro', 'pequeño', '../uploads/fotos/2019-06-18_1560890552_apruebeme.jpg'),
(22, 'Danial', NULL, 'Pastor Alemán', 'Balnco y Negro', 'Pequeño', '../uploads/fotos/2019-06-18_1560893331_pastor.jpg');

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
(4, 'Taller de primeros auxilios veterinarios', '2019-06-23', '16:00:00', 20, 'Se enseñara que medidas tomar en caso le suceda algo a su mascota.'),
(5, 'Taller de prueba', '2019-06-26', '10:00:00', 2, 'Para probar boton suscribir cuando ya se lleno el taller');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `taller_usuario`
--

CREATE TABLE `taller_usuario` (
  `id` int(11) NOT NULL,
  `id_taller` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `taller_usuario`
--

INSERT INTO `taller_usuario` (`id`, `id_taller`, `id_usuario`) VALUES
(8, 5, 3),
(9, 5, 4),
(15, 1, 2);

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
(2, 'gianko', 'Gianfranco', 'Mello Loayza', 'gianfranco.mello@usil.pe', 'jr. en mi jato puro 69', '2012-09-24', '202cb962ac59075b964b07152d234b70'),
(3, 'Gaaa', 'Gaacito', 'Gaaaaa', 'gaaa@gmail.com', 'jr los gaaa 69', '2011-03-25', '202cb962ac59075b964b07152d234b70'),
(4, 'chupetin', 'chupetin', 'trujillo', 'chups@gmail.com', 'jr trujillo 123', '2002-03-04', '202cb962ac59075b964b07152d234b70');

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
(4, 'Vacuna Polivalente', '2019-06-30', 30, 'Vacuna contra el moquillo canino, la hepatitis infecciosa canina, la leptospirosis, parvovirosis, tos de las perreras y el coronavirus canino. Acercarse a partir de las 9 a.m.'),
(5, 'Vacunación de prueba', '2019-06-29', 2, 'Campaña de prueba para probar botón inscribirse cuando esté lleno');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vacunas_mascota`
--

CREATE TABLE `vacunas_mascota` (
  `id` int(11) NOT NULL,
  `id_vacunas` int(11) NOT NULL,
  `id_mascota` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `vacunas_mascota`
--

INSERT INTO `vacunas_mascota` (`id`, `id_vacunas`, `id_mascota`, `id_usuario`) VALUES
(12, 1, 18, 3),
(20, 1, 1, 2),
(21, 1, 17, 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `mascotas`
--
ALTER TABLE `mascotas`
  ADD PRIMARY KEY (`id`);

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
-- Indices de la tabla `vacunas_mascota`
--
ALTER TABLE `vacunas_mascota`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `mascotas`
--
ALTER TABLE `mascotas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT de la tabla `talleres`
--
ALTER TABLE `talleres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `taller_usuario`
--
ALTER TABLE `taller_usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `vacunas`
--
ALTER TABLE `vacunas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `vacunas_mascota`
--
ALTER TABLE `vacunas_mascota`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
