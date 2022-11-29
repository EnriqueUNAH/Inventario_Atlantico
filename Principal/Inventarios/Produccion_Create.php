
<?php
session_start();
require_once "../db2.php";
$usuario = $_SESSION['nombre'];
$fechaC = date('Y-m-d');

$consultaP="SELECT Max(COD_PRODUCCION) FROM tbl_produccion";
$resultP = mysqli_query($conexion2,$consultaP);
$rowP = mysqli_fetch_array($resultP);
$maxP = $rowP[0];
$filasP=$maxP + 1;


$Descripcion="";
$CantidadProducir=0;
$Descripcion= ($_POST[ 'selectProducto' ]);
$CantidadProducir = $_POST[ 'cantidad_producir' ];


$sqlCliente   = ("SELECT * FROM tbl_detalle_produccion_temp");
$queryCliente = mysqli_query($conexion2, $sqlCliente);
$cantidad     = mysqli_num_rows($queryCliente);


//Consultar el id seleccionado de la tabla producto
$cod_producto="SELECT codproducto FROM producto WHERE descripcion='$Descripcion'";
$resultado_producto= mysqli_query( $conexion2 , $cod_producto );
    while ($Cod_Producto=mysqli_fetch_array( $resultado_producto )) {
        # code...
        $cod_producto_=$Cod_Producto['codproducto'];
    }


      //inserto datos en tabla de produccion 
      $sql2="INSERT INTO tbl_produccion VALUES('$filasP','$fechaC','$usuario','$cod_producto_','$CantidadProducir','EN PRODUCCION')";
      mysqli_query( $conexion2 , $sql2);



  
  ?>

     <script type="text/javascript">
            window.location.href = "ProduccionEnProceso.php";
     </script>













