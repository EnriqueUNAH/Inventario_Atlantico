<?php
// Include config file
require_once "../db2.php";
 
// Define variables and initialize with empty values
$IdObjeto = $NombreObjeto ="";

 
// Processing form data when form is submitted
if(isset($_POST["IdObjeto"]) && !empty($_POST["IdObjeto"])){
    // Get hidden input value
    $cod = $_POST["IdObjeto"];
    
    // Validate nombre representante
    $NombreObjeto = trim($_POST["NombreObjeto"]);
    if(empty($NombreObjeto)){
        $name_err = "Please enter a name.";
    } elseif(!filter_var($NombreObjeto, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $name_err = "Please enter a valid name.";
    } else{
        $name = $NombreObjeto;
    }

    
    // Check input errors before inserting in database
    if(empty($name_err) ){
        // Prepare an update statement
        $sql = "UPDATE tbl_ms_Objetos SET ROL='$NombreObjeto' WHERE ID_OBJETO='$cod'";
         
        mysqli_query($conexion2 , $sql);
    }
    include("Objeto.php");
}
?>