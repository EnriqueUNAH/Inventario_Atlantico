<?php
session_start();
$usuario=$_SESSION['nombre_'];

$fechaC = date('Y-m-d');

    include("db.php"); 

    #select ID_USUARIO
    $consulta_id="SELECT ID_USUARIO FROM tbl_ms_usuario WHERE Usuario='$usuario'";
    $resultado_id= mysqli_query( $conexion , $consulta_id );
    $filas_id = mysqli_num_rows( $resultado_id );

    #select ID_BITACORA
    $consulta_id_BIT="SELECT * FROM tbl_bitacora";
    $resultado_id_BIT= mysqli_query( $conexion , $consulta_id_BIT );
    $filas_id_BIT = mysqli_num_rows( $resultado_id_BIT );
    $filas_id_BIT++;

    $bitacora="INSERT INTO tbl_bitacora VALUES('$filas_id_BIT','$fechaC','$filas_id','$filas_id','CERRAR SESION','CIERRE DE SESION PANTALLA PRINCIPAL')";
    mysqli_query( $conexion , $bitacora);
    session_destroy();
	header("Location: index.php");
?>