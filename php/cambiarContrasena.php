<?php
include('db.php');
$contraseñaNueva = $_POST[ 'password_' ];
$contraseñaAntigua = $_POST[ 'password' ];
$contraseñaNueva_ = $_POST[ 'password__' ];
session_start();
$usuario_ =  $_SESSION['nombre'];
$fechaC = date('Y-m-d');

    #select ID_USUARIO
    $consulta_id="SELECT ID_USUARIO FROM tbl_ms_usuario WHERE Usuario='$usuario_'";
    $resultado_id= mysqli_query( $conexion , $consulta_id );
    $filas_id = mysqli_num_rows( $resultado_id );

   # Consulto si existe el Password
$consulta="SELECT Contrasena FROM tbl_ms_usuario where Usuario='$usuario_'";
$resultado= mysqli_query( $conexion , $consulta );
while ($contra=mysqli_fetch_array( $resultado )) {
   # code...
   $contrasena=$contra['Contrasena'];
}
$filas = mysqli_num_rows( $resultado );

 if ($contrasena==$contraseñaAntigua and $contraseñaNueva==$contraseñaNueva_) {
    # code...    
    $actualizarContra = "UPDATE tbl_ms_usuario SET contrasena = '$contraseñaNueva' WHERE Usuario='$usuario_'";
    mysqli_query( $conexion , $actualizarContra );
    $actualizarEstado = "UPDATE tbl_ms_usuario SET Estado_Usuario = 'ACTIVO' WHERE Usuario='$usuario_'";
    mysqli_query( $conexion , $actualizarEstado );
   // $bitacora="INSERT INTO tbl_bitacora VALUES('$filas','$fechaC','$filas_id','$filas_id','cambiar contraseña','CAMBIO DE CONTRASEÑA')";
   // mysqli_query( $conexion , $bitacora );
   // $bitacora2="INSERT INTO tbl_bitacora VALUES('$filas','$fechaC','$filas_id','$filas_id','ESTADO','CAMBIO DE ESTADO')";
    //mysqli_query( $conexion , $bitacora2 );

    echo '<script>alert("CONTRASEÑA CAMBIADA CON EXITO");</script>';
    include('../Login/index.php');
   }else{
   echo '<script>alert("Contraseñas no coinciden");</script>';
   session_abort();
   include('../Login/cambiar_contrasena.php');
}


?>