<?php
include('../db2.php');
$pregunta      = $_REQUEST['pregunta'];
$fechaC = date('Y-m-d');

$insertar="INSERT INTO tbl_ms_preguntas (PREGUNTA,CREADO_POR, FECHA_CREACION, MODIFICADO_POR, FECHA_MODIFICACION) VALUES('$pregunta', 'ADMININISTRADOR', '$fechaC', 'ADMINISTRADOR','$fechaC')";

mysqli_query($conexion2, $insertar);

header("location:crud_preguntas.php");
?>