<?php
session_start();
require_once "../db2.php";
require_once "CrudDetalleProduccion.php";

$idRegistros = $_REQUEST['id'];


$DeleteRegistro = ("DELETE FROM tbl_detalle_produccion_temp WHERE id= '".$idRegistros."' ");
mysqli_query($conexion2, $DeleteRegistro);


$consulta="SELECT COD_PRODUCTO FROM tbl_produccion_temp where id = '".$idRegistros."' ";
$resultado=mysqli_query( $conexion2 , $consulta );
while ($cod=mysqli_fetch_array( $resultado)) {
     # code...
     $codigo=$cod['COD_PRODUCTO'];
 }

 $consulta2="SELECT cantidad FROM tbl_produccion_temp where id = '".$idRegistros."' ";
 $resultado2=mysqli_query( $conexion2 , $consulta2 );
 while ($cod2=mysqli_fetch_array( $resultado2)) {
      # code...
      $cantidad=$cod2['cantidad'];
  }

  $consulta3="SELECT EXISTENCIA FROM tbl_producto where COD_PRODUCTO = '".$codigo."' ";
  $resultado3=mysqli_query( $conexion2 , $consulta3 );
  while ($cod3=mysqli_fetch_array( $resultado3)) {
       # code...
       $existencia=$cod3['EXISTENCIA'];
   }

$sumar=$existencia+$cantidad;


$s= "UPDATE tbl_producto SET EXISTENCIA='$sumar' WHERE COD_PRODUCTO=$codigo ";
mysqli_query($conexion2,$s);

 



?>

