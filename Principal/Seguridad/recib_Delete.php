<?php
include('../db2.php');
$idRegistros = $_REQUEST['ID_USUARIO'];
include ($idRegistros);
$DeleteRegistro = ("UPDATE tbl_ms_usuario SET ID_ESTADO = '0' where ID_USUARIO='$idRegistros'");
mysqli_query($conexion2, $DeleteRegistro);
?>