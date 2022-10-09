<?php
include('db.php');
$contraseñaNueva = $_POST[ 'password_' ];
$contraseñaAntigua = $_POST[ 'password' ];
$contraseñaNueva_ = $_POST[ 'password__' ];
session_start();
$usuario_ =  $_SESSION['nombre'];

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
    $actualizarEstado = "UPDATE tbl_ms_usuario SET Estado_Usuario = 'ACTIVO' WHERE Usuario='$usuario_'";
    mysqli_query( $conexion , $actualizarContra );
    mysqli_query( $conexion , $actualizarEstado );

    echo '<script>alert("CONTRASEÑA CAMBIADA CON EXITO");</script>';
    include('../login.html');
   }else{
   echo '<script>alert("Contraseñas no coinciden");</script>';
   session_abort();
   include('../cambiar_contrasena.html');
}


?>