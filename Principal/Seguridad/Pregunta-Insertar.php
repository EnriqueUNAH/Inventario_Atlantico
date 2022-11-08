<?php
// Incluir db2 file
require_once "../db2.php";
 
// Definir variables e inicializarlas
$IdPregunta = $NombrePregunta = "";

 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Validar codigo tipo producto
    $IdPregunta = trim($_POST["IdPregunta"]);
    if(empty($IdPregunta)){
        $cod_err = "Por favor ingresa un Codigo valido.";     
    } elseif(!ctype_digit($IdPregunta)){
        $cod_err = "Por favor ingresa un valor positivo.";
    } else{
        $cod = $IdPregunta;
    }


    // Validate nombre del tipo de producto
    $NombrePregunta= trim($_POST["NombrePregunta"]);
    if(empty($NombrePregunta)){
        $name_err = "Por favor ingresa la pregunta.";
    } elseif(!filter_var($NombrePregunta, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $name_err = "Por favor ingresa un nombre valido";
    } else{
        $name = $NombrePregunta;
    }
    
    
    // Check errores en las entradas antes de insertar a la base
    if(empty($name_err) && empty($cod_err)){
        // Prepararn el query
        $sql = "INSERT INTO tbl_ms_preguntas(ID_PREGUNTA, PREGUNTA) VALUES ('$IdPregunta', '$NombrePregunta')";
         
        mysqli_query( $conexion2 , $sql);
        
    }
    include("Pregunta.php");
}
?>