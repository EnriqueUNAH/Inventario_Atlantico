<?php
session_start();
require_once "../db2.php";
$usuario = $_SESSION['nombre'];
$fechaC = date('Y-m-d');

$consulta="SELECT * FROM tbl_ms_objetos";        
$resultado= mysqli_query( $conexion2 , $consulta );
$filas = mysqli_num_rows( $resultado );
$filas=$filas+1;

//Variables ingresadas
$OBJETO = strtoupper($_POST[ 'OBJETO' ]);
$DESCRIPCION = strtoupper($_POST[ 'DESCRIPCION' ]);
$TIPO_OBJETO = strtoupper($_POST[ 'TIPO_OBJETO' ]);

//consulta si el usuario ya existe
$consulta_="SELECT OBJETO FROM tbl_ms_objetos WHERE OBJETO='$OBJETO'";
$resultado_= mysqli_query( $conexion2 , $consulta_ );
$OBJETO_CONSULTA = mysqli_num_rows( $resultado_ );


//Decisiones de validaciones
if($OBJETO_CONSULTA ){?>
<script> 
   alert("Objeto ya existente");
   location.href= "Objetos_Crear.php";
</SCRipt>
<?php
}else{
    //inserto datos en tabla roles
    $sql="INSERT INTO tbl_ms_objetos VALUES('$filas','$OBJETO','$DESCRIPCION','$TIPO_OBJETO','$usuario','$fechaC','$usuario','$fechaC')";
    mysqli_query( $conexion2 , $sql);

    include("CrudObjetos.php");

}

?>