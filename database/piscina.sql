drop database if exists `piscina`;
create database `piscina`;
use `piscina`;
-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3307
-- Tiempo de generación: 22-02-2024 a las 06:59:42
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `piscina`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumno`
--

CREATE TABLE `alumno` (
  `codAlumno` char(8) NOT NULL,
  `DNI` char(8) DEFAULT NULL,
  `Nivel` char(18) DEFAULT NULL,
  `condicionMedica` char(18) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `alumno`
--

INSERT INTO `alumno` (`codAlumno`, `DNI`, `Nivel`, `condicionMedica`) VALUES
('A1', '12345678', 'Basico', 'Sano'),
('A2', '23456789', 'Avanzado', 'Alergias'),
('A3', '34567890', 'Cero', 'Asma'),
('A4', '87114895', 'Intermedio', 'Amigdalitis'),
('A5', '85296342', 'Basico', 'sano'),
('A7', '88855522', 'Basico', 'Sano'),
('A8', '74581649', 'Basico', 'Sano');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `boleta_pago`
--

CREATE TABLE `boleta_pago` (
  `idMatricula` int(11) NOT NULL,
  `monto` decimal(10,2) NOT NULL,
  `fecha` date DEFAULT NULL,
  `idTipoPago` char(8) DEFAULT NULL,
  `idBoleta` varchar(18) NOT NULL,
  `mesPago` int(11) NOT NULL,
  `imagenPago` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `boleta_pago`
--

INSERT INTO `boleta_pago` (`idMatricula`, `monto`, `fecha`, `idTipoPago`, `idBoleta`, `mesPago`, `imagenPago`) VALUES
(11, '340.00', '2024-02-21', 'TP1', '123456', 1, 'fondo.jpg'),
(11, '340.00', '2024-02-21', 'TP1', '123457', 1, 'ground.jpg'),
(1, '150.00', '2022-01-20', 'TP1', 'B1', 0, ''),
(2, '200.00', '2022-02-05', 'TP2', 'B2', 0, ''),
(3, '100.00', '2022-03-15', 'TP1', 'B3', 0, ''),
(4, '100.00', '2024-01-23', 'TP2', 'B4', 0, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horario`
--

CREATE TABLE `horario` (
  `idHorario` int(11) NOT NULL,
  `Turno` varchar(10) DEFAULT NULL,
  `HInicio` time DEFAULT NULL,
  `HFinal` time DEFAULT NULL,
  `Dias` varchar(70) DEFAULT NULL,
  `idPrograma` int(11) DEFAULT NULL,
  `idProfesor` char(8) DEFAULT NULL,
  `vacantes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `horario`
--

INSERT INTO `horario` (`idHorario`, `Turno`, `HInicio`, `HFinal`, `Dias`, `idPrograma`, `idProfesor`, `vacantes`) VALUES
(1, 'Mañana', '07:00:00', '09:00:00', 'Lunes,Miércoles', 1, 'PR1', 10),
(2, 'Tarde', '09:00:00', '11:00:00', 'Martes,Jueves', 2, 'PR2', 15),
(3, 'Noche', '15:00:00', '17:00:00', 'Lunes,Miércoles', 3, 'PR1', 9),
(4, 'Mañana', '08:00:00', '10:00:00', 'Sábado,Domingo', 2, 'PR6', 14),
(5, 'Tarde', '14:00:00', '16:00:00', 'Sábado,Domingo', 3, 'PR4', 20),
(6, 'Mañana', '10:00:00', '11:00:00', 'Martes,Jueves', 1, 'PR2', 7),
(7, 'Mañana', '07:00:00', '10:00:00', 'Lunes,Miércoles,Viernes', 6, 'PR2', 20),
(9, 'Tarde', '14:00:00', '17:00:00', 'Lunes,Miércoles,Viernes', 2, 'PR3', 25);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `matricula`
--

CREATE TABLE `matricula` (
  `idMatricula` int(11) NOT NULL,
  `codAlumno` char(8) DEFAULT NULL,
  `estadoMatricula` varchar(30) DEFAULT NULL,
  `idPeriodo` int(11) DEFAULT NULL,
  `idPrograma` int(11) DEFAULT NULL,
  `idHorario` int(11) DEFAULT NULL,
  `fechaRegistro` datetime DEFAULT NULL,
  `mesesFaltantes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `matricula`
--

INSERT INTO `matricula` (`idMatricula`, `codAlumno`, `estadoMatricula`, `idPeriodo`, `idPrograma`, `idHorario`, `fechaRegistro`, `mesesFaltantes`) VALUES
(1, 'A1', 'Activa', 1, 1, 1, '2022-01-05 00:00:00', 0),
(2, 'A3', 'Activa', 2, 2, 2, '2024-01-24 00:00:00', 0),
(3, 'A2', 'Activa', 2, 3, 3, '2024-02-22 00:00:00', 0),
(4, 'A4', 'Activa', 2, 2, 2, '2024-01-31 00:00:00', 0),
(5, 'A5', 'Activa', 2, 2, 2, '2024-02-01 00:00:00', 0),
(6, 'A1', 'Activa', 1, 1, 1, '2024-01-09 00:00:00', 0),
(7, 'A7', 'Activa', 1, 1, 1, '2024-02-01 00:00:00', 0),
(8, 'A1', 'Activa', 1, 1, 1, '2024-01-25 00:00:00', 0),
(9, 'A4', 'Activa', 2, 1, 1, '2024-01-04 00:00:00', 0),
(11, 'A8', 'Activa', 3, 6, 7, '2024-02-21 00:00:00', 0),
(12, 'A7', 'Activa', 3, 2, 4, '2024-02-22 00:00:00', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `periodo`
--

CREATE TABLE `periodo` (
  `idPeriodo` int(11) NOT NULL,
  `F_Inicio` year(4) DEFAULT NULL,
  `Ciclo` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `periodo`
--

INSERT INTO `periodo` (`idPeriodo`, `F_Inicio`, `Ciclo`) VALUES
(1, 2023, '2023-I'),
(2, 2023, '2023-II'),
(3, 2024, '2024-I');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `periodo_programa`
--

CREATE TABLE `periodo_programa` (
  `idPeriodo` int(11) NOT NULL,
  `idPrograma` int(11) NOT NULL,
  `costo` decimal(10,2) DEFAULT NULL,
  `inicio` date DEFAULT NULL,
  `termino` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `periodo_programa`
--

INSERT INTO `periodo_programa` (`idPeriodo`, `idPrograma`, `costo`, `inicio`, `termino`) VALUES
(1, 1, '500.00', '2023-01-01', '2024-03-01'),
(1, 2, '400.00', '2023-01-01', '2024-03-01'),
(1, 4, '200.00', '2023-01-01', '2024-03-01'),
(1, 6, '180.00', '2023-01-01', '2024-03-01'),
(2, 1, '450.00', '2023-01-01', '2024-03-01'),
(2, 2, '350.00', '2023-01-01', '2024-03-01'),
(2, 3, '550.00', '2023-01-01', '2024-03-01'),
(2, 4, '260.00', '2023-01-01', '2024-03-01'),
(3, 2, '120.00', '2024-03-01', '2024-08-01'),
(3, 6, '340.00', '2024-01-01', '2024-03-01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `DNI` char(8) NOT NULL,
  `Nombres` varchar(100) DEFAULT NULL,
  `Celular` int(9) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `Edad` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`DNI`, `Nombres`, `Celular`, `email`, `Edad`) VALUES
('12345678', 'Juan Pérez', 123456789, 'juan@hotmail.com', 14),
('23456789', 'María Rodríguez', 987654321, 'maria.rodriguez@example.com', 18),
('34567890', 'Carlos López', 567890120, 'carlos.lopez@example.com', 20),
('55274895', 'Lecca Alfaro Renzo', 951150801, 'joma@gmail.com', 14),
('70014895', 'Victor Larco', 951147999, 'Victor@hotmail.com', 26),
('74581649', 'Mario Ramos', 964578123, 'mario@gmail.com', 14),
('77114800', 'Bruno alcantara', 988998899, 'Brunoalcantara@hotmail.com', 24),
('77114895', 'Pedro Pascal', 922147741, 'PedroPascal@hotmail.com', 19),
('77274800', 'Luis arcangel yandel', 951149999, 'Luisarcangel@hotmail.com', 45),
('78814895', 'Louis angel', 951147700, 'Louisangel@hotmail.com', 34),
('85236995', 'fernando infante', 789654147, 'fernando@gmail.com', 10),
('85296342', 'Paola siccha', 951159951, 'Paolasiccha@hotmail.com', 18),
('87114895', 'Luis Vergara', 251150801, 'LuisVergara@hotmail.com', 16),
('88855522', 'maricielo escobedo', 999654654, 'maricieloescobedo@gmail.com', 17);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesor`
--

CREATE TABLE `profesor` (
  `idProfesor` char(8) NOT NULL,
  `DNI` char(8) DEFAULT NULL,
  `especialidad` char(18) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `profesor`
--

INSERT INTO `profesor` (`idProfesor`, `DNI`, `especialidad`) VALUES
('PR1', '34567890', 'Sin Especialidad'),
('PR2', '23456789', 'Rehabilitacion'),
('PR3', '77114800', 'Sin especialidad'),
('PR4', '78814895', 'Sin especialidad'),
('PR5', '77274800', 'Sin especialidad'),
('PR6', '70014895', 'Terapia muscular'),
('PR7', '77114895', 'Terapia muscular');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `programa`
--

CREATE TABLE `programa` (
  `idPrograma` int(11) NOT NULL,
  `nombre` varchar(20) DEFAULT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `modalidad` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `programa`
--

INSERT INTO `programa` (`idPrograma`, `nombre`, `descripcion`, `modalidad`) VALUES
(1, 'Patera', 'Mejora fuerza y anticipa habilidades psicomotrices con ejercicios musculares', 'Regular'),
(2, 'Campeon', '\"Natación Competitiva: Desarrolla tu Potencial\"', 'Intensivo'),
(3, 'Natacion Terapeutica', '\"Natación Terapéutica: Bienestar Acuático\"', 'Regular'),
(4, 'Avanzado', 'Para personas con conocimientos previos en todas las tecnicas competitivas', 'Intensivo'),
(5, 'Kids', 'Para menores de 12 años', 'Regular'),
(6, 'Semillero', 'Para nuevos integrantes sin conocimiento alguno', 'Regular');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipopago`
--

CREATE TABLE `tipopago` (
  `idTipoPago` char(8) NOT NULL,
  `descripcion` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipopago`
--

INSERT INTO `tipopago` (`idTipoPago`, `descripcion`) VALUES
('TP1', 'Yape'),
('TP2', 'Interbank');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'greenfelder.allan@example.org', '2024-01-10 02:41:08', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'KJ3EkeZKNv3Mt3X65gNnAkuVbhPjDsgpPlo8fhHUOF4i6xOFQB5Zp7tZ8U2D', '2024-01-14 02:39:48', '2024-01-14 02:39:48'),
(2, 'Mario', 'mario@gmail.com', NULL, '$2y$10$cX5TecO2qn159xqK856laOyCWIpxHs4Qfm0gCm6B7GyGXnJVVZL6m', NULL, '2024-02-21 12:11:52', '2024-02-21 12:11:52');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumno`
--
ALTER TABLE `alumno`
  ADD PRIMARY KEY (`codAlumno`),
  ADD KEY `FK_Alumno_Persona` (`DNI`);

--
-- Indices de la tabla `boleta_pago`
--
ALTER TABLE `boleta_pago`
  ADD PRIMARY KEY (`idBoleta`),
  ADD KEY `FK_BoletaPago_Persona` (`idMatricula`),
  ADD KEY `FK_BoletaPago_TipoPago` (`idTipoPago`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `horario`
--
ALTER TABLE `horario`
  ADD PRIMARY KEY (`idHorario`),
  ADD KEY `FK_Horario_Programa` (`idPrograma`),
  ADD KEY `FK_Horario_Profesor` (`idProfesor`);

--
-- Indices de la tabla `matricula`
--
ALTER TABLE `matricula`
  ADD PRIMARY KEY (`idMatricula`),
  ADD KEY `FK_Matricula_Alumno` (`codAlumno`),
  ADD KEY `FK_Matricula_PeriodoPrograma` (`idPeriodo`,`idPrograma`),
  ADD KEY `idHorario` (`idHorario`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `periodo`
--
ALTER TABLE `periodo`
  ADD PRIMARY KEY (`idPeriodo`);

--
-- Indices de la tabla `periodo_programa`
--
ALTER TABLE `periodo_programa`
  ADD PRIMARY KEY (`idPeriodo`,`idPrograma`),
  ADD KEY `FK_PeriodoPrograma_Programa` (`idPrograma`),
  ADD KEY `idPeriodo` (`idPeriodo`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`DNI`);

--
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indices de la tabla `profesor`
--
ALTER TABLE `profesor`
  ADD PRIMARY KEY (`idProfesor`),
  ADD KEY `FK_Profesor_Persona` (`DNI`);

--
-- Indices de la tabla `programa`
--
ALTER TABLE `programa`
  ADD PRIMARY KEY (`idPrograma`);

--
-- Indices de la tabla `tipopago`
--
ALTER TABLE `tipopago`
  ADD PRIMARY KEY (`idTipoPago`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `horario`
--
ALTER TABLE `horario`
  MODIFY `idHorario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `matricula`
--
ALTER TABLE `matricula`
  MODIFY `idMatricula` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `periodo`
--
ALTER TABLE `periodo`
  MODIFY `idPeriodo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `programa`
--
ALTER TABLE `programa`
  MODIFY `idPrograma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alumno`
--
ALTER TABLE `alumno`
  ADD CONSTRAINT `FK_Alumno_Persona` FOREIGN KEY (`DNI`) REFERENCES `persona` (`DNI`) ON DELETE CASCADE;

--
-- Filtros para la tabla `boleta_pago`
--
ALTER TABLE `boleta_pago`
  ADD CONSTRAINT `FK_BoletaPago_TipoPago` FOREIGN KEY (`idTipoPago`) REFERENCES `tipopago` (`idTipoPago`),
  ADD CONSTRAINT `boleta_pago_ibfk_1` FOREIGN KEY (`idMatricula`) REFERENCES `matricula` (`idMatricula`) ON DELETE CASCADE;

--
-- Filtros para la tabla `horario`
--
ALTER TABLE `horario`
  ADD CONSTRAINT `FK_Horario_Profesor` FOREIGN KEY (`idProfesor`) REFERENCES `profesor` (`idProfesor`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_Horario_Programa` FOREIGN KEY (`idPrograma`) REFERENCES `programa` (`idPrograma`) ON DELETE CASCADE;

--
-- Filtros para la tabla `matricula`
--
ALTER TABLE `matricula`
  ADD CONSTRAINT `FK_Matricula_Alumno` FOREIGN KEY (`codAlumno`) REFERENCES `alumno` (`codAlumno`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_Matricula_Horario` FOREIGN KEY (`idHorario`) REFERENCES `horario` (`idHorario`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_Matricula_PeriodoPrograma` FOREIGN KEY (`idPeriodo`,`idPrograma`) REFERENCES `periodo_programa` (`idPeriodo`, `idPrograma`) ON DELETE CASCADE;

--
-- Filtros para la tabla `periodo_programa`
--
ALTER TABLE `periodo_programa`
  ADD CONSTRAINT `FK_PeriodoPrograma_Periodo` FOREIGN KEY (`idPeriodo`) REFERENCES `periodo` (`idPeriodo`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_PeriodoPrograma_Programa` FOREIGN KEY (`idPrograma`) REFERENCES `programa` (`idPrograma`) ON DELETE CASCADE;

--
-- Filtros para la tabla `profesor`
--
ALTER TABLE `profesor`
  ADD CONSTRAINT `FK_Profesor_Persona` FOREIGN KEY (`DNI`) REFERENCES `persona` (`DNI`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
