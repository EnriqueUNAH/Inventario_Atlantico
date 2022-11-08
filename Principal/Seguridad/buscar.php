<?php
/////// CONEXIÓN A LA BASE DE DATOS /////////
$host = 'localhost';
$basededatos = 'inversionesatlantico';
$usuario = 'root';
$contraseña = '123456';

$conexion = new mysqli($host, $usuario,$contraseña, $basededatos);
if ($conexion -> connect_error)
{
	die("Fallo la conexion:(".$conexion -> mysqli_connect_errno().")".$conexion-> mysqli_connect_error());
}

//////////////// VALORES INICIALES ///////////////////////

$tabla="";
//$query="SELECT * FROM tbl_ms_usuario ORDER BY ID_USUARIO";
$query="SELECT * FROM tbl_ms_usuario u inner join tbl_ms_estado e on u.ID_ESTADO = e.ID_ESTADO ORDER BY ID_USUARIO";

///////// LO QUE OCURRE AL TECLEAR SOBRE EL INPUT DE BUSQUEDA ////////////
if(isset($_POST['data']))
{
	$q=$conexion->real_escape_string($_POST['data']);
	//$query="SELECT * FROM tbl_ms_usuario  WHERE 
	$query="SELECT * FROM tbl_ms_usuario u inner join tbl_ms_estado e on u.ID_ESTADO = e.ID_ESTADO where

		NOMBRE_USUARIO LIKE '%".$q."%' OR
		NOMBRE_ESTADO LIKE '%".$q."%' OR
		FECHA_ULTIMA_CONEXION LIKE '%".$q."%' OR
		PRIMER_INGRESO LIKE '%".$q."%' OR
		CORREO_ELECTRONICO LIKE '%".$q."%'";
}

$buscar=$conexion->query($query);
if ($buscar->num_rows > 0)
{
	$tabla.= 
	'<table class="table">
		<tr class="bg-primary">
			<td>Nombre USUARIO</td>
            <td>ESTADO</td>
			<td>ULTIMA CONEXIÓN</td>
			<td>INGRESOS</td>
			<td>CORREO ELECTRONICO</td>
			<td>ROL</td>
            <td>ACCIONES</td>
		</tr>';

	while($row= $buscar->fetch_assoc())
	{
		$tabla.=
		'<tr>
			<td id="nombre_usuario">'. $row['NOMBRE_USUARIO'] .'</td>
			<td id="NOMBRE_ESTADO" class=nr>' . $row['NOMBRE_ESTADO'] . '</td>
			<td>' . $row['FECHA_ULTIMA_CONEXION'] . '</td>
			<td>' . $row['PRIMER_INGRESO'] .'</td>
			<td>' . $row['CORREO_ELECTRONICO'] .'</td>
			<td>' . $row['ID_ROL'] .'</td>
            <td><a href="ActualizarUsuario.php" id="modificar" name="modificar" class="edit" title="Edit" data-toggle="tooltip"><i class=material-icons>&#xE254;</i></a><a href="BorrarUsuario.php" id="eliminar" name="eliminar" class="delete" title="Delete" data-toggle="tooltip"><i class=material-icons>&#xE872;</i></a></td>
		 </tr>
		';
	}

	$tabla.='</table>';
} else
	{
		$tabla="No se encontraron coincidencias con sus criterios de búsqueda.";
	}


echo $tabla;
?>