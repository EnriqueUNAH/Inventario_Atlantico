<?php
$usuario = $_POST[ 'username' ] ;
$contraseña = $_POST[ 'password' ];
session_start();
$_SESSION[ 'usuario' ] = $usuario;
include( 'db.php' );
$consulta="SELECT * FROM tbl_ms_usuario where Usuario = '$usuario' and Contrasena = '$contraseña'";
$resultado= mysqli_query( $conexion , $consulta );

$filas = mysqli_num_rows( $resultado );
if ( $filas ) {
     ?>
     <?php
     include( "index.html" );
} else {
    ?>
     <?php
     include( "pages-login.html" );
}
mysqli_free_result($resultado);
mysqli_close($conexion);