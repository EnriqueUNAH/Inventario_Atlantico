<?php
include('../db2.php');
$idRegistros = $_REQUEST['id'];
$mov = $_REQUEST['movimiento'];


$update = ("UPDATE tbl_tipo_movimiento
	SET 
	NOMBRE_MOVIMIENTO  ='" .$mov. "' 

WHERE COD_TIPO_MOVIMIENTO='" .$idRegistros. "'
");
$result_update = mysqli_query($conexion2, $update);

echo "<script type='text/javascript'>
        window.location='crud_tipo_movimiento.php';
    </script>"; 

?>