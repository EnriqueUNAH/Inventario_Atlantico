<?php
session_start();
require_once "../db2.php";
$usuario = $_SESSION['nombre'];


$consulta="SELECT * FROM tbl_configuracion_cai";        
$resultado= mysqli_query( $conexion2 , $consulta );
$filas = mysqli_num_rows( $resultado );
$filas=$filas+1;
$FECHA_VENCIMIENTO = $_POST['FECHA_VENCIMIENTO'];


//Variables ingresadas
$RANGO_INICIAL = ($_POST[ 'RANGO_INICIAL' ]);
$RANGO_FINAL = ($_POST[ 'RANGO_FINAL' ]);
$RANGO_ACTUAL = ($_POST[ 'RANGO_ACTUAL' ]);
$NUMERO_CAI = strtoupper($_POST[ 'NUMERO_CAI' ]);


//consulta si el parametro ya existe
$consulta_="SELECT RANGO_INICIAL FROM tbl_configuracion_cai WHERE RANGO_INICIAL='$RANGO_INICIAL'";
$resultado_= mysqli_query( $conexion2 , $consulta_ );
$RANGO_INICIAL_consulta = mysqli_num_rows( $resultado_ );

//consulta id usuario 
$consulta__="SELECT ID_USUARIO FROM tbl_ms_usuario WHERE Usuario='$usuario'";
$resultado__= mysqli_query( $conexion2 , $consulta__ );
    while ($ID_user=mysqli_fetch_array( $resultado__ )) {
        # code...
        $id_usuario=$ID_user['ID_USUARIO'];
    }


//Decisiones de validaciones
if($RANGO_INICIAL_consulta ){?>
<script> 
   alert("Rango ya existente");
   location.href= "ConfiguracionCAI_Crear.php";
</SCRipt>
<?php
}else{
    //inserto datos en tabla parametros
    $sql="INSERT INTO tbl_configuracion_cai VALUES('$filas','$RANGO_INICIAL','$RANGO_FINAL','$RANGO_ACTUAL','$NUMERO_CAI','$FECHA_VENCIMIENTO','$id_usuario')";
   
    mysqli_query( $conexion2 , $sql);

    include("CrudConfiguracionCAI.php");

}

?>