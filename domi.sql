-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-12-2021 a las 00:18:20
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `domi`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL COMMENT 'id de la orden',
  `customer_id` int(11) NOT NULL COMMENT 'id del cliente con el rol 3',
  `address` varchar(30) COLLATE utf8mb4_spanish2_ci NOT NULL COMMENT 'direccion del cliente para el envio',
  `email` varchar(30) COLLATE utf8mb4_spanish2_ci NOT NULL COMMENT 'email del usuario',
  `status` int(11) NOT NULL COMMENT '1 sactisfactorio 2 pendiente 3 fallido',
  `amount` varchar(30) COLLATE utf8mb4_spanish2_ci NOT NULL COMMENT 'monto del pedido',
  `order_date` date NOT NULL COMMENT 'fecha de la orden'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `address`, `email`, `status`, `amount`, `order_date`) VALUES
(2, 1, 'cra 14-b', 'alvaa@gmail.com', 1, '29000', '0000-00-00'),
(3, 2, 'cra 18-b', 'dayis@gmail.com', 1, '32000', '2021-10-01'),
(4, 2, 'cra 18-b', 'dayis@gmail.com', 1, '32000', '2021-10-01'),
(5, 2, 'cra 18-b', 'dayis@gmail.com', 1, '32000', '2021-10-01'),
(6, 2, 'cra 18-b', 'dayis@gmail.com', 1, '32000', '2021-10-01'),
(7, 2, 'cra 18-b', 'dayis@gmail.com', 1, '32000', '2021-10-01'),
(8, 2, 'cra 18-b', 'dayis@gmail.com', 1, '32000', '2021-10-01'),
(9, 2, 'cra 18-b', 'dayis@gmail.com', 1, '32000', '2021-10-01'),
(10, 2, 'cra 18-b', 'dayis@gmail.com', 1, '32000', '2021-10-01'),
(11, 2, 'cra 18-b', 'dayis@gmail.com', 1, '32000', '2021-10-01'),
(12, 2, 'cra 18-b', 'dayis@gmail.com', 1, '32000', '2021-10-01'),
(13, 2, 'cra 18-b', 'dayis@gmail.com', 1, '32000', '2021-10-01'),
(14, 2, 'cra 18-b', 'dayis@gmail.com', 1, '25000', '2021-10-01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL COMMENT 'id detalle de la orden',
  `priece` varchar(30) COLLATE utf8mb4_spanish2_ci NOT NULL COMMENT 'precio del producto ',
  `quantity` int(11) NOT NULL COMMENT 'cantidad del producto ',
  `order_id` int(11) NOT NULL COMMENT 'llave foranea id de la orden ',
  `products_id` int(11) NOT NULL COMMENT 'llave foranea id del producto '
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `order_details`
--

INSERT INTO `order_details` (`id`, `priece`, `quantity`, `order_id`, `products_id`) VALUES
(1, '5000', 3, 12, 1),
(2, '5000', 3, 13, 1),
(3, '5000', 5, 13, 2),
(4, '5000', 1, 14, 1),
(5, '20000', 2, 14, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(30) COLLATE utf8mb4_spanish2_ci NOT NULL COMMENT 'nombre del producto ',
  `price` varchar(20) COLLATE utf8mb4_spanish2_ci NOT NULL COMMENT 'precio del producto ',
  `description` varchar(200) COLLATE utf8mb4_spanish2_ci NOT NULL COMMENT 'descripcion del producto ',
  `thumbanail` varchar(255) COLLATE utf8mb4_spanish2_ci NOT NULL COMMENT 'miniatura del producto ',
  `restaurant_id` int(11) NOT NULL COMMENT 'id principal del restaurante',
  `stock` int(11) NOT NULL COMMENT 'stock de productos disponibles ',
  `status` varchar(1) COLLATE utf8mb4_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `description`, `thumbanail`, `restaurant_id`, `stock`, `status`) VALUES
(1, 'Empanada', '2000', 'Deliciosa empanada calientita, con el mejor aji. ', './images/products/empanada1.jpg', 1, 10, '1'),
(2, 'Ajiaco', '5000', 'Delicioso Ajiaco', './images/products/ajiaco.jpg', 1, 10, '1'),
(3, 'Hamburguesa', '15000', 'Hamburguesa deliciosa', './images/products/hamburguesa.jpg', 1, 5, '1'),
(4, 'Perro Caliente', '10000', 'Los perros calientes', './images/products/perroscalientes.jpg', 1, 6, '1'),
(5, 'Salchipapas', '5000', 'Salchipapas deliciosas', './images/products/salchipapas.jpg', 2, 5, '1'),
(6, 'Pasta bolognesa', '20000', 'Bien Deliciosa pasta', './images/products/pasta.jpeg', 3, 15, '1'),
(7, 'Lasagna', '18000', 'Deliciosa Lasagna', './images/products/lasagna.jpg', 3, 10, '1'),
(8, 'Pasta con verduras', '15000', 'Deliciosa pasta con verduras', './images/products/pastaverduras.png', 3, 8, '1'),
(9, 'pasta con queso', '19000', 'Deliciosa pasta con queso', './images/products/pastaqueso.jpg', 3, 20, '1'),
(10, 'Carne Asada', '15000', 'Deliciosa carne asada', './images/products/carneasada.jpg', 2, 10, '1'),
(11, 'Pechuga a la Plancha', '200000', 'Deliciosa pechuga a la plancha', './images/products/pechuga_pollo.jpg', 2, 8, '1'),
(12, 'Mojarra frita', '25000', 'Deliciosa mojarra frita', './images/products/pescado_frito.jpg', 2, 10, '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `restaurants`
--

CREATE TABLE `restaurants` (
  `id` int(11) NOT NULL COMMENT 'id principal del restaurante',
  `name` varchar(20) COLLATE utf8mb4_spanish2_ci NOT NULL COMMENT 'nombre del restaurante',
  `telephone` varchar(10) COLLATE utf8mb4_spanish2_ci NOT NULL COMMENT 'numero de telefono',
  `address` varchar(30) COLLATE utf8mb4_spanish2_ci NOT NULL COMMENT 'direccion del restaurante',
  `user_id` int(11) NOT NULL,
  `thumbnail` varchar(255) COLLATE utf8mb4_spanish2_ci NOT NULL COMMENT 'foto del logo del restaurante',
  `email` varchar(40) COLLATE utf8mb4_spanish2_ci NOT NULL COMMENT 'email del restaurante'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `restaurants`
--

INSERT INTO `restaurants` (`id`, `name`, `telephone`, `address`, `user_id`, `thumbnail`, `email`) VALUES
(1, 'Mis pollitos', '6017652034', 'cra 13', 2, './images/restaurants/restaurant1.jpg', 'mispollitos@gmail.com'),
(2, 'La parrillada', '6017658569', 'cra 14', 3, './images/restaurants/restaurant2.jpg', 'laparrillada@gmail.com'),
(3, 'Queens Gardens', '6017654523', 'cra 15', 8, './images/restaurants/restaurant3.jpg', 'queensgardens@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL COMMENT 'id del usuario autoincrementado',
  `name` varchar(20) COLLATE utf8mb4_spanish2_ci NOT NULL COMMENT 'nombre del usuario',
  `last_name` varchar(20) COLLATE utf8mb4_spanish2_ci NOT NULL COMMENT 'apellido del usuario',
  `email` varchar(40) COLLATE utf8mb4_spanish2_ci NOT NULL COMMENT 'email del usuario',
  `date_birth` date NOT NULL COMMENT 'fecha de nacimiento ',
  `password` varchar(20) COLLATE utf8mb4_spanish2_ci NOT NULL COMMENT 'contraseña de ingreso',
  `role` int(11) NOT NULL COMMENT '1 admin 2 usuario_restaurante 3 cliente',
  `photo` varchar(255) COLLATE utf8mb4_spanish2_ci NOT NULL COMMENT 'foto del usuario ',
  `address` varchar(30) COLLATE utf8mb4_spanish2_ci NOT NULL COMMENT 'direccion usuario ',
  `telephone` varchar(100) COLLATE utf8mb4_spanish2_ci NOT NULL COMMENT 'telefono del usuario ',
  `cell_phone` varchar(100) COLLATE utf8mb4_spanish2_ci NOT NULL COMMENT 'numero de celular del usuario '
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `last_name`, `email`, `date_birth`, `password`, `role`, `photo`, `address`, `telephone`, `cell_phone`) VALUES
(1, 'Alvaro', '', '', '0000-00-00', '', 0, '', '', '', ''),
(2, 'Alvaro', 'Useche', 'alvaa@gmail.com', '0000-00-00', '123456', 2, './images/users/profile2.jpg', 'cra 17 l # 78 34 sur', '7650096', '3122435465'),
(3, 'Alejandra', 'Morales', 'aleja34@gmail.com', '0000-00-00', '123456', 2, './images/users/profile1.jpg', 'calle 74 a # 17 a 34', '7662912', '3137656459'),
(6, 'alvaro', 'useche', 'alvaro@gmail.com', '0000-00-00', '123456', 2, './images/users/106-1062873_dual-monitor-space-dual-monitor-wallpaper-space.jpg', 'carrera 20', '', ''),
(7, 'alvaro', 'useche', 'alvaro5456@gmail.com', '2021-11-30', '123456', 2, './images/users/106-1062873_dual-monitor-space-dual-monitor-wallpaper-space.jpg', 'carrera 20', '7890987', '3135678909'),
(8, 'alvaro', 'useche', 'alvaro666@gmail.com', '0000-00-00', '123456', 2, './images/users/profile3.jpg', 'carrera 20', '7890987', '3135678909'),
(9, 'alvaro', 'useche', 'dayislahermosa@gmail.com', '0000-00-00', '123456', 2, './images/users/profile1.jpg', 'carrera 20', '7890987', '3135678909'),
(10, 'alvaro', 'useche', 'dayis666@gmail.com', '0000-00-00', '123456', 2, './images/users/profile1.jpg', 'carrera 20', '7890987', '3135678909');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_FK` (`customer_id`);

--
-- Indices de la tabla `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_details_FK` (`products_id`),
  ADD KEY `order_details_FK_1` (`order_id`);

--
-- Indices de la tabla `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_FK` (`restaurant_id`);

--
-- Indices de la tabla `restaurants`
--
ALTER TABLE `restaurants`
  ADD PRIMARY KEY (`id`),
  ADD KEY `restaurants_FK` (`user_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id de la orden', AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id detalle de la orden', AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `restaurants`
--
ALTER TABLE `restaurants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id principal del restaurante', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id del usuario autoincrementado', AUTO_INCREMENT=11;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_FK` FOREIGN KEY (`customer_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_FK` FOREIGN KEY (`products_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `order_details_FK_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`);

--
-- Filtros para la tabla `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_FK` FOREIGN KEY (`restaurant_id`) REFERENCES `restaurants` (`id`);

--
-- Filtros para la tabla `restaurants`
--
ALTER TABLE `restaurants`
  ADD CONSTRAINT `restaurants_FK` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
