<?php
// Incluir db2 file
require_once "../db2.php";
 
// Definir variables e inicializarlas
$Usuario = $EstadoUsuario = $NombreUsuario = "";
$Contrasena = $Correo = "";
$fechaC = date('Y-m-d');

$consulta="SELECT * FROM tbl_ms_usuario";
        
$resultado= mysqli_query( $conexion2 , $consulta );
$filas = mysqli_num_rows( $resultado );
$filas=$filas+1;

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){


    // Validate Usuario
    $Usuario= trim($_POST["Usuario"]);
    if(empty($NombreRepresentante)){
        $name_err = "Por favor ingresa el nombre de Usuario.";
    } elseif(!filter_var($Usuario, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $name_err = "Por favor ingresa un nombre valido";
    } else{
        $name = $Usuario;
    }

   
    // Validate nombre
    $NombreUsuario= trim($_POST["Nombre"]);
    if(empty($NombreUsuario)){
        $name_err3 = "Por favor ingresa el nombre de la empresa.";
    } elseif(!filter_var($NombreUsuario, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $name_err3 = "Por favor ingresa un nombre valido";
    } else{
        $name3 = $NombreUsuario;
    }
    
    // Validar Contsena
    $Contrasena = trim($_POST["Contrasena"]);
    if(empty($Contrasena)){
        $contra_err = "Por favor ingresa una Contraseña valida.";     
    }

    // Validate correo
    $Correo= trim($_POST["Correo"]);
    if(empty($Correo)){
        $name_err4 = "Por favor ingresa el nombre de la empresa.";
    } elseif(!filter_var($Correo, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-z\s]+$/")))){
        $name_err4 = "Por favor ingresa un nombre valido";
    } else{
        $name4 = $NombreUsuario;
    }
    
        // Prepararn el query
        $sql="INSERT INTO tbl_ms_usuario VALUES('$filas','$Usuario','$NombreUsuario','NUEVO','$Contrasena','$fechaC','0','0','$fechaC','$Correo','$Usuario','$fechaC','$Usuario','$fechaC','2')";
         
        mysqli_query( $conexion2 , $sql);
    include("mantenimiento_usuario.php");
}
?>