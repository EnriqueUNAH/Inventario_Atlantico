<?php include('../cabecera.php') ?>
<?php 
	session_start();
  if ($_SESSION['nombre']=="ADMINISTRADOR") {
    # code...
    include('../sidebar.php');
    }else{
    # code...
    include('../sidebar2.php');
    }

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
    <main id="main" class="main">
    <?php



        include('../db2.php');

        $sqlCliente   = ("SELECT * FROM tbl_detalle_produccion as dp INNER JOIN tbl_produccion as pr on dp.COD_PRODUCCION = pr.COD_PRODUCCION");
        $queryCliente = mysqli_query($conexion2, $sqlCliente);
        $cantidad     = mysqli_num_rows($queryCliente);

       // $nombreProducto=$_POST['Nombre_PRODUCTO'];
       // $cantidadProducir=$_POST['cantidad_producir'];


    ?>
  
       <?php include('Detalle_Produccion_Registrar.php');  ?>

<div class="row text-center" style="background-color: #cecece">
</div>

<div class="row clearfix">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
  <div class="body">
      <div class="row clearfix">
        <br><br> <br><br>

            <p></p>
                <div class="col-sm-22">
                <button type="button" onclick="window.location='Producto_Crear.php'" class="btn btn-primary">REGISTRAR PRODUCCIÓN</button> 
              <!--  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#InsertChildresn">
                                  NUEVO
                              </button>   -->
           
            </div>
                <div>
                    <p></p>
                </div> 
                <div class="col-sm-7"><h4><b>LISTA DE INSUMOS PARA LA PRODUCCIÓN</b></h4></div>
         

          <div class="col-sm-20">
              <div class="row">
                <div class="col-md-12 p-2">


                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                          <tr>
                            
                            <th> INSUMO</th>
                            <th> CANTIDAD</th>

                          </tr>
                        </thead>
                        <tbody>
                          <?php
                              while ($dataCliente = mysqli_fetch_array($queryCliente)) { ?>
                          <tr>
                            <td><?php echo $dataCliente['descripcion']; ?></td>
                          
                           
                          <td> 
                          <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteProducto<?php echo $dataCliente['COD_PRODUCTO']; ?>">
                                  Eliminar
                              </button>
                            
                            
                              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editProducto<?php echo $dataCliente['COD_PRODUCTO']; ?>">
                                  Modificar
                              </button>
                          </td>
                          </tr>
                                                
                            <!--Ventana Modal para la Alerta de Eliminar--->
                            <?php include('Producto_Modal_Eliminar.php'); ?>


                            <!--Ventana Modal para Actualizar--->
                            <?php  include('Producto_Modal_Editar.php'); ?>

                            


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




<div id="InsertChildresn" class="modal fade"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #3d5a7c !important;">
        <h6 class="modal-title" style="color: #fff; text-align: center;">
            INSERTAR PRODUCTOS
        </h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>


      <form method="POST" action="Producto_create.php">
        <input type="hidden" name="id">

            <div class="modal-body" id="cont_modal">


                
        <div class="col-7">
       <br>
        <label for="yourName" class="form-label">NOMBRE DEL PRODUCTO</label>
        <input type="text" style="text-transform:uppercase" name="Nombre_PRODUCTO"  class="form-control" id="yourName" required><br>
        <div class="invalid-feedback">POR FAVOR, INGRESA EL NOMBRE DEL PRODUCTO!</div>

        
        <label for="yourName" class="form-label">DESCRIPCIÓN</label>
        <input type="text" style="text-transform:uppercase" name="DESCRIPCION"  class="form-control" id="yourName" required><br>
        <div class="invalid-feedback">POR FAVOR, INGRESA UNA DESCRIPCIÓN!</div>

        <label for="yourName" class="form-label">CANTIDAD MÍNIMA</label>
        <input type="number" style="text-transform:uppercase" name="CANTIDAD_MINIMA"  class="form-control" id="yourName" required>
        <div class="invalid-feedback">POR FAVOR, INGRESA UNA CANTIDAD!</div>
        <br>
        <label for="yourName" class="form-label">CANTIDAD MÁXIMA</label>
        <input type="number" style="text-transform:uppercase" name="CANTIDAD_MAXIMA"  class="form-control" id="yourName" required>
        <div class="invalid-feedback">POR FAVOR, INGRESA UNA CANTIDAD!</div>
        <br>
        <label for="yourName" class="form-label">SELECCIONE UN TIPO DE PRODUCTO:</label>
        <select name="NOMBRE_TIPO_PRODUCTO" class="form-control">
        <?php
              include("../db2.php");
              $ejecutar= mysqli_query( $conexion2 , "SELECT * FROM tbl_tipo_producto " );
              
          ?>
          <?php foreach ($ejecutar as $opciones): ?>
              <option value="<?php echo $opciones['NOMBRE_TIPO_PRODUCTO']?>"><?php echo $opciones['NOMBRE_TIPO_PRODUCTO'] ?></option>
          <?php endforeach ?>
          <?php ?>
                              
        </select>
        <div class="invalid-feedback">Tipo de Producto INVÁLIDO!</div>
      </div> 

      <br>
        <label for="yourName" class="form-label">PRECIO DE VENTA</label>
        <input type="number" style="text-transform:uppercase" name="PRECIO_VENTA"  class="form-control" id="yourName" required>
        <div class="invalid-feedback">POR FAVOR, INGRESA UN PRECIO DE VENTA!</div>



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