-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-08-2023 a las 22:32:53
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `latest`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignacion_vehiculo`
--

CREATE TABLE `asignacion_vehiculo` (
  `id_asignacion` int(11) NOT NULL,
  `fecha_asignacion` date NOT NULL,
  `id_vehiculo_fk` int(11) NOT NULL,
  `id_usuario_fk` int(11) NOT NULL,
  `estado_asignacion` enum('Activo','Inactivo') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `correos`
--

CREATE TABLE `correos` (
  `id_correo` int(11) NOT NULL,
  `titulo_correo` text NOT NULL,
  `mensaje_correo` text NOT NULL,
  `archivo_correo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE `empresa` (
  `id_empresa` char(15) NOT NULL,
  `nombre_empresa` text NOT NULL,
  `siglas_empresa` varchar(20) NOT NULL,
  `direccion_empresa` varchar(400) NOT NULL,
  `telefono_empresa` varchar(14) NOT NULL,
  `correo_empresa` varchar(200) NOT NULL,
  `gerente_empresa` varchar(200) NOT NULL,
  `cumple_gerente` date NOT NULL,
  `cedula_gerente` varchar(20) NOT NULL,
  `logotipo_empresa` text NOT NULL,
  `tipo_empresa` enum('Alquiler','Venta','Cliente','') NOT NULL,
  `fecha_inicio` date DEFAULT NULL,
  `fecha_fin` date DEFAULT NULL,
  `estado_empresa` enum('Activa','Inactiva','','') NOT NULL,
  `actividad_empresa` text NOT NULL,
  `codigo_ciiu_empresa` int(11) NOT NULL,
  `codigo_arl_empresa` varchar(100) NOT NULL,
  `riesgo_empresa` enum('1','2','3','4','5') NOT NULL,
  `registro_fotografico` enum('si','no') NOT NULL,
  `firma_gerente` text NOT NULL,
  `cedula_representante` varchar(20) NOT NULL,
  `nombre_representante` varchar(200) NOT NULL,
  `firma_representante` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `empresa`
--

INSERT INTO `empresa` (`id_empresa`, `nombre_empresa`, `siglas_empresa`, `direccion_empresa`, `telefono_empresa`, `correo_empresa`, `gerente_empresa`, `cumple_gerente`, `cedula_gerente`, `logotipo_empresa`, `tipo_empresa`, `fecha_inicio`, `fecha_fin`, `estado_empresa`, `actividad_empresa`, `codigo_ciiu_empresa`, `codigo_arl_empresa`, `riesgo_empresa`, `registro_fotografico`, `firma_gerente`, `cedula_representante`, `nombre_representante`, `firma_representante`) VALUES
('1', 'Seguridad Dissel Ltda', 'SD', 'Direccion', '12345', 'correo@gmail.com', 'Nombre gerente', '2012-02-24', '000', 'logo.png', 'Alquiler', '2022-02-01', '2022-02-28', 'Activa', '1', 1, '1', '1', 'si', '', '', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro`
--

CREATE TABLE `registro` (
  `id_registro` int(11) NOT NULL,
  `placa_casco` varchar(100) NOT NULL,
  `fecha_registro` datetime NOT NULL DEFAULT current_timestamp(),
  `baja` enum('C','NC') NOT NULL,
  `alta` enum('C','NC') NOT NULL,
  `stop` enum('C','NC') NOT NULL,
  `direccionales` enum('C','NC') NOT NULL,
  `pito` enum('C','NC') NOT NULL,
  `frenos` enum('C','NC') NOT NULL,
  `guaya_acelerador` enum('C','NC') NOT NULL,
  `guaya_clutch` enum('C','NC') NOT NULL,
  `estado_llantas` enum('C','NC') NOT NULL,
  `nivel_aceite` enum('C','NC') NOT NULL,
  `kit_arrastre` enum('C','NC') NOT NULL,
  `chaleco` enum('C','NC') NOT NULL,
  `espejos` enum('C','NC') NOT NULL,
  `combustible` enum('C','NC') NOT NULL,
  `boton_panico` enum('C','NC') NOT NULL,
  `soat` enum('C','NC') NOT NULL,
  `tecnomecanica` enum('C','NC') NOT NULL,
  `tarjeta_propiedad` enum('C','NC') NOT NULL,
  `observaciones` text NOT NULL,
  `firma` varchar(255) NOT NULL,
  `id_vehiculo_a_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tokens`
--

CREATE TABLE `tokens` (
  `id_token` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `token` text NOT NULL,
  `codigo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(4) NOT NULL,
  `identificacion` varchar(15) NOT NULL,
  `username` varchar(225) NOT NULL,
  `firstname` varchar(225) NOT NULL,
  `lastname` varchar(20) DEFAULT NULL,
  `email` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `role` varchar(225) NOT NULL DEFAULT 'user',
  `id_empresa_fk` char(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `identificacion`, `username`, `firstname`, `lastname`, `email`, `password`, `role`, `id_empresa_fk`) VALUES
(37, '88', 'superadmin', 'Administrador', '', 'dissel@gmail.com', '$2y$10$ZgiHzXbn1coS1LHZgLGrNuH3RVdbFtGs7XJ9iH6jA0CCeHz6ZW7Si', 'superadmin', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculo`
--

CREATE TABLE `vehiculo` (
  `id_vehiculo` int(11) NOT NULL,
  `placa` varchar(20) NOT NULL,
  `color` text NOT NULL,
  `marca` varchar(50) NOT NULL,
  `motor` text NOT NULL,
  `modelo` text NOT NULL,
  `soat` date NOT NULL,
  `tecnomecanica` date NOT NULL,
  `rodamiento` enum('Si','No') NOT NULL,
  `ciudad` varchar(50) NOT NULL,
  `estado` enum('Habilitado','Inhabilitado','Reparacion') NOT NULL,
  `observaciones_vehiculo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vencimiento`
--

CREATE TABLE `vencimiento` (
  `id_vencimiento` int(11) NOT NULL,
  `fecha_vencimiento` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `asignacion_vehiculo`
--
ALTER TABLE `asignacion_vehiculo`
  ADD PRIMARY KEY (`id_asignacion`);

--
-- Indices de la tabla `correos`
--
ALTER TABLE `correos`
  ADD PRIMARY KEY (`id_correo`);

--
-- Indices de la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`id_empresa`);

--
-- Indices de la tabla `registro`
--
ALTER TABLE `registro`
  ADD PRIMARY KEY (`id_registro`),
  ADD KEY `id_vehiculo_fk` (`id_vehiculo_a_fk`);

--
-- Indices de la tabla `tokens`
--
ALTER TABLE `tokens`
  ADD PRIMARY KEY (`id_token`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `id_empresa_fk` (`id_empresa_fk`);

--
-- Indices de la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  ADD PRIMARY KEY (`id_vehiculo`);

--
-- Indices de la tabla `vencimiento`
--
ALTER TABLE `vencimiento`
  ADD PRIMARY KEY (`id_vencimiento`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `asignacion_vehiculo`
--
ALTER TABLE `asignacion_vehiculo`
  MODIFY `id_asignacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `correos`
--
ALTER TABLE `correos`
  MODIFY `id_correo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `registro`
--
ALTER TABLE `registro`
  MODIFY `id_registro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `tokens`
--
ALTER TABLE `tokens`
  MODIFY `id_token` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT de la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  MODIFY `id_vehiculo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `vencimiento`
--
ALTER TABLE `vencimiento`
  MODIFY `id_vencimiento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
