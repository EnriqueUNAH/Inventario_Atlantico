<?php
// Include config file
require_once "../db2.php";
 
// Define variables and initialize with empty values
$IdPregunta = $NombrePregunta ="";

 
// Processing form data when form is submitted
if(isset($_POST["IdPregunta"]) && !empty($_POST["IdPregunta"])){
    // Get hidden input value
    $cod = $_POST["IdPregunta"];
    
    // Validate nombre representante
    $NombrePregunta = trim($_POST["NombrePregunta"]);
    if(empty($NombrePregunta)){
        $name_err = "Please enter a name.";
    } elseif(!filter_var($NombrePregunta, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $name_err = "Please enter a valid name.";
    } else{
        $name = $NombrePregunta;
    }

    
    // Check input errors before inserting in database
    if(empty($name_err) ){
        // Prepare an update statement
        $sql = "UPDATE tbl_ms_preguntas SET PREGUNTA='$NombrePregunta' WHERE ID_PREGUNTA='$cod'";
         
        mysqli_query($conexion2 , $sql);
    }
    include("Pregunta.php");
}
?>