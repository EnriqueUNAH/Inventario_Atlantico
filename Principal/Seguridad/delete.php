<?php
// Include config file
require_once "../db2.php";
 
// Define variables and initialize with empty values
$CodigoUsuario = "";
$fechaC = date('Y-m-d');
 
// Processing form data when form is submitted
try {
    // code
   
    if(isset($_POST["CodigoUsuario"]) ){
      // Get hidden input value
      $cod = $_POST["CodigoUsuario"];

                 #select ID_USUARIO
                 $consulta_id="SELECT ID_USUARIO FROM tbl_ms_usuario WHERE ID_USUARIO='$cod'";
                 $resultado_id= mysqli_query( $conexion2 , $consulta_id );
                 $filas_id = mysqli_num_rows( $resultado_id );
      
                  #select ID_BITACORA
                 $consulta_id_BIT="SELECT * FROM tbl_bitacora";
                 $resultado_id_BIT= mysqli_query( $conexion2 , $consulta_id_BIT );
                 $filas_id_BIT = mysqli_num_rows( $resultado_id_BIT );
                 $filas_id_BIT++;
      
                 $bitacora="INSERT INTO tbl_bitacora VALUES('$filas_id_BIT','$fechaC','$filas_id','$filas_id','ELIMINAR','ELIMINACION DE EMPLEADO DESDE MANTENIMIENTO USUARIO')";
                 mysqli_query( $conexion2 , $bitacora);
  
          $sql = "DELETE FROM tbl_ms_usuario WHERE ID_USUARIO = '$cod'";
  
          mysqli_query($conexion2 , $sql);



      }
      include("mantenimiento_usuario.php");
  } catch (Exception $e) {
    // exception is raised and it'll be handled here
    // $e->getMessage() contains the error message
    
    $var = $e->getMessage();
    echo "<script> alert('".$var."'); </script>";

    include("mantenimiento_usuario.php");
  }
?>