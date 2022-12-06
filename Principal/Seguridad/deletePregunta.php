<?php
$connect = mysqli_connect("localhost", "root", "123456", "inversionesatlantico");
echo $_POST['id'];
if(isset($_POST['id']))
{
 $query = "DELETE FROM tbl_ms_preguntas WHERE PREGUNTA = '".$_POST["id"]."'";

 try {
    //code...
    mysqli_query($connect, $query)
    echo 'DATO BORRADO';
 } catch (\Throwable $th) {
    //throw $th;
    $var = $th->getMessage();
    echo "<script> alert('".$var."'); </script>";
 }

}
?>