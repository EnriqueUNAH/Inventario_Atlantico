<?php
// Incluir db2 file
require_once "../db2.php";
 
// Definir variables e inicializarlas
$Parametro = $IdParametro = "";

 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

   // Validar codigo tipo producto
    $IdParametro = trim($_POST["IdParametro"]);
    if(empty($IdParametro)){
        $cod_err = "Por favor ingresa un valor valido.";     
    } elseif(!ctype_digit($IdParametro)){
        $cod_err = "Por favor ingresa un valor positivo.";
    } else{
        $cod = $IdParametro;
    }

    // Validate nombre 
    $Parametro= trim($_POST["Parametro"]);
    if(empty($Parametro)){
        $name_err = "Por favor ingresa el parametro.";
    } elseif(!filter_var($Parametro, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $name_err = "Por favor ingresa un nombre valido";
    } else{
        $name = $Parametro;
    }
    
    
    
    // Check errores en las entradas antes de insertar a la base
    if(empty($name_err) && empty($cod_err)){
        // Prepararn el query
        $sql = "INSERT INTO tbl_ms_parametros(Id_PARAMETRO,PARAMETRO ) VALUES ('$IdParametro','$Parametro')";
         
        mysqli_query( $conexion2 , $sql);
        
    }
    include("Parametro.php");
}
?>