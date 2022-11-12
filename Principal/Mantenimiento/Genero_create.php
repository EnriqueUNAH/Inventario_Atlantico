<?php
session_start();
require_once "../db2.php";
$usuario = $_SESSION['nombre'];

$consulta="SELECT * FROM tbl_genero";        
$resultado= mysqli_query( $conexion2 , $consulta );
$filas = mysqli_num_rows( $resultado );
$filas=$filas+1;

//Variables ingresadas
$NOMBRE_GENERO = strtoupper($_POST[ 'NOMBRE_GENERO' ]);

//consulta si el usuario ya existe
$consulta_="SELECT NOMBRE_GENERO FROM tbl_genero WHERE NOMBRE_GENERO='$NOMBRE_GENERO'";
$resultado_= mysqli_query( $conexion2 , $consulta_ );
$NOMBRE_GENERO_ = mysqli_num_rows( $resultado_ );


//Decisiones de validaciones
if($NOMBRE_GENERO_ ){?>
<script> 
   alert("Genero ya existente");
   location.href= "Genero_CrearROl.php";
</SCRipt>
<?php
}else{
    //inserto datos en tabla NOMBRE_GENEROes
    $sql="INSERT INTO tbl_genero VALUES('$filas','$NOMBRE_GENERO')";
    mysqli_query( $conexion2 , $sql);

    include("CrudGenero.php");

}

?>