<?php
include('../db2.php');
$idRegistros = $_REQUEST['id'];
$dni = $_REQUEST['DNI'];
$nombreP = $_REQUEST['nombre'];
$tel = $_REQUEST['tel'];
$correo = $_REQUEST['correo'];
$dir = $_REQUEST['dir'];

$actualizar = "UPDATE tbl_cliente SET NUMERO_DNI='$dni', NOMBRE_COMPLETO='$nombreP', TELEFONO='$tel', CORREO_ELECTRONICO='$correo', DIRECCION='$dir' WHERE COD_CLIENTE='$idRegistros'";

$result_update = mysqli_query($conexion2, $actualizar);

echo "<script type='text/javascript'>
        window.location='crudclientes.php';
    </script>"; 

?>