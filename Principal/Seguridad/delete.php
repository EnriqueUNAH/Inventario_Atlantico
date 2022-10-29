<?php
// Include config file
require_once "../db2.php";
 
// Define variables and initialize with empty values
$CodigoUsuario = "";
 
// Processing form data when form is submitted
try {
    // code
   
    if(isset($_POST["CodigoUsuario"])){
      // Get hidden input value
      $cod = $_POST["CodigoUsuario"];
  
          $sql = "DELETE FROM tbl_ms_usuario WHERE ID_USUARIO = '$cod'";
  
          mysqli_query($conexion2 , $sql);
      }
      include("mantenimiento_usuario.php");
  } catch (Exception $e) {
    // exception is raised and it'll be handled here
    // $e->getMessage() contains the error message
    
    $var = $e->getMessage();
    echo "<script> alert('".$var."'); </script>";

    include("mantenimiento_usuario.php");
  }
?>