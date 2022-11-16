<?php

session_start();
$usuario =$_SESSION['nombre'];

include('../db2.php');
$COD_TIPO_PRODUCTO = $_POST['COD_TIPO_PRODUCTO'];
$NOMBRE_TIPO_PRODUCTO = strtoupper($_POST[ 'NOMBRE_TIPO_PRODUCTO' ]);

$update = ("UPDATE TBL_TIPO_PRODUCTO 
	SET 
	NOMBRE_TIPO_PRODUCTO  ='" .$NOMBRE_TIPO_PRODUCTO. "'
  
WHERE COD_TIPO_PRODUCTO='" .$COD_TIPO_PRODUCTO. "'
");
$result_update = mysqli_query($conexion2, $update);

echo "<script type='text/javascript'>
        window.location='CrudTipo_producto.php';
    </script>";     

?>