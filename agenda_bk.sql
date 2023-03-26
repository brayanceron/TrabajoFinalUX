-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-06-2022 a las 18:44:11
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `agenda`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividades`
--

CREATE TABLE `actividades` (
  `id_actividad` int(11) NOT NULL,
  `id_terapia` int(11) NOT NULL,
  `multimedia` varchar(500) NOT NULL,
  `fecha_actividad` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `nombre_actividad` varchar(200) NOT NULL,
  `descripcion_actividad` text NOT NULL,
  `actividad_vista` varchar(2) NOT NULL DEFAULT 'NO'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `actividades`
--

INSERT INTO `actividades` (`id_actividad`, `id_terapia`, `multimedia`, `fecha_actividad`, `nombre_actividad`, `descripcion_actividad`, `actividad_vista`) VALUES
(2004031515, 2004031515, '', '2022-04-20 08:15:15', 'Bienvenida', 'Hola, Bienvenido a Prueba, Toda es listo para empezar esperamos contar con tigo', 'NO'),
(2004054141, 2004054141, '', '2022-04-20 10:41:41', 'Bienvenida', 'Hola, Bienvenido a Terapia de memoria, Toda es listo para empezar esperamos contar con tigo', 'NO'),
(2004054614, 2004054141, 'src/multimedia_actividades/2004054614Documento sin título (1).pdf', '2022-04-20 10:46:14', 'Juego Torres de Hanoi', 'Juego Torres de Hanoi para agilidad menta', 'NO'),
(2004054614, 2004054141, 'src/multimedia_actividades/2004054614tarifas.jpg', '2022-04-20 10:46:14', 'Juego Torres de Hanoi', 'Juego Torres de Hanoi para agilidad menta', 'NO'),
(2004085807, 2004085807, '', '2022-04-20 01:58:07', 'Bienvenida', 'Hola, Bienvenido a Terapias Musculares, Toda es listo para empezar esperamos contar con tigo', 'NO'),
(2004090534, 2004085807, 'src/multimedia_actividades/2004090534terapia_tobillo.mp4', '2022-04-20 02:05:34', 'Calentamiento', 'Calentamiento de los músculos de las extremidades', 'NO'),
(2004090534, 2004085807, 'src/multimedia_actividades/2004090903fuerza_muñecaymano.mp4', '2022-04-20 02:09:03', 'Calentamiento', 'Calentamiento de los músculos de las extremidades', 'NO'),
(2004091818, 2004091818, '', '2022-04-20 02:18:18', 'Bienvenida', 'Hola, Bienvenido a Terapias Respiratorias, Toda es listo para empezar esperamos contar con tigo', 'NO'),
(2004091944, 2004091818, 'src/multimedia_actividades/2004091944rutina_miembrosinferiores.mp4', '2022-04-20 02:19:44', 'Inhalacion', 'Ejercicios de inhalación profunda', 'NO'),
(2004092104, 2004091818, 'src/multimedia_actividades/2004092104terapia_rodillas.mp4', '2022-04-20 02:21:04', 'exhalación', 'Ejercicios de exhalación aeróbica', 'NO'),
(2004093613, 2004093613, '', '2022-04-20 02:36:13', 'Bienvenida', 'Hola, Bienvenido a Terapia Cognitiva, Toda es listo para empezar esperamos contar con tigo', 'NO'),
(2004093800, 2004093613, 'src/multimedia_actividades/2004093800fuerza_muñecaymano.mp4', '2022-04-20 02:38:00', 'Juegos de memoria ', 'Ejercicios con juegos de memoria', 'NO'),
(2004093800, 2004093613, 'src/multimedia_actividades/2004093821rutina_miembrosinferiores.mp4', '2022-04-20 02:38:21', 'Juegos de memoria ', 'Ejercicios con juegos de memoria', 'NO'),
(2004093800, 2004093613, 'src/multimedia_actividades/2004093835terapia_rodillas.mp4', '2022-04-20 02:38:35', 'Juegos de memoria ', 'Ejercicios con juegos de memoria', 'NO'),
(2004093800, 2004093613, 'src/multimedia_actividades/2004093854terapia_tobillo.mp4', '2022-04-20 03:00:22', 'Juegos de memoria ', 'Ejercicios con juegos de memoria', 'SI');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `terapeutas`
--

CREATE TABLE `terapeutas` (
  `ced_terapeuta` varchar(10) NOT NULL,
  `nom_terapeuta` varchar(100) NOT NULL,
  `fech_nacimiento_terapeuta` date NOT NULL,
  `especializacion` varchar(100) NOT NULL,
  `genero` varchar(1) NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `contrasena` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `terapeutas`
--

INSERT INTO `terapeutas` (`ced_terapeuta`, `nom_terapeuta`, `fech_nacimiento_terapeuta`, `especializacion`, `genero`, `telefono`, `contrasena`) VALUES
('1000', 'Flavio Torres', '1987-09-16', 'Terapia Mental', 'F', '31290320', '202cb962ac59075b964b07152d234b70'),
('2000', 'Alexis Garcia', '1982-07-01', '', 'M', '32323', '202cb962ac59075b964b07152d234b70'),
('3000', 'Fernanda Calvache', '1990-08-02', '', 'F', '302986', '202cb962ac59075b964b07152d234b70'),
('4000', 'Sandra Revelo', '1987-05-06', '', 'F', '3184324', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `terapias`
--

CREATE TABLE `terapias` (
  `id_terapia` int(11) NOT NULL,
  `nombre_terapia` varchar(200) NOT NULL,
  `descripcion_terapia` varchar(1000) NOT NULL,
  `ced_usu` varchar(10) NOT NULL,
  `ced_terapeuta` varchar(10) NOT NULL,
  `estado_terapia` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `terapias`
--

INSERT INTO `terapias` (`id_terapia`, `nombre_terapia`, `descripcion_terapia`, `ced_usu`, `ced_terapeuta`, `estado_terapia`) VALUES
(2004054141, 'Terapia de memoria', 'Terapia para personas con alzhaimer', '100', '1000', 'ACTIVA'),
(2004085807, 'Terapias Musculares', 'Terapias Musculares, para las munecas de las manos', '100', '1000', 'ACTIVA'),
(2004093613, 'Terapia Cognitiva', 'Ejercicios de refuerzo para personas con alzheimer', '100', '3000', 'ACTIVA'),
(2004054141, 'Terapia de memoria', 'Terapia para personas con alzhaimer', '200', '1000', 'ACTIVA'),
(2004085807, 'Terapias Musculares', 'Terapias Musculares, para las munecas de las manos', '200', '1000', 'ACTIVA'),
(2004091818, 'Terapias Respiratorias', 'Ejercicios de respiración para manejo del estrés', '200', '2000', 'ACTIVA'),
(2004093613, 'Terapia Cognitiva', 'Ejercicios de refuerzo para personas con alzheimer', '200', '3000', 'ACTIVA'),
(2004054141, 'Terapia de memoria', 'Terapia para personas con alzhaimer', '300', '1000', 'ACTIVA'),
(2004085807, 'Terapias Musculares', 'Terapias Musculares, para las munecas de las manos', '300', '1000', 'ACTIVA'),
(2004091818, 'Terapias Respiratorias', 'Ejercicios de respiración para manejo del estrés', '300', '2000', 'ACTIVA'),
(2004093613, 'Terapia Cognitiva', 'Ejercicios de refuerzo para personas con alzheimer', '300', '3000', 'ACTIVA'),
(2004085807, 'Terapias Musculares', 'Terapias Musculares, para las munecas de las manos', '400', '1000', 'ACTIVA'),
(2004091818, 'Terapias Respiratorias', 'Ejercicios de respiración para manejo del estrés', '400', '2000', 'ACTIVA'),
(2004093613, 'Terapia Cognitiva', 'Ejercicios de refuerzo para personas con alzheimer', '400', '3000', 'ACTIVA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `ced_usu` varchar(10) NOT NULL,
  `nom_usu` varchar(100) NOT NULL,
  `genero_usu` varchar(1) NOT NULL,
  `fech_nacimiento` date NOT NULL,
  `epicrisis` text NOT NULL,
  `tel_usu` varchar(10) NOT NULL,
  `contrasena` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`ced_usu`, `nom_usu`, `genero_usu`, `fech_nacimiento`, `epicrisis`, `tel_usu`, `contrasena`) VALUES
('100', 'Angel Ceron', 'M', '1940-11-24', '', '300012323', '202cb962ac59075b964b07152d234b70'),
('200', 'Maria Polonia Rodriguez', 'F', '1955-05-18', '', '31687454', '202cb962ac59075b964b07152d234b70'),
('300', 'Antonio Portilla', 'M', '1965-01-06', '', '30043134', '202cb962ac59075b964b07152d234b70'),
('400', 'Maria Emerita Rosero', 'F', '1952-10-09', '', '3014312', '202cb962ac59075b964b07152d234b70');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actividades`
--
ALTER TABLE `actividades`
  ADD PRIMARY KEY (`id_actividad`,`multimedia`);

--
-- Indices de la tabla `terapeutas`
--
ALTER TABLE `terapeutas`
  ADD PRIMARY KEY (`ced_terapeuta`);

--
-- Indices de la tabla `terapias`
--
ALTER TABLE `terapias`
  ADD PRIMARY KEY (`ced_usu`,`id_terapia`),
  ADD KEY `fk_2` (`ced_terapeuta`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`ced_usu`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `terapias`
--
ALTER TABLE `terapias`
  ADD CONSTRAINT `fk_1` FOREIGN KEY (`ced_usu`) REFERENCES `usuarios` (`ced_usu`),
  ADD CONSTRAINT `fk_2` FOREIGN KEY (`ced_terapeuta`) REFERENCES `terapeutas` (`ced_terapeuta`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
