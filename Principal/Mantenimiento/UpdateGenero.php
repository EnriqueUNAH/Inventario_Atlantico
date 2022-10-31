<?php
// Include config file
require_once "../db2.php";
 
// Define variables and initialize with empty values
$CodigoGenero = $NombreGenero ="";

 
// Processing form data when form is submitted
if(isset($_POST["CodigoGenero"]) && !empty($_POST["CodigoGenero"])){
    // Get hidden input value
    $cod = $_POST["CodigoGenero"];
    
    // Validate nombre representante
    $NombreGenero = trim($_POST["NombreGenero"]);
    if(empty($NombreGenero)){
        $name_err = "Please enter a name.";
    } elseif(!filter_var($NombreGenero, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $name_err = "Please enter a valid name.";
    } else{
        $name = $NombreGenero;
    }

    
    // Check input errors before inserting in database
    if(empty($name_err) ){
        // Prepare an update statement
        $sql = "UPDATE tbl_genero SET NOMBRE_GENERO='$NombreGenero' WHERE COD_GENERO='$cod'";
         
        mysqli_query($conexion2 , $sql);
    }
    include("Mantenimiento-genero.php");
}
?>