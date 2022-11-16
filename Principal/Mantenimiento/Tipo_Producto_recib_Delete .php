<?php
include('../db2.php');
$idRegistros = $_REQUEST['COD_TIPO_PRODUCTO'];

$DeleteRegistro = ("DELETE FROM TBL_TIPO_PRODUCTO WHERE COD_TIPO_PRODUCTO= '".$idRegistros."' ");
mysqli_query($conexion2, $DeleteRegistro);
?>