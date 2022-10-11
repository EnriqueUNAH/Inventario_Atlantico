<?php
include('db2.php');
$contraseña = $_POST[ 'password_' ];
$confirma_contraseña = $_POST[ 'password__' ];
session_start();
$usuario=$_SESSION['nombre_reset'];
if ($contraseña==$confirma_contraseña) {
    # code...
    $actualizarContra = "UPDATE tbl_ms_usuario SET Contrasena = '$confirma_contraseña' WHERE Usuario='$usuario'";
    mysqli_query( $conexion2 , $actualizarContra );

    $actualizarEstado = "UPDATE tbl_ms_usuario SET Estado_Usuario = 'ACTIVO' WHERE Usuario='$usuario'";
    mysqli_query( $conexion2 , $actualizarEstado );

    echo '<script>alert("CONTRASEÑA CAMBIADA CON EXITO");</script>';
    include('login.html');
} else {
    # code...
    echo '<script>alert("Contraseña Invalida No coinciden");</script>';
    include('../cambiar_contrasena_reset.html');
} 

?>