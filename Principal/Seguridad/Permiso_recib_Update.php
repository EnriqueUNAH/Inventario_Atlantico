<?php

session_start();
$usuario =$_SESSION['nombre'];

include('../db2.php');
$ID_ROL = $_POST[ 'ID_ROL' ];
$ROL = $_POST[ 'ROL' ];
$OBJETO = $_POST[ 'OBJETO' ];
$PERMISO_INSERCION = $_POST[ 'PERMISO_INSERCION' ];
$PERMISO_ELIMINACION = $_POST[ 'PERMISO_ELIMINACION' ];
$PERMISO_ACTUALIZACION = $_POST[ 'PERMISO_ACTUALIZACION' ];
$PERMISO_CONSULTAR = $_POST[ 'PERMISO_CONSULTAR' ];

$fechaC = date('Y-m-d');

$update = ("UPDATE tbl_ms_permisos
	SET 
	ROL  ='" .$ROL. "',
  	OBJETO  ='" .$OBJETO. "',
    PERMISO_INSERCION  ='" .$PERMISO_INSERCION. "',
    PERMISO_ELIMINACION  ='" .$PERMISO_ELIMINACION. "',
    PERMISO_ACTUALIZACION  ='" .$PERMISO_ACTUALIZACION. "',
    PERMISO_CONSULTAR  ='" .$PERMISO_CONSULTAR. "'

 
  
WHERE ID_ROL='" .$ID_ROL. "'
");
$result_update = mysqli_query($conexion2, $update);

echo "<script type='text/javascript'>
        window.location='Permisos.php';
    </script>";     

?>