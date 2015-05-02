-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-05-2015 a las 17:57:47
-- Versión del servidor: 5.6.20
-- Versión de PHP: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `tienda_deportiva`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE IF NOT EXISTS `compras` (
`numero_orden` int(11) NOT NULL,
  `proveedor_id` int(11) NOT NULL,
  `fecha_pedido` date NOT NULL,
  `entregado` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Volcado de datos para la tabla `compras`
--

INSERT INTO `compras` (`numero_orden`, `proveedor_id`, `fecha_pedido`, `entregado`) VALUES
(1, 6, '2015-03-27', 0),
(2, 6, '2015-03-27', 0),
(3, 6, '2015-03-27', 0),
(4, 6, '2015-03-27', 1),
(5, 6, '2015-03-27', 0),
(6, 6, '2015-03-27', 0),
(7, 6, '2015-03-27', 0),
(8, 6, '2015-03-27', 0),
(9, 6, '2015-03-27', 1),
(10, 11, '2015-03-27', 0),
(11, 6, '2015-04-10', 1),
(12, 6, '2015-04-10', 1),
(13, 6, '2015-04-10', 1),
(14, 6, '2015-04-10', 0),
(15, 6, '2015-04-10', 1),
(16, 6, '2015-04-10', 0),
(17, 8, '2015-04-10', 0),
(18, 8, '2015-04-10', 0),
(19, 6, '2015-04-12', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_compra`
--

CREATE TABLE IF NOT EXISTS `detalle_compra` (
`id` int(11) NOT NULL,
  `numero_orden` int(11) NOT NULL,
  `producto_id` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

--
-- Volcado de datos para la tabla `detalle_compra`
--

INSERT INTO `detalle_compra` (`id`, `numero_orden`, `producto_id`, `cantidad`) VALUES
(1, 1, 3, 6),
(2, 1, 4, 6),
(3, 1, 5, 7),
(4, 7, 4, 7),
(5, 7, 5, 8),
(6, 8, 3, 50),
(7, 8, 4, 60),
(8, 8, 5, 70),
(9, 8, 6, 80),
(10, 8, 7, 90),
(11, 9, 3, 50),
(12, 9, 4, 60),
(13, 9, 5, 70),
(14, 9, 6, 80),
(15, 9, 7, 90),
(16, 10, 2, 9),
(17, 10, 3, 8),
(18, 10, 4, 7),
(19, 11, 4, 1),
(20, 12, 4, 1),
(21, 13, 4, 1),
(22, 14, 4, 1),
(23, 14, 7, 12),
(24, 15, 4, 1),
(25, 15, 7, 14),
(26, 16, 3, 1),
(27, 16, 4, 1),
(28, 16, 7, 1),
(29, 17, 3, 1),
(30, 17, 4, 1),
(31, 17, 7, 1),
(32, 18, 3, 1),
(33, 18, 4, 1),
(34, 18, 7, 1),
(35, 19, 3, 1),
(36, 19, 4, 20),
(37, 19, 7, 20);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_venta`
--

CREATE TABLE IF NOT EXISTS `detalle_venta` (
`id` int(11) NOT NULL,
  `numero_orden` int(11) NOT NULL,
  `producto_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE IF NOT EXISTS `productos` (
`id` int(11) NOT NULL,
  `codigo` varchar(15) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `existencia` int(11) NOT NULL,
  `unidad_de_medida` varchar(100) NOT NULL,
  `clasificacion` varchar(100) NOT NULL,
  `ubicacion` varchar(200) NOT NULL,
  `imagen` varchar(200) NOT NULL,
  `costo_compra` double NOT NULL,
  `porcentaje_ganancia` double NOT NULL,
  `precio_venta` double NOT NULL,
  `demanda_diaria` int(11) NOT NULL,
  `tiempo_de_entrega` varchar(30) NOT NULL,
  `cantidad_productos_minimos` int(11) NOT NULL,
  `punto_reorden` varchar(50) NOT NULL,
  `activo` varchar(50) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `codigo`, `nombre`, `existencia`, `unidad_de_medida`, `clasificacion`, `ubicacion`, `imagen`, `costo_compra`, `porcentaje_ganancia`, `precio_venta`, `demanda_diaria`, `tiempo_de_entrega`, `cantidad_productos_minimos`, `punto_reorden`, `activo`) VALUES
(1, '4', '4', 4, 'valor1', 'clasificacion 1', 'ubicacion 1', 'ruta imagen', 67, 67, 56, 354, '456', 45, '', 'desactivo'),
(2, 'codigo', 'nombre', 1, 'valor1', 'clasificacion 2', 'ubicacion 3', 'ruta imagen', 1, 2, 3, 4, '5', 6, '', 'activo'),
(3, '123456789', 'nuevo2', 28, 'valor3', 'clasificacion 4', 'ubicacion 4', 'imagenes/nuevo2.jpg', 99, 99, 99, 99, '99', 99, '', 'activo'),
(4, 'hjkh', 'jkh', 68, 'valor1', 'clasificacion 1', 'ubicacion 1', '$imagen', 89, 7867, 1, 6, '78', 9, '', 'activo'),
(5, '11', 'xx', 1, 'valor1', 'clasificacion 1', 'ubicacion 1', 'imagenes/xx.jpg', 1, 2, 3, 4, '5', 6, '', 'activo'),
(6, 'cod', 'nombre', 1, 'valor3', 'clasificacion 3', 'ubicacion 3', 'imagenes/nombre.jpg', 23, 35, 24, 10, '4', 20, '2', 'activo'),
(7, '788', '77', 768, 'valor3', 'clasificacion 3', 'ubicacion 3', 'imagenes/77.jpg', 7, 8, 9, 10, '11', 4, '27.5', 'activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE IF NOT EXISTS `proveedores` (
`id` int(11) NOT NULL,
  `nombre_razon_social` varchar(200) NOT NULL,
  `rfc` varchar(200) NOT NULL,
  `domicilio` varchar(200) NOT NULL,
  `ciudad` varchar(200) NOT NULL,
  `activo` varchar(50) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`id`, `nombre_razon_social`, `rfc`, `domicilio`, `ciudad`, `activo`) VALUES
(1, 'desactivo', 'hjkhjkhjkh', 'hugh', 'hyui', 'desactivo'),
(2, 'ghkgghjghjg', 'hghjdswzaw', 'kghyjghj', 'yuiyiu', 'desactivo'),
(3, 'nombre', 'rfc', 'domicilio', 'ciudad', 'desactivo'),
(6, 'nueva razon', 'nuevo rfc', 'nuevo domicilio', 'nueva ciudad', 'activo'),
(8, 'hjklh', 'hjkhjkhjkhjkhjkhkj', 'hjkh', 'hklkjhjk', 'activo'),
(9, 'nuevo', 'nuevo', 'nuevo', 'nuevo', 'activo'),
(10, 'aaaaa', 'aaaaa', 'aaaaaa', 'aaaaaaa', 'activo'),
(11, 'otro', 'otro', 'otro', 'otro', 'activo'),
(12, 'hjk', 'hjk3455', 'hjk', 'hjk', 'activo'),
(13, 'guardar', 'guardar', 'guardar', 'guardar', 'activo'),
(15, 'hola', 'hola2', 'hola', 'hola', 'activo'),
(16, 'hhh', 'hh', 'hh', 'hh', 'activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recepcion`
--

CREATE TABLE IF NOT EXISTS `recepcion` (
`numero_recepcion` int(11) NOT NULL,
  `proveedor_id` int(11) NOT NULL,
  `compra_id` int(11) NOT NULL,
  `fecha_recepcion` date NOT NULL,
  `lugar_entrega` varchar(200) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `recepcion`
--

INSERT INTO `recepcion` (`numero_recepcion`, `proveedor_id`, `compra_id`, `fecha_recepcion`, `lugar_entrega`) VALUES
(1, 6, 11, '2015-04-12', 'lugar3'),
(2, 6, 13, '2015-04-12', 'lugar4');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
`id` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `tipo_usuario` varchar(50) NOT NULL,
  `correo` varchar(200) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `pass` varchar(200) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `tipo_usuario`, `correo`, `usuario`, `pass`) VALUES
(2, 'admin', 'admin', 'admincorreo', 'admin', '81dc9bdb52d04dc20036dbd8313ed055'),
(3, 'admin', 'admin', 'admin', 'admin2', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE IF NOT EXISTS `ventas` (
  `numero_orden` int(11) NOT NULL,
  `nombre_razon_social` varchar(200) NOT NULL,
  `fecha_pedido` date NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `rfc` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `compras`
--
ALTER TABLE `compras`
 ADD PRIMARY KEY (`numero_orden`), ADD KEY `proveedor_id` (`proveedor_id`);

--
-- Indices de la tabla `detalle_compra`
--
ALTER TABLE `detalle_compra`
 ADD PRIMARY KEY (`id`), ADD KEY `producto_id` (`producto_id`);

--
-- Indices de la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
 ADD PRIMARY KEY (`id`), ADD KEY `producto_id` (`producto_id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `codigo` (`codigo`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `rfc` (`rfc`);

--
-- Indices de la tabla `recepcion`
--
ALTER TABLE `recepcion`
 ADD PRIMARY KEY (`numero_recepcion`), ADD KEY `proveedor_id` (`proveedor_id`), ADD KEY `compra_id` (`compra_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `usuario` (`usuario`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
 ADD PRIMARY KEY (`rfc`), ADD KEY `usuario_id` (`usuario_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `compras`
--
ALTER TABLE `compras`
MODIFY `numero_orden` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT de la tabla `detalle_compra`
--
ALTER TABLE `detalle_compra`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT de la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT de la tabla `recepcion`
--
ALTER TABLE `recepcion`
MODIFY `numero_recepcion` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `compras`
--
ALTER TABLE `compras`
ADD CONSTRAINT `compras_ibfk_1` FOREIGN KEY (`proveedor_id`) REFERENCES `proveedores` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `detalle_compra`
--
ALTER TABLE `detalle_compra`
ADD CONSTRAINT `detalle_compra_ibfk_1` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
ADD CONSTRAINT `detalle_venta_ibfk_1` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `recepcion`
--
ALTER TABLE `recepcion`
ADD CONSTRAINT `recepcion_ibfk_1` FOREIGN KEY (`proveedor_id`) REFERENCES `proveedores` (`id`) ON UPDATE CASCADE,
ADD CONSTRAINT `recepcion_ibfk_2` FOREIGN KEY (`compra_id`) REFERENCES `proveedores` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
ADD CONSTRAINT `ventas_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
