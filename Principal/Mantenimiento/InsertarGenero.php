<?php
// Incluir db2 file
require_once "../db2.php";
 
// Definir variables e inicializarlas
$CodigoGenero = $NombreGenero = "";

 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Validar codigo tipo producto
    $CodigoGenero = trim($_POST["CodigoGenero"]);
    if(empty($CodigoGenero)){
        $cod_err = "Por favor ingresa un Codigo valido.";     
    } elseif(!ctype_digit($CodigoGenero)){
        $cod_err = "Por favor ingresa un valor positivo.";
    } else{
        $cod = $CodigoGenero;
    }


    // Validate nombre del tipo de producto
    $NombreGenero= trim($_POST["NombreGenero"]);
    if(empty($NombreGenero)){
        $name_err = "Por favor ingresa el nombre del tipo de producto.";
    } elseif(!filter_var($NombreGenero, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $name_err = "Por favor ingresa un nombre valido";
    } else{
        $name = $NombreGenero;
    }
    
    
    // Check errores en las entradas antes de insertar a la base
    if(empty($name_err) && empty($cod_err)){
        // Prepararn el query
        $sql = "INSERT INTO tbl_genero(COD_GENERO, NOMBRE_GENERO) VALUES ('$CodigoGenero', '$NombreGenero')";
         
        mysqli_query( $conexion2 , $sql);
        
    }
    include("Mantenimiento-genero.php");
}
?>