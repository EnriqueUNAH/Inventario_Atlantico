<?php
// Incluir db2 file
require_once "../db2.php";
 
// Definir variables e inicializarlas
$CodigoTipoMovimiento = $NombreMovimiento = "";

 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Validar codigo tipo producto
    $CodigoTipoMovimiento = trim($_POST["CodigoTipoMovimiento"]);
    if(empty($CodigoTipoMovimiento)){
        $cod_err = "Por favor ingresa un Codigo valido.";     
    } elseif(!ctype_digit($CodigoTipoMovimiento)){
        $cod_err = "Por favor ingresa un valor positivo.";
    } else{
        $cod = $CodigoTipoMovimiento;
    }


    // Validate nombre del tipo de producto
    $NombreMovimiento= trim($_POST["NombreMovimiento"]);
    if(empty($NombreMovimiento)){
        $name_err = "Por favor ingresa el nombre del tipo de producto.";
    } elseif(!filter_var($NombreMovimiento, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $name_err = "Por favor ingresa un nombre valido";
    } else{
        $name = $NombreMovimiento;
    }
    
    
    // Check errores en las entradas antes de insertar a la base
    if(empty($name_err) && empty($cod_err)){
        // Prepararn el query
        $sql = "INSERT INTO tbl_tipo_movimiento(COD_TIPO_MOVIMIENTO, NOMBRE_MOVIMIENTO) VALUES ('$CodigoTipoMovimiento', '$NombreMovimiento')";
         
        mysqli_query( $conexion2 , $sql);
        
    }
    include("Mantenimiento-tipo-mov.php");
}
?>