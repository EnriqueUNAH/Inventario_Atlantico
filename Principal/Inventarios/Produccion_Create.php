<?php
session_start();
require_once "../db2.php";
$usuario = $_SESSION['nombre'];
$fechaC = date('Y-m-d');





$sqlProduccion   = ("SELECT * FROM tbl_produccion_temp");
$queryProduccion = mysqli_query($conexion2, $sqlProduccion);


$sqlDetalle   = ("SELECT * FROM tbl_detalle_produccion_temp");
$queryDetalle = mysqli_query($conexion2, $sqlDetalle);



  $consulta="SELECT Max(id) FROM tbl_detalle_produccion_temp";
  $result = mysqli_query($conexion2,$consulta);
  $row = mysqli_fetch_array($result);
  $max = $row[0];
  $filas=$max + 1;
  





//Variables ingresadas
$Cantidad_Insumo = strtoupper($_POST[ 'cantidad_insumo' ]);
$Insumo = strtoupper($_POST[ 'insumo' ]);




  //inserto datos en tabla detalle produccion temporal
    $sql="INSERT INTO tbl_detalle_produccion_temp VALUES('$filas','$Insumo','$Cantidad_Insumo')";
    mysqli_query( $conexion2 , $sql);

   

    ?>
     <script type="text/javascript">
     window.location.href = "CrudDetalleProduccion.php";
     </script>

<?php

?>