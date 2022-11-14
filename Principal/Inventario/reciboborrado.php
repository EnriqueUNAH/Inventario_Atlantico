<?php
include('../db2.php');
$idRegistros = $_REQUEST['COD_PROVEEDOR'];

$DeleteRegistro = ("DELETE FROM tbl_proveedor WHERE COD_PROVEEDOR= '".$idRegistros."' ");
mysqli_query($conexion2, $DeleteRegistro);
?>