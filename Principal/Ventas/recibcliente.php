<?php
include('../db2.php');
$dni      = $_REQUEST['DNI'];
$nombreP      = $_REQUEST['primer'];
$nombreS      = $_REQUEST['segundo'];
$apellidoP      = $_REQUEST['apellido'];
$apellidoS      = $_REQUEST['apellido2'];
$tel	 = $_REQUEST['telefono'];
$correo	 = $_REQUEST['correo'];
$dir	 = $_REQUEST['direccion'];
$fechaC = date('Y-m-d');


$QueryInsert = ("INSERT INTO tbl_cliente(
    NUMERO_DNI,
    PRIMER NOMBRE,
    SEGUNDO NOMBRE,
    PRIMER APELLIDO,
    SEGUNDO APELLIDO,
    TELEFONO,
    CORREO_ELECTRONICO,
    DIRECCION,
    FECHA_REGISTRO
)
VALUES (
    '".$dni. "',
    '".$nombreP. "',
    '".$nombreS. "',
    '".$apellidoP. "',
    '".$apellidoS."',
    '".$tel. "',
    '".$correo. "',
    '".$dir."',
    '".$fechaC."'
)");
mysqli_query($conexion2, $QueryInsert);

header("location:crudclientes.php");
?>