<?php
include('../db2.php');
$idRegistros = $_REQUEST['COD_TIPO_INVENTARIO'];

$DeleteRegistro = ("DELETE FROM tbl_tipo_inventario WHERE COD_TIPO_INVENTARIO= '".$idRegistros."' ");
mysqli_query($conexion2, $DeleteRegistro);
?>