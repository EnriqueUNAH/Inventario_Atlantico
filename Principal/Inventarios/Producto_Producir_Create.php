
<?php
session_start();
require_once "../db2.php";
$usuario = $_SESSION['nombre'];
$fechaC = date('Y-m-d');




$Descripcion="";
$Descripcion= ($_POST[ 'selectProducto' ]);
$CantidadProducir = $_POST[ 'cantidad_producir' ];


$sqlCliente   = ("SELECT * FROM tbl_detalle_produccion_temp");
$queryCliente = mysqli_query($conexion2, $sqlCliente);
$cantidad     = mysqli_num_rows($queryCliente);






  $consulta2="SELECT Max(id) FROM tbl_produccion_temp";
  $result2 = mysqli_query($conexion2,$consulta2);
  $row2 = mysqli_fetch_array($result2);
  $max2 = $row2[0];
  $filas2=$max2 + 1;
  


//Variables ingresadas
$Cantidad_Producir = $_POST[ 'cantidad_producir' ];
$Producto = strtoupper($_POST[ 'selectProducto' ]);


//Consultar el id seleccionado de la tabla producto
$cod_producto="SELECT codproducto FROM producto WHERE descripcion='$Descripcion'";
$resultado_producto= mysqli_query( $conexion2 , $cod_producto );
    while ($Cod_Producto=mysqli_fetch_array( $resultado_producto )) {
        # code...
        $cod_producto_=$Cod_Producto['codproducto'];
    }

  //inserto datos en tabla produccion temporal
  $sql2="INSERT INTO tbl_produccion_temp VALUES('$filas2','$cod_producto_','$Cantidad_Producir')";
  mysqli_query( $conexion2 , $sql2);

  ?>

     <script type="text/javascript">
     window.location.href = "CrudDetalleProduccion.php";
     </script>

