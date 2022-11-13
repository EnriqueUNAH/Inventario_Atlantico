<?php

session_start();
$usuario =$_SESSION['nombre'];

include('../db2.php');
$Cod_Promocion = $_POST['COD_PROMOCION'];
$Nombre_Promocion = strtoupper($_POST[ 'NOMBRE_PROMOCION' ]);

$update = ("UPDATE tbl_Promocion 
	SET 
	NOMBRE_Promocion  ='" .$Nombre_Promocion. "'
  
WHERE COD_PROMOCION='" .$Cod_Promocion. "'
");
$result_update = mysqli_query($conexion2, $update);

echo "<script type='text/javascript'>
        window.location='CrudPromocion.php';
    </script>";     

?>