<?php
//fetch.php
$connect = mysqli_connect("localhost", "root", "123456", "inversionesatlantico");
$columns = array('COD_INVENTARIO','DESCRIPCION', 'CANTIDAD', 'FECHA','NOMBRE_EMPRESA');

$query = "SELECT * FROM tbl_inventario i inner join tbl_producto p on i.COD_PRODUCTO = p.COD_PRODUCTO inner join tbl_proveedor";


if(isset($_POST["search"]["value"]))
{
 $query .= '
 WHERE i.COD_INVENTARIO LIKE "%'.$_POST["search"]["value"].'%" 
 OR i.DESCRIPCION LIKE "%'.$_POST["search"]["value"].'%" 
 OR i.CANTIDAD LIKE "%'.$_POST["search"]["value"].'%" 
 OR NOMBRE_EMPRESA LIKE "%'.$_POST["search"]["value"].'%" 
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
 $sub_array[] = '<div data-id="'.$row["COD_INVENTARIO"].'"'. $CON .' data-column="COD_INVENTARIO">' . $row["COD_INVENTARIO"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["DESCRIPCION"].'"'. $CON .' data-column="DESCRIPCION">' . $row["DESCRIPCION"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["CANTIDAD"].'"'. $CON .' data-column="CANTIDAD">' . $row["CANTIDAD"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["FECHA"].'"'. $CON .' data-column="FECHA">' . $row["FECHA"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["NOMBRE_EMPRESA"].'"'. $CON .' data-column="NOMBRE_EMPRESA">' . $row["NOMBRE_EMPRESA"] . '</div>';
 $data[] = $sub_array;
}

function get_all_data($connect)
{
 $query = "SELECT * FROM tbl_inventario";
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