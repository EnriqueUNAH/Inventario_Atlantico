<?php
include('../db2.php');
$idRegistros = $_REQUEST['COD_CLIENTE'];

$DeleteRegistro = ("DELETE FROM tbl_cliente WHERE COD_CLIENTE= '".$idRegistros."' ");
mysqli_query($conexion2, $DeleteRegistro);
?>