<?php

session_start();
$usuario =$_SESSION['nombre'];

include('../db2.php');
$COD_ESTANTE = $_POST['COD_ESTANTE'];
$NOMBRE_ESTANTE = strtoupper($_POST[ 'NOMBRE_ESTANTE' ]);

$update = ("UPDATE TBL_ESTANTE 
	SET 
	NOMBRE_ESTANTE  ='" .$NOMBRE_ESTANTE. "'
  
WHERE COD_ESTANTE='" .$COD_ESTANTE. "'
");
$result_update = mysqli_query($conexion2, $update);

echo "<script type='text/javascript'>
        window.location='CrudEstante.php';
    </script>";     

?>