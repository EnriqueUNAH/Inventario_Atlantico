<?php
// Include config file
require_once "../db2.php";
 
// Define variables and initialize with empty values
$CodigoTipoMovimiento = $NombreMovimiento ="";

 
// Processing form data when form is submitted
if(isset($_POST["CodigoTipoMovimiento"]) && !empty($_POST["CodigoTipoMovimiento"])){
    // Get hidden input value
    $cod = $_POST["CodigoTipoMovimiento"];
    
    // Validate nombre representante
    $NombreMovimiento = trim($_POST["NombreMovimiento"]);
    if(empty($NombreMovimiento)){
        $name_err = "Please enter a name.";
    } elseif(!filter_var($NombreMovimiento, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $name_err = "Please enter a valid name.";
    } else{
        $name = $NombreMovimiento;
    }
    
    
    
    // Check input errors before inserting in database
    if(empty($name_err) ){
        // Prepare an update statement
        $sql = "UPDATE tbl_tipo_movimiento SET NOMBRE_MOVIMIENTO='$NombreMovimiento' WHERE COD_TIPO_MOVIMIENTO='$cod'";
         
        mysqli_query($conexion2 , $sql);
    }
    include("Mantenimiento-tipo-mov.php");
}
?>