<?php
$usuario = strtoupper($_POST[ 'username' ]);
$contraseña = $_POST[ 'password' ];
$id=0;
$intento_de_parametro=0;
$fechaC = date('Y-m-d');
session_start();
$_SESSION['nombre'] = $usuario;
$_SESSION['nombre_'] = $_POST['username'];
include( 'db.php' );

 # Consulto si existe el usuario
$consulta="SELECT * FROM tbl_ms_usuario where Usuario = '$usuario' and Contrasena = '$contraseña'";
$resultado= mysqli_query( $conexion , $consulta );
$filas = mysqli_num_rows( $resultado );

#Consulta contraseña
$consulta_contra="SELECT Contrasena FROM tbl_ms_usuario where Usuario = '$usuario'";
$resultado_contra=mysqli_query( $conexion , $consulta_contra );
while ($contra=mysqli_fetch_array( $resultado_contra )) {
     # code...
     $contrasena=$contra['Contrasena'];
 }

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

     #select ID_BITACORA
     $consulta_id_BIT="SELECT * FROM tbl_bitacora";
     $resultado_id_BIT= mysqli_query( $conexion , $consulta_id_BIT );
     $filas_id_BIT = mysqli_num_rows( $resultado_id_BIT );
     $filas_id_BIT++;

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

#    Consulta primer ingreso
$primeringreso="SELECT Primer_Ingreso FROM tbl_ms_usuario where Usuario = '$usuario'";
$resultado_primer=mysqli_query( $conexion , $primeringreso );
while ($primerI=mysqli_fetch_array( $resultado_primer )) {
     # code...
     $primer=$primerI['Primer_Ingreso'];
 }

 #   Decision ingreso
if ($estado=="NUEVO" and $contraseña==$contrasena){     
     include('../Login/preguntasPrimeraVez.php');  
}elseif($estado=="RESETEO" and $contraseña==$contrasena){
     include('../Login/cambiar_contrasena.php');
}elseif($estado=="ACTIVO" and $contraseña==$contrasena){
     $primer_ = $primer + 1;
     $actualizarPrimer = "UPDATE tbl_ms_usuario SET Primer_Ingreso = '$primer_' WHERE Id_Usuario = $id";
     mysqli_query( $conexion , $actualizarPrimer);
     $bitacora3="INSERT INTO tbl_bitacora VALUES('$filas_id_BIT','$fechaC','$id','$id','INGRESO AL SISTEMA','INGRESO A LA PANTALLA PRINCIPAL DESDE LOGIN')";
     mysqli_query( $conexion , $bitacora3 );
     include('../Principal/principal.php');
}else{
     echo '<script>alert("USUARIO O CLAVE INCORRECTA");</script>';
     $intento_de_parametro++;
     $actualizarValor_Parametro = "UPDATE tbl_ms_parametros SET valor = $intento_de_parametro WHERE Id_Usuario = $id";
     mysqli_query( $conexion , $actualizarValor_Parametro );
     $bitacora="INSERT INTO tbl_bitacora VALUES('$filas_id_BIT','$fechaC','$id','$id','INTENTOS LOGIN','REGISTRO POR INTENTOS DE INGRESAR AL SISTEMA DESDE EL INDEX')";
     mysqli_query( $conexion , $bitacora );
     include('../Login/index.php');
}


     # code...
if ($intento_de_parametro==3 and $usuario<>"ADMIN") {
     # code...
     echo '<script>alert("SU USUARIO ESTA BLOQUEADO LLAME AL ADMINISTRADOR");</script>';
     $Actualizar_parametro="UPDATE tbl_ms_parametros SET valor = '3' WHERE Id_Usuario = $id";
     mysqli_query( $conexion , $Actualizar_parametro );
     $actualizarEstado_ = "UPDATE tbl_ms_usuario SET Estado_Usuario = 'BLOQUEADO' WHERE Id_Usuario = $id";
     mysqli_query( $conexion , $actualizarEstado_ );
     $bitacora2="INSERT INTO tbl_bitacora VALUES('$filas_id_BIT','$fechaC','$id','$id','INTENTOS LOGIN','REGISTRO DE BLOQUEO POR INTENTOS DE INGRESAR AL SISTEMA DESDE EL INDEX')";
     mysqli_query( $conexion , $bitacora2 );
     include('../Login/index.php');
}

mysqli_free_result($resultado);
mysqli_free_result($resultado_Estado);
mysqli_free_result($resultado_Id);
mysqli_close($conexion);

?>