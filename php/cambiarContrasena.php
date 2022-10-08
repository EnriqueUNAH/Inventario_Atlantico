<?php
include('db.php');
$contraseñaNueva = $_POST[ 'password_' ];
$contraseñaAntigua = $_POST[ 'password' ];
$contraseñaNueva_ = $_POST[ 'password__' ];

   # Consulto si existe el Password
$consulta="SELECT Contrasena FROM tbl_ms_usuario where Contrasena = '$contraseñaAntigua'";
$resultado= mysqli_query( $conexion , $consulta );
$filas = mysqli_num_rows( $resultado );

 if ($filas) {
    # code...
    
    $actualizarContra = "UPDATE tbl_ms_usuario SET contrasena = '$contraseñaNueva' WHERE Contrasena='$contraseñaAntigua'";
    mysqli_query( $conexion , $actualizarContra );
    echo '<script>alert("CONTRASEÑA CAMBIADA CON EXITO");</script>';
    
}

include('../login.html');

?>