<?php
include('../db2.php');
$pregunta      = $_REQUEST['pregunta'];
$fechaC = date('Y-m-d');

$consulta="SELECT * FROM tbl_ms_preguntas";
$resultado= mysqli_query( $conexion2 , $consulta );
$filas = mysqli_num_rows( $resultado );
$filas=$filas+1;

$insertar="INSERT INTO tbl_ms_preguntas VALUES('$filas','$pregunta', 'ADMIN', '$fechaC', 'ADMIN','$fechaC')";

mysqli_query($conexion2, $insertar);

header("location:crud_preguntas.php");
?>