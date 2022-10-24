<?php
// Include config file
require_once "../db2.php";
 
// Define variables and initialize with empty values
$CodigoProveedor = $NombreRepresentante = $NombreEmpresa = "";
$RTN=0;
 
// Processing form data when form is submitted
if(isset($_POST["CodigoProveedor"]) && !empty($_POST["CodigoProveedor"])){
    // Get hidden input value
    $cod = $_POST["CodigoProveedor"];
    
    // Validate nombre representante
    $NombreRepresentante = trim($_POST["NombreRepresentante"]);
    if(empty($NombreRepresentante)){
        $name_err = "Please enter a name.";
    } elseif(!filter_var($NombreRepresentante, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $name_err = "Please enter a valid name.";
    } else{
        $name = $NombreRepresentante;
    }
    
    // Validate empresa
    $NombreEmpresa = trim($_POST["NombreEmpresa"]);
    if(empty($NombreEmpresa)){
        $name_err2 = "Please enter a name.";
    } elseif(!filter_var($NombreEmpresa, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $name_err2 = "Please enter a valid name.";
    } else{
        $name2 = $NombreEmpresa;
    }
    
    // Validate RTN
    $RTN= trim($_POST["RTN"]);
    if(empty($RTN)){
        $rtn_err = "Please enter the RTN.";     
    } elseif(!ctype_digit($RTN)){
        $rtn_err = "Please enter a positive integer value.";
    } else{
        $rnt = $RTN;
    }
    
    // Check input errors before inserting in database
    if(empty($name_err) && empty($name_err2) && empty($rtn_err)){
        // Prepare an update statement
        $sql = "UPDATE tbl_proveedor SET Nombre_Representante='$NombreRepresentante', Nombre_Empresa='$NombreEmpresa', RTN='$RTN' WHERE COD_PROVEEDOR='$cod'";
         
        mysqli_query($conexion2 , $sql);
    }
    include("DetalleProveedores.php");
}
?>