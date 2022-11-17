<?php
session_start();
require_once "../db2.php";
$usuario = $_SESSION['nombre'];

$consulta="SELECT * FROM tbl_Producto";        
$resultado= mysqli_query( $conexion2 , $consulta );
$filas = mysqli_num_rows( $resultado );
$filas=$filas+1;

$Descripcion = $_POST['DESCRIPCION'];
$Cantidad_Minima = $_POST['CANTIDAD_MINIMA'];
$Cantidad_Maxima = $_POST['CANTIDAD_MAXIMA'];
//$Cod_Tipo_Producto = $_POST['COD_TIPO_PRODUCTO'];
$Precio_Venta = $_POST['PRECIO_VENTA'];
$Nombre_Tipo_Producto = $_POST['NOMBRE_TIPO_PRODUCTO'];

//Variables ingresadas
$Nombre_Producto = strtoupper($_POST['Nombre_PRODUCTO']);

//consulta si el producto ya existe
$consulta_="SELECT Nombre_PRODUCTO FROM tbl_Producto WHERE Nombre_PRODUCTO='$Nombre_Producto'";
$resultado_= mysqli_query( $conexion2 , $consulta_ );
$Nombre_Producto_ = mysqli_num_rows( $resultado_ );

//Consultar el codigo del tipo_producto seleccionado de la tabla tipo_producto
$cod_tipo_producto="SELECT COD_TIPO_PRODUCTO FROM TBL_TIPO_PRODUCTO WHERE NOMBRE_TIPO_PRODUCTO='$Nombre_Tipo_Producto'";
$resultado_tipo_producto= mysqli_query( $conexion2 , $cod_tipo_producto );
    while ($COD_TIPO_PRODUCTO=mysqli_fetch_array( $resultado_tipo_producto )) {
        # code...
        $cod_tipo_producto_=$COD_TIPO_PRODUCTO['COD_TIPO_PRODUCTO'];
    }


  




//Decisiones de validaciones
if($Nombre_Producto_ ){?>
<script> 
   alert("Producto ya existente");
   location.href= "Producto_Crear.php";
</SCRipt>
<?php
}else{
    //inserto datos en tabla Producto
    $sql="INSERT INTO TBL_PRODUCTO VALUES('','$Nombre_Producto','$Descripcion','$Cantidad_Minima','$Cantidad_Maxima','$cod_tipo_producto_','$Precio_Venta')";
    mysqli_query( $conexion2 , $sql);

    include("CrudProducto.php");

}

?>