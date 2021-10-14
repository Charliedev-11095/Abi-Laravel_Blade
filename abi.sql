-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-10-2021 a las 04:00:34
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
-- Base de datos: `abi`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

CREATE TABLE `alumnos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombres` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellido_paterno` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellido_materno` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `calle` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `numero_interior` varchar(7) COLLATE utf8mb4_unicode_ci NOT NULL,
  `numero_exterior` varchar(7) COLLATE utf8mb4_unicode_ci NOT NULL,
  `colonia` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ciudad` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `codigo_postal` int(11) NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `curp` varchar(19) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_de_nacimiento` date NOT NULL,
  `telefono` char(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alta_usuario` bigint(20) UNSIGNED DEFAULT NULL,
  `tutores_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos_pivotes`
--

CREATE TABLE `alumnos_pivotes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `alumnos_id` bigint(20) UNSIGNED DEFAULT NULL,
  `users_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asistencias`
--

CREATE TABLE `asistencias` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fecha_asistencia` date NOT NULL,
  `asistencia` char(10) COLLATE utf8mb4_unicode_ci DEFAULT 'Marcada',
  `relacion_grupo_alumnos` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entrenadores`
--

CREATE TABLE `entrenadores` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombres` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellido_paterno` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellido_materno` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `calle` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `numero_interior` varchar(7) COLLATE utf8mb4_unicode_ci NOT NULL,
  `numero_exterior` varchar(7) COLLATE utf8mb4_unicode_ci NOT NULL,
  `colonia` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ciudad` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `codigo_postal` int(11) NOT NULL,
  `curp` varchar(19) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_de_nacimiento` date NOT NULL,
  `telefono` char(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alta_usuario` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entrenadores_pivotes`
--

CREATE TABLE `entrenadores_pivotes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `users_id` bigint(20) UNSIGNED DEFAULT NULL,
  `entrenadores_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos`
--

CREATE TABLE `eventos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `textColor` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  `alta_usuario` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupos`
--

CREATE TABLE `grupos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `grado` char(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seccion` char(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nivel` char(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` char(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `lunes` char(8) COLLATE utf8mb4_unicode_ci DEFAULT 'Inactiva',
  `martes` char(8) COLLATE utf8mb4_unicode_ci DEFAULT 'Inactiva',
  `miercoles` char(8) COLLATE utf8mb4_unicode_ci DEFAULT 'Inactiva',
  `jueves` char(8) COLLATE utf8mb4_unicode_ci DEFAULT 'Inactiva',
  `viernes` char(8) COLLATE utf8mb4_unicode_ci DEFAULT 'Inactiva',
  `sabado` char(8) COLLATE utf8mb4_unicode_ci DEFAULT 'Inactiva',
  `domingo` char(8) COLLATE utf8mb4_unicode_ci DEFAULT 'Inactiva',
  `dias_entrenamiento` int(11) DEFAULT NULL,
  `evaluaciones_maximo` int(11) DEFAULT NULL,
  `estado` char(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `alta_usuario` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo_alumnos`
--

CREATE TABLE `grupo_alumnos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `grupos_id` bigint(20) UNSIGNED DEFAULT NULL,
  `alumnos_id` bigint(20) UNSIGNED DEFAULT NULL,
  `entrenadores_id` bigint(20) UNSIGNED DEFAULT NULL,
  `asistencias` int(10) UNSIGNED DEFAULT NULL,
  `calificacion_asistencias` double(8,2) DEFAULT NULL,
  `calificacion_entrenamiento` double(8,2) DEFAULT NULL,
  `total_liderazgo` double(8,2) DEFAULT NULL,
  `total_manejobalon` double(8,2) DEFAULT NULL,
  `total_pases` double(8,2) DEFAULT NULL,
  `total_pies` double(8,2) DEFAULT NULL,
  `total_lanzamiento` double(8,2) DEFAULT NULL,
  `total_defensa` double(8,2) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `estado` char(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alta_usuario` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historicos_deportivos`
--

CREATE TABLE `historicos_deportivos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `comunicacion` char(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `liderazgo` char(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `respeto` char(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `responsabilidad` char(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `participacion` char(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `actitud` char(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `constancia` char(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `compromiso` char(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trabajo_en_equipo` char(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mirada_al_frente` char(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coordinacion_manos_balon` char(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `decision_bajo_presion` char(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `acertividad_en_balon` char(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coordinacion_manos_pase` char(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rapidez_en_pase` char(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pase_al_poste` char(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `acertividad_en_pase` char(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `balance_pies` char(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pivote` char(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `balance_objetivo` char(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `agarre_balon` char(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alineacion_al_aro` char(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `entradas_manos` char(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `posicion_cuerpo` char(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `presion_balon` char(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bloqueo_oponente` char(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contesta_lanzamiento` char(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `observaciones` char(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alumnos_id` bigint(20) UNSIGNED DEFAULT NULL,
  `relacion_grupo_alumnos` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `fecha_creacion` date DEFAULT NULL,
  `seccionliderazgo` int(11) DEFAULT NULL,
  `seccionmanejobalon` int(11) DEFAULT NULL,
  `seccionpases` int(11) DEFAULT NULL,
  `seccionpies` int(11) DEFAULT NULL,
  `seccionlanzamiento` int(11) DEFAULT NULL,
  `secciondefensa` int(11) DEFAULT NULL,
  `total_historico` int(11) DEFAULT NULL,
  `evaluacion_liderazgo` double(8,2) DEFAULT NULL,
  `evaluacion_manejobalon` double(8,2) DEFAULT NULL,
  `evaluacion_pases` double(8,2) DEFAULT NULL,
  `evaluacion_pies` double(8,2) DEFAULT NULL,
  `evaluacion_lanzamiento` double(8,2) DEFAULT NULL,
  `evaluacion_defensa` double(8,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historicos_medicos`
--

CREATE TABLE `historicos_medicos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `estatura` double(8,2) NOT NULL,
  `peso` double(8,2) NOT NULL,
  `presion_arterial` double(8,2) DEFAULT NULL,
  `comentarios` char(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alumnos_id` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `fecha_creacion` date DEFAULT NULL,
  `alta_usuario` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2021_04_28_212435_create_grupos_table', 1),
(7, '2021_05_02_024235_create_tutores_table', 1),
(8, '2021_05_02_035508_create_entrenadores_table', 1),
(9, '2021_05_02_035613_create_alumnos_table', 1),
(10, '2021_05_02_152945_create_registros_medicos_table', 1),
(11, '2021_05_06_002807_create_grupo_alumnos_table', 1),
(12, '2021_05_12_173216_create_historicos_medicos_table', 1),
(13, '2021_05_19_013911_create_historicos_deportivos_table', 1),
(14, '2021_05_21_003047_create_eventos_table', 1),
(15, '2021_06_02_114108_create_asistencias_table', 1),
(16, '2021_09_05_005705_create_sessions_table', 1),
(17, '2021_09_13_180317_create_alumnos_pivotes_table', 1),
(18, '2021_09_18_142404_create_teams_table', 1),
(19, '2021_09_19_110158_create_entrenadores_pivotes_table', 1),
(20, '2021_09_20_140420_create_team_entrenadores_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registros_medicos`
--

CREATE TABLE `registros_medicos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `estatura` double(8,2) NOT NULL,
  `peso` double(8,2) NOT NULL,
  `presion_arterial` double(8,2) NOT NULL,
  `tipo_sanguineo` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `edad` int(11) NOT NULL,
  `padecimiento` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tratamiento` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alergia` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `conducta` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `impedimento_fisico` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `condicion_fisica` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alta_usuario` bigint(20) UNSIGNED DEFAULT NULL,
  `alumnos_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('96i95SN2XWf8EHDknvdu8KR0r5jb0AMhQILuLgxo', 4, '::1', 'Mozilla/5.0 (Windows NT 10.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.81 Safari/537.36 Edg/94.0.992.47', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoicHUzRlF2NUlBT05xQ0Z0ZE55eUE4cExlWkFlbzhZaGZqUWFQWEtHWSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTE3OiJodHRwOi8vbG9jYWxob3N0L2FiaS9wdWJsaWMvY2FsZW5kYXJpby9zaG93P2VuZD0yMDIxLTExLTA4VDAwJTNBMDAlM0EwMC0wNiUzQTAwJnN0YXJ0PTIwMjEtMDktMjdUMDAlM0EwMCUzQTAwLTA1JTNBMDAiO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTo0O3M6MTc6InBhc3N3b3JkX2hhc2hfd2ViIjtzOjYwOiIkMnkkMTAkV01EeFlDdUtkTVphQ2JpRDhleGRyZUxDdzZtNVcvTzg4SUI1N0p5T2o4MUQ3RkRiUFY4LjYiO30=', 1634176780);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `teams`
--

CREATE TABLE `teams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` char(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` char(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `calle` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `numero_interior` varchar(7) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `numero_exterior` varchar(7) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `colonia` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ciudad` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estado` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `codigo_postal` int(11) DEFAULT NULL,
  `email_contacto` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono` char(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` char(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `team_entrenadores`
--

CREATE TABLE `team_entrenadores` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `teams_id` bigint(20) UNSIGNED DEFAULT NULL,
  `entrenadores_id` bigint(20) UNSIGNED DEFAULT NULL,
  `status` char(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tutores`
--

CREATE TABLE `tutores` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombres` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellido_paterno` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellido_materno` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `calle` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `numero_interior` varchar(7) COLLATE utf8mb4_unicode_ci NOT NULL,
  `numero_exterior` varchar(7) COLLATE utf8mb4_unicode_ci NOT NULL,
  `colonia` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ciudad` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `codigo_postal` int(11) NOT NULL,
  `curp` varchar(19) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_de_nacimiento` date NOT NULL,
  `telefono` char(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alta_usuario` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `role` enum('Administrador','Entrenador','Alumno','Visitante') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Visitante',
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `role`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'Hugo Alejandro Zavala Vaca', 'hzavala@pmip.unam.mx', NULL, 'Administrador', '$2y$10$LGTCC6vofHi2nwmvWI2Rp.8IjlkNc89UFTVQIpwk9QNSE1I0BaQ.W', NULL, NULL, NULL, NULL, NULL, '2021-10-14 01:20:23', '2021-10-14 01:20:23'),
(2, 'Carlos Rodriguez Garcia', 'carlosroyiga@gmail.com', NULL, 'Administrador', '$2y$10$pLRKIuEQyyNjzISVB9CgbedIxfUmHC9oQYdT2xLqS14jhfEs1MHtK', NULL, NULL, NULL, NULL, NULL, '2021-10-14 01:45:22', '2021-10-14 01:45:22'),
(3, 'Luis Roberto Garcia Garcia', 'pacto.polar88@gmail.com', NULL, 'Administrador', '$2y$10$3iWbwpQHkHiAIhItR3MdF.QxPs6ZGih9W2euLfoP5nZMKwemewu0i', NULL, NULL, NULL, NULL, NULL, '2021-10-14 01:50:57', '2021-10-14 01:50:57'),
(4, 'Jorge Andres Garcia Garcia', 'georgeutm2014@gmail.com', NULL, 'Administrador', '$2y$10$WMDxYCuKdMZaCbiD8exdreLCw6m5W/O88IB57JyOj81D7FDbPV8.6', NULL, NULL, NULL, NULL, NULL, '2021-10-14 01:58:13', '2021-10-14 01:58:13');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `alumnos_email_unique` (`email`),
  ADD KEY `alumnos_tutores_id_index` (`tutores_id`);

--
-- Indices de la tabla `alumnos_pivotes`
--
ALTER TABLE `alumnos_pivotes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `alumnos_pivotes_alumnos_id_index` (`alumnos_id`),
  ADD KEY `alumnos_pivotes_users_id_index` (`users_id`);

--
-- Indices de la tabla `asistencias`
--
ALTER TABLE `asistencias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `asistencias_relacion_grupo_alumnos_index` (`relacion_grupo_alumnos`);

--
-- Indices de la tabla `entrenadores`
--
ALTER TABLE `entrenadores`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `entrenadores_email_unique` (`email`);

--
-- Indices de la tabla `entrenadores_pivotes`
--
ALTER TABLE `entrenadores_pivotes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `entrenadores_pivotes_users_id_index` (`users_id`),
  ADD KEY `entrenadores_pivotes_entrenadores_id_index` (`entrenadores_id`);

--
-- Indices de la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `grupos`
--
ALTER TABLE `grupos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `grupo_alumnos`
--
ALTER TABLE `grupo_alumnos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `grupo_alumnos_grupos_id_index` (`grupos_id`),
  ADD KEY `grupo_alumnos_alumnos_id_index` (`alumnos_id`),
  ADD KEY `grupo_alumnos_entrenadores_id_index` (`entrenadores_id`);

--
-- Indices de la tabla `historicos_deportivos`
--
ALTER TABLE `historicos_deportivos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `historicos_deportivos_alumnos_id_index` (`alumnos_id`),
  ADD KEY `historicos_deportivos_relacion_grupo_alumnos_index` (`relacion_grupo_alumnos`);

--
-- Indices de la tabla `historicos_medicos`
--
ALTER TABLE `historicos_medicos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `historicos_medicos_alumnos_id_index` (`alumnos_id`);

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
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indices de la tabla `registros_medicos`
--
ALTER TABLE `registros_medicos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `registros_medicos_alumnos_id_index` (`alumnos_id`);

--
-- Indices de la tabla `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indices de la tabla `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `team_entrenadores`
--
ALTER TABLE `team_entrenadores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `team_entrenadores_teams_id_index` (`teams_id`),
  ADD KEY `team_entrenadores_entrenadores_id_index` (`entrenadores_id`);

--
-- Indices de la tabla `tutores`
--
ALTER TABLE `tutores`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `alumnos_pivotes`
--
ALTER TABLE `alumnos_pivotes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `asistencias`
--
ALTER TABLE `asistencias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `entrenadores`
--
ALTER TABLE `entrenadores`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `entrenadores_pivotes`
--
ALTER TABLE `entrenadores_pivotes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `eventos`
--
ALTER TABLE `eventos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `grupos`
--
ALTER TABLE `grupos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `grupo_alumnos`
--
ALTER TABLE `grupo_alumnos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `historicos_deportivos`
--
ALTER TABLE `historicos_deportivos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `historicos_medicos`
--
ALTER TABLE `historicos_medicos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `registros_medicos`
--
ALTER TABLE `registros_medicos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `teams`
--
ALTER TABLE `teams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `team_entrenadores`
--
ALTER TABLE `team_entrenadores`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tutores`
--
ALTER TABLE `tutores`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD CONSTRAINT `alumnos_tutores_id_foreign` FOREIGN KEY (`tutores_id`) REFERENCES `tutores` (`id`);

--
-- Filtros para la tabla `alumnos_pivotes`
--
ALTER TABLE `alumnos_pivotes`
  ADD CONSTRAINT `alumnos_pivotes_alumnos_id_foreign` FOREIGN KEY (`alumnos_id`) REFERENCES `alumnos` (`id`),
  ADD CONSTRAINT `alumnos_pivotes_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `asistencias`
--
ALTER TABLE `asistencias`
  ADD CONSTRAINT `asistencias_relacion_grupo_alumnos_foreign` FOREIGN KEY (`relacion_grupo_alumnos`) REFERENCES `grupo_alumnos` (`id`);

--
-- Filtros para la tabla `entrenadores_pivotes`
--
ALTER TABLE `entrenadores_pivotes`
  ADD CONSTRAINT `entrenadores_pivotes_entrenadores_id_foreign` FOREIGN KEY (`entrenadores_id`) REFERENCES `entrenadores` (`id`),
  ADD CONSTRAINT `entrenadores_pivotes_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `grupo_alumnos`
--
ALTER TABLE `grupo_alumnos`
  ADD CONSTRAINT `grupo_alumnos_alumnos_id_foreign` FOREIGN KEY (`alumnos_id`) REFERENCES `alumnos` (`id`),
  ADD CONSTRAINT `grupo_alumnos_entrenadores_id_foreign` FOREIGN KEY (`entrenadores_id`) REFERENCES `entrenadores` (`id`),
  ADD CONSTRAINT `grupo_alumnos_grupos_id_foreign` FOREIGN KEY (`grupos_id`) REFERENCES `grupos` (`id`);

--
-- Filtros para la tabla `historicos_deportivos`
--
ALTER TABLE `historicos_deportivos`
  ADD CONSTRAINT `historicos_deportivos_alumnos_id_foreign` FOREIGN KEY (`alumnos_id`) REFERENCES `alumnos` (`id`),
  ADD CONSTRAINT `historicos_deportivos_relacion_grupo_alumnos_foreign` FOREIGN KEY (`relacion_grupo_alumnos`) REFERENCES `grupo_alumnos` (`id`);

--
-- Filtros para la tabla `historicos_medicos`
--
ALTER TABLE `historicos_medicos`
  ADD CONSTRAINT `historicos_medicos_alumnos_id_foreign` FOREIGN KEY (`alumnos_id`) REFERENCES `alumnos` (`id`);

--
-- Filtros para la tabla `registros_medicos`
--
ALTER TABLE `registros_medicos`
  ADD CONSTRAINT `registros_medicos_alumnos_id_foreign` FOREIGN KEY (`alumnos_id`) REFERENCES `alumnos` (`id`);

--
-- Filtros para la tabla `team_entrenadores`
--
ALTER TABLE `team_entrenadores`
  ADD CONSTRAINT `team_entrenadores_entrenadores_id_foreign` FOREIGN KEY (`entrenadores_id`) REFERENCES `entrenadores` (`id`),
  ADD CONSTRAINT `team_entrenadores_teams_id_foreign` FOREIGN KEY (`teams_id`) REFERENCES `teams` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
