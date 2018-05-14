DROP DATABASE fileseller;
CREATE DATABASE fileseller CHARACTER SET utf8 COLLATE utf8_general_ci;


-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2018 at 01:58 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fileseller`
--

-- --------------------------------------------------------

--
-- Table structure for table `archivos`
--

CREATE TABLE `archivos` (
  `id` int(11) NOT NULL,
  `img` varchar(250) NOT NULL,
  `nombre` varchar(250) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  `tamanio` varchar(25) NOT NULL,
  `precio` varchar(20) NOT NULL,
  `descripcion` varchar(1000) NOT NULL,
  `ubicacion` varchar(300) NOT NULL,
  `duenio` int(11) NOT NULL,
  `fecSubido` date NOT NULL,
  `horaSubido` time NOT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `archivos`
--

INSERT INTO `archivos` (`id`, `img`, `nombre`, `tipo`, `tamanio`, `precio`, `descripcion`, `ubicacion`, `duenio`, `fecSubido`, `horaSubido`, `activo`) VALUES
(1, 'img/iconos_archivos/def_file.png', 'coso', 'ico', '30.2 KB', '$U 2', '', 'uploads/13_2018-05-03_20-35-44_favicon.ico', 13, '2018-05-03', '20:35:44', 1),
(2, 'img/iconos_archivos/def_file.png', 'coso', 'ico', '30.2 KB', '$U 2', '', 'uploads/13_2018-05-03_20-37-45_favicon.ico', 13, '2018-05-03', '20:37:45', 1),
(3, 'img/iconos_archivos/def_file.png', 'al', 'php', '260 Bytes', '$U 12', 'dsalk', 'uploads/12_2018-05-03_21-42-16_index.php', 12, '2018-05-03', '21:42:16', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cuentas`
--

CREATE TABLE `cuentas` (
  `nroTarjeta` bigint(20) NOT NULL,
  `fecVenc` varchar(50) NOT NULL,
  `cvv` int(3) NOT NULL,
  `duenio` int(11) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cuentas`
--

INSERT INTO `cuentas` (`nroTarjeta`, `fecVenc`, `cvv`, `duenio`, `id`) VALUES
(4168451654865112, '09-1998', 123, 13, 1);

-- --------------------------------------------------------

--
-- Table structure for table `mensajes`
--

CREATE TABLE `mensajes` (
  `id_m` int(11) NOT NULL,
  `id_desde` int(11) DEFAULT NULL,
  `id_para` int(11) DEFAULT NULL,
  `dia` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `mensaje` varchar(500) DEFAULT NULL,
  `visto` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mensajes`
--

INSERT INTO `mensajes` (`id_m`, `id_desde`, `id_para`, `dia`, `hora`, `mensaje`, `visto`) VALUES
(1, 12, 12, '2018-05-04', '01:57:59', 'glm', 1),
(2, 12, 12, '2018-05-04', '01:58:03', 's,fbsdk', 1),
(3, 12, 12, '2018-05-04', '01:58:05', 'asdasdas', 1),
(4, 12, 12, '2018-05-04', '01:58:07', 'sda', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notificaciones`
--

CREATE TABLE `notificaciones` (
  `id` int(11) NOT NULL,
  `vista` tinyint(1) NOT NULL DEFAULT '0',
  `contenido` varchar(256) NOT NULL,
  `idusuario` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `activa` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `notificaciones`
--

INSERT INTO `notificaciones` (`id`, `vista`, `contenido`, `idusuario`, `fecha`, `hora`, `activa`) VALUES
(1, 0, 'Su archivo a sido borrado por contenido indebido', 12, '2018-05-15', '05:06:19', 1),
(2, 0, 'Otra notificacion', 12, '2018-05-09', '13:16:22', 1);

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(256) NOT NULL,
  `apellido` varchar(256) NOT NULL,
  `correo` varchar(256) NOT NULL,
  `contrasenia` varchar(256) NOT NULL,
  `imagen` varchar(256) NOT NULL,
  `activo` tinyint(1) NOT NULL,
  `fnac` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellido`, `correo`, `contrasenia`, `imagen`, `activo`, `fnac`) VALUES
(11, '', '', '', '', '', 1, '0000-00-00'),
(12, 'Ale', 'Pe', 'alejandropeculio@gmail.com', '356a192b7913b04c54574d18c28d46e6395428ab', 'uploads/favicon.ico', 1, '1950-01-25'),
(13, 'ale', 'pecu', 'alepecu@gmail.co', '356a192b7913b04c54574d18c28d46e6395428ab', 'img/user-default.png', 0, '1998-02-12'),
(14, 'Luis', 'Etcheabrne', 'luis@gmail.com', '356a192b7913b04c54574d18c28d46e6395428ab', 'img/user-default.png', 1, '1989-01-12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `archivos`
--
ALTER TABLE `archivos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cuentas`
--
ALTER TABLE `cuentas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nroTarjeta` (`nroTarjeta`),
  ADD KEY `duenio` (`duenio`);

--
-- Indexes for table `mensajes`
--
ALTER TABLE `mensajes`
  ADD PRIMARY KEY (`id_m`);

--
-- Indexes for table `notificaciones`
--
ALTER TABLE `notificaciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idusuario` (`idusuario`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `archivos`
--
ALTER TABLE `archivos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cuentas`
--
ALTER TABLE `cuentas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mensajes`
--
ALTER TABLE `mensajes`
  MODIFY `id_m` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `notificaciones`
--
ALTER TABLE `notificaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cuentas`
--
ALTER TABLE `cuentas`
  ADD CONSTRAINT `cuentas_ibfk_1` FOREIGN KEY (`duenio`) REFERENCES `usuarios` (`id`);

--
-- Constraints for table `notificaciones`
--
ALTER TABLE `notificaciones`
  ADD CONSTRAINT `notificaciones_ibfk_1` FOREIGN KEY (`idusuario`) REFERENCES `usuarios` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
