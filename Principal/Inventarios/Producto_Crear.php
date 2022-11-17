<?php include("../cabecera2.php") ?>
<?php include("../sidebar.php")?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>PRODUCTO</h1>
        </ol>
      </nav>
    </div><!-- End Page Title -->
<!-- Change Password Form -->

    <form action="Producto_create.php" method="post"  class="row g-3 needs-validation" novalidate="false">

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
  <br><br>

      <div class="col-7">
        <label for="yourName" class="form-label">PRECIO DE VENTA</label>
        <input type="number" style="text-transform:uppercase" name="PRECIO_VENTA"  class="form-control" id="yourName" required>
        <div class="invalid-feedback">POR FAVOR, INGRESA UN PRECIO DE VENTA!</div>
      </div>


    </div>



      <div class="text-center">
        <div class="form-group">
          <label class="col-sm-6 control-label">&nbsp;</label>
          <div class="col-sm-6">
          <input type="submit" name="save" class="btn btn-sm btn-primary" value="Guardar datos">
          <a href="CrudProducto.php" class="btn btn-sm btn-danger">Cancelar</a>
          </div>
        </div>
      </div>
      
    </form><!-- End Change Password Form -->

  </main><!-- End #main -->




