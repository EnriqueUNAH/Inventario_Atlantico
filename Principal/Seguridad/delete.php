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
  
          $sql = "DELETE FROM tbl_ms_usuario WHERE Id_Usuario = '$cod'";
  
          mysqli_query($conexion2 , $sql);
      }
      include("mantenimiento_usuario.php");
  } catch (Exception $e) {
    // exception is raised and it'll be handled here
    // $e->getMessage() contains the error message
    echo $e->getMessage();
    die();
  }
?>

// code before the try-catch block
 
