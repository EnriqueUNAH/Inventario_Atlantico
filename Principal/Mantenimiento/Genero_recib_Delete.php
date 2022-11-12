<?php
include('../db2.php');
$idRegistros = $_REQUEST['COD_GENERO'];

$DeleteRegistro = ("DELETE FROM tbl_genero WHERE COD_GENERO= '".$idRegistros."' ");
mysqli_query($conexion2, $DeleteRegistro);
?>