<?php
include('db.php');
$usuario = strtoupper($_POST[ 'persona' ]);
session_start();
$_SESSION['usuario'] = $usuario;

# Consulto si existe el usuario
$consulta="SELECT * FROM tbl_ms_usuario where Usuario = '$usuario'";
$resultado= mysqli_query( $conexion , $consulta );
$filas = mysqli_num_rows( $resultado );

if ($filas){
    include('../Login/preguntas_recuperar.php');
}else{
    echo '<script>alert("SU USUARIO NO EXISTE");</script>';
    include ("../Login/recuperar.php");
}         
?>