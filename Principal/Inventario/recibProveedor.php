<?php
include('../db2.php');
$nombre      = $_REQUEST['nombre'];
$empresa	 = $_REQUEST['empresa'];
$rtn 	 = $_REQUEST['RTN'];
$TELEFONO	 = $_REQUEST['TELEFONO'];
$DIRECCION 	 = $_REQUEST['DIRECCION'];


$QueryInsert = ("INSERT INTO tbl_proveedor(
    NOMBRE_REPRESENTANTE,
    NOMBRE_EMPRESA,
    RTN,
    TELEFONO,
    DIRECCION 
)
VALUES (
    '".$nombre. "',
    '".$empresa. "',
    '".$rtn."',
    '".$TELEFONO. "',
    '".$DIRECCION."'
)");
mysqli_query($conexion2, $QueryInsert);

header("location:crud_proveedores.php");
?>