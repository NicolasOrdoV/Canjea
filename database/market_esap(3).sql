-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-08-2020 a las 00:01:55
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `market_esap`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `SPInsertarArticulo` (IN `nombre` VARCHAR(30), IN `descripcion` VARCHAR(100), IN `cantidad` INT(11), IN `id_categoria` INT(11), IN `id_usuario` INT(11), IN `estado` INT(2))  begin 
 insert into articulo (Nombre,Descripcion,Cantidad,Categoria_Id_categoria,Usuario_Id_Dueno,Estado) values(nombre,descripcion,cantidad,id_categoria,id_usuario,estado);
 end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SPInsertarCitacion` (IN `sp_idoferta` INT(11), IN `sp_lugar` VARCHAR(20), IN `sp_fechacitacion` DATE, IN `sp_hora` TIME, IN `sp_estadoCitacion` INT(2))  BEGIN
INSERT INTO citacion (Id_oferta,Lugar,Fecha_citacion,Hora,Estado_citacion) VALUES(sp_idoferta,sp_lugar,sp_fechacitacion,sp_hora,sp_estadoCitacion); 
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SPvalidarBarrio` (IN `Id_barrio` INT)  begin
select * from barrio where Id_barrio = Id_barrio;
end$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulo`
--

CREATE TABLE `articulo` (
  `Id_articulo` int(11) NOT NULL,
  `Nombre` varchar(30) NOT NULL,
  `Descripcion` varchar(100) DEFAULT NULL,
  `Cantidad` int(11) DEFAULT NULL,
  `Categoria_Id_categoria` int(11) DEFAULT NULL,
  `Usuario_Id_Dueno` int(11) DEFAULT NULL,
  `Estado` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `barrio`
--

CREATE TABLE `barrio` (
  `Id_barrio` int(11) NOT NULL,
  `Nombre_barrio` varchar(20) DEFAULT NULL,
  `id_Localidad` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `barrio`
--

INSERT INTO `barrio` (`Id_barrio`, `Nombre_barrio`, `id_Localidad`) VALUES
(6, 'Gaitana', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `Id_categoria` int(11) NOT NULL,
  `Nombre_Categoria` varchar(50) DEFAULT NULL,
  `Estado` bit(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`Id_categoria`, `Nombre_Categoria`, `Estado`) VALUES
(1, 'Animales', b'0'),
(3, 'Juguetes', b'0'),
(4, 'Antiguedades', b'0');

--
-- Disparadores `categoria`
--
DELIMITER $$
CREATE TRIGGER `Categoria_articulo` AFTER INSERT ON `categoria` FOR EACH ROW BEGIN
INSERT INTO articulo SET Categoria_Id_categoria = NEW.Id_categoria;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `citacion`
--

CREATE TABLE `citacion` (
  `Id_citacion` int(11) NOT NULL,
  `Id_oferta` int(11) NOT NULL,
  `Lugar` varchar(20) DEFAULT NULL,
  `Fecha_citacion` date NOT NULL,
  `Hora` time NOT NULL,
  `Estado_citacion` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudad`
--

CREATE TABLE `ciudad` (
  `Id_Ciudad` int(11) NOT NULL,
  `Nombre_Ciudad` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ciudad`
--

INSERT INTO `ciudad` (`Id_Ciudad`, `Nombre_Ciudad`) VALUES
(13, 'Bogota D.C');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagen`
--

CREATE TABLE `imagen` (
  `Id_imagen` int(11) NOT NULL,
  `Url` mediumtext DEFAULT NULL,
  `Articulo_Id_articulo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `localidades`
--

CREATE TABLE `localidades` (
  `id_Localidad` int(11) NOT NULL,
  `nombre_localidad` varchar(40) NOT NULL,
  `Id_Ciudad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `localidades`
--

INSERT INTO `localidades` (`id_Localidad`, `nombre_localidad`, `Id_Ciudad`) VALUES
(1, 'Suba', 13);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oferta`
--

CREATE TABLE `oferta` (
  `Id_oferta` int(11) NOT NULL,
  `Id_Usuario` int(11) NOT NULL,
  `Fecha_oferta` datetime NOT NULL,
  `Estado` int(2) NOT NULL,
  `Vigencia` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `IdRol` int(2) NOT NULL,
  `TipoRol` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`IdRol`, `TipoRol`) VALUES
(1, 'Admin'),
(2, 'Usuario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `Id_Usuario` int(11) NOT NULL,
  `Nombre` varchar(50) DEFAULT NULL,
  `Apellido` varchar(50) DEFAULT NULL,
  `Correo` varchar(80) DEFAULT NULL,
  `Contrasena` varchar(40) DEFAULT NULL,
  `Direccion` varchar(50) DEFAULT NULL,
  `FechaNacimiento` date DEFAULT NULL,
  `Genero` char(10) DEFAULT NULL,
  `Celular` varchar(10) DEFAULT NULL,
  `IdRol` int(2) NOT NULL,
  `Id_barrio` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Disparadores `usuario`
--
DELIMITER $$
CREATE TRIGGER `Usuario_oferta` AFTER INSERT ON `usuario` FOR EACH ROW BEGIN 
INSERT INTO oferta SET Id_Usuario = NEW.Id_Usuario; 
END
$$
DELIMITER ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `articulo`
--
ALTER TABLE `articulo`
  ADD PRIMARY KEY (`Id_articulo`),
  ADD KEY `fk_Articulo_Categoria1_idx` (`Categoria_Id_categoria`),
  ADD KEY `fk_Articulo_Usuario1_idx` (`Usuario_Id_Dueno`);

--
-- Indices de la tabla `barrio`
--
ALTER TABLE `barrio`
  ADD PRIMARY KEY (`Id_barrio`),
  ADD KEY `fk_Ciudad_barrio` (`id_Localidad`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`Id_categoria`);

--
-- Indices de la tabla `citacion`
--
ALTER TABLE `citacion`
  ADD PRIMARY KEY (`Id_citacion`),
  ADD UNIQUE KEY `Id_citacion` (`Id_citacion`),
  ADD KEY `fk_citacion_oferta` (`Id_oferta`);

--
-- Indices de la tabla `ciudad`
--
ALTER TABLE `ciudad`
  ADD PRIMARY KEY (`Id_Ciudad`);

--
-- Indices de la tabla `imagen`
--
ALTER TABLE `imagen`
  ADD PRIMARY KEY (`Id_imagen`),
  ADD KEY `fk_Galeria_Articulo1_idx` (`Articulo_Id_articulo`);

--
-- Indices de la tabla `localidades`
--
ALTER TABLE `localidades`
  ADD PRIMARY KEY (`id_Localidad`),
  ADD KEY `fk_Localidad_Ciudad` (`Id_Ciudad`);

--
-- Indices de la tabla `oferta`
--
ALTER TABLE `oferta`
  ADD PRIMARY KEY (`Id_oferta`),
  ADD KEY `fk_Oferta_usuario` (`Id_Usuario`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`IdRol`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`Id_Usuario`),
  ADD UNIQUE KEY `Correo` (`Correo`),
  ADD KEY `fk_Usuario_barrio` (`Id_barrio`),
  ADD KEY `fk_usuario_rol` (`IdRol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `articulo`
--
ALTER TABLE `articulo`
  MODIFY `Id_articulo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `barrio`
--
ALTER TABLE `barrio`
  MODIFY `Id_barrio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `Id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `citacion`
--
ALTER TABLE `citacion`
  MODIFY `Id_citacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `ciudad`
--
ALTER TABLE `ciudad`
  MODIFY `Id_Ciudad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `imagen`
--
ALTER TABLE `imagen`
  MODIFY `Id_imagen` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `localidades`
--
ALTER TABLE `localidades`
  MODIFY `id_Localidad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `oferta`
--
ALTER TABLE `oferta`
  MODIFY `Id_oferta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `IdRol` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `Id_Usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `articulo`
--
ALTER TABLE `articulo`
  ADD CONSTRAINT `fk_Articulo_Categoria1` FOREIGN KEY (`Categoria_Id_categoria`) REFERENCES `categoria` (`Id_categoria`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Articulo_Usuario1` FOREIGN KEY (`Usuario_Id_Dueno`) REFERENCES `usuario` (`Id_Usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `barrio`
--
ALTER TABLE `barrio`
  ADD CONSTRAINT `fk_Barrio_localidad` FOREIGN KEY (`id_Localidad`) REFERENCES `localidades` (`id_Localidad`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `citacion`
--
ALTER TABLE `citacion`
  ADD CONSTRAINT `fk_citacion_oferta` FOREIGN KEY (`Id_oferta`) REFERENCES `oferta` (`Id_oferta`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `imagen`
--
ALTER TABLE `imagen`
  ADD CONSTRAINT `fk_Galeria_Articulo1` FOREIGN KEY (`Articulo_Id_articulo`) REFERENCES `articulo` (`Id_articulo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `localidades`
--
ALTER TABLE `localidades`
  ADD CONSTRAINT `fk_Localidad_Ciudad` FOREIGN KEY (`Id_Ciudad`) REFERENCES `ciudad` (`Id_Ciudad`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `oferta`
--
ALTER TABLE `oferta`
  ADD CONSTRAINT `fk_Oferta_usuario` FOREIGN KEY (`Id_Usuario`) REFERENCES `usuario` (`Id_Usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_usuario_barrio` FOREIGN KEY (`Id_barrio`) REFERENCES `barrio` (`Id_barrio`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_usuario_rol` FOREIGN KEY (`IdRol`) REFERENCES `rol` (`IdRol`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
