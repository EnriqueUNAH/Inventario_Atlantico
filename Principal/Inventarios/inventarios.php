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

$query="SELECT * FROM tbl_producto as p inner join  tbl_inventario as i on p.COD_PRODUCTO=i.COD_PRODUCTO inner join tbl_tipo_inventario as ti  on ti.COD_TIPO_INVENTARIO=i.COD_TIPO_INVENTARIO order by FECHA DESC";
  

///////// LO QUE OCURRE AL TECLEAR SOBRE EL INPUT DE BUSQUEDA ////////////
if(isset($_POST['data']))
{
	$q=$conexion->real_escape_string($_POST['data']);

    $query="SELECT * FROM tbl_producto as p inner join  tbl_inventario as i on p.COD_PRODUCTO=i.COD_PRODUCTO inner join tbl_tipo_inventario as ti  on ti.COD_TIPO_INVENTARIO=i.COD_TIPO_INVENTARIO order by FECHA DESC
    WHERE 
    NOMBRE_USUARIO LIKE '".$q."";
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