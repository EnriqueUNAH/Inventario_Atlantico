<?php
// Include config file
require_once "../db2.php";
$Estado = $_POST["Estado"];
$rol_ = $_POST["Rol"];

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

if(isset($_POST["Id_Estado"]) && !empty($_POST["Id_Estado"])){
  // Get hidden input value
  $Estado = $_POST["Id_Estado"];
}  

if(isset($_POST["Rol"]) && !empty($_POST["Rol"])){
    // Get hidden input value
    $Rol = $_POST["Rol"];
}
 
    
if(isset($_POST["Correo"]) && !empty($_POST["Correo"])){
    // Get hidden input value
    $Correo = $_POST["Correo"];
}


   # Consulto Id de la tabla Estado
   $consulta_Parametro="SELECT ID_ESTADO FROM tbl_ms_estado where NOMBRE_ESTADO='$Estado'" ;
   $resultado_Parametro=mysqli_query( $conexion2 , $consulta_Parametro );
   while ($valor=mysqli_fetch_array( $resultado_Parametro )) {
        # code...
        $Estado_=$valor['ID_ESTADO'];
    }

  # Consulto Id rool de la tabla Estado
  $consulta_rol="SELECT ID_ROL FROM tbl_ms_roles where ROL='$rol_'" ;
  $resultado_rol=mysqli_query( $conexion2 , $consulta_rol );
  while ($valor1=mysqli_fetch_array( $resultado_rol )) {
      # code...
      $rool=$valor1['ID_ROL'];
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

      $bitacora="INSERT INTO tbl_bitacora VALUES('$filas_id_BIT','$fechaC','$filas_id','2','EDITAR','ACTUALIZACION DE EMPLEADO DESDE MANTENIMIENTO USUARIO')";
      mysqli_query( $conexion2 , $bitacora);

    $sql = "UPDATE tbl_ms_usuario SET  NOMBRE_USUARIO='$nombre', ID_ESTADO='$Estado_', CORREO_ELECTRONICO='$Correo', MODIFICADO_POR='$nombre' , FECHA_MODIFICACION='$fechaC', ID_ROL='$rool'  WHERE ID_USUARIO='$id'";   
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