-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-04-2022 a las 20:50:11
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
(9, 1304055956, '', '2022-04-13 10:59:56', 'Bienvenida', 'Hola, Bienvenido a Prueba, Toda es listo para empezar esperamos contar con tigo', 'NO'),
(14, 1, 'src/multimedia_actividades/1304111416Documento1.docx', '2022-04-13 16:14:16', 'Prueba 2', 'Esta es una actividad de prueba, creada solamente con objetivos practivos', 'NO'),
(15, 1, 'src/multimedia_actividades/1704034348icons8-añadir-grupo-de-usuarios-hombre-hombre-50.png', '2022-04-16 20:43:48', 'Prueba 2', 'Esta es una actividad de prueba, creada solamente con objetivos practivos', 'NO'),
(1504055516, 1304055956, 'src/multimedia_actividades/1504055516f0bdc5dd-e5ff-431f-909a-87a6d2a466ed-original.jpeg', '2022-04-14 22:55:16', 'Prueba 5', 'Esta es una actividad de prueba, creada solamente con objetivos practivos', 'NO'),
(1504055516, 1304055956, 'src/multimedia_actividades/1504055516icons8-añadir-grupo-de-usuarios-hombre-hombre-50.png', '2022-04-14 22:55:16', 'Prueba 5', 'Esta es una actividad de prueba, creada solamente con objetivos practivos', 'NO'),
(1504055516, 1304055956, 'src/multimedia_actividades/1604043955icon_txt.png', '2022-04-15 21:39:55', 'Prueba 5', 'Esta es una actividad de prueba, creada solamente con objetivos practivos', 'NO'),
(1504055516, 1304055956, 'src/multimedia_actividades/1604044253Mapa conceptual.jpg', '2022-04-15 21:42:53', 'Prueba 5', 'Esta es una actividad de prueba, creada solamente con objetivos practivos', 'NO'),
(1504055516, 1304055956, 'src/multimedia_actividades/180404183610045_69468.txt', '2022-04-17 21:18:36', 'Prueba 5', 'Esta es una actividad de prueba, creada solamente con objetivos practivos', 'NO'),
(1504055516, 1304055956, 'src/multimedia_actividades/1804042324articles-163147_Archivo_doc1.doc', '2022-04-17 21:23:24', 'Prueba 5', 'Esta es una actividad de prueba, creada solamente con objetivos practivos', 'NO'),
(1504055516, 1304055956, 'src/multimedia_actividades/1804042324COD DANE EE.xlsx', '2022-04-17 21:23:24', 'Prueba 5', 'Esta es una actividad de prueba, creada solamente con objetivos practivos', 'NO'),
(1504055516, 1304055956, 'src/multimedia_actividades/1804042458Circular 0008 2022.pdf', '2022-04-17 21:24:58', 'Prueba 5', 'Esta es una actividad de prueba, creada solamente con objetivos practivos', 'NO'),
(1504055516, 1304055956, 'src/multimedia_actividades/1804042458NEF-Pre-Intermediate-sb-www.frenglish.ru (3).pdf', '2022-04-17 21:24:58', 'Prueba 5', 'Esta es una actividad de prueba, creada solamente con objetivos practivos', 'NO'),
(1504071311, 1504071311, '', '2022-04-15 12:13:11', 'Bienvenida', 'Hola, Bienvenido a Prueba 11, Toda es listo para empezar esperamos contar con tigo', 'NO'),
(1504114203, 1504071311, 'src/multimedia_actividades/1504114203Basecolegios (1).xls', '2022-04-15 16:42:03', 'Refuerzo', 'Refuerzos musculares ', 'NO'),
(1504114203, 1504071311, 'src/multimedia_actividades/1504114203COD DANE EE (7).xlsx', '2022-04-15 16:42:03', 'Refuerzo', 'Refuerzos musculares ', 'NO'),
(1504114203, 1504071311, 'src/multimedia_actividades/1504114203cronograma-de-talleres-saber-pro-2018.docx', '2022-04-15 16:42:03', 'Refuerzo', 'Refuerzos musculares ', 'NO'),
(1504114203, 1504071311, 'src/multimedia_actividades/1504114203Matricula de Honor.pdf', '2022-04-15 16:42:03', 'Refuerzo', 'Refuerzos musculares ', 'NO'),
(1504114203, 1504071311, 'src/multimedia_actividades/1504114203WhatsApp Audio 2022-03-28 at 9.03.58 PM.mp3', '2022-04-15 16:42:03', 'Refuerzo', 'Refuerzos musculares ', 'NO'),
(1504114709, 1504071311, 'src/multimedia_actividades/15041147092022-04-02 19-34-02.mp4', '2022-04-18 18:38:03', 'Refuerzo2', 'Esta es una actividad de prueba, creada solamente con objetivos practivos', 'SI'),
(1504114709, 1504071311, 'src/multimedia_actividades/18041127312022-01-17 21-47-12.mkv', '2022-04-18 16:27:31', 'Refuerzo2', 'Esta es una actividad de prueba, creada solamente con objetivos practivos', 'NO'),
(1504114709, 1504071311, 'src/multimedia_actividades/18041127312022-02-17 20-33-51.mp4', '2022-04-18 16:27:31', 'Refuerzo2', 'Esta es una actividad de prueba, creada solamente con objetivos practivos', 'NO'),
(1704111800, 1304055956, 'src/multimedia_actividades/1704111800FUENTES-CONFIABLES-DE-INFORMACIÓN-EN-INTERNET (1).pdf', '2022-04-17 16:18:00', 'Prueba 6', 'Esta es una actividad de prueba, creada solamente con objetivos practivos', 'NO'),
(1704111800, 1304055956, 'src/multimedia_actividades/1704111800IMG_20220329_174003.jpg', '2022-04-17 16:18:00', 'Prueba 6', 'Esta es una actividad de prueba, creada solamente con objetivos practivos', 'NO'),
(1704111800, 1304055956, 'src/multimedia_actividades/1704111800NEF-Pre-Intermediate-sb-www.frenglish.ru (5).pdf', '2022-04-17 16:18:00', 'Prueba 6', 'Esta es una actividad de prueba, creada solamente con objetivos practivos', 'NO'),
(1704111945, 1, 'src/multimedia_actividades/170411194510045_69468.bib', '2022-04-17 16:19:45', 'Prueba 3', 'Esta es una actividad de prueba, creada solamente con objetivos practivos', 'NO'),
(1704111945, 1, 'src/multimedia_actividades/170411194510045_69468.txt', '2022-04-17 16:19:45', 'Prueba 3', 'Esta es una actividad de prueba, creada solamente con objetivos practivos', 'NO'),
(1704111945, 1, 'src/multimedia_actividades/1704111945script-modelado-dw-saberpro-2022 (1).sql', '2022-04-17 16:19:45', 'Prueba 3', 'Esta es una actividad de prueba, creada solamente con objetivos practivos', 'NO'),
(1804030049, 1804030049, '', '2022-04-17 20:00:49', 'Bienvenida', 'Hola, Bienvenido a Terapias Cutaneas, Toda es listo para empezar esperamos contar con tigo', 'NO'),
(1804030428, 1804030049, 'src/multimedia_actividades/1804030428Documento sin título (1).docx', '2022-04-17 20:04:28', 'Lavar la cara', 'Lavar cara con agua y jabón dermatológico, aplicar jabón y lavar con agua tibia, repetir este procedimiento 2  veces ', 'NO'),
(1804030428, 1804030049, 'src/multimedia_actividades/1804030428RNA.pdf', '2022-04-17 20:04:28', 'Lavar la cara', 'Lavar cara con agua y jabón dermatológico, aplicar jabón y lavar con agua tibia, repetir este procedimiento 2  veces ', 'NO'),
(1804030639, 1804030049, 'src/multimedia_actividades/1804030639icon_exel.png', '2022-04-17 20:06:39', 'Aplicar Bloqueado Solar', 'Aplicar Bloquador Solar 80 fps, todos los dias sobre la cara', 'NO'),
(1804030639, 1804030049, 'src/multimedia_actividades/1804030639icon_word.png', '2022-04-17 20:06:39', 'Aplicar Bloqueado Solar', 'Aplicar Bloquador Solar 80 fps, todos los dias sobre la cara', 'NO'),
(1804031212, 1804030049, 'src/multimedia_actividades/1804031212icon_exel.png', '2022-04-17 20:12:12', 'Actividad de prueba', 'Esta es una actividad de prueba, creada solamente con objetivos practivos', 'NO'),
(1804031212, 1804030049, 'src/multimedia_actividades/1804031714WhatsApp Image 2022-03-30 at 6.37.13 PM.jpeg', '2022-04-17 20:17:14', 'Actividad de prueba', 'Esta es una actividad de prueba, creada solamente con objetivos practivos', 'NO'),
(1804032430, 1804032430, '', '2022-04-17 20:24:30', 'Bienvenida', 'Hola, Bienvenido a , Toda es listo para empezar esperamos contar con tigo', 'NO'),
(1804032442, 1804032442, '', '2022-04-17 20:24:42', 'Bienvenida', 'Hola, Bienvenido a , Toda es listo para empezar esperamos contar con tigo', 'NO'),
(1804032454, 1804032454, '', '2022-04-17 20:24:54', 'Bienvenida', 'Hola, Bienvenido a , Toda es listo para empezar esperamos contar con tigo', 'NO'),
(1804032529, 1804032529, '', '2022-04-17 20:25:29', 'Bienvenida', 'Hola, Bienvenido a , Toda es listo para empezar esperamos contar con tigo', 'NO'),
(1804032602, 1804032602, '', '2022-04-17 20:26:02', 'Bienvenida', 'Hola, Bienvenido a , Toda es listo para empezar esperamos contar con tigo', 'NO'),
(1804032815, 1804032815, '', '2022-04-17 20:28:15', 'Bienvenida', 'Hola, Bienvenido a , Toda es listo para empezar esperamos contar con tigo', 'NO'),
(1804032827, 1804032827, '', '2022-04-17 20:28:27', 'Bienvenida', 'Hola, Bienvenido a , Toda es listo para empezar esperamos contar con tigo', 'NO'),
(1804032836, 1804032836, '', '2022-04-17 20:28:36', 'Bienvenida', 'Hola, Bienvenido a , Toda es listo para empezar esperamos contar con tigo', 'NO'),
(1804033025, 1804033025, '', '2022-04-17 20:30:25', 'Bienvenida', 'Hola, Bienvenido a , Toda es listo para empezar esperamos contar con tigo', 'NO'),
(1804033034, 1804033034, '', '2022-04-17 20:30:34', 'Bienvenida', 'Hola, Bienvenido a , Toda es listo para empezar esperamos contar con tigo', 'NO'),
(1804035947, 1804035947, '', '2022-04-17 20:59:47', 'Bienvenida', 'Hola, Bienvenido a Prueba 12, Toda es listo para empezar esperamos contar con tigo', 'NO'),
(1804040052, 1804040052, '', '2022-04-17 21:00:52', 'Bienvenida', 'Hola, Bienvenido a Prueba 12, Toda es listo para empezar esperamos contar con tigo', 'NO'),
(1804040158, 1804040158, '', '2022-04-17 21:01:58', 'Bienvenida', 'Hola, Bienvenido a Prueba 12, Toda es listo para empezar esperamos contar con tigo', 'NO'),
(1804040345, 1804040345, '', '2022-04-17 21:03:45', 'Bienvenida', 'Hola, Bienvenido a Prueba 12, Toda es listo para empezar esperamos contar con tigo', 'NO'),
(1804040617, 1804040617, '', '2022-04-17 21:06:17', 'Bienvenida', 'Hola, Bienvenido a Prueba 12, Toda es listo para empezar esperamos contar con tigo', 'NO'),
(1804040714, 1804040714, '', '2022-04-17 21:07:14', 'Bienvenida', 'Hola, Bienvenido a Prueba, Toda es listo para empezar esperamos contar con tigo', 'NO'),
(1804043208, 1304055956, 'src/multimedia_actividades/1804043208icons8-añadir-grupo-de-usuarios-hombre-hombre-50.png', '2022-04-17 21:32:08', 'Prueba 10', 'Prueba 10 se creo con fines practicos', 'NO'),
(1904031459, 1904031459, '', '2022-04-19 08:14:59', 'Bienvenida', 'Hola, Bienvenido a Terapias Capilares, Toda es listo para empezar esperamos contar con tigo', 'NO'),
(1904031534, 1904031534, '', '2022-04-19 08:15:34', 'Bienvenida', 'Hola, Bienvenido a Terapias Capilares, Toda es listo para empezar esperamos contar con tigo', 'NO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `formulas`
--

CREATE TABLE `formulas` (
  `numreg` int(10) NOT NULL,
  `cedusu` varchar(10) NOT NULL,
  `medicamento` varchar(200) NOT NULL,
  `dosis` varchar(100) NOT NULL,
  `fecexp` date NOT NULL,
  `hora` time NOT NULL,
  `estado` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `formulas`
--

INSERT INTO `formulas` (`numreg`, `cedusu`, `medicamento`, `dosis`, `fecexp`, `hora`, `estado`) VALUES
(1, '100', 'Ibuprofeno', '400mg', '2023-12-12', '10:00:00', 'Pendiente'),
(2, '100', 'Aspirina', '100mg', '2023-12-12', '14:00:00', 'Pendiente'),
(3, '100', 'Acetaminofen', '400mg', '2023-12-12', '14:00:00', 'Pendiente');

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
('1000', 'Ingrid Betancourth', '1992-06-03', 'Cardiologia', 'F', '324325432', '202cb962ac59075b964b07152d234b70'),
('2000', 'Santiago Duque', '1990-10-27', 'Ortopedista', 'M', '3014565236', '202cb962ac59075b964b07152d234b70'),
('3000', 'Felipe Castro Pombo', '2000-11-23', 'Ginecologo', 'M', '3149890320', '202cb962ac59075b964b07152d234b70');

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
(1304055956, 'Prueba', 'Esta es una terapia de prueba, esta terapia solo existe con fines practivos', '100', '1000', 'ACTIVA'),
(1504071311, 'Prueba 11', 'Esta es una terapia de prueba, esta terapia solo existe con fines practivos', '100', '1000', 'ACTIVA'),
(1, 'Terapias Musculares', 'Terapias musculares para las extremidades inferiores', '200', '2000', 'ACTIVA'),
(1304055956, 'Prueba', 'Esta es una terapia de prueba, esta terapia solo existe con fines practivos', '200', '1000', 'ACTIVA'),
(1504071311, 'Prueba 11', 'Esta es una terapia de prueba, esta terapia solo existe con fines practivos', '200', '1000', 'ACTIVA'),
(1804030049, 'Terapias Cutaneas', 'Terapias para el cuidado y el blanquimiento de la piel de adultos mayores', '200', '1000', 'ACTIVA'),
(1904031534, 'Terapias Capilares', 'Terapias para mejorar el aspecto del pelo de los adultos mayores', '200', '3000', 'ACTIVA'),
(1, 'Terapias Musculares', 'Terapias musculares para las extremidades inferiores', '300', '2000', 'ACTIVA'),
(1304055956, 'Prueba', 'Esta es una terapia de prueba, esta terapia solo existe con fines practivos', '300', '1000', 'ACTIVA'),
(1504071311, 'Prueba 11', 'Esta es una terapia de prueba, esta terapia solo existe con fines practivos', '300', '1000', 'ACTIVA'),
(1804030049, 'Terapias Cutaneas', 'Terapias para el cuidado y el blanquimiento de la piel de adultos mayores', '300', '1000', 'ACTIVA'),
(1904031534, 'Terapias Capilares', 'Terapias para mejorar el aspecto del pelo de los adultos mayores', '300', '3000', 'ACTIVA'),
(1504071311, 'Prueba 11', 'Esta es una terapia de prueba, esta terapia solo existe con fines practivos', '400', '1000', 'ACTIVA'),
(1904031534, 'Terapias Capilares', 'Terapias para mejorar el aspecto del pelo de los adultos mayores', '400', '3000', 'ACTIVA');

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
('100', 'Justo Eliecer Estrada', 'M', '1935-03-13', 'Hipertensión Arterial Baja', '31256', '202cb962ac59075b964b07152d234b70'),
('200', 'Marta Caicedo', 'F', '1942-04-29', 'Diabetes Mellitus', '721202', '202cb962ac59075b964b07152d234b70'),
('300', 'Jorge Mora', 'M', '1935-04-29', 'Hipertensión Arterial', '7215555', '202cb962ac59075b964b07152d234b70'),
('400', 'Maria de los Angeles Paz', 'F', '1943-12-28', 'Hipertiroidismo', '7233242', '202cb962ac59075b964b07152d234b70');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actividades`
--
ALTER TABLE `actividades`
  ADD PRIMARY KEY (`id_actividad`,`multimedia`);

--
-- Indices de la tabla `formulas`
--
ALTER TABLE `formulas`
  ADD PRIMARY KEY (`numreg`),
  ADD KEY `rel_usuarios_formulas` (`cedusu`);

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
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `formulas`
--
ALTER TABLE `formulas`
  MODIFY `numreg` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `formulas`
--
ALTER TABLE `formulas`
  ADD CONSTRAINT `rel_usuarios_formulas` FOREIGN KEY (`cedusu`) REFERENCES `usuarios` (`ced_usu`) ON UPDATE CASCADE;

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
