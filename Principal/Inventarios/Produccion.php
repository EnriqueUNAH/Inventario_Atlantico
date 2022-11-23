<?php include("../cabecera2.php") ?>
<?php 
if ($_SESSION['nombre']=="ADMINISTRADOR") {
	# code...
	include('../sidebar.php');
  }else{
	# code...
	include('../sidebar2.php');
  }

?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>PRODUCTO A PRODUCIR</h1>
        </ol>
      </nav>
    </div><!-- End Page Title -->
<!-- Change Password Form -->

    <form action="CrudDetalleProduccion.php" method="post"  class="row g-3 needs-validation" novalidate="false">

    <div class="col-7">
       <br>

        <label for="yourName" class="form-label">SELECCIONE UN PRODUCTO:</label>
        <select name="Nombre_PRODUCTO" class="form-control">
        <?php
              include("../db2.php");
              $ejecutar= mysqli_query( $conexion2 , "SELECT * FROM tbl_producto where cod_tipo_producto=2" );
              
          ?>
          <?php foreach ($ejecutar as $opciones): ?>
              <option value="<?php echo $opciones['Nombre_PRODUCTO']?>"><?php echo $opciones['Nombre_PRODUCTO'] ?></option>
          <?php endforeach ?>
          <?php ?>
                              
        </select>
        <div class="invalid-feedback">Producto INVÁLIDO!</div>
      </div> 
 




    </div>



      <div class="text-center">
        <div class="form-group">
          <label class="col-sm-6 control-label">&nbsp;</label>
          <div class="col-sm-6">
          <input type="submit" name="save" class="btn btn-sm btn-primary" value="Enviar Nueva Producción">
          <a href="Produccion.php" class="btn btn-sm btn-danger">Cancelar</a>
          </div>
        </div>
      </div>
      






    </form><!-- End Change Password Form -->





  </main><!-- End #main -->




