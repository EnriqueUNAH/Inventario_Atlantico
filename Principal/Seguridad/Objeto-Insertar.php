<?php
// Incluir db2 file
require_once "../db2.php";
 
// Definir variables e inicializarlas
$IdObjeto = $NombreObjeto = "";

 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Validar codigo tipo producto
    $IdRol = trim($_POST["IdObjeto"]);
    if(empty($IdObjeto)){
        $cod_err = "Por favor ingresa un Codigo valido.";     
    } elseif(!ctype_digit($IdObjeto)){
        $cod_err = "Por favor ingresa un valor positivo.";
    } else{
        $cod = $IdObjeto;
    }


    // Validate nombre del tipo de producto
    $NombreObjeto= trim($_POST["NombreObjeto"]);
    if(empty($NombreObjeto)){
        $name_err = "Por favor ingresa el nombre del Objeto.";
    } elseif(!filter_var($NombreObjeto, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $name_err = "Por favor ingresa un nombre valido";
    } else{
        $name = $NombreObjeto;
    }
    
    
    // Check errores en las entradas antes de insertar a la base
    if(empty($name_err) && empty($cod_err)){
        // Prepararn el query
        $sql = "INSERT INTO tbl_ms_Objetos (ID_OBJETO, OBJETO) VALUES ('$IdObjeto', '$NombreObjeto')";
        
        mysqli_query( $conexion2 , $sql);
        
    }
    include("Objeto.php");
}
?>