
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

<div class="container-fluid">
     <div class="row justify-content-center mt-5 mb-5">
       <div class="col-md-6 d-lg-block col-md-8  col-sm-10  col-xl-6">
        <div  class="card ">
          <div class="card-header  ">
           <h3 class="fw-bold text-center py-3">Registrar Venta</h3>
          </div>
          <div class="card-body">
           <form  action="../../modelos/autoregistro_validar.php"  method="POST" class="formulario" id="formulario">  
           <div class="row">
             <div class="col-md-6 mb-3"><!--Campo del numero de identidad de la persona -->
                 <label  class="control-label mb-2">Número de Idendidad:</label> 
                  <div class="form-group">
                    <input type="text" name="dni" class="form-control" placeholder="Ej: 0801199908495" aria-label="dni" minlength="13" maxlength="13" required pattern="[0-9]{13,13}" onkeypress="return solonumero(event)" onblur="quitarespacios(this);" onkeydown="sinespacio(this);" onkeyup="noespacio(this, event)" autocomplete = "off">
                  </div>
                </div><!--Campo del numero de identidad de la persona -->
                <div class="col-md-6 mb-2"><!--INICIO 1er NOMBRE-->
                 <label  class="control-label mb-2">Nombre Cliente: </label> 
                  <div class="form-group">
                   <input type="text" name="nombre1" class="form-control"  onkeyup="mayus(this);" minlength="3" maxlength="20" onkeypress="return soloLetras(event);"  required onblur="quitarespacios(this);" onkeydown="sinespacio(this);" required="" autocomplete = "off"> 
                  </div>
                </div>
                <div class="col-md-6 mb-3"><!--INICIO 2er NOMBRE-->
                 <label  class="control-label mb-2">Seleccione Producto:</label> 
                  <div class="form-group">
                   <input type="text" name="nombre2" class="form-select"  onkeyup="mayus(this);" minlength="3" maxlength="20" onkeypress="return soloLetras(event);" autocomplete = "off"  > 
                  </div>
                </div>
                <div class="col-md-6 mb-3"><!--INICIO 1er APELLIDO-->
                 <label  class="control-label mb-2">Precio:</label> 
                  <div class="form-group">
                   <input type="text" name="apellido1" class="form-control"  aria-label="primer apellido" onkeyup="mayus(this);" minlength="3" maxlength="20" onkeypress="return soloLetras(event);"  required onblur="quitarespacios(this);" onkeydown="sinespacio(this);" required="" autocomplete = "off">
                  </div>
                </div>
                
             </div><!--FIN del primer row -->
             <div class="row"><!--Inicio del segundorow -->
             <div class="col-md-6 mb-3"><!--INICIO 2er APELLIDO-->
                 <label  class="control-label mb-2">Cantidad:</label> 
                  <div class="form-group">
                   <input type="text" name="apellido2" class="form-control"  aria-label="segundo apellido" onkeyup="mayus(this);" minlength="3" maxlength="20" onkeypress="return soloLetras(event);" autocomplete = "off"  >
                  </div>
                </div><!--Fin 2er APELLIDO-->
                <div class="col-md-6 mb-3"><!-- Inicio del campo fecha de nacimiento -->
                 <label  class="control-label mb-2">Sub Total:</label> 
                  <div class="form-group">
                   <input type="date" name="fechana" class="form-control"  aria-label="fecha nacimiento" max="<?php echo $fechana;?>"  min="1950-01-01">
                  </div>
                </div><!-- Fin del campo fecha de nacimiento -->
           
                <div class="col-md-6 mb-3"><!--Inicio del campo sexo-->
                <button type="button" class="btn btn-success">Agregar a la lista</button>
                </div><!--fin del campo sexo-->
              </div><!-- fin del tercer row -->
            
           </form>
         </div><!-- div de cierre del card -->
        </div>
       </div>
     </div>
   </div><!-- div de cierre del container(contenedor)-->
<p></p>

    <?php
        include('../db2.php');

        $sqlCliente   = ("SELECT * FROM tbl_ms_estado e inner join tbl_ms_usuario u on e.ID_ESTADO = u.ID_ESTADO inner join tbl_ms_roles r on u.ID_ROL =r.ID_ROL ORDER BY ID_USUARIO");
        $queryCliente = mysqli_query($conexion2, $sqlCliente);
        $cantidad     = mysqli_num_rows($queryCliente);
    ?>


<div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                          <tr>
                            <th>Codigo Venta</th>
                            <th scope="col">Producto</th>
                            <th scope="col">Cantidad</th>
                            <th scope="col">Subtotal</th>
                            <th scope="col">Impuesto</th>
                            <th scope="col">Descuento</th>
                            <th scope="col">Total</th>

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
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteChildresn<?php echo $dataCliente['ID_USUARIO']; ?>">
                            Eliminar
                        </button>
                          </tr>
                            


                        <?php } ?>
                
                    </table>
                </div>
                <button type="button" class="btn btn-primary">Vender</button>
   </main>
   </body>
</html>

<?php include("../footer.php")?>