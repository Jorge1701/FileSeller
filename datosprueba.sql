-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 02, 2018 at 05:35 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

CREATE DATABASE IF NOT EXISTS `fileseller` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `fileseller`;

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
  `moneda` varchar(20) NOT NULL,
  `descripcion` varchar(1000) NOT NULL,
  `ubicacion` varchar(300) NOT NULL,
  `duenio` int(11) NOT NULL,
  `fecSubido` datetime(6) NOT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT '1',
  `puntuacion_general` float DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `archivos`
--

INSERT INTO `archivos` (`id`, `img`, `nombre`, `tipo`, `tamanio`, `precio`, `moneda`, `descripcion`, `ubicacion`, `duenio`, `fecSubido`, `activo`, `puntuacion_general`) VALUES
(18, 'uploads/muestra/2_2018-07-02 11-44-07_Highway-To-Hell-album.jpg', 'Highway to hell', 'mp3', '6.5 MB', '20', 'URU', 'Cancion famosa de AC DC', 'uploads/2_2018-07-02 11-44-07_ACDC - Highway to Hell.mp3', 2, '2018-07-02 11:44:07.000000', 1, 0),
(19, 'uploads/muestra/2_2018-07-02 11-49-36_Avicii-Hey-Brother_660.jpg', 'Hey Brother', 'jpg', '116.6 KB', '20', 'URU', 'Letras\r\nHey brother! There\'s an endless road to rediscover\r\nHey sister! Know the water\'s sweet but blood is thicker\r\nOh, if the sky comes falling down, for you\r\nThere\'s nothing in this world I wouldn\'t do\r\nHey brother! Do you still believe in one another?\r\nHey sister! Do you still believe in love? I wonder\r\nOh, if the sky comes falling down, for you\r\nThere\'s nothing in this world I wouldn\'t do\r\nWhat if I\'m far from home?\r\nOh brother, I will hear you call!\r\nWhat if I lose it all?\r\nOh sister, I will help you out!\r\nOh, if the sky comes falling down, for you\r\nThere\'s nothing in this world I wouldn\'t do\r\nHey brother! There\'s an endless road to rediscover\r\nHey sister! Do you still believe in love? I wonder\r\nOh, if the sky comes falling down, for you\r\nThere\'s nothing in this world I wouldn\'t do', 'uploads/2_2018-07-02 11-49-36_Avicii-Hey-Brother_660.jpg', 2, '2018-07-02 11:49:36.000000', 0, 0),
(20, 'uploads/muestra/2_2018-07-02 11-50-14_Avicii-Hey-Brother_660.jpg', 'Hey brother', 'mp3', '6 MB', '20', 'URU', 'Letras\r\nHey brother! There\'s an endless road to rediscover\r\nHey sister! Know the water\'s sweet but blood is thicker\r\nOh, if the sky comes falling down, for you\r\nThere\'s nothing in this world I wouldn\'t do\r\nHey brother! Do you still believe in one another?\r\nHey sister! Do you still believe in love? I wonder\r\nOh, if the sky comes falling down, for you\r\nThere\'s nothing in this world I wouldn\'t do\r\nWhat if I\'m far from home?\r\nOh brother, I will hear you call!\r\nWhat if I lose it all?\r\nOh sister, I will help you out!\r\nOh, if the sky comes falling down, for you\r\nThere\'s nothing in this world I wouldn\'t do\r\nHey brother! There\'s an endless road to rediscover\r\nHey sister! Do you still believe in love? I wonder\r\nOh, if the sky comes falling down, for you\r\nThere\'s nothing in this world I wouldn\'t do', 'uploads/2_2018-07-02 11-50-14_Avicii - Hey Brother.mp3', 2, '2018-07-02 11:50:14.000000', 1, 0),
(21, 'uploads/muestra/2_2018-07-02 11-54-13_images.jpg', 'Shape of you', 'mp3', '6 MB', '20', 'URU', 'Letras\r\nThe club isn\'t the best place to find a lover\r\nSo the bar is where I go\r\nMe and my friends at the table doing shots\r\nDrinking fast and then we talk slow\r\nCome over and start up a conversation with just me\r\nAnd trust me I\'ll give it a chance now\r\nTake my hand, stop, put Van the Man on the jukebox\r\nAnd then we start to dance, and now I\'m singing like\r\nGirl, you know I want your love\r\nYour love was handmade for somebody like me\r\nCome on now, follow my lead\r\nI may be crazy, don\'t mind me\r\nSay, boy, let\'s not talk too much\r\nGrab on my waist and put that body on me\r\nCome on now, follow my lead\r\nCome, come on now, follow my lead\r\nI\'m in love with the shape of you\r\nWe push and pull like a magnet do\r\nAlthough my heart is falling too\r\nI\'m in love with your body\r\nAnd last night you were in my room\r\nAnd now my bedsheets smell like you\r\nEvery day discovering something brand new\r\nI\'m in love with your body\r\nOh—I—oh—I—oh—I—oh—I\r\nI\'m in love with your body\r\nOh—I—oh—I—oh—I—oh—I\r\nI\'m in love wit', 'uploads/2_2018-07-02 11-54-13_Ed Sheeran - Shape of You [Official Video].mp3', 2, '2018-07-02 11:54:13.000000', 1, 0),
(22, 'uploads/muestra/3_2018-07-02 11-56-13_index.png', 'Cedula Uruguaya', 'exe', '187.8 KB', '', 'Gratis', 'Un programa para poder saber el digito verificador de una cedula uruguaya ingresada', 'uploads/3_2018-07-02 11-56-13_Cedula_Identidad_Uruguaya.exe', 3, '2018-07-02 11:56:13.000000', 1, 0),
(23, 'uploads/muestra/4_2018-07-02 11-59-33_index.jpg', 'Gyazo', '3', '10.5 MB', '3', 'USD', 'Este programa te permite hacer capturas de pantallas', 'uploads/4_2018-07-02 11-59-33_Gyazo-3.3.5.exe', 4, '2018-07-02 11:59:33.000000', 1, 0),
(24, 'uploads/muestra/4_2018-07-02 12-00-15_HospitalWebDiagramaV1.png', 'xcvb', '3', '10.5 MB', '2', 'USD', 'cxvb', 'uploads/4_2018-07-02 12-00-15_Gyazo-3.3.5.exe', 4, '2018-07-02 12:00:15.000000', 0, 0),
(25, 'uploads/muestra/5_2018-07-02 12-08-55_index.jpg', 'f.lux', 'exe', '752.3 KB', '4.99', 'USD', 'Un programa para bajar el tono de color de la pantalla, esto ayuda a que no se canse tu vista', 'uploads/5_2018-07-02 12-08-55_flux-setup.exe', 5, '2018-07-02 12:08:55.000000', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `comentarios`
--

CREATE TABLE `comentarios` (
  `id` int(11) NOT NULL,
  `id_archivo` int(11) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `comentario` varchar(256) DEFAULT NULL,
  `duenio` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comentarios`
--

INSERT INTO `comentarios` (`id`, `id_archivo`, `id_usuario`, `comentario`, `duenio`) VALUES
(1, 22, 6, 'Hola, funciona para cedulas argentinas?', 0),
(2, 22, 3, 'No, solo con cedulas uruguayas', 1),
(3, 22, 6, 'Podrias subir uno que funcione con cedulas argentinas?', 0),
(4, 22, 3, 'Estoy creandolo, en cuanto lo tenga lo subire', 1);

-- --------------------------------------------------------

--
-- Table structure for table `compras`
--

CREATE TABLE `compras` (
  `idArchivo` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `moneda` varchar(20) NOT NULL,
  `precio` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(1, 1, 'Su archivo <a href=\'/FileSeller/archivo/ver/22\'>Cedula Uruguaya</a> a recibido un comentario', 3, '2018-07-02', '12:22:29', 1),
(2, 1, 'Su archivo <a href=\'/FileSeller/archivo/ver/22\'>Cedula Uruguaya</a> a recibido un comentario', 3, '2018-07-02', '12:25:02', 1),
(3, 1, 'Primer strike debido a No puede subir contenido que no le pertenece', 2, '2018-07-02', '12:33:13', 1),
(4, 1, 'Segundo strike debido a Segunda vez que sube contenido que no le pertenece', 2, '2018-07-02', '12:33:43', 1);

-- --------------------------------------------------------

--
-- Table structure for table `puntuacion`
--

CREATE TABLE `puntuacion` (
  `idArchivo` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `puntuacion` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `puntuacion`
--

INSERT INTO `puntuacion` (`idArchivo`, `idUsuario`, `puntuacion`) VALUES
(18, 2, 4),
(18, 3, 3),
(20, 3, 5),
(21, 3, 3),
(22, 3, 2),
(23, 4, 4),
(25, 5, 3),
(22, 6, 5);

-- --------------------------------------------------------

--
-- Table structure for table `reportes`
--

CREATE TABLE `reportes` (
  `idArchivo` int(250) NOT NULL,
  `tipo` varchar(250) NOT NULL,
  `descripcion` varchar(250) NOT NULL,
  `idReporte` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reportes`
--

INSERT INTO `reportes` (`idArchivo`, `tipo`, `descripcion`, `idReporte`) VALUES
(18, 'Ilegal', 'Esta cancion no es del creador', 1),
(20, 'Ilegal', 'El que lo subio no es el autor', 2),
(21, 'Ilegal', 'El no es Ed Sheeran', 3),
(20, 'Ilegal', 'Esta persona sube cosas que no le pertenecen', 4);

-- --------------------------------------------------------

--
-- Table structure for table `seguidos`
--

CREATE TABLE `seguidos` (
  `idSeguidor` int(11) NOT NULL,
  `idSeguido` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `strikes`
--

CREATE TABLE `strikes` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `comentario` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `strikes`
--

INSERT INTO `strikes` (`id`, `id_usuario`, `comentario`) VALUES
(1, 2, 'No puede subir contenido que no le pertenece'),
(2, 2, 'Segunda vez que sube contenido que no le pertenece');

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
  `fnac` date NOT NULL,
  `admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellido`, `correo`, `contrasenia`, `imagen`, `activo`, `fnac`, `admin`) VALUES
(1, 'Admin', 'General', 'admin@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'uploads/bret.jpg', 1, '1996-11-30', 1),
(2, 'Cristobal', 'Ivars', 'IvarsCristobal@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'uploads/antonette.jpg', 1, '1996-11-30', 0),
(3, 'Monica', 'Montserrat', 'MontserratMonica@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'uploads/delphine.jpg', 1, '1996-11-30', 0),
(4, 'Martin', 'Rosario', 'RosarioMartin@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'uploads/elwyn.skiles.jpg', 1, '1996-11-30', 0),
(5, 'Maria', 'Collazo', 'CollazoMaria@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'uploads/moriah.stanton.jpg', 1, '1996-11-30', 0),
(6, 'Ruben', 'Sarabia', 'SarabiaRuben@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'uploads/kamren.jpg', 1, '1996-11-30', 0),
(7, 'Marina', 'Yanez', 'YanezMarina@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'uploads/samantha.jpg', 1, '1996-11-30', 0),
(8, 'Juan', 'Moreno', 'MorenoJuan@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'uploads/karianne.jpg', 1, '1996-11-30', 0),
(9, 'Mercedes', 'Caballero', 'CaballeroMercedes@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'uploads/leopoldo_corkery.jpg', 1, '1996-11-30', 0),
(10, 'Jose', 'Torres', 'TorresJose@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'uploads/maxime_nienow.jpg', 1, '1996-11-30', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `archivos`
--
ALTER TABLE `archivos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`idArchivo`,`idUsuario`),
  ADD KEY `compras_ibfk_2` (`idUsuario`);

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
-- Indexes for table `reportes`
--
ALTER TABLE `reportes`
  ADD PRIMARY KEY (`idReporte`);

--
-- Indexes for table `seguidos`
--
ALTER TABLE `seguidos`
  ADD PRIMARY KEY (`idSeguidor`,`idSeguido`),
  ADD KEY `idSeguido` (`idSeguido`);

--
-- Indexes for table `strikes`
--
ALTER TABLE `strikes`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `mensajes`
--
ALTER TABLE `mensajes`
  MODIFY `id_m` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notificaciones`
--
ALTER TABLE `notificaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `reportes`
--
ALTER TABLE `reportes`
  MODIFY `idReporte` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `strikes`
--
ALTER TABLE `strikes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `compras`
--
ALTER TABLE `compras`
  ADD CONSTRAINT `compras_ibfk_1` FOREIGN KEY (`idArchivo`) REFERENCES `archivos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `compras_ibfk_2` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
