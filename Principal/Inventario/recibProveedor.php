<?php
include('../db2.php');
$nombre      = $_REQUEST['nombre'];
$empresa	 = $_REQUEST['empresa'];
$rtn 	 = $_REQUEST['RTN'];
$TELEFONO	 = $_REQUEST['TELEFONO'];
$DIRECCION 	 = $_REQUEST['DIRECCION'];
session_start();
$fechaC = date('Y-m-d');
$usuario_id  = $_SESSION['idUser'];


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
/*
$insert = mysqli_query($conexion2,"INSERT INTO proveedor(proveedor,contacto,telefono,direccion,usuario_id)
														VALUES('$empresa','$nombre','$TELEFONO','$DIRECCION','$usuario_id')");
mysqli_query($conexion2, $insert);*/

header("location:crud_proveedores.php");
?>