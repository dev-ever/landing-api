-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 10-07-2025 a las 21:22:24
-- Versión del servidor: 10.11.10-MariaDB-log
-- Versión de PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `u725112231_contactos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_backup`
--

CREATE TABLE `tb_backup` (
  `idback` int(11) NOT NULL,
  `backup` varchar(255) NOT NULL,
  `observations` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `link` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `tb_backup`
--

INSERT INTO `tb_backup` (`idback`, `backup`, `observations`, `created_at`, `link`, `user_id`) VALUES
(1, 'u725112231_jwf_20250709195741.sql', 'Backup: Wednesday, July 9, 2025', '2025-07-09 19:57:41', 'backups/u725112231_jwf_20250709195741.sql', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_contacts`
--

CREATE TABLE `tb_contacts` (
  `idContacto` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telefono` varchar(50) NOT NULL,
  `mensaje` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tb_contacts`
--

INSERT INTO `tb_contacts` (`idContacto`, `nombre`, `email`, `telefono`, `mensaje`, `created_at`) VALUES
(1, 'Ever Sanchez Ramirez', 'dev.lap@gmail.com', '5568861175', 'Hola, buen día me gustaría saber más sobre sus servicios de desarrollo para pequeñas empresas, y el lugar de donde se ubican, saludos.', '2025-07-09 19:52:41'),
(3, 'Alfredo Gutierrez Sánchez', 'disenio@hotmail.com', '45345345345', 'Más información para desarrollos web', '2025-07-09 20:05:57'),
(4, 'Maria Perez Gonález', 'devecode@hotmail.com', '55 55 88 58 55', 'Más informes por correo de favor', '2025-07-09 20:12:33'),
(5, 'JoseFina Martinez', 'jos@hotmail.com', '45345344643', 'Más informes de sus servicios', '2025-07-09 20:19:32'),
(6, 'Jose Pérez Sánchez', 'jolap@gmail.com', '56 87 32 32 22', 'Requiero de cotización para el desarrollo de una app para gestionar tickets de servicios, especificamente para soporte de impresoras', '2025-07-09 20:21:12'),
(7, 'Mario Colin Sánchez', 'mcolin@gmail.com', '456 32 24 234', 'Desarrollan aplicaciones mobiles?', '2025-07-09 20:22:21'),
(8, 'Pedro Alba Colin', 'pedrito@gmail.com', '712 234 2342', 'Requiero de cotización para el desarrollo de una pagina web dinamica para un negocio de venta de articulos', '2025-07-09 20:23:53'),
(9, 'Mathilde Sobrino', 'admin@gmail.com', '45345345345', 'Precios de sus desarrollos', '2025-07-09 20:24:36'),
(10, 'Angel Sánchez', 'angels@gmail.com', '75212223232', 'Precios de sus servicios', '2025-07-09 20:25:47'),
(11, 'Andrés Gutierréz', 'madres@gmail.com', '45345345345', 'Hola, buen dia requiero una cotización para el desarrollo de un sitio web de estilimos dinámico. Gracias', '2025-07-09 20:27:31'),
(12, 'Gerardo Lugo Arce', 'gers@hotmail.com', '45345345345', 'Infomres de más servicios', '2025-07-09 20:30:26'),
(13, 'Carmen Liz Adne', 'carmen@gmail.com', '55345545355', 'Me gustaría saber como establecen sus cotizaciones de desarrollos', '2025-07-09 21:04:18'),
(14, 'Everardo Ramirez', 'develop@hotmail.com', '5563245212', 'Cotización desde un sitio web', '2025-07-10 02:49:18');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_logs`
--

CREATE TABLE `tb_logs` (
  `idLog` int(11) NOT NULL,
  `action` varchar(255) NOT NULL,
  `type` varchar(150) NOT NULL,
  `user_id` int(11) NOT NULL,
  `private_id` varchar(50) NOT NULL,
  `public_id` varchar(50) NOT NULL,
  `eject` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_template`
--

CREATE TABLE `tb_template` (
  `idTemplate` int(11) NOT NULL,
  `folio` varchar(50) NOT NULL,
  `company` varchar(255) NOT NULL,
  `commCompany` varchar(255) NOT NULL,
  `companyIde` varchar(50) NOT NULL,
  `logo` varchar(250) NOT NULL,
  `favicon` varchar(50) NOT NULL,
  `address` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `tb_template`
--

INSERT INTO `tb_template` (`idTemplate`, `folio`, `company`, `commCompany`, `companyIde`, `logo`, `favicon`, `address`, `user_id`, `created_at`) VALUES
(1, 'F-0001', 'TI Services', 'Agencia de Servicios Informaticos', 'ASUS8765423HG', 'view/img/template/ASUS8765423HG/695.png', 'view/img/template/ASUS8765423HG/973.png', 'Mexico, Mex', 1, '2025-07-10 02:50:46');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_users`
--

CREATE TABLE `tb_users` (
  `idUser` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `user` varchar(150) NOT NULL,
  `email` varchar(250) NOT NULL,
  `photo` varchar(250) NOT NULL,
  `password` varchar(350) NOT NULL,
  `profile` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  `state` int(11) NOT NULL,
  `lastLogin` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `tb_users`
--

INSERT INTO `tb_users` (`idUser`, `name`, `user`, `email`, `photo`, `password`, `profile`, `created_at`, `user_id`, `state`, `lastLogin`) VALUES
(1, 'Administrador del Sistema', 'admin', 'root@emauro.com.mx', 'view/img/users/admin/670.jpg', '$2a$07$asxx54ahjppf45sd87a5auXBm1Vr2M1NV5t/zNQtGHGpS5fFirrbG', 1, '2025-06-30 23:35:19', 1, 1, '2025-07-10 07:02:35');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tb_backup`
--
ALTER TABLE `tb_backup`
  ADD PRIMARY KEY (`idback`);

--
-- Indices de la tabla `tb_contacts`
--
ALTER TABLE `tb_contacts`
  ADD PRIMARY KEY (`idContacto`);

--
-- Indices de la tabla `tb_logs`
--
ALTER TABLE `tb_logs`
  ADD PRIMARY KEY (`idLog`);

--
-- Indices de la tabla `tb_template`
--
ALTER TABLE `tb_template`
  ADD PRIMARY KEY (`idTemplate`);

--
-- Indices de la tabla `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`idUser`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tb_backup`
--
ALTER TABLE `tb_backup`
  MODIFY `idback` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tb_contacts`
--
ALTER TABLE `tb_contacts`
  MODIFY `idContacto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `tb_logs`
--
ALTER TABLE `tb_logs`
  MODIFY `idLog` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_template`
--
ALTER TABLE `tb_template`
  MODIFY `idTemplate` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
