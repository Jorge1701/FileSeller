CREATE DATABASE fileseller CHARACTER SET utf8 COLLATE utf8_general_ci;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


CREATE TABLE `archivos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(250) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  `tamanio` varchar(25) NOT NULL,
  `precio` float NOT NULL,
  `descripcion` varchar(1000) NOT NULL,
  `ubicacion` varchar(300) NOT NULL,
  `duenio` int(11) NOT NULL,
  `fecSubido` date NOT NULL,
  `horaSubido` time NOT NULL,
  `vendido` tinyint(1) NOT NULL DEFAULT '0',
  `fecVendido` date DEFAULT NULL,
  `horaVendido` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE `mensajes` (
  `id_m` int(11) NOT NULL,
  `id_desde` int(11) DEFAULT NULL,
  `id_para` int(11) DEFAULT NULL,
  `dia` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `mensaje` varchar(500) DEFAULT NULL,
  `visto` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(256) NOT NULL,
  `apellido` varchar(256) NOT NULL,
  `correo` varchar(256) NOT NULL,
  `contrasenia` varchar(256) NOT NULL,
  `imagen` varchar(256) NOT NULL,
  `activo` tinyint(1) NOT NULL,
  `fnac` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `archivos`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `mensajes`
  ADD PRIMARY KEY (`id_m`);

ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `correo` (`correo`);


ALTER TABLE `archivos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

ALTER TABLE `mensajes`
  MODIFY `id_m` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;
