<?php
//fetch.php
$connect = mysqli_connect("localhost", "root", "123456", "inversionesatlantico");
$columns = array('ID_PREGUNTA','PREGUNTA');

$query = "SELECT * FROM tbl_ms_preguntas";


if(isset($_POST["search"]["value"]))
{
 $query .= '
 WHERE ID_PREGUNTA LIKE "%'.$_POST["search"]["value"].'%" 
 OR PREGUNTA LIKE "%'.$_POST["search"]["value"].'%" 
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
 $sub_array[] = '<div contenteditable class="update" data-id="'.$row["PREGUNTA"].'"'. $CON .' data-column="PREGUNTA">' . $row["PREGUNTA"] . '</div>';
 $sub_array[] = '<button type="button" name="delete" class="btn btn-danger btn-xs delete" id="'.$row["ID_PREGUNTA"].'">BORRAR</button>';
 $data[] = $sub_array;
}

function get_all_data($connect)
{
 $query = "SELECT * FROM tbl_ms_preguntas";
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