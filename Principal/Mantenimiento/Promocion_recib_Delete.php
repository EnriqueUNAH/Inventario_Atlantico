<?php
include('../db2.php');
$idRegistros = $_REQUEST['COD_PROMOCION'];

$DeleteRegistro = ("DELETE FROM tbl_Promocion WHERE COD_PROMOCION= '".$idRegistros."' ");
mysqli_query($conexion2, $DeleteRegistro);
?>