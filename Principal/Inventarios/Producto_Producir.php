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

 

    <div class="pagetitle">
      <h1>PRODUCTO A PRODUCIR</h1>
        </ol>
      </nav>
    </div><!-- End Page Title -->
<!-- Change Password Form -->

<div class="col-7" >
    <form action="CrudDetalleProduccion.php" method="post"  class="row g-3 needs-validation" novalidate="false" >

    <div class="col-5" >
       <br>

        <label for="yourName" class="form-label">SELECCIONE UN PRODUCTO:</label>
        <select name="" id="selectProducto" class="form-control">
        <?php
              include("../db2.php");
              $ejecutar= mysqli_query( $conexion2 , "SELECT * FROM producto where cod_tipo_producto=2" );
              
          ?>
          <?php foreach ($ejecutar as $opciones): ?>
              <option value="<?php echo $opciones['descripcion']?>"><?php echo $opciones['descripcion'] ?></option>
          <?php endforeach ?>
          <?php ?>
                              
        </select>

        
        <br>
        <label for="yourName" class="form-label">CANTIDAD</label>
        <input type="number" style="text-transform:uppercase" name="cantidad_producir" id="cantidad_producir" class="form-control" id="yourName" placeholder="Cantidad a Producir" required>
      
    </div>

        <div class="invalid-feedback">Producto INVÁLIDO!</div>



        <div class="text-center">
        <div class="form-group">
          <label class="col-sm-6 control-label">&nbsp;</label>
          <div class="col-sm-6">
          <input type="submit" name="save" id="btnProductoProducir" class="btn btn-sm btn-primary" value="Enviar Nueva Producción" disabled>
         
          <a href="Produccion.php" class="btn btn-sm btn-danger">Cancelar</a>
          </div>
        </div>
      </div>
      

      
 </div>



              <script src="Produccion.js"></script>





    </form><!-- End Change Password Form -->
    </div>         
</div>


 