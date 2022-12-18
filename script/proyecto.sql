-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-12-2022 a las 12:30:10
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyecto`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(10) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`) VALUES
(1, 'Carne'),
(2, 'Pescado'),
(3, 'Verduras'),
(4, 'Frutas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_pedidos`
--

CREATE TABLE `detalle_pedidos` (
  `id` int(11) NOT NULL,
  `pedido_id` int(11) NOT NULL,
  `producto_id` int(11) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `detalle_pedidos`
--

INSERT INTO `detalle_pedidos` (`id`, `pedido_id`, `producto_id`, `precio`, `cantidad`) VALUES
(15, 9, 24, '1.99', 1),
(16, 10, 20, '1.49', 3),
(17, 11, 12, '5.19', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `id` int(10) NOT NULL,
  `cliente_dni` int(20) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`id`, `cliente_dni`, `total`, `fecha`) VALUES
(9, 20, '1.99', '2022-12-13'),
(10, 21, '4.47', '2022-12-14'),
(11, 21, '25.95', '2022-12-14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `titulo` varchar(80) COLLATE utf8_spanish_ci NOT NULL,
  `foto` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `categoria_id` int(10) NOT NULL,
  `fecha` date NOT NULL,
  `stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `titulo`, `foto`, `precio`, `categoria_id`, `fecha`, `stock`) VALUES
(1, 'Carne picada de cerdo y vacuno', 'Carne picada de cerdo y vacuno.jpg', '4.99', 1, '2017-09-03', 50),
(2, 'Lomo de cerdo adobado', 'Lomo de cerdo adobado.jpg', '4.25', 1, '2017-09-03', 50),
(3, 'Hamburguesa de vacuno ecologica', 'Hamburguesa de vacuno ecologica.jpg', '1.99', 1, '2017-09-03', 50),
(4, 'Butifarra extra', 'Butifarra extra.jpg', '2.19', 1, '2017-09-03', 50),
(5, 'Secreto de cerdo', 'Secreto de cerdo.jpg', '2.95', 1, '2017-09-03', 50),
(6, 'Pechuga de pavo', 'Pechuga de pavo.jpg', '2.49', 1, '2017-09-03', 50),
(7, 'Salmon ahumado', 'Salmon ahumado.jpg', '2.50', 2, '2017-09-03', 50),
(8, 'Calamar limpio', 'Calamar limpio.jpg', '5.95', 2, '2017-09-03', 50),
(9, 'Palitos de mar', 'Palitos de mar.jpg', '1.33', 2, '2017-09-03', 50),
(10, 'Rabas enharinadas', 'Rabas enharinadas.jpg', '4.19', 2, '2017-09-03', 50),
(11, 'Pata de pulpo cocido', 'Pata de pulpo cocido.jpg', '9.80', 2, '2017-09-03', 50),
(12, 'Anillas de pota', 'Anillas de pota.jpg', '5.19', 2, '2017-09-03', 50),
(13, 'Coliflor', 'Coliflor.jpg', '1.19', 3, '2017-09-03', 50),
(14, 'Patatas', 'Patatas.jpg', '3.49', 3, '2017-09-03', 50),
(15, 'Pimiento rojo', 'Pimiento rojo.jpg', '1.99', 3, '2017-09-03', 50),
(16, 'Champiñon blanco', 'Champiñon blanco.jpg', '0.79', 3, '2017-09-03', 50),
(17, 'Setas ostra', 'Setas ostra.jpg', '0.89', 3, '2017-09-03', 50),
(18, 'Tomate ensalada', 'Tomate ensalada.jpg', '1.85', 3, '2017-09-03', 50),
(19, 'Pera conferencia', 'Pera conferencia.jpg', '1.79', 4, '2017-09-03', 50),
(20, 'Manzana roja', 'Manzana roja.jpg', '1.49', 4, '2017-09-03', 50),
(21, 'Uva blanca', 'Uva blanca.jpg', '1.79', 4, '2017-09-03', 50),
(22, 'Platano de canarias', 'Platano de canarias.jpg', '1.99', 4, '2017-09-03', 50),
(23, 'Aguacate', 'Aguacate.jpg', '1.99', 4, '2017-09-03', 50),
(24, 'Mango', 'Mango.jpg', '1.99', 4, '2022-12-15', 50);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `usuario` varchar(9) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `correo` varchar(200) NOT NULL,
  `telefono` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `usuario`, `nombre`, `password`, `correo`, `telefono`) VALUES
(20, '30295572Q', 'Andrea', '$2y$10$cGz4DUUyRjvOrcVB9UDNLO5sfSEr7IJgu6/cHGDkhMU/C.KGvR7jy', 'andrea@gmail.com', 1234567),
(21, '12345678A', 'Juan', '$2y$10$ofYrn480YSk.YOeD2iRJUO/zWIhr6vfafuNs7.dgEcnkkADnJM2dy', 'juan@gmail.com', 1234567);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre_usuario` varchar(100) NOT NULL,
  `clave` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre_usuario`, `clave`) VALUES
(1, 'andrea', '123');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `detalle_pedidos`
--
ALTER TABLE `detalle_pedidos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pedidos` (`pedido_id`),
  ADD KEY `fk_producto` (`producto_id`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_clientes` (`cliente_dni`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_categorias` (`categoria_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `detalle_pedidos`
--
ALTER TABLE `detalle_pedidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalle_pedidos`
--
ALTER TABLE `detalle_pedidos`
  ADD CONSTRAINT `fk_pedidos` FOREIGN KEY (`pedido_id`) REFERENCES `pedidos` (`id`),
  ADD CONSTRAINT `fk_producto` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`);

--
-- Filtros para la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `fk_clientes` FOREIGN KEY (`cliente_dni`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `fk_categoria` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`),
  ADD CONSTRAINT `fk_categorias` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
