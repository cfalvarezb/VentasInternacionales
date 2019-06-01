-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-06-2017 a las 07:12:59
-- Versión del servidor: 10.1.19-MariaDB
-- Versión de PHP: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `oswa_inv`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categories`
--

CREATE TABLE `categories` (
  `id` int(11)  NOT NULL,
  `name` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `media`
--

CREATE TABLE `media` (
  `id` int(11)   NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `file_type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE `products` (
  `id_producto` int(11)   NOT NULL,
  `name` varchar(255) NOT NULL,
  `categorie_id` int(11)  NOT NULL,
  `media_id` int(11) DEFAULT '0',
  `date` datetime NOT NULL,
   `id_presentacion_botella` int (11) NOT NULL,
   `reg_importacion` datetime NOT NULL,
    `sanitario` VARCHAR (250) NOT NULL,
    `frase_exc_alcohol` int (11)not null,
    `importador` int (11) not null,
    `g_alcohol` decimal (25,2) not null,
    `reg_lote` varchar (255) not null,
    `fecha_vencimiento` datetime not null
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



-- --------------------------------------------------------


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11)   NOT NULL,
  `name` varchar(60) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_level` int(11) NOT NULL,
  `image` varchar(255) DEFAULT 'no_image.jpg',
  `status` int(1) NOT NULL,
  `last_login` datetime DEFAULT NULL,
    `id_cliente` int (250) not null
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `users`
--



-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_groups`
--

CREATE TABLE `user_groups` (
  `id` int(11) NOT NULL,
  `group_name` varchar(150) NOT NULL,
  `group_level` int(11) NOT NULL,
  `group_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `proveedores` (
  `id_proveedor` int(22) NOT NULL,
  `name` varchar(150) NOT NULL,
  `pais` varchar(150) NOT NULL,
  `ciudad`varchar(150) NOT NULL,
   `cod_bar_producto` varchar (150) not null,
    `cod_gobernacion` varchar(150)not  null,
    `id_tipo_vino` int (20) not null,
    `nombre_producto` varchar (250) not null,
  `id_presentacion_botella` varchar (250) not null,
    `n_invima` varchar (250) not null,
    `grados_alcohol` decimal(25,2) not null,
    `vencimiento_invima` datetime not null
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE `clientes` (
  `id_cliente` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `nit` varchar(150) NOT NULL,
  `direccion`varchar(150) not null,
   `telefono` varchar (150) not null,
    `persona_contacto` varchar(150)not  null,
    `correo_1` varchar (250) not null,
  `correo_2` varchar (250) not null
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE `doc_transporte` (
  `id_doc_transporte` int(22) not null,
  `id_cliente` int(22) NOT NULL,
    `fecha_ingreso` datetime not null,
  `bl` varchar(150) NOT NULL,
    `id_tipo_factura` int (20) not null,
  `casa` varchar(150) NOT NULL,
  `id_tipo_carga` int (20) not null,
   `codigo_factura` varchar (150) not null,
    `id_codigo_producto` int (20) not null,
    `cantidad` int (20) not null,
    `cantidad_x_caja` int (20) not null,
    `botellas` int (20) not null,
    `invima` varchar (250) not null,
  `paso_reg_invima` int (20) not null,
    `grados_alcohol_aut` int (20) not null,
    `paso_grados_alcohol_aut` int (20) not null,
    `peso_caja` decimal (25,2) not null,
    `reg_exportacion` int (20) not null,
    `invima_fisico` int(20) not null,
    `num_doc_transporte` varchar (20) not null
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- �?ndices para tablas volcadas
--
CREATE TABLE `parametros_generales` (
  `id_param_generales` int(22) NOT NULL,
  `descripcion` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE `valores_parametros_generales` (
  `id_valores_generales` int(22) NOT NULL,
    `id_val_param` int(20) NOT NULL,
  `descripcion` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `facturacion` (
  `id_facturacion` int(11) NOT NULL,
  `id_doc_transporte` int(11) not null,
  `declaracion`int(15) NOT NULL,
   `fondo_cuenta` int (8) not null,
    `nacionanlizado` int(30)not  null,
  `num_fact_nacionalizado` int (6) not null
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE `detalle_distribucion` (
  `id_detalle_distribucion` int(11) NOT NULL,
  `id_distribucion` int(30) NOT NULL,
  `id_tipo_distribucion` int(30) NOT NULL,
   `peso` decimal (25,2) not null,
    `num_fac_envio` int(30)not  null,
    `observaciones` varchar (300) not null
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `contador_distribucion` (
  `id_distribucion` int(11) NOT NULL,  
  `id_facturacion` int(11) NOT NULL
    
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `distribucion_estampilla` (
  `id` int(11) NOT NULL,  
  `id_distribucion_estampilla` int(11) NOT NULL,
   `fecha_entrega` datetime not null,
    `cantidad` int (30) not null,
    `n_ayudantes` int (20) not null
    
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `contador_estampilla` (
  `id_contador_estampilla` int(11) NOT NULL,  
  `id_detalle_distribucion` int(11) NOT NULL
    
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `invoice` (
  `invoice_no` int(11) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `order_date` date NOT NULL,
  `sub_total` double NOT NULL,
  `gst` double NOT NULL,
  `discount` double NOT NULL,
  `net_total` double NOT NULL,
  `paid` double NOT NULL,
  `due` double NOT NULL,
  `payment_type` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `invoice_details` (
  `id` int(11) NOT NULL,
  `invoice_no` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `price` double NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


--
-- Indices de la tabla `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indices de la tabla `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indices de la tabla `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id_producto`),
  ADD UNIQUE KEY `name` (`name`),
  ADD KEY `categorie_id` (`categorie_id`),
  ADD KEY `media_id` (`media_id`);

--
-- Indices de la tabla `sales`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`id_proveedor`);

ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_cliente`);

ALTER TABLE `doc_transporte`
  ADD PRIMARY KEY (`id_doc_transporte`);
  
ALTER TABLE `parametros_generales`
  ADD PRIMARY KEY (`id_param_generales`);
  
ALTER TABLE `valores_parametros_generales`
  ADD PRIMARY KEY (`id_val_param`);
  
alter table `FACTURACION`
  ADD PRIMARY KEY (`id_facturacion`);
  
ALTER TABLE `contador_distribucion`
  ADD PRIMARY KEY (`id_distribucion`);  
  
ALTER TABLE `detalle_distribucion`
  ADD PRIMARY KEY (`id_detalle_distribucion`);
  
ALTER TABLE `distribucion_estampilla`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `contador_estampilla`
  ADD PRIMARY KEY (`id_contador_estampilla`);    
  
--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `user_level` (`user_level`);

--
-- Indices de la tabla `user_groups`
--
ALTER TABLE `user_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `group_level` (`group_level`);

--
-- AUTO_INCREMENT de las tablas volcadas
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`invoice_no`);

--
-- Indices de la tabla `invoice_details`
--
ALTER TABLE `invoice_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `invoice_no` (`invoice_no`);
--
-- AUTO_INCREMENT de la tabla `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11)  NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `media`
--
ALTER TABLE `media`
  MODIFY `id` int(11)  NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
  MODIFY `id_producto` int(11)  NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `sales`
--
ALTER TABLE `proveedores`
  MODIFY `id_proveedor` int(11)  NOT NULL AUTO_INCREMENT;
  
  ALTER TABLE `clientes`
  MODIFY `id_cliente` int(11)  NOT NULL AUTO_INCREMENT;
  
  ALTER TABLE `doc_transporte`
  MODIFY `id_doc_transporte` int(11)  NOT NULL AUTO_INCREMENT;
  
  ALTER TABLE `parametros_generales`
  MODIFY `id_param_generales` int(11)  NOT NULL AUTO_INCREMENT;
  
    ALTER TABLE `valores_parametros_generales`
  MODIFY `id_val_param` int(11)  NOT NULL AUTO_INCREMENT;
  
ALTER TABLE `facturacion`
  MODIFY `id_facturacion` int(11)  NOT NULL AUTO_INCREMENT;

ALTER TABLE `contador_distribucion`
  MODIFY `id_distribucion` int(11)  NOT NULL AUTO_INCREMENT;
  
ALTER TABLE `detalle_distribucion`
  MODIFY `id_detalle_distribucion` int(11)  NOT NULL AUTO_INCREMENT;

alter table `contador_estampilla`
  MODIFY `id_contador_estampilla` int(11)  NOT NULL AUTO_INCREMENT;
  
ALTER TABLE `distribucion_estampilla`
  MODIFY `id` int(11)  NOT NULL AUTO_INCREMENT;


--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11)  NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `user_groups`
--
ALTER TABLE `user_groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Restricciones para tablas volcadas
--
ALTER TABLE `invoice`
  MODIFY `invoice_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT de la tabla `invoice_details`
--
ALTER TABLE `invoice_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;
--
-- Filtros para la tabla `products`
--

 
ALTER TABLE `products`
  ADD CONSTRAINT `FK_products` FOREIGN KEY (`categorie_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
  
ALTER TABLE `proveedores`
  ADD CONSTRAINT `FK_proveedores` FOREIGN KEY (`id_tipo_vino`) REFERENCES `valores_parametros_generales` (`id_val_param`) ON DELETE CASCADE ON UPDATE CASCADE;  
  
  alter table `PRODUCTS`
  ADD CONSTRAINT `FK_products_clientes` FOREIGN KEY (`importador`) REFERENCES `proveedores`(`id_proveedor`) ON DELETE CASCADE ON UPDATE CASCADE;

 ALTER TABLE `doc_transporte`
  ADD CONSTRAINT `FK_doctranspor_valores_factura` FOREIGN KEY (`id_tipo_factura`) REFERENCES `valores_parametros_generales` (`id_val_param`) ON DELETE CASCADE ON UPDATE CASCADE;

 ALTER TABLE `doc_transporte`
  ADD CONSTRAINT `FK_doctranspor_valores_carga` FOREIGN KEY (`id_tipo_carga`) REFERENCES `valores_parametros_generales` (`id_val_param`) ON DELETE CASCADE ON UPDATE CASCADE;
   
 ALTER TABLE `doc_transporte`
  add constraint `fk_doctranspor_products` foreign key (`id_codigo_producto`) references `products` (`id_producto`) on delete cascade on update cascade;
  
  alter table `doc_transporte`
  ADD CONSTRAINT `fk_doctranspor_clientes` FOREIGN KEY (`id_cliente`) REFERENCES `users` (`id`) on delete cascade on update cascade; 
--
-- Filtros para la tabla `sales`
--
ALTER TABLE `products`
  ADD CONSTRAINT `FK_products_valores` FOREIGN KEY (`id_presentacion_botella`) REFERENCES `valores_parametros_generales` (`id_val_param`) ON DELETE CASCADE ON UPDATE CASCADE;
  
  ALTER TABLE `valores_parametros_generales` 
  ADD CONSTRAINT `FK_valores_parametros` FOREIGN KEY (`id_valores_generales`) REFERENCES `parametros_generales`(`id_param_generales`) ON DELETE CASCADE ON UPDATE CASCADE;
--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `FK_user` FOREIGN KEY (`user_level`) REFERENCES `user_groups` (`group_level`) ON DELETE CASCADE ON UPDATE CASCADE;
  
ALTER TABLE `facturacion`
  ADD CONSTRAINT `FK_facturacion_doc` FOREIGN KEY (`id_doc_transporte`) REFERENCES `doc_transporte` (`id_doc_transporte`) ON DELETE CASCADE ON UPDATE CASCADE;
  
alter table `contador_distribucion`
  add constraint `FK_contador_fact` foreign key (`id_facturacion`) references `facturacion` (`id_facturacion`) on delete cascade on update cascade;
  
alter table `detalle_distribucion`
  add constraint `FK_detalle_cont` foreign key (`id_distribucion`) references `contador_distribucion` (`id_distribucion`) on delete cascade on update cascade;
 
alter table `contador_estampilla`
  add constraint `FK_cont_est_det` foreign key (`id_detalle_distribucion`) references `detalle_distribucion` (`id_detalle_distribucion`) on delete cascade on update cascade;

alter table `distribucion_estampilla`
  add constraint `FK_distr_est_con` foreign key (`id_distribucion_estampilla`) references `contador_estampilla` (`id_contador_estampilla`) on delete cascade on update cascade;
  
ALTER TABLE `invoice_details`
  ADD CONSTRAINT `invoice_details_ibfk_1` FOREIGN KEY (`invoice_no`) REFERENCES `invoice` (`invoice_no`);

INSERT INTO `user_groups` (`id`, `group_name`, `group_level`, `group_status`) VALUES
(1, 'Admin', 1, 1),
(2, 'Special', 2, 0),
(3, 'User', 3, 1);

INSERT INTO `users` (`id`, `name`, `username`, `password`, `user_level`, `image`, `status`, `last_login`) VALUES
(1, 'Admin Users', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 1, 'pzg9wa7o1.jpg', 1, '2017-06-16 07:11:11');


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
