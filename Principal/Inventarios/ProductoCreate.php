<?php
include('../db2.php');

$Nombre_Producto = strtoupper($_REQUEST['Nombre_PRODUCTO']);
$Descripcion = $_REQUEST['DESCRIPCION'];
$Cantidad_Minima = $_REQUEST['CANTIDAD_MINIMA'];
$Cantidad_Maxima = $_REQUEST['CANTIDAD_MAXIMA'];
$Precio_Venta = $_REQUEST['PRECIO_VENTA'];
$Nombre_Tipo_Producto = $_REQUEST['NOMBRE_TIPO_PRODUCTO'];


//Consultar el codigo del tipo_producto seleccionado de la tabla tipo_producto
$cod_tipo_producto="SELECT COD_TIPO_PRODUCTO FROM TBL_TIPO_PRODUCTO WHERE NOMBRE_TIPO_PRODUCTO='$Nombre_Tipo_Producto'";
$resultado_tipo_producto= mysqli_query( $conexion2 , $cod_tipo_producto );
    while ($COD_TIPO_PRODUCTO=mysqli_fetch_array( $resultado_tipo_producto )) {
        # code...
        $cod_tipo_producto_=$COD_TIPO_PRODUCTO['COD_TIPO_PRODUCTO'];
    }

$QueryInsert = ("INSERT INTO tbl_Producto(
    Nombre_PRODUCTO,
    DESCRIPCION,
    CANTIDAD_MINIMA,
    CANTIDAD_MAXIMA,
    COD_TIPO_PRODUCTO,
    PRECIO_VENTA

)
VALUES (
   
    '".$Nombre_Producto. "',
    '".$Descripcion. "',
    '".$Cantidad_Minima. "',
    '".$Cantidad_Maxima. "',
    '".$cod_tipo_producto_. "',
    '".$Precio_Venta. "'

)");
mysqli_query($conexion2, $QueryInsert);

header("location:crud_tipo_movimiento.php");
?>

