<?php

session_start();
$usuario =$_SESSION['nombre'];

include('../db2.php');
$Cod_Producto = $_POST['COD_PRODUCTO'];
$Nombre_Producto = strtoupper($_POST[ 'Nombre_PRODUCTO' ]);

$Descripcion = strtoupper($_POST[ 'DESCRIPCION' ]);
$Cantidad_Minima = $_POST[ 'CANTIDAD_MINIMA' ];
$Cantidad_Maxima = $_POST[ 'CANTIDAD_MAXIMA' ];

$update = ("UPDATE tbl_Producto 
	SET 
	Nombre_PRODUCTO  ='" .$Nombre_Producto. "',
  DESCRIPCION  ='" .$Descripcion. "',
  CANTIDAD_MINIMA ='" .$Cantidad_Minima. "',
  CANTIDAD_MAXIMA ='" .$Cantidad_Maxima. "'
  
WHERE COD_PRODUCTO='" .$Cod_Producto. "'
");
$result_update = mysqli_query($conexion2, $update);

echo "<script type='text/javascript'>
        window.location='CrudProducto.php';
    </script>";     

?>