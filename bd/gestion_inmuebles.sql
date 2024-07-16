-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-07-2023 a las 12:53:35
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gestion_inmuebles`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `arrendatario`
--

CREATE TABLE `arrendatario` (
  `arr_id` int(11) NOT NULL,
  `arr_nombres` varchar(50) DEFAULT NULL,
  `arr_apellidos` varchar(50) DEFAULT NULL,
  `arr_dni` varchar(8) DEFAULT NULL,
  `arr_edad` int(11) DEFAULT NULL,
  `arr_sexo` varchar(15) DEFAULT NULL,
  `arr_correo` varchar(100) NOT NULL,
  `arr_archivo` varchar(35) NOT NULL,
  `arr_archivo_tipo` varchar(30) NOT NULL,
  `arr_estado` varchar(20) DEFAULT NULL,
  `arr_sueldo` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `arrendatario`
--

INSERT INTO `arrendatario` (`arr_id`, `arr_nombres`, `arr_apellidos`, `arr_dni`, `arr_edad`, `arr_sexo`, `arr_correo`, `arr_archivo`, `arr_archivo_tipo`, `arr_estado`, `arr_sueldo`) VALUES
(46, 'Russell Nobaru', 'Cucho Cuevas', '71479871', 21, 'Masculino', 'ruselcucho@gmail.com', '71479871Russell Nobaru.pdf', 'Boleta de pago', 'Comprobado', 3500),
(47, 'Andrea', 'Rodriguez Lopez', '78776431', 20, 'Masculino', 'sofia.rodriguez@gmail.com', '78776431Andrea.pdf', 'Boleta de pago', 'Comprobado', 2500),
(48, 'Alonso', 'Garcia', '74859373', 19, 'Masculino', 'alonso@aea', '74859373Alonso.pdf', 'Boleta de pago', 'No comprobado', 4500),
(49, 'Armando', 'Perez Rojas', '78364738', 32, 'Masculino', 'armandoperez@gmail.com', '78364738Armando.pdf', 'Boleta de pago', 'No comprobado', 350),
(50, 'Jordan', 'Alberto', '12345678', 34, 'Masculino', 'jordan@gmail.com', '12345678Jordan.pdf', 'Boleta de pago', 'No comprobado', 3500),
(51, 'Aldair', 'Quinteros', '77774637', 34, 'Masculino', 'aldair@aaa', '77774637Aldair.pdf', 'Boleta de pago', 'Comprobado', 3500);

--
-- Disparadores `arrendatario`
--
DELIMITER $$
CREATE TRIGGER `generaUsuario` AFTER INSERT ON `arrendatario` FOR EACH ROW BEGIN
        INSERT INTO usuario (usuar_nombre, usuar_contraseña, usuar_rol, usuar_estado, usuar_arr_id )
        VALUES (NEW.arr_correo, LEFT(NEW.arr_dni, 4) , 'usuario', 'activado', NEW.arr_id);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bitacora`
--

CREATE TABLE `bitacora` (
  `bit_id` int(11) NOT NULL,
  `bit_tabla_afectada` varchar(20) DEFAULT NULL,
  `bit_registro_afectado_id` int(11) DEFAULT NULL,
  `bit_actividad_realizada` varchar(30) DEFAULT NULL,
  `bit_info_anterior` text DEFAULT NULL,
  `bit_info_nuevo` text DEFAULT NULL,
  `bit_f_modificacion` datetime DEFAULT current_timestamp(),
  `bit_usuar_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contrato`
--

CREATE TABLE `contrato` (
  `contr_id` int(11) NOT NULL,
  `contr_loc_id` int(11) DEFAULT NULL,
  `contr_arr_id` int(11) DEFAULT NULL,
  `contr_modalidad` varchar(25) DEFAULT NULL,
  `contr_vigencia` varchar(25) NOT NULL,
  `contr_estado` varchar(25) NOT NULL,
  `contr_f_inicio` date DEFAULT NULL,
  `contr_f_fin` date DEFAULT NULL,
  `contr_monto_alquiler` double DEFAULT NULL,
  `contr_dia_pago` int(11) DEFAULT NULL,
  `contr_penalidad` double(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `contrato`
--

INSERT INTO `contrato` (`contr_id`, `contr_loc_id`, `contr_arr_id`, `contr_modalidad`, `contr_vigencia`, `contr_estado`, `contr_f_inicio`, `contr_f_fin`, `contr_monto_alquiler`, `contr_dia_pago`, `contr_penalidad`) VALUES
(143, 67, 47, 'Edificio', 'No vigente', 'Alquilado', '2023-07-02', '5678-04-23', 690, 2, NULL),
(144, 68, 47, 'Edificio', 'No vigente', 'Alquilado', '2023-07-02', '5678-04-23', 690, 2, NULL),
(145, 69, 47, 'Edificio', 'No vigente', 'Alquilado', '2023-07-02', '5678-04-23', 690, 2, NULL),
(146, 70, 47, 'Edificio', 'No vigente', 'Alquilado', '2023-07-02', '5678-04-23', 690, 2, NULL),
(147, 71, 47, 'Edificio', 'No vigente', 'Alquilado', '2023-07-02', '5678-04-23', 690, 2, NULL),
(148, 72, 47, 'Edificio', 'No vigente', 'Alquilado', '2023-07-02', '5678-04-23', 690, 2, NULL),
(150, 73, 48, 'Piso', 'Vigente', 'Alquilado', '2023-07-03', '4567-03-12', 459.16666666667, 3, NULL),
(151, 74, 48, 'Piso', 'Vigente', 'Alquilado', '2023-07-03', '4567-03-12', 459.16666666667, 3, NULL),
(152, 75, 48, 'Piso', 'Vigente', 'Alquilado', '2023-07-03', '4567-03-12', 459.16666666667, 3, NULL),
(157, 76, 47, 'Local', 'Vigente', 'Alquilado', '2023-07-03', '2023-07-11', 400, 3, NULL),
(158, 91, 47, 'Local', 'Vigente', 'Alquilado', '2023-07-04', '2024-07-04', 800, 4, NULL),
(159, 67, 47, 'Piso', 'Vigente', 'Alquilado', '2023-07-04', '2024-07-04', 475, 4, NULL),
(160, 68, 47, 'Piso', 'Vigente', 'Alquilado', '2023-07-04', '2024-07-04', 475, 4, NULL),
(161, 69, 47, 'Piso', 'Vigente', 'Alquilado', '2023-07-04', '2024-07-04', 475, 4, NULL),
(162, 95, 47, 'Edificio', 'No vigente', 'Alquilado', '2023-07-05', '2023-10-05', 240, 5, NULL),
(165, 94, 47, 'Piso', 'Vigente', 'Alquilado', '2023-07-06', '2023-09-05', 855, 6, NULL),
(166, 100, 51, 'Edificio', 'Vigente', 'Alquilado', '2023-07-06', '2023-10-05', 630, 6, NULL),
(167, 101, 51, 'Edificio', 'Vigente', 'Alquilado', '2023-07-06', '2023-10-05', 630, 6, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes`
--

CREATE TABLE `imagenes` (
  `img_id` int(11) NOT NULL,
  `img_imagen` longblob DEFAULT NULL,
  `img_tipo_imagen` varchar(15) DEFAULT NULL,
  `img_inm_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inmueble`
--

CREATE TABLE `inmueble` (
  `inm_id` int(11) NOT NULL,
  `inm_tipo` varchar(25) NOT NULL,
  `inm_ubicacion` text DEFAULT NULL,
  `inm_detalle` varchar(150) NOT NULL,
  `inm_n_pisos` int(11) DEFAULT NULL,
  `inm_est_alquilado` varchar(50) NOT NULL,
  `imn_est_alta` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `inmueble`
--

INSERT INTO `inmueble` (`inm_id`, `inm_tipo`, `inm_ubicacion`, `inm_detalle`, `inm_n_pisos`, `inm_est_alquilado`, `imn_est_alta`) VALUES
(84, 'Edificio', 'Jr. Loreto #432', 'Edificio con una fachada de estilo neoclásico', 3, 'No alquilado', 'De alta'),
(85, 'Est. comercial', 'Av. Libertadores #45', 'Establecimiento comercial de venta de ropa', 2, 'No alquilado', 'De alta'),
(93, 'Edificio', 'Jr. Nogales #43', '25m x 25m. Ideal para producción industrial de liquidos.', 2, 'No alquilado', 'De baja'),
(94, 'Oficina', 'Av. Helena Torres #409', 'Oficina para un dentista', 1, 'No alquilado', 'De alta'),
(95, 'Edificio', 'Av. Los Nogales', 'Edificio con estilo barroco', 1, 'No alquilado', 'De alta'),
(96, 'Edificio', 'Jr. Los Erl #293', 'Inmueble de 20m x 20m. A espaldas del colegio ...', 3, 'No alquilado', 'De alta'),
(97, 'Edificio', 'Av. Flores #42', 'Edificio de venta de flores sintéticas', 2, 'No alquilado', 'De alta'),
(98, 'Edificio', 'Av. Los Robles #45', 'Medidas: 25m x 25m', 3, 'No alquilado', 'De alta'),
(99, 'Edificio', 'Av. Ferr N°123', 'Inmueble con estilo incaico', 1, 'No alquilado', 'De alta');

--
-- Disparadores `inmueble`
--
DELIMITER $$
CREATE TRIGGER `generaPisos` AFTER INSERT ON `inmueble` FOR EACH ROW BEGIN
    DECLARE i INT;
    SET i = 1;

    WHILE (i <= NEW.inm_n_pisos) DO
        INSERT INTO piso (pis_inm_id, pis_numero, pis_est_alquilado, pis_est_alta)
        VALUES (NEW.inm_id, i, NEW.inm_est_alquilado, NEW.imn_est_alta);
        SET i = i + 1;
    END WHILE;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `local`
--

CREATE TABLE `local` (
  `loc_id` int(11) NOT NULL,
  `loc_pis_id` int(11) DEFAULT NULL,
  `loc_numero` int(11) DEFAULT NULL,
  `loc_detalle` text NOT NULL,
  `loc_est_alquilado` varchar(50) NOT NULL,
  `loc_est_alta` varchar(25) NOT NULL,
  `loc_precio` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `local`
--

INSERT INTO `local` (`loc_id`, `loc_pis_id`, `loc_numero`, `loc_detalle`, `loc_est_alquilado`, `loc_est_alta`, `loc_precio`) VALUES
(67, 170, 1, 'Escudero', 'Alquilado', 'De alta', 500),
(68, 170, 2, 'Espaldero', 'Alquilado', 'De alta', 600),
(69, 170, 3, 'Armaduras', 'Alquilado', 'De alta', 400),
(70, 171, 1, 'Hechizos', 'No alquilado', 'De alta', 900),
(71, 171, 2, 'Encantamientos', 'No alquilado', 'De alta', 700),
(72, 172, 1, 'Arena de pelea', 'No alquilado', 'De alta', 1500),
(73, 173, 1, 'Ropa de varón', 'Alquilado', 'De alta', 400),
(74, 173, 2, 'Ropa de mujer', 'Alquilado', 'De alta', 500),
(75, 173, 3, 'Ropa de niños', 'Alquilado', 'De alta', 550),
(76, 174, 1, 'Calsado', 'Alquilado', 'De alta', 400),
(77, 174, 2, 'Ropa de verano', 'No alquilado', 'De alta', 800),
(90, 190, 1, 'Produccion de gaseosas', 'No alquilado', 'De alta', 500),
(91, 190, 2, 'Producción de licores', 'Alquilado', 'De alta', 800),
(92, 191, 1, 'Producción de yougurt', 'No alquilado', 'De alta', 600),
(93, 191, 2, 'Producción de cerverza', 'No alquilado', 'De alta', 1000),
(94, 192, 1, 'Local ambientado correctamente para dentista. 5 cuartos de 4m x 5m ', 'Alquilado', 'De alta', 900),
(95, 194, 1, 'Inmueble equipado con maquinaria industrial.', 'No alquilado', 'De alta', 800),
(98, 197, 1, 'Local para Flores de verano Español', 'No alquilado', 'De alta', 500),
(100, 199, 1, 'Local para jardinería', 'Alquilado', 'De alta', 600),
(101, 199, 2, 'Local de pinturas', 'Alquilado', 'De alta', 800),
(107, 202, 1, 'Comida incaica', 'No alquilado', 'De alta', 900),
(108, 202, 2, 'Restaurante central', 'No alquilado', 'De alta', 2500);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `piso`
--

CREATE TABLE `piso` (
  `pis_id` int(11) NOT NULL,
  `pis_inm_id` int(11) DEFAULT NULL,
  `pis_numero` int(11) DEFAULT NULL,
  `pis_n_locales` int(11) DEFAULT NULL,
  `pis_est_alquilado` varchar(25) NOT NULL,
  `pis_est_alta` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `piso`
--

INSERT INTO `piso` (`pis_id`, `pis_inm_id`, `pis_numero`, `pis_n_locales`, `pis_est_alquilado`, `pis_est_alta`) VALUES
(170, 84, 1, 3, 'Alquilado', 'De alta'),
(171, 84, 2, 2, 'No alquilado', 'De alta'),
(172, 84, 3, 1, 'No alquilado', 'De alta'),
(173, 85, 1, 3, 'Alquilado', 'De alta'),
(174, 85, 2, 2, 'Alquilado', 'De alta'),
(190, 93, 1, 2, 'Alquilado', 'De alta'),
(191, 93, 2, 2, 'No alquilado', 'De alta'),
(192, 94, 1, 1, 'Alquilado', 'De alta'),
(193, 95, 1, NULL, 'No alquilado', 'De alta'),
(194, 96, 1, 3, 'No alquilado', 'De alta'),
(197, 97, 1, 2, 'No alquilado', 'De alta'),
(199, 98, 1, 2, 'Alquilado', 'De alta'),
(202, 99, 1, 2, 'No alquilado', 'De alta');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `usuar_id` int(11) NOT NULL,
  `usuar_nombre` varchar(50) NOT NULL,
  `usuar_contraseña` varchar(50) NOT NULL,
  `usuar_rol` varchar(20) NOT NULL,
  `usuar_estado` varchar(20) NOT NULL,
  `usuar_arr_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`usuar_id`, `usuar_nombre`, `usuar_contraseña`, `usuar_rol`, `usuar_estado`, `usuar_arr_id`) VALUES
(1, 'ruselcucho@gmail.com', '7147', 'admin', 'activado', 46),
(35, 'sofia.rodriguez@gmail.com', '7877', 'usuario', 'activado', 47),
(36, 'alonso@aea', '7485', 'usuario', 'activado', 48),
(37, 'armandoperez@gmail.com', '7836', 'usuario', 'activado', 49),
(38, 'jordan@gmail.com', '1234', 'usuario', 'activado', 50),
(39, 'aldair@aaa', '7777', 'usuario', 'activado', 51);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `arrendatario`
--
ALTER TABLE `arrendatario`
  ADD PRIMARY KEY (`arr_id`),
  ADD UNIQUE KEY `arr_correo` (`arr_correo`),
  ADD UNIQUE KEY `arr_dni` (`arr_dni`);

--
-- Indices de la tabla `bitacora`
--
ALTER TABLE `bitacora`
  ADD PRIMARY KEY (`bit_id`),
  ADD KEY `bit_usuar_id` (`bit_usuar_id`);

--
-- Indices de la tabla `contrato`
--
ALTER TABLE `contrato`
  ADD PRIMARY KEY (`contr_id`),
  ADD KEY `contr_arr_id` (`contr_arr_id`),
  ADD KEY `contr_loc_id` (`contr_loc_id`);

--
-- Indices de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  ADD PRIMARY KEY (`img_id`),
  ADD KEY `img_inm_id` (`img_inm_id`);

--
-- Indices de la tabla `inmueble`
--
ALTER TABLE `inmueble`
  ADD PRIMARY KEY (`inm_id`);

--
-- Indices de la tabla `local`
--
ALTER TABLE `local`
  ADD PRIMARY KEY (`loc_id`),
  ADD KEY `loc_pis_id` (`loc_pis_id`);

--
-- Indices de la tabla `piso`
--
ALTER TABLE `piso`
  ADD PRIMARY KEY (`pis_id`),
  ADD KEY `pis_inm_id` (`pis_inm_id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`usuar_id`),
  ADD KEY `usuar_arr_id` (`usuar_arr_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `arrendatario`
--
ALTER TABLE `arrendatario`
  MODIFY `arr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT de la tabla `bitacora`
--
ALTER TABLE `bitacora`
  MODIFY `bit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de la tabla `contrato`
--
ALTER TABLE `contrato`
  MODIFY `contr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=168;

--
-- AUTO_INCREMENT de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  MODIFY `img_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `inmueble`
--
ALTER TABLE `inmueble`
  MODIFY `inm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT de la tabla `local`
--
ALTER TABLE `local`
  MODIFY `loc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT de la tabla `piso`
--
ALTER TABLE `piso`
  MODIFY `pis_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=203;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `usuar_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `bitacora`
--
ALTER TABLE `bitacora`
  ADD CONSTRAINT `bitacora_ibfk_1` FOREIGN KEY (`bit_usuar_id`) REFERENCES `usuario` (`usuar_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `contrato`
--
ALTER TABLE `contrato`
  ADD CONSTRAINT `contrato_ibfk_2` FOREIGN KEY (`contr_arr_id`) REFERENCES `arrendatario` (`arr_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `contrato_ibfk_3` FOREIGN KEY (`contr_loc_id`) REFERENCES `local` (`loc_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `imagenes`
--
ALTER TABLE `imagenes`
  ADD CONSTRAINT `imagenes_ibfk_1` FOREIGN KEY (`img_inm_id`) REFERENCES `inmueble` (`inm_id`);

--
-- Filtros para la tabla `local`
--
ALTER TABLE `local`
  ADD CONSTRAINT `local_ibfk_1` FOREIGN KEY (`loc_pis_id`) REFERENCES `piso` (`pis_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `piso`
--
ALTER TABLE `piso`
  ADD CONSTRAINT `piso_ibfk_1` FOREIGN KEY (`pis_inm_id`) REFERENCES `inmueble` (`inm_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`usuar_arr_id`) REFERENCES `arrendatario` (`arr_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
