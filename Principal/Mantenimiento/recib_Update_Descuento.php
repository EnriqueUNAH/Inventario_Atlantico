<?php
include('../db2.php');
$idRegistros = $_REQUEST['id'];
$nombre      = $_REQUEST['nombre'];
$cant	 = $_REQUEST['cantidad'];


$update = ("UPDATE tbl_descuento
	SET 
	NOMBRE_DESCUENTO  ='" .$nombre. "',
	PORCENTAJE_DESCUENTO  ='" .$cant. "'

WHERE COD_DESCUENTO='" .$idRegistros. "'
");
$result_update = mysqli_query($conexion2, $update);

echo "<script type='text/javascript'>
        window.location='crud_descuento.php';
    </script>"; 

?>