<?php
// Include config file
require_once "../db2.php";
 
// Define variables and initialize with empty values
$IdParametro = $Parametro="";

 
// Processing form data when form is submitted
if(isset($_POST["IdParametro"]) && !empty($_POST["IdParametro"])){
    // Get hidden input value
    $cod = $_POST["IdParametro"];
    
    // Validate nombre representante
    $Parametro = trim($_POST["Parametro"]);
    if(empty($Parametro)){
        $name_err = "Porfavor ingrese el parametro.";
    } elseif(!filter_var($Parametro, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $name_err = "Porfavor ingrese un parametro valido.";
    } else{
        $name = $Parametro;
    }
    
    
    
    // Check input errors before inserting in database
    if(empty($name_err) ){
        // Prepare an update statement
        $sql = "UPDATE tbl_ms_parametros SET PARAMETRO='$Parametro' WHERE ID_PARAMETRO='$cod'";
         
        mysqli_query($conexion2 , $sql);
    }
    include("Parametro.php");
}
?>