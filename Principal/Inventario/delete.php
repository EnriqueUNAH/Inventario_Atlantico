<?php
// Include config file
require_once "../db2.php";
 
// Define variables and initialize with empty values
$cod="";
 
// Processing form data when form is submitted
if(isset($_POST["CodigoProveedor"]) && !empty($_POST["CodigoProveedor"])){
    // Get hidden input value
    $cod = $_POST["CodigoProveedor"];

        $sql = "DELETE FROM tbl_proveedor WHERE COD_PROVEEDOR = '$cod'";

        mysqli_query($conexion2 , $sql);
    }

    header('Location: DetalleProveedores.php');
    die();
?>