-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-11-2024 a las 03:39:24
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `carrito_de_compras`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `actualizar_items` (IN `v_idcliente` INT, IN `v_item` INT)   BEGIN 
    	UPDATE carrito SET item = item - 1 WHERE id_cliente = v_idcliente AND item > v_item;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `agregar_item` (IN `v_idcliente` INT, IN `v_idproducto` INT)   BEGIN
	DECLARE temp VARCHAR(255);
    SET @resultado = NULL;
    SELECT @resultado := item FROM carrito WHERE id_cliente = v_idcliente LIMIT 1;

    -- Verificar si se obtuvo un resultado
    IF @resultado IS NOT NULL THEN
    	SELECT @resultado := MAX(item) FROM carrito WHERE id_cliente = v_idcliente;
        INSERT INTO carrito(id_cliente,item,id_producto) VALUES (v_idcliente,@resultado + 1,v_idproducto);
    ELSE 
        INSERT INTO carrito(id_cliente,item,id_producto) VALUES (v_idcliente,1,v_idproducto);
    END IF;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito`
--

CREATE TABLE `carrito` (
  `id_cliente` int(11) NOT NULL,
  `item` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `carrito`
--

INSERT INTO `carrito` (`id_cliente`, `item`, `id_producto`) VALUES
(19, 1, 1),
(4, 1, 2),
(4, 2, 2),
(19, 2, 2),
(4, 3, 3),
(19, 3, 3),
(19, 4, 4),
(19, 5, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `idCliente` int(11) NOT NULL,
  `dni` varchar(9) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contrasena` varchar(50) NOT NULL,
  `administrador` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`idCliente`, `dni`, `nombre`, `direccion`, `email`, `contrasena`, `administrador`) VALUES
(4, '28416652', 'luis', 'la casa', 'rogerwtf4+naz9@gmail.com', '123', 0),
(5, '28416652', 'fredy', 'la casa', 'rogerwtf4+naz9@gmail.com', '123', 0),
(6, '29861038', 'lokas', 'la casa', 'elloquius@gmail.com', '444', 0),
(7, '9095692', 'miguelllll', 'la casa', 'elloquius@gmail.com', '333', 0),
(8, '9095692', 'salo', 'la casa', 'elloquius@gmail.com', '555', 0),
(9, '29861038', 'sapo', 'qqweqwe', 'rogerwtf4+naz9@gmail.com', '123', 0),
(10, '1213', 'carla', 'la casa', 'rogerwtf4+naz9@gmail.com', '23', 1),
(11, '28416652', 'carlos', 'la casa', 'rogerwtf4+naz9@gmail.com', '123', 1),
(12, '123123', 'sheo', 'si', 'esto@gmail.com', '111', 0),
(13, '123123', 'ki', '232323', 'sss@gmail.com', '22', 0),
(14, '123123', 'asdasda', 'asdasd', 'wqeqwe', '123123', 1),
(15, '9095692', 'pedro', 'asdasd', 'elloquius@gmail.com', '22', 1),
(16, '9095692', 'shs', 'la casa', 'rogerwtf4+naz9@gmail.com', '222', 0),
(17, '28416652', 'zain', 'mi piso', 'migueluchogordillo@gmail.com', '123', 0),
(18, '28416652', 'lala', 'qqweqwe', 'rogerwtf4+naz9@gmail.com', '333', 1),
(19, '9095692', 'elloquius', 'asdasd', 'elloquius@gmail.com', '123', 1),
(20, '28416652', 'jesus', 'barquisimeto', 'rogerwtf4+naz9@gmail.com', '444', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE `compras` (
  `idCompras` int(11) NOT NULL,
  `idCliente` int(11) NOT NULL,
  `fechaCompra` varchar(11) NOT NULL,
  `monto` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_compras`
--

CREATE TABLE `detalle_compras` (
  `idDetalle` int(11) NOT NULL,
  `idProducto` int(11) NOT NULL,
  `idCompras` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precioCompra` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `idProducto` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `foto` varchar(512) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `precio` double NOT NULL,
  `stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`idProducto`, `nombre`, `foto`, `descripcion`, `precio`, `stock`) VALUES
(1, 'Iphone 8', 'https://m.media-amazon.com/images/I/41+CLiWu9lL.jpg', 'Celular de alta calidad, muy bueno para fotos', 188, 4),
(2, 'Smart TV', 'https://images-na.ssl-images-amazon.com/images/I/81R3dLptKcL._AC_UL600_SR600,400_.jpg', 'Increible resolución, con gráficos 4k', 199, 2),
(3, 'Chromecast', 'https://m.media-amazon.com/images/I/510wm50VDHL._AC_SX425_.jpg', 'Control y adaptador chromecast con gráficos 4k', 99, 10),
(4, 'Cámara Go Pro', 'https://http2.mlstatic.com/D_NQ_NP_733488-MLV74339217428_022024-O.webp', 'Una cámara para grabar tus mejores aventuras y acrobacias', 32.57, 12),
(10, 'Nintendo DS', 'https://www.nintendo.com/eu/media/images/03_teaser_module_1_square/systems_2/nintendo_ds_3/TM_DS_Lite_TouchScreen.png', 'La mejor consola portátil', 232, 10);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD PRIMARY KEY (`id_cliente`,`item`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`idCliente`);

--
-- Indices de la tabla `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`idCompras`),
  ADD KEY `idCliente` (`idCliente`);

--
-- Indices de la tabla `detalle_compras`
--
ALTER TABLE `detalle_compras`
  ADD PRIMARY KEY (`idDetalle`),
  ADD KEY `idCompras` (`idCompras`),
  ADD KEY `idProducto` (`idProducto`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`idProducto`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `idCliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `compras`
--
ALTER TABLE `compras`
  MODIFY `idCompras` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `detalle_compras`
--
ALTER TABLE `detalle_compras`
  MODIFY `idDetalle` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `idProducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD CONSTRAINT `carrito_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`idCliente`) ON DELETE CASCADE,
  ADD CONSTRAINT `carrito_ibfk_2` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`idProducto`);

--
-- Filtros para la tabla `compras`
--
ALTER TABLE `compras`
  ADD CONSTRAINT `compras_ibfk_1` FOREIGN KEY (`idCliente`) REFERENCES `cliente` (`idCliente`);

--
-- Filtros para la tabla `detalle_compras`
--
ALTER TABLE `detalle_compras`
  ADD CONSTRAINT `detalle_compras_ibfk_1` FOREIGN KEY (`idCompras`) REFERENCES `compras` (`idCompras`),
  ADD CONSTRAINT `detalle_compras_ibfk_2` FOREIGN KEY (`idProducto`) REFERENCES `producto` (`idProducto`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;