<?php
$connect = mysqli_connect("localhost", "root", "123456", "inversionesatlantico");
$VAR=$_POST['id'];
$consulta="SELECT COD_PROVEEDOR FROM tbl_proveedor where NOMBRE_EMPRESA = '$VAR' or RTN='$VAR' or NOMBRE_REPRESENTANTE='$VAR' or TELEFONO='$VAR' or DIRECCION='$VAR'";
    $resultado=mysqli_query( $connect , $consulta );
    while ($valor=mysqli_fetch_array( $resultado )) {
        $ID=$valor['COD_PROVEEDOR'];
    }
if(isset($_POST['id']))
{
 $value = mysqli_real_escape_string($connect, $_POST["value"]);
 $query = "UPDATE tbl_proveedor SET ".$_POST["column_name"]."='".$value."' WHERE COD_PROVEEDOR=$ID";
 if(mysqli_query($connect, $query))
 {
  echo 'DATOS ACTUALIZADOS';

 }
}
?>