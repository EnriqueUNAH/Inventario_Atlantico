<?php
//fetch.php
$connect = mysqli_connect("localhost", "root", "123456", "inversionesatlantico");
$columns = array('COD_INVENTARIO','DESCRIPCION', 'CANTIDAD', 'FECHA','NOMBRE_EMPRESA');

$query = "SELECT * FROM tbl_inventario i inner join tbl_producto p on i.DESCRIPCION = p.Nombre_PRODUCTO inner join tbl_proveedor pr on p.COD_PROVEEDOR = pr.COD_PROVEEDOR";


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
 $sub_array[] = '<div data-id="'.$row["DESCRIPCION"].'"'. $CON .' data-column="DESCRIPCION">' . $row["DESCRIPCION"] . '</div>';
 if ($row["CANTIDAD"]>100) {
    # code...
    $sub_array[] = '<div data-id="'.$row["CANTIDAD"].'"'. $CON .' data-column="CANTIDAD">' . $row["CANTIDAD"] . '</div>';
    $sub_array[] = '<div style="background-color: green; color: green"; data-id="'.$row["COD_INVENTARIO"].'"'. $CON .' data-column="NOMBRE_EMPRESA">' . $row["COD_INVENTARIO"] . '</div>';

 } else {
    # code...
    $sub_array[] = '<div data-id="'.$row["CANTIDAD"].'"'. $CON .' data-column="CANTIDAD">' . $row["CANTIDAD"] . '</div>';
    $sub_array[] = '<div style="background-color:red; color: red"; data-id="'.$row["COD_INVENTARIO"].'"'. $CON .' data-column="NOMBRE_EMPRESA">' . $row["COD_INVENTARIO"] . '</div>';

 }
 
 
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