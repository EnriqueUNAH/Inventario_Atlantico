<?php 

	require_once "../db2.php";

	$conexion=conexion();
	$id=$_POST['idjuego'];
	$sql="CALL sp_eliminar_datos('$id')";
	echo mysqli_query($conexion,$sql);
 ?>