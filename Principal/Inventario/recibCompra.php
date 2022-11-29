<?php
session_start();

$user=$_SESSION['nombre'];

include('../db2.php');
$pagado     = $_REQUEST['total'];
$fecha	 = $_REQUEST['fecha'];
$impuesto	 = $_REQUEST['ISV'];
$proveedor = $_REQUEST['proveedor'];
$insumo=$_REQUEST['insumo'];
$cant=$_REQUEST['cantidad'];
$precioventa=$pagado/$cant;

$consulta="SELECT COD_PROVEEDOR FROM tbl_proveedor where NOMBRE_EMPRESA = '$proveedor'";
$resultado=mysqli_query( $conexion2 , $consulta );
while ($cod=mysqli_fetch_array( $resultado)) {
     # code...
     $codigo=$cod['COD_PROVEEDOR'];
 }



  $consulta_fila="SELECT * FROM tbl_tipo_producto";
$resultado_fila= mysqli_query( $conexion2 , $consulta_fila );
$filas = mysqli_num_rows( $resultado_fila );
$filas=$filas+1;


$QueryInsert = ("INSERT INTO tbl_compra(
    TOTAL_PAGADO,
    FECHA,
    ISV,
    COD_PROVEEDOR
)
VALUES (
    '".$pagado. "',
    '".$fecha. "',
    '".$impuesto."',
    '".$codigo. "'
)");
mysqli_query($conexion2, $QueryInsert);

$consultaCodCompra="SELECT * FROM tbl_compra";
$resultadoCodCompra=mysqli_query( $conexion2 , $consultaCodCompra );
while ($codCompra=mysqli_fetch_array( $resultadoCodCompra)) {
     # code...
     $filasCodCompra=$codCompra['COD_COMPRA'];
 }


$COMPRA_="INSERT INTO tbl_tipo_producto VALUES('$filas','$insumo')";
mysqli_query($conexion2, $COMPRA_);

$consulta_="SELECT ID_USUARIO FROM tbl_ms_usuario where USUARIO = '$user'";
$resultado_=mysqli_query( $conexion2 , $consulta_ );
while ($cod_=mysqli_fetch_array( $resultado_)) {
     # code...
     $id=$cod_['ID_USUARIO'];
 }


$COMPRA__="INSERT INTO tbl_producto VALUES('$filas','$insumo','$insumo','0','0','$filas','$codigo','$precioventa','0','$fecha','$id','1','NULL')";
mysqli_query($conexion2, $COMPRA__);

$preciocompra=$pagado/$cant;

$COMPRA="INSERT INTO tbl_detalle_compra VALUES('$filas','$preciocompra','$cant','$filas','$filasCodCompra')";

mysqli_query($conexion2, $COMPRA);

$inventario="INSERT INTO tbl_inventario VALUES('$filas','$fecha','$insumo','$cant','$codigo','1')";
mysqli_query($conexion2, $inventario);

header("location:crud_compras.php");
?>