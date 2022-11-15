<?php
include('../db2.php');
$idRegistros = $_REQUEST['ID_PREGUNTA'];

$DeleteRegistro = ("DELETE FROM tbl_ms_preguntas WHERE ID_PREGUNTA= '".$idRegistros."' ");
mysqli_query($conexion2, $DeleteRegistro);
?>