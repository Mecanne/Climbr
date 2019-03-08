-- --------------------------------------------------------
-- Host:                         localhost
-- Versión del servidor:         5.7.24 - MySQL Community Server (GPL)
-- SO del servidor:              Win64
-- HeidiSQL Versión:             9.5.0.5332
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Volcando estructura de base de datos para escalada
CREATE DATABASE IF NOT EXISTS `escalada` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `escalada`;

-- Volcando estructura para tabla escalada.categorias
CREATE TABLE IF NOT EXISTS `categorias` (
  `IDCategoria` int(11) NOT NULL AUTO_INCREMENT,
  `NombreCategoria` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`IDCategoria`),
  UNIQUE KEY `NombreCategoria` (`NombreCategoria`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla escalada.categorias: ~8 rows (aproximadamente)
/*!40000 ALTER TABLE `categorias` DISABLE KEYS */;
INSERT INTO `categorias` (`IDCategoria`, `NombreCategoria`) VALUES
	(1, 'ARNESES'),
	(2, 'ASEGURADORES'),
	(3, 'CASCOS'),
	(4, 'CINTAS'),
	(5, 'CUERDAS'),
	(6, 'PIES DE GATO');
/*!40000 ALTER TABLE `categorias` ENABLE KEYS */;

-- Volcando estructura para tabla escalada.productos
CREATE TABLE IF NOT EXISTS `productos` (
  `IDProducto` int(11) NOT NULL AUTO_INCREMENT,
  `IDCategoria` int(11) DEFAULT NULL,
  `NombreProducto` varchar(100) DEFAULT NULL,
  `Precio` int(11) DEFAULT NULL,
  `Descuento` int(11) DEFAULT NULL,
  `RutaImagen` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`IDProducto`),
  UNIQUE KEY `NombreProducto` (`NombreProducto`),
  KEY `FK_Productos_Categorias` (`IDCategoria`),
  CONSTRAINT `FK_Productos_Categorias` FOREIGN KEY (`IDCategoria`) REFERENCES `categorias` (`IDCategoria`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla escalada.productos: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `productos` DISABLE KEYS */;
INSERT INTO `productos` (`IDProducto`, `IDCategoria`, `NombreProducto`, `Precio`, `Descuento`, `RutaImagen`) VALUES
	(1, 1, 'Arnes de Escalada Mammut OPHIR 3 SLIDE Titanium-Dark Naranja', 70, 15, 'img/arnes1.jpg'),
	(2, 1, 'Arnes de Escalada Mujer Mammut OPHIR 3 SLIDE W Titanium-Dawn', 70, 20, 'img/arnes2.jpg'),
	(3, 1, 'Arnes Escalada Mujer Mammut OPHIR Dark Cyan-Chill', 60, 20, 'img/arnes3.jpg'),
	(4, 1, 'Arnes de Escalada Petzl HIRUNDOS', 90, 10, 'img/arnes4.jpg'),
	(5, 2, 'Asegurador Escalada PETZL GRIGRI 2019 Azul', 70, 10, 'img/asegurador1.jpg'),
	(6, 2, 'Asegurador Escalada PETZL GRIGRI 2019 Gris', 70, 10, 'img/asegurador2.jpg'),
	(7, 2, 'Asegurador Mammut SMART ALPINE 8.9-10.5 Black Red', 46, 20, 'img/asegurador3.jpg'),
	(8, 2, 'Asegurador Mammut SMART 2.0 Phantom', 30, 20, 'img/asegurador4.jpg'),
	(9, 3, 'Casco de Espeologia Petzl BOREO CAVING', 90, 10, 'img/casco1.jpg'),
	(10, 3, 'Casco de Escalada Petzl Sirocco 2019 Blanco-Naranja', 100, 10, 'img/casco2.jpg'),
	(11, 3, 'Casco de Montaña Mammut WALL RIDER MIPS White', 180, 20, 'img/casco3.jpg'),
	(12, 3, 'Casco de Montaña Mammut WALL RIDER Night', 100, 20, 'img/casco4.jpg'),
	(13, 4, 'Cinta Mammut GYM INDICATOR EXPRESS SLING 16 Basalt-grey 30 cm', 6, 20, 'img/cinta1.jpg'),
	(14, 4, 'Cinta Express Mammut CRAG INDICATOR EXPRESS SET Straigh Gate-Bent Gate', 15, 20, 'img/cinta2.jpg'),
	(15, 4, 'KONG PANIC - Cinta express antipanico 30 cm', 40, 10, 'img/cinta3.jpg'),
	(16, 4, 'CINTA MAMMUT CRAG EXPRESS SLING 24.0 PROMO 10 CM GRIS-AMA', 40, 10, 'img/cinta4.jpg'),
	(17, 5, 'Cuerda escalada Mammut ETERNITY PROTECT 9,8 80 metros Violet-Fire', 200, 20, 'img/cuerda1.jpg'),
	(18, 5, 'Cuerda Escalada Simple Mammut INFINITY PROTECT 9.5 mm 80m', 200, 20, 'img/cuerda2.jpg'),
	(19, 5, 'Cuerda escalada Mammut ETERNITY PROTECT 9,8 70 Metros Neonorange-Violet', 190, 20, 'img/cuerda3.jpg'),
	(20, 5, 'Cuerda Escalada Mammut ETERNITY 9.8 Classic 70 m 2019', 140, 20, 'img/cuerda4.jpg'),
	(21, 6, 'BOREAL JOKER - PIES DE GATO ESCALADA', 80, 15, 'img/piegato1.jpg'),
	(22, 6, 'Pies de Gato Boreal DHARMA 2019', 120, 15, 'img/piegato2.jpg'),
	(23, 6, 'Boreal Alpha Wmns - Pies de Gato Escalada Mujer', 70, 15, 'img/piegato3.jpg'),
	(24, 6, 'Pies de Gato Mujer Boreal DHARMA WMNS 2019', 120, 15, 'img/piegato4.jpg');
/*!40000 ALTER TABLE `productos` ENABLE KEYS */;

-- Volcando estructura para tabla escalada.usuarios
CREATE TABLE IF NOT EXISTS `usuarios` (
  `IDUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `EmailUsuario` varchar(50) DEFAULT '0',
  `NombreUsuario` varchar(50) DEFAULT NULL,
  `ContrasenaUsuario` varchar(50) DEFAULT '0',
  `DireccionUsuario` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`IDUsuario`),
  UNIQUE KEY `EmailUsuario` (`EmailUsuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla escalada.usuarios: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
