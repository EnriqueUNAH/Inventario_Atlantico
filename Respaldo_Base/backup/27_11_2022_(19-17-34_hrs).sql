SET FOREIGN_KEY_CHECKS=0;

CREATE DATABASE IF NOT EXISTS inversionesatlantico;

USE inversionesatlantico;

DROP TABLE IF EXISTS cliente;

CREATE TABLE `cliente` (
  `idcliente` int NOT NULL AUTO_INCREMENT,
  `nit` int DEFAULT NULL,
  `nombre` varchar(80) DEFAULT NULL,
  `telefono` bigint DEFAULT NULL,
  `direccion` text,
  `dateadd` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `usuario_id` int NOT NULL,
  `estatus` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`idcliente`),
  KEY `usuario_id` (`usuario_id`),
  CONSTRAINT `cliente_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`idusuario`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;




DROP TABLE IF EXISTS configuracion;

CREATE TABLE `configuracion` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `nit` varchar(20) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `razon_social` varchar(100) NOT NULL,
  `telefono` bigint NOT NULL,
  `email` varchar(200) NOT NULL,
  `direccion` text NOT NULL,
  `iva` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;




DROP TABLE IF EXISTS detalle_temp;

CREATE TABLE `detalle_temp` (
  `correlativo` int NOT NULL AUTO_INCREMENT,
  `token_user` varchar(50) NOT NULL,
  `codproducto` int NOT NULL,
  `cantidad` int NOT NULL,
  `precio_venta` decimal(10,2) NOT NULL,
  PRIMARY KEY (`correlativo`),
  KEY `nofactura` (`token_user`),
  KEY `codproducto` (`codproducto`),
  CONSTRAINT `detalle_temp_ibfk_2` FOREIGN KEY (`codproducto`) REFERENCES `producto` (`codproducto`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;




DROP TABLE IF EXISTS detallefactura;

CREATE TABLE `detallefactura` (
  `correlativo` bigint NOT NULL AUTO_INCREMENT,
  `nofactura` bigint DEFAULT NULL,
  `codproducto` int DEFAULT NULL,
  `cantidad` int DEFAULT NULL,
  `precio_venta` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`correlativo`),
  KEY `codproducto` (`codproducto`),
  KEY `nofactura` (`nofactura`),
  CONSTRAINT `detallefactura_ibfk_2` FOREIGN KEY (`codproducto`) REFERENCES `producto` (`codproducto`),
  CONSTRAINT `detallefactura_ibfk_3` FOREIGN KEY (`nofactura`) REFERENCES `factura` (`nofactura`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=82 DEFAULT CHARSET=latin1;




DROP TABLE IF EXISTS entradas;

CREATE TABLE `entradas` (
  `correlativo` int NOT NULL AUTO_INCREMENT,
  `codproducto` int NOT NULL,
  `fecha` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cantidad` int NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `usuario_id` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`correlativo`),
  KEY `codproducto` (`codproducto`),
  CONSTRAINT `entradas_ibfk_1` FOREIGN KEY (`codproducto`) REFERENCES `producto` (`codproducto`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;




DROP TABLE IF EXISTS factura;

CREATE TABLE `factura` (
  `nofactura` bigint NOT NULL AUTO_INCREMENT,
  `fecha` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `usuario` int DEFAULT NULL,
  `codcliente` int DEFAULT NULL,
  `totalfactura` decimal(10,2) DEFAULT NULL,
  `estatus` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`nofactura`),
  KEY `usuario` (`usuario`),
  KEY `codcliente` (`codcliente`),
  CONSTRAINT `factura_ibfk_1` FOREIGN KEY (`codcliente`) REFERENCES `cliente` (`idcliente`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `factura_ibfk_2` FOREIGN KEY (`usuario`) REFERENCES `usuario` (`idusuario`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;




DROP TABLE IF EXISTS producto;

CREATE TABLE `producto` (
  `codproducto` int NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(100) DEFAULT NULL,
  `proveedor` int DEFAULT NULL,
  `precio` decimal(10,2) DEFAULT NULL,
  `existencia` int DEFAULT NULL,
  `date_add` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `usuario_id` int NOT NULL,
  `estatus` int NOT NULL DEFAULT '1',
  `foto` text,
  PRIMARY KEY (`codproducto`),
  KEY `proveedor` (`proveedor`),
  KEY `usuario_id` (`usuario_id`),
  CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`proveedor`) REFERENCES `proveedor` (`codproveedor`),
  CONSTRAINT `producto_ibfk_2` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`idusuario`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;




DROP TABLE IF EXISTS proveedor;

CREATE TABLE `proveedor` (
  `codproveedor` int NOT NULL AUTO_INCREMENT,
  `proveedor` varchar(100) DEFAULT NULL,
  `contacto` varchar(100) DEFAULT NULL,
  `telefono` bigint DEFAULT NULL,
  `direccion` text,
  `date_add` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `usuario_id` int NOT NULL,
  `estatus` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`codproveedor`),
  KEY `usuario_id` (`usuario_id`),
  CONSTRAINT `proveedor_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`idusuario`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;




DROP TABLE IF EXISTS rol;

CREATE TABLE `rol` (
  `idrol` int NOT NULL AUTO_INCREMENT,
  `rol` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`idrol`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;




DROP TABLE IF EXISTS tbl_bitacora;

CREATE TABLE `tbl_bitacora` (
  `ID_BITACORA` int NOT NULL AUTO_INCREMENT,
  `FECHA` datetime DEFAULT NULL,
  `ID_USUARIO` int DEFAULT NULL,
  `ID_OBJETO` int DEFAULT NULL,
  `ACCION` varchar(20) DEFAULT NULL,
  `DESCRIPCION` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ID_BITACORA`),
  KEY `Bitacora_IdUsuario_idx` (`ID_USUARIO`),
  KEY `Bitacora_IdObjeto_idx` (`ID_OBJETO`),
  CONSTRAINT `Bitacora_IdObjeto` FOREIGN KEY (`ID_OBJETO`) REFERENCES `tbl_ms_objetos` (`ID_OBJETO`),
  CONSTRAINT `Bitacora_IdUsuario` FOREIGN KEY (`ID_USUARIO`) REFERENCES `tbl_ms_usuario` (`ID_USUARIO`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO tbl_bitacora VALUES("1","2022-11-25 00:00:00","1","1","INGRESO AL SISTEMA","INGRESO A LA PANTALLA PRINCIPAL DESDE LOGIN");
INSERT INTO tbl_bitacora VALUES("2","2022-11-25 00:00:00","1","1","INGRESO AL SISTEMA","INGRESO A LA PANTALLA PRINCIPAL DESDE LOGIN");
INSERT INTO tbl_bitacora VALUES("3","2022-11-25 00:00:00","1","1","CERRAR SESION","CIERE DE SESION PANTALLA PRINCIPAL");
INSERT INTO tbl_bitacora VALUES("4","2022-11-26 00:00:00","1","1","INGRESO AL SISTEMA","INGRESO A LA PANTALLA PRINCIPAL DESDE LOGIN");
INSERT INTO tbl_bitacora VALUES("5","2022-11-26 00:00:00","1","1","INGRESO AL SISTEMA","INGRESO A LA PANTALLA PRINCIPAL DESDE LOGIN");
INSERT INTO tbl_bitacora VALUES("6","2022-11-26 00:00:00","1","1","CERRAR SESION","CIERE DE SESION PANTALLA PRINCIPAL");
INSERT INTO tbl_bitacora VALUES("7","2022-11-27 00:00:00","1","1","INGRESO AL SISTEMA","INGRESO A LA PANTALLA PRINCIPAL DESDE LOGIN");
INSERT INTO tbl_bitacora VALUES("8","2022-11-27 00:00:00","1","1","INGRESO AL SISTEMA","INGRESO A LA PANTALLA PRINCIPAL DESDE LOGIN");
INSERT INTO tbl_bitacora VALUES("9","2022-11-27 00:00:00","1","1","INGRESO AL SISTEMA","INGRESO A LA PANTALLA PRINCIPAL DESDE LOGIN");
INSERT INTO tbl_bitacora VALUES("10","2022-11-27 00:00:00","1","1","INGRESO AL SISTEMA","INGRESO A LA PANTALLA PRINCIPAL DESDE LOGIN");
INSERT INTO tbl_bitacora VALUES("11","2022-11-28 00:00:00","1","1","INGRESO AL SISTEMA","INGRESO A LA PANTALLA PRINCIPAL DESDE LOGIN");
INSERT INTO tbl_bitacora VALUES("12","2022-11-28 00:00:00","1","1","INGRESO AL SISTEMA","INGRESO A LA PANTALLA PRINCIPAL DESDE LOGIN");
INSERT INTO tbl_bitacora VALUES("13","2022-11-28 00:00:00","1","1","INGRESO AL SISTEMA","INGRESO A LA PANTALLA PRINCIPAL DESDE LOGIN");
INSERT INTO tbl_bitacora VALUES("14","2022-11-28 00:00:00","1","1","INGRESO AL SISTEMA","INGRESO A LA PANTALLA PRINCIPAL DESDE LOGIN");
INSERT INTO tbl_bitacora VALUES("15","2022-11-28 00:00:00","1","1","INGRESO AL SISTEMA","INGRESO A LA PANTALLA PRINCIPAL DESDE LOGIN");
INSERT INTO tbl_bitacora VALUES("16","2022-11-28 00:00:00","1","1","INGRESO AL SISTEMA","INGRESO A LA PANTALLA PRINCIPAL DESDE LOGIN");
INSERT INTO tbl_bitacora VALUES("17","2022-11-28 00:00:00","1","1","INGRESO AL SISTEMA","INGRESO A LA PANTALLA PRINCIPAL DESDE LOGIN");
INSERT INTO tbl_bitacora VALUES("18","2022-11-28 00:00:00","1","1","INGRESO AL SISTEMA","INGRESO A LA PANTALLA PRINCIPAL DESDE LOGIN");
INSERT INTO tbl_bitacora VALUES("19","2022-11-28 00:00:00","1","1","INGRESO AL SISTEMA","INGRESO A LA PANTALLA PRINCIPAL DESDE LOGIN");
INSERT INTO tbl_bitacora VALUES("20","2022-11-28 00:00:00","1","1","INGRESO AL SISTEMA","INGRESO A LA PANTALLA PRINCIPAL DESDE LOGIN");
INSERT INTO tbl_bitacora VALUES("21","2022-11-28 00:00:00","1","1","INGRESO AL SISTEMA","INGRESO A LA PANTALLA PRINCIPAL DESDE LOGIN");
INSERT INTO tbl_bitacora VALUES("22","2022-11-28 00:00:00","1","1","INGRESO AL SISTEMA","INGRESO A LA PANTALLA PRINCIPAL DESDE LOGIN");
INSERT INTO tbl_bitacora VALUES("23","2022-11-28 00:00:00","1","1","INGRESO AL SISTEMA","INGRESO A LA PANTALLA PRINCIPAL DESDE LOGIN");
INSERT INTO tbl_bitacora VALUES("24","2022-11-28 00:00:00","1","1","INGRESO AL SISTEMA","INGRESO A LA PANTALLA PRINCIPAL DESDE LOGIN");
INSERT INTO tbl_bitacora VALUES("25","2022-11-28 00:00:00","1","1","INGRESO AL SISTEMA","INGRESO A LA PANTALLA PRINCIPAL DESDE LOGIN");
INSERT INTO tbl_bitacora VALUES("26","2022-11-28 00:00:00","1","1","INGRESO AL SISTEMA","INGRESO A LA PANTALLA PRINCIPAL DESDE LOGIN");
INSERT INTO tbl_bitacora VALUES("27","2022-11-28 00:00:00","1","1","INGRESO AL SISTEMA","INGRESO A LA PANTALLA PRINCIPAL DESDE LOGIN");



DROP TABLE IF EXISTS tbl_cliente;

CREATE TABLE `tbl_cliente` (
  `COD_CLIENTE` int NOT NULL AUTO_INCREMENT,
  `RTN` varchar(14) DEFAULT NULL,
  `NOMBRE_COMPLETO` varchar(100) NOT NULL,
  `TELEFONO` int DEFAULT NULL,
  `CORREO_ELECTRONICO` varchar(30) DEFAULT NULL,
  `DIRECCION` varchar(255) DEFAULT NULL,
  `FECHA_REGISTRO` datetime DEFAULT NULL,
  `COD_GENERO` int DEFAULT NULL,
  `ID_USUARIO` int DEFAULT NULL,
  `ESTADO` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`COD_CLIENTE`),
  KEY `tbl_Genero_Cod_Genero_idx` (`COD_GENERO`),
  KEY `Cliente_IdUsuario_idx` (`ID_USUARIO`),
  CONSTRAINT `Cliente_CodGenero` FOREIGN KEY (`COD_GENERO`) REFERENCES `tbl_genero` (`COD_GENERO`),
  CONSTRAINT `Cliente_IdUsuario` FOREIGN KEY (`ID_USUARIO`) REFERENCES `tbl_ms_usuario` (`ID_USUARIO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;




DROP TABLE IF EXISTS tbl_compra;

CREATE TABLE `tbl_compra` (
  `COD_COMPRA` int NOT NULL AUTO_INCREMENT,
  `TOTAL_PAGADO` decimal(8,2) DEFAULT NULL,
  `FECHA` datetime DEFAULT NULL,
  `ISV` decimal(8,2) DEFAULT NULL,
  `COD_PROVEEDOR` int DEFAULT NULL,
  PRIMARY KEY (`COD_COMPRA`),
  KEY `TBL_PROVEEDOR_COD_PROVEEDOR_idx` (`COD_PROVEEDOR`),
  CONSTRAINT `Compra_CodProveedor` FOREIGN KEY (`COD_PROVEEDOR`) REFERENCES `tbl_proveedor` (`COD_PROVEEDOR`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;




DROP TABLE IF EXISTS tbl_configuracion_cai;

CREATE TABLE `tbl_configuracion_cai` (
  `COD_TALONARIO` int NOT NULL AUTO_INCREMENT,
  `RANGO_INICIAL` int DEFAULT NULL,
  `RANGO_FINAL` int DEFAULT NULL,
  `RANGO_ACTUAL` int DEFAULT NULL,
  `NUMERO_CAI` varchar(40) DEFAULT NULL,
  `FECHA_VENCIMIENTO` datetime DEFAULT NULL,
  `ID_USUARIO` int DEFAULT NULL,
  PRIMARY KEY (`COD_TALONARIO`),
  KEY `TBL_MS_USUARIOS_ID_USUARIO_idx` (`ID_USUARIO`),
  CONSTRAINT `ConfiguracionCAI_IdUsuario` FOREIGN KEY (`ID_USUARIO`) REFERENCES `tbl_ms_usuario` (`ID_USUARIO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;




DROP TABLE IF EXISTS tbl_descuento;

CREATE TABLE `tbl_descuento` (
  `COD_DESCUENTO` int NOT NULL AUTO_INCREMENT,
  `NOMBRE_DESCUENTO` varchar(20) DEFAULT NULL,
  `PORCENTAJE_DESCUENTO` decimal(8,2) DEFAULT NULL,
  PRIMARY KEY (`COD_DESCUENTO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;




DROP TABLE IF EXISTS tbl_detalle_compra;

CREATE TABLE `tbl_detalle_compra` (
  `COD_DETALLE_COMPRA` int NOT NULL AUTO_INCREMENT,
  `PRECIO_COMPRA` decimal(8,2) DEFAULT NULL,
  `CANTIDAD` int DEFAULT NULL,
  `COD_PRODUCTO` int DEFAULT NULL,
  `COD_COMPRA` int DEFAULT NULL,
  PRIMARY KEY (`COD_DETALLE_COMPRA`),
  KEY `TBL_PRODUCTO_COD_PRODUCTO_idx` (`COD_PRODUCTO`),
  KEY `TBL_COMPRA_COD_COMPRA_idx` (`COD_COMPRA`),
  CONSTRAINT `DetalleCompra_CodCompra` FOREIGN KEY (`COD_COMPRA`) REFERENCES `tbl_compra` (`COD_COMPRA`),
  CONSTRAINT `DetalleCompra_CodProducto` FOREIGN KEY (`COD_PRODUCTO`) REFERENCES `tbl_producto` (`COD_PRODUCTO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;




DROP TABLE IF EXISTS tbl_detalle_factura;

CREATE TABLE `tbl_detalle_factura` (
  `CORRELATIVO` bigint NOT NULL AUTO_INCREMENT,
  `NO_FACTURA` bigint DEFAULT NULL,
  `COD_PRODUCTO` int DEFAULT NULL,
  `CANTIDAD` int DEFAULT NULL,
  `PRECIO_VENTA` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`CORRELATIVO`),
  KEY `DetalleFactura_CodProducto_idx` (`COD_PRODUCTO`),
  KEY `DetalleFactura_NoFactura_idx` (`NO_FACTURA`),
  CONSTRAINT `DetalleFactura_CodProducto` FOREIGN KEY (`COD_PRODUCTO`) REFERENCES `tbl_producto` (`COD_PRODUCTO`),
  CONSTRAINT `DetalleFactura_NoFactura` FOREIGN KEY (`NO_FACTURA`) REFERENCES `tbl_factura` (`NO_FACTURA`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;




DROP TABLE IF EXISTS tbl_detalle_factura_temp;

CREATE TABLE `tbl_detalle_factura_temp` (
  `CORRELATIVO` int NOT NULL AUTO_INCREMENT,
  `COD_PRODUCTO` int NOT NULL,
  `CANTIDAD` int NOT NULL,
  `PRECIO_VENTA` decimal(10,2) NOT NULL,
  PRIMARY KEY (`CORRELATIVO`),
  KEY `DetalleDacturaTemp_CodProducto_idx` (`COD_PRODUCTO`),
  CONSTRAINT `DetalleDacturaTemp_CodProducto` FOREIGN KEY (`COD_PRODUCTO`) REFERENCES `tbl_producto` (`COD_PRODUCTO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;




DROP TABLE IF EXISTS tbl_detalle_produccion;

CREATE TABLE `tbl_detalle_produccion` (
  `COD_DETALLE_PRODUCCION` int NOT NULL AUTO_INCREMENT,
  `CANTIDAD` int DEFAULT NULL,
  `COD_PRODUCTO` int DEFAULT NULL,
  `COD_PRODUCCION` int DEFAULT NULL,
  PRIMARY KEY (`COD_DETALLE_PRODUCCION`),
  KEY `TBL_PRODUCTO_COD_PRODUCTO_idx` (`COD_PRODUCTO`),
  KEY `TBL_PRODUCCION_COD_PRODUCCION_idx` (`COD_PRODUCCION`),
  CONSTRAINT `DetalleProduccion_CodProduccion` FOREIGN KEY (`COD_PRODUCCION`) REFERENCES `tbl_produccion` (`COD_PRODUCCION`),
  CONSTRAINT `DetalleProduccion_CodProducto` FOREIGN KEY (`COD_PRODUCTO`) REFERENCES `tbl_producto` (`COD_PRODUCTO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;




DROP TABLE IF EXISTS tbl_estante;

CREATE TABLE `tbl_estante` (
  `COD_ESTANTE` int NOT NULL AUTO_INCREMENT,
  `NOMBRE_ESTANTE` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`COD_ESTANTE`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;




DROP TABLE IF EXISTS tbl_factura;

CREATE TABLE `tbl_factura` (
  `NO_FACTURA` bigint NOT NULL AUTO_INCREMENT,
  `FECHA` datetime DEFAULT CURRENT_TIMESTAMP,
  `ID_USUARIO` int DEFAULT NULL,
  `COD_CLIENTE` int DEFAULT NULL,
  `TOTAL_FACTURA` decimal(10,2) DEFAULT NULL,
  `ESTADO` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`NO_FACTURA`),
  KEY `TBL_CLIENTE_COD_CLIENTE_idx` (`COD_CLIENTE`),
  CONSTRAINT `Venta_CodCliente` FOREIGN KEY (`COD_CLIENTE`) REFERENCES `tbl_cliente` (`COD_CLIENTE`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;




DROP TABLE IF EXISTS tbl_factura_descuento;

CREATE TABLE `tbl_factura_descuento` (
  `COD_FACTURA_DESCUENTO` int NOT NULL AUTO_INCREMENT,
  `NO_FACTURA` bigint DEFAULT NULL,
  `COD_DESCUENTO` int DEFAULT NULL,
  PRIMARY KEY (`COD_FACTURA_DESCUENTO`),
  KEY `FacturaDescuento_CodVenta_idx` (`NO_FACTURA`),
  KEY `FacturaDescuento_CodDescuento_idx` (`COD_DESCUENTO`),
  CONSTRAINT `FacturaDescuento_CodDescuento` FOREIGN KEY (`COD_DESCUENTO`) REFERENCES `tbl_descuento` (`COD_DESCUENTO`),
  CONSTRAINT `FacturaDescuento_CodVenta` FOREIGN KEY (`NO_FACTURA`) REFERENCES `tbl_factura` (`NO_FACTURA`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;




DROP TABLE IF EXISTS tbl_factura_promocion;

CREATE TABLE `tbl_factura_promocion` (
  `COD_FACTURA_PROMOCION` int NOT NULL AUTO_INCREMENT,
  `COD_PROMOCION` int DEFAULT NULL,
  `NO_FACTURA` bigint DEFAULT NULL,
  PRIMARY KEY (`COD_FACTURA_PROMOCION`),
  KEY `FacturaPromocion_CodVenta_idx` (`NO_FACTURA`),
  KEY `FacturaPromocion_CodPromocion_idx` (`COD_PROMOCION`),
  CONSTRAINT `FacturaPromocion_CodPromocion` FOREIGN KEY (`COD_PROMOCION`) REFERENCES `tbl_promocion` (`COD_PROMOCION`),
  CONSTRAINT `FacturaPromocion_CodVenta` FOREIGN KEY (`NO_FACTURA`) REFERENCES `tbl_factura` (`NO_FACTURA`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;




DROP TABLE IF EXISTS tbl_genero;

CREATE TABLE `tbl_genero` (
  `COD_GENERO` int NOT NULL AUTO_INCREMENT,
  `NOMBRE_GENERO` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`COD_GENERO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;




DROP TABLE IF EXISTS tbl_inventario;

CREATE TABLE `tbl_inventario` (
  `COD_INVENTARIO` int NOT NULL AUTO_INCREMENT,
  `FECHA` datetime DEFAULT NULL,
  `DESCRIPCION` varchar(255) DEFAULT NULL,
  `CANTIDAD` int DEFAULT NULL,
  `COD_PRODUCTO` int DEFAULT NULL,
  `COD_TIPO_INVENTARIO` int DEFAULT NULL,
  PRIMARY KEY (`COD_INVENTARIO`),
  KEY `TBL_PRODUCTO_COD_PRODUCTO_idx` (`COD_PRODUCTO`),
  KEY `TBL_TIPO_INVENTARIO_COD_TIPO_INVENTARIO_idx` (`COD_TIPO_INVENTARIO`),
  CONSTRAINT `Inventario_CodTipoInventario` FOREIGN KEY (`COD_TIPO_INVENTARIO`) REFERENCES `tbl_tipo_inventario` (`COD_TIPO_INVENTARIO`),
  CONSTRAINT `InventarioCodProducto` FOREIGN KEY (`COD_PRODUCTO`) REFERENCES `tbl_producto` (`COD_PRODUCTO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;




DROP TABLE IF EXISTS tbl_kardex;

CREATE TABLE `tbl_kardex` (
  `COD_KARDEX` int NOT NULL AUTO_INCREMENT,
  `FECHA` datetime DEFAULT NULL,
  `COD_PRODUCTO` int DEFAULT NULL,
  `COD_TIPO_MOVIMIENTO` int DEFAULT NULL,
  `COD_ESTANTE` int DEFAULT NULL,
  PRIMARY KEY (`COD_KARDEX`),
  KEY `tbl_Producto_Cod_Producto_idx` (`COD_PRODUCTO`),
  KEY `TBL_ESTANTE_COD_ESTANTE_idx` (`COD_ESTANTE`),
  KEY `TBL_TIPO_MOVIMIENTO_COD_TIPO_MOVIMIENTO_idx` (`COD_TIPO_MOVIMIENTO`),
  CONSTRAINT `Kardex_CodEstante` FOREIGN KEY (`COD_ESTANTE`) REFERENCES `tbl_estante` (`COD_ESTANTE`),
  CONSTRAINT `Kardex_CodProducto` FOREIGN KEY (`COD_PRODUCTO`) REFERENCES `tbl_producto` (`COD_PRODUCTO`),
  CONSTRAINT `Kardex_CodTipoMovimiento` FOREIGN KEY (`COD_TIPO_MOVIMIENTO`) REFERENCES `tbl_tipo_movimiento` (`COD_TIPO_MOVIMIENTO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;




DROP TABLE IF EXISTS tbl_ms_estado;

CREATE TABLE `tbl_ms_estado` (
  `ID_ESTADO` int NOT NULL AUTO_INCREMENT,
  `NOMBRE_ESTADO` varchar(45) NOT NULL,
  `DESCRIPCION` varchar(100) DEFAULT NULL,
  `CREADO_POR` varchar(15) DEFAULT NULL,
  `FECHA_CREACION` date DEFAULT NULL,
  `MODIFICADO_POR` varchar(15) DEFAULT NULL,
  `FECHA_MODIFICACION` date DEFAULT NULL,
  PRIMARY KEY (`ID_ESTADO`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO tbl_ms_estado VALUES("1","NUEVO","NUEVO","ADMIN","2022-11-07","ADMIN","2022-11-07");
INSERT INTO tbl_ms_estado VALUES("2","ACTIVO","ACTIVO","ADMIN","2022-11-07","ADMIN","2022-11-07");
INSERT INTO tbl_ms_estado VALUES("3","INACTIVO","INACTIVO","ADMIN","2022-11-07","ADMIN","2022-11-07");
INSERT INTO tbl_ms_estado VALUES("4","BLOQUEADO","BLOQUEADO","ADMIN","2022-11-07","ADMIN","2022-11-07");
INSERT INTO tbl_ms_estado VALUES("5","RESETEO","RESETEO","ADMIN","2022-11-07","ADMIN","2022-11-07");
INSERT INTO tbl_ms_estado VALUES("6","PENDIENTE","PENDIENTE","ADMIN","2022-11-07","ADMIN","2022-11-07");



DROP TABLE IF EXISTS tbl_ms_hist_contrasena;

CREATE TABLE `tbl_ms_hist_contrasena` (
  `ID_USUARIO` int DEFAULT NULL,
  `CONTRASENA` varchar(100) NOT NULL,
  `CREADO_POR` varchar(15) DEFAULT NULL,
  `FECHA_CREACION` date DEFAULT NULL,
  `MODIFICADO_POR` varchar(15) DEFAULT NULL,
  `FECHA_MODIFICACION` date DEFAULT NULL,
  KEY `TBL_MS_USUARIOS_ID_USUARIO_idx` (`ID_USUARIO`),
  CONSTRAINT `HistContrasena_IdUsuario` FOREIGN KEY (`ID_USUARIO`) REFERENCES `tbl_ms_usuario` (`ID_USUARIO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;




DROP TABLE IF EXISTS tbl_ms_objetos;

CREATE TABLE `tbl_ms_objetos` (
  `ID_OBJETO` int NOT NULL AUTO_INCREMENT,
  `OBJETO` varchar(100) NOT NULL,
  `DESCRIPCION` varchar(100) DEFAULT NULL,
  `TIPO_OBJETO` varchar(15) DEFAULT NULL,
  `CREADO_POR` varchar(15) DEFAULT NULL,
  `FECHA_CREACION` date DEFAULT NULL,
  `MODIFICADO_POR` varchar(15) DEFAULT NULL,
  `FECHA_MODIFICACION` date DEFAULT NULL,
  PRIMARY KEY (`ID_OBJETO`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO tbl_ms_objetos VALUES("1","PRINCIPAL","PANTALLA PRINCIPAL","PANTALLA","ADMIN","2022-11-07","ADMIN","2022-11-07");
INSERT INTO tbl_ms_objetos VALUES("2","MANTENIMIENTO USUARIO","GESTION DE USUARIOS","PANTALLA","ADMIN","2022-11-07","ADMIN","2022-11-07");



DROP TABLE IF EXISTS tbl_ms_parametros;

CREATE TABLE `tbl_ms_parametros` (
  `ID_PARAMETRO` int NOT NULL AUTO_INCREMENT,
  `PARAMETRO` varchar(50) NOT NULL,
  `VALOR` varchar(100) NOT NULL,
  `ID_USUARIO` int NOT NULL,
  `CREADO_POR` varchar(15) DEFAULT NULL,
  `FECHA_CREACION` date DEFAULT NULL,
  `MODIFICADO_POR` varchar(15) DEFAULT NULL,
  `FECHA_MODIFICACION` date DEFAULT NULL,
  PRIMARY KEY (`ID_PARAMETRO`),
  KEY `TBL_MS_USUARIOS_ID_USUARIO_idx` (`ID_USUARIO`),
  CONSTRAINT `Parametros_IdUsuario` FOREIGN KEY (`ID_USUARIO`) REFERENCES `tbl_ms_usuario` (`ID_USUARIO`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO tbl_ms_parametros VALUES("1","ADMIN_INTENTOS","3","1","ADMIN","2022-11-07","ADMIN","2022-11-07");
INSERT INTO tbl_ms_parametros VALUES("2","ADMIN_PREGUTNAS","3","1","ADMIN","2022-11-07","ADMIN","2022-11-07");
INSERT INTO tbl_ms_parametros VALUES("3","ADMIN_CORREO","admin@hotmail.com","1","ADMIN","2022-11-07","ADMIN","2022-11-07");
INSERT INTO tbl_ms_parametros VALUES("4","FECHA_VENCIMIENTO","30","1","ADMIN","2022-11-07","ADMIN","2022-11-07");



DROP TABLE IF EXISTS tbl_ms_permisos;

CREATE TABLE `tbl_ms_permisos` (
  `ID_ROL` int NOT NULL,
  `ID_OBJETO` int NOT NULL,
  `PERMISO_INSERCION` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT '0',
  `PERMISO_ELIMINACION` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT '0',
  `PERMISO_ACTUALIZACION` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT '0',
  `PERMISO_CONSULTAR` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT '0',
  `CREADO_POR` varchar(15) DEFAULT NULL,
  `FECHA_CREACION` date DEFAULT NULL,
  `MODIFICADO_POR` varchar(15) DEFAULT NULL,
  `FECHA_MODIFICACION` date DEFAULT NULL,
  PRIMARY KEY (`ID_ROL`,`ID_OBJETO`),
  KEY `TBL_MS_OBJETOS_ID_OBJETO_idx` (`ID_OBJETO`),
  KEY `TBL_MS_ROLES_ID_ROL_idx` (`ID_ROL`),
  CONSTRAINT `Permisos_IdObjeto` FOREIGN KEY (`ID_OBJETO`) REFERENCES `tbl_ms_objetos` (`ID_OBJETO`),
  CONSTRAINT `Permisos_IdRol` FOREIGN KEY (`ID_ROL`) REFERENCES `tbl_ms_roles` (`ID_ROL`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO tbl_ms_permisos VALUES("1","1","1","1","1","1","","","","");
INSERT INTO tbl_ms_permisos VALUES("1","2","1","1","1","1","","","","");
INSERT INTO tbl_ms_permisos VALUES("2","1","1","0","0","0","","","","");
INSERT INTO tbl_ms_permisos VALUES("2","2","1","0","0","0","","","","");



DROP TABLE IF EXISTS tbl_ms_preguntas;

CREATE TABLE `tbl_ms_preguntas` (
  `ID_PREGUNTA` int NOT NULL AUTO_INCREMENT,
  `PREGUNTA` varchar(100) DEFAULT NULL,
  `CREADO_POR` varchar(15) DEFAULT NULL,
  `FECHA_CREACION` date DEFAULT NULL,
  `MODIFICADO_POR` varchar(15) DEFAULT NULL,
  `FECHA_MODIFICACION` date DEFAULT NULL,
  PRIMARY KEY (`ID_PREGUNTA`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO tbl_ms_preguntas VALUES("1","CIUDAD NATAL","ADMIN","2022-11-01","ADMIN","2022-11-01");
INSERT INTO tbl_ms_preguntas VALUES("2","MES DE NACIMIENTO","ADMIN","2022-11-01","ADMIN","2022-11-01");
INSERT INTO tbl_ms_preguntas VALUES("3","DEPORTISTA FAVORITO","ADMIN","2022-11-01","ADMIN","2022-11-01");
INSERT INTO tbl_ms_preguntas VALUES("4","LUGAR DE LUNA DE MIEL","ADMIN","2022-11-01","ADMIN","2022-11-01");
INSERT INTO tbl_ms_preguntas VALUES("5","COMIDA FAVORITA","ADMIN","2022-11-01","ADMIN","2022-11-01");
INSERT INTO tbl_ms_preguntas VALUES("6","TIA FAVORITA","ADMIN","2022-11-01","ADMIN","2022-11-01");
INSERT INTO tbl_ms_preguntas VALUES("7","NOMBRE DE PRIMER MASCOTA","ADMIN","2022-11-01","ADMIN","2022-11-01");
INSERT INTO tbl_ms_preguntas VALUES("8","CANTANTE FAVORITO","ADMIN","2022-11-01","ADMIN","2022-11-01");



DROP TABLE IF EXISTS tbl_ms_preguntas_usuario;

CREATE TABLE `tbl_ms_preguntas_usuario` (
  `ID_PREGUNTA` int NOT NULL,
  `ID_USUARIO` int NOT NULL,
  `RESPUESTA` varchar(100) NOT NULL,
  `CREADO_POR` varchar(15) DEFAULT NULL,
  `FECHA_CREACION` date DEFAULT NULL,
  `MODIFICADO_POR` varchar(15) DEFAULT NULL,
  `FECHA_MODIFICACION` date DEFAULT NULL,
  PRIMARY KEY (`ID_PREGUNTA`,`ID_USUARIO`),
  KEY `TBL_MS_PREGUNTAS_ID_PREGUNTA_idx` (`ID_PREGUNTA`),
  KEY `TBL_MS_USUARIOS_ID_USUARIO_idx` (`ID_USUARIO`),
  CONSTRAINT `PreguntasUsuario_IdPregunta` FOREIGN KEY (`ID_PREGUNTA`) REFERENCES `tbl_ms_preguntas` (`ID_PREGUNTA`),
  CONSTRAINT `PreguntasUusario_IdUsuario` FOREIGN KEY (`ID_USUARIO`) REFERENCES `tbl_ms_usuario` (`ID_USUARIO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;




DROP TABLE IF EXISTS tbl_ms_roles;

CREATE TABLE `tbl_ms_roles` (
  `ID_ROL` int NOT NULL AUTO_INCREMENT,
  `ROL` varchar(30) NOT NULL,
  `DESCRIPCION` varchar(100) DEFAULT NULL,
  `CREADO_POR` varchar(15) DEFAULT NULL,
  `FECHA_CREACION` date DEFAULT NULL,
  `MODIFICADO_POR` varchar(15) DEFAULT NULL,
  `FECHA_MODIFICACION` date DEFAULT NULL,
  PRIMARY KEY (`ID_ROL`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO tbl_ms_roles VALUES("1","ADMIN","ADMINISTRADOR","ADMINISTRADOR","2022-11-07","ADMIN","2022-11-07");
INSERT INTO tbl_ms_roles VALUES("2","EMPLEADO","EMPLEADO","ADMINISTRADOR","2022-11-07","ADMIN","2022-11-07");
INSERT INTO tbl_ms_roles VALUES("3","DEFECTO","DEFECTO","ADMINISTRADOR","2022-11-07","ADMIN","2022-11-07");



DROP TABLE IF EXISTS tbl_ms_roles_objetos;

CREATE TABLE `tbl_ms_roles_objetos` (
  `ID_ROL` int DEFAULT NULL,
  `ID_OBJETO` int DEFAULT NULL,
  `PERMISO_INSERCION` varchar(1) DEFAULT NULL,
  `PERMISO_ELIMINACION` varchar(1) DEFAULT NULL,
  `PERMISO_ACTUALIZACION` varchar(1) DEFAULT NULL,
  `CREADO_POR` varchar(15) DEFAULT NULL,
  `FECHA_CREACION` date DEFAULT NULL,
  `MODIFICADO_POR` varchar(15) DEFAULT NULL,
  `FECHA_MODIFICACION` date DEFAULT NULL,
  KEY `TBL_MS_ROLES_ID_ROL_idx` (`ID_ROL`),
  KEY `TBL_MS_OBJETOS_ID_OBJETO_idx` (`ID_OBJETO`),
  CONSTRAINT `RolesObjetos_IdObjeto` FOREIGN KEY (`ID_OBJETO`) REFERENCES `tbl_ms_objetos` (`ID_OBJETO`),
  CONSTRAINT `RolesObjetos_IdRol` FOREIGN KEY (`ID_ROL`) REFERENCES `tbl_ms_roles` (`ID_ROL`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;




DROP TABLE IF EXISTS tbl_ms_usuario;

CREATE TABLE `tbl_ms_usuario` (
  `ID_USUARIO` int NOT NULL AUTO_INCREMENT,
  `USUARIO` varchar(15) NOT NULL,
  `NOMBRE_USUARIO` varchar(100) NOT NULL,
  `ID_ESTADO` int NOT NULL,
  `CONTRASENA` longtext NOT NULL,
  `FECHA_ULTIMA_CONEXION` datetime DEFAULT CURRENT_TIMESTAMP,
  `PREGUNTAS_CONTESTADAS` int DEFAULT NULL,
  `PRIMER_INGRESO` int DEFAULT NULL,
  `FECHA_VENCIMIENTO` datetime DEFAULT CURRENT_TIMESTAMP,
  `CORREO_ELECTRONICO` varchar(50) NOT NULL,
  `CREADO_POR` varchar(15) DEFAULT NULL,
  `FECHA_CREACION` datetime DEFAULT CURRENT_TIMESTAMP,
  `MODIFICADO_POR` varchar(15) DEFAULT NULL,
  `FECHA_MODIFICACION` datetime DEFAULT CURRENT_TIMESTAMP,
  `ID_ROL` int DEFAULT NULL,
  PRIMARY KEY (`ID_USUARIO`),
  UNIQUE KEY `Id_Usuario_UNIQUE` (`ID_USUARIO`),
  KEY `TBL_MS_ROLES_ID_ROL_idx` (`ID_ROL`),
  KEY `Usuarios_IdEstado_idx` (`ID_ESTADO`),
  CONSTRAINT `Usuarios_IdEstado` FOREIGN KEY (`ID_ESTADO`) REFERENCES `tbl_ms_estado` (`ID_ESTADO`),
  CONSTRAINT `Usuarios_IdRol` FOREIGN KEY (`ID_ROL`) REFERENCES `tbl_ms_roles` (`ID_ROL`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO tbl_ms_usuario VALUES("1","ADMINISTRADOR","ADMINISTRADOR","2","$2y$10$FhpdhsfwtTwq7AoaGt2ctulPyBWPIDfQqtQ1.5OzrXqTQ2zu9tH6m","2022-11-25 00:00:00","0","25","2500-01-01 00:00:00","admin@unah.hn","ADMINISTRADOR","2022-11-25 00:00:00","ADMINISTRADOR","2022-11-25 00:00:00","1");



DROP TABLE IF EXISTS tbl_produccion;

CREATE TABLE `tbl_produccion` (
  `COD_PRODUCCION` int NOT NULL AUTO_INCREMENT,
  `FECHA` datetime DEFAULT NULL,
  `ID_USUARIO` int DEFAULT NULL,
  `COD_PRODUCTO` int DEFAULT NULL,
  PRIMARY KEY (`COD_PRODUCCION`),
  KEY `TBL_MS_USUARIOS_ID_USUARIO_idx` (`ID_USUARIO`),
  KEY `TBL_PRODUCTO_COD_PRODUCTO_idx` (`COD_PRODUCTO`),
  CONSTRAINT `Produccion_CodProducto` FOREIGN KEY (`COD_PRODUCTO`) REFERENCES `tbl_producto` (`COD_PRODUCTO`),
  CONSTRAINT `Produccion_IdUsuario` FOREIGN KEY (`ID_USUARIO`) REFERENCES `tbl_ms_usuario` (`ID_USUARIO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;




DROP TABLE IF EXISTS tbl_producto;

CREATE TABLE `tbl_producto` (
  `COD_PRODUCTO` int NOT NULL AUTO_INCREMENT,
  `Nombre_PRODUCTO` varchar(30) DEFAULT NULL,
  `DESCRIPCION` varchar(255) DEFAULT NULL,
  `CANTIDAD_MINIMA` int DEFAULT NULL,
  `CANTIDAD_MAXIMA` int DEFAULT NULL,
  `COD_TIPO_PRODUCTO` int DEFAULT NULL,
  `COD_PROVEEDOR` int DEFAULT NULL,
  `PRECIO_VENTA` decimal(8,2) DEFAULT NULL,
  `EXISTENCIA` int DEFAULT NULL,
  `FECHA` datetime DEFAULT CURRENT_TIMESTAMP,
  `ID_USUARIO` int DEFAULT NULL,
  `ESTADO` int DEFAULT '1',
  `FOTO` text,
  PRIMARY KEY (`COD_PRODUCTO`),
  KEY `TBL_TIPO_PRODUCTO_COD_TIPO_PRODUCTO_idx` (`COD_TIPO_PRODUCTO`),
  KEY `Producto_CodProveedor_idx` (`COD_PROVEEDOR`),
  KEY `Producto_IdUsuario_idx` (`ID_USUARIO`),
  CONSTRAINT `Producto_CodProveedor` FOREIGN KEY (`COD_PROVEEDOR`) REFERENCES `tbl_proveedor` (`COD_PROVEEDOR`),
  CONSTRAINT `Producto_CodTipoProducto` FOREIGN KEY (`COD_TIPO_PRODUCTO`) REFERENCES `tbl_tipo_producto` (`COD_TIPO_PRODUCTO`),
  CONSTRAINT `Producto_IdUsuario` FOREIGN KEY (`ID_USUARIO`) REFERENCES `tbl_ms_usuario` (`ID_USUARIO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;




DROP TABLE IF EXISTS tbl_promocion;

CREATE TABLE `tbl_promocion` (
  `COD_PROMOCION` int NOT NULL AUTO_INCREMENT,
  `NOMBRE_PROMOCION` varchar(100) DEFAULT NULL,
  `FECHA_INICIO` datetime DEFAULT NULL,
  `FECHA_FINAL` datetime DEFAULT NULL,
  PRIMARY KEY (`COD_PROMOCION`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;




DROP TABLE IF EXISTS tbl_proveedor;

CREATE TABLE `tbl_proveedor` (
  `COD_PROVEEDOR` int NOT NULL AUTO_INCREMENT,
  `NOMBRE_EMPRESA` varchar(100) DEFAULT NULL,
  `RTN` varchar(14) DEFAULT NULL,
  `NOMBRE_REPRESENTANTE` varchar(100) DEFAULT NULL,
  `TELEFONO` bigint DEFAULT NULL,
  `DIRECCION` text,
  `FECHA` datetime DEFAULT CURRENT_TIMESTAMP,
  `ID_USUARIO` int DEFAULT NULL,
  `ESTADO` int DEFAULT '1',
  PRIMARY KEY (`COD_PROVEEDOR`),
  KEY `Proveedor_IdUsuario_idx` (`ID_USUARIO`),
  CONSTRAINT `Proveedor_IdUsuario` FOREIGN KEY (`ID_USUARIO`) REFERENCES `tbl_ms_usuario` (`ID_USUARIO`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO tbl_proveedor VALUES("1","96519876","0801200009165","Abilio Aguilar","96519751","Barrio Morazan ","2022-11-25 23:02:40","","1");



DROP TABLE IF EXISTS tbl_tipo_inventario;

CREATE TABLE `tbl_tipo_inventario` (
  `COD_TIPO_INVENTARIO` int NOT NULL AUTO_INCREMENT,
  `NOMBRE_TIPO_INVENTARIO` char(15) DEFAULT NULL,
  PRIMARY KEY (`COD_TIPO_INVENTARIO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;




DROP TABLE IF EXISTS tbl_tipo_movimiento;

CREATE TABLE `tbl_tipo_movimiento` (
  `COD_TIPO_MOVIMIENTO` int NOT NULL AUTO_INCREMENT,
  `NOMBRE_MOVIMIENTO` varchar(7) DEFAULT NULL,
  PRIMARY KEY (`COD_TIPO_MOVIMIENTO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;




DROP TABLE IF EXISTS tbl_tipo_producto;

CREATE TABLE `tbl_tipo_producto` (
  `COD_TIPO_PRODUCTO` int NOT NULL AUTO_INCREMENT,
  `NOMBRE_TIPO_PRODUCTO` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`COD_TIPO_PRODUCTO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;




DROP TABLE IF EXISTS usuario;

CREATE TABLE `usuario` (
  `idusuario` int NOT NULL AUTO_INCREMENT,
  `dpi` bigint DEFAULT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `correo` varchar(100) DEFAULT NULL,
  `usuario` varchar(15) DEFAULT NULL,
  `clave` varchar(100) DEFAULT NULL,
  `rol` int DEFAULT NULL,
  `estatus` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`idusuario`),
  KEY `rol` (`rol`),
  CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`rol`) REFERENCES `rol` (`idrol`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;




SET FOREIGN_KEY_CHECKS=1;