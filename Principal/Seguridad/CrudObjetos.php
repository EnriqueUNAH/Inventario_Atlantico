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
    <main id="main" class="main">
    <?php
        include('../db2.php');

        $sqlCliente   = ("SELECT * FROM tbl_ms_objetos e  ORDER BY ID_OBJETO");
        $queryCliente = mysqli_query($conexion2, $sqlCliente);
        $cantidad     = mysqli_num_rows($queryCliente);
    ?>

<div class="row text-center" style="background-color: #cecece">
</div>

<div class="row clearfix">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
  <div class="body">
      <div class="row clearfix">

      <div class="col-sm-12"><h2>Mantenimiento de <b>Objetos</b></h2></div>
            <p></p>
                <div class="col-sm-22">
                <button type="button" onclick="window.location='Objetos_Crear.php'" class="btn btn-primary">NUEVO</button>
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
                            <th>OBJETO</th>
                            <th scope="col">DESCRIPCION</th>
                            <th scope="col">TIPO OBJETO</th>
                            <th scope="col">CREADO POR</th>
                            <th scope="col">FECHA CREACI??N</th>

                          </tr>
                        </thead>
                        <tbody>
                          <?php
                              while ($dataCliente = mysqli_fetch_array($queryCliente)) { ?>
                          <tr>
                            <td><?php echo $dataCliente['OBJETO']; ?></td>
                            <td><?php echo $dataCliente['DESCRIPCION']; ?></td>
                            <td><?php echo $dataCliente['TIPO_OBJETO']; ?></td>
                            <td><?php echo $dataCliente['CREADO_POR']; ?></td>
                            <td><?php echo $dataCliente['FECHA_CREACION']; ?></td>
                            
                          <td> 
                          <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteOBJETO<?php echo $dataCliente['ID_OBJETO']; ?>">
                                  Eliminar
                              </button>
                            
                            
                              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editOBJETO<?php echo $dataCliente['ID_OBJETO']; ?>">
                                  Modificar
                              </button>
                          </td>
                          </tr>
                                                
                            <!--Ventana Modal para la Alerta de Eliminar--->
                            <?php include('Objetos_ModalEliminar.php'); ?>


                            <!--Ventana Modal para Actualizar--->
                            <?php  include('Objetos_ModalEditar.php'); ?>

                            


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

        var dataString = 'ID_OBJETO='+ id;
        url = "Objetos_recib_Delete.php";
            $.ajax({
                type: "POST",
                url: url,
                data: dataString,
                success: function(data)
                {
                  window.location.href="CrudObjetos.php";
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