<?php

session_start();
$usuario =$_SESSION['nombre'];

include('../db2.php');
$ID_ROL = $_POST['ID_ROL'];
$ROL = strtoupper($_POST[ 'ROL' ]);
$DESCRIPCION = strtoupper($_POST[ 'DESCRIPCION' ]);


$fechaC = date('Y-m-d');

$update = ("UPDATE tbl_ms_roles 
	SET 
	ROL  ='" .$ROL. "',
  	DESCRIPCION  ='" .$DESCRIPCION. "',
    MODIFICADO_POR ='" .$usuario. "',
    FECHA_MODIFICACION ='" .$fechaC. "' 
  
WHERE ID_ROL='" .$ID_ROL. "'
");
$result_update = mysqli_query($conexion2, $update);

echo "<script type='text/javascript'>
        window.location='CrudRoles.php';
    </script>";     

?>