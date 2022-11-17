<?php
ob_start();


session_start();
$_SESSION['nombre'];
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


    <link rel="stylesheet" href="./bs3.min.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>
<body>
    <?php
include('../db2.php');

$sqlCliente   = ("SELECT * FROM tbl_ms_estado e inner join tbl_ms_usuario u on e.ID_ESTADO = u.ID_ESTADO inner join tbl_ms_roles r on u.ID_ROL =r.ID_ROL ORDER BY ID_USUARIO");
$queryCliente = mysqli_query($conexion2, $sqlCliente);
$cantidad     = mysqli_num_rows($queryCliente);
?>
<?php
$fecha = date("Y-m-d");
$remitente = $_SESSION['nombre'];
?>


<div class="container-fluid">
    <div class="row">
        <div class="col-xs-10 ">
            <h1>Lista de Usuarios</h1>
        </div>
        <div class="col-xs-2">
            <img class="img img-responsive" src="./parzibyte.jpg" alt="Logotipo">
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-xs-10">
            <h1 class="h6"><?php echo $remitente ?></h1>
        </div>
        <div class="col-xs-2 text-center">
            <strong>Fecha</strong>
            <br>
            <?php echo $fecha ?>
            <br>
    </div>
    <hr>
<p></p>
<p></p>

<table class="table table-bordered table-striped table-hover">
                        <thead>
                          <tr>
                            <th>NOMBRE USUARIO</th>
                            <th scope="col">ESTADO</th>
                            <th scope="col">ULTIMA CONEXIÓN</th>
                            <th scope="col">INGRESOS</th>
                            <th scope="col">CORREO ELECTRONICO</th>
                            <th scope="col">ROL</th>

                          </tr>
                        </thead>
                        <tbody>
                          <?php
                              while ($dataCliente = mysqli_fetch_array($queryCliente)) { ?>
                          <tr>
                            <td><?php echo $dataCliente['NOMBRE_USUARIO']; ?></td>
                            <td><?php echo $dataCliente['NOMBRE_ESTADO']; ?></td>
                            <td><?php echo $dataCliente['FECHA_ULTIMA_CONEXION']; ?></td>
                            <td><?php echo $dataCliente['PRIMER_INGRESO']; ?></td>
                            <td><?php echo $dataCliente['CORREO_ELECTRONICO']; ?></td>
                            <td><?php echo $dataCliente['ROL']; ?></td>
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
$dompdf->stream("Usuarios.pdf", array("Attachment"=> true)); //descargar o no el pdf

?>