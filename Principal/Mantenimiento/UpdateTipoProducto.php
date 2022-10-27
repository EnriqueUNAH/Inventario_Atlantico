<?php
// Include config file
require_once "../db2.php";
 
// Define variables and initialize with empty values
$CodigoTipoProducto = $NombreTipoProducto ="";

 
// Processing form data when form is submitted
if(isset($_POST["CodigoTipoProducto"]) && !empty($_POST["CodigoTipoProducto"])){
    // Get hidden input value
    $cod = $_POST["CodigoTipoProducto"];
    
    // Validate nombre representante
    $NombreTipoProducto = trim($_POST["NombreTipoProducto"]);
    if(empty($NombreTipoProducto)){
        $name_err = "Please enter a name.";
    } elseif(!filter_var($NombreTipoProducto, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $name_err = "Please enter a valid name.";
    } else{
        $name = $NombreTipoProducto;
    }
    
    
    
    // Check input errors before inserting in database
    if(empty($name_err) ){
        // Prepare an update statement
        $sql = "UPDATE tbl_tipo_producto SET NOMBRE_TIPO_PRODUCTO='$NombreTipoProducto' WHERE COD_TIPO_PRODUCTO='$cod'";
         
        mysqli_query($conexion2 , $sql);
    }
    include("Mantenimiento-tipo-producto.php");
}
?>