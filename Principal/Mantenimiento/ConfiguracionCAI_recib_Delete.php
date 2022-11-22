<?php
include('../db2.php');
$idRegistros = $_REQUEST['COD_TALONARIO'];

$DeleteRegistro = ("DELETE FROM tbl_configuracion_cai WHERE COD_TALONARIO= '".$idRegistros."' ");
mysqli_query($conexion2, $DeleteRegistro);
?>