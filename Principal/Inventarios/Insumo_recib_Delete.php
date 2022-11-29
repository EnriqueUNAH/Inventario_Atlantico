<?php
include('../db2.php');
$idRegistros = $_REQUEST['id'];

$DeleteRegistro = ("DELETE FROM tbl_detalle_produccion_temp WHERE id= '".$idRegistros."' ");
mysqli_query($conexion2, $DeleteRegistro);
?>

