<?php

session_start();
$usuario =$_SESSION['nombre'];

include('../db2.php');
$id_usuario = $_POST['ID_USUARIO'];
$nombre_usuario = strtoupper($_POST['NOMBRE_USUARIO']);
$rol_tabla =strtoupper($_POST['ROL']);
$Estado = strtoupper($_POST['NOMBRE_ESTADO']);
$rol_tabla 	 = strtoupper($_POST['ROL']);
$Correo 	 = strtolower($_POST['CORREO_ELECTRONICO']);

$fechaC = date('Y-m-d');

   # Consulto Id de la tabla Estado
   $consulta_Parametro="SELECT ID_ESTADO FROM tbl_ms_estado where NOMBRE_ESTADO='$Estado'" ;
   $resultado_Parametro=mysqli_query( $conexion2 , $consulta_Parametro );
   while ($valor=mysqli_fetch_array( $resultado_Parametro )) {
        # code...
        $id_estado=$valor['ID_ESTADO'];
    }

  # Consulto Id rool de la tabla Estado
  $consulta_rol="SELECT ID_ROL FROM tbl_ms_roles where ROL='$rol_tabla'" ;
  $resultado_rol=mysqli_query( $conexion2 , $consulta_rol );
  while ($valor1=mysqli_fetch_array( $resultado_rol )) {
      # code...
      $id_rol=$valor1['ID_ROL'];
  }

$update = ("UPDATE tbl_ms_usuario 
	SET 
	NOMBRE_USUARIO  ='" .$nombre_usuario. "',
  	ID_ESTADO  ='" .$id_estado. "',
	ID_ROL  ='" .$id_rol. "',
	CORREO_ELECTRONICO ='" .$Correo. "',
	MODIFICADO_POR ='" .$usuario. "',
	FECHA_MODIFICACION ='" .$fechaC. "' 

WHERE ID_USUARIO='" .$id_usuario. "'
");
$result_update = mysqli_query($conexion2, $update);

try {
    // code
      #select ID_USUARIO
      $consulta_id="SELECT ID_USUARIO FROM tbl_ms_usuario WHERE ID_USUARIO='$id_usuario'";
      $resultado_id= mysqli_query( $conexion2 , $consulta_id );
      $filas_id = mysqli_num_rows( $resultado_id );

       #select ID_BITACORA
      $consulta_id_BIT="SELECT * FROM tbl_bitacora";
      $resultado_id_BIT= mysqli_query( $conexion2 , $consulta_id_BIT );
      $filas_id_BIT = mysqli_num_rows( $resultado_id_BIT );
      $filas_id_BIT++;

      $bitacora="INSERT INTO tbl_bitacora VALUES('$filas_id_BIT','$fechaC','$filas_id','2','EDITAR','ACTUALIZACION DE EMPLEADO DESDE MANTENIMIENTO USUARIO')";
      mysqli_query( $conexion2 , $bitacora);

      
   // $sql = "UPDATE tbl_ms_usuario SET  NOMBRE_USUARIO='$nombre', ID_ESTADO='$Estado_', CORREO_ELECTRONICO='$Correo', MODIFICADO_POR='$nombre' , FECHA_MODIFICACION='$fechaC', ID_ROL='$rool'  WHERE ID_USUARIO='$id'";   
    $sql = "UPDATE tbl_ms_usuario SET  NOMBRE_USUARIO='$nombre_usuario', ID_ESTADO='$id_estado', CORREO_ELECTRONICO='$Correo', MODIFICADO_POR='$nombre_usuario' , FECHA_MODIFICACION='$fechaC', ID_ROL='$id_rol'  WHERE ID_USUARIO='$id_usuario'";   
   
    mysqli_query($conexion2 , $sql);



  } catch (Exception $e) {
    // exception is raised and it'll be handled here
    $var = $e->getMessage();
    echo "<script type='text/javascript'>
        window.location='CrudUsuarios.php';
    </script>";     

  }
echo "<script type='text/javascript'>
        window.location='CrudUsuarios.php';
    </script>";     

?>