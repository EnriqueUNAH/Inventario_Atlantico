<?php
      include('../Login/index.php');
      include('../db2.php');
      $Actualizar_parametro="UPDATE tbl_ms_parametros SET valor = '3' WHERE PARAMETRO='ADMIN_PREGUNTAS'";
      mysqli_query( $conexion , $Actualizar_parametro );
?>
