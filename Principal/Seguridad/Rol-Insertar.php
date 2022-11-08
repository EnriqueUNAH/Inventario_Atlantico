<?php
// Incluir db2 file
require_once "../db2.php";
 
// Definir variables e inicializarlas
$IdRol = $NombreRol = "";

 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Validar codigo tipo producto
    $IdRol = trim($_POST["IdRol"]);
    if(empty($IdRol)){
        $cod_err = "Por favor ingresa un Codigo valido.";     
    } elseif(!ctype_digit($IdRol)){
        $cod_err = "Por favor ingresa un valor positivo.";
    } else{
        $cod = $IdRol;
    }


    // Validate nombre del tipo de producto
    $NombreGenero= trim($_POST["NombreRol"]);
    if(empty($NombreGenero)){
        $name_err = "Por favor ingresa el nombre del rol.";
    } elseif(!filter_var($NombreRol, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $name_err = "Por favor ingresa un nombre valido";
    } else{
        $name = $NombreRol;
    }
    
    
    // Check errores en las entradas antes de insertar a la base
    if(empty($name_err) && empty($cod_err)){
        // Prepararn el query
        $sql = "INSERT INTO tbl_genero(ID_ROL, ROL) VALUES ('$IdRol', '$NombreRol')";
         
        mysqli_query( $conexion2 , $sql);
        
    }
    include("Rol.php");
}
?>