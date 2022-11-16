<?php
include('../db2.php');
$idRegistros = $_REQUEST['COD_ESTANTE'];

$DeleteRegistro = ("DELETE FROM TBL_ESTANTE WHERE COD_ESTANTE= '".$idRegistros."' ");
mysqli_query($conexion2, $DeleteRegistro);
?>