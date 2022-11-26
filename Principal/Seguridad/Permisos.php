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

        $sqlCliente   = ("SELECT * FROM  tbl_ms_roles as rol inner join tbl_ms_permisos as permiso on permiso.ID_ROL = rol.ID_ROL
                                                                    inner join tbl_ms_objetos as objeto on objeto.ID_OBJETO = permiso.ID_OBJETO");
        $queryCliente = mysqli_query($conexion2, $sqlCliente);
        $cantidad     = mysqli_num_rows($queryCliente);
    ?>

<div class="row text-center" style="background-color: #cecece">
</div>





<div class="row clearfix">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
  <div class="body">
      <div class="row clearfix">

      <div class="col-sm-12"><h2><b>PERMISOS</b></h2></div>
            <p></p>

   
         

          <div class="col-sm-20">
              <div class="row">
                <div class="col-md-12 p-2">


                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                          <tr>
                            <th> ROL</th>
                            <th> PANTALLA</th>
                            <th> PERMISO INSERCIÓN</th>
                            <th> PERMISO ELIMINACIÓN</th>
                            <th> PERMISO ACTUALIZACIÓN</th>
                            <th> PERMISO_CONSULTAR</th>
                            <th> ACCIONES</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                              while ($dataCliente = mysqli_fetch_array($queryCliente)) { ?>
                          <tr>
                          <td><?php echo $dataCliente['ROL']; ?></td>
                          <td><?php echo $dataCliente['OBJETO']; ?></td>
                            <td><?php echo $dataCliente['PERMISO_INSERCION']; ?></td>
                            <td><?php echo $dataCliente['PERMISO_ELIMINACION']; ?></td>
                            <td><?php echo $dataCliente['PERMISO_ACTUALIZACION']; ?></td>
                            <td><?php echo $dataCliente['PERMISO_CONSULTAR']; ?></td>
                            
                          <td> 
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editPermiso<?php echo $dataCliente['ID_ROL']?>">
                                  Cambiar Permisos
                              </button>
                          </td>
                          </tr>
                                                               
                             <!--Ventana Modal para Actualizar--->
                                <?php  include('Permiso_Modal_Editar.php'); ?>


                            


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

        var dataString = 'ID_ROL='+ id;
        url = "Objetos_recib_Delete.php";
            $.ajax({
                type: "POST",
                url: url,
                data: dataString,
                success: function(data)
                {
                  window.location.href="Permisos.php";
                  $('#respuesta').html(data);
                }
            });
    return false;

    });


});
</script>












</script>

    </main>
    
	</body>
</html>

<?php include("../footer.php")?>