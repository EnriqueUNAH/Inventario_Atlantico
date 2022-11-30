<?php include("../cabecera3.php") ?>
<?php include('../sidebar.php');?>

<?php // Incluir db2 file   
     require_once "../db2.php";
?>



<!DOCTYPE html>
<html lang="es">
	<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
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

    <style> 
        table tr th{
            background:rgba(0, 0, 0, .6);
            color: black;
        }
        tbody tr{
          font-size: 12px !important;

        }
        h3{
            color:crimson; 
            margin-top: 100px;
        }
        a:hover{
            cursor: pointer;
            color: #333 !important;
        }
      </style>

      
	</head>
  
	<body>



<?php

$sqlCliente   = ("SELECT * FROM  tbl_producto p inner join tbl_produccion tp  on tp.cod_producto = p.COD_PRODUCTO");
$queryCliente = mysqli_query($conexion2, $sqlCliente);
$cantidad     = mysqli_num_rows($queryCliente);

?>

    <main id="main" class="main">


<div class="row text-center" style="background-color: #cecece">
</div>

<div class="row clearfix">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
  <div class="body">
      <div class="row clearfix">
        <br><br> <br><br>



                 <div>
                       <button type="submit" onclick="window.location='Producto_Producir.php'" class="btn btn-primary">INGRESAR NUEVA PRODUCCIÓN</button> 
                       <button type="button" onclick="window.location='ReporteProduccion.php'" class="btn btn-warning">GENERAR PDF</button>
                </div> 


                <div>
                    <p></p>
                </div> 
                <div class="col-sm-7"><h4><b>LISTA DE PRODUCTOS EN PRODUCCIÓN</b></h4></div>
         

          <div class="col-sm-15">
              <div class="row">
                <div class="col-md-9 p-2">

              
                
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                          <tr>
                            
                            <th class="col-sm-4"> FECHA</th>
                            <th class="col-sm-4"> USUARIO</th>
                            <th class="col-sm-4"> PRODUCTO</th>
                            <th class="col-sm-4"> CANTIDAD PRODUCIENDO</th>
                            <th class="col-sm-4"> ESTADO</th>
                      
                            <th> ACCIÓN</th>
                            
                          </tr>
                        </thead>
                      
                          <?php
                              while ($dataCliente = mysqli_fetch_array($queryCliente)) { ?>
                          <tr>
                            
                            <td><?php echo $dataCliente['FECHA']; ?></td>
                            <td><?php echo $dataCliente['NOMBRE_USUARIO']; ?></td>
                            <td><?php echo $dataCliente['Nombre_PRODUCTO']; ?></td>
                            <td><?php echo $dataCliente['CANTIDAD_PRODUCIENDO']; ?></td>
                            <td><?php echo $dataCliente['ESTADO']; ?></td>
                            
                            <td> 


                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editChildresn<?php echo $dataCliente['COD_PRODUCCION']; ?>">
                                  Ver Detalles
                              </button>




                          </td>
                             
                          </tr>   
                          
                          

                          <!--Ventana Modal para --->
                          <?php include('Produccion_Modal.php'); ?>



                        <?php } ?>
  
                        <tr>


                        </tr> 


                    </table>
                    
                </div>


              </div>
          </div>
          </div>
      </div>
  </div>
</div>





<script src="../js/jquery.min.js"></script>
<script src="../js/popper.min.js"></script>
<script src="../js/bootstrap.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {

        $(window).load(function() {
            $(".cargando").fadeOut(1000);
        });

//Ocultar mensaje
    setTimeout(function () {
        $("#contenMsjs").fadeOut(1000);
    }, 3000);



    $('.btnBorrar').click(function(e){
        e.preventDefault();
        var id = $(this).attr("id");

        var dataString = 'COD_PRODUCTO='+ id;
        url = "Producto_recib_Delete.php";
            $.ajax({
                type: "POST",
                url: url,
                data: dataString,
                success: function(data)
                {
                  window.location.href="CrudProducto.php";
                  $('#respuesta').html(data);
                }
            });
    return false;

    });


});
</script>

    </main>
    
	</body>
</html>

<?php include('../footer.php') ?>


