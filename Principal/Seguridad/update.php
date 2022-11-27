<?php
$connect = mysqli_connect("localhost", "root", "123456", "inversionesatlantico");


if(isset($_POST["id"]))
{
    $VAR=$_POST["id"];
    $consulta="SELECT ID_USUARIO FROM tbl_ms_usuario where NOMBRE_USUARIO = '$VAR' or CORREO_ELECTRONICO='$VAR'";
    $resultado=mysqli_query( $connect , $consulta );
    while ($valor=mysqli_fetch_array( $resultado )) {
        $ID=$valor['ID_USUARIO'];

    }

 $value = mysqli_real_escape_string($connect, $_POST["value"]);
 $query = "UPDATE tbl_ms_usuario SET ".$_POST["column_name"]."='".$value."' WHERE ID_USUARIO = '$ID'";
 if(mysqli_query($connect, $query))
 {
  echo 'DATOS ACTUALIZADOS';

 }
}
?>