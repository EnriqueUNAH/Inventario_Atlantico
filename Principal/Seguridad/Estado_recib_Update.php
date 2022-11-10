<?php

session_start();
$usuario =$_SESSION['nombre'];

include('../db2.php');
$ID_ESTADO = $_POST['ID_ESTADO'];
$NOMBRE_ESTADO = strtoupper($_POST[ 'NOMBRE_ESTADO' ]);
$DESCRIPCION = strtoupper($_POST[ 'DESCRIPCION' ]);


$fechaC = date('Y-m-d');

$update = ("UPDATE tbl_ms_estado
	SET 
	NOMBRE_ESTADO  ='" .$NOMBRE_ESTADO. "',
  	DESCRIPCION  ='" .$DESCRIPCION. "',
    MODIFICADO_POR ='" .$usuario. "',
    FECHA_MODIFICACION ='" .$fechaC. "' 
  
WHERE ID_ESTADO='" .$ID_ESTADO. "'
");
$result_update = mysqli_query($conexion2, $update);

echo "<script type='text/javascript'>
        window.location='CrudEstado.php';
    </script>";     

?>