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
    <link rel="stylesheet" href="style.css" media="all" />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- SCRIPTS JS-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="peticion.js"></script>


    <link rel="stylesheet" href="./bs3.min.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <style>

#logo {

  margin:auto;
	text-align:center;
}
      h3 {

  text-align:center;
}


.container {

display: flex;
align-items: center;
justify-content: center;
}
    </style>


</head>
<body>
    <?php
    
          
include('../db2.php');

$sqlCliente   = ("SELECT * FROM tbl_proveedor");
$queryCliente = mysqli_query($conexion2, $sqlCliente);
$cantidad     = mysqli_num_rows($queryCliente);
?>
<?php
$fecha = date("d-m-y h:i:s A");
date_default_timezone_set('America/El_Salvador');
$remitente = $_SESSION['nombre'];
?>

<header>
<div>
      <div >
            <img src="../logo.png">
            <p></p>
        </div>
        <div >REPORTE A:</div>
          <h4 ><?php echo $_SESSION['nombre'] ?></h4>
        </div>
      <div >
        <h2 class="center">INVERSIONES DEL ATLANTICO</h2>
      </div>
      <div>Bo. El Centro, Domicilio Rentado, Atras de la Despensa Familiar, Tela, Atlantida, Honduras</div>
          <div>(504) 9970-58-87</div>
          <div><a href="mailto:company@example.com">uniformesdelatlanctico@hotmail.com</a></div>
       <div>
        </div>
      </div>
      </div>
    </header>
    <main>       
    
    <br>
            <h3 class="center">Lista de Proveedores</h3>

<table class="table table-striped table-hover">

                        <thead>
                          <tr>
                            <th scope="col">NOMBRE DEL REPRESENTANTE</th>
                            <th scope="col">NOMBRE DE LA EMPRESA</th>
                            <th scope="col">RTN</th>
                            <th scope="col">TELEFONO</th>
                            <th scope="col">DIRECCION</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                              while ($dataCliente = mysqli_fetch_array($queryCliente)) { ?>
                          <tr>
                            <td><?php echo $dataCliente['NOMBRE_REPRESENTANTE']; ?></td>
                            <td><?php echo $dataCliente['NOMBRE_EMPRESA']; ?></td>
                            <td><?php echo $dataCliente['RTN']; ?></td>
                            <td><?php echo $dataCliente['TELEFONO']; ?></td>
                            <td><?php echo $dataCliente['DIRECCION']; ?></td>

                          </tr>

                        <?php } ?>
                
</table>

        <div>
        </div>
        <div class="text-right">
          <br>
          <p></p>
            <strong>Fecha</strong>
            <br>
            <?php echo $fecha ?>
            <br>
    </div>

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

$dompdf->setPaper('A4');
 
$dompdf->render();
$dompdf->stream("Proveedores.pdf", array("Attachment"=> true)); //descargar o no el pdf

?>