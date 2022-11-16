<?php
session_start();
require_once "../db2.php";
$usuario = $_SESSION['nombre'];

$consulta="SELECT * FROM TBL_TIPO_PRODUCTO ";        
$resultado= mysqli_query( $conexion2 , $consulta );
$filas = mysqli_num_rows( $resultado );
$filas=$filas+1;

//Variables ingresadas
$NOMBRE_TIPO_PRODUCTO = strtoupper($_POST[ 'NOMBRE_TIPO_PRODUCTO' ]);

//consulta si el usuario ya existe
$consulta_="SELECT NOMBRE_TIPO_PRODUCTO FROM TBL_TIPO_PRODUCTO WHERE NOMBRE_TIPO_PRODUCTO ='$NOMBRE_TIPO_PRODUCTO'";
$resultado_= mysqli_query( $conexion2 , $consulta_ );
$NOMBRE_TIPO_PRODUCTO_ = mysqli_num_rows( $resultado_ );


//Decisiones de validaciones
if($NOMBRE_TIPO_PRODUCTO_ ){?>
<script> 
   alert("tipo producto ya existente");
   location.href= "Tipo_producto_CrearROl.php";
</SCRipt>
<?php
}else{
    //inserto datos en tabla NOMBRE_TIPO_PRODUCTOes
    $sql="INSERT INTO TBL_TIPO_PRODUCTO VALUES('$filas','$NOMBRE_TIPO_PRODUCTO')";
    mysqli_query( $conexion2 , $sql);

    include("CrudTipo_producto.php");

}

?>