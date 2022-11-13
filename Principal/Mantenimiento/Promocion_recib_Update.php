<?php

session_start();
$usuario =$_SESSION['nombre'];

include('../db2.php');
$COD_Promocion = $_POST['COD_Promocion'];
$NOMBRE_Promocion = strtoupper($_POST[ 'NOMBRE_Promocion' ]);

$update = ("UPDATE tbl_Promocion 
	SET 
	NOMBRE_Promocion  ='" .$NOMBRE_Promocion. "'
  
WHERE COD_Promocion='" .$COD_Promocion. "'
");
$result_update = mysqli_query($conexion2, $update);

echo "<script type='text/javascript'>
        window.location='CrudPromocion.php';
    </script>";     

?>