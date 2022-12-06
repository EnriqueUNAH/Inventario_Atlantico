<?php
//fetch.php
$connect = mysqli_connect("localhost", "root", "123456", "inversionesatlantico");
$columns = array('COD_CLIENTE','NOMBRE_COMPLETO', 'RTN', 'TELEFONO', 'CORREO_ELECTRONICO','DIRECCION','ESTADO');

$query = "SELECT * FROM tbl_cliente";


if(isset($_POST["search"]["value"]))
{
 $query .= '
 WHERE COD_CLIENTE LIKE "%'.$_POST["search"]["value"].'%" 
 OR NOMBRE_COMPLETO LIKE "%'.$_POST["search"]["value"].'%" 
 OR RTN LIKE "%'.$_POST["search"]["value"].'%" 
 OR TELEFONO LIKE "%'.$_POST["search"]["value"].'%" 
 OR CORREO_ELECTRONICO LIKE "%'.$_POST["search"]["value"].'%" 
 OR DIRECCION LIKE "%'.$_POST["search"]["value"].'%" 
 OR ESTADO LIKE "%'.$_POST["search"]["value"].'%" 
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
 $sub_array[] = '<div contenteditable class="update" data-id="'.$row["NOMBRE_COMPLETO"].'"'. $CON .' data-column="NOMBRE_COMPLETO">' . $row["NOMBRE_COMPLETO"] . '</div>';
 $sub_array[] = '<div contenteditable class="update" data-id="'.$row["RTN"].'"'. $CON .' data-column="RTN">' . $row["RTN"] . '</div>';
 $sub_array[] = '<div contenteditable class="update" data-id="'.$row["TELEFONO"].'"'. $CON .' data-column="TELEFONO">' . $row["TELEFONO"] . '</div>';
 $sub_array[] = '<div contenteditable class="update" data-id="'.$row["CORREO_ELECTRONICO"].'"'. $CON .' data-column="CORREO_ELECTRONICO">' . $row["CORREO_ELECTRONICO"] . '</div>';
 $sub_array[] = '<div contenteditable class="update" data-id="'.$row["DIRECCION"].'"'. $CON .' data-column="DIRECCION">' . $row["DIRECCION"] . '</div>';
 $sub_array[] = '<button type="button" name="delete" class="btn btn-danger btn-xs delete" id="'.$row["COD_CLIENTE"].'">BORRAR</button>';
 $data[] = $sub_array;
}

function get_all_data($connect)
{
 $query = "SELECT * FROM tbl_cliente";
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