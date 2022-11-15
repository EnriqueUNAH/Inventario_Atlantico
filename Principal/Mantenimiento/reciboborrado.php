<?php
include('../db2.php');
$idRegistros = $_REQUEST['COD_TIPO_MOVIMIENTO'];

$DeleteRegistro = ("DELETE FROM tbl_tipo_movimiento WHERE COD_TIPO_MOVIMIENTO= '".$idRegistros."' ");
mysqli_query($conexion2, $DeleteRegistro);
?>