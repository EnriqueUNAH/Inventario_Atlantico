<?php
session_start();
require_once "../db2.php";
$usuario = $_SESSION['nombre'];
$fechaC = date('Y-m-d');


  $consulta="SELECT Max(id) FROM tbl_detalle_produccion_temp";
  $result = mysqli_query($conexion2,$consulta);
  $row = mysqli_fetch_array($result);
  $max = $row[0];
  $filas=$max + 1;

  //Consultar el id seleccionado de la tabla producto
  $cod_producto="SELECT COD_PRODUCTO FROM tbl_producto WHERE Nombre_Producto='$Descripcion'";
  $resultado_producto= mysqli_query( $conexion2 , $cod_producto );
    while ($Cod_Producto=mysqli_fetch_array( $resultado_producto )) {
        # code...
        $cod_producto_=$Cod_Producto['COD_PRODUCTO'];
    }

  
  //Variables ingresadas
    $Cantidad_Insumo = $_POST[ 'cantidad_insumo' ];
    $Insumo = $_POST[ 'insumo' ];

  //inserto datos en tabla detalle produccion temporal
    $sql="INSERT INTO tbl_detalle_produccion_temp VALUES('$filas','$Insumo','$Cantidad_Insumo')";
    mysqli_query( $conexion2 , $sql);
   



    ?>

    <!--
     <script type="text/javascript">
     window.location.href = "CrudDetalleProduccion.php";
     </script>
-->

