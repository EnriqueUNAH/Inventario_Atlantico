<?php
include('../db2.php');
$tipo= $_REQUEST['tipo'];


$QueryInsert = ("INSERT INTO tbl_tipo_inventario(
    NOMBRE_TIPO_INVENTARIO
)
VALUES (
    '".$tipo."'
)");
mysqli_query($conexion2, $QueryInsert);

header("location:tipodeinventario.php");
?>