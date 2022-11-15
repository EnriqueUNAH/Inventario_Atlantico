<?php
include('../db2.php');
$mov    = $_REQUEST['movimiento'];

$QueryInsert = ("INSERT INTO tbl_tipo_movimiento(
    NOMBRE_MOVIMIENTO
)
VALUES (
    '".$mov. "'
)");
mysqli_query($conexion2, $QueryInsert);

header("location:crud_tipo_movimiento.php");
?>