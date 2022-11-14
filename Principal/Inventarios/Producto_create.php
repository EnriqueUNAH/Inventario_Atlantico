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
$Cod_Tipo_Producto = $_POST['COD_TIPO_PRODUCTO'];
$Precio_Venta = $_POST['PRECIO_VENTA'];

//Variables ingresadas
$Nombre_Producto = strtoupper($_POST[ 'Nombre_PRODUCTO' ]);

//consulta si el producto ya existe
$consulta_="SELECT NOMBRE_PRODUCTO FROM tbl_Producto WHERE Nombre_PRODUCTO='$Nombre_Producto'";
$resultado_= mysqli_query( $conexion2 , $consulta_ );
$Nombre_Producto_ = mysqli_num_rows( $resultado_ );

//Consultar el con tipo_producto seleccionado de la tabla tipo_producto
$id_rol="SELECT COD_TIPO_PRODUCTO FROM tbl_tipo_producto WHERE NOMBRE_TIPO_PRODUCTO='$Nombre_Tipo_Producto'";
$resultado_rol= mysqli_query( $conexion2 , $Cod_Tipo_Producto );
    while ($ID_ROL=mysqli_fetch_array( $resultado_tipo_producto )) {
        # code...
        $cod_tipo_producto_=$Cod_Tipo_Producto['COD_TIPO_PRODUCTO'];
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
    $sql="INSERT INTO tbl_Producto VALUES('$filas','$Nombre_Producto','$Descripcion','$Cantidad_Minima','$Cantidad_Maxima','$Cod_Tipo_Producto','$Precio_Venta')";
    mysqli_query( $conexion2 , $sql);

    include("CrudProducto.php");

}

?>