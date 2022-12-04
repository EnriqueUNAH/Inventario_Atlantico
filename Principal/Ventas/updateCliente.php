<?php
$connect = mysqli_connect("localhost", "root", "123456", "inversionesatlantico");
$VAR=$_POST['id'];
$consulta="SELECT COD_CLIENTE FROM tbl_cliente where NOMBRE_COMPLETO = '$VAR' or RTN='$VAR' or TELEFONO='$VAR' or CORREO_ELECTRONICO='$VAR' or DIRECCION='$VAR'";
    $resultado=mysqli_query( $connect , $consulta );
    while ($valor=mysqli_fetch_array( $resultado )) {
        $ID=$valor['COD_CLIENTE'];
    }
if(isset($_POST['id']))
{
 $value = mysqli_real_escape_string($connect, $_POST["value"]);
 $query = "UPDATE tbl_cliente SET ".$_POST["column_name"]."='".$value."' WHERE COD_CLIENTE=$ID";
 if(mysqli_query($connect, $query))
 {
  echo 'DATOS ACTUALIZADOS';

 }
}
?>