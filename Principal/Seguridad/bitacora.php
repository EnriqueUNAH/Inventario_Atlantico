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

$query="SELECT * FROM tbl_ms_objetos ob inner join  tbl_bitacora bi on bi.ID_OBJETO=ob.ID_OBJETO inner join tbl_ms_usuario us  on bi.ID_USUARIO=us.ID_USUARIO order by FECHA DESC";
  

///////// LO QUE OCURRE AL TECLEAR SOBRE EL INPUT DE BUSQUEDA ////////////
if(isset($_POST['data']))
{
	$q=$conexion->real_escape_string($_POST['data']);
	//$query="SELECT * FROM tbl_ms_usuario  WHERE 

    $query="SELECT * FROM tbl_ms_objetos ob inner join  tbl_bitacora bi on bi.ID_OBJETO=ob.ID_OBJETO inner join tbl_ms_usuario us  on bi.ID_USUARIO=us.ID_USUARIO order by FECHA DESC
    WHERE 
    NOMBRE_USUARIO LIKE '%".$q."%';
}

$buscar=$conexion->query($query);
if ($buscar->num_rows > 0)
{
	$tabla.= 
	'<table class="table">
		<tr class="bg-primary">
			<td>FECHA</td>
            <td>USUARIO</td>
			<td>PANTALLA</td>
			<td>ACCION</td>
			<td>DESCRIPCION</td>
		</tr>';

	while($row= $buscar->fetch_assoc())
	{
		$tabla.=
		'<tr>
			<td>'. $row['FECHA'] .'</td>
			<td>' . $row['NOMBRE_USUARIO'] . '</td>
			<td>' . $row['OBJETO'] . '</td>
			<td>' . $row['ACCION'] .'</td>
			<td>' . $row['DESCRIPCION'] .'</td>
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