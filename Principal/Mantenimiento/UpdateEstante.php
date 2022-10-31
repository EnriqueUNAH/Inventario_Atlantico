<?php
// Include config file
require_once "../db2.php";
 
// Define variables and initialize with empty values
$CodigoEstante = $NombreEstante ="";

 
// Processing form data when form is submitted
if(isset($_POST["CodigoEstante"]) && !empty($_POST["CodigoEstante"])){
    // Get hidden input value
    $cod = $_POST["CodigoEstante"];
    
    // Validate nombre representante
    $NombreEstante = trim($_POST["NombreEstante"]);
    if(empty($NombreEstante)){
        $name_err = "Please enter a name.";
    } elseif(!filter_var($NombreEstante, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $name_err = "Please enter a valid name.";
    } else{
        $name = $NombreEstante;
    }
    
    
    
    // Check input errors before inserting in database
    if(empty($name_err) ){
        // Prepare an update statement
        $sql = "UPDATE tbl_estante SET NOMBRE_ESTANTE='$NombreEstante' WHERE COD_ESTANTE='$cod'";
         
        mysqli_query($conexion2 , $sql);
    }
    include("Mantenimiento-estante.php");
}
?>