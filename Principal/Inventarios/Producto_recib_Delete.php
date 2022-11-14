<?php
include('../db2.php');
$idRegistros = $_REQUEST['COD_PRODUCTO'];

$DeleteRegistro = ("DELETE FROM tbl_Producto WHERE COD_PRODUCTO= '".$idRegistros."' ");
mysqli_query($conexion2, $DeleteRegistro);
?>