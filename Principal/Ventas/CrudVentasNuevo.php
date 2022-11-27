
<?php include('../cabecera.php') ?>
<?php 
include('../sidebar.php');
?>
<?php include('config.php') ?>
<?php include('conexion.php') ?>


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
    <main id="main" class="main">
        
 <div class="container"></div>
    <?php
        $sentencia=$pdo->prepare("SELECT * FROM tbl_detalle_venta");
        $sentencia->execute();

        $listaproductos=$sentencia->fetchAll(PDO::FETCH_ASSOC);
        print_r($listaproductos);
    ?>

    <br>
    <div class="alert alert-succes">
        Pantalla de mensaje... 
        <a href="" class="badge">Ver lista</a>
    </div>
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
           
        <div class="col-md-6 mb-3"><!--INICIO 2er NOMBRE-->
            <label  class="control-label mb-2">Seleccione Producto:</label> 
            <div class="form-group">
            <select name="pregunta" class="form-control" id="_pregunta">
                      <?php
                            include("../db2.php");
                            $ejecutar= mysqli_query( $conexion2 , "SELECT * FROM tbl_producto " ); //WHERE ID_USUARIO = '$id_preguntas'
                            
                        ?>
                      <option selected disabled value="">--Seleccionar producto--</option>

                        <?php foreach ($ejecutar as $opciones): ?>
                            <option value="<?php echo $opciones['Nombre_PRODUCTO']?>"><?php echo $opciones['Nombre_PRODUCTO'] ?></option>
                        <?php endforeach ?>
                        <?php ?>
                                            
                      </select>
        </div>
        
        </div><!--Campo del numero de identidad de la persona -->
            <div class="col-md-6 mb-2"><!--INICIO 1er NOMBRE-->
            <label  class="control-label mb-2">Nombre Cliente: </label> 
            <div class="form-group">
                <input type="text" name="nombre_cliente" class="form-control"  onkeyup="mayus(this);" minlength="3" maxlength="20" onkeypress="return soloLetras(event);"  required onblur="quitarespacios(this);" onkeydown="sinespacio(this);" required="" autocomplete = "off"> 
            </div>
        </div>
           
        <div class="col-md-6 mb-3">
            <label for="yourName" class="form-label">PRECIO:</label>
            <input type="text" style="text-transform:uppercase" name="precio" placeholder="nombre" class="form-control" id="yourName" required>
        </div>
        <div class="col-md-6 mb-3">
            <label for="yourName" class="form-label">CANTIDAD:</label>
            <input type="text" style="text-transform:uppercase" name="cantidad" placeholder="cantidad" class="form-control" id="yourName" required>
        </div>
                
             </div><!--FIN del primer row -->
        <div class="row"><!--Inicio del segundorow -->    
        

        <div class="col-md-12">
            <label for="yourName" class="form-label">SUBTOTAL:</label>
            <input type="text" style="text-transform:uppercase" name="subtotal" placeholder="nombre" class="form-control" id="yourName" required>
        </div>

        <p></p>

        <form action="" mthod="post">
        <imput type="text" name="producto" id="producto">
        <imput type="text" name="precio" id="precio">
        <imput type="text" name="cantidad" id="cantidad">
        <imput type="text" name="total" id="subtotal">

            <button class="btn btn-success" 
                name="btnagg" 
                value="agregar" 
                type="submit">
                Agregar a la lista
            </button>
        </form>
        
            
           </form>
         </div><!-- div de cierre del card -->
        </div>
       </div>
     </div>
   </div><!-- div de cierre del container(contenedor)-->
    </main>
</body>
</html>

<?php include("../footer.php")?>