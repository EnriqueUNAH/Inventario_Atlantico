<?php
// Incluir db2 file
require_once "../db2.php";
 
// Definir variables e inicializarlas
$CodigoEstante = $NombreEstante = "";

 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Validar codigo Estante
    $CodigoEstante = trim($_POST["CodigoEstante"]);
    if(empty($CodigoEstante)){
        $cod_err = "Por favor ingresa un Codigo valido.";     
    } elseif(!ctype_digit($CodigoEstante)){
        $cod_err = "Por favor ingresa un valor positivo.";
    } else{
        $cod = $CodigoEstante;
    }


    // Validate nombre del estante
    $NombreEstante= trim($_POST["NombreEstante"]);
    if(empty($NombreEstante)){
        $name_err = "Por favor ingresa el nombre del estante.";
    /*} elseif(!filter_var($NombreEstante, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $name_err = "Por favor ingresa un nombre valido";*/
    } else{
        $name = $NombreEstante;
    }
    
    
    // Check errores en las entradas antes de insertar a la base
    if(empty($name_err) && empty($cod_err)){
        // Prepararn el query
        $sql = "INSERT INTO tbl_estante(COD_ESTANTE, NOMBRE_ESTANTE) VALUES ('$CodigoEstante', '$NombreEstante')";
         
        mysqli_query( $conexion2 , $sql);
        
    }
    include("Mantenimiento-estante.php");
}
?>