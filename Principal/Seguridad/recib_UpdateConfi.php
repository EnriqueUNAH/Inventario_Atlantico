<?php
include('../db2.php');
$id = $_REQUEST['id'];
$nit = $_REQUEST['nit'];
$nombre     = $_REQUEST['nombre'];
$razon_social = $_REQUEST['razon_social'];
$telefono     = $_REQUEST['telefono'];
$email = $_REQUEST['email'];
$direccion     = $_REQUEST['direccion'];
$iva = $_REQUEST['iva'];


$update = ("UPDATE configuracion 
	SET 
	nit  ='" .$nit. "',
  	nombre  ='" .$nombre. "',
      razon_social  ='" .$razon_social. "',
      telefono ='" .$telefono. "',
      email ='" .$email. "',
      direccion ='" .$direccion. "',
      iva  ='" .$iva. "' 

WHERE id='" .$id. "'
");
$result_update = mysqli_query($conexion2, $update);

echo "<script type='text/javascript'>
        window.location='CrudConfi.php';
    </script>"; 

?>