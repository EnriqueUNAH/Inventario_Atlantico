<?php
include('../db2.php');
$idRegistros = $_REQUEST['COD_DESCUENTO'];

$DeleteRegistro = ("DELETE FROM tbl_descuento WHERE COD_DESCUENTO= '".$idRegistros."' ");
mysqli_query($conexion2, $DeleteRegistro);
?>