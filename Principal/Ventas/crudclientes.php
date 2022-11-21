<?php include('../cabecera.php') ?>
<?php include('../sidebar.php') ?>
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
     <ul class="navbar-nav mr-auto collapse navbar-collapse">
      <li class="nav-item active">
        <a href="crud_proveedores.php"> 
        </a>
    <main id="main" class="main">
    <?php
        include('../db2.php');

        $sqlCliente   = ("SELECT * FROM tbl_cliente");
        $queryCliente = mysqli_query($conexion2, $sqlCliente);
        $cantidad     = mysqli_num_rows($queryCliente);
    ?>

<div class="row text-center" style="background-color: #cecece">
</div>

<div class="row clearfix">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
  <div class="body">
      <div class="row clearfix">

      <div class="col-sm-12"><h2>DETALLE DE <b>CLIENTES</b></h2></div>
            <p></p>
                <div class="col-sm-22">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#InsertChildresn">
                                  NUEVO
                              </button>
                              <p></p>
                              <form action="buscar_cliente.php" method="get" class="form_search">
                              <input type="text" name="busqueda" id="busqueda" placeholder="Buscar">
                              <button type="submit" class="btn_search"><i class="fas fa-search"></i></button>
                            </form>
                </div>
                <div>
                    <p></p>
                </div> 

         

          <div class="col-sm-20">
              <div class="row">
                <div class="col-md-12 p-2">


                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                          <tr>
                            <th scope="col">DNI</th>
                            <th scope="col">NOMBRE</th>
                            <th scope="col">TELEFONO</th>
                            <th scope="col">CORREO ELECTONICO</th>
                            <th scope="col">DIRECCION</th>
                            <th scope="col">ACCIONES</th>

                          </tr>
                        </thead>
                        <tbody>
                          <?php
                              while ($dataCliente = mysqli_fetch_array($queryCliente)) { ?>
                          <tr>
                            <td><?php echo $dataCliente['NUMERO_DNI']; ?></td>
                            <td><?php echo $dataCliente['NOMBRE_COMPLETO']; ?></td>
                            <td><?php echo $dataCliente['TELEFONO']; ?></td>
                            <td><?php echo $dataCliente['CORREO_ELECTRONICO']; ?></td>
                            <td><?php echo $dataCliente['DIRECCION']; ?></td>
                            
                          <td> 
                          <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteChildresn<?php echo $dataCliente['COD_CLIENTE']; ?>">
                                  Eliminar
                              </button>
                            
                            
                              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editChildresn<?php echo $dataCliente['COD_CLIENTE']; ?>">
                                  Modificar
                              </button>
                          </td>
                          </tr>
                                                
                            <!--Ventana Modal para la Alerta de Eliminar--->
                            <?php include('ModalEliminarCliente.php'); ?>


                            <!--Ventana Modal para Actualizar--->
                            <?php  include('ModalEditarCliente.php'); ?>

                        <?php } ?>
                
                    </table>
                </div>


              </div>
          </div>
          </div>
      </div>
  </div>
</div>

<script src="../js/jquery.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>

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

        var dataString = 'COD_CLIENTE='+ id;
        url = "reciboborrado.php";
            $.ajax({
                type: "POST",
                url: url,
                data: dataString,
                success: function(data)
                {
                  window.location.href="crudclientes.php";
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
<div class="modal fade" id="InsertChildresn" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #3d5a7c !important;">
        <h6 class="modal-title" style="color: #fff; text-align: center;">
            INSERTAR INFORMACION
        </h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>


      <form method="POST" action="recibcliente.php">
        <input type="hidden" name="id">

            <div class="modal-body" id="cont_modal">

                <div class="form-group">
                  <label for="recipient-name" class="col-form-label">DNI:</label>
                  <input type="text" name="DNI" class="form-control" required="true">
                </div>
                <div class="form-group">
                  <label for="recipient-name" class="col-form-label">NOMBRE COMPLETO:</label>
                  <input type="text" name="primer" class="form-control" required="true">
                </div>

                <div class="form-group">
                  <label for="recipient-name" class="col-form-label">TELEFONO:</label>
                  <input type="text" name="telefono" class="form-control" required="true">
                </div>
                <div class="form-group">
                  <label for="email" class="form-label">CORREO ELECTONICO:</label>
                  <input type="email" class="form-control" name="correo" required='true'>
              </div>
                <div class="form-group">
                  <label for="recipient-name" class="col-form-label">DIRECCION:</label>
                  <input type="text" name="direccion" class="form-control" required="true">
                </div>
                <div class="form-group">
                      <label for="yourName" class="form-label">SELECCIONE GENERO:</label>
                      <select name="genero" class="form-control">
                      <?php
                            
                              # code...
                              include("../db2.php");
                              $consulta = "SELECT * FROM tbl_genero";
                            
                            $ejecutar= mysqli_query($conexion2,$consulta);
                        ?>
                      <option selected value=>--Seleccionar genero--</option>

                        <?php foreach ($ejecutar as $opciones): ?>
                            <option name="genero" value="<?php echo $opciones['NOMBRE_GENERO']?>"><?php echo $opciones['NOMBRE_GENERO'] ?></option>
                        <?php endforeach ?>
                        <?php ?>    
                                            
                      </select>
                      <div class="invalid-feedback">GENERO INVALIDO!</div>
                    </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">CERRAR</button>
              <button type="submit" class="btn btn-primary">GUARDAR DATOS</button>
            </div>
       </form>

    </div>
  </div>
</div>
<?php include("../footer.php")?>