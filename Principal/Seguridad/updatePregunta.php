<?php
$connect = mysqli_connect("localhost", "root", "123456", "inversionesatlantico");

if(isset($_POST['id']))
{
$VAR=$_POST['id'];
 $value = mysqli_real_escape_string($connect, $_POST["value"]);
 $query = "UPDATE tbl_ms_preguntas SET ".$_POST["column_name"]."='".$value."' WHERE PREGUNTA = '$VAR'";
 if(mysqli_query($connect, $query))
 {
  echo 'DATOS ACTUALIZADOS';

 }
}
?>