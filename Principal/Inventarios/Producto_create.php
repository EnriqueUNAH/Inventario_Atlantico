<?php
session_start();
require_once "../db2.php";
$usuario = $_SESSION['nombre'];

$consulta="SELECT * FROM tbl_Promocion";        
$resultado= mysqli_query( $conexion2 , $consulta );
$filas = mysqli_num_rows( $resultado );
$filas=$filas+1;
$fechaI = $_POST['FECHA_INICIAL'];
$fechaF = $_POST['FECHA_FINAL'];


//Variables ingresadas
$Nombre_Promocion = strtoupper($_POST[ 'NOMBRE_PROMOCION' ]);

//consulta si el usuario ya existe
$consulta_="SELECT NOMBRE_PROMOCION FROM tbl_Promocion WHERE NOMBRE_PROMOCION='$Nombre_Promocion'";
$resultado_= mysqli_query( $conexion2 , $consulta_ );
$Nombre_Promocion_ = mysqli_num_rows( $resultado_ );


//Decisiones de validaciones
if($Nombre_Promocion_ ){?>
<script> 
   alert("Promocion ya existente");
   location.href= "Promocion_Crear.php";
</SCRipt>
<?php
}else{
    //inserto datos en tabla NOMBRE_Promociones
    $sql="INSERT INTO tbl_Promocion VALUES('$filas','$Nombre_Promocion','$fechaI','$fechaF')";
    mysqli_query( $conexion2 , $sql);

    include("CrudPromocion.php");

}

?>