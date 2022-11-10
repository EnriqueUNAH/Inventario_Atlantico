<?php
include('../db2.php');
$idRegistros = $_REQUEST['ID_ESTADO'];

$DeleteRegistro = ("DELETE FROM tbl_ms_estado WHERE ID_ESTADO= '".$idRegistros."' ");
mysqli_query($conexion2, $DeleteRegistro);
?>