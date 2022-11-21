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

    

      
	</head>
  
	<body>
     <ul class="navbar-nav mr-auto collapse navbar-collapse">
      <li class="nav-item active">
        <a href="CrudUsuarios.php"> 
        </a>
    <main id="main" class="main">
    <?php
        include('../db2.php');

        $sqlCliente   = ("SELECT * FROM tbl_ms_estado e inner join tbl_ms_usuario u on e.ID_ESTADO = u.ID_ESTADO inner join tbl_ms_roles r on u.ID_ROL =r.ID_ROL ORDER BY ID_USUARIO");
        $queryCliente = mysqli_query($conexion2, $sqlCliente);
        $cantidad     = mysqli_num_rows($queryCliente);
    ?>

<div class="row text-center" style="background-color: #cecece">
</div>

<div class="row clearfix">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
  <div class="body">
      <div class="row clearfix">

      <div class="col-sm-12"><h2>Mantenimiento de <b>Usuarios</b></h2></div>
            <p></p>
                <div class="col-sm-22">
                <button type="button" onclick="window.location='CrearUsuario.php'" class="btn btn-primary">NUEVO</button>
                <button type="button" onclick="window.location='ReporteUsuarios.php'" class="btn btn-warning">GENERAR PDF</button>
                
                <p></p>
                
                <div class="search-box">
                                <input type="text" name="busqueda" id="busqueda" class="form-control" placeholder="Buscar&hellip;">
                            </div>
                        <div class="col-sm-20">
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
                            <th>NOMBRE USUARIO</th>
                            <th scope="col">ESTADO</th>
                            <th scope="col">ULTIMA CONEXIÓN</th>
                            <th scope="col">INGRESOS</th>
                            <th scope="col">CORREO ELECTRONICO</th>
                            <th scope="col">ROL</th>
                            <th scope="col">ACCIONES</th>

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

                            
                          <td> 
                          <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#deleteChildresn<?php echo $dataCliente['ID_USUARIO']; ?>">
                                  Eliminar
                              </button>
                            
                            
                              <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#editChildresn<?php echo $dataCliente['ID_USUARIO']; ?>">
                                  Modificar
                              </button>
                                

                              
                              <button href="" type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#vermasusuarios<?php echo $dataCliente['ID_USUARIO']; ?>">
                                  Ver Más
                              </button>
                          </td>
                          </tr>
                                                
                            <!--Ventana Modal para la Alerta de Eliminar--->
                            <?php include('ModalEliminar.php'); ?>


                            <!--Ventana Modal para Actualizar--->
                            <?php  include('ModalEditar.php'); ?>


                            


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

        var dataString = 'ID_USUARIO='+ id;
        url = "recib_Delete.php";
            $.ajax({
                type: "POST",
                url: url,
                data: dataString,
                success: function(data)
                {
                  window.location.href="CrudUsuarios.php";
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

<?php include("../footer.php")?>