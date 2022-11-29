<?php
include('../db2.php');
session_start();
$var=$_SESSION['nombre'];
$consulta_="SELECT ID_USUARIO FROM tbl_ms_usuario where NOMBRE_USUARIO = '$var'";
     $resultado_=mysqli_query( $conexion2 , $consulta_ );
     while ($valor=mysqli_fetch_array( $resultado_ )) {
          # code...
          $filas_=$valor['ID_USUARIO'];
      }
$dni      = $_REQUEST['DNI'];
$nombreP      = $_REQUEST['primer'];
$tel	 = $_REQUEST['telefono'];
$correo	 = $_REQUEST['correo'];
$dir	 = $_REQUEST['direccion'];
$fechaC = date('Y-m-d');
$genero =$_REQUEST['genero'];
$gen=0;
if ($genero=="MASCULINO") {
    # code...
    $gen=1;
}else {
    # code...
    $gen=2;
}

# Consulto filas
$consulta="SELECT * FROM tbl_cliente";
$resultado= mysqli_query( $conexion2 , $consulta );
$filas = mysqli_num_rows( $resultado );
$filas=$filas+1;
$insertar_="INSERT INTO tbl_cliente VALUES('$filas','$dni','$nombreP','$tel','$correo','$dir','$fechaC','$gen','$filas_','1')";
$insertar2="INSERT INTO cliente VALUES('$filas','$dni','$nombreP','$tel','$dir','$fechaC','1','1')";


mysqli_query($conexion2, $insertar_);
mysqli_query($conexion2, $insertar2);


header("location:crudclientes.php");
?>