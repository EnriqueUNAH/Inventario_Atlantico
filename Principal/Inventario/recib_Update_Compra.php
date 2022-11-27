<?php
include('../db2.php');
$idRegistros = $_REQUEST['id'];
$estado="ANULADO";
$cuota=0;

$update2 = ("UPDATE tbl_compra
	SET 
	TOTAL_PAGADO='" .$cuota. "'

WHERE COD_COMPRA='" .$idRegistros. "'
");
$result_update2 = mysqli_query($conexion2, $update2); 

$update = ("UPDATE tbl_detalle_compra
	SET 
	PRECIO_COMPRA='" .$cuota. "',
    CANTIDAD='" .$cuota. "'

WHERE COD_COMPRA='" .$idRegistros. "'
");
$result_update = mysqli_query($conexion2, $update); 

echo "<script type='text/javascript'>
        window.location='crud_compras.php';
    </script>"; 

?>