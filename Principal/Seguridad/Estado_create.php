<?php
session_start();
require_once "../db2.php";
$usuario = $_SESSION['nombre'];
$fechaC = date('Y-m-d');

$consulta="SELECT * FROM tbl_ms_estado";        
$resultado= mysqli_query( $conexion2 , $consulta );
$filas = mysqli_num_rows( $resultado );
$filas=$filas+1;

//Variables ingresadas
$NOMBRE_ESTADO = strtoupper($_POST[ 'NOMBRE_ESTADO' ]);
$DESCRIPCION = strtoupper($_POST[ 'descripcion' ]);

//consulta si el usuario ya existe
$consulta_="SELECT NOMBRE_ESTADO FROM tbl_ms_estado WHERE NOMBRE_ESTADO='$NOMBRE_ESTADO'";
$resultado_= mysqli_query( $conexion2 , $consulta_ );
$ESTADO_CONSULTA = mysqli_num_rows( $resultado_ );


//Decisiones de validaciones
if($ESTADO_CONSULTA ){?>
<script> 
   alert("Estado ya existente");
   location.href= "Estado_CrearEstado.php";
</SCRipt>
<?php
}else{
    //inserto datos en tabla roles
    $sql="INSERT INTO tbl_ms_estado VALUES('$filas','$NOMBRE_ESTADO','$DESCRIPCION','$usuario','$fechaC','$usuario','$fechaC')";
    mysqli_query( $conexion2 , $sql);

    include("CrudEstado.php");

}

?>