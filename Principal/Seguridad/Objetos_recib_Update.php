<?php

session_start();
$usuario =$_SESSION['nombre'];

include('../db2.php');
$ID_OBJETO = $_POST['ID_OBJETO'];
$OBJETO = strtoupper($_POST[ 'OBJETO' ]);
$DESCRIPCION = strtoupper($_POST[ 'DESCRIPCION' ]);
$TIPO_OBJETO = strtoupper($_POST[ 'TIPO_OBJETO' ]);


$fechaC = date('Y-m-d');

$update = ("UPDATE tbl_ms_objetos
	SET 
	OBJETO  ='" .$OBJETO. "',
  	DESCRIPCION  ='" .$DESCRIPCION. "',
    TIPO_OBJETO  ='" .$TIPO_OBJETO. "',
    MODIFICADO_POR ='" .$usuario. "',
    FECHA_MODIFICACION ='" .$fechaC. "' 
  
WHERE ID_OBJETO='" .$ID_OBJETO. "'
");
$result_update = mysqli_query($conexion2, $update);

echo "<script type='text/javascript'>
        window.location='CrudObjetos.php';
    </script>";     

?>