<?php
include('../db2.php');
$pagado     = $_REQUEST['total'];
$fecha	 = $_REQUEST['fecha'];
$impuesto	 = $_REQUEST['ISV'];
$proveedor = $_REQUEST['proveedor'];

$consulta="SELECT COD_PROVEEDOR FROM tbl_proveedor where NOMBRE_EMPRESA = '$proveedor'";
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

header("location:crud_compras.php");
?>