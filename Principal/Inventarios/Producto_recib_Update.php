<?php

session_start();
$usuario =$_SESSION['nombre'];

include('../db2.php');
$Cod_Producto = $_POST['COD_PRODUCTO'];
$Nombre_Producto = strtoupper($_POST[ 'Nombre_PRODUCTO' ]);
$Descripcion = strtoupper($_POST[ 'DESCRIPCION' ]);
$Cantidad_Minima = $_POST[ 'CANTIDAD_MINIMA' ];
$Cantidad_Maxima = $_POST[ 'CANTIDAD_MAXIMA' ];
$Nombre_Tipo_Producto = $_POST[ 'NOMBRE_TIPO_PRODUCTO' ];
$Precio_Venta = $_POST[ 'PRECIO_VENTA' ];

/*

*/
//Consultar el codigo del tipo_producto seleccionado de la tabla tipo_producto

$consulta_tipo_producto="SELECT COD_TIPO_PRODUCTO FROM TBL_TIPO_PRODUCTO WHERE NOMBRE_TIPO_PRODUCTO='$Nombre_Tipo_Producto'";
$resultado_tipo_producto= mysqli_query( $conexion2 , $consulta_tipo_producto );
    while ($valor=mysqli_fetch_array( $resultado_tipo_producto )) {
        # code...
        $Cod_Tipo_Producto=$valor['COD_TIPO_PRODUCTO'];
    }




$update = ("UPDATE tbl_Producto 
	SET 
	Nombre_PRODUCTO  ='" .$Nombre_Producto. "',
    DESCRIPCION  ='" .$Descripcion. "',
    CANTIDAD_MINIMA ='" .$Cantidad_Minima. "',
    CANTIDAD_MAXIMA ='" .$Cantidad_Maxima. "',
    COD_TIPO_PRODUCTO ='" .$Cod_Tipo_Producto. "',
    PRECIO_VENTA ='" .$Precio_Venta. "'
  
WHERE COD_PRODUCTO='" .$Cod_Producto. "'
");
$result_update = mysqli_query($conexion2, $update);






try {
    // code
      #select COD_PRODUCTO
      $consulta_id="SELECT COD_PRODUCTO FROM TBL_PRODUCTO WHERE COD_PRODUCTO='$Cod_Producto'";
      $resultado_id= mysqli_query( $conexion2 , $consulta_id );
      $filas_id = mysqli_num_rows( $resultado_id );

      
  $sql = "UPDATE TBL_PRODUCTO SET  Nombre_PRODUCTO='$Nombre_Producto', DESCRIPCION='$Descripcion', CANTIDAD_MINIMA='$Cantidad_Minima', CANTIDAD_MAXIMA='$Cantidad_Maxima' , COD_TIPO_PRODUCTO='$Cod_Tipo_Producto', PRECIO_VENTA='$Precio_Venta'  WHERE COD_PRODUCTO='$Cod_Producto'";   
   
    mysqli_query($conexion2 , $sql);


  } catch (Exception $e) {
    // exception is raised and it'll be handled here
    $var = $e->getMessage();
    echo "<script type='text/javascript'>
        window.location='CrudProducto.php';
    </script>";     

  }


echo "<script type='text/javascript'>
        window.location='CrudProducto.php';
    </script>";     

?>