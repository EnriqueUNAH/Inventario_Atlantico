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
$query="SELECT * FROM tbl_ms_usuario ORDER BY ID_USUARIO";

///////// LO QUE OCURRE AL TECLEAR SOBRE EL INPUT DE BUSQUEDA ////////////
if(isset($_POST['alumnos']))
{
	$q=$conexion->real_escape_string($_POST['alumnos']);
	$query="SELECT * FROM tbl_ms_usuario WHERE 
		NOMBRE_USUARIO LIKE '%".$q."%' OR
		ESTADO_USUARIO LIKE '%".$q."%' OR
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
            <td>ACCIONES</td>
		</tr>';

	while($filas= $buscar->fetch_assoc())
	{
		$tabla.=
		'<tr>
			<td>'.$filas['NOMBRE_USUARIO'].'</td>
			<td>'.$filas['ESTADO_USUARIO'].'</td>
			<td>'.$filas['FECHA_ULTIMA_CONEXION'].'</td>
			<td>'.$filas['PRIMER_INGRESO'].'</td>
			<td>'.$filas['CORREO_ELECTRONICO'].'</td>
            <td><a href="ActualizarUsuario.php" class="edit" title="Edit" data-toggle="tooltip"><i class=material-icons>&#xE254;</i></a><a href="BorrarUsuario.php" class="delete" title="Delete" data-toggle="tooltip"><i class=material-icons>&#xE872;</i></a></td>
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