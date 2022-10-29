<?php
// Include config file
require_once "../db2.php";
 
// Definir variables
$nombre = $Rol = $Correo = "";
$id=0;
 
// procesando la data del submit

if(isset($_POST["Id"]) && !empty($_POST["Id"])){
    // Get hidden input value
    $id = $_POST["Id"];
}

if(isset($_POST["Usuario"]) && !empty($_POST["Usuario"])){
    // Get hidden input value
    $nombre = $_POST["Usuario"];
}
    
if(isset($_POST["Rol"]) && !empty($_POST["Rol"])){
    // Get hidden input value
    $Rol = $_POST["Rol"];
}
    
    
    
if(isset($_POST["Correo"]) && !empty($_POST["Correo"])){
    // Get hidden input value
    $Correo = $_POST["Correo"];
}

try {
    // code
    $sql = "UPDATE tbl_ms_usuario SET USUARIO='$nombre', CORREO_ELECTRONICO='$Correo' WHERE ID_USUARIO='$id'";
         
    mysqli_query($conexion2 , $sql);
    
    include("Mantenimiento_Usuario.php");
  } catch (Exception $e) {
    // exception is raised and it'll be handled here
    echo $e->getMessage();
    die();
  }

       

?>