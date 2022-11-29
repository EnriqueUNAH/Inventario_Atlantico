
<?php
session_start();
require_once "../db2.php";
$usuario = $_SESSION['nombre'];
$fechaC = date('Y-m-d');

$consultaP="SELECT Max(COD_PRODUCCION) FROM tbl_produccion_temp";
$resultP = mysqli_query($conexion2,$consultaP);
$rowP = mysqli_fetch_array($resultP);
$filasP = $rowP[0];


$consultaPT="SELECT Max(COD_PRODUCCION) FROM tbl_produccion_temp";
$resultPT = mysqli_query($conexion2,$consultaPT);
$rowPT = mysqli_fetch_array($resultPT);
$filasPT = $rowPT[0];


$sqlCliente   = ("SELECT * FROM tbl_detalle_produccion_temp");
$queryCliente = mysqli_query($conexion2, $sqlCliente);
$cantidad     = mysqli_num_rows($queryCliente);

/*
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
*/

      //inserto datos en tabla DETALLE produccion 
      $sql4="INSERT INTO tbl_produccion (FECHA, NOMBRE_USUARIO, COD_PRODUCTO, CANTIDAD_PRODUCIENDO, ESTADO) (SELECT FECHA, NOMBRE_USUARIO, '$filasP', CANTIDAD_PRODUCIENDO, ESTADO FROM tbl_produccion_temp)";
      mysqli_query( $conexion2 , $sql4);      



      //inserto datos en tabla  produccion 
      $sql3="INSERT INTO tbl_detalle_produccion (INSUMO, CANTIDAD, COD_PRODUCCION) (SELECT insumo, cantidad, '$filasPT' FROM tbl_detalle_produccion_temp)";
      mysqli_query( $conexion2 , $sql3);




      $sql5="TRUNCATE TABLE tbl_detalle_produccion_temp";
      mysqli_query( $conexion2 , $sql5);

      $sql6="TRUNCATE TABLE tbl_produccion_temp";
      mysqli_query( $conexion2 , $sql6);


  
  ?>

     <script type="text/javascript">
            window.location.href = "ProduccionEnProceso.php";
     </script>













