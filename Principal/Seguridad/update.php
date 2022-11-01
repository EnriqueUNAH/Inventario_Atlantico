<?php
// Include config file
require_once "../db2.php";
 
// Definir variables
$nombre = $Rol = $Correo = "";
$id=0;
$fechaC = date('Y-m-d');
 
// procesando la data del submit

if(isset($_POST["Id"]) && !empty($_POST["Id"])){
    // Get hidden input value
    $id = $_POST["Id"];
}

if(isset($_POST["Usuario"]) && !empty($_POST["Usuario"])){
    // Get hidden input value
    $nombre = $_POST["Usuario"];
}
    
if(isset($_POST["Rol"]) && !empty($_POST["Rol"])){
    // Get hidden input value
    $Rol = $_POST["Rol"];
}
    
    
    
if(isset($_POST["Correo"]) && !empty($_POST["Correo"])){
    // Get hidden input value
    $Correo = $_POST["Correo"];
}

try {
    // code
      #select ID_USUARIO
      $consulta_id="SELECT ID_USUARIO FROM tbl_ms_usuario WHERE ID_USUARIO='$id'";
      $resultado_id= mysqli_query( $conexion2 , $consulta_id );
      $filas_id = mysqli_num_rows( $resultado_id );

       #select ID_BITACORA
      $consulta_id_BIT="SELECT * FROM tbl_bitacora";
      $resultado_id_BIT= mysqli_query( $conexion2 , $consulta_id_BIT );
      $filas_id_BIT = mysqli_num_rows( $resultado_id_BIT );
      $filas_id_BIT++;

      $bitacora="INSERT INTO tbl_bitacora VALUES('$filas_id_BIT','$fechaC','$filas_id','$filas_id','EDITAR','ACTUALIZACION DE EMPLEADO DESDE MANTENIMIENTO USUARIO')";
      mysqli_query( $conexion2 , $bitacora);
    $sql = "UPDATE tbl_ms_usuario SET NOMBRE_USUARIO='$nombre', CORREO_ELECTRONICO='$Correo', MODIFICADO_POR='$nombre' , FECHA_MODIFICACION='$fechaC' WHERE ID_USUARIO='$id'";
         
    mysqli_query($conexion2 , $sql);

    header('Location: Mantenimiento_Usuario.php');

  } catch (Exception $e) {
    // exception is raised and it'll be handled here
    $var = $e->getMessage();
    echo "<script> alert('".$var."'); </script>";
    header('Location: Mantenimiento_Usuario.php');
    die();
  }      

?>