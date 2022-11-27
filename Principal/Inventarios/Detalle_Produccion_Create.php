<?php
session_start();
require_once "../db2.php";
$usuario = $_SESSION['nombre'];
$fechaC = date('Y-m-d');
/*
$consulta="SELECT * FROM tbl_ms_estado";        
$resultado= mysqli_query( $conexion2 , $consulta );
$filas = mysqli_num_rows( $resultado );
$filas=$filas+1;  */

//Variables ingresadas
$Cantidad_Insumo = strtoupper($_POST[ 'cantidad_insumo' ]);
$Insumo = strtoupper($_POST[ 'insumo' ]);




  //inserto datos en tabla detalle produccion temporal
    $sql="INSERT INTO tbl_detalle_produccion_temp VALUES('$Insumo','$Cantidad_Insumo')";
    mysqli_query( $conexion2 , $sql);

    include("CrudDetalleProduccion.php");

?>