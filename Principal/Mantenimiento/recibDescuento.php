<?php
include('../db2.php');
$nombre      = $_REQUEST['nombre'];
$cant	 = $_REQUEST['cantidad'];



$QueryInsert = ("INSERT INTO tbl_descuento(
    NOMBRE_DESCUENTO,
    PORCENTAJE_DESCUENTO
)
VALUES (
    '".$nombre. "',
    '".$cant. "'
)");
mysqli_query($conexion2, $QueryInsert);

header("location:crud_descuento.php");
?>