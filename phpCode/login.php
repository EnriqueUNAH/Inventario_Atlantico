<?php
$usuario = strtoupper($_POST[ 'username' ]);
$contraseña = $_POST[ 'password' ];
$id=0;
$intento_de_parametro=0;
$fechaC = date('Y-m-d');
session_start();
$_SESSION[ 'usuario' ] = $usuario;
include( 'db.php' );

 # Consulto si existe el usuario
$consulta="SELECT * FROM tbl_ms_usuario where Usuario = '$usuario' and Contrasena = '$contraseña'";
$resultado= mysqli_query( $conexion , $consulta );
$filas = mysqli_num_rows( $resultado );

# Consulto el estado del usuario
$consulta_Estado="SELECT Estado_Usuario FROM tbl_ms_usuario where Usuario = '$usuario'";
$resultado_Estado=mysqli_query( $conexion , $consulta_Estado );
while ($otra=mysqli_fetch_array( $resultado_Estado )) {
     # code...
     $estado=$otra['Estado_Usuario'];
 }

 # Consulto el id Usuario
 $consulta_Id="SELECT Id_Usuario FROM tbl_ms_usuario where Usuario = '$usuario'";
 $resultado_Id=mysqli_query( $conexion , $consulta_Id);
 while ($otra_=mysqli_fetch_array( $resultado_Id )) {
     # code...
     $id=$otra_['Id_Usuario'];
 }

 $consulta_parametro="SELECT * FROM tbl_ms_parametros";
 $resultado_Id__=mysqli_query( $conexion , $consulta_parametro);
     $filas_=mysqli_num_rows( $resultado_Id__ );

 $consulta_valor_parametro="SELECT Valor FROM tbl_ms_parametros where Id_Usuario = '$id'";
 $resultado_Parametro_Intentos=mysqli_query( $conexion , $consulta_valor_parametro);
 while ($otra__=mysqli_fetch_array( $resultado_Parametro_Intentos )) {
     # code...
     $intento_de_parametro=$otra__['Valor'];
 }

 if ($intento_de_parametro==0) {
     # code...
     $filas_++;
     $insertar_parametro_intento="INSERT INTO tbl_ms_parametros VALUES('$filas_','ADMIN_INTENTOS_INVALIDOS','$intento_de_parametro','$id','$fechaC','$fechaC')";
     mysqli_query( $conexion , $insertar_parametro_intento);
}

     # code...
/*if ($estado<>"BLOQUEADO" and $filas==1 and $intento_de_parametro<3) {
     # code...
     $actualizarEstado = "UPDATE tbl_ms_usuario SET Estado_Usuario = 'ACTIVO' WHERE Id_Usuario = $id";
     mysqli_query( $conexion , $actualizarEstado );
     include('../index.html');
}else{
     echo '<script>alert("USUARIO O CLAVE INCORRECTA");</script>';
     $intento_de_parametro++;
     $actualizarValor_Parametro = "UPDATE tbl_ms_parametros SET valor = $intento_de_parametro WHERE Id_Usuario = $id";
     mysqli_query( $conexion , $actualizarValor_Parametro );
     include('../login.html');
}*/
if ($estado== "NUEVO"){
     include('../preguntasprueba.php');
}elseif($estado == "ACTIVO"){
     $actualizarEstado = "UPDATE tbl_ms_usuario SET Estado_Usuario = 'ACTIVO' WHERE Id_Usuario = $id";
     mysqli_query( $conexion , $actualizarEstado );
     include('../index.html');
}else{
     echo '<script>alert("USUARIO O CLAVE INCORRECTA");</script>';
     $intento_de_parametro++;
     $actualizarValor_Parametro = "UPDATE tbl_ms_parametros SET valor = $intento_de_parametro WHERE Id_Usuario = $id";
     mysqli_query( $conexion , $actualizarValor_Parametro );
     include('../login.html');
}


     # code...
if ($intento_de_parametro==3) {
     # code...
     echo '<script>alert("SU USUARIO ESTA BLOQUEADO LLAME AL ADMINISTRADOR");</script>';
     $Actualizar_parametro="UPDATE tbl_ms_parametros SET valor = '3' WHERE Id_Usuario = $id";
     mysqli_query( $conexion , $Actualizar_parametro );
     $actualizarEstado_ = "UPDATE tbl_ms_usuario SET Estado_Usuario = 'BLOQUEADO' WHERE Id_Usuario = $id";
     mysqli_query( $conexion , $actualizarEstado_ );
     include('../login.html');
}

mysqli_free_result($resultado);
mysqli_free_result($resultado_Estado);
mysqli_free_result($resultado_Id);
mysqli_close($conexion);

?>