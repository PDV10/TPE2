-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-10-2021 a las 04:21:20
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
(7, 'todos');

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
  `favorito` tinyint(1) DEFAULT NULL,
  `imagen` varchar(500) NOT NULL,
  `id_genero_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `musica`
--

INSERT INTO `musica` (`id_musica`, `nombreCancion`, `artista`, `album`, `anio`, `favorito`, `imagen`, `id_genero_fk`) VALUES
(10, 'Nunca quise', 'Intoxicados', 'OTRO DIA EN EL PLANETA TIERRA', '2008-02-13', 0, 'img/NuncaQuise.jpg', 3),
(11, 'Fresco', 'WOS', 'Carabana', '2019-10-04', 0, 'img/fresco.jpg', 6),
(12, 'Llenos de magia', 'La Vela Puerca', 'A contra luz', '2016-07-08', 1, 'img/llenosDeMagia.jpg', 3),
(13, 'Viejo Karma!', 'Las Pastillas Del Abuelo', 'Desafios', '2017-11-12', 1, 'img/ViejoKarma.jpg', 3),
(14, 'Demaciado Loco', 'Paulo Londra', 'Home Run', '2019-05-23', 1, 'img/DemaciadoLoco.jpg', 2),
(15, 'Loco', 'Tiago PZK', 'Loco', '2021-09-16', 1, 'img/Loco.jpg', 2),
(16, 'Hazmelo', 'Tiago PZK', 'Hazmelo', '2021-05-26', 1, 'img/Hazmelo.jpg', 2),
(17, 'Como si no importara', 'Emilia & Duki', 'Como si no importara', '2021-07-13', 0, 'img/ComoSiNoImportara.jpg', 2),
(18, 'ADEMAS DE MI REMIX', 'Rusherking, Tiago PZK, KHEA, LIT Killah, Duki, Maria Becerra', 'A demas de mi', '2021-03-04', 0, 'img/AdemasDeMiRemix.jpg', 2),
(19, 'Nat Geo', 'Falke 912, Bhavi Ft. LIT Killah', 'Nat Geo', '2021-07-15', 0, 'img/NatGeo.jpg', 2),
(20, 'No me conocen (REMIX)', 'BANDIDO, DUKI, REI, TIAGO PZK', 'No me conocen', '2021-06-16', 0, 'img/NoMeConocen (REMIX).jpg', 2),
(21, 'Prende la Cámara', 'FMK, Tiago PZK', 'Prende la Cámara', '2021-07-01', 0, 'img/PrendeLaCámara.jpg', 2),
(22, 'Rápido Lento', 'Emilia, Tiago PZK', 'Rápido Lento', '2021-09-30', 0, 'img/RápidoLento.jpg', 2),
(26, 'M1 A1', 'Gorillaz', 'M1 A1', '2015-02-12', 0, 'img/gorillaz.jpg', 3),
(27, 'Ruta 66', 'Pappo\'s Blues', 'Caso Cerrado', '1995-03-15', 0, 'img/papo.jpg', 3),
(28, 'Balada Del Diablo y La Muerte', 'La Renga', 'Despedazado por mil partes', '1996-07-21', 0, 'img/LaRenga.jpg', 3),
(29, 'Toxicity ', 'System Of A Down', 'System Of A Down', '2001-09-04', 0, 'img/SystemOfaDown.jpg', 3),
(30, 'Crimen', 'Gustavo Cerati', 'Ahí Vamos', '2006-10-05', 0, 'img/cerati.jpg', 3),
(31, 'JIJIJI', 'Los Redondos', 'Oktubre', '1986-10-18', 1, 'img/indioSolari.jpg', 3),
(32, 'GALANG', 'Alika', 'EDUCATE YOURSELF', '2008-04-19', 0, 'img/alika.jpg', 4),
(33, 'Te robaste mi corazon', 'Fidel Nadal', 'Forever together', '2010-10-10', 0, 'img/fidelNadal.jpg', 4),
(34, 'International love ', 'Fidel Nadal', 'INTERNATIONAL LOVE\"', '2008-10-16', 1, 'img/fidelNadal.jpg', 4),
(35, 'Somewhere over the Rainbow', 'Israel \"IZ\" Kamakawiwoʻole', 'Over the Rainbow', '2010-04-12', 1, 'img/OverTheRainbow.jpg', 4),
(36, 'Is This Love', 'Bob Marley & The Wailers', 'Kaya', '1978-07-07', 0, 'img/BobMarley.jpg', 4),
(37, 'Hoja en Blanco', 'Dread Mar I', '10 Años ', '2016-11-04', 0, 'img/DreadMarI.jpg', 4),
(38, 'Tiempo', 'Rabeat & Underdann', 'Tiempo', '2016-10-13', 0, 'img/Rabeat.jpg', 4),
(39, 'Un Nuevo Día', 'Zona Ganjah', 'Poder', '2010-06-10', 0, 'img/ZonaGanjah.jpg', 4),
(40, 'Lose Yourself', 'Eminem', 'Lose Yourself', '2002-06-22', 0, 'img/eminem.jpg', 6),
(41, 'Rap God', 'Eminem', 'Sencillo', '2013-10-13', 1, 'img/eminem.jpg', 6),
(42, 'In Da Club', '50 Cent', 'In Da Club', '2009-06-09', 0, 'img/50Cent.jpg', 6),
(43, 'Candy Shop', '50 Cent', 'Candy Shop', '2009-06-16', 0, 'img/50Cent.jpg', 6),
(44, 'goosebumps', 'Travis Scott', 'Birds in the Trap Sing McKnight', '2017-04-14', 1, 'img/TravisScott.jpg', 6),
(45, 'Black And Yellow', 'Wiz Khalifa', 'Black and Yellow (feat. Juicy J, Snoop Dogg & T-Pain)', '2011-01-07', 0, 'img/wizKhalifa.jpg', 6),
(46, 'En Boca De Tantos', 'Porta', 'En Boca De Tantos', '2009-06-26', 0, 'img/porta.jpg', 6),
(50, 'La Marca de La Gorra', 'Mala Fama', 'La Tonga', '2017-12-19', 1, 'img/malaFama.jpg', 1),
(51, 'La Mas Linda Del Salon', 'Los Nota Lokos', 'Los Nota Lokos', '2012-09-30', NULL, 'img/losNotaLokos.jpg', 1),
(52, 'Re Loco ', 'De La Calle', 'Mas Negro Que La Noche', '2016-07-26', NULL, 'img/deLaCalle.jpg', 1),
(53, 'De Regreso al Penal ', 'Pala Ancha', 'Cumbia Callejera', '2001-07-19', NULL, 'img/PalaAncha.jpg', 1),
(54, 'solo quiero amarte ', 'La Champion Liga', ' Confía en Mí', '2010-07-24', NULL, 'img/LaChampionLiga.jpg', 1),
(55, 'Mujer Yo te amo', 'Mc Caco', 'Mc Caco', '2010-06-25', NULL, 'img/mcCaco.jpg', 1),
(56, 'Hoy Volví a Verte ', 'El Retutu', 'El Retutu', '2011-01-28', NULL, 'img/ElRetutu.jpg', 1),
(57, 'Una Wacha Piola', 'De La Calle', 'De La Calle', '2016-07-26', NULL, 'img/deLaCalle.jpg', 1),
(58, 'Llama', 'Marka Akme', 'Marka Akme', '2016-05-16', NULL, 'img/markaAkme.jpg', 1),
(59, 'Wup Wup', 'RPM', 'Revolucion Por Minuto RPM  ', '2014-08-05', NULL, 'img/RPM.jpg', 1);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `musica`
--
ALTER TABLE `musica`
  MODIFY `id_musica` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

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
