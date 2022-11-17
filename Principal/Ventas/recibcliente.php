<?php
include('../db2.php');
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

$insertar_="INSERT INTO tbl_cliente VALUES('$filas','$dni','$nombreP','$tel','$correo','$dir','$fechaC','$gen')";

mysqli_query($conexion2, $insertar_);

header("location:crudclientes.php");
?>