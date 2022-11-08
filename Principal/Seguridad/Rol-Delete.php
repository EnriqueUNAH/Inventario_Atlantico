<?php
// Include config file
require_once "../db2.php";
 
// Define variables and initialize with empty values
$CodigoRol = $NombreRol = "";
 
// Processing form data when form is submitted
if(isset($_POST["IdRol"]) && !empty($_POST["IdRol"])){
    // Get hidden input value
    $cod = $_POST["IdRol"];

        $sql = "DELETE FROM tbl_ms_Roles WHERE ID_ROL = '$cod'";

        mysqli_query($conexion2 , $sql);
    }
    include("Rol.php");

?>