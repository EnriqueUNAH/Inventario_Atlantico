<?php
//fetch.php
$connect = mysqli_connect("localhost", "root", "123456", "inversionesatlantico");
$columns = array('ID_USUARIO','NOMBRE_USUARIO', 'FECHA_ULTIMA_CONEXION', 'PRIMER_INGRESO','CORREO_ELECTRONICO','NONBRE_ESTADO', 'ROL');

$query = "SELECT * FROM tbl_ms_usuario u inner join tbl_ms_estado e on u.ID_ESTADO = e.ID_ESTADO inner join tbl_ms_roles r on u.ID_ROL =r.ID_ROL";


if(isset($_POST["search"]["value"]))
{
 $query .= '
 WHERE ID_USUARIO LIKE "%'.$_POST["search"]["value"].'%" 
 OR NOMBRE_USUARIO LIKE "%'.$_POST["search"]["value"].'%" 
 OR FECHA_ULTIMA_CONEXION LIKE "%'.$_POST["search"]["value"].'%" 
 OR PRIMER_INGRESO LIKE "%'.$_POST["search"]["value"].'%" 
 OR CORREO_ELECTRONICO LIKE "%'.$_POST["search"]["value"].'%" 
 ';
}




$number_filter_row = mysqli_num_rows(mysqli_query($connect, $query));

$result = mysqli_query($connect, $query);

$data = array();
$CON=0;
while($row = mysqli_fetch_array($result))
{
$CON=$CON+1;
 $sub_array = array();
 $sub_array[] = '<div contenteditable class="update" data-id="'.$row["NOMBRE_USUARIO"].'"'. $CON .' data-column="NOMBRE_USUARIO">' . $row["NOMBRE_USUARIO"] . '</div>';
 $sub_array[] = '<div contenteditable="FALSE" class="update" data-id="'.$row["FECHA_ULTIMA_CONEXION"].'"'. $CON .' data-column="FECHA_ULTIMA_CONEXION">' . $row["FECHA_ULTIMA_CONEXION"] . '</div>';
 $sub_array[] = '<div contenteditable="FALSE" class="update" data-id="'.$row["PRIMER_INGRESO"].'"'. $CON .' data-column="PRIMER_INGRESO">' . $row["PRIMER_INGRESO"] . '</div>';
 $sub_array[] = '<div contenteditable class="update" data-id="'.$row["CORREO_ELECTRONICO"].'"'. $CON .' data-column="CORREO_ELECTRONICO">' . $row["CORREO_ELECTRONICO"] . '</div>';
 $sub_array[] = '<div contenteditable class="update" data-id="'.$row["NOMBRE_ESTADO"].'"'. $CON .' data-column="NOMBRE_ESTADO">' . $row["NOMBRE_ESTADO"] . '</div>';
 $sub_array[] = '<div contenteditable class="update" data-id="'.$row["ROL"].'"'. $CON .' data-column="ROL">' . $row["ROL"] . '</div>';
 $sub_array[] = '<button type="button" name="delete" class="btn btn-danger btn-xs delete" id="'.$row["ID_USUARIO"].'">BORRAR</button>';
 $data[] = $sub_array;
}

function get_all_data($connect)
{
 $query = "SELECT * FROM tbl_ms_usuario";
 $result = mysqli_query($connect, $query);
 return mysqli_num_rows($result);
}

$output = array(
 "draw"    => intval($_POST["draw"]),
 "recordsTotal"  =>  get_all_data($connect),
 "recordsFiltered" => $number_filter_row,
 "data"    => $data
);

echo json_encode($output);

?>