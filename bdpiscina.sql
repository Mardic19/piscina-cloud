-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-01-2024 a las 14:03:55
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bdpiscina`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumno`
--

CREATE TABLE `alumno` (
  `codAlumno` char(8) NOT NULL,
  `nomApoderado` varchar(100) DEFAULT NULL,
  `dniApoderado` char(8) DEFAULT NULL,
  `DNI` char(8) DEFAULT NULL,
  `Nivel` char(18) DEFAULT NULL,
  `condicionMedica` char(18) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `alumno`
--

INSERT INTO `alumno` (`codAlumno`, `nomApoderado`, `dniApoderado`, `DNI`, `Nivel`, `condicionMedica`) VALUES
('A1', 'Pedro Pérez', '98765432', '12345678', 'Basico', 'Sano'),
('A2', 'Ana López', '87654321', '23456789', 'Segundo', 'Alergias'),
('A3', 'Juan Rodríguez', '76543210', '34567890', 'Tercero', 'Asma'),
('A4', NULL, NULL, '87114895', 'Intermedio', 'Amigdalitis'),
('A5', NULL, NULL, '85296342', 'Basico', 'sano'),
('A6', NULL, NULL, '85236995', 'Basico', 'sano');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `avance`
--

CREATE TABLE `avance` (
  `codAlumno` char(8) NOT NULL,
  `tiempo` float DEFAULT NULL,
  `distancia` float DEFAULT NULL,
  `estiloNatacion` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `avance`
--

INSERT INTO `avance` (`codAlumno`, `tiempo`, `distancia`, `estiloNatacion`) VALUES
('A1', 10.5, 200, 'Crol'),
('A2', 8, 150, 'Espalda'),
('A3', 12, 250, 'Mariposa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `boleta_pago`
--

CREATE TABLE `boleta_pago` (
  `DNI` char(8) NOT NULL,
  `monto` decimal(10,2) DEFAULT NULL,
  `fecha` char(18) DEFAULT NULL,
  `idTipoPago` char(8) DEFAULT NULL,
  `idBoleta` char(18) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `boleta_pago`
--

INSERT INTO `boleta_pago` (`DNI`, `monto`, `fecha`, `idTipoPago`, `idBoleta`) VALUES
('12345678', '150.00', '2022-01-20', 'TP1', 'B1'),
('23456789', '200.00', '2022-02-05', 'TP2', 'B2'),
('34567890', '100.00', '2022-03-15', 'TP1', 'B3');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horario`
--

CREATE TABLE `horario` (
  `idHorario` char(8) NOT NULL,
  `Turno` varchar(10) DEFAULT NULL,
  `HInicio` datetime DEFAULT NULL,
  `HFinal` datetime DEFAULT NULL,
  `Dias` char(18) DEFAULT NULL,
  `idPrograma` char(8) DEFAULT NULL,
  `idProfesor` char(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `horario`
--

INSERT INTO `horario` (`idHorario`, `Turno`, `HInicio`, `HFinal`, `Dias`, `idPrograma`, `idProfesor`) VALUES
('H1', 'Mañana', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Lunes-Miércoles', 'P1', 'PR1'),
('H2', 'Tarde', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Martes-Jueves', 'P2', 'PR2'),
('H3', 'Noche', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Lunes-Miércoles', 'P3', 'PR1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `matricula`
--

CREATE TABLE `matricula` (
  `IdMatricula` char(8) NOT NULL,
  `montoAdeudado` decimal(10,2) DEFAULT NULL,
  `codAlumno` char(8) DEFAULT NULL,
  `estadoMatricula` varchar(30) DEFAULT NULL,
  `idPeriodo` char(8) DEFAULT NULL,
  `idPrograma` char(8) DEFAULT NULL,
  `fechaRegistro` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `matricula`
--

INSERT INTO `matricula` (`IdMatricula`, `montoAdeudado`, `codAlumno`, `estadoMatricula`, `idPeriodo`, `idPrograma`, `fechaRegistro`) VALUES
('M1', '100.00', 'A1', 'Activa', '202201', 'P1', '2022-01-05 00:00:00'),
('M2', '0.00', 'A2', 'Inactiva', '202202', 'P3', '2022-02-10 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
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
-- Estructura de tabla para la tabla `pagos`
--

CREATE TABLE `pagos` (
  `IdMatricula` char(8) NOT NULL,
  `idBoleta` char(18) NOT NULL,
  `numMes` char(18) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `periodo`
--

CREATE TABLE `periodo` (
  `idPeriodo` char(8) NOT NULL,
  `F_Inicio` datetime DEFAULT NULL,
  `F_Final` datetime DEFAULT NULL,
  `Ciclo` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `periodo`
--

INSERT INTO `periodo` (`idPeriodo`, `F_Inicio`, `F_Final`, `Ciclo`) VALUES
('202201', '2022-01-01 00:00:00', '2022-06-30 00:00:00', 'Primer Semestre'),
('202202', '2022-07-01 00:00:00', '2022-12-31 00:00:00', 'Segundo Semestre');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `periodo_programa`
--

CREATE TABLE `periodo_programa` (
  `idPeriodo` char(8) NOT NULL,
  `idPrograma` char(8) NOT NULL,
  `costo` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `periodo_programa`
--

INSERT INTO `periodo_programa` (`idPeriodo`, `idPrograma`, `costo`) VALUES
('202201', 'P1', '500.00'),
('202201', 'P2', '600.00'),
('202202', 'P3', '550.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `DNI` char(8) NOT NULL,
  `Nombres` varchar(100) DEFAULT NULL,
  `Celular` int(9) DEFAULT NULL,
  `Correo` varchar(100) DEFAULT NULL,
  `Edad` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`DNI`, `Nombres`, `Celular`, `Correo`, `Edad`) VALUES
('12345678', 'Juan Pérez', 123456789, 'juan@hotmail.com', 25),
('23456789', 'María Rodríguez', 98765432, 'maria.rodriguez@example.com', 28),
('34567890', 'Carlos López', 56789012, 'carlos.lopez@example.com', 30),
('55274895', 'Lecca Alfaro Renzo', 951150801, 'joma@gmail.com', 14),
('77114895', 'Querevalu Galan Roger', 951150851, 'josmal@gmail.com', 15),
('85236995', 'fernando infante', 789654147, 'fernando@gmail.com', 10),
('85296342', 'Paola siccha', 951159951, 'Paolasiccha@hotmail.com', 18),
('87114895', 'Luis Vergara', 251150801, 'LuisVergara@hotmail.com', 16);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `profesor`
--

INSERT INTO `profesor` (`idProfesor`, `DNI`, `especialidad`) VALUES
('PR1', '34567890', 'Sin Especialidad'),
('PR2', '23456789', 'Rehabilitacion');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `programa`
--

CREATE TABLE `programa` (
  `idPrograma` char(8) NOT NULL,
  `nombre` varchar(20) DEFAULT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `modalidad` varchar(30) DEFAULT NULL,
  `Vacantes` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `programa`
--

INSERT INTO `programa` (`idPrograma`, `nombre`, `descripcion`, `modalidad`, `Vacantes`) VALUES
('P1', 'Programa 1', 'Descripción del Programa 1', 'Presencial', 50),
('P2', 'Programa 2', 'Descripción del Programa 2', 'Virtual', 30),
('P3', 'Programa 3', 'Descripción del Programa 3', 'Presencial', 40);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipopago`
--

CREATE TABLE `tipopago` (
  `idTipoPago` char(8) NOT NULL,
  `tipo` varchar(20) DEFAULT NULL,
  `descripcion` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipopago`
--

INSERT INTO `tipopago` (`idTipoPago`, `tipo`, `descripcion`) VALUES
('TP1', 'Mensualidad', 'Pago mensual de matrícula'),
('TP2', 'Inscripción', 'Pago de inscripción anual');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'greenfelder.allan@example.org', '2024-01-10 02:41:08', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'VLgQ5YukuL114fnsNI98120nRfJG215TMBdBQVG5YqPEUHDymbD4YCkAnGSq', '2024-01-14 02:39:48', '2024-01-14 02:39:48');

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
-- Indices de la tabla `avance`
--
ALTER TABLE `avance`
  ADD PRIMARY KEY (`codAlumno`);

--
-- Indices de la tabla `boleta_pago`
--
ALTER TABLE `boleta_pago`
  ADD PRIMARY KEY (`idBoleta`),
  ADD KEY `FK_BoletaPago_Persona` (`DNI`),
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
  ADD PRIMARY KEY (`IdMatricula`),
  ADD KEY `FK_Matricula_Alumno` (`codAlumno`),
  ADD KEY `FK_Matricula_PeriodoPrograma` (`idPeriodo`,`idPrograma`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD PRIMARY KEY (`IdMatricula`,`idBoleta`),
  ADD KEY `FK_Pagos_BoletaPago` (`idBoleta`);

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
  ADD KEY `FK_PeriodoPrograma_Programa` (`idPrograma`);

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
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alumno`
--
ALTER TABLE `alumno`
  ADD CONSTRAINT `FK_Alumno_Persona` FOREIGN KEY (`DNI`) REFERENCES `persona` (`DNI`);

--
-- Filtros para la tabla `avance`
--
ALTER TABLE `avance`
  ADD CONSTRAINT `FK_Avance_Alumno` FOREIGN KEY (`codAlumno`) REFERENCES `alumno` (`codAlumno`);

--
-- Filtros para la tabla `boleta_pago`
--
ALTER TABLE `boleta_pago`
  ADD CONSTRAINT `FK_BoletaPago_Persona` FOREIGN KEY (`DNI`) REFERENCES `persona` (`DNI`),
  ADD CONSTRAINT `FK_BoletaPago_TipoPago` FOREIGN KEY (`idTipoPago`) REFERENCES `tipopago` (`idTipoPago`);

--
-- Filtros para la tabla `horario`
--
ALTER TABLE `horario`
  ADD CONSTRAINT `FK_Horario_Profesor` FOREIGN KEY (`idProfesor`) REFERENCES `profesor` (`idProfesor`),
  ADD CONSTRAINT `FK_Horario_Programa` FOREIGN KEY (`idPrograma`) REFERENCES `programa` (`idPrograma`);

--
-- Filtros para la tabla `matricula`
--
ALTER TABLE `matricula`
  ADD CONSTRAINT `FK_Matricula_Alumno` FOREIGN KEY (`codAlumno`) REFERENCES `alumno` (`codAlumno`),
  ADD CONSTRAINT `FK_Matricula_PeriodoPrograma` FOREIGN KEY (`idPeriodo`,`idPrograma`) REFERENCES `periodo_programa` (`idPeriodo`, `idPrograma`);

--
-- Filtros para la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD CONSTRAINT `FK_Pagos_BoletaPago` FOREIGN KEY (`idBoleta`) REFERENCES `boleta_pago` (`idBoleta`),
  ADD CONSTRAINT `FK_Pagos_Matricula` FOREIGN KEY (`IdMatricula`) REFERENCES `matricula` (`IdMatricula`);

--
-- Filtros para la tabla `periodo_programa`
--
ALTER TABLE `periodo_programa`
  ADD CONSTRAINT `FK_PeriodoPrograma_Periodo` FOREIGN KEY (`idPeriodo`) REFERENCES `periodo` (`idPeriodo`),
  ADD CONSTRAINT `FK_PeriodoPrograma_Programa` FOREIGN KEY (`idPrograma`) REFERENCES `programa` (`idPrograma`);

--
-- Filtros para la tabla `profesor`
--
ALTER TABLE `profesor`
  ADD CONSTRAINT `FK_Profesor_Persona` FOREIGN KEY (`DNI`) REFERENCES `persona` (`DNI`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
