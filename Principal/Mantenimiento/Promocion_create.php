<?php
session_start();
require_once "../db2.php";
$usuario = $_SESSION['nombre'];

$consulta="SELECT * FROM tbl_Promocion";        
$resultado= mysqli_query( $conexion2 , $consulta );
$filas = mysqli_num_rows( $resultado );
$filas=$filas+1;
$fechaC = date('Y-m-d');

//Variables ingresadas
$NOMBRE_Promocion = strtoupper($_POST[ 'NOMBRE_Promocion' ]);

//consulta si el usuario ya existe
$consulta_="SELECT NOMBRE_Promocion FROM tbl_Promocion WHERE NOMBRE_Promocion='$NOMBRE_Promocion'";
$resultado_= mysqli_query( $conexion2 , $consulta_ );
$NOMBRE_Promocion_ = mysqli_num_rows( $resultado_ );


//Decisiones de validaciones
if($NOMBRE_Promocion_ ){?>
<script> 
   alert("Promocion ya existente");
   location.href= "Promocion_Crear.php";
</SCRipt>
<?php
}else{
    //inserto datos en tabla NOMBRE_Promociones
    $sql="INSERT INTO tbl_Promocion VALUES('$filas','$NOMBRE_Promocion','$fechaC','$fechaC')";
    mysqli_query( $conexion2 , $sql);

    include("CrudPromocion.php");

}

?>