<?php
// Include config file
require_once "../db2.php";
 
// Define variables and initialize with empty values
$CodigoTipoProducto = $NombreTipoProducto = "";
 
// Processing form data when form is submitted
if(isset($_POST["CodigoTipoProducto"]) && !empty($_POST["CodigoTipoProducto"])){
    // Get hidden input value
    $cod = $_POST["CodigoTipoProducto"];

        $sql = "DELETE FROM tbl_tipo_producto WHERE COD_TIPO_PRODUCTO = '$cod'";

        mysqli_query($conexion2 , $sql);
    }
    include("Mantenimiento-tipo-producto.php");

?>