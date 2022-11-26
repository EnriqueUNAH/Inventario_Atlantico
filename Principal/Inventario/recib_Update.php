<?php
include('../db2.php');
$idRegistros = $_REQUEST['id'];
$nombre      = $_REQUEST['nombre'];
$empresa	 = $_REQUEST['empresa'];
$rtn 	 = $_REQUEST['RTN'];
$TELEFONO	 = $_REQUEST['TELEFONO'];
$DIRECCION	 = $_REQUEST['DIRECCION'];

$update = ("UPDATE tbl_proveedor
	SET 
	NOMBRE_REPRESENTANTE  ='" .$nombre. "',
	NOMBRE_EMPRESA  ='" .$empresa. "',
	RTN ='" .$rtn. "' ,
	TELEFONO  ='" .$TELEFONO. "',
	DIRECCION ='" .$DIRECCION. "' 

WHERE COD_PROVEEDOR='" .$idRegistros. "'
");
$result_update = mysqli_query($conexion2, $update);

echo "<script type='text/javascript'>
        window.location='crud_proveedores.php';
    </script>"; 

?>