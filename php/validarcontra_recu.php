<?php
include('db.php');
session_start();
$usuario=$_SESSION['usuario'] ;

$contrasena=($_POST[ 'password' ]);
$contrasena_=($_POST[ 'password1' ]);
$fechaC = date('Y-m-d');

    $consulta="SELECT * FROM tbl_bitacora";
            
    $resultado= mysqli_query( $conexion , $consulta );
    $filas = mysqli_num_rows( $resultado );
    $filas=$filas+1;

    #select ID_USUARIO
    $consulta_id="SELECT ID_USUARIO FROM tbl_ms_usuario WHERE Usuario='$usuario'";
    $resultado_id= mysqli_query( $conexion , $consulta_id );
    $filas_id = mysqli_num_rows( $resultado_id );

    if ($contrasena==$contrasena_) {
        # code...
        $actualizarContra = "UPDATE tbl_ms_usuario SET Contrasena = '$contrasena_' WHERE Usuario='$usuario'";
        $actualizarEstado = "UPDATE tbl_ms_usuario SET ID_ESTADO = '2' WHERE Usuario='$usuario'";

        //$bitacora="INSERT INTO tbl_bitacora VALUES('$filas','$fechaC','$filas_id','$filas_id','VALIDACION DE CONTRASEÑA','VALIDAR CONTRASEÑA POR RECUPERACION')";

        mysqli_query( $conexion , $actualizarContra );
        mysqli_query( $conexion , $actualizarEstado );

       // mysqli_query( $conexion , $bitacora );

        echo '<script>alert("CONTRASEÑA CAMBIADA CON EXITO");</script>';
        include('../Login/index.php');
    } else {
        # code...
        echo '<script>alert("Contraseña Invalida No coinciden");</script>';
        include('../Login/cambiar_contrasena_recu.php');
    } 

?>