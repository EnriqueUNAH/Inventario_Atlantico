<?php
session_start();
require_once "../db2.php";
$usuario = $_SESSION['nombre'];
$fechaC = date('Y-m-d');

$consulta="SELECT * FROM tbl_ms_parametros";        
$resultado= mysqli_query( $conexion2 , $consulta );
$filas = mysqli_num_rows( $resultado );
$filas=$filas+1;

//Variables ingresadas
$PARAMETRO = strtoupper($_POST[ 'PARAMETRO' ]);
$VALOR = strtoupper($_POST[ 'VALOR' ]);

//consulta si el parametro ya existe
$consulta_="SELECT PARAMETRO FROM tbl_ms_parametros WHERE PARAMETRO='$PARAMETRO'";
$resultado_= mysqli_query( $conexion2 , $consulta_ );
$PARAMETRO_consulta = mysqli_num_rows( $resultado_ );

//consulta id usuario 
$consulta__="SELECT ID_USUARIO FROM tbl_ms_usuario WHERE Usuario='$usuario'";
$resultado__= mysqli_query( $conexion2 , $consulta__ );
    while ($ID_user=mysqli_fetch_array( $resultado__ )) {
        # code...
        $id_usuario=$ID_user['ID_USUARIO'];
    }


//Decisiones de validaciones
if($PARAMETRO_consulta ){?>
<script> 
   alert("Parametro ya existente");
   location.href= "Parametros_Crear.php";
</SCRipt>
<?php
}else{
    //inserto datos en tabla parametros
    $sql="INSERT INTO tbl_ms_parametros VALUES('$filas','$PARAMETRO','$VALOR','$id_usuario','$usuario','$fechaC','$usuario','$fechaC')";
   
    mysqli_query( $conexion2 , $sql);

    include("CrudParametros.php");

}

?>