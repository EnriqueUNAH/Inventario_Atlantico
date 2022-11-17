<?php
include('../db2.php');
$idRegistros = $_REQUEST['ID_ROL'];

$DeleteRegistro = ("DELETE FROM tbl_ms_permiso WHERE ID_ROL= '".$idRegistros."' ");
mysqli_query($conexion2, $DeleteRegistro);
?>