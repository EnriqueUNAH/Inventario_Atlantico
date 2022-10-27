<?php
// Incluir db2 file
require_once "../db2.php";
 
// Definir variables e inicializarlas
$CodigoTipoProducto = $NombreTipoProducto = "";

 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Validar codigo tipo producto
    $CodigoTipoProducto = trim($_POST["CodigoTipoProducto"]);
    if(empty($CodigoTipoProducto)){
        $cod_err = "Por favor ingresa un Codigo valido.";     
    } elseif(!ctype_digit($CodigoTipoProducto)){
        $cod_err = "Por favor ingresa un valor positivo.";
    } else{
        $cod = $CodigoTipoProducto;
    }


    // Validate nombre del tipo de producto
    $NombreTipoProducto= trim($_POST["NombreTipoProducto"]);
    if(empty($NombreTipoProducto)){
        $name_err = "Por favor ingresa el nombre del tipo de producto.";
    } elseif(!filter_var($NombreTipoProducto, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $name_err = "Por favor ingresa un nombre valido";
    } else{
        $name = $NombreTipoProducto;
    }
    
    
    // Check errores en las entradas antes de insertar a la base
    if(empty($name_err) && empty($cod_err)){
        // Prepararn el query
        $sql = "INSERT INTO tbl_tipo_producto(COD_TIPO_PRODUCTO, NOMBRE_TIPO_PRODUCTO) VALUES ('$CodigoTipoProducto', '$NombreTipoProducto')";
         
        mysqli_query( $conexion2 , $sql);
        
    }
    include("Mantenimiento-tipo-producto.php");
}
?>