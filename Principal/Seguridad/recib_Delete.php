<?php
include('../db2.php');
$idRegistros = $_REQUEST['ID_USUARIO'];

$DeleteRegistro = ("DELETE FROM tbl_ms_usuario WHERE ID_USUARIO= '".$idRegistros."' ");
mysqli_query($conexion2, $DeleteRegistro);
?>