<?php
include('php/db.php');
session_start();
$usuario=$_SESSION['usuario'] ;

$contrasena=($_POST[ 'password_' ]);
$contrasena_=($_POST[ 'password__' ]);
    if ($contrasena==$contrasena_) {
        # code...
        $actualizarContra = "UPDATE tbl_ms_usuario SET Contrasena = '$contrasena_' WHERE Usuario='$usuario'";
        mysqli_query( $conexion , $actualizarContra );
    
        echo '<script>alert("CONTRASEÑA CAMBIADA CON EXITO");</script>';
        include('login.html');
    } else {
        # code...
        echo '<script>alert("Contraseña Invalida No coinciden");</script>';
        include('../cambiar_contrasena_recu.html');
    } 

?>