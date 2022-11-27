<?php
$connect = mysqli_connect("localhost", "root", "123456", "inversionesatlantico");
if(isset($_POST["id"]))
{
 $query = "DELETE FROM tbl_ms_usuario WHERE ID_USUARIO = '".$_POST["id"]."'";
 if(mysqli_query($connect, $query))
 {
  echo 'DATO BORRADO';
 }
}
?>
