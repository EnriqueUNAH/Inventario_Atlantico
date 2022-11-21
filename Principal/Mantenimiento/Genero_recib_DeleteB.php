<?php
include('../db2.php');
$idRegistros = $_REQUEST['NOMBRE_GENERO'];


$DeleteRegistro = ("DELETE FROM tbl_genero WHERE NOMBRE_GENERO= '".$idRegistros."' ");
mysqli_query($conexion2, $DeleteRegistro);

?>



