<?php
include('../db2.php');
$idRegistros = $_REQUEST['ID_PARAMETRO'];

$DeleteRegistro = ("DELETE FROM tbl_ms_parametros WHERE ID_PARAMETRO= '".$idRegistros."' ");
mysqli_query($conexion2, $DeleteRegistro);
?>