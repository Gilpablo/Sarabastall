-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 07-02-2023 a las 09:35:24
-- Versión del servidor: 8.0.30-0ubuntu0.22.04.1
-- Versión de PHP: 8.1.11

SET SQL_MODE = \"NO_AUTO_VALUE_ON_ZERO\";
START TRANSACTION;
SET time_zone = \"+00:00\";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `infoargo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Abonar`
--

CREATE TABLE `Abonar` (
  `idAbonar` int NOT NULL,
  `Fecha_Abonado` datetime NOT NULL,
  `Cantidad` int NOT NULL,
  `Prestamo_idPrestamo` int NOT NULL,
  `idMovimiento` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `Abonar`
--

INSERT INTO `Abonar` (`idAbonar`, `Fecha_Abonado`, `Cantidad`, `Prestamo_idPrestamo`, `idMovimiento`) VALUES
(4, \'2023-02-03 11:09:23\', 200, 4, 7),
(5, \'2023-02-06 11:13:50\', 190, 4, 11),
(6, \'2023-02-06 11:16:40\', 10, 4, 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Alumno`
--

CREATE TABLE `Alumno` (
  `Tutor_Legal` varchar(45) DEFAULT NULL,
  `Imagen` varchar(45) NOT NULL,
  `Curso_Actual` varchar(45) NOT NULL,
  `idPersona` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `Alumno`
--

INSERT INTO `Alumno` (`Tutor_Legal`, `Imagen`, `Curso_Actual`, `idPersona`) VALUES
(\'rew\', \'rerwe\', \'rewr\', 23);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Aprendiz`
--

CREATE TABLE `Aprendiz` (
  `idPersona` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `Aprendiz`
--

INSERT INTO `Aprendiz` (`idPersona`) VALUES
(21);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Beca`
--

CREATE TABLE `Beca` (
  `idBeca` int NOT NULL,
  `Importe` int NOT NULL,
  `Fecha_Fin` datetime NOT NULL,
  `Fecha_Inicio` varchar(45) NOT NULL,
  `Observaciones` varchar(45) DEFAULT NULL,
  `Alumno_idPersona` int NOT NULL,
  `Madrina_idPersona` int DEFAULT NULL,
  `idCentro` int NOT NULL,
  `Fecha_AlumnoBeca` datetime DEFAULT NULL,
  `NotaMedia_Alumno` varchar(45) DEFAULT NULL,
  `idTipoBeca` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `Beca`
--

INSERT INTO `Beca` (`idBeca`, `Importe`, `Fecha_Fin`, `Fecha_Inicio`, `Observaciones`, `Alumno_idPersona`, `Madrina_idPersona`, `idCentro`, `Fecha_AlumnoBeca`, `NotaMedia_Alumno`, `idTipoBeca`) VALUES
(2, 100, \'2023-02-06 13:18:35\', \'2022-11-11\', \'cvxcv\', 23, 22, 4, \'2023-02-06 13:18:35\', \'5\', 2),
(4, 200, \'2023-02-08 00:00:00\', \'2023-02-07\', \'dffdsfds\', 23, NULL, 1, \'2023-02-07 09:27:25\', \'5\', 1),
(6, 9, \'2023-02-07 00:00:00\', \'2023-02-07\', \'dtydyd\', 23, NULL, 1, \'2023-02-07 09:29:06\', \'5\', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Centro`
--

CREATE TABLE `Centro` (
  `idCentro` int NOT NULL,
  `NombreCentro` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Distancia` float NOT NULL,
  `idCiudad` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `Centro`
--

INSERT INTO `Centro` (`idCentro`, `NombreCentro`, `Distancia`, `idCiudad`) VALUES
(1, \'Santa Fe\', 1000, 2),
(2, \'Palmireno\', 115, 2),
(4, \'las anas\', 450, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Ciudad`
--

CREATE TABLE `Ciudad` (
  `idCiudad` int NOT NULL,
  `Nombre` varchar(45) NOT NULL,
  `Cantidad` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `Ciudad`
--

INSERT INTO `Ciudad` (`idCiudad`, `Nombre`, `Cantidad`) VALUES
(1, \'Fornoless\', 1500),
(2, \'Torrecilla\', 1250),
(4, \'drdtdt\', 100);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Curso`
--

CREATE TABLE `Curso` (
  `idCurso` int NOT NULL,
  `Nombre` varchar(45) NOT NULL,
  `Importe` int NOT NULL,
  `Fecha_Inicio` date NOT NULL,
  `Fecha_Fin` date NOT NULL,
  `idMovimiento` int NOT NULL,
  `Instructor_idPersona` int NOT NULL,
  `idEspecialidad` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `Curso`
--

INSERT INTO `Curso` (`idCurso`, `Nombre`, `Importe`, `Fecha_Inicio`, `Fecha_Fin`, `idMovimiento`, `Instructor_idPersona`, `idEspecialidad`) VALUES
(6, \'Curso Carlos Camarero\', 50, \'2023-02-03\', \'2023-02-05\', 9, 19, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Especialidad`
--

CREATE TABLE `Especialidad` (
  `idEspecialidad` int NOT NULL,
  `Nombre` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `Especialidad`
--

INSERT INTO `Especialidad` (`idEspecialidad`, `Nombre`) VALUES
(1, \'mates\');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Especializar`
--

CREATE TABLE `Especializar` (
  `Aprendiz_idPersona` int NOT NULL,
  `idEspecialidad` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Estado`
--

CREATE TABLE `Estado` (
  `id_estado` int NOT NULL,
  `Nombre` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `Estado`
--

INSERT INTO `Estado` (`id_estado`, `Nombre`) VALUES
(1, \'Sin Pagar\'),
(2, \'Pagado\'),
(3, \'En Proceso\');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Instructor`
--

CREATE TABLE `Instructor` (
  `idPersona` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `Instructor`
--

INSERT INTO `Instructor` (`idPersona`) VALUES
(19);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Madrina`
--

CREATE TABLE `Madrina` (
  `idPersona` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `Madrina`
--

INSERT INTO `Madrina` (`idPersona`) VALUES
(22);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Material`
--

CREATE TABLE `Material` (
  `idMaterial` int NOT NULL,
  `Nombre` varchar(45) NOT NULL,
  `Archivo` blob
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Movimiento`
--

CREATE TABLE `Movimiento` (
  `idMovimiento` int NOT NULL,
  `Procedencia` varchar(45) NOT NULL,
  `Accion` varchar(45) NOT NULL,
  `Fecha_Movimiento` date NOT NULL,
  `Cantidad` int NOT NULL,
  `idTipoMovimiento` int NOT NULL,
  `idBeca` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `Movimiento`
--

INSERT INTO `Movimiento` (`idMovimiento`, `Procedencia`, `Accion`, `Fecha_Movimiento`, `Cantidad`, `idTipoMovimiento`, `idBeca`) VALUES
(5, \'Plantar Patatass\', \'Dar un prestamo\', \'2023-02-03\', 10, 2, NULL),
(7, \' Abonado por gril\', \'Abonar un prestamo\', \'2023-02-03\', 200, 1, NULL),
(9, \'Curso Carlos Camarero\', \'Pagar un curso\', \'2023-02-03\', 50, 2, NULL),
(10, \'dsfdf\', \'Pagar un curso\', \'2023-02-06\', 200, 2, NULL),
(11, \'Abonado por gril\', \'Abonar un prestamo\', \'2023-02-06\', 190, 1, NULL),
(12, \'Abonado por gril\', \'Abonar un prestamo\', \'2023-02-06\', 10, 1, NULL),
(14, \'Pagar la beca al alumno 23\', \'Dar una Beca\', \'2023-02-07\', 9, 2, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Persona`
--

CREATE TABLE `Persona` (
  `idPersona` int NOT NULL,
  `Clave` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `Username` varchar(45) DEFAULT NULL,
  `Activo` tinyint DEFAULT NULL,
  `Genero` varchar(45) NOT NULL,
  `Nombre` varchar(45) NOT NULL,
  `Apellido` varchar(45) DEFAULT NULL,
  `Telefono` int DEFAULT NULL,
  `Correo` varchar(45) DEFAULT NULL,
  `Fecha_Nacimiento` date DEFAULT NULL,
  `idRol` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `Persona`
--

INSERT INTO `Persona` (`idPersona`, `Clave`, `Username`, `Activo`, `Genero`, `Nombre`, `Apellido`, `Telefono`, `Correo`, `Fecha_Nacimiento`, `idRol`) VALUES
(1, \'03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4\', \'admin\', 1, \'Masculino\', \'Oscar\', \'Merino\', 634563436, \'oscacr11@gmail.com\', \'2001-01-25\', 10),
(19, \'03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4\', \'carlos\', 1, \'Masculino\', \'carlos\', \'sadd\', 234432234, \'o@o.es\', \'2023-01-30\', 20),
(21, \'03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4\', \'gilputoputo\', 1, \'Masculino\', \'Gil Pablo\', \'Blanco\', 653654120, \'t@t.es\', \'2023-02-06\', 30),
(22, NULL, NULL, 1, \'Femenino\', \'Maria\', \'cherlie\', 456654456, \'r@f.es\', \'2023-02-06\', 50),
(23, NULL, NULL, 1, \'Femenino\', \'rewrwe\', \'rewrwer\', 653654120, \'o@o.es\', \'2023-01-31\', 40);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Poseer`
--

CREATE TABLE `Poseer` (
  `idCurso` int NOT NULL,
  `idMaterial` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Prestamo`
--

CREATE TABLE `Prestamo` (
  `idPrestamo` int NOT NULL,
  `Titulo` varchar(45) NOT NULL,
  `Importe` int NOT NULL,
  `idMovimiento` int NOT NULL,
  `idTipoPrestamo` int NOT NULL,
  `Fecha_PedirPrestamo` varchar(45) DEFAULT NULL,
  `id_estado` int NOT NULL,
  `Persona` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `Prestamo`
--

INSERT INTO `Prestamo` (`idPrestamo`, `Titulo`, `Importe`, `idMovimiento`, `idTipoPrestamo`, `Fecha_PedirPrestamo`, `id_estado`, `Persona`) VALUES
(4, \'Plantar Patatass\', 10, 5, 1, \'2023-02-03 10:08:32\', 1, \'gril\');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Recibir`
--

CREATE TABLE `Recibir` (
  `Aprendiz_idPersona` int NOT NULL,
  `idCurso` int NOT NULL,
  `Fecha_RecibirCurso` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Rol`
--

CREATE TABLE `Rol` (
  `idRol` int NOT NULL,
  `NombreRol` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `Rol`
--

INSERT INTO `Rol` (`idRol`, `NombreRol`) VALUES
(10, \'Admin\'),
(20, \'Profesor\'),
(30, \'Aprendiz\'),
(40, \'Alumno\'),
(50, \'Madrina\');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `TipoBeca`
--

CREATE TABLE `TipoBeca` (
  `idTipoBeca` int NOT NULL,
  `NombreBeca` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `TipoBeca`
--

INSERT INTO `TipoBeca` (`idTipoBeca`, `NombreBeca`) VALUES
(1, \'JoseRamon de la Morena\'),
(2, \'Carrera\'),
(3, \'Refugio\');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `TipoMovimento`
--

CREATE TABLE `TipoMovimento` (
  `idTipoMovimento` int NOT NULL,
  `Nombre` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `TipoMovimento`
--

INSERT INTO `TipoMovimento` (`idTipoMovimento`, `Nombre`) VALUES
(1, \'Ingreso\'),
(2, \'Gasto\');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `TipoPrestamo`
--

CREATE TABLE `TipoPrestamo` (
  `idTipoPrestamo` int NOT NULL,
  `Nombre` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `TipoPrestamo`
--

INSERT INTO `TipoPrestamo` (`idTipoPrestamo`, `Nombre`) VALUES
(1, \'Patatas\'),
(2, \'Familia\');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `Abonar`
--
ALTER TABLE `Abonar`
  ADD PRIMARY KEY (`idAbonar`,`Prestamo_idPrestamo`),
  ADD KEY `fk_Abonar_Prestamo1_idx` (`Prestamo_idPrestamo`),
  ADD KEY `fk_Abonar_Movimiento1_idx` (`idMovimiento`);

--
-- Indices de la tabla `Alumno`
--
ALTER TABLE `Alumno`
  ADD PRIMARY KEY (`idPersona`),
  ADD KEY `fk_Alumno_Persona1_idx` (`idPersona`);

--
-- Indices de la tabla `Aprendiz`
--
ALTER TABLE `Aprendiz`
  ADD PRIMARY KEY (`idPersona`),
  ADD KEY `fk_Aprendiz_Persona1_idx` (`idPersona`);

--
-- Indices de la tabla `Beca`
--
ALTER TABLE `Beca`
  ADD PRIMARY KEY (`idBeca`),
  ADD KEY `fk_Beca_Alumno1_idx` (`Alumno_idPersona`),
  ADD KEY `fk_Beca_Madrina1_idx` (`Madrina_idPersona`),
  ADD KEY `fk_Beca_Centro1_idx` (`idCentro`),
  ADD KEY `fk_Beca_TipoBeca1_idx` (`idTipoBeca`);

--
-- Indices de la tabla `Centro`
--
ALTER TABLE `Centro`
  ADD PRIMARY KEY (`idCentro`),
  ADD KEY `fk_Centro_Ciudad1_idx` (`idCiudad`);

--
-- Indices de la tabla `Ciudad`
--
ALTER TABLE `Ciudad`
  ADD PRIMARY KEY (`idCiudad`);

--
-- Indices de la tabla `Curso`
--
ALTER TABLE `Curso`
  ADD PRIMARY KEY (`idCurso`),
  ADD KEY `fk_Curso_Movimiento1_idx` (`idMovimiento`),
  ADD KEY `fk_Curso_Instructor1_idx` (`Instructor_idPersona`),
  ADD KEY `fk_Curso_Especialidad1_idx` (`idEspecialidad`);

--
-- Indices de la tabla `Especialidad`
--
ALTER TABLE `Especialidad`
  ADD PRIMARY KEY (`idEspecialidad`);

--
-- Indices de la tabla `Especializar`
--
ALTER TABLE `Especializar`
  ADD PRIMARY KEY (`Aprendiz_idPersona`,`idEspecialidad`),
  ADD KEY `fk_Aprendiz_has_Especialidad_Especialidad1_idx` (`idEspecialidad`),
  ADD KEY `fk_Aprendiz_has_Especialidad_Aprendiz1_idx` (`Aprendiz_idPersona`);

--
-- Indices de la tabla `Estado`
--
ALTER TABLE `Estado`
  ADD PRIMARY KEY (`id_estado`);

--
-- Indices de la tabla `Instructor`
--
ALTER TABLE `Instructor`
  ADD PRIMARY KEY (`idPersona`),
  ADD KEY `fk_Instructor_Persona1_idx` (`idPersona`);

--
-- Indices de la tabla `Madrina`
--
ALTER TABLE `Madrina`
  ADD PRIMARY KEY (`idPersona`),
  ADD KEY `fk_Madrina_Persona1_idx` (`idPersona`);

--
-- Indices de la tabla `Material`
--
ALTER TABLE `Material`
  ADD PRIMARY KEY (`idMaterial`);

--
-- Indices de la tabla `Movimiento`
--
ALTER TABLE `Movimiento`
  ADD PRIMARY KEY (`idMovimiento`),
  ADD KEY `fk_Movimiento_TipoMovimento1_idx` (`idTipoMovimiento`),
  ADD KEY `fk_Movimiento_Beca1_idx` (`idBeca`);

--
-- Indices de la tabla `Persona`
--
ALTER TABLE `Persona`
  ADD PRIMARY KEY (`idPersona`),
  ADD KEY `fk_Persona_Rol1_idx` (`idRol`);

--
-- Indices de la tabla `Poseer`
--
ALTER TABLE `Poseer`
  ADD PRIMARY KEY (`idCurso`,`idMaterial`),
  ADD KEY `fk_Curso_has_Material_Material1_idx` (`idMaterial`),
  ADD KEY `fk_Curso_has_Material_Curso1_idx` (`idCurso`);

--
-- Indices de la tabla `Prestamo`
--
ALTER TABLE `Prestamo`
  ADD PRIMARY KEY (`idPrestamo`),
  ADD KEY `fk_Prestamo_Movimiento1_idx` (`idMovimiento`),
  ADD KEY `fk_Prestamo_TipoPrestamo1_idx` (`idTipoPrestamo`),
  ADD KEY `fk_Prestamo_Estado1` (`id_estado`);

--
-- Indices de la tabla `Recibir`
--
ALTER TABLE `Recibir`
  ADD PRIMARY KEY (`Aprendiz_idPersona`,`idCurso`),
  ADD KEY `fk_Aprendiz_has_Curso_Curso1_idx` (`idCurso`),
  ADD KEY `fk_Aprendiz_has_Curso_Aprendiz1_idx` (`Aprendiz_idPersona`);

--
-- Indices de la tabla `Rol`
--
ALTER TABLE `Rol`
  ADD PRIMARY KEY (`idRol`);

--
-- Indices de la tabla `TipoBeca`
--
ALTER TABLE `TipoBeca`
  ADD PRIMARY KEY (`idTipoBeca`);

--
-- Indices de la tabla `TipoMovimento`
--
ALTER TABLE `TipoMovimento`
  ADD PRIMARY KEY (`idTipoMovimento`);

--
-- Indices de la tabla `TipoPrestamo`
--
ALTER TABLE `TipoPrestamo`
  ADD PRIMARY KEY (`idTipoPrestamo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `Abonar`
--
ALTER TABLE `Abonar`
  MODIFY `idAbonar` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `Beca`
--
ALTER TABLE `Beca`
  MODIFY `idBeca` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `Centro`
--
ALTER TABLE `Centro`
  MODIFY `idCentro` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `Ciudad`
--
ALTER TABLE `Ciudad`
  MODIFY `idCiudad` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `Curso`
--
ALTER TABLE `Curso`
  MODIFY `idCurso` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `Especialidad`
--
ALTER TABLE `Especialidad`
  MODIFY `idEspecialidad` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `Estado`
--
ALTER TABLE `Estado`
  MODIFY `id_estado` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `Material`
--
ALTER TABLE `Material`
  MODIFY `idMaterial` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `Movimiento`
--
ALTER TABLE `Movimiento`
  MODIFY `idMovimiento` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `Persona`
--
ALTER TABLE `Persona`
  MODIFY `idPersona` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `Prestamo`
--
ALTER TABLE `Prestamo`
  MODIFY `idPrestamo` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `Rol`
--
ALTER TABLE `Rol`
  MODIFY `idRol` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT de la tabla `TipoBeca`
--
ALTER TABLE `TipoBeca`
  MODIFY `idTipoBeca` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `TipoMovimento`
--
ALTER TABLE `TipoMovimento`
  MODIFY `idTipoMovimento` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `TipoPrestamo`
--
ALTER TABLE `TipoPrestamo`
  MODIFY `idTipoPrestamo` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `Abonar`
--
ALTER TABLE `Abonar`
  ADD CONSTRAINT `fk_Abonar_Movimiento1` FOREIGN KEY (`idMovimiento`) REFERENCES `Movimiento` (`idMovimiento`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Abonar_Prestamo1` FOREIGN KEY (`Prestamo_idPrestamo`) REFERENCES `Prestamo` (`idPrestamo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `Alumno`
--
ALTER TABLE `Alumno`
  ADD CONSTRAINT `fk_Alumno_Persona1` FOREIGN KEY (`idPersona`) REFERENCES `Persona` (`idPersona`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `Aprendiz`
--
ALTER TABLE `Aprendiz`
  ADD CONSTRAINT `fk_Aprendiz_Persona1` FOREIGN KEY (`idPersona`) REFERENCES `Persona` (`idPersona`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `Beca`
--
ALTER TABLE `Beca`
  ADD CONSTRAINT `fk_Beca_Alumno1` FOREIGN KEY (`Alumno_idPersona`) REFERENCES `Alumno` (`idPersona`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Beca_Centro1` FOREIGN KEY (`idCentro`) REFERENCES `Centro` (`idCentro`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Beca_Madrina1` FOREIGN KEY (`Madrina_idPersona`) REFERENCES `Madrina` (`idPersona`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Beca_TipoBeca1` FOREIGN KEY (`idTipoBeca`) REFERENCES `TipoBeca` (`idTipoBeca`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `Centro`
--
ALTER TABLE `Centro`
  ADD CONSTRAINT `fk_Centro_Ciudad1` FOREIGN KEY (`idCiudad`) REFERENCES `Ciudad` (`idCiudad`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `Curso`
--
ALTER TABLE `Curso`
  ADD CONSTRAINT `fk_Curso_Especialidad1` FOREIGN KEY (`idEspecialidad`) REFERENCES `Especialidad` (`idEspecialidad`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Curso_Instructor1` FOREIGN KEY (`Instructor_idPersona`) REFERENCES `Instructor` (`idPersona`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Curso_Movimiento1` FOREIGN KEY (`idMovimiento`) REFERENCES `Movimiento` (`idMovimiento`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `Especializar`
--
ALTER TABLE `Especializar`
  ADD CONSTRAINT `fk_Aprendiz_has_Especialidad_Aprendiz2` FOREIGN KEY (`Aprendiz_idPersona`) REFERENCES `Aprendiz` (`idPersona`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Aprendiz_has_Especialidad_Especialidad2` FOREIGN KEY (`idEspecialidad`) REFERENCES `Especialidad` (`idEspecialidad`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `Instructor`
--
ALTER TABLE `Instructor`
  ADD CONSTRAINT `fk_Instructor_Persona1` FOREIGN KEY (`idPersona`) REFERENCES `Persona` (`idPersona`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `Madrina`
--
ALTER TABLE `Madrina`
  ADD CONSTRAINT `fk_Madrina_Persona1` FOREIGN KEY (`idPersona`) REFERENCES `Persona` (`idPersona`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `Movimiento`
--
ALTER TABLE `Movimiento`
  ADD CONSTRAINT `fk_Movimiento_Beca1` FOREIGN KEY (`idBeca`) REFERENCES `Beca` (`idBeca`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Movimiento_TipoMovimento1` FOREIGN KEY (`idTipoMovimiento`) REFERENCES `TipoMovimento` (`idTipoMovimento`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `Persona`
--
ALTER TABLE `Persona`
  ADD CONSTRAINT `fk_Persona_Rol1` FOREIGN KEY (`idRol`) REFERENCES `Rol` (`idRol`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `Poseer`
--
ALTER TABLE `Poseer`
  ADD CONSTRAINT `fk_Curso_has_Material_Curso1` FOREIGN KEY (`idCurso`) REFERENCES `Curso` (`idCurso`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Curso_has_Material_Material1` FOREIGN KEY (`idMaterial`) REFERENCES `Material` (`idMaterial`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `Prestamo`
--
ALTER TABLE `Prestamo`
  ADD CONSTRAINT `fk_Prestamo_Estado1` FOREIGN KEY (`id_estado`) REFERENCES `Estado` (`id_estado`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Prestamo_Movimiento1` FOREIGN KEY (`idMovimiento`) REFERENCES `Movimiento` (`idMovimiento`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Prestamo_TipoPrestamo1` FOREIGN KEY (`idTipoPrestamo`) REFERENCES `TipoPrestamo` (`idTipoPrestamo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `Recibir`
--
ALTER TABLE `Recibir`
  ADD CONSTRAINT `fk_Aprendiz_has_Curso_Aprendiz1` FOREIGN KEY (`Aprendiz_idPersona`) REFERENCES `Aprendiz` (`idPersona`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Aprendiz_has_Curso_Curso1` FOREIGN KEY (`idCurso`) REFERENCES `Curso` (`idCurso`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
