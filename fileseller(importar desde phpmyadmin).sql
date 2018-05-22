SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

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

CREATE TABLE `comentarios` (
  `id` int(11) NOT NULL,
  `id_archivo` int(11) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `comentario` varchar(256) DEFAULT NULL,
  `duenio` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `mensajes` (
  `id_m` int(11) NOT NULL,
  `id_desde` int(11) DEFAULT NULL,
  `id_para` int(11) DEFAULT NULL,
  `dia` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `mensaje` varchar(500) DEFAULT NULL,
  `visto` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `notificaciones` (
  `id` int(11) NOT NULL,
  `vista` tinyint(1) NOT NULL DEFAULT '0',
  `contenido` varchar(256) NOT NULL,
  `idusuario` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `activa` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `seguidos` (
  `idSeguidor` int(11) NOT NULL,
  `idSeguido` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `strikes` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `comentario` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(256) NOT NULL,
  `apellido` varchar(256) NOT NULL,
  `correo` varchar(256) NOT NULL,
  `contrasenia` varchar(256) NOT NULL,
  `imagen` varchar(256) NOT NULL,
  `activo` tinyint(1) NOT NULL,
  `fnac` date NOT NULL,
  `admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `archivos`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `mensajes`
  ADD PRIMARY KEY (`id_m`);

ALTER TABLE `notificaciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idusuario` (`idusuario`);

ALTER TABLE `seguidos`
  ADD PRIMARY KEY (`idSeguidor`,`idSeguido`),
  ADD KEY `idSeguido` (`idSeguido`);

ALTER TABLE `strikes`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `archivos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

ALTER TABLE `comentarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

ALTER TABLE `mensajes`
  MODIFY `id_m` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `notificaciones`
--
ALTER TABLE `notificaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `strikes`
--
ALTER TABLE `strikes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `notificaciones`
--
ALTER TABLE `notificaciones`
  ADD CONSTRAINT `notificaciones_ibfk_1` FOREIGN KEY (`idusuario`) REFERENCES `usuarios` (`id`);

--
-- Constraints for table `seguidos`
--
ALTER TABLE `seguidos`
  ADD CONSTRAINT `seguidos_ibfk_1` FOREIGN KEY (`idSeguido`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `seguidos_ibfk_2` FOREIGN KEY (`idSeguidor`) REFERENCES `usuarios` (`id`);
COMMIT;