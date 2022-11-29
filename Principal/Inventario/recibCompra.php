<?php
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

 $consulta="SELECT EXISTENCIA FROM tbl_proveedor where NOMBRE_EMPRESA = '$proveedor'";
$resultado=mysqli_query( $conexion2 , $consulta );
while ($cod=mysqli_fetch_array( $resultado)) {
     # code...
     $codigo=$cod['COD_PROVEEDOR'];
 }



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


$COMPRA_="INSERT INTO tbl_tipo_producto VALUES('$codigo','$insumo')";
mysqli_query($conexion2, $COMPRA_);

$COMPRA__="INSERT INTO tbl_producto VALUES('$insumo','$insumo','100','999','$codigo','$codigo','$precioventa',$existencia')";
mysqli_query($conexion2, $COMPRA__);

$preciocompra=$pagado/$cant;

$COMPRA="INSERT INTO tbl_detalle_compra VALUES('$codigo','$preciocompra','$cant','$codigo','$codigo')";

mysqli_query($conexion2, $COMPRA);


header("location:crud_compras.php");
?>