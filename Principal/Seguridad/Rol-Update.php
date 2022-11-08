<?php
// Include config file
require_once "../db2.php";
 
// Define variables and initialize with empty values
$IdRol = $NombreRol ="";

 
// Processing form data when form is submitted
if(isset($_POST["IdRol"]) && !empty($_POST["IdRol"])){
    // Get hidden input value
    $cod = $_POST["IdRol"];
    
    // Validate nombre representante
    $NombreGenero = trim($_POST["NombreRol"]);
    if(empty($NombreRol)){
        $name_err = "Please enter a name.";
    } elseif(!filter_var($NombreRol, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $name_err = "Please enter a valid name.";
    } else{
        $name = $NombreRol;
    }

    
    // Check input errors before inserting in database
    if(empty($name_err) ){
        // Prepare an update statement
        $sql = "UPDATE tbl_ms_roles SET ROL='$NombreRol' WHERE ID_ROL='$cod'";
         
        mysqli_query($conexion2 , $sql);
    }
    include("Rol.php");
}
?>