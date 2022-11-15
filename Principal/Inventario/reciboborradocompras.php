<?php
include('../db2.php');
$idRegistros = $_REQUEST['COD_COMPRA'];

$DeleteRegistro = ("DELETE FROM tbl_compra WHERE COD_COMPRA= '".$idRegistros."' ");
mysqli_query($conexion2, $DeleteRegistro);
?>