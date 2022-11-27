<?php
//fetch.php
$connect = mysqli_connect("localhost", "root", "123456", "inversionesatlantico");
$columns = array('ID_OBJETO','NOMBRE_USUARIO','OBJETO','ACCION','DESCRIPCION');

$query = "SELECT * FROM  tbl_bitacora bi inner join  tbl_ms_objetos ob on ob.ID_OBJETO=bi.ID_OBJETO inner join tbl_ms_usuario us on bi.ID_USUARIO=us.ID_USUARIO";


if(isset($_POST["search"]["value"]))
{
 $query .= '
 WHERE ob.OBJETO LIKE "%'.$_POST["search"]["value"].'%" 
 OR us.NOMBRE_USUARIO LIKE "%'.$_POST["search"]["value"].'%" 
 OR ob.ID_OBJETO LIKE "%'.$_POST["search"]["value"].'%" 
 OR bi.ACCION LIKE "%'.$_POST["search"]["value"].'%" 
 OR bi.DESCRIPCION LIKE "%'.$_POST["search"]["value"].'%" 
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
 $sub_array[] = '<div data-id="'.$row["NOMBRE_USUARIO"].'"'. $CON .' data-column="NOMBRE_USUARIO">' . $row["NOMBRE_USUARIO"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["OBJETO"].'"'. $CON .' data-column="OBJETO">' . $row["OBJETO"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["ACCION"].'"'. $CON .' data-column="ACCION">' . $row["ACCION"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["DESCRIPCION"].'"'. $CON .' data-column="DESCRIPCION">' . $row["DESCRIPCION"] . '</div>';
 $data[] = $sub_array;
 $draw[]= $sub_array;
}

function get_all_data($connect)
{
 $query = "SELECT * FROM  tbl_bitacora bi inner join  tbl_ms_objetos ob on ob.ID_OBJETO=bi.ID_OBJETO inner join tbl_ms_usuario us on bi.ID_USUARIO=us.ID_USUARIO";
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