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

# Consulto filas
$consulta="SELECT * FROM proveedor";
$resultado= mysqli_query( $conexion2 , $consulta );
$filas = mysqli_num_rows( $resultado );
$filas=$filas+1;

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

$insertar2="INSERT INTO proveedor VALUES('$filas','$empresa','$nombre','$TELEFONO','$DIRECCION','$fechaC','1','1')";
mysqli_query($conexion2, $insertar2);



header("location:crud_proveedores.php");
?>