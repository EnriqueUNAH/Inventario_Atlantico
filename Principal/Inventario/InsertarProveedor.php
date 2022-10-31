<?php
// Incluir db2 file
require_once "../db2.php";
 
// Definir variables e inicializarlas
$CodigoProveedor = $NombreRepresentante = $NombreEmpresa = "";
$RTN = $CodigoProducto=0;
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Validar codigo proveedor
    $CodigoProveedor = trim($_POST["CodigoProveedor"]);
    if(empty($CodigoProveedor)){
        $cod_err = "Por favor ingresa un Codigo valido.";     
    } elseif(!ctype_digit($CodigoProveedor)){
        $cod_err = "Por favor ingresa un valor positivo.";
    } else{
        $cod = $CodigoProveedor;
    }


    // Validate nombre representante
    $NombreRepresentante= trim($_POST["NombreRepresentante"]);
    if(empty($NombreRepresentante)){
        $name_err = "Por favor ingresa el nombre del representante.";
    } elseif(!filter_var($NombreRepresentante, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $name_err = "Por favor ingresa un nombre valido";
    } else{
        $name = $NombreRepresentante;
    }
    
    // Validate nombre empresa
    $NombreEmpresa= trim($_POST["NombreEmpresa"]);
    if(empty($NombreEmpresa)){
        $name_err2 = "Por favor ingresa el nombre de la empresa.";
    } elseif(!filter_var($NombreEmpresa, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $name_err2 = "Por favor ingresa un nombre valido";
    } else{
        $name2 = $NombreEmpresa;
    }
    
    // Validar RTN
    $RTN = trim($_POST["RTN"]);
    if(empty($RTN)){
        $rtn_err = "Por favor ingresa un RTN valido.";     
    } elseif(!ctype_digit($RTN)){
        $rtn_err = "Por favor ingresa un valor positivo.";
    } else{
        $rtn = $RTN;
    }

    // Check errores en las entradas antes de insertar a la base
    if(empty($name_err) && empty($name_err2) && empty($rtn_err) && empty($cod_err) && empty($prod_err)){
        // Prepararn el query
        $sql = "INSERT INTO tbl_proveedor(COD_PROVEEDOR, NOMBRE_REPRESENTANTE, NOMBRE_EMPRESA, RTN) VALUES ('$CodigoProveedor', '$NombreRepresentante', '$NombreEmpresa', '$RTN')";
         
        mysqli_query( $conexion2 , $sql);
        
    }

    header('Location: DetalleProveedores.php');
    die();
}
?>