<?php

session_start();
$usuario =$_SESSION['nombre'];

include('../db2.php');
$ID_PARAMETRO = $_POST['ID_PARAMETRO'];
$PARAMETRO = strtoupper($_POST[ 'PARAMETRO' ]);
$VALOR = strtoupper($_POST[ 'VALOR' ]);

$fechaC = date('Y-m-d');

$update = ("UPDATE tbl_ms_parametros 
	SET 
	PARAMETRO  ='" .$PARAMETRO. "',
  	VALOR  ='" .$VALOR. "',
    MODIFICADO_POR ='" .$usuario. "',
    FECHA_MODIFICACION ='" .$fechaC. "' 
  
WHERE ID_PARAMETRO='" .$ID_PARAMETRO. "'
");
$result_update = mysqli_query($conexion2, $update);

echo "<script type='text/javascript'>
        window.location='CrudParametros.php';
    </script>";     

?>