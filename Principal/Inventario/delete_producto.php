<?php
// Include config file
require_once "../db2.php";
 
// Define variables and initialize with empty values
$cod="";

 
// Processing form data when form is submitted
if(isset($_POST["CodigoProducto"]) && !empty($_POST["CodigoProducto"])){
    // Get hidden input value
    $cod = $_POST["CodigoProducto"];

        $sql = "DELETE FROM tbl_producto WHERE COD_PRODUCTO = '$cod'";

        mysqli_query($conexion2 , $sql);
    }
    include("Detalle_Productos.php");
?>