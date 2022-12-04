
<?php
session_start();
require_once "../db2.php";
$usuario = $_SESSION['nombre'];
$fechaC = date('Y-m-d');

$consultaP="SELECT Max(COD_PRODUCCION) FROM tbl_produccion_temp";
$resultP = mysqli_query($conexion2,$consultaP);
$rowP = mysqli_fetch_array($resultP);
$filasP = $rowP[0];


$consultaPT="SELECT Max(COD_PRODUCCION) FROM tbl_produccion";
$resultPT = mysqli_query($conexion2,$consultaPT);
$rowPT = mysqli_fetch_array($resultPT);
$filasPT = $rowPT[0];


$sqlCliente   = ("SELECT * FROM tbl_detalle_produccion_temp");
$queryCliente = mysqli_query($conexion2, $sqlCliente);
$cantidad     = mysqli_num_rows($queryCliente);


      //inserto datos en tabla DETALLE produccion 
      $sql4="INSERT INTO tbl_produccion (FECHA, NOMBRE_USUARIO, COD_PRODUCTO, CANTIDAD_PRODUCIENDO, ESTADO) (SELECT FECHA, NOMBRE_USUARIO, COD_PRODUCTO, CANTIDAD_PRODUCIENDO, ESTADO FROM tbl_produccion_temp)";
      mysqli_query( $conexion2 , $sql4);      



      //inserto datos en tabla  produccion 
      $sql3="INSERT INTO tbl_detalle_produccion (COD_PRODUCTO, CANTIDAD, COD_PRODUCCION) (SELECT COD_PRODUCTO, cantidad, '$filasPT' FROM tbl_detalle_produccion_temp)";
      mysqli_query( $conexion2 , $sql3);


      while ($dataCliente = mysqli_fetch_array($queryCliente)) { 

        $codPro=$dataCliente['COD_PRODUCTO']; 
          $cant=$dataCliente['cantidad']; 
          $sqll = "call actualizar_existencia_insumo('$cant','$codPro')"; 
          mysqli_query( $conexion2 , $sqll);

     } 
      
     ?>
<?php
      $sql5="TRUNCATE TABLE tbl_detalle_produccion_temp";
      mysqli_query( $conexion2 , $sql5);

      $sql6="TRUNCATE TABLE tbl_produccion_temp";
      mysqli_query( $conexion2 , $sql6);
?>

  
  

     <script type="text/javascript">
            window.location.href = "ProduccionEnProceso.php";
     </script>













