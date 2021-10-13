-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-10-2021 a las 21:37:04
-- Versión del servidor: 10.4.19-MariaDB
-- Versión de PHP: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_musica_tpe`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `generos`
--

CREATE TABLE `generos` (
  `id` int(11) NOT NULL,
  `genero` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `generos`
--

INSERT INTO `generos` (`id`, `genero`) VALUES
(1, 'cumbia'),
(2, 'trap'),
(3, 'rock'),
(4, 'reggae'),
(6, 'rap'),
(7, 'hip hop'),
(8, 'cachengue');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `musica`
--

CREATE TABLE `musica` (
  `id_musica` int(11) NOT NULL,
  `nombreCancion` varchar(200) NOT NULL,
  `artista` varchar(100) NOT NULL,
  `album` varchar(100) NOT NULL,
  `anio` date NOT NULL,
  `imagen` varchar(500) NOT NULL,
  `id_genero_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `musica`
--

INSERT INTO `musica` (`id_musica`, `nombreCancion`, `artista`, `album`, `anio`, `imagen`, `id_genero_fk`) VALUES
(10, 'Nunca quise', 'Intoxicados', 'OTRO DIA EN EL PLANETA TIERRA', '2008-02-13', '', 3),
(11, 'Fresco', 'WOS', 'Carabana', '2019-10-04', '', 6),
(12, 'Llenos de magia', 'La Vela Puerca', 'A contra luz', '2016-07-08', '', 3),
(13, 'Viejo Karma!', 'Las Pastillas Del Abuelo', '', '2017-11-12', '', 3),
(14, 'Demaciado Loco', 'Paulo Londra', 'Home Run', '2019-05-23', '', 2),
(15, 'Loco', 'Tiago PZK', 'Loco', '2021-09-16', '', 2),
(16, 'Hazmelo', 'Tiago PZK', 'Hazmelo', '2021-05-26', '', 2),
(17, 'Como si no importara', 'Emilia & Duki', 'Como si no importara', '2021-07-13', '', 2),
(18, 'ADEMAS DE MI REMIX', 'Rusherking, Tiago PZK, KHEA, LIT Killah, Duki, Maria Becerra', 'A demas de mi', '2021-03-04', '', 2),
(19, 'Nat Geo', 'Falke 912, Bhavi Ft. LIT Killah', 'Nat Geo', '2021-07-15', '', 2),
(20, 'No me conocen (REMIX)', 'BANDIDO, DUKI, REI, TIAGO PZK', 'No me conocen', '2021-06-16', '', 2),
(21, 'Prende la Cámara', 'FMK, Tiago PZK', 'Prende la Cámara', '2021-07-01', '', 2),
(22, 'Rápido Lento', 'Emilia, Tiago PZK', 'Rápido Lento', '2021-09-30', '', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `usuario` varchar(100) NOT NULL,
  `contraseña` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `usuario`, `contraseña`) VALUES
(2, 'admin', '$2a$12$E/XOxZiDcvenz3l5Ycu34.PwDJmxuY2RnR/r1111V3Z1f3D0bBJBC'),
(5, 'pato', '$2a$12$F6DBmCrk7MWWPpt3MVVYK.poJ2ZwkLwqbScwOxlydy0VGnz5jlxIK');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `generos`
--
ALTER TABLE `generos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `musica`
--
ALTER TABLE `musica`
  ADD PRIMARY KEY (`id_musica`),
  ADD KEY `id_genero` (`id_genero_fk`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `generos`
--
ALTER TABLE `generos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `musica`
--
ALTER TABLE `musica`
  MODIFY `id_musica` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `musica`
--
ALTER TABLE `musica`
  ADD CONSTRAINT `musica_ibfk_1` FOREIGN KEY (`id_genero_fk`) REFERENCES `generos` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
