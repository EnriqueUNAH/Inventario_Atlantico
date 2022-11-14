<?php
include('../db2.php');
$nombre      = $_REQUEST['nombre'];
$empresa	 = $_REQUEST['empresa'];
$rtn 	 = $_REQUEST['RTN'];


$QueryInsert = ("INSERT INTO tbl_proveedor(
    NOMBRE_REPRESENTANTE,
    NOMBRE_EMPRESA,
    RTN
)
VALUES (
    '".$nombre. "',
    '".$empresa. "',
    '".$rtn."'
)");
mysqli_query($conexion2, $QueryInsert);

header("location:crud_proveedores.php");
?>