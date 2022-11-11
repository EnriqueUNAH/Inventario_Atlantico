<?php
include('../db2.php');
$idRegistros = $_REQUEST['ID_OBJETO'];

$DeleteRegistro = ("DELETE FROM tbl_ms_objetos WHERE ID_OBJETO= '".$idRegistros."' ");
mysqli_query($conexion2, $DeleteRegistro);
?>