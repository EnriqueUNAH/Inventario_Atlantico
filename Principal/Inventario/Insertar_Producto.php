<?php
// Incluir db2 file
require_once "../db2.php";
 
// Definir variables e inicializarlas
$COD_PRODUCTO = $Nombre_PRODUCTO = $DESCRIPCION = "";
$CANTIDAD_MINIMA = $CANTIDAD_MAXIMA= $COD_TIPO_PRODUCTO= $PRECIO_VENTA=0;
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Validar codigo producto
    $COD_PRODUCTO = trim($_POST["CodigoProducto"]);
    if(empty($COD_PRODUCTO)){
        $cod_err = "Por favor ingresa un Codigo valido.";     
    } elseif(!ctype_digit($COD_PRODUCTO)){
        $cod_err = "Por favor ingresa un valor positivo.";
    } else{
        $cod = $COD_PRODUCTO;
    }


    // Validate nombre del Producto
    $Nombre_PRODUCTO= trim($_POST["NombreProducto"]);
    if(empty($Nombre_PRODUCTO)){
        $name_err = "Por favor ingresa el nombre del Producto.";
    } elseif(!filter_var($Nombre_PRODUCTO, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $name_err = "Por favor ingresa un nombre valido";
    } else{
        $name = $Nombre_PRODUCTO;
    }
    
    // Validate descripcion
    $DESCRIPCION= trim($_POST["Descripcion"]);
    if(empty($NombreEmpresa)){
        $name_err2 = "Por favor ingresa la descripcion.";
    } elseif(!filter_var($DESCRIPCION, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $name_err2 = "Por favor ingresa una descripcion valida";
    } else{
        $name2 = $DESCRIPCION;
    }
    
    // Validar cantidad minima
    $CANTIDAD_MINIMA = trim($_POST["CANTIDAD_MINIMA"]);
    if(empty($CANTIDAD_MINIMA)){
        $cant_min_err = "Por favor ingresa una cantidad valida.";     
    } elseif(!ctype_digit($CANTIDAD_MINIMA)){
        $cant_min_err = "Por favor ingresa un valor positivo.";
    } else{
        $cantidad_min= $CANTIDAD_MINIMA;
    }

    // Validar cantidad maxima
    $CANTIDAD_MAXIMA = trim($_POST["CANTIDAD_MAXIMA"]);
    if(empty($CANTIDAD_MAXIMA)){
        $cant_max_err = "Por favor ingresa una cantidad valida.";     
    } elseif(!ctype_digit($CANTIDAD_MINIMA)){
        $cant_max_err = "Por favor ingresa un valor positivo.";
    } else{
        $cantidad_max= $CANTIDAD_MAXIMA;
    }

    // Validar codigo tipo producto
    $COD_TIPO_PRODUCTO = trim($_POST["COD_TIPO_PRODUCTO"]);
    if(empty($COD_TIPO_PRODUCTO)){
        $cod_err2 = "Por favor ingresa un codigo valida.";     
    } elseif(!ctype_digit($COD_TIPO_PRODUCTO)){
        $cod_err2 = "Por favor ingresa un valor positivo.";
    } else{
        $cod_tip_producto= $COD_TIPO_PRODUCTO;
    }

    // Validar precio de venta
    $PRECIO_VENTA = trim($_POST["PRECIO_VENTA"]);
    if(empty($PRECIO_VENTA)){
        $precio_err = "Por favor ingresa un precio valido.";     
    } elseif(!ctype_digit($PRECIO_VENTA)){
        $precio_err = "Por favor ingresa un valor positivo.";
    } else{
        $precio= $PRECIO_VENTA;
    }

    // Check errores en las entradas antes de insertar a la base
    //if(empty($cod_err) && empty($name_err) && empty($name_err2) && empty($cant_min_err) && empty($cant_max_err) && empty($cod_err2) && empty($precio_err) ){
        // Prepararn el query
        $sql = "INSERT INTO tbl_producto(COD_PRODUCTO,Nombre_PRODUCTO,DESCRIPCION,CANTIDAD_MINIMA,CANTIDAD_MAXIMA,COD_TIPO_PRODUCTO,PRECIO_VENTA) VALUES ('$COD_PRODUCTO', '$Nombre_PRODUCTO', '$DESCRIPCION', '$CANTIDAD_MINIMA', '$CANTIDAD_MAXIMA', '$COD_TIPO_PRODUCTO', '$PRECIO_VENTA')";
 
        mysqli_query( $conexion2 , $sql);

    //}

    header('Location: Detalle_Productos.php');
    die();

}
?>