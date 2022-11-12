<?php

session_start();
$usuario =$_SESSION['nombre'];

include('../db2.php');
$COD_GENERO = $_POST['COD_GENERO'];
$NOMBRE_GENERO = strtoupper($_POST[ 'NOMBRE_GENERO' ]);

$update = ("UPDATE tbl_genero 
	SET 
	NOMBRE_GENERO  ='" .$NOMBRE_GENERO. "'
  
WHERE COD_GENERO='" .$COD_GENERO. "'
");
$result_update = mysqli_query($conexion2, $update);

echo "<script type='text/javascript'>
        window.location='CrudGenero.php';
    </script>";     

?>