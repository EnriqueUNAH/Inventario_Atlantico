

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
$query="SELECT * FROM tbl_PRODUCTO as p INNER JOIN tbl_TIPO_PRODUCTO as tp on p.COD_TIPO_PRODUCTO = tp.COD_TIPO_PRODUCTO";

///////// LO QUE OCURRE AL TECLEAR SOBRE EL INPUT DE BUSQUEDA ////////////
if(isset($_POST['data']))
{
	$q=$conexion->real_escape_string($_POST['data']);

	$query="SELECT * FROM tbl_PRODUCTO as p INNER JOIN tbl_TIPO_PRODUCTO as tp on p.COD_TIPO_PRODUCTO = tp.COD_TIPO_PRODUCTO where

		Nombre_PRODUCTO LIKE '%".$q."%' OR
		DESCRIPCION LIKE '%".$q."%' OR
		CANTIDAD_MINIMA LIKE '%".$q."%' OR
		CANTIDAD_MAXIMA LIKE '%".$q."%' OR
		NOMBRE_TIPO_PRODUCTO LIKE '%".$q."%' OR
		PRECIO_VENTA LIKE '%".$q."%'";
}

$buscar=$conexion->query($query);
if ($buscar->num_rows > 0)
{
	$tabla.= 
	'<table class="table">
		<tr class="bg-primary">
		<th> NOMBRE</th>
		<th> DESCRIPCIÓN</th>
		<th> CANTIDAD MÍNIMA</th>
		<th> CANTIDAD MÁXIMA</th>
		<th> TIPO DE PRODUCTO</th>
		<th> PRECIO DE VENTA</th>
            <td>ACCIONES</td>
		</tr>';

	while($row= $buscar->fetch_assoc())
	{
		$tabla.=
		'<tr>

			<td>' . $row['Nombre_PRODUCTO'] . '</td>
			<td>' . $row['DESCRIPCION'] .'</td>
			<td>' . $row['CANTIDAD_MINIMA'] . '</td>
			<td>' . $row['CANTIDAD_MAXIMA'] .'</td>
			<td>' . $row['NOMBRE_TIPO_PRODUCTO'] . '</td>
			<td>' . $row['PRECIO_VENTA'] .'</td>
	           <td>
			   		<a href="CrudProducto.php" id="modificar" name="modificar" class="edit" title="Edit" data-toggle="tooltip" ><i class=material-icons>&#xE254;</i></a>
			   		<a href="BorrarUsuario.php" id="eliminar" name="eliminar" class="delete" title="Delete" data-toggle="tooltip"><i class=material-icons>&#xE872;</i></a>
			   </td>
		
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