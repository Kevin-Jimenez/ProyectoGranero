CREATE TABLE `cliente` (
  `numero_documento_cliente` bigint(20) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `direccion` varchar(50) DEFAULT NULL,
  `telefono` bigint(20) DEFAULT NULL,
  `genero` varchar(10) DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `correo_electronico` varchar(30) NOT NULL,
  PRIMARY KEY (`numero_documento_cliente`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1

CREATE TABLE `detalle_pedido` (
  `codigo_detalle_pedido` varchar(20) NOT NULL,
  `codigo_producto` bigint(20) NOT NULL,
  `numero_documento_proveedor` bigint(20) NOT NULL,
  PRIMARY KEY (`codigo_detalle_pedido`),
  KEY `detalle_pedido_ibfk_1` (`codigo_producto`),
  KEY `detalle_pedido_ibfk_2` (`numero_documento_proveedor`),
  CONSTRAINT `detalle_pedido_ibfk_1` FOREIGN KEY (`codigo_producto`) REFERENCES `producto` (`codigo_producto`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `detalle_pedido_ibfk_2` FOREIGN KEY (`numero_documento_proveedor`) REFERENCES `proveedor` (`numero_documento_proveedor`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1

CREATE TABLE `detalle_venta` (
  `codigo_detalle_venta` bigint(20) NOT NULL,
  `codigo_venta` bigint(20) NOT NULL,
  `codigo_producto` bigint(20) NOT NULL,
  PRIMARY KEY (`codigo_detalle_venta`),
  KEY `detalle_venta_ibfk_2` (`codigo_producto`),
  KEY `detalle_venta_ibfk_1` (`codigo_venta`),
  CONSTRAINT `detalle_venta_ibfk_1` FOREIGN KEY (`codigo_venta`) REFERENCES `venta` (`codigo_venta`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `detalle_venta_ibfk_2` FOREIGN KEY (`codigo_producto`) REFERENCES `producto` (`codigo_producto`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1

CREATE TABLE `empleado` (
  `numero_documento_empleado` bigint(20) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `direccion` varchar(40) DEFAULT NULL,
  `telefono` bigint(20) DEFAULT NULL,
  `genero` varchar(10) DEFAULT NULL,
  `correo_electronico` varchar(30) NOT NULL,
  `cargo` varchar(11) DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  PRIMARY KEY (`numero_documento_empleado`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1

CREATE TABLE `producto` (
  `codigo_producto` bigint(20) NOT NULL,
  `nombre` varchar(20) DEFAULT NULL,
  `tamaño` varchar(11) NOT NULL,
  `precio` bigint(20) NOT NULL,
  `marca` varchar(20) DEFAULT NULL,
  `fecha_vencimiento` date NOT NULL,
  `cantidad_actual` varchar(250) NOT NULL,
  `cantidad_ingreso` varchar(300) NOT NULL,
  `cantidad_total_existencial` varchar(600) NOT NULL,
  PRIMARY KEY (`codigo_producto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1

CREATE TABLE `proveedor` (
  `numero_documento_proveedor` bigint(20) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `nombre_empresa` varchar(50) NOT NULL,
  `direccion` varchar(50) DEFAULT NULL,
  `telefono` bigint(20) NOT NULL,
  `genero` varchar(10) DEFAULT NULL,
  `correo_electronico` varchar(30) NOT NULL,
  PRIMARY KEY (`numero_documento_proveedor`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1

CREATE TABLE `usuario` (
  `codigo_usuario` bigint(5) NOT NULL,
  `rol` varchar(8) DEFAULT NULL,
  `usuario` varchar(20) NOT NULL,
  `contraseña` varchar(8) NOT NULL,
  `numero_documento_empleado` bigint(10) NOT NULL,
  PRIMARY KEY (`codigo_usuario`),
  KEY `usuario_ibfk_1` (`numero_documento_empleado`),
  CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`numero_documento_empleado`) REFERENCES `empleado` (`numero_documento_empleado`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1

CREATE TABLE `venta` (
  `codigo_venta` bigint(20) NOT NULL,
  `fecha_venta` date DEFAULT NULL,
  `cantidad_venta` int(11) NOT NULL,
  `total_venta` bigint(20) NOT NULL,
  `numero_documento_cliente` bigint(20) DEFAULT NULL,
  `numero_documento_empleado` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`codigo_venta`),
  KEY `venta_ibfk_2` (`numero_documento_empleado`),
  KEY `venta_ibfk_1` (`numero_documento_cliente`),
  CONSTRAINT `venta_ibfk_1` FOREIGN KEY (`numero_documento_cliente`) REFERENCES `cliente` (`numero_documento_cliente`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1