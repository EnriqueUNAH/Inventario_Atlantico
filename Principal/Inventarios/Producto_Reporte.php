<?php
ob_start();


?>



<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INVERSIONES EL ATLANTICO</title>


    <link type="text/css" rel="shortcut icon" href="../img/logo-mywebsite-urian-viera.svg"/>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../css/cargando.css">
    <link rel="stylesheet" type="text/css" href="../css/maquinawrite.css">

    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- SCRIPTS JS-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="peticion.js"></script>
</head>
<body>
    <?php
include('../db2.php');

$sqlCliente   = ("SELECT * FROM tbl_PRODUCTO as p INNER JOIN tbl_TIPO_PRODUCTO as tp on p.COD_TIPO_PRODUCTO = tp.COD_TIPO_PRODUCTO");
$queryCliente = mysqli_query($conexion2, $sqlCliente);
$cantidad     = mysqli_num_rows($queryCliente);
?>

<table class="table table-bordered table-striped table-hover">
                        <thead>
                          <tr>
                            <th>NOMBRE PRODUCTO</th>
                            <th scope="col">DESCRIPCION</th>
                            <th scope="col">CANTIDAD MINIMA</th>
                            <th scope="col">CANTIDAD MAXIMA</th>
                            <th scope="col">TIPO DE PRODUCTO</th>
                            <th scope="col">PRECIO DE VENTA</th>

                          </tr>
                        </thead>
                        <tbody>
                          <?php
                              while ($dataCliente = mysqli_fetch_array($queryCliente)) { ?>
                          <tr>
                          <td><?php echo $dataCliente['Nombre_PRODUCTO']; ?></td>
                          <td><?php echo $dataCliente['DESCRIPCION']; ?></td>
                          <td><?php echo $dataCliente['CANTIDAD_MINIMA']; ?></td>
                          <td><?php echo $dataCliente['CANTIDAD_MAXIMA']; ?></td>
                          <td><?php echo $dataCliente['NOMBRE_TIPO_PRODUCTO']; ?></td>
                          <td><?php echo $dataCliente['PRECIO_VENTA']; ?></td>
                          </tr>

                        <?php } ?>
                
</table>
</body>
</html>


<?php
$html=ob_get_clean();
//echo($html);

require_once('../Libreria/dompdf/autoload.inc.php');
use Dompdf\Dompdf;
$dompdf = new Dompdf();

$options = $dompdf->getOptions();
$options->set(array('isRemoteEnabled' => true));
$dompdf->setOptions($options);


$dompdf->loadHtml($html);

$dompdf->setPaper('letter');
 
$dompdf->render();
$dompdf->stream("Productos.pdf", array("Attachment"=> true)); //descargar o no el pdf

?>