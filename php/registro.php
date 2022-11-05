<?php
session_start();
include( 'db.php' );
$nombre = strtoupper($_POST[ 'name' ]);
$usuario = strtoupper($_POST[ 'username' ]);
$_SESSION['name']=$usuario;
$contrasena = ($_POST[ 'password' ]);
$correo = ($_POST[ 'email' ]);
$fechaC = date('Y-m-d');

$consulta="SELECT * FROM tbl_ms_usuario";
$resultado= mysqli_query( $conexion , $consulta );
$filas = mysqli_num_rows( $resultado );
$filas=$filas+1;

#Consulta para saber si el usuario ya existe
$consulta_="SELECT Usuario FROM tbl_ms_usuario WHERE Usuario='$usuario'";
$resultado_= mysqli_query( $conexion , $consulta_ );
$filas_ = mysqli_num_rows( $resultado_ );

#Consulta para saber el parametro de fecha vencimiento
$consulta_Parametro_fecha="SELECT VALOR FROM tbl_ms_parametros where ID_PARAMETRO = '4'";
$resultado_Parametro_fecha=mysqli_query( $conexion , $consulta_Parametro_fecha );
while ($valor_fecha=mysqli_fetch_array( $resultado_Parametro_fecha )) {
    $parametro_fecha=$valor_fecha['VALOR'];
}

//consulta si el coreo ya existe
$consultaCoreeo="SELECT CORREO_ELECTRONICO FROM tbl_ms_usuario WHERE CORREO_ELECTRONICO='$correo'";
$resultado_Correo= mysqli_query( $conexion , $consultaCoreeo );
$_filas_ = mysqli_num_rows( $resultado_Correo );


//$insertar_fecha_v = "SELECT DATE_ADD('2018-01-01', INTERVAL $parametro_fecha DAY);"



    #select ID_USUARIO
   // $consulta_id="SELECT ID_USUARIO FROM tbl_ms_usuario WHERE Usuario='$usuario'";
    //$resultado_id= mysqli_query( $conexion , $consulta_id );
    //$filas_id = mysqli_num_rows( $resultado_id );

    #Confirmar contraseña
    $conformarContra = $_POST[ 'password1' ];


    if($filas_ ){
        echo '<script>alert("Nombre de usuario ya existente");</script>';
         include('../Login/autoRegistro.php');
    }elseif($contrasena!=$conformarContra){
        echo '<script>alert("Contraseñas no coinciden");</script>';
        include('../Login/autoRegistro.php');
    }elseif($_filas_){?>
        <script> 
           alert("Correo Electronico ya existente");
           location.href= "../Login/autoRegistro.php";
        </SCRipt>
        <?php
    }else{
        $contrasenaA = $contrasena;
        $insertar="INSERT INTO tbl_ms_usuario VALUES('$filas','$usuario','$nombre','INACTIVO','$contrasenaA','$fechaC','0','0','$fechaC','$correo','$usuario','$fechaC','$usuario','$fechaC','2')";
       //$bitacora="INSERT INTO tbl_bitacora VALUES('$filas','$fechaC','$filas','$filas','AUTOREGISTRO','AUTOREGISTRO DE USUARIO DESDE EL LOGIN')";

        mysqli_query( $conexion , $insertar );
        //mysqli_query( $conexion , $bitacora );
        echo '<script>alert("Usuario Creado satisfactoriamente");</script>';
        include('../Login/preguntasPrimeraVez.php');
    }
    mysqli_close($conexion);

?>
        