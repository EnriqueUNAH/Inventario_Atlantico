<?php
session_start();
require_once "../db2.php";
$usuario = $_SESSION['nombre'];

$consulta="SELECT * FROM TBL_ESTANTE";        
$resultado= mysqli_query( $conexion2 , $consulta );
$filas = mysqli_num_rows( $resultado );
$filas=$filas+1;

//Variables ingresadas
$NOMBRE_ESTANTE = strtoupper($_POST[ 'NOMBRE_ESTANTE' ]);

//consulta si el usuario ya existe
$consulta_="SELECT NOMBRE_ESTANTE FROM TBL_ESTANTE WHERE NOMBRE_ESTANTE='$NOMBRE_ESTANTE'";
$resultado_= mysqli_query( $conexion2 , $consulta_ );
$NOMBRE_ESTANTE_ = mysqli_num_rows( $resultado_ );


//Decisiones de validaciones
if($NOMBRE_ESTANTE_ ){?>
<script> 
   alert("Estante ya existente");
   location.href= "Estante_Crear.php";
</SCRipt>
<?php
}else{
    //inserto datos en tabla NOMBRE_GENEROes
    $sql="INSERT INTO TBL_ESTANTE VALUES('$filas','$NOMBRE_ESTANTE')";
    mysqli_query( $conexion2 , $sql);

    include("CrudEstante.php");

}

?>